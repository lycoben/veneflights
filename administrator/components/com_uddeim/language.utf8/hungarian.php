<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         Ś 2007-2008 Stephan Slabihoud, Ś 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: Hungarian (source file is ISO-8859-2)
// Translator:    Bulcsú Szász <agy@neuro.hu>, www.neuroweb.hu
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'MooTools betöltése');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Ez határozza meg, hogy hogyan töltse be az uddeIM a MooTools-t (a MooTools az Autocompleter-hez szükséges): <i>Nincs</i> ezt akkor válasszuk, hogyha a template-ből töltjük be a MooTools-t, <i>Auto</i> ajánlott alapértelmezett (ugyanaz, mint az uddeIM 1.2-nél), J1.0 esetében megválaszthatjuk, hogy MooTools 1.1 vagy 1.2-t használjunk.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'ne töltse be a MooTools-t');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'MooTools 1.1-t használjon');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'MooTools 1.2-t használjon');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...alapértelmezett beállítás a MooTools használatához');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 encoded');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Időzóna beállítása');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Amennyiben az uddeIM nem megfelelően mutatja az időt, át lehet állítani az időzónát.');
DEFINE ('_UDDEADM_HOURS', 'óra');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Verzió információ:');
DEFINE ('_UDDEADM_STATISTICS', 'Statisztika:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Statisztika megjelenítése');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Itt találhatunk néhágy fontos statisztikát az üzeneteinkről, pl. tárolt üzenetek száma, stb.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'STATISZTIKA MEGJELENÍTÉSE ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Az adatbázisban tárolt üzenetek: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'A címzett által törölt üzenetek: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'A küldő által törölt üzenetek: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Felfüggesztett üzenetek: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'ItemID átírása');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Legtöbbször az uddeIM automatikusan használja az itemID-t, de sok esetben szükség van, ennek a manuális beálltására, pl. ha több menüpont is mutat az uddeIM-re.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Detektált itemID: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'ItemID használata');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Inkább ezt az itemID-t hazsnáljuk, a detektált helyett.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Profil link használata');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Amennyiben <i>igen</i>-re állítjuk, az összes uddeIM-ben megjelenő felhasználónév a felhasználói profilokhoz fog kapcsolódni.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Bélyegképek megjelenítése');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Amennyiben <i>igen</i>-re állítjuk, az üzenet olvasásakor a kapcsolódó felhazsnáló bélyegképe fog megjelenni.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Bélyegképek megjelenítése az üzenetlistában');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Amennyiben<i>igen</i>-re állítjuk, a felhasználók bélyegképei megjelennek a listában (postaláda, kimenő, stb.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Nem engedélyezett');
DEFINE ('_UDDEADM_ENABLED', 'Engedélyezett');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Megjelölt');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', 'Nem jelölt');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Az üzenetek megjelölésének engedélyezése');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Amennyiben engedélyezzük az üzenetek megjelölését, az uddeIM üzenetlistában csillagokkal jelölhetjük meg a fontos üzeneteket.');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Fontos: Ha az uddeIM-et egy korábbi verzióról frissítjük, feltétlenül ellenőrízzük a README fájlt! Előfordulhat ugyanis, hogy adatbázis táblákat vagy mezőket kell felvennünk vagy módosítanunk!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Másolatot kap: sor hozzáadása');
DEFINE ('_UDDEIM_CC', 'Másolatot kap:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Idézett szövegrész levágása');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Az idézett szövegrészt levágja a maximálisan engedlyezett szöveghosszúság 2/3 ára.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Postafiók bejegyzések ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Utolsó ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' bejegyzés');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Állapot');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Küldő');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Üzenet');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Postafiók ürítése');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Kuka hozzáférésének a tiltása.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Kuka hozzáférésének a korlátozása');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Korlátozhatjuk a kuka hozzáférését. Alap helyzetben a kuka hozzáférése szabad (<i>nem korlátozott</i>). Korlátozni lehet a hozzáférést, hogy csak a speciális vagy adminisztrátor jogú felhasználók férhessenek hozzá, így az alacsonyabb felhasználó csoport tagjai ne tudják visszaállítani a törölt üzeneteket.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'nem korlátozott');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'csak speciális felhasználóknak');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'csak adminisztrátoroknak');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Felhasználók elrejtése a felhasználó listából');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Adjuk meg a felhasználói azonosítókat, amelyeket nem szeretnénk szerepeltetni a felhasználói listában (pl. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Felhasználók elrejtése a felhasználó listából');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Adjuk meg a felhasználói azonosítókat, amelyeket nem szeretnénk szerepeltetni a felhasználói listában (pl. 65,66,67). Az adminisztrátorok minden esetben látják az összes felhasználót.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF támadás felismerése');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF védelem');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Ez mindenkit véd a "szájtok közötti hamis lekérések" támadásától. Általában érdemes bekapcsolnunk ezt a védelmet. Csak akor kapcsoljuk ki, ha valami gyanús problémával találkozunk.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Archivált üzenetekre nem lehet válaszolni.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Nem regisztrált felhasználónak küldött üzentet nem lehet visszahívni.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Válasz engedélyezése');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Direkt üzenet engedélyezése a nem regisztrált felhasználók üzeneteire.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Hello %user%,\n\n%you% a következő privát üzenetet küldte a %site% szájtról.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Valódi név használata');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'A valódi nevet, vagy a felhasználónevet használjuk a weboldalon?');
DEFINE ('_UDDEIM_USERLIST', 'Felhasználói lista');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Elnézést, de az új üzenet küldése előtt várni kell!');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Utoljára küldött');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Időköz');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Idő, amelynek el kell telnie két üzenet küldse között (0, ha nincsen várakoztatás).');
DEFINE ('_UDDEADM_SECONDS', 'másodperc');
DEFINE ('_UDDEIM_PUBLICSENT', 'Üzenet elküldve.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Hiba a küldő nevében');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Hiba az emailcímben');
DEFINE ('_UDDEIM_YOURNAME', 'Neved:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Emailcímed:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Ez az uddeIM verzió van használatban ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'A legfrissebb uddeIM verzió van használatban.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'A jelenlegi verzió ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Frissítési információ:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Frissítés keresése');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Felkapcsolódik az uddeIM fejlesztői weboldalára, a jelenlegi legfrissebb verzió ellenörzéséért. Az uddeIM verzión kívül semmi más adat (semmilyen személyes adat sem!) nem kerül tövábbításra.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'ELLENŐRZÉS');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Nem sikerült lekérni a verzió információt.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Címlista nem található!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Maximális számú cimzett elérve (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Bejegyzések maximális száma');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Címlista maximális bejegyzéseinek számának a meghatározása.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Címlista használata nem engedélyezett');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Címlista használatának engedélyezése');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'Az uddeIM lehetővé teszi, hogy a felhasználók címlistákat hozzanak létre. Ezekkel a listákkal egyszerűen küldhető üzenet több címzettnek. Ne felejtsük el bekapcsolni a "Több címzett engedélyezését", ha címlistát szeretnénk használni.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'kikapcsolva');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'regisztrált felhasználóknak');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'speciális felhasználóknak');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'adminisztrátoroknak');
DEFINE ('_UDDEIM_LISTSNEW', 'Új címlista létrehozása');
DEFINE ('_UDDEIM_LISTSSAVED', 'Címlista elmentve');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Címlista frissítve');
DEFINE ('_UDDEIM_LISTSDESC', 'Leírás');
DEFINE ('_UDDEIM_LISTSNAME', 'Név');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Név (szóköz nélkül)');
DEFINE ('_UDDEIM_EDITLINK', 'szerkesztés');
DEFINE ('_UDDEIM_LISTS', 'Címzettjeim');
DEFINE ('_UDDEIM_STATUS_READ', 'olvasott');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'olvasatlan');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'online');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'offline');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'CB kép megjelenítése');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Alaphelyzetben az uddeIM csak a felhasználók által feltöltött ikon képeket jeleníti meg. Ha ezta beállítást aktiváljuk, akkor az uddeIM a CB ikonképeit fogja használni.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'CB kapcsolatok használata');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Azoknak a felhasználóknak lehet üzenetet küldeni, akik a CB ismerős listán szerepelnek. (mégha az adott felhasználó a blokkolt listán szerepel is). Ez a beállítás független a felhasználók egyéni blokkolásától. (lásd a fenti beállítást).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Ennek a csoportnak nem kuldhetsz üzenetet.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'A címzett blokkolt.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blokkolt csoportok (regisztrált felhasználók)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Azoknak a felhasználóknak a csoportja, akiknek nem küldhetnek üzenetet. Ez csak a sima regisztrált felhasználókra vonatkozik. Speciális felhasználókra és adminisztrátorokra nincsen hatással ez a beállítás. Ez a beállítás független a felhasználók egyéni blokkolásától. (lásd a fenti beállítást).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blokkolt csoportok (vendég felhasználók)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Azoknak a felhasználóknak a csoportja, akiknek a vendég felhasználók nem küldhetnek üzenetet. Ez a beállítás független a felhasználók egyéni blokkolásától. (lásd a fenti beállítást). ');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Vendég felhasználó');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB kapcsolat');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Regisztrált felhasználó');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Szerző');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Szerkesztő');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Közzétevő');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Adminisztrátor');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'A felhasználók csak regisztrált tagoktól fogadnak üzenetet.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', '"Összes tag" lista elrejtése a vendég felhasználók elől');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'A publikus hozzáférés elől több csoportot is elrejthetünk az "Összes tag" listában. Figyelem: Ez csak a neveket rejti el, ettől még küldhető a felhasználónak üzenet. Azok a tagok, akik lekapcsolják a publikus megjelenést, nem fognak szerepelni ebben a listában!');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Elrejtés az "Összes tag" listából');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'A hozzáférés elől több csoportot is elrejthetünk az "Összes tag" listában. Figyelem: Ez csak a neveket rejti el, ettől még küldhető a felhasználónak üzenet.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'nincs');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'csak szuperadminoknak');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'csak adminoknak');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'speciális felhasználóknak');
DEFINE ('_UDDEADM_PUBLIC', 'Publikus');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Az "Összes tag" lista link működése');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Kattintásra, vagy állandóan mutassa a listát.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Publikus oldal');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- válassz -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Vendég felhasználók is küldhessenek üzenetet');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Elértük a maximális üzenetszámot!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Vendég felhasználó');
DEFINE ('_UDDEIM_DELETEDUSER', 'Felhasználó törölve');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha hossza');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Megadható, hogy biztonsági kódként hány karaktert írjon be a felhasználó.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam védelem');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Állítsuk be, hogy melyik felhasználóknak kell megadni a biztonsági kódot');
DEFINE ('_UDDEADM_CAPTCHAF0', 'kikapcsolva');
DEFINE ('_UDDEADM_CAPTCHAF1', 'csak a vendégeknek');
DEFINE ('_UDDEADM_CAPTCHAF2', 'vendégek és regisztráltak');
DEFINE ('_UDDEADM_CAPTCHAF3', 'vendégek, regisztráltak és speciális felhasználók');
DEFINE ('_UDDEADM_CAPTCHAF4', 'mindenki (még az adminok is)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Publikus megjelenés engedélyezése');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Ha engedélyezzük, a vendég felhasználók is küldhetnek üzenetet a regisztráltaknak (a felhasználók saját meguk be tudják állítani, hogy akarnak-e nem regisztráltaktól fogadni).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Publikus megjelenés alaphelyzet');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Ez az alapbeállítás, hogy a vendégek tudjanak-e küldeni a regisztráltaknak üzenetet.');
DEFINE ('_UDDEADM_PUBDEF0', 'kikapcsolva');
DEFINE ('_UDDEADM_PUBDEF1', 'bekapcsolva');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Hibás biztonsági kód');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'nincs vagy ismeretlen');
DEFINE ('_UDDEADM_DONATE', 'Ha elégedett vagy az uddeIM-mel egy kis adománnyal segítheted a fejlesztők munkáját.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Arhcívált beállítások az adatbázisban: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Beállítások archiválása és visszaállítása');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Archiválhatjuk illetve visszatölthetjük a beállításokat, ha szükséges. Az az uddeIM frissítésekor, illetve a beállítások tesztelésekor lehet hasznos.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'ARCHÍVÁLÁS');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'VISSZATÖLTÉS');
DEFINE ('_UDDEADM_CANCEL', 'Mégse');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Nyelvi fájl karakter kódolása');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'A Joomla 1.0-nél általában az <strong>(ISO-8859-1)</strong> (alapértlemezett) a megfelelő, Joomla 1.5-höz pedig a <strong>UTF-8</strong> javasolt.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'alapértlemezett');
DEFINE ('_UDDEIM_READ_INFO_1', 'Az olvasott üzenetek maximum ');
DEFINE ('_UDDEIM_READ_INFO_2', ' napig maradnak a postaládában, azután automatikusan törlődni fognak.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Az olvasatlan üzenetek maximum ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' napig maradnak a postaládában, azután automatikusan törlődni fognak.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Az elküldött üzenetek maximum ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' napig maradnak a postaládában, azután automatikusan törlődni fognak.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Cimke megjelenítése az olvasott üzenetknél');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Cimke megjelenítése \"Az olvasott üzenetek n nap múlva törlődnek\" ');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Cimke megjelenítése az olvasatlan üzenetknél');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Cimke megjelenítése \"Az olvasatlan üzenetek n nap múlva törlődnek\" ');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Cimke megjelenítése az elküldött üzenetknél');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Cimke megjelenítése \"Az olvasatlan üzenetek n nap múlva törlődnek\" ');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Cimke megjelenítése a kukában lévő üzenetknél');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Cimke megjelenítése \"A kukában lévő üzenetek n nap múlva törlődnek\"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Elküldött üzenek megtartása  napig');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Adjuk meg, hogy az <b>elküldött</b> uzenetek hány nap múlva törlődjenek a postaládából.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'küldése az összes "kiemelt" felhasználónak');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Üzenet az <strong>összes kiemelt felhasználónak</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- felh. név kiválasztása -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- név kiválasztása -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Felhasználói beállítások szerkesztése');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'létező');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'nem létező');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- bevitel kiválasztása -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- értesítés kiválasztása -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- popup kiválasztása -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Felhasználónév');
DEFINE ('_UDDEADM_USERSET_NAME', 'Név');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Értesítés');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Legutóbbi elérés');
DEFINE ('_UDDEADM_USERSET_NO', 'Nem');
DEFINE ('_UDDEADM_USERSET_YES', 'Igen');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'ismeretlen');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Ha nem elérhető (kivéve a válaszok)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Mindíg (kivéve a válaszok)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Ha nem elérhető');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Mindíg');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Nincs értesítő');
DEFINE ('_UDDEADM_WELCOMEMSG', "Köszöntünk az uddeIM magánüzenet küldő rendszerben!\n\nSikeresen telepítetted az uddeIM komponenst.\n\nPróbáljuk ki a többi sablont is, ezeket az uddeIM adminisztraciós felületén lehet váltani.\n\nAz uddeIM jelenleg is fejlesztés alatt áll, ezért bármilyen hiba, hiányosság vagy probléma esetén érdemes jelezni a fejlesztőknek, hogy együtt jobbá tudjuk tenni ezt a közösségi kapcsolattartó rendszert.\n\nMinden jót kívánunk az uddeIM használatához!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'Az uddeIM telepítése befejezve.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Az adminisztrációs felület beállításaival lehet befejeznia rendszer beüzemelését.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Amennyiben a keretrendszer az ISO 8859-1 -től eltérő karakterkódolást használ, feltétlenül ellenőrízzük az uddeIM kapcsolódó beállításait.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'A telepítés után az összes uddeIM email forgalom (email értesítők, emlékeztetők) lekapcsolásra kerül, így ameddig a rendszer beállítása és tesztelése folyik addig ezek az emailek nem kerülnek kiküldésre! Ha végeztünk a rendszerünk finomhangolásával ne felejtsük el kikapcsolni a "emailek leállítása" opciót az adminisztrációs menüben!');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. címzettek');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Egy üzenethez tartozó címzettek maximális széma (0=nincs korlátozás)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'túl sok címzett');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Email küldés kikapcsolva.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Szövegen belüli keresés');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Szövegen belüli keresés (egyébként mindig csak a kezdetektől keres)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', '\"Összes felhasználó\" link megjelenése');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Az \"Összes felhasználó\" link megjelenítését választhatjuk ki:');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', '\"Összes felhasználó\" link elrejtése');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', '\"Összes felhasználó\" link megjelenítése');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Mindíg mutassuk az összes felhasználót');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'A beállítások nem menthetők:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'A beállítások menthetők:');
DEFINE ('_UDDEIM_FORWARDLINK', 'továbbítás');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'címzettet találtunk');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'címzettet találtunk');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (alap)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Emailküldés módja');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Válasszuk ki az uddeIM értesítőinek emailküldési módját.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Joomla csoportok megjelenítése');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Az általános rendszerüzenet küldésénél a címzett listában jelenjenek meg a Joomla csoportok is.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Üzenet továbbítása');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Üzenet továbbításának az engedélyezése.');
DEFINE ('_UDDEIM_FWDFROM', 'Eredeti üzenet küldője:');
DEFINE ('_UDDEIM_FWDTO', 'Címzett:');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Üzenet visszaállítása');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Nem lehet visszaállítani az üzenetet');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Több címzett engedélyezése');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Több címzett engedélyezése (vesszővel elválasztva pl. Pisti,Józsi,Peti).');
DEFINE ('_UDDEIM_CHARSLEFT', 'karakter maradt');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Szöveg számláló megjelenítése');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Szöveg számláló megjelenítése, amely mutatja, hogy mennyi betü maradt az engedélyezett korlátból.');
DEFINE ('_UDDEIM_CLEAR', 'Törlés');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'A kiválasztott felhasználók a címzettekhez kerülnek');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Ezáltal több felhasználót is kiválaszthatunk az \"Összes felhasználó\" listából.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Ismerősök kiválasztása a címzettekhez');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Ezáltal a CB \"Ismerős\" listából is választhatunk címzetteket.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS-t találtunk: ');
DEFINE ('_UDDEIM_ENTERNAME', 'név megadása');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Autokiegészítő használata');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Autokiegészítő használata a címzettek megadásakor.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Kódolási kulcs');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Adjuk meg a kulcsot az üzenet szövegének a titkosításához. Miután engedélyeztük az üzenetk titkosítását, NE változtassuk meg!');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Nem megfelelő konfigurációs fájlt találtunk!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Talált verzió:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Várható verzió:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Beállítások konvertálása...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Kész!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Súlyos hiba: nem tudtuk írni a konfigurációs fájlt:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Kódolt üzenet! - Letöltése nem lehetséges!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Hibás jelszó! - Letöltése nem lehetséges!');
DEFINE ('_UDDEIM_WRONGPW', 'Hibás jelszó! - Kérjük értesítse a rendszer adminisztrátort!');
DEFINE ('_UDDEIM_WRONGPASS', 'Hibás jelszó!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Hibás törlési dátum (beérkező/kimenő levelek): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Hibás törlési dátumok javítása');
DEFINE ('_UDDEIM_TODP', 'Címzett: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Üzenetek ritkítása');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Műveleti ikonok megjelenítése');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Amennyiben <i>igen</i> re állítjuk, a műveleteket szöveg helyett ikonokkal fogjuk helyettesíteni.');
DEFINE ('_UDDEIM_UNCHECKALL', 'kijelölések visszavonása');
DEFINE ('_UDDEIM_CHECKALL', 'mindet kijelöl');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Alsó ikonok megjelenítése');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Amennyiben <i>igen</i> re állítjuk, az alsó gombokat szöveg helyett ikonokkal fogjuk helyettesíteni.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Animált vigyorok használata');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Animált vigyorok használata az állók helyett.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Több animált vigyor');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Több animált vigyort jelenít meg.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Kódolt üzenet - Jelszó szükséges');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Jelszó szükséges</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Jelszó');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (kódolt üzenet)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (dekódolt üzenet)');
DEFINE ('_UDDEIM_MORE', 'TOVÁBB');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Magán üzenetek');
DEFINE ('_UDDEMODULE_NONEW', 'nincsen új üzenet');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Új üzenet: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'üzenet');
DEFINE ('_UDDEMODULE_MESSAGES', 'üzenet');
DEFINE ('_UDDEMODULE_YOUHAVE', 'A postaládában');
DEFINE ('_UDDEMODULE_HELLO', 'Szia');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Gyors üzenet');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Kódolás használata');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Tárolt üzenetek kódolása');
DEFINE ('_UDDEADM_CRYPT0', 'Nincsen');
DEFINE ('_UDDEADM_CRYPT1', 'Zavart üzenetek');
DEFINE ('_UDDEADM_CRYPT2', 'Kódolt üzenetek');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Alapéertlmezett email értesítési beállítás');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Alapértelmezett email értesítési beállítás, azoknak a felhasználóknak, akik ezt a beállítást még nem változtatták meg.');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Nincs értesítés');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Mindíg');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Csak, ha a felhasználó nincsen bejelentkezve');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', '"Összes felhasználó" link elrejtése');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', '"Összes felhasználó" link elrejtése az üzenet írásakor (hasznos ha az oldalnak nagyszámú felhasználója van).');
DEFINE ('_UDDEADM_POPUP_HEAD','Felugró értesítő');
DEFINE ('_UDDEADM_POPUP_EXP','Felugró ablak jelenik meg új üzenet érkezésekor (módosított mod_cblogin modul szükséges)');
DEFINE ('_UDDEIM_OPTIONS', 'További beállítások');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Itt lehet módosítani néhány további beállítást.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Felugró ablak jelenik meg új üzenet érkezésekor');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Felugró értesítőablak alapértelmezettként');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Felugró értesítőablak engedélyezése alapértelmezettként, azoknak a felhasználóknak, akik ezt a beállítást még nem változtatták meg.');
DEFINE ('_UDDEADM_MAINTENANCE', 'Karbantartás');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Adatbázis karbantartása');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'ELLENÖRZÉS');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'JAVÍTÁS');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Ha egy felhasználót töröltünk az adatbázisból, az üzenete még megmaradhatott valahol. Ez a funkció lehetővé teszi, hogy a gazdátlan üzeneteket szükség esetén törölhessük.<br />Továbbá kisebb adatbázis hibákat is javítani tudunk.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Ellenörzés...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Username): [postaláda|postaláda törölt|kimenő mappa|kimenő törölt]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>postaláda: a beérkezett üzenetek a felhasználók postaládájában tárolódnak</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>postaláda törölt: üzenetek a postaládából törölve, de valakinek a kimenő mappájában még szerepel</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>kimenő mappa: az elküldött üzenetek a kimenő mappába kerülnek</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>kimenő törölt: a kimenő mappából már törölték, de a címzett postaládájában még szerepel</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Törlés...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "nem találtam (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "a felhasználó összes beállításának a törlése");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "a felhasználó blokkolásának a törlése");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "az összes törölt felhasználónak küldött üzenet törlése ");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "az összes törölt felhasználó által küldött üzenet törlése");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nincsen tennivaló<b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Karbantartás szükséges<b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Valódi név használata');
DEFINE ('_UDDEADM_NAMESDESC', 'Felhasználó név vagy valódi név használata?');
DEFINE ('_UDDEADM_REALNAMES', 'valódi név');
DEFINE ('_UDDEADM_USERNAMES', 'felhasználó név');
DEFINE ('_UDDEADM_CONLISTBOX', 'CB kapcsolatok lista doboz');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'A kapcsolatok megjelenítése listában vagy táblázatban?');
DEFINE ('_UDDEADM_LISTBOX', 'Listában');
DEFINE ('_UDDEADM_TABLE', 'Táblázatban');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Az üzenetek a törlés előtt 24 óráig a kukában maradnak. Csak az üzenet első néhány szava látható. Az üzenet elolvasásához először vissza kell helyezni a postaládába.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Az üzenetek ennyi ideig marajanak a kukában: ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' utána törlődni fognak. Csak az üzenet első néhány szava látható. Az üzenet elolvasásához először vissza kell helyezni a postaládába.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Az üzenetet visszahívtuk. Olvasható vagy újra küldhető.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Az üzenetet nem tudtuk visszahívni! (pl. vagy már elolvasták, vagy kitörölték)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Az üzenetet nem tudtuk visszaállítani. (Túl sokáig volt a kukában, és végleg törlődött.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Az üzenet visszaállítása meghiúsult.');
DEFINE ('_UDDEIM_DONTSEND', 'Ne küldjük el');
DEFINE ('_UDDEIM_SENDAGAIN', 'Újra küldés');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Be kell jelentkezni!');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Nincsen beérkezett üzenet a postaládában!</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Nincsen üzenet a kimenő mappában!</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>A kuka üres!</strong>');
DEFINE ('_UDDEIM_INBOX', 'Postaláda');
DEFINE ('_UDDEIM_OUTBOX', 'Kimenő mappa');
DEFINE ('_UDDEIM_TRASHCAN', 'Kuka');
DEFINE ('_UDDEIM_CREATE', 'Új üzenet');
DEFINE ('_UDDEIM_UDDEIM', 'Magán üzenetek');
DEFINE ('_UDDEIM_READSTATUS', 'Olvas');
DEFINE ('_UDDEIM_FROM', 'Feladó');
DEFINE ('_UDDEIM_TO', 'címzett: ');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'A kimenő mappában találhatók az elküldött üzenetek, ameddig törlésre nem kerülnek. Vissza lehet hívni egy elküldött üzenetet, ameddig a címzett enm olvasta el vagy nem törölte. Az üzenet visszahívásakor kikerül a címzett postaládájából! ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'visszahívás');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Üzenet visszahívása');
DEFINE ('_UDDEIM_RESTORE', 'visszaállít');
DEFINE ('_UDDEIM_MESSAGE', 'Üzenet');
DEFINE ('_UDDEIM_DATE', 'Dátum');
DEFINE ('_UDDEIM_DELETED', 'Törölve');
DEFINE ('_UDDEIM_DELETE', 'törlés');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'törlés');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'ez az üzenet nme jeleníthető meg. <br />Lehetséges okok:<ul><li>Nincsen jogod elolvasni ezt az üzenetet</li><li>Az üzenetet törölték</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Az üzenet a kukába került!</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Feladó: ');
DEFINE ('_UDDEIM_MESSAGETO', 'Üzeneted címzetje: ');
DEFINE ('_UDDEIM_REPLY', 'Válasz');
DEFINE ('_UDDEIM_SUBMIT', 'Küldés');
DEFINE ('_UDDEIM_DELETEREPLIED', 'A választ követően az erdeti üzenet kerüljön a kukába');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'Hiba: Nem találtunk ilyen címzettet! Az üzenetet nem küldtük el!');
DEFINE ('_UDDEIM_NOMESSAGE', 'Hiba: Az üzenet nme tartalmaz szöveget! Az üzenetet nem küldtük el.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Válasz elküldve');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Üzenet elküldve');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' és az eredeti üzenet a kukába került!');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Ilyen felhasználónév nincsen a rendszerben!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Magadnak nem küldhetsz üzenetet!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Hiba a folyamatban!</b> Ehhez a művelethez nincsen jogosultságod!');
DEFINE ('_UDDEIM_PRUNELINK', 'Kizárólag adminisztrátoroknak: Ritkítás');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM adminisztráció');
DEFINE ('_UDDEADM_GENERAL', 'Általános');
DEFINE ('_UDDEADM_ABOUT', 'Rendszer info');
DEFINE ('_UDDEADM_DATESETTINGS', 'Dátum/idő');
DEFINE ('_UDDEADM_PICSETTINGS', 'Ikonok');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Olvasott üzenetek megörzése (napok)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Olvasatlan üzenetek megörzése (napok)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Kukában lévő üzenetek megörzése (napok)');
DEFINE ('_UDDEADM_DAYS', 'nap(ok)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Adjuk meg a napok számát miután az <b>olvasott</b> üzenetek törlésre kerülnek a postaládából. Ha nem akarjuk, hogy az üzenetek maguktól törlődjenek, nagyon nagy értéket adjunk meg (pl. 36524 nap egy évszázad). De tartsuk szemelőtt, hogy az adatbázis hamar megtelhet az üzenetekkel! Szóval csak okosan! ');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Adjuk meg a napok számát miután az <b>olvasatlan</b> üzenetek törlésre kerülnek.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Adjuk meg a napok számát miután az üzenetek törlésre kerülnek a kukából. Megadhatunk 1-nél kisebb értéket is pl. 0.125 jelenti az üzenetek törlését 3 óra elteltével.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Dátum megjelenítési formátum');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Válasszuk ki a megjelenő dátum formátumot. A hónapok nevei az aktuális nyelvi beállítások szerint fognak megjelenni (amennyiben a megfelelő uddeIM nyelvi fájl létezik!).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Hosszabb dátum megjelenése');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Az üzenet megnyitésakor nagyobb hely van a dátum megjelenítésére, ekkor a hosszabb dátumformátum fog megjelenni, ezért fontos, hogy ezt is megfelelően beállítsuk. A napok és a hónapok nevei az aktuális nyelvi beállítások szerint fognak megjelenni (amennyiben a megfelelő uddeIM nyelvi fájl létezik!).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Törlés csak az adminiszttátornak lehetséges');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'igen, csak az adminisztrátor');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'nem, bárki');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manuális');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Az automatikus törlés nagyon megterhelheti a szervert. Ha az <i>igen,&nbsp;csak&nbsp;az&nbsp;adminisztrátor</i> beállítást választottuk, akkor az összes felhasználók összes üzenetei megjelennek az adminisztrátor postaládájában! ezt akkor válasszuk, ha az adminisztrátor gyakran látogatja az oldalt és ellenörzi a postaládáját. Kis weboldalaknál állítsuk <i>nem,&nbsp;bárki</i>-re. Ha nem értjük pontosan ennek a működését, akkor is <i>nem,&nbsp;bárki</i>-re állítsuk!');

	// above string changed in 0.4
