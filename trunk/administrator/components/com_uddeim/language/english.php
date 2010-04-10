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
// Language file: English (source file is Latin-1)
//
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
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'When enabled public users can send messages to your registered users (those can specify in their personal settings if they want to use this feature).');
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
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Usually <b>default</b> (ISO-8859-1) is the correct setting for Joomla 1.0 and <b>UTF-8</b> for Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'default');
DEFINE ('_UDDEIM_READ_INFO_1', 'Read messages will stay in the inbox for ');
DEFINE ('_UDDEIM_READ_INFO_2', ' days max. before being erased automatically.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Unread messages will stay in the inbox for ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' days max. before being erased automatically.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Sent messages will stay in the outbox for ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' days max. before being erased automatically.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Show inbox note for read messages');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Show inbox note <i>"Read messages will be deleted after n days"</i>');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Show inbox note for unread messages');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Show inbox note <i>"Unread messages will be deleted after n days"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Show outbox note for sent messages');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Show outbox note <i>"Sent messages will be deleted after n days"</i>');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Show trashcan note for trashed messages');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Show trashcan note <i>"Trashed messages will be purged after n days"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Sent messages kept for (days)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Enter the number of days until <b>sent</b> messages will automatically be erased from the outbox.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'send to all special users');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Message to <b>all special users</b>');
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
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'After installation, all uddeIM e-mail traffic (e-mail notifications, fotgetmenot e-mails) is disabled so that no e-mails are sent as long as you are testing. Do not forget to disable "stop e-mail" in the backend when you are finished.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. recipients');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Max. number of recipients which are allowed per message (0=no limitation)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'too many recipients');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Sending of e-mails disabled.');
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
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'When set to <b>yes</b>, action links will be displayed with an icon.');
DEFINE ('_UDDEIM_UNCHECKALL', 'uncheck all');
DEFINE ('_UDDEIM_CHECKALL', 'check all');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Show bottom icons');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'When set to <b>yes</b>, bottom links will be displayed with an icon.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Use animated smileys');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Use animated smileys instead of the static ones.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'More animated smileys');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Show more animated smileys.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Encrypted message - Password required');
DEFINE ('_UDDEIM_PASSWORD', '<b>Password required</b>');
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
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Default for e-mail notification');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Default value for e-mail notification (for users who have not changed their preferences yet).');
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

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Messages will stay in the trash can for 24 hrs before being erased. You can see the first words of the message only. To read the whole message you have to restore it first.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Messages will stay in the trashcan for ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' hours before being erased. You can see the first words of the message only. To read the whole message, you have to restore it first.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'This message has been recalled. You can now edit and resend it.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Message could not be recalled (probably because it has been read or erased.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Message restore failed. (It might have been in the trash can for too long and erased in the meantime.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Message restore failed.');
DEFINE ('_UDDEIM_DONTSEND', 'Don\'t send');
DEFINE ('_UDDEIM_SENDAGAIN', 'Resend');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'You are not logged in.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<b>You have no messages in your inbox.</b>');

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<b>You have no messages in your outbox.</b>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<b>You have no messages in your trashcan.</b>');
DEFINE ('_UDDEIM_INBOX', 'Inbox');
DEFINE ('_UDDEIM_OUTBOX', 'Outbox');
DEFINE ('_UDDEIM_TRASHCAN', 'Trashcan');
DEFINE ('_UDDEIM_CREATE', 'New message');
DEFINE ('_UDDEIM_UDDEIM', 'Private messages');
DEFINE ('_UDDEIM_READSTATUS', 'Read');
DEFINE ('_UDDEIM_FROM', 'From');
DEFINE ('_UDDEIM_FROM_SMALL', 'from');
DEFINE ('_UDDEIM_TO', 'To');
DEFINE ('_UDDEIM_TO_SMALL', 'to');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'The outbox contains all messages you have sent. You can recall a message when it has not been read yet. If you do so, it can no longer be read by the recipient. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'recall');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Recall message');
DEFINE ('_UDDEIM_RESTORE', 'restore');
DEFINE ('_UDDEIM_MESSAGE', 'Message');
DEFINE ('_UDDEIM_DATE', 'Date');
DEFINE ('_UDDEIM_DELETED', 'Deleted');
DEFINE ('_UDDEIM_DELETE', 'delete');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'delete');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'This message cannot be displayed. <br />Possible reasons:<ul><li>You have no rights to read this message.</li><li>The message has been deleted.</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>You have moved this message to the trashcan.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Message from ');
DEFINE ('_UDDEIM_MESSAGETO', 'Message from yourself to ');
DEFINE ('_UDDEIM_REPLY', 'Reply');
DEFINE ('_UDDEIM_SUBMIT', 'Send');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Move original message to trashcan after reply');
DEFINE ('_UDDEIM_NOID', 'Error: Recipient not found. No message sent.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Error: Message contains no text! No message sent.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Reply sent');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Message sent');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' and original message moved to trash');
DEFINE ('_UDDEIM_NOSUCHUSER', 'There is no user with this username!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'It is not possible to send messages to yourself!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Access violation!</b> You have no rights to perform this action!');
DEFINE ('_UDDEIM_PRUNELINK', 'Admins only: Prune');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Administration');
DEFINE ('_UDDEADM_GENERAL', 'General');
DEFINE ('_UDDEADM_ABOUT', 'About');
DEFINE ('_UDDEADM_DATESETTINGS', 'Date/time');
DEFINE ('_UDDEADM_PICSETTINGS', 'Icons');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Read messages kept for (days)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Unread messages kept for (days)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Messages kept in trash for (days)');
DEFINE ('_UDDEADM_DAYS', 'day(s)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Enter the number of days until <b>read</b> messages will be erased automatically from the inbox. If you do not want to erase messages automatically, enter a very high value (e.g. 36524 days are equivalent to one century). But keep in mind that the database can fill up quickly if you keep all messages.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Enter the number of days until messages will be erased that have <b>not been read</b> by their intended recipient yet.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Enter the number of days until messages are erased from the trashcan. Decimal values are possible, e.g. to erase messages from the trashcan after 3 hours enter 0.125 as value.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Date display format');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Choose the format used when a date/time is being displayed. Months will be abbreviated according to your local language settings of Joomla (if a matching uddeIM language file is present).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Longer date display');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'When displaying messages there is more space for the date/time string. Choose the date format to display when opening a message. For weekday names and months the local language settings of Joomla will be used (if a matching uddeIM language file is present).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Deletions invoked');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'by admins only');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'by any user');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manually');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatic deletions create heavy server load. If you choose <b>by admins only</b> automatic deletions are invoked when an admin checks his inbox. Choose this option if an admin is checking the inbox regulary. Small or rarely administered sites may choose <b>by any user</b>.');

	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Save settings');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'The following settings have been saved to config file:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Settings have been saved.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icon: User is online');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Enter the location of the icon to be displayed next to the username when this user is online.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icon: User is offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Enter the location of the icon to be displayed next to the username when this user is offline.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Icon: Read message');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Enter the location of the icon to be displayed for read messages.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icon: Unread message');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Enter the location of the icon to be displayed for unread messages.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Module: New Messages Icon');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'This setting refers to the mod_uddeim module. Enter the location of the icon that this module shall display when there are new messages.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM Installation');
