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
// Language file: Finnish
//
// Author: Markku Suominen
// Finnish Joomla! Translation Team
// Site: http://www.joomlaportal.fi
// Email: admin@joomlaportal.fi
//
// Edited/Author: Sami Haaranen
// Finnish Joomla! Translation Team
// Site: http://www.joomlaportal.fi
// Email: mortti@joomlaportal.fi
//
// For Version: uddeIM 1.3
// Dated: 19.08.2008
// Translation version: 0.3
//
// Please, take the contact for authors or our Finnish forum if you see some mistakes in this language file.
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Lataa MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Tämä määrittelee kuinka uddeIM lataa MooTools:n (MooTools on pakollinen Autocompleter:lle): <i>ei mitään</i> on käytännöllinen kun sivupohjasi lataa MooTools:n, <i>Auto</i> on oletus suositus (samakuin uddeIM 1.2:ssa), kun käytetään J1.0 voit myös pakottaa latauksen MooTools 1.1 tai 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'älä lataa MooTools:ia');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'pakotettu lataus MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'pakotettu lataus MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...oletusasetukset MooTools:lle');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 koodattuna');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Aseta aikavyöhyke');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Kun uddeIM näyttää väärän ajan voit asettaa aikavyöhykkeen tästä. Yleensä, kun kaikki on asetettu oikein, tämän kuuluisi olla nolla. Joissain tapauksissa sinun ehkä tulee muuttaa tätä arvoa.');
DEFINE ('_UDDEADM_HOURS', 'tunti(a)'); //Finnish translator note... original is plurar but I think this is regular thing.
DEFINE ('_UDDEADM_VERSIONCHECK', 'Versio tiedot:');
DEFINE ('_UDDEADM_STATISTICS', 'Tilastot:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Näytä tilastot');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Tämä näyttää muutamat tilastot, esimerkiksi tallennetut viestit jne.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'NÄYTÄ TILASTOT');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Viestejä tallennettu tietokantaan: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Viestejä roskakoriin viestin saajalta: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Viestejä poistettu lähettäjältä: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Viestejä odottavat puhdistusta: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Ylikirjoita Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Yleensä uddeIM yrittää havaita oikean Itemid:en, kun sitä ei ole asetettu. Joissain tapauksissa voi olla tarpeellista ylikirjoittaa tämä arvo, esim. kun käyttää useita valikkolinkkejä uddeIM:iin.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Löydetty Itemid on: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Käytettävä Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Käytä tätä Itemid:tä eikä havaittua.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Käytä profiili linkkejä');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Kun asetat <i>kyllä</i>, kaikki käyttäjänimet näytetään uddeIM:ssä linkkeinä käyttäjä profiiliin.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Näytä pikkukuvat');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Kun asetat <i>kyllä</i>, pikkukuvat kustakin käyttäjästä näytetään kun lukee viestin.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Näytä pikkukuvst listassa');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Aseta <i>kyllä</i> jos haluat näyttää pikkukuvat käyttäjistä viestilista näkymässä (saapuneet, lähetetyt, jne.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Estetty');
DEFINE ('_UDDEADM_ENABLED', 'Sallittu');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Tärkeä');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Salli viestin merkitseminen');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Sallii viestin merkitsemisen (uddeIM näyttää listassa tähdet, jotka korostavat viestien tärkeyttä).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Tärkeää: Kun päivität uddeIM: aikaisemmasta versiosta niin lue README. Joissain tapauksissa sinun tulee lisätä tai muuttaa tietokanta tauluja tai kenttiä!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Lisää Kopio (CC): -rivi');
DEFINE ('_UDDEIM_CC', 'Kopio:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Lyhennä lainattua tekstiä');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Lyhennä lainattua tekstiä 2/3 osaan suurimmasta tekstin pituudesta jos tämä ylittää rajan.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Saapuneet viestit ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Viimeisimmät ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' viestiä');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Tila');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Lähettäjä');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Viesti');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Ei saapuneita');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Ei oikeuksia roskakoriin.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Rajoita roskakorin pääsyoikeuksia');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Voit rajoittaa roskakoriin pääsevien oikeuksia. Yleensä roskakori on saatavilla kaikille (<i>ei rajoituksia</i>). Voit rajoittaa pääsyn erikoiskäyttäjille tai ylläpidolle vain, täten alemman tason käyttäjillä ei ole oikeuksia palauttaa viestejä.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'ei rajoituksia');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'erikoiskäyttäjät');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'vain ylläpitäjät');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Piiloita käyttäjät käyttäjälistalta');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Kirjoita käyttäjä ID:t, jotka piiloitetaan julkiselta käyttäjälistalta (esim. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Piiloita käyttäjät käyttäjälistalta');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Kirjoita käyttäjä ID:t, jotka piiloitetaan käyttäjälistalta (esim. 65,66,67).');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF hyökkäys havaittu');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF suojaus');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Tämä suojaa kaikilta forms against Cross-Site Request Forgery hyökkäyksiltä. Yleensä tämä tulee olla päällä. Vain jos sinulla on kummallisia ongelmia käännä se pois päältä.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Et voi vastata arkistoituihin viesteihin.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Rekisteröitymättömät käyttäjät eivät voi pyytää muistutusta vastauksiin.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Salli vastaukset');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Salli rekisteröitymättömien käyttäjien vastata viesteihin.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Hei %you%, käyttäjä %user% on lähettänyt sinulle seuraavanlaisen yksityisviestin sivustolta %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Näytä nimi');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Näytä nimi tai käyttäjätunnus julkisivulla?');
DEFINE ('_UDDEIM_USERLIST', 'Käyttäjälista');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Sinun taytyy odottaa, ennenkuin lähetät uuden viestin');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Viimeksi lähetetty');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Aikaviive');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Aika sekuntteina ennenkuin käyttäjä voi lähettää uuden viestin (0 jolloin ei ole viivettä).');
DEFINE ('_UDDEADM_SECONDS', 'sekunttia');
DEFINE ('_UDDEIM_PUBLICSENT', 'Viesti lähetetty.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Virhe lähettäjän nimess');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Virhe sähköpostiosoitteessa');
DEFINE ('_UDDEIM_YOURNAME', 'Nimi:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Sähköpostiosoite:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Käytät uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Käytät jo viimeisintä versiota uddeIM:stä.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Nykyinen versio on ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Päivitys tiedot:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Tarkista päivitykset');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Nämä yhteystiedot uddeIM valmistajan sivustoon näyttävät tiedot nykyisestä uddeIM versiosta. Poikkeuksena uddeIM versio jota käytät, muita tietoja ei toimiteta.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'TARKISTA NYT');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Ei saada versio tietoja.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Yhteystietolistaa ei löydy');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Suurin sallittu vastaanottajien määrä (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Max. viestien määrä');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Max. sallittu viestien määrä yhteystietolistaa kohden.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Yhteystietolistat eivät ole käytettävissä');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Salli yhteystietolistat');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM sallii käyttäjien luoda yhteystietolistoja. Näitä listoja voidaan käyttää, kun halutaan lähettää viesti usealle käyttäjälle. Älä unohda sallia ryhmälähetystä, kun haluat käyttää yhteystietolistoja.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'ei käytössä');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'rekisteröityneet käyttäjät');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'erikoiskäyttäjät');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'vain ylläpito');
DEFINE ('_UDDEIM_LISTSNEW', 'Luo uusi yhteystietolista');
DEFINE ('_UDDEIM_LISTSSAVED', 'Yhteystietolista tallennettu');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Yhteystietolista päivitetty');
DEFINE ('_UDDEIM_LISTSDESC', 'Kuvaus');
DEFINE ('_UDDEIM_LISTSNAME', 'Nimi');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Nimi (ilman välejä)');
DEFINE ('_UDDEIM_EDITLINK', 'muokkaa');
DEFINE ('_UDDEIM_LISTS', 'Yhteydet');
DEFINE ('_UDDEIM_STATUS_READ', 'luettu');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'lukematon');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'paikalla');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'poissa');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Näytä CB gallerian kuvat');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Oletuksena uddeIM näyttää vain hahmo kuvakkeet, jotka käyttäjät ovat ladanneet. Kun sallit tämän asetuksen uddeIM näyttää myös kuvat CB hahmokuvake galleriasta.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Hyväksy CB yhteydet');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Voit sallia viestit vastaanottajilta kun rekisteröitynyt käyttäjä on vastaanottajana CB yhteyden listassa (vaikka vastaanottaja olisi estetyssä ryhmässä). Tämä asetus on yksilöllinen induviaalinen esto käyttäjille jotka voivat tehdä asetuksia kun tämä on sallittu (katso ylläolevat asetukset).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Et voi lähettää tähän ryhmään.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Vastaanottaja on estänyt sinut.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Estetyt ryhmät (rekisteröityneet käyttäjät)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Ryhmät joihin rekisteröityneellä käyttäjällä ei ole oikeuksia lähettää viestejä. Tämä on vain rekisteröityneille käyttäjille. Asetus ei vaikuta erikoiskäyttäjiin ja ylläpitäjiin. Tämä asetus on yksilöllinen induviaalinen esto, käyttäjät voivat tehdä asetuksia kun tämä on sallittu (katso ylläolevat asetukset).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Estetyt ryhmät (julkiset käyttäjät)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Ryhmät joihin julkisella käyttäjällä ei ole oikeuksia lähettää. Tämä asetus on yksilöllinen induviaalinen esto käyttäjille jotka voivat tehdä asetuksia kun tämä on sallittu (katso ylläolevat asetukset). Kun estät ryhmän, käyttäjä tässä ryhmässä ei voi nähdä valintaa, salliakseen julkiselle etusivulle heidän profiili asetuksiaan.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Julkinen käyttäjä');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB yhteys');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Rekisteröitynyt');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Kirjoittaja');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Muokkaaja');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Julkaisija');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Järjestäjä');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Ylläpitäjä');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'Pääylläpitäjä');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Käyttäjä hyväksyy viestin vain rekisteröityneeltä käyttäjältä.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Piilota julkiselta "Kaikki käyttäjät" -listalta');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Voit piilottaa ryhmiä, jotka on listattuna julkisesti "Kaikki käyttäjät" listaan Huomaa: tämä piilottaa vain nimet, käyttäjät voivat silti vastaanottaa viestejä. Käyttäjät joita ei ole sallittu julkiselle etusille, eivät ole koskaan listattuna tähän listaan.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Piilota "Kaikki käyttäjät" listalta');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Voit piilottaa ryhmiä, jotka on listattuna "Kaikki käyttäjät" listaan. Huomaa: tämä piilottaa vain nimet, käyttäjät voivat silti vastaanottaa viestejä.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'ei mitään');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'vain super ylläpitäjät');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'vain ylläpitäjät');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'erikois käyttäjät');
DEFINE ('_UDDEADM_PUBLIC', 'Julkinen');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', '"Kaikki käyttäjät" linkin käyttäytyminen');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Valitse jos "Kaikki käyttäjät" linkki pitää olla julkisella etusivulla nähtävillä tai jos aina kaikki käyttäjät pitää nähdä.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Julkinen etusivu');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- valitse julkinen -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Salli julkisten käyttäjien lähettää viesti');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Viestin pituus raja.');
DEFINE ('_UDDEIM_PUBLICUSER', 'Julkinen käyttäjä');
DEFINE ('_UDDEIM_DELETEDUSER', 'Käyttäjä poistettu');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha pituus');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Määrittele kuinka monta merkkiä käyttäjän täytyy kirjoittaa.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam suojaus');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Määrittele kenen täytyy kirjoittaa captcha kun lähettävät viestiä');
DEFINE ('_UDDEADM_CAPTCHAF0', 'ei käytössä');
DEFINE ('_UDDEADM_CAPTCHAF1', 'vain julkiset käyttäjät');
DEFINE ('_UDDEADM_CAPTCHAF2', 'julkiset ja rekisteröityneet käyttäjät');
DEFINE ('_UDDEADM_CAPTCHAF3', 'julkiset, rekisteröityneet ja erikois käyttäjät');
DEFINE ('_UDDEADM_CAPTCHAF4', 'kaikki käyttäjät (sisältää ylläpitäjät)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Salli julkinen etusivu');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Kun sallit julkisten käyttäjien viestien lähettämisen rekisteröityneille käyttäjillesi (nämä voivat nähdä henkilökohtaiset asetukset jos he haluavat käyttää niitä jatkossa).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Oletuksena julkinen etusivu');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Tämä on oletusarvo, jos julkiset käyttäjät voivat lähettää viestejä rekisteröityneille käyttäjille.');
DEFINE ('_UDDEADM_PUBDEF0', 'ei käytössä');
DEFINE ('_UDDEADM_PUBDEF1', 'käytössä');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Väärä turvakoodi');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'ei mitään tai tuntematon');
DEFINE ('_UDDEADM_DONATE', 'Jos pidät uddeIM:stä ja haluat tukea kehitystä niin tee pieni lahjoitus valmistajalle.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Asetukset löytyivät tietokannasta: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Varmuuskopio ja palautus asetukset');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Voit varmuuskopioida asetuksesi tietokantaan ja palauttaa ne tarvittaessasi. Tämä on käytännöllinen kun päivität uddeIm:iä tai kun haluat tallentaa niitä testausta varten.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'VARMUUSKOPIO');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'PALAUTUS');
DEFINE ('_UDDEADM_CANCEL', 'Peru');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Kielitiedoston merkistö asetus');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Tavallisesti <b>oletus</b> (ISO-8859-1) on oikea asetus Joomla! 1.0:lle ja <b>UTF-8</b> Joomla! 1.5:lle.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'oletus');
DEFINE ('_UDDEIM_READ_INFO_1', 'Luetut viestit säilyvät saapuneet-kansiossa ');
DEFINE ('_UDDEIM_READ_INFO_2', ' päivää korkeintaan ennenkuin ne poistetaan automaattisesti.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Lukemattomat viestit säilyvät saapuneet-kansiossa ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' päivää korkeintaan ennenkuin ne poistetaan automaattisesti.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Lähetetyt viestit säilyvät lähetetyt-kansiossa ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' päivää korkeintaan ennenkuin ne poistetaan automaattisesti.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Näytä saapuneet-kansiossa ilmoitus luetuista viesteistä');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Näytä saapuneet-kansiossa ilmoitus <i>"Luetut viestit poistetaan x päivän jälkeen"</i>');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Näytä saapuneet-kansiossa ilmoitus lukemattomista viesteistä');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Näytä saapuneet-kansiossa ilmoitus <i>"Lukemattomat viestit poistetaan x päivän jälkeen"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Näytä lähetetyt-kansiossa ilmoitus lähetetyistä viesteistä');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Näytä lähetetyt-kansiossa ilmoitus <i>"Lähetetyt viestit poistetaan x päivän jälkeen"</i>');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Näytä roskakori-kansiossa ilmoitus poistetuista viesteistä');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Näytä roskakori-kansiossa ilmoitus <i>"Poistetut viestit puhdistetaan x päivän jälkeen"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Lähetetyt viestit säilytetään (päivää)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Kirjoita päivien määrä jonka jälkeen <b>lähetetyt</b> viestit poistetaan automaattisesti lähetetyt-kansiosta.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'lähetä kaikille erikoiskäyttäjille (special users)');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Viesti <b>kaikille erikoiskäyttäjille</b>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- valitse käyttäjätunnus -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- valitse nimi -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Muokkaa käyttäjäasetuksia');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'käytössä');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'ei käytössä');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- valitse viesti -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- valitse ilmoitus -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- valitse ponnahdusikkuna -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Käyttäjätunnus');
DEFINE ('_UDDEADM_USERSET_NAME', 'Nimi');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Ilmoitus');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Ponnahdusikkuna');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Viimeksi kirjautunut');
DEFINE ('_UDDEADM_USERSET_NO', 'Ei');
DEFINE ('_UDDEADM_USERSET_YES', 'Kyllä');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'tuntematon');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Kun ei paikalla (paitsi vastaukset)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Aina (paitsi vastaukset)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Kun ei paikalla');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Aina');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Ei ilmoituksia');
DEFINE ('_UDDEADM_WELCOMEMSG', "Tervetuloa uddeIM:iin!\n\nOlet onnistuneesti asentanut uddeIM:n.\n\nKatso tätä viestiä eri sivupohjilla. Voit asettaa ne uddeIM ylläpidosta.\n\nuddeIM projekti on kehityksessä. Jos löydät virheitä tai heikkouksia, kirjoita niistä valmistajalle, jolloin voimme tehdä uddeIM:stä vieläkin paremman yhdessä.\n\nOnnea ja pidä hauskaa!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM asennus suoritettu.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Jatka ylläpitopuolelle katsomaan/tarkastamaan asetuksia.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Jos CMS:ssä käyttää muuta merkistöä kuin ISO 8859-1 niin pidä huoli että muutat asetukset sen mukaisiksi.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Asennuksen jälkeen, kaikki sähköposti liikenne uddeIM:stä (sähköposti-ilmoitukset, fotgetmenot emails) on pois käytöstä siihen asti kun olet testaillut. Älä unohda poistaa/julkaista asetusta ottaessasi julkiseen käyttöön "Pysäytä sähköpostit nyt/Stop email now" kun olet tehnyt testauksesi valmiiksi.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. vastaanottajat');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Max. määrä vastaanottajia joita voi olla per viesti');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'liian monta vastaanottajaa');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Sähköpostien lähetys estetty.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Sisällytä teksti hakuun');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Täydennä haut tekstin sisälle (muussa tapauksessa haetaan vain sanan alusta)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', '"Kaikki käyttäjät" linkin toiminta');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Valitse jos "Kaikki käyttäjät" linkin toiminta pitää estää, näyttää tai jos kaikki käyttäjät näytetään aina.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Älä näytä "Kaikki käyttäjät" linkkiä');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Näytä "Kaikki käyttäjät" linkki'); 
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Näytä aina kaikki käyttäjät'); 
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Asetustiedosto ei ole kirjoitettavissa:'); 
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Asetustiedosto on kirjoitettavissa:'); 
DEFINE ('_UDDEIM_FORWARDLINK', 'jatkolähetä'); 
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'vastaanottaja löytyi'); 
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'vastaanottajat löytyivät'); 
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail'); 
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (oletus)'); 
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Sähköpostijärjestelmä'); 
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Valitse sähköpostijärjestelmä, jota uddeIM käyttää ilmoitusten lähettämiseen.'); 
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Näytä Joomla! ryhmät'); 
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Näytä Joomla! ryhmät yleisellä viestilistalla.'); 
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Viestien jatkolähetys'); 
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Salli viestien jatkolähetys.'); 
DEFINE ('_UDDEIM_FWDFROM', 'Lähettäjä:'); 
DEFINE ('_UDDEIM_FWDTO', 'Vastaanottaja:');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Poista viesti arkistosta');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Ei voitu poistaa viestiä arkistosta');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Salli ryhmälähetys');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Salli ryhmälähetys (erotetaan pilkulla).');
DEFINE ('_UDDEIM_CHARSLEFT', 'merkkiä jäljellä');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Näytä tekstilaskuri');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Näyttää laskurin, joka kertoo kuinka monta merkkiä on jäljellä.');
DEFINE ('_UDDEIM_CLEAR', 'Tyhjennä');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Lisää valitut käyttäjät vastaanottajiksi');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Sallii vastaanottajien valinnan "Kaikki käyttäjät" -listasta.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Lisää valitut yhteydet vastaanottajiin');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Sallii vastaanottajien valinnan "CB yhteydet" listasta.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS löydetty: ');
DEFINE ('_UDDEIM_ENTERNAME', 'anna nimi');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Käytä autocomplete-toimintoa');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Käytä autocomplete-toimintoa vastaanottajien nimien poimimiseen.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Avain, jota käytetään obfuscating-toimintoon');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Avain, jota käytetään obfuscating-toimintoon. Älä muuta arvoa sen jälkeen kun obfuscating-toiminto on otettu käyttöön.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Väärä confguration-tiedosto löydetty!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Löydetty versio:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Odotettu versio:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Muunnetaan asetukset...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Valmis');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Kriittinen virhe: configuration-tiedosto on kirjoitussuojattu:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Salattu viesti - Lataus ei ole mahdollista.');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Väärä salasana - Lataus ei ole mahdollista.');
DEFINE ('_UDDEIM_WRONGPW', 'Väärä salasana - Ota yhteyttä ylläpitoon.');
DEFINE ('_UDDEIM_WRONGPASS', 'Väärä salasana.');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Väärä poisto päiväys (saapuneet/lähetetyt): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Korjaa väärä poisto päiväys');
DEFINE ('_UDDEIM_TODP', 'Vastaanottaja: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Siivoa viestit');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Näytä toimintokuvakkeet');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Kun asetat <b>kyllä</b>, toimintolinkit näytetään kuvakkeina.');
DEFINE ('_UDDEIM_UNCHECKALL', 'poista valinnat');
DEFINE ('_UDDEIM_CHECKALL', 'valitse kaikki');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Näytä kuvakepainikkeet');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Kun asetat <b>kyllä</b>, painikelinkit näytetään kuvakkeina.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Käytä animoituja hymiöitä');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Käytä animoituja hymiöitä staattisten sijasta.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Lisää animoituja hymiöitä');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Näytä lisää animoituja hymiöitä.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Salattu viesti - Salasana vaaditaan');
DEFINE ('_UDDEIM_PASSWORD', '<b>Salasana vaaditaan</b>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Salasana');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (salakirjoitus)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (salakirjoituksen purku)');
DEFINE ('_UDDEIM_MORE', 'Lisää');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Yksityisviestit');
DEFINE ('_UDDEMODULE_NONEW', 'Ei uusia viestejä');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Uudet viestit: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'viesti');
DEFINE ('_UDDEMODULE_MESSAGES', 'viestiä');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Sinulla on');
DEFINE ('_UDDEMODULE_HELLO', 'Hei');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Express viesti');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Käytä salakirjoitusta');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Salakirjoita tallennetut viestit');
DEFINE ('_UDDEADM_CRYPT0', 'Ei mitään');
DEFINE ('_UDDEADM_CRYPT1', 'Obfuscate viestit');
DEFINE ('_UDDEADM_CRYPT2', 'Salakirjoita viestit');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Oletus sähköposti - ilmoitukselle');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Oletus asetus sähköposti - ilmoitukselle (käyttäjille jotka eivät ole vielä vaihtaneet heidän asetuksiaan).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Ei ilmoitusta');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Aina');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Ilmoitus kun sivusto on offline -tilassa');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Piilota "Kaikki käyttäjät" -linkki');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Piilottaa "Kaikki käyttäjät" -linkin kun kirjoitetaan uutta viestiä (hyödyllinen kun rekisteröityneitä käyttäjiä on paljon).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup ilmoitus');
DEFINE ('_UDDEADM_POPUP_EXP','Näytä ponnahdusikkuna kun uusi viesti lähetetään (korjaus mod_cblogin tarvitaan)');
DEFINE ('_UDDEIM_OPTIONS', 'Lisäasetukset');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Täällä voit määritellä joitain lisäasetuksia.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Näytä ponnahdusikkuna kun uusi viesti lähetetään');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Ponnahdusikkuna ilmoitus oletuksena');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Salli ponnahdusikkuna ilmoitus oletuksena (käyttäjille jotka eivät ole vielä vaihtaneet asetuksiaan).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Ylläpito');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Tietokannan ylläpito');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'TARKASTA');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'KORJAA');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Kun käyttäjä on poistettu tietokannasta, hänen viestinsä yleensä säilyvät tietokannassa. Tämä toiminto tarkistaa tarpeenvaatiessa roskat/jääneet viestit jotka voit poistaa jos se on sallittua.<br>Tämä tarkastaa myös tietokannan muutamilta virheiltä jotka tulee korjata.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Tarkistetaan...<br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Käyttäjänimi): [saapuneet|poistetut saapuneet|lähetetyt|poistetut lähetetyt]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>saapuneet: viestit on tallennettu käyttäjän saapuneet -kansioon</i><br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>saapuneet poistettu: viestit on poistettu käyttäjän saapuneet -kansiosta, mutta muutama on vielä lähetetyt -kansiossa</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>lähetetyt: viestit on tallennettu käyttäjän lähetetyt -kansioon</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>lähetetyt poistettu: viestit on poistettu käyttäjän lähetetyt -kansiosta, mutta muutama on vielä saapuneet -kansiossa</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Poistetaan...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "ei löytynyt (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "poista kaikki preferenssit käyttäjältä");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "poista käyttäjän estot");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "poista kaikki poistetulle käyttäjälle lähetetyt viestit lähettäjän(t) lähetetyistä ja poistetut käyttäjän(t) saapuneet -kansiossa");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "poista kaikki poistetun käyttäjän lähettämät viestit lähetetyistä vastaanotetuista saapuneet -kansiossa");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Ei tehtäviä</b><br>');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Ylläpito vaatimukset</b><br>');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Näytä oikea nimi');
DEFINE ('_UDDEADM_NAMESDESC', 'Näytä oikea nimi tai käyttäjätunnus?');
DEFINE ('_UDDEADM_REALNAMES', 'Oikea nimi');
DEFINE ('_UDDEADM_USERNAMES', 'Käyttäjätunnus');
DEFINE ('_UDDEADM_CONLISTBOX', 'Yhteyslistaus');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Näytä yhteyteni listauksena tai taulukkona?');
DEFINE ('_UDDEADM_LISTBOX', 'Listaus');
DEFINE ('_UDDEADM_TABLE', 'Taulukko');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Viestit säilyvät roskakorissa 24h ennen kuin ne poistetaan. Näet vain viestien ensimmäiset sanat. Palauta viesti kun haluat lukea sen kokonaan.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Viestejä säilytetään roskakorissa ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' tuntia ennen kuin ne poistetaan. Näet ainoastaan viestin ensimmäiset sanat. Jos haluat lukea sen kokonaan, tulee viesti palauttaa ensin.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Viestin lähetys on peruttu. Voit muokata viestiä ja lähettää sen uudelleen tai perua viestin kokonaan.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Viestiä ei löydy. Luultavasti se on luettu tai poistettu.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Viestin palauttaminen ei onnistunut. Voi olla että se on jo poistunut roskakorista.');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Viestin palauttaminen ei onnistunut.');
DEFINE ('_UDDEIM_DONTSEND', 'Älä lähetä');
DEFINE ('_UDDEIM_SENDAGAIN', 'Lähetä uudelleen');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Et ole kirjautunut.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<b>Saapuneet-kansiossa ei ole uusia viestejä.</b>'); 

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<b>Lähetetyt-kansiossa ei ole viestejä.</b>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<b>Roskakorissa ei ole viestejä.</b>');
DEFINE ('_UDDEIM_INBOX', 'Saapuneet');
DEFINE ('_UDDEIM_OUTBOX', 'Lähetetyt');
DEFINE ('_UDDEIM_TRASHCAN', 'Roskakori');
DEFINE ('_UDDEIM_CREATE', 'Uusi viesti');
DEFINE ('_UDDEIM_UDDEIM', 'Yksityisviestit');
DEFINE ('_UDDEIM_READSTATUS', 'Lue');
DEFINE ('_UDDEIM_FROM', 'Lähettäjä');
DEFINE ('_UDDEIM_FROM_SMALL', 'lähettäjä');
DEFINE ('_UDDEIM_TO', 'Vastaanottaja');
DEFINE ('_UDDEIM_TO_SMALL', 'vastaanottaja');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Lähetetyt-kansio sisältää kaikki lähettämäsi viestit joita ei vielä ole poistettu. Voit perua viestin jos sitä ei vielä ole luettu. Jos perut viestin, vastaanottaja ei voi sitä lukea. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'peru lähetys');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Peru viestin lähetys');
DEFINE ('_UDDEIM_RESTORE', 'palauta');
DEFINE ('_UDDEIM_MESSAGE', 'Viesti');
DEFINE ('_UDDEIM_DATE', 'Päiväys');
DEFINE ('_UDDEIM_DELETED', 'Poistettu');
DEFINE ('_UDDEIM_DELETE', 'poista');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'poista');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Viestiä ei voida esittää. <br>Mahdolliset syyt:<ul><li>Sinulla ei ole oikeuksia viestin lukemiseen</li><li>Viesti on poistettu</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Olet siirtänyt viestin roskakoriin.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Viestin lähettäjä ');
DEFINE ('_UDDEIM_MESSAGETO', 'Viesti käyttäjälle ');
DEFINE ('_UDDEIM_REPLY', 'Vastaa');
DEFINE ('_UDDEIM_SUBMIT', 'Lähetä');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Siirrä alkuperäinen viesti roskakoriin vastauksen jälkeen');
DEFINE ('_UDDEIM_NOID', 'Virhe: Vastaanottajan tunnusta ei löydetty. Viestiä ei lähetetty.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Virhe: Viesti ei sisällä tekstiä! Viestiä ei lähetetty.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Vastaus on lähetetty');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Viesti on lähetetty');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' ja alkuperäinen viesti siirretty roskakoriin');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Käyttäjätunnusta ei löydy.');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Et voi lähettää viestejä itsellesi!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Käyttöoikeusvirhe!</b> Käyttöoikeutesi eivät riitä toiminnon suorittamiseen.');
DEFINE ('_UDDEIM_PRUNELINK', 'Vain ylläpitäjät: siivoa');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM ylläpito');
DEFINE ('_UDDEADM_GENERAL', 'Yleistä');
DEFINE ('_UDDEADM_ABOUT', 'Tietoja');
DEFINE ('_UDDEADM_DATESETTINGS', 'Päiväys');
DEFINE ('_UDDEADM_PICSETTINGS', 'Kuvakkeet');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Luetut viestit säilytetään (päivää)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Viestejä joita ei ole luettu säilytetään (päivää)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Roskakorissa viestejä säilytetään (päivää)');
DEFINE ('_UDDEADM_DAYS', 'päivää');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Anna päivien määrä jonka jälkeen <b>luetut</b> viestit poistetaan saapuneet-kansiosta. Jos et halua poistaa viestejä automaattisesti anna suuri arvo(esim. 36524 päivää on 100 vuotta). Huomaa kuitenkin että tietokanta voi täyttyä nopeasti jos säilytät kaikki viestit.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Anna päivien määrä jonka jälkeen <b>viestit joita ei ole luettu</b> poistetaan.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Anna päivien määrä jonka jälkeen viestit poistetaan roskakorista. Alle 1:n olevat arvot hyväksytään. Esimerkki: kun haluat poistaa viestit roskakorista kolmen tunnin jälkeen, anna arvoksi 0.125.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Päiväyksen muoto');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Valitse näytettävä päiväysmuoto. Kuukaudet lyhennetään Joomlan/Mambon valitun kieliasetusten mukaan jos kieliasetusta vastaava uddeIM kielitiedosto on asennettu.');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Pitkän päiväyksen esitysmuoto');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Viestejä näytettäessä on päiväyksen esittämiselle enemmän tilaa. Valitse haluttu päiväysmuoto. Viikonpäivien ja kuukausien kohdalla käytetään Joomlan/Mambon valittua kieliasetusta jos kieliasetusta vastaava uddeIM -kielitiedosto on asennettu.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Vain ylläpitäjä voi poistaa');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'kyllä, vain ylläpidon toimesta');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'ei, kenen tahansa käyttäjän toimesta');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manuaalisesti');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automaattinen viestien poistaminen kuormittaa palvelimia ja tietokantoja paljon. Jos valitset <i>kyllä,&nbsp;vain&nbsp;ylläpidon&nbsp;toimesta</i> asetusten mukaisesti tapahtuva viestien poistaminen (koskee kaikkia käyttäjiä) tapahtuu vain kun ylläpitäjä tarkistaa saapuneet-kansionsa. Valitse tämä jos ylläpitäjä (tai kuka tahansa ylläpitäjistä) tarkistaa saapuneet-kansionsa kerran päivässä tai useammin. Näin tapahtuu useimmilla sivustoilla. Jos ylläpitäjät tarkistavat viestit harvoin valitse <i>ei,&nbsp;kenen&nbsp;tahansa&nbsp;käyttäjän toimesta</i>. Jos et tiedä mitä tällä ajetaan takaa tai tarkoitetaan valitse <b>ei, kenen tahansa käyttäjän toimesta</b>.');

	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Tallenna asetukset');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Seuraavat asetukset on tallennettu asetustiedostoon:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Asetukset tallennettu.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Kuvake: käyttäjä paikalla');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Anna kuvakkeen sijainti joka näytetään käyttäjätunnuksen vieressä kun käyttäjä on paikalla.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Kuvake: Käyttäjä ei paikalla');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Anna kuvakkeen sijainti joka näytetään käyttäjätunnuksen vieressä kun käyttäjä ei ole paikalla.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Kuvake: Lue viesti');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Anna kuvakkeen sijainti jonka avulla esitetään luetut viestit.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Kuvake: Viesti jota ei ole luettu');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Anna kuvakkeen sijainti jonka avulla esitetään viestit joita ei ole luettu.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Moduuli: Uusien viestien kuvake');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Tämä asetus liittyy mod_uddeim_new moduliin. Anna kuvakkeen sijainti jonka moduli esittää kun uusia viestejä on.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM asennus');
