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
// Language file: Serbian Latin
// Translator:    Miloš
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'UVEZI');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Učitaj MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Ovo određuje kako uddeIM učitava MooTools (MooTools je neophodan za Autocompleter): <i>nemoj</i> je korisno kada šablon učitava MooTools, <i>auto</i> se preporučuje podrazumevano (isto ponašanje kao u uddeIM 1.2), kada koristite J1.0 takođe možete primorati učitavanje MooTools 1.1 ili 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'nemoj učitavati MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'primoraj učitavanje MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'primoraj učitavanje MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...postavljam podrazumevano za MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Kodirano sa Base64');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Podesi vremensku zonu');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Kada uddeIM pokazuje pogrešno vreme ovde možete podesiti vremensku zonu. Kada je sve ispravno podešeno, ovo obično treba da bude nula. Međutim mogu postojati slučajevi kada morate promeniti ovu vrednost.');
DEFINE ('_UDDEADM_HOURS', 'časova');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Informacije o verziji:');
DEFINE ('_UDDEADM_STATISTICS', 'Statistika:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Prikaži statistiku');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Ovo prikazuje neke statistike kao što je broj sačuvanih poruka itd.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'PRIKAŽI STATISTIKU');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Poruke sačuvane u bazi podataka: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Poruke koje je primalac bacio u smeće: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Poruke koje je pošiljalac bacio u smeće: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Poruke zadržane za pročišćavanje: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Prebriši Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'uddeIM obično pokušava da utvrdi tačan Itemid kada isti nije postavljen. U nekim slučajevima može biti neophodno prebrisati ovu vrednost, npr. kada koristite nekoliko veza iz menija za uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Utvrđeni Itemid je: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Koristi Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Koristi ovaj Itemid umesto utvrđenog.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Koristi veze profila');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Kada je postavljeno na <i>da</i>, sva korisnička imena koja se pojavljuju u uddeIM-u će biti prikazana kao veze do njihovih korisničkih profila.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Prikaži sličice');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Kada je postavljeno na <i>da</i>, biće prikazana sličica dotičnog korisnika pri čitanju poruke.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Prikaži sličice u spisku');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Postavite na <i>da</i> ako želite da prikažete sličice korisnika u pregledu spiska poruka (prijemno i otpremno sanduče, itd.)');
DEFINE ('_UDDEADM_FIREBOARD', 'FireBoard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Isključeno');
DEFINE ('_UDDEADM_ENABLED', 'Uključeno');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Važno');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Dozvoli označavanje poruka');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Dozvoljava označavanje poruka (uddeIM prikazuje zvezdicu u spisku koja može biti istaknuta da obeleži važne poruke).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Važno: Kada nadgradite uddeIM sa ranije verzije proverite README. Ponekad marte da dodate ili izmenite polja i tabele u bazi podataka!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Dodaj CC: liniju');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Skrati citirani tekst');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Skrati citirani tekst na 2/3 najduže dužine teksta ako on prelazi ovu granicu.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Stavke u prijemnom sandučetu ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Poslednje ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' stavke');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Status');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Pošiljalac');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Poruka');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Prazno prijemno sanduče');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Pristup kanti za smeće nije dozvoljen.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Ograniči pristup kanti za smeće');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Možete ograničiti pristup kanti za smeće. Kanta za smeće je obično dostupna svima (<i>bez ograničenja</i>). Možete ograničiti pristup na specijalne korisnike ili samo administratore, tako da grupe sa nižim pravima pristupa ne mogu da recikliraju poruke.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'bez ograničenja');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'specijalni korisnici');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'samo administratori');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Sakrij korisnike u javnom spisku korisnika');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Unesite korisničke ID-e koje treba sakriti u javnom spisku korisnika (npr. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Sakrij korisnike u spisku korisnika');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Unesite korisničke ID-e koje treba sakriti u spisku korisnika (npr. 65,66,67). Administratori će uvek moći da vide kompletan spisak.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF napad je prepoznat');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF zaštita');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Ovo štiti sve formulare protiv Cross-Site Request Forgery napada. Ovo obično treba da je uključeno. Isključite samo ako imate čudne probleme.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Ne možete odgovarati na arhivirane poruke.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Odgovori neregistrovanim korisnicima ne mogu da budu opozvani.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Dozvoli odgovore');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Dozvoli direktne odgovore na poruke od javnih korisnika.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Zdravo %user%,\n\n%you% vam je poslao/la sledeću privatnu poruku na %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Prikaži stvarna imena');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Prikazati stvarna ili korisnička imena u javnom sučelju?');
DEFINE ('_UDDEIM_USERLIST', 'Spisak korisnika');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Žalim, morate sačekati pre nego što možete poslati novu poruku');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Poslednje poslato');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Vremenska zadrška');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Vreme u sekundama koje korisnik mora sačekati pre nego što može poslati sledeću poruku (0 za nikakvu zadršku).');
DEFINE ('_UDDEADM_SECONDS', 'sekundi');
DEFINE ('_UDDEIM_PUBLICSENT', 'Poruka je poslata.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Greška u imenu pošiljaoca');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Greška u adresi e-pošte');
DEFINE ('_UDDEIM_YOURNAME', 'Vaše ime:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Vaša e-pošta:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Koristite uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Već koristite poslednju uddeIM verziju.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Tekuća verzija je ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Informacije o ažuriranju:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Proveri za ažuriranja');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Ovo stupa u kontakt sa veb sajtom uddeIM programera kako bi se dobavile informacije o tekućoj uddeIM verziji. Sem uddeIM verzije koju koristite, nikakvi drugi ličini podaci neće biti poslati.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'PROVERI SADA');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Ne mogu da dobavim podatke o verziji.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Nije pronađen spisak kontakata!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Maksimalan broj primalaca je prevaziđen (maks. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Maksimalan broj stavki');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Maksimalno dozvoljen broj stavki po spisku kontakata.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Spisak kontakata nije uključen');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Uključi spisak kontakata');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM dozvoljava korisnicima da naprave spisak kontakata. Ovi spiskovi mogu da se upotrebe za slanje poruka višestrukim korisnicima. Ne zaboravite da uključite višestruke primaoce kada želite da koristite spisak kontakata.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'uključen');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'registrovani korisnici');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'posebni korisnici');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'samo administratori');
DEFINE ('_UDDEIM_LISTSNEW', 'Napravi novi spisak kontakata');
DEFINE ('_UDDEIM_LISTSSAVED', 'Spisak kontakata je sačuvan');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Spisak kontakata je ažuriran');
DEFINE ('_UDDEIM_LISTSDESC', 'Opis');
DEFINE ('_UDDEIM_LISTSNAME', 'Ime');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Ime (bez razmaka)');
DEFINE ('_UDDEIM_EDITLINK', 'uredi');
DEFINE ('_UDDEIM_LISTS', 'Kontakti');
DEFINE ('_UDDEIM_STATUS_READ', 'pročitana');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'nepročitana');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'na vezi');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'van veze');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Prikaži slike CB galerije');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'uddeIM podrazumevano prikazuje samo avatare koje su korisnici postavili. Kada uključite ovu postavku uddeIM takođe prikazuje slike iz CB galerije avatara.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Deblokiraj CB veze');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Možete dozvoliti poruke primaocima kada je registrovani korisnik u spisku CB veza primaoca (iako je primalac u grupi koja je blokirana). Ova postavka je nezavisna od pojedinačnog blokiranja koje svaki korisnik može da podesi kada je uključeno (vidite postavke iznad).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Nije vam dozvoljeno slanje ovoj grupi.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Ovaj primalac vas blokira.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blokirane grupe (registrovani korisnici)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Grupe za koje registrovanim korisnicima nije dozvoljeno da šalju poruke. Ovo je samo za registrovane korisnike. Ova postavka ne utiče na posebne korisnike i administratore. Ova postavka je nezavisna od pojedinačnog blokiranja koje svaki korisnik može da podesi kada je uključeno (vidite postavke iznad).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blokirane grupe (javni korisnici)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Grupe za koje javnim korisnicima nije dozvoljeno da šalju poruke. Ova postavka ne utiče na posebne korisnike i administratore. Ova postavka je nezavisna od pojedinačnog blokiranja koje svaki korisnik može da podesi kada je uključeno (vidite postavke iznad). Kada blokirate grupu, korisnici u ovoj grupi ne mogu da vide opciju za uključivanje javnog sučelja u svojim postavkama profila.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Javni korisnik');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB veza');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Registrovani korisnik');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Autor');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Urednik');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Objavljivač');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Menadžer');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Administrator');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'Superadministrator');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Korisnik prihvata poruke samo od registrovanih korisnika.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Sakrij od javnog spiska „Svi korisnici“');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Možete skriti određene grupe od uključivanja u javni spisak „Svi korisnici“. Napomena: ovo sakriva samo imena, korisnici još uvek mogu primati poruke. Korisnici koji nemaju uključeno javno sučelje nikada neće biti uvršteni u ovaj spisak.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Sakrij od spiska „Svi korisnici“');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Možete skriti određene grupe od uključivanja u spisak „Svi korisnici“. Napomena: ovo sakriva samo imena, korisnici još uvek mogu primati poruke.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'nijedan');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'samo superadministratori');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'samo administratori');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'posebni korisnici');
DEFINE ('_UDDEADM_PUBLIC', 'Javno');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Ponašanje veze „Svi korisnici“');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Izaberite da li veza „Svi korisnici“ treba da bude izostavljena u javnom sučelju, prikazana ili su svi korisnici uvek prikazani.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Javno sučelje');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- izaberite javne -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Dozvoli slanje poruka javnim korisnicima');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Dostignuto je ograničenje poruka!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Javni korisnik');
DEFINE ('_UDDEIM_DELETEDUSER', 'Korisnik je obrisan');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha dužina');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Određuje koliko znakova korisnik mora da unese.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha zaštita od spama');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Određuje ko mora da unese captcha pri slanju poruke');
DEFINE ('_UDDEADM_CAPTCHAF0', 'isključeno');
DEFINE ('_UDDEADM_CAPTCHAF1', 'samo javni korisnici');
DEFINE ('_UDDEADM_CAPTCHAF2', 'javni i registrovani korisnici');
DEFINE ('_UDDEADM_CAPTCHAF3', 'javni, registrovani, posebni korisnici');
DEFINE ('_UDDEADM_CAPTCHAF4', 'svi korisnici (uključujući administratore)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Uključi javno sučelje');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Kada je uključeno, javni korisnici mogu da šalju poruke registrovanim korisnicima (koji mogu da odrede u svojim ličnim postavkama da li žele da koriste ovu mogućnost).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Podrazumevano za javno sučelje');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Ovo je podrazumevana vrednost ako javnom korisniku dozvoljeno šalje poruku registrovanom korisniku.');
DEFINE ('_UDDEADM_PUBDEF0', 'isključeno');
DEFINE ('_UDDEADM_PUBDEF1', 'uključeno');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Pogrešan bezbednosni kod');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'nema ili nepoznato');
DEFINE ('_UDDEADM_DONATE', 'Ako vam se sviđa uddeIM i želite da podržite razvoj molimo vas napravite malu donaciju.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Podešavanja pronađena u bazi podataka: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Rezervna kopija i povraćaj podešavanja');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Možete da napravite rezervnu kopiju podešavanja u bazi podataka i povratiti je kada je to neophodno. Ovo je korisno kada ažurirate uddeIM ili kada želite da sačuvate izvesna podešavanja zbog isprobavanja.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'KOPIRAJ');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'VRATI');
DEFINE ('_UDDEADM_CANCEL', 'Otkaži');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Znakovni skup jezičke datoteke');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Obično je <b>podrazumevan</b> (ISO-8859-1) ispravna postavka za Joomla 1.0 i <b>UTF-8</b> za Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'podrazumevan');
DEFINE ('_UDDEIM_READ_INFO_1', 'Pročitane poruke će ostati u prijemnom sandučetu najviše ');
DEFINE ('_UDDEIM_READ_INFO_2', ' dana pre nego što budu automatski obrisane.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Nepročitane poruke će ostati u prijemnom sandučetu najviše ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' dana pre nego što budu automatski obrisane.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Poslate poruke će ostati u otpremnom sandučetu najviše ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' dana pre nego što budu automatski obrisane.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Prikaži obaveštenje za pročitane poruke u prijemnom sandučetu');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Prikaži obaveštenje <i>„Pročitane poruke će biti obrisane posle n dana“</i> u prijemnom sandučetu');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Prikaži obaveštenje za nepročitane poruke u prijemnom sandučetu');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Prikaži obaveštenje <i>„Nepročitane poruke će biti obrisane posle n dana“</i> u prijemnom sandučetu');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Prikaži obaveštenje za poslate poruke u otpremnom sandučetu');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Prikaži obaveštenje <i>„Poslate poruke će biti obrisane posle n dana“</i> u otpremnom sandučetu');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Prikaži obaveštenje za bačene poruke u kanti za smeće');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Prikaži obaveštenje <i>„Bačene poruke će biti pročišćene posle n dana“</i> u kanti za smeće');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Poslate poruke se čuvaju (dana)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Unesite broj dana pre nego što se <b>poslate</b> poruke automatski brišu iz otpremnog sandučeta.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'pošalji svim posebnim korisnicima');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Poruka <b>svim posebnim korisnicima</b>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- izaberite korisničko ime -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- izaberite ime -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Uredi korisničke postavke');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'postojeći');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'nepostojeći');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- izaberite stavku -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- izaberite obaveštenje -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- izaberite iskačući prozor -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Korisničko ime');
DEFINE ('_UDDEADM_USERSET_NAME', 'Ime');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Obaveštenje');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Iskačući prozor');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Poslednji pristup');
DEFINE ('_UDDEADM_USERSET_NO', 'Ne');
DEFINE ('_UDDEADM_USERSET_YES', 'Da');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'nepoznato');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Kada nije na vezi (izuzev odgovora)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Uvek (izuzev odgovora)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Kada nije na vezi');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Uvek');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Nema obaveštenja');
DEFINE ('_UDDEADM_WELCOMEMSG', "Dobro došli u uddeIM!\n\nUspešno ste instalirali uddeIM.\n\nPokušajte da pregledate ovu poruku pod različitim šablonima. Možete ih postaviti u administrativnom začelju uddeIM-a.\n\nuddeIM je projekat u razvoju. Ako pronađete greške ili slabosti, molim vas da mi ih dojavite kako bismo zajedno mogli da učinimo uddeIM boljim.\n\nSrećno i dobro se zabavite!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM instalacija je završena.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Nastavite do administrativnog začelja i pregledajte postavke.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Ako pokrećete CMS sa skupom znakova koji nije ISO 8859-1 pobrinite se da je ova postavka odgovarajuće prilagođena.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Nakon instalacije, sav uddeIM saobraćaj e-pošte (e-pošta za obaveštenja, nezaboravke) je isključen tako da se ne šalje nikakva e-pošta za vreme isprobavanja. Ne zaboravite da isključite „zaustavi e-poštu“ u začelju kada završite.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Najviše primalaca');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Najveći dozvoljeni broj primalaca po poruci (0=bez ograničenja)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'previše primalaca');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Slanje je e-pošte je isključeno.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Pretraga unutar teksta');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Autocompleter pretražuje unutar teksta (u suprotnom pretražuje samo početak)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Ponašanje veze „Svi korisnici“');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Izaberite da li veza „Svi korisnici“ treba da bude prikrivena, prikazana ili da li uvek treba da budu prikazani svi korisnici.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Prikrij vezu „Svi korisnici“');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Prikaži vezu „Svi korisnici“');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Uvek prikaži sve korisnike');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Podešavanje nije upisivo:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Podešavanje je upisivo:');
DEFINE ('_UDDEIM_FORWARDLINK', 'prosledi');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'primalac je pronađen');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'primalaca je pronađeno');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php pošta (podrazumevano)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Poštanski sistem');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Izaberite poštanski sistem koji uddeIM treba da koristi za slanje obaveštenja e-poštom.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Prikaži Joomla grupe');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Prikaži Joomla grupe u opštem spisku poruka.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Prosleđivanje poruka');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Dozvoli prosleđivanje poruka.');
DEFINE ('_UDDEIM_FWDFROM', 'Originalna poruka od');
DEFINE ('_UDDEIM_FWDTO', 'za');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Dearhiviraj poruku');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'ne mogu da dearhiviram poruku');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Dozvoli višestruke primaoce');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Dozvoli višestruke primaoce (razdvojene zarezima).');
DEFINE ('_UDDEIM_CHARSLEFT', 'znakova je preostalo');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Prikaži tekstualni brojač');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Prikazuje tekstualni brojač koji pokazuje koliko je znakova preostalo.');
DEFINE ('_UDDEIM_CLEAR', 'Očisti');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Dodaj izabrane korisnike u primaoce');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Ovo dozvoljava višestruki izbor primalaca iz spiska „svih korisnika“.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Dodaj izabrane veze u primaoce');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Ovo dozvoljava višestruki izbor primalaca iz spiska „CB veza“.');
DEFINE ('_UDDEADM_PMSFOUND', 'Pronađeni PMS: ');
DEFINE ('_UDDEIM_ENTERNAME', 'unesite ime');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Koristi automatsko dovršavanje');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Koristi automatsko dovršavanje za ime primaoca.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Ključ upotrebljen za zamućivanje');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Unesite ključ koji se koristi za zamućivanje poruke. Nemojte menjati ovu vrednost nakon što uključite zamućivanje poruka.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Pronađena je pogrešna datoteka podešavanja!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Pronađena verzija:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Očekivana verzija:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Prenosim podešavanja...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Završeno!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Kritična greška: Neuspelo upisivanje u datoteku podešavanja:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Šifrovana poruka! - Preuzimanje nije moguće!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Pogrešna lozinka! - Preuzimanje nije moguće!');
DEFINE ('_UDDEIM_WRONGPW', 'Pogrešna lozinka! - Kontaktirajte administratora baze podataka!');
DEFINE ('_UDDEIM_WRONGPASS', 'Pogrešna lozinka!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Pogrešan datum bacanja u smeće (prijemno/otpremno sanduče): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Ispravljam pogrešne datume bacanja u smeće');
DEFINE ('_UDDEIM_TODP', 'Za: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Pročisti poruke sada');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Prikaži ikone za akcije');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Kada je postavljeno na <b>da</b>, veze za akcije će biti prikazane ikonom.');
DEFINE ('_UDDEIM_UNCHECKALL', 'poništi sve');
DEFINE ('_UDDEIM_CHECKALL', 'štikliraj sve');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Prikaži donje ikone');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Kada je postavljeno na <b>da</b>, donje veze će biti prikazane ikonom.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Koristi animirane smeške');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Koristi animirane smeške umesto nepokretnih.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Dodatni animirani smešci');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Prikaži dodatne animirane smeške.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Šifrovana poruka - Neophodna je lozinka');
DEFINE ('_UDDEIM_PASSWORD', '<b>Neophodna je lozinka</b>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Lozinka');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (tekst za šifrovanje)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (tekst za dešifrovanje)');
DEFINE ('_UDDEIM_MORE', 'JOŠ');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Privatne poruke');
DEFINE ('_UDDEMODULE_NONEW', 'nula novih');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nove poruke: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'poruku');
DEFINE ('_UDDEMODULE_MESSAGES', 'poruka');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Imate');
DEFINE ('_UDDEMODULE_HELLO', 'Zdravo');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Hitna poruka');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Koristi šifrovanje');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Šifriraj sačuvane poruke');
DEFINE ('_UDDEADM_CRYPT0', 'Ništa');
DEFINE ('_UDDEADM_CRYPT1', 'Zamuti poruke');
DEFINE ('_UDDEADM_CRYPT2', 'Šifriraj poruke');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Podrazumevano obaveštenje e-poštom');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Podrazumevana vrednost za obaveštenje e-poštom (za korisnike koji još nisu izmenili svoje postavke).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Bez obaveštenja');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Uvek');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Obaveštenje van veze');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Prikrij vezu „Svim korisnicima“');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Prikrij vezu „Svim korisnicima“ u okviru za pisanje poruke (korisno kada je registrovano puno korisnika).');
DEFINE ('_UDDEADM_POPUP_HEAD','Iskačuće obaveštenje');
DEFINE ('_UDDEADM_POPUP_EXP','Prikaži iskačuće obaveštenje kada stigne nova poruka (neophodan je mod_uddeim ili zakrpljeni mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', 'Dalja podešavanja');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Ovde možete podesiti još neke postavke.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Prikaži iskačuće obaveštenje kada stigne nova poruka');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Podrazumevano uključi iskačuće obaveštenje');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Podrazumevano uključi iskačuće obaveštenje (za korisnike koji još nisu izmenili svoje postavke).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Održavanje');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Održavanje baze podataka');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'PROVERI');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'POPRAVI');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Kada je korisnik očišćen iz baze podataka njegove poruke obično ostaju u bazi. Ova funkcija proverava da li je neophodno baciti napuštene poruke u smeće i možete ih baciti ako je to neophodno.<br />Ovo takođe proverava bazu za neke greške koje će biti ispravljene.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Proveravam...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (korisničko ime): [prijemno sanduče|prijemno sanduče je izbačeno|otpremno sanduče|otpremno sanduče je izbačeno]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>prijemno sanduče: poruke su sačuvane u prijemnom sandučetu korisnika</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>prijemno sanduče je izbačeno: poruke iz korisnikovog prijemnog sandučeta su bačene u smeće, ali su i dalje u nečijem otpremnom sandučetu</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>otpremno sanduče: poruke su sačuvane u otpremnom sandučetu korisnika</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>otpremno sanduče je izbačeno: poruke iz korisnikovog otpremnog sandučeta su bačene u smeće, ali su i dalje u nečijem prijemnom sandučetu</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Izbacujem...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "nije pronađen (od/za/postavke/blokira/blokiran):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "obriši sve postavke korisnika");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "obriši blokiranje korisnika");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', " baci u smeće sve poruke koje su poslate obrisanom korisniku iz otpremnog sandučeta pošiljaoca i prijemnog sandučeta obrisanog korisnika");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "baci u smeće sve poruke koje je poslao obrisani korisnik iz njegovog otpremnog sandučeta i prijemnog sandučeta primaoca");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nema šta da se radi</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Potrebno je održavanje</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Prikaz pravih imena');
DEFINE ('_UDDEADM_NAMESDESC', 'Prikaz pravih ili korisničkih imena?');
DEFINE ('_UDDEADM_REALNAMES', 'Prava imena');
DEFINE ('_UDDEADM_USERNAMES', 'Korisnička imena');
DEFINE ('_UDDEADM_CONLISTBOX', 'Padajući spisak CB veza');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Prikaz veza u padajućem spisku ili u tabeli?');
DEFINE ('_UDDEADM_LISTBOX', 'Padajući spisak');
DEFINE ('_UDDEADM_TABLE', 'Tabela');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Poruke će ostati u kanti za smeće 24 časa pre nego što budu obrisane. Možete videti samo početne reči poruke. Da biste pročitali celu poruku, morate je prvo vratiti.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Poruke će ostati u kanti za smeće ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' časova pre nego što budu obrisane. Možete videti samo početne reči poruke. Da biste pročitali celu poruku, morate je prvo vratiti.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Ova poruka je opozvana. Možete je urediti i ponovo poslati.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Poruka nije mogla biti opozvana (verovatno zato što je ili pročitana ili obrisana).');
DEFINE ('_UDDEIM_CANTRESTORE', 'Vraćanje poruke nije uspelo. (Moguće je da je bila predugo u kanti za smeće i da je u međuvremenu obrisana.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Vraćanje poruke nije uspelo.');
DEFINE ('_UDDEIM_DONTSEND', 'Ne šalji');
DEFINE ('_UDDEIM_SENDAGAIN', 'Pošalji ponovo');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Niste prijavljeni.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<b>Nemate poruka u prijemnom sandučetu.</b>');

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<b>Nemate poruka u otpremnom sandučetu.</b>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<b>Nemate poruka u kanti za smeće.</b>');
DEFINE ('_UDDEIM_INBOX', 'Prijemno sanduče');
DEFINE ('_UDDEIM_OUTBOX', 'Otpremno sanduče');
DEFINE ('_UDDEIM_TRASHCAN', 'Kanta za smeće');
DEFINE ('_UDDEIM_CREATE', 'Nova poruka');
DEFINE ('_UDDEIM_UDDEIM', 'Privatne poruke');
DEFINE ('_UDDEIM_READSTATUS', 'Pročitana');
DEFINE ('_UDDEIM_FROM', 'Pošiljalac');
DEFINE ('_UDDEIM_FROM_SMALL', 'pošiljalac');
DEFINE ('_UDDEIM_TO', 'Primalac');
DEFINE ('_UDDEIM_TO_SMALL', 'primalac');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Otpremno sanduče sadrži sve poruke koje ste poslali. Možete ih opozvati ukoliko još uvek nisu pročitane. Ukoliko to učinite, primalac više neće moći da ih pročita. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'opozovi');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Opozovi ovu poruku');
DEFINE ('_UDDEIM_RESTORE', 'vrati');
DEFINE ('_UDDEIM_MESSAGE', 'Poruka');
DEFINE ('_UDDEIM_DATE', 'Datum');
DEFINE ('_UDDEIM_DELETED', 'Obrisano');
DEFINE ('_UDDEIM_DELETE', 'obriši');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'obriši');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Ova poruka ne može biti obrisana<br />Mogući razlozi:<ul><li>Nemate prava da pročitate ovu poruku.</li><li>Poruka je već obrisana.</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Premestili ste poruku u kantu za smeće.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Poruka od ');
DEFINE ('_UDDEIM_MESSAGETO', 'Poruka od vas za ');
DEFINE ('_UDDEIM_REPLY', 'Odgovori');
DEFINE ('_UDDEIM_SUBMIT', 'Pošalji');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Premesti originalnu poruku u kantu za smeće nakon odgovora');
DEFINE ('_UDDEIM_NOID', 'Greška: Nije pronađen primalac. Poruka nije poslata.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Greška: Poruka ne sadrži tekst! Poruka nije poslata.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Odgovor je poslat');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Poruka je poslata');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' a originalna poruka je prebačena u smeće');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Nema korisnika sa ovim korisničkim imenom!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Ne možete poslati poruku sami sebi!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Prekršaj pristupa!</b> Nemate pravo da izvedete ovu operaciju!');
DEFINE ('_UDDEIM_PRUNELINK', 'Samo za administratore: Pročisti');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM administracija');
DEFINE ('_UDDEADM_GENERAL', 'Opšte');
DEFINE ('_UDDEADM_ABOUT', 'O komponenti');
DEFINE ('_UDDEADM_DATESETTINGS', 'Datum/vreme');
DEFINE ('_UDDEADM_PICSETTINGS', 'Ikone');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Pročitane poruke se čuvaju (dana)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Nepročitane poruke se čuvaju (dana)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Poruke se čuvaju u smeću (dana)');
DEFINE ('_UDDEADM_DAYS', 'dan(a)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', ' Unesite broj dana pre nego što <b>pročitane</b> poruke budu automatski obrisane iz prijemnog sandučeta. Ako ne želite da automatski brišete poruke, unesite veoma veliku vrednost (npr. 36524 dana je jednako jednom veku). Imajte ipak na umu da se baza podataka može brzo napuniti ako zadržavate sve poruke.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Unesite broj dana pre nego što budu obrisane poruke koje još uvek <b>nije pročitao</b> namereni primalac.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Unesite broj dana pre nego što poruke budu obrisane iz kante za smeće. Decimalne vrednosti su moguće, npr. za brisanje poruka iz kante za smeće posle 3 časa unesite 0.125 kao vrednost.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Format prikaza datuma');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Izaberite format za prikazivanje datuma/vremena. Meseci će biti skraćeni u skladu sa lokalnom Joomla postavkom za jezik (ukoliko postoji odgovarajuća uddeIM jezička datoteka).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Prikaz dužeg datuma');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Kada se prikazuju poruke postoji više prostora za niz datuma/vremena. Izaberite format za prikazivanje datuma pri otvaranju nove poruke. Za nazive dana u nedelji i meseci će se upotrebiti lokalna Joomla postavka za jezik (ukoliko postoji odgovarajuća uddeIM jezička datoteka).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Brisanje pokreće');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'samo administrator');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'bilo koji korisnik');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'ručno');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatsko brisanje stvara veliko opterećenje servera. Ako izaberete <b>samo administrator</b>, automatsko brisanje se pokreće kada administrator proverava svoje prijemno sanduče. Izaberite ovu opciju ako administrator redovno proverava svoje prijemno sanduče. Mali ili sajtovi koji se retko administriraju mogu da izaberu <b>bilo koji korisnik</b>.');

	// above string changed in 0.4
