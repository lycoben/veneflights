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
// Language file: Hungarian (source file is ISO-8859-2)
// Translator:    Bulcs� Sz�sz <agy@neuro.hu>, www.neuroweb.hu
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'MooTools bet�lt�se');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Ez hat�rozza meg, hogy hogyan t�ltse be az uddeIM a MooTools-t (a MooTools az Autocompleter-hez sz�ks�ges): <i>Nincs</i> ezt akkor v�lasszuk, hogyha a template-b�l t�ltj�k be a MooTools-t, <i>Auto</i> aj�nlott alap�rtelmezett (ugyanaz, mint az uddeIM 1.2-n�l), J1.0 eset�ben megv�laszthatjuk, hogy MooTools 1.1 vagy 1.2-t haszn�ljunk.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'ne t�ltse be a MooTools-t');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'MooTools 1.1-t haszn�ljon');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'MooTools 1.2-t haszn�ljon');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...alap�rtelmezett be�ll�t�s a MooTools haszn�lat�hoz');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 encoded');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Id�z�na be�ll�t�sa');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Amennyiben az uddeIM nem megfelel�en mutatja az id�t, �t lehet �ll�tani az id�z�n�t.');
DEFINE ('_UDDEADM_HOURS', '�ra');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Verzi� inform�ci�:');
DEFINE ('_UDDEADM_STATISTICS', 'Statisztika:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Statisztika megjelen�t�se');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Itt tal�lhatunk n�h�gy fontos statisztik�t az �zeneteinkr�l, pl. t�rolt �zenetek sz�ma, stb.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'STATISZTIKA MEGJELEN�T�SE ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Az adatb�zisban t�rolt �zenetek: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'A c�mzett �ltal t�r�lt �zenetek: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'A k�ld� �ltal t�r�lt �zenetek: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Felf�ggesztett �zenetek: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'ItemID �t�r�sa');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Legt�bbsz�r az uddeIM automatikusan haszn�lja az itemID-t, de sok esetben sz�ks�g van, ennek a manu�lis be�llt�s�ra, pl. ha t�bb men�pont is mutat az uddeIM-re.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Detekt�lt itemID: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'ItemID haszn�lata');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Ink�bb ezt az itemID-t hazsn�ljuk, a detekt�lt helyett.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Profil link haszn�lata');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Amennyiben <i>igen</i>-re �ll�tjuk, az �sszes uddeIM-ben megjelen� felhaszn�l�n�v a felhaszn�l�i profilokhoz fog kapcsol�dni.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'B�lyegk�pek megjelen�t�se');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Amennyiben <i>igen</i>-re �ll�tjuk, az �zenet olvas�sakor a kapcsol�d� felhazsn�l� b�lyegk�pe fog megjelenni.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'B�lyegk�pek megjelen�t�se az �zenetlist�ban');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Amennyiben<i>igen</i>-re �ll�tjuk, a felhaszn�l�k b�lyegk�pei megjelennek a list�ban (postal�da, kimen�, stb.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Nem enged�lyezett');
DEFINE ('_UDDEADM_ENABLED', 'Enged�lyezett');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Megjel�lt');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', 'Nem jel�lt');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Az �zenetek megjel�l�s�nek enged�lyez�se');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Amennyiben enged�lyezz�k az �zenetek megjel�l�s�t, az uddeIM �zenetlist�ban csillagokkal jel�lhetj�k meg a fontos �zeneteket.');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Fontos: Ha az uddeIM-et egy kor�bbi verzi�r�l friss�tj�k, felt�tlen�l ellen�r�zz�k a README f�jlt! El�fordulhat ugyanis, hogy adatb�zis t�bl�kat vagy mez�ket kell felvenn�nk vagy m�dos�tanunk!');
DEFINE ('_UDDEIM_ADDCCINFO', 'M�solatot kap: sor hozz�ad�sa');
DEFINE ('_UDDEIM_CC', 'M�solatot kap:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Id�zett sz�vegr�sz lev�g�sa');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Az id�zett sz�vegr�szt lev�gja a maxim�lisan engedlyezett sz�veghossz�s�g 2/3 �ra.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Postafi�k bejegyz�sek ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Utols� ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' bejegyz�s');
DEFINE ('_UDDEIM_PLUG_STATUS', '�llapot');
DEFINE ('_UDDEIM_PLUG_SENDER', 'K�ld�');
DEFINE ('_UDDEIM_PLUG_MESSAGE', '�zenet');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Postafi�k �r�t�se');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Kuka hozz�f�r�s�nek a tilt�sa.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Kuka hozz�f�r�s�nek a korl�toz�sa');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Korl�tozhatjuk a kuka hozz�f�r�s�t. Alap helyzetben a kuka hozz�f�r�se szabad (<i>nem korl�tozott</i>). Korl�tozni lehet a hozz�f�r�st, hogy csak a speci�lis vagy adminisztr�tor jog� felhaszn�l�k f�rhessenek hozz�, �gy az alacsonyabb felhaszn�l� csoport tagjai ne tudj�k vissza�ll�tani a t�r�lt �zeneteket.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'nem korl�tozott');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'csak speci�lis felhaszn�l�knak');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'csak adminisztr�toroknak');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Felhaszn�l�k elrejt�se a felhaszn�l� list�b�l');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Adjuk meg a felhaszn�l�i azonos�t�kat, amelyeket nem szeretn�nk szerepeltetni a felhaszn�l�i list�ban (pl. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Felhaszn�l�k elrejt�se a felhaszn�l� list�b�l');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Adjuk meg a felhaszn�l�i azonos�t�kat, amelyeket nem szeretn�nk szerepeltetni a felhaszn�l�i list�ban (pl. 65,66,67). Az adminisztr�torok minden esetben l�tj�k az �sszes felhaszn�l�t.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF t�mad�s felismer�se');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF v�delem');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Ez mindenkit v�d a "sz�jtok k�z�tti hamis lek�r�sek" t�mad�s�t�l. �ltal�ban �rdemes bekapcsolnunk ezt a v�delmet. Csak akor kapcsoljuk ki, ha valami gyan�s probl�m�val tal�lkozunk.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Archiv�lt �zenetekre nem lehet v�laszolni.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Nem regisztr�lt felhaszn�l�nak k�ld�tt �zentet nem lehet visszah�vni.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'V�lasz enged�lyez�se');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Direkt �zenet enged�lyez�se a nem regisztr�lt felhaszn�l�k �zeneteire.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Hello %user%,\n\n%you% a k�vetkez� priv�t �zenetet k�ldte a %site% sz�jtr�l.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Val�di n�v haszn�lata');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'A val�di nevet, vagy a felhaszn�l�nevet haszn�ljuk a weboldalon?');
DEFINE ('_UDDEIM_USERLIST', 'Felhaszn�l�i lista');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Eln�z�st, de az �j �zenet k�ld�se el�tt v�rni kell!');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Utolj�ra k�ld�tt');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Id�k�z');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Id�, amelynek el kell telnie k�t �zenet k�ldse k�z�tt (0, ha nincsen v�rakoztat�s).');
DEFINE ('_UDDEADM_SECONDS', 'm�sodperc');
DEFINE ('_UDDEIM_PUBLICSENT', '�zenet elk�ldve.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Hiba a k�ld� nev�ben');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Hiba az emailc�mben');
DEFINE ('_UDDEIM_YOURNAME', 'Neved:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Emailc�med:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Ez az uddeIM verzi� van haszn�latban ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'A legfrissebb uddeIM verzi� van haszn�latban.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'A jelenlegi verzi� ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Friss�t�si inform�ci�:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Friss�t�s keres�se');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Felkapcsol�dik az uddeIM fejleszt�i weboldal�ra, a jelenlegi legfrissebb verzi� ellen�rz�s��rt. Az uddeIM verzi�n k�v�l semmi m�s adat (semmilyen szem�lyes adat sem!) nem ker�l t�v�bb�t�sra.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'ELLEN�RZ�S');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Nem siker�lt lek�rni a verzi� inform�ci�t.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'C�mlista nem tal�lhat�!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Maxim�lis sz�m� cimzett el�rve (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Bejegyz�sek maxim�lis sz�ma');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'C�mlista maxim�lis bejegyz�seinek sz�m�nak a meghat�roz�sa.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'C�mlista haszn�lata nem enged�lyezett');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'C�mlista haszn�lat�nak enged�lyez�se');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'Az uddeIM lehet�v� teszi, hogy a felhaszn�l�k c�mlist�kat hozzanak l�tre. Ezekkel a list�kkal egyszer�en k�ldhet� �zenet t�bb c�mzettnek. Ne felejts�k el bekapcsolni a "T�bb c�mzett enged�lyez�s�t", ha c�mlist�t szeretn�nk haszn�lni.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'kikapcsolva');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'regisztr�lt felhaszn�l�knak');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'speci�lis felhaszn�l�knak');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'adminisztr�toroknak');
DEFINE ('_UDDEIM_LISTSNEW', '�j c�mlista l�trehoz�sa');
DEFINE ('_UDDEIM_LISTSSAVED', 'C�mlista elmentve');
DEFINE ('_UDDEIM_LISTSUPDATED', 'C�mlista friss�tve');
DEFINE ('_UDDEIM_LISTSDESC', 'Le�r�s');
DEFINE ('_UDDEIM_LISTSNAME', 'N�v');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'N�v (sz�k�z n�lk�l)');
DEFINE ('_UDDEIM_EDITLINK', 'szerkeszt�s');
DEFINE ('_UDDEIM_LISTS', 'C�mzettjeim');
DEFINE ('_UDDEIM_STATUS_READ', 'olvasott');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'olvasatlan');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'online');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'offline');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'CB k�p megjelen�t�se');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Alaphelyzetben az uddeIM csak a felhaszn�l�k �ltal felt�lt�tt ikon k�peket jelen�ti meg. Ha ezta be�ll�t�st aktiv�ljuk, akkor az uddeIM a CB ikonk�peit fogja haszn�lni.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'CB kapcsolatok haszn�lata');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Azoknak a felhaszn�l�knak lehet �zenetet k�ldeni, akik a CB ismer�s list�n szerepelnek. (m�gha az adott felhaszn�l� a blokkolt list�n szerepel is). Ez a be�ll�t�s f�ggetlen a felhaszn�l�k egy�ni blokkol�s�t�l. (l�sd a fenti be�ll�t�st).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Ennek a csoportnak nem kuldhetsz �zenetet.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'A c�mzett blokkolt.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blokkolt csoportok (regisztr�lt felhaszn�l�k)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Azoknak a felhaszn�l�knak a csoportja, akiknek nem k�ldhetnek �zenetet. Ez csak a sima regisztr�lt felhaszn�l�kra vonatkozik. Speci�lis felhaszn�l�kra �s adminisztr�torokra nincsen hat�ssal ez a be�ll�t�s. Ez a be�ll�t�s f�ggetlen a felhaszn�l�k egy�ni blokkol�s�t�l. (l�sd a fenti be�ll�t�st).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blokkolt csoportok (vend�g felhaszn�l�k)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Azoknak a felhaszn�l�knak a csoportja, akiknek a vend�g felhaszn�l�k nem k�ldhetnek �zenetet. Ez a be�ll�t�s f�ggetlen a felhaszn�l�k egy�ni blokkol�s�t�l. (l�sd a fenti be�ll�t�st). ');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Vend�g felhaszn�l�');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB kapcsolat');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Regisztr�lt felhaszn�l�');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Szerz�');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Szerkeszt�');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'K�zz�tev�');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Adminisztr�tor');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'A felhaszn�l�k csak regisztr�lt tagokt�l fogadnak �zenetet.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', '"�sszes tag" lista elrejt�se a vend�g felhaszn�l�k el�l');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'A publikus hozz�f�r�s el�l t�bb csoportot is elrejthet�nk az "�sszes tag" list�ban. Figyelem: Ez csak a neveket rejti el, ett�l m�g k�ldhet� a felhaszn�l�nak �zenet. Azok a tagok, akik lekapcsolj�k a publikus megjelen�st, nem fognak szerepelni ebben a list�ban!');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Elrejt�s az "�sszes tag" list�b�l');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'A hozz�f�r�s el�l t�bb csoportot is elrejthet�nk az "�sszes tag" list�ban. Figyelem: Ez csak a neveket rejti el, ett�l m�g k�ldhet� a felhaszn�l�nak �zenet.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'nincs');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'csak szuperadminoknak');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'csak adminoknak');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'speci�lis felhaszn�l�knak');
DEFINE ('_UDDEADM_PUBLIC', 'Publikus');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Az "�sszes tag" lista link m�k�d�se');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Kattint�sra, vagy �lland�an mutassa a list�t.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Publikus oldal');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- v�lassz -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Vend�g felhaszn�l�k is k�ldhessenek �zenetet');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'El�rt�k a maxim�lis �zenetsz�mot!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Vend�g felhaszn�l�');
DEFINE ('_UDDEIM_DELETEDUSER', 'Felhaszn�l� t�r�lve');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha hossza');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Megadhat�, hogy biztons�gi k�dk�nt h�ny karaktert �rjon be a felhaszn�l�.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam v�delem');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', '�ll�tsuk be, hogy melyik felhaszn�l�knak kell megadni a biztons�gi k�dot');
DEFINE ('_UDDEADM_CAPTCHAF0', 'kikapcsolva');
DEFINE ('_UDDEADM_CAPTCHAF1', 'csak a vend�geknek');
DEFINE ('_UDDEADM_CAPTCHAF2', 'vend�gek �s regisztr�ltak');
DEFINE ('_UDDEADM_CAPTCHAF3', 'vend�gek, regisztr�ltak �s speci�lis felhaszn�l�k');
DEFINE ('_UDDEADM_CAPTCHAF4', 'mindenki (m�g az adminok is)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Publikus megjelen�s enged�lyez�se');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Ha enged�lyezz�k, a vend�g felhaszn�l�k is k�ldhetnek �zenetet a regisztr�ltaknak (a felhaszn�l�k saj�t meguk be tudj�k �ll�tani, hogy akarnak-e nem regisztr�ltakt�l fogadni).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Publikus megjelen�s alaphelyzet');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Ez az alapbe�ll�t�s, hogy a vend�gek tudjanak-e k�ldeni a regisztr�ltaknak �zenetet.');
DEFINE ('_UDDEADM_PUBDEF0', 'kikapcsolva');
DEFINE ('_UDDEADM_PUBDEF1', 'bekapcsolva');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Hib�s biztons�gi k�d');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'nincs vagy ismeretlen');
DEFINE ('_UDDEADM_DONATE', 'Ha el�gedett vagy az uddeIM-mel egy kis adom�nnyal seg�theted a fejleszt�k munk�j�t.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Arhc�v�lt be�ll�t�sok az adatb�zisban: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Be�ll�t�sok archiv�l�sa �s vissza�ll�t�sa');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Archiv�lhatjuk illetve visszat�lthetj�k a be�ll�t�sokat, ha sz�ks�ges. Az az uddeIM friss�t�sekor, illetve a be�ll�t�sok tesztel�sekor lehet hasznos.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'ARCH�V�L�S');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'VISSZAT�LT�S');
DEFINE ('_UDDEADM_CANCEL', 'M�gse');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Nyelvi f�jl karakter k�dol�sa');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'A Joomla 1.0-n�l �ltal�ban az <strong>(ISO-8859-1)</strong> (alap�rtlemezett) a megfelel�, Joomla 1.5-h�z pedig a <strong>UTF-8</strong> javasolt.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'alap�rtlemezett');
DEFINE ('_UDDEIM_READ_INFO_1', 'Az olvasott �zenetek maximum ');
DEFINE ('_UDDEIM_READ_INFO_2', ' napig maradnak a postal�d�ban, azut�n automatikusan t�rl�dni fognak.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Az olvasatlan �zenetek maximum ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' napig maradnak a postal�d�ban, azut�n automatikusan t�rl�dni fognak.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Az elk�ld�tt �zenetek maximum ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' napig maradnak a postal�d�ban, azut�n automatikusan t�rl�dni fognak.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Cimke megjelen�t�se az olvasott �zenetkn�l');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Cimke megjelen�t�se \"Az olvasott �zenetek n nap m�lva t�rl�dnek\" ');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Cimke megjelen�t�se az olvasatlan �zenetkn�l');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Cimke megjelen�t�se \"Az olvasatlan �zenetek n nap m�lva t�rl�dnek\" ');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Cimke megjelen�t�se az elk�ld�tt �zenetkn�l');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Cimke megjelen�t�se \"Az olvasatlan �zenetek n nap m�lva t�rl�dnek\" ');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Cimke megjelen�t�se a kuk�ban l�v� �zenetkn�l');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Cimke megjelen�t�se \"A kuk�ban l�v� �zenetek n nap m�lva t�rl�dnek\"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Elk�ld�tt �zenek megtart�sa  napig');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Adjuk meg, hogy az <b>elk�ld�tt</b> uzenetek h�ny nap m�lva t�rl�djenek a postal�d�b�l.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'k�ld�se az �sszes "kiemelt" felhaszn�l�nak');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', '�zenet az <strong>�sszes kiemelt felhaszn�l�nak</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- felh. n�v kiv�laszt�sa -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- n�v kiv�laszt�sa -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Felhaszn�l�i be�ll�t�sok szerkeszt�se');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'l�tez�');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'nem l�tez�');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- bevitel kiv�laszt�sa -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- �rtes�t�s kiv�laszt�sa -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- popup kiv�laszt�sa -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Felhaszn�l�n�v');
DEFINE ('_UDDEADM_USERSET_NAME', 'N�v');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', '�rtes�t�s');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Legut�bbi el�r�s');
DEFINE ('_UDDEADM_USERSET_NO', 'Nem');
DEFINE ('_UDDEADM_USERSET_YES', 'Igen');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'ismeretlen');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Ha nem el�rhet� (kiv�ve a v�laszok)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Mind�g (kiv�ve a v�laszok)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Ha nem el�rhet�');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Mind�g');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Nincs �rtes�t�');
DEFINE ('_UDDEADM_WELCOMEMSG', "K�sz�nt�nk az uddeIM mag�n�zenet k�ld� rendszerben!\n\nSikeresen telep�tetted az uddeIM komponenst.\n\nPr�b�ljuk ki a t�bbi sablont is, ezeket az uddeIM adminisztraci�s fel�let�n lehet v�ltani.\n\nAz uddeIM jelenleg is fejleszt�s alatt �ll, ez�rt b�rmilyen hiba, hi�nyoss�g vagy probl�ma eset�n �rdemes jelezni a fejleszt�knek, hogy egy�tt jobb� tudjuk tenni ezt a k�z�ss�gi kapcsolattart� rendszert.\n\nMinden j�t k�v�nunk az uddeIM haszn�lat�hoz!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'Az uddeIM telep�t�se befejezve.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Az adminisztr�ci�s fel�let be�ll�t�saival lehet befejeznia rendszer be�zemel�s�t.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Amennyiben a keretrendszer az ISO 8859-1 -t�l elt�r� karakterk�dol�st haszn�l, felt�tlen�l ellen�r�zz�k az uddeIM kapcsol�d� be�ll�t�sait.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'A telep�t�s ut�n az �sszes uddeIM email forgalom (email �rtes�t�k, eml�keztet�k) lekapcsol�sra ker�l, �gy ameddig a rendszer be�ll�t�sa �s tesztel�se folyik addig ezek az emailek nem ker�lnek kik�ld�sre! Ha v�gezt�nk a rendszer�nk finomhangol�s�val ne felejts�k el kikapcsolni a "emailek le�ll�t�sa" opci�t az adminisztr�ci�s men�ben!');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. c�mzettek');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Egy �zenethez tartoz� c�mzettek maxim�lis sz�ma (0=nincs korl�toz�s)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 't�l sok c�mzett');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Email k�ld�s kikapcsolva.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Sz�vegen bel�li keres�s');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Sz�vegen bel�li keres�s (egy�bk�nt mindig csak a kezdetekt�l keres)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', '\"�sszes felhaszn�l�\" link megjelen�se');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Az \"�sszes felhaszn�l�\" link megjelen�t�s�t v�laszthatjuk ki:');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', '\"�sszes felhaszn�l�\" link elrejt�se');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', '\"�sszes felhaszn�l�\" link megjelen�t�se');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Mind�g mutassuk az �sszes felhaszn�l�t');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'A be�ll�t�sok nem menthet�k:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'A be�ll�t�sok menthet�k:');
DEFINE ('_UDDEIM_FORWARDLINK', 'tov�bb�t�s');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'c�mzettet tal�ltunk');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'c�mzettet tal�ltunk');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (alap)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Emailk�ld�s m�dja');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'V�lasszuk ki az uddeIM �rtes�t�inek emailk�ld�si m�dj�t.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Joomla csoportok megjelen�t�se');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Az �ltal�nos rendszer�zenet k�ld�s�n�l a c�mzett list�ban jelenjenek meg a Joomla csoportok is.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', '�zenet tov�bb�t�sa');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', '�zenet tov�bb�t�s�nak az enged�lyez�se.');
DEFINE ('_UDDEIM_FWDFROM', 'Eredeti �zenet k�ld�je:');
DEFINE ('_UDDEIM_FWDTO', 'C�mzett:');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', '�zenet vissza�ll�t�sa');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Nem lehet vissza�ll�tani az �zenetet');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'T�bb c�mzett enged�lyez�se');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'T�bb c�mzett enged�lyez�se (vessz�vel elv�lasztva pl. Pisti,J�zsi,Peti).');
DEFINE ('_UDDEIM_CHARSLEFT', 'karakter maradt');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Sz�veg sz�ml�l� megjelen�t�se');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Sz�veg sz�ml�l� megjelen�t�se, amely mutatja, hogy mennyi bet� maradt az enged�lyezett korl�tb�l.');
DEFINE ('_UDDEIM_CLEAR', 'T�rl�s');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'A kiv�lasztott felhaszn�l�k a c�mzettekhez ker�lnek');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Ez�ltal t�bb felhaszn�l�t is kiv�laszthatunk az \"�sszes felhaszn�l�\" list�b�l.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Ismer�s�k kiv�laszt�sa a c�mzettekhez');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Ez�ltal a CB \"Ismer�s\" list�b�l is v�laszthatunk c�mzetteket.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS-t tal�ltunk: ');
DEFINE ('_UDDEIM_ENTERNAME', 'n�v megad�sa');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Autokieg�sz�t� haszn�lata');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Autokieg�sz�t� haszn�lata a c�mzettek megad�sakor.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'K�dol�si kulcs');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Adjuk meg a kulcsot az �zenet sz�veg�nek a titkos�t�s�hoz. Miut�n enged�lyezt�k az �zenetk titkos�t�s�t, NE v�ltoztassuk meg!');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Nem megfelel� konfigur�ci�s f�jlt tal�ltunk!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Tal�lt verzi�:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'V�rhat� verzi�:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Be�ll�t�sok konvert�l�sa...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'K�sz!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'S�lyos hiba: nem tudtuk �rni a konfigur�ci�s f�jlt:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'K�dolt �zenet! - Let�lt�se nem lehets�ges!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Hib�s jelsz�! - Let�lt�se nem lehets�ges!');
DEFINE ('_UDDEIM_WRONGPW', 'Hib�s jelsz�! - K�rj�k �rtes�tse a rendszer adminisztr�tort!');
DEFINE ('_UDDEIM_WRONGPASS', 'Hib�s jelsz�!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Hib�s t�rl�si d�tum (be�rkez�/kimen� levelek): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Hib�s t�rl�si d�tumok jav�t�sa');
DEFINE ('_UDDEIM_TODP', 'C�mzett: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', '�zenetek ritk�t�sa');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'M�veleti ikonok megjelen�t�se');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Amennyiben <i>igen</i> re �ll�tjuk, a m�veleteket sz�veg helyett ikonokkal fogjuk helyettes�teni.');
DEFINE ('_UDDEIM_UNCHECKALL', 'kijel�l�sek visszavon�sa');
DEFINE ('_UDDEIM_CHECKALL', 'mindet kijel�l');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Als� ikonok megjelen�t�se');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Amennyiben <i>igen</i> re �ll�tjuk, az als� gombokat sz�veg helyett ikonokkal fogjuk helyettes�teni.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Anim�lt vigyorok haszn�lata');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Anim�lt vigyorok haszn�lata az �ll�k helyett.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'T�bb anim�lt vigyor');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'T�bb anim�lt vigyort jelen�t meg.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'K�dolt �zenet - Jelsz� sz�ks�ges');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Jelsz� sz�ks�ges</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Jelsz�');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (k�dolt �zenet)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (dek�dolt �zenet)');
DEFINE ('_UDDEIM_MORE', 'TOV�BB');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Mag�n �zenetek');
DEFINE ('_UDDEMODULE_NONEW', 'nincsen �j �zenet');
DEFINE ('_UDDEMODULE_NEWMESSAGES', '�j �zenet: ');
DEFINE ('_UDDEMODULE_MESSAGE', '�zenet');
DEFINE ('_UDDEMODULE_MESSAGES', '�zenet');
DEFINE ('_UDDEMODULE_YOUHAVE', 'A postal�d�ban');
DEFINE ('_UDDEMODULE_HELLO', 'Szia');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Gyors �zenet');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'K�dol�s haszn�lata');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'T�rolt �zenetek k�dol�sa');
DEFINE ('_UDDEADM_CRYPT0', 'Nincsen');
DEFINE ('_UDDEADM_CRYPT1', 'Zavart �zenetek');
DEFINE ('_UDDEADM_CRYPT2', 'K�dolt �zenetek');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Alap�ertlmezett email �rtes�t�si be�ll�t�s');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Alap�rtelmezett email �rtes�t�si be�ll�t�s, azoknak a felhaszn�l�knak, akik ezt a be�ll�t�st m�g nem v�ltoztatt�k meg.');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Nincs �rtes�t�s');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Mind�g');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Csak, ha a felhaszn�l� nincsen bejelentkezve');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', '"�sszes felhaszn�l�" link elrejt�se');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', '"�sszes felhaszn�l�" link elrejt�se az �zenet �r�sakor (hasznos ha az oldalnak nagysz�m� felhaszn�l�ja van).');
DEFINE ('_UDDEADM_POPUP_HEAD','Felugr� �rtes�t�');
DEFINE ('_UDDEADM_POPUP_EXP','Felugr� ablak jelenik meg �j �zenet �rkez�sekor (m�dos�tott mod_cblogin modul sz�ks�ges)');
DEFINE ('_UDDEIM_OPTIONS', 'Tov�bbi be�ll�t�sok');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Itt lehet m�dos�tani n�h�ny tov�bbi be�ll�t�st.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Felugr� ablak jelenik meg �j �zenet �rkez�sekor');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Felugr� �rtes�t�ablak alap�rtelmezettk�nt');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Felugr� �rtes�t�ablak enged�lyez�se alap�rtelmezettk�nt, azoknak a felhaszn�l�knak, akik ezt a be�ll�t�st m�g nem v�ltoztatt�k meg.');
DEFINE ('_UDDEADM_MAINTENANCE', 'Karbantart�s');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Adatb�zis karbantart�sa');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'ELLEN�RZ�S');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'JAV�T�S');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Ha egy felhaszn�l�t t�r�lt�nk az adatb�zisb�l, az �zenete m�g megmaradhatott valahol. Ez a funkci� lehet�v� teszi, hogy a gazd�tlan �zeneteket sz�ks�g eset�n t�r�lhess�k.<br />Tov�bb� kisebb adatb�zis hib�kat is jav�tani tudunk.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Ellen�rz�s...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Username): [postal�da|postal�da t�r�lt|kimen� mappa|kimen� t�r�lt]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>postal�da: a be�rkezett �zenetek a felhaszn�l�k postal�d�j�ban t�rol�dnak</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>postal�da t�r�lt: �zenetek a postal�d�b�l t�r�lve, de valakinek a kimen� mapp�j�ban m�g szerepel</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>kimen� mappa: az elk�ld�tt �zenetek a kimen� mapp�ba ker�lnek</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>kimen� t�r�lt: a kimen� mapp�b�l m�r t�r�lt�k, de a c�mzett postal�d�j�ban m�g szerepel</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "T�rl�s...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "nem tal�ltam (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "a felhaszn�l� �sszes be�ll�t�s�nak a t�rl�se");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "a felhaszn�l� blokkol�s�nak a t�rl�se");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "az �sszes t�r�lt felhaszn�l�nak k�ld�tt �zenet t�rl�se ");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "az �sszes t�r�lt felhaszn�l� �ltal k�ld�tt �zenet t�rl�se");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nincsen tennival�<b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Karbantart�s sz�ks�ges<b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Val�di n�v haszn�lata');
DEFINE ('_UDDEADM_NAMESDESC', 'Felhaszn�l� n�v vagy val�di n�v haszn�lata?');
DEFINE ('_UDDEADM_REALNAMES', 'val�di n�v');
DEFINE ('_UDDEADM_USERNAMES', 'felhaszn�l� n�v');
DEFINE ('_UDDEADM_CONLISTBOX', 'CB kapcsolatok lista doboz');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'A kapcsolatok megjelen�t�se list�ban vagy t�bl�zatban?');
DEFINE ('_UDDEADM_LISTBOX', 'List�ban');
DEFINE ('_UDDEADM_TABLE', 'T�bl�zatban');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Az �zenetek a t�rl�s el�tt 24 �r�ig a kuk�ban maradnak. Csak az �zenet els� n�h�ny szava l�that�. Az �zenet elolvas�s�hoz el�sz�r vissza kell helyezni a postal�d�ba.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Az �zenetek ennyi ideig marajanak a kuk�ban: ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' ut�na t�rl�dni fognak. Csak az �zenet els� n�h�ny szava l�that�. Az �zenet elolvas�s�hoz el�sz�r vissza kell helyezni a postal�d�ba.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Az �zenetet visszah�vtuk. Olvashat� vagy �jra k�ldhet�.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Az �zenetet nem tudtuk visszah�vni! (pl. vagy m�r elolvast�k, vagy kit�r�lt�k)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Az �zenetet nem tudtuk vissza�ll�tani. (T�l sok�ig volt a kuk�ban, �s v�gleg t�rl�d�tt.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Az �zenet vissza�ll�t�sa meghi�sult.');
DEFINE ('_UDDEIM_DONTSEND', 'Ne k�ldj�k el');
DEFINE ('_UDDEIM_SENDAGAIN', '�jra k�ld�s');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Be kell jelentkezni!');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Nincsen be�rkezett �zenet a postal�d�ban!</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Nincsen �zenet a kimen� mapp�ban!</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>A kuka �res!</strong>');
DEFINE ('_UDDEIM_INBOX', 'Postal�da');
DEFINE ('_UDDEIM_OUTBOX', 'Kimen� mappa');
DEFINE ('_UDDEIM_TRASHCAN', 'Kuka');
DEFINE ('_UDDEIM_CREATE', '�j �zenet');
DEFINE ('_UDDEIM_UDDEIM', 'Mag�n �zenetek');
DEFINE ('_UDDEIM_READSTATUS', 'Olvas');
DEFINE ('_UDDEIM_FROM', 'Felad�');
DEFINE ('_UDDEIM_TO', 'c�mzett: ');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'A kimen� mapp�ban tal�lhat�k az elk�ld�tt �zenetek, ameddig t�rl�sre nem ker�lnek. Vissza lehet h�vni egy elk�ld�tt �zenetet, ameddig a c�mzett enm olvasta el vagy nem t�r�lte. Az �zenet visszah�v�sakor kiker�l a c�mzett postal�d�j�b�l! ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'visszah�v�s');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', '�zenet visszah�v�sa');
DEFINE ('_UDDEIM_RESTORE', 'vissza�ll�t');
DEFINE ('_UDDEIM_MESSAGE', '�zenet');
DEFINE ('_UDDEIM_DATE', 'D�tum');
DEFINE ('_UDDEIM_DELETED', 'T�r�lve');
DEFINE ('_UDDEIM_DELETE', 't�rl�s');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 't�rl�s');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'ez az �zenet nme jelen�thet� meg. <br />Lehets�ges okok:<ul><li>Nincsen jogod elolvasni ezt az �zenetet</li><li>Az �zenetet t�r�lt�k</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Az �zenet a kuk�ba ker�lt!</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Felad�: ');
DEFINE ('_UDDEIM_MESSAGETO', '�zeneted c�mzetje: ');
DEFINE ('_UDDEIM_REPLY', 'V�lasz');
DEFINE ('_UDDEIM_SUBMIT', 'K�ld�s');
DEFINE ('_UDDEIM_DELETEREPLIED', 'A v�laszt k�vet�en az erdeti �zenet ker�lj�n a kuk�ba');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'Hiba: Nem tal�ltunk ilyen c�mzettet! Az �zenetet nem k�ldt�k el!');
DEFINE ('_UDDEIM_NOMESSAGE', 'Hiba: Az �zenet nme tartalmaz sz�veget! Az �zenetet nem k�ldt�k el.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'V�lasz elk�ldve');
DEFINE ('_UDDEIM_MESSAGE_SENT', '�zenet elk�ldve');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' �s az eredeti �zenet a kuk�ba ker�lt!');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Ilyen felhaszn�l�n�v nincsen a rendszerben!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Magadnak nem k�ldhetsz �zenetet!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Hiba a folyamatban!</b> Ehhez a m�velethez nincsen jogosults�god!');
DEFINE ('_UDDEIM_PRUNELINK', 'Kiz�r�lag adminisztr�toroknak: Ritk�t�s');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM adminisztr�ci�');
DEFINE ('_UDDEADM_GENERAL', '�ltal�nos');
DEFINE ('_UDDEADM_ABOUT', 'Rendszer info');
DEFINE ('_UDDEADM_DATESETTINGS', 'D�tum/id�');
DEFINE ('_UDDEADM_PICSETTINGS', 'Ikonok');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Olvasott �zenetek meg�rz�se (napok)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Olvasatlan �zenetek meg�rz�se (napok)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Kuk�ban l�v� �zenetek meg�rz�se (napok)');
DEFINE ('_UDDEADM_DAYS', 'nap(ok)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Adjuk meg a napok sz�m�t miut�n az <b>olvasott</b> �zenetek t�rl�sre ker�lnek a postal�d�b�l. Ha nem akarjuk, hogy az �zenetek magukt�l t�rl�djenek, nagyon nagy �rt�ket adjunk meg (pl. 36524 nap egy �vsz�zad). De tartsuk szemel�tt, hogy az adatb�zis hamar megtelhet az �zenetekkel! Sz�val csak okosan! ');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Adjuk meg a napok sz�m�t miut�n az <b>olvasatlan</b> �zenetek t�rl�sre ker�lnek.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Adjuk meg a napok sz�m�t miut�n az �zenetek t�rl�sre ker�lnek a kuk�b�l. Megadhatunk 1-n�l kisebb �rt�ket is pl. 0.125 jelenti az �zenetek t�rl�s�t 3 �ra eltelt�vel.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'D�tum megjelen�t�si form�tum');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'V�lasszuk ki a megjelen� d�tum form�tumot. A h�napok nevei az aktu�lis nyelvi be�ll�t�sok szerint fognak megjelenni (amennyiben a megfelel� uddeIM nyelvi f�jl l�tezik!).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Hosszabb d�tum megjelen�se');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Az �zenet megnyit�sakor nagyobb hely van a d�tum megjelen�t�s�re, ekkor a hosszabb d�tumform�tum fog megjelenni, ez�rt fontos, hogy ezt is megfelel�en be�ll�tsuk. A napok �s a h�napok nevei az aktu�lis nyelvi be�ll�t�sok szerint fognak megjelenni (amennyiben a megfelel� uddeIM nyelvi f�jl l�tezik!).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'T�rl�s csak az adminisztt�tornak lehets�ges');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'igen, csak az adminisztr�tor');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'nem, b�rki');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manu�lis');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Az automatikus t�rl�s nagyon megterhelheti a szervert. Ha az <i>igen,&nbsp;csak&nbsp;az&nbsp;adminisztr�tor</i> be�ll�t�st v�lasztottuk, akkor az �sszes felhaszn�l�k �sszes �zenetei megjelennek az adminisztr�tor postal�d�j�ban! ezt akkor v�lasszuk, ha az adminisztr�tor gyakran l�togatja az oldalt �s ellen�rzi a postal�d�j�t. Kis weboldalakn�l �ll�tsuk <i>nem,&nbsp;b�rki</i>-re. Ha nem �rtj�k pontosan ennek a m�k�d�s�t, akkor is <i>nem,&nbsp;b�rki</i>-re �ll�tsuk!');

	// above string changed in 0.4
