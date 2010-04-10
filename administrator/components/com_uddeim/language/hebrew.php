<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         � 2007-2008 Stephan Slabihoud, � 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: Hebrew  (source file is CP1255)
// Translator:     http://www.netiv.info <noemail>
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
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', '���� ����� ���� ������');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', '���� ��� <strong>����� ����</strong> (ISO-8859-1) ������ ������� �� ����� 1.0 ������ <strong>UTF-8</strong> ������ 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', '����� ����');
DEFINE ('_UDDEIM_READ_INFO_1', '������ ������� ����� ����� ����� ');
DEFINE ('_UDDEIM_READ_INFO_2', ' ���� �������. ���� ������ ��������.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', '������ ��� ����� ���� ����� ����� ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' ���� �������. ���� ������ ��������.');
DEFINE ('_UDDEIM_SENT_INFO_1', '������ ������ ����� ����� ���� ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' ���� �������. ���� ������ ��������.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', '���� ����� ����� ����� �� ����� ������ ������');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', '���� ����� ����� ����� "������ ������ ����� ��� n ����"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', '���� ����� ����� ����� �� ����� ������ ��� �����');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', '���� ����� ����� ����� "������ ��� ������ ����� ��� n ����""');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', '���� ����� ����� ���� �� ����� ������ ������');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', '���� ����� ����� ���� "������ ������ ����� ��� n ����"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', '���� ����� ��� ����� �� ����� ������');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', '���� ����� ��� ����� "������ ��� ����� ����� ���� n ����"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', '���� ������ ������(����)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', '���� �� ����� ���� �� <b>������� ������</b> ����� �������� ����� �����.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', '��� ��� �������� �������� (������)');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', '����� <strong>��� �������� �������� (������)</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- ��� �� ����� -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- ��� �� -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', '���� ������ �����');
DEFINE ('_UDDEADM_USERSET_EXISTING', '����');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', '�� ����');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- ��� ��� -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- ��� ����� -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- ��� ���� ���� -');
DEFINE ('_UDDEADM_USERSET_USERNAME', '�� �����');
DEFINE ('_UDDEADM_USERSET_NAME', '��');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', '�����');
DEFINE ('_UDDEADM_USERSET_POPUP', '���� ����');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', '���� ������');
DEFINE ('_UDDEADM_USERSET_NO', '��');
DEFINE ('_UDDEADM_USERSET_YES', '��');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', '�� ����');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', '���� �� ���� (��� �������)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', '���� (��� �������)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', '���� �� ����');
DEFINE ('_UDDEADM_USERSET_ALWAYS', '����');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', '��� ������');
DEFINE ('_UDDEADM_WELCOMEMSG', "���� ��� ������ ����� ������ uddeIM!\n\n����� ������ ������ �� ����� ����� ������ uddeIM.\n\n��� ����� �� ������ ���� ���� ������. ��� ���� ������ ���� ����� ������ �� ������ ����� ������ uddeIM.\n\nuddeIM ��� ������ ������. �� ��� ���� ����� �� ����� �����, ����� ���� �� ���� ���� ����� ����� �� uddeIM ���� ���� ����.\n\n������ ����� ����!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', '����� ����� ����� ������ uddeIM ������ ������.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', '��� ������ ����� ������ �� ������ ������ �� �������.');
DEFINE ('_UDDEADM_REVIEWLANG', '�� ��� ������ �� ����� ����� ����� ������ ��� � ISO 8859-1 ����� �������� �����.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', '���� ������, ������ ������� ������ ����� ������ uddeIM (������ �����, ������) �� �������� ��� �� ��� ��� ��������� �� ������� ��� ��������. �� ���� ���� �� ������� "���� ��������" ��� ������ ���� �����.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', '������� ������');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', '������� ���� ������ ����� ����� ��� ������ ��� (0=��� �����)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', '������ ��� �����');
DEFINE ('_UDDEIM_STOPPEDEMAIL', '����� �������� �� �����.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', '����� �������� ���� ����� ');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', '����� �������� �� ����� ���� ����� (���� �� ���� ������� ����)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', '��� ����� "�� ��������"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', '��� �� ����� "�� ��������" ���� ����� ����� , ���� �� �� ���� �� �������� ���� ����� ����.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', '���� �� ������ "�� ��������"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', '���� �� ����� "�� ��������"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', '���� ���� ����� �� ��������');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', '���� ����������� �� ���� ������:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', '���� ���������� ���� ������:');
DEFINE ('_UDDEIM_FORWARDLINK', '����');
DEFINE ('_UDDEIM_RECIPIENTFOUND', '���� �����');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', '������� �����');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (����� ����)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', '����� ����');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', '��� ����� ���� ������ ����� ������ uddeIM ����� ����� ���� ������.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', '���� ������ ������');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', '���� ������ ����� ������ ����� ����.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', '����� �� ������');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', '���� ����� ������.');
DEFINE ('_UDDEIM_FWDFROM', '����� ������ �');
DEFINE ('_UDDEIM_FWDTO', '�');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', '��� ����� ��������');
DEFINE ('_UDDEIM_CANTUNARCHIVE', '�� ���� ����� ����� ��������');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', '���� ������ ������');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', '���� ������ ������ (������� ����� ,).');
DEFINE ('_UDDEIM_CHARSLEFT', '����� ������');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', '���� ���� ����� �������');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', '���� ���� ����� ������� ��� ���� ���� ����� ������� ������ ������.');
DEFINE ('_UDDEIM_CLEAR', '���');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', '���� ������� ������� �������');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', '�� ����� ���� ������ ������ ������ "�� ��������".');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', '��� ����� ������� �������');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', '�� ����� ����� ������ ������ ������ "������".');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS found: ');
DEFINE ('_UDDEIM_ENTERNAME', '���� ��');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', '����� ������ ��������');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', '����� ������ �������� ������ ���.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', '����� ������ ������');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', '���� ����� ������ ������. �� ���� �� ���� ���� ������ ������ ������.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', '����� ���� ����� ����������!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', '����� �����:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', '����� �����:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', '����� ������ ����������...');
DEFINE ('_UDDEADM_CFGFILE_DONE', '����!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', '���� ������: ����� ������ ����� �����������:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', '����� ������! - ����� �� ������!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', '����� �����! - ����� �� ������!');
DEFINE ('_UDDEIM_WRONGPW', '����� �����! - ��� ��� ��� �� ����!');
DEFINE ('_UDDEIM_WRONGPASS', '����� �����!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', '���� ������� ��� ���� (���� ����/���� ����): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', '����� ���� ������ �� �����');
DEFINE ('_UDDEIM_TODP', '�: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', '��� ������ �����');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', '���� ������ �����');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', '���� <i>��</i>, �������� ������ ������� ������ �� �����.');
DEFINE ('_UDDEIM_UNCHECKALL', '��� ����� �����');
DEFINE ('_UDDEIM_CHECKALL', '��� ���');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', '���� ������� ������');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', '���� <i>��</i>, ���� �������� ������ ������ �� ������� ���.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', '����� ����� �������');
DEFINE ('_UDDEADM_ANIMATED_EXP', '����� ����� ������� ����� ����� �����.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', '��� ���� �������');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', '���� ��� ���� �������.');
DEFINE ('_UDDEIM_PASSWORDREQ', '����� ������ - ������ �����');
DEFINE ('_UDDEIM_PASSWORD', '<strong>������ �����</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', '�����');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (���� �����)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (���� �����)');
DEFINE ('_UDDEIM_MORE', '���');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', '���� �����');
DEFINE ('_UDDEMODULE_NONEW', '��� ������ �����');
DEFINE ('_UDDEMODULE_NEWMESSAGES', '������ �����: ');
DEFINE ('_UDDEMODULE_MESSAGE', '�����');
DEFINE ('_UDDEMODULE_MESSAGES', '������');
DEFINE ('_UDDEMODULE_YOUHAVE', '�� ��');
DEFINE ('_UDDEMODULE_HELLO', '����');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', '����� �����');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', '����� ������');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', '����� ������ ��������');
DEFINE ('_UDDEADM_CRYPT0', '���');
DEFINE ('_UDDEADM_CRYPT1', '������ ������');
DEFINE ('_UDDEADM_CRYPT2', '����� ������ - ����� �� �����');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', '����� ���� ���� �������� �����');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', '���� ����� ���� ���� �������� ����� (���� ������� ������ �� ���� �� ������� ����).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', '�� ���� ������ �����');
DEFINE ('_UDDEADM_NOTIFYDEF_1', '���� ����');
DEFINE ('_UDDEADM_NOTIFYDEF_2', '���� ������� �� ���� �����');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', '��� ����� "�� �������"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', '��� ����� "�� ��������" ��� ����� ���� (���� ���� ��� ���� ������� ������).');
DEFINE ('_UDDEADM_POPUP_HEAD','�������� ����� ����');
DEFINE ('_UDDEADM_POPUP_EXP','���� ���� ���� ��� ������� ����� ���� (���� ����� �� ������ mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', '��� ������');
DEFINE ('_UDDEIM_OPTIONS_EXP', '��� ��� ���� ���� ��� ������.');
DEFINE ('_UDDEIM_OPTIONS_P', '���� ���� ���� ��� ������� ����� ����');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', '������ ����� ���� ����� ���� ������� ����� ����');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', '���� ������� ����� ���� ������ ���� (���� ������� ������ �� ���� �� ������� ����).');
DEFINE ('_UDDEADM_MAINTENANCE', '������');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', '��� ������ �� ������� ������');

