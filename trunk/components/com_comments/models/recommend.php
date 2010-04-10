<?php
/**
 * @version		$Id: recommend.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 *
 * Heavily based on Vogoo Project
 * @copyright	(C) 2005 Stephane DROUX
 * @license		GNU General Public License Version 2 or later
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.model' );


// Engine constants
define( 'VG_THRESHOLD_NR_COMMON_RATINGS',	30 );
define( 'VG_THRESHOLD_MULT',				2 );
define( 'VG_THRESHOLD_RATING',				0.66 );
define( 'VG_COST',							5.0 );
define( 'VG_NOT_INTERESTED',				-1.0 );
define( 'VG_DIRECT_LINKS',					false );
define( 'VG_DIRECT_SLOPE',					false );
//if (VG_DIRECT_LINKS || VG_DIRECT_SLOPE)
//{
//	include(VOGOO_DIR."directitems.php");
//}

/**
 * @package		jXRecommend
 */
class CommentsModelRecommend extends JModel
{
	/**
	 * Get the number of ratings by a member within a context
	 *
	 * @param	int		The user ID
	 * @param	boolean
	 * @param	boolean
	 * @param	int
	 * @param	string	The context
	 */
	function member_num_ratings( $memberId, $real_ratings = true, $not_interested = false, $categoryId = 0, $context = null )
	{
		// Get the context id of the item
		$context = (string) (is_null( $context )) ? $this->getState('context', '') : $context;

		$db = &$this->getDBO();
		if ($memberId == 0) {
			return 0;
		}

		$sql = 'SELECT count(*) AS number_of_ratings' .
				' FROM #__jxcomments_ratings_members' .
				' WHERE user_id = '. (int) $memberId .
				'  AND category_id = '. (int) $categoryId .
				'  AND context = '.$db->Quote( $context );

		// Filter real ratings/not interested information
		if ($real_ratings)
		{
			if (!$not_interested)
			{
				$sql .= ' AND score >= 0.0';
			}
		}
		else
		{
			// if not_interested is set to false, then the user is a weirdo ;)
			// don't handle this case
			$sql .= ' AND score = '.VG_NOT_INTERESTED;
		}
		$db->setQuery( $sql );
		$result	= $db->loadResult();

		return $result;
	}

	/**
	 * Get the average rating for a user within a context
	 *
	 * @param	int
	 * @param	int
	 * @param	string
	 */
	function member_average_rating( $memberId, $categoryId = 0, $context = null )
	{
		// Get the context id of the item
		$context = (string) (is_null( $context )) ? $this->getState('context', '') : $context;

		$db = &$this->getDBO();
		if ($memberId == 0) {
			return 0;
		}

		$sql = 'SELECT avg(score) AS average' .
				' FROM #__jxcomments_ratings_members' .
				' WHERE user_id = '. (int) $memberId .
				'  AND category_id = '.(int) $categoryId .
				'  AND score >= 0.0' .
				'  AND context = '.$db->Quote( $context );

		$db->setQuery( $sql );
		$result	= $db->loadResult();

		return $result;
	}

	/**
	 * Get the ratings for all items within a context
	 *
	 * @param	int
	 * @param	string
	 * @param	boolean
	 * @param	boolean
	 * @param	int
	 * @param	string
	 *
	 * @return	array
	 */
	function member_ratings( $memberId, $orderBy = null, $real_ratings = true, $not_interested = false, $categoryId = 0, $context = null )
	{
		// Get the context id of the item
		$context = (string) (is_null( $context )) ? $this->getState('context', '') : $context;

		$db = &$this->getDBO();
		if ($memberId == 0) {
			return 0;
		}

		$sql = 'SELECT context_id, score, updated_date' .
				' FROM #__jxcomments_ratings_members' .
				' WHERE user_id = '. (int) $memberId .
				'  AND category_id = '.(int) $categoryId;

		// Filter real ratings/not interested information
		if ($real_ratings)
		{
			if (!$not_interested) {
				$sql .= ' AND score >= 0.0';
			}
		}
		else {
			$sql .= ' AND score = '.VG_NOT_INTERESTED;
		}

		switch ($orderBy)
		{
			case 'date_asc':
				$sql .= ' ORDER BY update_date ASC';
				break;
			case 'date_dsc':
				$sql .= ' ORDER BY update_date DESC';
				break;
			case 'score_asc':
				$sql .= ' ORDER BY score ASC';
				break;
			case 'score_dsc':
				$sql .= ' ORDER BY score DESC';
				break;
		}

		$db->setQuery( $sql );
		$result = $db->loadObjectList();

		return $result;
	}