DEFINE ('_UDDEADM_SAVESETTINGS', 'Be�ll�t�sok ment�se');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'A kovetkez� be�ll�t�sok ker�ltek ment�sre:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'A be�ll�t�sokat elmentett�k.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ikon: felhaszn�l� el�rhet�');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Ha m�sik ikonnal szeretn�nk jelezni a felhaszn�l� �llapot�t, adjuk meg a megfelel� el�r�si utat.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ikon: felhaszn�l� nem el�rhet�');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Ha m�sik ikonnal szeretn�nk jelezni a felhaszn�l� �llapot�t, adjuk meg a megfelel� el�r�si utat.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Ikon: �zenet olvas�sa');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Ha m�sik ikonnal szeretn�nk jelezni az �zenet olvas�s�t, adjuk meg a megfelel� el�r�si utat.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ikon: olvasatlan �zenet');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Ha m�sik ikonnal szeretn�nk jelezni az olvasatlan �zenetet, adjuk meg a megfelel� el�r�si utat.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: �j �zenet ikon');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Ez a be�ll�t�s a mod_uddeim_new modult �ll�tja. Adjuk meg az �j �zenetet jelz� ikon el�r�si �tj�t, ha m�sikat szeretn�nk haszn�lni.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM telep�t�s');
DEFINE ('_UDDEADM_FINISHED', 'A telep�t�s befejez�d�tt. K�sz�ntj�k az uddeIM mag�n�zenetk�ld� rendszerben! ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Nincsen CB telep�tve. Az uddeIM nem haszn�lhat�.</span><br /><br /> <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'folytat�s');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Tal�ltunk ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' �zenetet a kor�bbi PMS-b�l. Import�ljuk az uddeIM-be?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Ez nem befoly�solja a jelenegi telep�t�st vagy a kor�bbi �zeneteket, s�rtetlenek maradnak. Miel�tt az import�l�st elkezden�nk ments�l el az id�k�zben m�dos�tott be�ll�t�sokat. A jelenelgi uddeIM �zenetek is s�rtetlenek maradnak.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4

DEFINE ('_UDDEADM_IMPORT_YES', 'A kor�bbi PMS �zenetek import�l�sa uddeIM-be');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nem, ne import�ljunk semmit');
DEFINE ('_UDDEADM_IMPORTING', 'K�rj�k v�rja meg az �zenetek import�l�s�t!');
DEFINE ('_UDDEADM_IMPORTDONE', 'Az import�l�s befejez�d�tt. Ne ind�tsuk el �jra az import�l�st, k�l�nben az adatok dupl�n fognak szerepelni!');
DEFINE ('_UDDEADM_IMPORT', 'Import�l�s');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'A kor�bbi PMS �zeneteinek import�l�sa');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Nem tal�ltunk kor�bbi PMS rendszert. Az import�l�s �gy nem lehets�ges.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">M�r sikeresen v�grehajtottuk az �zenetek importj�t!</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Blokkolva');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nincsen elk�ldve (a felhaszn�l� blokkolt minket)');
DEFINE ('_UDDEIM_BLOCKNOW', 'felhaszn�l�&nbsp;blokkol�sa');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'A blokkolt felhaszn�l�k list�ja. Ezekt�l a felhaszn�l�kt�l nem fogadunk �zeneteket.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Jelenleg nincsen blokkolva egyetlen felhaszn�l� sem.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Blokkoltunk ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' felhaszn�l�t.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[felold�s]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Ha a blokkolt felhaszn�l� �zenetet pr�b�l k�ldeni, t�j�koztatva lesz, hogy nem fogadjuk, mivel blokkolva van.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'A blokkolt felhaszn�l� nem �rtes�l r�la, hogy blokkoltuk.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Adminisztr�torok nem blokkolhat�k.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Blokkol�s enged�lyez�se');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Ha enged�lyezve van, a felhaszn�l�k blokkolhatj�k egym�st. A blokkolt felhaszn�l� nem k�ldhet �zenetet annak aki blokkolt. Az adminsztr�torokat nem lehet blokkolni.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'igen');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'nem');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'A blokkolt felhaszn�l� �rtes�t�se');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Ha <i>igen</i>-re �ll�tjuk, a blokkolt felhaszn�l� �rtes�t�st kap, hogy az �zenet�t nem tudja elk�ldeni, mert a c�mzett blokkolta �t. Ha <i>nem</i>-re �ll�tjuk, a blokkolt felhaszn�l� nem kap semmilyen �rtes�t�st, hogy az �zenete nem lett k�zbes�tve.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'igen');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'nem');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blokkol�s kikapcsolva');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages');
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'T�rl�sek'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blokkol�s');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integr�ci�');
DEFINE ('_UDDEADM_EMAIL', 'Email');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'CB linkek');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Ha <i>igen</i>-re �ll�tjuk, minden felhaszn�l�n�v a CD profilra fog mutatni.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'CB avat�r megjelen�t�se');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Ha <i>igen</i>-re �ll�tjuk, az �zenet olvas�sakor a felad� mez�ben megjelenik a felad� CB avat�rk�pe.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Online �llapot megjelen�t�se');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Ha <i>igen</i>-re �ll�tjuk, az uddeIM kis ikonokkal jelzi a felhaszn�l�k online �llapot�t. Ezeket az ikonokat az adminisztr�ci�s fel�leten, az Ikon be�ll�t�sokn�l lehet lecser�lni .');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Email �rtes�t�s enged�lyez�se');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Ha <i>igen</i>-re �ll�tjuk, minden felhaszn�l� email �rtes�t�st kap �j mag�n �zenet �rkez�sekor.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'Az email tartalmazza a mag�n�zenetet?');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Ha <i>nem</i>-re �ll�tjuk, az email csak �rtes�t minket �j �zenet �rkez�s�r�l, de maga az �zenet enm fog szerepelni benne.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Eml�keztet� email');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Ezzel eml�keztet�t k�ld a rendszer azoknak a felhaszn�l�knak, akiknek r�g�ta olvasatlan �zenetek vannak a postafi�kjukban. Mivel ez f�ggetlen az email �rtes�t� be�ll�t�s�t�l, ez�rt k�l�n kell ki-be kapcsolnunk!');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Eml�keztet� k�ld�si ideje ');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Ha az eml�keztet� be van kapcsolva, adjuk meg, hogy h�ny nap eltelt�vel k�ldj�n a rendszer eml�keztet� emailt.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'List�ban szerepl� karakterek sz�ma');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Be�ll�thatjuk, hogy h�ny karakter szerepeljen a postal�da, kimen� mappa �s a kuka list�z�sakor.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', '�zenet maxim�lis hossza');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Be�ll�thatjuk az �zenet maxim�lis hossz�t. \'0\'-re �ll�tva b�rmilyen hossz� �zenet k�ldhet� (NEM AJ�NLOTT!).');
DEFINE ('_UDDEADM_YES', 'igen');
DEFINE ('_UDDEADM_NO', 'nem');
DEFINE ('_UDDEADM_ADMINSONLY', 'csak adminisztr�torok');
DEFINE ('_UDDEADM_SYSTEM', 'Rendszer');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Rendszer �zenet felad�ja');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM t�mogatja a rendszer �zenetek k�ld�s�t. Ezeknek az �zeneteknek nem lesz igazi felad�juk, �s a felhaszn�l�k nem is tudnak v�laszolni r�juk. Adjuk meg a rendszer �zenet k�ld�j�nek k�dnev�t (pl. <i>Support</i> vagy <i>�gyf�lszolg�lat</i> vagy <i>Koordin�tor</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Az adminisztr�torok �zenet k�ld�se csoporotok sz�m�ra');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM t�mogatja az �zenet k�ld�st a felhaszn�l�i csoportok sz�m�ra. A csoport minden tagjamegkapja az �zenetet. Haszn�ljuk m�rt�kkel.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Email k�ld� neve');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Az �rtes�t� email k�ld�je, pl <i>weboldal c�me</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Email k�ld� c�me');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Adjuk meg az email c�met, ahonnan az �rtes�t� �rkezett. (�rdemes az oldal �ltal�nos emailc�m�t haszn�lni.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM verzi�');
DEFINE ('_UDDEADM_ARCHIVE', 'Arch�vum'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Arch�v�l�s enged�lyez�se');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'V�lasszuk ki, hogy mely felhaszn�l�k arch�v�lhatj�k az �zeneteiket. Az arch�vumban l�v� �zenetek nem lesznek t�r�lve.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Az arch�vumban t�rolt �zenetek maxim�lis sz�ma');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', '�ll�tsuk be, hogy a felhaszn�l�k h�ny darab �zentet arch�v�lhatnak (az adminisztr�toroknak nincsen korl�toz�s).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'M�solat k�ld�skor');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Enged�lyezi a felhaszn�l�nak, hogy az �zenet k�ld�sekor egy m�solat a postal�d�j�ba ker�lj�n.');
DEFINE ('_UDDEADM_MESSAGES', '�zenetek');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Eredeti �zenet t�rl�se');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Ha bekapcsoljuk, v�lasz k�ld�sekor az eredeti �zenet t�rl�dni fog a postal�d�b�l a kuk�ba. Ezzel kord�ban tarthat� az adatb�zis m�rete, �s a postal�da is �ttekinthet�bb marad.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL

DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Egy oldalon megjelen� �zenetek sz�ma');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Meghat�rozhatjuk az egy oldalon szerepl� �zenetek sz�m�t a postal�d�ban, kimen� mapp�ban, kuk�ban.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Haszn�lt karakterk�dol�s');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Ha probl�m�k mer�lnek fel az �kezetes karakterek megjelen�t�skor, megadhatjuk, hogy az uddeIM milyen karakter k�dol�st haszn�ljon. <b>Ha nem vagyunk biztosak a dolgunkban, ink�bb hagyjuk az alap�rtelmezett �rt�ket!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Email karakterk�dol�s');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Ha probl�m�k mer�lnek fel az �kezetes karakterek megjelen�t�sekor, megadhatjuk, hogy az uddeIM milyen karakter k�dol�st haszn�ljon az emailek k�ld�se sor�n. <b>Ha nem vagyunk biztosak a dolgunkban, ink�bb hagyjuk az alap�rtelmezett �rt�ket!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'

DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Ez az �rtes�t� email tartalma. Maga az �zenet nem fog szerepelni az emailben. Az al�bbi v�ltoz�kat �r�zz�k meg: %you%, %user% �s %site%  ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Ez az �rtes�t� email tartalma. Az email tartalmazni fogja mag�t az �zenetet is! Az al�bbi v�ltoz�kat �r�zz�k meg: %you%, %user%, %pmessage% �s %site%  ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Ez az eml�keztet� email tartalma. Az al�bbi v�ltoz�kat �r�zz�k meg: %you% �s %site%  ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Enged�lyezz�k a felhaszn�l�knak, hogy ha saj�t maguknak k�ldenek emialt, �zeneteket h�vjanak le az arch�vumb�l.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Leh�v�s enged�lyez�se');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Az a leh�v� email form�tuma. Az al�bbi v�ltoz�kat �r�zz�k meg %user%, %msgdate% �s %msgbody% ');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Postal�da m�rete');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Megadhatjuk, hogy �sszesen h�ny �zenet lehet a postal�d�nkban! (Az arch�vummal egy�tt!) Ha a magadott korl�tot t�ll�pj�k, nem v�laszolhatunk, vagy �rhatunk �zentet, ameddig nem t�rl�nk a postal�d�b�l. (Fogadni fogadhatunk olvas�sra, de az �zenetek NEM t�rol�dnak!)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Az �zenet korl�t megejelen�t�se a postal�d�ban');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Megjelen�ti, hogy h�ny �zenet van t�rolva a postal�d�nkban �s mennyi enged�lyezett.');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Hogyan k�v�njuk kezelni az arch�v�lt elemeket?');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Hagyjuk �ket');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Hagyjuk az arch�vumban (a felhaszn�l� enm tudja olvasni �ket, de a postal�da �zenetkorl�tj�t ugyan�gy foglalja!)');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Tegy�k a postal�d�ba');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Az arch�v�lt �zenetek a postal�d�ba ker�ltek');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Az �zenetek a postal�d�ba ker�lnek (vagy a kuk�ba, ha a postal�d�ban enged�lyezett d�tumn�l r�gebbiek)');


