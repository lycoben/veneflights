<?php
/**
#
 * Language file: Portuguese
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

/**
* @ignore
*/
define('_JOMRES_COM_MR_MRARRIVEDESC','Chegadas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_MRDEPARTDESC','Partidas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_MRBOOKENQSDESC','Pedidos de reserva');
/**
* @ignore
*/
define('_JOMRES_COM_MR_MROTHERENQSDESC','Outros pedidos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRESDESC','Reserva rápida');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTLIVEBOOKINGS','Reservas reais');
/**
* @ignore
*/
define('_JOMRES_COM_MR_SHOWPROFILES','Perfis');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LANG_DESC','Linguas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICK______DESC','Deixado em branco intencionalmente');
/**
* @ignore
*/
define('_JOMRES_COM_MR_GENERALCONFIGDESC','Configuraçăo geral');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISCOUNTDESC','Configuraçăo de descontos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOMSCONFIGDESC','Configuraçăo de apartamentos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTYCONFIGDESC','Configuraçăo da propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_RATESCONFIGDESC','Configuraçăo de preços');
/**
* @ignore
*/
define('_JOMRES_COM_MR_BACK','Voltar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_BACK_LIVEBOOKINGS','Voltar para reservas Mos Residents');
/**
* @ignore
*/
define('_JOMRES_COM_MR_CONFIG','Configuraçăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LOADSAMPLEDESC','Carregar dados para exemplo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_YES','Sim');
/**
* @ignore
*/
define('_JOMRES_COM_MR_NO','Năo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_NEWTARIFF','Novo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_NEWROOM','Novo quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_NEWROOMFEATURE','Nova característica quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_NEWROOMCLASS','Novo tipo de quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_NEWPROPERTY','Nova propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_NEWPROPERTYFEATURE','Nova característica da propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_NEWGUEST','Novo cliente');
/**
* @ignore
*/
define('_JOMRES_COM_MR_SAVE','Guardar');

// View bookings
/**
* @ignore
*/
define('_JOMRES_COM_MR_VIEWBOOKINGS_SURNAME','Nome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL','Data de chegada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE','Data de partida');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VIEWBOOKINGS_BLANK','em branco');

/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_TITLE','Designar funçőes de administrador');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_ID','ID');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_NAME','Nome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_USERNAME','Nome de utilizador');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDHOTELUSER','Autorizado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDDEFAULTHOTEL','Propriedade por defeito');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDCHANGETHIS','Alterar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDACCESSLEVEL','Nivel de acesso');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_USERMODIFIEDMESAGE','Utilizador modificado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_NOTAPPLICABLE','N/A');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_CHANGEHOTEL','Mudar propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_CHANGEACCESSLEVEL','Mudar nivel de acesso');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_LEVEL_RECEPTION','Recepçăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_LEVEL_ADMIN','Gerente da propriedade');

// Edit bookings
/**
* @ignore
*/
define('_JOMRES_COM_MR_EDITBOOKING_ADMIN_TITLE','Todas as reservas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EDITBOOKING_ADMIN_NEWBOOKINGS','Novas reservas (Por pagar)');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EDITBOOKINGTITLE','Editar reservas para ');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EDITBOOKING_TAB_ARRIVAL','Chegada/Partida');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EDITBOOKING_TAB_GUEST','Cliente');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EDITBOOKING_TAB_ROOM','Quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EDITBOOKING_TAB_PAYMENT','Pagamento');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ARRIVALFIRSTNAME_EXPL','Nome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ARRIVALSURNAME_EXPL','Sobrenome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ARRIVALBUTTON_EXPL','Cliente esperado hoje. Clique neste botăo se chegou.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGNOTES','Notas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGSPECIALREQ','Pedidos especiais');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGSPECIALREQ_DISCLAIMER','Note que pedidos especiais poderăo ter preço acrescido');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGADULTS','Número de adultos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGCHILDREN','Número de crianças');

/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_CANCELBOOKING','Cancelar reserva');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_USER_EXPL','Website userid');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_HOUSE_EXPL','Número ou nome da casa');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_STREET_EXPL','Rua');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_TOWN_EXPL','Cidade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_POSTCODE_EXPL','Código Postal');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_LANDLINE_EXPL','Telefone');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_MOBILE_EXPL','Telemóvel');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_FAX_EXPL','Fax');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_EMAIL_EXPL','Email');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_PREFERENCES_EXPL','Preferencias');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_MOSRES_CAR_REGNO_EXPL','Matricula do carro');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_REASON_CUSTOMERCANCELLED','Cliente cancelou');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_REASON_HOTELCANCELLED','Hotel cancelado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_REASON_BUTTON','Seleccione razăo para cancelar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_REASON_CHARGES_DIFFERENCE','dias para chegar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_REASON_CHARGES_DUE','<b>Penalizaçăo por cancelar</b>');

/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_CANCELLATION_ALREADYBOOKEDIN','Năo pode cancelar esta reserva. O cliente já deu entrada.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_GREATERTHAN_30_DAYS_DEPOSITPAID','Cauçăo paga');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_GREATERTHAN_30_DAYS_DEPOSITNOTPAID','Cauçăo em dívida');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_LESSTHAN_30_DAYS_DEPOSITPAID','Cauçăo paga, 50% do total em dívida');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_LESSTHAN_30_DAYS_DEPOSITNOTPAID','Cauçăo em dívida, 50% do total em dívida');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_LESSTHAN_15_DAYS_DEPOSITPAID','Cauçăo paga, 100% ');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_LESSTHAN_15_DAYS_DEPOSITNOTPAID','Cauçăo em dívida, 100%');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_REMAINDERDUE','Lembrar dívida');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_CANCELLATION_NODEPOSIT','Cancelar reserva');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_CANCELLATION_BUTTON','Confirmar o cancelamento da reserva');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_GUEST_CANCELLED','Reserva cancelada');

/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_EXPL','Tipo de reserva');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_BLACK','Preta');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_RECEPTION','Balcăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_INTERNET','Internet');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_NAME','Nome do quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_NUMBER','Número do quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_FLOOR','Andar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_DISABLED','Desligar acesso disponivel?');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_MAXPEOPLE','Max pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV','Tipo de quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_CLASS_DESC','Descriçăo do tipo de quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_FEATURES_LIST','Características do quarto');

/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_CURRENCY','&euro;');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_CURRENCY_ALT','');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_RULES','Taxas regras');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_DEPOSIT_PAID','Pagamento efectuado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_DEPOSIT_PAID_UPDATE','Introduzir pagamento');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL','Total a pagar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_DEPOSIT_REF','Referęncia da cauçăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_PAYMENT_REF','Referęncia de pagamento');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_BOOKINGNUMBER','Número de reserva');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED','Cauçăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_PAYM_DEPOSITSAVEMESSAGE','Cauçăo gravada');

// Edit Language
/**
* @ignore
*/
define('_JOMRES_COM_MR_LANG_CHMODWARNING','<center><h1><font color=red>Aviso...</FONT></h1><BR><B>Tem de alterar as permissőes dos ficheiros das línguas para 766 para poder ser alterado</B></center><BR><BR>');/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_TITLE','Reserva rápida seleccione tipo de apartamentos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_CHECKBOX','Checkbox');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_NUMBERADULTS','Número de adultos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_NUMBERCHILDREN','Número de crianças');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_COTREQUIRED','Cot required?');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_Em alternativa','Em alternativa');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_DAYSDATE_DESC','Introduza o número de noites, ou a data de partida');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_NUMBEROFDAYS','Número de noites');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_INSTRUCTIONS','Seleccione o tipo de quarto pretendido, the arrival date of the guest and either the Numero de noites the guest is staying or their departure date. Finally, enter the Numero de adultos & children in the contingent.');

/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_TITLE','Apartamentos Disponiveis');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_RADIO','&nbsp;');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMNAME','Nome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMNUMBER','Nş');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMFLOOR','Andar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_DISABLEDACCESS','Desactivar accesso?');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_MAXPEOPLE','Max pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_FEATURES','Detalhes');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_PROPERTYNAME','Propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMTYPE','Tipo de Quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_TOOMANYGUESTS','Desculpe, mas os apartamentos disponiveis năo poderăo ter esse número de pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_NOROOMSINRANGE','<font color="red" face="arial" size="3">Desculpe, năo é possivel efectuar a reserva para este periodo. Por favor escolha outra data.</font>');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_SELECTCUSTOMERS','por favor seleccione a lista');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_SELECTGUEST','Seleccione este cliente');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_SELECTDESCRIPTION','Descriçăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_SELECTCUSTOMERLISTTITLE','lista de Clientes');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ERROR_STAYDAYSTOOLOW','<font color="red" face="arial" size="4">ERRO: Houve um erro na escolha das datas<br>seleccione o botăo para voltar & coloque uma nova data</font>');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ERROR_NOGUESTS','<font color="red" face="arial" size="4">ERRO: Precisa de pelo menos um convidadeo para poder reservar.<br>seleccione o botăo para voltar & coloque uma nova data</font>');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ERROR_ARRIVALDATENOTSELECTED','<font color="red" face="arial" size="4">ERRO: As escalas da data estăo incorrectas.<br>seleccione o botăo para voltar & coloque uma nova data</font>');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ERROR_NOROOMTYPESSELECTED','<font color="red" face="arial" size="4">ERRO: Năo selecionou qualquer tipo de apartamentos.<br>seleccione o botăo para voltar & coloque uma nova data</font>');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ERROR_POSTDATED','<font color="red" face="arial" size="4">ERRO: Data da reserva já passou ou é hoje.<br>seleccione o botăo para voltar & coloque uma nova data</font>');

// Display guest form
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_ENTERDETAILS','Introduzir dados do cliente');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_CHECKDETAILS','Confirmar dados do cliente');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_EDITDETAILS','Editar dados do cliente');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_FIRSTNAME','Nome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_SURNAME','Sobrenome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_HOUSE','Nş');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_STREET','Rua');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_TOWN','Localidade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_POSTCODE','Código Postal');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_LANDLINE','Telefone');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_MOBILE','Telemóvel');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_FAX','Fax');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_EMAIL','Email');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_CARREGNO','Número de registo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_CCARDNO','Nş Cartăo de crédito');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_CCARDISS','Cartăo emitido em');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_CCARDEXPIRE','Cartăo expira em');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_CCARISSNO','Número de emissăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_CCARDNAME','Nome no cartăo');

/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_TITLE','Seleccione um apartamento');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_RADIO','Seleccione');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_TARIFF','Preço');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_TARIFFDESC','Descriçăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_MINDAYS','Min dias');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_MAXDAYS','Max dias');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_MINPEOPLE','Min pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_MAXPEOPLE','Max pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_STAYDAYS','dias que fica');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_ROOMRATEPERDAY','Preço diário');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_NUMBEROFGUESTS','Número de pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_TOTALINVOICE','Total');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_DEPOSITDESC','Cauçăo');/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_FALLSONPUBLICHOLIDAY',"<b>At least one</b> of the dias selected falls on a public holiday. Please note, that if you wish to book a room and one of the dates falls on a public holiday then the hotel is obliged request that you stay for a minimum of 3 nights over this period.");

/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_NOTARIFFS','Sorry, no tariffs were found that fit the criteria specified. Do not despair however, it may well be that we need to tweak your requirements slightly. Please try again, modifying the number of dias you wish to stay, or Em alternativa ring the hotel and book a room over the phone.');

// Rooms tab

/**
* @ignore
*/
define('_JOMRES_COM_MR_VIEWROOMSPROPERTYCONFIG_TITLE','Ver configuraçőes apartamentos/propriedade');

/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_TAB_ROOM','Apartamentos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_TAB_ROOMFEATURES','Caracteristicas apartamentos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_TAB_ROOMTYPES','Tipos de apartamentos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_TAB_PROPERTYS','Propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_TAB_PROPERTYFEATURES','Caracteristicas de propriedade');/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_LINK','Quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE','Tipo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_PROPERTY','Propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_CLASS','Tipo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME','Nome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER','Nş');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR','Andar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_DISABLEDACCESS','Desactivar acesso?');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE','Máximo pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES','Características');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_SAVE_INSERT','Quarto adicionado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_SAVE_UPDATE','Qaurto alterado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_CLICKTOEDIT','Clique no link do quarto para editá-lo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOM_LINKTEXT','Editar');

/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMFEATURES_HEADER_LINK','Características do quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMFEATURES_HEADER_INPUT','Descriçăo das características');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMFEATURES_CLICKTOEDIT','Clique no link das características do quarto para editá-lo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMFEATURES_SAVE_INSERT','Característica do quarto adicionada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMFEATURES_SAVE_UPDATE','Característica do quarto alterada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMFEATURES_LINKTEXT','Editar');/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMTYPES_HEADER_LINK','Tipo de quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMTYPES_HEADER_ABBV','Abreviaçăo de tipo de quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMTYPES_HEADER_DESC','Descriçăo do tipo de quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMTYPES_CLICKTOEDIT','Click the room class uid link to edit the item');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMTYPES_SAVE_INSERT','Tipo de quarto adicionado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMTYPES_SAVE_UPDATE','Tipo de quarto alterado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_ROOMTYPES_LINKTEXT','Editar');

/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_LINK','Propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_NAME','Nome');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET','Rua');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN','Cidade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION','Regiăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY','País');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE','Código postal');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE','Tel');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX','Fax');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL','Email');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_WEBSITE','Website');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FEATURES','Características');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_CLICKTOEDIT','Click the property uid link to edit the item');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_SAVE_INSERT','Propriedade adicionada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_SAVE_UPDATE','Propriedade actualizada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_LINKTEXT','Editar');

/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_LINK','Característica da propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV','Abreviaçăo da característica da propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC','Descriçăo completa das caracxterísticas da propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_CLICKTOEDIT','Clique no link das características da propriedade para editá-la');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_SAVE_INSERT','Característica da propriedade adicionada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_SAVE_UPDATE','Característica da propriedade actualizada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_LINKTEXT','Editar');/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_TITLE','Tarifa');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_RATETITLE','Título da Tarifa');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_RATEDESCRIPTION','Descriçăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_VALIDFROM','Válido de');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_VALIDTO','Validar para');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY','Taxa por noite');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_MINDAYS','Min dias');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_MAXDAYS','Max dias');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_MINPEOPLE','Min pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_MAXPEOPLE','Max pessoas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_ROOMCLASS','Tipo de quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_IGNOREPPN','Ignore PPPN');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_ALLOWPH','Permitir feriados');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_ALLOWWE','Permitir fins de semana');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_CLICKTOEDIT','Clique no link do editar texto para editar a tarifa');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_SAVE_INSERT','Tarifa adicionada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_SAVE_UPDATE','Tarifa actualizada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_LINKTEXT','Editar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE','Clonar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_DELETETARIFF','Apagar Tarifa');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_DELETED','Tarifa apagada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_TITLE_EDIT','Editar tarifa');

