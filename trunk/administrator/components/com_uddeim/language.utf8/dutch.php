<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         ? 2007-2008 Stephan Slabihoud, ? 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: 					Dutch (source file is Latin-1)
// Translator:    					Machiel van den Brink <machiel.brink@gmail.com>
// Language file version:		1.0(30-01-2008 23:00)
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Load MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'This specifies how uddeIM loads MooTools (MooTools is required for Autocompleter): <i>None</i> is useful when your template loads MooTools, <i>Auto</i> is the recommended default (same behavior as in uddeIM 1.2), when using J1.0 you can also force loading MooTools 1.1 or 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'do not load MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'force loading MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'force loading MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...setting default for MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 encoded');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Adjust timezone');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'When uddeIM shows the wrong time you can adjust the timezone setting here. Usually, when everything is configured correctly, this should be zero. Nevertheless there might be cases you need to change this value.');
DEFINE ('_UDDEADM_HOURS', 'hours');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Version information:');
DEFINE ('_UDDEADM_STATISTICS', 'Statistics:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Show statistics');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'This displays some statistics like number of stored messages etc.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'SHOW STATISTICS');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Messages stored in database: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Messages trashed by recipient: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Messages trashed by sender: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Messages on hold for purging: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Overwrite Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Usually uddeIM tries to detect the correct Itemid when it is not set. In some cases it might be necessary to overwrite this value, e.g. when you use several menu links to uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Detected Itemid is: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Use Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Use this Itemid instead of the detected one.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Use profile links');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'When set to <i>yes</i>, all usernames showing up in uddeIM will be displayed as links to the user profile.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Show thumbnails');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'When set to <i>yes</i>, the thumbnail of the respective user will be displayed when reading a message.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Show thumbnails in lists');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Set to <i>yes</i> if you want to display thumbnails of users in the message lists overview (inbox, outbox, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Disabled');
DEFINE ('_UDDEADM_ENABLED', 'Enabled');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Important');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Allow message tagging');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Allows message tagging (uddeIM shows a star in lists which can be highlighted to mark important messages).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Important: When you have upgraded uddeIM from an earlier version please check the README. Sometimes you have to add or change database tables or fields!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Add CC: line');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Truncate quoted text');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Truncate quoted text to 2/3 of the maximum text length if it exceeds this limit.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Inbox entries ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Last ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' entries');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Status');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Sender');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Message');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Empty Inbox');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Access to trashcan not allowed.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Restrict trashcan access');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'You can restrict the access to the trashcan. Usually the trashcan is available for all (<i>no restriction</i>). You can restrict the access to special users or to admins only, so groups with lower access rights cannot recycle a message.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'no restriction');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'special users');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'admins only');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Hide users from userlist');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Enter user IDs which should be hidden from public userlist (e.g. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Hide users from userlist');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Enter user IDs which should be hidden from userlist (e.g. 65,66,67). Admins will always see the complete list.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF attack recognized');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF protection');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'This protects all forms against Cross-Site Request Forgery attacks. Usually this should be enabled. Only when you have strange problems switch it off.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'You can not reply to archived messages.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Replies to unregistered users can not be recalled.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Allow replies');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Allow direct replies to messages from public users.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Hi %user%,\n\n%you% has sent you the following private message at %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Show realnames');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Show realnames or usernames in public frontend?');
DEFINE ('_UDDEIM_USERLIST', 'Userlist');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Sorry, you have to wait before you can post a new message');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Last sent');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Timedelay');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Time in seconds a user must wait before he can post the next message (0 for no time delay).');
DEFINE ('_UDDEADM_SECONDS', 'seconds');
DEFINE ('_UDDEIM_PUBLICSENT', 'Message sent.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Error in sender name');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Error in email address');
DEFINE ('_UDDEIM_YOURNAME', 'Your name:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Your email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'You are using uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'You are already using the latest version of uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'The current version is ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Update information:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Check for updates');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'This contacts uddeIM developer website to receive information about the current uddeIM version. Except the uddeIM version you use, no other personal information is transmitted.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'CHECK NOW');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Unable to receive version information.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Contact list not found!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Maximum number of recipients exceeded (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Max. number of entries');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Max. number of entries allowed per contact list.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Contact lists are not enabled');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Enable contact lists');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM allows users to create contact lists. These lists can be used to send messages to multiple users. Do not forget to enable multiple recipients when you want to use contact lists.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'disabled');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'registered users');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'special users');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'admins only');
DEFINE ('_UDDEIM_LISTSNEW', 'Create new contact list');
DEFINE ('_UDDEIM_LISTSSAVED', 'Contact list saved');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Contact list updated');
DEFINE ('_UDDEIM_LISTSDESC', 'Description');
DEFINE ('_UDDEIM_LISTSNAME', 'Name');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Name (without spaces)');
DEFINE ('_UDDEIM_EDITLINK', 'edit');
DEFINE ('_UDDEIM_LISTS', 'Contacts');
DEFINE ('_UDDEIM_STATUS_READ', 'read');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'unread');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'online');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'offline');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Show CB gallery pictures');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'By default uddeIM does only show avatars users have uploaded. When you enable this setting uddeIM does also display pictures from the CB avatars gallery.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Unblock CB connections');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'You can allow messages to recipients when the registered user is on the recipients CB connection list (even when the recipient is in a group which is blocked). This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'You are not allowed sending to this group.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'The recipient blocks you.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blocked groups (registered users)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Groups to which registered users are not allowed to send messages to. This is for registered users only. Special users and admins are not affected by this setting. This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blocked groups (public users)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Groups to which public users are not allowed to send messages to. This setting is independent from the individual blocking each user can configure when enabled (see settings above). When you block a group, users in this group cannot see the the option to enable the public frontend in their profile settings.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Public user');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB connection');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Registered user');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Author');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'User accepts messages from registered users only.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Hide from public "All users" list');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the public "All users" list. Note: this hides the names only, the users can still receive messages. Users who have not enabled Public Frontend will never be listed in this list.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Hide from "All users" list');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the "All users" list. Note: this hides the names only, the users can still receive messages.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'none');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'superadmins only');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'admins only');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'special users');
DEFINE ('_UDDEADM_PUBLIC', 'Public');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed in Public Frontend, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Public Frontend');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- select public -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Allow public users to send a message');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Message limit reached!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Public user');
DEFINE ('_UDDEIM_DELETEDUSER', 'User deleted');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha length');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Specifies how many characters a user must enter.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam protection');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Specify who has to enter a captcha when sending a message');
DEFINE ('_UDDEADM_CAPTCHAF0', 'disabled');
DEFINE ('_UDDEADM_CAPTCHAF1', 'public users only');
DEFINE ('_UDDEADM_CAPTCHAF2', 'public and registered users');
DEFINE ('_UDDEADM_CAPTCHAF3', 'public, registered, special users');
DEFINE ('_UDDEADM_CAPTCHAF4', 'all users (incl. admins)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Enable public frontend');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'When enabled public users can send messages to your registered users (those can specify in their personal settings of they want to use this feature).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Public frontend default');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'This is the default value if a public user is allowed to send a message to a registered user.');
DEFINE ('_UDDEADM_PUBDEF0', 'disabled');
DEFINE ('_UDDEADM_PUBDEF1', 'enabled');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Wrong security code');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'geen of niet bekend');
DEFINE ('_UDDEADM_DONATE', 'Als je uddeIM gebruikt en bent er tevreden mee overweeg dan om een donatie te doen.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Configuratie gevonden in database: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Back-up en terugzetten van configuratie');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'U kunt uw back-up opslaan in de database. Dit kan handig zijn wanneer u uddeIM gaat updaten of een andere instelling wil uitproberen.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'Back-up');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'Terugzetten');
DEFINE ('_UDDEADM_CANCEL', 'Annuleer');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Taalbestand karakter set');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Gewoonlijk gebruiken we <strong>Standaard</strong> (ISO-8859-1) voor Joomla 1.0 en <strong>UTF-8</strong> voor Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'Standaard');
DEFINE ('_UDDEIM_READ_INFO_1', 'Gelezen berichten zullen maximaal  ');
DEFINE ('_UDDEIM_READ_INFO_2', ' dagen in de inbox blijven voordat ze automatisch verwijderd worden.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Ongelezen berichten zullen maximaal ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' dagen in de inbox blijven voordat ze automatisch verwijderd worden.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Verzonden berichten zullen maximaal ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' dagen in de outbox blijven voordat ze automatisch verwijderd worden.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Geef inbox notitie weer voor gelezen berichten');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Geef inbox notitie "Gelezen berichten zullen worden verwijderd na n dagen" weer');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Geef inbox notitie weer voor ongelezen berichten');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Geef inbox notitie "Ongelezen berichten zullen worden verwijderd na n dagen" weer');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Geef outbox notitie weer voor verzonden berichten');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Geef outbox notitie "Verzonden berichten zullen worden verwijderd na n dagen" weer');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Geef prullenbak notitie weer voor verwijderd berichten');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Geef prullenbak notitie "Verwijderde berichten zullen worden verwijderd na n dagen" weer');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Verzonden berichten bewaren (dagen)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Vul het aantal dagen in waarna <b>verzonden</b> berichten automatisch uit de outbox worden verwijderd.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'verstuur naar alle speciale gebruikers');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Bericht naar <strong>alle speciale gebruikers</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- Selecteer gebruikersnaam -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- Selecteer naam -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Wijzig gebruikers instellingen');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'bestaand');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'niet bestaand');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- Selecteer invoeging -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- Selecteer informatie -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- Selecteer popup -');

