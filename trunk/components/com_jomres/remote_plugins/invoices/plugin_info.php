<?php
class plugin_info_invoices
	{
	function plugin_info_invoices()
		{
		$this->data=array(
			"name"=>"invoices",
			"version"=>"2",
			"description"=> "<b>BETA PLUGIN</b> Internal plugin. Provides backend invoicing framework. Creates three new buttons 'Invoices', 'Tax Rates' and 'Paypal settings.'v1.3 adds support for payment of commission online. v1.4 adds subscription_id col to invoices table, adds option in paypal settings to override gateways for all properties with backend paypal settings (means site manager gets all deposit payments). 1.5 Fixed bug where if Override set to Yes, then bookings were not being validated and therefore not saved. 1.6 added admin email if paypal settings are overridden. 1.7 Fixed 00001 includer so that xx-XX is called if jomrsConfig_lang file doesn't exist. 1.8 Finished prototype of invoices for bookings. 1.9 Modified paypal settings to resolve issues with recent paypal changes in their submit_url. v2 Added curl handling to paypal verification stage of gateway handling.",
			"lastupdate"=>"2008/11/21"
			);
		}
		

	}
?>