DEFINE ('_UDDEADM_SAVESETTINGS', 'Beállítások mentése');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'A kovetkező beállítások kerültek mentésre:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'A beállításokat elmentettük.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ikon: felhasználó elérhető');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Ha másik ikonnal szeretnénk jelezni a felhasználó állapotát, adjuk meg a megfelelő elérési utat.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ikon: felhasználó nem elérhető');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Ha másik ikonnal szeretnénk jelezni a felhasználó állapotát, adjuk meg a megfelelő elérési utat.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Ikon: üzenet olvasása');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Ha másik ikonnal szeretnénk jelezni az üzenet olvasását, adjuk meg a megfelelő elérési utat.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ikon: olvasatlan üzenet');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Ha másik ikonnal szeretnénk jelezni az olvasatlan üzenetet, adjuk meg a megfelelő elérési utat.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: Új üzenet ikon');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Ez a beállítás a mod_uddeim_new modult állítja. Adjuk meg az új üzenetet jelző ikon elérési útját, ha másikat szeretnénk használni.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM telepítés');
DEFINE ('_UDDEADM_FINISHED', 'A telepítés befejeződött. Köszöntjük az uddeIM magánüzenetküldő rendszerben! ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Nincsen CB telepítve. Az uddeIM nem használható.</span><br /><br /> <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'folytatás');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Találtunk ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' üzenetet a korábbi PMS-ből. Importáljuk az uddeIM-be?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Ez nem befolyásolja a jelenegi telepítést vagy a korábbi üzeneteket, sértetlenek maradnak. Mielőtt az importálást elkezdenénk mentsül el az időközben módosított beállításokat. A jelenelgi uddeIM üzenetek is sértetlenek maradnak.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4

DEFINE ('_UDDEADM_IMPORT_YES', 'A korábbi PMS üzenetek importálása uddeIM-be');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nem, ne importáljunk semmit');
DEFINE ('_UDDEADM_IMPORTING', 'Kérjük várja meg az üzenetek importálását!');
DEFINE ('_UDDEADM_IMPORTDONE', 'Az importálás befejeződött. Ne indítsuk el újra az importálást, különben az adatok duplán fognak szerepelni!');
DEFINE ('_UDDEADM_IMPORT', 'Importálás');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'A korábbi PMS üzeneteinek importálása');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Nem találtunk korábbi PMS rendszert. Az importálás így nem lehetséges.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Már sikeresen végrehajtottuk az üzenetek importját!</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Blokkolva');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nincsen elküldve (a felhasználó blokkolt minket)');
DEFINE ('_UDDEIM_BLOCKNOW', 'felhasználó&nbsp;blokkolása');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'A blokkolt felhasználók listája. Ezektől a felhasználóktól nem fogadunk üzeneteket.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Jelenleg nincsen blokkolva egyetlen felhasználó sem.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Blokkoltunk ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' felhasználót.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[feloldás]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Ha a blokkolt felhasználó üzenetet próbál küldeni, téjékoztatva lesz, hogy nem fogadjuk, mivel blokkolva van.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'A blokkolt felhasználó nem értesül róla, hogy blokkoltuk.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Adminisztrátorok nem blokkolhatók.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Blokkolás engedélyezése');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Ha engedélyezve van, a felhasználók blokkolhatják egymást. A blokkolt felhasználó nem küldhet üzenetet annak aki blokkolt. Az adminsztrátorokat nem lehet blokkolni.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'igen');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'nem');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'A blokkolt felhasználó értesítése');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Ha <i>igen</i>-re állítjuk, a blokkolt felhasználó értesítést kap, hogy az üzenetét nem tudja elküldeni, mert a címzett blokkolta őt. Ha <i>nem</i>-re állítjuk, a blokkolt felhasználó nem kap semmilyen értesítést, hogy az üzenete nem lett kézbesítve.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'igen');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'nem');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blokkolás kikapcsolva');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages');
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Törlések'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blokkolás');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integráció');
DEFINE ('_UDDEADM_EMAIL', 'Email');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'CB linkek');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Ha <i>igen</i>-re állítjuk, minden felhasználónév a CD profilra fog mutatni.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'CB avatár megjelenítése');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Ha <i>igen</i>-re állítjuk, az üzenet olvasásakor a feladó mezőben megjelenik a feladó CB avatárképe.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Online állapot megjelenítése');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Ha <i>igen</i>-re állítjuk, az uddeIM kis ikonokkal jelzi a felhasználók online állapotát. Ezeket az ikonokat az adminisztrációs felületen, az Ikon beállításoknál lehet lecserélni .');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Email értesítés engedélyezése');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Ha <i>igen</i>-re állítjuk, minden felhasználó email értesítést kap új magán üzenet érkezésekor.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'Az email tartalmazza a magánüzenetet?');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Ha <i>nem</i>-re állítjuk, az email csak értesít minket új üzenet érkezéséről, de maga az üzenet enm fog szerepelni benne.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Emlékeztető email');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Ezzel emlékeztetőt küld a rendszer azoknak a felhasználóknak, akiknek régóta olvasatlan üzenetek vannak a postafiókjukban. Mivel ez független az email értesítő beállításától, ezért külön kell ki-be kapcsolnunk!');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Emlékeztető küldési ideje ');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Ha az emlékeztető be van kapcsolva, adjuk meg, hogy hány nap elteltével küldjön a rendszer emlékeztető emailt.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Listában szereplő karakterek száma');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Beállíthatjuk, hogy hány karakter szerepeljen a postaláda, kimenő mappa és a kuka listázásakor.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Üzenet maximális hossza');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Beállíthatjuk az üzenet maximális hosszát. \'0\'-re állítva bármilyen hosszú üzenet küldhető (NEM AJÁNLOTT!).');
DEFINE ('_UDDEADM_YES', 'igen');
DEFINE ('_UDDEADM_NO', 'nem');
DEFINE ('_UDDEADM_ADMINSONLY', 'csak adminisztrátorok');
DEFINE ('_UDDEADM_SYSTEM', 'Rendszer');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Rendszer üzenet feladója');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM támogatja a rendszer üzenetek küldését. Ezeknek az üzeneteknek nem lesz igazi feladójuk, és a felhasználók nem is tudnak válaszolni rájuk. Adjuk meg a rendszer üzenet küldőjének kódnevét (pl. <i>Support</i> vagy <i>Ügyfélszolgálat</i> vagy <i>Koordinátor</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Az adminisztrátorok üzenet küldése csoporotok számára');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM támogatja az üzenet küldést a felhasználói csoportok számára. A csoport minden tagjamegkapja az üzenetet. Használjuk mértékkel.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Email küldő neve');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Az értesítő email küldője, pl <i>weboldal címe</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Email küldő címe');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Adjuk meg az email címet, ahonnan az értesítő érkezett. (Érdemes az oldal általános emailcímét használni.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM verzió');
DEFINE ('_UDDEADM_ARCHIVE', 'Archívum'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Archíválás engedélyezése');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Válasszuk ki, hogy mely felhasználók archíválhatják az üzeneteiket. Az archívumban lévő üzenetek nem lesznek törölve.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Az archívumban tárolt üzenetek maximális száma');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Állítsuk be, hogy a felhasználók hény darab üzentet archíválhatnak (az adminisztrátoroknak nincsen korlátozás).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Másolat küldéskor');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Engedélyezi a felhasználónak, hogy az üzenet küldésekor egy másolat a postaládájába kerüljön.');
DEFINE ('_UDDEADM_MESSAGES', 'Üzenetek');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Eredeti üzenet törlése');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Ha bekapcsoljuk, válasz küldésekor az eredeti üzenet törlődni fog a postaládából a kukába. Ezzel kordában tartható az adatbázis mérete, és a postaláda is áttekinthetőbb marad.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL

DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Egy oldalon megjelenő üzenetek száma');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Meghatározhatjuk az egy oldalon szereplő üzenetek számát a postaládában, kimenő mappában, kukában.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Használt karakterkódolás');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Ha problémák merülnek fel az ékezetes karakterek megjelenítéskor, megadhatjuk, hogy az uddeIM milyen karakter kódolást használjon. <b>Ha nem vagyunk biztosak a dolgunkban, inkább hagyjuk az alapértelmezett értéket!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Email karakterkódolás');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Ha problémák merülnek fel az ékezetes karakterek megjelenítésekor, megadhatjuk, hogy az uddeIM milyen karakter kódolást használjon az emailek küldése során. <b>Ha nem vagyunk biztosak a dolgunkban, inkább hagyjuk az alapértelmezett értéket!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'

DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Ez az értesítő email tartalma. Maga az üzenet nem fog szerepelni az emailben. Az alábbi változókat őrízzük meg: %you%, %user% és %site%  ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Ez az értesítő email tartalma. Az email tartalmazni fogja magát az üzenetet is! Az alábbi változókat őrízzük meg: %you%, %user%, %pmessage% és %site%  ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Ez az emlékeztető email tartalma. Az alábbi változókat őrízzük meg: %you% és %site%  ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Engedélyezzük a felhasználóknak, hogy ha saját maguknak küldenek emialt, üzeneteket hívjanak le az archívumból.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Lehívás engedélyezése');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Az a lehívó email formátuma. Az alábbi változókat őrízzük meg %user%, %msgdate% és %msgbody% ');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Postaláda mérete');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Megadhatjuk, hogy összesen hány üzenet lehet a postaládánkban! (Az archívummal együtt!) Ha a magadott korlátot túllépjük, nem válaszolhatunk, vagy írhatunk üzentet, ameddig nem törlünk a postaládából. (Fogadni fogadhatunk olvasásra, de az üzenetek NEM tárolódnak!)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Az üzenet korlát megejelenítése a postaládában');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Megjeleníti, hogy hány üzenet van tárolva a postaládánkban és mennyi engedélyezett.');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Hogyan kívánjuk kezelni az archívált elemeket?');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Hagyjuk őket');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Hagyjuk az archívumban (a felhasználó enm tudja olvasni őket, de a postaláda üzenetkorlátját ugyanúgy foglalja!)');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Tegyük a postaládába');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Az archívált üzenetek a postaládába kerültek');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Az üzenetek a postaládába kerülnek (vagy a kukába, ha a postaládában engedélyezett dátumnál régebbiek)');


