?<?php
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
// Language file: Croatian  (source file is CP1250)
// Translator:     Tanja Dragisic <noemail>, www.05vizija.net
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
DEFINE ('_UDDEADM_USEENCRYPTION', 'Koristi enkripciju');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Napravi enkripciju pohranjenih poruka');
DEFINE ('_UDDEADM_CRYPT0', 'Ništa');
DEFINE ('_UDDEADM_CRYPT1', 'Uèini poruke nejasnim');
DEFINE ('_UDDEADM_CRYPT2', 'Napravi enkripciju - još nije izvediva');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Standard za email obavijest');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Standardna vrijednost za email obavijest (za korisnike koji još nisu promjenili svoje preference).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Bez obavijesti');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Uvijek');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Obavijest samo kad je offline');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Sprijeèi link "Svi korisnici"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Sprijeèi prikazivanje linka "Svi korisnici" u prostoru za pisanje nove poruke (korisno kad imate puno registriranih korisnika).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup obavijest');
DEFINE ('_UDDEADM_POPUP_EXP','Prikažite popup kad stigne nova poruka (potreban zakrpan mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', 'Dodatne postavke');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Ovdje možete konfigurirati neke dodatne postavke.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Prikaži popup kad stigne nova poruka');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup obavijest kao standardna postavka');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Aktiviraj standardnu popup obavijest (za korisnike koji još nisu promjenili svoje preference).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Održavanje');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Izbriši poruke korisnika koji više ne postoje');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'PROVJERI');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'U SMEÆE');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', 'Kad je korisnik izbrisan iz baze podataka, negove poruke su obièno saèuvane u bazi podataka. Ova funkcija provjerava da li je potrebno brisati poruke koje nikome ne pripadaju, a možete ih i izbrisati akot to želite.');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', 'Provjeravam...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (Korisnièko ime): [inbox|inbox trashed|outbox|outbox trashed]</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>ulazna pošta: poruka spremljenih u ulaznoj pošti korisnika</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>ulazna pošta izbrisana: poruke izbrisane iz ulazne pošte korisnika, ali još uvijek ima poruka u nekim izlaznim poštama</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>izlazna pošta: poruka pohranjeno u izlaznoj pošti korisnika</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>izlazna pošta izbrisana: poruke izbrisane iz izlazne pošte korisnika, ali još uvijek ima poruka u nekim ulaznim poštama</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', 'Brišem...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', '<b>#$i nije pronaðeno (od/za): $mvon/$man</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT2', 'izbriše sve preference korisnika #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT3', 'izbriši blokiranje korisnika #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT4', 'izbriši sve poruke poslane korisniku #$i u izlaznoj pošti pošiljatelja i #$i\ ulaznoj pošti<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT5', 'izbriši sve poruke koje je poslao korisnik #$i u #$i\ izlaznoj pošti i ulaznoj pošti primatelja<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nema nièega za uèiniti</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Potrebno brisanje</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Prikaži prava imena');
DEFINE ('_UDDEADM_NAMESDESC', 'Prikaži prava imena ili korisnièka imena?');
DEFINE ('_UDDEADM_REALNAMES', 'Prava imena');
DEFINE ('_UDDEADM_USERNAMES', 'Korisnièka imena');
DEFINE ('_UDDEADM_CONLISTBOX', 'Popis veza');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Prikazati Moje veze u popisu ili u tablici?');
DEFINE ('_UDDEADM_LISTBOX', 'Popis');
DEFINE ('_UDDEADM_TABLE', 'Tablica');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Poruke æe brije brisanja ostati u smeæu 24 sata. Možete vidjeti samo prve rijeèi poruke. Ako želite proèitati cijelu poruku, morate ju prvo obnoviti.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Poruke æe ostati u smeæu ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' sati prije nego li budu izbrisane. Možete vidjeti samo prve rijeèi poruke. Da bi ste proèitali cijelu poruku, trebate ju prvo vratiti u prijašnje stanje.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Ova poruka je bila opozvana. Sada je možete urediti i ponovno poslati.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Nije bilo moguæe opozvati poruku (vjerojatno zato jer je bila proèitana ili izbrisana.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Neuspjelo vraæanje poruke u prijašnje stanje. (Možda je bila predugo u smeæu ili je u meðuvremenu izbrisana.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Neuspjelo vraæanje poruke u prijašnje stanje.');
DEFINE ('_UDDEIM_DONTSEND', 'Nemoj poslati');
DEFINE ('_UDDEIM_SENDAGAIN', 'Pošalji ponovno');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Niste prijavljeni.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Nema poruka u ulaznoj pošti.</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Nemate poruka u vašoj ulaznoj pošti.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Nemate poruka u smeæu.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Ulazna pošta');
DEFINE ('_UDDEIM_OUTBOX', 'Izlazna pošta');
DEFINE ('_UDDEIM_TRASHCAN', 'Smeæe');
DEFINE ('_UDDEIM_CREATE', 'Nova poruka');
DEFINE ('_UDDEIM_UDDEIM', 'Privatne poruke');
DEFINE ('_UDDEIM_READSTATUS', 'Èitaj');
DEFINE ('_UDDEIM_FROM', 'Od');
DEFINE ('_UDDEIM_FROM_SMALL', 'od');
DEFINE ('_UDDEIM_TO', 'Za');
DEFINE ('_UDDEIM_TO_SMALL', 'za');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Vaša izlazna pošta sadrži sve poruke koje ste poslali a koje još niste izbrisali. U izlaznoj pošti možete opozvati poruku koja još nije proèitana. Ako to uèinite, primatelj je više neæe moæi èitati. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'opoziv');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Opozovi ovu poruku');
DEFINE ('_UDDEIM_RESTORE', 'vrati u prijašnje stanje');
DEFINE ('_UDDEIM_MESSAGE', 'Poruka');
DEFINE ('_UDDEIM_DATE', 'Datum');
DEFINE ('_UDDEIM_DELETED', 'Izbrisano');
DEFINE ('_UDDEIM_DELETE', 'izbriši');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'izbriši');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Ova poruku nije moguæe prikazati. <br />Moguæi razlozi:<ul><li>Niste ovlašteni za èitanje ove poruke</li><li>Poruka je izbrisana</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Premjestili ste ovu poruku u smeæe.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Poruka od ');
DEFINE ('_UDDEIM_MESSAGETO', 'Vaša poruka za ');
DEFINE ('_UDDEIM_REPLY', 'Odgovori');
DEFINE ('_UDDEIM_SUBMIT', 'Pošalji');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Nakon odgovora premjesti originalnu poruku u smeæe');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'Greška: ID primatelja nije pronaðen. Poruka nije poslana.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Greška: Poruka ne sadrži tekst! Poruka nije poslana.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Odgovor poslan');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Poruka poslana');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' i originalna poruka premještena u smeæe');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Ne postoji korisnik s tim korisnièkim imenom!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Nije moguæe poslati poruku samom sebi!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Nedozvoljena radnja!</b> Nemate ovlaštenja za ovu radnju!');
DEFINE ('_UDDEIM_PRUNELINK', 'Samo za administratore: smanjivanje');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Administracija');
DEFINE ('_UDDEADM_GENERAL', 'Opæenito');
DEFINE ('_UDDEADM_ABOUT', 'O uddeIM');
DEFINE ('_UDDEADM_DATESETTINGS', 'Datum/vrijeme');
DEFINE ('_UDDEADM_PICSETTINGS', 'Ikone');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Proèitane poruke èuvaju se (dana)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Neproèitane poruke èuvaju se (dana)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Poruke u smeæu èuvaju se (dana)');
DEFINE ('_UDDEADM_DAYS', 'dan(a)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Upišite za koliko æe se dana <b>proèitane</b> poruke automatski izbrisati iz ulazne pošte. Ako ne želite automatski brisati poruke, upišite veæi broj (na primjer, 36524 dana znaèi jedno stoljeæe). Ali, ne zaboravite da se baza podataka može vrlo brzo napuniti ako èuvate sve poruke.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Upišite za koliko æe se dana brisati poruke koje još <b>nije proèitao</b> primatelj.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Upišite za koliko æe se dana brisati poruke iz smeæa. Brojevi manji od 1 su O.K. Na primjer: Da bi se poruke iz smeæa brisale nakon 3 sata, upišite broj 0.125.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Format prikazivanja datuma');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Izaberite format u kojem æe se prikazivati datum/vrijeme poruke. Mjeseci æe biti upisani sa skraæenicama koje odgovaraju lokalnim postavkama vašeg jezika na Joomli (ako postoji odgovarajuæa uddeIM jezièna datoteka).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Prikaz dužeg oblika datuma');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Kada se poruke prikazuju, ima više mjesta za prikaz datuma. Izaberite format datuma koji æe se pokazati kada se poruka otvara. Za nazive dana u tjednu i mjeseca, koristiti æe se postavke lokalnog jezika Joomle (ako postoji odgovarajuæa uddeIM jezièna datoteka).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Brisanje radi samo administrator');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'da, samo administratori');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'ne, bilo koji korisnik');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatsko brisanje optereæuje servere i baze podataka. Ako izaberete <i>Da,&nbsp;samo&nbsp;administratori</i>, automatsko brisanje prema postavkama (poruke svih korisnika) vrši se kad bilo koji administrator provjeri svoju ulaznu poštu. Izaberite ovu opciju ako administrator provjerava svoju ulaznu poštu jednom dnevno ili èešæe, što je sluèaj s veæim brojem web stranica. (Ako vaše stranice imaju više od jednog administratora, nije bitno tko se od njih prijavi jer brisanje se pokreæe automatski, od strane bilo kojeg administratora.) Za manje web stranice ili stranice koje se rijetko administriraju i na kojima administrator rijetko provjerava ulaznu poštu, izaberite <i>ne,&nbsp;bilo&nbsp;koji&korisnik</i>. Ako sve ovo ne razumijete ili ne znate što uèiniti, izaberite <i>ne, bilo koji korisnik</i>.');
	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Saèuvaj postavke');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Slijedeæe postavke saèuvane su u datoteki konfiguracije:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Postavke su spremljene.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ikona: Korisnik je online');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Upišite lokaciju ikone koja æe biti prikazana pored korisnièkog imena kad je korisnik online.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ikona: Korisnik je offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Upišite lokaciju ikone koja æe se prikazati pored korisnièkog imena kad je korisnik offline.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Ikona: Proèitaj poruku');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Upišite lokaciju ikone koja æe se prikazati za èitanje poruka.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ikona: Neproèitana poruka');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Upišite lokaciju ikone koja æe se prikazati za neproèitane poruke.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: Ikona novih poruka');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Ova postavka odnosi se na mod_uddeim_new modul. Upišite lokaciju ikone koju æe ovaj modul prikazati kada ima novih poruka.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM Instalacija');