DEFINE ('_UDDEADM_FINISHED', 'Installation is finished. Welcome to uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">You do not have Mambo Community Builder installed. You will not be able to use uddeIM.</span><br /><br />You might want to download <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continue');
DEFINE ('_UDDEADM_PMSFOUND_1', 'There are ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' messages in the old PMS installation. Do you want to import these messages into uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'This will not alter the old PMS messages or your installation. They will be kept intact and you can safely import them into uddeIM, even if you consider to continue using the old PMS. You should save any changes you made to the settings first before running the import! All messages that are already in your uddeIM database will remain intact.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Import old PMS messages into uddeIM now');
DEFINE ('_UDDEADM_IMPORT_NO', 'No, do not import any messages');  
DEFINE ('_UDDEADM_IMPORTING', 'Please wait while messages are being imported.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Done importing messages from old PMS. Do not run this installation script again because doing so will import the messages again and they will show up twice.'); 
DEFINE ('_UDDEADM_IMPORT', 'Import');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Import messages from old PMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'No other PMS installation found. Import not possible.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">You have already imported the messages from the old PMS into uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Blocked');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Not sent (user has blocked you)');
DEFINE ('_UDDEIM_BLOCKNOW', 'block&nbsp;user');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'This is a list of users you have blocked. These users can not send private messages to you.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'You have currently not blocked any users.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'You have currently blocked ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' user(s).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[unblock]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'When a blocked user tries to send you a message, he will be informed that he is blocked and that the message will not be sent.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'A blocked user can not see that you have blocked him.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'You cannot block administrators.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Enable blocking system');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'When enabled, users can block other users. A blocked user can not send messages to the user who has blocked him. Admins can\'t be blocked.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'yes');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'no');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Blocked user information');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'If set to <b>yes</b>, a blocked user will be informed that the message has not been sent because the recipient has blocked him. If set to <b>no</b>, the blocked user does not get any notification that the message has not been sent.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'yes');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'no');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blocking system not enabled');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Deletion'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blocking');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integration');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Show CB links');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'When set to <b>yes</b>, all usernames showing up in uddeIM will be displayed as links to their Community Builder profile.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Show CB thumbnail');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'When set to <b>yes</b>, the thumbnail of the user stored in Community Builder will be displayed when reading a message.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Show online status');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'When set to <b>yes</b>, uddeIM displays every username with a small icon that informs if this user is online or offline.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Allow e-mail notification');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'When set to <b>yes</b>, users can choose if they want to get an e-mail every time a new message arrives in the inbox.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail contains message');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'When set to <b>no</b>, this e-mail will only contain information about when and by whom the message was sent, but not the message itself.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Forgetmenot e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'This feature sends an e-mail to users who have unread messages in their inbox for a very long time (set below). This setting is independent from the \'allow e-mail notification\'. If you do not want to send out any e-mail messages you have to turn off both.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Forgetmenot sent after day(s)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'If the forgetmenot feature (above) is set to <b>yes</b>, set here after how many days e-mail notifications about unread messages shall be dispatched.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'First characters list');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'You can set here how many characters of a message will be displayed in the inbox, outbox and trashcan.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Message maximum length');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Set the maximum length of a message (a message will be truncated automatically when its length exceeds this value). Set to \'0\' to allow for messages of any length (not recommended).');
DEFINE ('_UDDEADM_YES', 'yes');
DEFINE ('_UDDEADM_NO', 'no');
DEFINE ('_UDDEADM_ADMINSONLY', 'admins only');
DEFINE ('_UDDEADM_SYSTEM', 'System');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'System messages username');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM supports system messages. They do not have a sender and users can\'t reply to them. Enter here the default username alias for system messages (for example <b>Support</b> or <b>Help desk</b> or <b>Community Master</b>).');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Allow admins to send general messages');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM supports general messages. They are sent to every user on your system. Use them sparingly.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-mail sender name');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Enter the name from which e-mail notifications come from (for example <b>Your Site</b> or <b>Messaging Service</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-mail sender address');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Enter the e-mail address from which e-mail notifications are sent from (this should be the main contact e-mail address of your site.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM version');
DEFINE ('_UDDEADM_ARCHIVE', 'Archive'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Enable archive');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Choose if users shall be allowed to store messages in an archive. Messages in the archive will not be deleted automatically.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Max messages in archive');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Set how many messages every user may store in the archive (no limit for admins).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Allow self copies');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Allows users to receive copies of messages they are sending. These copies will appear in the inbox.');
DEFINE ('_UDDEADM_MESSAGES', 'Messages');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Suggest to trash original');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'When activated this will put a checkbox next to the \'Send\' reply button called \'trash original\' that is checked by default. In this case a message will immediately be moved from the inbox to trashcan when a reply has been sent. This function reduces the number of messages kept in the database. Users can uncheck the box if they want to keep a message in the inbox.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Messages per page');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Define here the number of messages displayed per page in inbox, outbox, trashcan and archive.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Used charset');
DEFINE ('_UDDEADM_CHARSET_EXP', 'If you\'re experiencing problems with non-latin character sets displayed, you can enter the charset uddeIM uses to convert database output to HTML code here. The default value is correct for most European languages.');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Used mail charset');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'If you\'re experiencing problems with non-latin character sets displayed, you can enter the charset uddeIM uses to send outgoing e-mails with. The default value is correct for most European languages.');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'This is the content of the e-mail users will receive when the option is set above. The content of the message will not be in the e-mail. Keep the variables %you%, %user% and %site% intact. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'This is the content of the e-mail users will receive when the option is set above. This e-mail will include the content of the message. Keep the variables %you%, %user%, %pmessage% and %site% intact. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'This is the content of the forgetmenot e-mail users will receive when the option is set above. Keep the variables %you% and %site% intact. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Allow users to download messages from their archive by sending them as e-mail to themselves.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Allow download');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'This is the format of the e-mail users will receive when they download their own messages from the archive. Keep the variables %user%, %msgdate% and %msgbody% intact. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Set inbox limit');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'You can include the number of messages in the inbox into the maximum number of archived messages. In this case, the number of messages in inbox and archive in total must not exceed the number set above. Alternatively, you can set the inbox limit without an archive. In this case, users may have no more than the number of messages set above in their inboxes. If the number is reached, they will no longer be able to reply to messages or to compose new ones until they delete old messages from the inbox or archive respectively (users will still be able to receive and read messages).');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Show limit usage at inbox');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Display how many messages users have stored (and how many they are allowed to store) in a line below the inbox.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'You have turned off the archive. How do you want to handle messages that are saved in the archive?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Leave them');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Leave them in the archive (user will not be able to access the messages and they will still count against message limits).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Move to inbox');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Archived messages moved to inboxes');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Messages will be moved to the inbox of the respective user (or to trash if they are older than allowed in the inbox).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'valid for ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' hours. 0=forever (automatic deletions apply)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Create system or general message]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Create a normal (standard) message]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'System and general messages not allowed.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Type of message');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Help on system messages');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(opens in new window)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'You are about to send the message displayed below. Please review and confirm or cancel!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Message to <b>all users</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Message to <b>all admins</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Message to <b>all currently logged in users</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Recipients will not be able to reply to this message.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Message will be sent with <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> as username');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Message will expire ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Message will not expire');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Check the link (by clicking on it) before proceeding!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Usage <b>in system messages only</b>:<br /> [b]<b>bold</b>[/b] [i]<em>italic</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] or [url]http://www.someurl.com[/url] are links');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Error: No recipients found. Message not sent.');		