// 0.4 frontend, admins only (no translation necessary)
DEFINE ('_UDDEIM_VALIDFOR_1', '�rv�nyes ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' �r�ig. 0=�r�kre (automatikus t�rl�s alkalmaz�sa)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Rendszer vagy csoportos �zenet �r�sa]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Hagyom�nyos �zenet �r�sa]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Rendszer �s csoportos �zenet �r�sa nem enged�lyezett.');
DEFINE ('_UDDEIM_SYSGM_TYPE', '�zenet t�pusa');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Seg�ts�g a rendszer�zenetekhez');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(megnyit�s �j ablakban)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Az alul l�v� �zenet fog kik�ld�sre ker�lni. N�zz�k �t �s k�ldj�k ki vagy t�r�lj�k!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', '�zenet az <strong>�sszes felhaszn�l�nak</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', '�zenet az <strong>�sszes adminisztr�tornak</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', '�zenet az <strong>�sszes bejelentkezett felhaszn�l�nak</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'A c�mzettek nem fognak tudni v�laszolni erre az �zenetre.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Az �zenet ezen a <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> n�ven ker�l kik�ld�sre');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Az �zenet lej�r ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Az �zenet nem fog lej�rni');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Ellen�rizz�k a linket (kattintsunk r�!) az elfogad�s el�tt!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Haszn�land� <strong>csak rendszer �zenet eset�n</strong>:<br /> [b]<strong>bold</strong>[/b] [i]<em>italic</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] or [url]http://www.someurl.com[/url] are links');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Hiba: C�mzett nem tal�lhat�. Nem k�ldt�nk �zenetet.');
		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', 'Nem lehet v�laszolni erre az �zenetre.');