	/**
	 * Gets the similarity (an integer in the range 0..100) between members.
	 *
	 * This will tell you how reliable member_id2 is to give recommendations to member_id1
	 *
	 * @param	int
	 * @param	int
	 * @param	int
	 * @param	string
	 *
	 * @return	int
	 */
	function member_similarity( $memberId1, $memberId2, $categoryId = 0, $context = null )
	{
		// Get the context id of the item
		$context = (string) (is_null( $context )) ? $this->getState('context', '') : $context;

		if ($memberId1 == 0 or $memberId2 == 0) {
			return 0;
        }
		$db = &$this->getDBO();

		$nr_ratings1 = $this->member_num_ratings( $memberId1, true, false, $categoryId );

		$sql = 'SELECT COUNT(r2.context_id),SUM((r2.score-r1.score)*(r2.score-r1.score))' .
				' FROM #__jxcomments_ratings_members r1' .
				' INNER JOIN #__jxcomments_ratings_members r2' .
				'  ON r2.context = r1.context' .
				'  AND r2.context_id = r1.context_id' .
				'  AND r2.category_id = r1.category_id' .
				' WHERE r1.user_id = '.(int) $memberId1 .
				'  AND r2.user_id='.(int) $memberId2 .
				'  AND r1.category_id = '.(int) $categoryId .
				'  AND r1.context = '.$db->Quote( $context ) .
				'  AND r1.score >= 0.0' .
				'  AND r2.score >= 0.0';

		$db->setQuery( $sql );
		$row = $db->loadRow();
		if ( !isset( $row ) ) {
			return false;
		}

		$nr_common_ratings = $row[0];
		$spread = $row[1] * VG_COST * VG_COST * 20.0;
		if ($nr_common_ratings == 0) {
			return 0;
		}

		$temp_factor = (float)$spread / (float)$nr_common_ratings;
		if ($temp_factor > 100) {
			return 0;
		}

		if ($nr_common_ratings > VG_THRESHOLD_NR_COMMON_RATINGS || ($nr_common_ratings * VG_THRESHOLD_MULT) >= $nr_ratings1) {
			return 100 - (int)$temp_factor;
		}

		$temp_factor2 = 0;
		if ($nr_ratings1 < (VG_THRESHOLD_NR_COMMON_RATINGS * VG_THRESHOLD_MULT)) {
			$temp_factor2 = (float)($nr_common_ratings * VG_THRESHOLD_MULT) / (float)$nr_ratings1;
		}
		else {
			$temp_factor2 = (float)($nr_common_ratings * VG_THRESHOLD_MULT) / (float)(VG_THRESHOLD_NR_COMMON_RATINGS * VG_THRESHOLD_MULT);
		}
		$temp_factor2 *= $temp_factor2;

		return (int)((100.0 - $temp_factor) * (0.1 + 0.9 * $temp_factor2));
	}

