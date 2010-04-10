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
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'UddeIM zamaný yanlýþ gösterdiðinde zaman dilimini buradan ayarlayabilirsiniz. Genellikle, sýfýr olarak ayarlandýðýnda herþey düzgündür. Yinede bu deðeri deðiþtirmeniz gerekebilir.');
DEFINE ('_UDDEADM_HOURS', 'saat');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Sürüm Bilgisi:');
DEFINE ('_UDDEADM_STATISTICS', 'Ýstatistikler:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Ýstatistikleri göster');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Burada kayýtlý mesajlar gibi bazý istatistikleri görebilirsiniz.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'ÝSTATÝSTÝKLERÝ GÖSTER');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Veritabanýnda kayýtlý mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Alýcýlar tarafýndan silinen mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Gönderenler tarafýndan silinen mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Messages on hold for purging: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Overwrite Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Usually uddeIM tries to detect the correct Itemid when it is not set. In some cases it might be necessary to overwrite this value, e.g. when you use several menu links to uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Detected Itemid is: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Use Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Use this Itemid instead of the detected one.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Profil baðlantýlarýný kullan');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Eðer <i>evet</i> seçerseniz, tüm kullanýcý adlarý uddeIM de kullanýcý profiline baðlantý olarak görünecektir.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Show thumbnails');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'When set to <i>yes</i>, the thumbnail of the respective user will be displayed when reading a message.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Show thumbnails in lists');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Set to <i>yes</i> if you want to display thumbnails of users in the message lists overview (inbox, outbox, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Kapalý');
DEFINE ('_UDDEADM_ENABLED', 'Açýk');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Önemli');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Mesaj etiketlemeye izin ver');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Allows message tagging (uddeIM shows a star in lists which can be highlighted to mark important messages).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Önemli: uddeIM önceki sürümlerden güncellendiyse, lütfen README dosyasýný kontrol edin. Bazen veritabaný tablo yada alanlarýnda ekleme yada deðiþiklik yapmanýz gerekebilir!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Add CC: line');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Alýntý metnini kýsalt');
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
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'özel kullanýcýlar');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'sadece yöneticiler');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Kullanýcý listesindeki gizlenecek kullanýcýlar');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Enter user IDs which should be hidden from public userlist (e.g. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Kullanýcý listesinde kullanýcýlarý gizle');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Enter user IDs which should be hidden from userlist (e.g. 65,66,67).');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF attack recognized');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF korumasý');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'This protects all forms against Cross-Site Request Forgery attacks. Usually this should be enabled. Only when you have strange problems switch it off.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Arþivdeki mesajlarý cevaplayamazsýnýz.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Replies to unregistered users can not be recalled.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Allow replies');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Allow direct replies to messages from public users.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Merhaba %user%,\n\n%you% has sent you the following private message at %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Gerçek isimleri göster');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Show realnames or usernames in public frontend?');
DEFINE ('_UDDEIM_USERLIST', 'Kullanýcý Listesi');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Üzgünüm, yeni mesaj göndermeden önce beklemelisiniz');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Son Gönderim');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Timedelay');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Time in seconds a user must wait before he can post the next message (0 for no time delay).');
DEFINE ('_UDDEADM_SECONDS', 'saniye');
DEFINE ('_UDDEIM_PUBLICSENT', 'Mesaj gönderildi.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Gönderen isminde hata');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'E-posta adresinde hata');
DEFINE ('_UDDEIM_YOURNAME', 'Ýsminiz:');
DEFINE ('_UDDEIM_YOUREMAIL', 'E-postanýz:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Kullandýðýnýz uddeIM sürümü ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'uddeIM en son sürmünü kullanýyorsunuz.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Þu andaki güncel sürüm ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Güncelleme Bilgisi:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Güncellemeleri kontrol et');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'This contacts uddeIM developer website to receive information about the current uddeIM version. Except the uddeIM version you use, no other personal information is transmitted.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'KONTROL ET');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Unable to receive version information.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Kiþi listesi bulunamadý!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Azami alýcý sýnýrý aþýldý (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Max. kayýt sayýsý');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Her kiþi listesi için azami kayýt sayýsý.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Kiþi listesi açýk deðil');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Kiþi listesi açýk');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM kullanýcýlarýn kiþi listesi oluþturmalarýna olanak verir. Bu listeleri çoklu mesaj gönderirken kullanabilirsiniz. Kiþi listesini kullanmak istiyorsanýz Çoklu alýcý özelliðini açmayý unutmayýn.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'kapalý');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'kayýtlý kullanýcýlar');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'özel kullanýcýlar');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'sadece yöneticiler');
DEFINE ('_UDDEIM_LISTSNEW', 'Yeni kiþi listesi oluþtur');
DEFINE ('_UDDEIM_LISTSSAVED', 'Kiþi listesi kaydedildi');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Kiþi listesi güncellendi');
DEFINE ('_UDDEIM_LISTSDESC', 'Açýklama');
DEFINE ('_UDDEIM_LISTSNAME', 'Ýsim');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Ýsim (boþluksuz)');
DEFINE ('_UDDEIM_EDITLINK', 'düzenle');
DEFINE ('_UDDEIM_LISTS', 'Kiþiler');
DEFINE ('_UDDEIM_STATUS_READ', 'okunmuþ');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'okunmamýþ');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'çevrimiçi');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'çevrimdýþý');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'CB galeri resimlerini göster');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Varsayýlan olarak uddeIM sadece kullanýcýlarýn yüklediði avatarlarý gösterir. Bu ayarý açtýðýnýzda uddeIM CB avatars galerisindeki resimleride görüntüler.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Unblock CB connections');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'You can allow messages to recipients when the registered user is on the recipients CB connection list (even when the recipient is in a group which is blocked). This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'You are not allowed sending to this group.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Alýcý sizi engellemiþ.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Engellenen gruplar (kayýtlý kullanýcýlar)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Groups to which registered users are not allowed to send messages to. This is for registered users only. Special users and admins are not affected by this setting. This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Engellenen Gruplar (public users)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Groups to which public users are not allowed to send messages to. This setting is independent from the individual blocking each user can configure when enabled (see settings above). When you block a group, users in this group cannot see the the option to enable the public frontend in their profile settings.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Public user');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB connection');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Kayýtlý kullanýcý');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Author');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Kullanýcý sadece kayýtlý kullanýcýlardan gelen mesajlarý kabul ediyor.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Hide from public "All users" list');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the public "All users" list. Note: this hides the names only, the users can still receive messages. Users who have not enabled Public Frontend will never be listed in this list.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Hide from "All users" list');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the "All users" list. Note: this hides the names only, the users can still receive messages.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'yok');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'sadece superadminler');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'sadece yöneticiler');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'özel kullanýcýlar');
DEFINE ('_UDDEADM_PUBLIC', 'Public');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed in Public Frontend, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Public Frontend');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- select public -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Allow public users to send a message');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Mesaj sýnýrý aþýldý!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Public user');
DEFINE ('_UDDEIM_DELETEDUSER', 'User deleted');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha uzunluðu');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Kullanýcýnýn kaç karakter gireceðini belirler.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam korumasý');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Mesaj gönderirken kimin captcha gireceðini belirler');
DEFINE ('_UDDEADM_CAPTCHAF0', 'disabled');
DEFINE ('_UDDEADM_CAPTCHAF1', 'public users only');
DEFINE ('_UDDEADM_CAPTCHAF2', 'public and registered users');
DEFINE ('_UDDEADM_CAPTCHAF3', 'public, registered, special users');
DEFINE ('_UDDEADM_CAPTCHAF4', 'tüm kullanýcýlar (yöneticiler dahil)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Enable public frontend');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'When enabled public users can send messages to your registered users (those can specify in their personal settings of they want to use this feature).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Public frontend default');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'This is the default value if a public user is allowed to send a message to a registered user.');
DEFINE ('_UDDEADM_PUBDEF0', 'disabled');
DEFINE ('_UDDEADM_PUBDEF1', 'enabled');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Hatalý güvenlik kodu');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'yok yada bilinmeyen');
DEFINE ('_UDDEADM_DONATE', 'If you like uddeIM and want to support the development please make a small donation.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Veritabanýnda yapýlandýrma bulundu: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Yapýlandýrmayý yedekle ve geri yükle');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Yapýlandýrmanýzý veritabanýna yedekleyebilir ve gerekli olduðunda geri alabilirsiniz. Bu özellik uddeIM güncellerken yada deneme yapmak için ayarlarýnýzý deðiþtirdiðinizde kullanýþlý olabilir.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'YEDEKLE');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'GERÝ YÜKLE');
DEFINE ('_UDDEADM_CANCEL', 'Ýptal');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Dil dosyasý karakter seti');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Genellikle <strong>varsayýlan</strong> (ISO-8859-1) Joomla 1.0 için doðru ayardýr ve <strong>UTF-8</strong> Joomla 1.5. için');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'varsayýlan');
DEFINE ('_UDDEIM_READ_INFO_1', 'Okunmuþ mesajlar gelen kutusundan otomatik olarak silinmeden önce max. ');
DEFINE ('_UDDEIM_READ_INFO_2', ' gün tutulur.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Okunmamýþ mesajlar gelen kutusundan otomatik olarak silinmeden önce max. ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' gün tutulur.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Gönderilmiþ mesajlar giden kutusundan otomatik olarak silinmeden önce max ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' gün tutulur.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Okunmuþ mesajlar için gelen kutusunda bilgi göster');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Gelen kutusunda bilgi göster "Okunmuþ mesajlar n gün sonra silinir"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Okunmamýþ mesajlar için Gelen kutusunda bilgi göster');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Gelen kutusunda bilgi göster "Okunmamýþ mesajlar n gün sonra silinir"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Gönderilen mesajlar için giden kutusunda bilgi göster');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Giden kutusunda bilgi göster "Giden mesajlar n gün sonra silinir"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Çöpteki mesajlar için çöp kutusunda bilgi göster');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Çöp kutusunda bilgi göster "Çöp kutusundaki mesajlarý n gün sonra yoket"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Gönderilen mesajlarý tut (gün)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', '<b>Gönderilen</b> mesajlarýn giden kutusundan kaç gün sonra otomatik olarak silineceðini giriniz.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'tüm özel kullanýcýlara gönder');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', '<strong>tüm özel kullanýcýlara</strong> Mesaj');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- kullanýcý adý seç -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- isim seç -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Kullanýcý ayarlarýný düzenle');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'mevcut olan');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'mevcut olmayan');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- giriþ seç -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- bilgilendirme seç -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- popup seç -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Kullanýcý Adý');
DEFINE ('_UDDEADM_USERSET_NAME', 'Ýsim');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Bilgilendirme');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Son giriþ');
DEFINE ('_UDDEADM_USERSET_NO', 'Hayýr');
DEFINE ('_UDDEADM_USERSET_YES', 'Evet');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'bilinmeyen');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Çevrimdýþýyken (cevaplar hariç)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Herzaman (cevaplar hariç)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Çevrimdýþýyken');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Her zaman');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Bilgilendirme yok');
DEFINE ('_UDDEADM_WELCOMEMSG', "uddeIM!e Hosgeldiniz\n\nBasariyla uddeIM Kuruldu.\n\nFarkli temalar ile bu mesaji goruntulemeyi deneyin. UddeIM yonetim bolumunden ayarlayabilirsiniz.\n\nuddeIM gelisen bir projedir. Eger hata yada eksik bulursaniz, UddeIMi beraber daha iyi yapmak icin lütfen bana yazýn.\n\nIyi sanslar ve eglenceler!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM kurulumu tamamlandý.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Lütfen yönetim panelinden devam edin ve ayarlarýnýzý gözden geçirin.');
DEFINE ('_UDDEADM_REVIEWLANG', 'If you are running the CMS in a character set other than ISO 8859-1 make sure to adjust the settings accordingly.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Kurulumdan sonra, tüm uddeIM e-posta trafiði (e-posta bildirimleri, beni unutma e-mailleri) kapalýdýr deneme yaparken e-posta gönderilmez. Bitirdiðinizde "e-postayý durduru" yönetim bölümünden kapatmayý unutmayýn.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. alýcýlar');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Her mesaj için izin verilen azami alýcý sayýsý (0=sýnýrlama yok)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'çok fazla alýcý');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Sending of emails disabled.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Metin içinde arama');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Otomatik tamamlayýcýnýn metin içinde arama yapabilmesi (aksi taktirde sadece baþlangýcýnda arama yapar)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', '"Tüm Üyeler" baðlantýsý durumu');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', '"Tüm üyeler" baðlantýsýný gizle');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', '"Tüm üyeler" baðlantýsýný göster');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Herzaman tüm üyeleri göster');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Yapýlandýrma yazýlamaz:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Yapýlandýrma yazýlabilir:');
DEFINE ('_UDDEIM_FORWARDLINK', 'ilet');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'alýcý bulundu');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'alýcýlar bulundu');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (varsayýlan)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Mail sistemi');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'UddeIM bilgilendirmeleri gönderirken kullanacaðý mail sistemini seçin.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Joomla gruplarýný göster');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Joomla gruplarýný genel mesaj listesinde göster.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Ýletilen mesaj');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Mesajlarýn yönlendirilmesine izin ver.');
DEFINE ('_UDDEIM_FWDFROM', 'Orjinal mesajý gönderen');
DEFINE ('_UDDEIM_FWDTO', 'kime');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Arþivden geri al');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Mesaj arþivden geri alýnamadý');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Çoklu alýcýya izin ver');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Çoklu alýcýya izin ver (virgülle ayrýlarak).');
DEFINE ('_UDDEIM_CHARSLEFT', 'karakter kaldý');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Metin sayacýný göster');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Kaç karakter kaldýðýný görüntülemek için metin sayacýný açýn.');
DEFINE ('_UDDEIM_CLEAR', 'Temizle');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Seçilen kullanýcýlarý alýcýlara ekle');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Bu "Tüm üyeler" listesinden çoklu seçim yapmayý olanaklýkýlar.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Baðlantýlar listesinden ekle');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Bu çoklu alýcý eklemeye izin verir.');
DEFINE ('_UDDEADM_PMSFOUND', 'Bulunan PMS: ');
DEFINE ('_UDDEIM_ENTERNAME', 'bir isim girin');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Otomatik tamamlamayý kullan');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Alýcý isimleri için otomatik tamamlamayý kullan.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Key used for obfuscating');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Enter key which is used for message obfuscating. Do not change this value after message obfuscating has been enabled.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Yanlýþ yapýlandýrma dosyasý!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Bulunan sürüm:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version expected:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Converting configuration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Tamam!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Kritik hata: Yapýlandýrma dosyasýna yazmakta hata:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Encrypted message! - indirme olanaksýz!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Yanlýþ Parola! - indirme olanaksýz!');
DEFINE ('_UDDEIM_WRONGPW', 'Yanlýþ Parola! - Lütfen veritabaný yöneticisiyle iletiþim kurun!');
DEFINE ('_UDDEIM_WRONGPASS', 'Yanlýþ Parola!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Yanlýþ silinme tarihi (gelen kutusu/giden kutusu): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Yanlýþ silinme tarihini düzelt');
DEFINE ('_UDDEIM_TODP', 'Kime: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Tüm mesajlarý þimdi yoket');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Ýþlem simgelerini göster');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', '<i>evet</i>, ayarlandýðýnda iþlem baðlantýlarý bir simge ile gösterilir.');
DEFINE ('_UDDEIM_UNCHECKALL', 'hepsini býrak');
DEFINE ('_UDDEIM_CHECKALL', 'hepsini seç');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Alt simgeleri göster');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', '<i>evet</i>, ayarlandýðýnda alt kýsýmdaki baðlantýlar bir simge ile görüntülenir.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Hareketli gülücük kullan');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Hareketsiz gülücükler yerine hareketli olanlarý kullanýn.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Daha fazla hareketli gülücük');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Daha fazla hareketli gülücük göster.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Encrypted message - Parola gerekli');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Parola gerekli</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Parola');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (encryption text)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (decryption text)');
DEFINE ('_UDDEIM_MORE', 'DAHA');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Özel Mesajlar');
DEFINE ('_UDDEMODULE_NONEW', 'yeni yok');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Yeni mesajlar: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'mesaj');
DEFINE ('_UDDEMODULE_MESSAGES', 'mesajlar');
DEFINE ('_UDDEMODULE_YOUHAVE', 'You have');
DEFINE ('_UDDEMODULE_HELLO', 'Merhaba');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Hýzlý Mesaj');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Use encryption');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Encrypt stored messages');
DEFINE ('_UDDEADM_CRYPT0', 'Yok');
DEFINE ('_UDDEADM_CRYPT1', 'Obfuscate messages');
DEFINE ('_UDDEADM_CRYPT2', 'Encrypt messages');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Varsayýlan E-posta bildirimi');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'E-Posta bildirimi için varsayýlan deðer (kullanýcýlar kendi ayarlarýný deðiþtirebilirler).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Bildirim Yok');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Herzaman');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Çevrimdýþýyken bildir');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Supress "All users" link');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Supress "All users" link in write new message box (useful when lots of users are registered).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup bildirim');
DEFINE ('_UDDEADM_POPUP_EXP','Yeni mesaj geldiðinde popup pencerede göster ( mod_cblogin yamasý gerekli )');
DEFINE ('_UDDEIM_OPTIONS', 'Daha fazla ayar');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Burada biraz daha ayar bulabilirsiniz.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Yeni mesaj geldiðinde popup ile göster');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup bildirimi varsayýlan');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Enable popup notification by default (for users who have not changed their preferences yet).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Bakým');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Veritabaný bakýmý');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'KONTROL');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'ONAR');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', 'Bir kullanýcý veritabanýndan silindiðinde mesajlarý veritabanýnda kalýr. This function checks if it is necessary to trash orphaned messages and you can trash them if it is required.');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', 'Kontrol ediliyor...<br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (Kullanýcý adý): [inbox|inbox trashed|outbox|outbox trashed]</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>gelen kutusu: messages stored in users inbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>gelen kutusu silinen: messages trashed from users inbox, but still in someones outbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>giden kutusu: messages stored in users outbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>giden kutusu silinen: messages trashed from users outbox, but still in someones inbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', 'Siliniyor...<br>');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "bulunamadý (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "üyenin tüm ayarlarýný sil");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "delete blocking of user");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "trash all messages sent to deleted user in sender\'s outbox and deleted user\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "trash all messages sent from deleted user in his outbox and receiver\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nothing to do<b><br>');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Bakým gerekli<b><br>');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Gerçek isimleri göster');
DEFINE ('_UDDEADM_NAMESDESC', 'Gerçek isim yada kullanýcý adlarýný göster?');
DEFINE ('_UDDEADM_REALNAMES', 'Gerçek isimler');
DEFINE ('_UDDEADM_USERNAMES', 'Kullanýcý adý');
DEFINE ('_UDDEADM_CONLISTBOX', 'Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Baðlantýlarýmý liste yada tablo þeklinde göster?');
DEFINE ('_UDDEADM_LISTBOX', 'Liste');
DEFINE ('_UDDEADM_TABLE', 'Tablo');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Mesaj 24 saat içerisinde silinmezse geçici olarak çöp kutusuna gönderilecektir. Mesajýn sadece birinci kelimesine görebilirsiniz. Onu tam olarak okumak için geri alýnýz.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Silinen mesajlar ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' saat geçici olarak çöp kutusunda bekleyecektir. Buradaki mesajlarýn sadece birinci kelimesine görebilirsiniz. Onu tam olarak okumak için geri alýnýz.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Bu mesaj geri alýndý. Siz yeniden düzenleyebilir ve tekrar gönderebilirsiniz.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Mesaj geri getirilemedi (büyük bir ihtimalle okundu veya silindi.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Mesaj geri alýmý baþarýsýz. (Burada gereðinden fazla kaldýðý için silindi. Þu anda çöp kutusunda olabilir.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Mesaj geri alýmý baþarýsýz.');
DEFINE ('_UDDEIM_DONTSEND', 'Gönderme');
DEFINE ('_UDDEIM_SENDAGAIN', 'Yeniden Gönder');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Giriþ yapmamýþsýnýz.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Gelen Kutunuzda hiç mesaj yok.</strong>');
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Giden kutusunda mesajýnýz yok.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Çöp kutusunda mesajýnýz yok.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Gelen Kutusu');
DEFINE ('_UDDEIM_OUTBOX', 'Giden Kutusu');
DEFINE ('_UDDEIM_TRASHCAN', 'Çöp Kutusu');
DEFINE ('_UDDEIM_CREATE', 'Yeni Mesaj');
DEFINE ('_UDDEIM_UDDEIM', 'Özel Mesajlar');
DEFINE ('_UDDEIM_READSTATUS', 'Oku');
DEFINE ('_UDDEIM_FROM', 'Kimden');
DEFINE ('_UDDEIM_TO', 'Kime');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Giden Kutusu, silmemiþ iseniz gönderdiðiniz tüm mesajlarý içerir. Eðer Giden Kutunuzda bir mesaj okunmamýþsa geri çaðýra bilirsiniz. Bu alýcý tarafýndan uzun bir süre okunmamýþsa kullanýlabilir. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'Geri Al');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Bu mesajý geri al');
DEFINE ('_UDDEIM_RESTORE', 'Geri Al');
DEFINE ('_UDDEIM_MESSAGE', 'Mesaj');
DEFINE ('_UDDEIM_DATE', 'Tarih');
DEFINE ('_UDDEIM_DELETED', 'Silinme');
DEFINE ('_UDDEIM_DELETE', 'sil');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'Sil');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Bu mesaj görüntülenemiyor. <br>Muhtemel Sebepler:<ul><li>Bu özel mesajý okumaya yetkiniz yoktur.</li><li>Mesaj silinmiþ.</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Bu mesajý çöp kutusuna taþýyabilirsiniz.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Mesajý gönderen ');
DEFINE ('_UDDEIM_MESSAGETO', 'Mesaj kendinizden ');
DEFINE ('_UDDEIM_REPLY', 'Cevapla');
DEFINE ('_UDDEIM_SUBMIT', 'Gönder');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Asýl mesajý cevapladýktan sonra çöp kutusuna taþý');
DEFINE ('_UDDEIM_NOID', 'Hata: Alýcý ID bulunamadý. Mesaj gönderilmedi.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Hata: Mesaj metni yok! Mesaj gönderilmedi.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Cevap Gönderildi');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Mesaj Gönderildi.');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' ve asýl mesaj çöp kutusuna taþýndý');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Bu kullanýcý adý ile bir kullanýcý yok!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Kendinize mesaj gönderemezsiniz!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Eriþim Ýhlali!</b> Bu iþlem için izniniz yok!');
DEFINE ('_UDDEIM_PRUNELINK', 'Sadece Yönetici: Burada Kesildi');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Yönetimi');
DEFINE ('_UDDEADM_GENERAL', 'Genel');
DEFINE ('_UDDEADM_ABOUT', 'Hakkýnda');
DEFINE ('_UDDEADM_DATESETTINGS', 'Tarih/Saat');
DEFINE ('_UDDEADM_PICSETTINGS', 'Simgeler');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Okunmuþ mesajlarý tut (gün)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Okunmamýþ mesajlarý tut (gün)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Mesajlarý çöp kutusunda tut (gün)');
DEFINE ('_UDDEADM_DAYS', 'gün');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', '<b>Okunan</b> mesajlar gelen kutusundan otomatik olarak kaç gün sonra silinecektir. Eðer mesajýn otomatik olarak silinmesini istemiyorsanýz, çok yüksek bir deðer girin (örnek, 36524 bir yüzyýl). Fakat sürenin uzun tutulmasý veritabanýnýzýn hýzla dolmasýna sebep olacaktýr.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Henüz <b>Okunmamýþ</b> mesajlarýn tutulacaðý gün sayýsý. Fakat bunu alýcýlarýn mesajlarý hangi sýklýkda okuduklarýna göre ayarlanmalýdýr.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Çöp kutusundaki mesajlarýn kaç gün sonra silineceðidir. Buradaki deðerin 1 den küçük olmasý uygundur Mesela: Mesajlarýn 3 saat sonra çöp kutusunda silinmesini istersek, deðer olarak 0.125 girmemiz gerekir.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Tarih görüntü formatý');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Mesaj tarih/saat görünümünün nasýl olmasý gerektiðini seçin. Aylar Joomlanýn yerel dil ayarlarýna göre kýsaltýlacaktýr (eðer uddeIM dil dosyasý ile uyumluysa).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Uzun tarih görünümü');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Mesajlarda uzun tarih biçiminin görünmesi için, mesaj açýldýðýnda görüntülenecek tarih formatýný seçin. Haftanýn günleri ve ay isimleri, Joomlanýn yerel dil ayarlarýna göre yapýlacaktýr (eðer uddeIM dil dosyasý ile uyumluysa).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Silme iþlemi sadece yönetici tarafýndan yapýlsýn');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'evet, sadece yönetici');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'hayýr, hiç bir kullanýcý');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'elle');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Otomatik silme iþlemi sunucular ve veritabanlarýna aþýrý yük getirir. Eðer <i>evet,&nbsp;sadece&nbsp;yönetici</i> seçilirse; otomatik silme iþlemi ayarlarý þöyle olmalýdýr (tüm kullanýcýlarýn\' mesajlarý için). Bu seçeneði, yönetici gelen kutusunu yaklaþýk günde bir defa veya daha fazla kontrol ederse seçilmelidir. (Eðer sitenin bir yöneticisi varsa, yönetici tarafýndan bu seçenek tercih edilmemelidir.) Bu sayý az ise veya yöneticiler gelen kutularýna arada sýrada bakýyorlarsa, <i>hayýr,&nbsp;hiçbir&nbsp;kullanýcý</i> seçilmelidir. Eðer bu anlaþýlmadýysa veya nasýl yapýlacaðý bilinemiyorsa, <i>hayýr, hiçbir kullanýcý</i> seçilmelidir.');

	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Ayarlarý Kaydet');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Ayarlarýn kaydedildiði dosya:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Ayarlar kaydedildi.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Simge: Kullanýcý çevrimiçi');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Kullanýcý çevrimiçi olduðunda kullanýcý adýnýn yanýnda bu simge görünecektir.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Simge: Kullanýcý çevrimdýþý');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Kullanýcý çevrimdýþý olduðunda kullanýcý adýnýn yanýnda bu simge görünecektir.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Simge: Mesaj okunmuþ');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Okunmuþ mesaj için bu simge görünecektir.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Simge: Okunmamýþ mesaj');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Okunmamýþ mesaj için bu simge görünecektir.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modül: Yeni Mesaj Ýkonu');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Burasý mod_uddeim_new modülüne baþvuracaktýr. Yeni mesaj olduðunda modül ekrana bu simgeyi getirecektir.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM kurulum');
