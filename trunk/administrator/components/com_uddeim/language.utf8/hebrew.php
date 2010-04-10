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
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'הגדר קידוד קובץ התרגום');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'בדרך כלל <strong>ברירת מחדל</strong> (ISO-8859-1) בגירסה העכשוית של גומלה 1.0 וקידוד <strong>UTF-8</strong> בגומלה 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'ברירת מחדל');
DEFINE ('_UDDEIM_READ_INFO_1', 'הודעות שניקראו ישארו בדואר ניכנס ');
DEFINE ('_UDDEIM_READ_INFO_2', ' ימים מקסימום. לפני שימחקו אוטומטית.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'הודעות שלא נקראו ישאו בדואר ניכנס ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' ימים מקסימום. לפני שימחקו אוטומטית.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'הודעות שנשלחו ישארו בדואר יוצא ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' ימים מקסימום. לפני שימחקו אוטומטית.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'הראה הודעה בדואר ניכנס על מחיקת הודעות שנקראו');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'הראה הודעה בדואר ניכנס "הודעות שנקראו ימחקו תוך n ימים"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'הראה הודעה בדואר ניכנס על מחיקת הודעות שלא נקראו');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'הראה הודעה בדואר ניכנס "הודעות שלא שנקראו ימחקו תוך n ימים""');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'הראה הודעה בדואר יוצא על מחיקת הודעות שנשלחו');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'הראה הודעה בדואר יוצא "הודעות שנשלחו ימחקו תוך n ימים"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'הראה הודעה בסל מחזוק על מחיקת הודעות');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'הראה הודעה בסל מחזוק "הודעות בסל מחזור ימחקו אחרי n ימים"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'השאר הודעות שנשלחו(ימים)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'הכנס את המספר ימים עד <b>שהודעות שנשלחו</b> ימחקו אוטומטית מדואר היוצא.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'שלח לכל המשתמשים המיוחדים (מנהלים)');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'הודעה <strong>לכל המשתמשים המיוחדים (מנהלים)</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- בחר שם משתמש -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- בחר שם -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'ערוך הגדרות משתמש');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'קיים');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'לא קיים');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- בחר ערך -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- בחר התראה -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- בחר חלון קובץ -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'שם משתמש');
DEFINE ('_UDDEADM_USERSET_NAME', 'שם');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'התראה');
DEFINE ('_UDDEADM_USERSET_POPUP', 'חלון קובץ');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'גישה אחרונה');
DEFINE ('_UDDEADM_USERSET_NO', 'לא');
DEFINE ('_UDDEADM_USERSET_YES', 'כן');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'לא ידוע');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'כאשר לא זמין (חוץ מתשובות)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'תמיד (חוץ מתשובות)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'כאשר לא זמין');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'תמיד');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'בלי התראות');
DEFINE ('_UDDEADM_WELCOMEMSG', "ברוך הבא למערכת מסריפ פנימית uddeIM!\n\nהצלחת בהצלחה להתקין את מערכת מסרים פנימית uddeIM.\n\nנסה לראות את ההודעה הזאת בכמה תבניות. אתה יכול להגדיר אותם בפנאל הניהול של המערכת מסרים פנימית uddeIM.\n\nuddeIM היא פרויקט בפיתוח. אם אתה מוצא באגים או פרצות אבטחה, בבקשה כתוב לי אותם בכדי שנוכל לעשות את uddeIM טובה יותר ביחד.\n\nבהצלחה ותעשה חיים!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'התקנת מערכת מסרים פנימית uddeIM הושלמה בהצלחה.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'אנא תמשיכו לפאנל הניהול של המערכת ותבדקו את ההגדרות.');
DEFINE ('_UDDEADM_REVIEWLANG', 'אם אתה מריצים את מערכת ניהול התוכן בקידוד אחר מ ISO 8859-1 תוודא שההגדרות בהתאם.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'אחרי ההתקנה, התראות למיילים במערכת מסרים פנימית uddeIM (התראות למייל, וכדומה) לא מאופשרות ככה כל עוד אתה בניסיונות לא נישלחים כלל אימיילים. אל תשכח לבטל את האופציה "עצור אימיילים" בצד הקידמי שאתה מסיים.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'מקסימום נמענים');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'מקסימום מספר נמענים שמותר לשלוח להם בהודעה אחת (0=אין הגבלה)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'נמענים מעל המותר');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'שליחת אימיילים לא פעילה.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'השלמה אוטומטית בתוך הטקסט ');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'השלמה אוטומטית של חיפוש בתוך הטקסט (אחרת זה יחפש מההתחלה בלבד)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'מצב קישור "כל המשתמשים"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'בחר עם קישור "כל המשתמשים" צריך להיות מוסתר , מוצג או אם תמיד כל המשתמשים צריך להיות מוצג.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'הסתר את הקישור "כל המשתמשים"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'הראה את קישור "כל המשתמשים"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'תמיד מוצג קישור כל המשתמשים');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'קובץ הקונפיגרציה לא ניתן לכתיבה:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'קובץ הקונפיגציה ניתן לכתיבה:');
DEFINE ('_UDDEIM_FORWARDLINK', 'העבר');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'נמען נימצא');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'נימענים נמצאו');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (ברירת מחדל)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'מערכת דואר');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'בחר מערכת דואר שמערכת מסרים פנימית uddeIM צריכה לשלוח דרכו התראות.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'הראה קבוצות מגומלה');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'הראה קבוצות גומלה ברשימה הודעה כללי.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'העברה של הודעות');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'אפשר העברת הודעות.');
DEFINE ('_UDDEIM_FWDFROM', 'הודעה מקומית מ');
DEFINE ('_UDDEIM_FWDTO', 'ל');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'הסר הודעה מהארכיון');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'לא יכול להסיר הודעה מהארכיון');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'אפשר נמענים מרובים');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'אפשר נמענים מרובים (מופרדים בפסיק ,).');
DEFINE ('_UDDEIM_CHARSLEFT', 'תווים שנשארו');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'הראה מציג תווים שנישארו');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'הראה מציג תווים שנישארו אשר יציג מספר תווים שנישארו לכתיבה בהודעה.');
DEFINE ('_UDDEIM_CLEAR', 'נקה');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'לצרף משתמשים מסומנים לנמענים');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'זה מאשפר לצרף נמענים מרובים מרשימת "כל המשתמשים".');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'צרף חברים מסומנים לנמענים');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'זה מאפשר לבחור נמענים מרובים מרשימה "החברים".');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS found: ');
DEFINE ('_UDDEIM_ENTERNAME', 'הכנס שם');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'השתמש בהשלמה אוטומטית');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'השתמש בהשלמה אוטומטית למציאת השם.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'סיסמה להצפנת ההודעה');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'הכנס סיסמה להצפנת ההודעה. אל תשנה את הערך אחרי שהצפנת ההודעה הופעלה.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'נמצאה טעות בקובץ קונפיגרציה!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'נמצאה גירסה:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'גירסה צפויה:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'מעביר הגדרות קונפיגרציה...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'סיים!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'טעות קריטית: ניכשל בכתיבה לקובץ הקונפיגרציה:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'הודעה מקודדת! - הורדה לא אפשרית!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'סיסמה שגויה! - הורדה לא אפשרית!');
DEFINE ('_UDDEIM_WRONGPW', 'סיסמה שגויה! - אנא צור קשר עם מנהל!');
DEFINE ('_UDDEIM_WRONGPASS', 'סיסמה שגויה!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'טעות בתאריכי הסל אשפה (דואר נכנס/דואר יוצא): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'תיקון טעות תאריכי סל האשפה');
DEFINE ('_UDDEIM_TODP', 'ל: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'נקה הודעות עכשיו');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'הראה סמלוני פעולה');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'הגדר <i>כן</i>, שקישורים לפעולה מסויימת יופיעו עם סמלון.');
DEFINE ('_UDDEIM_UNCHECKALL', 'בטל סימון מכולם');
DEFINE ('_UDDEIM_CHECKALL', 'סמן הכל');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'הראה סמלונים בתחתית');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'הגדר <i>כן</i>, בכדי שקישורים בתחתית יופיעו עם סמלונים ליד.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'השתמש בסמלי אנימציה');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'השתמש בסמלי אנימציה במקום סמלים סטטים.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'עוד סמלי אנימציה');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'הראה עוד סמלי אנימציה.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'הודעה מקודדת - נידרשת סיסמה');
DEFINE ('_UDDEIM_PASSWORD', '<strong>נידרשת סיסמה</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'סיסמה');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (טקסט מקודד)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (טקסט מקודד)');
DEFINE ('_UDDEIM_MORE', 'עוד');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'דואר ניכנס');
DEFINE ('_UDDEMODULE_NONEW', 'אין הודעות חדשות');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'הודעות חדשות: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'הודעה');
DEFINE ('_UDDEMODULE_MESSAGES', 'הודעות');
DEFINE ('_UDDEMODULE_YOUHAVE', 'יש לך');
DEFINE ('_UDDEMODULE_HELLO', 'שלום');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'הודעה מהירה');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'השתמש בהצפנה');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'הצפנת הודעות מאוחסנות');
DEFINE ('_UDDEADM_CRYPT0', 'ללא');
DEFINE ('_UDDEADM_CRYPT1', 'להצפין הודעות');
DEFINE ('_UDDEADM_CRYPT2', 'הצפנת הודעות - עדיין לא מיושם');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'ברירת מחדל עבור עידכונים למייל');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'הערך ברירת מחדל עבור עידכונים למייל (עבור משתמשים שעדיין לא שינו את ההגדרות שלהם).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'אל תשלח עידכון למייל');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'תמיד תשלח');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'תשלח עדכונים רק במצב מנותק');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'הצג קישור "כל השתמשים"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'הצג קישור "כל המשתמשים" בדף הודעה חדשה (עוזר במצב שיש הרבה משתמשים רשומים).');
DEFINE ('_UDDEADM_POPUP_HEAD','עידכונים בחלון קופץ');
DEFINE ('_UDDEADM_POPUP_EXP','הראה חלון קופץ מתי שהתקבלה הודעה חדשה (צריך לעדכן את המודול mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', 'עוד הגדרות');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'כאן אתה יכול לעצב עוד הגדרות.');
DEFINE ('_UDDEIM_OPTIONS_P', 'הראה חלון קופץ מתי שמתקבלת הודעה חדשה');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'הגדרות ברירת מחדל לחלון קופץ שמתקבלת הודעה חדשה');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'אפשר תיזכורת בחלון קופץ כברירת מחדל (עבור משתמשים שעדיין לא שינו את ההגדרות שלהם).');
DEFINE ('_UDDEADM_MAINTENANCE', 'תחזוקה');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'מחק הודעות של משתמשים מחוקים');

DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'בדוק');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'אשפה');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', 'שמשתמש נימחק מהאתר בדרך כלל ההודעות שלו נישמרות במסד הנתונים. פעולה זאת בודקת עם יש הודעות כאלה שאפשר למחוק וכדי למחוק הודעות אלה לפעילה תקינה יותר של המערכת .');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', 'בודק...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (Username): [inbox|inbox trashed|outbox|outbox trashed]</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>דואר ניכנס: הודעות הוחסנו בדואר ניכנס של משתמשים</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>מחיקת דואר ניכנס: הודעות נימחקו מהדואר ניכנס של משתמשים, אבל עדיין נימצאים בדואר יוצא של משתמשים אחרים</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>דואר יוצא: הודעות הוחסנו בדואר יוצא של משתמשים</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>מחיקת דואר יוצא: הודעות נימחקו מהדואר יוצא של משתמשים, אבל עדיין נימצאים בדואר ניכנס של משתמשים אחרים</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', 'מוחק...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', '<b>#$i לא נימצא (from/to): $mvon/$man</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT2', 'למחוק את העדפות מהמשתמש #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT3', 'למחוק חסומים מהמשתמש #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT4', 'מחק את ההודעות שנישלחו למשתמש #$i שנימצאים בדואר יוצא של השולחים ובדואר ניכנס של המשתמש #$i\'s <br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT5', 'מחק את כל ההודעות שנישלחו מהמשתמש #$i בתוך #$i\'s דואר יוצא ובדואר ניכנס של המקבלים<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>אין מה לעשות</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>מחיקה נידרשת</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'הראה שם אמיתי');
DEFINE ('_UDDEADM_NAMESDESC', 'הראה שם משתמש או שם אמיתי?');
DEFINE ('_UDDEADM_REALNAMES', 'שם אמיתי');
DEFINE ('_UDDEADM_USERNAMES', 'שם משתמש');
DEFINE ('_UDDEADM_CONLISTBOX', 'חברים בתא בחירה');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'הראה את החברים שלי בתא בחירה או בתוך טבלה?');
DEFINE ('_UDDEADM_LISTBOX', 'תא בחירה');
DEFINE ('_UDDEADM_TABLE', 'טבלה');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'ההודעות ישארו בסל המיחזור למשך 24 שעות לפני שימחקו כליל. על מנת לקרוא שוב את ההודעה עליך לשחזר אותה');DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'ההודעות ישארו בסל המיחזור למשך ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' שעות לפני שימחקו כליל. על מנת לקרוא שוב את ההודעה עליך לשחזר אותה');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'ההודעה שוחזרה בהצלחה'); 
DEFINE ('_UDDEIM_COULDNOTRECALL', 'שחזור ההודעה נכשל)');
DEFINE ('_UDDEIM_CANTRESTORE', 'שחזור ההודעה נכשל, ייתכן ועברו 24 שעות ההמתנה של ההודעה');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'שיחזור ההודעה נכשל');
DEFINE ('_UDDEIM_DONTSEND', 'אל תשלח');
DEFINE ('_UDDEIM_SENDAGAIN', 'שלח שוב');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'אתה לא מחובר למערכת');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>אין הודעות חדשות</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>אין הודעות חדשות</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>אין הודעות בסל המיחזור</strong>');
DEFINE ('_UDDEIM_INBOX', 'דואר נכנס');
DEFINE ('_UDDEIM_OUTBOX', 'דואר יוצא');
DEFINE ('_UDDEIM_TRASHCAN', 'סל מיחזור');
DEFINE ('_UDDEIM_CREATE', 'הודעות חדשות');
DEFINE ('_UDDEIM_UDDEIM', 'הודעות פרטיות');
DEFINE ('_UDDEIM_READSTATUS', 'נקרא');
DEFINE ('_UDDEIM_FROM', 'מאת');
DEFINE ('_UDDEIM_FROM_SMALL', 'מאת');
DEFINE ('_UDDEIM_TO', 'שלח אל');
DEFINE ('_UDDEIM_TO_SMALL', 'שלח אל');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'הדואר יוצא שלך מכיל את כל ההודעות ששלחת ועדיין לא נמחקה. אתה יכול לבטל הודעה מהדואר יוצא עם היא עדיין לא ניקראה. אם תמחק את ההודעה מהדואר יוצא, האדם שקיבל את ההודעה לא יוכל לקרוא אותה. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'שלח שוב');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'שלב שוב הודעה זו');
DEFINE ('_UDDEIM_RESTORE', 'שחזר');
DEFINE ('_UDDEIM_MESSAGE', 'הודעה');
DEFINE ('_UDDEIM_DATE', 'תאריך');
DEFINE ('_UDDEIM_DELETED', 'נמחקה');
DEFINE ('_UDDEIM_DELETE', 'מחק');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'מחק');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'ההודעה לא מוצגת. <br />סיבות אפשריות:<ul><li>אין לך הרשאות לקרוא הודעה ספיצית זאת</li><li>או שהודעה זאת נימחקה</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>ההודעה עברה לסל המיחזור</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'הודעה מאת ');
DEFINE ('_UDDEIM_MESSAGETO', 'הודעה נשלחה ממך עבור ');
DEFINE ('_UDDEIM_REPLY', 'השב לשולח:');
DEFINE ('_UDDEIM_SUBMIT', 'שלח');
DEFINE ('_UDDEIM_DELETEREPLIED', 'האם למחוק הודעה מקורית לאחר התגובה?');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'שגיאה: לא צויין נמען, ההודעה לא נשלחה');
DEFINE ('_UDDEIM_NOMESSAGE', 'שגיאה: הודעה ריקה, ההודעה לא נשלחה');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'התגובה נשלחה');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'ההודעה נשלחה');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' וההודעה המקורית עברה לסל המיחזור');
DEFINE ('_UDDEIM_NOSUCHUSER', 'משתמש לא קיים');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'אתה לא יכול לשלוח הודעה לעצמך');
DEFINE ('_UDDEIM_VIOLATION', '<b>שגיאת הרשאה</b> אינך מורשה לבצע פעולה זו');
DEFINE ('_UDDEIM_PRUNELINK', 'מנהלים בלבד: משעמם');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM ניהול');
DEFINE ('_UDDEADM_GENERAL', 'כללי');
DEFINE ('_UDDEADM_ABOUT', 'אודות');
DEFINE ('_UDDEADM_DATESETTINGS', 'תאריך/שעה');
DEFINE ('_UDDEADM_PICSETTINGS', 'אייקונים');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'כמה ימים לשמור הודעות שניקראו (ימים)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'כמה ימים לשמור הודעות שלא ניקראו (ימים)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'כמה ימים להשאיר הודעות בסל המיחזור (ימים)');
DEFINE ('_UDDEADM_DAYS', 'ימים');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'הכנס כמה ימים עד שהודעות <b>שניקראו</b> ימחקו אוטומטית מהדואר ניכנס. Iאם אתה לא רוצה למחוק הודעות אוטומטית, eהכנס ערך לימים גבוה (לדוגמא, 36524 ימים זה מאה שנים). אבל קח בחשבון שהמסד נתונים יכול להתמלאות במהירות עם תשמור את כל ההודעות .');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'הכנס כמה ימים עד שהודעות <b>שלא ניקראו</b> על ידי המקבלים שלהם ימחקו.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'הכנס את מספר הימים עד שהודעות ימחקו מסל המיחזור. ערך מתחת ל1 גם בסדר. לדוגמא: למחוק הודעות אחרי 3 שעות יש לכתוב,0.125 בתור ערך.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'פורמט הצגת התאריך');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'בחר את הפורמט תאריך שיוצג בכל הודעה. החודשים יהיו מקוצרים בהתאם לשפה המקומית שלך המוגדרת (אם קובץ שפה מתאים מוצג).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'הצגת תאריך ארוך');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'שמציגים הודעה יש יותר מקום להציג את התאריך. בחר את פורמט התאריך להצגה שפותחים את ההודעה. עבור שמות הימים והחודשים, זה ישתמש בהגדרות שפה המקומים שלך (אם קובץ שפה מתאים מוצג).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Deletion invoked by admin only');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'yes, by admins only');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'no, by any user');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatic deletions put a heavy weight on servers and databases. If you choose <i>yes,&nbsp;by&nbsp;admins&nbsp;only</i> automatic deletions according to the settings above (of all users\' messages) are invoked when any admin checks his or her inbox. Choose this option if an admin is checking the inbox around once a day or more often, which is the case at most sites. (If your site has more than one admin, it doesn\'t matter which of them logs in as deletions are automatically invoked by any admin.) At very small or rarely administered sites where admins rarely check their inboxes, choose <i>no,&nbsp;by&nbsp;any&nbsp;user</i>. If you do not understand this or do not know what to do, choose <i>no, by any user</i>.');
	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'שמור הגדרות');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'ההגדרות הבאות נישמרו לקובף קונפיגרציה:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'ההגדרות נישמרו.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'אייקו: משתמש מחובר');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'הכנס את המיקום של האייקון שיוצג ליד כל שם משתמש כאשר הוא מחובר.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'אייקון: משתמש מנותק');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'הכנס את המיקום של האייקון שיוצג ליד כל שם משתמש כאשר הוא מנותק.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'אייקון: הודעה שניקראה');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'הכנס את המיקום של האייקון אשר יוצג עבור הודעה שניקראה.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'אייקון: הודעה שלא ניקראה');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'הכנס את המיקום של האייקון אשר יוצג עבור הודעה שלא שניקראה.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'מודל: אייקון הודעה חדשה');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'הגדרות אלה מתייחסים למודול mod_uddeim_new. הכנס את המיקוםמ של האייקון אשר המודול הזה יציג כאשר יש הודעה חדשה.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM התקנה');
