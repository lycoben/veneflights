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
// Language file: Castellano (source file is Latin-1)
// Translator:     José Chancosa Gimeno <noemail>
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
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Append selected recipients to list');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'This allows selection of multiple recipients.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Append selected connections to list');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'This allows selection of multiple recipients.');
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
DEFINE ('_UDDEADM_NAMESTEXT', 'Show realnames');
DEFINE ('_UDDEADM_NAMESDESC', 'Show realnames or usernames?');
DEFINE ('_UDDEADM_REALNAMES', 'Realnames');
DEFINE ('_UDDEADM_USERNAMES', 'Usernames');
DEFINE ('_UDDEADM_CONLISTBOX', 'Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Show my connections in a listbox or in a table?');
DEFINE ('_UDDEADM_LISTBOX', 'Listbox');
DEFINE ('_UDDEADM_TABLE', 'Table');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Los mensajes estarán en la papelera durante 24h antes de que sean borrados. Solo puedes ver las primeras palabras del mensaje. Para leer el mensaje entero necesitas restaurarlo primero.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Los mensajes estarán en la papelera durante ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' hrs antes de que sean borrados. Solo puedes ver las primeras palabras del mensaje. Para leer el mensaje entero necesitas restaurarlo primero.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Este mensaje ha sido memorizado. Ahora puedes editarlo o volverlo a mandar.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'El mensaje no ha podido ser memorizado (probablemente porque ha sido le&iacute;do o borrado.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'La restauraci&oacute;n del mensaje ha fallado. ( Debe haber estado demasiado tiempo en la papelera y ha sido borrado.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'La restauraci&oacute;n del mensaje ha fallado.');
DEFINE ('_UDDEIM_DONTSEND', 'No enviar');
DEFINE ('_UDDEIM_SENDAGAIN', 'Reenviar');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'No has iniciado sesi&oacute;n');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>No hay mensajes en tu bandeja de entrada.</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>No hay mensajes en tu bandeja de salida.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>No hay mensajes en tu papelera.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Bandeja de entrada');
DEFINE ('_UDDEIM_OUTBOX', 'Bandeja de salida');
DEFINE ('_UDDEIM_TRASHCAN', 'Papelera');
DEFINE ('_UDDEIM_CREATE', 'Nuevo mensaje');
DEFINE ('_UDDEIM_UDDEIM', 'Mensajes privados');
DEFINE ('_UDDEIM_READSTATUS', 'Le&iacute;do');
DEFINE ('_UDDEIM_FROM', 'De');
DEFINE ('_UDDEIM_FROM_SMALL', 'de');
DEFINE ('_UDDEIM_TO', 'Para');
DEFINE ('_UDDEIM_TO_SMALL', 'para');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Tu bandeja de salida contiene todos los mensajes que has enviado y no has borrado todavía. Puedes memorizar un mensaje en tu bandeja de salida si este no ha sido leído. Si haces esto, ya no podrá ser leído por el destinatario del mensaje. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'memorizar');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'memoriza este mensaje');
DEFINE ('_UDDEIM_RESTORE', 'restaurar');
DEFINE ('_UDDEIM_MESSAGE', 'Mensaje');
DEFINE ('_UDDEIM_DATE', 'Fecha');
DEFINE ('_UDDEIM_DELETED', 'Borrado');
DEFINE ('_UDDEIM_DELETE', 'borrar');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'borrar');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Este mensaje no puede ser mostrado. <br />Motivos posibles:<ul><li>No tienes permiso para leer este mensaje particular</li><li>Este mensaje ha sido borrado</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Has movido este mensaje a la papelera.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Mensaje de ');
DEFINE ('_UDDEIM_MESSAGETO', 'Mensaje para ');
DEFINE ('_UDDEIM_REPLY', 'Responder');
DEFINE ('_UDDEIM_SUBMIT', 'Enviar');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Mover el mensaje a la papelera después de responderlo');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'Error: No se ha encontrado la ID del destinatario. No se ha enviado el mensaje.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Error: El mensaje esta vacío! No se ha enviado el mensaje.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Respuesta enviada');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Mensaje enviado');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' y el mensaje original ha sido enviado a la papelera');
DEFINE ('_UDDEIM_NOSUCHUSER', 'No existe ning&uacute;n usuario con este nombre!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'No es posible enviarse mensajes a si mismo!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Acceso denegado!</b> No tienes el permiso para realizar esta acci&oacute;n!');
DEFINE ('_UDDEIM_PRUNELINK', 'Solo administradores: Pasa');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'Administraci&oacute;n uddeIM ');
DEFINE ('_UDDEADM_GENERAL', 'General');
DEFINE ('_UDDEADM_ABOUT', 'Acerca de');
DEFINE ('_UDDEADM_DATESETTINGS', 'Fecha/hora');
DEFINE ('_UDDEADM_PICSETTINGS', 'Iconos');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Mantener mensajes leídos durante (días)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Mantener mensajes NO leídos durante (días)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Mantener mensajes en la papelera durante (días)');
DEFINE ('_UDDEADM_DAYS', 'día(s)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Introduce el numero de días que permanecerán los mensajes <b>leídos</b> en la bandeja de entrada. Si no quieres que se borren los mensajes automáticamente, introduce un numero alto (por ejemplo, 36524 días equivalen a un siglo). Pero recuerda que la Base de datos se llenara rápidamente si conservas todos los mensajes.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Introduce el numero de días que permanecerán los mensajes que <b>NO</b> han sido leídos a&uacute;n por el destinatario antes de borrarse.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Introduce el numero de días que permanecerán los mensajes en la papelera antes de borrarse. Valores menores de un día están permitidos. Por ejemplo: Para borrar los mensajes de la papelera desp&uacute;es de 3 horas, introduce 0.125 como valor.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Formato de la fecha');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Elige el formato en el cual ser&aacute; mostrada la fecha/hora del mensaje. Los meses son abreviados de acuerdo a las preferencias de lenguaje en Mambo (si se encuentra un archivo de lenguaje de uddeIM que coincida).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Formato de fecha largo');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Cuando se muestra el mensaje hay m&aacute;s espacio para mostrar la fecha. Elige el formato de fecha que se mostrar&aacute; cuando se abra un mensaje. Para los días de la semana y los meses, se aplicar&aacute;n las preferencias de lenguaje de Mambo (si se encuentra un archivo de lenguaje de uddeIM que coincida).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Borrado solo por administradores');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'si, solo por admins');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'no, por cualquier usuario');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Los borrados automáticos son una pesada carga para los servidores y las bases de datos. Si elige "<i>si,&nbsp;solo&nbsp;por&nbsp;admins</i>" el borrado automático de acuerdo con la configuraci&oacute;n de arriba (de todos los mensajes de usuario) es invocado cuando cualquier administrador comprueba su bandeja de entrada. Elija esta opci&oacute;n si cualquier administrador comprueba su bandeja de entrada todos los días o m&aacute;s frecuentemente, que es el caso de la mayoría de sitios web. (Si tu sitio web tiene m&aacute;s de un administrador, no importa cual de todos es el que entra porque el borrado es invocado automáticamente cuando entra cualquier admin.) Para sitios web peque&ntilde;os o poco administrados donde no suelen entrar los administradores a consultar sus bandejas de entrada, elije "<i>no,&nbsp;por&nbsp;cualquier&nbsp;usuario</i>". Si no entiendes esto o no sabes que opci&oacute;n elegir, elige "<i>no, por cualquier usuario</i>".');
DEFINE ('_UDDEADM_SAVESETTINGS', 'Guardar Configuraci&oacute;n');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Los siguientes ajustes se han guardado en el archivo de configuraci&oacute;n:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'La Configuraci&oacute;n ha sido guardada.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icono: Usuario en linea');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado al lado del nombre de usuario cuando este este en linea.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icono: Usuario desconectado');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado al lado del nombre de usuario cuando este este conectado.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Icono: Mensaje leído');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado para los mensajes leídos');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icono: Mensaje no leído');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado para los mensajes <b>NO</b> leídos');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modulo: Icono de nuevos mensajes');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Esta opci&oacute;n hace referencia al modulo mod_uddeim_new. Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado cuando hayan nuevos mensajes.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'Instalaci&oacute;n uddeIM ');
DEFINE ('_UDDEADM_FINISHED', 'La instalaci&oacute;n ha terminado. Bienvenido a uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">No tienes el "Mambo Community Builder" instalado. no vas a poder usar uddeIM.</span><br /><br />Deberías descargar <a href="http://www.mambojoe.com">"Mambo Community Builder"</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continuar');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Hay ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' mensajes en tu instalaci&oacute;n de PMS. ¿Deseas importarlos a uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Esto no alterara los mensajes o tu instalaci&oacute;n de PMS. Permanecerán intactos. as&iacute; puedes importarlos a uddeIM de forma segura, incluso si piensas seguir usando PMS. (Debes salvar cualquier cambio que hayas hecho a la configuraci&oacute;n antes de ejecutar la importaci&oacute;n!) Cualquier mensaje que ya tengas en la base de datos de uddeIM permanecerá intacto.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Importar los mensajes de PMS a uddeIM ahora');
DEFINE ('_UDDEADM_IMPORT_NO', 'No, no importar ning&uacute;n mensaje');  
DEFINE ('_UDDEADM_IMPORTING', 'Por favor espere mientras los mensajes son importados.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Importaci&oacute;n de mensajes desde PMS concluida. No vuelva a ejecutar este script de instalaci&oacute;n porque si lo hace importara los mensajes otra vez y se mostrar&aacute;n duplicados.'); 
DEFINE ('_UDDEADM_IMPORT', 'Importar');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importar mensajes desde PMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'No se ha encontrado una instalaci&oacute;n de PMS. No es posible importar.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Ya has importado los mensajes de PMS a uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Blocked');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'No se ha podido enviar (el usuario le ha bloqueado)');
DEFINE ('_UDDEIM_BLOCKNOW', 'usuario&nbsp;bloqueado');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Esta es una lista de los usuario que has bloqueado. Estos usuarios no pueden enviarte mensajes privados.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Actualmente no tienes ning&uacute;n usuario bloqueado.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Actualmente tienes ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' usuario(s) bloqueado(s).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[desbloquear]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Si un usuario bloqueado intenta enviarte un mensaje, &eacute;l o ella ser&aacute; informado de que ha sido bloqueado y de que el mensaje no se ha enviado.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Un usuario bloqueado no puede ver que lo has bloqueado');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'No puedes bloquear a los administradores.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Activar el sistema de bloqueo');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Cuando esta activo, los usuarios pueden bloquear a otros usuarios. Un usuario bloqueado no puede enviar mensajes a el usuario que lo ha bloqueado. Los administradores no pueden ser bloqueados.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'S&iacute;');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'No');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Usuarios bloqueados reciben mensaje');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Si elige <i>S&iacute;</i>, el usuario bloqueado sera informado de que su mensaje no ha podido ser enviado porque ha sido bloqueado por el receptor. Si elige <i>No</i>, el usuario bloqueado no recibir&aacute; ninguna notificaci&oacute;n de que su mensaje no se ha enviado.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'S&iacute;');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'No');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistema de bloqueo no activo');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Borrados'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Bloqueos');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integraci&oacute;n');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Mostrar enlaces CB');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Cuando esta en <i>S&iacute;</i>, Todos los nombres de usuario que aparezcan en uddeIM ser&aacute;n mostrados como enlaces a su perfil de  "Community Builder".');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Mostrar miniatura CB');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Cuando esta en <i>S&iacute;</i>, la miniatura de el usuario ser&aacute; mostrada al leer un mensaje (Si &eacute;l o ella dispone de una imagen en su perfil "Community Builder").');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Mostrar el estado del usuario');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Si elige <i>S&iacute;</i>, uddeIM mostrar&aacute; cada nombre de usuario con un peque&ntilde;o icono que informa de si ese usuario esta en linea o no. Puedes cambiar estos iconos en la pesta&ntilde;a Iconos.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Permitir notificaci&oacute;n por correo');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Si elige <i>S&iacute;</i>, cada usuario podr&aacute; elegir si quiere recibir un correo cada vez que reciba un mensaje en su bandeja de entrada.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'El correo contiene el mensaje');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Si esta en <i>No</i>, este correo solo contendr&aacute; informaci&oacute;n sobre quien y cuando ha enviado el mensaje, pero no contendr&aacute; el mensaje en si.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Correo recordatorio');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Esta caracter&iacute;stica  manda - independientemente de los ajustes del usuario - un correo a el usuario que tiene mensajes no le&iacute;dos en su bandeja de entrada desde hace mucho tiempo (ver abajo). Esta caracter&iacute;stica es independiente de opci&oacute;n "permitir notificaciones por correo" de arriba. Si no quieres que se env&iacute;e ning&uacute;n correo, deber&aacute; desactivar las dos opciones.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Enviar correo recordatorio despu&eacute;s de');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Si la opci&oacute;n de recordatorio (ver arriba) est&aacute; en <i>S&iacute;</i>, pon aqu&iacute; cuantos d&iacute;as tardaran en ser enviados los correos de recordatorio avisando de que hay mensajes sin leer.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Lista de los primeros caracteres');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Aqu&iacute; puedes poner cuantos caracteres de el contenido de un mensaje se mostraran en la bandeja de entrada, salida y papelera.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Longitud m&aacute;xima del mensaje');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Pon aqu&iacute; la longitud m&aacute;xima de el mensaje. El mensaje ser&aacute; cortado autom&aacute;ticamente por esta longitud. Si se pone a "0" se permitir&aacute;n mensajes de cualquier longitud (no recomendado).');
DEFINE ('_UDDEADM_YES', 'S&iacute;');
DEFINE ('_UDDEADM_NO', 'No');
DEFINE ('_UDDEADM_ADMINSONLY', 'solo administradores');
DEFINE ('_UDDEADM_SYSTEM', 'Sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Nombre de usuario para mensajes del sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM soporta mensajes del sistema. Estos no tienen un remitente visible y los usuarios no podr&aacute;n responder al mensaje. Introduce aqu&iacute; el alias para los mensajes del sistema (por ejemplo <i>Soporte</i> o <i>Informaci&oacute;n</i> or <i>Administrador de la comunidad</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Permitir a los administradores enviar mensajes generales');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM soporta mensajes generales. Estos son enviados a todos los usuarios del sistema. No abuse de ellos.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nombre del remitente del correo');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Introduce el nombre del remitente que usaran las notificaciones de correo (por ejemplo <i>ELNOBREDESUSITIOWEB</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Direcci&oacute;n de correo del remitente');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Introduzca la direcci&oacute;n de correo desde la cual ser&aacute;n enviadas las notificaciones de correo (esta debe ser la direcci&oacute;n principal del correo de contacto de su sitio web).');
DEFINE ('_UDDEADM_VERSION', 'versi&oacute;n uddeIM ');
DEFINE ('_UDDEADM_ARCHIVE', 'Archivo'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Activar archivo');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Elija si se permite a los usuarios guardar los mensajes en el archivo. Los mensajes en el archivo no ser&aacute;n borrados.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Numero m&aacute;ximo de mensajes en el archivo del usuario');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Pon cuantos mensajes podr&aacute; guardar cada usuario en el archivo (este limite no se aplica a los administradores).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Permitir auto copias');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Permite a los usuarios recibir copias de los mensajes que manden. Estas copias aparecer&aacute;n en la bandeja de entrada.');
DEFINE ('_UDDEADM_MESSAGES', 'Mensajes');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Sugerir tirar el original');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Cuando esta activa esta opci&oacute;n, pondr&aacute; una casilla al lado de el bot&oacute;n \'Enviar\' llamada \'tirar original\' que estar&aacute; activa por defecto. En este caso, el mensaje sera inmediatamente movido de la bandeja de entrada a la papelera cuando la respuesta se haya enviado. Esta opci&oacute;n mantiene baja la cantidad de mensajes en la base de datos. Los usuarios siempre pueden deseleccionar la casilla si quieren conservar el mensaje en la bandeja de entrada.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Mensajes por p&aacute;gina');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Define el numero de mensajes que ser&aacute;n mostrados por p&aacute;gina en la bandeja de entrada, salida, papelera y archivo.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Juego de caracteres usado');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Si tienes problemas mostrando juegos de caracteres no latinos, aqu&iacute; puedes introducir el juego de caracteres que usara uddeIM para convertir la salida de datos de la base de datos a HTML. <b>Si no sabes que significa esto, no cambies el valor por defecto! (Para Castellano el valor por defecto es el correcto)</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Juego de caracteres usado en correos');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Si tienes problemas mostrando juegos de caracteres no latinos, puedes introducir el juego de caracteres que usara uddeIM para enviar correos. <b>Si no sabes que significa esto, no cambies el valor por defecto! (Para Castellano el valor por defecto es el correcto)</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Este es el contenido de el correo que los usuarios recibir&aacute;n cuando la opci&oacute;n de arriba este activada. El contenido del mensaje no se incluir&aacute; en el correo. No cambies las variables %you%, %user% y %site%. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Este es el contenido de el correo que los usuarios recibir&aacute;n cuando la opci&oacute;n de arriba este activada. Este correo tendr&aacute; el contenido del mensaje. No cambies las variables %you%, %user%, %pmessage% y %site%. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Este es el contenido del correo de recordatorio que los usuarios recibir&aacute;n cuando la opci&oacute;n de arriba este activada. No cambies las variables %you% y %site%. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Permitir a los usuarios descargar mensajes de su archivo envi&aacute;ndoselos como correo.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Permitir descarga');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Este es el formato del correo que los usuarios recibir&aacute;n cuando se descarguen sus mensajes del archivo. No cambies las variables %user%, %msgdate% y %msgbody%. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Activar el limite de la bandeja de entrada');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Puedes a&ntilde;adir la cantidad de mensajes en la bandeja de entrada en el numero m&aacute;ximo de mensajes en el archivo. En este caso, el numero total de mensajes de la bandeja de entrada m&aacute;s los de el archivo no exceder&aacute; el numero fijado arriba. Alternativamente puedes fijar el limite de la bandeja de entrada sin un archivo. En este caso, los usuarios no podr&aacute;n tener en sus bandejas de entrada m&aacute;s mensajes que la cantidad fijada arriba. Si esa cantidad es alcanzada, no podr&aacute;n seguir respondiendo a los mensajes o crear nuevos hasta que hayan borrado mensajes de su bandeja de entrada o de su archivo respectivamente. (Los usuarios podr&aacute;n seguir recibiendo mensajes y leerlos.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Mostrar el limite de uso en la bandeja de entrada');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Muestra cuantos mensajes tienen los usuarios almacenados (y cuantos pueden almacenar) en una linea debajo de su bandeja de entrada.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Has desactivado el archivo. ¿Que quieres hacer con los mensajes que hay guardados en el archivo?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Dejarlos');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Dejarlos en el archivo (el usuario no podr&aacute; acceder a ellos y seguir&aacute;n contando para los limites de los mensajes).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Moverlos a la bandeja de entrada');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Los mensajes archivados ser&aacute;n movidos a las bandejas de entrada');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Los mensajes ser&aacute;n movidos a las bandejas de entradas de sus respectivos usuarios ( o tirados a la papelera si son m&aacute;s antiguos de lo permitido en la bandeja de entrada).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'valido para ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' horas. 0=para siempre (los borrados autom&aacute;ticos se aplicaran)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Crear mensaje de sistema o general]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Crear mensaje normal (est&aacute;ndar)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'No est&aacute;n permitidos los mensajes de sistema o generales.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Tipo de mensaje');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Ayuda para los mensajes de sistema');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(se abre en una nueva ventana)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Estas a punto de enviar el mensaje mostrado abajo. Por favor revisalo y confirmalo o cancelalo!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Mensaje para <strong>todos los usuarios</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Mensaje para <strong>todos los administradores</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Mensaje para <strong>todos los usuarios actualmente logeados</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Los receptores no podr&aacute;n responder a este mensaje.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'El mensaje sera enviado con <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> como nombre de usuario');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'El mensaje expirar&aacute; ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'El mensaje no expirar&aacute;');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Revisa el enlace (haciendo clic en &eacute;l) antes de seguir!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Uso <strong>solo para mensajes de sistema</strong>:<br /> [b]<strong>negrita</strong>[/b] [i]<em>cursiva</em>[/i]<br />
[url=http://www.unenlace.com]un enlace[/url] o [url]http://www.unenlace.com[/url] son enlaces validos');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Error: No se han encontrado receptores. Mensaje no enviado.');		
		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', 'No puedes responder a este mensaje.');
DEFINE ('_UDDEIM_EMNOFF', 'La notificaci&oacute;n por correo esta desactivada. ');
DEFINE ('_UDDEIM_EMNON', 'La notificaci&oacute;n por correo esta activada. ');
DEFINE ('_UDDEIM_SETEMNON', '[activarla]');
DEFINE ('_UDDEIM_SETEMNOFF', '[desactivarla]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Hola %you%, 

%user% te ha enviado un mensaje privado en %site%.
Por favor accede y leelo!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Hola %you%, 

%user% Te ha enviado el siguiente mensaje en %site%.
Por favor accede para responder al mensaje!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Hola %you%,

tienes mensajes privados sin leer en %site%.
Por favor accede y leelos! 
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Tienes mensajes en %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'enviar como mensaje del sistema (los receptores no lo podr&aacute;n responder)');
DEFINE ('_UDDEIM_SEND_TOALL', 'enviar a todos los usuarios');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'enviar a todos los administradores');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'enviar a todos los usuarios que est&aacute;n en linea');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Error inesperado: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'El archivo no esta activado.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'El almacenado del mensaje en el archivo ha fallado.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Tienes guardados ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>No tienes guardado ning&uacute;n mensaje en el archivo todav&iacute;a.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' mensajes');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Tienes almacenado un mensaje');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Para guardar mensajes, tienes que borrar otros mensajes primero.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Puedes guardar un m&aacute;ximo de ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' mensajes.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Tienes ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' mensajes en tu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'archivo');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'bandeja de entrada');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'bandeja de entrada y archivo');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'El m&aacute;ximo permitido es ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Tu puedes recibir y leer mensajes pero no podr&aacute;s responderlos o crear nuevos hasta que borres mensajes.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Mensajes guardados: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(de un m&aacute;ximo ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Mensaje guardado en el archivo.');
DEFINE ('_UDDEIM_STORE', 'archivar');
		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'volver');