// 0.4 frontend, admins only (no translation necessary)
DEFINE ('_UDDEIM_VALIDFOR_1', 'érvényes ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' óráig. 0=örökre (automatikus törlés alkalmazása)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Rendszer vagy csoportos üzenet írása]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Hagyományos üzenet írása]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Rendszer és csoportos üzenet írása nem engedélyezett.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Üzenet típusa');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Segítség a rendszerüzenetekhez');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(megnyitás új ablakban)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Az alul lévő üzenet fog kiküldésre kerülni. Nézzük át és küldjük ki vagy töröljük!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Üzenet az <strong>összes felhasználónak</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Üzenet az <strong>összes adminisztrátornak</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Üzenet az <strong>összes bejelentkezett felhasználónak</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'A címzettek nem fognak tudni válaszolni erre az üzenetre.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Az üzenet ezen a <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> néven kerül kiküldésre');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Az üzenet lejár ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Az üzenet nem fog lejárni');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Ellenőrizzük a linket (kattintsunk rá!) az elfogadás előtt!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Használandó <strong>csak rendszer üzenet esetén</strong>:<br /> [b]<strong>bold</strong>[/b] [i]<em>italic</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] or [url]http://www.someurl.com[/url] are links');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Hiba: Címzett nem található. Nem küldtünk üzenetet.');
		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', 'Nem lehet válaszolni erre az üzenetre.');
