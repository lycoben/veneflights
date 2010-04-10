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
// Language file: Romanian (source file is Latin-1)
// Translator:     unknown <noemail>
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

DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Mesajele vor sta in cosul de gunoi pentru ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' ore inainte de a fi sterse. Puteti vedea doar primele cuvinte ale mesajului. Pentru a citii mesajul intreg, trebuie mai intai sa il restaurati.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Acest mesaj a fost anulat. Acum il puteti edita si retrimite.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Mesajul nu a putut fi anulat  (probabil deoarece a fost citit sau sters.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Restaurarea mesajului a esuat. (Probabil a fost in cosul de gunoi pentru prea mult timp si a fost stearsa intre timp.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Restaurarea mesajului a esuat.');
DEFINE ('_UDDEIM_DONTSEND', 'Nu trimite');
DEFINE ('_UDDEIM_SENDAGAIN', 'Retrimite');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Nu esti autentificat.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Nu aveti nici un mesaj in inbox.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Nu aveti nici un mesaj in outbox.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Nu aveti nici un mesaj in codul de gunoi.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Inbox');
DEFINE ('_UDDEIM_OUTBOX', 'Outbox');
DEFINE ('_UDDEIM_TRASHCAN', 'Cos de gunoi');
DEFINE ('_UDDEIM_CREATE', 'Mesaj nou');
DEFINE ('_UDDEIM_UDDEIM', 'Mesaje private');
	// this is the headline/name of the component as it appears in Mambo

DEFINE ('_UDDEIM_READSTATUS', 'Cititi');
	// as in 'this message has been "read"'

DEFINE ('_UDDEIM_FROM', 'De la');
DEFINE ('_UDDEIM_FROM_SMALL', 'de la');
DEFINE ('_UDDEIM_TO', 'Catre');
DEFINE ('_UDDEIM_TO_SMALL', 'catre');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Outbox-ul dumneavoastra contine toate mesajele pe care le-ati trimis si nu au fost inca sterse. Puteti anula un mesaj in outbox daca nu a fost citit. Daca veti face asa, mesajul nu va mai putea fi citit de catre destinatar. ');
DEFINE ('_UDDEIM_RECALL', 'Anulati');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Anulati acest mesaj');
DEFINE ('_UDDEIM_RESTORE', 'restaurati');
DEFINE ('_UDDEIM_MESSAGE', 'Mesaj');
DEFINE ('_UDDEIM_DATE', 'Data');
DEFINE ('_UDDEIM_DELETED', 'Sters');
DEFINE ('_UDDEIM_DELETE', 'stergeti');
DEFINE ('_UDDEIM_DELETELINK', 'stergeti');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Acest mesaj nu poate fi afisat. <br />Cause posibile:<ul><li>Nu sunteti autorizat sa cititi acest mesaj</li><li>Acest mesaj a fost sters</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Ati mutat acest mesaj in cosul de gunoi.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Mesaj de la ');
DEFINE ('_UDDEIM_MESSAGETO', 'Mesaj de la dumneavoastra catre ');
DEFINE ('_UDDEIM_REPLY', 'Raspundeti');
DEFINE ('_UDDEIM_SUBMIT', 'Trimiteti');
DEFINE ('_UDDEIM_NOMESSAGE', 'Eroare: Mesajul nu continte text! u a fost trimis nici un mesaj.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Raspuns trimis');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Mesaj trimis');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' si mesajul origian aruncat la cosul de gunoi');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Nu este nici un utilizator cu acest nume!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Nu este posibil sa va trimiteti mesaje dumneavoastra!');
DEFINE ('_UDDEIM_PRUNELINK', 'Numai pentru Administratori: Curatati');
DEFINE ('_UDDEIM_BLOCKS', 'Blocat');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nu a fost trimis (utilizatorul v-a blocat)');
DEFINE ('_UDDEIM_BLOCKNOW', 'blocati&nbsp;utilizator');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Aceasta este o lista a utilizatorilor pe care i-ati blocat. Acesti utilizatori nu va pot trimite mesaje.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Momentan nu ati blocat nici un utilizator.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Momentan ati blocat ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' utilizator(i).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[deblocati]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Daca un utilizator blocat va incerca sa va trimita un mesaj, va fi informat ca este blocat si ca acel mesaj nu va poate fi transmis.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Un utilizator blocat nu poate vedea ca l-ati blocat.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Nu puteti bloca administratori.');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistemul de blocare nu este activat');
DEFINE ('_UDDEIM_CANTREPLY', 'Nu puteti raspunde la acest mesaj.');
DEFINE ('_UDDEIM_EMNOFF', 'Notificarea prin e-mail nu este activata. ');
DEFINE ('_UDDEIM_EMNON', 'Notificarea prin e-mail este activata. ');
DEFINE ('_UDDEIM_SETEMNON', '[activati]');
DEFINE ('_UDDEIM_SETEMNOFF', '[dezactivati]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Salut %you%, 

%user% va trimis un mesaj privat la %site%.
Va rugam autentificati-va si cititi!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Salut %you%, 

%user% va trimis urmatorul mesaj privat la %site%.
Va rugam autentificati-va si cititi!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Salut %you%,

Aveti mesaje private necitite la %site%.
Va rugam autentificati-va si cititi! 
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Aveti mesaje la %site%');





DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Salvarea mesajului in arhiva a esuat.');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Nu ati salvati inca nici un mesaj in arhiva.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Ati salvat ');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' mesaje');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Ati salva un mesaj');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Pentru a salva mesaje, trebuie mai intai sa stergeti alte mesaje.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Puteti salva maximum ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' mesaje.');

DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Aveti ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' mesaje in');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arhiva');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'inbox');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'inbox si arhiva');
	// The lines above are to make up a sentence like
	// "You have | 126 | messages in your | inbox and archive"

DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Maximum admis este ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Puteti inca primi si citii mesaje dar nu veti putea sa raspundeti sau sa compuneti mesaje noi pana cand nu stergeti mesaje.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Mesaje salvate: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(din maximum ');
	// don't add closing bracket

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Mesaje alvate in arhiva.');
DEFINE ('_UDDEIM_STORE', 'arhiva');
	// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'inapoi');

DEFINE ('_UDDEIM_TRASHCHECKED', 'stergeti marcate');
	// translators info: plural! (as in "delete checked" messages)
	
DEFINE ('_UDDEIM_SHOWALL', 'afisati toate');
	// translators example "SHOW ALL messages"
	
DEFINE ('_UDDEIM_ARCHIVE', 'Arhiva');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arhiva plica. Salvare esuata.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Nici un mesaj selectat.');
DEFINE ('_UDDEIM_THISISACOPY', 'Copie a mesajului trimis la ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'copiati la mine');
	// as in 'send a "copy to me"' or cc: me

DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'copiati in arhiva');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'stergeti originalul');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Descarcare MEsaj');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail cu mesaje exportate a fost trimis');
DEFINE ('_UDDEIM_EXPORT_NOW', 'e-mail bifat la mine');
	// as in "send the messages checked above by E-Mail to me"

DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Acest mail include mesajele dumneavoastra private.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Nu a fost posibila trimiterea mailului continand mesaje.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Limita mesaje atinsa! Restaurare esuata.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Scrieti un mesaj catre ');
	// as in "write a message to" (a person)

// months and weeknames (please translate according 
// to your language)

$udde_smon[1]="Ian";
$udde_smon[2]="Feb";
$udde_smon[3]="Mar";
$udde_smon[4]="Apr";
$udde_smon[5]="Mai";
$udde_smon[6]="Iun";
$udde_smon[7]="Iul";
$udde_smon[8]="Aug";
$udde_smon[9]="Sep";
$udde_smon[10]="Oct";
$udde_smon[11]="Nov";
$udde_smon[12]="Dec";

$udde_lmon[1]="Ianuarie";
$udde_lmon[2]="Februarie";
$udde_lmon[3]="Martie";
$udde_lmon[4]="Aprilie";
$udde_lmon[5]="Mai";
$udde_lmon[6]="Iunie";
$udde_lmon[7]="Iulie";
$udde_lmon[8]="August";
$udde_lmon[9]="Septembrie";
$udde_lmon[10]="Octombrie";
$udde_lmon[11]="Noiembrie";
$udde_lmon[12]="Decembrie";