DEFINE ('_UDDEADM_SAVESETTINGS', 'Sačuvaj podešavanja');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Sledeća podešavanja su sačuvana u datoteku podešavanja:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Podešavanja su sačuvana.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ikona: korisnik je na vezi');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Unesite lokaciju ikone koja će biti prikazana pored korisničkog imena kada je ovaj korisnik na vezi.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ikona: korisnik nije na vezi');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Unesite lokaciju ikone koja će biti prikazana pored korisničkog imena kada ovaj korisnik nije na vezi.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Ikona: pročitana poruka');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Unesite lokaciju ikone koja će biti prikazana za pročitane poruke.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ikona: nepročitana poruka');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Unesite lokaciju ikone koja će biti prikazana za nepročitane poruke.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: ikona nove poruke');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Ovo podešavanje se odnosi na modul mod_uddeim. Unesite lokaciju ikone koju ovaj modul treba da prikaže kada postoje nove poruke.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM instalacija');
DEFINE ('_UDDEADM_FINISHED', 'Instalacija je završena. Dobro došli u uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Nemate instaliran Mambo Community Builder. Nećete biti u mogućnosti da koristite uddeIM.</span><br /><br />Možda biste želeli da preuzmete <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'nastavi');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Postoji ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' poruka u staroj instalaciji PMS-a. Da li želite da uvezete ove poruke u uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Ovo neće izmeniti poruke ili instalaciju starog PMS-a. Oni će biti netaknuti i možete ih bezbedno uvesti u uddeIM, čak i kada razmišljate o nastavku upotrebe starog PMS-a. Trebalo bi prvo da sačuvate bilo kakve promene napravljene u podešavanjima pre nego što pokrenete uvoz! Sve poruke koje se već nalaze u uddeIM baci podataka će ostati netaknute.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4

DEFINE ('_UDDEADM_IMPORT_YES', 'Uvezi poruke starog PMS-a u uddeIM sada');
DEFINE ('_UDDEADM_IMPORT_NO', 'Ne, nemoj uvoziti nikakve poruke');
DEFINE ('_UDDEADM_IMPORTING', 'Sačekajte dok se poruke uvoze.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Završen je uvoz poruka iz starog PMS-a. Nemojte pokretati ovu instalacionu skriptu ponovo jer će se time ponovo uvesti poruke i pojavljivaće se dvaput.');
DEFINE ('_UDDEADM_IMPORT', 'Uvoz');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Uvoz poruka iz starog PMS-a');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Nije pronađena instalacija drugog PMS-a. Uvoz nije moguć.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Već ste uvezli poruke iz starog PMS-a u uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Blokirano');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nije poslato (korisnik vas je blokirao)');
DEFINE ('_UDDEIM_BLOCKNOW', 'blokiraj&nbsp;korisnika');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Ovo je lista korisnika koje ste blokirali. Ovi korisnici vam ne mogu slati privatne poruke.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Trenutno niste blokirali nijednog korisnika.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Trenutno ste blokirali ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' korisnika.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[deblokiraj]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Ukoliko blokirani korisnik pokuša da vam pošalje poruku, dobiće obaveštenje da je blokiran/a i da poruka neće biti poslata.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Blokirani korisnik ne može da vidi da ste ga/je blokirali.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Ne možete blokirati administratore.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Uključi sistem za blokiranje');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Kada je uključeno, korisnici mogu da blokiraju druge korisnike. Blokirani korisnik ne može da šalje poruke korisniku koji ga je blokirao. Administratori ne mogu da budu blokirani.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'da');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'ne');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Informisanje blokiranog korisnika');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Ako je postavljeno na <b>da</b>, blokirani korisnik će biti informisan da poruka nije poslata jer ga je primalac blokirao. Ako je postavljeno na <b>ne</b>, blokirani korisnik neće primiti nikakvo obaveštenje da poruka nije poslata.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'da');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'ne');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistem za blokiranje nije uključen');
// DEFINE ('_UDDEADM_DELETIONS', 'Poruka');
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Brisanje'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blokiranje');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integracija');
DEFINE ('_UDDEADM_EMAIL', 'E-pošta');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Prikaži CB veze');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Kada je postavljeno na <b>da</b>, sva korisnička imena koja se pojavljuju u uddeIM-u će se prikazati kao veze ka njihovom Community Builder profilu.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Prikaži CB sličicu');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Kada je postavljeno na <b>da</b>, sličica korisnika sačuvana u Community Builderu će biti prikazana pri čitanju poruke.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Prikaži status veze');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Kada je postavljeno na <b>da</b>, uddeIM prikazuje svako korisničko ime sa malom ikonom koja obaveštava da li je korisnik na vezi li ne.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Dozvoli obaveštenja e-poštom');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Kada je postavljeno na <b>da</b>, korisnici mogu da biraju da li žele da prime e-poštu svaki put kada im nova poruka stigne u prijemno sanduče.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-pošta sadrži poruku');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Kada je postavljeno na <b>ne</b>, ova e-pošta će sadržati podatke samo o tome kada i ko je poslao poruku, ali ne i samu poruku.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'E-pošta nezaboravka');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Ova funkcija šalje e-poštu korisnicima koji imaju nepročitane poruke u svom prijemnom sandučetu jako dugo vremena (postavljeno ispod). Ova postavka je nezavisna od one „dozvoli obaveštenja e-poštom“. Ako ne želite da šaljete bilo kakve poruke e-poštom morate isključiti obe.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Nezaboravak se šalje posle dan(a)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Ako je funkcija nezaboravka (iznad) postavljena na <b>da</b>, ovde odredite posle koliko dana se e-poštom otpremaju obaveštenja o nepročitanim porukama.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Početni znakovi u spisku');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Ovde možete postaviti koliko će početnih znakova poruke biti prikazano u prijemnom i otpremnom sandučetu, i kanti za smeće.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Najveća dužina poruke');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Postavite najveću dužinu poruke (poruka će biti automatski skraćena kada njena dužina prelazi ovu vrednost). Postavite na „0“ za dozvoljavanje poruka bilo koje dužine (nije preporučljivo).');
DEFINE ('_UDDEADM_YES', 'da');
DEFINE ('_UDDEADM_NO', 'ne');
DEFINE ('_UDDEADM_ADMINSONLY', 'samo administratori');
DEFINE ('_UDDEADM_SYSTEM', 'Sistem');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Korisničko ime za sistemske poruke');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM podržava sistemske poruke. One nemaju pošiljaoca i korisnici ne mogu odgovarati na njih. Ovde unesite podrazumevani pseudonim korisničkog imena za sistemske poruke (na primer <b>Podrška</b> ili <b>Pomoćni servis</b> ili <b>Gazda zajednice</b>).');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Dozvoli administratorima slanje opštih poruka');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM podržava opšte poruke. One se šalju svim korisnicima na sistemu. Ne koristite ih prečesto.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Ime pošiljaoca e-pošte');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Unesite ime sa kojim dolaze obaveštenja e-poštom (na primer <b>Vaš sajt</b> ili <b>Servis za poruke</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adresa e-pošte pošiljaoca');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Unesite adresu e-pošte sa koje se šalju obaveštenja e-poštom (ovo bi trebalo da bude glavna kontakt adresa e-pošte za vaš sajt).');
DEFINE ('_UDDEADM_VERSION', 'uddeIM verzija');
DEFINE ('_UDDEADM_ARCHIVE', 'Arhiva'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Uključi arhivu');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Izaberite da li će korisnicima biti dozvoljeno da sačuvaju poruke u arhivi. Poruke u arhivi neće biti automatski obrisane.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Najviše poruka u arhivi');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Postavite koliko poruka svaki korisnik može sačuvati u arhivi (nema ograničenja za administratore).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Dozvoli kopije samom sebi');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Dozvoljava korisnicima da prime kopije poruke koje šalju. Ove kopije će se pojaviti u prijemnom sandučetu.');
DEFINE ('_UDDEADM_MESSAGES', 'Poruke');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Predloži bacanje originala');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Kada je ovo aktivirano, pored dugmeta „Pošalji“ pri odgovaranju će se pojaviti kućica sa oznakom „original u smeće“ koja je podrazumevano štiklirana. U ovom slučaju će poruka biti neposredno premeštena iz prijemnog sandučeta u kantu za smeće kada je odgovor poslat. Ova funkcija smanjuje broj poruka koje se čuvaju u bazi podataka. Korisnici mogu da očiste kućicu ako žele da zadrže poruku u prijemnom sandučetu.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL

DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Poruka po stranici');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Ovde definišite broj prikazanih poruka po stranici u prijemnom i otpremnom sandučetu, kanti za smeće i arhivi.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Upotrebljen skup znakova');
DEFINE ('_UDDEADM_CHARSET_EXP', ' Ako nailazite na probleme sa prikazom nelatiničnih skupova znakova, ovde možete uneti skup znakova koje uddeIM koristi za prebacivanje izlaza baze podataka u HTML kod. Podrazumevana vrednost je ispravna za većinu evropskih jezika.');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Skup znakova upotrebljen za e-poštu');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Ako nailazite na probleme sa prikazom nelatiničnih skupova znakova, možete uneti skup znakova koje uddeIM koristi za slanje otpremne e-pošte. Podrazumevana vrednost je ispravna za većinu evropskih jezika.');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'

DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Ovo je sadržaj e-pošte koju će korisnici primiti kada je postavljena opcija iznad. Sadržaj poruke neće biti u e-pošti. Ostavite promenljive %you%, %user% i %site% netaknute. ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Ovo je sadržaj e-pošte koju će korisnici primiti kada je postavljena opcija iznad. Ova e-pošta će uključivati i sadržaj poruke. Ostavite promenljive %you%, %user%, %pmessage% i %site% netaknute. ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Ovo je sadržaj e-pošte nezaboravka koju će korisnici primiti kada je postavljena opcija iznad. Ostavite promenljive %you% i %site% netaknute. ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Dozvoli korisnicima da preuzmu poruke iz svoje arhive šaljući ih e-poštom njima samima.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Dozvoli preuzimanje');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Ovo je format e-pošte koju korisnici primaju kada preuzmu svoje poruke iz arhive. Ostavite promenljive %user%, %msgdate% i %msgbody% netaknute. ');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Postavi ograničenje na prijemno sanduče');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Možete uključiti broj poruka u prijemnom sandučetu u maksimalni broj arhiviranih poruka. U ovom slučaju, ukupan broj poruka u prijemnom sandučetu i arhivi ne sme preći gore postavljeni broj. Alternativno, možete postaviti ograničenje na prijemno sanduče bez arhive. U ovom slučaju, korisnici ne smeju imati veći broj poruka i njihovim prijemnim sandučićima od iznad postavljenog. Ako je taj broj dosegnut, neće moći da odgovaraju ili pišu nove poruke dok ne obrišu stare poruke iz prijemnog sandučeta ili arhive. (Korisnici će još uvek moći da primaju i čitaju poruke.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Prikaži iskorišćenost ograničenja kod prijemnog sandučeta');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Prikaži koliko poruka su korisnici sačuvali (i koliko im je dozvoljeno da sačuvaju) u redu ispod prijemnog sandučeta.');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Isključili ste arhivu. Šta želite da učinite sa porukama koje su sačuvane u arhivi?');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Ostavi ih');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Ostavi ih u arhivi (korisnik neće biti u mogućnosti da pristupi porukama i one će se i dalje brojati radi ograničenja poruka).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Premesti u prijemno sanduče');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Arhivirane poruke su premeštene u prijemno sanduče');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Poruke će biti premeštene u prijemno sanduče korisnika u pitanju (ili u smeće ako su starije nego što je dozvoljeno za prijemno sanduče).');