	/**
	 * Gets the $k best similarities for member $member_id
	 * (ie, the $k members whose tastes are the closest to $member_id)
	 * in category $cat and stores them in the $similarities var.
	 *
	 * Each row of the returned array $similarities is an array whose first element is the member ID
	 * and the second element is his similarity to member $member_id.
	 * The keys to these fields are 'user_id' and 'sim'.
	 *
	 * @param	int
	 * @param	int
	 * @param	array
	 * @param	int
	 * @param	string
	 *
	 * @return	boolean
	 */
	function member_k_similarities( $memberId, $k, &$similarities, $categoryId = 0, $context = null )
	{
		// Get the context id of the item
		$context = (string) (is_null( $context )) ? $this->getState('context', '') : $context;

		if ($memberId == 0 || $k == 0) {
			return false;
		}
		$db = &$this->getDBO();
		$similarities = array();

		$nr_ratings = $this->member_num_ratings( $memberId, true, false,$categoryId, $context );
		$sql = 'SELECT r2.user_id,COUNT(r2.context_id),SUM((r2.score-r1.score)*(r2.score-r1.score))' .
				' FROM #__jxcomments_ratings_members r1' .
				' INNER JOIN #__jxcomments_ratings_members r2' .
				'  ON r2.context = r1.context' .
				'  AND r2.context_id = r1.context_id' .
				'  AND r2.category_id = r1.category_id' .
				' WHERE r1.user_id = '.(int) $memberId .
				'  AND r1.context = '.$db->Quote( $context ) .
				'  AND r1.category_id = '.(int) $categoryId .
				'  AND r1.score >= 0.0' .
				'  AND r2.score >= 0.0' .
				'  AND r2.user_id <> r1.user_id' .
				' GROUP BY r2.user_id';

		$db->setQuery( $sql );
		$rows = $db->loadRowList();
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
				$similarities[] = array(0=>$arr[$i][$p],1=>$i,'user_id'=>$arr[$i][$p],'sim'=>$i);
				$j++;
				$p++;
			}
			$i--;
		}
		return true;
	}

	/**
	 * This function creates an array in the $recommendations var that contains
	 * up to $k recommendations for member $member_id. The $similarities parameter
	 * is the array computed by member_k_similarities.
	 *
	 * Each row of the $recommendations array filled by member_k_recommendations()
	 * is an array whose elements are: the member ID (key 'user_id'), the similarity
	 * (key 'sim') to the current member $user_id, the ID of the product (key 'context_id'),
	 * the rating (key 'score') given to this product and the timestamp of the rating (key 'updated_date').
	 *
	 * Note 1: Since this function computes recommendations, all the products returned in the $recommendations
	 * array are products that have not been rated by member $member_id.
	 *
	 * Note 2: When member $member_id has specified that he is not interested in a product, this product
	 * won't be recommended to him even if it appears to match his tastes.
	 *
	 * Note 3: Since v1.7 a filter parameter has been added. This filter allows you to specify a sub-list
	 * of items that can be recommended. For instance, if you have a DB that contains movies, you may want
	 * to recommend only movies that are currently played in cinemas. To do so simply create an array of
	 * booleans where the items IDs corresponding to the movies in cinemas are set to true and the other
	 * IDs are set to false. Use this array as the $filter parameter for this function.
	 * The returned recommended items will only contain movies that are currently played in cinemas.
	 *
	 * @param	int
	 * @param	int		The number to return
	 * @param	array
	 * @param	array
	 * @param	int
	 * @param	array	Optional
	 * @param	string
	 *
	 * @return	boolean
	 */
	function member_k_recommendations( $memberId, $k, &$similarities, &$recommendations, $categoryId = 0, $filter = false, $context = null )
	{
		// Get the context id of the item
		$context = (string) (is_null( $context )) ? $this->getState('context', '') : $context;

		if ($memberId == 0 || $k == 0) {
			return false;
		}
		$db = &$this->getDBO();
		$recommendations = array();

		$sql = 'SELECT concat(context,cast(context_id as char))' .
				' FROM #__jxcomments_ratings_members' .
				' WHERE user_id = '.(int) $memberId .
				'  AND category_id = '.(int) $categoryId .
				'  AND context = '.$db->Quote( $context );

		$db->setQuery( $sql );
		$products = $db->loadResultArray();
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
			$sql = 'SELECT context_id,score,updated_date' .
					' FROM #__jxcomments_ratings_members' .
					' WHERE user_id = '.(int) $member .
					'  AND score >= 0.0' .
					'  AND category_id = '.(int) $categoryId .
					'  AND context = '.$db->Quote( $context );

			$db->setQuery( $sql );
			$rows = $db->loadAssocList();
			if (!isset( $rows ))
			{
				return false;
			}

			$numProdRows = count($rows);
			$prodRowNum = 0;
			while ($i < $k && $prodRowNum < $numProdRows) {
				$row = $rows[$prodRowNum];
				$pdt = $row['context_id'];
				if (!in_array($pdt,$products) && (!$filter || $filter[$pdt]))
				{
					$rating = $row['score'];
					$products[] = $pdt;
					if ($rating >= VG_THRESHOLD_RATING)
					{
						$recommendations[] = array(0=>$member,1=>$similarities[$j][1],2=>$pdt,3=>$rating,4=>$row['updated_date'],'user_id'=>$member,'sim'=>$similarities[$j][1],'context_id'=>$pdt,'rating'=>$rating,'updated_date'=>$row['updated_date']);
						$i++;
					}
				}
				$prodRowNum++;
			}
			$j++;
		}

		return true;
	}

	/**
	 * This function returns the rating for product $contextId given by the member
	 * who has the highest similarity to the current user (or visitor) and has rated this product.
	 *
	 * If no member close to the current member has rated the product, an empty array is returned.
	 * Otherwise, the function returns an array containing: the member ID, his similarity to the
	 * current member, his rating for the product and the timestamp of the rating ('member_id', 'sim', 'rating', 'updated_date').
	 *
	 * @return mixed
	 */
	function get_product_recommendation($contextId,&$similarities,$categoryId = 0, $context = null)
	{
		// Get the context id of the item
		$context = (string) (is_null( $context )) ? $this->getState('context', '') : $context;

		if (!isset($contextId) || !is_numeric($contextId) || !isset($similarities))
		{
			return false;
		}
		$db = &$this->getDBO();

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

		$db->setQuery(
			'SELECT user_id,score,updated_date' .
			' FROM #__jxcomments_ratings_members' .
			' WHERE context_id = '.(int) $contextId .
			'  AND score >= 0.0' .
			'  AND category_id = '.(int) $categoryId .
			'  AND context = '.$db->Quote( $context )
		);
		$rows = $db->loadAssocList();
		if (empty( $rows )) {
			return false;
		}

		// Don't return any recommandation under 50% of similarity
		$max_similarity = 50;
		for ($i = 0, $n = count( $rows ); $i < $n; $i++)
		{
			$row = &$rows[$i];
			$member = $row['user_id'];
			if (isset($arr[$member]))
			{
				$temp_sim = $arr[$member];
				if ($temp_sim > $max_similarity)
				{
					$ret = array(0=>$member,1=>$temp_sim,2=>$row['score'],3=>$row['updated_date'],'user_id'=>$member,'sim'=>$temp_sim,'score'=>$row['score'],'updated_date'=>$row['updated_date']);
					$max_similarity = $temp_sim;
				}
			}
		}
		unset( $rows );
		return $ret;
	}

	/**
	 * This function returns an array of ratings for product $contextId ordered
	 * by their descending similarity value, thus allowing the current member or
	 * visitor to know how other members, close to his tastes, have rated this product.
	 *
	 * Each row of the returned array is an array whose elements are: the member ID ('user_id'),
	 * his similarity to the current member ('sim'), the rating ('rating') he gave to the
	 * product and the timestamp of this rating ('updated_date').
	 *
	 * The $similarities parameter is the array computed by $vogoo_users->member_k_similarities .
	 * $vogoo_users->get_product_ratings_by_similarity only checks for ratings given by the members
	 * listed in the $similarities array, therefore an empty array can be returned even if the
	 * product has been rated several times.
	 *
	 * Please note that a $categoryId argument can be specified. This is to allow cross-categories
	 * recommendations when $categoryId is different from the category used to compute the similarities array.
	 *
	 * @return array
	 */
	function get_product_ratings_by_similarity($contextId,&$similarities,$categoryId = 0, $context = null )
	{
		// Get the context id of the item
		$context = (string) (is_null( $context )) ? $this->getState('context', '') : $context;

		if (!isset($contextId) || !is_numeric($contextId) || !isset($similarities))
		{
			return false;
		}

		$db = &$this->getDBO();
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

		$db->setQuery(
			'SELECT user_id, score, updated_date' .
			' FROM #__jxcomments_ratings_members' .
			' WHERE context_id = '.(int) $contextId .
			'  AND score >= 0.0' .
			'  AND category_id = '.(int) $categoryId .
			'  AND context = '.$db->Quote( $context )
		);
		$rows = $db->loadAssocList();
		if (empty( $rows )) {
			return false;
		}

		$temp_ret = array();
		for ($i = 0, $n = count( $rows ); $i < $n; $i++)
		{
			$row = &$rows[$i];
			$member = $row['user_id'];
			if (isset($arr[$member]))
			{
				$temp = $arr[$member];
				$temp_ret[$temp[1]] = array(0=>$member,1=>$temp[0],2=>$row['score'],3=>$row['updated_date'],'user_id'=>$member,'sim'=>$temp[0],'score'=>$row['score'],'updated_date'=>$row['updated_date']);
			}
		}
		unset( $rows );
		unset($arr);

		// Compact the return arry
		return array_values( $temp_ret );
	}

}