DEFINE ('_UDDEADM_FINISHED', 'Kurulum tamamlandý. uddeIM e Hoþgeldiniz. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Joomla Community Builder yüklü deðil. uddeIM\'i kullanamayacaksýnýz.</span><br><br><a href="http://www.joomlapolis.com/">Community Builder</a>\'ý indirebilirsiniz.');
DEFINE ('_UDDEADM_CONTINUE', 'devam');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Sizin ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' mesajýnýz eski PMS içerisinde bulunuyor. Onlarý uddeIM\'e almak ister misiniz?');
DEFINE ('_UDDEADM_IMPORT_EXP', ' PMS mesajlarýnýzý veya sizin yüklediklerinizi deðiþtirmeyecektir. Onlar saðlam olarak alýnacaktýr. Onlarý güvenli bir þekilde uddeIM\'e alabilirsiniz, even if you consider to continue using the old PMS. You should save any changes you made to the settings first before running the import! Any messages that are already in your uddeIM database will remain intact.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Eski PMS mesajlarýnýzý þimdi uddeIM\'e aktar');
DEFINE ('_UDDEADM_IMPORT_NO', 'Hayýr, hiçbir mesajý alma');  
DEFINE ('_UDDEADM_IMPORTING', 'Lütfen kýsa bir süre bekleyin, mesajlar alýnýyor.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Eski PMS\'den mesaj alýmý tamamlandý. Bu betiði tekrar çalýþtýrmayýn, çünkü ayný mesajlarý yeniden alýrsýnýz ve iki defa gözükür.'); 
DEFINE ('_UDDEADM_IMPORT', 'Dýþarýdan Al');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Mesajlarý eski PMS\'den al.');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Baþka bir PMS yüklü deðil. Alým mümkün deðil.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Zaten mesajlar eski PMS\'den uddeIM\'e alýnmýþ.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Engellenmiþ');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Gönderilmedi. (kullanýcýyý engellemiþsiniz)');
DEFINE ('_UDDEIM_BLOCKNOW', 'Kullanýcýyý engelle');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Engellediðiniz kullanýcýlarýn listesidir. Bu kullanýcýlar size özel mesaj gönderemeyecekler.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Þu anda engellediðiniz kullanýcý yok.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Engellemiþ olduðunuz ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' kullanýcý(lar).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[engelleme kaldýr]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Eðer engellenmiþ bir kullanýcý size mesaj göndermeye çalýþýrsa, Ona engellendiði bilgisi ve mesaj gönderemeyeceði bildirilecektir.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Engellenmiþ bir kullanýcý kendisini engelleyeni göremez.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Yöneticileri engelleyemezsiniz.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Engelleme sistemi yetkisi');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Yetki verildiðinde, kullanýcýlar diðer kullanýcýlarý engelleyebilir. Engellenmiþ bir kullanýcý, kendisini engelleyen kullanýcýya mesaj gönderemez. Yöneticiler engellenemez.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'evet');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'hayýr');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Engellenmiþ kullanýcý mesaj alsýn');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Eðer <i>evet</i> seçilirse, engellenmiþ kullanýcý mesaj bilgilerini alacak ama gönderemeyecektir. Çünkü alýcý onu engellemiþtir. Eðer <i>hayýr</i> seçilirse, engellenmiþ kullanýcý herhangi bir mesaj gönderemeyecek ve alamayacaktýr.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'evet');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'hayýr');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Engelleme sistemi etkin deðil');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Silinenler'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Engelleme');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Entegrasyon');
DEFINE ('_UDDEADM_EMAIL', 'E-posta');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'CB linklerini göster');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', '<i>Evet</i> seçilirse, bütün kullanýcýlar uddeIM ekranýnda Community Builder bilgileri ile iliþkili olarak gösterilecektir.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'CB thumbnail göster');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', ' <i>evet</i> seçildiði zaman, kullanýcý kiþisel mesajýný okuduðu zaman mesajý gönderenin küçük resmi görünecektir. (eðer kullanýcýnýn Community Builder bilgisinde bir resmi varsa).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Çevrimiçi durumu göster');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', ' <i>evet</i> seçildiði zaman, uddeIM ekranýnda her kullanýcý için bu kullanýcýnýn çevrimiçi veya çevrimdýþý olduðunu gösteren küçük bir ikon görüntülenecektir. Bu ikonlarý yönetici alanýndan seçebilirsiniz.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'E-posta bildirimine izin');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', ' <i>evet</i> seçildiði zaman, her kullanýcý gelen kutusuna yeni bir mesaj geldiðini e-posta ile haber alacaktýr.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-posta mesajý da taþýsýn');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', ' <i>hayýr</i> seçilirse, e-posta sadece mesajýn kimden ve ne zaman gönderildiði bilgisini verecektir, mesaj e-posta içerisinde bulunmayacaktýr.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Hatýrlatma e-postasý');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Gönderilerdeki bu özellik - kullanýcýlar için sizin yapacaðýnýz bir ayardýr - kullanýcý gelen kutusundaki bir mesaj uzun zaman okunmazsa (ayar aþaðýdadýr). Bu ayrý bir ayardýr ve \'e-posta bildirim izni\' ayarý üsttedir. Eðer hiçbir zaman e-posta mesajý göndermek istemiyorsanýz, her ikisini de kapatmalýsýnýz.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Kaç gün sonra hatýrlatma yapýlacak');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Eðer hatýrlatma özelliði (yukarýda) ayarý <i>evet</i> olursa, kaç gün sonra okunmamýþ mesaj olduðu bilgisi e-posta gönderisi buradan girilecektir.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Ýlk Listelenecek Karakter Sayýsý');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Gelen kutusu, giden kutusu ve çöp kutusu için mesajýn kaç karakter görüntüleneceðini buradan girin.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Azami Mesaj Uzunluðu');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Mesajýn azami uzunluðunu buraya girin. Herhangi bir mesaj için uzunlýk \'0\' (tavsiye edilmez). Otomatik olarak baþlangýþ kýsmýndan kesilecektir. ');
DEFINE ('_UDDEADM_YES', 'evet');
DEFINE ('_UDDEADM_NO', 'hayýr');
DEFINE ('_UDDEADM_ADMINSONLY', 'Sadece yöneticiler');
DEFINE ('_UDDEADM_SYSTEM', 'Sistem');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Sistem mesajlarý için Kullanýcý Adý');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM sistem mesajlarýný destekler. Sistem mesajlarýnýn göndericileri görünmez ve kullanýcýlar cevaplayamazlar. Buraya sistem mesajlarý için varsayýlan kullanýcýnýn takma adýný girin. (örnek <i>Destek</i> veya <i>Yardým Masasý</i> veya <i>Topluluk Yöneticisi</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Yöneticilerin genel mesaj gönderimine izin');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM genel mesajlarý destekler. Bu mesajlar sistemdeki tüm kullanýcýlara kolaylýkla gönderilir.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-posta gönderenin ismi');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'E-posta bilgisinde mesajýn kimden geldiði girilebilir (örnek <i>SÝTE ÝSMÝNÝZ</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-posta gönderenin adresi');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'E-posta bilgisinde emailin hangi adresten geldiði girilebilir (bu sitenizin ana irtibat e-posta adresi olacaktýr.)');
DEFINE ('_UDDEADM_VERSION', 'uddeIM sürümü');
DEFINE ('_UDDEADM_ARCHIVE', 'Arþiv'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Arþivi etkinleþtir');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Kullanýcýlarýn mesajlarýný depolayabilecekleri bir arþive izin verilip verilmeyeceðini seçin. Arþivdeki mesajlar silinmeyecektir.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Kullanýcý arþivindeki azami mesaj sayýsý');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Kullanýcýlarýn arþivde kaç mesaj depolayabileceklerini gösterir (yöneticiler için sýnýr yoktur).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Mesaj Kopyasý Ýzni');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Kullanýcýlara gönderdikleri mesajlarýn kopyasýný alma izni. Bu kopyalar gelen kutusunda bulunacaklardýr.');
DEFINE ('_UDDEADM_MESSAGES', 'Mesajlar');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Aslýný çöp kutusuna taþý uyarýsý');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', '\'Gönder\' düðmesi yanýndaki \'aslýný çöp kutusuna taþý\' kontrol kutusu varsayýlan olarak iþaretlemiþtir. Bu durumda, mesaj cevap gönderildikten hemen sonra çöp kutusuna taþýnacaktýr. Bu özellik mesajlarýn veritabanýnda daha az yer kaplamasýna yarayacaktýr. Kullanýcýlar bu kutudaki iþareti kaldýrarak mesajýn gelen kutusunda kalmasýný saðlayabilir.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Sayfadaki Mesaj Sayýsý');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Gelen kutusu, giden kutusu, çöp kutusu ve arþivdeki mesajlarýn her sayfada kaç adet görüntüleneceði.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Karakter seti kullanýmý');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Eðer latin karakterlerin dýþýndaki karakterlerde problem yaþýyorsanýz, karakter seti buraya girerek uddeIM in veritabanýnda gerekli çeviriyi yapmasýný saðlayabilirsiniz. <b>Eðer bunun ne anlama geldiðini bilmiyorsanýz, varsayýlan deðerlerde deðiþiklik yapmayýn!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Kullanýlan mail karakter seti');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Eðer latin karakterlerin dýþýndaki karakterlerde problem yaþýyorsanýz, karakter seti buraya girerek uddeIM in gönderilen e-maillerde gerekli deðiþiklið yapmasýný saðlayabilirsiniz. <b>Eðer bunun ne anlama geldiðini bilmiyorsanýz, varsayýlan deðerlerde deðiþiklik yapmayýn!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Ýçerikle ilgili kullanýcýnýn alacaðý e-mail ayarý yukarýdadýr. Ýçerik e-mail içerisinde olmayacaktýr. Alýnacak deðiþkenler %you%, %user% ve %site% olacaktýr. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Ýçerikle ilgili kullanýcýnýn alacaðý e-mail ayarý yukarýdadýr. Bu e-mail mesaj mesajý da içerisinde taþýyacaktýr. Alýnacak deðiþkenler %you%, %user%, %pmessage% ve %site% olacaktýr. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Kullanýcýnýn alacaðý hatýrlatma e-maili ile ilgili ayarlar yukarýdadýr. Alýnacak deðiþkenler %you% ve %site% olacaktýr. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Ýzin verilirse kullanýcýlar mesajlarýný arþivlerinden indirerek, kendilerine e-mail olarak gönderebilirler.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Dosya indirme izni');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Kullanýcýlarýn,  arþivden mesajlarý indirdiklerinde alacaklarý e-posta þeklidir. Alýnacak deðiþkenler %user%, %msgdate% ve %msgbody% olacaktýr. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Gelen kutusu kapasite ayarý');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Gelen kutusu ve arþivde bekletilebilecek mesajlarýn sayýsýný buraya girebilirsiniz. Bu durumda, gelen kutusu ve arþivdeki mesajlarýnýz bu sayýyý geçmemelidir. Alternatif olarak , gelen kutusunun mesaj sýnýrýný arþivden ayrý da belirleyebilirsiniz. Bu durumda, kullanýcýlar belirlenen sayýnýn üzerindeki mesajlarýný gelen kutusuna alamayacaklardýr. Eðer gelen kutusunda bekleyen mesaj sayýsý fazla ise, mesajlarý cevaplamak için fazla bekleyemeyeceklerdir veya yeni mesajlar için eski mesajlarýný gelen kutusu veya arþivden sýrasýyla silmek zorunda kalacaklardýr. (Kullanýcýlar aldýklarý mesajlarý bekletmeden okuyacaklardýr.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Gelen kutusu kapasitesini göster');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Gelen kutusunun altýnda, kullanýcýnýn kaç mesaj depoladýðýný (ve kaç adet depolayabileceklerini) gösterir.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Arþivi kapattýnýz. Arþivde kayýtlý olan mesajlarý nasýl yönetmek istersiniz?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Onlarý Býrak');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Onlarý arþivde býrak (kullanýcý mesajlara eriþemeyecektir ve onlar mesaj limitinden sayýlacaktýr).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Gelen kutusuna taþý');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Arþivdeki mesajlar gelen kutusuna taþýndý');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Mesajlarýn herbiri ayrý ayrý kullanýcýnýn gelen kutusuna taþýnacaktýr (veya gelen kutusunda bulunma sürelerini aþmýþlarsa çöp kutusuna gönderileceklerdir).');		

		
// 0.4 frontend, admins only (no translation necessary)	
DEFINE ('_UDDEIM_VALIDFOR_1', 'geçerlilik süresi ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' saat. 0=sürekli (otomatik silme uygula)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Site Yöneticileri veya Genel için mesaj oluþtur]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Normal (standard) bir mesaj oluþtur]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Sistem mesajý ve genel mesajlara izin verilmedi.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Mesaj Tipi');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Mesaj sistemi yardýmý');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(yeni pencerede açýlýr)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Aþaðýdaki mesajý göndermek istiyorsunuz. Lütfen iyice inceledikten sonra gönderin veya iptal edin!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Mesaj <strong>bütün kullanýcýlara</strong> gönderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Mesaj <strong>bütün yöneticilere</strong> gönderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Mesaj <strong>bütün çevrimiçi kullanýcýlara</strong> gönderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Alýcýlar bu mesajý cevaplamayabilir.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Mesaj <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> kullanýcý adý ile gönderilecektir');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Mesaj süresi dolacak ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Mesaj süresi dolmayacak');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Ýþlemden önce (üzerine týklayarak) linki kontrol edin!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Sadece <strong>Sistem mesajlarý için kullanýlýr</strong>:<br> [b]<strong>kalýn</strong>[/b] [i]<em>saða yatýk</em>[/i]<br>
[url=http://www.url.com]some url[/url] veya [url]http://www.url.com[/url] þeklinde kullanýlýr');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Hata: Alýcý bulunamadý. Mesaj gönderilemedi.');		

DEFINE ('_UDDEIM_CANTREPLY', 'Bu mesajý cevaplayamazsýnýz.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail bildirimi kapalý. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail bildirimi açýk. ');
DEFINE ('_UDDEIM_SETEMNON', '[Aç]');
DEFINE ('_UDDEIM_SETEMNOFF', '[Kapat]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Merhaba %you%,\n\n%user% kullanýcýsý %site% sitesinden size bir özel mesaj gönderdi. Lütfen okumak için giriþ yapýn!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Merhaba %you%,\n\n%user% kullanýcýsý %site% sitesinden size aþaðýdaki özel mesajý gönderdi. Cevaplamak için lütfen giriþ yapýn!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Merhaba %you%,\n\n%site% sitesinde okunmamýþ özel bir mesajýnýz bulunmaktadýr. Lütfen mesajýnýzý okumak için giriþ yapýn! ");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', '%site% sitesinden mesajýnýz var');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'site yöneticilerine gönderilecek(=alýcý cevaplamayabilir)');
DEFINE ('_UDDEIM_SEND_TOALL', 'bütün kullanýcýlara gönder');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'bütün yöneticilere gönder');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'bütün çevrimiçi kullanýcýlara gönder');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Beklenmedik hata: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arþiv etkin deðil.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Mesajýnýz arþive depolanamadý.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Arþivinizde ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>mesajýnýz bulunmamaktadýr.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Arþivinizde hiç mesaj yok.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' mesajlar');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Depolanmýþ bir mesajýnýz var');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Mesajý kaydetmeden önce, diðer mesajlarý silmelisiniz.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Kaydedebileceðiniz azami mesaj ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' mesajlar.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Þu an ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' mesajýnýz');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' message in your'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arþiv ve');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'gelen kutusu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'gelen kutusu ve arþivinizde bulunmaktadýr');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Azami izin verilen ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Aldýðýnýz mesajlarý bekletebilirsiniz ve okuyabilirsiniz fakat eski mesajlardan bir tane silmedikçe cevap yazamazsýnýz veya yeni bir tane mesaj oluþturamazsýnýz.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Depolanan Mesaj: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(Azami ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Mesaj arþive depolandý.');
DEFINE ('_UDDEIM_STORE', 'Arþiv');		// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'geri');
DEFINE ('_UDDEIM_TRASHCHECKED', 'seçileni sil');	// translators info: plural!	
DEFINE ('_UDDEIM_SHOWALL', 'hepsini göster');	// translators example "SHOW ALL messages"	
DEFINE ('_UDDEIM_ARCHIVE', 'Arþiv');		// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arþiv dolu. Kaydedilemedi.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Mesaj seçilmedi.');
DEFINE ('_UDDEIM_THISISACOPY', 'Gönderdiðiniz mesaj buraya kopyalanacak ');
DEFINE ('_UDDEIM_SENDCOPYTOME', ' bana kopyala');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'arþive kopyala');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'aslýný çöp kutusuna gönder');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Mesaj Ýndirme');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Mesaj e-mail ile gönderildi');
DEFINE ('_UDDEIM_EXPORT_NOW', 'seçileni bana e-mail olarak gönder');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Bu mail sizin özel mesajýnýzý taþýyor.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'E-mail mesaj kapsamýyor olabilir.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Mesaj sýnýrý! Geri alýnamadý.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Mesaj yaz ');