/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_TITLE','Feriado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_TITLE_HELP','O fim do período do feriado deverá ser a última noite que tenciona apresentar a conta ŕ taxa do feriado.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_TITLE_EDIT','Editar os fériados públicos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_DESCRIPTION','Descriçăo');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_START','Começar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_END','Acabar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_NEWPH','Novo feriado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_CLICKTOEDIT','Clique no link do editar texto para editar o feriado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_SAVE_INSERT','Feriado adicionado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_SAVE_UPDATED','Feriado actualizado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_LINKTEXT','Editar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_LINKTEXTCLONE','Clonar');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_DELETEPUBLICHOLIDAY','Apagar feriado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PUBLICHOLIDAY_DELETED','Feriado apagado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_BOOKINGSAVEDMESSAGE','Reserva guardada');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_JAVASCRIPTWARNING','Por favor confirme que o formulário é preenchido correctamente.');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_NOTREGISTERED1','Apenas utilizadores registados podem reservar online.');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_NOTREGISTERED2','Por favor registe');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_OFFLINE_MESSAGE','reservas offline');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_BOOKAROOM','Reservar');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_MYDETAILS','Os meus dados');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_MYBOOKINGS','As minhas reservas');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMINISTER','Administre');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_BOOKAROOM','Reserve um quarto');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_BOOKAGUESTIN','Registar entrada');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_BOOKAGUESTOUT','Registar saída');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_LISTBOOKINGS','Listar reservas');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_LISTNEWBOOKINGS','Listar NOVAS reservas');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_HOME','Dashboard');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_GUESTADMIN','Clientes');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN','Configuraçőes');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_TARIFFADMIN','Tarifário');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_DISCOUNT','Desconto admin');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_ADMIN_PUBLICHOLIDAYS','Feriados');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_QUICKRES_STEP1_INSTRUCTIONS','Por favor escolha o tipo de quarto que pretende, a sua data de chegada e o número de noites que pretende ficar. Por fim, insira o número de adultos e de criançasno contingente.');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_QUICKRES_STEP2_INSTRUCTIONS1','Por favor insira os seus dados. Só precisa de fazer isto uma vez, pois o sistema relembrar-se-a de si em futuras visitas');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_QUICKRES_STEP2_INSTRUCTIONS2','Por favor escolha o quarto que pretende.');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_QUICKRES_STEP3_INSTRUCTIONS2','Por favor insira os seus dados. Atençăo que todos os campos săo necessários com excepçăo do telemóvel.');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_SUBMITBUTTON_CHECKAVAILABILITY','Ver disponibilidade');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_SUBMITBUTTON_CHOOSEROOM','Quero este quarto');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_SUBMITBUTTON_CHOOSEGUEST','Seleccionar cliente');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_SUBMITBUTTON_CONFIRMYOURDETAILS','Confirmar os seus dados');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_SUBMITBUTTON_CHOOSETARIFF','Escolher o meu negócio');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_QUICKRES_STEP1_TITLE','Seleccione o tipo de apartamentos');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_DISPGUEST_FIRSTNAME','Primeiro nome');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_DISPGUEST_SURNAME','Sobrenome');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EB_GUEST_MOSRES_HOUSE_EXPL','Nş');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EB_GUEST_MOSRES_STREET_EXPL','Rua');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EB_GUEST_MOSRES_TOWN_EXPL','Cidade');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EB_GUEST_MOSRES_POSTCODE_EXPL','Código postal');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EB_GUEST_MOSRES_LANDLINE_EXPL','Telefone fixo');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EB_GUEST_MOSRES_MOBILE_EXPL','Telemóvel');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EB_GUEST_MOSRES_FAX_EXPL','Fax');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_QUICKRES_STEP2_NOROOMSINRANGE','Năo existem apartamentos disponíveis que satisfaçam os parâmetros especificados');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_DISPGUEST_ENTERDETAILS','Insira os seus dados');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_DISPGUEST_CHECKDETAILS','Confirme os seus dados');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKINGMADE','<center>Obrigado pela sua reserva. A recepçăo irá brevemente entrar em contacto consigo por telefone para confirmar o método de pagamento.<br><br> <b>Tenha em atençăo que se trata apenas de uma reserva preliminar, que só será válida após receber uma confirmaçăo nossa.</b><br></center>');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_SUBJECT_INTERNETBOOKINGMADE','reserva feita para a propriedade: ');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_ROOM','reserva feita para o quarto: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_ADULTS','Número de adultos: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_CHILDREN','Número de crianças: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_ARRIVAL','Chegada: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_DEPARTURE','Partida: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_NUMBEROFNIGHTS','Nş de noites: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_GUESTUID','cliente Uid: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_NAME','Nome: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_LANDLINE','Telefone fixo: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_MOBILE','Telemóvel: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_TARIFFUID','Tarifa: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_TOTAL','O valor do contracto é: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_EMAIL_TEXT_DEPOSIT','Depósito necessário: ');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_CUSTOMERDETAILSNOTSTORED','Desculpe, mas necessitamos que actualize os seus dados para que possamos proceder ŕ reserva. Por favor clique no link "Os meus dados" e preencha a sua morada. Obrigado.');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_CUSTOMERDETAILSSAVED','Obrigado, os seus dados foram gravados.');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_WELCOME_STRANGER','Bem vindo forasteiro. Antes de reservar, necessita de actualizar os seus dados no link "Os meus dados".');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_WELCOME_FRIEND','Bem vindo de volta ');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKIN_TITLE','Reserve em cliente ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKIN_SELECTBUTTON','Escolha cliente ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKIN_GUESTBOOKEDIN','Cliente reservou em ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKIN_NOGUESTSDUEIN','Nenhum cliente é suposto chegar hoje');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKOUT_TITLE','Cliente marque sua saída ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKOUT_GUESTBOOKEDOUT','Cliente marcou a sua saída ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKOUT_GUESTBOOKEDOUT_BUTTON','Confirme a sua saída cliente');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKOUT_NOGUESTSDUEOUT','Nenhum cliente é suposto partir hoje');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_STATUS_GUESTSARRIVE','Clientes para hoje');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_STATUS_GUESTSDEPART','Clientes que partem hoje');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_STATUS_ROOMSOCCUPIED','Apartamentos ocupados');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_STATUS_NEWBOOKINGS','Novas reservas');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_STATUS_NAVIGATETODATE','Ver os apartamentos ocupados desde:');

// Config panel
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS','Suplementos');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS','Tarifas');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS','Descontos');
/**
* @ignore
*/
define('_JOMRES_COM_A_CANCELLATION','Política de cancelamento.  NĂO IMPLEMENTADA');
/**
* @ignore
*/
define('_JOMRES_COM_A_JOMRES_FILE_UPLOADS','Ficheiros de upload');
/**
* @ignore
*/
define('_JOMRES_COM_A_CURRENT_SETTINGS','Definiçőes actuais');
/**
* @ignore
*/
define('_JOMRES_COM_A_EXPLANATION','Explicaçăo');

/**
* @ignore
*/
define('_JOMRES_COM_A_SB_BY','Copyright Vince Wooll 2005');

/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGS_OFFLINE','reservas offline?');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGS_OFFLINE_DESC','Faça as reservas offline se năo desejar fazer reservas.');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_AVAILABLE','Esquema de desconto disponível?');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_AVAILABLE_DESC','O esquema de descontos é para aqueles que desejam ofereçer ŕs pessoas descontos que dependem do número de clientes na festa. Devido a operar com base no número de pessoas presente na festa, năo é recomendável que o use se năo planeia cobrar no esquema noite por pessoa.');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_LEVEL1','Nível 1 inicial');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_LEVEL2','Nível 2 inicial');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_LEVEL3','Nível 3 inicial');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_LEVEL4','Nível 4 inicial');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_LEVEL1_VALUE','Valor de desconto para nível 1');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_LEVEL2_VALUE','Valor de desconto para nível 2');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_LEVEL3_VALUE','Valor de desconto para nível 3');
/**
* @ignore
*/
define('_JOMRES_COM_A_DISCOUNTS_LEVEL4_VALUE','Valor de desconto para nível 4');
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON','Single person suppliments');
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON_DESC','Make sure this is set to Yes if you want to charge single person suppliments');
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON_COST','Single person suppliment charge');
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS_COT','Cot suppliments.');
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS_COT_DESC','Make sure this is set to Yes if you want to charge charge for supplying a cot');
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS_COT_COST','Cot suppliment charge');
/**
* @ignore
*/
define('_JOMRES_COM_A_DEPOSIT_ISPERCENTAGE','Percentagem do depósito necessário?');
/**
* @ignore
*/
define('_JOMRES_COM_A_DEPOSIT_ISPERCENTAGE_DESC','A percentagem do depósito necessário é da reserva total? Se năo, entăo ao depósito será aplicado um valor fixo');
/**
* @ignore
*/
define('_JOMRES_COM_A_DEPOSIT_VALUE','Valor de depósito necessário');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS_PER','Por pessoa, por noite');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS_PER_DESC','Escolha Sim se pretende que seja cobrado no esquema pessoa-po-noite. Se năo, os custos serăo calculados com base em por-quarto-por-noite');
/**
* @ignore
*/
define('_JOMRES_COM_A_CANCELLATIONPOLICY','Pode haver desistęnciasForfeit can be redeemed?');
/**
* @ignore
*/
define('_JOMRES_COM_A_CANCELLATIONPOLICY_DESC','Seleccione Sim se quer que o dinheiro vindo de reservas canceladas seja usado no futuro pelo cliente. ');
/**
* @ignore
*/
define('_JOMRES_COM_A_UPLOADS_FILETYPES','Tipo de ficheiros');
/**
* @ignore
*/
define('_JOMRES_COM_A_UPLOADS_FILETYPES_DESC','Especifique aqui que tipo de ficheiros săo autorizados para o upload. Use vírgulas para separar e letra minúscula sem espaços. Exemplo: zip,txt,exe,htm,html');
/**
* @ignore
*/
define('_JOMRES_COM_A_UPLOADS_FILESIZE','Tamanho do ficheiro');
/**
* @ignore
*/
define('_JOMRES_COM_A_UPLOADS_FILESIZE_DESC','Tamanho máx. da imagem em Kilobyte');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_CLICKFORWEEKROOMSUSAGE','Clique para ver os apartamentos ocupados na semana a partir de hoje');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_CLICKONROOMFORBOOKINGINFO','Clique no quarto registado para ver a reserva');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_OR','ou escolha a data que estiver interessado');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_BOOKED','Registado');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_FREE','Livre');

/**
* @ignore
*/
define('_JOMRES_FRONT_MR_TAPEVIEWKEY','<br>Apartamentos com um fundo azul estăo reservados, no entanto<br> se um quarto tiver texto vermelho, entăo nenhum depósito foi ainda pago.<br> Se um quarto "Reservado" tiver uma estrela entăo o cliente é esperado que chegue neste dia.<br> Se um quarto tiver texto amarelo, entăo o cliente está neste momento a ocupar o quarto.');

/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_TITLE','Carta de confirmaçăo');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_DEAR','Caro ');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RATE_RULES','Custo por noite - por quarto ');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_DETAILS','Detalhes da reserva');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO1','Obrigado por reservar no');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO2','. Abaixo está um sumário dos detalhes da sua reserva. Por favor confirme que os seus dados estăo correctos e contacte-nos se existir um erro.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_CHECKIN','O seu quarto estará reservado até ŕ sua chegada, sendo o check in depois das 2pm.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_LOOKFORWARD','We shall look forward to greeting you on the ');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_HAVEAPLEASANTSTAY','Esperemos que tenha uma estadia agradável.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINTINTRO','Agora temos de chamar a sua atençăo para a seguinte linha.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_BINDINGCONTRACT','Relembramos-lhe que uma reserva é um contrato legamente obrigatório, logo se por qualquer motivo necessita de cancelar ou atrasar a sua reserva, será responsável por pagar a totalidade da reserva.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_NOALLOWANCE','Năo é permitido refeiçőes ou ocupar apartamentos que năo se encontrem dentro do periodo da reserva. With this in mind we strongly recommend that you use a holiday insurance facility.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_CANCELLATIONCHARGES_INTRO','<i>Cancellation and curtailment charges</i> Se cancelar as suas férias entăo terá de ser por escrito. As taxas para cancelamentos săo as seguintes:');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_30DAYSPLUS','30 dias ou mais');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_DEPOSITONLY',' Apenas depósitos.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_1530DAYS','15 a 30 dias');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_50PERCENT',' 50% do total do contrato.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_ARRIVALDATETO14DAYS','Até 14 dias da data de chegada');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_100_PERCENT',' 100% do total do contrato.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_RESERVATION_VAT','IVA ŕ taxa em vigor incluído.');
/**
* @ignore
*/
define('_JOMRES_COM_CONFIRMATION_PRINT','Imprima a carta de confirmaçăo');

/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_TITLE','Invoice printout');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_DEAR','Caro ');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_RATE_RULES','Custo por noite - por quarto ');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_STAYNIGHTS','Número de noites: ');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_CONTRACTAGREED','Contrato inicialmente acordado: ');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_COSTPERNIGHT','Custo por noite: ');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_LETTER_GRANDTOTAL','Total');

/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_LETTER_DETAILS','Detalhes de pagamento');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_LETTER_INTRO1','Obrigado, por ter escolhido ');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_LETTER_HOPEYOUENJOYEDSTAY','Esperamos voltar a vę-lo.');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_LETTER_VAT','IVA ŕ taxa em vigor incluído.');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_PRINT','Imprimir pagamento');

