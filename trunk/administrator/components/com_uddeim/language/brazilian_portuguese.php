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
// Language file: Brazilian Portuguese (source file is Latin-1)
// Translator:    unknown <noemail>
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

DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'As mensagens ficarão na lixeira por ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' horas antes de serem apagadas. Você só poderá ver as primeiras palavras da mensagem. Para ler a mensagem completamente você terá que restaura-la.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Esta mensagem esta em modo de edição. Você poderá edita-la e reenvia-la.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Essa mensagem não pode ser editada (provavelmente porque foi lida ou apagada.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Falha ao restaurar mensagem. (é provável que ela tenha sido transferida para a lixeira e depois apagada.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Falha ao restaurar mensagem.');
DEFINE ('_UDDEIM_DONTSEND', 'Não enviar');
DEFINE ('_UDDEIM_SENDAGAIN', 'Reenviar');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Você não esta logado em.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Você não tem mensagens em sua Caixa de Entrada.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Você não tem mensagens em sua Caixa de Saída.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Você não tem mensagens em sua Lixeira.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Caixa de Entrada');
DEFINE ('_UDDEIM_OUTBOX', 'Caixa de Saída');
DEFINE ('_UDDEIM_TRASHCAN', 'Lixeira');
DEFINE ('_UDDEIM_CREATE', 'Nova mensagem');
DEFINE ('_UDDEIM_UDDEIM', 'Mensagem Privada');
	// this is the headline/name of the component as it appears in Mambo

DEFINE ('_UDDEIM_READSTATUS', 'Ler');
	// as in 'this message has been "read"'

DEFINE ('_UDDEIM_FROM', 'Dê');
DEFINE ('_UDDEIM_FROM_SMALL', 'dê');
DEFINE ('_UDDEIM_TO', 'Para');
DEFINE ('_UDDEIM_TO_SMALL', 'para');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Sua caixa de saída contém todas as mensagens que você enviou mas que ainda não foram apagadas. Você poderá editar as mensagens na caixa de saída se elas não foram ainda lidas pelo destinatário. Durante a edição ela não será lida pelo destinatário. ');
DEFINE ('_UDDEIM_RECALL', 'editar');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Editar esta mensagem');
DEFINE ('_UDDEIM_RESTORE', 'restaurar');
DEFINE ('_UDDEIM_MESSAGE', 'Mensagem');
DEFINE ('_UDDEIM_DATE', 'Data');
DEFINE ('_UDDEIM_DELETED', 'Apagado');
DEFINE ('_UDDEIM_DELETE', 'apagar');
DEFINE ('_UDDEIM_DELETELINK', 'apagar');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Esta mensagem não pode ser exibida. <br />Possíveis razões:<ul><li>Você não tem permissão para ler essa mensagem privada</li><li>A mensagem foi apagada</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Você moveu esta mensagem para a lixeira</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Mensagem dê ');
DEFINE ('_UDDEIM_MESSAGETO', 'Mensagem sua para ');
DEFINE ('_UDDEIM_REPLY', 'Resposta');
DEFINE ('_UDDEIM_SUBMIT', 'Enviar');
DEFINE ('_UDDEIM_NOMESSAGE', 'Erro: Esta faltando o texto na mensagem! Nenhuma mensagem foi enviada.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Resposta enviada');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Mensagem Enviada');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' e a mensagem original foi movida para a lixeira');
DEFINE ('_UDDEIM_NOSUCHUSER', 'O nome de usuário informado não foi encontrado!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'não é possível enviar mensagem para você mesmo!');
DEFINE ('_UDDEIM_PRUNELINK', 'Somente Admin.: Prune');
DEFINE ('_UDDEIM_BLOCKS', 'Bloqueado');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Não enviado (o usuário o bloqueou)');
DEFINE ('_UDDEIM_BLOCKNOW', 'bloquear&nbsp;usuário');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Esta é uma lista de usuários bloqueados. Estes usuários não podem enviar mensagens privadas para você.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Você não tem nenhum usuário bloqueado.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Você bloqueou atualmente ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' usuário(s).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[desbloquear]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Se um usuário bloqueado tentar lhe enviar uma mensagem, Ele será informado que você o bloqueou e que a mensagem não pode ser enviada.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'O usuário bloqueado não poderá saber que você o bloqueou.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Você não poderá bloquear administradores.');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistema de Bloqueio não habilitado');
DEFINE ('_UDDEIM_CANTREPLY', 'Você não pode enviar essa mensagem.');
DEFINE ('_UDDEIM_EMNOFF', 'O e-mail de notificação esta desligado. ');
DEFINE ('_UDDEIM_EMNON', 'O e-mail de notificação esta ligado. ');
DEFINE ('_UDDEIM_SETEMNON', '[ligado]');
DEFINE ('_UDDEIM_SETEMNOFF', '[desligado]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Olá %you%,

%user% lhe enviou uma mensagem privada em %site%.
Por favor é precios estar logado para ler a mensagem!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Olá %you%,

%user% lhe enviou a seguinte mensagem privada %site%.
Por favor é preciso estar logado para responder a mensagem!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Hi %you%,

você tem mensagens privadas não lidas em %site%.
Por favor faça o seu login para visualiza-la!
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Você tem mensagens no %site%');





DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Falha ao tentar arquivar mensagem.');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Você não tem nenhuma mensagem arquivada.</strong>');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Você arquivou ');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' mensagens');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Você arquivou uma mensagem');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Para salvar essa mensagem você terá que primeiro apagar outra.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Você pode salvar no máximo ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' mensagens.');

DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Você tem ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' mensagens em seu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arquivo');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'Caixa de entrada');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'Caixa de entrada e arquivo');
	// The lines above are to make up a sentence like
	// "You have | 126 | messages in your | inbox and archive"

DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'O máximo permitido é ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Você ainda pode receber e ler mensagens mas não poderá responder ou escrever até que você apague alguma mensagem antiga.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Mensagens arquivadas: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(no max. ');
	// don't add closing bracket

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Mensagens guardadas no arquivo.');
DEFINE ('_UDDEIM_STORE', 'arquivo');
	// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'voltar');

DEFINE ('_UDDEIM_TRASHCHECKED', 'confirmando exclusão de');
	// translators info: plural! (as in "delete checked" messages)
	
DEFINE ('_UDDEIM_SHOWALL', 'exibir todas as');
	// translators example "SHOW ALL messages"
	
DEFINE ('_UDDEIM_ARCHIVE', 'Arquivo');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'O arquivo esta cheio. Não foi possível salvar.');
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Nenhuma mensagem selecionada.');
DEFINE ('_UDDEIM_THISISACOPY', 'Copia da mensagem enviada para ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'copia para mim');
	// as in 'send a "copy to me"' or cc: me

DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'copiar para o arquivo');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'lixo original');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Download da Mensagem');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail com mensagens exportadas');
DEFINE ('_UDDEIM_EXPORT_NOW', 'e-mail de confrmação para mim');
	// as in "send the messages checked above by E-Mail to me"

DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Esta e-mail contém sua mensaem privada.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Não é possível enviar e-mails que contenham mensagens.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Limite da mensagem! Não restaurado.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Escrever mensagem para ');
	// as in "write a message to" (a person)

// months and weeknames (please translate according 
// to your language)

$udde_smon[1]="Jan";
$udde_smon[2]="Fev";
$udde_smon[3]="Mar";
$udde_smon[4]="Abr";
$udde_smon[5]="Mai";
$udde_smon[6]="Jun";
$udde_smon[7]="Jul";
$udde_smon[8]="Ago";
$udde_smon[9]="Set";
$udde_smon[10]="Out";
$udde_smon[11]="Nov";
$udde_smon[12]="Dez";

$udde_lmon[1]="Janeiro";
$udde_lmon[2]="Fevereiro";
$udde_lmon[3]="Março";
$udde_lmon[4]="Abril";
$udde_lmon[5]="Mai";
$udde_lmon[6]="Junho";
$udde_lmon[7]="Julho";
$udde_lmon[8]="Augosto";
$udde_lmon[9]="Setembro";
$udde_lmon[10]="Outubro";
$udde_lmon[11]="Novembro";
$udde_lmon[12]="Dezembro";

$udde_lweekday[0]="Domingo";
$udde_lweekday[1]="Segunda";
$udde_lweekday[2]="Terça";
$udde_lweekday[3]="Quarta";
$udde_lweekday[4]="Quinta";
$udde_lweekday[5]="Sexta";
$udde_lweekday[6]="Sábado";

$udde_sweekday[0]="Dom";
$udde_sweekday[1]="Seg";
$udde_sweekday[2]="Ter";
$udde_sweekday[3]="Qua";
$udde_sweekday[4]="Qui";
$udde_sweekday[5]="Sex";
$udde_sweekday[6]="Sab";

// *********************************************************
// the following can remain English
// *********************************************************

DEFINE ('_UDDEIM_NOID', 'Erro: Não foi encontrado o ID do destinatário. Nenhuma mensagem enviada.');
DEFINE ('_UDDEIM_VIOLATION', '<b>Violação de acesso!</b> Você não tem permissão para executar essa ação!');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Erro inesperado: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arquivo não habilitado.');