DEFINE ('_UDDEADM_FINISHED', 'Instalacija završena. Dobrodošli u uddeIM 0.7 (beta). ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Niste instalirali Community Builder. Neæete moæi koristiti uddeIM.</span><br /><br />Preuzmite <a href="http://www.mambojoe.com">Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'nastavi');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Imate ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' poruka u vašoj myPMS instalaciji. Da li ih želite importirati u uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Ovo neæe promjeniti myPMS poruke ili vašu instalaciju. Poruke æe biti neošteæene. Možete ih bez problema importirati u uddeIM, èak i ako mislite i dalje koristiti myPMS. (Prije importiranja trebali bi ste prvo saèuvati promjene koje ste napravili u postavkama!) Ako veæ imate poruka u vašoj uddeIM bazi podataka, one æe ostati neošteæene.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Importiraj myPMS poruke u uddeIM');
DEFINE ('_UDDEADM_IMPORT_NO', 'Ne, nemoj importirati poruke');
DEFINE ('_UDDEADM_IMPORTING', 'Prièekajte dok traje importiranje poruka.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Importiranje poruka iz myPMS završeno. Nemojte ponovno pokretati ovu instalacijsku skriptu jer ako to uèinitem poruke æe ponovno biti importirane i pokazati æe se dva puta.');
DEFINE ('_UDDEADM_IMPORT', 'Importiraj');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importiraj poruke iz myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'myPMS instalacija nije pronaðena. Importiranje nije moguæe.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Veæ ste importirali myPMS poruke u uddeIM.</span>');