$udde_smon[1]="Oca";
$udde_smon[2]="Þub";
$udde_smon[3]="Mar";
$udde_smon[4]="Nis";
$udde_smon[5]="May";
$udde_smon[6]="Haz";
$udde_smon[7]="Tem";
$udde_smon[8]="Aðu";
$udde_smon[9]="Eyl";
$udde_smon[10]="Eki";
$udde_smon[11]="Kas";
$udde_smon[12]="Ara";

$udde_lmon[1]="Ocak";
$udde_lmon[2]="Þubat";
$udde_lmon[3]="Mart";
$udde_lmon[4]="Nisan";
$udde_lmon[5]="Mayýs";
$udde_lmon[6]="Haziran";
$udde_lmon[7]="Temmuz";
$udde_lmon[8]="Aðustos";
$udde_lmon[9]="Eylül";
$udde_lmon[10]="Ekim";
$udde_lmon[11]="Kasým";
$udde_lmon[12]="Aralýk";

$udde_lweekday[0]="Pazar";
$udde_lweekday[1]="Pazartesi";
$udde_lweekday[2]="Salý";
$udde_lweekday[3]="Çarþamba";
$udde_lweekday[4]="Perþembe";
$udde_lweekday[5]="Cuma";
$udde_lweekday[6]="Cumartesi";

