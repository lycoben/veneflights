<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2008 Stephan Slabihoud, © 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: Traducció al català feta (source file is Latin-1)
// Translator:     Pablo Querol (aka Seikei), info@joomlacat.org
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
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'none or unknown');
DEFINE ('_UDDEADM_DONATE', 'If you like uddeIM and want to support the development please make a small donation.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Configuration found in database: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Backup and restore configuration');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'You can backup your configuration to the database and restore it when necessary. This is useful when you update uddeIM or when you want to save a certain configuration because of testing.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'BACKUP');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RESTORE');
DEFINE ('_UDDEADM_CANCEL', 'Cancel');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Language file character set');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Usually <strong>default</strong> (ISO-8859-1) is the correct setting for Joomla 1.0 and <strong>UTF-8</strong> for Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'default');
DEFINE ('_UDDEIM_READ_INFO_1', 'Read messages will stay in the inbox for ');
DEFINE ('_UDDEIM_READ_INFO_2', ' days max. before being erased automatically.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Unread messages will stay in the inbox for ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' days max. before being erased automatically.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Sent messages will stay in the outbox for ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' days max. before being erased automatically.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Show inbox note for read messages');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Show inbox note "Read messages will be deleted after n days"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Show inbox note for unread messages');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Show inbox note "Unread messages will be deleted after n days"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Show outbox note for sent messages');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Show outbox note "Sent messages will be deleted after n days"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Show trashcan note for trashed messages');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Show trashcan note "Trashed messages will be purged after n days"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Sent messages kept for (days)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Enter the number of days until <b>sent</b> messages will automatically be erased from the outbox.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'send to all special users');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Message to <strong>all special users</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- select username -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- select name -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Edit user settings');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'existing');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'non existing');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- select entry -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- select notification -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- select popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Username');
DEFINE ('_UDDEADM_USERSET_NAME', 'Name');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Notification');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Last access');
DEFINE ('_UDDEADM_USERSET_NO', 'No');
DEFINE ('_UDDEADM_USERSET_YES', 'Yes');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'unknown');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'When offline (except replies)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Always (except replies)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'When offline');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Always');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'No notification');
DEFINE ('_UDDEADM_WELCOMEMSG', "Welcome to uddeIM!\n\nYou have succesfully installed uddeIM.\n\nTry viewing this message with different templates. You can set them in the administration backend of uddeIM.\n\nuddeIM is a project in development. If you find bugs or weaknesses, please write them to me so that we can make uddeIM better together.\n\nGood luck and have fun!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM installation complete.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Please continue to the administration backend and review the settings.');
DEFINE ('_UDDEADM_REVIEWLANG', 'If you are running the CMS in a character set other than ISO 8859-1 make sure to adjust the settings accordingly.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'After installation, all uddeIM email traffic (email notifications, fotgetmenot emails) is disabled so that no emails are sent as long as you are testing. Do not forget to disable "stop email" in the backend when you are finished.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. recipients');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Max. number of recipients which are allowed per message (0=no limitation)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'too many recipients');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Sending of emails disabled.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Inside text searching');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Autocompleter searches inside the text (otherwise it searches from the beginning only)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Suppress "All Users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Show "All Users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Always show all users');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Configuration is not writeable:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Configuration is writeable:');
DEFINE ('_UDDEIM_FORWARDLINK', 'forward');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'recipient found');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'recipients found');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (default)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Mailsystem');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Select mailsystem uddeIM should use to send notifications.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Show Joomla groups');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Show Joomla groups in general message list.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Forwarding of messages');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Allow forwarding of messages.');
DEFINE ('_UDDEIM_FWDFROM', 'Original message from');
DEFINE ('_UDDEIM_FWDTO', 'to');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Unarchive message');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Cannot unarchive message');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Allow multiple recipients');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Allow multiple recipients (comma separated).');
DEFINE ('_UDDEIM_CHARSLEFT', 'characters left');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Show text counter');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Shows a text counter which displays how many characters are left.');
DEFINE ('_UDDEIM_CLEAR', 'Clear');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Append selected users to recipients');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'This allows selection of multiple recipients from "All users" list.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Append selected connections to recipients');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'This allows selection of multiple recipients from "CB connections" list.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS found: ');
DEFINE ('_UDDEIM_ENTERNAME', 'enter a name');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Use autocomplete');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Use autocomplete for receiver names.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Key used for obfuscating');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Enter key which is used for message obfuscating. Do not change this value after message obfuscating has been enabled.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Wrong confguration file found!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Version found:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version expected:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Converting configuration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Done!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Critical Error: Failed to write to configuration file:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Encrypted message! - Download not possible!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Wrong password! - Download not possible!');
DEFINE ('_UDDEIM_WRONGPW', 'Wrong password! - Please contact database administrator!');
DEFINE ('_UDDEIM_WRONGPASS', 'Wrong password!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Wrong trash dates (inbox/outbox): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Correcting wrong trash dates');
DEFINE ('_UDDEIM_TODP', 'To: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Prune messages now');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Show action icons');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'When set to <i>yes</i>, action links will be displayed with an icon.');
DEFINE ('_UDDEIM_UNCHECKALL', 'uncheck all');
DEFINE ('_UDDEIM_CHECKALL', 'check all');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Show bottom icons');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'When set to <i>yes</i>, bottom links will be displayed with an icon.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Use animated smileys');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Use animated smileys instead of the static ones.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'More animated smileys');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Show more animated smileys.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Encrypted message - Password required');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Password required</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Password');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (encryption text)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (decryption text)');
DEFINE ('_UDDEIM_MORE', 'MORE');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Private Messages');
DEFINE ('_UDDEMODULE_NONEW', 'no new');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'New messages: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'message');
DEFINE ('_UDDEMODULE_MESSAGES', 'messages');
DEFINE ('_UDDEMODULE_YOUHAVE', 'You have');
DEFINE ('_UDDEMODULE_HELLO', 'Hi');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Express message');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Use encryption');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Encrypt stored messages');
DEFINE ('_UDDEADM_CRYPT0', 'None');
DEFINE ('_UDDEADM_CRYPT1', 'Obfuscate messages');
DEFINE ('_UDDEADM_CRYPT2', 'Encrypt messages');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Default for email notification');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Default value for email notification (for users who have not changed their preferences yet).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'No notification');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Always');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Notification when offline');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Supress "All users" link');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Supress "All users" link in write new message box (useful when lots of users are registered).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup notification');
DEFINE ('_UDDEADM_POPUP_EXP','Show a popup when a new message arrives (mod_uddeim or patched mod_cblogin is needed)');
DEFINE ('_UDDEIM_OPTIONS', 'More settings');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Here you can configure some more settings.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Show a popup when a new message arrives');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup notification by default');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Enable popup notification by default (for users who have not changed their preferences yet).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Maintenance');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Database maintenance');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'CHECK');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'REPAIR');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "When a user is purged from the database his messages are usually kept in the database. This function checks if it is necessary to trash orphaned messages and you can trash them if it is required.<br />This also checks the database for a few errors which will be corrected.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Checking...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Username): [inbox|inbox trashed|outbox|outbox trashed]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>inbox: messages stored in users inbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>inbox trashed: messages trashed from users inbox, but still in someones outbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>outbox: messages stored in users outbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>outbox trashed: messages trashed from users outbox, but still in someones inbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Trashing...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "not found (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "delete all preferences from user");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "delete blocking of user");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "trash all messages sent to deleted user in sender\'s outbox and deleted user\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "trash all messages sent from deleted user in his outbox and receiver\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nothing to do</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Maintenance required</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Mostra noms reals');
DEFINE ('_UDDEADM_NAMESDESC', 'Mostra noms reals o noms d\'usuari?');
DEFINE ('_UDDEADM_REALNAMES', 'Noms reals');
DEFINE ('_UDDEADM_USERNAMES', 'Noms d\'usuari');
DEFINE ('_UDDEADM_CONLISTBOX', 'Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Mostrar les meves connexions en una capa amb una llista o en una taula?');
DEFINE ('_UDDEADM_LISTBOX', 'Capsa amb llista');
DEFINE ('_UDDEADM_TABLE', 'Taula');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Els missatges estaran en la paperera durant 24 hores abans de ser esborrats. Només podeu veure les primeres paraules del missatge. Per a llegir el missatge sencer primer heu de restaurar-lo.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Els missatges estaran en la paperera durant ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' hores abans de ser esborrats. Només podeu veure les primeres paraules del missatge. Per a llegir el missatge sencer primer heu de restaurar-lo.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Aquest missatge ha estat memoritzat. Ara podeu editar-lo i tornar-lo a enviar.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'No s\'ha pogut memoritzar el missatge (probablement perquè ha estat llegit o esborrat.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Restauració del missatge fallida. (Segurament ha estat en la paperera massa temps i ha estat esborrat.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Restauració del missatge fallida.');
DEFINE ('_UDDEIM_DONTSEND', 'No enviar');
DEFINE ('_UDDEIM_SENDAGAIN', 'Reenviar');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'No esteu identificat.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>No teniu missatges en la safata d\'entrada.</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>No teniu missatges en la safata de sortida.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>No teniu missatges en la paperera.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Safata d\'entrada');
DEFINE ('_UDDEIM_OUTBOX', 'Safata de sortida');
DEFINE ('_UDDEIM_TRASHCAN', 'Paperera');
DEFINE ('_UDDEIM_CREATE', 'Nou missatge');
DEFINE ('_UDDEIM_UDDEIM', 'Missatges privats');
DEFINE ('_UDDEIM_READSTATUS', 'Llegit');
DEFINE ('_UDDEIM_FROM', 'De');
DEFINE ('_UDDEIM_FROM_SMALL', 'de');
DEFINE ('_UDDEIM_TO', 'Per a');
DEFINE ('_UDDEIM_TO_SMALL', 'per a');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'La safata de sortida conté tots els missatges que heu enviat que encara no han estat esborrats. Podeu memoritzar un missatge en la safata de sortida si no ha estat llegit. Si ho feu, ja no pot més ser llegit pel recipient. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'memoritza');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Memoritza aquest missatge');
DEFINE ('_UDDEIM_RESTORE', 'restaura');
DEFINE ('_UDDEIM_MESSAGE', 'Missatge');
DEFINE ('_UDDEIM_DATE', 'Data');
DEFINE ('_UDDEIM_DELETED', 'Esborrat');
DEFINE ('_UDDEIM_DELETE', 'esborra');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'esborra');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'No es pot mostrar aquest missatge. <br />Raons possibles:<ul><li>No teniu permís per a llegir aquest missatge particular</li><li>Aquest missatge ha estat esborrat</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Heu mogut aquest missatge a la paperera.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Missatge de ');
DEFINE ('_UDDEIM_MESSAGETO', 'Missatge de tu mateix per a ');
DEFINE ('_UDDEIM_REPLY', 'Respón');
DEFINE ('_UDDEIM_SUBMIT', 'Envia');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Mou el missatge original a la paperera després de respondre');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'Error: no s\'ha trobat el destinatari. El missatge no s\'ha enviat.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Error: El missatge no conté text! El missatge no s\'ha enviat.');
DEFINE ('_UDDEIM_REFERAFTERSAVING', 'index.php?option=com_uddeim');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Resposta enviada');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Missatge enviat');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' i el missatge original s\'ha mogut a la paperera');
DEFINE ('_UDDEIM_NOSUCHUSER', 'No hi ha cap usuari amb aquest nom d\'usuari!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'No és possible enviar-vos missatges a vós mateix!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Accés denegat!</b> No teniu permís per a dur a terme aquesta acció!');
DEFINE ('_UDDEIM_PRUNELINK', 'Només administradors: Passa');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'Administració d\'uddeIM');
DEFINE ('_UDDEADM_GENERAL', 'General');
DEFINE ('_UDDEADM_ABOUT', 'Sobre');
DEFINE ('_UDDEADM_DATESETTINGS', 'Data/hora');
DEFINE ('_UDDEADM_PICSETTINGS', 'Icones');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Missatges llegits desats durant (dies)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Missatges no llegits desats durant (dies)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Missatges desats a la paperera durant (dies)');
DEFINE ('_UDDEADM_DAYS', 'die(s)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Introduïu el nombre de dies fins que els missatges <b>llegits</b> s\'esborraran de forma automàtica de la safata d\'entrada. Si no voleu esborrar missatges automàticament, introduïu un valor molt alt (per exemple, 36524 dies equivalen a un segle). Però tingueu en compte que la base de dades pot omplir-se ràpidament si deseu tots els missatges.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Introduïu el nombre de dies fins que els missatges que encara <b>no han estat llegits</b> pel volgut receptor seran esborrats.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Introduïu el nombre de dies fins que els missatges a la paperera seran esborrats. Els valors per sota de 1 estan permesos. Exemple: per a esborrar missatges de la paperera després de 3 hores, introduïu 0.125 com a valor.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Format d\'exhibició de la data');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Escolliu el format en que la data/hora es mostra. Els mesos seran abreujats segons la vostra configuració local de la llengua (si existeix el corresponent arxiu de llengua).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Exhibició llarga de la data');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Quan es mostren els missatges hi ha més espai per a l\'exhibició de la data. Escolliu el format de la data per a exhibir-se quan s\'obri un missatge. Pels noms dels dies de la setmana i els mesos, la configuració local de la llengua serà emprada (si existeix el corresponent arxiu de llengua de uddeIM).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Eliminació invocada només per administradors');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'sí, només per administradors');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'no, per qualsevol usuari');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Les eliminacions automàtiques suposen una càrrega considerable en els servidors i en les bases de dades. SI escolliu <i>sí,&nbsp;by&nbsp;només&nbsp;administradors</i> les eliminacions automàtiques segons la configuració a sobre (dels missatges de tots els usuaris) són invocades quan qualsevol administrador/a miri la seva safata d\'entrada. Escolliu aquesta opció si un/a administrador/a mira la seva safata d\'entrada al menys un cop al dia o més sovint, com és el cas en la majoria dels llocs web. (Si el teu lloc web té més d\'un/a administrador/a, no importa quin/a és el/la que ho faci ja que les eliminacions són invocades automàticament per qualsevol administrador/a.) A llocs web petits o poc administrats on els/les administradors/es rarament miren les seves safates d\'entrada, escolliu <i>no,&nbsp;by&nbsp;qualsevol&nbsp;usuari</i>. Si no ho enteneu o no sabeu què fer, escolliu <i>no, per qualsevol usuari</i>.');
DEFINE ('_UDDEADM_ABOUTTEXT', ' 
<strong>udde Instant Messages (uddeIM)</strong><br />
Instant Messages System for Mambo 4.5.X/Joomla 1.0.X<br />
Author:         Benjamin Zweifel<br />
Language File:  catalan.php<br />
Autor:         Pablo Querol per a Joomlacat.org - La casa del Joomla! català<br />
Copyright:      © by Benjamin Zweifel<br />
This is free software and you may redistribute it under the GPL.
uddeIM comes with absolutely no warranty. For details, see the license at
 <a href="http://www.gnu.org/licenses/gpl.txt">www.gnu.org/licenses/gpl.txt</a>.
');
	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Desa configuració');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'S\'ha desat els paràmetres següents a l\'arxiu de configuració:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'S\'ha desat la configuració.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icona: usuari connectat');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Introduïu la localització de la icona que es mostrarà al costat del nom d\'usuari quan aquest usuari estigui connectat.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icona: usuari desconnectat');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Introduïu la localització de la icona que es mostrarà al costat del nom d\'usuari quan aquest usuari estigui desconnectat.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Icona: missatge llegit');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Introduïu la localització de la icona que es mostrarà pels missatges llegits.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icona: missatge no llegit');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Introduïu la localització de la icona que es mostrarà pels missatges no llegits.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Mòdul: icona pels nous missatges');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Aquest paràmetre fa referència al mòdul mod_uddeim_new. Introduïu la localització de la icona que aquest mòdul exhibirà quan hi hagi nous missatges.');