DEFINE ('_UDDEIM_EMNOFF', 'Email �rtes�t� kikapcsolva. ');
DEFINE ('_UDDEIM_EMNON', 'Email �rtes�t� bekapcsolva. ');
DEFINE ('_UDDEIM_SETEMNON', '[bekapcsol�s]');
DEFINE ('_UDDEIM_SETEMNOFF', '[kikapcsol�s]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Kedves %you%!\n\n%user% egy �zenetet k�ld�tt neked a %site%-r�l. Az elolvas�s�hoz jelentkezz be az oldalon!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Kedves %you%!\n\n%user% az al�bbi �zenetet k�ldte a %site%-r�l. A v�laszhoz jelentkezz be az oldalon!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Kedves %you%!\n\nOlvasatlan �zeneted van a %site%-on l�v� postal�d�dban. Az elolvas�sukhoz jelentkezz be az oldalon!");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Mag�n �zenet �rkezett a %site%-on');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'k�ld�s rendszer�zenetk�nt (=a c�mzettek nem fognak tudni v�laszolni r�)');
DEFINE ('_UDDEIM_SEND_TOALL', 'k�ld�s az �sszes felhaszn�l�nak');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'k�ld�s az �sszes adminisztr�tornak');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'k�ld�s az �sszes bejelentkezett felhaszn�l�nak');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'V�ratlan hiba: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arch�v�l�s nem enged�lyezett.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Az �zenetek arch�vumba t�rt�n� mozgat�sa meghi�sult.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'T�rolva ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Jelenleg �res az arch�vum.</strong>');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' �zenet');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Egy �zenet van t�rolva');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Az �zenet ment�s�hez el�bb t�r�ln�d kell valamelyik kor�bbi �zenetet!');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Maximum ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' �zenet menthet�.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Neked ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' �zenet van ');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'az arch�vumodban');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'a postal�d�dban');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'a postal�d�ban �s az arch�vumodban');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Az enged�lyezett maximum ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Tov�bbra is fogadhatunk olvas�sra �zeneteket, de v�laszolni vagy �j �zenetet �rni kor�bbi �zenetek t�rl�se n�lk�l nem lehet.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', '�zenet t�rolva: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(a maximumb�l. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Az �zenetet elt�roltuk az arch�vumban.');
DEFINE ('_UDDEIM_STORE', 'arch�v�l�s');
		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'vissza');