/**
* @ignore
*/
define('_JOMRES_COM_ADDSERVICE_TITLE','Adicionar serviço a cobrar');
/**
* @ignore
*/
define('_JOMRES_COM_ADDSERVICE_DESCRIPTION','Descriçăo do serviço');
/**
* @ignore
*/
define('_JOMRES_COM_ADDSERVICE_VALUE','Valor do serviço');
/**
* @ignore
*/
define('_JOMRES_COM_ADDSERVICE_BUTTON','Adicionar ŕ conta');
/**
* @ignore
*/
define('_JOMRES_COM_ADDSERVICE_BOOKINGDESC','Outros items cobrados');
/**
* @ignore
*/
define('_JOMRES_COM_ADDSERVICE_TOTALVALUE','Outros items cobrados, Valor total: ');
/**
* @ignore
*/
define('_JOMRES_COM_ADDSERVICE_SAVEMESSAGE','Item adicionado ŕ conta');
/**
* @ignore
*/
define('_JOMRES_COM_DEFAULTHOTELNOTFOUND','<h1><font color=red> Residęncia năo encontrada</h1><br>Năo pude continuar. Por favor contacte o suporte.</font>');/**
* @ignore
*/
define('_JOMRES_UPLOAD_ATTACH_IMAGE','Seleccione imagem');
/**
* @ignore
*/
define('_JOMRES_UPLOAD_IMAGE','Upload imagem');
/**
* @ignore
*/
define('_JOMRES_UPLOAD_UPLOAD','Upload');

/**
* @ignore
*/
define('_JOMRES_FILE_UPLOAD','Upload ficheiro');
/**
* @ignore
*/
define('_JOMRES_FILE_TYPES','O seu ficheiro năo pode ser do tipo - tam. max.');
/**
* @ignore
*/
define('_JOMRES_FILE_SUBMIT','Upload de novo ficheiro');
/**
* @ignore
*/
define('_JOMRES_FILE_ERROR_TYPE','Só é permitido o upload de ficheiros do tipo:\n');
/**
* @ignore
*/
define('_JOMRES_FILE_ERROR_EMPTY','Por favor escolha um ficheiro para transferir');
/**
* @ignore
*/
define('_JOMRES_FILE_ERROR_NAME','O ficheiro só pode conter caracteres alfanuméricos e sem espaços..');
/**
* @ignore
*/
define('_JOMRES_FILE_ERROR_SIZE','Tamanho máximo excedido.');
/**
* @ignore
*/
define('_JOMRES_FILE_ERROR_EXISTS','Já existe um ficheiro com esse nome.');
/**
* @ignore
*/
define('_JOMRES_FILE_UPLOADED','O ficheiro foi transferido.');
/**
* @ignore
*/
define('_JOMRES_FILE_NOT_UPLOADED','Ficheiro năo foi transferido.');
/**
* @ignore
*/
define('_JOMRES_FILE_UPDATED','O ficheiro foi transferido.');

/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_OPTIN','Opt into mosres network?');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_OPTIN_DESC','If you choose to opt this property into the mosres network, then it will be listed at mosres.net. Please note, it will be assumed that this is a live hotel. Mosres.net cannot be held responsible for your property. You must ensure that your details are correct.');/**
* @ignore
*/
define('_JOMRES_COM_A_JSCALENDAR','JS Calendar');
/**
* @ignore
*/
define('_JOMRES_COM_A_CALENDARLANGUAGE','JS Calendar language file');
/**
* @ignore
*/
define('_JOMRES_COM_A_CALENDARLANGUAGE_DESC','Choose the language file that should be used in the Javascript calendar. Please note that there appear to be some problems with the javascript calendar at the moment. For some reason, only the english language file appears to work. See http://sourceforge.net/tracker/?atid=544285&group_id=75569&func=browse for more information');
/**
* @ignore
*/
define('_JOMRES_COM_A_CALENDARCSS','JS Calendar CSS file');
/**
* @ignore
*/
define('_JOMRES_COM_A_CALENDARCSS_DESC','Choose the CSS file that should be used in the Javascript calendar');
/**
* @ignore
*/
define('_JOMRES_COM_A_CHECKPUBLICHOLIDAYS','Check for public holidays?');
/**
* @ignore
*/
define('_JOMRES_COM_A_CHECKPUBLICHOLIDAYS_DESC','If you set this option to Yes, then you must ensure that you have seperate tariffs/rates for public holidays and normal dates. Set it to No if you charge the same rates for public holidays and normal dates.');
/**
* @ignore
*/
define('_JOMRES_COM_A_ODDS','Odds and ends');
/**
* @ignore
*/
define('_JOMRES_COM_A_ERRORCHECKING','List minicomponent calls');
/**
* @ignore
*/
define('_JOMRES_COM_A_ERRORCHECKING_DESC','Switch this to Yes to see a log of the minicomponents called at the bottom of the page after Jomres has completed running. It also disables the internal redirect function. This is useful if you are trying to identify which minicomponents are performing certain services.');

/**
* @ignore
*/
define('_JOMRES_FILE_DELETE','Apagar esta imagem');
/**
* @ignore
*/
define('_JOMRES_FILE_DELETED','File deleted');
/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWDEPARTUREJAVASCRIPT','Show departure input field');
/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWDEPARTUREJAVASCRIPT_DESC','Set this to Yes if you want to show the departure field. It has been noted that there may be some browsers that fail to handle the javascript calendar properly. Personally I leave it switched off because I think having the field there is ugly');

/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_CHOOSEPROPERTY','Choose the property you want room availability information on');

/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNUSER_ANYPROPERTY','Qualquer');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_ROOMBOOKINGLISTING_ROOM','Quarto');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_ROOMBOOKINGLISTING_PROPERTY','Propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_A_ERRORCHECKINGSHOWSQL','Mostrar sql');
/**
* @ignore
*/
define('_JOMRES_COM_A_ERRORCHECKINGSHOWSQL_DESC','Ponha isto seleccionado para ver o SQL.');
/**
* @ignore
*/
define('_JOMRES_COM_A_ERRORCHECKINGSHOWSQL_SHOWRESULTS','Mostrar os resultados do sql');
/**
* @ignore
*/
define('_JOMRES_COM_A_ERRORCHECKINGSHOWSQL_SHOWRESULTS_DESC','Ponha isto seleccionado para ver dos dados retornados e variáveis despejadas pelo SQL.');
/**
* @ignore
*/
define('_JOMRES_COM_A_CSS_TITLE','css id título');
/**
* @ignore
*/
define('_JOMRES_COM_A_CSS_TOPBUTTONS','css id do botőes de cima');
/**
* @ignore
*/
define('_JOMRES_COM_A_CSS_TABLEHEADERS','Table headers css id');
/**
* @ignore
*/
define('_JOMRES_COM_A_CSS','CSS');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOM_DELETE','Apagar quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOM_UNABLETODELETE','Năo é possível apagar este quarto, ainda se encontram reservas nele. Cancele as reservas e tente outra vez.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOM_DELETED','Quarto apagado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOMFEATURE_DELETE','Apagar caracteristica do quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOMFEATURE_UNABLETODELETE','Năo foi possível remover a caracteristica deste quarto, pois é a mesma para vários apartamentos. Remova a característica para esses apartamentos e tente novamente.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOMFEATURE_DELETED','Caracteristica do quarto apagada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTYFEATURE_DELETE','Delete property feature');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTYFEATURE_UNABLETODELETE','Năo foi possível remover caracteristica da propriedade, pois está ligada a uma propriedade. Remova a caracteristica desta propriedade e tente novamente.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTYFEATURE_DELETED','Caracteristica da propriedade apagada');

/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOMCLASS_DELETE','Apagar tipo de quarto');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_ROOMS','Náo é possível apagar este tipo de quarto pois está atribuido a um quarto. Tente atribuir um quarto a outro tipo de quarto e tente outra vez.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_TARIFFS','Náo é possível apagar este tipo de quarto pois está atribuido a uma tarifa. Tente atribuir a tarifa a outro tipo de quarto e tente outra vez.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ROOMCLASS_DELETED','Tipo de quarto apagado');

/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTY_DELETE','Propriedade apagada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTY_UNABLETODELETE_MESSAGE','Năo é possível apagar esta propriedade uma vez que tem dados na tabela: ');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTY_DELETED','Propriedade apagada');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTY_DELETE_NORIGHTS','Năo tem permissőes para apagar esta propriedade.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNROOMTOTHISPROPERTY_BUTTON','Escolha esta propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_ASSIGNROOMTOTHISPROPERTY_DESC','Que propriedade será associada ao seu quarto?');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_SELECTPROPERTY','Escolha uma propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP1_MUSTSELECTPROPERTY','Tem de escolher uma propriedade');

/**
* @ignore
*/
define('_JOMRES_COM_A_UPLOADS_IMAGES_WIDTH_TINY','Tiny thumbnail image width');
/**
* @ignore
*/
define('_JOMRES_COM_A_UPLOADS_IMAGES_WIDTH_MEDIUM','Medium thumbnail image width');
/**
* @ignore
*/
define('_JOMRES_COM_A_UPLOADS_IMAGES_WIDTH_LARGE','Fullsize image width');

/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_MAPPINGLINK','Mapping link');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_PROPDESCRIPTION','Descriçăo da propriedade');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_CHECKINTIMES','Horas de check in');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AREAACTIVITIES','Actividades na área');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_DRIVINGDIRECTIONS','Direcçőes para os automobilistas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AIRPORTS','Aeroportos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_OTHERTRANSPORT','Outros transportes');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POLICIESDISCLAIMERS','Condiçőes');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_PROPERTYKEY','Your Mosres.net property key');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_PROPERTYKEY_DESC','When you are ready to put your website up on the web, visit <a href="http://www.mosres.net" target="_blank">Mosres.net</a> for your property key. With that mosres can register your property on the Mosres Network, ensuring that your reach the widest possible audience for your business.');/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTIESLISTING_OURPROPERTIES','As nossas casas');
/**
* @ignore
*/
define('_JOMRES_COM_MR_PROPERTIESLISTING_THISPROPERTYADDRESS','Endereço');
/**
* @ignore
*/
define('_JOMRES_COM_A_VISITORSCANBOOKONLINE','Os visitantes podem reservar online');
/**
* @ignore
*/
define('_JOMRES_COM_A_VISITORSCANBOOKONLINE_DESC','Escolha sim para garantir que os visitantes podem reservar apartamentos online.');
/**
* @ignore
*/
define('_JOMRES_COM_A_FIXEDPERIODBOOKINGS','As reservas săo para um periodo fixo');
/**
* @ignore
*/
define('_JOMRES_COM_A_FIXEDPERIODBOOKINGS_DESC','Se seleciona isto para Sim entăo as reservas serăo para um periodo fixo. Se escolher Năo, tem de garantir que o dia suposto de chegada năo será escolhido como Sim (a năo ser que especifique que forçe as pessoas que a chegar num certo dia, caso contrário năo terás muitos links no calendário das disponibilidades.');
/**
* @ignore
*/
define('_JOMRES_COM_A_FIXEDPERIOD','periodo da reserva: ');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKING','Apartamentos reservados');

/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGTABLEBORDER','reserva table border');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGTABLEBORDER_DESC','Change the colour of the reserva table border');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGTABLEBACKGROUND','reserva table background');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGTABLEBACKGROUND_DESC','Change the colour of the reserva table background');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGTABLEWIDTH','reserva table width');
/**
* @ignore
*/
define('_JOMRES_COM_A_FIXEDPERIOD_NUMBEROFPERIODS','Maximum periods, eg 3x 7 reserva periods = 21 dias');
/**
* @ignore
*/
define('_JOMRES_COM_A_NUMBEROFGUESTSREQUIRED','Number of guests required?');
/**
* @ignore
*/
define('_JOMRES_COM_A_NUMBEROFGUESTSREQUIRED_DESC','Set this to Yes to show the guest numbers fields in the reserva form');
/**
* @ignore
*/
define('_JOMRES_COM_A_SINGLEROOMPROPERTY','This is a single room property?');
/**
* @ignore
*/
define('_JOMRES_COM_A_SINGLEROOMPROPERTY_DESC','EG you are renting out a property, rather than rooms in that property. If this is the case, then you must make sure that you only have the one room registered against each property.');
/**
* @ignore
*/
define('_JOMRES_COM_A_MAXADULTS','Máximo número de adultos');
/**
* @ignore
*/
define('_JOMRES_COM_A_MAXADULTS_DESC','Seleccione o número máximo de adultos no formulário de reservas');
/**
* @ignore
*/
define('_JOMRES_COM_A_MAXCHILDREN','Máximo número de crianças');
/**
* @ignore
*/
define('_JOMRES_COM_A_MAXCHILDREN_DESC','Set the maximum Número de crianças in the reserva form');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_CONTINUE','Continuar');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_REVIEWBOOKING','Rever reserva');
/**
* @ignore
*/
define('_JOMRES_COM_MR_CONFIRMBOOKING','Confirmar reserva');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_DISCOUNT','Descontos');
/**
* @ignore
*/
define('_JOMRES_COM_MR_CONF_CHMODWARNING','<center><h1><font color=red>Warning...</FONT></h1><BR><B>You need to chmod your site_config.php file to 777 in order to make it possible to modify your configuration</B></center><BR><BR>');

/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_MONDAY','Segunda-feira');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_TUESDAY','Terça-feira');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY','Quarta-feira');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_THURSDAY','Quinta-feira');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_FRIDAY','Sexta-feira');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_SATURDAY','Sábado');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_SUNDAY','Domingo');

/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_MONDAY_ABBR','Seg');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_TUESDAY_ABBR','Ter');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY_ABBR','Qua');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_THURSDAY_ABBR','Qui');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_FRIDAY_ABBR','Sex');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_SATURDAY_ABBR','Sab');
/**
* @ignore
*/
define('_JOMRES_COM_MR_WEEKDAYS_SUNDAY_ABBR','Dom');

/**
* @ignore
*/
define('_JOMRES_COM_A_AVLCAL','Calendário de disponibilidade');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_FACE','Font face for all text');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_SIZE','Tamanho da fonte para todo o texto');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_HEIGHT','Altura da célula');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_WIDTH','Largura da célula');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_TODAYCOLOUR','Côr da fonte para o dia corrente');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_INMONTHFACE','Côr da fonte para os dias no ecran do męs ');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_OUTMONTHFACE','Côr da fonte para os dias que năo está no ecran do męs');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_INBGCOLOUR','Côr de fundo para a célula para os dias quando uma propriedade/quarto está disponivel');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_OUTBGCOLOUR','Côr de fundo para a célula para os dias que năo estăo no ecran do męs');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_OCCUPIEDCOLOUR','Côr de fundo da célula para os dias ocupados');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_PROVISIONALCOLOUR','Côr de fundo da célula para apartamentos reservados provisóriamentes (reservas para as quais nao tenha havido depósito)');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_PASTCOLOUR','Côr de fundo da célula para datas passadas');