$udde_lweekday[0]="Duminica";
$udde_lweekday[1]="Luni";
$udde_lweekday[2]="Marti";
$udde_lweekday[3]="Miercuri";
$udde_lweekday[4]="Joi";
$udde_lweekday[5]="Vineri";
$udde_lweekday[6]="Sambata";

$udde_sweekday[0]="D";
$udde_sweekday[1]="L";
$udde_sweekday[2]="Ma";
$udde_sweekday[3]="Mi";
$udde_sweekday[4]="J";
$udde_sweekday[5]="V";
$udde_sweekday[6]="S";

// *********************************************************
// the following can remain English
// *********************************************************

DEFINE ('_UDDEIM_NOID', 'Eroare: Nu a fost gasit destinataruul. Nici un mesaj nu a fost trimis.');
DEFINE ('_UDDEIM_VIOLATION', '<b>Acces Neautorizat!</b> Nu aveti indeajuns drepturi pentru a efectua aceasta actiune!');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Eroare Neasteptata: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arhiva nu este activata.');


// *********************************************************
// No translation necessary below this line
// *********************************************************

DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'Administrare uddeIM');
DEFINE ('_UDDEADM_GENERAL', 'General');
DEFINE ('_UDDEADM_ABOUT', 'Despre');
DEFINE ('_UDDEADM_DATESETTINGS', 'Data/timp');
DEFINE ('_UDDEADM_PICSETTINGS', 'Pictograme');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Cititi mesaje pastrate de (zile)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Mesaje necitite pastrate de (zile)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Mesaje pastrate in cosul de gunoi de (zile)');
DEFINE ('_UDDEADM_DAYS', 'zi(le)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Introduceti numarul de zile pana cand mesajele <b>citite</b> vor fi sterse automat din inbox. Daca nu doriti ca mesajele sa fie sterse in mod automat, introduceti o valoare foarte mare (de exemplu, 36524 zile inseamna un secol). Dar tineti minte ca baza de date se poate umple rapid daca pastrati toate mesajele.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Introduceti numarul de zile pana cand mesajele care <b>nu au fost citite</b> inca de destinatarul lor, vor fi sterse .');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Introduceti numarul de zile pana cand mesajele vor fi sterse din cosul de gunoi. Valorile mai mici decat 1 sunt acceptate. exemplu: Pentru a sterge mesajele din cosul de gunoi dupa 3 ore, introduceti valoarea 0.125.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Format afisare data');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Alegeti formatul in care sa fie afisata data/ora. Lunile vor fi abreviate in functie de setarile locale in Mambo (daca un fisier de limbaj uddeIM este prezent).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Afisare data in format mai mare');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Cand sunt afisate mesajele exista mai mult spatiu pentru data. Alegeti forat data pentru afisare cand deschideti un mesaj. Pentru numele zilelor si lunilor, setarile locale alex MAmbo vor fi folosite (daca un fisier de limbaj uddeIM este prezent).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Stergere invocata doar de Administratori');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'da, doar de catre administratori');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'nu, de catre orice utilizator');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Stergerea automatica ingreuneaza serverele si bazele de date. Daca alegeti <i>da,&nbsp;doar&nbsp;de&nbsp;catre&nbsp;administratori</i> stergere automata conform setarilor de mai sus (a tuturor mesajelor utilizatorilor) este invocata cand oricare Administrator verifica inbox-ul sau. Alegeti aceasta optiune daca un administrator isi verifica inbox-ul o data pe zi sau mai des, care este cazul la cele mai multe site-uri. (Daca site-ul dumneavoastra are mai mult de un administrator, nu conteaza care dintre ei este autentificat stergerile dunt invocate in mod automat de oricare dintre ei.) LA site-uri foarte mici sau rar administrate unde administratorii isi verifica rar inbox-ul, alegeti <i>nu,&nbsp;de&nbsp;catre&nbsp;orice&nbsp;utilizator</i>. Daca nu intelegeti sau nu stiti ce sa faceti, alegeti <i>nu, de catre orice utilizator</i>.');
DEFINE ('_UDDEADM_SAVESETTINGS', 'Salvati setari');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Urmatoarele setari au fost salvate in fisierul de configurare:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Setarile nu au fost salvate.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Pictograma: Utilizator este online');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Introduceti locatia pictogramei care va fi afisata alaturi de numele utilizatorului cand acesta este online.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Pictograma: Utilizator este offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Introduceti locatia pictogramei care va fi afisata alaturi de numele utilizatorului cand acesta este offline.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Pictograma: Mesaj Citit');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Introduceti locatia pictogramei care va fi afisata pentru mesaje citite.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Pictograma: Mesaj NeCitit');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Introduceti locatia pictogramei care va fi afisata pentru mesaje necitite.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: Pictograma Mesaje Noi');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Aceasta setare se refera la modulul mod_uddeim_new. ntroduceti locatia pictogramei care va fi afisata de acest module cand sunt mesaje noi.');
DEFINE ('_UDDEADM_UDDEINSTALL', 'Instalare uddeIM');
DEFINE ('_UDDEADM_FINISHED', 'Instalarea este terminata. Bine ati venit la uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Nu aveti instalat Mambo Community Builder. Nu veti putea sa folositi uddeIM.</span><br /><br />Ar trebui sa descarcati <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continuati');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Exista ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' mesaje in instalarea dumneavoastra de PMS. Doriti sa le importati in uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Aceasta nu va altera mesajele PMS. Vor fi pastrate intacte. Le puteti importa in siguranta in uddeIM, chiar daca intentionati sa continuati sa folositi PMS. (Ar trebui sa salvati orice setari ati efectuat inainte de a incepe importarea!) Orice mesaje care sunt deja in baza de date uddeIM vor ramane intacte.');
DEFINE ('_UDDEADM_IMPORT_YES', 'Importati mesaje PMS in uddeIM acum');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nu, nu importa nici un mesaj');  
DEFINE ('_UDDEADM_IMPORTING', 'Va rugam asteptati cat timp mesajele sunt importate.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Importarea measajelor din PMS s-a terminat. Nu rulati aceasta instalare din nou deoarece mesajele vor fi importate din nou si vor aparea de doua ori.'); 
DEFINE ('_UDDEADM_IMPORT', 'Importati');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importati mesaje din PMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Nu a fost gasita nici o instalare de PMS. Importarea nu a fost posibila.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Ati importat deja mesajele din PMS in uddeIM.</span>');
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Activati sistemul de blocare');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Cand este activat, utilizatorii pot bloca alti utilizatori. Un utilizator blocat nu poate trimite mesaje utilizatorului care l-a blocat. Administratorii nu pot fi blocati.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'da');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'nu');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Utilizatorii blocati primesc mesaj');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Daca este selectat <i>da</i>, un utilizator blocat va fi informat ca mesajul sau nu a fost trimis deoarece destinatarul l-a blocat. Daca este selectat <i>nu</i>, utilizatorul blocat nu primeste nici un fel de notificare ca mesajul sau nu a fost trimis.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'da');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'nu');
DEFINE ('_UDDEADM_DELETIONS', 'Stergeri');
DEFINE ('_UDDEADM_BLOCK', 'Blocare');
DEFINE ('_UDDEADM_INTEGRATION', 'Integrare');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Afisati link-uri CB');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Cand este selectat <i>da</i>, toate numele utilizatorilor afisate in uddeIM vor fi afisate ca link-uri catre profilul lor din Community Builder.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Afisati thumbnail-ul CB');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Cand este selectat <i>da</i>, thumbnail-ul respectivului user va fi afisat cand este citit un mesaj (daca acel utilizator are o poza in profilul din Community Builder).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Afiseaza statut conectare');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Cand este selectat <i>da</i>, uddeIM afiseaza fiecare utilizator cu o pictograma care informeaza daca acel utilizator este conectat sau nu. Puteti seta pictograma in dialogul de administrare a pictogramelor.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Permiteti notificare prin e-mail');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Cand este selectat <i>da</i>, fiecare utilizator poate alege daca doreste sa primeasca un e-amil de fiecare data cand un mesaj ajunge in inbox-ul sau.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail contine mesajul');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Cand este selectat <i>nu</i>, e-mail-ul va contine doar informatii cu privire la expeditor si timpul primirii mesajului, dar nu si mesajul in sine.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'E-mail numauita');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Aceasta setare trimite - independent de setarile utilizatorului - un e-mail catre un utilizator care are un mesaj necitit in inbox de foarte mult timp (setat mai jos). Aceasta setare este independenta de setarea \'Permiteti notificare prin e-mail\' de mai sus. DAcanu doriti sa trimiteti deloc mesaje e-mail, trebuie sa le dezactivati pe amandoua.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Numauita trimis dupa zi(le)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Daca setarea numauita (de mai sus) este setata <i>da</i>, setati aici dupa cate zile notificarile e-mail legare de mesajele necitite vor fi trimise.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Lista primele caractere');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Puteti seta aici cate caractere dintr-un mesaj vor fi afisate in inbox, outbox si cos de gunoi.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Lungime maxima mesaj');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Setati aici lungimea maxima a mesajului. Mesajul va fi automat truncat dupa acest numar de caractere. Setati \'0\' pentru a permite mesaje de orice lungime (nu este recomandat).');
DEFINE ('_UDDEADM_YES', 'da');
DEFINE ('_UDDEADM_NO', 'no');
DEFINE ('_UDDEADM_ADMINSONLY', 'doar administratori');
DEFINE ('_UDDEADM_SYSTEM', 'Sistem');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Nume utilizator mesaje sistem');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM suporta mesaje sistem. Acestea nu au un destinatar vizibilsi utilizatorii nu pot raspunde la acestea. Introduceti numele de utilizator implicit pentru mesaje sistem (exemplu <i>Suport</i> sau <i>Help desk</i> sau <i>Moderator</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Permiteti administratorilor sa trimita mesaje generale');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM suporta mesaje generale. Acestea sunt trimise catre toti utilizatorii. Folositi-le cu economie.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nume expeditor E-mail');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Introduceti numele care va aparea in dreptul expeditorului in e-mail-urile de notificare (de exemplu <i>NUMELESITEULUI</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adresa expeditor E-mail');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Introduceti adresa de pe care vor fi trimise e-mail-urile de notificare (aceasta ar trebui sa file adresa principala de contact a site-ului dumneavoastra.');
DEFINE ('_UDDEADM_VERSION', 'Versiune uddeIM');
DEFINE ('_UDDEADM_ARCHIVE', 'Arhiva'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Activati arhiva');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Alegeti daca utilizatorii vor avea voie sa salveze mesaje in arhiva. Mesajele din arhiva nu vor fi sterse.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Numarul maxim de mesaje in arhiva');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Setati cate mesaje poate fiecare utilizator sa salveze in arhiva (nu exista limita pentru administratori).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Permiteti copii ale mesajelor trimise');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Permite utilizatorilor sa primeasca copii ale mesajelor pe care le trimit. Aceste copii vor aparea in inbox.');
DEFINE ('_UDDEADM_MESSAGES', 'Mesaje');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Sugerati stergerea originalului');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Cand este activata, aceasta setare va aseja o casuta de bifare langa butonul  \'Trimiteti\' raspuns, numit \'stergeti original\' care este bifata implicit. In acest caz, un mesaj va fi imediat mutat din inbox in cosul de gunoi cand un raspuns a fost trimis. Aceasta functie va mentine numarul mesajelor in baza de date cat mai mic. Utilizatorii pot oricand debifa optiune pentru a pastra un mesaj in inbox.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Mesaje pe pagina');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Definiti aici numarul de mesaje afisate pe pagina in inbox, outbox, cos de gunoi si arhiva.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Set de caractere folosit');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Daca aveti probleme cu seturi de caractere non-latine afisate, puteti introduce setul de caractere pe care il foloseste uddeIM pentru a convertii date din baza de date in HTML aici. <b>Daca nu stiti ce inseamna asta, nu schimbati valoarea implicita!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Set de caractere folosit pentru mail');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Daca aveti probleme cu seturi de caractere non-latine afisate, puteti introduce setul de caractere pe care il foloseste uddeIM pentru a trimite e-mail-uri. <b>Daca nu stiti ce inseamna asta, nu schimbati valoarea implicita!</b>');
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Acesta este continutul e-mail-ului pe care utilizatorii il vor primii cand optiunea de mai sus este activata. Continutul mesajului nu va fi inclus in e-mail. Pastrati variabilele %you%, %user% si %site% intacte. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Acesta este continutul e-mail-ului pe care utilizatorii il vor primii cand optiunea de mai sus este activata. Continutul mesajului va fi inclus in acest e-mail. Pastrati variabilele %you%, %user%, %pmessage% si %site% intacte. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Acesta este continutul e-mail-ului numauita pe care il vor primi utilizatorii avand optiunea de mai sus activata. Pastrati variabilele %you% si %site% intacte. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Permiteti utilizatorilor sa descarce mesaje din arhiva lor trimitand un e-mail catre casuta lor postala.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Permiteti descarcare');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Acesta este formatul e-mail-ului pe care il vor primii utilizatorii cand isi descarca mesajele din arhiva. Pastrati variabilele %user%, %msgdate% si %msgbody% intacte. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Setati limita inbox');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Puteti include un numar de mesaje din inbox in numarul maxim de mesaje arhivate. In acest caz, numarul de mesaje din inbox si din arhiva adunate nu trebuie sa depaseasca numarul setat mai sus. In mod alternativ, poti seta limita in inbox fara arhiva. In acest caz, utilizatorii nu pot avea mai mult decat numrul setat mai sus de mesaje in inbox. Daca numarul este atins, nu vor mai putea sa raspunda la mesaje sau sa compuna unele noi pana cana nu vor sterge mesajele vechi din inbox, respectiv din arhiva. (Utilizatori vor continua sa poata primi mesaje si sa le citeasca.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Afisati limita de folosire la inbox');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Afiseaza cate mesaje au salvate utilizatorii (si cate mai au voiew sa salveze) intr-o linie sub inbox.');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Ati dezactivat arhiva. Ce doriti sa faceti cu mesajele care sunt salvate in arhiva?');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Pastreaza-le');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Sunt pastrate in arhiva  (utilizatorul nu le va putea accesa si vor fi luate in calcul la afisarea numarului maxim de mesaje).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Mota in inbox');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Mesajele arhivate mutate in inbox');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Mesajele vor fi mutate in inbox-ul respectivului utilizator (sau vor fi sterse daca sunt mai vechi dacat sunt admise in mod normal in inbox).');		

		
// 0.4 frontend, but visible admins only (no translation necessary)		

