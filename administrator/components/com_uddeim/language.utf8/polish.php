<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         Š 2007-2008 Stephan Slabihoud, Š 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: Polish  (source file is ISO-8859-2)
// Translator:    Bartosz "PELEk" Magier
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
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Prywatne wiadomości');
DEFINE ('_UDDEMODULE_NONEW', 'brak nowych');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nowe wiadomości: ');
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
DEFINE ('_UDDEADM_NAMESTEXT', 'Show realnames');
DEFINE ('_UDDEADM_NAMESDESC', 'Show realnames or usernames?');
DEFINE ('_UDDEADM_REALNAMES', 'Realnames');
DEFINE ('_UDDEADM_USERNAMES', 'Usernames');
DEFINE ('_UDDEADM_CONLISTBOX', 'CB Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Show my connections in a listbox or in a table?');
DEFINE ('_UDDEADM_LISTBOX', 'Listbox');
DEFINE ('_UDDEADM_TABLE', 'Table');

DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Wiadomości zostaną w koszu przez ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' godzin zanim zostaną usunięte. Możesz zobaczyć tylko kilka pierwszych wyrazów wiadomości. Aby przeczytać całą wiadomośc musisz najpierw ją przywrócić.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Ta wiadomość została przywołana. Możesz teraz ją edytować i wysłać ponownie.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Wiadomość nie może zostać przywołana (prawdopodobnie dlatego, że została przeczytana lub usunięta.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Przywrócenie wiadomości się nie powiodło. (Możliwe, że leżała za długo w koszu i została usunięta w międzyczasie.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Przywrócenie wiadomości się nie powiodło.');
DEFINE ('_UDDEIM_DONTSEND', 'Nie wysyłaj');
DEFINE ('_UDDEIM_SENDAGAIN', 'Wyślij ponownie');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Nie jesteś zalogowany.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Nie masz żadnych odebranych wiadomości.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Nie masz żadnych wysłanych wiadomości.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Nie masz żadnych wiadomości w koszu.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Odebrane');
DEFINE ('_UDDEIM_OUTBOX', 'Wysłane');
DEFINE ('_UDDEIM_TRASHCAN', 'Kosz');
DEFINE ('_UDDEIM_CREATE', 'Nowa wiadomość');
DEFINE ('_UDDEIM_UDDEIM', 'Prywatne wiadomości');
	// this is the headline/name of the component as it appears in Mambo

DEFINE ('_UDDEIM_READSTATUS', 'Czytaj');
	// as in 'this message has been "read"'