/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_KEY','Legenda:');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_OCCUPIEDCOLOUR_KEY','Ocupado/Năo disponível');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_INMONTHFACE_KEY','Disponível para reservas');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_PROVISIONALCOLOUR_KEY','Reservas provisórias');
/**
* @ignore
*/
define('_JOMRES_COM_MR_FIXEDARRIVALDATE_YESNO','Dia de chegada predefinido');
/**
* @ignore
*/
define('_JOMRES_COM_MR_FIXEDARRIVALDATE_YESNO_DESC','Apenas para sites que oferecem periodos fixos de reservas. Escolha o dia em que a chegada tem de começar.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_FIXEDARRIVALDATE_DAY','Dia de chagada fixo');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_FIXEDPRIOD1','Periodo que tenciona ficar (dias)');
/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWAVILABILITY_CALENDAR','Ver calendários de disponiblidades?');
/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWAVILABILITY_CALENDAR_DESC','Escolha Sim para ver o calendário das disponiblidades');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP4_TITLE_SINGLEROOM','Confirme a selecçăo');
/**
* @ignore
*/
define('_JOMRES_FRONT_AVAILABILITY','Disponibilidade');

/**
* @ignore
*/
define('_JOMRES_FRONT_MESSAGES_TITLE','Coisas que tem de fazer: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MESSAGES_REVIEWDATES','Reveja as datas escolhidas ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MESSAGES_REVIEWNUMBERS','Reveja os seus números de cliente ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MESSAGES_GUESTDETAILS','Forneça os seus dados pessoais');
/**
* @ignore
*/
define('_JOMRES_FRONT_MESSAGES_CHOOSEAROOM','Escolha um quarto');
/**
* @ignore
*/
define('_JOMRES_FRONT_MESSAGES_REVIEWCHOSENROOM','Reveja o quarto escolhido');
/**
* @ignore
*/
define('_JOMRES_FRONT_MESSAGES_REVIEWBOOKING','Reveja o seu pedido. Quando estiver satisfeito confirme a reserva');
/**
* @ignore
*/
define('_JOMRES_FRONT_CALENDAR_CLICKDATES','Clique numa data livre para ver o formulário da reserva.');
/**
* @ignore
*/
define('_JOMRES_FRONT_BLACKBOOKING','Black reservas');
/**
* @ignore
*/
define('_JOMRES_FRONT_BLACKBOOKING_NONE','No black reservas');
/**
* @ignore
*/
define('_JOMRES_FRONT_BLACKBOOKING_NEW','New Black reserva');
/**
* @ignore
*/
define('_JOMRES_FRONT_DELETEGUEST','remover cliente');
/**
* @ignore
*/
define('_JOMRES_FRONT_DELETEGUEST_GUESTDELETED','Cliente removido');
/**
* @ignore
*/
define('_JOMRES_FRONT_DELETEGUEST_UNABLETODELETEGUEST','Impossível apagar este cliente uma vez que existem reservas abertas sobre ele. Cancele-as e tente outra vez.');
/**
* @ignore
*/
define('_JOMRES_COM_A_TAPEVIEW','Admin panel shows tape view');
/**
* @ignore
*/
define('_JOMRES_COM_A_TAPEVIEW_DESC','Coloque em SIM se quiser ver o formato semanal.');
/**
* @ignore
*/
define('_JOMRES_COM_INVOICE_ACTUALROOMCOST','Custo actual do Quarto: ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MESSAGES_EMAILINVALID','Email năo é válido ');
/**
* @ignore
*/
define('_JOMRES_FRONT_GUEST_EMAIL_TEXT_PREFIX','Este é um email recebido de');
/**
* @ignore
*/
define('_JOMRES_FRONT_GUEST_EMAIL_TEXT_HELLO','olá');
/**
* @ignore
*/
define('_JOMRES_FRONT_GUEST_EMAIL_TEXT_THANKS','Obrigado por fazer a sua reserva em');
/**
* @ignore
*/
define('_JOMRES_FRONT_GUEST_EMAIL_TEXT_SUMMARY','Sumário das seguintes reservas:');
/**
* @ignore
*/
define('_JOMRES_FRONT_GUEST_EMAIL_TEXT_ANYQUESTIONS','Se tiver alguma questăo relativamente ŕs reservas ou outro dos nossos serviços, por favor contacte-nos');
/**
* @ignore
*/
define('_JOMRES_FRONT_GUEST_EMAIL_TEXT_TELEPHONE','O nosso número de telefone é');
/**
* @ignore
*/
define('_JOMRES_FRONT_GUEST_EMAIL_TEXT_EMAIL','Em alternativa pode-nos contactar por email em');
/**
* @ignore
*/
define('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMSMOKING','Fumador');
/**
* @ignore
*/
define('_JOMRES_FRONT_ROOMSMOKING_EITHER','Ambivalente');
/**
* @ignore
*/
define('_JOMRES_COM_CALENDAROUTPUT','Formato do Calendário');
/**
* @ignore
*/
define('_JOMRES_COM_CALENDAROUTPUT_DESC','Permite ao utilizador modificar o formato das datas de saída do Mosres');
/**
* @ignore
*/
define('_JOMRES_COM_CALENDARINPUT',' Formato de introduçăo do Calendário');
/**
* @ignore
*/
define('_JOMRES_COM_CALENDARINPUT_DESC','Permite ao utilizador mudar o formato das datas do Mosres.');
/**
* @ignore
*/
define('_JOMRES_COM_A_FIXEDPERIODBOOKINGSSHORT','Os periodos fixados para reserva permitem intervalos curtos');
/**
* @ignore
*/
define('_JOMRES_COM_A_FIXEDPERIOD_SHORTBREAK_DAYS','Length of short break');



// Translate from here


// V1.4
/**
* @ignore
*/
define('_JOMRES_COM_A_GATEWAYLIST','Gateways');
/**
* @ignore
*/
define('_JOMRES_COM_A_CANCEL','Cancel');
/**
* @ignore
*/
define('_JOMRES_FRONT_BLACKBOOKING_DESC','Please choose the room(s) you wish to take out of service, and the relevant dates. <br>If a room does not have a check mark against it, it cannot be included in the black booking until any outstanding bookings have been completed/cancelled.<br/> When you have selected the appropriate dates, click the blue "apply" button to re-check room availability. ');
/**
* @ignore
*/
define('_JOMRES_JR_NOTLOGGEDIN','<center><b>It looks like Joomla has logged you out for inactivity</b> Please log in and try again.');
/**
* @ignore
*/
define('_JOMRES_JR_BLACKBOOKING_REASON','Reason');
/**
* @ignore
*/
define('_JOMRES_COM_A_GATEWAY_USEGATEWAYS','Use payment gateways?');
/**
* @ignore
*/
define('_JOMRES_COM_A_GATEWAY_USEGATEWAYS_DESC','Set this to yes if you want to use online payment gateways. <b>Note:</b>This does not switch off the deposit calculation showed during the booking process. To disable this you can edit the templates that show rooms and remove the elements that refer to deposits.');
/**
* @ignore
*/
define('_JOMRES_COM_A_GATEWAY_BOOKING_CHOOSE','Please choose your payment method.');
/**
* @ignore
*/
define('_JOMRES_COM_A_GATEWAY_ENABLED','Gateway enabled?');
/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_PLUGINS_UPDATE','Modified plugin setting');
/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_PLUGINS_INSERT','Inserted plugin setting');
/**
* @ignore
*/
define('_JOMRES_FRONT_GALLERYLINK','View photos of this property');
/**
* @ignore
*/
define('_JOMRES_COM_A_GALLERYLINK','Gallery link');
/**
* @ignore
*/
define('_JOMRES_COM_A_GALLERYLINK_DESC','Put a link to your photo album for this property here. It will show on the property description page, when filled.');
/**
* @ignore
*/
define('_JOMRES_COM_ENCRYPTION','Encryption');
/**
* @ignore
*/
define('_JOMRES_COM_A_ENCRYPTION','Use mCrypt encryption?');
/**
* @ignore
*/
define('_JOMRES_COM_A_ENCRYPTION_DESC','Set this to yes IF you have mCrypt compiled into PHP.');
/**
* @ignore
*/
define('_JOMRES_COM_A_ENCRYPTION_KEY','Encryption key');
/**
* @ignore
*/
define('_JOMRES_COM_A_ENCRYPTION_MODE','Encryption mode');
/**
* @ignore
*/
define('_JOMRES_COM_A_ENCRYPTION_ALGORITHM','Encryption algorithm');
/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_CREDITCARD_VIEWED','Viewed credit card');
/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_CREDITCARD_UPDATED','Updated credit card');
/**
* @ignore
*/
define('_JOMRES_MR_CREDITCARD_EDIT','Edit credit card');
/**
* @ignore
*/
define('_JOMRES_COM_A_EDITICON','Edit icon size');
/**
* @ignore
*/
define('_JOMRES_COM_A_EDITICON_DESC','Measured in pixels square.');
/**
* @ignore
*/
define('_JOMRES_JR_A_IMAGEHANDLING_BATCHUPLOAD','Batch property image upload');
/**
* @ignore
*/
define('_JOMRES_JR_A_IMAGEHANDLING_IMAGESALREADYINDIR','Images already in directory');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWS','Slideshows');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWS_SHOWSLIDESHOWLINK','Show link to slideshows?');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWS_SHOWSLIDESHOWINLINE','Show slideshow inline?');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWS_SHOWSLIDESHOWINLINE_DESC','Set this to yes if you want to show the slideshow inline with the property details.');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOW_FULLSIZE','Slideshow full height');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOW_THUMBSIZE','Slideshow thumbnail target height');
/**
* @ignore
*/
define('_JOMRES_FRONT_SLIDESHOW','Slideshow');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWS_NOIMAGES','<br />Sorry, no images available for this property');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWPOPUP_WIDTH','Popup window width');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWPOPUP_HEIGHT','Popup window height');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWSIMAGELOCATION','Image location');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOWSIMAGELOCATION_DESC','Only change this if you have a particular need for the jomres images to be elsewhere. Default if unset is \'/images/stories/jomres/\' in relation to the joomla root.');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS_SHOWTARIFFSLINK','Show link to tariffs?');
/**
* @ignore
*/
define('_JOMRES_COM_A_POPUPSALLOWED','Popups allowed?');
/**
* @ignore
*/
define('_JOMRES_COM_A_POPUPSALLOWED_DESC','If set to no, then links that normally would have opened in a pop will open inline instead. EXPERIMENTAL! ');
/**
* @ignore
*/
define('_JOMRES_FRONT_IMAGEUPLOADS','Batch image uploads');
/**
* @ignore
*/
define('_JOMRES_FRONT_IMAGEUPLOADS_INFO','Use this form to upload multiple images of this property.<br/><b>Note</b> that any images with the same name will be overwritten. Also note that this form does not upload room specific images or the property header image, you will need to upload them from the Property Admin section.<br/><b>Note</b> Images uploaded here will be written to the /images/stories/jomres/*property_uid* folder. If this folder does not exist, it will be created, unless of course an alternative directory has been specified in the configuration.');
/**
* @ignore
*/
define('_JOMRES_A_TABS_MISC','Misc');
/**
* @ignore
*/
define('_JOMRES_A','Site configuration');
/**
* @ignore
*/
define('_JOMRES_A_GLOBALPFEATURES','Use global property features');
/**
* @ignore
*/
define('_JOMRES_A_GLOBALPFEATURES_DESC','Set this to Yes if you want to force all properties to use only the property features /**
* @ignore
*/
defined by the webmaster.');
/**
* @ignore
*/
define('_JOMRES_A_GLOBALPFEATURES_INFO','To assign an image to this feature you first need to upload your property feature images to the /images/stories/jomres/pfeatures/ folder. ');
/**
* @ignore
*/
define('_JOMRES_A_ICON','Icon');
/**
* @ignore
*/
define('_JOMRES_A_GLOBAL_SEARCHOPTION','Select the search plugin that you want to use.');
/**
* @ignore
*/
define('_JOMRES_FRONT_NORESULTS','<b>Sorry, your search did not return any results. Please modify your search and try again.</b>');
/**
* @ignore
*/
define('_JOMRES_AREYOUSURE','Are you sure you wish to do this?');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_BOOKAROOM','Book a room');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_BOOKTHISPROPERTY','Book this property');
/**
* @ignore
*/
define('_JOMRES_COM_MR_DISPGUEST_CCV','Security number');

//v1.4c
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS_SHOWTARIFFSINLINE','Show tariffs inline?');
/**
* @ignore
*/
define('_JOMRES_COM_A_BASICTEMPLATE_SHOWADDRESS','Address');
/**
* @ignore
*/
define('_JOMRES_COM_A_BASICTEMPLATE_SHOWDETAILS','Detailed information');
/**
* @ignore
*/
define('_JOMRES_COM_A_BASICTEMPLATE_SHOWROOMS','Click for Rooms and availability');
/**
* @ignore
*/
define('_JOMRES_COM_A_BASICTEMPLATE_SHOWTARIFFS','Show tariffs information');

/**
* @ignore
*/
define('_JOMRES_COM_A_BASICTEMPLATE_SHOWADDRESS_TITLE','Show Address information below this link');
/**
* @ignore
*/
define('_JOMRES_COM_A_BASICTEMPLATE_SHOWDETAILS_TITLE','Show detailed property info below this link');
/**
* @ignore
*/
define('_JOMRES_COM_A_BASICTEMPLATE_SHOWROOMS_TITLE','Show rooms and availability below this link');
/**
* @ignore
*/
define('_JOMRES_COM_A_BASICTEMPLATE_SHOWTARIFFS_TITLE','Show tariff information below this link');

/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS_MODEL_SINGLETARIFF','Flat rate tariffs');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS_MODEL_AVERAGES','Averages');

/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS_MODEL','Select the tariffs model you want to use');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFS_MODEL_DESC',"You have two choices of tariff calculation methods. The first, the 'flat rate' method allows you to offer a number of different tariffs to the guest and the rate for the stay is the same for the entire time. This is useful if you want to offer several different tariffs for the same date, eg Bed and Breakfast tariff and B&B and Evening meal tariff. Choose the 'averages' tariff if you want to adjust your prices dependant on the date in question. Jomres will find all of the tariffs for each day in the booking, add them together then return the average rate across the period");

/**
* @ignore
*/
define('_JOMRES_COM_A_PORTAL','Use Jomres portal?');
/**
* @ignore
*/
define('_JOMRES_COM_A_PORTAL_DESC','Set this to Yes if Jomres is going to be used in conjunction with the Jomres portal software');