// new in 0.3 Frontend

DEFINE ('_UDDEIM_BLOCKS', 'Blokirano');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nije poslano (korisnik vas je blokirao)');
DEFINE ('_UDDEIM_BLOCKNOW', 'blokiraj&nbsp;korisnika');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Ovo je popis korisnika koje ste blokirali. Ovi korisnici ne mogu vam poslati privatne poruke.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Nemate niti jednog blokiranog korisnika.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Blokirali ste ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' korisnik(a).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[odblokiraj]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Ako vam blokirani korisnik pokuša poslati poruku, on(a) æe biti obavješten(a) da je blokiran(a) i da nije moguæe poslati poruku.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Blokirani korisnik ne može vidjeti da ste ga blokirali.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Ne možete blokirati administratore.');

// new in 0.3 Admin

DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Osposobi sistem blokiranja');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Kad je sistem osposobljen, korisnici mogu blokirati druge korisnike. Blokirani korisnik ne može slati poruke korisniku koji ga je blokirao. Administratori ne mogu biti blokirani.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'da');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'ne');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Blokirani korisnik prima poruke');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Ako je postavljeno na <i>da</i>, blokirani korisnik bit æe obaviješten da nije bilo moguæe poslati njegovu poruku jer ga je primatelj poruke blokirao. Ako je postavljeno na <i>ne</i>, blokirani korisnik neæe biti obaviješten da njegova poruka nije poslana.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'da');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'ne');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistem blokiranja nije osposobljen');
// DEFINE ('_UDDEADM_DELETIONS', 'Poruke'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Izbrisane poruke'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blokiranje');