// *********************************************************
// No translation necessary below this line
// *********************************************************

DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'Administração do uddeIM');
DEFINE ('_UDDEADM_GENERAL', 'Geral');
DEFINE ('_UDDEADM_ABOUT', 'Sobre');
DEFINE ('_UDDEADM_DATESETTINGS', 'Data/hora');
DEFINE ('_UDDEADM_PICSETTINGS', 'Ícones');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Guardar Mensagens que foram lidas por (dias)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Guardar Mensagens que não foram lidas por (dias)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Guardar Mensagens na lixeira por (dias)');
DEFINE ('_UDDEADM_DAYS', 'dia(s)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Defina o número de dias em que as mensagens, que já foram lidas, devem ser apagadas, automaticamente, da caixa de entrada. Se você não deseja que as mensagens sejam apagas automaticamente, coloque um valor alto (por exemplo, 36524 dias equivale a um século). Mas esteja atento que o banco de dados poderá ficar muito cheio caso as mensagens não sejam apagadas.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Defina o número de dias em que as mensagens <b>não lidas</b>, pelos destinatários, devem ser apagadas automaticamente.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Defina o número de dias para que as mensagens sejam apagadas da lixeira automaticamente. Valores menores que 1 também são aceitos. Por Exemplo: para que as mensagens sejam apagadas da lixeira após 3 horas, basta preencher com o número 0.125.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Exibir o formato de data');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Escolha o formato de date/hora que será exibido juntamente com a mensagem. Meses serão abreviados de acordo com sua opção de idioma que esta sendo utilizado pelo Mambo (caso exita o arquivo de idioma do uddeIM correspondente).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'formato longo de exibição da data');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Escolha o formato da data que será exibida ao abrir a mensagem. Para semanas e meses, será usado o padrão utilizado pelo mambo (se existir um arquivo de idiomas do uddeIM correspondente ao utilizado pelo Mambo).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'A exclusão só poderá ser solicitada pelo administrador');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'sim, somente os administradores');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'não, os usuários também poderão fazer');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatic deletions put a heavy weight on servers and databases. If you choose <i>yes,&nbsp;by&nbsp;admins&nbsp;only</i> automatic deletions according to the settings above (of all users\' messages) are invoked when any admin checks his or her inbox. Choose this option if an admin is checking the inbox around once a day or more often, which is the case at most sites. (If your site has more than one admin, it doesn\'t matter which of them logs in as deletions are automatically invoked by any admin.) At very small or rarely administered sites where admins rarely check their inboxes, choose <i>no,&nbsp;by&nbsp;any&nbsp;user</i>. If you do not understand this or do not know what to do, choose <i>no, by any user</i>.');
DEFINE ('_UDDEADM_SAVESETTINGS', 'Salvar Configuração');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'A configuração foi salva no arquivo config:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'As configuraçõs foram salvas.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ìcone: Usuário esta online');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Digite o endereço da localização do ìcone, que será exibido quando o usuário estiver online.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ìcone: Usuário esta offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Digite o endereço da localização do ícone, que será exibido quando o usuário estiver offline.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Ícone: Mensagem Lida');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Digite o endereço da localização do ícone, que será exibido para Mensagens Lidas.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ícone: Mensagem não Lida');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Digite o endereço da localização do ìcone, que será exibido para Mensagens não Lidas.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Módulo: Ícone Mensagens Novas');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Esta configuração se refere ao módulo mod_uddeim_new. Digite a localização desse ícone, que será exibido quando houver mensagens novas.');
DEFINE ('_UDDEADM_UDDEINSTALL', 'Instalação do uddeIM');
DEFINE ('_UDDEADM_FINISHED', 'A Instalação foi finalizada. Seja Bem-vindo ao uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Você não tem o Mambo Community Builder instalado. Você não poderá usar uddeIM.</span><br /><br />Você poderá fazer download no endereço: <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continue');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Há ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' mensagens em seu PMS. Você deseja importa-las para o uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Isto não alterará as mensagens de PMS e a sua instalação eles permanecerão intactos. Você poderá importar com segurança para o uddeIM e manter o PMS funcionando se desejar. (Você deverá primeiramete salvar as alterações e a configuração antes da promover a importação!) As mensagens que estão no Banco de Dados do uddeIM ficarão intactas.');
DEFINE ('_UDDEADM_IMPORT_YES', 'Importar mensagens do PMS para o uddeIM agora');
DEFINE ('_UDDEADM_IMPORT_NO', 'Não, não importe nenhuma mensagem');
DEFINE ('_UDDEADM_IMPORTING', 'Aguarde as mensagens estão sendo importadas.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Concluída a importação das mensagens do PMS. Não rode esse script novamente caso contrário as mensagens ficarão duplicadas.');
DEFINE ('_UDDEADM_IMPORT', 'Importar');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importar mensagens do PMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Não encontramos o PMS instalado. Importação imporssível.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Você já importou as mensagens do PMS para o uddeIM.</span>');
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Habilitar o sistema de bloqueio');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Quando estiver habilitado, os usuários terão permissão para bloquear outros usuários. O usuário bloqueado não poderá enviar mensagens para o usuário que o bloqueou. Administradores não podem ser bloqueados.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'sim');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'não');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Notificar o usuário que foi bloqueado');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Se você selecionar <i>sim</i>, o usuário bloqueado será notificado de que não poderá enviar a mensagem porque o destinatário o bloqueou. Se for selecionada a opção <i>não</i>, o usuário bloqueado não será notificado que a mensagem não foi enviada.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'sim');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'não');
DEFINE ('_UDDEADM_DELETIONS', 'Exclusão');
DEFINE ('_UDDEADM_BLOCK', 'Bloqueando');
DEFINE ('_UDDEADM_INTEGRATION', 'Integração');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Exibir links do CB');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Ao selecionar <i>sim</i>, o perfil de todos os usuários será exibido no uddeIM através de um link do Community Builder.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Exibir thumbnail do CB');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Ao selecionar <i>sim</i>, o thumbnail do respectivo usuário será exibido quando a mensagem for lida (se o usuário possuir uma imagem no perfil do Community Builder).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Exibir estatus online');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Ao selecionar <i>sim</i>, o uddeIM exibe todos o  nomes de usuários através de um ícone pequeno que informará se o usuário esta on-line ou offline. Você poderá definir a imagem dos ícone no painel de controle do administrador.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Permitir e-mail de notificação');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Ao selecionar <i>sim</i>, todos os usuários poderão escolher se desejam receber um e-mail de notificação ao receber uma mensagem.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'O E-mail contem a mensagem');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Ao selecionar <i>não</i>, este e-mail somente conterá informaçõs resumidas de quando e quem enviou a mensagem.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Esqueceu e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Este recurso enviar, independente de sua configurão, um e-mail notificando que exite mensagens não lidas na Caixa de Entrada por um período muito longo. Se você não deseja que e-mails sejam enviados você deve desabilitar essa função.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Esquecer de enviar após dias');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'If the forgetmenot feature (above) is set to <i>yes</i>, set here after how many days e-mail notifications about unread messages shall be dispatched.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Primeira lista de caracteres');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Você poderá determinar aqui quantos caracteres podem ser exibidos na caixa de entrada, na caixa de saída e na lixeira.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Comprimento máximo da mensagem');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Selecione aqui o comprimento máximo da mensagem. Ela será removida automaticamente após. Selecione  \'0\' para permitir o comprimento máximo da mensagem (não ecomendado).');
DEFINE ('_UDDEADM_YES', 'sim');
DEFINE ('_UDDEADM_NO', 'não');
DEFINE ('_UDDEADM_ADMINSONLY', 'somente admins');
DEFINE ('_UDDEADM_SYSTEM', 'Sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'System messages username');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM supports system messages. They do not have a visible sender and users can\'t reply to them. Enter here the default username alias for system messages (for example <i>Support</i> or <i>Help desk</i> or <i>Community Master</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Permitir que os administradores enviem mensagens gerais');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM supports general messages. They are sent to every user on your system. Use them sparingly.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nome do remetendo do e-mail');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Digite o nome que será exibido no e-mail de notificação. (Por exemplo <i>Nome do  seu Site</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Endereço do remetento do E-mail');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Digite o endereço de e-mail que será exibido no e-mail de notificação (pode ser o endereço de contato do seu site.');
DEFINE ('_UDDEADM_VERSION', 'Versão do uddeIM');
DEFINE ('_UDDEADM_ARCHIVE', 'Archive'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Habilitar arquivo');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Escolha se os usuários terão permissão para arquivar as mensagens. Mensagens arquivadas não serão apagadas.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Max de mensagens no arquivo do usuário');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Defina quantas mensagens podem ser arquivadas (não haverá limites para os administradores).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Permitir cópia');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Permitir que os usuários recebam cópia das mensgens enviadas. As cópias surgirão na caixa de entrada.');
DEFINE ('_UDDEADM_MESSAGES', 'Mensagens');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Enviar para a lixeira mensagens respondidas');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Quando ativado, a opção \'Enviar\' para a \'lixeira mensagens respondidas\' é a padrão. Nesse caso, a mensagem será movida da caixa de entrada para a lixeira após ser respondida. Esta opção reduz o nº de mensagens no banco de Dados. Os usuários poderão desmarcar essa opção para que as mensagens permaneçam na Caixa de Entrada.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Messagens por página');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Defina aqui o número de mensagens exibidas por página na caixa de Entrada, caixa de Saída, Lixeira e arquivo.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Caractere usado');
DEFINE ('_UDDEADM_CHARSET_EXP', 'If you\'re experiencing problems with non-latin character sets displayed, you can enter the charset uddeIM uses to convert database output to HTML code here. <b>If you don\'t know what that means, do not change the default value!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Used mail charset');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'If you\'re experiencing problems with non-latin character sets displayed, you can enter the charset uddeIM uses to send outgoing e-mails with. <b>If you don\'t know what that means, do not change the default value!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Esse é o conteúdo do e-mail que o usuário receberá quando essa opção for selecionada. O conteúdo da mensagem não estará no e-mail. Mantenha as variáveis %you%, %user% e %site% intactas. ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Esse é o conteúdo do e-mail que o usuário receberá quando essa opção for selecionada. Este e-mail não será incluído no conteúdo da mensagem. Mantenha as variáveis %you%, %user%, %pmessage% e %site% intactas. ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'This is the content of the forgetmenot e-mail users will receive when the option is set above. Keep the variables %you% and %site% intact. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Allow users to download messages from their archive by sending them as e-mail to themselves.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Permitir download');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'This is the format of the e-mail users will receive when they download their own messages from the archive. Keep the variables %user%, %msgdate% and %msgbody% intact. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Selecione o limite da Caixa de Entrada');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Você poderá definir o número de mensagens na Caixa de Entrada e no arquivo. Nesse caso o número de mensagens não poderá ultrapassar o valor fixado. Alternativamente, você poderá selecionar o limte da caixa de saída. Nesse caso os usuários não terão conhecimento do número de mensagens exibidas na caixa de saída. Se o limite for atingido o usuário não poderá responder ou compor novas mensagens até que eles apaguem as mensagens antigas tanto na caixa de saída ou no arquivo.');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Exibir limite usado na Caixa de Entrada');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Exibir quantas mensagens os usuários estão armazenando (e quanto é permitido armazenar) na linha abaixo da Caixa de Entrada.');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Você esta saindo do Arquivo. Como deseja controlar as mensagens que são salvas no arquivo?');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Leave them');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Leave them in the archive (user will not be able to access them and they will still count against message limits).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Mover para Caixa de Entrada');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Mensagem Arquivada movida para lixeira');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'A mensagem foi movida para a caixa de entrada do usuário (or to trash if they are older than allowed in the inbox).');

		
// 0.4 frontend, but visible admins only (no translation necessary)		