DEFINE ('_UDDEIM_TRASHCHECKED', 'borrar seleccionados');
	// translators info: plural!
	
DEFINE ('_UDDEIM_SHOWALL', 'mostrar todos los mensajes');
	// translators example "SHOW ALL messages"
	
DEFINE ('_UDDEIM_ARCHIVE', 'Archivo');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'El archivo esta lleno. No se ha guardado.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'No hay mensajes seleccionados.');
DEFINE ('_UDDEIM_THISISACOPY', 'Copia de el mensaje enviado para ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'copia para mi');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'copia para el archivo');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'tirar el original');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Descarga del Mensaje');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Env&iacute;o del correo con los mensajes exportados');
DEFINE ('_UDDEIM_EXPORT_NOW', 'correo enviado a mi');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Este correo incluye tus mensajes privados.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'No puedo enviar el correo conteniendo los mensajes');

DEFINE ('_UDDEIM_LIMITREACHED', 'Limite del mensaje! No restaurado.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Escribir un mensaje a ');

$udde_smon[1]="Ene";
$udde_smon[2]="Feb";
$udde_smon[3]="Mar";
$udde_smon[4]="Abr";
$udde_smon[5]="May";
$udde_smon[6]="Jun";
$udde_smon[7]="Jul";
$udde_smon[8]="Ago";
$udde_smon[9]="Sep";
$udde_smon[10]="Oct";
$udde_smon[11]="Nov";
$udde_smon[12]="Dic";