// new in 0.4, admin

DEFINE ('_UDDEADM_INTEGRATION', 'Integracija');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Prikaži CB linkove');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Kad je postavljeno na <i>da</i>, sva korisnièka imena koja se pojavljuju u uddeIM biti æe prikazana kao link za njihov Community Builder profil.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Prikaži CB thumbnail');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Kad je postavljeno na <i>da</i>, korisnikov thumbnail bit æe prikazan prilikom èitanja poruke (ako on(a) ima sliku u svom Community Builder profilu).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Prikaži online status');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Kad je postavljeno na <i>da</i>, uddeIM prikazuje svako korisnièko ime s malom ikonom koja obaviještava da li je ovaj korisnik online ili offline. Možete odrediti ikone u administrativnom dijalogu za ikone.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Dozvoli e-mail obavijest');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Kad je postavljeno na <i>da</i>, svaki korisnik može izabrati da li on(a) želi primiti e-mail svaki put kada u njegovu ulaznu poštu stigne e-mail.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail sadrži poruku');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Kad je postavljeno na <i>ne</i>, ovaj e-mail sadržavati æe samo informaciju o tome kada i od koga je stigla poruka, ali neæe sadržavati samu poruku.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Ne-zaboravi-me e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Ova moguænost omoguæava slanje - nezavisno od korisnikovih postavki - e-mail poruke korisniku koji veæ dulje vrijeme ima neproèitanu poruku u ulaznoj pošti (postavke ispod). Ova postavka je neovisna od gornje \'dozvoli e-mail obavijest\' postavke. Ako ne želite slati bilo kakve poruke ikada, trebate iskljuèiti obje opcije.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Ne-zaboravi-me šalje se nakon koliko dan(a)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Ako je gornja Ne-zaboravi-me postavka postavljena na <i>da</i>, ovdje odredite nakon koliko dana æe se slati obavijesti o neproèitanoj poruci.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Popis prvih slova');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Možete postaviti koliko æe se znakova iz poruke prikazati u ulaznoj pošti, izlaznoj pošti ili smeæu.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Maksimalna duljina poruke');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Ovdje postavite maksimalnu duljinu poruke. Poruka æe nakon toga biti automatski skraæena. Postavite na \'0\' kako bi dozvolili poruke bilo koje duljine (nije preporuèeno).');
DEFINE ('_UDDEADM_YES', 'da');
DEFINE ('_UDDEADM_NO', 'ne');
DEFINE ('_UDDEADM_ADMINSONLY', 'samo administratori');
DEFINE ('_UDDEADM_SYSTEM', 'Sistem');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Korisnièko ime za sistemske poruke');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM podržava sistemske poruke. One nemaju vidljivog pošiljatelja i korisnici ne mogu odgovoriti na njih. Ovdje upišite alias za korisnièko ime za sistemske poruke (na primjer <i>Podrška</i> ili <i>Help desk</i> ili <i>Community Master</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Dozvoli administratorima da šalju opæe poruke');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM podržava opæe poruke koje se šalju svakom korisniku u vašem sistemu. Nemojte ih èesto koristiti.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Ime e-mail pošiljatelja');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Upišite ime koje æe se prikazati kao ime pošiljatelja e-mail obavijesti (na primjer <i>NAZIV STRANICA</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adresa e-mail pošiljatelja');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Upišite e-mail adresu s koje su poslane e-mail obavijesti (ovo bi trebala biti glavna e-mail adresa za kontakt na vašim stranicama).');
DEFINE ('_UDDEADM_VERSION', 'uddeIM verzija');
DEFINE ('_UDDEADM_ARCHIVE', 'Arhiva'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Omoguæi arhivu');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Izaberite da li æe korisnicima biti dozvoljeno da pohrane poruke u arhivi. Poruke u arhivi neæe biti brisane.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Maksimalan broj poruka u arhivi korisnika');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Odredite koliko poruka svaki korisnik može pohraniti u arhivi (bez ogranièenja za administratora).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Dozvoli kopije za korisnika');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Dozvolite korisnicima da primaju kopije poruka koje šalju. Ove æe se kopije pojaviti u ulaznoj pošti.');
DEFINE ('_UDDEADM_MESSAGES', 'Poruke');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Predloži slanje originala u smeæe');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Kada je ova opcija aktivirana, pojavljuje se kvadrat pored dugmeta \'Pošalji\' koji se zove \'Original u smeæe\' koji æe uvijek biti oznaèen. U tom sluèaju, poruka æe automatski biti premještena iz ulazne pošte u smeæe nakon što se pošalje odgovor na nju. Ova funkcija smanjuje broj poruka u bazi podataka. Korisnici uvijek mogu odznaèiti ovaj kvadrat ako žele zadržati poruku u ulaznoj pošti.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Poruka po stranici');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Odredite koliko æe se poruka prikazati po stranici u ulaznoj pošti, izlaznoj pošti, smeæu i arhivi.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Znakovi u upotrebi');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Ako imate problema s prikazivanjem slova koja nisu ž
ska, ovdje možete upisati set znakova (charset) kojeg æe uddeIM koristiti za prikazivanje informacija iz baze podataka u HTML kodu. <b>Ako ne znate što to znaèi, nemojte mjenjati postavljenu vrijednost!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Znakovi u upotrebi za mail');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Ako imate problema s prikazivanjem slova koja nisu latin1, ovdje možete upisati set znakova (charset) kojeg æe uddeIM koristiti za slanje izlazne pošte. <b>Ako ne znate što to znaèi, nemojte mjenjati postavljenu vrijednost!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Ovo je sadržaj e-maila kojega æe korisnici primiti kada je gornja opcija postavljena. Sadržaj poruke neæe biti u e-mailu. Zadržite vrijednosti %you%, %user% i %site% nepromjenjene. ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Ovo je sadržaj e-maila kojega æe korisnici primiti kada je gornja opcija postavljena. Ovaj e-mail ukljuèiti æe sadržaj poruke. Zadržite vrijednosti %you%, %user% i %site% nepromjenjene. ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Ovo je sadržaj Ne-zaboravi-me e-maila kojega æe korisnici kada je gornja opcija postavljena. Zadržite vrijednosti %you%, %user% i %site% nepromjenjene. ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Dozvoli korisnicima da preuzmu poruke iz njihove arhive tako što æe ih poslati kao e-mail sebi.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Dozvoli preuzimanje');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Ovo je format e-maila kojega æe korisnici primiti kada preuzmu svoje vlastite poruke iz arhive. Zadržite vrijednosti %user%, %msgdate% i %msgbody% nepromjenjene. ');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Postavi ogranièenje za ulaznu poštu');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Možete ukljuèiti broj poruka u ulaznoj pošti u maksimalan broj arhiviranih poruka. U tom sluèaju, ukupan zbroj poruka u ulaznoj pošti i broj poruka u arhivi ne smije biti veæi od gore odreðenog broja. Kao druga moguænost, možete postaviti ogranièenje za ulaznu poštu bez arhive. U tom sluèaju, korisnici ne mogu imati više poruka u ulaznoj pošti od onoga gore postavljenog. Ako se dostigne taj broj, korisnici više neæe moæi odgovarati na poruke ili pisati nove sve dok ne izbrišu stare poruke iz ulazne pošte ili arhive. (Korisnici æe još uvijek moæi primati i èitati nove poruke.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Prikaži ogranièenje u ulaznoj pošti');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Ispod ulazne pošte pokazati æe se koliko je poruka korisnik pohranio (i koliko ih može pohraniti).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Onemoguæili ste arhivu. Što želite uèiniti s porukama koje su pohranjene u arhivi?');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Ostavi ih');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Ostavi ih u arhivi (korisnik im neæe moæi pristupiti ali æe se one i dalje ubrajati u ogranièeni broj poruka).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Premjesti u ulaznu poštu');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Arhivirane poruke premještene u ulaznu poštu');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Poruke æe biti premještene u ulaznu poštu korisnika (ili u smeæe ako su starije od datuma koji je dozvoljen za ulaznu poštu).');