DEFINE ('_UDDEIM_FROM', 'Od');
DEFINE ('_UDDEIM_FROM_SMALL', 'od');
DEFINE ('_UDDEIM_TO', 'Do');
DEFINE ('_UDDEIM_TO_SMALL', 'do');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Twoja skrzynka nadawcza zawiera wszystkie wiadomości, które wysłałeś, a które nie zostały usunięte. Możesz przywołać wiadomość w skrzynce nadawczej, jeżeli nie była ona czytana jeszcze. Jeżeli to zrobisz, odbiorca nie bedzie juz jej mógł przeczytać. ');
DEFINE ('_UDDEIM_RECALL', 'przywołaj');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Przywołaj tą wiadomość');
DEFINE ('_UDDEIM_RESTORE', 'odzyskaj');
DEFINE ('_UDDEIM_MESSAGE', 'Wiadomość');
DEFINE ('_UDDEIM_DATE', 'Data');
DEFINE ('_UDDEIM_DELETED', 'Usunięto');
DEFINE ('_UDDEIM_DELETE', 'usuń');
DEFINE ('_UDDEIM_DELETELINK', 'usuń');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Ta wiadomość nie może zostać wyświetlona. <br />Możliwe powody:<ul><li>Nie masz odpowiednich uprawnień, aby przeczytać tą wiadomość</li><li>Wiadomość została usunięta</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Przeniosłeś tą wiadomość do kosza.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Wiadomość od ');
DEFINE ('_UDDEIM_MESSAGETO', 'Wiadomość od Ciebie do ');
DEFINE ('_UDDEIM_REPLY', 'Odpowiedz');
DEFINE ('_UDDEIM_SUBMIT', 'Wyślij');
DEFINE ('_UDDEIM_NOMESSAGE', 'Błąd! Wiadomość nie posiada żadnego tekstu. Nic nie zostało wysłane.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Odpowiedź wysłana');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Wiadomość wysłana');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' i oryginał przeniesiony do kosza');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Nie ma uzytkownika z takim nickiem!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Nie możesz wysyłać wiadomości do samego siebie!');
DEFINE ('_UDDEIM_PRUNELINK', 'Tylko admini: Przytnij');
DEFINE ('_UDDEIM_BLOCKS', 'Zablokowany');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nie wysłano (użytkownik Cię zablokował)');
DEFINE ('_UDDEIM_BLOCKNOW', 'Zablokuj&nbsp;użytkownika');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'To jest lista użytkowników których zablokowałeś. Nie mogą oni wysyłać do Ciebie prywatnych wiadomości.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Nie blokujesz żadnego użytkownika.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Aktualnie blokujesz ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' użytkownika(ów).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[odblokuj]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Jeżeli zablokowany użytkownik usiłuje wysłać Ci wiadomość, zostanie poinformowany, że wiadomosć którą chce wysłać nie zostanie dostarczona.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Zablokowany przez Ciebie uzytkownik nie widzi, że go blokujesz.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Nie możesz zablokować administratorów.');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'System blokowania został wyłączony');
DEFINE ('_UDDEIM_CANTREPLY', 'Nie możesz odpowiedzieć na tą wiadomość.');
DEFINE ('_UDDEIM_EMNOFF', 'Zawiadamianie przez e-mail jest wyłączone. ');
DEFINE ('_UDDEIM_EMNON', 'Zawiadamianie przez e-mail jest włączone. ');
DEFINE ('_UDDEIM_SETEMNON', '[włącz]');
DEFINE ('_UDDEIM_SETEMNOFF', '[wyłącz]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Cześć %you%, 

%user% wysłał\a Ci wiadomość ze strony %site%.
Zaloguj się, żeby ją przeczytać!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Cześć %you%, 

%user% wysłał\a Ci wiadomość ze strony %site%.
Zaloguj suię, żeby odpowiedziec na nią!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Cześć %you%,

Masz nieprzeczytaną\e wiadomość na stronie %site%.
Zaloguj się, żeby ją odczytać! 
');

DEFINE ('_UDDEIM_EMN_SUBJECT', 'Masz wiadomosć na stronie %site%');





DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Zachowanie wiadomości w archiwum zakończyło się niepowodzeniem.');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Nie przechowywujesz żadnych wiadomości w archiwum jeszcze.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Przechowywujesz ');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' wiadomości');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Przechowywujesz jedną wiadomość');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Żeby zachować wiadomość, musisz najpier usunać pozostałe.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Możesz zachować maksymalnie ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' wiadomości.');

DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Masz ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' wiadomości w');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'archiwum');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'odebranych');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'wysłanych i w archiwum');
	// The lines above are to make up a sentence like
	// "You have | 126 | messages in your | inbox and archive"

DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Dopuszczalne maksimum ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Możesz dalej otrzymywać i czytać wiadomości, ale nie możesz na nie odpowiadać, dopóki nie usuniesz pozostałych');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Przechowywanych wiadomości: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(na maksymalnie ');
	// don't add closing bracket

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Wiadomości przechowywanych w archiwum.');
DEFINE ('_UDDEIM_STORE', 'archiwum');
	// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'wróć');

DEFINE ('_UDDEIM_TRASHCHECKED', 'usuń zaznaczone');
	// translators info: plural! (as in "delete checked" messages)
	
DEFINE ('_UDDEIM_SHOWALL', 'pokaż wszystkie');
	// translators example "SHOW ALL messages"
	
DEFINE ('_UDDEIM_ARCHIVE', 'Archiwum');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Archiwum pełne. Wiadomość nie została zapisana.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Brak zaznaczonych wiadomości.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopia wiadomości, którą przesłałeś do ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'kopie dla mnie');
	// as in 'send a "copy to me"' or cc: me

DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopie do archiwum');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'oryginał do kosza');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Ściągnij wiadomoś');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail z wyeksportowaną wiadomością wysłany');
DEFINE ('_UDDEIM_EXPORT_NOW', 'Wyślij zaznaczone powyżej wiadomości przez e-mail do mnie');
	// as in "send the messages checked above by E-Mail to me"

DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Ten e-mail zawiera Twoje prywatne wiadomości.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Nie mogę wysłać e-mail\'a zawierającego wiadomości.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Limit wiadomości. Nie przywrócono.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Napisz wiadomość do ');
	// as in "write a message to" (a person)

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Pokaż użytkowników');
DEFINE ('_UDDEIM_CONNECTIONS', 'Powiązania');
DEFINE ('_UDDEIM_SETTINGS', 'Ustawienia');
DEFINE ('_UDDEIM_NOSETTINGS', 'Brak ustawień które można dostosować.');
DEFINE ('_UDDEIM_ABOUT', 'About'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Skomponuj'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Powiadamianie przez e-mail');
DEFINE ('_UDDEIM_EMN_EXP', 'Możesz otrzymać e-mail z powiadomieniem o nowej prywatnej wiadomosci.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Wyślij e-mail zpowiadomieniem o nowej prywatnej wiadomości');
DEFINE ('_UDDEIM_EMN_NONE', 'Nie powiadamiaj przez e-mail');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Wyślij powiadomienie prze e-mail kiedy jestem nie połączony');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Nie wysyłaj powiadomienia e-mail\'em na kiedy ktos odpowiedział na moją wiadomość');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Blokowanie użytkowników'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Możesz uniemożliwić poszczególnym użytkownikom pisanie wiadomości blokując ich. Wybierz <i>Zablokuj użytkownika</i> kiedy czytasz jego wiadomości.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Zapisz zmiany');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'Kod BB dla wytłuszczonego tekstu. Używanie: [b]tekst[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'Kod BB dla pochylonego tesktu . Używanie: [i]teskt[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'Kod BB dla tesktu podkreślonego. Używanie: [u]tekst[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'Kod BB dla kolorowego tesktu. Używanie [color=#XXXXXX]tekst[/color] gdzie XXXXXX to wartość hex wybranego koloru, na przykład FF0000 dla czerwonego.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'Kod BB dla kolorowego tesktu. Używanie [color=#XXXXXX]tekst[/color] gdzie XXXXXX to wartość hex wybranego koloru, na przykład 00FF00 dla zielonego.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'Kod BB dla kolorowego tesktu. Używanie [color=#XXXXXX]tekst[/color] gdzie XXXXXX to wartość hex wybranego koloru, na przykład 0000FF dla niebieskiego.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'Kod BB dla bardzo małych liter. Używanie: [size=1]tekst[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'Kod BB dla małych liter. Używanie: [size=2]tekst[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'Kod BB dla dużych liter. Używanie: [size=4]tekst[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'Kod BB dla bardzo dużych liter. Używanie: [size=5]teskt[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'Kod BB w którym wstawiamy link do obrazka. Używanie: [img]Link do obrazka[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'Kodd BB dla linka. Używanie: [url]adres docelowy[/url]. Nie zapomnij o http:// na początku każdego adresu internetowego.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Zamknij wszystkie otwarte tagi BB.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' wiadomość w'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>Nie masz wiadomości w archiwum.</strong>'); 

// months and weeknames (please translate according 
// to your language)

$udde_smon[1]="Sty";
$udde_smon[2]="Lut";
$udde_smon[3]="Mar";
$udde_smon[4]="Kwi";
$udde_smon[5]="Maj";
$udde_smon[6]="Cze";
$udde_smon[7]="Lip";
$udde_smon[8]="Sie";
$udde_smon[9]="Wrz";
$udde_smon[10]="Paź";
$udde_smon[11]="Lis";
$udde_smon[12]="Gru";

$udde_lmon[1]="Styczeń";
$udde_lmon[2]="Luty";
$udde_lmon[3]="Marzec";
$udde_lmon[4]="Kwiecień";
$udde_lmon[5]="Maj";
$udde_lmon[6]="Czerwiec";
$udde_lmon[7]="Lipiec";
$udde_lmon[8]="Sierpień";
$udde_lmon[9]="Wrzesień";
$udde_lmon[10]="Październik";
$udde_lmon[11]="Listopad";
$udde_lmon[12]="Grudzień";

$udde_lweekday[0]="Niedziela";
$udde_lweekday[1]="Poniedziałek";
$udde_lweekday[2]="Wtorek";
$udde_lweekday[3]="Środa";
$udde_lweekday[4]="Czwartek";
$udde_lweekday[5]="Piątek";
$udde_lweekday[6]="Sobota";

$udde_sweekday[0]="Nie";
$udde_sweekday[1]="Pon";
$udde_sweekday[2]="Wto";
$udde_sweekday[3]="Śro";
$udde_sweekday[4]="Czw";
$udde_sweekday[5]="Pią";
$udde_sweekday[6]="Sob";



// *********************************************************
// the following can remain English
// *********************************************************

DEFINE ('_UDDEIM_NOID', 'Błąd: Nie znaleziono ID adresata. Wiadomość nie została wysłana.');
DEFINE ('_UDDEIM_REFERAFTERSAVING', 'index.php?option=com_uddeim');
DEFINE ('_UDDEIM_VIOLATION', '<b>Brak dostępu!</b> Nie masz uprawnień, aby wykonać tą czynność!');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Niespodziewany błąd: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Archiwum wyłączone.');


// *********************************************************
// No translation necessary below this line
// *********************************************************

DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');

DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'Administracja uddeIM');
DEFINE ('_UDDEADM_GENERAL', 'Główne');
DEFINE ('_UDDEADM_ABOUT', 'About');
DEFINE ('_UDDEADM_DATESETTINGS', 'Data/czas');
DEFINE ('_UDDEADM_PICSETTINGS', 'Ikony');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Przechowuj czytane wiadomości przez (dni)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Przechowuj nieczytane wiadomości przez (dni)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Przechowuj wiadomości w koszu przez (dni)');
DEFINE ('_UDDEADM_DAYS', 'dni');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Wpisz liczbe dni po których <b>przeczytane</b> wiadomości będą usuwane ze skrzynki odbiorczej. Jeżeli niechesz, żeby wiadomości były usuwane automatycznie, wpisz bardzo wysoką wartość (na przykład, 36524 dni równa sie jedno tysiąclecie). Ale pamiętaj, że baza danych może sie szybko zapełnić, jeżli bedziesz trzymał wszystkie wiadomości.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Wpisz liczbę dni po których wiadmoci które <b>nie zostały przeczytane</b> przez ich odbiorców.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Wpisz liczbę dni po których zostaną usunięte wiadomości z kosza. Wartości większe od 1 są w porządku. Przykład: Żeby usunąc wiadomości po 3 godzinach, wpisz 0.125 jako wartość.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Format daty');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Wybierz format w jakim bedzie wyświetlana data/czas. Nazwy miesięcy bedą wyświetlane weług języka ustawionego w Mambo (jeżeli jest pasujący plik jezykowy uddeIM).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Dłuższy format daty');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Kiedy pokazywane są wiadomości jest tam więcej miejsca na wyświetlenie daty. Wybierz format daty kiedy jest wyświetlana wiadomość. Nazwy miesięcy i dni tygodnia bedą wyświetlane weług języka ustawionego w Mambo (jeżeli jest pasujący plik jezykowy uddeIM).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Usunięcie wykonywane tylko przez Adminów');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'tak, tylko przez adminów');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'nie, przez każdego użytkownika');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatyczne usuwanie strasznie obciaża serwery i bazy danych. jeżeli wybierzesz <i>tak,&nbsp;tylko&nbsp;przez&nbsp;adminów</i> automatyczne usuwanie wg. ustawień wyżej (wszystkich wiadomości użytkowników) jest wywoływane kiedy jakikolwiek admin sprawdza swoją skrzynkę odbiorczą. Wybierz tą opcje jeżeli admin sprawdza swoją skrzynke raz dziennie bądź częściej (co zdarza się w większości przypadków na stronach. Jeżeli na Twojej stronie jest więcej niż jeden admin, nie ma to znaczenia który się zaloguje, bo proces usuwania jest wywoływany przez adminów).) W przypadku bardzo małych serwisów, lub w przypadku kiedy admini żadko sprawdzają swoje skrzynki odbiorcze wybierz <i>nie,&nbsp;przez&nbsp;każdego&nbsp;użytkownika</i>. Jeżeli nie wiesz, czemu to służy wybierz <i>nie, przez każdego użytkownika</i>.');