DEFINE ('_UDDEIM_EMNOFF', 'Email értesítő kikapcsolva. ');
DEFINE ('_UDDEIM_EMNON', 'Email értesítő bekapcsolva. ');
DEFINE ('_UDDEIM_SETEMNON', '[bekapcsolás]');
DEFINE ('_UDDEIM_SETEMNOFF', '[kikapcsolás]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Kedves %you%!\n\n%user% egy üzenetet küldött neked a %site%-ról. Az elolvasásához jelentkezz be az oldalon!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Kedves %you%!\n\n%user% az alábbi üzenetet küldte a %site%-ról. A válaszhoz jelentkezz be az oldalon!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Kedves %you%!\n\nOlvasatlan üzeneted van a %site%-on lévő postaládádban. Az elolvasásukhoz jelentkezz be az oldalon!");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Magán üzenet érkezett a %site%-on');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'küldés rendszerüzenetként (=a címzettek nem fognak tudni válaszolni rá)');
DEFINE ('_UDDEIM_SEND_TOALL', 'küldés az összes felhasználónak');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'küldés az összes adminisztrátornak');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'küldés az összes bejelentkezett felhasználónak');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Váratlan hiba: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Archíválás nem engedélyezett.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Az üzenetek archívumba történő mozgatása meghiúsult.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Tárolva ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Jelenleg üres az archívum.</strong>');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' üzenet');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Egy üzenet van tárolva');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Az üzenet mentéséhez előbb törölnöd kell valamelyik korábbi üzenetet!');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Maximum ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' üzenet menthető.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Neked ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' üzenet van ');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'az archívumodban');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'a postaládádban');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'a postaládában és az archívumodban');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Az engedélyezett maximum ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Továbbra is fogadhatunk olvasásra üzeneteket, de válaszolni vagy új üzenetet írni korábbi üzenetek törlése nélkül nem lehet.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Üzenet tárolva: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(a maximumból. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Az üzenetet eltároltuk az archívumban.');
DEFINE ('_UDDEIM_STORE', 'archíválás');
		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'vissza');

