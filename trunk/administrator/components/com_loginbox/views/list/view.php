<?php
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.view');

class JopaList extends JObject {
      var $piska = null;
      var $jopa = null;
    
}

class LoginBoxViewList extends JView {
   function display($tpl = null) {
      JToolBarHelper::title('Manage LoginButtons');

      JToolBarHelper::addNew();
      JToolBarHelper::editList();
      JToolBarHelper::deleteList();     

      JToolBarHelper::spacer(40);
      
      JToolBarHelper::preferences('com_loginbox', 450, 670);
     
      $model = $this->getModel('loginbutton');
     
      $items = $model->getList();
         
      $this->assignRef('items', $items);
     // exit;
     /*
      $orderer = $model->getOrderer();
      $this->assignRef('orderer', $orderer);
      
      $filter = $model->getFilter();
      $this->assignRef('filter', $filter);

      $contests = $model->getContests();
      $this->assignRef('contests', $contests);
*/
     // 

      
      $total = $model->getTotalCount();
      
		jimport('joomla.html.pagination');
		$pgdat = $model->getPaginatorData();
		$paginator = new JPagination($total, $pgdat['start'], $pgdat['limit']);
      $this->assignRef('paginator', $paginator);
      parent::display($tpl);
     /* */
   }
}
?>