DEFINE ('_UDDEADM_USERSET_USERNAME', 'Gebruikersnaam');
DEFINE ('_UDDEADM_USERSET_NAME', 'Naam');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Informatie');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Laatste toegang');
DEFINE ('_UDDEADM_USERSET_NO', 'Nee');
DEFINE ('_UDDEADM_USERSET_YES', 'Ja');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'niet bekend');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Offline (behalve bij antwoorden)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Altijd (behalve bij antwoorden)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Offline');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Altijd');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Informatie');
DEFINE ('_UDDEADM_WELCOMEMSG', "Welkom bij uddeIM!\n\nU heeft uddeIM succesvol geinstalleerd.\n\nProbeer dit bericht met meerdere templates te bekijken. U kan een template kiezen in de backend van uddeIM.\n\nuddeIM is een project waar veel aan wordt gewerkt en waar dus ook fouten in kunnen sluipen. Vind u een fout of iets anders wat niet in orde is, stuur mij dan aub een e-mail waardoor wij uddeIM nog beter kunnen maken.\n\nVeel plezier met uddeIM.");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM installatie voltooid.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Ga nu eerst verder met de configuratie van uddeIM.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Als je het CMS in een ander karakter set gebruikt dan ISO 8859-1 pas de instellingen daar dan ook op aan.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Na installatie is alle uddeIM e-mail berichtgeving uitgeschakeld dit is handig bij het testen van de uddeIM. Vergeet niet na het testen om het "Stop e-mails verzenden" uit te zetten in de configuratie.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Maximaal aantal ontvangers');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Maximaal aantal ontvangers toegestaan per bericht(0 = onbeperkt)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'te veel ontvangers');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Versturen van e-mails uitgeschakeld.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Uitgebreid zoeken');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Automatisch aanvullen doorzoekt ook delen van de tekst(dus niet alleen vanaf het begin en het hele woord)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Gedrag van de "Alle gebruikers" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Maak een keuze of de "Alle gebruikers" link moet worden weggelaten, weergegeven of dat alle gebruikers zichtbaar moeten zijn.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Laat "Alle gebruikers" link weg');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Geef "Alle gebruikers" link weer');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Geef altijd alle gebruikers weer');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Configuratie is niet beschrijfbaar:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Configuratie is schrijfbaar:');
DEFINE ('_UDDEIM_FORWARDLINK', 'doorsturen');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'ontvanger gevonden');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'ontvangers gevonden');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (standaard)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'E-mailsysteem');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Selecteer het e-mailsysteem dat moet worden gebruikt door uddeIM voor het versturen van informatie berichten.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Geef joomla groepen weer');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Geef joomla groepen weer in standaard lijsten.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Doorsturen van berichten');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Sta het doorsturen van berichten toe.');
DEFINE ('_UDDEIM_FWDFROM', 'Orgineel bericht van');
DEFINE ('_UDDEIM_FWDTO', 'aan');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Dearchiveer bericht');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Kan het bericht niet dearchiveren');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Sta meerdere ontvangers toe');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Sta meerdere ontvangers toe(geschieden door kommas).');
DEFINE ('_UDDEIM_CHARSLEFT', 'Tekens over');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Geef tekensteller weer');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Laat een teller zien waarop staat aangegeven hoeveel tekens je nog kan gebruiken in het bericht.');
DEFINE ('_UDDEIM_CLEAR', 'Wissen');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Voeg geselecteerde ontvangers toe aan lijst');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Dit geeft de mogelijkheid om naar meerdere gebruikers te sturen.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Voeg CB connecties toe aan lijst');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Dit geeft de mogelijkheid om naar meerdere gebruikers te sturen.');
DEFINE ('_UDDEADM_PMSFOUND', 'Prive Berichten Gevonden: ');
DEFINE ('_UDDEIM_ENTERNAME', 'vul een naam in');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Gebruik automatisch aanvullen');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Gebruik automatisch aanvullen voor het aanvullen van gebruikersnamen.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Sleutel gebruikt voor het versleutelen van de berichten');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Vul sleutel in die wordt gebruikt voor het versleutelen van berichten. LET OP!!! Wijzig deze sleutel niet meer nadat je het versleutelen hebt aangezet.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Fout configuratie bestand gevonden!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Versie gevonden:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Versie verwacht:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Converteren van configuratie');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Done!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Kritieke Fout: Schrijven naar configuratie bestand is mislukt:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Versleuteld bericht! - Downloaden is niet mogelijk!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Fout wachtwoord! - Downloaden is niet mogelijk!');
DEFINE ('_UDDEIM_WRONGPW', 'Fout wachtwoord! - Neem contact op met de database beheerder!');
DEFINE ('_UDDEIM_WRONGPASS', 'Fout wachtwoord!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Foute verwijderings data (inbox/outbox): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Herstellen van foute verwijderings data');
DEFINE ('_UDDEIM_TODP', 'Aan: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Verwijder berichten');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Geef actielink iconen weer');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Wanneer ingesteld op <i>ja</i>, actielinks zullen worden weergegeven als iconen.');
DEFINE ('_UDDEIM_UNCHECKALL', 'deselecteer alles');
DEFINE ('_UDDEIM_CHECKALL', 'selecteer alles');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Geef links beneden weer als iconen.');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Wanneer ingesteld op <i>ja</i>, worden de links beneden weergegeven als iconen.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Gebruik bewegende emoticonen');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Gebruik bewegende emoticonen in plaats van statische emoticonen.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Meer bewegende emoticonen');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Geef meer bewegende emoticonen weer(wordt al popup link weergegeven).');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Versleuteld bericht - Wachtwoord benodigd');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Wachtwoord Benodigd</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Wachtwoord');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (codeer tekst)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (decodeer tekst)');
DEFINE ('_UDDEIM_MORE', 'Meer');

// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Privé Berichten');
DEFINE ('_UDDEMODULE_NONEW', 'geen nieuwe');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nieuwe berichten: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'bericht');
DEFINE ('_UDDEMODULE_MESSAGES', 'berichten');
DEFINE ('_UDDEMODULE_YOUHAVE', 'U heeft');
DEFINE ('_UDDEMODULE_HELLO', 'Hallo');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Express bericht');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Gebruik codering');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Codeer opgeslagen berichten');
DEFINE ('_UDDEADM_CRYPT0', 'Geen');
DEFINE ('_UDDEADM_CRYPT1', 'Versleutel berichten');
DEFINE ('_UDDEADM_CRYPT2', 'Codeer berichten');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Standaard instellingen voor e-mail informatie berichten');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Standaard instellingen voor e-mail informatie berichten (voor gebruikers die hun instellingen nog niet gewijzigd hebben).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Geen');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Altijd');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Alleen als gebruiker offline is');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Verwijder "Alle gebruikers" link');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Verwijder "Alle gebruikers" link bij nieuw bericht pagina(handig als je veel gebruikers hebt).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup informatie');
DEFINE ('_UDDEADM_POPUP_EXP','Geef een popup weer wanneer er een nieuw bericht binnenkomt. (Kan alleen gebruikt worden met een aangepaste versie van mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', 'Meer instellingen');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Hier kan je nog wat extra instellingen doen.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Geef een popup weer wanneer er een nieuw bericht komt');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup informatie bericht');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Zet popup informatie berichten aan (voor gebruikers die hun instellingen nog niet hebben gewijzigd).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Onderhoud');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Database onderhoud');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'Controleer');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'Repareer');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Wanneer een gebruiker is verwijderd van de website zullen zijn berichten in de database blijven. Deze functie controleert of het nodig is om berichten zonder eigenaar te verwijderen. Dit kan ook meteen worden gedaan wanneer er berichten zonder eigenaar zijn.<br />Deze optie controleert ook meteen de database op een paar punten die dan worden verbeterd.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Controleren...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Gebruikersnaam): [inbox|inbox verwijderd|outbox|outbox verwijderd]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>inbox: berichten opgeslagen in gebruikers inbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>inbox verwijderd: berichten verwijderd uit de gebruikers inbox, maar nog steeds in iemand anders outbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>outbox: berichten opgeslagen in de gebruikers outbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>outbox verwijderd: berichten verwijderd uit gebruikers outbox, maar nog steeds in iemand anders inbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Verwijderen...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "Niet gevonden (van/aan/instellingen/blokkade/geblokkeerd):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "verwijder alle instellingen van de gebruiker");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "verwijder blokkade van alle gebruikers");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "verwijder alle berichten verzonden aan verwijderde gebruikers in outbox en de ontvangers inbox");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "verwijderd alle  berichten verzonden van verwijderde gebruikers outbox en de ontvangers inbox");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Niets te doen<b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Onderhoud Benodigd<b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Geef echte namen weer');
DEFINE ('_UDDEADM_NAMESDESC', 'Geef echte namen of gebruikersnamen waar?');
DEFINE ('_UDDEADM_REALNAMES', 'Echte namen');
DEFINE ('_UDDEADM_USERNAMES', 'Gebruikersnaam');
DEFINE ('_UDDEADM_CONLISTBOX', 'Connecties Lijst');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Geef mijn connecties weer in een lijst of in een tabel?');
DEFINE ('_UDDEADM_LISTBOX', 'Lijst');
DEFINE ('_UDDEADM_TABLE', 'Tabel');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Berichten in de prullenbak worden na 48 uur automatisch gewist. Je kan alleen de eerste woorden van het bericht zien. Om het hele bericht te lezen moet je het bericht terug zetten.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Berichten in de prullenbak worden na ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' uur automatisch gewist. Je kan alleen de eerste woorden van het bericht zien. Om het hele bericht te lezen moet je het bericht terug zetten.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Dit bericht is geannuleerd. Je kan het bericht bewerken en opnieuw zenden, of verwijderen.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Het bericht kon niet worden geannuleerd (waarschijnlijk omdat het gelezen of verwijderd is.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Het terug zetten is mislukt. (Waarschijnlijk is het bericht zojuist automatisch gewist.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Het terug zetten is mislukt.');
DEFINE ('_UDDEIM_DONTSEND', 'Verwijderen');
DEFINE ('_UDDEIM_SENDAGAIN', 'Opnieuw zenden');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Je bent niet ingelogd.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Je hebt geen berichten in je Inbox.</strong>');
	// changed in 0.4 (one dot that was too much after  deleted)
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Je hebt geen berichten in je Outbox.</strong>');

DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Je hebt geen berichten in de prullenbak.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Inbox');
DEFINE ('_UDDEIM_OUTBOX', 'Outbox');
DEFINE ('_UDDEIM_TRASHCAN', 'Prullenbak');
DEFINE ('_UDDEIM_CREATE', 'Nieuw bericht');
DEFINE ('_UDDEIM_UDDEIM', 'Prive berichten');
DEFINE ('_UDDEIM_READSTATUS', 'Lezen');
DEFINE ('_UDDEIM_FROM', 'Van');
DEFINE ('_UDDEIM_FROM_SMALL', 'van');
DEFINE ('_UDDEIM_TO', 'Aan');
DEFINE ('_UDDEIM_TO_SMALL', 'aan');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Je Outbox bevat de berichten die je hebt verzonden en door de ander niet zijn verwijderd. Je kan een bericht in je Outbox annuleren of bewerken als de ontvanger het bericht nog niet heeft gelezen. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'annuleren');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Annuleer dit bericht');

DEFINE ('_UDDEIM_RESTORE', 'terug zetten');
DEFINE ('_UDDEIM_MESSAGE', 'Bericht');
DEFINE ('_UDDEIM_DATE', 'Datum');
DEFINE ('_UDDEIM_DELETED', 'Verwijderd');
DEFINE ('_UDDEIM_DELETE', 'Verwijder');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'verwijder');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Dit bericht kan niet worden weergegeven. <br />Mogelijke redenen:<ul><li>Je hebt geen rechten om dit bericht te lezen</li><li>Het bericht is verwijderd</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Je hebt dit bericht naar de prullenbak verplaatst.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Bericht van ');

DEFINE ('_UDDEIM_MESSAGETO', 'Bericht van jezelf aan ');
DEFINE ('_UDDEIM_REPLY', 'Antwoorden');
DEFINE ('_UDDEIM_SUBMIT', 'Sturen');
// DEFINE ('_UDDEIM_DELETEREPLIED', 'Verplaats na het antwoorden het originele bericht naar de prullenbak ');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'Fout: Gebruiker bestaat niet. Bericht is niet verzonden.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Fout: Het bericht bevat geen tekst! Bericht is niet verzonden.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Antwoord is verzonden');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Bericht is verzonden');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' en het originele bericht is naar de prullenbak verplaatst');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Er is geen gebruiker met deze naam!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Het is niet mogelijk berichten aan jezelf te sturen!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Access violation!</b> Je hebt geen rechten deze bewerking uit te voeren!');
DEFINE ('_UDDEIM_PRUNELINK', 'Admins only: Prune');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Administratie');
DEFINE ('_UDDEADM_GENERAL', 'Algemeen');
DEFINE ('_UDDEADM_ABOUT', 'Over');
DEFINE ('_UDDEADM_DATESETTINGS', 'Datum/tijd');
DEFINE ('_UDDEADM_PICSETTINGS', 'Iconen');

DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Gelezen berichten worden zolang bewaard');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Ongelezen berichten worden zolang bewaard');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Verwijderde berichten worden zolang bewaard');
DEFINE ('_UDDEADM_DAYS', 'dag(en)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Vul het aantal dagen in totdat <b>gelezen</b> berichten automatisch worden verwijderd vanuit de inbox. Als je niet wilt dat berichten automatisch worden verwijderd kan je hoog aantal invullen, bijvoorbeeld 36524 dagen wat gelijk staat aan 100 jaar. Onthoud wel dat de database snel vol kan geraken als je alle berichten bewaard.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Vul het aantal dagen in totdat <b>ongelezen</b> berichten automatisch worden verwijderd.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Vul het aantal dagen in totdat <b>verwijderde</b> berichten automatisch worden. Waardes kleiner dan 1 kunnen ook worden gebruikt. Je kan bijvoorbeeld 0.125 gebruiken waardoor berichten na 3 uur worden verwijderd.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Datum weergave formaat');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Kies het formaat waarin de datum en tijd weergegeven moeten worden. Maanden zullen worden aangepast aan de lokale instellingen van je server.');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Langere datum weergave');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Wanneer berichten worden weergeven is er meer plaats voor de datum. Hier kan je dus aangeven hoe de langere datum eruit moet zien.');

DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Automatische verwijdering alleen voor admins');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'Ja, alleen door admins');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'Nee, door elke gebruiker');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatisch verwijderen belast je server en database erg zwaar. Als je kiest voor <i>Ja</i> worden de berichten automatisch verwijderd op het moment dat een admin zijn inbox of outbox bekijkt. Meestal logt een admin meer dan eens per dag in(dit geldt zeker als je meerdere admins hebt). Als je een kleine website hebt waar de admin niet vaak zijn inbox kijkt raden wij je aan om <i>Nee</i> te kiezen. Als je deze optie niet snapt raden wij ook aan om deze opties op <i>Nee</i> te zetten.');

	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Bewaar instellingen');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'De volgende instellingen zijn opgeslagen in het configuratie bestand:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Instellingen zijn bewaard.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icon: Gebruiker is online');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Vul de locatie in van het icoon dat weergegeven moet worden naast de gebruikersnaam als deze gebruiker online is.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icon: Gebruiker is offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Vul de locatie in van het icoon dat weergegeven moet worden naast de gebruikersnaam als deze gebruiker offline is.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Icon: Gelezen bericht');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Vul de locatie in van het icoon dat gelezen berichten aangeeft.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icon: Ongelezen bericht');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Vul de locatie in van het icoon dat ongelezen berichten aangeeft.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Module: Nieuwe berichten Icon');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Deze instelling is voor de mod_uddeim_new module. Vul de locatie in van het icoon dat wordt weergegeven als er nieuwe berichten zijn.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM Installatie');
DEFINE ('_UDDEADM_FINISHED', 'Installatie is afgerond. Welkom bij uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">U heeft Community Builder niet geinstalleerd om goed gebruik van uddeIM te maken raden wij u aan om het te installeren.');
DEFINE ('_UDDEADM_CONTINUE', 'Ga verder');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Er zijn ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' berichten in uw PMS installatie. Wil je ze importeren in uddeIM?');

DEFINE ('_UDDEADM_IMPORT_EXP', 'Dit zal de berichten in je PMS installatie niet wijzigen. Zij zullen worden bewaard. U kunt zonder gevaar de berichten importeren in uddeIM zelfs als je uddeIM alleen uitprobeerd en later weer wil verwijderen als het tegenvalt. Let wel op je moet als je zojuist wijzigen hebt gemaakt in de instellingen van uddeIM deze eerst opslaan voordat je gaat importeren.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Importeer oude PMS berichten nu naar uddeIM');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nee, importeer geen PMS berichten');  
DEFINE ('_UDDEADM_IMPORTING', 'Wacht aub totdat alle berichten geimporteerd zijn.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Klaar met het importeren van berichten uit oudere PMS systemen. Gebruik dit script maar een keer, als je het nog een keer doet komen de berichten dubbel in de database.'); 
DEFINE ('_UDDEADM_IMPORT', 'Importeer');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importeer berichten van oude PMS systemen');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Geen ander PMS installatie gevonden. Importeren is niet mogelijk.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">U heeft al berichten geimporteerd uit het oude PMS systemen in uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Blokkeringen');

DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Niet verzonden (gebruiker heeft je geblokkeerd)');
DEFINE ('_UDDEIM_BLOCKNOW', 'blokkeer&nbsp;gebruiker');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Dit is een lijst van gebruikers die je hebt geblokkeerd. Deze gebruikers kunnen je geen berichten sturen.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Je hebt momenteel niemand geblokkeerd.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Je hebt momenteel ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' gebruiker(s) geblokkeerd.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[deblokkeren]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Als een geblokkeerde gebruiker je een bericht probeert te versuren, zal deze een bericht krijgen dat je deze persoon hebt geblokkeerd en dat het bericht niet verzonden is.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Een geblokkeerde gebruiker kan niet zien dat deze door jou geblokkeerd is.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Je kan geen administrators blokkeren.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Schakel blokkeer systeem in');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Wanneer ingeschakeld, kunnen gebruikers andere gebruikers blokkeren. Een geblokkeerde gebruiker kan geen berichten sturen naar de gebruiker die hem heeft geblokkeerd. Admins kunnen niet worden geblokkeerd.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'ja');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'nee');

DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Geblokkeerde gebruiker krijgt bericht');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Ingesteld op <i>ja</i>, een geblokkeerde gebruiker wordt geinformeerd dat zijn bericht niet is verzonden vanwege het feit dat hij is geblokkeerd. Ingesteld op <i>nee</i>, wordt de geblokkeerde gebruiker niet geinformeerd over het feit dat hij geblokkeerd is.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'ja');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'nee');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blokkeer systeem niet ingeschakeld');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Verwijderingen'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blokkades');


// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Intergratie');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Geef CB links weer');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Wanneer ingesteld op <i>ja</i> zullen alle gebruikersnamen weergegeven worden met een link naar de gebruikers CB profiel.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Geef CB thumbnail weer');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Wanneer ingesteld op <i>ja</i> zullen er thumbnails worden weergegeven met de gebruikers profiel foto uit CB');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Geef online status weer');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Wanneer ingesteld op <i>ja</i> zal er worden weergegeven of de persoon al dan niet wel of niet online is.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Sta e-mail notificatie toe');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Wanneer ingesteld op <i>ja</i>, kan elke gebruiker kiezen of hij of zij e-mail wil hebben elke keer als er een nieuw bericht is in zijn of haar inbox.');

DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail bevat bericht');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Wanneer ingesteld op <i>nee</i> zal deze e-mail alleen informatie geven over het feit dat er een bericht is maar niet de inhoud ervan weergeven.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Vergeetmeniet e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Deze instelling verstuurd onafhankelijk van de profielinstellingen een e-mail naar een gebruiker wanneer een ongelezen bericht al een tijd in de inbox staat. Deze instelling werkt onafhankelijk van de e-mail informatie berichten. Als je helemaal geen e-mails verstuurd wil hebben moet je dus beide functies afzetten.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Vergeetmeniet verzonden na ');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Wanneer de vergeetmeniet optie ingesteld staat op <i>ja</i> vul dan hier in na hoeveel dagen dat moet gebeuren.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Eerste karakters in lijsten');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Hier kunt u aangeven hoeveel karakters van een bericht weergegeven moeten worden in de inbox, outbox, prullenbak.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Maximale bericht lengte');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Geef aan wat de maximale lengte van een bericht is. Het bericht zal na deze lengte worden stopgezet. Je kan hem ook op \'0\' zetten waardoor er geen maximale lengte is.');
DEFINE ('_UDDEADM_YES', 'ja');
DEFINE ('_UDDEADM_NO', 'nee');
DEFINE ('_UDDEADM_ADMINSONLY', 'alleen voor admins');

DEFINE ('_UDDEADM_SYSTEM', 'Systeem');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Systeem berichten gebruikersnaam');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM ondersteund systeem berichten. Er is bij systeem berichten geen gebruiker die ze verstuurd en er is dus ook geen mogelijkheid om te antwoorden op de berichten. Hier kunt u een standaard waarde invullen voor de afzender van de systeem berichten');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Laat admins systeem berichten versturen');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM ondersteund systeem berichten. Zij worden verstuurd naar iedere gebruiker op het systeem. Gebruik deze optie niet te vaak.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-mail afzender naam');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Vul de naam in waarvan de e-mail informatie berichten komen. Bijvoorbeeld je websitenaam');

DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-mail afzender adres');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Vul het e-mail adres in waarvan de e-mail informatie berichten komen. Bijvoorbeeld je websitee-mail');
DEFINE ('_UDDEADM_VERSION', 'uddeIM versie');
DEFINE ('_UDDEADM_ARCHIVE', 'Archief'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Schakel archief in');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Kies of gebruikers de mogelijkheid hebben om berichten op te slaan in een archief. Berichten in het archief worden niet verwijderd.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Maximaal aantal berichten in het archief');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Geef aan hoeveel berichten iedere gebruiker mag hebben in zijn of haar archief. Voor admins zijn er geen limieten.');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Sta het versturen van kopieeen naar jezelf toe');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Geef gebruikers de mogelijkheid om een kopie van hun berichten te ontvangen. Deze kopieeen komen in de inbox.');
DEFINE ('_UDDEADM_MESSAGES', 'Berichten');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Adviseer om het orgineel te verwijderen');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Wanneer deze optie is geactiveerd, zal er een checkbox naast de \'Sturen\' knop worden geplaatst met de optie om het origineel te verwijderen. In dit geval wordt het bericht meteen verplaats naar de prullenbak. Deze optie zorgt ervoor dat er niet teveel berichten in de database komen. Gebruikers kunnen altijd deze optie uitvinken indien zij dit nodig vinden.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL

	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Berichten per pagina');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Geef hier aan hoeveel berichten er op elke pagina mogen staan.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Gebruikte karakterset');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Als je problemen hebt met niet-latijnse karakter sets, kan je het karakterset invullen dat uddeIM moet gebruiken voor het converten van database uitvoer naar HTML uitvoer. Als je niet weet waar dit over gaat moet je deze optie niet wijzigen!!!');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Gebruikte e-mail karakterset');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Als je problemen hebt met niet-latijnse karakter sets, kan je het karakterset invullen dat uddeIM moet gebruiken voor het converten van e-mail berichten. Als je niet weet waar dit over gaat moet je deze optie niet wijzigen!!!');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'

		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'This is the content of the e-mail users will receive when the option is set above. The content of the message will not be in the e-mail. Keep the variables %you%, %user% and %site% intact. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'This is the content of the e-mail users will receive when the option is set above. This e-mail will include the content of the message. Keep the variables %you%, %user%, %pmessage% and %site% intact. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'This is the content of the forgetmenot e-mail users will receive when the option is set above. Keep the variables %you% and %site% intact. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Sta gebruikers toe om berichten te downloaden door ze als e-mail naar zichzelf te sturen.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Sta downloaden toe');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'This is the format of the e-mail users will receive when they download their own messages from the archive. Keep the variables %user%, %msgdate% and %msgbody% intact. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Stel inbox limiet in');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'You can include the number of messages in the inbox into the maximum number of archived messages. In this case, the number of messages in inbox and archive in total must not exceed the number set above. Alternatively, you can set the inbox limit without an archive. In this case, users may have no more than the number of messages set above in their inboxes. If the number is reached, they will no longer be able to reply to messages or to compose new ones until they delete old messages from the inbox or archive respectively. (Users will still be able to receive messages and to read them.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Geef inbox verbruik weer');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Geeft aan hoeveel berichten de gebruiker heeft (en hoeveel hij of zij er mag gebruiken) in een regel onderaan in de inbox.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'U heeft het archief uitgezet. Hoe wil je dat er wordt omgegaan met berichten in het archief?');		


DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Laat ze in archief');  
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Laat ze in het archief (gebruikers hebben geen mogelijkheid om de berichten te bekijken en de berichten zullen nogsteeds gelden als berichtlimiet).');  
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Verplaats naar inbox');  
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Gearchiveerde berichten zijn verplaatst naar de inbox');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Bericht zal worden verplaatst naar de inbox van de gebruiker (of naar de prullebak als ze ouder zijn dan is toegestaan in de inbox).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'geldig voor ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' uren. 0=oneindig (wordt automatisch verwijderd)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Cree&euml;r systeem of algemeen bericht]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Cree&euml;r een normaal (standaard) bericht]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Systeem en algemene berichten niet toestaan.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Soort bericht');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Hulp bij systeem berichten');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(opent in nieuw scherm)');


DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Je staat op het punt het onderstaande bericht te verzenden. Kijk er even naar en bevestig of annuleer het bericht!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Bericht aan <strong>alle gebruikers</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Bericht aan <strong>alle  admins</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Bericht aan <strong>alle ingelogde gebruikers</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Ontvangers kunnen dit bericht niet beantwoorden.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Bericht zal worden verstuurd met <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> als gebruikersnaam');


DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Bericht zal verlopen');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Bericht zal niet verlopen');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Bekijk de link (door er op te klikken) voordat je verder gaat!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Gebruik <strong>alleen in het berichtensysteem </strong>:<br /> [b]<strong>dikgedrukt</strong>[/b] [i]<em>schuingedrukt</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] of [url]http://www.someurl.com[/url] zijn links.');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Waarschuwing: Geen ontvangers gevonden. Bericht zal niet worden verstuurd.');	

		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', 'Je kan niet antwoorden op dit bericht.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail notificatie staat uit. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail notificatie staat aan. ');
DEFINE ('_UDDEIM_SETEMNON', '[aanzetten]');
DEFINE ('_UDDEIM_SETEMNOFF', '[uitzetten]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Hallo %you%, 

%user% heeft je een bericht gestuurd op %site%.
Log in op de website om het bericht te lezen!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Hallo %you%, 

%user% heeft je een prive bericht gestuurd op %site%.
Log in op de website om te antwoorden!
__________________

%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Hallo %you%,

Je hebt nog ongelezen prive berichten op %site%.
Log in op de website om het bericht te lezen! 
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Je hebt nieuwe berichten op %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'verstuur als systeem bericht (=ontvangers kunnen niet antwoorden)');
DEFINE ('_UDDEIM_SEND_TOALL', 'verstuur naar alle gebruikers');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'verstuur naar alle admins');

DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'verstuur naar alle online gebruikers');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Een fout is opgetreden: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Archief is niet actief.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Het verplaatsen naar het archief is mislukt.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Je hebt in het archief ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Je hebt geen berichten in het archief.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' berichten');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'You have stored one message');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Om berichten te bewaren in het archief, moet je eerst andere berichten verwijderen.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Je kan maximaal ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' berichten bewaren.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Je hebt ');

DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' berichten in jouw');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'archief');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'inbox');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'inbox en archief');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Het toegestane maximum is ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Je kan nog steeds berichten ontvangen en lezen, maar niet antwoorden of nieuwe berichten sturen zolang het aantal berichten in je inbox het toegestane limiet overschrijdt.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Aantal berichten in Inbox: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(van max. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Bericht in archief geplaatst.');
DEFINE ('_UDDEIM_STORE', 'archief');
		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'terug');

DEFINE ('_UDDEIM_TRASHCHECKED', 'verwijder geselecteerde');

	// translators info: plural!
	
DEFINE ('_UDDEIM_SHOWALL', 'laat alles zien');
	// translators example "SHOW ALL messages"
	
DEFINE ('_UDDEIM_ARCHIVE', 'Archief');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Archief is vol. Bericht is niet verplaatst.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Geen berichten geselecteerd.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopie van het bericht dat je hebt verzonden naar ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'kopieer naar mijzelf');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopieer naar archief');

DEFINE ('_UDDEIM_TRASHORIGINAL', 'verwijder origineel');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Berichten Download');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail met gekozen berichten is verzonden');
DEFINE ('_UDDEIM_EXPORT_NOW', 'e-mail geselecteerde naar mij');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Deze mail bevat je prive berichten.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Sturen van e-mail is mislukt .');

DEFINE ('_UDDEIM_LIMITREACHED', 'Berichten limiet! Niet terug gezet.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Schrijf een bericht aan ');