DEFINE ('_UDDEADM_MAINTENANCE_CHECK', '����');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', '����');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', '������ ����� ����� ���� ��� ������� ��� ������� ���� �������. ����� ��� ����� �� �� ������ ���� ����� ����� ���� ����� ������ ��� ������ ����� ���� �� ������ .');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', '����...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (Username): [inbox|inbox trashed|outbox|outbox trashed]</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>���� �����: ������ ������ ����� ����� �� �������</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>����� ���� �����: ������ ������ ������ ����� �� �������, ��� ����� ������� ����� ���� �� ������� �����</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>���� ����: ������ ������ ����� ���� �� �������</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>����� ���� ����: ������ ������ ������ ���� �� �������, ��� ����� ������� ����� ����� �� ������� �����</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', '����...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', '<b>#$i �� ����� (from/to): $mvon/$man</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT2', '����� �� ������ ������� #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT3', '����� ������ ������� #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT4', '��� �� ������� ������� ������ #$i �������� ����� ���� �� ������� ������ ����� �� ������ #$i\'s <br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT5', '��� �� �� ������� ������� ������� #$i ���� #$i\'s ���� ���� ������ ����� �� �������<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>��� �� �����</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>����� ������</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', '���� �� �����');
DEFINE ('_UDDEADM_NAMESDESC', '���� �� ����� �� �� �����?');
DEFINE ('_UDDEADM_REALNAMES', '�� �����');
DEFINE ('_UDDEADM_USERNAMES', '�� �����');
DEFINE ('_UDDEADM_CONLISTBOX', '����� ��� �����');
DEFINE ('_UDDEADM_CONLISTBOXDESC', '���� �� ������ ��� ��� ����� �� ���� ����?');
DEFINE ('_UDDEADM_LISTBOX', '�� �����');
DEFINE ('_UDDEADM_TABLE', '����');