DEFINE ('_UDDEADM_SAVESETTINGS', 'Zapisz ustawienia');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Podane ustawienia zostały zapisane do pliku konfiguracyjnego:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Ustawienia zostały zapisane.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ikona: Użytkownik jest online');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Wpisz lokalizacje ikony która bedzie wyświetlana obok nazwy użtkownika kiedy jest online.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ikona: Użytkownik jest offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Wpisz lokalizacje ikona która bedzie wyświetlana obok nazwy użtkownika kiedy jest offline.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Ikona: Przeczytana wiadomość');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Wpisz lokalizacje ikony która bedzie wyświetlana obok przeczytanej wiadomości.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ikona: Nieprzeczytana wiadomość');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Wpisz lokalizacje ikony która bedzie wyświetlana obok nieprzeczytanej wiadomości.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Moduł: Nowa wiadomość');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'To ustawienie dotyczy modułu mod_uddeim_new module. Wpisz lokalizacje ikony która będzie wyswietlana kiedy nadejdzie nowa wiadomość.');
DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM Instalacja');
DEFINE ('_UDDEADM_FINISHED', 'Instalacja zakończona. Witamy w uddeIM 0.4 (beta). ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Nie posiadasz zainstalowanego komponentu Mambo Community Builder. Nie bedziesz mógł używać uddeIM.</span><br /><br />Możliwe, że musisz pobrać <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'kontynuuj');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Masz ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' wiadomości w Twojej instalacji myPMS. Czy chcesz je zaimportować do uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'To nie spowoduje uszkodzenia wiadomości w Twojej instalacji myPMS. Będą przechowywane dalej. Możesz śmiało zaimportować wiadomości do uddeIM, nawet, jeżeli zdecydujesz się na używanie myPMS. (Powinieneś najpierw zapisać wszelkie wprowadzone zmiany przed importem!) Jakiekolwiek wiadomości zapisane w bazie danych uddeIM zostaną nietknięte.');
DEFINE ('_UDDEADM_IMPORT_YES', 'Importuj wiadomości z myPMS do uddeIM teraz');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nie, nie importuj wiadomości z myPMS');  
DEFINE ('_UDDEADM_IMPORTING', 'Poczekaj zanim wiadomości zostaną zaimportowane.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Zakończone importowanie wiadomości z myPMS. Nie powtarzaj tej akcji ponownie, gdyz wiadomości zostana pobrane jeszcze raz i wyświetlą się podwójnie.'); 
DEFINE ('_UDDEADM_IMPORT', 'Import');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importuj wiadomośc z myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Nie wykryto instalacji myPMS. Import nie mozliwy.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Imortowałeś już wiadomości z myPMS do uddeIM.</span>');
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Włącz system blokowania użytkowników');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Gdy włączony, użytkownicy mogą blokować innych użytkowników. Zablokowany użytkownik nie może wysyłać wiadomości, do osoby która go zablokowała. Administratorzy nie mogą być blokowani.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'tak');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'nie');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Zablokowany użytkownik dostaje wiadomość');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Jeżeli ustawione na <i>tak</i>, zablokowany użytkownik dostanie informacje, że jego wiadomość nie może zostać wysłana, gdyż jest blokowany przez jej adresata. Jeżeli ustawione na <i>nie</i>, blokowany użytkownik nie dostanie informacji, że jego wiadomość nie może zostać wysłana.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'tak');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'nie');
DEFINE ('_UDDEADM_DELETIONS', 'Usunięcia');
DEFINE ('_UDDEADM_BLOCK', 'Blokowanie');
DEFINE ('_UDDEADM_INTEGRATION', 'Integracja');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Pokaż linki z CommunityBuilder');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Gdy ustawione na <i>tak</i>, wszyscy użytkownicy uddeIM będą wyświetlani jako link do ich profilu w Community Builder.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Pokaż miniature z CB');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Gdy ustawione na <i>tak</i>, miniatura wybranych uzytkowników będzie wyświetlana (jeżeli posiadają zdjęcie na swoim profilu w Community Builder).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Pokaż status');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Jeżeli ustawione na <i>tak</i>, uddeIM będzie pokazywał ikone statusu (online/offline). Możesz zmienić pliki ikon w zakładce Obrazki.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Pozwól na powiadamianie przez e-mail');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Gdy ustawione na <i>tak</i>, każdy użytkownik który chce dostawać e-mail za każdym razem kiedy na jego skrzynke odbiorczą trafi nowa wiadomość będzie mógł ustawić sobie tą opcje.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail zawiera wiadomość');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Gdy ustawione na <i>nie</i>, e-mail bedzie zawierał tylko informacje o nowej wiadomości bez wyświetlania jej treści za to z linkiem do serwisu.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'E-mail Niezapominjka');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Ta opcja służy - w zależności od ustawień użytkownika - do tego, że jeżeli użytkownik ma nieprzeczytane wiadomości w swojej skrzynce odbiorczej przez długi okres czasu (ustawienia niżej) dostanie powiadomienie na e-mail. To ustawienie jest niezależne od ustawienia \'Pozwól na powiadamianie przez e-mail \'. Jeżeli nie chcesz, żeby były wysyłane jakiekolwiek wiadomości na e-mail wmuszisz wyłączyć obie opcje.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Niezapominjka wysyłana po dniach');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Jeżeli opcja powyżej jest ustawiona na <i>tak</i>, wpisz po ilu dniach powiadomienie o nieprzeczytanych wiadomościach ma przyjść do użytkownika.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Ilość liter na liście');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Ustaw ile liter ma być wyświetlanych na liście odebranych, wysłanych i koszu.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Maksymalna długość wiadomości');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Ustawisz tutaj jaką długość maksymalnie może mieć wiadomość. Zostanie ona automatycznie obcięta. Ustaw na \'0\' ,by pozwolić na wiadomości każdej długości (nie zalecane)).');
DEFINE ('_UDDEADM_YES', 'tak');
DEFINE ('_UDDEADM_NO', 'nie');
DEFINE ('_UDDEADM_ADMINSONLY', 'tylko admini');
DEFINE ('_UDDEADM_SYSTEM', 'System');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Nazwa użytkownika systemowego');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM wspiera wiadomości systemowe. Nie posiadają widocznego nadawcy i użytkownicy nie mogą na nie odpowiadać. Wpisz tutaj alias systemowy (na przykład <i>Support</i> or <i>Pomoc</i> or <i>Administracja społeczności</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Pozwól adminom na wysyłanie ogólnych wiadomości');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM pozwala na wysyłanie ogólnych wiadomości. Wysyłane są do każdego użytkownika serwisu. Używaj ich oszczędnie');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nadawca e-mail');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Wpisz nazwe z której to pochodzą wysyłane powiadomienia e-mail (np. <i>YOURSITENAME</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adres nadawcy e-mail');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Wpisz adres e-mail z którego pochodzą wiadomości e-mail (to powinien być główny adress twojej strony.');
DEFINE ('_UDDEADM_VERSION', 'wersja uddeIM');
DEFINE ('_UDDEADM_ARCHIVE', 'Archiwum'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Włącz archiwum');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Wybierz czy użytkownicy będą mogli zapisywać swoje wiadomości w archiwum. Wiadomości z archiwum nie będą usuwane.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Limit wiadomości w archiwum');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Ustaw ile wiadomości będą mogli przechowywać uzytkownicy w archiwum (brak limitu dla adminów).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Pozwól na osobiste kopie');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Pozwala na otrzymywanie przez użytkowników kopii wiadomości wysłanych. Kopie pojawia sie w skrzynce odbiorczej.');
DEFINE ('_UDDEADM_MESSAGES', 'Wiadomości');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Zaproponuj usunięcie oryginału do kosza');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Kiedy aktywowane, umieszczone zostanie pole \'oryginał do kosza\' obok przycisku \'Wyślij\' które jest zaznaczone standardowo. W tym wypadku wiadomość zostanie przeniesiona z Skrzynki Odbiorczej do Kosza kiedy Odpowiedź zostanie wysłana. Ta funkcja pozwala na zmniejszenie liczby trzymanych wiadomości w bazie danych. Użytkownicy zawsze mogą oczywiście odznaczyć to pole wyboru, jesli chcą zachować wiadomość w skrzynce odbiorczej.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Wiadomości na stronie');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Zdefiniuj liczbe wiadomości wyświetlanych na jednej stronie w zakładkach "Odebrane", "Wysłane" i "Archiwum".');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Uzywany zestaw znaków');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Jeżeli doświadczasz problemów z wyświetlaniem znaków innych niż łącińskie, możesz wpisać tutaj zestaw znaków, na który, zostaną skonwertowane treści z bazy danych w wyjściowym kodzie HTML (przykład: <b>"ISO-8859-2"</b>). <b>Jeżeli nie wiesz co to oznacza, nie zmieniaj wartości domyślnej tego pola.</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Używany zestaw znaków w e-mail\'u');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Jeżeli doświadczasz problemów z wyświetlaniem znaków innych niż łącińskie, mozesz wpisać zestaw znaków, jakich uddeIM będzie uzywał do skonwertowania tekstu wysyłanych e-maili. <b>Jeżeli nie wiesz co to oznacza, nie zmieniaj wartości domyślnej tego pola</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'To jest zawartość e-maila jakią dostaną użytkownicy po ustawieniu powyższej opcji. Zawartości tej wiadomości nie bedzie w e-mailu. Zachowaj zmienne %you%, %user% i %site% nietknięte. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'To jest zawartość e-maila jakią dostaną użytkownicy po ustawieniu powyższej opcji. Ten e-mail będzie zawierał treść tej wiadomości. Zachowaj zmienne %you%, %user%, %pmessage% i %site% nietknięte. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'To jest zawartość e-maila "nie zapominajki" jaką dostaną użytkownicy po ustawieniu powyższej opcji. Zachowaj zmienne %you% i %site% nietknięte. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Pozwala użytkownikom na pobranie wiadomości z archiwum, poprzez wysłanie ich na e-mail do nich samych.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Pozwól na pobranie');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'To jest format e-mail\'a wysyłanego do użytkowników z wiadomościami z ich archiwum. Zachowaj zmienne %user%, %msgdate% i %msgbody% nietknięte. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Ustaw limin skrzynki odbiorczej');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Możesz uwzględnić numer wiadomości ze skrzynki odbiorczej które będą zarchiwizowane. W takim wypadku, numer wiadomości ze skrzynki odbiorczej i archiwum, nie może przekroczyć wyżej podanej liczby. Ewentualnie, możesz ustawić limit tylko skrzynki odbiorczej pomijając archiwum. W takim wypadku, uzytkownicy nie mogą mieć w swojej skrzynce odbiorczej więcej wiadomości niż powyższa liczba. Jeżeli liczba ta została osiągnięta, użytkownicy nie będą mogli odpowiadać na wiadomości, ani pisać nowych, do momentu, aż usuną wiadomości ze skrzynki odbiorczej bądź archiwum. (Użytkownicy dalej bedą mogli otrzymywać i czytać wiadomości.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Pokaż użycie limitu w skrzynce odbiorczej');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Pokazuje ile użytkownicy przechowuja wiadomości (i ile mogą przechowywać) w linii pod skrzynką odbiorczą.');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Wyłączyłeś archiwum. Jak chcesz poradzić sobie z wiadomościami zapisanymi w archiwum?');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Pozostaw je');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Zostaw je w archiwum (Użytkownicy nie będą mieli do nich dostępu, ale dalej będą musieli liczyć się z limitami wiadomości).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Przenieś do skrzynki odbiorczej');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Zarchiwizowane wiadomości trafiły do skrzynki odbiorczej');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Wiadomości zostaną przeniesione do skrzynki odbiorczej właściciela (albo do kosza jeżeli są stare).');		

		
// 0.4 frontend, but visible admins only (no translation necessary)		