DEFINE ('_UDDEADM_FINISHED', 'Asennus on valmis. Tervetuloa uddeIM:iin. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Community Builder -komponenttia ei ole asennettu. Et voi käyttää uddeIM:ä.</span><br><br>Haluat ehkä ladata <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'Jatka');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Viestejä on ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' myPMS-komponentissa. Haluatko tuoda ne uddeIM -komponenttiin?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'This will not alter the myPMS messages or your installation. They will be kept intact. You can safely import them into uddeIM, even if you consider to continue using myPMS. (You should save any changes you made to the settings first before running the import!) Any messages that are already in your uddeIM database will remain intact.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Tuo myPMS-viestit uddeIM-komponenttiin');
DEFINE ('_UDDEADM_IMPORT_NO', 'Ei, älä tuo viestejä');  
DEFINE ('_UDDEADM_IMPORTING', 'Odota kunnes viestit tuodaan.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Done importing messages from myPMS. Do not run this installation script again because doing so will import the messages again and they will show up twice.'); 
DEFINE ('_UDDEADM_IMPORT', 'Tuo');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Tuo viestit myPMS-komponentista');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'myPMS-komponenttia ei löytetty. Viestejä ei voi tuoda.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Olet jo tuonut viestit myPMS-komponentista uddeIM-komponenttiin.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Estetty');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Ei lähetetty (käyttäjä on estänyt sinut)');
DEFINE ('_UDDEIM_BLOCKNOW', 'estä&nbsp;käyttäjä');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Olet estänyt seuraavat käyttäjät. Käyttäjät eivät voi lähettää yksityisviestejä sinulle.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Et ole estänyt käyttäjiä.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Sinut on estetty ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' käyttäjä(ä).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[poista esto]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Jos estetty käyttäjä yrittää lähettää sinulle viestiä , käyttäjä saa ilmoituksen että hänet on estetty ja että viestiä ei ole lähetetty.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Estetty käyttäjä ei voi tietää että olet estänyt hänet.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Et voi blokata ylläpitäjiä.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Salli esto');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Kun asetus voimassa käyttäjät voivat estää muita käyttäjiä. Estetty käyttäjä ei voi lähettää viestiä toiselle käyttäjälle joka on estänyt hänet. Ylläpitäjiä ei voida estää.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'kyllä');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'ei');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Estetty käyttäjä saa viestin');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Jos arvo on <b>kyllä</b>, estetylle käyttäjälle kerrotaan että viestiä ei olla lähetetty koska hänet on estetty. Jos asetus on <i>ei</i>, estettyä käyttäjää ei muistuteta siitä että viestiä ei lähetetty.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'kyllä');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'ei');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Esto ei ole käytössä');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Poistetut'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Estot');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integraatio');
DEFINE ('_UDDEADM_EMAIL', 'Sähköposti');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Näytä CB-linkit');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Kun asetus on <b>kyllä</b>, uddeIM-komponentissa näkyvät käyttäjänimet näytetään linkkeinä Community Builder profiileihin.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Näytä CB pikkukuva');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Kun asetus on <b>kyllä</b>, käyttäjän pikkukuva näytetään viestiä luettaessa (jos sellainen on Community Builder profiilissa).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Näytä online tila');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Kun asetus on <b>kyllä</b>, uddeIM näyttää käyttäjänimien vieressä pienen kuvakkeen joka kertoo onko käyttäjä online vai ei. Voit valita kuvakkeet ylläpitoliittymän kuvakkeet-kohdassa.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Salli sähköpostimuistutukset');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Kun asetus on <b>kyllä</b>, jokainen käyttäjä voi valita haluaako hän saada sähköpostin aina kun hän saa uuden yksityisviestin.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'Sähköposti sisältää viestin');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Kun asetus on <b>ei</b>, niin viesti sisältää vain tiedot sähköpostin lähettämis ajankohdasta ja lähettäjästä, mutta ei itse viestiä.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Älä unohda minua -viesti');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Toiminto lähettää riippumatta käyttäjän asetuksista - sähköpostin käyttäjälle jolla on vanhoja ei-luettuja viestejä saapuneet-kansiossa. Asetus ei ole riippuvainen yllä olevasta \'salli sähköpostimuistutus\' asetuksesta. Jos et halua lähettää sähköpostimuistutuksia koskaan, tulee kummankin asetuksen olla pois päältä.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Älä unohda minua -viesti lähetään päivän jälkeen');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Jos Älä unohda minua -toiminto on <b>kyllä</b>, määrittele tässä kuinka monen päivän jälkeen lähetetään muistutusviesti siitä kun viestejä ei ole luettu.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Montako merkkiä viestistä näytetään');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Voit määritellä kuinka monta merkkiä viestistä näytetään saapuneet-kansiossa, lähteneet-kansiossa ja roskakorissa.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Viestin suurin sallittu pituus');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Aseta viestin suurin sallittu pituus. Viesti katkaistaan määritellyn merkkimäärän jälkeen. Asetus \'0\' ei rajoita viestin pituutta, tämä ei kuitenkaan ole suositeltavaa.');
DEFINE ('_UDDEADM_YES', 'kyllä');
DEFINE ('_UDDEADM_NO', 'ei');
DEFINE ('_UDDEADM_ADMINSONLY', 'vain ylläpitäjät');
DEFINE ('_UDDEADM_SYSTEM', 'Järjestelmä');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Järjestelmäviestien käyttäjänimi');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM tukee järjestelmäviestejä. Lähettäjän nimeä ei näy eivätkä käyttäjät voi vastata niihin. Anna järjestelmäviestien lähettäjän kutsumanimi (esimerkiksi <b>Tuki</b> tai <b>Help desk</b> tai <b>Community Master</b>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Sallii ylläpitäjien lähettävän yleisiä viestejä');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM tukee yleisiä viestejä. Ne lähetetään järjestelmän jokaiselle käyttäjälle. Käytä toimintoa säästeliäästi.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Lähettäjän nimi');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Anna sähköpostimuistutusten lähettäjän tunniste (esimerkiksi <b>Sivustosi nimi</b> tai <b>Viesti palvelu</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Lähettäjän osoite');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Anna sähköpostimuistutusten lähettäjän osoite (tämän tulisi olla sama kuin sivuston yhteydenottoa varten käytetty osoite).');
DEFINE ('_UDDEADM_VERSION', 'uddeIM versio');
DEFINE ('_UDDEADM_ARCHIVE', 'Arkisto'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Salli arkistointi');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Sallitaanko käyttäjien tallentavan viestejä arkistoon. Arkistoituja viestejä ei poisteta.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Viestien suurin sallittu määrä arkistossa');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Määrittää kuinka monta viestiä käyttäjät voivat tallentaa arkistoon (ylläpitäjillä ei rajoitusta).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Salli kopioit itselle');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Sallii käyttäjien vastaanottavan kopion lähetetyistä viesteistä. Kopiot näkyvät saapuneet-kansiossa.');
DEFINE ('_UDDEADM_MESSAGES', 'Viestit');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Ehdota alkuperäisen siirtämistä roskakoriin');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Kun asetus voimassa on valinta  \'Lähetä\' painikkeen vieressä oleva \'poista alkuperäinen\' oletusarvoisesti valittuna. Viesti siirretään tällöin saapuneet-kansiosta roskakoriin kun vastaus on lähetetty. Toiminto auttaa pitämään tietokannassa olevien viestien määrää pienempänä. Käyttäjät voivat aina poistaa valinnan jos he haluavat säilyttää viestin saapuneet-kansiossa.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Viestejä sivulla');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Määrittele sivulla näytettävien viestin määrä saapuneet- ja lähteneet-kansiossa, roskakorissa ja arkistossa.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Käytetty merkistö');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Jos huomaat vaikeuksia käytössä olevan merkistön esittämisessä voit määritellä merkistön jota uddeIM-komponentti käyttää muuntaessaan tietokannan HTML-koodin täällä. <b>Jos et tiedä mitä tällä ajetaan takaa älä muuta oletusasetusta.</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Käytössä oleva merkistö');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Jos huomaat vaikeuksia käytössä olevan merkistön esittämisessä voit määritellä uddeIM-komponentin käyttämän merkistön. Sitä käytetään sähköpostin lähettämisessä. <b>Jos et tiedä mitä tällä ajetaan takaa älä muuta oletusasetusta.</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Käyttäjien saaman sähköpostin muoto jonka he saavat kun alla oleva valinta on valittu. Yksityisviestin sisältö ei ole sähköpostin mukana. Säilytä muuttujat %you%, %user% ja %site% ennallaan. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Käyttäjien saaman sähköpostin muoto jonka he saavat kun alla oleva valinta on valittu. Yksityisviestin sisältö on sähköpostin mukana. Säilytä muuttujat %you%, %user%, %pmessage% ja %site% ennallaan. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Käyttäjien saaman älä unohda minua -sähköpostin muoto jonka he saavat kun alla oleva valinta on valittu. Säilytä muuttujat %you% ja %site% ennallaan. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Sallii käyttäjien lataavan arkistossa olevat yksityisviestit lähettämällä sähköpostia itselleen.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Salli viestien lataaminen');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Käyttäjien saaman sähköpostin muoto jonka he saavat ladatessaan omat yksityisviestinsä arkistosta. Säilytä muuttujat %user%, %msgdate% ja %msgbody% ennallaan. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Saapuneet-kansion koko');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Voit sisällyttää saapuneet-kansiossa olevien viestin määrän mukaan arkistoitujen viestien suurimpaan sallittuun määrän. Tässä tapauksessa saapuneet-kansiossa ja arkistossa olevien viestin yhteismäärä ei saa ylittää suurinta sallittua viestien määrää. Voit myös asettaa rajoituksen saapuneet-kansiolle ilman arkistoa. Tässä tapauksessa käyttäjillä voi olla saapuneet-kansiossa viestejä enintään se määrä joka on yllä määritelty. Jos määrä ylitetään, käyttäjät eivät voi enää vastata viesteihin tai luoda uusia ennen kuin poistavat vanhoja viestejä saapuneet-kansiosta (viestin vastaanottaminen ja niiden lukeminen on kuitenkin edelleen mahdollista).');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Näytä saapuneet-kansion käytetty tila');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Näyttää kuinka monta viestiä käyttäjät ovat tallentaneet (ja kuinka monta sallitaan) saapuneet-kansion alapuolella.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Arkistointi on pois päältä. Mitä tehdään nykyisille arkistoiduille viesteille?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Jätä ne');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Jätä ne arkistoon (käyttäjä ei voi käyttää niitä ja ne silti huomioidaan laskettaessa suurinta sallittua viestimäärää).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Siirrä saapuneet-kansioon');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Arkistoidut viestit siirretty saapuneet-kansioon');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Viestit siirretään käyttäjän saapuneet-kansioon (tai roskalaatikkoon jos ne ovat vanhempia kuin saapuneet-kansiossa sallitaan).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'voimassa ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' tuntia. 0=aina (automaattiset poistosäännöt ovat voimassa)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Luo yleinen- tai järjestelmäviesti]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Luo normaali viesti]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Järjestelmä- ja yleisiä viestejä ei sallita.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Viestin tyyppi');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Järjestelmäviestien ohje');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(avaa uuden ikkunan)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Olet lähettämässä alla näkyvää viestiä. Tarkista vielä viestin sisältö se ja vahvista tai peru.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Viesti <b>kaikille käyttäjille</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Viesti <b>ylläpitäjille</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Viesti <b>kirjautuneille käyttäjille</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Vastaanottajat eivät pysty vastaamaan viestiin.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Viesti lähetetään <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> käyttäjänimenä');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Viesti vanhenee ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Viesti ei vanhene');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Napsauta linkkiä ennen kuin jatkat</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Käyttö <b>vain järjestelmäviesteihin</b>:<br> [b]<b>bold</b>[/b] [i]<em>italic</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] tai [url]http://www.someurl.com[/url] ovat linkkejä');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Virhe: vastaanottajia ei löydetty, viestiä ei lähetetty.');		

