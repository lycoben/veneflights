<?php
/**
 * $Id: XmapSitemap.php 58 2007-10-17 02:06:18Z root $
 * $LastChangedDate: 2007-10-16 20:06:18 -0600 (mar, 16 oct 2007) $
 * $LastChangedBy: root $
 * Xmap by Guillermo Vargas
 * a sitemap component for Joomla! CMS (http://www.joomla.org)
 * Author Website: http://joomla.vargas.co.cr
 * Project License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/** Wraps all configuration functions for Xmap */
class XmapSitemap extends JTable {
	var $id 		= NULL;
	var $name	 	= "";
	var $expand_category 	= 1;
	var $expand_section 	= 1;
	var $show_menutitle 	= 1;
	var $columns 		= 1;
	var $exlinks 		= 1;
	var $ext_image 		= 'img_grey.gif';
	var $menus 		= "mainmenu,0,1,1,0.5,daily";
	var $exclmenus		= '';
	var $includelink	= 1;
	var $usecache		= 1;
	var $cachelifetime	= 900;
	var $classname		= 'xmap';
	var $count_xml		= 0;
	var $count_html		= 0;
	var $views_xml		= 0;
	var $views_html		= 0;
	var $lastvisit_xml	= 0;
	var $lastvisit_html	= 0;
	var $excluded_items	= '';
	var $compress_xml	= 0;

	function XmapSitemap(&$db) {
		$config =& JFactory::getConfig();

		$this->name= _XMAP_NAME_NEW_SITEMAP;
		$this->usecache	= $config->getValue('config.caching');
		$this->cachelifetime= $config->getValue('config.cachetime');
		$this->_excluded_items=NULL;

		parent::__construct('#__xmap_sitemap', 'id', $db);
	}

	/** Return $menus as an associative array */
	function &getMenus() {
		$lines = explode("\n", $this->menus);

		$menus = array();
		foreach( $lines as $line ) {
			if ($line) {
				list( $menutype, $ordering, $show, $showXML, $priority, $changefreq ) = explode(',', $line);
				$menu = new stdclass;
				$menu->menutype 	= $menutype;
				$menu->ordering 	= $ordering;
				$menu->show  		= $show;
				$menu->showXML  	= $showXML;
				$menu->priority  	= ($priority? $priority : '0.5');
				$menu->changefreq  	= ($changefreq? $changefreq : 'weekly');
				$menus[$menutype] 	= $menu;
			}
		}
		return $menus;
	}

	/** Set $menus from an associative array of menu objects */
	function setMenus( &$menus ) {
		$db = & JFactory::getDBO();
		$lines = array();
		foreach( $menus as $menutype => $menu ) {
			$show = $menu->show ? 1 : 0;
			$showXML = $menu->showXML ? 1 : 0;
			$lines[] = $db->getEscaped($menutype).','.intval($menu->ordering).','.$show.','.$showXML.','.$db->getEscaped($menu->priority).','.$db->getEscaped($menu->changefreq);
		}
		$this->menus = implode("\n", $lines);
	}

	/** Remove the sitemap from the table */
	function remove() {
		$db = & JFactory::getDBO();
		$query = "delete from #__xmap_sitemap where `id`=".$this->id;
		$db->setQuery( $query );
		if( $db->query() === FALSE ) {
			echo _XMAP_ERR_NO_DROP_DB . "<br />\n";
			echo mosStripslashes($db->getErrorMsg());
			return false;
		}
		return true;
	}

	/** Load settings from the database into this instance */

	function load($id) {
		$db = & JFactory::getDBO();

		$this->id = intval($id);
		$query = 'SELECT * FROM `#__xmap_sitemap` where id='.$this->id;
		$db->setQuery( $query );
		if( !$res = $db->loadAssocList( )) {
			return false;	// defaults are still set, though
		}
		$this->bind($res[0]);
		return true;
	}


	/** Save current settings to the database */
	function save($forceinstall=false) {
		$db = & JFactory::getDBO();

		$fields = array();

		$vars = get_object_vars( $this );
		foreach($vars as $name => $value) {
			if (is_array($value) || is_object($value)) {
				continue;
			}
			if ($name[0]!=='_' && ($name != 'id' || ($forceinstall && $value) )  ) {
				$fields["`{$name}`"] = "'{$value}'";
			}
		}

		if ($this->id && !$forceinstall) {
		    $sep = "";
		    $values="";
		    foreach ($fields as $k  => $value) {
			if ($k != 'id') {
				$values .= "$sep$k=$value";
				$sep = ",";
			}
		    }
		    $query = "UPDATE #__xmap_sitemap SET $values WHERE id=" . intval($this->id);
		    $isInsert = 0;
		} else {
		    $query = "INSERT INTO #__xmap_sitemap (". implode(',',array_keys($fields)) .") VALUES (".implode(',',$fields).")";
		    $isInsert = 1;
		}
		$db->setQuery( $query );
		# echo $db->getQuery( );
		if( $db->query() === FALSE ) {
			echo stripslashes($db->getErrorMsg());
			return false;
	 	}
		if ($isInsert) {
			$this->id = $db->insertid( );
		}
		return true;
	}
	
