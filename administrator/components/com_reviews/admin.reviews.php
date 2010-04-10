<?php 
defined ('_JEXEC') or die ('Restricted Access');
require_once (JApplicationHelper::getPath('admin_html'));
JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');
switch ($task) {
 			 case 'edit':
			 case 'add':
			 			editReview($option);
						break;
			 case 'apply':
			 case 'save':
			 			saveReview($option, $task);
						break;
			 case 'remove':
			 			removeReviews($option);
						break;
			 case 'view':
			 			viewSchedule($option);
						break;
			 case 'book':
			 			viewBooking(); 
						break;
			 case 'month':
			 			viewMonth();
						break;
			 default:
			 			showReviews($option);
						break;
}
function editReview($option) {
				 $row =& JTable::getInstance('review', 'Table');
				 $cid = JRequest::getVar('cid', array(0), '', 'array');
				 $id = $cid[0];
				 $row->load($id);
				 $lists = array();
				 $class = array ('0'=>array('value'=>'Economy', 'text'=>'Economy'), '1'=>array('value'=>'Business', 'text'=>'Business'));
				 $lists['class'] = JHTML::_('select.genericList', $class, 'class', 'class="inputbox" ' . '', 'value', 'text', $row->class);
				 HTML_reviews::editReview($row, $lists, $option);
}
function saveReview ($option, $task) {
	global $mainframe;
	$row =& JTable::getInstance('review', 'Table');	
	
	if (!$row->bind(JRequest::get('post'))) {
?>
		 <script language="JavaScript" type="text/javascript">
		 alert('<?php echo $option; ?>');
		 window.history.go(-1); 
		 </script>

<?php 
		 exit();
	}
	if (!$row->store()) {
?>
		 <script language="JavaScript" type="text/javascript">
		 alert('<?php echo $option; ?>');
		 window.history.go(-1); 
		 </script>
<?php		 
		 exit();
	}
	switch ($task) {
		case 'apply':
				 $msg = 'Changes to Airlines Details saved';
				 $link = 'index.php?option=' . $option . '&task=edit&cid[]=' . $row->id;
				 break;
		case 'save':
		default:
				 $msg = 'Airline Details Saved';
				 $link = 'index.php?option=' . $option;
				 break;
	}
	$mainframe->redirect($link, $msg);	
}

function showReviews($option) {
	global $option, $mainframe;
  	$limit = JRequest::getVar('limit', $mainframe->getCfg('list_limit'));
  	$limitstart = JRequest::getVar('limitstart', 0);
	$db =& JFactory::getDBO();
	$query = "SELECT count(*) FROM #__airlines";
  	$db->setQuery( $query );
  	$total = $db->loadResult();
	$query = "SELECT * FROM #__airlines";
	$db->setQuery( $query, $limitstart, $limit );
	$rows = $db->loadObjectList();
	if ($db->getErrorNum()) {
		 echo $db->stderr();
		 return false;
	}
	jimport('joomla.html.pagination');
  	$pageNav = new JPagination($total, $limitstart, $limit);
  	HTML_reviews::showReviews( $option, $rows, $pageNav );
}

function removeReviews ($option) {
	global $mainframe;
	$cid = JRequest::getVar('cid', array(), '', 'array');
	$db =& JFactory::getDBO();
	if (count($cid)) {
		 $cids = implode(',', $cid);
		 $query = "DELETE FROM #__airlines WHERE id IN ($cids)";
		 $db->setQuery($query);
		 if (!$db->query()) {
		 		echo "<script>alert('" . $db->getErrorMsg . "'); window.history.go(-1); </script>\n";
		 }
	}
	$mainframe->redirect('index.php?option=' . $option);
}

function viewSchedule($option) {
    $row =& JTable::getInstance('review', 'Table');
	$cid = JRequest::getVar('cid', array(0), '', 'array');
	$id = $cid[0];
	$row->load($id);
	//$lists = array();
	//$class = array ('0'=>array('value'=>'Economy', 'text'=>'Economy'), '1'=>array('value'=>'Business', 'text'=>'Business'));
	//$lists['class'] = JHTML::_('select.genericList', $class, 'class', 'class="inputbox" ' . '', 'value', 'text', $row->class);
	HTML_reviews::showSchedule($row, $option); 
}

function viewBooking() {	
	$flight = JRequest::getVar('flight');
    HTML_reviews::showBooking($flight);
}

function viewMonth() {
	$flight = JRequest::getVar('flight');
	HTML_reviews::showMonth($flight);
}
?>