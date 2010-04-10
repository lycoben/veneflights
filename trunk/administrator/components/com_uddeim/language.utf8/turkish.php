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
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'UddeIM zamanı yanlış gösterdiğinde zaman dilimini buradan ayarlayabilirsiniz. Genellikle, sıfır olarak ayarlandığında herşey düzgündür. Yinede bu değeri değiştirmeniz gerekebilir.');
DEFINE ('_UDDEADM_HOURS', 'saat');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Sürüm Bilgisi:');
DEFINE ('_UDDEADM_STATISTICS', 'İstatistikler:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'İstatistikleri göster');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Burada kayıtlı mesajlar gibi bazı istatistikleri görebilirsiniz.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'İSTATİSTİKLERİ GÖSTER');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Veritabanında kayıtlı mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Alıcılar tarafından silinen mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Gönderenler tarafından silinen mesajlar: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Messages on hold for purging: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Overwrite Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Usually uddeIM tries to detect the correct Itemid when it is not set. In some cases it might be necessary to overwrite this value, e.g. when you use several menu links to uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Detected Itemid is: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Use Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Use this Itemid instead of the detected one.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Profil bağlantılarını kullan');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Eğer <i>evet</i> seçerseniz, tüm kullanıcı adları uddeIM de kullanıcı profiline bağlantı olarak görünecektir.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Show thumbnails');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'When set to <i>yes</i>, the thumbnail of the respective user will be displayed when reading a message.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Show thumbnails in lists');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Set to <i>yes</i> if you want to display thumbnails of users in the message lists overview (inbox, outbox, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Kapalı');
DEFINE ('_UDDEADM_ENABLED', 'Açık');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Önemli');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Mesaj etiketlemeye izin ver');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Allows message tagging (uddeIM shows a star in lists which can be highlighted to mark important messages).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Önemli: uddeIM önceki sürümlerden güncellendiyse, lütfen README dosyasını kontrol edin. Bazen veritabanı tablo yada alanlarında ekleme yada değişiklik yapmanız gerekebilir!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Add CC: line');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Alıntı metnini kısalt');
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
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'özel kullanıcılar');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'sadece yöneticiler');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Kullanıcı listesindeki gizlenecek kullanıcılar');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Enter user IDs which should be hidden from public userlist (e.g. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Kullanıcı listesinde kullanıcıları gizle');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Enter user IDs which should be hidden from userlist (e.g. 65,66,67).');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF attack recognized');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF koruması');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'This protects all forms against Cross-Site Request Forgery attacks. Usually this should be enabled. Only when you have strange problems switch it off.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Arşivdeki mesajları cevaplayamazsınız.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Replies to unregistered users can not be recalled.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Allow replies');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Allow direct replies to messages from public users.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Merhaba %user%,\n\n%you% has sent you the following private message at %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Gerçek isimleri göster');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Show realnames or usernames in public frontend?');
DEFINE ('_UDDEIM_USERLIST', 'Kullanıcı Listesi');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Üzgünüm, yeni mesaj göndermeden önce beklemelisiniz');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Son Gönderim');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Timedelay');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Time in seconds a user must wait before he can post the next message (0 for no time delay).');
DEFINE ('_UDDEADM_SECONDS', 'saniye');
DEFINE ('_UDDEIM_PUBLICSENT', 'Mesaj gönderildi.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Gönderen isminde hata');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'E-posta adresinde hata');
DEFINE ('_UDDEIM_YOURNAME', 'İsminiz:');
DEFINE ('_UDDEIM_YOUREMAIL', 'E-postanız:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Kullandığınız uddeIM sürümü ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'uddeIM en son sürmünü kullanıyorsunuz.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Şu andaki güncel sürüm ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Güncelleme Bilgisi:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Güncellemeleri kontrol et');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'This contacts uddeIM developer website to receive information about the current uddeIM version. Except the uddeIM version you use, no other personal information is transmitted.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'KONTROL ET');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Unable to receive version information.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Kişi listesi bulunamadı!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Azami alıcı sınırı aşıldı (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Max. kayıt sayısı');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Her kişi listesi için azami kayıt sayısı.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Kişi listesi açık değil');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Kişi listesi açık');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM kullanıcıların kişi listesi oluşturmalarına olanak verir. Bu listeleri çoklu mesaj gönderirken kullanabilirsiniz. Kişi listesini kullanmak istiyorsanız Çoklu alıcı özelliğini açmayı unutmayın.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'kapalı');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'kayıtlı kullanıcılar');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'özel kullanıcılar');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'sadece yöneticiler');
DEFINE ('_UDDEIM_LISTSNEW', 'Yeni kişi listesi oluştur');
DEFINE ('_UDDEIM_LISTSSAVED', 'Kişi listesi kaydedildi');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Kişi listesi güncellendi');
DEFINE ('_UDDEIM_LISTSDESC', 'Açıklama');
DEFINE ('_UDDEIM_LISTSNAME', 'İsim');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'İsim (boşluksuz)');
DEFINE ('_UDDEIM_EDITLINK', 'düzenle');
DEFINE ('_UDDEIM_LISTS', 'Kişiler');
DEFINE ('_UDDEIM_STATUS_READ', 'okunmuş');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'okunmamış');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'çevrimiçi');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'çevrimdışı');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'CB galeri resimlerini göster');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Varsayılan olarak uddeIM sadece kullanıcıların yüklediği avatarları gösterir. Bu ayarı açtığınızda uddeIM CB avatars galerisindeki resimleride görüntüler.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Unblock CB connections');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'You can allow messages to recipients when the registered user is on the recipients CB connection list (even when the recipient is in a group which is blocked). This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'You are not allowed sending to this group.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Alıcı sizi engellemiş.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Engellenen gruplar (kayıtlı kullanıcılar)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Groups to which registered users are not allowed to send messages to. This is for registered users only. Special users and admins are not affected by this setting. This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Engellenen Gruplar (public users)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Groups to which public users are not allowed to send messages to. This setting is independent from the individual blocking each user can configure when enabled (see settings above). When you block a group, users in this group cannot see the the option to enable the public frontend in their profile settings.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Public user');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB connection');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Kayıtlı kullanıcı');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Author');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Kullanıcı sadece kayıtlı kullanıcılardan gelen mesajları kabul ediyor.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Hide from public "All users" list');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the public "All users" list. Note: this hides the names only, the users can still receive messages. Users who have not enabled Public Frontend will never be listed in this list.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Hide from "All users" list');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the "All users" list. Note: this hides the names only, the users can still receive messages.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'yok');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'sadece superadminler');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'sadece yöneticiler');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'özel kullanıcılar');
DEFINE ('_UDDEADM_PUBLIC', 'Public');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed in Public Frontend, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Public Frontend');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- select public -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Allow public users to send a message');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Mesaj sınırı aşıldı!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Public user');
DEFINE ('_UDDEIM_DELETEDUSER', 'User deleted');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha uzunluğu');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Kullanıcının kaç karakter gireceğini belirler.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam koruması');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Mesaj gönderirken kimin captcha gireceğini belirler');
DEFINE ('_UDDEADM_CAPTCHAF0', 'disabled');
DEFINE ('_UDDEADM_CAPTCHAF1', 'public users only');
DEFINE ('_UDDEADM_CAPTCHAF2', 'public and registered users');
DEFINE ('_UDDEADM_CAPTCHAF3', 'public, registered, special users');
DEFINE ('_UDDEADM_CAPTCHAF4', 'tüm kullanıcılar (yöneticiler dahil)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Enable public frontend');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'When enabled public users can send messages to your registered users (those can specify in their personal settings of they want to use this feature).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Public frontend default');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'This is the default value if a public user is allowed to send a message to a registered user.');
DEFINE ('_UDDEADM_PUBDEF0', 'disabled');
DEFINE ('_UDDEADM_PUBDEF1', 'enabled');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Hatalı güvenlik kodu');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'yok yada bilinmeyen');
DEFINE ('_UDDEADM_DONATE', 'If you like uddeIM and want to support the development please make a small donation.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Veritabanında yapılandırma bulundu: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Yapılandırmayı yedekle ve geri yükle');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Yapılandırmanızı veritabanına yedekleyebilir ve gerekli olduğunda geri alabilirsiniz. Bu özellik uddeIM güncellerken yada deneme yapmak için ayarlarınızı değiştirdiğinizde kullanışlı olabilir.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'YEDEKLE');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'GERİ YÜKLE');
DEFINE ('_UDDEADM_CANCEL', 'İptal');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Dil dosyası karakter seti');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Genellikle <strong>varsayılan</strong> (ISO-8859-1) Joomla 1.0 için doğru ayardır ve <strong>UTF-8</strong> Joomla 1.5. için');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'varsayılan');
DEFINE ('_UDDEIM_READ_INFO_1', 'Okunmuş mesajlar gelen kutusundan otomatik olarak silinmeden önce max. ');
DEFINE ('_UDDEIM_READ_INFO_2', ' gün tutulur.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Okunmamış mesajlar gelen kutusundan otomatik olarak silinmeden önce max. ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' gün tutulur.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Gönderilmiş mesajlar giden kutusundan otomatik olarak silinmeden önce max ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' gün tutulur.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Okunmuş mesajlar için gelen kutusunda bilgi göster');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Gelen kutusunda bilgi göster "Okunmuş mesajlar n gün sonra silinir"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Okunmamış mesajlar için Gelen kutusunda bilgi göster');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Gelen kutusunda bilgi göster "Okunmamış mesajlar n gün sonra silinir"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Gönderilen mesajlar için giden kutusunda bilgi göster');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Giden kutusunda bilgi göster "Giden mesajlar n gün sonra silinir"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Çöpteki mesajlar için çöp kutusunda bilgi göster');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Çöp kutusunda bilgi göster "Çöp kutusundaki mesajları n gün sonra yoket"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Gönderilen mesajları tut (gün)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', '<b>Gönderilen</b> mesajların giden kutusundan kaç gün sonra otomatik olarak silineceğini giriniz.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'tüm özel kullanıcılara gönder');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', '<strong>tüm özel kullanıcılara</strong> Mesaj');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- kullanıcı adı seç -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- isim seç -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Kullanıcı ayarlarını düzenle');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'mevcut olan');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'mevcut olmayan');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- giriş seç -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- bilgilendirme seç -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- popup seç -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Kullanıcı Adı');
DEFINE ('_UDDEADM_USERSET_NAME', 'İsim');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Bilgilendirme');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Son giriş');
DEFINE ('_UDDEADM_USERSET_NO', 'Hayır');
DEFINE ('_UDDEADM_USERSET_YES', 'Evet');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'bilinmeyen');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Çevrimdışıyken (cevaplar hariç)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Herzaman (cevaplar hariç)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Çevrimdışıyken');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Her zaman');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Bilgilendirme yok');
DEFINE ('_UDDEADM_WELCOMEMSG', "uddeIM!e Hosgeldiniz\n\nBasariyla uddeIM Kuruldu.\n\nFarkli temalar ile bu mesaji goruntulemeyi deneyin. UddeIM yonetim bolumunden ayarlayabilirsiniz.\n\nuddeIM gelisen bir projedir. Eger hata yada eksik bulursaniz, UddeIMi beraber daha iyi yapmak icin lütfen bana yazın.\n\nIyi sanslar ve eglenceler!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM kurulumu tamamlandı.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Lütfen yönetim panelinden devam edin ve ayarlarınızı gözden geçirin.');
DEFINE ('_UDDEADM_REVIEWLANG', 'If you are running the CMS in a character set other than ISO 8859-1 make sure to adjust the settings accordingly.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Kurulumdan sonra, tüm uddeIM e-posta trafiği (e-posta bildirimleri, beni unutma e-mailleri) kapalıdır deneme yaparken e-posta gönderilmez. Bitirdiğinizde "e-postayı durduru" yönetim bölümünden kapatmayı unutmayın.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. alıcılar');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Her mesaj için izin verilen azami alıcı sayısı (0=sınırlama yok)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'çok fazla alıcı');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Sending of emails disabled.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Metin içinde arama');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Otomatik tamamlayıcının metin içinde arama yapabilmesi (aksi taktirde sadece başlangıcında arama yapar)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', '"Tüm Üyeler" bağlantısı durumu');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', '"Tüm üyeler" bağlantısını gizle');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', '"Tüm üyeler" bağlantısını göster');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Herzaman tüm üyeleri göster');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Yapılandırma yazılamaz:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Yapılandırma yazılabilir:');
DEFINE ('_UDDEIM_FORWARDLINK', 'ilet');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'alıcı bulundu');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'alıcılar bulundu');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (varsayılan)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Mail sistemi');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'UddeIM bilgilendirmeleri gönderirken kullanacağı mail sistemini seçin.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Joomla gruplarını göster');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Joomla gruplarını genel mesaj listesinde göster.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'İletilen mesaj');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Mesajların yönlendirilmesine izin ver.');
DEFINE ('_UDDEIM_FWDFROM', 'Orjinal mesajı gönderen');
DEFINE ('_UDDEIM_FWDTO', 'kime');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Arşivden geri al');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Mesaj arşivden geri alınamadı');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Çoklu alıcıya izin ver');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Çoklu alıcıya izin ver (virgülle ayrılarak).');
DEFINE ('_UDDEIM_CHARSLEFT', 'karakter kaldı');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Metin sayacını göster');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Kaç karakter kaldığını görüntülemek için metin sayacını açın.');
DEFINE ('_UDDEIM_CLEAR', 'Temizle');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Seçilen kullanıcıları alıcılara ekle');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Bu "Tüm üyeler" listesinden çoklu seçim yapmayı olanaklıkılar.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Bağlantılar listesinden ekle');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Bu çoklu alıcı eklemeye izin verir.');
DEFINE ('_UDDEADM_PMSFOUND', 'Bulunan PMS: ');
DEFINE ('_UDDEIM_ENTERNAME', 'bir isim girin');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Otomatik tamamlamayı kullan');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Alıcı isimleri için otomatik tamamlamayı kullan.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Key used for obfuscating');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Enter key which is used for message obfuscating. Do not change this value after message obfuscating has been enabled.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Yanlış yapılandırma dosyası!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Bulunan sürüm:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version expected:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Converting configuration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Tamam!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Kritik hata: Yapılandırma dosyasına yazmakta hata:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Encrypted message! - indirme olanaksız!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Yanlış Parola! - indirme olanaksız!');
DEFINE ('_UDDEIM_WRONGPW', 'Yanlış Parola! - Lütfen veritabanı yöneticisiyle iletişim kurun!');
DEFINE ('_UDDEIM_WRONGPASS', 'Yanlış Parola!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Yanlış silinme tarihi (gelen kutusu/giden kutusu): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Yanlış silinme tarihini düzelt');
DEFINE ('_UDDEIM_TODP', 'Kime: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Tüm mesajları şimdi yoket');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'İşlem simgelerini göster');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', '<i>evet</i>, ayarlandığında işlem bağlantıları bir simge ile gösterilir.');
DEFINE ('_UDDEIM_UNCHECKALL', 'hepsini bırak');
DEFINE ('_UDDEIM_CHECKALL', 'hepsini seç');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Alt simgeleri göster');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', '<i>evet</i>, ayarlandığında alt kısımdaki bağlantılar bir simge ile görüntülenir.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Hareketli gülücük kullan');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Hareketsiz gülücükler yerine hareketli olanları kullanın.');
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
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Hızlı Mesaj');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Use encryption');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Encrypt stored messages');
DEFINE ('_UDDEADM_CRYPT0', 'Yok');
DEFINE ('_UDDEADM_CRYPT1', 'Obfuscate messages');
DEFINE ('_UDDEADM_CRYPT2', 'Encrypt messages');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Varsayılan E-posta bildirimi');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'E-Posta bildirimi için varsayılan değer (kullanıcılar kendi ayarlarını değiştirebilirler).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Bildirim Yok');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Herzaman');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Çevrimdışıyken bildir');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Supress "All users" link');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Supress "All users" link in write new message box (useful when lots of users are registered).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup bildirim');
DEFINE ('_UDDEADM_POPUP_EXP','Yeni mesaj geldiğinde popup pencerede göster ( mod_cblogin yaması gerekli )');
DEFINE ('_UDDEIM_OPTIONS', 'Daha fazla ayar');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Burada biraz daha ayar bulabilirsiniz.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Yeni mesaj geldiğinde popup ile göster');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup bildirimi varsayılan');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Enable popup notification by default (for users who have not changed their preferences yet).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Bakım');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Veritabanı bakımı');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'KONTROL');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'ONAR');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', 'Bir kullanıcı veritabanından silindiğinde mesajları veritabanında kalır. This function checks if it is necessary to trash orphaned messages and you can trash them if it is required.');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', 'Kontrol ediliyor...<br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (Kullanıcı adı): [inbox|inbox trashed|outbox|outbox trashed]</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>gelen kutusu: messages stored in users inbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>gelen kutusu silinen: messages trashed from users inbox, but still in someones outbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>giden kutusu: messages stored in users outbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>giden kutusu silinen: messages trashed from users outbox, but still in someones inbox</i><br>');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', 'Siliniyor...<br>');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "bulunamadı (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "üyenin tüm ayarlarını sil");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "delete blocking of user");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "trash all messages sent to deleted user in sender\'s outbox and deleted user\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "trash all messages sent from deleted user in his outbox and receiver\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nothing to do<b><br>');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Bakım gerekli<b><br>');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Gerçek isimleri göster');
DEFINE ('_UDDEADM_NAMESDESC', 'Gerçek isim yada kullanıcı adlarını göster?');
DEFINE ('_UDDEADM_REALNAMES', 'Gerçek isimler');
DEFINE ('_UDDEADM_USERNAMES', 'Kullanıcı adı');
DEFINE ('_UDDEADM_CONLISTBOX', 'Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Bağlantılarımı liste yada tablo şeklinde göster?');
DEFINE ('_UDDEADM_LISTBOX', 'Liste');
DEFINE ('_UDDEADM_TABLE', 'Tablo');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Mesaj 24 saat içerisinde silinmezse geçici olarak çöp kutusuna gönderilecektir. Mesajın sadece birinci kelimesine görebilirsiniz. Onu tam olarak okumak için geri alınız.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Silinen mesajlar ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' saat geçici olarak çöp kutusunda bekleyecektir. Buradaki mesajların sadece birinci kelimesine görebilirsiniz. Onu tam olarak okumak için geri alınız.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Bu mesaj geri alındı. Siz yeniden düzenleyebilir ve tekrar gönderebilirsiniz.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Mesaj geri getirilemedi (büyük bir ihtimalle okundu veya silindi.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Mesaj geri alımı başarısız. (Burada gereğinden fazla kaldığı için silindi. Şu anda çöp kutusunda olabilir.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Mesaj geri alımı başarısız.');
DEFINE ('_UDDEIM_DONTSEND', 'Gönderme');
DEFINE ('_UDDEIM_SENDAGAIN', 'Yeniden Gönder');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Giriş yapmamışsınız.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Gelen Kutunuzda hiç mesaj yok.</strong>');
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Giden kutusunda mesajınız yok.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Çöp kutusunda mesajınız yok.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Gelen Kutusu');
DEFINE ('_UDDEIM_OUTBOX', 'Giden Kutusu');
DEFINE ('_UDDEIM_TRASHCAN', 'Çöp Kutusu');
DEFINE ('_UDDEIM_CREATE', 'Yeni Mesaj');
DEFINE ('_UDDEIM_UDDEIM', 'Özel Mesajlar');
DEFINE ('_UDDEIM_READSTATUS', 'Oku');
DEFINE ('_UDDEIM_FROM', 'Kimden');
DEFINE ('_UDDEIM_TO', 'Kime');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Giden Kutusu, silmemiş iseniz gönderdiğiniz tüm mesajları içerir. Eğer Giden Kutunuzda bir mesaj okunmamışsa geri çağıra bilirsiniz. Bu alıcı tarafından uzun bir süre okunmamışsa kullanılabilir. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'Geri Al');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Bu mesajı geri al');
DEFINE ('_UDDEIM_RESTORE', 'Geri Al');
DEFINE ('_UDDEIM_MESSAGE', 'Mesaj');
DEFINE ('_UDDEIM_DATE', 'Tarih');
DEFINE ('_UDDEIM_DELETED', 'Silinme');
DEFINE ('_UDDEIM_DELETE', 'sil');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'Sil');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Bu mesaj görüntülenemiyor. <br>Muhtemel Sebepler:<ul><li>Bu özel mesajı okumaya yetkiniz yoktur.</li><li>Mesaj silinmiş.</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Bu mesajı çöp kutusuna taşıyabilirsiniz.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Mesajı gönderen ');
DEFINE ('_UDDEIM_MESSAGETO', 'Mesaj kendinizden ');
DEFINE ('_UDDEIM_REPLY', 'Cevapla');
DEFINE ('_UDDEIM_SUBMIT', 'Gönder');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Asıl mesajı cevapladıktan sonra çöp kutusuna taşı');
DEFINE ('_UDDEIM_NOID', 'Hata: Alıcı ID bulunamadı. Mesaj gönderilmedi.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Hata: Mesaj metni yok! Mesaj gönderilmedi.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Cevap Gönderildi');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Mesaj Gönderildi.');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' ve asıl mesaj çöp kutusuna taşındı');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Bu kullanıcı adı ile bir kullanıcı yok!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Kendinize mesaj gönderemezsiniz!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Erişim İhlali!</b> Bu işlem için izniniz yok!');
DEFINE ('_UDDEIM_PRUNELINK', 'Sadece Yönetici: Burada Kesildi');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Yönetimi');
DEFINE ('_UDDEADM_GENERAL', 'Genel');
DEFINE ('_UDDEADM_ABOUT', 'Hakkında');
DEFINE ('_UDDEADM_DATESETTINGS', 'Tarih/Saat');
DEFINE ('_UDDEADM_PICSETTINGS', 'Simgeler');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Okunmuş mesajları tut (gün)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Okunmamış mesajları tut (gün)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Mesajları çöp kutusunda tut (gün)');
DEFINE ('_UDDEADM_DAYS', 'gün');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', '<b>Okunan</b> mesajlar gelen kutusundan otomatik olarak kaç gün sonra silinecektir. Eğer mesajın otomatik olarak silinmesini istemiyorsanız, çok yüksek bir değer girin (örnek, 36524 bir yüzyıl). Fakat sürenin uzun tutulması veritabanınızın hızla dolmasına sebep olacaktır.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Henüz <b>Okunmamış</b> mesajların tutulacağı gün sayısı. Fakat bunu alıcıların mesajları hangi sıklıkda okuduklarına göre ayarlanmalıdır.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Çöp kutusundaki mesajların kaç gün sonra silineceğidir. Buradaki değerin 1 den küçük olması uygundur Mesela: Mesajların 3 saat sonra çöp kutusunda silinmesini istersek, değer olarak 0.125 girmemiz gerekir.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Tarih görüntü formatı');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Mesaj tarih/saat görünümünün nasıl olması gerektiğini seçin. Aylar Joomlanın yerel dil ayarlarına göre kısaltılacaktır (eğer uddeIM dil dosyası ile uyumluysa).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Uzun tarih görünümü');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Mesajlarda uzun tarih biçiminin görünmesi için, mesaj açıldığında görüntülenecek tarih formatını seçin. Haftanın günleri ve ay isimleri, Joomlanın yerel dil ayarlarına göre yapılacaktır (eğer uddeIM dil dosyası ile uyumluysa).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Silme işlemi sadece yönetici tarafından yapılsın');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'evet, sadece yönetici');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'hayır, hiç bir kullanıcı');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'elle');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Otomatik silme işlemi sunucular ve veritabanlarına aşırı yük getirir. Eğer <i>evet,&nbsp;sadece&nbsp;yönetici</i> seçilirse; otomatik silme işlemi ayarları şöyle olmalıdır (tüm kullanıcıların\' mesajları için). Bu seçeneği, yönetici gelen kutusunu yaklaşık günde bir defa veya daha fazla kontrol ederse seçilmelidir. (Eğer sitenin bir yöneticisi varsa, yönetici tarafından bu seçenek tercih edilmemelidir.) Bu sayı az ise veya yöneticiler gelen kutularına arada sırada bakıyorlarsa, <i>hayır,&nbsp;hiçbir&nbsp;kullanıcı</i> seçilmelidir. Eğer bu anlaşılmadıysa veya nasıl yapılacağı bilinemiyorsa, <i>hayır, hiçbir kullanıcı</i> seçilmelidir.');

	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Ayarları Kaydet');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Ayarların kaydedildiği dosya:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Ayarlar kaydedildi.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Simge: Kullanıcı çevrimiçi');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Kullanıcı çevrimiçi olduğunda kullanıcı adının yanında bu simge görünecektir.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Simge: Kullanıcı çevrimdışı');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Kullanıcı çevrimdışı olduğunda kullanıcı adının yanında bu simge görünecektir.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Simge: Mesaj okunmuş');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Okunmuş mesaj için bu simge görünecektir.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Simge: Okunmamış mesaj');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Okunmamış mesaj için bu simge görünecektir.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modül: Yeni Mesaj İkonu');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Burası mod_uddeim_new modülüne başvuracaktır. Yeni mesaj olduğunda modül ekrana bu simgeyi getirecektir.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM kurulum');