// 0.4 frontend, admins only (no translation necessary)
DEFINE ('_UDDEIM_VALIDFOR_1', 'važi ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' časova. 0=zauvek (automatsko brisanje se primenjuje)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Napravite sistemsku ili opštu poruku]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Napravite običnu (standardnu) poruku]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Sistemske i opšte poruke nisu dozvoljene.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Vrsta poruke');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Pomoć za sistemske poruke');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(otvara se u novom prozoru)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Spremate se da pošaljete poruku prikazanu ispod. Pregledajte je i potvrdite ili otkažite!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Poruka <b>svim korisnicima</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Poruka <b>svim administratorima</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Poruka <b>svim trenutno prijavljenim korisnicima</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Primaoci neće biti u mogućnosti da odgovore na ovu poruku.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Poruka će biti poslata sa <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> kao korisničkim imenom');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Poruka će isteći ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Poruka neće isteći');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Proverite vezu (pritiskom na nju) pre nastavka!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Upotreba <b>samo u sistemskim porukama</b>:<br /> [b]<b>podebljano</b>[/b] [i]<em>kurziv</em>[/i]<br />
[url=http://www.nekiurl.com]neki url[/url] ili [url]http://www.nekiurl.com[/url] su veze');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Greška: Nisu pronađeni primaoci. Poruka nije poslata.');

DEFINE ('_UDDEIM_CANTREPLY', 'Ne možete odgovoriti na ovu poruku.');
DEFINE ('_UDDEIM_EMNOFF', 'Obaveštenje putem e-pošte je isključeno. ');
DEFINE ('_UDDEIM_EMNON', 'Obaveštenje putem e-pošte je uključeno. ');
DEFINE ('_UDDEIM_SETEMNON', '[uključi]');
DEFINE ('_UDDEIM_SETEMNOFF', '[isključi]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Zdravo %you%,\n\n%user% vam je poslao/la poruku na %site%. Molimo vas da se prijavite da biste je pročitali!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Zdravo %you%,\n\n%user% vam je poslao/la sledeću privatnu poruku na %site%. Molimo vas da se prijavite da biste odgovorili!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Zdravo %you%,\n\nimate nepročitanih privatnih poruka na %site%. Molimo vas da se prijavite i pročitate ih!");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Imate poruke na %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'pošalji kao sistemsku poruku (=primaoci ne mogu odgovarati)');
DEFINE ('_UDDEIM_SEND_TOALL', 'pošalji svim korisnicima');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'pošalji svim administratorima');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'pošalji svim korisnicima na vezi');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Neočekivana greška: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arhiva nije omogućena.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Prebacivanje poruka u arhivu nije uspelo.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Sačuvali ste ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>Još uvek nemate sačuvanih poruka</b>');
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Nemate poruka u arhivi.</b>');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' poruka');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Sačuvali ste jednu poruku');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Da biste sačuvali poruke morate prvo obrisati neke poruke.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Možete sačuvati najviše ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' poruka.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Imate ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' poruka u');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' poruku u'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arhivi');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'sandučetu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'sandučetu i arhivi');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Dozvoljeni maksimum je ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Moći ćete da primate i čitate poruke ali nećete moći da odgovarate i pišete nove dok ne obrišete stare.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Sačuvane poruke: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(od maks. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Poruka je sačuvana u arhivu.');
DEFINE ('_UDDEIM_STORE', 'arhiviraj');				// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'nazad');
DEFINE ('_UDDEIM_TRASHCHECKED', 'obriši označene');	// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'prikaži sve');	// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Arhiva');				// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arhiva je puna. Nije sačuvano.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Nema izabranih poruka.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopija poruke koju ste poslali ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'kopija za mene');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopiraj u arhivu');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'original u smeće');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Preuzimanje poruka');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-pošta sa sačuvanim porukama je poslata');
DEFINE ('_UDDEIM_EXPORT_NOW', 'e-pošta označena za mene');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Ova e-pošta sadrži vaše privatne poruke.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Nije bilo moguće poslati e-poštu sa porukama.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Ograničenje broja poruka! Nije vraćeno.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Napišite poruku ');

