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
// Language file: Turkish  (source file is ISO-8859-9)
// Translator:    http://cumla.blogspot.com <noemail>
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Load MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'This specifies how uddeIM loads MooTools (MooTools is required for Autocompleter): <i>None</i> is useful when your template loads MooTools, <i>Auto</i> is the recommended default (same behavior as in uddeIM 1.2), when using J1.0 you can also force loading MooTools 1.1 or 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'do not load MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'otomatik');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'force loading MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'force loading MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...setting default for MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 encoded');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Zaman Dilimini uyarla');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'UddeIM zaman� yanl�� g�sterdi�inde zaman dilimini buradan ayarlayabilirsiniz. Genellikle, s�f�r olarak ayarland���nda her�ey d�zg�nd�r. Yinede bu de�eri de�i�tirmeniz gerekebilir.');
DEFINE ('_UDDEADM_HOURS', 'saat');
DEFINE ('_UDDEADM_VERSIONCHECK', 'S�r�m Bilgisi:');
DEFINE ('_UDDEADM_STATISTICS', '�statistikler:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', '�statistikleri g�ster');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Burada kay�tl� mesajlar gibi baz� istatistikleri g�rebilirsiniz.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', '�STAT�ST�KLER� G�STER');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Veritaban�nda kay�tl� mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Al�c�lar taraf�ndan silinen mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'G�nderenler taraf�ndan silinen mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Messages on hold for purging: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Overwrite Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Usually uddeIM tries to detect the correct Itemid when it is not set. In some cases it might be necessary to overwrite this value, e.g. when you use several menu links to uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Detected Itemid is: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Use Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Use this Itemid instead of the detected one.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Profil ba�lant�lar�n� kullan');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'E�er <i>evet</i> se�erseniz, t�m kullan�c� adlar� uddeIM de kullan�c� profiline ba�lant� olarak g�r�necektir.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Show thumbnails');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'When set to <i>yes</i>, the thumbnail of the respective user will be displayed when reading a message.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Show thumbnails in lists');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Set to <i>yes</i> if you want to display thumbnails of users in the message lists overview (inbox, outbox, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Kapal�');
DEFINE ('_UDDEADM_ENABLED', 'A��k');
DEFINE ('_UDDEIM_STATUS_FLAGGED', '�nemli');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Mesaj etiketlemeye izin ver');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Allows message tagging (uddeIM shows a star in lists which can be highlighted to mark important messages).');
DEFINE ('_UDDEADM_REVIEWUPDATE', '�nemli: uddeIM �nceki s�r�mlerden g�ncellendiyse, l�tfen README dosyas�n� kontrol edin. Bazen veritaban� tablo yada alanlar�nda ekleme yada de�i�iklik yapman�z gerekebilir!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Add CC: line');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Al�nt� metnini k�salt');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Truncate quoted text to 2/3 of the maximum text length if it exceeds this limit.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Inbox entries ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Last ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' entries');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Status');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Sender');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Mesaj');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Empty Inbox');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Access to trashcan not allowed.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Restrict trashcan access');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'You can restrict the access to the trashcan. Usually the trashcan is available for all (<i>no restriction</i>). You can restrict the access to special users or to admins only, so groups with lower access rights cannot recycle a message.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'no restriction');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', '�zel kullan�c�lar');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'sadece y�neticiler');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Kullan�c� listesindeki gizlenecek kullan�c�lar');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Enter user IDs which should be hidden from public userlist (e.g. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Kullan�c� listesinde kullan�c�lar� gizle');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Enter user IDs which should be hidden from userlist (e.g. 65,66,67).');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF attack recognized');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF korumas�');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'This protects all forms against Cross-Site Request Forgery attacks. Usually this should be enabled. Only when you have strange problems switch it off.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Ar�ivdeki mesajlar� cevaplayamazs�n�z.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Replies to unregistered users can not be recalled.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Allow replies');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Allow direct replies to messages from public users.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Merhaba %user%,\n\n%you% has sent you the following private message at %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Ger�ek isimleri g�ster');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Show realnames or usernames in public frontend?');
DEFINE ('_UDDEIM_USERLIST', 'Kullan�c� Listesi');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', '�zg�n�m, yeni mesaj g�ndermeden �nce beklemelisiniz');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Son G�nderim');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Timedelay');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Time in seconds a user must wait before he can post the next message (0 for no time delay).');
DEFINE ('_UDDEADM_SECONDS', 'saniye');
DEFINE ('_UDDEIM_PUBLICSENT', 'Mesaj g�nderildi.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'G�nderen isminde hata');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'E-posta adresinde hata');
DEFINE ('_UDDEIM_YOURNAME', '�sminiz:');
DEFINE ('_UDDEIM_YOUREMAIL', 'E-postan�z:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Kulland���n�z uddeIM s�r�m� ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'uddeIM en son s�rm�n� kullan�yorsunuz.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', '�u andaki g�ncel s�r�m ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'G�ncelleme Bilgisi:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'G�ncellemeleri kontrol et');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'This contacts uddeIM developer website to receive information about the current uddeIM version. Except the uddeIM version you use, no other personal information is transmitted.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'KONTROL ET');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Unable to receive version information.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Ki�i listesi bulunamad�!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Azami al�c� s�n�r� a��ld� (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Max. kay�t say�s�');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Her ki�i listesi i�in azami kay�t say�s�.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Ki�i listesi a��k de�il');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Ki�i listesi a��k');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM kullan�c�lar�n ki�i listesi olu�turmalar�na olanak verir. Bu listeleri �oklu mesaj g�nderirken kullanabilirsiniz. Ki�i listesini kullanmak istiyorsan�z �oklu al�c� �zelli�ini a�may� unutmay�n.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'kapal�');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'kay�tl� kullan�c�lar');
DEFINE ('_UDDEADM_ENABLELISTS_2', '�zel kullan�c�lar');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'sadece y�neticiler');
DEFINE ('_UDDEIM_LISTSNEW', 'Yeni ki�i listesi olu�tur');
DEFINE ('_UDDEIM_LISTSSAVED', 'Ki�i listesi kaydedildi');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Ki�i listesi g�ncellendi');
DEFINE ('_UDDEIM_LISTSDESC', 'A��klama');
DEFINE ('_UDDEIM_LISTSNAME', '�sim');
DEFINE ('_UDDEIM_LISTSNAMEWO', '�sim (bo�luksuz)');
DEFINE ('_UDDEIM_EDITLINK', 'd�zenle');
DEFINE ('_UDDEIM_LISTS', 'Ki�iler');
DEFINE ('_UDDEIM_STATUS_READ', 'okunmu�');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'okunmam��');
DEFINE ('_UDDEIM_STATUS_ONLINE', '�evrimi�i');
DEFINE ('_UDDEIM_STATUS_OFFLINE', '�evrimd���');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'CB galeri resimlerini g�ster');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Varsay�lan olarak uddeIM sadece kullan�c�lar�n y�kledi�i avatarlar� g�sterir. Bu ayar� a�t���n�zda uddeIM CB avatars galerisindeki resimleride g�r�nt�ler.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Unblock CB connections');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'You can allow messages to recipients when the registered user is on the recipients CB connection list (even when the recipient is in a group which is blocked). This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'You are not allowed sending to this group.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Al�c� sizi engellemi�.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Engellenen gruplar (kay�tl� kullan�c�lar)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Groups to which registered users are not allowed to send messages to. This is for registered users only. Special users and admins are not affected by this setting. This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Engellenen Gruplar (public users)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Groups to which public users are not allowed to send messages to. This setting is independent from the individual blocking each user can configure when enabled (see settings above). When you block a group, users in this group cannot see the the option to enable the public frontend in their profile settings.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Public user');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB connection');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Kay�tl� kullan�c�');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Author');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Kullan�c� sadece kay�tl� kullan�c�lardan gelen mesajlar� kabul ediyor.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Hide from public "All users" list');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the public "All users" list. Note: this hides the names only, the users can still receive messages. Users who have not enabled Public Frontend will never be listed in this list.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Hide from "All users" list');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the "All users" list. Note: this hides the names only, the users can still receive messages.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'yok');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'sadece superadminler');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'sadece y�neticiler');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', '�zel kullan�c�lar');
DEFINE ('_UDDEADM_PUBLIC', 'Public');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed in Public Frontend, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Public Frontend');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- select public -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Allow public users to send a message');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Mesaj s�n�r� a��ld�!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Public user');
DEFINE ('_UDDEIM_DELETEDUSER', 'User deleted');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha uzunlu�u');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Kullan�c�n�n ka� karakter girece�ini belirler.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam korumas�');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Mesaj g�nderirken kimin captcha girece�ini belirler');
DEFINE ('_UDDEADM_CAPTCHAF0', 'disabled');
DEFINE ('_UDDEADM_CAPTCHAF1', 'public users only');
DEFINE ('_UDDEADM_CAPTCHAF2', 'public and registered users');
DEFINE ('_UDDEADM_CAPTCHAF3', 'public, registered, special users');
DEFINE ('_UDDEADM_CAPTCHAF4', 't�m kullan�c�lar (y�neticiler dahil)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Enable public frontend');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'When enabled public users can send messages to your registered users (those can specify in their personal settings of they want to use this feature).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Public frontend default');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'This is the default value if a public user is allowed to send a message to a registered user.');
DEFINE ('_UDDEADM_PUBDEF0', 'disabled');
DEFINE ('_UDDEADM_PUBDEF1', 'enabled');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Hatal� g�venlik kodu');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'yok yada bilinmeyen');
DEFINE ('_UDDEADM_DONATE', 'If you like uddeIM and want to support the development please make a small donation.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Veritaban�nda yap�land�rma bulundu: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Yap�land�rmay� yedekle ve geri y�kle');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Yap�land�rman�z� veritaban�na yedekleyebilir ve gerekli oldu�unda geri alabilirsiniz. Bu �zellik uddeIM g�ncellerken yada deneme yapmak i�in ayarlar�n�z� de�i�tirdi�inizde kullan��l� olabilir.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'YEDEKLE');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'GER� Y�KLE');
DEFINE ('_UDDEADM_CANCEL', '�ptal');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Dil dosyas� karakter seti');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Genellikle <strong>varsay�lan</strong> (ISO-8859-1) Joomla 1.0 i�in do�ru ayard�r ve <strong>UTF-8</strong> Joomla 1.5. i�in');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'varsay�lan');
DEFINE ('_UDDEIM_READ_INFO_1', 'Okunmu� mesajlar gelen kutusundan otomatik olarak silinmeden �nce max. ');
DEFINE ('_UDDEIM_READ_INFO_2', ' g�n tutulur.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Okunmam�� mesajlar gelen kutusundan otomatik olarak silinmeden �nce max. ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' g�n tutulur.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'G�nderilmi� mesajlar giden kutusundan otomatik olarak silinmeden �nce max ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' g�n tutulur.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Okunmu� mesajlar i�in gelen kutusunda bilgi g�ster');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Gelen kutusunda bilgi g�ster "Okunmu� mesajlar n g�n sonra silinir"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Okunmam�� mesajlar i�in Gelen kutusunda bilgi g�ster');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Gelen kutusunda bilgi g�ster "Okunmam�� mesajlar n g�n sonra silinir"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'G�nderilen mesajlar i�in giden kutusunda bilgi g�ster');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Giden kutusunda bilgi g�ster "Giden mesajlar n g�n sonra silinir"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', '��pteki mesajlar i�in ��p kutusunda bilgi g�ster');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', '��p kutusunda bilgi g�ster "��p kutusundaki mesajlar� n g�n sonra yoket"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'G�nderilen mesajlar� tut (g�n)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', '<b>G�nderilen</b> mesajlar�n giden kutusundan ka� g�n sonra otomatik olarak silinece�ini giriniz.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 't�m �zel kullan�c�lara g�nder');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', '<strong>t�m �zel kullan�c�lara</strong> Mesaj');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- kullan�c� ad� se� -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- isim se� -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Kullan�c� ayarlar�n� d�zenle');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'mevcut olan');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'mevcut olmayan');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- giri� se� -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- bilgilendirme se� -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- popup se� -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Kullan�c� Ad�');
DEFINE ('_UDDEADM_USERSET_NAME', '�sim');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Bilgilendirme');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Son giri�');
DEFINE ('_UDDEADM_USERSET_NO', 'Hay�r');
DEFINE ('_UDDEADM_USERSET_YES', 'Evet');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'bilinmeyen');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', '�evrimd���yken (cevaplar hari�)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Herzaman (cevaplar hari�)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', '�evrimd���yken');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Her zaman');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Bilgilendirme yok');
DEFINE ('_UDDEADM_WELCOMEMSG', "uddeIM!e Hosgeldiniz\n\nBasariyla uddeIM Kuruldu.\n\nFarkli temalar ile bu mesaji goruntulemeyi deneyin. UddeIM yonetim bolumunden ayarlayabilirsiniz.\n\nuddeIM gelisen bir projedir. Eger hata yada eksik bulursaniz, UddeIMi beraber daha iyi yapmak icin l�tfen bana yaz�n.\n\nIyi sanslar ve eglenceler!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM kurulumu tamamland�.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'L�tfen y�netim panelinden devam edin ve ayarlar�n�z� g�zden ge�irin.');
DEFINE ('_UDDEADM_REVIEWLANG', 'If you are running the CMS in a character set other than ISO 8859-1 make sure to adjust the settings accordingly.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Kurulumdan sonra, t�m uddeIM e-posta trafi�i (e-posta bildirimleri, beni unutma e-mailleri) kapal�d�r deneme yaparken e-posta g�nderilmez. Bitirdi�inizde "e-postay� durduru" y�netim b�l�m�nden kapatmay� unutmay�n.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. al�c�lar');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Her mesaj i�in izin verilen azami al�c� say�s� (0=s�n�rlama yok)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', '�ok fazla al�c�');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Sending of emails disabled.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Metin i�inde arama');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Otomatik tamamlay�c�n�n metin i�inde arama yapabilmesi (aksi taktirde sadece ba�lang�c�nda arama yapar)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', '"T�m �yeler" ba�lant�s� durumu');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', '"T�m �yeler" ba�lant�s�n� gizle');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', '"T�m �yeler" ba�lant�s�n� g�ster');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Herzaman t�m �yeleri g�ster');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Yap�land�rma yaz�lamaz:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Yap�land�rma yaz�labilir:');
DEFINE ('_UDDEIM_FORWARDLINK', 'ilet');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'al�c� bulundu');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'al�c�lar bulundu');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (varsay�lan)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Mail sistemi');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'UddeIM bilgilendirmeleri g�nderirken kullanaca�� mail sistemini se�in.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Joomla gruplar�n� g�ster');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Joomla gruplar�n� genel mesaj listesinde g�ster.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', '�letilen mesaj');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Mesajlar�n y�nlendirilmesine izin ver.');
DEFINE ('_UDDEIM_FWDFROM', 'Orjinal mesaj� g�nderen');
DEFINE ('_UDDEIM_FWDTO', 'kime');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Ar�ivden geri al');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Mesaj ar�ivden geri al�namad�');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', '�oklu al�c�ya izin ver');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', '�oklu al�c�ya izin ver (virg�lle ayr�larak).');
DEFINE ('_UDDEIM_CHARSLEFT', 'karakter kald�');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Metin sayac�n� g�ster');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Ka� karakter kald���n� g�r�nt�lemek i�in metin sayac�n� a��n.');
DEFINE ('_UDDEIM_CLEAR', 'Temizle');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Se�ilen kullan�c�lar� al�c�lara ekle');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Bu "T�m �yeler" listesinden �oklu se�im yapmay� olanakl�k�lar.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Ba�lant�lar listesinden ekle');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Bu �oklu al�c� eklemeye izin verir.');
DEFINE ('_UDDEADM_PMSFOUND', 'Bulunan PMS: ');
DEFINE ('_UDDEIM_ENTERNAME', 'bir isim girin');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Otomatik tamamlamay� kullan');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Al�c� isimleri i�in otomatik tamamlamay� kullan.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Key used for obfuscating');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Enter key which is used for message obfuscating. Do not change this value after message obfuscating has been enabled.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Yanl�� yap�land�rma dosyas�!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Bulunan s�r�m:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version expected:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Converting configuration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Tamam!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Kritik hata: Yap�land�rma dosyas�na yazmakta hata:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Encrypted message! - indirme olanaks�z!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Yanl�� Parola! - indirme olanaks�z!');
DEFINE ('_UDDEIM_WRONGPW', 'Yanl�� Parola! - L�tfen veritaban� y�neticisiyle ileti�im kurun!');
DEFINE ('_UDDEIM_WRONGPASS', 'Yanl�� Parola!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Yanl�� silinme tarihi (gelen kutusu/giden kutusu): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Yanl�� silinme tarihini d�zelt');
DEFINE ('_UDDEIM_TODP', 'Kime: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'T�m mesajlar� �imdi yoket');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', '��lem simgelerini g�ster');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', '<i>evet</i>, ayarland���nda i�lem ba�lant�lar� bir simge ile g�sterilir.');
DEFINE ('_UDDEIM_UNCHECKALL', 'hepsini b�rak');
DEFINE ('_UDDEIM_CHECKALL', 'hepsini se�');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Alt simgeleri g�ster');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', '<i>evet</i>, ayarland���nda alt k�s�mdaki ba�lant�lar bir simge ile g�r�nt�lenir.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Hareketli g�l�c�k kullan');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Hareketsiz g�l�c�kler yerine hareketli olanlar� kullan�n.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Daha fazla hareketli g�l�c�k');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Daha fazla hareketli g�l�c�k g�ster.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Encrypted message - Parola gerekli');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Parola gerekli</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Parola');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (encryption text)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (decryption text)');
DEFINE ('_UDDEIM_MORE', 'DAHA');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', '�zel Mesajlar');
DEFINE ('_UDDEMODULE_NONEW', 'yeni yok');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Yeni mesajlar: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'mesaj');
DEFINE ('_UDDEMODULE_MESSAGES', 'mesajlar');
DEFINE ('_UDDEMODULE_YOUHAVE', 'You have');
DEFINE ('_UDDEMODULE_HELLO', 'Merhaba');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'H�zl� Mesaj');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Use encryption');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Encrypt stored messages');
DEFINE ('_UDDEADM_CRYPT0', 'Yok');
DEFINE ('_UDDEADM_CRYPT1', 'Obfuscate messages');
DEFINE ('_UDDEADM_CRYPT2', 'Encrypt messages');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Varsay�lan E-posta bildirimi');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'E-Posta bildirimi i�in varsay�lan de�er (kullan�c�lar kendi ayarlar�n� de�i�tirebilirler).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Bildirim Yok');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Herzaman');
DEFINE ('_UDDEADM_NOTIFYDEF_2', '�evrimd���yken bildir');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Supress "All users" link');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Supress "All users" link in write new message box (useful when lots of users are registered).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup bildirim');
DEFINE ('_UDDEADM_POPUP_EXP','Yeni mesaj geldi�inde popup pencerede g�ster ( mod_cblogin yamas� gerekli )');
DEFINE ('_UDDEIM_OPTIONS', 'Daha fazla ayar');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Burada biraz daha ayar bulabilirsiniz.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Yeni mesaj geldi�inde popup ile g�ster');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup bildirimi varsay�lan');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Enable popup notification by default (for users who have not changed their preferences yet).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Bak�m');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Veritaban� bak�m�');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'KONTROL');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'ONAR');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', 'Bir kullan�c� veritaban�ndan silindi�inde mesajlar� veritaban�nda kal�r. This function checks if it is necessary to trash orphaned messages and you can trash them if it is required.');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', 'Kontrol ediliyor...<br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (Kullan�c� ad�): [inbox|inbox trashed|outbox|outbox trashed]</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>gelen kutusu: messages stored in users inbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>gelen kutusu silinen: messages trashed from users inbox, but still in someones outbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>giden kutusu: messages stored in users outbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>giden kutusu silinen: messages trashed from users outbox, but still in someones inbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', 'Siliniyor...<br>');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "bulunamad� (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "�yenin t�m ayarlar�n� sil");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "delete blocking of user");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "trash all messages sent to deleted user in sender\'s outbox and deleted user\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "trash all messages sent from deleted user in his outbox and receiver\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nothing to do<b><br>');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Bak�m gerekli<b><br>');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Ger�ek isimleri g�ster');
DEFINE ('_UDDEADM_NAMESDESC', 'Ger�ek isim yada kullan�c� adlar�n� g�ster?');
DEFINE ('_UDDEADM_REALNAMES', 'Ger�ek isimler');
DEFINE ('_UDDEADM_USERNAMES', 'Kullan�c� ad�');
DEFINE ('_UDDEADM_CONLISTBOX', 'Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Ba�lant�lar�m� liste yada tablo �eklinde g�ster?');
DEFINE ('_UDDEADM_LISTBOX', 'Liste');
DEFINE ('_UDDEADM_TABLE', 'Tablo');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Mesaj 24 saat i�erisinde silinmezse ge�ici olarak ��p kutusuna g�nderilecektir. Mesaj�n sadece birinci kelimesine g�rebilirsiniz. Onu tam olarak okumak i�in geri al�n�z.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Silinen mesajlar ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' saat ge�ici olarak ��p kutusunda bekleyecektir. Buradaki mesajlar�n sadece birinci kelimesine g�rebilirsiniz. Onu tam olarak okumak i�in geri al�n�z.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Bu mesaj geri al�nd�. Siz yeniden d�zenleyebilir ve tekrar g�nderebilirsiniz.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Mesaj geri getirilemedi (b�y�k bir ihtimalle okundu veya silindi.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Mesaj geri al�m� ba�ar�s�z. (Burada gere�inden fazla kald��� i�in silindi. �u anda ��p kutusunda olabilir.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Mesaj geri al�m� ba�ar�s�z.');
DEFINE ('_UDDEIM_DONTSEND', 'G�nderme');
DEFINE ('_UDDEIM_SENDAGAIN', 'Yeniden G�nder');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Giri� yapmam��s�n�z.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Gelen Kutunuzda hi� mesaj yok.</strong>');
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Giden kutusunda mesaj�n�z yok.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>��p kutusunda mesaj�n�z yok.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Gelen Kutusu');
DEFINE ('_UDDEIM_OUTBOX', 'Giden Kutusu');
DEFINE ('_UDDEIM_TRASHCAN', '��p Kutusu');
DEFINE ('_UDDEIM_CREATE', 'Yeni Mesaj');
DEFINE ('_UDDEIM_UDDEIM', '�zel Mesajlar');
DEFINE ('_UDDEIM_READSTATUS', 'Oku');
DEFINE ('_UDDEIM_FROM', 'Kimden');
DEFINE ('_UDDEIM_TO', 'Kime');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Giden Kutusu, silmemi� iseniz g�nderdi�iniz t�m mesajlar� i�erir. E�er Giden Kutunuzda bir mesaj okunmam��sa geri �a��ra bilirsiniz. Bu al�c� taraf�ndan uzun bir s�re okunmam��sa kullan�labilir. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'Geri Al');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Bu mesaj� geri al');
DEFINE ('_UDDEIM_RESTORE', 'Geri Al');
DEFINE ('_UDDEIM_MESSAGE', 'Mesaj');
DEFINE ('_UDDEIM_DATE', 'Tarih');
DEFINE ('_UDDEIM_DELETED', 'Silinme');
DEFINE ('_UDDEIM_DELETE', 'sil');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'Sil');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Bu mesaj g�r�nt�lenemiyor. <br>Muhtemel Sebepler:<ul><li>Bu �zel mesaj� okumaya yetkiniz yoktur.</li><li>Mesaj silinmi�.</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Bu mesaj� ��p kutusuna ta��yabilirsiniz.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Mesaj� g�nderen ');
DEFINE ('_UDDEIM_MESSAGETO', 'Mesaj kendinizden ');
DEFINE ('_UDDEIM_REPLY', 'Cevapla');
DEFINE ('_UDDEIM_SUBMIT', 'G�nder');
DEFINE ('_UDDEIM_DELETEREPLIED', 'As�l mesaj� cevaplad�ktan sonra ��p kutusuna ta��');
DEFINE ('_UDDEIM_NOID', 'Hata: Al�c� ID bulunamad�. Mesaj g�nderilmedi.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Hata: Mesaj metni yok! Mesaj g�nderilmedi.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Cevap G�nderildi');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Mesaj G�nderildi.');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' ve as�l mesaj ��p kutusuna ta��nd�');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Bu kullan�c� ad� ile bir kullan�c� yok!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Kendinize mesaj g�nderemezsiniz!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Eri�im �hlali!</b> Bu i�lem i�in izniniz yok!');
DEFINE ('_UDDEIM_PRUNELINK', 'Sadece Y�netici: Burada Kesildi');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Y�netimi');
DEFINE ('_UDDEADM_GENERAL', 'Genel');
DEFINE ('_UDDEADM_ABOUT', 'Hakk�nda');
DEFINE ('_UDDEADM_DATESETTINGS', 'Tarih/Saat');
DEFINE ('_UDDEADM_PICSETTINGS', 'Simgeler');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Okunmu� mesajlar� tut (g�n)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Okunmam�� mesajlar� tut (g�n)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Mesajlar� ��p kutusunda tut (g�n)');
DEFINE ('_UDDEADM_DAYS', 'g�n');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', '<b>Okunan</b> mesajlar gelen kutusundan otomatik olarak ka� g�n sonra silinecektir. E�er mesaj�n otomatik olarak silinmesini istemiyorsan�z, �ok y�ksek bir de�er girin (�rnek, 36524 bir y�zy�l). Fakat s�renin uzun tutulmas� veritaban�n�z�n h�zla dolmas�na sebep olacakt�r.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Hen�z <b>Okunmam��</b> mesajlar�n tutulaca�� g�n say�s�. Fakat bunu al�c�lar�n mesajlar� hangi s�kl�kda okuduklar�na g�re ayarlanmal�d�r.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', '��p kutusundaki mesajlar�n ka� g�n sonra silinece�idir. Buradaki de�erin 1 den k���k olmas� uygundur Mesela: Mesajlar�n 3 saat sonra ��p kutusunda silinmesini istersek, de�er olarak 0.125 girmemiz gerekir.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Tarih g�r�nt� format�');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Mesaj tarih/saat g�r�n�m�n�n nas�l olmas� gerekti�ini se�in. Aylar Joomlan�n yerel dil ayarlar�na g�re k�salt�lacakt�r (e�er uddeIM dil dosyas� ile uyumluysa).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Uzun tarih g�r�n�m�');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Mesajlarda uzun tarih bi�iminin g�r�nmesi i�in, mesaj a��ld���nda g�r�nt�lenecek tarih format�n� se�in. Haftan�n g�nleri ve ay isimleri, Joomlan�n yerel dil ayarlar�na g�re yap�lacakt�r (e�er uddeIM dil dosyas� ile uyumluysa).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Silme i�lemi sadece y�netici taraf�ndan yap�ls�n');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'evet, sadece y�netici');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'hay�r, hi� bir kullan�c�');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'elle');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Otomatik silme i�lemi sunucular ve veritabanlar�na a��r� y�k getirir. E�er <i>evet,&nbsp;sadece&nbsp;y�netici</i> se�ilirse; otomatik silme i�lemi ayarlar� ��yle olmal�d�r (t�m kullan�c�lar�n\' mesajlar� i�in). Bu se�ene�i, y�netici gelen kutusunu yakla��k g�nde bir defa veya daha fazla kontrol ederse se�ilmelidir. (E�er sitenin bir y�neticisi varsa, y�netici taraf�ndan bu se�enek tercih edilmemelidir.) Bu say� az ise veya y�neticiler gelen kutular�na arada s�rada bak�yorlarsa, <i>hay�r,&nbsp;hi�bir&nbsp;kullan�c�</i> se�ilmelidir. E�er bu anla��lmad�ysa veya nas�l yap�laca�� bilinemiyorsa, <i>hay�r, hi�bir kullan�c�</i> se�ilmelidir.');

	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Ayarlar� Kaydet');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Ayarlar�n kaydedildi�i dosya:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Ayarlar kaydedildi.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Simge: Kullan�c� �evrimi�i');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Kullan�c� �evrimi�i oldu�unda kullan�c� ad�n�n yan�nda bu simge g�r�necektir.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Simge: Kullan�c� �evrimd���');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Kullan�c� �evrimd��� oldu�unda kullan�c� ad�n�n yan�nda bu simge g�r�necektir.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Simge: Mesaj okunmu�');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Okunmu� mesaj i�in bu simge g�r�necektir.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Simge: Okunmam�� mesaj');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Okunmam�� mesaj i�in bu simge g�r�necektir.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Mod�l: Yeni Mesaj �konu');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Buras� mod_uddeim_new mod�l�ne ba�vuracakt�r. Yeni mesaj oldu�unda mod�l ekrana bu simgeyi getirecektir.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM kurulum');