$udde_lmon[1]="Enero";
$udde_lmon[2]="Febrero";
$udde_lmon[3]="Marzo";
$udde_lmon[4]="Abril";
$udde_lmon[5]="Mayo";
$udde_lmon[6]="Junio";
$udde_lmon[7]="Julio";
$udde_lmon[8]="Agosto";
$udde_lmon[9]="Septiembre";
$udde_lmon[10]="Octubre";
$udde_lmon[11]="Noviembre";
$udde_lmon[12]="Diciembre";

$udde_lweekday[0]="Domingo";
$udde_lweekday[1]="Lunes";
$udde_lweekday[2]="Martes";
$udde_lweekday[3]="Miercoles";
$udde_lweekday[4]="Jueves";
$udde_lweekday[5]="Viernes";
$udde_lweekday[6]="Sabado";

$udde_sweekday[0]="Dom";
$udde_sweekday[1]="Lun";
$udde_sweekday[2]="Mar";
$udde_sweekday[3]="Mie";
$udde_sweekday[4]="Jue";
$udde_sweekday[5]="Vie";
$udde_sweekday[6]="Sab";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.
// already done in this file!
// 
// PLEASE
// When you're done translating, please change the

	// version       0.4+

// at the top of this file into

	// version       0.5

// and delete the line right after it that says

	// (0.4 plus 0.5 strings in English)