DEFINE ('_UDDEIM_TRASHCHECKED', 'kiválasztottak törlése ');
	// translators info: plural!

DEFINE ('_UDDEIM_SHOWALL', 'az összes megjelenítése');
	// translators example "SHOW ALL messages"

DEFINE ('_UDDEIM_ARCHIVE', 'Archívum');
	// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Tele van az archívum. Nincs mentés.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Nincsen kijelölve üzenet.');
DEFINE ('_UDDEIM_THISISACOPY', 'A küldött üzenet másolása ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'a postaládába');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'az archívumba');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'az eredeti kukába dobása');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Üzenet letöltése');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Az exportált üzeneteket elkdültük emailen');
DEFINE ('_UDDEIM_EXPORT_NOW', 'Email magamnak');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Ez az email a magánüzeneteidet tartalmazza.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Nem tudtunk elkdüldeni az üzeneteket emailen.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Message limit! Not restored.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Üzenet írása ');

$udde_smon[1]="Jan";
$udde_smon[2]="Feb";
$udde_smon[3]="Már";
$udde_smon[4]="Ápr";
$udde_smon[5]="Máj";
$udde_smon[6]="Jún";
$udde_smon[7]="Júl";
$udde_smon[8]="Aug";
$udde_smon[9]="Szep";
$udde_smon[10]="Okt";
$udde_smon[11]="Nov";
$udde_smon[12]="Dec";