DEFINE ('_UDDEIM_TRASHCHECKED', 'kiv�lasztottak t�rl�se ');
	// translators info: plural!

DEFINE ('_UDDEIM_SHOWALL', 'az �sszes megjelen�t�se');
	// translators example "SHOW ALL messages"

DEFINE ('_UDDEIM_ARCHIVE', 'Arch�vum');
	// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Tele van az arch�vum. Nincs ment�s.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Nincsen kijel�lve �zenet.');
DEFINE ('_UDDEIM_THISISACOPY', 'A k�ld�tt �zenet m�sol�sa ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'a postal�d�ba');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'az arch�vumba');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'az eredeti kuk�ba dob�sa');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', '�zenet let�lt�se');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Az export�lt �zeneteket elkd�lt�k emailen');
DEFINE ('_UDDEIM_EXPORT_NOW', 'Email magamnak');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Ez az email a mag�n�zeneteidet tartalmazza.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Nem tudtunk elkd�ldeni az �zeneteket emailen.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Message limit! Not restored.');

DEFINE ('_UDDEIM_WRITEMSGTO', '�zenet �r�sa ');

$udde_smon[1]="Jan";
$udde_smon[2]="Feb";
$udde_smon[3]="M�r";
$udde_smon[4]="�pr";
$udde_smon[5]="M�j";
$udde_smon[6]="J�n";
$udde_smon[7]="J�l";
$udde_smon[8]="Aug";
$udde_smon[9]="Szep";
$udde_smon[10]="Okt";
$udde_smon[11]="Nov";
$udde_smon[12]="Dec";