// 0.4 frontend, admins only (no translation necessary)	

DEFINE ('_UDDEIM_SEND_ASSYSM', 'pošalji kao sistemsku poruku (=primatelji ne mogu odgovoriti)');
DEFINE ('_UDDEIM_SEND_TOALL', 'pošalji svim korisnicima');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'pošalji svim administratorima');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'pošalji svim online korisnicima');

DEFINE ('_UDDEIM_VALIDFOR_1', 'valjano ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' sati. 0=zauvijek (primjenuje se automatsko brisanje)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Kreiraj sistemsku ili opæu poruku]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Kreiraj obiènu poruku]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Sistemske i opæe poruke nisu dozvoljene.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Vrsta poruke');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Pomoæ za sistemske poruke');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(otvara se u novom prozoru)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Poslati æe te poruke prikazane ispod. Provjerite ih i potvrdite ili otkažite!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Poruka za <strong>sve korisnike</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Poruka za <strong>sve administratore</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Poruka za <strong>sve online korisnike</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Primatelji neæe moæi odgovoriti na ovu poruku.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Poruka æe biti poslana s <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> kao korisnièko ime');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Poruka æe isteæi ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Poruka neæe isteæi');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Provjerite link (kliknite na njega) prije nastavka!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Primjena <strong>samo u sistemskim porukama</strong>:<br /> [b]<strong>bold</strong>[/b] [i]<em>italic</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] or [url]http://www.someurl.com[/url] are links<br />
Koristite [newurl] [/newurl] umjesto otvaranja linka u novom prozoru.');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Greška: Primatelji nisu pronaðeni. Poruka nije poslana.');