DEFINE ('_UDDEADM_FINISHED', 'Kurulum tamamland�. uddeIM e Ho�geldiniz. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Joomla Community Builder y�kl� de�il. uddeIM\'i kullanamayacaks�n�z.</span><br><br><a href="http://www.joomlapolis.com/">Community Builder</a>\'� indirebilirsiniz.');
DEFINE ('_UDDEADM_CONTINUE', 'devam');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Sizin ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' mesaj�n�z eski PMS i�erisinde bulunuyor. Onlar� uddeIM\'e almak ister misiniz?');
DEFINE ('_UDDEADM_IMPORT_EXP', ' PMS mesajlar�n�z� veya sizin y�klediklerinizi de�i�tirmeyecektir. Onlar sa�lam olarak al�nacakt�r. Onlar� g�venli bir �ekilde uddeIM\'e alabilirsiniz, even if you consider to continue using the old PMS. You should save any changes you made to the settings first before running the import! Any messages that are already in your uddeIM database will remain intact.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Eski PMS mesajlar�n�z� �imdi uddeIM\'e aktar');
DEFINE ('_UDDEADM_IMPORT_NO', 'Hay�r, hi�bir mesaj� alma');  
DEFINE ('_UDDEADM_IMPORTING', 'L�tfen k�sa bir s�re bekleyin, mesajlar al�n�yor.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Eski PMS\'den mesaj al�m� tamamland�. Bu beti�i tekrar �al��t�rmay�n, ��nk� ayn� mesajlar� yeniden al�rs�n�z ve iki defa g�z�k�r.'); 
DEFINE ('_UDDEADM_IMPORT', 'D��ar�dan Al');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Mesajlar� eski PMS\'den al.');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Ba�ka bir PMS y�kl� de�il. Al�m m�mk�n de�il.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Zaten mesajlar eski PMS\'den uddeIM\'e al�nm��.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Engellenmi�');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'G�nderilmedi. (kullan�c�y� engellemi�siniz)');
DEFINE ('_UDDEIM_BLOCKNOW', 'Kullan�c�y� engelle');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Engelledi�iniz kullan�c�lar�n listesidir. Bu kullan�c�lar size �zel mesaj g�nderemeyecekler.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', '�u anda engelledi�iniz kullan�c� yok.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Engellemi� oldu�unuz ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' kullan�c�(lar).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[engelleme kald�r]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'E�er engellenmi� bir kullan�c� size mesaj g�ndermeye �al���rsa, Ona engellendi�i bilgisi ve mesaj g�nderemeyece�i bildirilecektir.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Engellenmi� bir kullan�c� kendisini engelleyeni g�remez.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Y�neticileri engelleyemezsiniz.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Engelleme sistemi yetkisi');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Yetki verildi�inde, kullan�c�lar di�er kullan�c�lar� engelleyebilir. Engellenmi� bir kullan�c�, kendisini engelleyen kullan�c�ya mesaj g�nderemez. Y�neticiler engellenemez.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'evet');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'hay�r');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Engellenmi� kullan�c� mesaj als�n');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'E�er <i>evet</i> se�ilirse, engellenmi� kullan�c� mesaj bilgilerini alacak ama g�nderemeyecektir. ��nk� al�c� onu engellemi�tir. E�er <i>hay�r</i> se�ilirse, engellenmi� kullan�c� herhangi bir mesaj g�nderemeyecek ve alamayacakt�r.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'evet');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'hay�r');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Engelleme sistemi etkin de�il');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Silinenler'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Engelleme');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Entegrasyon');
DEFINE ('_UDDEADM_EMAIL', 'E-posta');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'CB linklerini g�ster');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', '<i>Evet</i> se�ilirse, b�t�n kullan�c�lar uddeIM ekran�nda Community Builder bilgileri ile ili�kili olarak g�sterilecektir.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'CB thumbnail g�ster');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', ' <i>evet</i> se�ildi�i zaman, kullan�c� ki�isel mesaj�n� okudu�u zaman mesaj� g�nderenin k���k resmi g�r�necektir. (e�er kullan�c�n�n Community Builder bilgisinde bir resmi varsa).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', '�evrimi�i durumu g�ster');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', ' <i>evet</i> se�ildi�i zaman, uddeIM ekran�nda her kullan�c� i�in bu kullan�c�n�n �evrimi�i veya �evrimd��� oldu�unu g�steren k���k bir ikon g�r�nt�lenecektir. Bu ikonlar� y�netici alan�ndan se�ebilirsiniz.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'E-posta bildirimine izin');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', ' <i>evet</i> se�ildi�i zaman, her kullan�c� gelen kutusuna yeni bir mesaj geldi�ini e-posta ile haber alacakt�r.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-posta mesaj� da ta��s�n');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', ' <i>hay�r</i> se�ilirse, e-posta sadece mesaj�n kimden ve ne zaman g�nderildi�i bilgisini verecektir, mesaj e-posta i�erisinde bulunmayacakt�r.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Hat�rlatma e-postas�');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'G�nderilerdeki bu �zellik - kullan�c�lar i�in sizin yapaca��n�z bir ayard�r - kullan�c� gelen kutusundaki bir mesaj uzun zaman okunmazsa (ayar a�a��dad�r). Bu ayr� bir ayard�r ve \'e-posta bildirim izni\' ayar� �sttedir. E�er hi�bir zaman e-posta mesaj� g�ndermek istemiyorsan�z, her ikisini de kapatmal�s�n�z.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Ka� g�n sonra hat�rlatma yap�lacak');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'E�er hat�rlatma �zelli�i (yukar�da) ayar� <i>evet</i> olursa, ka� g�n sonra okunmam�� mesaj oldu�u bilgisi e-posta g�nderisi buradan girilecektir.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', '�lk Listelenecek Karakter Say�s�');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Gelen kutusu, giden kutusu ve ��p kutusu i�in mesaj�n ka� karakter g�r�nt�lenece�ini buradan girin.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Azami Mesaj Uzunlu�u');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Mesaj�n azami uzunlu�unu buraya girin. Herhangi bir mesaj i�in uzunl�k \'0\' (tavsiye edilmez). Otomatik olarak ba�lang�� k�sm�ndan kesilecektir. ');
DEFINE ('_UDDEADM_YES', 'evet');
DEFINE ('_UDDEADM_NO', 'hay�r');
DEFINE ('_UDDEADM_ADMINSONLY', 'Sadece y�neticiler');
DEFINE ('_UDDEADM_SYSTEM', 'Sistem');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Sistem mesajlar� i�in Kullan�c� Ad�');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM sistem mesajlar�n� destekler. Sistem mesajlar�n�n g�ndericileri g�r�nmez ve kullan�c�lar cevaplayamazlar. Buraya sistem mesajlar� i�in varsay�lan kullan�c�n�n takma ad�n� girin. (�rnek <i>Destek</i> veya <i>Yard�m Masas�</i> veya <i>Topluluk Y�neticisi</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Y�neticilerin genel mesaj g�nderimine izin');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM genel mesajlar� destekler. Bu mesajlar sistemdeki t�m kullan�c�lara kolayl�kla g�nderilir.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-posta g�nderenin ismi');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'E-posta bilgisinde mesaj�n kimden geldi�i girilebilir (�rnek <i>S�TE �SM�N�Z</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-posta g�nderenin adresi');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'E-posta bilgisinde emailin hangi adresten geldi�i girilebilir (bu sitenizin ana irtibat e-posta adresi olacakt�r.)');
DEFINE ('_UDDEADM_VERSION', 'uddeIM s�r�m�');
DEFINE ('_UDDEADM_ARCHIVE', 'Ar�iv'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Ar�ivi etkinle�tir');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Kullan�c�lar�n mesajlar�n� depolayabilecekleri bir ar�ive izin verilip verilmeyece�ini se�in. Ar�ivdeki mesajlar silinmeyecektir.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Kullan�c� ar�ivindeki azami mesaj say�s�');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Kullan�c�lar�n ar�ivde ka� mesaj depolayabileceklerini g�sterir (y�neticiler i�in s�n�r yoktur).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Mesaj Kopyas� �zni');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Kullan�c�lara g�nderdikleri mesajlar�n kopyas�n� alma izni. Bu kopyalar gelen kutusunda bulunacaklard�r.');
DEFINE ('_UDDEADM_MESSAGES', 'Mesajlar');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Asl�n� ��p kutusuna ta�� uyar�s�');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', '\'G�nder\' d��mesi yan�ndaki \'asl�n� ��p kutusuna ta��\' kontrol kutusu varsay�lan olarak i�aretlemi�tir. Bu durumda, mesaj cevap g�nderildikten hemen sonra ��p kutusuna ta��nacakt�r. Bu �zellik mesajlar�n veritaban�nda daha az yer kaplamas�na yarayacakt�r. Kullan�c�lar bu kutudaki i�areti kald�rarak mesaj�n gelen kutusunda kalmas�n� sa�layabilir.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Sayfadaki Mesaj Say�s�');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Gelen kutusu, giden kutusu, ��p kutusu ve ar�ivdeki mesajlar�n her sayfada ka� adet g�r�nt�lenece�i.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Karakter seti kullan�m�');
DEFINE ('_UDDEADM_CHARSET_EXP', 'E�er latin karakterlerin d���ndaki karakterlerde problem ya��yorsan�z, karakter seti buraya girerek uddeIM in veritaban�nda gerekli �eviriyi yapmas�n� sa�layabilirsiniz. <b>E�er bunun ne anlama geldi�ini bilmiyorsan�z, varsay�lan de�erlerde de�i�iklik yapmay�n!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Kullan�lan mail karakter seti');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'E�er latin karakterlerin d���ndaki karakterlerde problem ya��yorsan�z, karakter seti buraya girerek uddeIM in g�nderilen e-maillerde gerekli de�i�ikli� yapmas�n� sa�layabilirsiniz. <b>E�er bunun ne anlama geldi�ini bilmiyorsan�z, varsay�lan de�erlerde de�i�iklik yapmay�n!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', '��erikle ilgili kullan�c�n�n alaca�� e-mail ayar� yukar�dad�r. ��erik e-mail i�erisinde olmayacakt�r. Al�nacak de�i�kenler %you%, %user% ve %site% olacakt�r. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', '��erikle ilgili kullan�c�n�n alaca�� e-mail ayar� yukar�dad�r. Bu e-mail mesaj mesaj� da i�erisinde ta��yacakt�r. Al�nacak de�i�kenler %you%, %user%, %pmessage% ve %site% olacakt�r. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Kullan�c�n�n alaca�� hat�rlatma e-maili ile ilgili ayarlar yukar�dad�r. Al�nacak de�i�kenler %you% ve %site% olacakt�r. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', '�zin verilirse kullan�c�lar mesajlar�n� ar�ivlerinden indirerek, kendilerine e-mail olarak g�nderebilirler.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Dosya indirme izni');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Kullan�c�lar�n,  ar�ivden mesajlar� indirdiklerinde alacaklar� e-posta �eklidir. Al�nacak de�i�kenler %user%, %msgdate% ve %msgbody% olacakt�r. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Gelen kutusu kapasite ayar�');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Gelen kutusu ve ar�ivde bekletilebilecek mesajlar�n say�s�n� buraya girebilirsiniz. Bu durumda, gelen kutusu ve ar�ivdeki mesajlar�n�z bu say�y� ge�memelidir. Alternatif olarak , gelen kutusunun mesaj s�n�r�n� ar�ivden ayr� da belirleyebilirsiniz. Bu durumda, kullan�c�lar belirlenen say�n�n �zerindeki mesajlar�n� gelen kutusuna alamayacaklard�r. E�er gelen kutusunda bekleyen mesaj say�s� fazla ise, mesajlar� cevaplamak i�in fazla bekleyemeyeceklerdir veya yeni mesajlar i�in eski mesajlar�n� gelen kutusu veya ar�ivden s�ras�yla silmek zorunda kalacaklard�r. (Kullan�c�lar ald�klar� mesajlar� bekletmeden okuyacaklard�r.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Gelen kutusu kapasitesini g�ster');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Gelen kutusunun alt�nda, kullan�c�n�n ka� mesaj depolad���n� (ve ka� adet depolayabileceklerini) g�sterir.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Ar�ivi kapatt�n�z. Ar�ivde kay�tl� olan mesajlar� nas�l y�netmek istersiniz?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Onlar� B�rak');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Onlar� ar�ivde b�rak (kullan�c� mesajlara eri�emeyecektir ve onlar mesaj limitinden say�lacakt�r).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Gelen kutusuna ta��');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Ar�ivdeki mesajlar gelen kutusuna ta��nd�');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Mesajlar�n herbiri ayr� ayr� kullan�c�n�n gelen kutusuna ta��nacakt�r (veya gelen kutusunda bulunma s�relerini a�m��larsa ��p kutusuna g�nderileceklerdir).');		

		
// 0.4 frontend, admins only (no translation necessary)	
DEFINE ('_UDDEIM_VALIDFOR_1', 'ge�erlilik s�resi ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' saat. 0=s�rekli (otomatik silme uygula)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Site Y�neticileri veya Genel i�in mesaj olu�tur]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Normal (standard) bir mesaj olu�tur]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Sistem mesaj� ve genel mesajlara izin verilmedi.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Mesaj Tipi');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Mesaj sistemi yard�m�');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(yeni pencerede a��l�r)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'A�a��daki mesaj� g�ndermek istiyorsunuz. L�tfen iyice inceledikten sonra g�nderin veya iptal edin!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Mesaj <strong>b�t�n kullan�c�lara</strong> g�nderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Mesaj <strong>b�t�n y�neticilere</strong> g�nderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Mesaj <strong>b�t�n �evrimi�i kullan�c�lara</strong> g�nderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Al�c�lar bu mesaj� cevaplamayabilir.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Mesaj <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> kullan�c� ad� ile g�nderilecektir');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Mesaj s�resi dolacak ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Mesaj s�resi dolmayacak');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>��lemden �nce (�zerine t�klayarak) linki kontrol edin!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Sadece <strong>Sistem mesajlar� i�in kullan�l�r</strong>:<br> [b]<strong>kal�n</strong>[/b] [i]<em>sa�a yat�k</em>[/i]<br>
[url=http://www.url.com]some url[/url] veya [url]http://www.url.com[/url] �eklinde kullan�l�r');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Hata: Al�c� bulunamad�. Mesaj g�nderilemedi.');		

DEFINE ('_UDDEIM_CANTREPLY', 'Bu mesaj� cevaplayamazs�n�z.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail bildirimi kapal�. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail bildirimi a��k. ');
DEFINE ('_UDDEIM_SETEMNON', '[A�]');
DEFINE ('_UDDEIM_SETEMNOFF', '[Kapat]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Merhaba %you%,\n\n%user% kullan�c�s� %site% sitesinden size bir �zel mesaj g�nderdi. L�tfen okumak i�in giri� yap�n!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Merhaba %you%,\n\n%user% kullan�c�s� %site% sitesinden size a�a��daki �zel mesaj� g�nderdi. Cevaplamak i�in l�tfen giri� yap�n!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Merhaba %you%,\n\n%site% sitesinde okunmam�� �zel bir mesaj�n�z bulunmaktad�r. L�tfen mesaj�n�z� okumak i�in giri� yap�n! ");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', '%site% sitesinden mesaj�n�z var');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'site y�neticilerine g�nderilecek(=al�c� cevaplamayabilir)');
DEFINE ('_UDDEIM_SEND_TOALL', 'b�t�n kullan�c�lara g�nder');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'b�t�n y�neticilere g�nder');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'b�t�n �evrimi�i kullan�c�lara g�nder');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Beklenmedik hata: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Ar�iv etkin de�il.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Mesaj�n�z ar�ive depolanamad�.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Ar�ivinizde ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>mesaj�n�z bulunmamaktad�r.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Ar�ivinizde hi� mesaj yok.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' mesajlar');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Depolanm�� bir mesaj�n�z var');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Mesaj� kaydetmeden �nce, di�er mesajlar� silmelisiniz.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Kaydedebilece�iniz azami mesaj ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' mesajlar.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', '�u an ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' mesaj�n�z');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' message in your'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'ar�iv ve');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'gelen kutusu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'gelen kutusu ve ar�ivinizde bulunmaktad�r');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Azami izin verilen ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Ald���n�z mesajlar� bekletebilirsiniz ve okuyabilirsiniz fakat eski mesajlardan bir tane silmedik�e cevap yazamazs�n�z veya yeni bir tane mesaj olu�turamazs�n�z.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Depolanan Mesaj: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(Azami ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Mesaj ar�ive depoland�.');
DEFINE ('_UDDEIM_STORE', 'Ar�iv');		// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'geri');
DEFINE ('_UDDEIM_TRASHCHECKED', 'se�ileni sil');	// translators info: plural!	
DEFINE ('_UDDEIM_SHOWALL', 'hepsini g�ster');	// translators example "SHOW ALL messages"	
DEFINE ('_UDDEIM_ARCHIVE', 'Ar�iv');		// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Ar�iv dolu. Kaydedilemedi.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Mesaj se�ilmedi.');
DEFINE ('_UDDEIM_THISISACOPY', 'G�nderdi�iniz mesaj buraya kopyalanacak ');
DEFINE ('_UDDEIM_SENDCOPYTOME', ' bana kopyala');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'ar�ive kopyala');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'asl�n� ��p kutusuna g�nder');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Mesaj �ndirme');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Mesaj e-mail ile g�nderildi');
DEFINE ('_UDDEIM_EXPORT_NOW', 'se�ileni bana e-mail olarak g�nder');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Bu mail sizin �zel mesaj�n�z� ta��yor.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'E-mail mesaj kapsam�yor olabilir.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Mesaj s�n�r�! Geri al�namad�.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Mesaj yaz ');

