<?php 
defined ('_JEXEC') or die ('Restricted Access');
class TOOLBAR_reviews {
			function _NEW() {
					JToolBarHelper::save();
					JToolBarHelper::apply();
					JToolBarHelper::cancel();
			}			
			function _DEFAULT() {
					JToolBarHelper::title(JTEXT::_('Airlines Details'), 'generic.png');
					JToolBarHelper::publishList();
					JToolBarHelper::unpublishList();
					JToolBarHelper::editList();
					JToolBarHelper::deleteList();
					JToolBarHelper::addNew();
			}
			function _NONE() {}
}
?>