// uddeIM Module

DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Missatges Privats');
DEFINE ('_UDDEMODULE_NONEW', 'no hi ha nous');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nous missatges: ');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'Instal·lació de l\'uddeIM');
DEFINE ('_UDDEADM_FINISHED', 'La instal·lació ha acabat. Benvinguts/des a uddeIM 0.5 . ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">No teniu el component Community Builder instal·lat. No podreu fer servir uddeIM.</span><br /><br />Us heu de descarregar el <a href="http://www.joomlapolis.com">Community Builder</a> i també us podeu descarregar <a href="http://www.joomlacat.org">la traducció al català</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continua');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Hi ha ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' missatges en la instal·lació del myPMS. Voleu importar-los al uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Això no alterarà els missatges del myPMS o la instal·talació. Romandran intactes. Podeu importar-los a uddeIM amb seguretat, fins i tot si considereu continuar utilitzant myPMS. (Primer hauríeu de desar qualsevol canvi que hagueu fet en la configuració abans de començar la importació!) Qualsevol missatge que tingueu en la base de dades de uddeIM romandrà intacte.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Importa els missatges de myPMS a uddeIM ara');
DEFINE ('_UDDEADM_IMPORT_NO', 'No, no importis cap missatge');  
DEFINE ('_UDDEADM_IMPORTING', 'Si us plau espereu mentre els missatges s\'importen.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Els missatges de myPMS s\'han importat. No torneu a fer anar aquest script d\'instal·lació un altre cop perquè fer-ho suposaria importar els missatges un altre cop i es mostraran per partida doble.'); 
DEFINE ('_UDDEADM_IMPORT', 'Importa');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importa missatges des de myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'No s\'ha trobat cap instal·lació de myPMS. No és possible importar.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Ja heu importat els missatges des de myPMS a uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Bloquejat');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'No s\'ha enviat (l\'usuari t\'ha bloquejat)');
DEFINE ('_UDDEIM_BLOCKNOW', 'bloquejar&nbsp;usuari');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Aquesta és una llista d\'usuaris que has bloquejat. Aquests usuaris no poden enviar-te missatges privats.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Actualment no has bloquejat a cap usuari.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Actualment has bloquejat ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' usuari(s).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[desbloquejar]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Si un usuari bloquejat intenta enviar-te un missatge, ell o ella serà informat/da que està bloquejat/da i que el missatge no s\'ha enviat.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Un usuari no pot veure que l\'has bloquejat.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'No pots bloquejar administradors.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Permetre el sistema de bloqueig');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Quan està permès, els usuaris poden bloquejar altres usuaris. Un usuari bloquejat no pot enviar missatge a l\'usuari que l\'ha bloquejat/da. Els/les administradors/res no poden ser bloquejats/des.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'sí');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'no');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Els usuaris bloquejats reben un missatge');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Si està marcat com a <i>sí</i>, s\'informarà a un usuari bloquejat que el seu missatge no s\'ha enviat perquè el receptor l\'ha bloquejat. Si està marcat com a <i>no</i>, l\'usuari bloquejat no rep cap notificació sobre el fet que el seu missatge no s\'ha enviat.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'sí');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'no');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistema de bloqueig no permès');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Eliminacions'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Bloqueig');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integració');
DEFINE ('_UDDEADM_EMAIL', 'Correu');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Mostra els enllaços de CB');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Quan està marcat com a <i>sí</i>, tots els noms d\'usuari que es mostrin a uddeIM seran mostrats com a enllaços al seu perfil de Community Builder.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Mostra el thumbnail de CB');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Quan està marcat com a <i>sí</i>, el thumbnail de l\'usuari respectiu serà exhibit quan es llegeixi un missatge seu (sempre i quan l\'usuari tingui un avatar en el seu perfil de Community Builder).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Mostra l\'estat de connectat');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Quan està marcat com a <i>sí</i>, uddeIM mostra cada nom d\'usuari amb una icona petita que informa si l\'usuari està connectat o desconnectat. Podeu escollir les icones en  l\'apartat d\'administració d\'icones.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Permet la notificació per correu');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Quan està marcat com a <i>sí</i>, cada usuari pot escollir si vol rebre un correu electrònic cada cop que un nou missatge arriba a la seva safata d\'entrada.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'El correu conté contingut');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Quan està marcat com a <i>no</i>, el correu només contindrà informació sobre sobre quan s\'ha enviat el missatge i qui ho ha fet, però no el missatge enviat.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Correu "us heu oblidat"');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Aquesta característica permet enviar - independentment de la configuració de l\'usuari - un correu a un usuari que té un missatge no llegit durant molt de temps a la safata d\'entrada (la durada es determina a sota). Aquest paràmetre és independent del de notificació per correu de a dalt. Si mai no voleu enviar cap missatge per correus, heu de desactivar ambdós paràmetres.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Correu "us heu oblidat" enviat després de die(s)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Si la característica "us heu oblidat" (amunt) està marcada com a <i>sí</i>, introduïu aquí el nombre de dies que han de pasar sense que un missatge no es llegeixi per a que els correus "us heu oblidat" s\'enviïn.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Primers caràcters');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Podeu inserir el nombre de caràcters d\'un missatge que es mostraran a la safata d\'entrada, la de missatges enviats i la paperera.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Longitud màxim d\'un missatge');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Inseriu aquí la longitud màxima d\'un message. Si un missatge supera aquest límit, serà tallat automàticament. Fixeu a \'0\' per a permetre missatges de qualsevol llargada (no recomenat).');
DEFINE ('_UDDEADM_YES', 'sí');
DEFINE ('_UDDEADM_NO', 'no');
DEFINE ('_UDDEADM_ADMINSONLY', 'només administradors');
DEFINE ('_UDDEADM_SYSTEM', 'Sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Nom d\'usuari del sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'Amb uddeIM es permeten missatges del sistema. Els missatges del sistema no tenen un remitent visible i els usuaris no els poden respondre. Introduïu aquí el nom d\'usuari per defecte pels missatges del sistema (per exemple <i>Suport</i> o <i>Ajuda tècnica</i> o <i>Administrador de la Comunitat</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Permet als administradors enviar missatges generals');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'Amb uddeIM es permeten missatges generals. S\'envien a cada usuari del teu sistema. Feu un ús raonable.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nom del remitent per correu');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Introduïu el nom del remitent de les notificacions per correu (per exemple <i>NOMDELATEVAWEB</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adreça de correu del remitent');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Introduïu l\'adreça de correu del remitent de les notificacions per correu (hauria de ser l\'adreça principal de la teva pàgina).');
DEFINE ('_UDDEADM_VERSION', 'Versió del uddeIM');
DEFINE ('_UDDEADM_ARCHIVE', 'Arxiu'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Permet l\'arxiu');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Escolliu si voleu permetre o no que els usuaris puguin emmagatzemar missatges en un arxiu. No es podran esborrar els missatges en un arxiu.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Màxim de missatges en l\'arxiu d\'un usuari');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Deicidiu quin és el nombre màxim de missatges que cada usuari pot emmagatzemar en el seu arxiu (no hi ha límit pels administradors).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Permet còpies per a un mateix');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Això permetria als usuaris rebre còpies dels missatges que envien. Aquestes còpies apareixeran a la safata d\'entrada.');
DEFINE ('_UDDEADM_MESSAGES', 'Missatges');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Suggereix enviar a la paperera l\'original');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Quan està actiu, aquest paràmetre posarà una casella al costat del botó de \'Envia\' en la resposta a un missatge, anomenada \'elimina l\'original\' i que estaria selecciona per defecte. En aquest cas, el missatge es mourà immediatament de la safata d\'entrada a la paperera quan la resposta s\'hagi enviat. Gràcies a aquesta funció, el nombre de missatges a la base de dades serà (més) petit. Els usuaris sempre podran deseleccionar la casella si volen conservar l\'original a la safata d\'entrada.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Missatges per pàgina');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Definiu aquí el nombre de missatges exhibits per pàgina a la safata d\'entrada, la de missatges enviats, la paperera i l\'arxiu.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Charset utilitzat');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Si estiu experimentant problemes amb l\'exhibició de caràcters no-llatins, podeu introduir el charset que uddeIM empra per a convertir el output de la base de dades en codi HTML aquí. <b>Si no enteneu el que això vol dir, no canvieu el valor per defecte!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Charset utilitzat per correu');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Si estiu experimentant problemes amb l\'exhibició de caràcters no-llatins, podeu introduir el charset que uddeIM empra per a enviar correus. <b>Si no enteneu el que això vol dir, no canvieu el valor per defecte!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Aquest és el contingut del correu que els usuaris rebran si la opció corresponent és seleccionada amunt. El contingut del missatge no estarà en el correu. Manteniu les variables %you%, %user% i %site% intactes. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Aquest és el contingut del correu que els usuaris rebran si la opció corresponent és seleccionada amunt. Aquest correu inclourà el contingut del missatge. Manteniu les variables %you%, %user%, %pmessage% i %site% intactes. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Aquest és el contingut del correu  "us heu oblidat" que els usuaris rebran si la opció corresponent és seleccionada amunt. Manteniu les variables %you% i %site% intactes. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Permet als usuaris descarregar-se missatges des del seu arxiu enviant-se a ells mateixos un correu.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Permet la descàrrega');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Aquest és el format del correu que els usuaris rebran quan es descarreguin els seus propis missatges des de l\'arxiu. Manteniu les variables %user%, %msgdate% i %msgbody% intactes. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Establiu el límit de la safata d\'entrada');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Podeu incloure el nombre de missatges a la safata d\'entrada en el nombre màxim d\'arxius arxivats. En aquest cas, el nombre de missatges a la safata d\'entrada i a l\'arxiu no han d\'excedir, en total, el nombre introduït amunt. Com a alternativa, podeu especificar el límit de la safata d\'entrada sense un arxiu. En aquest cas, els usuaris no tindran més missatges que el nombre establert amunt en la seva safata d\'entrada. Si s\'arriba a aquesta xifra, no podran respondre més missatges o redactar-ne de nous fins que no esborrin missatges antics des de la safata d\'entrada o des de l\'arxiu respectivament. (Encara podran rebre missatges i llegir-los.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Mostra el límit d\'ús a la safata d\'entrada');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Això mostra quans missatges els usuaris han emmagatzemat (i quants poden desar) en una línia a sota la safata d\'entrada.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Heu desactivat l\'arxiu. Com voleu gestionar els missatges que estan desats a l\'arxiu?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Deixa\'ls');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Deixa\'ls en l\'arxiu (l\'usuari no podrà accedir-hi i els missatges encara es tindran en compte en els límits de missatges).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Mou-los a la safata d\'entrada');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Missatges arxivats moguts a les safates d\'entrada');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Els missatges es mouran a la safata d\'entrada de l\'usuari respectiu (o a la paperera si són més antics del que es permet tenir a la safata d\'entrada).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'vàlid per a ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' hores. 0=sempre (eliminacions automàtiques es tenen en compte)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Crea un missatge del sistema o general]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Crea un missatge normal (standard)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Missatges del sistema o generals no permesos.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Tipus de missatge');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Ajuda sobre missatges del sistema');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(s\'obra en una nova finestra)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Esteu a punt d\'enviar el missatge mostrat a sota. Si us plau reviseu-lo i confirmeu o cancel·leu!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Missatge per a <strong>tots els usuaris</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Missatge per a <strong>tots els administradors</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Missatge per a <strong>tots els usuaris actualment connectats</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Els receptors no podran respondre a aquest missatge.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'El missatge s\'enviarà amb <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> com a nom d\'usuari');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'El missatge caducarà ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'El missatge no caducarà ');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Feu clic en aquest enllaç abans de procedir!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Ús <strong>en missatges del sistema només</strong>:<br /> [b]<strong>negreta</strong>[/b] [i]<em>cursiva</em>[/i]<br />
[url=http://www.algunaurl.com]alguna direcció[/url] o [url]http://www.algunaurl.com[/url] són enllaços');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Error: no s\'han trobat receptors. El missatge no s\'ha enviat.');		
		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', 'No podeu respondre aquest missatge.');
DEFINE ('_UDDEIM_EMNOFF', 'La notificació per correu està desactivada. ');
DEFINE ('_UDDEIM_EMNON', 'La notificació per correu està activada. ');
DEFINE ('_UDDEIM_SETEMNON', '[activar-la]');
DEFINE ('_UDDEIM_SETEMNOFF', '[desactivar-la]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Hola %you%, 

%user% us ha enviat un missatge privat a Joomlacat.org .
Si us plau entreu-hi per a llegir-lo!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Hola %you%, 

%user% us ha enviat el següent missatge privat a Joomlacat.org .
Si us plau entreu-hi per a respondre!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Hola %you%,

Teniu missatges sense llegir a Joomlacat.org .
Si us plau entreu-hi per a llegir-los! 
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Teniu missatges a Joomlacat.org');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'envia com a missatge del sistema (els receptors no el podran respondre)');
DEFINE ('_UDDEIM_SEND_TOALL', 'envia a tots els usuaris');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'envia a tots els administradors');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'envia a tots els usuaris connectats');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Error inesperat: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arxiu no permès.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'El magatzematge del missatge en l\'arxiu ha fallat.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Teniu guardats ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Encara no heu emmagatzemat cap missatge en l\'arxiu.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' missatges');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Teniu emmagatzemat un missatge');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Per a emmagatzemar missatges, primer heu d\'esborrar altres missatges.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Podeu emmagatzemar un màxim de ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' missatges.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Teniu ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' missatges en');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'l\'arxiu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'la safata d\'entrada');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'en l\'arxiu i la safata d\'entrada');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'El màxim permès és ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Encara podeu rebre i llegir missatges però no podreu respondre\'ls o redactar-ne de nous fins que esborreu missatges.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Missatges emmagatzemats: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(de màx. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Missatge emmagatzemat en l\'arxiu.');
DEFINE ('_UDDEIM_STORE', 'arxiu');
		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'torna');