DEFINE ('_UDDEIM_TRASHCAN_INFO', '������� ����� ��� ������� ���� 24 ���� ���� ������ ����. �� ��� ����� ��� �� ������ ���� ����� ����');DEFINE ('_UDDEIM_TRASHCAN_INFO_1', '������� ����� ��� ������� ���� ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' ���� ���� ������ ����. �� ��� ����� ��� �� ������ ���� ����� ����');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', '������ ������ ������'); 
DEFINE ('_UDDEIM_COULDNOTRECALL', '����� ������ ����)');
DEFINE ('_UDDEIM_CANTRESTORE', '����� ������ ����, ����� ����� 24 ���� ������ �� ������');
DEFINE ('_UDDEIM_COULDNOTRESTORE', '������ ������ ����');
DEFINE ('_UDDEIM_DONTSEND', '�� ����');
DEFINE ('_UDDEIM_SENDAGAIN', '��� ���');
DEFINE ('_UDDEIM_NOTLOGGEDIN', '��� �� ����� ������');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>��� ������ �����</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>��� ������ �����</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>��� ������ ��� �������</strong>');
DEFINE ('_UDDEIM_INBOX', '���� ����');
DEFINE ('_UDDEIM_OUTBOX', '���� ����');
DEFINE ('_UDDEIM_TRASHCAN', '�� ������');
DEFINE ('_UDDEIM_CREATE', '������ �����');
DEFINE ('_UDDEIM_UDDEIM', '������ ������');
DEFINE ('_UDDEIM_READSTATUS', '����');
DEFINE ('_UDDEIM_FROM', '���');
DEFINE ('_UDDEIM_FROM_SMALL', '���');
DEFINE ('_UDDEIM_TO', '��� ��');
DEFINE ('_UDDEIM_TO_SMALL', '��� ��');
DEFINE ('_UDDEIM_OUTBOX_WARNING', '����� ���� ��� ���� �� �� ������� ����� ������ �� �����. ��� ���� ���� ����� ������ ���� �� ��� ����� �� ������. �� ���� �� ������ ������ ����, ���� ����� �� ������ �� ���� ����� ����. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', '��� ���');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', '��� ��� ����� ��');
DEFINE ('_UDDEIM_RESTORE', '����');
DEFINE ('_UDDEIM_MESSAGE', '�����');
DEFINE ('_UDDEIM_DATE', '�����');
DEFINE ('_UDDEIM_DELETED', '�����');
DEFINE ('_UDDEIM_DELETE', '���');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', '���');
DEFINE ('_UDDEIM_MESSAGENOACCESS', '������ �� �����. <br />����� �������:<ul><li>��� �� ������ ����� ����� ������ ���</li><li>�� ������ ��� ������</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>������ ���� ��� �������</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', '����� ��� ');
DEFINE ('_UDDEIM_MESSAGETO', '����� ����� ��� ���� ');
DEFINE ('_UDDEIM_REPLY', '��� �����:');
DEFINE ('_UDDEIM_SUBMIT', '���');
DEFINE ('_UDDEIM_DELETEREPLIED', '��� ����� ����� ������ ���� ������?');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', '�����: �� ����� ����, ������ �� �����');
DEFINE ('_UDDEIM_NOMESSAGE', '�����: ����� ����, ������ �� �����');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', '������ �����');
DEFINE ('_UDDEIM_MESSAGE_SENT', '������ �����');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' ������� ������� ���� ��� �������');
DEFINE ('_UDDEIM_NOSUCHUSER', '����� �� ����');
DEFINE ('_UDDEIM_NOTTOYOURSELF', '��� �� ���� ����� ����� �����');
DEFINE ('_UDDEIM_VIOLATION', '<b>����� �����</b> ���� ����� ���� ����� ��');
DEFINE ('_UDDEIM_PRUNELINK', '������ ����: �����');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM �����');
DEFINE ('_UDDEADM_GENERAL', '����');
DEFINE ('_UDDEADM_ABOUT', '�����');
DEFINE ('_UDDEADM_DATESETTINGS', '�����/���');
DEFINE ('_UDDEADM_PICSETTINGS', '��������');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', '��� ���� ����� ������ ������� (����)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', '��� ���� ����� ������ ��� ������ (����)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', '��� ���� ������ ������ ��� ������� (����)');
DEFINE ('_UDDEADM_DAYS', '����');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', '���� ��� ���� �� ������� <b>�������</b> ����� �������� ������ �����. I�� ��� �� ���� ����� ������ ��������, e���� ��� ����� ���� (������, 36524 ���� �� ��� ����). ��� �� ������ ����� ������ ���� �������� ������� �� ����� �� �� ������� .');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', '���� ��� ���� �� ������� <b>��� ������</b> �� ��� ������� ���� �����.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', '���� �� ���� ����� �� ������� ����� ��� �������. ��� ���� �1 �� ����. ������: ����� ������ ���� 3 ���� �� �����,0.125 ���� ���.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', '����� ���� ������');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', '��� �� ������ ����� ����� ��� �����. ������� ���� ������� ����� ���� ������� ��� ������� (�� ���� ��� ����� ����).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', '���� ����� ����');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', '������� ����� �� ���� ���� ����� �� ������. ��� �� ����� ������ ����� ������� �� ������. ���� ���� ����� ��������, �� ����� ������� ��� ������� ��� (�� ���� ��� ����� ����).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Deletion invoked by admin only');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'yes, by admins only');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'no, by any user');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatic deletions put a heavy weight on servers and databases. If you choose <i>yes,&nbsp;by&nbsp;admins&nbsp;only</i> automatic deletions according to the settings above (of all users\' messages) are invoked when any admin checks his or her inbox. Choose this option if an admin is checking the inbox around once a day or more often, which is the case at most sites. (If your site has more than one admin, it doesn\'t matter which of them logs in as deletions are automatically invoked by any admin.) At very small or rarely administered sites where admins rarely check their inboxes, choose <i>no,&nbsp;by&nbsp;any&nbsp;user</i>. If you do not understand this or do not know what to do, choose <i>no, by any user</i>.');
	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', '���� ������');