DEFINE ('_UDDEADM_FINISHED', 'Kurulum tamamlandı. uddeIM e Hoşgeldiniz. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Joomla Community Builder yüklü değil. uddeIM\'i kullanamayacaksınız.</span><br><br><a href="http://www.joomlapolis.com/">Community Builder</a>\'ı indirebilirsiniz.');
DEFINE ('_UDDEADM_CONTINUE', 'devam');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Sizin ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' mesajınız eski PMS içerisinde bulunuyor. Onları uddeIM\'e almak ister misiniz?');
DEFINE ('_UDDEADM_IMPORT_EXP', ' PMS mesajlarınızı veya sizin yüklediklerinizi değiştirmeyecektir. Onlar sağlam olarak alınacaktır. Onları güvenli bir şekilde uddeIM\'e alabilirsiniz, even if you consider to continue using the old PMS. You should save any changes you made to the settings first before running the import! Any messages that are already in your uddeIM database will remain intact.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Eski PMS mesajlarınızı şimdi uddeIM\'e aktar');
DEFINE ('_UDDEADM_IMPORT_NO', 'Hayır, hiçbir mesajı alma');  
DEFINE ('_UDDEADM_IMPORTING', 'Lütfen kısa bir süre bekleyin, mesajlar alınıyor.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Eski PMS\'den mesaj alımı tamamlandı. Bu betiği tekrar çalıştırmayın, çünkü aynı mesajları yeniden alırsınız ve iki defa gözükür.'); 
DEFINE ('_UDDEADM_IMPORT', 'Dışarıdan Al');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Mesajları eski PMS\'den al.');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Başka bir PMS yüklü değil. Alım mümkün değil.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Zaten mesajlar eski PMS\'den uddeIM\'e alınmış.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Engellenmiş');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Gönderilmedi. (kullanıcıyı engellemişsiniz)');
DEFINE ('_UDDEIM_BLOCKNOW', 'Kullanıcıyı engelle');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Engellediğiniz kullanıcıların listesidir. Bu kullanıcılar size özel mesaj gönderemeyecekler.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Şu anda engellediğiniz kullanıcı yok.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Engellemiş olduğunuz ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' kullanıcı(lar).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[engelleme kaldır]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Eğer engellenmiş bir kullanıcı size mesaj göndermeye çalışırsa, Ona engellendiği bilgisi ve mesaj gönderemeyeceği bildirilecektir.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Engellenmiş bir kullanıcı kendisini engelleyeni göremez.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Yöneticileri engelleyemezsiniz.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Engelleme sistemi yetkisi');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Yetki verildiğinde, kullanıcılar diğer kullanıcıları engelleyebilir. Engellenmiş bir kullanıcı, kendisini engelleyen kullanıcıya mesaj gönderemez. Yöneticiler engellenemez.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'evet');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'hayır');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Engellenmiş kullanıcı mesaj alsın');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Eğer <i>evet</i> seçilirse, engellenmiş kullanıcı mesaj bilgilerini alacak ama gönderemeyecektir. Çünkü alıcı onu engellemiştir. Eğer <i>hayır</i> seçilirse, engellenmiş kullanıcı herhangi bir mesaj gönderemeyecek ve alamayacaktır.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'evet');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'hayır');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Engelleme sistemi etkin değil');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Silinenler'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Engelleme');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Entegrasyon');
DEFINE ('_UDDEADM_EMAIL', 'E-posta');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'CB linklerini göster');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', '<i>Evet</i> seçilirse, bütün kullanıcılar uddeIM ekranında Community Builder bilgileri ile ilişkili olarak gösterilecektir.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'CB thumbnail göster');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', ' <i>evet</i> seçildiği zaman, kullanıcı kişisel mesajını okuduğu zaman mesajı gönderenin küçük resmi görünecektir. (eğer kullanıcının Community Builder bilgisinde bir resmi varsa).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Çevrimiçi durumu göster');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', ' <i>evet</i> seçildiği zaman, uddeIM ekranında her kullanıcı için bu kullanıcının çevrimiçi veya çevrimdışı olduğunu gösteren küçük bir ikon görüntülenecektir. Bu ikonları yönetici alanından seçebilirsiniz.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'E-posta bildirimine izin');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', ' <i>evet</i> seçildiği zaman, her kullanıcı gelen kutusuna yeni bir mesaj geldiğini e-posta ile haber alacaktır.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-posta mesajı da taşısın');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', ' <i>hayır</i> seçilirse, e-posta sadece mesajın kimden ve ne zaman gönderildiği bilgisini verecektir, mesaj e-posta içerisinde bulunmayacaktır.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Hatırlatma e-postası');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Gönderilerdeki bu özellik - kullanıcılar için sizin yapacağınız bir ayardır - kullanıcı gelen kutusundaki bir mesaj uzun zaman okunmazsa (ayar aşağıdadır). Bu ayrı bir ayardır ve \'e-posta bildirim izni\' ayarı üsttedir. Eğer hiçbir zaman e-posta mesajı göndermek istemiyorsanız, her ikisini de kapatmalısınız.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Kaç gün sonra hatırlatma yapılacak');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Eğer hatırlatma özelliği (yukarıda) ayarı <i>evet</i> olursa, kaç gün sonra okunmamış mesaj olduğu bilgisi e-posta gönderisi buradan girilecektir.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'İlk Listelenecek Karakter Sayısı');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Gelen kutusu, giden kutusu ve çöp kutusu için mesajın kaç karakter görüntüleneceğini buradan girin.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Azami Mesaj Uzunluğu');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Mesajın azami uzunluğunu buraya girin. Herhangi bir mesaj için uzunlık \'0\' (tavsiye edilmez). Otomatik olarak başlangış kısmından kesilecektir. ');
DEFINE ('_UDDEADM_YES', 'evet');
DEFINE ('_UDDEADM_NO', 'hayır');
DEFINE ('_UDDEADM_ADMINSONLY', 'Sadece yöneticiler');
DEFINE ('_UDDEADM_SYSTEM', 'Sistem');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Sistem mesajları için Kullanıcı Adı');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM sistem mesajlarını destekler. Sistem mesajlarının göndericileri görünmez ve kullanıcılar cevaplayamazlar. Buraya sistem mesajları için varsayılan kullanıcının takma adını girin. (örnek <i>Destek</i> veya <i>Yardım Masası</i> veya <i>Topluluk Yöneticisi</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Yöneticilerin genel mesaj gönderimine izin');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM genel mesajları destekler. Bu mesajlar sistemdeki tüm kullanıcılara kolaylıkla gönderilir.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-posta gönderenin ismi');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'E-posta bilgisinde mesajın kimden geldiği girilebilir (örnek <i>SİTE İSMİNİZ</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-posta gönderenin adresi');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'E-posta bilgisinde emailin hangi adresten geldiği girilebilir (bu sitenizin ana irtibat e-posta adresi olacaktır.)');
DEFINE ('_UDDEADM_VERSION', 'uddeIM sürümü');
DEFINE ('_UDDEADM_ARCHIVE', 'Arşiv'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Arşivi etkinleştir');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Kullanıcıların mesajlarını depolayabilecekleri bir arşive izin verilip verilmeyeceğini seçin. Arşivdeki mesajlar silinmeyecektir.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Kullanıcı arşivindeki azami mesaj sayısı');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Kullanıcıların arşivde kaç mesaj depolayabileceklerini gösterir (yöneticiler için sınır yoktur).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Mesaj Kopyası İzni');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Kullanıcılara gönderdikleri mesajların kopyasını alma izni. Bu kopyalar gelen kutusunda bulunacaklardır.');
DEFINE ('_UDDEADM_MESSAGES', 'Mesajlar');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Aslını çöp kutusuna taşı uyarısı');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', '\'Gönder\' düğmesi yanındaki \'aslını çöp kutusuna taşı\' kontrol kutusu varsayılan olarak işaretlemiştir. Bu durumda, mesaj cevap gönderildikten hemen sonra çöp kutusuna taşınacaktır. Bu özellik mesajların veritabanında daha az yer kaplamasına yarayacaktır. Kullanıcılar bu kutudaki işareti kaldırarak mesajın gelen kutusunda kalmasını sağlayabilir.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Sayfadaki Mesaj Sayısı');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Gelen kutusu, giden kutusu, çöp kutusu ve arşivdeki mesajların her sayfada kaç adet görüntüleneceği.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Karakter seti kullanımı');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Eğer latin karakterlerin dışındaki karakterlerde problem yaşıyorsanız, karakter seti buraya girerek uddeIM in veritabanında gerekli çeviriyi yapmasını sağlayabilirsiniz. <b>Eğer bunun ne anlama geldiğini bilmiyorsanız, varsayılan değerlerde değişiklik yapmayın!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Kullanılan mail karakter seti');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Eğer latin karakterlerin dışındaki karakterlerde problem yaşıyorsanız, karakter seti buraya girerek uddeIM in gönderilen e-maillerde gerekli değişikliğ yapmasını sağlayabilirsiniz. <b>Eğer bunun ne anlama geldiğini bilmiyorsanız, varsayılan değerlerde değişiklik yapmayın!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'İçerikle ilgili kullanıcının alacağı e-mail ayarı yukarıdadır. İçerik e-mail içerisinde olmayacaktır. Alınacak değişkenler %you%, %user% ve %site% olacaktır. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'İçerikle ilgili kullanıcının alacağı e-mail ayarı yukarıdadır. Bu e-mail mesaj mesajı da içerisinde taşıyacaktır. Alınacak değişkenler %you%, %user%, %pmessage% ve %site% olacaktır. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Kullanıcının alacağı hatırlatma e-maili ile ilgili ayarlar yukarıdadır. Alınacak değişkenler %you% ve %site% olacaktır. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'İzin verilirse kullanıcılar mesajlarını arşivlerinden indirerek, kendilerine e-mail olarak gönderebilirler.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Dosya indirme izni');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Kullanıcıların,  arşivden mesajları indirdiklerinde alacakları e-posta şeklidir. Alınacak değişkenler %user%, %msgdate% ve %msgbody% olacaktır. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Gelen kutusu kapasite ayarı');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Gelen kutusu ve arşivde bekletilebilecek mesajların sayısını buraya girebilirsiniz. Bu durumda, gelen kutusu ve arşivdeki mesajlarınız bu sayıyı geçmemelidir. Alternatif olarak , gelen kutusunun mesaj sınırını arşivden ayrı da belirleyebilirsiniz. Bu durumda, kullanıcılar belirlenen sayının üzerindeki mesajlarını gelen kutusuna alamayacaklardır. Eğer gelen kutusunda bekleyen mesaj sayısı fazla ise, mesajları cevaplamak için fazla bekleyemeyeceklerdir veya yeni mesajlar için eski mesajlarını gelen kutusu veya arşivden sırasıyla silmek zorunda kalacaklardır. (Kullanıcılar aldıkları mesajları bekletmeden okuyacaklardır.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Gelen kutusu kapasitesini göster');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Gelen kutusunun altında, kullanıcının kaç mesaj depoladığını (ve kaç adet depolayabileceklerini) gösterir.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Arşivi kapattınız. Arşivde kayıtlı olan mesajları nasıl yönetmek istersiniz?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Onları Bırak');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Onları arşivde bırak (kullanıcı mesajlara erişemeyecektir ve onlar mesaj limitinden sayılacaktır).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Gelen kutusuna taşı');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Arşivdeki mesajlar gelen kutusuna taşındı');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Mesajların herbiri ayrı ayrı kullanıcının gelen kutusuna taşınacaktır (veya gelen kutusunda bulunma sürelerini aşmışlarsa çöp kutusuna gönderileceklerdir).');		

		
// 0.4 frontend, admins only (no translation necessary)	
DEFINE ('_UDDEIM_VALIDFOR_1', 'geçerlilik süresi ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' saat. 0=sürekli (otomatik silme uygula)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Site Yöneticileri veya Genel için mesaj oluştur]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Normal (standard) bir mesaj oluştur]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Sistem mesajı ve genel mesajlara izin verilmedi.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Mesaj Tipi');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Mesaj sistemi yardımı');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(yeni pencerede açılır)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Aşağıdaki mesajı göndermek istiyorsunuz. Lütfen iyice inceledikten sonra gönderin veya iptal edin!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Mesaj <strong>bütün kullanıcılara</strong> gönderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Mesaj <strong>bütün yöneticilere</strong> gönderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Mesaj <strong>bütün çevrimiçi kullanıcılara</strong> gönderilecek');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Alıcılar bu mesajı cevaplamayabilir.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Mesaj <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> kullanıcı adı ile gönderilecektir');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Mesaj süresi dolacak ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Mesaj süresi dolmayacak');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>İşlemden önce (üzerine tıklayarak) linki kontrol edin!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Sadece <strong>Sistem mesajları için kullanılır</strong>:<br> [b]<strong>kalın</strong>[/b] [i]<em>sağa yatık</em>[/i]<br>
[url=http://www.url.com]some url[/url] veya [url]http://www.url.com[/url] şeklinde kullanılır');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Hata: Alıcı bulunamadı. Mesaj gönderilemedi.');		

DEFINE ('_UDDEIM_CANTREPLY', 'Bu mesajı cevaplayamazsınız.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail bildirimi kapalı. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail bildirimi açık. ');
DEFINE ('_UDDEIM_SETEMNON', '[Aç]');
DEFINE ('_UDDEIM_SETEMNOFF', '[Kapat]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Merhaba %you%,\n\n%user% kullanıcısı %site% sitesinden size bir özel mesaj gönderdi. Lütfen okumak için giriş yapın!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Merhaba %you%,\n\n%user% kullanıcısı %site% sitesinden size aşağıdaki özel mesajı gönderdi. Cevaplamak için lütfen giriş yapın!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Merhaba %you%,\n\n%site% sitesinde okunmamış özel bir mesajınız bulunmaktadır. Lütfen mesajınızı okumak için giriş yapın! ");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', '%site% sitesinden mesajınız var');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'site yöneticilerine gönderilecek(=alıcı cevaplamayabilir)');
DEFINE ('_UDDEIM_SEND_TOALL', 'bütün kullanıcılara gönder');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'bütün yöneticilere gönder');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'bütün çevrimiçi kullanıcılara gönder');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Beklenmedik hata: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arşiv etkin değil.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Mesajınız arşive depolanamadı.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Arşivinizde ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>mesajınız bulunmamaktadır.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Arşivinizde hiç mesaj yok.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' mesajlar');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Depolanmış bir mesajınız var');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Mesajı kaydetmeden önce, diğer mesajları silmelisiniz.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Kaydedebileceğiniz azami mesaj ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' mesajlar.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Şu an ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' mesajınız');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' message in your'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arşiv ve');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'gelen kutusu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'gelen kutusu ve arşivinizde bulunmaktadır');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Azami izin verilen ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Aldığınız mesajları bekletebilirsiniz ve okuyabilirsiniz fakat eski mesajlardan bir tane silmedikçe cevap yazamazsınız veya yeni bir tane mesaj oluşturamazsınız.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Depolanan Mesaj: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(Azami ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Mesaj arşive depolandı.');
DEFINE ('_UDDEIM_STORE', 'Arşiv');		// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'geri');
DEFINE ('_UDDEIM_TRASHCHECKED', 'seçileni sil');	// translators info: plural!	
DEFINE ('_UDDEIM_SHOWALL', 'hepsini göster');	// translators example "SHOW ALL messages"	
DEFINE ('_UDDEIM_ARCHIVE', 'Arşiv');		// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arşiv dolu. Kaydedilemedi.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Mesaj seçilmedi.');
DEFINE ('_UDDEIM_THISISACOPY', 'Gönderdiğiniz mesaj buraya kopyalanacak ');
DEFINE ('_UDDEIM_SENDCOPYTOME', ' bana kopyala');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'arşive kopyala');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'aslını çöp kutusuna gönder');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Mesaj İndirme');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Mesaj e-mail ile gönderildi');
DEFINE ('_UDDEIM_EXPORT_NOW', 'seçileni bana e-mail olarak gönder');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Bu mail sizin özel mesajınızı taşıyor.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'E-mail mesaj kapsamıyor olabilir.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Mesaj sınırı! Geri alınamadı.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Mesaj yaz ');

