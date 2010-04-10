<?php
if (!defined('JOMRES_INSTALLER')) exit;

require_once(JOMRESPATH_BASE.'/remote_plugins/pseudocron/cron.class.php');
$cron = new jomres_cron($displayLog);
$cron->addJob("invoice","M","");

$query = "CREATE TABLE IF NOT EXISTS `#__jomresportal_invoices_transactions` (
  id int(10) NOT NULL auto_increment,
  invoice_id int(10) NOT NULL default '0',
  transaction_id int(10) NOT NULL default '0',
  time_added datetime NOT NULL,
  gateway_id varchar(20) NOT NULL default '',
  payment_result text NOT NULL,
  payment_currency varchar(20) NOT NULL default '',
  payment_amount float NOT NULL default '0',
  payment_fees float NOT NULL default '0',
  payment_ref varchar(100) NOT NULL default '',
  notes text NOT NULL,
  PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query="CREATE TABLE IF NOT EXISTS `#__jomresportal_orphan_lineitems` (
  `id` int(11) NOT NULL auto_increment,
  `cms_user_id` int(11) NOT NULL default '0',
  `name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `init_price` float NOT NULL default '0',
  `init_qty` int(11) NOT NULL default '0',
  `init_discount` float NOT NULL default '0',
  `recur_price` float NOT NULL default '0',
  `recur_qty` int(11) NOT NULL default '0',
  `recur_discount` float NOT NULL default '0',
  `tax_code_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
)";
doInsertSql($query,"");

$query="CREATE TABLE IF NOT EXISTS `#__jomresportal_lineitems` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `init_price` float NOT NULL default '0',
  `init_qty` int(11) NOT NULL default '0',
  `init_discount` float NOT NULL default '0',
  `init_total` float NOT NULL default '0',
  `recur_price` float NOT NULL default '0',
  `recur_qty` int(11) NOT NULL default '0',
  `recur_discount` float NOT NULL default '0',
  `recur_total` float NOT NULL default '0',
  `tax_code` char(10) NOT NULL,
  `tax_description` char(200) NOT NULL,
  `tax_rate` float NOT NULL default '0',
  `inv_id` int(11) NOT NULL COMMENT 'Invoice ID',
  PRIMARY KEY  (`id`)
)";
doInsertSql($query,"");

$query="CREATE TABLE IF NOT EXISTS `#__jomresportal_invoices` (
  `id` int(11) NOT NULL auto_increment,
  `cms_user_id` int(11) NOT NULL default '0',
  `status` tinyint(4) NOT NULL default '0',
  `raised_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `paid` datetime NOT NULL,
  `subscription` tinyint(1) NOT NULL default '0',
  `init_total` float NOT NULL default '0',
  `recur_total` float NOT NULL default '0',
  `recur_frequency` tinyint(4) NOT NULL default '0',
  `recur_dayofmonth` tinyint(4) NOT NULL default '1',
  `currencycode` char(3) NOT NULL,
  `subscription_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
)";
doInsertSql($query,"");

$query="CREATE TABLE IF NOT EXISTS `#__jomresportal_taxrates` (
  `id` int(11) NOT NULL auto_increment,
  `code` char(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rate` float NOT NULL default '0',
  PRIMARY KEY  (`id`)
)";
doInsertSql($query,"");

$query="INSERT INTO `#__jomresportal_taxrates` (`id`, `code`, `description`, `rate`) VALUES (1, '01', 'VAT', 17.5)";
doInsertSql($query,"");

if (!checkInvoiceSubscriptionIDColExists())
	alterInvoiceSubscriptionIDCol();
if (!checkInvoiceContractsIDColExists())
	alterInvoiceContractsIDCol();
	
function checkInvoiceSubscriptionIDColExists()
	{
	$query="SHOW COLUMNS FROM #__jomresportal_invoices LIKE 'subscription_id'";
	$result=doSelectSql($query);
	if (count($result)>0)
		{
		return true;
		}
	return false;
	}

function alterInvoiceSubscriptionIDCol()
	{
	echo "Editing __jomresportal_invoices table adding apikey column<br>";
	$query = "ALTER TABLE `#__jomresportal_invoices` ADD `subscription_id` int(11) NOT NULL ";
	if (!doInsertSql($query,'') )
		echo "<b>Error, unable to add __jomresportal_invoices subscription_id</b><br>";
	}

function checkInvoiceContractsIDColExists()
	{
	$query="SHOW COLUMNS FROM #__jomresportal_invoices LIKE 'contract_id'";
	$result=doSelectSql($query);
	if (count($result)>0)
		{
		return true;
		}
	return false;
	}

function alterInvoiceContractsIDCol()
	{
	echo "Editing __jomresportal_invoices table adding contract_id column<br>";
	$query = "ALTER TABLE `#__jomresportal_invoices` ADD `contract_id` int(11) NOT NULL ";
	if (!doInsertSql($query,'') )
		echo "<b>Error, unable to add __jomresportal_invoices contract_id</b><br>";
	}
	
?>