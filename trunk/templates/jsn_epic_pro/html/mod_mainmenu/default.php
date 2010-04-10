<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

if ( ! defined('modMainMenuXMLCallbackDefined') ) {
	function modMainMenuXMLCallback(&$node, $args)
	{
		$user	= &JFactory::getUser();
		$menu	= &JSite::getMenu();
		$active	= $menu->getActive();
		$path	= isset($active) ? array_reverse($active->tree) : null;
		$class_array = array();

		if (($args['end']) && ($node->attributes('level') >= $args['end']))
		{
			$children = $node->children();
			foreach ($node->children() as $child)
			{
				if ($child->name() == 'ul') {
					$node->removeChild($child);
				}
			}
		}

		if ($node->name() == 'ul') {
			foreach ($node->children() as $child)
			{
				if ($child->attributes('access') > $user->get('aid', 0)) {
					$node->removeChild($child);
				}
			}
			
			$subitems_count = count($node->children());
			$subitem_index = 0;
			foreach ($node->children() as $child) {
				if ($subitem_index == 0) $child->addAttribute('first', 1);
				if ($subitem_index == $subitems_count - 1) $child->addAttribute('last', 1);
				$subitem_index++;
			}
		}

		// Process parent item
		if (($node->name() == 'li') && isset($node->ul)) {
			$class_array[] = 'parent';
		}

		// Process active item
		if (isset($path) && in_array($node->attributes('id'), $path))
		{
			$class_array[] = 'active';
		}
		else
		{
			if (isset($args['children']) && !$args['children'])
			{
				$children = $node->children();
				foreach ($node->children() as $child)
				{
					if ($child->name() == 'ul') {
						$node->removeChild($child);
					}
				}
			}
		}

		// Process regular item
		if (($node->name() == 'li') && ($id = $node->attributes('id'))) {
			$item = $menu->getItem($node->attributes('id'));
			$class_array[] = 'item'.$id;
			$class_array[] = 'order'.$item->ordering;
			if ($node->attributes('first')) $class_array[] = 'first';
			if ($node->attributes('last')) $class_array[] = 'last';
			
			if (isset($path) && $node->attributes('id') == $path[0]) {
				$class_array[] = 'current';
				$node->a[0]->addAttribute('class', 'current');
			}
		}

		// Setup class
		if($node->name() == 'li') {
			$item_class = implode(" ", $class_array);
			$node->addAttribute('class', $item_class);
		}
		
		// Clear attributes
		$node->removeAttribute('id');
		$node->removeAttribute('level');
		$node->removeAttribute('access');
		$node->removeAttribute('first');
		$node->removeAttribute('last');
	}
	define('modMainMenuXMLCallbackDefined', true);
}

modMainMenuHelper::render($params, 'modMainMenuXMLCallback');