$udde_smon[1]="Oca";
$udde_smon[2]="�ub";
$udde_smon[3]="Mar";
$udde_smon[4]="Nis";
$udde_smon[5]="May";
$udde_smon[6]="Haz";
$udde_smon[7]="Tem";
$udde_smon[8]="A�u";
$udde_smon[9]="Eyl";
$udde_smon[10]="Eki";
$udde_smon[11]="Kas";
$udde_smon[12]="Ara";

$udde_lmon[1]="Ocak";
$udde_lmon[2]="�ubat";
$udde_lmon[3]="Mart";
$udde_lmon[4]="Nisan";
$udde_lmon[5]="May�s";
$udde_lmon[6]="Haziran";
$udde_lmon[7]="Temmuz";
$udde_lmon[8]="A�ustos";
$udde_lmon[9]="Eyl�l";
$udde_lmon[10]="Ekim";
$udde_lmon[11]="Kas�m";
$udde_lmon[12]="Aral�k";

$udde_lweekday[0]="Pazar";
$udde_lweekday[1]="Pazartesi";
$udde_lweekday[2]="Sal�";
$udde_lweekday[3]="�ar�amba";
$udde_lweekday[4]="Per�embe";
$udde_lweekday[5]="Cuma";
$udde_lweekday[6]="Cumartesi";