// v1.4e
/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWDEPARTUREINPUT','Show departure date input?');
/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWDEPARTUREINPUT_DESC',"Set this to No if you don't want to show the departure date input box. Only use this if you know what you're doing, as the depareture date in bookings will always be set to the day after the arrival date.");

// v1.4f
/**
* @ignore
*/
define('_JOMRES_COM_PROPERTYLISTDESC','Description limit');
/**
* @ignore
*/
define('_JOMRES_COM_PROPERTYLISTDESC_DESC',"This limits the number of characters shown in the property listing when drawing from the property description.");

// v1.4g
/**
* @ignore
*/
define('_JOMRES_COM_A_DAILYRATEMULTIPLIER','Daily rate multiplier');
/**
* @ignore
*/
define('_JOMRES_COM_A_DAILYRATEMULTIPLIER_DESC',"This allows the user to append a multiplier to the daily rate that is returned to booking form during the booking process (useful if you want to show a properties rate by the week for example)");
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOW_POPUPWIDTH','Slideshow popup width');
/**
* @ignore
*/
define('_JOMRES_COM_A_SLIDESHOW_POPUPHEIGHT','Slideshow popup height');


/**
* @ignore
*/
define('_JOMRES_FRONT_MR_DISPGUEST_UPDATEBUTTON','Update');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_DISPGUEST_UPDATETEXT','Click the update button to check availability');

/**
* @ignore
*/
define('_JOMRES_COM_A_DATEFORMATSTYLE','Used date() format style?');
/**
* @ignore
*/
define('_JOMRES_COM_A_DATEFORMATSTYLE_DESC','Set this to Yes to format output dates according to date() (See <a href="http://www.php.net/manual/en/function.date.php">Here</a>). Set it to No to use strftime() formatting (see <a href="http://www.php.net/manual/en/function.strftime.php">Here</a> eg. %b %d %Y ');

/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PUBLISH','Click to publish');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_UNPUBLISH','Click to unpublish');

/**
* @ignore
*/
define('_JOMRES_MR_FRONT_JSVALIDATION_PRE','Please complete the following fields: ');
/**
* @ignore
*/
define('_JOMRES_MR_FRONT_JSVALIDATION_POST',' Thank you.');
/**
* @ignore
*/
define('_JOMRES_COM_INPUTERROR_BORDER','Input error border colour');
/**
* @ignore
*/
define('_JOMRES_COM_INPUTERROR_BACKGROUND','Input error background colour');

/**
* @ignore
*/
define('_JOMRES_COM_CONFIGCOUNTRIES','Default country in booking form');
/**
* @ignore
*/
define('_JOMRES_COM_USESITEHELP','Use site help?');
/**
* @ignore
*/
define('_JOMRES_COM_USESITEHELP_DESC','Set this to Yes if you want Jomres to show the site help text above the search bar.');
/**
* @ignore
*/
define('_JOMRES_COM_USESITEHELP_BOOKING','Edit your sitehelp booking text here.');


/**
* @ignore
*/
define('_JOMRES_JAVASCRIPT_','Items marked with a red star are required.');
/**
* @ignore
*/
define('_JOMRES_COM_SELFREGISTRATION','Users can register their properties?');
/**
* @ignore
*/
define('_JOMRES_COM_SELFREGISTRATION_DESC','Set this to Yes if you want users to be able to register their own properties without admin intervention.');

/**
* @ignore
*/
define('_JOMRES_REGISTRATION_INSTRUCTIONS_STEP1','Please provide the country and region of your property.');
/**
* @ignore
*/
define('_JOMRES_REGISTRATION_INSTRUCTIONS_STEP2_1','Please complete your property details.');
/**
* @ignore
*/
define('_JOMRES_REGISTRATION_INSTRUCTIONS_STEP2_2','Items marked with a red star are required.');
/**
* @ignore
*/
define('_JOMRES_REGISTRATION_AUDIT_CREATEPROPERTY','Created property');
/**
* @ignore
*/
define('_JOMRES_REGISTRATION_NOTALLOWED',"Sorry, you can't create a property on this system. You must be a logged in, registered user, and you must not have already created a property.");
/**
* @ignore
*/
define('_JOMRES_REGISTRATION_CREATEDPROPERTY','Created property: ');
/**
* @ignore
*/
define('_JOMRES_REGISTRATION_CREATEDPROPERTY_FORUSER','For user: ');

/**
* @ignore
*/
define('_JOMRES_EXCHARGEABLEDAILY','Chargeable daily?');
/**
* @ignore
*/
define('_JOMRES_DAILY',' Per day');

// v1.4i

/**
* @ignore
*/
define('_JOMRES_COM_MONTHS_STARTOFYEAR','Show calendar from beginning of year?');
/**
* @ignore
*/
define('_JOMRES_COM_MONTHS_STARTOFYEAR_DESC','The availability calendar shows from the beginning of the current year.');
/**
* @ignore
*/
define('_JOMRES_SHOWDETAILEDROOMINFO','Show detailed room information?');
/**
* @ignore
*/
define('_JOMRES_SHOWDETAILEDROOMINFO_DESC','If you set this to No, then Jomres will not attempt to show all the during bookings, instead it will simply advise that availability exists.');
/**
* @ignore
*/
define('_JOMRES_NUMBEROFROOMSAVAILABLE','Number of rooms available');
/**
* @ignore
*/
define('_JOMRES_NUMBEROFROOMSAVAILABLE_INFO','Please select the number of rooms you require, of the type you require.');
/**
* @ignore
*/
define('_JOMRES_NUMBERYOUREQUIRE','Number required');
/**
* @ignore
*/
define('_JOMRES_BACKTOPROPERTYDETAILSLINK','Back to property details');
/**
* @ignore
*/
define('_JOMRES_FRONT_ROOMTYPES','Room types');

/**
* @ignore
*/
define('_JOMRES_METADATA_USEYESNO','Use Jomres metadata?');
/**
* @ignore
*/
define('_JOMRES_METADATA_USEYESNO_DESC','If you set this to Yes, then Jomres will use text that is repeated from property description & Property Listings pages to generate Metadata. Seperate words with a space.');
/**
* @ignore
*/
define('_JOMRES_METADATA_STOPWORDS','Stop words');
/**
* @ignore
*/
define('_JOMRES_METADATA_STOPWORDS_DESC',"These are stop words, IE words that you <i>don't</i> want to appear in the meta data.");
/**
* @ignore
*/
define('_JOMRES_METADATA_ELEMENTS','Other elements to remove');
/**
* @ignore
*/
define('_JOMRES_METADATA_ELEMENTS_DESC','The are elements that should be stripped from the meta data. An example could be less than symbols, quotatin marks etc.');
/**
* @ignore
*/
define('_JOMRES_METADATA_FREQUENCY','Frequency');
/**
* @ignore
*/
define('_JOMRES_METADATA_FREQUENCY_DESC','The number of times a word must be repeated before it can be included in the meta data.');


// v2
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_INSTRUCTIONS','Use this form to place your booking. Hover the mouse cursor over the "i" images for more information about the column. Modify your booking particulars like arrival and departure dates & guest numbers, then select the room(s) you require from the list of those available. Click any available rooms to add them to your booking. When done, you can add any optional extras you may require and provide your address details. When the form has enough information it will then give you a submit button so that you can confirm your booking.');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_INSTRUCTIONS_SRP','Use this form to place your booking. Hover the mouse cursor over the "i" images for more information about the column. Modify your booking particulars like arrival and departure dates & guest numbers. When done, you can add any optional extras you may require and provide your address details. When the form has enough information it will then give you a submit button so that you can confirm your booking.');

/**
* @ignore
*/
define('_JOMRES_AJAXFORM_PARTICULARS','Booking particulars');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_PARTICULARS_DESC','Select the details of your booking requirements');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_AVAILABLE','Availability ');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_AVAILABLE_DESC','Select the rooms that you require');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_AVAILABLE_DESC_SRP','Look here to see if the property is available at this time.');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_EXTRAS','Optional extras');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_EXTRAS_DESC','Select any optional extras you want to include in the booking');
/**
* @ignore
*/
define('_JOMRES_COM_PERDAY','Per night');


/**
* @ignore
*/
define('_JOMRES_AJAXFORM_ADDRESS','Your address');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_ADDRESS_DESC','Please enter your details. Note that all fields are required except your mobile number');

/**
* @ignore
*/
define('_JOMRES_AJAXFORM_AVAILABLEROOMS','Available rooms');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_SELECTEDROOMS','Selected rooms');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_EARLIESTPOSSIBLEARRIVALDATE','<br>The earliest possible arrival date is: ');

/**
* @ignore
*/
define('_JOMRES_AJAXFORM_BILLING_ROOM','Per night:');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL','Total:');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_BILLING_EXTRAS','Extras:');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_BILLING_TAX','Tax:');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_BILLING_DISCOUNT','Discount:');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_BILLING_TOTAL','Grand Total:');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_BILLING_TOTALINPARTY','Guests');

/**
* @ignore
*/
define('_JOMRES_AJAXFORM_CLICKHERECAPTION','Click now to add this room to your selection');
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_CLICKHERECAPTION_REMOVE','Click now to remove this room from your selection');
/**
* @ignore
*/
define('_JOMRES_CONFIG_VARIANCES_CUSTOMERTYPES','Guest types');

/**
* @ignore
*/
define('_JOMRES_VARIANCES_TYPE','Type');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_TYPE_TT','The type of customer, eg Children age 5-10, or Student ');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_NOTES','Notes');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_NOTES_TT','Notes that you may want to make regarding this customer type');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_MAXIMUM','Maximum');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_MAXIMUM_TT','The maximum number of this customer type that can be selected in the booking form');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_ISPERCENTAGE','Is percentage');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_ISPERCENTAGE_TT','The figure calculated is a percentage of the Base figure calculated for the room. If this is set to no then the figure you specify is simply added or subtracted from the base room value.');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_POSNEG','Add variance?');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_POSNEG_TT','The figure calculated is added to or removed from the Base figure calculated for the room. Set this to No if you want this to be a discount from the base figure. ');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_VARIANCE','Variance');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_VARIANCE_TT','The amount of the variance');

/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_REORDER_CUSTOMERTYPE','Modified customer type order');
/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_PUBLISH_CUSTOMERTYPE','Published customer type');
/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_DELETE_CUSTOMERTYPE','Deleted customer type');
/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_INSERT_CUSTOMERTYPE','Created customer type');
/**
* @ignore
*/
define('_JOMRES_MR_AUDIT_UPDATE_CUSTOMERTYPE','Updated customer type');
/**
* @ignore
*/
define('_JOMRES_COM_MR_CUSTOMERTYPE_UPDATED','Updated customer type');

/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWROOMINPROPERTYDETAILS','Show rooms list in property details page?');
/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWROOMSLISTLINK','Show link to rooms list in property details page?');

/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWONLYAVLCAL','Show <b>only</b> Availability calendar/Rooms list?');
/**
* @ignore
*/
define('_JOMRES_COM_A_SHOWONLYAVLCAL_DESC','Switch this to Yes to disable display of the property header and details, so that only the rooms list/availability calendar is viewable in the property details section. Only really intended for users renting out single room properties (eg apartments, cottages etc).');
/**
* @ignore
*/
define('_JOMRES_COM_A_CSS_STYLE','CSS Style to use on site');
/**
* @ignore
*/
define('_JOMRES_COM_A_MINIMUMINTERVAL','Arr-Dep minimum interval');
/**
* @ignore
*/
define('_JOMRES_COM_A_MINIMUMINTERVAL_DESC','The mimimum interval in the booking form between the arrival date and the departure date.');

/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORM_SHOWROOMNO','Booking form room list show room number');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORM_SHOWROOMNAME','Booking form room list show room name');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORM_SHOWTARIFFTITLE','Booking form room list show tariff title');

/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_TITLE','Booking form overlib show title');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_DESC','Booking form overlib show description');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_RATE','Booking form overlib show rate/tariff');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_STARTS','Booking form overlib show starts');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_ENDS','Booking form overlib show ends');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_MINDAYS','Booking form overlib show minimum days');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_MAXDAYS','Booking form overlib show maximum days');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_MINPEEPS','Booking form overlib show minimum people');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWTARIFF_MAXPEEPS','Booking form overlib show maximum people');

/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWROOM_NUMBER','Booking form overlib show room number');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWROOM_NAME','Booking form overlib show room name');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWROOM_TYPE','Booking form overlib show room type');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWROOM_SMOKING','Booking form overlib show room smoking');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWROOM_ACCESS','Booking form overlib show room disabled access');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWROOM_FLOOR','Booking form overlib show room floor');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWROOM_MAXPEEPS','Booking form overlib show room maximum people');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORMOVERLIB_SHOWROOM_FEATURES','Booking form overlib show room features');

/**
* @ignore
*/
define('_JOMRES_ORDER','Order');
/**
* @ignore
*/
define('_JOMRES_SINGLEROOMPROPERTY_ERROR','You have configured Jomres as a single room property (eg an apartment, cottage, villa) however you have more than one room created. This may result in errors when using Jomres, so if you are going to continue using Jomres to manage a single room property you need to remove all but one of the rooms. Please modify your configuration so that Single Room Property = No, then go to Property Admin and remove all rooms except one, so that you only have one room against this property.');
/**
* @ignore
*/
define('_JOMRES_REQUIREDFIELDS','Required');
/**
* @ignore
*/
define('_JOMRES_COM_A_DAYSBEFOREFIRSTBOOKING','Days before arrival');
/**
* @ignore
*/
define('_JOMRES_COM_A_DAYSBEFOREFIRSTBOOKING_DESC','The minimum number of days that must elapse, from "today", before the arrival date.');

/**
* @ignore
*/
define('_JOMRES_AJAXFORM_MESSAGES_TODO_','Per night:');

/**
* @ignore
*/
define('_JOMRES_DTV','Date type variations');
/**
* @ignore
*/
define('_JOMRES_DTV_DOW','Day of week');
/**
* @ignore
*/
define('_JOMRES_DTV_RANGES','Date ranges');
/**
* @ignore
*/
define('_JOMRES_DTV_STAYDAYS','Stay days');
/**
* @ignore
*/
define('_JOMRES_DTV_LASTMINUTE','Last minute');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_DOW','Day of week');
/**
* @ignore
*/
define('_JOMRES_VARIANCES_DOW_TT','The day of the week');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFCLASS_SELECTION','Tariff class component selection');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFCLASS_SELECTION_DESC','This dropdown allows you to choose a custom tariff class object that you may have created/downloaded and installed as a seperate component in Joomla. ');

