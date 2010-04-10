<?php
/***************************************************************************
 *                                 vogoo.php
 *                            -------------------
 *   begin                : Monday, Apr 4, 2005
 *   copyright            : (C) 2005 Stephane DROUX
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

if (!defined('VOGOO_DIR'))
{
	define('VOGOO_DIR', dirname(__FILE__) . "/");
}

if (!defined("VOGOO"))
{
define("VOGOO","vogoo");


define('VOGOO_INSTALLED', true);

// Engine constants
define("VG_THRESHOLD_NR_COMMON_RATINGS",30);
define("VG_THRESHOLD_MULT",2);
define("VG_THRESHOLD_RATING",0.66);
define("VG_COST",5.0);
define("VG_NOT_INTERESTED",-1.0);
define("VG_DIRECT_LINKS",false);
define("VG_DIRECT_SLOPE",false);
//if (VG_DIRECT_LINKS || VG_DIRECT_SLOPE)
//{
//	include(VOGOO_DIR."directitems.php");
//}

//if (!isset($vg_dbms))
//{
//	die("VOGOO LIB not installed !");
//}

class vogoo_class
{
	var $db;

	/**
	 * Singleton
	 * @return	object
	 */
	function getInstance()
	{
		static $instance = null;
		if ($instance == null)
		{
			$db	=& JFactory::getDBO();
			$instance	= new vogoo_class( $db );
		}
		return $instance;
	}

	function vogoo_class( &$db )
	{
		$this->db = &$db;
	}

	// {{{ Members
	function member_num_ratings($member_id,$real_ratings = true,$not_interested = false,$cat = 1)
	{
		if (!isset($member_id) || !is_numeric($member_id))
		{
			return false;
		}

		$sql = <<<EOF
SELECT count(*) AS number_of_ratings
FROM #__rokcomment_ratings_members
WHERE user_id = {$member_id}
AND category = {$cat}
EOF;

		// Filter real ratings/not interested information
		if ($real_ratings)
		{
			if (!$not_interested)
			{
				$sql .= ' AND rating >= 0.0';
			}
		}
		else
		{
			// if not_interested is set to false, then the user is a weirdo ;)
			// don't handle this case
			$sql .= ' AND rating = '.VG_NOT_INTERESTED;
		}
		$this->db->setQuery( $sql );
		$rows = $this->db->loadAssocList();
		if (isset( $rows[0] ))
		{
			$nr = $rows[0]['number_of_ratings'];
		} else {
			return false;
		}
		return $nr;
	}

	function member_average_rating($member_id,$cat = 1)
	{
		if (!isset($member_id) || !is_numeric($member_id))
		{
			return false;
		}

		$sql = <<<EOF
SELECT avg(rating) AS average
FROM #__rokcomment_ratings_members
WHERE user_id = {$member_id}
AND category = {$cat}
AND rating >= 0.0
EOF;

		$this->db->setQuery( $sql );
		$rows = $this->db->loadAssocList();
		if (isset( $rows[0] ))
		{
			$avg = $rows[0]['average'];
		} else {
			return false;
		}

		if ($avg == null)
		{
			return 0.0;
		}
		return $avg;
	}

	function member_ratings($member_id,$orderby_date = false,$orderby_rating = false,$sort_order_ASC = true,$real_ratings = true,$not_interested = false,$cat = 1)
	{
		if (!isset($member_id) || !is_numeric($member_id))
		{
			return false;
		}

		$sql = <<<EOF
SELECT context,context_id,rating,ts
FROM #__rokcomment_ratings_members
WHERE user_id = {$member_id}
AND category = {$cat}
EOF;

		// Filter real ratings/not interested information
		if ($real_ratings)
		{
			if (!$not_interested)
			{
				$sql .= ' AND rating >= 0.0';
			}
		}
		else
		{
			$sql .= ' AND rating = '.VG_NOT_INTERESTED;
		}

		if ($orderby_date || $orderby_rating)
		{
			$sql .= " ORDER BY ";
			$sql .= $orderby_date ? 'ts ' : 'rating ';
			$sql .= $sort_order_ASC ? 'ASC' : 'DESC';
		}

		$this->db->setQuery( $sql );
		$rows = $this->db->loadObjectList();

		if (isset( $rows[0] ))
		{
			return $rows;
		} else {
			return false;
		}
	}

	function member_similarity($member_id1,$member_id2,$cat = 1)
	{
		if (!isset($member_id1) || !is_numeric($member_id1) || !isset($member_id2) || !is_numeric($member_id2))
        {
                return false;
        }

		$nr_ratings1 = $this->member_num_ratings($member_id1,true,false,$cat);

		$sql = <<<EOF
SELECT COUNT(r2.context_id),SUM((r2.rating-r1.rating)*(r2.rating-r1.rating))
FROM #__rokcomment_ratings_members r1,#__rokcomment_ratings_members r2
WHERE r1.user_id = {$member_id1}
AND r2.user_id={$member_id2}
AND r2.context=r1.context
AND r2.context_id=r1.context_id
AND r1.category = {$cat}
AND r2.category=r1.category
AND r1.rating >= 0.0
AND r2.rating >= 0.0
EOF;

		$this->db->setQuery( $sql );
		$row = $this->db->loadRow();
		if ( !isset( $row ) ) {
			return false;
		}

		$nr_common_ratings = $row[0];
		$spread = $row[1] * VG_COST * VG_COST * 20.0;
		if ($nr_common_ratings == 0)
		{
			return 0;
		}
		$temp_factor = (float)$spread / (float)$nr_common_ratings;
		if ($temp_factor > 100)
		{
			return 0;
		}
		if ($nr_common_ratings > VG_THRESHOLD_NR_COMMON_RATINGS || ($nr_common_ratings * VG_THRESHOLD_MULT) >= $nr_ratings1)
		{
			return 100 - (int)$temp_factor;
		}
		$temp_factor2 = 0;
		if ($nr_ratings1 < (VG_THRESHOLD_NR_COMMON_RATINGS * VG_THRESHOLD_MULT))
		{
			$temp_factor2 = (float)($nr_common_ratings * VG_THRESHOLD_MULT) / (float)$nr_ratings1;
		}
		else
		{
			$temp_factor2 = (float)($nr_common_ratings * VG_THRESHOLD_MULT) / (float)(VG_THRESHOLD_NR_COMMON_RATINGS * VG_THRESHOLD_MULT);
		}
		$temp_factor2 *= $temp_factor2;
		return (int)((100.0 - $temp_factor) * (0.1 + 0.9 * $temp_factor2));
	}

	function member_k_similarities($member_id,$k,&$similarities,$cat = 1)
	{
		if (!isset($member_id) || !is_numeric($member_id) || !isset($k) || !is_numeric($k))
		{
			return false;
		}

		$similarities = array();

		$nr_ratings = $this->member_num_ratings($member_id,true,false,$cat);
		$sql = <<<EOF
SELECT r2.user_id,COUNT(r2.context_id),SUM((r2.rating-r1.rating)*(r2.rating-r1.rating))
FROM #__rokcomment_ratings_members r1,#__rokcomment_ratings_members r2
WHERE r1.user_id = {$member_id}
AND r2.context=r1.context
AND r2.context_id=r1.context_id
AND r1.category = {$cat}
AND r2.category=r1.category
AND r1.rating >= 0.0
AND r2.rating >= 0.0
AND r2.user_id <> r1.user_id
GROUP BY r2.user_id
EOF;

		$this->db->setQuery( $sql );
		$rows = $this->db->loadRowList();
		if (!isset( $rows ))
		{
			return false;
		}

		$spread = array();
		$nr = count($rows);
		for ($i=0; $i<$nr; $i++) {
			$row = $rows[$i];
			$spread[$row[0]] = array($row[2] * VG_COST * VG_COST * 20.0,$row[1]);
		}

		$arr = array();
		for ($i = 0;$i <= 100;$i++)
		{
			$arr[] = array();
		}
		foreach ($spread as $key=>$value)
		{
			$temp_factor = (float)($value[0]) / (float)($value[1]);
			if ($temp_factor > 100)
			{
				$arr[0][] = $key;
			}
			else
			{
				if ($value[1] >= VG_THRESHOLD_NR_COMMON_RATINGS || ($value[1] * VG_THRESHOLD_MULT) >= $nr_ratings)
				{
					$arr[100 - (int)$temp_factor][] = $key;
				}
				else
				{
					$temp_factor2 = 0;
					if ($nr_ratings < (VG_THRESHOLD_NR_COMMON_RATINGS * VG_THRESHOLD_MULT))
					{
						$temp_factor2 = (float)($value[1] * VG_THRESHOLD_MULT) / (float)$nr_ratings;
					}
					else
					{
						$temp_factor2 = (float)($value[1] * VG_THRESHOLD_MULT) / (float)(VG_THRESHOLD_NR_COMMON_RATINGS * VG_THRESHOLD_MULT);
					}
					$temp_factor2 *= $temp_factor2;
					$arr[(int)((100.0 - $temp_factor) * (0.1 + 0.9 * $temp_factor2))][] = $key;
				}
			}
		}
		unset($spread);
		// Now create the array for the k nearest neighbours
		$i = 100;
		$j = 0;
		while ($j < $k && $i >= 0)
		{
			$n = count($arr[$i]);
			$p = 0;
			while ($p < $n && $j < $k)
			{
				$similarities[] = array($arr[$i][$p],$i);
				$j++;
				$p++;
			}
			$i--;
		}
		return true;
	}

	function member_k_recommendations($member_id,$k,&$similarities,&$recommendations,$cat = 1,$filter = false)
	{
		if (!isset($member_id) || !is_numeric($member_id) || !isset($k) || !is_numeric($k) || !isset($similarities))
		{
			return false;
		}

		$recommendations = array();

		$sql = <<<EOF
SELECT concat(context,cast(context_id as char))
FROM #__rokcomment_ratings_members
WHERE user_id = {$member_id}
AND category = {$cat}
EOF;

		$this->db->setQuery( $sql );
		$products = $this->db->loadResultArray();
		if (!isset( $products ))
		{
			return false;
		}

		$nr = count($similarities);
		$i = 0;
		$j = 0;
		while ($i < $k && $j < $nr)
		{
			$member = $similarities[$j][0];
			$sql = <<<EOF
SELECT concat(context,cast(context_id as char)) as unique_id,context,context_id,rating,ts
FROM #__rokcomment_ratings_members
WHERE user_id = {$member}
AND rating >= 0.0
AND category = {$cat}
EOF;

			$this->db->setQuery( $sql );
			$rows = $this->db->loadAssocList();
			if (!isset( $rows ))
			{
				return false;
			}

			$numProdRows = count($rows);
			$prodRowNum = 0;
			while ($i < $k && $prodRowNum < $numProdRows) {
				$row = $rows[$prodRowNum];
				$pdt = $row['unique_id'];
				if (!in_array($pdt,$products) && (!$filter || $filter[$pdt]))
				{
					$rating = $row['rating'];
					$products[] = $pdt;
					if ($rating >= VG_THRESHOLD_RATING)
					{
						$recommendations[] = array(
							$member,$similarities[$j][1],$row['context'],$row['context_id'],$rating,$row['ts']);
						$i++;
					}
				}
				$prodRowNum++;
			}
			$j++;
		}

		return true;
	}

	function delete_member($member_id)
	{
		if (!isset($member_id) || !is_numeric($member_id))
		{
			return false;
		}

		$sql = <<<EOF
DELETE
FROM #__rokcomment_ratings_members
WHERE user_id = {$member_id}
EOF;
		$this->db->setQuery( $sql );
		if ( !($this->db->query()) )
		{
			return false;
		}

		return true;
	}

	// }}}

	// {{{ Products
	function product_num_ratings($context,$context_id,$cat = 1)
	{
		if (!isset($context) || !isset($context_id) || !is_numeric($context_id))
		{
			return false;
		}

		$sql = <<<EOF
SELECT count(*) AS number_of_ratings
FROM #__rokcomment_ratings_members
WHERE context = '{$context}'
AND context_id = {$context_id}
AND rating >= 0.0
AND category = {$cat}
EOF;

		$this->db->setQuery( $sql );
		if ( !($row = $this->db->loadAssoc()) ) {
			return false;
		}

		$nr = $row['number_of_ratings'];
		return $nr;
	}

	function product_average_rating($context,$context_id,$cat = 1)
	{
		if (!isset($context) || !isset($context_id) || !is_numeric($context_id))
		{
			return false;
		}

		$sql = <<<EOF
SELECT avg(rating) AS average
FROM #__rokcomment_ratings_members
WHERE context = '{$context}'
AND context_id = {$context_id}
AND category = {$cat}
AND rating >= 0.0
EOF;

		$this->db->setQuery( $sql );
		if ( !($row = $this->db->loadAssoc()) ) {
			return false;
		}

		$avg = $row['average'];
		if ($avg == null)
		{
			return 0.0;
		}
		return $avg;
	}

	function product_ratings($context,$context_id,$orderby_date = false,$orderby_rating = false,$sort_order_ASC = true,$cat = 1)
	{
		if (!isset($context) || !isset($context_id) || !is_numeric($context_id))
		{
			return false;
		}

		$sql = <<<EOF
SELECT user_id,rating,ts
FROM #__rokcomment_ratings_members
WHERE context = '{$context}'
AND context_id = {$context_id}
AND rating >= 0.0
AND category = {$cat}
EOF;

		if ($orderby_date || $orderby_rating)
		{
			$sql .= " ORDER BY ";
			$sql .= $orderby_date ? 'ts ' : 'rating ';
			$sql .= $sort_order_ASC ? 'ASC' : 'DESC';
		}

		$this->db->setQuery( $sql );
		if ( !($rows = $this->db->loadRowList()) ) {
			return false;
		}
		return $rows;
	}

	function delete_product($context,$context_id,$cat = 1)
	{
		if (!isset($context) || !isset($context_id) || !is_numeric($context_id))
		{
			return false;
		}

		$sql = <<<EOF
DELETE
FROM #__rokcomment_ratings_members
WHERE context = '{$context}'
AND context_id = {$context_id}
AND category = {$cat}
EOF;
		$this->db->setQuery( $sql );
		if ( !($this->db->query()) )
		{
			return false;
		}

		return true;
	}
	// }}}

	// {{{ Combined
	function get_rating($member_id,$context,$context_id,$not_interested = false,$cat = 1)
	{
		if (!isset($member_id) || !is_numeric($member_id) || !isset($context) || !isset($context_id) || !is_numeric($context_id))
		{
			return false;
		}

		$sql = <<<EOF
SELECT rating,ts
FROM #__rokcomment_ratings_members
WHERE user_id = {$member_id}
AND context = '{$context}'
AND context_id = {$context_id}
AND category = {$cat}
EOF;

		if (!$not_interested)
		{
			$sql .= ' AND rating >= 0.0';
		}

		$this->db->setQuery( $sql );
		if ( !($this->db->query()) )
		{
			return false;
		}
		if ( $this->db->getNumRows() != 1 ) {
			return array();
		}
		if ( !($row = $this->db->loadAssoc()) ) {
			return false;
		}

		return $row;
	}

	function set_rating($member_id,$context,$context_id,$rating,$cat = 1)
	{
		if (!isset($member_id) || !is_numeric($member_id) || !isset($context) || !isset($context_id) || !is_numeric($context_id) || ($rating < 0.0 && $rating != VG_NOT_INTERESTED) || $rating > 1.0)
		{
			return false;
		}

		$sql = <<<EOF
SELECT rating
FROM #__rokcomment_ratings_members
WHERE user_id = {$member_id}
AND context = '{$context}'
AND context_id = {$context_id}
AND category = {$cat}
EOF;

		$this->db->setQuery( $sql );
		if ( !($result = $this->db->query()) )
		{
			return false;
		}
		$nr = $this->db->getNumRows($result);
		if ($nr == 1)
		{
			$row = $this->db->loadResultArray();
			$previous = $row[0];
// have not ported direct_links or direct_slope stuff yet
//			if (VG_DIRECT_LINKS)
//			{
//				set_direct_links($member_id,$product_id,$cat,$rating,$previous);
//			}
//			if (VG_DIRECT_SLOPE)
//			{
//				set_direct_slope($member_id,$product_id,$cat,$rating,$previous);
//			}
			$sql = <<<EOF
UPDATE #__rokcomment_ratings_members
SET rating = {$rating}, ts = NOW()
WHERE user_id = {$member_id}
AND context = '{$context}'
AND context_id = {$context_id}
AND category = {$cat}
EOF;

			$this->db->setQuery( $sql );
			if ( !($result = $this->db->query()) )
			{
				return false;
			}
			if( $this->db->getAffectedRows() != 1 )
			{
				return false;
			}
		}
		else if ($nr == 0)
		{
// have not ported direct_links or direct_slope stuff yet
//			if (VG_DIRECT_LINKS)
//			{
//				set_direct_links($member_id,$product_id,$cat,$rating,-1.0);
//			}
//			if (VG_DIRECT_SLOPE)
//			{
//				set_direct_slope($member_id,$product_id,$cat,$rating,-1.0);
//			}
			$sql = <<<EOF
INSERT INTO #__rokcomment_ratings_members(user_id,context,context_id,category,rating,ts)
VALUES ({$member_id},'{$context}',{$context_id},{$cat},{$rating},NOW())
EOF;

			$this->db->setQuery( $sql );
			if ( !($result = $this->db->query()) )
			{
				return false;
			}
			if( $this->db->getAffectedRows() != 1 )
			{
				return false;
			}
		}
		else
		{
			return false;
		}
		return true;
	}

	function automatic_rating($member_id,$context,$context_id,$purchase,$cat = 1)
	{
		if (!isset($member_id) || !is_numeric($member_id) || !isset($context) || !isset($context_id) || !is_numeric($context_id))
		{
			return false;
		}
		if ($purchase)
		{
			return $this->set_rating($member_id,$context,$context_id,1.0,$cat);
		}
		else
		{
			// A click
			$res = $this->get_rating($member_id,$context,$context_id,false,$cat);
			if (count($res) == 0)
			{
				return $this->set_rating($member_id,$context,$context_id,0.7,$cat);
			}
			else if ($res['rating'] < 1.0)
			{
				return $this->set_rating($member_id,$context,$context_id,$res['rating']+0.01,$cat);
			}
		}
	}

	function set_not_interested($member_id,$context,$context_id,$cat = 1)
	{
		return $this->set_rating($member_id,$context,$context_id,VG_NOT_INTERESTED,$cat);
	}

	function delete_rating($member_id,$context,$context_id,$cat = 1)
	{
		if (!isset($member_id) || !is_numeric($member_id) || !isset($context) || !isset($context_id) || !is_numeric($context_id))
		{
			return false;
		}
// have not ported direct_links or direct_slope stuff yet
//		if (VG_DIRECT_LINKS || VG_DIRECT_SLOPE)
//		{
//			$sql = <<<EOF
//SELECT rating
//FROM #__rokcomment_ratings_members
//WHERE user_id = {$member_id}
//AND context = '{$context}'
//AND context_id = {$context_id}
//AND category = {$cat}
//EOF;
//			$this->db->setQuery( $sql );
//			if ( !($result = $this->db->query()) )
//			{
//				return false;
//			}
//			$nr = $this->db->getNumRows($result);
//			if ($nr == 1)
//			{
//				$row = $this->db->loadResultArray();
//
//				if (VG_DIRECT_LINKS)
//				{
//					set_direct_links($member_id,$product_id,$cat,-1.0,$row[0]);
//				}
//				if (VG_DIRECT_SLOPE)
//				{
//					set_direct_slope($member_id,$product_id,$cat,-1.0,$row[0]);
//				}
//			}
//		}
		$sql = <<<EOF
DELETE
FROM #__rokcomment_ratings_members
WHERE user_id = {$member_id}
AND context = '{$context}'
AND context_id = {$context_id}
AND category = {$cat}
EOF;
		$this->db->setQuery( $sql );
		if ( !($result = $this->db->query()) )
		{
			return false;
		}

		return true;
	}

	function get_product_recommendation($context,$context_id,&$similarities,$cat = 1)
	{
		if (!isset($context) || !isset($context_id) || !is_numeric($context_id) || !isset($similarities))
		{
			return false;
		}

		$ret = array();
		$nr = count($similarities);
		if ($nr == 0)
		{
			return $ret;
		}
		$arr = array();
		for ($i = 0;$i < $nr;$i++)
		{
			$arr[$similarities[$i][0]] = $similarities[$i][1];
		}

		$sql = <<<EOF
SELECT user_id,rating,ts
FROM #__rokcomment_ratings_members
WHERE context = '{$context}'
AND context_id = {$context_id}
AND rating >= 0.0
AND category = {$cat}
EOF;
		$this->db->setQuery( $sql );
		if ( !($result = $this->db->query()) )
		{
			return false;
		}

		// Don't return any recommandation under 50% of similarity
		$max_similarity = 50;
		$rows = $this->db->loadAssocList();
		$nr = count($rows);
		$i = 0;
		while ($i < $nr )
		{
		// while ($row = $this->db->sql_fetchrow($result))
			$row = $rows[$i];
			$member = $row['user_id'];
			if (isset($arr[$member]))
			{
				$temp_sim = $arr[$member];
				if ($temp_sim > $max_similarity)
				{
					$ret = array($member,$temp_sim,$row['rating'],$row['ts']);
					$max_similarity = $temp_sim;
				}
			}
			$i++;
		}
		return $ret;
	}

	function get_product_ratings_by_similarity($context,$context_id,&$similarities,$cat = 1)
	{
		if (!isset($context) || !isset($context_id) || !is_numeric($context_id) || !isset($similarities))
		{
			return false;
		}
		$ret = array();
		$nr = count($similarities);
		if ($nr == 0)
		{
			return $ret;
		}
		$arr = array();
		for ($i = 0;$i < $nr;$i++)
		{
			$arr[$similarities[$i][0]] = array($similarities[$i][1],$i);
		}

		$sql = <<<EOF
SELECT user_id,rating,ts
FROM #__rokcomment_ratings_members
WHERE context = '{$context}'
AND context_id = {$context_id}
AND rating >= 0.0
AND category = {$cat}
EOF;

		$this->db->setQuery( $sql );
		if ( !($rows = $this->db->loadAssocList()) )
		{
			return false;
		}
		$temp_ret = array();
		$nr = count($rows);
		$i = 0;
		while ($i < $nr )
		{
			$row = $rows[$i];
			$member = $row['user_id'];
			if (isset($arr[$member]))
			{
				$temp = $arr[$member];
				$temp_ret[$temp[1]] = array($member,$temp[0],$row['rating'],$row['ts']);
			}
			$i++;
		}
		unset($arr);

		// Create a ret array from temp_ret
		for ($i = 0;$i < $nr;$i++)
		{
			if (isset($temp_ret[$i]))
			{
				$ret[] = $temp_ret[$i];
			}
		}
		return $ret;
	}

	// }}}
}

} // ... defined
?>
