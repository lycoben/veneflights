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
// Language file: Danish (source file is Latin-1)
// Translator:     Michael Jerndorff & Henrik Gregersen <noemail>
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

DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Beskeder bliver i papirkurven i ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' timer f&oslash;r de slettes. Du kan kun se de f&oslash;rste ord af beskeden. For at l&aelig;se hele beskeden skal den f&oslash;rst genskabes.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Denne besked er blevet tilbagekaldt. Den kan nu redigeres og gensendes.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Beskeden kunne ikke tilbagekaldes (beskeden er muligvis allerede l&aelig;st eller slettet af modtager.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Genskabelse af besked fejlede. (Beskeden er muligvis automatisk blevet fjernet fra papirkurven.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Genskabelse af besked fejlede.');
DEFINE ('_UDDEIM_DONTSEND', 'Send ikke');
DEFINE ('_UDDEIM_SENDAGAIN', 'Gensend');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Du er ikke logget ind.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Der er ingen beskeder i din indbakke.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Der er ingen beskeder i din udbakke.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Der er ingen beskeder i din papirkurv.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Indbakke');
DEFINE ('_UDDEIM_OUTBOX', 'Udbakke');
DEFINE ('_UDDEIM_TRASHCAN', 'Papirkurv');
DEFINE ('_UDDEIM_CREATE', 'Ny besked');
DEFINE ('_UDDEIM_UDDEIM', 'Private beskeder');
	// this is the headline/name of the component as it appears in Mambo

DEFINE ('_UDDEIM_READSTATUS', 'L&aelig;st');
	// as in 'this message has been "read"'

DEFINE ('_UDDEIM_FROM', 'Fra');
DEFINE ('_UDDEIM_FROM_SMALL', 'fra');
DEFINE ('_UDDEIM_TO', 'Til');
DEFINE ('_UDDEIM_TO_SMALL', 'til');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Din udbakke indeholder alle beskeder du har afsendt, som endnu ikke er slettet. Du kan tilbagekalde en besked hvis den ikke er l&aelig;st af modtageren. En tilbagekaldt besked kan ikke l&aelig;ses af modtageren.');
DEFINE ('_UDDEIM_RECALL', 'tilbagekald');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Tilbagekald denne besked');
DEFINE ('_UDDEIM_RESTORE', 'genskab');
DEFINE ('_UDDEIM_MESSAGE', 'Besked');
DEFINE ('_UDDEIM_DATE', 'Dato');
DEFINE ('_UDDEIM_DELETED', 'Slettet');
DEFINE ('_UDDEIM_DELETE', 'slet');
DEFINE ('_UDDEIM_DELETELINK', 'slet');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Denne besked kan ikke vises. <br />Mulige &aring;rsager:<ul><li>Du har ikke rettigheder til at l&aelig;se denne besked</li><li>Beskeden er blevet slettet</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Du har flyttet denne besked til papirkurven.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Besked fra ');
DEFINE ('_UDDEIM_MESSAGETO', 'Besked fra dig til ');
DEFINE ('_UDDEIM_REPLY', 'Svar');
DEFINE ('_UDDEIM_SUBMIT', 'Send');
DEFINE ('_UDDEIM_NOMESSAGE', 'Fejl: Beskeden er tom! Ingen besked er afsendt.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Svar sendt');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Besked sendt');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' og oprindelig besked er flyttet til papirkurven');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Der findes ikke en bruger med dette brugernavn!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Det er ikke muligt at sende beskeder til sig selv!');
DEFINE ('_UDDEIM_PRUNELINK', 'Kun administrator: Fjern');
DEFINE ('_UDDEIM_BLOCKS', 'Blokeret');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Ikke sendt (modtager har blokeret dig)');
DEFINE ('_UDDEIM_BLOCKNOW', 'bloker&nbsp;bruger');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Dette er en liste over brugere som du har blokeret. Disse brugere kan ikke sende private beskeder til dig.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Du har ikke blokeret nogle brugere.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Du har blokeret for ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' bruger(e).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[frigiv]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Hvis en blokeret bruger pr&oslash;ver at sende en besked til dig, vil afsender blive informeret om at man er blokeret og at beskeden ikke kan afsendes.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'En bruger kan ikke se hvis man er blokeret.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Du kan ikke blokere administratorer.');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blokeringssystem er ikke aktiveret');
DEFINE ('_UDDEIM_CANTREPLY', 'Du kan ikke svare p&aring; denne besked.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail-notifikation er deaktiveret. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail-notifikation er aktiveret. ');
DEFINE ('_UDDEIM_SETEMNON', '[aktiver]');
DEFINE ('_UDDEIM_SETEMNOFF', '[de-aktiver]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Hej %you%,

%user% har sendt en privat besked p&aring; %site%.
Log ind p&aring; siden for at l&aelig;se beskeden!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Hej %you%,

%user% har sendt denne private besked p&aring; %site%.
Log ind for at svare!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Hej %you%,

du har ul&aelig;ste beskeder p&aring; %site%.
Log ind for at l&aelig;se dem!
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
===============================================================================%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Der er beskeder til dig p&aring; %site%');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Arkivering fejlede.');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Du har ikke arkiveret nogle beskeder endnu.</strong>');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Du har arkiveret ');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' beskeder');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Du har arkiveret en besked');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'For at arkiverer beskeder, m&aring; du f&oslash;rst slette nogle andre.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Du kan h&oslash;jst arkivere ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' beskeder.');

DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Du har ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' beskeder i');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arkivet');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'indbakke');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'indbakke og arkiv');
	// The lines above are to make up a sentence like
	// "You have | 126 | messages in your | inbox and archive"

DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Det tilladte maksimum er ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Du kan stadig modtage o l&aelig;se beskeder, men det er ikke muligt at svare p&aring; beskeder eller skrive nye bekseder f&oslash;r du sletter nogle beskeder.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Arkiverede beskeder: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(af maks. ');
	// don't add closing bracket

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Besked arkiveret');
DEFINE ('_UDDEIM_STORE', 'arkiver');
	// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'tilbage');

DEFINE ('_UDDEIM_TRASHCHECKED', 'slet markerede');
	// translators info: plural! (as in "delete checked" messages)

DEFINE ('_UDDEIM_SHOWALL', 'vis alle');
	// translators example "SHOW ALL messages"

DEFINE ('_UDDEIM_ARCHIVE', 'Arkiv');
	// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arkiv er fyldt. Besked ikke arkiveret.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Ingen beskeder er valgt.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopi af besked afsendt til ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'kopi til dig selv');
	// as in 'send a "copy to me"' or cc: me

DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopi til arkiv');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'slet original');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Hente beskeder');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail med besked er sendt');
DEFINE ('_UDDEIM_EXPORT_NOW', 'send markeret til dig via e-mail');
	// as in "send the messages checked above by E-Mail to me"

DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Denne e-mail inkluderer dine private beskeder.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Kunne ikke sende en e-mail med beskeder.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Besked gr&aelig;nse! Ikke genskabt.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Skriv besked til ');
	// as in "write a message to" (a person)

// months and weeknames (please translate according
// to your language)

$udde_smon[1]="jan.";
$udde_smon[2]="feb.";
$udde_smon[3]="mar.";
$udde_smon[4]="apr.";
$udde_smon[5]="maj";
$udde_smon[6]="jun.";
$udde_smon[7]="jul.";
$udde_smon[8]="aug.";
$udde_smon[9]="sept.";
$udde_smon[10]="okt.";
$udde_smon[11]="nov.";
$udde_smon[12]="dec.";

$udde_lmon[1]="januar";
$udde_lmon[2]="februar";
$udde_lmon[3]="marts";
$udde_lmon[4]="april";
$udde_lmon[5]="maj";
$udde_lmon[6]="juni";
$udde_lmon[7]="juli";
$udde_lmon[8]="august";
$udde_lmon[9]="september";
$udde_lmon[10]="oktober";
$udde_lmon[11]="november";
$udde_lmon[12]="december";

$udde_lweekday[0]="S&oslash;ndag";
$udde_lweekday[1]="Mandag";
$udde_lweekday[2]="Tirsdag";
$udde_lweekday[3]="Onsdag";
$udde_lweekday[4]="Torsdag";
$udde_lweekday[5]="Fredag";
$udde_lweekday[6]="L&oslash;rdag";