DEFINE ('_UDDEIM_SEND_ASSYSM', 'emviar mensagem de sistema (=destinatário não pode responder)');
DEFINE ('_UDDEIM_SEND_TOALL', 'enviar para todos os usuários');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'enviar para todos os admins');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'enviar para todos os usuários on-line');
DEFINE ('_UDDEIM_VALIDFOR_1', 'válido para ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' horas. 0=para sempre (exclusão automática)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Sistema criado ou mensagem geral]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Criar uma mensagem normal (padrão)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Sistema e mensagem geral não permitidos.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Tipo de mensagem');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Ajuda em mensagem de sistema');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(abrir em uma nova janela)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Você está a ponto de enviar a mensagem exibida abaixo. Por favor faça uma revisão e confirme ou cancele!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Mensagem para <strong>todos os usuários</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Mensagem para<strong>todos os administradores</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Mensagem para  <strong>todos que estão atualmente logados como usuários</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Os destinatários não poderão responder a esta mensagem.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Mensagem será enviada com <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> como nome de usuário');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Mensagem irá expirar ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Mensagem não expira');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Confira o link (clicando nele) antes de prosseguir!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Usar <strong>em mensagens de sistema somente</strong>:<br /> [b]<strong>negrito</strong>[/b] [i]<em>itálico</em>[/i]<br />
[url=http://www.someurl.com]texto com link url[/url] ou [url]http://www.someurl.com[/url] estão com links');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Erro: Nenhum destinatário encontrado. Mensagem não enviada.');
		
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
DEFINE ('_UDDEIM_COMPOSE', 'Nova mensagem'); // as in "write new message", but only one word
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