DEFINE ('_UDDEIM_CANTREPLY', 'Et voi vastata tähän viestiin');
DEFINE ('_UDDEIM_EMNOFF', 'Sähköpostimuistus on pois päältä. ');
DEFINE ('_UDDEIM_EMNON', 'Sähköpostimuistus on päällä. ');
DEFINE ('_UDDEIM_SETEMNON', '[päälle]');
DEFINE ('_UDDEIM_SETEMNOFF', '[pois päältä]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Hei %you%, käyttäjä %user% on lähettänyt sinulle yksityisviestin sivustolta %site%. Kirjaudu sivustolle lukeaksesi viestin.");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Hei %you%, käyttäjä %user% on lähettänyt sinulle seuraavanlaisen yksityisviestin sivustolta %site%. Kirjaudu sivustolle vastataksesi viestiin.\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Hei %you%, sivustolla %site% on yksityisviestejä joita et ole lukenut. Kirjaudu sivustolle lukeaksesi ne.");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Sinulla on viestejä sivustolla %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'lähetä järjestelmäviesti (=vastaanottajat eivät voi vastata)');
DEFINE ('_UDDEIM_SEND_TOALL', 'lähetä kaikille käyttäjille');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'lähetä kaikille ylläpitäjille');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'lähetä kaikille online-käyttäjille');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Odottamaton virhe: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arkisto ei käytössä.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Viestien tallentaminen arkistoon epäonnistui.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Olet tallentanut ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>Arkistossa ei ole vielä viestäjä.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Sinulla ei ole viestejä arkistossa.</b>');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' viestiä');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Olet tallentanut yhden viestin');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Tallentaaksesi viestejä poista ensin vanhoja viestejä.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Voit tallentaa enintään ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' viestiä.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Sinulla on ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' viestiä');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' viesti'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arkistossa');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'saapuneet-kansiossa');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'saapuneet-kansiossa ja arkistossa');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Suurin sallittu määrä on ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Voit edelleen vastaanottaa ja lukea viestejä mutta et pysty vastaamaan tai lähettämään uusia viestejä ennen kuin poistat vanhoja viestejä.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Tallennettuja viestejä: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(suurin sallittu määrä. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Viesti tallennettu arkistoon.');
DEFINE ('_UDDEIM_STORE', 'arkistoon');             // translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'takaisin');
DEFINE ('_UDDEIM_TRASHCHECKED', 'poista valitut'); // translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'näytä kaikki');        // translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Arkisto');             // should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arkisto täynnä, ei tallennettu.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Viestejä ei valittu.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopio viestistä jonka vastaanottaja on ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'Tallenna kopio lähetettyjen kansioon');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopioi arkistoon');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'poista alkuperäinen');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Lataa viesti');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Sähköposti lähetetty jossa mukana yksityisviestit');
DEFINE ('_UDDEIM_EXPORT_NOW', 'sähköposti itselle');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Tämä sähköposti sisältää yksityisviestisi.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Viestit sisältää sähköpostia ei voitu lähettää.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Viestiraja ylitetty, viestiä ei palautettu.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Kirjoita viesti käyttäjälle ');

$udde_smon[1]="Tam";
$udde_smon[2]="Hel";
$udde_smon[3]="Maa";
$udde_smon[4]="Huh";
$udde_smon[5]="Tou";
$udde_smon[6]="Kes";
$udde_smon[7]="Hei";
$udde_smon[8]="Elo";
$udde_smon[9]="Syy";
$udde_smon[10]="Lok";
$udde_smon[11]="Mar";
$udde_smon[12]="Jou";

$udde_lmon[1]="Tammikuu";
$udde_lmon[2]="Helmikuu";
$udde_lmon[3]="Maaliskuu";
$udde_lmon[4]="Huhtikuu";
$udde_lmon[5]="Toukokuu";
$udde_lmon[6]="Kesäkuu";
$udde_lmon[7]="Heinäkuu";
$udde_lmon[8]="Elokuu";
$udde_lmon[9]="Syyskuu";
$udde_lmon[10]="Lokakuu";
$udde_lmon[11]="Marraskuu";
$udde_lmon[12]="Joulukuu";

$udde_lweekday[0]="Sunnuntai";
$udde_lweekday[1]="Maanantai";
$udde_lweekday[2]="Tiistai";
$udde_lweekday[3]="Keskiviikko";
$udde_lweekday[4]="Torstai";
$udde_lweekday[5]="Perjantai";
$udde_lweekday[6]="Lauantai";

$udde_sweekday[0]="Su";
$udde_sweekday[1]="Ma";
$udde_sweekday[2]="Ti";
$udde_sweekday[3]="Ke";
$udde_sweekday[4]="To";
$udde_sweekday[5]="Pe";
$udde_sweekday[6]="La";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM sivupohja');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Valitse sivupohja jonka haluat uddeIM käyttävän');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Näytä CB yhteydet');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Valitse <b>kyllä</b> jos sinulla on Community Builder asennettuna ja haluat näyttää käyttäjän nimen uuden viestin yhteydessä sivuilla.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Näytä asetukset');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Tämän asetuksen linkki syntyy uddeIM:n jos sinulla on sähköposti ilmoitukset tai esto systeemi päällä. Jos et halua tätä voit valita sen pois täältä. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'kyllä, alinmaisena');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Salli BB-koodit');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'vain fontti formaatteja');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Käytä <b>vain fontti formaatteja</b> salliaksesi käyttäjän käyttää BB-koodeja lihavointiin, kursivointiin, alleviivaukseen, fontin väriin ja kokoon. Kun valitset <b>kyllä</b>, käyttäjillä on mahdollisuus käyttää <b>kaikkia</b> BB koodeja heidän viesteissään (mm. linkit ja kuvat).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Salli hymiöt');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Kun valitset <b>kyllä</b>, hymiökoodit tyyliin :-) korvataan kuvallisilla hymiöillä viesteissä. Lue readme tiedostosta lista tuetuista hymiöistä.');
DEFINE ('_UDDEADM_DISPLAY', 'Näytä');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Näytä menu kuvakkeet');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Kun asetat <b>kyllä</b>, valikko- ja toiminto -linkit näkyvät kuvakkeiden kera.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Otsikko yksityisviesteille');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Kirjoita otsikko yksityisviestille joka lähetetään, esimerkiksi \'Yksityisviesti\'. Jätä tyhjäksi jos et halua näyttää oletus otsikkoa.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Näytä tietoja -linkki');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Valitse <b>kyllä</b> näyttääksesi linkin uddeIM ohjelman tiedot ja lisenssit. Tämä linkki näytetään uddeIM HTML ulostulossa alhaalla.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Pysäytä sähköpostit nyt');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Merkitse tämä estääksesi uddeIM:n lähettämästä sähköpostia (sähköposti-ilmoitukset ja suosikki sähköpostit) riippuen käyttäjän asetuksista, esimerkiksi kun testataan sivustoa.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB pikkukuvat listassa');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Valitse <b>kyllä</b> jos haluat näyttää CB pikkukuvat käyttäjälle viestin yleisesityksessä (saapuneet, lähetetyt, jne.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Näytä käyttäjät');
DEFINE ('_UDDEIM_CONNECTIONS', 'Yhteydet');
DEFINE ('_UDDEIM_SETTINGS', 'Asetukset');
DEFINE ('_UDDEIM_NOSETTINGS', 'Asetuksia ei ole asetettu.');
DEFINE ('_UDDEIM_ABOUT', 'Tietoa'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Uusi viesti'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Sähköposti-ilmoitus');
DEFINE ('_UDDEIM_EMN_EXP', 'Saat ilmoituksen sähköpostiisi uudesta yksityisviestistä.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Sähköposti-ilmoitus uusille viesteille');
DEFINE ('_UDDEIM_EMN_NONE', 'Ei sähköposti-ilmoitusta');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Sähköposti-ilmoitus kun ei ole paikalla');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Ei lähetetä ilmoitusta vastauksista');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Käyttäjä esto'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Voit estää käyttäjien lähettämästä viestejä sinulle blokkaamalla/estämällä heidät. Valitse <b>blokkaa käyttäjä</b> kun kyseessä on käyttäjä jonka viestejä et halua.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Tallenna muutokset');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB-koodit mahdollistaa lihavoidut kirjaimet. Käyttö: [b]Lihavointi[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB-koodit mahdollistaa kursivoidun tekstin. Käyttö: [i]Kursivointi[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB-koodit mahdollistaa alleviivatut kirjaimet. Käyttö: [u]Alleviivaus[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB-koodit mahdollistaa väritetyt kirjaimet. Käyttö: [color=#XXXXXX]Punainen[/color] tuohon jossa on XXXXXX  on hex-koodin paikka väristä jonka haluat, esimerkiksi punaisen hex-koodi on FF0000.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB-koodit mahdollistaa väritetyt kirjaimet. Käyttö: [color=#XXXXXX]Vihreä[/color] tuohon jossa on XXXXXX  on hex-koodin paikka väristä jonka haluat, esimerkiksi vihreän hex-koodi on 00FF00.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB-koodit mahdollistaa väritetyt kirjaimet. Käyttö: [color=#XXXXXX]Sininen[/color] tuohon jossa on XXXXXX  on hex-koodin paikka väristä jonka haluat, esimerkiksi sinisen hex-koodi on 0000FF.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB-koodit mahdollistaa erittäin pienet kirjaimet. Käyttö: [size=1]Erittäin pieni teksti.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB-koodit mahdollistaa pienet kirjaimet. Käyttö: [size=2] Pieni teksti.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB-koodit mahdollistaa isot kirjaimet. Käyttö: [size=4]Iso teksti.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB-koodit mahdollistaa erittäin isot kirjaimet. Käyttö: [size=5]Erittäin iso teksti.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB-koodi kuvalinkin lisäyksessä. Käyttö: [img]Kuva-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB-koodi hyperlinkin lisäyksessä. Käyttö: [url]Sivun osoite[/url]. Älä unohda http:// alkuliitettä joka tulee olla jokaisessa web-osoitteessa esim. http://www.joomlaportal.fi.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Sulje kaikki avoinna olevat BB-tagit.');
?>