DEFINE ('_UDDEIM_SEND_ASSYSM', 'wyślij wiadomość systemową (odbiorcy nie moga na nią odpowiedzieć)');
DEFINE ('_UDDEIM_SEND_TOALL', 'wyslij do wszystkich');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'wyślij do wszystkich adminów');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'wyślij do wszystkich użytkowników którzy są online');
DEFINE ('_UDDEIM_VALIDFOR_1', 'ważne przez ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' godzin. 0=wieczność (zastosowanie automatycznego usunięcia)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Stwórz systemową bądź ogólna wiadomość]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Stwórz normalną (standardową) wiadomość]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Systemowe i Ogólne wiadomości niedozwolone.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Typ wiaomości');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Pomoc w wiadomościach systemowych');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(Otwiera nowe okno)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Jesteś w trakcie wysyłania wiadomości znajdującej się poniżej. Prosze sprawdź ją i zatwierdź bądź anuluj!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Wiadomość do <strong>wszystkich użytkowników</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Wiadomość do <strong> wszystkich adminów</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Wiadomość do <strong>wszystkich aktualnie zalogowanych użytkownikó</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Odbiorcy nie będą mogli odpowiedzieć na tą wiadomość.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Wiadomość zostanie wysłana z <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> jako nazwa użytkownika');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Wiadomość straci ważność ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Wiadomość nie straci ważności');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Sprawdź link (klikając na niego) przed kontynuacją!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Użycie <strong>w wiadomościach systemowych tylko</strong>:<br /> [b]<strong>wytłuszczony</strong>[/b] [i]<em>pochylony</em>[/i]<br />
[url=http://www.jakislink.pl]jakieś linki[/url] albo [url]http://www.jakislink.com[/url] to linki');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Błąd: Nie znaleziono odbiorców. Wiadomość nie wysłana.');		
// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Temat');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Wybierz temat, jaki chciałbyś żeby uddeIM używał');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'pokaż powiązania z CB');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Użyj <i>tak</i> jeśli masz zainstalowanego Community Builder\'a i chcesz pokazać jego powiązania z Community Builder\'a.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Pokaż ustawienia');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Link do konfiguracji pojawia się w uddeIM jeśli masz włączony system blokowania bądź powiadamiania przez e-mail. Jeżeli nie chcesz tego, możesz to tutaj wyłączyć. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'tak, na dole');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Zezwól na kod BB');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'formatowanie fontów tylko');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Użyj <i>formatowanie fontów tylko</i> aby pozwolić użytkownikom na używanie tagów dla <b>wytłuszczonego</b>, <i>pochylonego</i>, <u>podkreślonego</u> tekstu, do zmiany rozmiaru, kroju fonta. Kiedy ustawisz tą opcje na <i>tak</i>, użytkownicy będą mogli używać <strong>wszystkich</strong> wspieranych kodów BB w ich wiadomościach (nawet linków i obrazków).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Zezwól na emotikony');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Kiedy ustawione na <i>tak</i>, kod emotikon jak np. :-) będą zamieniane w grafike. Zobacz plik readme w celu sprawdzenia listy obsługiwanych emotikon.');
DEFINE ('_UDDEADM_DISPLAY', 'Wyświetlanie');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Pokaż ikony menu');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Gdy ustawione na <i>tak</i>, Linki w menu i akcji bedą wyświetlane wraz z ikonami.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Tytuł komponentu');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Wpisz nagłówek komponentu, np. \'Prywatne wiadomości\'. Pozostaw puste, jeśli niechcesz nagłówka.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Pokaż link About.');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Ustaw na <i>tak</i> aby pokazać link do licencji i listy płac uddeIM. Link będzie na samym dole wyjściowego kodu HTML uddeIM\'a.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Zatrzymaj e-mail\'e natychmiast');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Zaznacz ,aby powsstrzymać uddeIM przed wysyłaniem e-maili (powiadomienia przez e-mail i e-mail\'e "niezapominajki") pomijając ustawienia użytkowników, na przykład kiedy testujesz serwis. Jeżeli potrzeujesz tych cech, ustaw wszsytkie powyższe opcje na <i>nie</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'ręcznie');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'miniatury z CB na liście');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Ustaw na <i>tak</i> jeśli chcesz, aby wyświetlały się miniatury użytkowników na liście wiadomości (skrzynka odbiorcza, skrzynka nadawcza, etc.)');		