$udde_smon[1]="Jan";
$udde_smon[2]="Feb";
$udde_smon[3]="Maa";
$udde_smon[4]="Apr";
$udde_smon[5]="mei";

$udde_smon[6]="Jun";
$udde_smon[7]="Jul";
$udde_smon[8]="Aug";
$udde_smon[9]="Sep";
$udde_smon[10]="Okt";
$udde_smon[11]="Nov";
$udde_smon[12]="Dec";

$udde_lmon[1]="Januari";
$udde_lmon[2]="Februari";
$udde_lmon[3]="Maart";
$udde_lmon[4]="April";
$udde_lmon[5]="Mei";
$udde_lmon[6]="Juni";
$udde_lmon[7]="Juli";
$udde_lmon[8]="Augustus";
$udde_lmon[9]="September";

$udde_lmon[10]="Oktober";
$udde_lmon[11]="November";
$udde_lmon[12]="December";

$udde_lweekday[0]="Zondag";
$udde_lweekday[1]="Maandag";
$udde_lweekday[2]="Dinsdag";
$udde_lweekday[3]="Woensdag";
$udde_lweekday[4]="Donderdag";
$udde_lweekday[5]="Vrijdag";
$udde_lweekday[6]="Zaterdag";

$udde_sweekday[0]="Zo";
$udde_sweekday[1]="Ma";
$udde_sweekday[2]="Di";
$udde_sweekday[3]="Wo";
$udde_sweekday[4]="Do";

$udde_sweekday[5]="Vr";
$udde_sweekday[6]="Za";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Template');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Kies de template welke moet worden gebruikt door uddeIM');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Geef CB connecties weer');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Gebruik <i>ja</i> als je CB geinstalleerd hebt en je wilt dat gebruikers zijn of haar connecties kunnen zien om een bericht te maken.');

DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Geef instellingen weer');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'De instellingen link wordt weergegeven wanneer je gebruikt maakt van e-mail informatie berichten of het blokkeer systeem of de popup informatie berichten. Hier kan je deze instellingen uitzetten indien nodig. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'Ja, onderaan de pagina');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Sta BB Codes toe');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'Alleen lettertypen');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Gebruik <i>alleen lettertypen</i> om gebruikers toe te staan dik, schuin, onderstreept, lettertype kleur en lettergrootte aan te gezen. Als je deze optie op <i>ja</i> zet hebben alle gebruikers toegang tot <strong>alle</strong> ondersteunde BB Codes in hun berichten(zelfs links en afbeeldingen).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Sta emoticonen toe');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Wanneer ingesteld op <i>ja</i> worden emoticonen zoals :-) vervangen door hun grafische variant.');

DEFINE ('_UDDEADM_DISPLAY', 'Weergave');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Geef menu iconen weer');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Wanneer ingesteld op <i>ja</i> worden menu en actie links weergegeven met inconen.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Component titel');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Vul de header in van de component. Deze header komt boven de component als je geen header wil hoef je niets in te vullen.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Geef "About" link weer');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Ingesteld op <i>ja</i> geeft een link weer naar informatie over uddeIM zoals credits en de license. Deze link wordt geplaatst helemaal onderaan de pagina.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Stop alle e-mail nu');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Vink deze checkbox aan om ervoor te zorgen dat uddeIM meteen stopt met het versturen van alle e-mails onafhankelijk van de gebruikers instellingen. Dit is bijvoorbeeld handig bij het testen van nieuwe opties. Wil je dat er uberhaupt nooit e-mail worden verzonden dan moet je de opties hierboven allemaal uitzetten.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'Handmatig');

DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails in lijsten');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Stel in op <i>ja</i> als je wil dat CB thumbnails worden weergegeven in de berichten lijsten zoals inbox, outbox etc.');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Gebruikerslijst');
DEFINE ('_UDDEIM_CONNECTIONS', 'Vriendenlijst');
DEFINE ('_UDDEIM_SETTINGS', 'Mijn Instellingen');
DEFINE ('_UDDEIM_NOSETTINGS', 'Er zijn geen instellingen.');
DEFINE ('_UDDEIM_ABOUT', 'Credits'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Nieuw bericht'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Mail-Notificatie');
DEFINE ('_UDDEIM_EMN_EXP', 'U kunt op verschillende manieren notificaties per email ontvangen.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-mail-notificatie bij nieuwe berichten');

DEFINE ('_UDDEIM_EMN_NONE', 'Geen e-mail-notificaties');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Wel E-mail-notificaties sturen maar niet als ik al online ben');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Geen notificaties sturen als ik antwoorden ontvang op mijn berichten.');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Het blokkeren van vervelende gebruikers.'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'U kunt berichten van vervelende gebruikers blokkeren. Kies <i>Blokkeer gebruiker</i> wanneer u een bericht leest van de betreffende gebruiker.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Opslaan');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB Code tags om de tekst bold te maken : [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB Code tags om de tekst cursief te maken. : [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB Code tags om de tekst onderstreept te maken : [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB Code tags om de letters te kleuren : [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example FF0000 for red.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB Code tags om de letters te kleuren : [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example 00FF00 for green.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB Code tags om de letters te kleuren : [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example 0000FF for blue.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB Code tags om de letters heel klein te maken : [size=1]very small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB Code tags om de letters klein te maken : [size=2] small text.[/size]');

DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB Code tags om de letters groter te maken : [size=4]big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB Code tags om de letters heel groot te maken : [size=5]very big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB Code tags om een link naar een plaatje in te voegen : [img]Image-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB Code tags om een weblink in te voegen : [url]web address[/url]. Vergeet niet de http:// aan het begin van het adres toe te voegen.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Sluit alle BB tags automatisch af.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' bericht in uw'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>U heeft geen berichten in uw archief.</strong>'); 