DEFINE ('_UDDEIM_CANTREPLY', 'You can not reply to this message.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail notification is off. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail notification is on. ');
DEFINE ('_UDDEIM_SETEMNON', '[turn it on]');
DEFINE ('_UDDEIM_SETEMNOFF', '[turn it off]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Hi %you%,\n\n%user% has sent you a private message at %site%. Please log in to read it!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Hi %you%,\n\n%user% has sent you the following private message at %site%. Please log in to reply!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Hi %you%,\n\nyou have unread private messages on %site%. Please log in to read them!");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'You have messages on %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'send as system message (=recipients cannot reply)');
DEFINE ('_UDDEIM_SEND_TOALL', 'send to all users');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'send to all admins');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'send to all online users');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Unexpected error: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Archive not enabled.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Storing message in archive failed.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'You have stored ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>You haven\'t stored any messages in the archive yet.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>You have no messages in your archive.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' messages');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'You have stored one message');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'To save new messages you have to delete some messages first.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'You can save a maximum of ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' messages.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'You have ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' messages in your');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' message in your'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'archive');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'inbox');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'inbox and archive');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'The allowed maximum is ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'You can still receive and read messages but you will not be able to reply or to compose new ones until you delete messages.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Messages stored: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(of max. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Message stored in archive.');
DEFINE ('_UDDEIM_STORE', 'archive');				// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'back');
DEFINE ('_UDDEIM_TRASHCHECKED', 'delete checked');	// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'show all');				// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Archive');				// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Archive full. Not saved.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'No messages selected.');
DEFINE ('_UDDEIM_THISISACOPY', 'Copy of a message you sent to ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'copy to me');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'copy to archive');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'trash original');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Message Download');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail with exported messages sent');
DEFINE ('_UDDEIM_EXPORT_NOW', 'e-mail checked to me');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'This mail includes your private messages.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Could not send e-mail containing messages.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Message limit reached! Not restored.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Write a message to ');