DEFINE ('_UDDEADM_FINISHED', 'ההתקנה הושלמה. ברוכים הבאים ל uddeIM 0.4 (beta). ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">אין לך בונה קהילה מותקן. לא תוכן להתשמש ב uddeIM.</span><br /><br />אם תרצה להוריד <a href="http://www.mambojoe.com">בוני הקהילה</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'המשך');
DEFINE ('_UDDEADM_PMSFOUND_1', 'יש ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' הודעות ברכיב myPMS. האם אתה רוצה לייבא אותם לuddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'זה לא ישנה את ההודעוה ברכיב myPMS או את ההתקנה שלו. הם ישארו שלמים. אתה יכול בבטיחות לייבא אותם לרכיב uddeIM, אפילו אם תחליט להמשיך להשתמש ברכיב myPMS. (אתה צריך לשמור את ההגדרות קודם לפני שתריץ את הייבוא!) הודעות שיש לך כבר מסד נתונים של הרכיבב uddeIM ישארו שלמים.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'ייבא את ההודעות שיש לי ברכיב myPMS לרכיב uddeIM עכשיו');
DEFINE ('_UDDEADM_IMPORT_NO', 'לא, אל תייבא הודעות כלל');  
DEFINE ('_UDDEADM_IMPORTING', 'אנא המתן שההודעות ייבואו.');
DEFINE ('_UDDEADM_IMPORTDONE', 'הוש/לם ייבוא הודעות מרכיב myPMS. אל תריץ את סקריפט ההתקנה הזה שוב הוא ייבא שוב את ההודעות וההודעות יוצגו פעמיים.'); 
DEFINE ('_UDDEADM_IMPORT', 'ייבא');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'ייבא הודעות מרכיב myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'לא נימצא כל התקנה לרכיב myPMS . הייבוא לא אפשרי.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">אתה כבר ייבאת את כל ההודעות מרכיב myPMS לרכיב uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'חסומים');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'ההודעה לא נשלחה - המשתמש חסם אותך');
DEFINE ('_UDDEIM_BLOCKNOW', 'חסום&nbsp;משתמש');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'רשימת משתמשים אשר חסמת, משתמשים אלו אינם יכולים לשלוח לך הודעות');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'אין משתמשים חסומים');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'You have currently blocked ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' משתמש/ים.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[הסר חסימה]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'אם משתמש חסום ינסה לשלוח לך הודעה, הוא/היא יעודקנו שהם חסומים ושההודעה לא נישלחה.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'משתמשים חסומים לא יוכלו לראות שחסמת אותם.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'אי אפשר לחסום מנהל.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'אפשר מערכת חסימה');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'כאשר אפשרי, משתמשים יוכלו לחסום משתמשים אחרים. משתמש חסום אינו יכול לשלוח הודעה למשתמש שחסם אותו. אי אפשר לחסום מנהל.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'כן');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'לא');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'משתמשים חסומים יקבלו הודעה');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'אם תגדיר  <i>כן</i>, משתמשים חסומים יקבלו הודעה שההודעה ששלחו לא נישלחה בגלל שהמשתמש שלו הם שלחו את ההודעה חסם אותם. אם תגדיר <i>לא</i>, המשתמש החסום לא יקבל כל הודעה שההודעה שלו לא נישלחה.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'כן');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'לא');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'מערכת חסימות לא אפשרית');
// DEFINE ('_UDDEADM_DELETIONS', 'הודעות'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'מחיקה'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'חסימה');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'שילוב');
DEFINE ('_UDDEADM_EMAIL', 'דואר אלקטרוני');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'הראה קישור לבוני קהילה');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'כאשר תגדיר <i>כן</i>, כל שם משתמש שיוצג ברכיב uddeIM יציג קישור לכרטיס שלו בבוני הקהילה.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'הראה את התמונה מבוני הקהילה');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'כאשר תגדיר <i>כן</i>, tהתמונה של כל משתמש תוצג כאשר יקראו את ההודעה (כמובן שרק אם יש למשתמש תמונה בכרטיס בבוני הקהילה).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'הראה מצב מחובר');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'כאשר תגדיר <i>כן</i>, uddeIM יציג כל משתמש עם אייקון קטן לידו שיראה אם המשתמש מחובר או מנותק. אתה יכול להגדיר את האייקון דרך הגדרות מנהל.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'אפשר הודעה לדואר אלקטרוני');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'כאשר תגדיר <i>כן</i>, כל משתמש יוכל לבחור אם הוא רוצה לקבל הודעה או לא כל פעם שהודעה חדשה מגיעה לדואר ניכנס שלו .');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'הדואר אלקטרוני יכלול את ההודעה');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'כאשר תגדיר <i>לא</i>, הדואר אלקטרוני יכל על ידי מי נישלחה ההודעה ומתי ולא יכלול את ההודעה עצמה.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'הודעה לדואר אלקטרוני על הודעה שלא ניקראה');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'מאפיין זה שולח - עצמאית מההגדרות שלו - דואר אלקטרוני למשתמש שלא קרא הודעה שיש לו בדואר ניכנס הרבה זמן (הגדר מתחת זמן). הגדרות אלה לא תלויות בהגדרות של \'אפשר הודעה לדואר אלקטרוני\'. אם אתה לא רוצה לשלוח כל דואר אלקטרוני בכלל, אתה צריל לבטל את שניהם.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'אחרי כמה ימים לשלוח הודעה לדואר אלקטרוני על הודעה שלא ניקראה');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'אם ההגדרה של שליחת הודעה לדואר אלקטרוני על הודעה שלא ניקראה מוגדרת <i>כן</i>, הגדר כאן אחרי כמה ימים לשלוח את ההודעה לדואר האלקטרוני על הודעה שלא ניקראה.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'כמות תווים בהקדמה');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'אתה יכול כמה תווים מההודעה תוצג בדואר הניכנס, דואר יוצא וסל המיחזור.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'גודל מקסימלי להודעה');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'הגדר כאן את הגודל המקסימלי של ההודעה. זה אוטומטית יעצר כאשר ההודעה תגיע לגודל זה. הגדר \'0\' בכדי שלא תהיה כל הגבלה לגודל ההודעה (לא ממולץ).');
DEFINE ('_UDDEADM_YES', 'כן');
DEFINE ('_UDDEADM_NO', 'לא');
DEFINE ('_UDDEADM_ADMINSONLY', 'מנהלים בלבד');
DEFINE ('_UDDEADM_SYSTEM', 'מערכת');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'שמות משתמשים של הודעות המערכת');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM תומך בהודעות מערכת. אין להם שם משתמש או שולח שניתן לראות אותו אפשר\אי אפשר להחזיר הודעה אליהם. הכנס כאן את הכינויי משתמשים ברירת מחדש של הודעות מערכת (לדוגמא <i>תמיכה</i> או <i>עזרה</i> or <i>מנהל הקהילה</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'אפשר למנהל לשלוח הודעות כלליות');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM תומך בהודעות כלליות. הם נישלחות לכל משתמשי האתר. השתמש בהם בזהירות.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'שם השולח בדואר אלקטרוני');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'הכנס את השם שכל הודעה לדואר אחקטרוני תישלח ממנו (לדוגמא <i>השם של האתר שלך</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'כתובת דואר אלקטרוני שולחת');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'הכנס את הכתובת דואר שכל הודעה לדואר אלקטרוני תישלח ממנה (זה צריך להיות הכתובת הראשית של האתר שלך');
DEFINE ('_UDDEADM_VERSION', 'uddeIM גירסה');
DEFINE ('_UDDEADM_ARCHIVE', 'ארכיון'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'אפשר ארכיון');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'בחר כאן האם לאפשר למשתמשים לאחסר בארכיון או לא. הודעות בארכיון לא נימחקות.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'מקסימום הודעות מותרות בארכיון');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'הגדר כמה הודעות יכול כל משתמש לאחסן בארכיון שלו (למנהלים אין הגבלה).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'אפשר עותק אישי');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'אפשר למשתמשים לקבל עותק מההודעה שהם שולחים. העותק יופיע בדואר ניכנס.');
DEFINE ('_UDDEADM_MESSAGES', 'הודעות');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'הצע למחוק את ההודעה המקורית');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'כאשר אופציה זאת מופעלת, זה יציג תיבת סימון ליד כפתור \'שלח\' כפתור ההשב ניקרא \'מחק הודעה מקורית\' זה מסומן ככן בברירת מחדל. במקרה כזה, ההודעה תעבור מיידים מדואר הניכנס לסל המיחזור כאשר התגובה תישלח. האופציה הזאת תשאיר את המסד נתונים קטן יותר. משתמשים יכולים לבטל את הסימון ולהשאיר את ההודעה המקורית בדואר הניכנס.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'הודעות בכל עמוד');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'הגדר כאן את כמות ההודעות שיוצגו בכל עמוד בדואר ניכנס, דואר יוצא, סל מיחזור או ארכיון.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'השתמש בקידוד');
DEFINE ('_UDDEADM_CHARSET_EXP', 'אם מהניסיון שלך יש בעיות תצוגה עם קידוד לא לטיני, אתה יכול להגדיר את הקידוד שuddeIM ישתמש בו להמיר את המסד נתונים לקוד HTML. <b>אם אתה לא יודע מה הכוונה של זה, אל תשנה את הערך ברירת מחדל!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'השתמש בקידוד דואר אלקטרוני');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'אם מהניסיון שלך יש בעיות תצוגה עם קידוד לא לטיני, אתה יכול להגדיר את הקידוד שuddeIM ישתמש בו לשלוח איתו דואר אלקטרוני. <b>אם אתה לא יודע מה הכוונה של זה, אל תשנה את הערך ברירת מחדל!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'זה התוכן של הדואר אלקטרוני שמתמשים יקבלו כאשר האופציה תוגדר כאן. התוכן של ההודעה לא יופיע בדואר אלקטרוני. שמור על המשתנים %you%, %user% ו %site% שלם. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'זה התוכן של הדואר אלקטרוני שמתמשים יקבלו כאשר האופציה תוגדר כאן. הדואר אלקטרוני הזה יכלול את ההודעה עצמה.שמור על המשתנים %you%, %user%, %pmessage% ו %site% שלמים. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'זה התוכן של הדואר אלקטרוני שמשתמשים יקבלו כאשר יקבלו הודעה תיזכורת על הודעה שלא ניקראה. שמור על המשתנים %you% ו %site% שלמים. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'אפשר למשתמשים להוריד את ההודעה מהארכיון על ידי שליחתם לדואר האלקטרוני שלהם.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'אפשר הורדה');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'זה התוכן של ההודעה שמשתמשים יקבלו כאשר הם יורידו את ההודעות שלהם מהארכיון. שמור על המשתנים %user%, %msgdate% ו %msgbody% שלמים. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'הגדר הגבלה על הדואר הניכנס');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'אתה יכול לכלול את מספר ההודעות בדואר הניכנס במקסימום הודעות שמותר למשתמש לאחסן בארכיון. במקרה כזה, המספר של ההודעות בדואר הניכנס ובארכיון ביחד לא יעלו על מה שהגדרת מתחת. אופציה אחרת, אתה יכול להגדיר את כמות ההודעות בדואר ניכנס לא קשר לארכיון. במקרה כזה, למשתמשים לא יכול להיות יותר הודעות בדואר ניכנס שלהם ממה שתגדיר. אם הם יגיעו לכמות ההודעות, הם לא יוכלו יותר לענות להודעה או לכתוב הודעה חדשה עד שהם ימחקו הודעות ישנות מהדואר הניכנס שלהם או מהארכיון באותו היחס. (משתמשים עדיין יוכלו לקבל הודעות ולקרוא אותם אבל לא לענות או לשלוח.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'הראה את ההגבלה לשימוש בדואר האלקטרוני');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'הראה כמה הודעות כבר יש למשתמש (וכמה הודעות מותר לו) בשורה מתחת לדואר הניכנס.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'אתה ביטלת את הארכיון. מה אתה רוצה לעשות עם ההודעות שנישמרו כבר בארכיון?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'השאר אותם');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'השאר אותם בארכיון (משתמש לא יוכל לגשת אליהם והם עדיין יחשבו בהגבלת ההודעות).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'העבר לדואר ניכנס');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'הודעות מהארכיון יועברו לדואר ניכנס');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'ההודעות יועברו לדואר הניכנס של כל משתמש (או לסל המיחזור עם הם ישנים ממה שמותר בדואר הניכנס ).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'תקף עבור ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' שעות. 0=לתמיד (החל מחיקה אוטומטית)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[צור הודעת מערכת או הודעה כללית]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[צור הודעה רגילה (סטנדרטית)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'הודעות מערכת או הודעה כללית לא אפשרית.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'סוג של ההודעה');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'עזרה עבור הודעת מערכת');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(פתח בחלון חדש)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'אתה עומד לשלוח את ההודעה למטה. אנא בדוק אותה ותאשר או תבטל!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'הודעה ל <strong>כל המשתמשים</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'הודעה ל <strong>כל המנהלים</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'הודעה ל <strong>כל המשתמשים המחוברים</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'המקבלים לא יוכלו להשיב להודעה זאת.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'ההודעה נישלחה עם <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> כמו שם משתמש');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'ההודעה הסתיימה ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'ההודעה לא הסתיימה');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>בדוק את הקישור (על ידי לחיצה עליו) לפני ההמשך!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'השתמש <strong>בהודעות מערכת בלבד</strong>:<br /> [b]<strong>מודגש</strong>[/b] [i]<em>נטוי</em>[/i]<br />
[url=http://www.someurl.com]כתובות אינטרנט[/url] או [url]http://www.someurl.com[/url] קישורים');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'שגיאה: לא נימצאו מקבלים. ההודעה לא נישלחה.');		
		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', 'אתה לא יכול להשיב להודעה זאת.');
DEFINE ('_UDDEIM_EMNOFF', 'עידכון לדואר אלקטרוני כבוי. ');
DEFINE ('_UDDEIM_EMNON', 'עידכון לדואר אלקטרוני דלוק. ');
DEFINE ('_UDDEIM_SETEMNON', '[הפעל אותו]');
DEFINE ('_UDDEIM_SETEMNOFF', '[כבא אותו]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'שלום %you%, 

%user% שלח לך הודעה פרטית מאתר %site%.
אנא התחבר בכדי לקרוא את ההודעה!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'שלום %you%, 

%user% שלח לך את ההודעה הבאה מאתר %site%.
אנא התחבר בכדי להשיב להודעה!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'שלום %you%,

יש לך הודעות חדשות באתר %site%.
אנא התחבר בכדי לקרוא את ההודעות! 
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'יש לך הודעה באתר %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'שלח הודעה כללית (=מקבלי ההודעה לא יוכלו להשיב)');
DEFINE ('_UDDEIM_SEND_TOALL', 'שלח לכל חברים');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'שלח לכל המנהלים');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'שלח לכל המשתמשים המחוברים');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'שגיאה בלתי צפויה: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'ארכיון לא אפשרי.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'איחסון ההודעה בארכיון ניכשל.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'ההודעה נישמרה בארכיון ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>לא שמרת כל הודעה בארכיון עדיין.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' הודעות');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'יש לך הודעה שמורה אחת');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'לשמור הודעות, אתה צריך למחוק הודעות אחרות קודם.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'אתה יכול לשמור מקסימום ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' הודעות.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'יש לך ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' הודעות');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'בארכיון');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'בדואר ניכנס');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'דואר ניכנס ובארכיון ');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'המסימום המותר הוא ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'אתה יכול עדין לקבל הודעות ולקרוא אותם אבל לא תוכל לא להשיב ולא לשלוח הודעה חדשה עד שתימחק הודעות אחרות');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'הודעות נישמרו: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(מהמקסימום. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'הודעה נישמרה בארכיון.');
DEFINE ('_UDDEIM_STORE', 'ארכיון');
		// translators info: as in: 'שמור הודעה זאת בארכיון עכשיו'