$udde_sweekday[0]="Paz";
$udde_sweekday[1]="Pzt";
$udde_sweekday[2]="Sal";
$udde_sweekday[3]="Çar";
$udde_sweekday[4]="Per";
$udde_sweekday[5]="Cum";
$udde_sweekday[6]="Cmt";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Tema');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'uddeIM için kullanmak istediðiniz temayý seçin');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'CB Baðlantýlarýný göster ');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Use <i>yes</i> if you have Community Builder installed and want to present the user the name of his/her connections on the compose new message page.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Ayarlarý Göster');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'The Settings link appears in uddeIM if you have the e-mail-notification or the blocking system activated. Eðer istemiyorsanýz buradan kapatabilirsiniz. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'evet, altta');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'BB kodlara izin ver');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'sadece yazý sitilleri');
DEFINE ('_UDDEADM_ALLOWBB_EXP', '<i>sadece yazý stilleri</i>, seçildiðinde kullanýcýlarýn bb kodlarýnda kalýn, italik, çizgili, yazý rengi ve boyutunu deðiþtirebilirler. <i>evet</i>, olarak ayarladýðýnýzda kullanýcýlar <strong>tüm</strong> desteklenen BB kodlarýný kullanabilirler (baðlantýlar ve resimler).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Gülücüklere izin ver');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', '<i>evet</i>, olarak ayarladýðýnýzda, gülücük kodlarýndaki bu :-) gibi simgeler yerine grafik gülücükler gelecektir. Desteklenen gülücükleri görmek için beni oku dosyasýna bakýn.');
DEFINE ('_UDDEADM_DISPLAY', 'Görünüm');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Menü simgelerini göster');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', '<i>evet</i>, ayarlandýðýnda menü ve iþlem baðlantýlarý bir simge ile görüntülenir.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Bileþen Baþlýðý');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Özel mesajlaþma bileþeni için üst baþlýk, örneðin \'Özel Mesajlar\'. Baþlýk olmasýný istemezseniz boþ býrakýn.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Hakkýnda baðlantýsýný göster');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Set to <i>yes</i> to show a link to the uddeIM software credits and license. Bu baðlantý uddeIm HTML çýkýþýnýn altýnda gösterilir.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'E-Postayý þimdi durdur');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Uddeim in mail göndermesini engellemek için bu kutuyu iþaretleyin (e-mail-notifications and forgetmenot e-mails) irrespective of the users\' settings, for example when testing the site. If you do not want these features ever, set all options above to <i>no</i>.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails in lists');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Set to <i>yes</i> if you want to display the CB thumbnails of the users in the message lists overview (inbox, outbox, etc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Üyeleri Göster');
DEFINE ('_UDDEIM_CONNECTIONS', 'Baðlantýlar');
DEFINE ('_UDDEIM_SETTINGS', 'Ayarlar');
DEFINE ('_UDDEIM_NOSETTINGS', 'There are no settings to adjust.');
DEFINE ('_UDDEIM_ABOUT', 'Hakkýnda'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Yeni Mesaj'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Posta-Habercisi');
DEFINE ('_UDDEIM_EMN_EXP', 'Yeni bir özel mesaj aldýðýnýzda mailinize bilgi gelir.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Yeni mesaj geldiðinde mail gönder');
DEFINE ('_UDDEIM_EMN_NONE', 'Yeni mesaj geldiðinde mail gönderme');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Çevrimdýþýyken mesaj gelirse mail gönder');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Mesajýnýza cevap geldiðinde mail yollama');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Kullanýcý Engelleme'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'You can prevent users from sending you messages by blocking them. Choose <i>block user</i> when you view a messages from the respective user.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Deðiþiklikleri Kaydet');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB Kod etiketi koyu/kalýn bir yazý biçimi verir. Kullaným: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB Kod etiketi yatýk(italik) yazý biçimi verir. kullaným: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB Kod etiketi altý çizili yazý biçimi verir. kullaným: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB Kod etiketi renklendirilmiþ yazý biçimi verir. Kullaným: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example FF0000 for red.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB Kod etiketi renklendirilmiþ yazý biçimi verir. Kullaným: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example 00FF00 for green.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB Kod etiketi renklendirilmiþ yazý biçimi verir. Kullaným: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example 0000FF for blue.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB Kod etiketi normalden daha küçük yazý boyutu biçimi verir. Kullaným: [size=1]çok küçük metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB Kod etiketi normalden küçük yazý boyutu biçimi verir. Kullaným: [size=2] küçük metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB Kod etiketi normalden büyük yazý boyutu biçimi verir. Kullaným: [size=4]büyük metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB Kod etiketi normalden daha büyük yazý boyutu biçimi verir. Kullaným: [size=5]çok büyük metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB Kod etiketi bir resim dosyasý yayýnlamanýz için link eklemenizi saðlar. Kullaným: [img]Resim-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB Kod etiketi bir web adresini göstermenizi saðlar. Kullaným: [url]web adresi[/url]. Tüm adreslerin baþýnda http:// kullanmayý unutmayýn.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Tüm açýk BB etiketlerini kapat.');