$udde_smon[1]="Oca";
$udde_smon[2]="Şub";
$udde_smon[3]="Mar";
$udde_smon[4]="Nis";
$udde_smon[5]="May";
$udde_smon[6]="Haz";
$udde_smon[7]="Tem";
$udde_smon[8]="Ağu";
$udde_smon[9]="Eyl";
$udde_smon[10]="Eki";
$udde_smon[11]="Kas";
$udde_smon[12]="Ara";

$udde_lmon[1]="Ocak";
$udde_lmon[2]="Şubat";
$udde_lmon[3]="Mart";
$udde_lmon[4]="Nisan";
$udde_lmon[5]="Mayıs";
$udde_lmon[6]="Haziran";
$udde_lmon[7]="Temmuz";
$udde_lmon[8]="Ağustos";
$udde_lmon[9]="Eylül";
$udde_lmon[10]="Ekim";
$udde_lmon[11]="Kasım";
$udde_lmon[12]="Aralık";

$udde_lweekday[0]="Pazar";
$udde_lweekday[1]="Pazartesi";
$udde_lweekday[2]="Salı";
$udde_lweekday[3]="Çarşamba";
$udde_lweekday[4]="Perşembe";
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
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'uddeIM için kullanmak istediğiniz temayı seçin');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'CB Bağlantılarını göster ');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Use <i>yes</i> if you have Community Builder installed and want to present the user the name of his/her connections on the compose new message page.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Ayarları Göster');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'The Settings link appears in uddeIM if you have the e-mail-notification or the blocking system activated. Eğer istemiyorsanız buradan kapatabilirsiniz. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'evet, altta');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'BB kodlara izin ver');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'sadece yazı sitilleri');
DEFINE ('_UDDEADM_ALLOWBB_EXP', '<i>sadece yazı stilleri</i>, seçildiğinde kullanıcıların bb kodlarında kalın, italik, çizgili, yazı rengi ve boyutunu değiştirebilirler. <i>evet</i>, olarak ayarladığınızda kullanıcılar <strong>tüm</strong> desteklenen BB kodlarını kullanabilirler (bağlantılar ve resimler).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Gülücüklere izin ver');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', '<i>evet</i>, olarak ayarladığınızda, gülücük kodlarındaki bu :-) gibi simgeler yerine grafik gülücükler gelecektir. Desteklenen gülücükleri görmek için beni oku dosyasına bakın.');
DEFINE ('_UDDEADM_DISPLAY', 'Görünüm');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Menü simgelerini göster');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', '<i>evet</i>, ayarlandığında menü ve işlem bağlantıları bir simge ile görüntülenir.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Bileşen Başlığı');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Özel mesajlaşma bileşeni için üst başlık, örneğin \'Özel Mesajlar\'. Başlık olmasını istemezseniz boş bırakın.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Hakkında bağlantısını göster');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Set to <i>yes</i> to show a link to the uddeIM software credits and license. Bu bağlantı uddeIm HTML çıkışının altında gösterilir.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'E-Postayı şimdi durdur');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Uddeim in mail göndermesini engellemek için bu kutuyu işaretleyin (e-mail-notifications and forgetmenot e-mails) irrespective of the users\' settings, for example when testing the site. If you do not want these features ever, set all options above to <i>no</i>.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails in lists');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Set to <i>yes</i> if you want to display the CB thumbnails of the users in the message lists overview (inbox, outbox, etc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Üyeleri Göster');
DEFINE ('_UDDEIM_CONNECTIONS', 'Bağlantılar');
DEFINE ('_UDDEIM_SETTINGS', 'Ayarlar');
DEFINE ('_UDDEIM_NOSETTINGS', 'There are no settings to adjust.');
DEFINE ('_UDDEIM_ABOUT', 'Hakkında'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Yeni Mesaj'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Posta-Habercisi');
DEFINE ('_UDDEIM_EMN_EXP', 'Yeni bir özel mesaj aldığınızda mailinize bilgi gelir.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Yeni mesaj geldiğinde mail gönder');
DEFINE ('_UDDEIM_EMN_NONE', 'Yeni mesaj geldiğinde mail gönderme');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Çevrimdışıyken mesaj gelirse mail gönder');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Mesajınıza cevap geldiğinde mail yollama');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Kullanıcı Engelleme'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'You can prevent users from sending you messages by blocking them. Choose <i>block user</i> when you view a messages from the respective user.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Değişiklikleri Kaydet');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB Kod etiketi koyu/kalın bir yazı biçimi verir. Kullanım: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB Kod etiketi yatık(italik) yazı biçimi verir. kullanım: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB Kod etiketi altı çizili yazı biçimi verir. kullanım: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB Kod etiketi renklendirilmiş yazı biçimi verir. Kullanım: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example FF0000 for red.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB Kod etiketi renklendirilmiş yazı biçimi verir. Kullanım: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example 00FF00 for green.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB Kod etiketi renklendirilmiş yazı biçimi verir. Kullanım: [color=#XXXXXX]renkli[/color] where XXXXXX is the hex code of the colour you want, for example 0000FF for blue.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB Kod etiketi normalden daha küçük yazı boyutu biçimi verir. Kullanım: [size=1]çok küçük metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB Kod etiketi normalden küçük yazı boyutu biçimi verir. Kullanım: [size=2] küçük metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB Kod etiketi normalden büyük yazı boyutu biçimi verir. Kullanım: [size=4]büyük metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB Kod etiketi normalden daha büyük yazı boyutu biçimi verir. Kullanım: [size=5]çok büyük metin.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB Kod etiketi bir resim dosyası yayınlamanız için link eklemenizi sağlar. Kullanım: [img]Resim-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB Kod etiketi bir web adresini göstermenizi sağlar. Kullanım: [url]web adresi[/url]. Tüm adreslerin başında http:// kullanmayı unutmayın.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Tüm açık BB etiketlerini kapat.');