DEFINE ('_UDDEIM_BACK', 'חזרה');

DEFINE ('_UDDEIM_TRASHCHECKED', 'מחק מסומנים');
	// translators info: plural!
	
DEFINE ('_UDDEIM_SHOWALL', 'הראה הכל');
	// translators example "הראה את כל ההודעות"
	
DEFINE ('_UDDEIM_ARCHIVE', 'ארכיון');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'הארכיון מלא. ההודעה לא נישמרה.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'לא ניבחרו הודעות.');
DEFINE ('_UDDEIM_THISISACOPY', 'העתק מהודעה ששלחת ל ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'שלח לי העתק');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'שלח העתק לארכיון');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'מחק את ההודעה המקורית');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'הורד הודעה');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'ייצוא הודעות נישלח בדואר אלקטרוני');
DEFINE ('_UDDEIM_EXPORT_NOW', 'בדוק דואר לקטרוני בשבילי');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'הדואר הזה כולל את ההודעה האישית שלך.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'אינו יכול לשלוח דואר שכולל את ההודעה שלך.');

DEFINE ('_UDDEIM_LIMITREACHED', 'הגבלת הודעה! לא שוחזר.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'כתוב הודעה ל ');

$udde_smon[1]="ינואר";
$udde_smon[2]="פברואר";
$udde_smon[3]="מרץ";
$udde_smon[4]="אפריל";
$udde_smon[5]="מאי";
$udde_smon[6]="יוני";
$udde_smon[7]="יולי";
$udde_smon[8]="אוגוסט";
$udde_smon[9]="ספטמבר";
$udde_smon[10]="אוקטובר";
$udde_smon[11]="נובמבר";
$udde_smon[12]="דצמבר";

$udde_lmon[1]="ינואר";
$udde_lmon[2]="פברואר";
$udde_lmon[3]="מרץ";
$udde_lmon[4]="אפריל";
$udde_lmon[5]="מאי";
$udde_lmon[6]="יוני";
$udde_lmon[7]="יולי";
$udde_lmon[8]="אוגוסט";
$udde_lmon[9]="ספטמבר";
$udde_lmon[10]="אוקטובר";
$udde_lmon[11]="נובמבר";
$udde_lmon[12]="דצמבר";

$udde_lweekday[0]="ראשון";
$udde_lweekday[1]="שני";
$udde_lweekday[2]="שלישי";
$udde_lweekday[3]="רביעי";
$udde_lweekday[4]="חמישי";
$udde_lweekday[5]="שישי";
$udde_lweekday[6]="שבת";

$udde_sweekday[0]="ראשון";
$udde_sweekday[1]="שני";
$udde_sweekday[2]="שלישי";
$udde_sweekday[3]="רביעי";
$udde_sweekday[4]="חמישי";
$udde_sweekday[5]="שישי";
$udde_sweekday[6]="חמישי";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM תבנית');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'בחר את התבנית שאתה רוצה להתשמש בה בuddeIM ');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'הראה חברים');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'סמן <i>כן</i> אם יש לך בוני קהילה ואתה רוצה שיוצג בכל הודעה חדשה את החברים שלו שהוא יוכל לשלוח להם.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'הראה הגדרות');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'הקישור להגדרות מופיע בuddeIM אם הודעה לדואר האלקטרוני או מערכת החסומים פעילה אצלך . אם אתה לא רוצה את זה, אתה יכול לבטל את זה כאן. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'כן, בכפתור');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'אפשר קוד bb ');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'פורמט אותיות בלבד');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'השתמש <i>פורמט אותיות בלבד</i> לאפשר למשתמשים להשתמש קוד bb עבור הדגשה, נטוי, קו תחתון, צבע וגודל הכתב. כאשר תגדיר את האופציה על <i>כן</i>, משתמשים יוכלו להשתמש <strong>בכל</strong> הקוד BB הניתמך בהודעות שלהם (אפילו קישורים ותמונות).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'אפשר הבעת רגשות');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'כאשר מוגדר <i>כן</i>, קוד רגשות כמו :-) יוכלף בהצגת אייקון בהודעה. קרא את הקובץ קרא אותי בשביל לראות את הקוד הבעת רגשות שניתמך.');
DEFINE ('_UDDEADM_DISPLAY', 'הצג');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'הראה אייקון בתפריט');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'כאשר מוגדר <i>כן</i>, התפריט והקישורים יוצגו עם אייקון לידם.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'כותרת הרכיב');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'הכנס את הכותרת של הרכיב מסרים פנימיים, לדוגמא \'הודעות פרטיות\'. השאר ריק אם אתה לא רוצה להציג כותרת לרכיב.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'הראה קישור אודות');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'הגדר <i>כן</i> להראות קישור לקרדיט ורשיון לתוכנת uddeIM. הקישור יוצג בתחתית uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'עצור דואר אלקטרוני');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'סמן תיבה זאת למנוע מרכיב uddeIM לשלוח החוצה דואר אלקטרוני (הודעה לדואר אלקטרוני והודעה על הודעה פרטית שלא ניקראה) ללא התחשבות במשתמשים\' הגדרות, לדוגמא מתי שבודקים את האתר. אם אתה לא רוצה את התכונה הזאת אף פעם, הגדר את כל ההגדרות מתחת <i>לא</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'ידנית');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'תמונה מהכרטיס ברשימה');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'הגדר <i>כן</i> אם אתה רוצה להציג את התמונה מהכרטיס של המשתמש ברשימת ההודעות (דואר ניכנס, דואר יוצא, וכדומה.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'הצג משתמשים');
DEFINE ('_UDDEIM_CONNECTIONS', 'החברים שלי');
DEFINE ('_UDDEIM_SETTINGS', 'הגדרות');
DEFINE ('_UDDEIM_NOSETTINGS', 'אין הגדרות לשנות');
DEFINE ('_UDDEIM_ABOUT', 'אודות'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'הודעה חדשה'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'הודעה לדואר אלקטרוני');
DEFINE ('_UDDEIM_EMN_EXP', 'אתה יכול לקבל הודעת לדואר אלקטרוני כל פעם שתקבל הודעה חדשה.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'שלח לי הודעה לדואר אלקטרוני כל פעם שאני יקבל הודעה חדשה');
DEFINE ('_UDDEIM_EMN_NONE', 'אל תשלח לי הודעה לדואר אלקטרוני ');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'שלח הודעה לדואר אלקטרוני רק מתי שאני לא מחובר');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'אל תשלח לי כל הודעה או תיזכורת לדואר האלקטרוני');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'משתמשים חסומים'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'אתה יכול לחסום משתמשים מסויימים מלשלוח לך הודעות פרטיות. בחר <i>חסום משתמש</i> כאשר אתה רואה הודעה מהמשתמש הרצוי.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'שמור שינויים');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'מודגש');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'נטוי');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'קו תחתון');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'אדום.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'ירוק.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'כחול.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'גודל כתב 1');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'גודל כתב 2');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'גודל כתב 3');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'גודל כתב 4');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'הכנס קישור לתמונה');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'הכנס כתובת אינטרנט. אל תשכח להוסיף http:// בהתחלת הכתובת.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'סגור את כל הטגים BB הפתוחים.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' הודעה ב'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>אין לך הודעות בארכיון.</strong>');