// 0.4 frontend (all users, translation needed)

DEFINE ('_UDDEIM_CANTREPLY', 'Ne možete odgovoriti na ovu poruku.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail obavijest je iskljuèena. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail obavijest je ukljuèena. ');
DEFINE ('_UDDEIM_SETEMNON', '[ukljuèi]');
DEFINE ('_UDDEIM_SETEMNOFF', '[iskljuèi]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Pozdrav %you%,

%user% poslao vam je privatnu poruku na %site%.
Molimo vas da se prijavite na stranice i proèitate je!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Pozdrav %you%,

%user% poslao vam je slijedeæu privatnu poruku na %site%.
Molimo vas da se prijavite!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Pozdrav %you%,

imate neproèitane poruke na %site%.
Molimo vas da se prijavite na stranice i proèitate ih!
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Imate poruke na %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'send as system message (=recipients can\'t reply)');
DEFINE ('_UDDEIM_SEND_TOALL', 'send to all users');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'send to all admins');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'send to all online users');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Neoèekivana greška: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arhiva nije aktivirana.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Arhiviranje poruka nije uspijelo.');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Nemate arhiviranih poruka.</strong>');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Pohranili ste ');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' poruka');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Pohranili ste jednu poruku');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Da bi ste saèuvali poruke, morate prvo izbrisati druge poruke.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Možete spremiti najviše ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' poruka.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Imate ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' poruka u vašoj');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arhivi');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'ulaznoj pošti');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'ulaznoj pošti i arhivi');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Najveæi dozvoljeni broj je ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Još uvijek možete primati i èitati poruke ali neæete moæi odgovarati ili pisati nove poruke sve dok ne izbrišete neke poruke.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Pohranjene poruke: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(od najviše. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Pohrani poruke u arhivu.');
DEFINE ('_UDDEIM_STORE', 'arhiva');
	// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'natrag');

DEFINE ('_UDDEIM_TRASHCHECKED', 'izbriši oznaèene');
	// translators info: plural! (as in "delete checked" messages)

DEFINE ('_UDDEIM_SHOWALL', 'prikaži sve');
	// translators example "SHOW ALL messages"

DEFINE ('_UDDEIM_ARCHIVE', 'Arhiva');
	// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arhiva puna. Nije saèuvano.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Nema izabranih poruka.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopija poruke poslana ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'kopija za mene');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopiraj u arhivu');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'original u smeæe');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Preuzimanje poruke');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail s eksportiranim porukama poslan');
DEFINE ('_UDDEIM_EXPORT_NOW', 'oznaèeni e-mail za mene');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Ovaj mail sadrži vaše privatne poruke.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Neuspjelo slanje emaila koji sadrži poruke.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Prekoraèenje broja poruka! Nije vraæeno u prijašnje stanje.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Napiši poruku za ');

$udde_smon[1]="Sij";
$udde_smon[2]="Velj";
$udde_smon[3]="Ožu";
$udde_smon[4]="Tra";
$udde_smon[5]="Svi";
$udde_smon[6]="Lip";
$udde_smon[7]="Srp";
$udde_smon[8]="Kol";
$udde_smon[9]="Ruj";
$udde_smon[10]="Lis";
$udde_smon[11]="Stu";
$udde_smon[12]="Pro";

$udde_lmon[1]="Sijeèanj";
$udde_lmon[2]="Veljaèa";
$udde_lmon[3]="Ožujak";
$udde_lmon[4]="Travanj";
$udde_lmon[5]="Svibanj";
$udde_lmon[6]="Lipanj";
$udde_lmon[7]="Srpanj";
$udde_lmon[8]="Kolovoz";
$udde_lmon[9]="Rujan";
$udde_lmon[10]="Listopad";
$udde_lmon[11]="Studeni";
$udde_lmon[12]="Prosinac";

$udde_lweekday[0]="Nedjelja";
$udde_lweekday[1]="Ponedjeljak";
$udde_lweekday[2]="Utorak";
$udde_lweekday[3]="Srijeda";
$udde_lweekday[4]="Èetvrtak";
$udde_lweekday[5]="Petak";
$udde_lweekday[6]="Subota";

$udde_sweekday[0]="Ned";
$udde_sweekday[1]="Pon";
$udde_sweekday[2]="Uto";
$udde_sweekday[3]="Sri";
$udde_sweekday[4]="Èet";
$udde_sweekday[5]="Pet";
$udde_sweekday[6]="Sub";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM predložak');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Izaberite predložak kojega želite koristiti za uddeIM');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Prikaži CB veze');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Izaberite <i>da</i> ako imate instaliran Community Builder i želite korisniku dati na uvid imena njegovih veza na stranici za pisanje nove poruke.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Prikaži postavke');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Link za postavke pojaviti æe se u uddeIM ako imate aktivirane e-mail obavijesti ili sistem blokiranja. Ako to ne želite, iskljuèite opciju. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'da, na dnu');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Dozvoli BB kodove');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'samo format slova');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Koristite <i>samo format slova</i> da bi dozvolili korisnicima da koriste bb kodove za podebljana, nakošena, podcrtana slova, boju i velièinu slova. Kada ovu opciju postavite na <i>da</i>, korisnici æe u svojim porukama moæi koristiti <strong>sve</strong> podržane BB kodove (èak i slike i linkove).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Dozvoli Emoticons');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Kada ovu opciju postavite na <i>da</i>, emoticon kodovi kao :-) zamjenjuju se s emoticon slikama prilikom prikazivanja poruke. Pogledajte readme datoteku za popis podržanih emoticona.');
DEFINE ('_UDDEADM_DISPLAY', 'Prikazivanje');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Prikaži ikone izbornika');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Kada ovu opciju postavite na <i>da</i>, stavke izbornika i linkovi za postupke prikazati æe se s ikonom.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Naziv komponente');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Upišite naslov komponente za slanje privatnih poruka, na primjer \'Privatne poruke\'. Ostavite prazno ako ne želite prikazati naslov.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Prikaži O uddeIM link');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Postavite na <i>da</i> kako bi prikazali link za uddeIM software informacije i licencu. Ovaj link æe se pojaviti na dnu uddeIM HTML ispisa.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Zaustavi e-mail');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Oznaèite ovaj kvadrat kako bi sprijeèili uddeIM da šalje e-mail poruke (e-mail obavijesti i Ne-zaboravi-me e-mail poruke) neovisno od postavki korisnika, na primjer kada testirate web stranice. Ako ne želite ove moguænosti, postavite sve gornje postavke na <i>ne</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manuelno');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails u popisima');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Postavite na <i>da</i> ako želite prikazati CB thumbnails korisnika u pregledu poruka (ulazna pošta, izlazna pošta, outbox, itd.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Prikaži korisnike');
DEFINE ('_UDDEIM_CONNECTIONS', 'Veze');
DEFINE ('_UDDEIM_SETTINGS', 'Postavke');
DEFINE ('_UDDEIM_NOSETTINGS', 'Nema postavki za usklaðivanje.');
DEFINE ('_UDDEIM_ABOUT', 'O uddeIM'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Sastavi'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Mail obavijest');
DEFINE ('_UDDEIM_EMN_EXP', 'Možete primiti e-mail kad dobijete nove privatne poruke.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-mail obavijest za nove poruke');
DEFINE ('_UDDEIM_EMN_NONE', 'Bez e-mail obavijesti');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'E-mail obavijest kada sam offline');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Ne šalji obavijest za odgovore');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Blokiranje korisnika'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Možete sprijeèiti korisnika da vam šalje poruke tako što æe te ga blokirati. Izaberite <i>blokiraj korisnika</i> kada pregledavate poruku od tog korisnika.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Spremi izmjene');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB oznaka za podebljani tekst. Primjena: [b]podebljano[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB oznaka za nakošeni tekst. Primjena: [i]nakošeno[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB oznaka za podcrtani tekst. Primjena: [u]podcrtaj[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB oznaka za slova u boji. Primjena [color=#XXXXXX]obojano[/color] gdje je XXXXXX hex kod boje koju želite, na primjer FF0000 za crvenu.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB oznaka za slova u boji. Primjena [color=#XXXXXX]obojano[/color] gdje je XXXXXX hex kod boje koju želite, na primjer 00FF00 za zelenu.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB oznaka za slova u boji. Primjena [color=#XXXXXX]obojano[/color] gdje je XXXXXX hex kod boje koju želite, na primjer 0000FF za plavu.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB oznaka za vrlo mala slova. Primjena: [size=1]vrlo mala slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB oznaka za mala slova. Primjena: [size=2] mala slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB oznaka za velika slova. Primjena: [size=4]velika slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB oznaka za vrlo velika slova. Primjena: [size=5]vrlo velika slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB oznaka za umetanje linka za sliku. Primjena: [img]URL slike[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB oznaka za umetanje URL linka. Primjena: [url]web adresa[/url]. Ne zaboravite upisati http:// na poèetku svake web adrese.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Zatvori sve otvorene BB oznake.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' poruku u vašoj'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>Nemate poruka u vašoj arhivi.</strong>');