// as well as these comments. Thank you.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Template');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Choose the template you want uddeIM to use');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Show CB Connections');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Use <i>yes</i> if you have Community Builder installed and want to present the user the name of his/her connections on the compose new message page.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Show settings');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'The Settings link appears in uddeIM if you have the e-mail-notification or the blocking system activated. If you do not want this, you can turn it off here. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'yes, at bottom');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Allow BB codes');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'font formats only');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Use <i>font formats only</i> to allow users to use the bb codes for bold, italic, underline, font color and font size. When you set this option to <i>yes</i>, users are allowed to use <strong>all</strong> supported BB codes in their messages (even links and images).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Allow Emoticons');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'When set to <i>yes</i>, emoticon codes like :-) are replaced with emoticon graphics in message display. See the readme file for a list of supported emoticons.');
DEFINE ('_UDDEADM_DISPLAY', 'Display');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Show Menu Icons');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'When set to <i>yes</i>, menu and action links will be displayed with an icon.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Component Title');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Enter the headline of the private messaging component, for example \'Private Messages\'. Leave empty if you do not want to display a headline.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Show About link');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Set to <i>yes</i> to show a link to the uddeIM software credits and license. This link will be placed at the bottom of the uddeIM HTML output.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Stop e-mail now');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Check this box to prevent uddeIM from sending out e-mails (e-mail-notifications and forgetmenot e-mails) irrespective of the users\' settings, for example when testing the site. If you do not want these features ever, set all options above to <i>no</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manually');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails in lists');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Set to <i>yes</i> if you want to display the CB thumbnails of the users in the message lists overview (inbox, outbox, etc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Show users');
DEFINE ('_UDDEIM_CONNECTIONS', 'Connections');
DEFINE ('_UDDEIM_SETTINGS', 'Settings');
DEFINE ('_UDDEIM_NOSETTINGS', 'There are no settings to adjust.');
DEFINE ('_UDDEIM_ABOUT', 'About'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Nuevo mensaje'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Mail-Notification');
DEFINE ('_UDDEIM_EMN_EXP', 'You can receive an e-mail when you get new private messages.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-mail-notification on new messages');
DEFINE ('_UDDEIM_EMN_NONE', 'No e-mail-notification');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'E-mail-notification when offline');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Don\'t send notification on replies');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'User blocking'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'You can prevent users from sending you messages by blocking them. Choose <i>block user</i> when you view a messages from the respective user.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Save change');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB Code tags to produce bold text. Usage: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB Code tags to produce italic text. Usage: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB Code tags to produce underlined text. Usage: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB Code tags to produce coloured letters. Usage [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example FF0000 for red.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB Code tags to produce coloured letters. Usage [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example 00FF00 for green.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB Code tags to produce coloured letters. Usage [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example 0000FF for blue.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB Code tags to produce very small letters. Usage: [size=1]very small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB Code tags to produce small letters. Usage: [size=2] small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB Code tags to produce big letters. Usage: [size=4]big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB Code tags to produce very big letters. Usage: [size=5]very big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB Code tags to insert a link to an image. Usage: [img]Image-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB Code tags to insert a hyperlink. Usage: [url]web address[/url]. Do not forget the http:// at the beginning of every web address.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Close all open BB tags.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' message in your'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>You have no messages in your archive.</strong>'); 