DEFINE ('_UDDEIM_TRASHCHECKED', 'esborra seleccionats');
	// translators info: plural!
	
DEFINE ('_UDDEIM_SHOWALL', 'mostra-los tots');
	// translators example "SHOW ALL messages"
	
DEFINE ('_UDDEIM_ARCHIVE', 'Arxiu');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arxiu ple. No s\'ha emmagatzemat.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'No hi ha missatges seleccionats.');
DEFINE ('_UDDEIM_THISISACOPY', 'Còpia del missatge que vau enviar a ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'còpia per a mi');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'còpia per a l\'arxiu');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'llença l\'original');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Descarrega missatge');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Email enviat amb els missatges exportats');
DEFINE ('_UDDEIM_EXPORT_NOW', 'email enviat a mi');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Aquest correu inclou els vostres missatges privats.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'No s\'ha pogut enviar el correu contenint els missatges.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Límit del missatge! No restaurat.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Escriu un missatge a ');

$udde_smon[1]="Gen";
$udde_smon[2]="Feb";
$udde_smon[3]="Març";
$udde_smon[4]="Abr";
$udde_smon[5]="Maig";
$udde_smon[6]="Juny";
$udde_smon[7]="Jul";
$udde_smon[8]="Ago";
$udde_smon[9]="Set";
$udde_smon[10]="Oct";
$udde_smon[11]="Nov";
$udde_smon[12]="Des";