$udde_lmon[1]="Január";
$udde_lmon[2]="Február";
$udde_lmon[3]="Március";
$udde_lmon[4]="Április";
$udde_lmon[5]="Május";
$udde_lmon[6]="Június";
$udde_lmon[7]="Július";
$udde_lmon[8]="Augusztus";
$udde_lmon[9]="Szeptember";
$udde_lmon[10]="Október";
$udde_lmon[11]="November";
$udde_lmon[12]="December";

$udde_lweekday[0]="Vasárnap";
$udde_lweekday[1]="Hétfő";
$udde_lweekday[2]="Kedd";
$udde_lweekday[3]="Szerda";
$udde_lweekday[4]="Csütörtök";
$udde_lweekday[5]="Péntek";
$udde_lweekday[6]="Szombat";

$udde_sweekday[0]="Va";
$udde_sweekday[1]="Hé";
$udde_sweekday[2]="Ke";
$udde_sweekday[3]="Sze";
$udde_sweekday[4]="Csü";
$udde_sweekday[5]="Pé";
$udde_sweekday[6]="Szo";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM sablon');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Válasszuk ki a használni kívánt uddeIM sablont');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'CB kapcsolatok megjelenítése');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Válasszunk <i>igen</i>-t ha a CB telepítve van és használni kívánjuk felhasználó kapcsolati listáját az üzenet írásakor.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Beállítások megjelenítése');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Ha az email értesítés vagy a blokkolás engedélyezve van megjelenik egy link ezeknek a funkcióknak a beállításához. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'igen, alul');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'BB kódok engedélyezése');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'csak a szöveg módosítása');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Válasszuk a <i>csak a szöveg módosítása</i>-t, hogy a BB kódokkal csak a szöveg megjelenését szabályozhassuk. (pl. félkövér, dölt, aláhúzott, szín, méret). Ha <i>igen</i>-t választunk, a felhasználók az <strong>összes</strong> támogatott BB kódot használhatják (a linkeket és a képeket is!).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Vigyorok engedélyezése');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Ha <i>igen</i>-t választunk, a vigyor-jelek (pl. :-) ) grafikai ikonokkal lesznek megjelenítve. ');
DEFINE ('_UDDEADM_DISPLAY', 'Megjelenítés');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Menü ikonok megjelenítése');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Ha <i>igen</i>-t választunk, a menü linkek ikonként fognak megjelenni.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Komponens címe');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Külön megadhatjuk a magánüzenet rendszer nevét, pl. \'Magán Üzenetek\'. Hagyjuk üresen, ha nem akarunk főcímet használni.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Magunkról link megjelenítése');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Állítsuk <i>igen</i>-re, hogy megjelenjen a uddeIM program oldala. Ez a link a uddeIM alján fog megjelenni.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Email küldés leállítása');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Kapcsoljuk be, hogy letiltsuk az uddeIM email küldését (email értesítők és emlékeztetők) hasznos, miközben teszteljük az oldalt. Ha nem akarjuk használni állítsuk <i>nem</i>-re.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB avatarok a listában');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Állítsuk <i>igen</i>-re, ha a postaláda, kimenő mappa vagy kuka listában meg szeretnénk jeleníteni a feladó nevénél a CB avatarját is.');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Felhasználók megjelenítése');
DEFINE ('_UDDEIM_CONNECTIONS', 'Kapcsolatok');
DEFINE ('_UDDEIM_SETTINGS', 'Beállítások');
DEFINE ('_UDDEIM_NOSETTINGS', 'Nincsen módosítható beállítás.');
DEFINE ('_UDDEIM_ABOUT', 'About'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Üzenet írása'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Email értesítő');
DEFINE ('_UDDEIM_EMN_EXP', 'Új üzenet érkezéséről emailben kaphatsz értesítést.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Emailes értesítés új üzenet érkezéséről');
DEFINE ('_UDDEIM_EMN_NONE', 'Nincs emailes értesítő');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Email értesítő, ha nem vagyok bejelentkezve');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Válaszokról ne küldjön értesítőt');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Felhasználók blokkolása'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Blokkolhatunk felhasználókat, akiktől nem szeretnénk fogadni üzeneteket. Válasszuk a <i>felhasználó blokkolása</i>-t, amikor a felhasználótól érkezett üzenetet olvassuk.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Beállítások mentése');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB kód vastag szöveghez. Használata: [b]vastag[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB kód dőlt szöveghez. Használata: [i]dőlt[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB kód aláhúzott szöveghez. Használata: [u]aláhúzott[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB kód színes betükhöz. Használata: [color=#XXXXXX]színes[/color] ahol az XXXXXX a szín hex kódja pl. FF0000 a piros.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB kód színes betükhöz. Használata: [color=#XXXXXX]színes[/color] ahol az XXXXXX a szín hex kódja pl. 00FF00 a zöld.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB kód színes betükhöz. Használata: [color=#XXXXXX]színes[/color] ahol az XXXXXX a szín hex kódja pl. 0000FF a kék.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB kód nagyon apró betükhöz. Használata: [size=1]apró betük[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB kód kicsi betükhöz. Használata: [size=2]kicsi betük[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB kód nagy betükhöz. Használata: [size=4]nagy betük[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB kód hatalmas betükhöz. Használata: [size=5]hatalmas betük[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB kód kép elérési útjának beszúrásához. Használata: [img]kép-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB kód webcímek beszúrásához. Használata: [url]webcím[/url]. Ne felejtsük el beírni a http:// tagot az összes webcím elé!');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Az összes nyitott BB tag bezárása.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' üzenet'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>Üres az archívum.</strong>');