/**
* @ignore
*/
define('_JOMRES_COM_A_DEFAULTNUMBEROFFIRSTGUESTTYPE','Guest type default');
/**
* @ignore
*/
define('_JOMRES_COM_A_DEFAULTNUMBEROFFIRSTGUESTTYPEDESC','Default number of first the first Guest type. If you use guest types, then this is the default number that the first guest type in the booking form will be set to.');

/**
* @ignore
*/
define('_JOMRES_COM_A_REGISTEREDUSERSONLYBOOK','Registered users only can book online?');
/**
* @ignore
*/
define('_JOMRES_REGISTEREDUSERSONLYBOOK','Sorry, you must be a registered user to book online. Click here to register on this site. ');

/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_CURRENTBOOKINGFONT','Font colour for links to current bookings');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_WEEKENDBORDER','Weekend borders');
/**
* @ignore
*/
define('_JOMRES_COM_A_DASHBOARDPLUGIN','Which dashboard plugin to use');
/**
* @ignore
*/
define('_JOMRES_COM_A_DASHBOARDPLUGIN_DESC','If you have installed any Jomres dashboard plugins you can choose an alternative to the default dashboard here.');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_BOOKING_KEY','Room is booked');
/**
* @ignore
*/
define('_JOMRES_COM_AVLCAL_BLACK_KEY','Black booking');
/**
* @ignore
*/
define('_JOMRES_COM_A_DEPOSIT_DEPOSITROUNDUP','Round deposit up to nearest integer?');
/**
* @ignore
*/
define('_JOMRES_COM_A_DEPOSIT_CHARGEDEPOSIT','Charge deposits?');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFPRICESAREWEEKLY','Tariff charges stored as weekly figures?');
/**
* @ignore
*/
define('_JOMRES_COM_A_TARIFFPRICESAREWEEKLY_DESC','You have the option of storing tariff charges in either daily or weekly values. If storing them as weekly, you MUST set this option to Yes.');
/**
* @ignore
*/
define('_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK','Rate per week');
/**
* @ignore
*/
define('_JOMRES_COM_MR_FIXEDARRIVALDATE_RECURRING','Fixed arrival dates recurr: ');
/**
* @ignore
*/
define('_JOMRES_COM_MR_FIXEDARRIVALDATE_RECURRING_DESC','When fixed arrival dates are selected, the number dates that can be shown in the dates dropdown list');

/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_SMOKING_INVALID','Smoking option invalid');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_ARRIVALDATE_INVALID','Arrival date incorrect');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_DEPARTUREDATE_INVALID','Departure date incorrect');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_BOOKING_TOO_SHORT1','The booking is too short. There needs to be at least this many days between arrival and departure dates:');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_BOOKING_TOO_SHORT2','Your interval is');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_GUEST_TYPE_INCORRECT','Guesttype variant incorrect');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_SELECT_GUEST_NUMBERS','Select your guest numbers/type');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_TOO_MANY_IN_PARTY_FOR_TARIFFS','You have too many in the party for the available tariffs');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_MORE_ROOMS_THAN_GUESTS','You have chosen more rooms than you have guests');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_TOO_MANY_GUESTS_FOR_BEDS','Too many guests for the available beds');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_CHOOSE_MORE_ROOMS','You need to choose more rooms');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_SELECT_A_ROOM','Select a room');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_FIRSTNAME','First name is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_SURNAME','Surname is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_HOUSENO','House no/name is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_STREET','Street is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_TOWN','Town is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_REGION','Region is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_POSTCODE','Postcode is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_COUNTRY','Country is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_LANDLINE','Landline number is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_CELLPHONE','Cellphone number is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_EMAIL','Email address is required');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_EMAIL_INVALID','Email address is not valid');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_MONITORING_CANNOT_VALIDATE_EMAIL','Unable to validate email domain');

/**
* @ignore
*/
define('_JOMRES_SRP_WEHAVEVACANCIES','We have vacancies!');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_NOROOMSSELECTEDYET','No rooms selected yet');

/**
* @ignore
*/
define('_JOMRES_BOOKING_NUMBER','Booking no.');
/**
* @ignore
*/
define('_JOMRES_COM_INPUTOKTOBOOK_BACKGROUND','Ok to book, message box background');
/**
* @ignore
*/
define('_JOMRES_COM_DUMPTEMPLATEDATA','Dump template vars?');
/**
* @ignore
*/
define('_JOMRES_COM_DUMPTEMPLATEDATA_DESC','Set this to enable a DHTML dump of template variables for each FRONTEND template file as that page is viewed. Useful if you want to see if a certain element is available to be used in a given template.');
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON_ISPERCENTAGE','Figure is percentage');
/**
* @ignore
*/
define('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON_ISPERCENTAGE_DESC','Set this to Yes if the single person calculation figure is a percentage. If no then it will be applied as a flat sum.');


//v2rc2
/**
* @ignore
*/
define('_JOMRES_COM_LIMITROOMSLIST','Available rooms/tariff limit');
/**
* @ignore
*/
define('_JOMRES_COM_LIMITROOMSLIST_DESC','Use this input to limit the number of available rooms & tariffs that are listed in the booking form. Set it to zero if you do not want limiting enabled. ');
/**
* @ignore
*/
define('_JOMRES_SRP_WEHAVENOVACANCIES','No vacancies at this time!');
// Introduced in v2.5
/**
* @ignore
*/
define('_JOMRES_COM_A_MARGIN','Margin');
/**
* @ignore
*/
define('_JOMRES_COM_A_MARGIN_DESC','Profit margin, in percent.');
// v2.6
/**
* @ignore
*/
define('_JOMRES_COM_JRCONFIG_LINKSASICONS','Show Jomres admin options as icons?');
/**
* @ignore
*/
define('_JOMRES_COM_JRCONFIG_LINKSASICONS_DESC','Set this to no if you want all the admin links shown as text.');
/**
* @ignore
*/
define('_JOMRES_BOOKITNOW','Book it now: ');
/**
* @ignore
*/
define('_JOMRES_COM_JRCONFIG_GLOBALEDITING','Global editing mode?');
/**
* @ignore
*/
define('_JOMRES_COM_JRCONFIG_GLOBALEDITING_DESC','Take care with this function. If set to Yes, then the editing mode will affect the custom text for ALL properties in the system for the constant you are editing.');
/**
* @ignore
*/
define('_JOMRES_COM_JRCONFIG_GLOBALCURRENCY','Global currency symbol');
/**
* @ignore
*/
define('_JOMRES_COM_JRCONFIG_ISWRAPPED','Component wrapped');
/**
* @ignore
*/
define('_JOMRES_COM_JRCONFIG_ISWRAPPED_DESC','Set this to Yes if the component is wrapped so that module and header areas are not to be seen');
/**
* @ignore
*/
define('_JOMRES_COM_USERIS_SUPERPROPERTYMANAGER','Super Property Manager');
/**
* @ignore
*/
define('_JOMRES_COM_WEEKENDONLY','Weekends only');
/**
* @ignore
*/
define('_JOMRES_COM_WEEKENDONLY_DESC','Tariff only valid if stay period includes a weekend day (friday or saturday) ');
/**
* @ignore
*/
define('_JOMRES_COM_WEEKENDDAYS','Weekend days');
/**
* @ignore
*/
define('_JOMRES_COM_WEEKENDDAYS_DESC','Set your weekend days. Tariffs that allow or disallow weekends will take this setting into account when generating the rooms list.');
/**
* @ignore
*/
define('_JOMRES_EDITPROPERTY_SELECTCOUNTRY','Select your country before adding any property information');
/**
* @ignore
*/
define('_JOMRES_EDITPROPERTY_SAVEBEFOREUPLOAD','Save your property changes before uploading a property image');
/**
* @ignore
*/
define('_JOMRES_TARIFFSFROM','Prices from - ');
/**
* @ignore
*/
define('_JOMRES_SEARCH_ALL','All');
/**
* @ignore
*/
define('_JOMRES_SEARCH_TITLE_GEO',		'Region');
/**
* @ignore
*/
define('_JOMRES_SEARCH_TITLE_FEATURES',	'Features');
/**
* @ignore
*/
define('_JOMRES_SEARCH_TITLE_DESCR',	'Description');
/**
* @ignore
*/
define('_JOMRES_SEARCH_TITLE_AVL',		'Availability');
/**
* @ignore
*/
define('_JOMRES_SEARCH_TITLE_PTYPE',	'Type');
/**
* @ignore
*/
define('_JOMRES_SEARCH_GEO_COUNTRYSEARCH','Search by country');
/**
* @ignore
*/
define('_JOMRES_SEARCH_GEO_REGIONSEARCH','Search by region');
/**
* @ignore
*/
define('_JOMRES_SEARCH_GEO_TOWNSEARCH','Search by town');
/**
* @ignore
*/
define('_JOMRES_SEARCH_FEATURE_INFO','Feature search.');
/**
* @ignore
*/
define('_JOMRES_SEARCH_BUTTON','Search');
/**
* @ignore
*/
define('_JOMRES_SEARCH_DESCRIPTION_INFO','Enter a search word into the box and press the button.');
/**
* @ignore
*/
define('_JOMRES_SEARCH_DESCRIPTION_LABEL','Search word(s): ');
/**
* @ignore
*/
define('_JOMRES_SEARCH_AVL_INFO','Please enter your intended arrival and departure dates and press the button to find properties that have accommodation available on your chosen dates.');
/**
* @ignore
*/
define('_JOMRES_SEARCH_PTYPES','List all properties by property type.');
/**
* @ignore
*/
define('_JOMRES_SEARCH_RTYPES','List all properties by room type.');
/**
* @ignore
*/
define('_JOMRES_SORTORDER_DEFAULT','Default');
/**
* @ignore
*/
define('_JOMRES_SORTORDER_PROPERTYNAME','Property Name');
/**
* @ignore
*/
define('_JOMRES_SORTORDER_PROPERTYREGION','Property Region');
/**
* @ignore
*/
define('_JOMRES_SORTORDER_PROPERTYTOWN','Property Town');
/**
* @ignore
*/
define('_JOMRES_SORTORDER_STARS','Stars');
/**
* @ignore
*/
define('_JOMRES_PATHWAY_PROPERTYLIST','Property list');
/**
* @ignore
*/
define('_JOMRES_PATHWAY_PROPERTYDETAILS','Property details - ');
/**
* @ignore
*/
define('_JOMRES_PATHWAY_BOOKINGFORM','Booking form');

/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_UPDATEADDRESSBUTTON','Update your address details');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_RECHECKINGROOMAVIALABILITY','Re-checking room availability<br/>(Room selection will be reset)');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_RECHECKINGROOMAVIALABILITY_SRP','Re-checking availability');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_CHANGINGEXTRA','Modifying your optional extras');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_CHANGINGROOMSELECTION','Changing your room selection');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_UPDATINGADDRESS','Updating your address details');
/**
* @ignore
*/
define('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_ADDRESSINPUTERROR','Sorry, one or more address fields are incorrect.');
/**
* @ignore
*/
define('_JOMRES_COM_A_BOOKINGFORM_SHOWROOMIMAGE','Room image');
/**
* @ignore
*/
define('_JOMRES_CURRENCYFORMAT','Currency format');
/**
* @ignore
*/
define('_JOMRES_MANAGEROPTIONSASIMAGES','Show Managers\'s options as images');
/**
* @ignore
*/
define('JOMRES_COM_A_SEARCHOPTIONSTAB','Search options');
/**
* @ignore
*/
define('JOMRES_COM_A_CALENDARNOTE','Note! These options only affect the language format in modules. To adjust the javascript langauge format for a given property please edit that javascript calendar options within that property');
/**
* @ignore
*/
define('JOMRES_COM_A_AVAILABLELOGS','Available Logs');
/**
* @ignore
*/
define('JOMRES_COM_A_LOGS_NOENTRIES','No log entries. This is normal, you need to manually modify jomres.php to trigger logging');
/**
* @ignore
*/
define('JOMRES_COM_A_DATETIME','Datetime');
/**
* @ignore
*/
define('JOMRES_COM_A_MESSAGE','Message');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Jomres 2.6.3

