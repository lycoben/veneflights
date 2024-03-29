<?php
/**
#
 * Mini-component core file:
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
* @subpackage mini-components
#
* @copyright	2005-2008 Vince Wooll
#
* This is not free software, please do not distribute it. For licencing information, please visit http://www.jomres.net/
* All rights reserved.
 */

// ################################################################
if (!defined('JPATH_BASE'))
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
else
	{
	if (file_exists(JPATH_BASE .'/includes/defines.php') )
		defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
	else
		defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	}
// ################################################################

class j00013list_usersinvoices
	{
	function j00013list_usersinvoices()
		{
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $ePointFilepath,$jomresConfig_live_site,$thisJRUser;
		$infoIcon	='<IMG SRC="'.$jomresConfig_live_site.'/components/com_jomres/images/SymbolInformation.jpg" border="0" alt="info">';
		$status= jomresGetParam( $_REQUEST, 'status', "" );
		$id= $thisJRUser->id;

		if ($thisJRUser->userIsRegistered)
			{
			switch ($status)
				{
				case "unpaid":
					$stat=0;
				break;
				case "paid":
					$stat=1;
				break;
				case "cancelled":
					$stat=2;
				break;
				case "pending":
					$stat=3;
				break;
				}

			$invoices=invoices_getinvoicesfor_juser($id,$stat);
		//var_dump($invoices);exit;
			if (count($invoices)>0)
				{
				$output=array();
				$pageoutput=array();
				$rows=array();
				
				$output['PAGETITLE']=_JRPORTAL_INVOICES_TITLE;
				$output['HUSER']=_JRPORTAL_INVOICES_USER;
				$output['HSTATUS']=_JRPORTAL_INVOICES_STATUS;
				$output['HRAISED']=_JRPORTAL_INVOICES_RAISED;
				$output['HDUE']=_JRPORTAL_INVOICES_DUE;
				$output['HPAID']=_JRPORTAL_INVOICES_STATUS_PAID;
				$output['HSUBSCRIPTION']=_JRPORTAL_INVOICES_SUBSCRIPTION;
				$output['HINITTOTAL']=_JRPORTAL_INVOICES_INITTOTAL;
				$output['HRECURTOTAL']=_JRPORTAL_INVOICES_RECUR_TOTAL;
				$output['HFREQ']=_JRPORTAL_INVOICES_RECUR_FREQUENCY;
				$output['HDOM']=_JRPORTAL_INVOICES_RECUR_DOMONTH;
				$output['HCURRENCYCODE']=_JRPORTAL_INVOICES_CURRENCYCODE;

				$output['TASK_FILTER_ANY']='<a href="index.php?option=com_jomres&task=list_usersinvoices">'._JOMRES_FRONT_ROOMSMOKING_EITHER.'</a>';
				$output['TASK_FILTER_UNPAID']='<a href="index.php?option=com_jomres&task=list_usersinvoices&status=unpaid">'._JRPORTAL_INVOICES_STATUS_UNPAID.'</a>';
				$output['TASK_FILTER_PAID']='<a href="index.php?option=com_jomres&task=list_usersinvoices&status=paid">'._JRPORTAL_INVOICES_STATUS_PAID.'</a>';
				$output['TASK_FILTER_CANCELLED']='<a href="index.php?option=com_jomres&task=list_usersinvoices&status=cancelled">'._JRPORTAL_INVOICES_STATUS_CANCELLED.'</a>';
				$output['TASK_FILTER_PENDING']='<a href="index.php?option=com_jomres&task=list_usersinvoices&status=pending">'._JRPORTAL_INVOICES_STATUS_PENDING.'</a>';

				foreach ($invoices as $invoice)
					{
					$r=array();
					$r['ID']=$invoice['id'];
					
					$user_obj = new jrportal_user_functions();
					$user_deets=$user_obj->getJoomlaUserDetailsForJoomlaId($invoice['cms_user_id']);
					$r['USER']=$user_deets['name'];
					if ($invoice['status'] == "0")
						$r['STATUS']=_JRPORTAL_INVOICES_STATUS_UNPAID;
					elseif ($invoice['status'] == "1")
						$r['STATUS']=_JRPORTAL_INVOICES_STATUS_PAID;
						elseif ($invoice['status'] == "2")
							$r['STATUS']=_JRPORTAL_INVOICES_STATUS_CANCELLED;
							else
								$r['STATUS']=_JRPORTAL_INVOICES_STATUS_PENDING;
					$r['RAISED']=$invoice['raised_date'];
					$r['DUE']=$invoice['due_date'];
					$r['PAID']=$invoice['paid'];
					if ($invoice['subscription'] == "1")
						$r['SUBSCRIPTION']=_JOMRES_COM_MR_YES;
					else
						$r['SUBSCRIPTION']=_JOMRES_COM_MR_NO;
					$r['INITTOTAL']		=$invoice['init_total'];
					$r['RECURTOTAL']	=$invoice['recur_total'];
					$r['FREQ']			=$invoice['recur_frequency'];
					$r['CURRENCYCODE']	=$invoice['currencycode'];
					if ($invoice['subscription'] == "0" && $invoice['status'] != "1")
						$r['PAYNOW']='<a href="index.php?option=com_jomres&task=immediatepay&id='.$invoice['id'].'"><img src = "components/com_jomres/remote_plugins/invoices/btn_paynow_SM.gif" /></a>';
					$r['EDITLINK']='<a href="index.php?option=com_jomres&task=view_invoice&id='.$invoice['id'].'">'.$infoIcon.'</a>';
					$rows[]=$r;
					}

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath."/templates" );
				$tmpl->readTemplatesFromInput( 'frontend_list_invoices.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->addRows( 'rows',$rows);
				$tmpl->displayParsedTemplate();
				}
			}
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}