$udde_sweekday[0]="S&oslash;n.";
$udde_sweekday[1]="Man.";
$udde_sweekday[2]="Tir.";
$udde_sweekday[3]="Ons.";
$udde_sweekday[4]="Tor.";
$udde_sweekday[5]="Fre.";
$udde_sweekday[6]="L&oslash;r.";

// *********************************************************
// the following can remain English
// *********************************************************

DEFINE ('_UDDEIM_NOID', 'Fejl: Ingen modtager-id fundet. Ingen besked sendt.');
DEFINE ('_UDDEIM_VIOLATION', '<b>Ingen rettigheder!</b> Du har ikke rettigheder til at udf&oslash;re denne handling!');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Uventet fejl: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arkiv er ikke aktiveret.');


// *********************************************************
// No translation necessary below this line
// *********************************************************

DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM-administration');
DEFINE ('_UDDEADM_GENERAL', 'Generelt');
DEFINE ('_UDDEADM_ABOUT', 'Om');
DEFINE ('_UDDEADM_DATESETTINGS', 'Dato/tid');
DEFINE ('_UDDEADM_PICSETTINGS', 'Ikoner');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'L&aelig;ste beskeder gemmes i (dage)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Ul&aelig;ste beskeder gemmes i (dage)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Beskeder i papirkurven gemmes i (dage)');
DEFINE ('_UDDEADM_DAYS', 'dag(e)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Angiv antal dage f&oslash;r <b>l&aelig;ste</b> beskeder automatisk slettes fra indbakken. Hvis beskeder ikke skal slettes automatisk, indtastes et h&oslash;jt tal (f.eks, 36524 dage svarende til et &aring;rhundrede). Men overvej dette da mange beskeder fylder meget i databasen.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Angiv antal dage for automatisk sletning af beskeder som modtagere endnu <b>ikke har l&aelig;st</b>.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Angiv antal dage f&oslash;r beskeder slettes fra papirkurven. V&aelig;rdier mindre end 1 kan angives. F.eks: for at slette beskeder fra papirkurven efter tre timer, angives 0.125.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Datovisningsformat');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'V&aelig;lg formatet som beskedens dato og tid  
skal vises med. M&aring;neder forkortes i henhold til dine  
sprogindstillinger i Mambo/CMS (s&aring;fremt en matchende uddelM-sprogfil er til stede)');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Lang datovisning');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'N&aring;r beskeder vises afs&aelig;ttes der mere plads til datoer. V&aelig;lg dato formatet der skal anvendes n&aring;r en besked &aring;bnes. For ugedag og m&aring;neder, anvendes standardvisning i henhold til ops&aelig;tning af CMS-systemet og tilh&oslash;rende landespecifik sprogfil til uddeIM.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Sletning afvikles kun af admin');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'Ja, kun af administratorer');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'Nej, af alm. bruger');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatiske slettelser belaster servere og databaser. S&aring;fremt du vælger <i>Ja,&nbsp;men&nbsp;kun&nbsp;af&nbsp;administratorer</i> 
udf&oslash;res den automatiske slettelse af alle brugeres beskeder i henhold til indstillingerne herover n&aring;r en administrator tjekker sin indbakke. V&aelig;lg denne indstilling s&aring;fremt en administrator tjekker sin indbakke en eller flere gange dagligt - hvilket som regel er tilf&aelig;ldet. (Hvis dit site har mere end en administrator, vil det ingen indflydelse have mht. hvem, der logger ind idet slettelserne sker automatisk uanset hvilken af administratorerne, der logger ind.) V&aelig;lg <i>Nej, af enhver bruger</i> p&aring; sm&aring; eller minimalt administrerede websites hvor administratorerne kun sj&aelig;ldent tjekker deres indbakker. V&aelig;lg sidstn&aelig;vnte, hvis du ikke forst&aring;r dette punkt eller er i tvivl om hvad du skal v&aelig;lge.');
DEFINE ('_UDDEADM_SAVESETTINGS', 'Gem ops&aelig;tning');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'F&oslash;lgende ops&aelig;tning er gemt i konfigurationsfilen:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Ops&aelig;tning er gemt.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ikon: Bruger er online');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Angiv placering af ikon, der skal vises ved siden af brugernavnet n&aring;r brugeren er online.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ikon: Bruger er offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Angiv placering af ikon, der skal vises ved siden af brugernavnet n&aring;r brugeren er offline.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Ikon: L&aelig;s besked');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Angiv placering af ikon, der skal vises for funktionen til l&aelig;sning af beskeder.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ikon: Ul&aelig;st besked');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Angiv placering af ikon, der skal vises for ul&aelig;ste beskeder.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: Ny Besked-ikon');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Dette refererer til modulet mod_uddeim_new module. Angiv placering af ikon som dette modul skal vise n&aring;r der er nye beskeder.');
DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM-installation');
DEFINE ('_UDDEADM_FINISHED', 'Installation er afsluttet. Velkommen til. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Mambo Community Builder er ikke installeret. Dette er kr&aelig;vet for at kunne bruge uddeIM.</span><br /><br />Comunity builder kan downloades fra <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'forts&aelig;t');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Der er ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' beskeder i din PMS-installation. Skal disse importeres til uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Dette &aelig;ndrer ikke p&aring; PMS-beskederne eller p&aring; din installation. Beskederne forbliver i PMS. Du kan importere beskederne til uddeIM, selv om du fortsat vil anvende PMS. (Gem indstillingerne f&oslash;r du importerer beskederne!) Eksisterende beskeder i uddeIM forbliver intakte.');
DEFINE ('_UDDEADM_IMPORT_YES', 'Importer PMS-beskeder til uddeIM nu');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nej, importer intet');
DEFINE ('_UDDEADM_IMPORTING', 'Vent venligst imens beskederne importeres.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Import af beskeder fra PMS afsluttet. Afvikling af installationsscriptet igen, vil dublere beskederne.');
DEFINE ('_UDDEADM_IMPORT', 'Importer');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importer beskeder fra PMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Ingen installation af PMS fundet. Import er ikke mulig.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Du har allerede importeret beskeder fra PMS i uddeIM.</span>');
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Aktiver blokeringssystem');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Brugere kan blokere beskeder fra andre brugere n&aring;r systemet er aktiveret. Administratorer kan ikke blokeres.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'Ja');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'Nej');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Informer afsender om blokering');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Hvis dette er sat til <i>Ja</i> vil en blokeret bruger f&aring; at vide at man er blokeret ved fors&oslash;g p&aring; afsendelse og beskeden bliver ikke sendt. Hvis dette er sat til <i>Nej</i>, bliver beskeden ikke sendt og brugeren informeres ikke om blokeringen.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'Ja');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'Nej');
DEFINE ('_UDDEADM_DELETIONS', 'Sletninger');
DEFINE ('_UDDEADM_BLOCK', 'Blokering');
DEFINE ('_UDDEADM_INTEGRATION', 'Integration');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Vis CB-links');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Hvis sat til <i>Ja</i>, vil alle brugernavne, der anvendes i uddeIM blive vist som link til deres Community Builder-profil.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Vis CB-profilbillede');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Hvis sat til <i>Ja</i>, vises profilbilledet fra afsenderens Comumunity Builder-profil i beskeden, s&aring;fremt et s&aring;dant eksisterer.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Vis online-status');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Hvis sat til <i>Ja</i>, vises hvert brugernavn med et lille ikon, der viser om brugeren er online. Valg af ikon kan ops&aelig;ttes under fanebladet Ikoner.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Tillad e-mail v. ny besked');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Hvis sat til <i>Ja</i> kan hver bruger v&aelig;lge om man vil have en e-mail ved ny besked i indbakken.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail indeholder beskeden');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Hvis sat til <i>Nej</i>, vil en e-mail ikke indeholde selve beskeden, men kun information om hvem der har sendt en besked, og hvorn&aring;r.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Forglemmigej-e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Hvis sat til <i>Ja</i> vil en e-mail blive sendt til en bruger, der har haft en ul&aelig;st besked liggende i indbakken i l&aelig;ngere tid. Denne funktion er uafh&aelig;ngig af den &oslash;vrige e-mailops&aelig;tning.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Send forglemmigej efter dag(e)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Angiv hvor mange dage en besked m&aring; forblive ul&aelig;st, f&oslash;r der skal sendes en forglemmigej-e-mail til modtageren.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Antal tegn i oversigten');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Angiv hvor mange tegn af beskeden, der skal vises i indbakke-, udbakke- og papirkurv-oversigterne.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Maks. beskedl&aelig;ngde');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Angiv hvor mange tegn en besked m&aring; v&aelig;re. Beskeden forkortes til dette antal hvis den er l&aelig;ngere. &Oslash;nskes intet maksimum angives \'0\'.');
DEFINE ('_UDDEADM_YES', 'Ja');
DEFINE ('_UDDEADM_NO', 'Nej');
DEFINE ('_UDDEADM_ADMINSONLY', 'Kun for administrator');
DEFINE ('_UDDEADM_SYSTEM', 'System');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Brugernavn for systembeskeder');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'Der kan afsendes systembeskeder fra uddeIM. Det er beskeder uden synlig afsender og de kan ikke besvares. Angiv her hvilket brugernavn, der skal anvendes til systembeskeder (fx <i>Support</i> eller <i>Webmaster</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Tillad generelle beskeder for administratorer');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'Generelle beskeder sendes til samtlige brugere.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-mail-afsendernavn');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Angiv afsendernavn p&aring; e-mails. Angiv fx hjemmesidens navn');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-mail-afsenderadresse');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Angiv e-mail-adresse hvorfra e-mail sendes.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM-version');
DEFINE ('_UDDEADM_ARCHIVE', 'Arkiv'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Aktiver arkiv');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Angiv om brugere m&aring; gemme beskeder i et arkiv. Beskeder i arkivet bliver ikke slettet.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Maks. beskeder i brugers arkiv');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Angiv hvor mange beskeder en bruger m&aring; have i sit arkiv. (Bem&aelig;rk administratorer har ingen gr&aelig;nse).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Tillad kopier til afsender');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Tillader brugere at sende en kopi af beskeden til sig selv.');
DEFINE ('_UDDEADM_MESSAGES', 'Beskeder');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Slet original som standard');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Hvis aktiveret, vil et afkrydsningsfelt \'Slet original\' v&aelig;re placeret efter \'Send\'-svarknappen. Det vil v&aelig;re markeret som standard. Hvis markeret vil en besked automatisk blive flyttet fra indbakken til papirkurven, s&aring;fremt beskeden besvares. Dette kan spare plads i databasen. Brugerne kan altid overskrive standardv&aelig;rdien.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Beskeder pr. side');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Angiv hvor mange beskeder, der skal vises i indbakken, udbakken, papirkurven og arkivet pr. side.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Anvendt tekstkodning');
DEFINE ('_UDDEADM_CHARSET_EXP', 'S&aring;fremt du oplever problemer  
med ikke-latinske tekstkodninger, kan du indtaste den tekstkodning  
som uddelM skal bruge ved konvertering af databaseindholdet til  
htmlkode her. <b>Undlad at foretage &aelig;ndringer s&aring;fremt du  
ikke ved hvad det betyder!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Benyttet e-mail-tekstkodning');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'S&aring;fremt du oplever  
problemer med ikke-latinske tekstkodninger, kan du indtaste den  
tekstkodning som uddelM skal bruge ved kodning af udg&aring;ende e- 
mails her. <b>Undlad at foretage &aelig;ndringer s&aring;fremt du  
ikke ved hvad det betyder!</b>');
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Dette er indholdet af den e-mail, der sendes til brugeren ved ny besked, s&aring;fremt e-mail er aktiveret. Selve beskedens indhold tages ikke med i e-mailen. Variablerne %you%, %user% og %site% indeholder information omkring afsender, bruger og b&oslash;r beholdes i e-mailen. ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Dette er indholdet af den e-mail, der sendes til brugeren ved ny besked, hvis e-mail er aktiveret. E-mailen vil ogs&aring; kunne indholde selve beskeden. Variablerne %you%, %user% og %site% indeholder information omkring afsender og bruger og variablen %pmessage% selve beskeden.');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Dette er indholdet af forglemmigej-e-mailen, der sendes hvis det er aktiveret og en bruger ikke har reageret p&aring; en besked. Variablerne %you% and %site% indeholder modtager- og afsenderinformation. ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Tillad brugere at hente beskeder fra deres arkiv, ved at sende dem som e-mail til sig selv.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Tillad besked-download');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Dette er formatet af den e-mail en bruger vil modtage ved download af beskeder fra brugers arkiv. Variablerne %user%, %msgdate% og %msgbody% b&oslash;r beholdes i formatet.');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Medtag indbakke i arkivst&oslash;relse');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Du kan inkludere arkivst&oslash;relsen til ogs&aring; at g&aelig;lde indbakken. Overskrides antallet vil brugere stadig kunne modtage, men vil ikke kunne skrive nye beskeder f&oslash;r, der slettes eksisterende beskeder.');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Vis beskedst&oslash;relse');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Viser hvor mange beskeder en bruger har gemt samt hvor mange der er plads til i en linje under indbakken.');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Du har deaktiveret arkivet. Hvad skal der ske med de beskeder, der er gemt i arkivet?');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Behold dem');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Behold dem i arkivet (brugeren vil ikke kunne tilg&aring; beskederne, og de medtages stadig i besked postkassens st&oslash;relse).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Flyt til indbakke');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Arkiverede beskeder er flyttet til indbakkerne');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Beskeder vil blive flyttet til brugernes indbakker (eller til papirkurven hvis de er &aelig;ldre end det tilladte for indbakken).');