/**
* @ignore
*/
define('JOMRES_COM_A_TARIFFMODE_NORMAL','Normal');
/**
* @ignore
*/
define('JOMRES_COM_A_TARIFFMODE_ADVANCED','Advanced');
/**
* @ignore
*/
define('JOMRES_COM_A_TARIFFMODE_TARIFFTYPES','Micromanage');
/**
* @ignore
*/
define('JOMRES_COM_A_TARIFFMODE','Tariff Configuration Mode');
/**
* @ignore
*/
define('JOMRES_COM_A_TARIFFMODE_DESC',"<b>Warning: Switching between different tariff types may result in loss of data. See the note below regarding this</b>.
<br/><br/>
You have three options as to how you configure your tariffs.<br/>
Normal mode: You will have one tariff for each room type that is valid for the next 10 years.<br/>
Micromanage: You can modify the price for each and every day for each room/property type. <br/>
Advanced: The \"old\" Jomres method of managing tariffs. <br/>
<br/>
The different tariff modes allow you to choose the method of configuring tariffs that suits you best.<br/>
Normal mode is the most simplistic but it's the easiest to understand because it will cross reference rooms and tariffs to room/property types and allows you to configure rooms and prices on the same page.<br/>
Micro manage allows you to vary the rates on a day to day basis without having to manage reams of tariffs, it is done by cross referencing lots of different tariffs with each other. This results in a number of tariffs being created for you covering a period of time, but you can not layer tariffs over each other.<br/>
Advanced mode lets you create a room and associate it with a room type. You then create a tariff and associate THAT with a room type. Using this method it is possible to \"layer\" tariffs over each other, for example a room type \"Double bed\" can have one tariff for bed and breakfast, and another for bed, breakfast and evening meal. The advanced method requires a little more attention to detail because it is possible to dis-associate a room or tariff from a room/property type, or to incorrectly set valid from and to dates, but it does give you configuration options that the other modes do not offer. <br/>
<br/>
Because Normal and Micromanage modes require a specific set up of rooms and tariffs for the tariff mode to work the system may need to reset some data to make the current tariff configurations compatible with the current tariff editing mode.<br/>
<br/>
Normal -> Advanced. No change. Existing tariffs are retained.<br/>
Normal -> Micromanage. All existing tariffs are removed.<br/>
Advanced -> Normal. All existing tariffs are removed.<br/>
Advanced -> Micromanage. All existing tariffs are removed.<br/>
Micromanage -> Advanced. All existing cross references between tariffs are removed, but the tariffs themselves will remain.<br/>
Micromanage -> Normal. All existing cross references and tariffs are removed.<br/>");
/**
* @ignore
*/
define('_JOMRES_COM_A_LISTROOMSINPROPERTYDETAILS','Show rooms list in property details page?');
/**
* @ignore
*/
define('JOMRES_PROPERTYTYPE','Property type');
/**
* @ignore
*/
define('JOMRES_COM_A_SRPONLY','SRP only');
/**
* @ignore
*/
define('JOMRES_MAXPEOPLEINROOM','Max people per room');
/**
* @ignore
*/
define('JOMRES_MAXPEOPLEINBOOKING','Max people in booking');

/**
* @ignore
*/
define('_JOMCOMP_BOOKINGNOTES_ADD','Add note');
/**
* @ignore
*/
define('_JOMCOMP_BOOKINGNOTES_EDIT','Edit note');
/**
* @ignore
*/
define('_JOMCOMP_BOOKINGNOTES_DELETE','Delete note');
/**
* @ignore
*/
define('_JOMCOMP_BOOKINGNOTES_VIEW','View notes');
/**
* @ignore
*/
define('_JOMCOMP_BOOKINGNOTES_AUDITMESSAGE','Added new note');
/**
* @ignore
*/
define('_JOMCOMP_BOOKINGNOTES_AUDITMESSAGE_EDIT','Edited note');
/**
* @ignore
*/
define('_JOMCOMP_BOOKINGNOTES_AUDITMESSAGE_DELETE','Deleted note');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_MENUTITLE','My options');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_NOTLOGGEDIN','You are not logged in. If you log in/register with this site then you will be able to view your bookings information.');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_LISTBOOKINGS','List Bookings');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_MYBOOKINGS','My Bookings');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_LISTBOOKINGS_DEPOSITNOTPAID','List Bookings, no deposit paid');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_VIEWBOOKING','View Booking');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_VIEWFAVOURITES','View Favourites');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_VIEWFAVOURITES_NONE','You haven\'t added any favourites yet!');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_ADDTOFAVOURITES','Add to Favourites');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_PROPERTYTYPE','Property type');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_PUBLISHEDPROPERTIES','Properties on site');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_TITLE','Wise price');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_ACTIVE','Active');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_TITLE_DESC','This plugin allows you to enable and configure your room prices dynamically.');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_TITLE_DESC_FULL','Most businesses will recalculate room prices based on the number of rooms of a required type that are available on a given date. This allows them to offer discounts on a room type that isn\'t busy during a given period with the aim of attracting business that might otherwise be missed.<br/>Enabling and configuring this plugin allows you to offer adjustable pricing based on the number of rooms of a selected type are available in the property on a given day.<br/> The days threashold defines the number of days that the arrival date must be within before room prices are adjusted by this feature, then the percentages options allow you to configure the percentage of rooms that can be available before a given discount is applied.');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_THREASHOLD','Threashold (number of days between arrival date and today)');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_PERCENTAGE10','Percentage rooms occupied < 10%');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_PERCENTAGE25','Percentage rooms occupied < 25%');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_PERCENTAGE50','Percentage rooms occupied < 50%');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_PERCENTAGE75','Percentage rooms occupied < 75%');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_DISCOUNT','Discount %');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_ROOMTYPE','Room type ');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_HASBEENDISCOUNTED',' has been discounted from ');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_TO',' to ');
/**
* @ignore
*/
define('_JOMCOMP_WISEPRICE_NOTDISCOUNTED',' Room price not discounted ');
/**
* @ignore
*/
define('JOMRES_COM_A_MAPSKEY','Google maps API key');
/**
* @ignore
*/
define('JOMRES_COM_A_MAPSKEY_DESC','Get can get a google maps API key from <a href="http://www.google.com/apis/maps/signup.html" target="_blank">Google maps</a>. Once you have input your map key here, Jomres will show the map in your Property Details page.');
/**
* @ignore
*/
define('JOMRES_COM_A_USE_SSL','Use SSL in booking form?');
/**
* @ignore
*/
define('JOMRES_COM_A_USE_SSL_DESC','You need to ensure that you have a valid SSL certificate for ');
/**
* @ignore
*/
define('JOMRES_MAXPEOPLEINPROPERTY','Max people that property can accommodate');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_CPANEL','Last minute');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_ACTIVE','Active?');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_ACTIVE_DESC','Set this to Yes if you want to offer last minute deals.');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_THREASHOLD','Threshold');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_THREASHOLD_DESC','If a booking is made and the arrival date is only N days from the date of booking, then the discount can be applied');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_DISCOUNT','Discount');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_DISCOUNT_DESC','In percent');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_BOOKINGCONFIRMATION1','A discount has been applied to this booking!');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_BOOKINGCONFIRMATION2','The cost of the stay has been reduced by ');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_PROPERTYLIST_PRE','This property offers a last minute discount of  ');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_PROPERTYLIST_MID',' percent if you book to arrive before ');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_ORMORE',' percent or more if you book to arrive before ');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_PROPERTYLIST_POST','. Book now to make the most of this offer!');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_PROPERTYDETAILS_PRE','This property offers a last minute discount of  ');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_PROPERTYDETAILS_MID',' percent if you book to arrive before ');
/**
* @ignore
*/
define('_JOMCOMP_LASTMINUTE_PROPERTYDETAILS_POST','. Book now to make the most of this offer!');
/**
* @ignore
*/
define('JOMRES_COM_A_VERBOSETARIFFINTO','Verbose tariff info');
/**
* @ignore
*/
define('JOMRES_COM_A_VERBOSETARIFFINTO_DESC','Set this to Yes to show more detailed tariff information in the property details/tariff popup');
/**
* @ignore
*/
define('JOMRES_COM_A_MINIMALCONFIG','Minimise configuration options');
/**
* @ignore
*/
define('JOMRES_COM_A_MINIMALCONFIG_DESC','Set this to Yes to reduce the number of options available to property managers in the General Configuration section. This is useful if you do not want property managers to play around with too many settings, instead you can edit jomres_config.php to define default property options.');
/**
* @ignore
*/
define('_JOMCOMP_AMEND','Amend Booking - Property Selection');
/**
* @ignore
*/
define('_JOMCOMP_AMEND_SELECTPROPERTY','Select New Property');
/**
* @ignore
*/
define('_JOMCOMP_AMEND_HEADER','Original Contract:');
/**
* @ignore
*/
define('_JOMCOMP_AMEND_DEPOSITPAID','Deposit Paid');
/**
* @ignore
*/
define('_JOMCOMP_AMEND_DEPOSITDUE','Deposit Not Paid');
/**
* @ignore
*/
define('_JOMCOMP_AMEND_OVERRIDE_TOTAL','Override Total');
/**
* @ignore
*/
define('_JOMCOMP_AMEND_OVERRIDE_DEPOSIT','Override Deposit');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Jomres 2.7.5

/**
* @ignore
*/
define('_JRPORTAL_CANCEL','Cancel');
/**
* @ignore
*/
define('_JRPORTAL_CPANEL','JRPortal Control Panel');
/**
* @ignore
*/
define('_JRPORTAL_CPANEL_CONFIGURATION','Configuration');
/**
* @ignore
*/
define('_JRPORTAL_CONFIG_DEFAULT_CRATE','Default Commission rate');
/**
* @ignore
*/
define('_JRPORTAL_CONFIG_DEFAULT_CRATE_DESC','Choose the default commission rate that will be applied to a property in the event that another commission rate is not otherwise set.');
/**
* @ignore
*/
define('_JRPORTAL_CPANEL_LISTCRATES','List Commission Rates');
/**
* @ignore
*/
define('_JRPORTAL_CPANEL_PATETITLE','Commission Rates');
/**
* @ignore
*/
define('_JRPORTAL_CRATE_TITLE','Title');
/**
* @ignore
*/
define('_JRPORTAL_CRATE_TYPE','Type');
/**
* @ignore
*/
define('_JRPORTAL_CRATE_VALUE','Comission rate');
/**
* @ignore
*/
define('_JRPORTAL_CRATE_CURRENCYCODE','Currency code');
/**
* @ignore
*/
define('_JRPORTAL_CPANEL_LISTPROPERTIES','List Properties');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_PROPERTYNAME','Property name');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_PROPERTYADDRESS','Property address');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_LEGEND','Properties who\'s background colour is red have not yet had a commission rate applied to them.');
/**
* @ignore
*/
define('_JRPORTAL_CONFIG_LICENSEKEY','License number');
/**
* @ignore
*/
define('_JRPORTAL_CONFIG_LICENSEKEY_DESC','Your license number for the portal plugin.');
/**
* @ignore
*/
define('_JRPORTAL_STATS_PATETITLE','Statistics');
/**
* @ignore
*/
define('_JRPORTAL_STATS_STATTYPE','Statistics for: ');
/**
* @ignore
*/
define('_JRPORTAL_STATS_PERIOD','Period: ');
/**
* @ignore
*/
define('_JRPORTAL_STATS_STATTYPE_PROPERTIES','Properties - Clicks');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_VIEWPROPERTY','Property view');

/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_0','January');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_1','February');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_2','March');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_3','April');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_4','May');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_5','June');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_6','July');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_7','August');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_8','September');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_9','October');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_10','November');
/**
* @ignore
*/
define('_JRPORTAL_MONTHS_LONG_11','December');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_NUMBEROFBOOKINGS','Number of bookings');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_VALUEOFBOOKINGS','Value of bookings');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_ROOMUSAGE','Room usage');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_COMMISSIONESTIMATE','Commission estimate');
/**
* @ignore
*/
define('_JRPORTAL_PROPERTIES_COMMISSIONRATE','Commission Rate');
/**
* @ignore
*/
define('_JRPORTAL_CPANEL_LISTBOOKINGS','List bookings');



/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID','Property id');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_GUEST_ID','Guest id');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_AFFILIATE_ID','Affiliate id');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_INVOICE_ID','Invoice id');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_BOOKINGTOTAL','Booking total');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_CONTRACT_ID','Contract id');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_CONTRACT_NUMBER','Contract number');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_CURRENCYCODE','Currency Code');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_CREATED','Created');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_ARCHIVED','Archived');
/**
* @ignore
*/
define('_JRPORTAL_LISTBOOKINGS_HEADER_DATEARCHIVED','Date archived');
/**
* @ignore
*/
define('_JRPORTAL_CPANEL_ADDPROPERTY','Add property');
/**
* @ignore
*/
define('_JRPORTAL_WORD_SOURCE','Source : ');
/**
* @ignore
*/
define('_JRPORTAL_ADDPROPERTY_ISSRP','Is this a multiroom property?');
/**
* @ignore
*/
define('_JRPORTAL_ADDPROPERTY_ISSRP_DESC','Is this a property like a hotel/bed and breakfast/penzion? If so, select Yes. If it is a single room property like a villa/cottage then choose No.');
/**
* @ignore
*/
define('_JRPORTAL_CPANEL_ADD_ADHOC_ITEM','Add item to bill');
/**
* @ignore
*/
define('_JRPORTAL_ADD_ADHOC_ITEM_CHOOSEMANAGER','Manager to invoice');
/**
* @ignore
*/
define('_JRPORTAL_ADD_ADHOC_ITEM_CHOOSEPROPERTY','Associated property (if applicable)');
/**
* @ignore
*/
define('_JRPORTAL_ADD_ADHOC_ITEM_VALUE','Value');
/**
* @ignore
*/
define('_JRPORTAL_ADD_ADHOC_ITEM_DESCRIPTION','Description');
/**
* @ignore
*/
define('_JRPORTAL_ADD_ADHOC_ITEM_SUCCESS',"Successfully inserted billing item into ");
/**
* @ignore
*/
define('_JRPORTAL_ADD_ADHOC_ITEM_VIEWNBILLORDERS',"View orders");
/**
* @ignore
*/
define('_JRPORTAL_ADD_ADHOC_ITEM_FAILURE',"Failed to insert billing item into ");
/**
* @ignore
*/
define('_JRPORTAL_ADD_ADHOC_ITEM_NOVALUE',"Error, you didn't set a value for the bill");
/**
* @ignore
*/
define('_JOMRES_COM_PTYPES_PTYPE_DESC_FURTHER','You can have property type specific language files by setting the description to the name of a sub folder, e.g. "yachtbrokerage" and copying a language file to that subfolder. You can then modify that language file for this property type so rooms become, for example, DVDs, etc.');
/**
* @ignore
*/
define('_JOMRES_EDITPROPERTY_CONNOTDELETE1','You cannot delete this property as it is the only property that you have access to. If you want to disable it, please use the un-publish feature in your toolbar. ');
/**
* @ignore
*/
define('_JOMRES_EDITPROPERTY_CONNOTDELETE2','If this is a demo installation and you intend to upgrade to Jomres Solo (one property only limit) then you should create a new property first, then delete this one before changing your license key to the Solo license key that you will be assigned on purchase. ');

/**
* @ignore
*/
define('_JOMRES_COM_EMAILERRORS',"Email error log messages?");
/**
* @ignore
*/
define('_JOMRES_COM_EMAILERRORS_DESC',"Set this to Yes if you want to copy jomres.net automatically when an error log message is created. This allows us to be proactive in our approach to dealing with potential problems, hopefully resolving any issues before you are even aware of them. Note, this feature is disabled on 'localhost'. ");
/**
* @ignore
*/
define('_JOMRES_COM_ISTHISANMRP',"Is this property a hotel/bed and breakfast/guest house/pension? ");
/**
* @ignore
*/
define('_JOMRES_COM_ISTHISANMRP_DESC',"Configuration options differ depending on if you are renting out rooms in a property, or the property itself. Select MRP if you are offering rooms, select SRP if you are offering the entire property.ring the entire property. ");
// Jomres v3.0.6

/**
* @ignore
*/
define('_JOMRES_COM_JOMRESEMAILCHECK',"Use Jomres email address checker? ");
/**
* @ignore
*/
define('_JOMRES_COM_JOMRESEMAILCHECK_DESC',"Enforces a stricter check on emails sent. Some secure web servers will throw a 500 internal error if you try to send an email to a non-existant email address. Switching this on allows us to use checkdnsrr features of php before attempting to send an email, preventing these 500 errors. ");

