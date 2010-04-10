<?php
/**
#
 * Language file: English
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
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
global $jomresConfig_live_site,$jrConfig;

/**
* @ignore
*/
define('_JRPORTAL_INVOICES_ISSUE',"Rechnungen erstellen");

/**
* @ignore
*/
define('_JRPORTAL_TAXRATES_TITLE',"MwSt Raten");
/**
* @ignore
*/
define('_JRPORTAL_TAXRATES_CODE',"Steuersatz");
/**
* @ignore
*/
define('_JRPORTAL_TAXRATES_DESCRIPTION',"Ratenbeschreibung");
/**
* @ignore
*/
define('_JRPORTAL_TAXRATES_CANNOTDELETE',"Sie k&ouml;nnen diesem Steuersatz nicht l&ouml;schen.");
/**
* @ignore
*/
define('_JRPORTAL_TAXRATES_RATE',"Rate");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_TITLE',"Rechungen");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_STATUS_UNPAID',"Unbezahlte");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_STATUS_PAID',"Bezahlt");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_STATUS_CANCELLED',"Storniert");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_STATUS_PENDING',"Ausstehend");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_USER',"Benutzer");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_STATUS',"Status");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_RAISED',"Erstellt");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_DUE',"F&auml;llig");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_SUBSCRIPTION',"Abonnement");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_INITTOTAL',"Gesamtbeitrag");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_RECUR_TOTAL',"wiederkehrende Zahlungen");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_RECUR_FREQUENCY',"wiederkehrende Zeitrau");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_RECUR_DOMONTH',"Wiederkehrende Tag des Monats");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_CURRENCYCODE',"W&auml;hrungscode");

/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS',"Line items");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_NAME',"Name");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_DESCRIPTION',"Beschreibung");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_INIT_PRICE',"Ausgangspreis");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_INIT_QTY',"Ausgangsanzahl");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_INIT_DISCOUNT',"Nachlass f&uuml;r Erstauftr&auml;ge");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_INIT_TOTAL',"Gesamtbetrag");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_RECUR_PRICE',"wiederkehrender Preis");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_RECUR_QTY',"wiederkehrender Anzahl");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_RECUR_DISCOUNT',"wiederkehrender Rabatt");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_RECUR_TOTAL',"wiederkehrender Gesamtbetrag");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_TAX_CODE',"Steuercode");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_TAX_DESCRIPTION',"Steuerbeschreibung");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_LINEITEMS_TAX_RATE',"Steuersatz");

/**
* @ignore
*/
define('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_TITLE',"Paypal");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_CURRENCYCODE',"W&auml;hrungscode (eg EUR)");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_USESANDBOX',"Sandbox benutzten?");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_PAYPALEMAIL',"Deine paypal email adresse");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_NOTES',"Note: Bei Verwendung von PayPal m&uuml;ssen Sie in Ihrem PayPal-Konto das Autoreturn deaktivieren (Profile/Website Payment Preferences), und die IPN (Profile/Instant Payment Notification Preferences)zur der URL of:<br/><b>&nbsp;".$jomresConfig_live_site."/index.php?option=com_jomres&task=ospayment&Itemid=".$jrConfig['jomresItemid']."&no_html=1");

/**
* @ignore
*/
define('_JRPORTAL_INVOICES_IMMEDIATEPAYMENT_PLEASEPAY',"Diese Rechnung f&auml;llig. Bitte klicken Sie auf den Button, um nach PayPal weitergeleitet zu werden.");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_OVERRIDE',"Jomres Standard-Gateway-Einstellungen &uuml;berschreiben?");
/**
* @ignore
*/
define('_JRPORTAL_INVOICES_PAYPAL_SETTINGS_OVERRIDE_DESC',"Wenn die Einstellungen paypal Option auf Yes gesetzt wurde dann sind folgende Einstellungen g&uuml;ltig: Die allgemeine Konfiguration in der Gateway-Einstellungen wird nicht mehr angezeigt und wenn eine Buchung erfolgt wird die Paypal email verwendet die Sie eingetragen haben in der allgemeinen Konfiguration.");

?>