	/** Debug output of current settings */
	function dump() {
		$vars = get_object_vars( $this );
		echo '<pre style="text-align:left">';
		foreach( $vars as $name => $value ) {
			echo $name.': '.$value."\n";
		}
		echo '</pre>';
	}

	function bind( $array, $ignore='' ) {
		if (!is_array( $array )) {
			$this->_error = strtolower(get_class( $this ))."::bind failed.";
			return false;
		} else {
			foreach (get_object_vars($this) as $k => $v) {
				if( substr( $k, 0, 1 ) != '_' ) {	// internal attributes of an object are ignored
					if ( isset($array[$k]) ) {
						$this->$k = get_magic_quotes_gpc() ? stripslashes( $array[$k] ) : $array[$k];
					} elseif ( !in_array($k, array('id','count_xml','views_xml','views_html','lastvisit_xml','count_html','views_html','lastvisit_html')) ) {
						$this->$k = '';
					}
				}
			}
		}
	}

	/** Move the display order of a record */
	function orderMenu( $menutype, $inc ) {
	
		$menus	= $this->getMenus();
		if (empty($menus[$menutype]) ) {
			return false;
		}

		if ($menus[$menutype]->ordering == 0 && $inc < 0) return false;
		if ($menus[$menutype]->ordering >= count($menus) && $inc > 0) return false;

		$menus[$menutype]->ordering += $inc;		// move position up/down
	
		foreach( $menus as $type => $menu ) {		// swap position of previous entry at that position
			if( $type != $menutype
				&& $menu->ordering == $menus[$menutype]->ordering )
				$menus[$type]->ordering -= $inc;
		}

		$this->sortMenus( $menus );
		$this->setMenus( $menus );
	}


	function &getExcludedItems() {
		if (!$this->_excluded_items) {
			$this->_excluded_items = array();
			if (trim($this->excluded_items)) {
				$pairs = explode(';',$this->excluded_items);
				foreach ($pairs as $pair) {
					if ($pair) {
						list($itemid,$items) = explode(':',$pair);
						$this->_excluded_items[$itemid] = explode(',',$items);
					}
				}
			}
		}
		return $this->_excluded_items;
	}
	
	function isExcluded($itemid,$uid) {
		$this->getExcludedItems();
		if (!empty($this->_excluded_items[$itemid])) {
			$excluded_items = $this->_excluded_items[$itemid];
		} else {
			$excluded_items = NULL;
		}
		return ( $excluded_items && in_array($uid,$excluded_items));
	}

	function toggleItem($uid,$itemid) {
		if ( !$this->isExcluded($itemid,$uid) ) {
			$this->_excluded_items[$itemid][] = $uid;
			$state = 0;
		} else {
			if (is_array($this->_excluded_items[$itemid]) && count($this->_excluded_items[$itemid])) {
				$this->_excluded_items[$itemid] = array_filter($this->_excluded_items[$itemid],create_function('$var', 'return ($var != \''.$uid.'\');'));
			} else {
				unset($this->_excluded_items[$itemid]);
			}
			$state = 1;
		}

		$sep = $str = '';
		foreach ($this->_excluded_items as $itemid => $items) {
			$str .= $sep."$itemid:".implode(',',$items);
			$sep = ';';
		}
		$db = &JFactory::getDBO();
		$query = "UPDATE #__xmap_sitemap set excluded_items='".$db->getEscaped($str) ."' where id=". $this->id;
		$db->setQuery($query);
		$db->query();
		return $state;
	}

	/** uasort function that compares element ordering */
	function sort_ordering( &$a, &$b) {
		if( $a->ordering == $b->ordering) {
			return 0;
		}
		return $a->ordering < $b->ordering ? -1 : 1;
	}

	/** make menu ordering continuous*/
	function sortMenus( &$menus ) {
		uasort( $menus, array('XmapSitemap','sort_ordering') );
		$i = 0;
		foreach( $menus as $key => $menu)
			$menus[$key]->ordering = $i++;
	}
}