// Jomres v3.1

/**
* @ignore
*/
define('_JOMRES_AJAXFORM_ACCOMMODATION_TOTAL',"Accommodation Total");
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_ACCOMMODATION_NIGHTS',"night(s) at");
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_ACCOMMODATION_PERROOM',"per room ");
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_EXTRAS_TOTAL',"Enhance Your Stay Total ");
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_PRICE_SUMMARY',"Price Summary ");
/**
* @ignore
*/
define('_JOMRES_CONFIRMATION_ALERT',"Please read and agree to ");
/**
* @ignore
*/
define('_JOMRES_CONFIRMATION_HEADER',"A summary of your booking is shown below.<br /> To make any changes, please click on the Amend Reservation button. ");
/**
* @ignore
*/
define('_JOMRES_CONFIRMATION_AMENDTEXT',"If you need to change any of the above information then please click here");
/**
* @ignore
*/
define('_JOMRES_CONFIRMATION_AMEND',"Amend Reservation");
/**
* @ignore
*/
define('_JOMRES_CONFIRMATION_SPECIALS',"Please enter any special requests in the box below.");
/**
* @ignore
*/
define('_JOMRES_CONFIRMATION_TERMS_PRETEXT',"I confirm that the above information is correct and agree to the ");
/**
* @ignore
*/
define('_JOMRES_SLIDESHOW_HOVERFORANIMAGE',"Hover over a thumbnail for a larger image");
/**
* @ignore
*/
define('_JOMRES_SLIDESHOW_LOCATION',"Show slideshow above property details or below.");
/**
* @ignore
*/
define('_JOMRES_SLIDESHOW_LOCATION_TOP',"Top");
/**
* @ignore
*/
define('_JOMRES_SLIDESHOW_LOCATION_BOTTOM',"Bottom");
/**
* @ignore
*/
define('_JOMRES_SLIDESHOW_LOCATION_BOTH',"Both");
/**
* @ignore
*/
define('_JOMRES_AJAXFORM_ACCOMMODATION_PERPERSON',"per person per night ");

// Jomres 3.1.10
/**
* @ignore
*/
define('_JOMRES_COM_A_SITELANGUAGE_FILE',"Default language file");
/**
* @ignore
*/
define('_JOMRES_COM_A_SITELANGUAGE_FILE_DESC',"Choose the default language file that Jomres should use if the language hasn't been set by Joomfish.");
// Jomres 3.1.11
/**
* @ignore
*/
define('JOMRES_COM_A_AVAILABLELOGS_DESC',"The absolute path to the available logs. Remember, you will still need to enable logging by editing jomres.php manually. although error logging is automatic all other logs must be switched on by yourself.");
// Jomres 3.1.13
/**
* @ignore
*/
if (!defined('_PN_LT'))
	define('_PN_LT','&lt;');
/**
* @ignore
*/
if (!defined('_PN_RT'))
	define('_PN_RT','&gt;');
/**
* @ignore
*/
if (!defined('_PN_PAGE'))
	define('_PN_PAGE','Page');
/**
* @ignore
*/
if (!defined('_PN_OF'))
	define('_PN_OF','of');
/**
* @ignore
*/
if (!defined('_PN_START'))
	define('_PN_START','Start');
/**
* @ignore
*/
if (!defined('_PN_PREVIOUS'))
	define('_PN_PREVIOUS','Prev');
/**
* @ignore
*/
if (!defined('_PN_NEXT'))
	define('_PN_NEXT','Next');
/**
* @ignore
*/
if (!defined('_PN_END'))
	define('_PN_END','End');
/**
* @ignore
*/
if (!defined('_PN_DISPLAY_NR'))
	define('_PN_DISPLAY_NR','Display #');
/**
* @ignore
*/
if (!defined('_PN_RESULTS'))
	define('_PN_RESULTS','Results');

define('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL_TITLE','Note that this is not a booking form, instead you are sending an email.<br/>Please enter the message you\'d like to send to ');

define('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL','Contact hotel');

define('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL_SUBJECT','Property enquiry from ');

define('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL_THANKS','Thank you for your enquiry, your message has been sent to the property\'s contact email address, and copied to your own address for your records. They will respond to you as soon as possible with their reply.');

define('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL_REGARDING',' regarding ');

define('_JOMRES_FRONT_MR_MENU_CAPTCHA_MSG1','Type the characters that you see in the box');

define('_JOMRES_FRONT_MR_MENU_CAPTCHA_MSG2','I cannot read the characters. Generate a ');

define('_JOMRES_FRONT_MR_MENU_CAPTCHA_BUTTONTEXT','Send');

define('_JOMRES_FRONT_MR_MENU_CAPTCHA_REFRESHBUTTONTEXT','new image');

define('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL_ENQUIRY','Enquiry');

define('_JOMRES_BOOKINGFORM_LOOKRIGHT','Please select your required accommodation from the list on the right');

/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_MINROOMS','Min rooms already selected');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_MINROOMS_DESC','Minimum number of rooms already selected in booking before tariff/room type combo can be offered. Allows you to have discounted tariffs when more than N rooms are already selected. ');

/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_MAXROOMS','Max rooms already selected');
/**
* @ignore
*/
define('_JOMRES_COM_MR_EB_ROOM_MAXROOMS_DESC','Maximum number of rooms already selected in booking before tariff/room combo is no longer offered. Allows you to stop offering this room type/tariff combination once N rooms have been selected in the booking form. ');
/**
* @ignore
*/
define('_JOMRES_COM_SPS_EDITROOM_DESC','Note that Single person suppliments set here will not be used if Single Person Suppliments are set to Yes in General Configuration. The settings here are an alternative to having flat rates Single Person Suppliements, not an addition to the flat rate SPS.');
/**
* @ignore
*/
define('_JOMRES_AVLCAL_NOBOOKINGS',"Available"); 
/**
* @ignore
*/
define('_JOMRES_AVLCAL_QUARTER',"Some bookings");
/**
* @ignore
*/
define('_JOMRES_AVLCAL_HALF',"Half booked");
/**
* @ignore
*/
define('_JOMRES_AVLCAL_THREEQUARTER',"Mostly booked");
/**
* @ignore
*/
define('_JOMRES_AVLCAL_FULLYBOOKED',"Fully booked");


/**
* @ignore
*/
define('_JOMRES_COM_SEF_URL_PREFIX','Url prefix');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_URL_PREFIX_DESC','This is the first item displayed after the domain - Change to what you require - If you don\'t want to use it then blank it out');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_TASK_ALIAS_VIEWPROPERTY','View property task alias');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_TASK_ALIAS_VIEWPROPERTY_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_TASK_ALIAS_DOBOOKING','dobooking task alias');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_TASK_ALIAS_DOBOOKING_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_TASK_ALIAS_SEARCH','Search task alias');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_TASK_ALIAS_SEARCH_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_COUNTRY','Add country to url');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_COUNTRY_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_REGION','Add region to url');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_REGION_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_TOWN','Add town to url');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_TOWN_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_PTYPE','Add property type to url');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_PTYPE_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_PROPERTYNAME','Add property name to url');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_PROPERTYNAME_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_PROPERTY_ID','Append property id to property name');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_PROPERTY_URL_PROPERTY_ID_DESC','if property name is set to No then the id will not be used. If set to yes then the url will look like fawlty_towers-1');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_SEARCH_URL_COUNTRY','Search URL Structure - Add country to url');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_SEARCH_URL_COUNTRY_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_DEFAULT_COUNTRY','Search URL Structure - Default country');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_DEFAULT_COUNTRY_DESC','If all your properties are in one country then you will not have country in the search - enter a default country here if you want to display a country');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_SEARCH_URL_REGION','Search URL Structure - Add region to url');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_SEARCH_URL_REGION_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_DEFAULT_REGION','Search URL Structure - Default region');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_DEFAULT_REGION_DESC','If all your properties are in one region then you will not have region in the search - enter a default region here if you want to display a region');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_SEARCH_URL_TOWN','Search URL Structure - Add town to url');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_SEARCH_URL_TOWN_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_DEFAULT_TOWN','Search URL Structure - Default town');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_DEFAULT_TOWN_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_SEARCH_URL_PTYPE','Search URL Structure - Property type');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_SEARCH_URL_PTYPE_DESC','');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_DEFAULT_PTYPE','Search URL Structure - Default property type');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_DEFAULT_PTYPE_DESC','Used in url if search is for all property types');
/**
* @ignore
*/
define('_JOMRES_COM_SEF_NOTINSTALLED','Either she404sef is not installed, or you haven\'t yet copied '.JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'components'.JRDS.'com_jomres'.JRDS.'com_jomres.php to '.JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'components'.JRDS.'com_sh404sef'.JRDS.'sef_ext. Once you have installed sh404sef and/or copied that file over, then you will be able to configure your sef urls from here. ');
/**
* @ignore
*/
define('_JOMRES_COM_A_CALENDARLANGUAGE_AUTO','Autodetect Javascript calendar language');
/**
* @ignore
*/
define('_JOMRES_COM_A_CALENDARLANGUAGE_AUTO_DESC','Enable autodetection of language for the javascript calendars? If we cannot autodetect the language then we will fall back to the language configured below');
/**
* @ignore
*/
define('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK','Per week');
/**
* @ignore
*/
define('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS','Per day');
/**
* @ignore
*/
define('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING','Per booking');
/**
* @ignore
*/
define('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING','Per person per booking');
/**
* @ignore
*/
define('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY','Per person per day');
/**
* @ignore
*/
define('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK','Per person per week');
/**
* @ignore
*/
define('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS','Per days (min days)');
/**
* @ignore
*/
define('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM','Per days X rooms selected');
/**
* @ignore
*/
define('_JOMRES_REGISTRYREBUILD','Rebuild minicomponent registry');
/**
* @ignore
*/
define('_JOMRES_REGISTRYREBUILD_NOTES',"Normally the Jomres plugin registry is rebuilt automatically whenever you view the plugin manager and add or remove a plugin, however it's possible that you cannot use these features for some reason, therefore you can use this function to rebuild the registry manually. If you have access to the Plugin Manager and Upgrades feature then it's unlikely that you will need to use this function. You will need to rebuild the plugin registry whenever you add a new mini-component and didn't use the Plugin Manager to add it.");
/**
* @ignore
*/
define('_JOMRES_REGISTRYREBUILD_SUCCESS','Registry rebuilt successfully');
/**
* @ignore
*/
define('_JOMRES_REGISTRYREBUILD_FAILURE','There was an error with rebuilding the registry of minicomponents. You should check your Jomres error log to see if there is a record of what triggered the error.');
/**
* @ignore
*/
define('_JOMRES_SEARCH_PRICERANGES','Search by price range.');
/**
* @ignore
*/
define('JOMRES_WORD_SAVING','Saving...');
/**
* @ignore
*/
define('_JOMRES_COM_COMPOSITE_PROPERTY_DETAILS','Use Composite Property details?');
/**
* @ignore
*/
define('_JOMRES_COM_COMPOSITE_PROPERTY_DETAILS_DESC','Jomres 3.3 introduces the composite property details where all of the property details output is sent to one template file (composite_property_details.html). If you do not wish to use this set it to No (only existing users are expected to set this to No, new users will probably want to leave it set to Yes)');
/**
* @ignore
*/
define('_JOMRES_PROFILELIST_INSTRUCTIONS','This is a list of all users on the system. Non-property managers will have a Guest icon, property managers will have Reception/Property Manager/Super property manager icons.<br/>When Jomres is first installed "admin" is automatically added as a property manager and is considered an authorised user.<br/>Non-super property managers must be assigned to at least one property otherwise they will see an error when they try to log on and use Jomres.<br/>Once a user is authorised then you can edit their profiles, assign them to propertys or give them super property manager rights.<br/>To authorise a user, click on the red Cross next to their name. To unauthrorise them, click the green Tick.<br/>To assign users to specific properties only, or give them super property manager rights, authorise them then click the edit icon (which is only visible once they\'ve been authorised). Users who\'ve registered their property(s) themselves will be automatically assigned to those propertys. Super property managers automatically have rights over all properties, and will see all configuration options even if the minimised configuration option is set in Site Config.');
/**
* @ignore
*/
define('_JOMRES_PROFILEEDIT_INSTRUCTIONS','Here you can assign a manager to certain propertys. Ensure, if they\'re not going to be a super property manager, that they have rights to at least one property otherwise they will see an error when they log in. To give a receptionist/property manager rights over only certain propertys, ensure that the Super Property Manager dropdown is not set to Yes.');
/**
* @ignore
*/
define('_JOMRES_PHRASE_PROCESSING','Please wait, your order is being processed...');
/**
* @ignore
*/
define('_JOMCOMP_MYUSER_VIEWBOOKINGS_NONE','You haven\'t made any bookings yet!');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_TYPE_TAB','Property type');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_TYPE','Edit your property type');
/**
* @ignore
*/
define('_JOMRES_COM_MR_VRCT_PROPERTY_TYPE_INFO','Select your property type');
/**
* @ignore
*/
define('_JOMRES_COM_LOGGING','Jomres logging');
/**
* @ignore
*/
define('_JOMRES_COM_LOGGING_WARNING','These options allow you to enable/disable logging within Jomres. Error logging is always enabled, but other logs such as Booking, Gateway, System and Request logs can be switched on and off. You are advised that <b>the ability to enable this logging is provided purely as a way of making debugging easier but it carries a big security risk</b> as it is easy for outside users to view your logs without being authorised therefore you are advised to leave it switched off most of the time. If you have enabled logging, then when you have disabled it, you should also ensure that the <i>'.JOMRESPATH_BASE.JRDS.'temp'.JRDS.'</i> folder does not contain any old log files. Note that enabling logging will also significantly slow your sytem down as it collects a lot of information.');

/**
* @ignore
*/
define('_JOMRES_COM_LOGGING_BOOKING','Booking form logging (Booking engine logs) ');
/**
* @ignore
*/
define('_JOMRES_COM_LOGGING_GATEWAY','Gateway logs (eg paypal etc) ');
/**
* @ignore
*/
define('_JOMRES_COM_LOGGING_REQUEST','Request log (all incoming server requests)');
/**
* @ignore
*/
define('_JOMRES_COM_LOGGING_SYSTEM','System (misc log) ');
/**
* @ignore
*/
define('_JOMRES_COM_LOGGING_JRPORTAL','JR Portal (mainly for recording commission etc) ');
/**
* @ignore
*/
define('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL_YOUR_ENQUIRY','Your enquiry...');
?>