DEFINE ('_UDDEADM_THISHASBEENSAVED', '������� ����� ������ ����� ����������:');
DEFINE ('_UDDEADM_SETTINGSSAVED', '������� ������.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', '�����: ����� �����');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', '���� �� ������ �� ������� ����� ��� �� �� ����� ���� ��� �����.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', '������: ����� �����');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', '���� �� ������ �� ������� ����� ��� �� �� ����� ���� ��� �����.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', '������: ����� �������');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', '���� �� ������ �� ������� ��� ���� ���� ����� �������.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', '������: ����� ��� ������');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', '���� �� ������ �� ������� ��� ���� ���� ����� ��� �������.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', '����: ������ ����� ����');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', '������ ��� �������� ������ mod_uddeim_new. ���� �� ������� �� ������� ��� ������ ��� ���� ���� �� ����� ����.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM �����');
DEFINE ('_UDDEADM_FINISHED', '������ ������. ������ ����� � uddeIM 0.4 (beta). ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">��� �� ���� ����� �����. �� ���� ������ � uddeIM.</span><br /><br />�� ���� ������ <a href="http://www.mambojoe.com">���� ������</a>.');
DEFINE ('_UDDEADM_CONTINUE', '����');
DEFINE ('_UDDEADM_PMSFOUND_1', '�� ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' ������ ����� myPMS. ��� ��� ���� ����� ���� �uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', '�� �� ���� �� ������� ����� myPMS �� �� ������ ���. �� ����� �����. ��� ���� ������� ����� ���� ����� uddeIM, ����� �� ����� ������ ������ ����� myPMS. (��� ���� ����� �� ������� ���� ���� ����� �� ������!) ������ ��� �� ��� ��� ������ �� ������ uddeIM ����� �����.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', '���� �� ������� ��� �� ����� myPMS ����� uddeIM �����');
DEFINE ('_UDDEADM_IMPORT_NO', '��, �� ����� ������ ���');  
DEFINE ('_UDDEADM_IMPORTING', '��� ���� �������� ������.');
DEFINE ('_UDDEADM_IMPORTDONE', '���/�� ����� ������ ����� myPMS. �� ���� �� ������ ������ ��� ��� ��� ���� ��� �� ������� �������� ����� ������.'); 
DEFINE ('_UDDEADM_IMPORT', '����');
DEFINE ('_UDDEADM_IMPORT_HEADER', '���� ������ ����� myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', '�� ����� �� ����� ����� myPMS . ������ �� �����.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">��� ��� ����� �� �� ������� ����� myPMS ����� uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', '������');
DEFINE ('_UDDEIM_YOUAREBLOCKED', '������ �� ����� - ������ ��� ����');
DEFINE ('_UDDEIM_BLOCKNOW', '����&nbsp;�����');
DEFINE ('_UDDEIM_BLOCKS_EXP', '����� ������� ��� ����, ������� ��� ���� ������ ����� �� ������');
DEFINE ('_UDDEIM_NOBODYBLOCKED', '��� ������� ������');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'You have currently blocked ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' �����/��.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[��� �����]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', '�� ����� ���� ���� ����� �� �����, ���/��� ������� ��� ������ �������� �� ������.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', '������� ������ �� ����� ����� ����� ����.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', '�� ���� ����� ����.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', '���� ����� �����');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', '���� �����, ������� ����� ����� ������� �����. ����� ���� ���� ���� ����� ����� ������ ���� ����. �� ���� ����� ����.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', '��');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', '��');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', '������� ������ ����� �����');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', '�� �����  <i>��</i>, ������� ������ ����� ����� ������� ����� �� ������ ���� ������� ��� �� ���� �� ������ ��� ����. �� ����� <i>��</i>, ������ ����� �� ���� �� ����� ������� ��� �� ������.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', '��');
DEFINE ('_UDDEADM_BLOCKALERT_NO', '��');
DEFINE ('_UDDEIM_BLOCKSDISABLED', '����� ������ �� ������');
// DEFINE ('_UDDEADM_DELETIONS', '������'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', '�����'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', '�����');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', '�����');
DEFINE ('_UDDEADM_EMAIL', '���� ��������');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', '���� ����� ����� �����');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', '���� ����� <i>��</i>, �� �� ����� ����� ����� uddeIM ���� ����� ������ ��� ����� ������.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', '���� �� ������ ����� ������');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', '���� ����� <i>��</i>, t������ �� �� ����� ���� ���� ����� �� ������ (����� ��� �� �� ������ ����� ������ ����� ������).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', '���� ��� �����');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', '���� ����� <i>��</i>, uddeIM ���� �� ����� �� ������ ��� ���� ����� �� ������ ����� �� �����. ��� ���� ������ �� ������� ��� ������ ����.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', '���� ����� ����� ��������');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', '���� ����� <i>��</i>, �� ����� ���� ����� �� ��� ���� ���� ����� �� �� �� ��� ������ ���� ����� ����� ����� ��� .');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', '����� �������� ����� �� ������');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', '���� ����� <i>��</i>, ����� �������� ��� �� ��� �� ������ ������ ���� ��� ����� �� ������ ����.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', '����� ����� �������� �� ����� ��� ������');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', '������ �� ���� - ������ �������� ��� - ���� �������� ������ ��� ��� ����� ��� �� ����� ����� ���� ��� (���� ���� ���). ������ ��� �� ������ ������� �� \'���� ����� ����� ��������\'. �� ��� �� ���� ����� �� ���� �������� ����, ��� ���� ���� �� �����.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', '���� ��� ���� ����� ����� ����� �������� �� ����� ��� ������');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', '�� ������ �� ����� ����� ����� �������� �� ����� ��� ������ ������ <i>��</i>, ���� ��� ���� ��� ���� ����� �� ������ ����� ��������� �� ����� ��� ������.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', '���� ����� ������');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', '��� ���� ��� ����� ������� ���� ����� ������, ���� ���� ��� �������.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', '���� ������� ������');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', '���� ��� �� ����� �������� �� ������. �� �������� ���� ���� ������ ���� ����� ��. ���� \'0\' ���� ��� ���� �� ����� ����� ������ (�� �����).');
DEFINE ('_UDDEADM_YES', '��');
DEFINE ('_UDDEADM_NO', '��');
DEFINE ('_UDDEADM_ADMINSONLY', '������ ����');
DEFINE ('_UDDEADM_SYSTEM', '�����');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', '���� ������� �� ������ ������');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM ���� ������� �����. ��� ��� �� ����� �� ���� ����� ����� ���� ����\�� ���� ������ ����� �����. ���� ��� �� ������� ������� ����� ���� �� ������ ����� (������ <i>�����</i> �� <i>����</i> or <i>���� ������</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', '���� ����� ����� ������ ������');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM ���� ������� ������. �� ������� ��� ������ ����. ����� ��� �������.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', '�� ����� ����� ��������');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', '���� �� ��� ��� ����� ����� �������� ����� ���� (������ <i>��� �� ���� ���</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', '����� ���� �������� �����');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', '���� �� ������ ���� ��� ����� ����� �������� ����� ���� (�� ���� ����� ������ ������ �� ���� ���');
DEFINE ('_UDDEADM_VERSION', 'uddeIM �����');
DEFINE ('_UDDEADM_ARCHIVE', '������'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', '���� ������');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', '��� ��� ��� ����� �������� ����� ������� �� ��. ������ ������� �� �������.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', '������� ������ ������ �������');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', '���� ��� ������ ���� �� ����� ����� ������� ��� (������� ��� �����).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', '���� ���� ����');
DEFINE ('_UDDEADM_COPYTOME_EXP', '���� �������� ���� ���� ������� ��� ������. ����� ����� ����� �����.');
DEFINE ('_UDDEADM_MESSAGES', '������');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', '��� ����� �� ������ �������');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', '���� ������ ��� ������, �� ���� ���� ����� ��� ����� \'���\' ����� ���� ����� \'��� ����� ������\' �� ����� ��� ������ ����. ����� ���, ������ ����� ������ ����� ������ ��� ������� ���� ������ �����. ������� ���� ����� �� ���� ������ ��� ����. ������� ������ ���� �� ������ ������� �� ������ ������� ����� ������.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', '������ ��� ����');	
DEFINE ('_UDDEADM_PERPAGE_EXP', '���� ��� �� ���� ������� ������ ��� ���� ����� �����, ���� ����, �� ������ �� ������.');
DEFINE ('_UDDEADM_CHARSET_HEAD', '����� ������');
DEFINE ('_UDDEADM_CHARSET_EXP', '�� �������� ��� �� ����� ����� �� ����� �� �����, ��� ���� ������ �� ������ �uddeIM ����� �� ����� �� ���� ������ ���� HTML. <b>�� ��� �� ���� �� ������ �� ��, �� ���� �� ���� ����� ����!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', '����� ������ ���� ��������');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', '�� �������� ��� �� ����� ����� �� ����� �� �����, ��� ���� ������ �� ������ �uddeIM ����� �� ����� ���� ���� ��������. <b>�� ��� �� ���� �� ������ �� ��, �� ���� �� ���� ����� ����!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', '�� ����� �� ����� �������� ������� ����� ���� ������� ����� ���. ����� �� ������ �� ����� ����� ��������. ���� �� ������� %you%, %user% � %site% ���. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', '�� ����� �� ����� �������� ������� ����� ���� ������� ����� ���. ����� �������� ��� ����� �� ������ ����.���� �� ������� %you%, %user%, %pmessage% � %site% �����. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', '�� ����� �� ����� �������� �������� ����� ���� ����� ����� ������� �� ����� ��� ������. ���� �� ������� %you% � %site% �����. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', '���� �������� ������ �� ������ �������� �� ��� ������ ����� ��������� ����.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', '���� �����');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', '�� ����� �� ������ �������� ����� ���� �� ������ �� ������� ���� ��������. ���� �� ������� %user%, %msgdate% � %msgbody% �����. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', '���� ����� �� ����� ������');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', '��� ���� ����� �� ���� ������� ����� ������ �������� ������ ����� ������ ����� �������. ����� ���, ����� �� ������� ����� ������ �������� ���� �� ���� �� �� ������ ����. ������ ����, ��� ���� ������ �� ���� ������� ����� ����� �� ��� �������. ����� ���, �������� �� ���� ����� ���� ������ ����� ����� ���� ��� ������. �� �� ����� ����� �������, �� �� ����� ���� ����� ������ �� ����� ����� ���� �� ��� ����� ������ ����� ������ ������ ���� �� �������� ����� ����. (������� ����� ����� ���� ������ ������ ���� ��� �� ����� �� �����.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', '���� �� ������ ������ ����� ���������');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', '���� ��� ������ ��� �� ������ (���� ������ ���� ��) ����� ���� ����� ������.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', '��� ����� �� �������. �� ��� ���� ����� �� ������� ������� ��� �������?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', '���� ����');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', '���� ���� ������� (����� �� ���� ���� ����� ��� ����� ����� ������ �������).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', '���� ����� �����');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', '������ �������� ������ ����� �����');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', '������� ������ ����� ������ �� �� ����� (�� ��� ������� �� �� ����� ��� ����� ����� ������ ).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', '��� ���� ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' ����. 0=����� (��� ����� ��������)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[��� ����� ����� �� ����� �����]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[��� ����� ����� (��������)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', '������ ����� �� ����� ����� �� ������.');
DEFINE ('_UDDEIM_SYSGM_TYPE', '��� �� ������');
DEFINE ('_UDDEIM_HELPON_SYSGM', '���� ���� ����� �����');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(��� ����� ���)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', '��� ���� ����� �� ������ ����. ��� ���� ���� ����� �� ����!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', '����� � <strong>�� ��������</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', '����� � <strong>�� �������</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', '����� � <strong>�� �������� ��������</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', '������� �� ����� ����� ������ ���.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', '������ ������ �� <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> ��� �� �����');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', '������ ������� ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', '������ �� �������');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>���� �� ������ (�� ��� ����� ����) ���� �����!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', '����� <strong>������� ����� ����</strong>:<br /> [b]<strong>�����</strong>[/b] [i]<em>����</em>[/i]<br />
[url=http://www.someurl.com]������ �������[/url] �� [url]http://www.someurl.com[/url] �������');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', '�����: �� ������ ������. ������ �� ������.');		
		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', '��� �� ���� ����� ������ ���.');
DEFINE ('_UDDEIM_EMNOFF', '������ ����� �������� ����. ');
DEFINE ('_UDDEIM_EMNON', '������ ����� �������� ����. ');
DEFINE ('_UDDEIM_SETEMNON', '[���� ����]');
DEFINE ('_UDDEIM_SETEMNOFF', '[��� ����]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', '���� %you%, 

%user% ��� �� ����� ����� ���� %site%.
��� ����� ���� ����� �� ������!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', '���� %you%, 

%user% ��� �� �� ������ ���� ���� %site%.
��� ����� ���� ����� ������!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', '���� %you%,

�� �� ������ ����� ���� %site%.
��� ����� ���� ����� �� �������! 
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', '�� �� ����� ���� %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', '��� ����� ����� (=����� ������ �� ����� �����)');
DEFINE ('_UDDEIM_SEND_TOALL', '��� ��� �����');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', '��� ��� �������');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', '��� ��� �������� ��������');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', '����� ���� �����: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', '������ �� �����.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', '������ ������ ������� �����.');
DEFINE ('_UDDEIM_ARC_SAVED_1', '������ ������ ������� ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>�� ���� �� ����� ������� �����.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' ������');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', '�� �� ����� ����� ���');
DEFINE ('_UDDEIM_ARC_SAVED_3', '����� ������, ��� ���� ����� ������ ����� ����.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', '��� ���� ����� ������� ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' ������.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', '�� �� ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' ������');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', '�������');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', '����� �����');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', '���� ����� �������� ');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', '������� ����� ��� ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', '��� ���� ���� ���� ������ ������ ���� ��� �� ���� �� ����� ��� ����� ����� ���� �� ������ ������ �����');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', '������ ������: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(���������. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', '����� ������ �������.');
DEFINE ('_UDDEIM_STORE', '������');
		// translators info: as in: '���� ����� ��� ������� �����'

DEFINE ('_UDDEIM_BACK', '����');

DEFINE ('_UDDEIM_TRASHCHECKED', '��� �������');
	// translators info: plural!
	
DEFINE ('_UDDEIM_SHOWALL', '���� ���');
	// translators example "���� �� �� �������"
	
DEFINE ('_UDDEIM_ARCHIVE', '������');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', '������� ���. ������ �� ������.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', '�� ������ ������.');
DEFINE ('_UDDEIM_THISISACOPY', '���� ������ ����� � ');
DEFINE ('_UDDEIM_SENDCOPYTOME', '��� �� ����');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', '��� ���� �������');
DEFINE ('_UDDEIM_TRASHORIGINAL', '��� �� ������ �������');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', '���� �����');
DEFINE ('_UDDEIM_EXPORT_MAILED', '����� ������ ����� ����� ��������');
DEFINE ('_UDDEIM_EXPORT_NOW', '���� ���� ������� ������');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', '����� ��� ���� �� ������ ������ ���.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', '���� ���� ����� ���� ����� �� ������ ���.');

DEFINE ('_UDDEIM_LIMITREACHED', '����� �����! �� �����.');

DEFINE ('_UDDEIM_WRITEMSGTO', '���� ����� � ');

$udde_smon[1]="�����";
$udde_smon[2]="������";
$udde_smon[3]="���";
$udde_smon[4]="�����";
$udde_smon[5]="���";
$udde_smon[6]="����";
$udde_smon[7]="����";
$udde_smon[8]="������";
$udde_smon[9]="������";
$udde_smon[10]="�������";
$udde_smon[11]="������";
$udde_smon[12]="�����";

$udde_lmon[1]="�����";
$udde_lmon[2]="������";
$udde_lmon[3]="���";
$udde_lmon[4]="�����";
$udde_lmon[5]="���";
$udde_lmon[6]="����";
$udde_lmon[7]="����";
$udde_lmon[8]="������";
$udde_lmon[9]="������";
$udde_lmon[10]="�������";
$udde_lmon[11]="������";
$udde_lmon[12]="�����";

$udde_lweekday[0]="�����";
$udde_lweekday[1]="���";
$udde_lweekday[2]="�����";
$udde_lweekday[3]="�����";
$udde_lweekday[4]="�����";
$udde_lweekday[5]="����";
$udde_lweekday[6]="���";

$udde_sweekday[0]="�����";
$udde_sweekday[1]="���";
$udde_sweekday[2]="�����";
$udde_sweekday[3]="�����";
$udde_sweekday[4]="�����";
$udde_sweekday[5]="����";
$udde_sweekday[6]="�����";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM �����');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', '��� �� ������ ���� ���� ������ �� �uddeIM ');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', '���� �����');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', '��� <i>��</i> �� �� �� ���� ����� ���� ���� ����� ��� ����� ���� �� ������ ��� ���� ���� ����� ���.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', '���� ������');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', '������ ������� ����� �uddeIM �� ����� ����� ��������� �� ����� ������� ����� ���� . �� ��� �� ���� �� ��, ��� ���� ���� �� �� ���. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', '��, ������');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', '���� ��� bb ');
DEFINE ('_UDDEADM_FONTFORMATONLY', '����� ������ ����');
DEFINE ('_UDDEADM_ALLOWBB_EXP', '����� <i>����� ������ ����</i> ����� �������� ������ ��� bb ���� �����, ����, �� �����, ��� ����� ����. ���� ����� �� ������� �� <i>��</i>, ������� ����� ������ <strong>���</strong> ���� BB ������ ������� ���� (����� ������� �������).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', '���� ���� �����');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', '���� ����� <i>��</i>, ��� ����� ��� :-) ����� ����� ������ ������. ��� �� ����� ��� ���� ����� ����� �� ���� ���� ����� ������.');
DEFINE ('_UDDEADM_DISPLAY', '���');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', '���� ������ ������');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', '���� ����� <i>��</i>, ������ ��������� ����� �� ������ ����.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', '����� �����');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', '���� �� ������ �� ����� ����� �������, ������ \'������ ������\'. ���� ��� �� ��� �� ���� ����� ����� �����.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', '���� ����� �����');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', '���� <i>��</i> ������ ����� ������ ������ ������ uddeIM. ������ ���� ������ uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', '���� ���� ��������');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', '��� ���� ��� ����� ����� uddeIM ����� ����� ���� �������� (����� ����� �������� ������ �� ����� ����� ��� ������) ��� ������� ��������\' ������, ������ ��� ������� �� ����. �� ��� �� ���� �� ������ ���� �� ���, ���� �� �� ������� ���� <i>��</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', '�����');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', '����� ������� ������');
DEFINE ('_UDDEADM_GETPICLINK_EXP', '���� <i>��</i> �� ��� ���� ����� �� ������ ������� �� ������ ������ ������� (���� �����, ���� ����, ������.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', '��� �������');
DEFINE ('_UDDEIM_CONNECTIONS', '������ ���');
DEFINE ('_UDDEIM_SETTINGS', '������');
DEFINE ('_UDDEIM_NOSETTINGS', '��� ������ �����');
DEFINE ('_UDDEIM_ABOUT', '�����'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', '����� ����'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', '����� ����� ��������');
DEFINE ('_UDDEIM_EMN_EXP', '��� ���� ���� ����� ����� �������� �� ��� ����� ����� ����.');
DEFINE ('_UDDEIM_EMN_ALWAYS', '��� �� ����� ����� �������� �� ��� ���� ���� ����� ����');
DEFINE ('_UDDEIM_EMN_NONE', '�� ���� �� ����� ����� �������� ');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', '��� ����� ����� �������� �� ��� ���� �� �����');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', '�� ���� �� �� ����� �� ������� ����� ���������');
DEFINE ('_UDDEIM_BLOCKSYSTEM', '������� ������'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', '��� ���� ����� ������� �������� ������ �� ������ ������. ��� <i>���� �����</i> ���� ��� ���� ����� ������� �����.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', '���� �������');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', '�����');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', '����');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', '�� �����');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', '����.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', '����.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', '����.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', '���� ��� 1');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', '���� ��� 2');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', '���� ��� 3');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', '���� ��� 4');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', '���� ����� ������');
DEFINE ('_UDDEIM_TOOLTIP_URL', '���� ����� �������. �� ���� ������ http:// ������ ������.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', '���� �� �� ����� BB �������.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' ����� �'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>��� �� ������ �������.</strong>');