$udde_sweekday[0]="Paz";
$udde_sweekday[1]="Pzt";
$udde_sweekday[2]="Sal";
$udde_sweekday[3]="�ar";
$udde_sweekday[4]="Per";
$udde_sweekday[5]="Cum";
$udde_sweekday[6]="Cmt";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Tema');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'uddeIM i�in kullanmak istedi�iniz temay� se�in');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'CB Ba�lant�lar�n� g�ster ');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Use <i>yes</i> if you have Community Builder installed and want to present the user the name of his/her connections on the compose new message page.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Ayarlar� G�ster');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'The Settings link appears in uddeIM if you have the e-mail-notification or the blocking system activated. E�er istemiyorsan�z buradan kapatabilirsiniz. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'evet, altta');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'BB kodlara izin ver');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'sadece yaz� sitilleri');
DEFINE ('_UDDEADM_ALLOWBB_EXP', '<i>sadece yaz� stilleri</i>, se�ildi�inde kullan�c�lar�n bb kodlar�nda kal�n, italik, �izgili, yaz� rengi ve boyutunu de�i�tirebilirler. <i>evet</i>, olarak ayarlad���n�zda kullan�c�lar <strong>t�m</strong> desteklenen BB kodlar�n� kullanabilirler (ba�lant�lar ve resimler).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'G�l�c�klere izin ver');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', '<i>evet</i>, olarak ayarlad���n�zda, g�l�c�k kodlar�ndaki bu :-) gibi simgeler yerine grafik g�l�c�kler gelecektir. Desteklenen g�l�c�kleri g�rmek i�in beni oku dosyas�na bak�n.');
DEFINE ('_UDDEADM_DISPLAY', 'G�r�n�m');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Men� simgelerini g�ster');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', '<i>evet</i>, ayarland���nda men� ve i�lem ba�lant�lar� bir simge ile g�r�nt�lenir.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Bile�en Ba�l���');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', '�zel mesajla�ma bile�eni i�in �st ba�l�k, �rne�in \'�zel Mesajlar\'. Ba�l�k olmas�n� istemezseniz bo� b�rak�n.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Hakk�nda ba�lant�s�n� g�ster');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Set to <i>yes</i> to show a link to the uddeIM software credits and license. Bu ba�lant� uddeIm HTML ��k���n�n alt�nda g�sterilir.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'E-Postay� �imdi durdur');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Uddeim in mail g�ndermesini engellemek i�in bu kutuyu i�aretleyin (e-mail-notifications and forgetmenot e-mails) irrespective of the users\' settings, for example when testing the site. If you do not want these features ever, set all options above to <i>no</i>.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails in lists');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Set to <i>yes</i> if you want to display the CB thumbnails of the users in the message lists overview (inbox, outbox, etc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', '�yeleri G�ster');
DEFINE ('_UDDEIM_CONNECTIONS', 'Ba�lant�lar');
DEFINE ('_UDDEIM_SETTINGS', 'Ayarlar');
DEFINE ('_UDDEIM_NOSETTINGS', 'There are no settings to adjust.');
DEFINE ('_UDDEIM_ABOUT', 'Hakk�nda'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Yeni Mesaj'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Posta-Habercisi');
DEFINE ('_UDDEIM_EMN_EXP', 'Yeni bir �zel mesaj ald���n�zda mailinize bilgi gelir.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Yeni mesaj geldi�inde mail g�nder');
DEFINE ('_UDDEIM_EMN_NONE', 'Yeni mesaj geldi�inde mail g�nderme');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', '�evrimd���yken mesaj gelirse mail g�nder');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Mesaj�n�za cevap geldi�inde mail yollama');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Kullan�c� Engelleme'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'You can prevent users from sending you messages by blocking them. Choose <i>block user</i> when you view a messages from the respective user.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'De�i�iklikleri Kaydet');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB Kod etiketi koyu/kal�n bir yaz� bi�imi verir. Kullan�m: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB Kod etiketi yat�k(italik) yaz� bi�imi verir. kullan�m: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB Kod etiketi alt� �izili yaz� bi�imi verir. kullan�m: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB Kod etiketi renklendirilmi� yaz� bi�imi verir. Kullan�m: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example FF0000 for red.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB Kod etiketi renklendirilmi� yaz� bi�imi verir. Kullan�m: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example 00FF00 for green.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB Kod etiketi renklendirilmi� yaz� bi�imi verir. Kullan�m: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example 0000FF for blue.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB Kod etiketi normalden daha k���k yaz� boyutu bi�imi verir. Kullan�m: [size=1]�ok k���k metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB Kod etiketi normalden k���k yaz� boyutu bi�imi verir. Kullan�m: [size=2] k���k metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB Kod etiketi normalden b�y�k yaz� boyutu bi�imi verir. Kullan�m: [size=4]b�y�k metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB Kod etiketi normalden daha b�y�k yaz� boyutu bi�imi verir. Kullan�m: [size=5]�ok b�y�k metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB Kod etiketi bir resim dosyas� yay�nlaman�z i�in link eklemenizi sa�lar. Kullan�m: [img]Resim-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB Kod etiketi bir web adresini g�stermenizi sa�lar. Kullan�m: [url]web adresi[/url]. T�m adreslerin ba��nda http:// kullanmay� unutmay�n.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'T�m a��k BB etiketlerini kapat.');