$udde_lmon[1]="Gener";
$udde_lmon[2]="Febrer";
$udde_lmon[3]="Març";
$udde_lmon[4]="Abril";
$udde_lmon[5]="Maig";
$udde_lmon[6]="Juny";
$udde_lmon[7]="Juliol";
$udde_lmon[8]="Agost";
$udde_lmon[9]="Setembre";
$udde_lmon[10]="Octubre";
$udde_lmon[11]="Novembre";
$udde_lmon[12]="Desembre";

$udde_lweekday[0]="Diumenge";
$udde_lweekday[1]="Dilluns";
$udde_lweekday[2]="Dimarts";
$udde_lweekday[3]="Dimecres";
$udde_lweekday[4]="Dijous";
$udde_lweekday[5]="Divendres";
$udde_lweekday[6]="Dissabte";

$udde_sweekday[0]="Dg";
$udde_sweekday[1]="Dl";
$udde_sweekday[2]="Dt";
$udde_sweekday[3]="Dc";
$udde_sweekday[4]="Dj";
$udde_sweekday[5]="Dv";
$udde_sweekday[6]="Ds";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'Plantilla uddeIM');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Escolliu la plantilla que voleu que uddeIM empri');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Mostra les Connexions de CB');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Escolliu <i>Sí</i> si teniu instal·lat Community Builder i voleu presentar a l\'usuari el nom de la seva o les seves connexions en la pàgina de la redacció d\'un nou missatge.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Mostra\'m la configuració');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'L\'enllaç a la Configuració apareix a uddeIM si teniu activat la notificació per correu o el sistema de bloqueig. Si no voleu això, podeu desactivar-lo aquí. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'sí, a la part inferior');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Permet el codi BB');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'només formats de font');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Escolliu <i>només formats de font</i> per a permetre als usuaris utilitzar el codi BB per a negreta, subratllat i tamany i color de les lletres. Quan marqueu aquesta opció com a <i>sí</i>, els usuaris poden emprar <strong>tots</strong> els codis BB en els seus missatges (fins i tot enllaços i imatges).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Permetre emoticones');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Quan està marcat com a <i>sí</i>, els codis d\'emoticones com ara :-) són reemplaçats per gràfics amb emoticones en la visualització del missatge. Llegiu l\'arxiu readme per a una llista de les emoticones possibles.');
DEFINE ('_UDDEADM_DISPLAY', 'Exhibeix');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Mostra les icones del menú');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Quan està marcat com a <i>sí</i>, els enllaços del menú i de l\'acció es mostraran amb una icona.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Títol del component');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Introduïu el títol del component de missatgeria privada, per exemple \'Missatges privats\'. Deixeu-ho en blanc si no voleu mostrar cap títol.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Mostra l\'enllaç Sobre');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Marqueu-ho com a <i>sí</i> per a mostrar un enllaç als crèdits del software uddeIM i la llicència. Aquest enllaç es situarà a la part de sota de l\'output del HTML de uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Atura ara el correu');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Marqueu aquesta casella per a prevenir uddeIM d\'enviar correus (notificacions per correu i correus "no oblidis") sense tenir en compte la configuració dels usuaris, per exemple mentre s\'està provant el lloc web. Si no voleu mai aquestes opcions, marqueu totes les opcions de a dalt com a <i>no</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manualment');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'Thumbnails de CB en les llistes');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Marqueu-ho com a <i>sí</i> si voleu mostrar els thumbnails de CB dels usuaris en les llistes de missatges (safata d\'entrada, missatges enviats, etc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Mostra usuaris');
DEFINE ('_UDDEIM_CONNECTIONS', 'Connexions');
DEFINE ('_UDDEIM_SETTINGS', 'Configuració');
DEFINE ('_UDDEIM_NOSETTINGS', 'No hi ha res per a configurar.');
DEFINE ('_UDDEIM_ABOUT', 'Sobre'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Redacta'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Notificació per email');
DEFINE ('_UDDEIM_EMN_EXP', 'Podeu rebre un email quan rebeu un nou missatge privat.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Notificació per email de nous missatges');
DEFINE ('_UDDEIM_EMN_NONE', 'No notificació per email');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Notificació per email quan esteu desconnectat/da');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'No enviar notificació de respostes');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Bloqueig d\'usuari'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Podeu prevenir que usuaris us enviïn missatges bloquejant-los. Escolliu <i>bloquejar usuari</i> quan veieu un missatge del respectiu usuari.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Desa canvis');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'Etiqueta BB Code per a produir text en negreta. Ús: [b]negreta[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'Etiqueta BB Code per a produir text en cursiva. Ús: [i]cursiva[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'Etiqueta BB Code per a produir text subratllat. Ús: [u]subratllat[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'Etiqueta BB Code per a produir lletres amb color. Ús: [color=#XXXXXX]amb color[/color] on XXXXXX és el codi hex del color que voleu, per exemple FF0000 pel vermell.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'Etiqueta BB Code per a produir lletres amb color. Ús: [color=#XXXXXX]amb color[/color] on XXXXXX és el codi hex del color que voleu, per exemple 00FF00 pel verd.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'Etiqueta BB Code per a produir lletres amb color. Ús: [color=#XXXXXX]amb color[/color] on XXXXXX és el codi hex del color que voleu, per exemple 0000FF pel blau.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'Etiqueta BB Code per a produir lletres molt petites. Ús: [size=1]text molt petit.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'Etiqueta BB Code per a produir lletres petites. Ús: [size=2] text petit.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'Etiqueta BB Code per a produir lletres grans. Ús: [size=4]text gran.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'Etiqueta BB Code per a produir lletres molt grans. Ús: [size=5]text molt gran.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'Etiqueta BB Code per a inserir un enllaç a una imatge. Ús: [img]Imatge-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'Etiqueta BB Code per a inserir un enllaç. Ús: [url]adreça web[/url]. No oblideu el http:// al principi de cada adreça web.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Tanca totes les etiquetes BB obertes.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' missatge en'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>No teniu missatges en l\'arxiu.</strong>'); 