DEFINE ('_UDDEIM_SEND_ASSYSM', 'trimite ca fiind mesaj sistem (=destinatarul nu poate raspunde)');
DEFINE ('_UDDEIM_SEND_TOALL', 'trimite la toti utilizatorii');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'trimite la toti administratorii');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'trimite la toti utilizatorii online');
DEFINE ('_UDDEIM_VALIDFOR_1', 'valid pentru ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' ore. 0=mereu (stergerile automate se aplica)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Creati mesaj sistem sau general]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Creati un mesaj normal (standard)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Mesaje sistem si generale nu sunt permise.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Tipul mesajului');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Ajutor pentru mesaje sistem');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(se deschide intr-o fereastra noua)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Sunteti pe cale sa trimiti mesajul de mai jos. Va rugam revedeti si confirmati sau anulati!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Mesaj catre <strong>toti utilizatorii</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Mesaj catre <strong>toti administratorii</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Mesaj catre <strong>toti utilizatorii conectati</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Destinatarii nu vor putea raspunde la acest mesaj.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Mesajul va fi trimis cu <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> drept nume utilizator');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Mesajul va expira ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Mesajul nu va expira');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Bifati link-ul(facand click pe el) inainte de a inainta!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Folosire <strong>doar in mesaje sistem</strong>:<br /> [b]<strong>bold</strong>[/b] [i]<em>italic</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] sau [url]http://www.someurl.com[/url] sunt link-uri');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Eroare: Nu a fost gasit destinatarul. Mesajul nu a fost trimis.');		
		
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
DEFINE ('_UDDEIM_COMPOSE', 'Mesaj nou'); // as in "write new message", but only one word
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