// 0.4 frontend, but visible admins only (no translation necessary)

DEFINE ('_UDDEIM_SEND_ASSYSM', 'send som system besked (modtagere kan ikke svare p&aring; beskeden)');
DEFINE ('_UDDEIM_SEND_TOALL', 'send til alle brugere');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'send til alle administratorer');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'send til alle online brugere');
DEFINE ('_UDDEIM_VALIDFOR_1', 'gyldig i ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' timer. 0 = for evigt (automatiske sletninger g&aelig;lder)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Opret system eller generel besked]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Opret en normal (standard) besked]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'System- og generelle beskeder er ikke tilladt.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Beskedtype');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Hj&aelig;lp vedr. systembeskeder');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(vises i et nyt vindue)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Du er ved at sende den viste besked. Er du sikker, ellers afbryd!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Besked til <strong>alle brugere</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Besked til <strong>alle administratorer</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Besked til <strong>alle online-brugere</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Modtager vil ikke kunne besvare denne besked.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Besked bliver sendt med brugernavnet <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> som afsender');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Besked udl&oslash;ber ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Besked udl&oslash;ber ikke');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Kontroller link (ved at klikke p&aring; det) f&oslash;r du forts&aelig;tter!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Brug <strong>kun for systembeskeder</strong>:<br /> [b]<strong>fed</strong>[/b] [i]<em>kursiv</em>[/i]<br />
[url=http://www.etellerandet.dk]Et eller andet[/url] eller [url]http://www.etellerandet.dk[/url] som link.');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Fejl: Ingen modtager fundet. Beskeden er ikke sendt.');


// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM-skabelon');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'V&aelig;lg den skabelon som uddeIM skal benytte');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Vis CB-forbindelser');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'V&aelig;lg <i>Ja</i> hvis Community Builder er installeret og du vil vise brugerens forbindelser ved oprettelse af en ny besked.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Vis indstillinger');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Indstillingerne vises i uddeIM hvis du har aktiveret e-mail-notifikation eller blokeringssystemet. Hvis ikke de skal vises, kan det sl&aering;s fra her. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'Ja, nederst');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Tillad BB-koder');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'kun skriftformatering');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'V&aelig;lg <i>kun skriftformatering</i> for at tillade BB-koder til tekstformatering (fed, kursiveret, understregning, skriftfarve og -st&oslash;rrelse). V&aelig;lg <i>Ja</i> for at tillade brugen af <strong>alle</strong> underst&oslash;ttede BB-koder i deres beskeder (inkl. links og billeder).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Tillad emoticons');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'V&aelig;lg <i>Ja</i> hvis emoticon-koder a la :-) ved visning af beskederne skal erstattes med smiley-billeder. Se venligst readme-filen for en liste over underst&oslash;ttede emoticons.');
DEFINE ('_UDDEADM_DISPLAY', 'Vis');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Vis menuikoner');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'V&aelig;lg <i>Ja</i> for at vise menu- og action-links med et ikon.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Komponenttitel');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Indtast overskriften p&aring; privat besked-komponenten, fx \'Private beskeder\'. Udfyldes kun hvis der skal vises en overskrift.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Vis Om-link');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'V&aelig;lg <i>Ja</i> for at vise linket til uddeIM-kreditering og licens. Dette link vil blive placeret til sidst i den uddeIM-genererede kode.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Stands e-mail nu');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Marker denne boks for at forhindre at uddeIM sender e-mails (e-mail-notifikationer og forglemmigej-e-mails) uden hensyntagen til brugerindstillinger, fx ved test af sitet. V&aelig;lg <i>Nej</i> ved ovenst&aring;ende valgmuligheder hvis disse funktioner aldrig skal benyttes.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manuelt');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB-miniaturebilleder i lister');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'V&aelig;lg <i>Ja</i> hvis brugernes miniaturebilleder skal vises i beskedoversigterne (indbakke, udbakke, etc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Vis brugere');
DEFINE ('_UDDEIM_CONNECTIONS', 'Forbindelser');
DEFINE ('_UDDEIM_SETTINGS', 'Indstillinger');
DEFINE ('_UDDEIM_NOSETTINGS', 'Der er ingen indstillingsmuligheder.');
DEFINE ('_UDDEIM_ABOUT', 'Om'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Ny besked'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-mail-notifikation');
DEFINE ('_UDDEIM_EMN_EXP', 'Du kan modtage en e-mail n&aring;r du f&aring;r en ny privat besked.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-mail-notifikation ved nye beskeder');
DEFINE ('_UDDEIM_EMN_NONE', 'Ingen e-mail-notifikation');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'E-mail-notifikation ved offline');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Send ikke notifikation ved svar');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Brugerblokering'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Du kan forhindre at brugerne sender dig beskeder ved at blokere dem. V&aelig;lg <i>bloker bruger</i> n&aring;r l&aelig;ser en besked fra den enkelte bruger.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Gem &aelig;ndringer');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB-koder for fed skrift. Brug: [b]fed[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB-koder for kursiv skrift. Brug: [i]kursiv[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB-koder for understregning. Brug: [u]understreget[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB-koder for farvet skrift. Brug [color=#XXXXXX]farvet[/color] hvor XXXXXX er hexadecimaltalskoden for den &oslash;nskede farve. Brug fx FF0000 for r&oslash;d.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB-koder for farvet skrift. Brug [color=#XXXXXX]colored[/color] hvor XXXXXX er hexadecimaltalskoden for den &oslash;nskede farve. Brug fx 00FF00 for gr&oslash;n.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB-koder for farvet skrift. Brug [color=#XXXXXX]colored[/color] hvor XXXXXX er hexadecimaltalskoden for den &oslash;nskede farve. Brug fx 0000FF for bl&aring;.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB-koder for meget lille skrift. Brug: [size=1]meget lille skriftst&oslash;rrelse.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB-koder for lille skrift. Brug: [size=2]lille skriftst&oslash;rrelse.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB-koder for stor skrift. Brug: [size=4]stor skriftst&oslash;rrelse.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB-koder for meget stor skrift. Brug: [size=5]meget stor skriftst&oslash;rrelse.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB-koder til inds&aelig;ttelse af et link til et billede. Brug: [img]Billede-url[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB-koder til inds&aelig;ttelse af hyperlinks. Brug: [url]webadresse[/url]. Glem ikke http:// i begyndelsen af hver webadresse.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Luk alle &aring;bne BB-koder.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' besked i din'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>Der er ingen beskeder i dit arkiv.</strong>'); 