$udde_smon[1]="Jan";
$udde_smon[2]="Feb";
$udde_smon[3]="Mar";
$udde_smon[4]="Apr";
$udde_smon[5]="May";
$udde_smon[6]="Jun";
$udde_smon[7]="Jul";
$udde_smon[8]="Aug";
$udde_smon[9]="Sep";
$udde_smon[10]="Oct";
$udde_smon[11]="Nov";
$udde_smon[12]="Dec";

$udde_lmon[1]="January";
$udde_lmon[2]="February";
$udde_lmon[3]="March";
$udde_lmon[4]="April";
$udde_lmon[5]="May";
$udde_lmon[6]="June";
$udde_lmon[7]="July";
$udde_lmon[8]="August";
$udde_lmon[9]="September";
$udde_lmon[10]="October";
$udde_lmon[11]="November";
$udde_lmon[12]="December";

$udde_lweekday[0]="Sunday";
$udde_lweekday[1]="Monday";
$udde_lweekday[2]="Tuesday";
$udde_lweekday[3]="Wednesday";
$udde_lweekday[4]="Thursday";
$udde_lweekday[5]="Friday";
$udde_lweekday[6]="Saturday";

$udde_sweekday[0]="Sun";
$udde_sweekday[1]="Mon";
$udde_sweekday[2]="Tue";
$udde_sweekday[3]="Wed";
$udde_sweekday[4]="Thu";
$udde_sweekday[5]="Fri";
$udde_sweekday[6]="Sat";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Template');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Choose the template you want uddeIM to use');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Show CB Connections');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Use <b>yes</b> if you have Community Builder installed and want to display the user\'s connections on the compose new message page.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Show settings');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'The settings link appears automatically in uddeIM if you have e-mail notification or the blocking system activated. You can specify its position and you can turn it off completely.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'yes, at bottom');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Allow BB code tags');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'font formats only');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Use <b>font formats only</b> to allow users to use the BB code tags for bold, italic, underline, font color and font size. When you set this option to <b>yes</b>, users are allowed to use <b>all</b> supported BB code tags (e.g. links and images).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Allow Emoticons');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'When set to <b>yes</b>, emoticon codes like :-) are replaced with emoticon graphics in message display.');
DEFINE ('_UDDEADM_DISPLAY', 'Display');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Show Menu Icons');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'When set to <b>yes</b>, menu links will be displayed using an icon.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Component Title');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Enter the headline of the private messaging component, for example \'Private Messages\'. Leave empty if you do not want to display a headline.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Show About link');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Set to <b>yes</b> to show a link to the uddeIM software credits and license. This link will be placed at the bottom of the uddeIM output.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Stop e-mail');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Check this box to prevent uddeIM from sending out e-mails (e-mail notifications and forgetmenot e-mails) irrespective of the users\' settings, for example when testing the site.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails in lists');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Set to <b>yes</b> if you want to display Community Builder thumbnails in the message lists overview (inbox, outbox, etc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Show users');
DEFINE ('_UDDEIM_CONNECTIONS', 'Connections');
DEFINE ('_UDDEIM_SETTINGS', 'Settings');
DEFINE ('_UDDEIM_NOSETTINGS', 'There are no settings to adjust.');
DEFINE ('_UDDEIM_ABOUT', 'About'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Compose'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-mail notification');
DEFINE ('_UDDEIM_EMN_EXP', 'Receive e-mail notifications of new private messages.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-mail notification of new messages');
DEFINE ('_UDDEIM_EMN_NONE', 'No e-mail notification');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'E-mail notification when offline');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Don\'t send notification of replies');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'User blocking'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'You can prevent users from sending you messages by blocking them. Choose <b>block user</b> when you view a messages from the respective user.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Save changes');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB code tags to produce bold text. Usage: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB code tags to produce italic text. Usage: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB code tags to produce underlined text. Usage: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB code tags to produce coloured letters. Usage [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example FF0000 for red.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB code tags to produce coloured letters. Usage [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example 00FF00 for green.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB code tags to produce coloured letters. Usage [color=#XXXXXX]colored[/color] where XXXXXX is the hex code of the colour you want, for example 0000FF for blue.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB code tags to produce very small letters. Usage: [size=1]very small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB code tags to produce small letters. Usage: [size=2] small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB code tags to produce big letters. Usage: [size=4]big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB code tags to produce very big letters. Usage: [size=5]very big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB code tags to insert a link to an image. Usage: [img]Image-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB code tags to insert a hyperlink. Usage: [url]web address[/url]. Do not forget the http:// at the beginning of the web address.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Close all open BB code tags.');