$udde_smon[1]="jan";
$udde_smon[2]="feb";
$udde_smon[3]="mar";
$udde_smon[4]="apr";
$udde_smon[5]="maj";
$udde_smon[6]="jun";
$udde_smon[7]="jul";
$udde_smon[8]="avg";
$udde_smon[9]="sep";
$udde_smon[10]="okt";
$udde_smon[11]="nov";
$udde_smon[12]="dec";

$udde_lmon[1]="januar";
$udde_lmon[2]="februar";
$udde_lmon[3]="mart";
$udde_lmon[4]="april";
$udde_lmon[5]="maj";
$udde_lmon[6]="jun";
$udde_lmon[7]="jul";
$udde_lmon[8]="avgust";
$udde_lmon[9]="septembar";
$udde_lmon[10]="oktobar";
$udde_lmon[11]="novembar";
$udde_lmon[12]="decembar";

$udde_lweekday[0]="nedelja";
$udde_lweekday[1]="ponedeljak";
$udde_lweekday[2]="utorak";
$udde_lweekday[3]="sreda";
$udde_lweekday[4]="četvrtak";
$udde_lweekday[5]="petak";
$udde_lweekday[6]="subota";

$udde_sweekday[0]="ned";
$udde_sweekday[1]="pon";
$udde_sweekday[2]="uto";
$udde_sweekday[3]="sre";
$udde_sweekday[4]="čet";
$udde_sweekday[5]="pet";
$udde_sweekday[6]="sub";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM šablon');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Izaberite šablon koji želite da uddeIM koristi');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Prikaži CB veze');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Upotrebite <b>da</b> ukoliko imate instaliran Community Builder i želite da prikažete imena korisnikovih veza na stranici za pisanje nove poruke.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Prikaži podešavanja');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Veza ka podešavanjima se automatski prikazuje u uddeIM-u ukoliko vam je omogućeno obaveštavanje putem e-pošte ili je sistem za blokiranje aktivan. Možete odrediti njenu poziciju ili je potpuno isključiti.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'da, na dnu');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Dozvoli BB kodove');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'samo formatiranje slova');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Upotrebite <b>samo formatiranje slova</b> da dozvolite korisnicima upotrebu BB koda za podebljana, kurzivna, podvučena, i obojena slova i promenu njihove veličine. Kada postavite ovu opciju na <b>da</b>, korisnici će moći da koriste <b>sav</b> podržani BB kod (npr. slike i veze).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Dozvoli emotikone');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Kada je podešeno na <b>da</b>, kod za emotikone kao :-) se zamenjuje grafičkim emotikonama pri prikazu poruka.');
DEFINE ('_UDDEADM_DISPLAY', 'Prikaži');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Prikaži ikone u meniju');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Kada je podešeno na <b>da</b>, veze menija će biti prikazane ikonama.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Naslov komponente');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Unesite ime za komponentu privatnih poruka, recimo „Privatne poruke“. Ostavite prazno ukoliko ne želite prikazivanje naslova.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Prikaži informativnu vezu');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Izaberite <b>da</b> za prikazivanje informacija o autorima i uddeIM licencu. Ova veza će biti prikazana na dnu uddeIM izlaza.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Zaustavi e-poštu');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Označite ovo polje da sprečite uddeIM da šalje e-poštu (obaveštenja i nezaboravaka putem e-pošte) bez obzira na podešavanja korisnika, kada, recimo, testirate sajt.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB sličice u listama');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Izaberite <b>da</b> ukoliko želite prikaz CB sličica u pregledu lista poruka (primljene, poslate itd.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Prikaži korisnike');
DEFINE ('_UDDEIM_CONNECTIONS', 'Veze');
DEFINE ('_UDDEIM_SETTINGS', 'Podešavanja');
DEFINE ('_UDDEIM_NOSETTINGS', 'Nema podešavanja za izmenu.');
DEFINE ('_UDDEIM_ABOUT', 'O uddeIM-u'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Napiši'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Obaveštavanje putem e-pošte');
DEFINE ('_UDDEIM_EMN_EXP', 'Primite obaveštenje putem e-pošte o novoj privatnoj poruci.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Obaveštavanje e-poštom o novoj poruci');
DEFINE ('_UDDEIM_EMN_NONE', 'Bez obaveštavanja putem e-pošte');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Obaveštavanje putem e-pošte kada niste na vezi');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Ne šalji obaveštenja o odgovorima');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Blokiranje korisnika'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Možete sprečiti korisnike da vam šalju poruke njihovim blokiranjem. Izaberite <b>blokiraj korisnika</b> kada čitate poruku od korisnika koga želite blokirati.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Sačuvaj izmene');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB kod za pravljenje podebljanog teksta. Upotreba: [b]podebljano[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB kod za pravljenje kurzivnog teksta. Upotreba: [i]kurziv[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB kod za pravljenje podvučenog teksta. Upotreba: [u]podvučeno[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB kod za pravljenje obojenog teksta. Upotreba: [color=#XXXXXX]obojeno[/color] gde je XXXXXX heksadekadni kod boje koju želite, recimo FF0000 za crvenu.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB kod za pravljenje obojenog teksta. Upotreba: [color=#XXXXXX]obojeno[/color] gde je XXXXXX heksadekadni kod boje koju želite, recimo 00FF00 za zelenu.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB kod za pravljenje obojenog teksta. Upotreba: [color=#XXXXXX]obojeno[/color] gde je XXXXXX heksadekadni kod boje koju želite, recimo 0000FF za plavu.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB kod za pravljenje veoma malih slova. Upotreba: [size=1]veoma mala slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB kod za pravljenje malih slova. Upotreba: [size=2]mala slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB kod za pravljenje velikih slova. Upotreba: [size=4]velika slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB kod za pravljenje veoma velikih slova. Upotreba: [size=5]veoma velika slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB kod za ubacivanje slike. Upotreba: [img]URL slike[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB kod za ubacivanje hiper veze. Upotreba: [url]adresa[/url]. Ne zaboravite http:// na početku svake adrese.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Zatvori sve otvorene BB oznake.');