$udde_lmon[1]="Janu�r";
$udde_lmon[2]="Febru�r";
$udde_lmon[3]="M�rcius";
$udde_lmon[4]="�prilis";
$udde_lmon[5]="M�jus";
$udde_lmon[6]="J�nius";
$udde_lmon[7]="J�lius";
$udde_lmon[8]="Augusztus";
$udde_lmon[9]="Szeptember";
$udde_lmon[10]="Okt�ber";
$udde_lmon[11]="November";
$udde_lmon[12]="December";

$udde_lweekday[0]="Vas�rnap";
$udde_lweekday[1]="H�tf�";
$udde_lweekday[2]="Kedd";
$udde_lweekday[3]="Szerda";
$udde_lweekday[4]="Cs�t�rt�k";
$udde_lweekday[5]="P�ntek";
$udde_lweekday[6]="Szombat";

$udde_sweekday[0]="Va";
$udde_sweekday[1]="H�";
$udde_sweekday[2]="Ke";
$udde_sweekday[3]="Sze";
$udde_sweekday[4]="Cs�";
$udde_sweekday[5]="P�";
$udde_sweekday[6]="Szo";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM sablon');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'V�lasszuk ki a haszn�lni k�v�nt uddeIM sablont');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'CB kapcsolatok megjelen�t�se');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'V�lasszunk <i>igen</i>-t ha a CB telep�tve van �s haszn�lni k�v�njuk felhaszn�l� kapcsolati list�j�t az �zenet �r�sakor.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Be�ll�t�sok megjelen�t�se');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Ha az email �rtes�t�s vagy a blokkol�s enged�lyezve van megjelenik egy link ezeknek a funkci�knak a be�ll�t�s�hoz. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'igen, alul');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'BB k�dok enged�lyez�se');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'csak a sz�veg m�dos�t�sa');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'V�lasszuk a <i>csak a sz�veg m�dos�t�sa</i>-t, hogy a BB k�dokkal csak a sz�veg megjelen�s�t szab�lyozhassuk. (pl. f�lk�v�r, d�lt, al�h�zott, sz�n, m�ret). Ha <i>igen</i>-t v�lasztunk, a felhaszn�l�k az <strong>�sszes</strong> t�mogatott BB k�dot haszn�lhatj�k (a linkeket �s a k�peket is!).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Vigyorok enged�lyez�se');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Ha <i>igen</i>-t v�lasztunk, a vigyor-jelek (pl. :-) ) grafikai ikonokkal lesznek megjelen�tve. ');
DEFINE ('_UDDEADM_DISPLAY', 'Megjelen�t�s');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Men� ikonok megjelen�t�se');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Ha <i>igen</i>-t v�lasztunk, a men� linkek ikonk�nt fognak megjelenni.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Komponens c�me');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'K�l�n megadhatjuk a mag�n�zenet rendszer nev�t, pl. \'Mag�n �zenetek\'. Hagyjuk �resen, ha nem akarunk f�c�met haszn�lni.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Magunkr�l link megjelen�t�se');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', '�ll�tsuk <i>igen</i>-re, hogy megjelenjen a uddeIM program oldala. Ez a link a uddeIM alj�n fog megjelenni.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Email k�ld�s le�ll�t�sa');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Kapcsoljuk be, hogy letiltsuk az uddeIM email k�ld�s�t (email �rtes�t�k �s eml�keztet�k) hasznos, mik�zben tesztelj�k az oldalt. Ha nem akarjuk haszn�lni �ll�tsuk <i>nem</i>-re.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB avatarok a list�ban');
DEFINE ('_UDDEADM_GETPICLINK_EXP', '�ll�tsuk <i>igen</i>-re, ha a postal�da, kimen� mappa vagy kuka list�ban meg szeretn�nk jelen�teni a felad� nev�n�l a CB avatarj�t is.');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Felhaszn�l�k megjelen�t�se');
DEFINE ('_UDDEIM_CONNECTIONS', 'Kapcsolatok');
DEFINE ('_UDDEIM_SETTINGS', 'Be�ll�t�sok');
DEFINE ('_UDDEIM_NOSETTINGS', 'Nincsen m�dos�that� be�ll�t�s.');
DEFINE ('_UDDEIM_ABOUT', 'About'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', '�zenet �r�sa'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Email �rtes�t�');
DEFINE ('_UDDEIM_EMN_EXP', '�j �zenet �rkez�s�r�l emailben kaphatsz �rtes�t�st.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Emailes �rtes�t�s �j �zenet �rkez�s�r�l');
DEFINE ('_UDDEIM_EMN_NONE', 'Nincs emailes �rtes�t�');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Email �rtes�t�, ha nem vagyok bejelentkezve');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'V�laszokr�l ne k�ldj�n �rtes�t�t');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Felhaszn�l�k blokkol�sa'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Blokkolhatunk felhaszn�l�kat, akikt�l nem szeretn�nk fogadni �zeneteket. V�lasszuk a <i>felhaszn�l� blokkol�sa</i>-t, amikor a felhaszn�l�t�l �rkezett �zenetet olvassuk.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Be�ll�t�sok ment�se');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB k�d vastag sz�veghez. Haszn�lata: [b]vastag[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB k�d d�lt sz�veghez. Haszn�lata: [i]d�lt[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB k�d al�h�zott sz�veghez. Haszn�lata: [u]al�h�zott[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB k�d sz�nes bet�kh�z. Haszn�lata: [color=#XXXXXX]sz�nes[/color] ahol az XXXXXX a sz�n hex k�dja pl. FF0000 a piros.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB k�d sz�nes bet�kh�z. Haszn�lata: [color=#XXXXXX]sz�nes[/color] ahol az XXXXXX a sz�n hex k�dja pl. 00FF00 a z�ld.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB k�d sz�nes bet�kh�z. Haszn�lata: [color=#XXXXXX]sz�nes[/color] ahol az XXXXXX a sz�n hex k�dja pl. 0000FF a k�k.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB k�d nagyon apr� bet�kh�z. Haszn�lata: [size=1]apr� bet�k[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB k�d kicsi bet�kh�z. Haszn�lata: [size=2]kicsi bet�k[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB k�d nagy bet�kh�z. Haszn�lata: [size=4]nagy bet�k[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB k�d hatalmas bet�kh�z. Haszn�lata: [size=5]hatalmas bet�k[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB k�d k�p el�r�si �tj�nak besz�r�s�hoz. Haszn�lata: [img]k�p-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB k�d webc�mek besz�r�s�hoz. Haszn�lata: [url]webc�m[/url]. Ne felejts�k el be�rni a http:// tagot az �sszes webc�m el�!');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Az �sszes nyitott BB tag bez�r�sa.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' �zenet'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>�res az arch�vum.</strong>');
