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
// Language file: German (informal) (source file is Latin-1)
// Translator:     Stephan Slabihoud <ssl@gmx.de>
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Lade MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Wie soll uddeIM MooTools laden (MooTools wird vom Autocompleter benötigt): <i>Nicht laden</i> ist nützlich, wenn die Template schon MooTools läd, <i>Auto</i> ist die empfohlene Standardeinstellung (gleiches Verhalten wie in uddeIM 1.2), wenn J1.0 verwendet wird, dann kann das Laden von MooTools 1.1 oder 1.2 erzwungen werden.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'MooTools nicht laden');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'Auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'erzwinge Laden von MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'erzwinge Laden von MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...Standardeinstellung für MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 kodiert');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Zeitzone anpassen');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Wenn uddeIM die falsche Uhrzeit anzeigt, dann kann die Zeitzone hiermit angepasst werden. Normalerweise, wenn alles korrekt konfiguriert wurde, sollte hier eine Null stehen. Trotzdem mag es Fälle geben, bei denen dieser Wert angepasst werden muss.');
DEFINE ('_UDDEADM_HOURS', 'Stunden');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Versionsinformation:');
DEFINE ('_UDDEADM_STATISTICS', 'Statistiken:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Zeige Statistiken');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Zeigt einige Statistiken, wie die Anzahl der gespeicherten Nachrichten, an.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'STATISTIKEN');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Gespeicherte Nachrichten in Datenbank: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Vom Empfänger gelöschte Nachrichten: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Vom Sender gelöschte Nachrichten: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Nachrichten, die demnächst entfernt werden: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Überschreibe Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Normalerweise versucht uddeIM die korrekte Itemid automatisch zu ermitteln, wenn diese nicht vorgegeben ist. In einigen Fällen ist es notwendig diesen Wert zu überschrieben, z.B. wenn mehrere Menü-Links zu uddeIM verwendet werden.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Die ermittelte Itemid ist: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Benutze Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Benutze diese Itemid anstelle der automatisch ermittelten.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Verwende Profil-Links');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Bei <b>Ja</b> werden alle Usernamen als Link zu einem Benutzerprofil angezeigt.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Zeige Vorschaubild');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Bei <b>Ja</b> wird das Vorschaubild aus dem Benutzerprofil angezeigt, wenn ein Benutzer eine Nachricht öffnet.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Zeige Bilder in Listen');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Auf <b>Ja</b> setzen, um Vorschaubilder auch in den Listen (Posteingang, Postausgang usw.) anzuzeigen.');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Deaktiviert');
DEFINE ('_UDDEADM_ENABLED', 'Aktiviert');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Wichtig');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Erlaube Markierungen');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Auf <b>Ja</b> setzen, damit wichtige Nachrichten markiert werden können (uudeIM zeigt einen Stern, der angeklickt werden kann).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Wichtig: Wenn du uddeIM auf eine neue Version aktualisiert hast, lies bitte unbedingt das README. Manchmal ändern sich einige Tabellen oder Felder in der Datenbank!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Füge CC: Zeile hinzu');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Zitierten Text kürzen');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Kürze den zitierten Text auf 2/3 der maximalen Textlänge, wenn diese überschritten wird.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Einträge im Posteingang: ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Letzten ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' Einträge');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Status');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Absender');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Nachricht');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Der Posteingang ist leer.');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Zugriff auf Papierkorb nicht erlaubt.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Zugriff auf Papierkorb beschränken');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Du kannst den Zugriff auf den Papierkorb beschränken. Normalerweise ist dieser für jeden verfügbar (<i>keine Beschränkung</i>). Eine Beschränkung ist auf spezielle Benutzer oder Admins möglich, so dass Gruppen mit geringeren Rechten keinen Nachrichten zurückrufen können.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'keine Beschränkung');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'spezielle Benutzer');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'nur Admins');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Verstecke Benutzer');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Gib hier die IDs der Benutzer an, die nicht in der öffentlichen "Alle Benutzer" Liste angezeigt werden sollen (z.B. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Verstecke Benutzer');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Gib hier die IDs der Benutzer an, die nicht in der "Alle Benutzer" Liste angezeigt werden sollen (z.B. 65,66,67). Admins bekommen immer die komplette Liste angezeigt.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF Angriff erkannt');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF Schutz');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Hiermit schützt du alle Formulare gegen Cross-Site Request Forgery Angriffe. Normalerweise sollte dieser Schutz aktiviert sein. Sollten erhebliche Probleme auftreten, dann kann dieser ausgeschaltet werden.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Auf archivierte Nachrichten kannst du nicht antworten.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Antworten an unregistrierte Benutzer können nicht zurückgerufen werden.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Antworten erlauben');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Erlaube Antworten auf Nachrichten von unregistrierten Benutztern.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Hallo %user%,\n\n%you% hat dir die folgende private Nachricht auf %site% geschickt.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Zeige Realnamen');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Zeige Realnamen oder Usernamen im Public Frontend?');
DEFINE ('_UDDEIM_USERLIST', 'Benutzerliste');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Du musst noch etwas warten vor dem nächsten Versandt');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Letzte Nachricht');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Wartezeit');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Zeit in Sekunden, die ein Anwender warten muss, bevor er eine weitere Nachricht versenden kann (0 für keine Wartezeit).');
DEFINE ('_UDDEADM_SECONDS', 'Sekunden');
DEFINE ('_UDDEIM_PUBLICSENT', 'Nachricht gesendet.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Fehler in Absender');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Fehler in E-Mail Adresse');
DEFINE ('_UDDEIM_YOURNAME', 'Dein Name:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Deine E-Mail:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Du verwendest uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Du hast bereits die aktuelle Version von uddeIM installiert.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Die aktuelle Version ist ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Update Informationen:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Prüfe auf Updates');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Hiermit kontaktierst du die uddeIM Entwicklerwebsite, um Informationen über die aktuelle Version zu erhalten. Außer der Versionsnummer werden keine weiteren persönlichen Daten übertragen.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'PRÜFEN');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Kann Versionsdaten nicht herunterladen.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Kontaktliste nicht vorhanden!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Maximale Anzahl von Empfängern erreicht (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Max. Kontakte pro Liste');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Max. Anzahl von Kontakten, die pro Liste erlaubt sind.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Kontaktlisten sind nicht freigegeben.');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Erlaube Kontaktlisten');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'In uddeIM können Benutzer Kontaktlisten anlegen, mit denen Nachrichten bequem an mehrere Empfänger gesendet werden können. Beachte: Es muss zusätzlich auch erlaubt sein, Nachrichten an mehrere Empfänger zu senden.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'gesperrt');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'alle registrierten Benutzer');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'nur spezielle Benutzer');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'nur Admins');
DEFINE ('_UDDEIM_LISTSNEW', 'Neue Kontaktliste anlegen');
DEFINE ('_UDDEIM_LISTSSAVED', 'Kontaktliste gespeichert');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Kontaktliste aktualisiert');
DEFINE ('_UDDEIM_LISTSDESC', 'Beschreibung');
DEFINE ('_UDDEIM_LISTSNAME', 'Name');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Name (ohne Leerzeichen)');
DEFINE ('_UDDEIM_EDITLINK', 'ändern');
DEFINE ('_UDDEIM_LISTS', 'Kontakte');
DEFINE ('_UDDEIM_STATUS_READ', 'gelesen');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'ungelesen');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'Online');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'Offline');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Zeige CB Avatare');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Standardmäßig zeigt uddeIM nur Avatare an, die Benutzer selbst hochgeladen haben. Wenn diese Option aktiviert wird, werden auch Avatare aus der CB Galerie angezeigt.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'CB Verbindungen freigeben');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Hiermit werden Nachrichten an Empfänger erlaubt, wenn diese sich in einer Gruppe befinden, die standardmäßig geblockt wird. Voraussetzung ist, dass der Sender auf der CB Verbindungsliste des Empfängers steht. Diese Einstellung ist unanhängig von individuellen Blockierungen, die jeder Benutzer selbst konfigurieren kann (siehe Einstellungen oben).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Du darfst an diese Gruppe nichts senden.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Der Empfänger blockiert dich.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blockierte Gruppen (registered users)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Gruppen, an die registrierte Benutzer (ohne spezielle Rechte) keine Nachrichten senden dürfen. Spezielle Benutzer und Admins werden von dieser Einstellung nicht betroffen. Diese Einstellung ist unanhängig von individuellen Blockierungen, die jeder Benutzer selbst konfigurieren kann (siehe Einstellungen oben).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blockierte Gruppen (public users)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Gruppen, an die unregistrierte Benutzer (<i>Public Users</i>) keine Nachrichten senden dürfen. Diese Einstellung ist unanhängig von individuellen Blockierungen, die jeder Benutzer selbst konfigurieren kann (siehe Einstellungen oben). Wenn eine Gruppe geblockt wird, bekommen deren Mitglieder in ihren Benutzereinstellungen die <i>Public Frontend</i> Option nicht angezeigt.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Public User');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB Verbindungen');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Registered User');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Author');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Benutzer aktzeptiert nur Nachrichten von registrierten Benutzern.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Verstecke von öffentlicher "Alle Benutzer" Liste');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Bestimmte Gruppen können von der <b>öffentlichen</b> "Alle Benutzer" Liste ausgenommen werden. Hinweis: Es werden nur die Namen nicht angezeigt, Nachrichten können dennoch gesendet werden. Benutzer, die das <i>Public Frontend</i> nicht aktiviert haben, werden grundsätzlich nicht angezeigt.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Verstecke von "Alle Benutzer" Liste');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Bestimmte Gruppen können von der "Alle Benutzer" Liste ausgenommen werden. Hinweis: Es werden nur die Namen nicht angezeigt, Nachrichten können dennoch gesendet werden.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'keine');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'nur SuperAdmins');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'nur Admins');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'spezielle Benutzer');
DEFINE ('_UDDEADM_PUBLIC', 'Public');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Verhalten des "Alle Benutzer" Links');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Soll der "Alle Benutzer" Link im <b>öffentlichen</b> Formular unterdrückt oder angezeigt werden oder sollen grundsätzlich alle Benutzer direkt angezeigt werden.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Public Frontend');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- Auswahl PublicF -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Erlaube unregistrierten Benutzern eine Nachricht zu senden.');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Nachrichtenlimit erreicht!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Public User');
DEFINE ('_UDDEIM_DELETEDUSER', 'Benutzer gelöscht');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha Länge');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Anzahl der Zeichen, die der Benutzer zur Kontrolle eingeben muss.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha Spam-Schutz');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Legt fest, wer ein Captcha eingeben muss.');
DEFINE ('_UDDEADM_CAPTCHAF0', 'gesperrt');
DEFINE ('_UDDEADM_CAPTCHAF1', 'nur unregistrierte Benutzer');
DEFINE ('_UDDEADM_CAPTCHAF2', 'unregistrierte und registrierte Benutzer');
DEFINE ('_UDDEADM_CAPTCHAF3', 'unreg., registrierte, spezielle Benutzer');
DEFINE ('_UDDEADM_CAPTCHAF4', 'Alle Benutzer (inkl. Admins)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Public Frontend freigeben');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Hiermit können unregistrierte Benutzer (<i>Public User</i>) Nachrichten an registrierte Benutzer senden (diese können in ihrem Profil festlegen, ob sie dieses Feature verwenden möchten).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Public Frontend Standard');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Soll das <i>Public Frontend</i> für neue Benutzer grundsätzlich gesperrt oder freigegeben sein?');
DEFINE ('_UDDEADM_PUBDEF0', 'gesperrt');
DEFINE ('_UDDEADM_PUBDEF1', 'freigegeben');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Falscher Sicherheitscode');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'keins oder unbekannt');
DEFINE ('_UDDEADM_DONATE', 'Wenn du uddeIM einsetzt und die weitere Entwicklung unterstützen möchtest, würde ich mich über eine kleine Spende freuen.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Gefundene Konfiguration in der Datenbank: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Sichern und Wiederherstellen der Konfiguration');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Hiermit kann die aktuelle Konfiguration in der Datenbank gesichert und auch wieder hergestellt werden. Das ist dann nützlich, wenn uddeIM aktualisiert werden soll oder wenn aufgrund von Tests die aktuelle Konfiguration vorübergehend gesichert werden soll.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'BACKUP');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RESTORE');
DEFINE ('_UDDEADM_CANCEL', 'Abbruch');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Verwendeter Zeichensatz (Sprachfile)');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Normalerweise ist <b>default</b> (i.d.R. ISO-8859-1) die korrekte Einstellung für Joomla 1.0 und <b>UTF-8</b> für Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'default');
DEFINE ('_UDDEIM_READ_INFO_1', 'Gelesene Nachrichten befinden sich ');
DEFINE ('_UDDEIM_READ_INFO_2', ' Tage im Posteingang und werden dann automatisch gelöscht.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Ungelesene Nachrichten befinden sich ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' Tage im Posteingang und werden dann automatisch gelöscht.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Gesendete Nachrichten befinden sich ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' Tage im Postausgang und werden dann automatisch gelöscht.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Posteingangshinweis für gelesene Nachrichten');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Zeige Hinweis <i>"Gelesene Nachrichten werden nach n Tagen gelöscht"</>');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Posteingangshinweis für ungelesene Nachrichten');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Zeige Hinweis <i>"Ungelesene Nachrichten werden nach n Tagen gelöscht"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Postausgangshinweis für gesendete Nachrichten');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Zeige Hinweis <i>"Gesendete Nachrichten werden nach n Tagen gelöscht"</i>');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Papierkorbhinweis für gelöschte Nachrichten');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Zeige Hinweis <i>"Gelöschte Nachrichten werden nach n Tagen endgültig entfernt"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Tage bis Löschung gesendeter Nachrichten');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Legt fest, wann <b>gesendete</b> Nachrichten aus dem Postausgang der Benutzer automatisch gelöscht werden.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'an spezielle Benutzer');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Nachricht an <b>alle speziellen Benutzer</b>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- Auswahl Username -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- Auswahl Name -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Ändere Benutzereinstellungen');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'vorhandene');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'nicht vorhandene');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- Auswahl Eintrag -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- Auswahl Benachrichtigung -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- Auswahl Popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Username');
DEFINE ('_UDDEADM_USERSET_NAME', 'Name');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Benachrichtigung');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Letzter Zugriff');
DEFINE ('_UDDEADM_USERSET_NO', 'Nein');
DEFINE ('_UDDEADM_USERSET_YES', 'Ja');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'unbekannt');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Wenn offline (außer Antworten)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Immer (außer Antworten)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Wenn offline');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Immer');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Keine Benachrichtigung');
DEFINE ('_UDDEADM_WELCOMEMSG', "Willkommen bei uddeIM!\n\nDu hast uddeIM erfolgreich installiert.\n\nLass dir diese Nachricht einmal mit den unterschiedlichen Vorlagen anzeigen. Du kannst diese im Backend von uddeIM auswählen.\n\nuddeIM ist immer noch in Entwicklung. Falls du Fehler oder Schwachstellen finden solltest, teile mir diese bitte mit, so dass wir gemeinsam uddeIM noch besser machen können.\n\nViel Spaß!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'Installation von uddeIM abgeschlossen.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Bitte kontrolliere als nächstes in der Administrationsoberfläche die Einstellungen von uddeIM.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Wenn dein CMS einen anderen Zeichensatz als ISO 8859-1 verwendet, so konfiguriere uddeIM dementsprechend.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Nach der Installation ist der Versandt von E-Mais aus uddeIM gesperrt (E-Mail Benachrichtigungen, Fotgetmenot E-Mails), so dass keine E-Mails versendet werden, solange du noch testest. Vergiss nicht "E-Mail Stopp" im Backend zu deaktivieren, wenn du mit dem Testen fertig bist.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. Empfänger');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Max. Anzahl von Empfängern pro Nachricht (0=kein Limit)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'Zu viele Empfänger');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'E-Mail Versand gesperrt.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Suche innerhalb des Texts');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Der Autocompleter sucht auch innerhalb des Namens (anderenfalls wird nur von Beginn an gesucht).');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Verhalten des "Alle Benutzer" Links');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Soll der "Alle Benutzer" Link unterdrückt oder angezeigt werden, oder sollen grundsätzlich alle Benutzer direkt angezeigt werden.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Unterdrücke "Alle Benutzer" Link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Zeige "Alle Benutzer" Link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Zeige immer alle Benutzer');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Konfigurationsdatei ist nicht beschreibbar:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Konfigurationsdatei ist beschreibbar:');
DEFINE ('_UDDEIM_FORWARDLINK', 'weiterleiten');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'Empfänger gefunden');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'Empfänger gefunden');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (Standard)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Nachrichtensystem');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Auswahl des Nachrichtensystem, das uddeIM zum Versenden von Benachrichtigungen verwenden soll.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Zeige Joomla Gruppen');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Zeige Joomla Gruppen als Auswahl in Generalnachrichten.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Weiterleiten von Nachrichten');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Erlaube Weiterleiten von Nachrichten.');
DEFINE ('_UDDEIM_FWDFROM', 'Originalnachricht von');
DEFINE ('_UDDEIM_FWDTO', 'an');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'wieder herstellen');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Kann Nachricht nicht wieder herstellen');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Erlaube mehrere Empfänger');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Erlaube mehrere durch ein Komma getrennte Empfänger.');
DEFINE ('_UDDEIM_CHARSLEFT', 'Zeichen übrig');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Zeige Zeichenzähler');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Zeigt einen Zähler, der die Anzahl der Zeichen angibt, die noch eingegeben werden können.');
DEFINE ('_UDDEIM_CLEAR', 'Löschen');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Ausgewählte Emfänger hinzufügen');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Mehrere Empfänger können nacheinander aus der "Alle Benutzer"-Liste ausgewählt werden.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Ausgewählte Verbindungen hinzufügen');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Mehrere Empfänger können nacheinander aus der "Verbindungen"-Liste ausgewählt werden.');
DEFINE ('_UDDEADM_PMSFOUND', 'Erkanntes PMS: ');
DEFINE ('_UDDEIM_ENTERNAME', 'Empfänger fehlt');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Vervollständige Namen');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Vervollständige Namen von Nachrichtenempfängern.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Schlüssel für Verschleierung');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Der Schlüssel für die Nachrichtenverschleierung. Diesen Wert nicht mehr verändert, wenn die Nachrichtenverschleierung aktiviert wurde.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Falsche Konfiguratinsdatei gefunden!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Version gefunden:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version erwartet:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Konvertiere Konfiguration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Erledigt!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Critical Error: Konnte Konfigurationsdatei nicht schreiben:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Nachricht verschlüsselt! - Download nicht möglich!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Falsches Passwort! - Download nicht möglich!');
DEFINE ('_UDDEIM_WRONGPW', 'Falsches Passwort! - Bitte den Administrator benachrichtigen!');
DEFINE ('_UDDEIM_WRONGPASS', 'Falsches Passwort!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Falsche Löschdaten (inbox/outbox): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Korrigiere falsche Löschdaten');
DEFINE ('_UDDEIM_TODP', 'An: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Löschvorgang jetzt durchführen');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Zeige Aktionssymbole');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Auf <b>Ja</b> setzen, damit die Aktionssymbole angezeigt wird.');
DEFINE ('_UDDEIM_UNCHECKALL', 'demarkiere alle');
DEFINE ('_UDDEIM_CHECKALL', 'markiere alle');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Zeige untere Symbole');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Auf <b>Ja</b> setzen, damit die unteren Symbole angezeigt wird.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Animierte Smileys');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Zeige animierte Smileys anstelle der statischen Smileys.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Weitere animierte Smileys');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Zeige weitere animierte Smileys.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Verschlüsselt - Passwort erforderlich');
DEFINE ('_UDDEIM_PASSWORD', '<b>Passwort erforderlich</b>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Passwort');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (Verschlüsselungstext)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (Entschlüsselungstext)');
DEFINE ('_UDDEIM_MORE', 'MEHR');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Private Nachrichten');
DEFINE ('_UDDEMODULE_NONEW', 'Keine neuen Nachrichten');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Neue Nachrichten: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'Nachricht');
DEFINE ('_UDDEMODULE_MESSAGES', 'Nachrichten');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Du hast');
DEFINE ('_UDDEMODULE_HELLO', 'Hallo');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Express Nachricht');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Verschlüsselung');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Nachrichten in der Datenbank verschlüsseln');
DEFINE ('_UDDEADM_CRYPT0', 'Keine');
DEFINE ('_UDDEADM_CRYPT1', 'Verschleiern');
DEFINE ('_UDDEADM_CRYPT2', 'Verschlüsseln');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Standard E-Mail Benachrichtigung');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Standard E-Mail Benachrichtigung (für Benutzer, die noch keine eigenen Einstellungen festgelegt haben).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Keine Benachrichtigung');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Immer');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Benachrichtigung, wenn offline');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Unterdrücke "Alle Benutzer"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Unterdrücke "Alle Benutzer", wenn eine neue Nachricht geschrieben wird (nützlich, wenn sehr viele Benutzer registriert sind).');
DEFINE ('_UDDEADM_POPUP_HEAD', 'Erlaube Popups');
DEFINE ('_UDDEADM_POPUP_EXP', 'Erlaube Popups (nur zusammen mit mod_uddeim oder gepatchter mod_cblogin für uddeIM)');
DEFINE ('_UDDEIM_OPTIONS', 'Weitere Einstellungen');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Hier können weitere Einstellungen vorgenommen werden.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Benachrichtigung bei neuen Nachrichten per Popup');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Benachrichtigung mit Popup als Standard');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Standardmäßig soll eine Benachrichtigung mit einem Popup erfolgen (für Benutzer, die noch keine eigenen Einstellungen festgelegt haben).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Wartung');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Wartung der Datenbank');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'PRÜFEN');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'REPARIEREN');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Wenn ein Benutzer aus der Datenbank gelöscht wird, bleiben seine Nachrichten i.d.R. in der Datenbank gespeichert. Diese Funktion prüft, ob es notwendig ist veraltete Nachrichten zu entfernen.<br />Weiterhin wird die Datenbank auf einige Fehler hin untersucht, die dann ggf. repariert werden.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Prüfe...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Username): [inbox|inbox trashed|outbox|outbox trashed]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>inbox: Nachrichten im Posteingang</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>inbox trashed: Gelöschte Nachrichten im Posteingang, die aber noch in einem anderen Postausgang liegen</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>outbox: Nachrichten im Postausgang</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>outbox trashed: Gelöschte Nachrichten im Postausgang, die aber noch in einem anderen Posteingang liegen</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Entferne...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "nicht vorhanden (von/an/einstellungen/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "lösche alle Einstellungen von");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "lösche Blocking von");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "entferne alle Nachrichten an gelöschten Benutzer aus dem Postausgang des Senders und aus dem Posteingang des gelöschten Benutzers");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "entferne alle gesendeten Nachrichten vom gelöschten Benutzer aus dem Postausgang und aus dem Posteingang des Empfängers");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nichts zu tun</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Wartung erforderlich</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Zeige Realnamen');
DEFINE ('_UDDEADM_NAMESDESC', 'Zeige Realnamen oder Usernamen?');
DEFINE ('_UDDEADM_REALNAMES', 'Realnamen');
DEFINE ('_UDDEADM_USERNAMES', 'Usernamen');
DEFINE ('_UDDEADM_CONLISTBOX', 'CB Verbindungen als Listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Die eigenen im Community Builder festgelegten Verbindungen können in einer Listbox oder in einer Tabelle angezeigt werden.');
DEFINE ('_UDDEADM_LISTBOX', 'Listbox');
DEFINE ('_UDDEADM_TABLE', 'Tabelle');

// Old: 0.5
define ('_UDDEIM_TRASHCAN_INFO', 'Nachrichten befinden sich 24 Stunden im Papierkorb und werden dann endgültig gelöscht. Du siehst nur die ersten paar Worte. Um die ganze Nachricht lesen zu können, musst du sie erst wieder herstellen.');
define ('_UDDEIM_TRASHCAN_INFO_1', 'Nachrichten befinden sich ');
define ('_UDDEIM_TRASHCAN_INFO_2', ' Stunden im Papierkorb und werden dann endgültig gelöscht. Du siehst nur die ersten paar Worte. Um die ganze Nachricht lesen zu können, musst du sie erst wieder herstellen.');
define ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Diese Nachricht wurde zurückgerufen. Wenn du möchtest, kannst du sie hier bearbeiten und noch einmal senden.');
define ('_UDDEIM_COULDNOTRECALL', 'Nachricht konnte nicht zurückgerufen werden (wahrscheinlich wurde sie in der Zwischenzeit gelesen oder gelöscht.)');
define ('_UDDEIM_CANTRESTORE', 'Nachricht konnte nicht wieder hergestellt werden (vielleicht war sie zu lange im Papierkorb und wurde bereits endgültig gelöscht.)');
define ('_UDDEIM_COULDNOTRESTORE', 'Nachricht konnte nicht wieder hergestellt werden.');
define ('_UDDEIM_DONTSEND', 'Nicht versenden');
define ('_UDDEIM_SENDAGAIN', 'Erneut absenden');
define ('_UDDEIM_NOTLOGGEDIN', 'Du bist nicht eingeloggt.');
define ('_UDDEIM_NOMESSAGES_INBOX', '<b>Du hast keine Nachrichten im Posteingang</b>.');
define ('_UDDEIM_NOMESSAGES_OUTBOX', '<b>Du hast keine Nachrichten im Postausgang.</b>');
define ('_UDDEIM_NOMESSAGES_TRASHCAN', '<b>Du hast keine Nachrichten im Papierkorb.</b>');
define ('_UDDEIM_INBOX', 'Eingang');
define ('_UDDEIM_OUTBOX', 'Ausgang');
define ('_UDDEIM_TRASHCAN', 'Papierkorb');
define ('_UDDEIM_CREATE', 'Neue Nachricht');
define ('_UDDEIM_UDDEIM', 'Private Nachrichten');
define ('_UDDEIM_READSTATUS', 'Gelesen');
define ('_UDDEIM_FROM', 'Von');
define ('_UDDEIM_FROM_SMALL', 'von');
define ('_UDDEIM_TO', 'An');
define ('_UDDEIM_TO_SMALL', 'an');
define ('_UDDEIM_OUTBOX_WARNING', 'Im Postausgang befinden sich alle verschickten Nachrichten. Ungelesene Nachrichten können zurückgerufen werden, so dass der Empfänger sie nicht mehr lesen kann.');
define ('_UDDEIM_RECALL', 'zurückrufen');
define ('_UDDEIM_RECALLTHISMESSAGE', 'Diese Nachricht zurückrufen');
define ('_UDDEIM_RESTORE', 'wieder herstellen');
define ('_UDDEIM_MESSAGE', 'Nachricht');
define ('_UDDEIM_DATE', 'Datum');
define ('_UDDEIM_DELETED', 'Gelöscht');
define ('_UDDEIM_DELETE', 'l&ouml;schen');
define ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
define ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
define ('_UDDEIM_DELETELINK', 'löschen');
define ('_UDDEIM_MESSAGENOACCESS', 'Die Nachricht kann nicht angezeigt werden.<br />Mögliche Gründe:<ul><li>Du hast keine Berechtigung, diese Nachricht zu lesen</li><li>Die Nachricht wurde inzwischen gelöscht</li></ul>');
define ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Du hast diese Nachricht in den Papierkorb verschoben.</b>');
define ('_UDDEIM_MESSAGEFROM', 'Nachricht von ');
define ('_UDDEIM_MESSAGETO', 'Nachricht von dir an ');
define ('_UDDEIM_REPLY', 'Antwort');
define ('_UDDEIM_SUBMIT', 'Absenden');
define ('_UDDEIM_DELETEREPLIED', 'Beantwortete Nachricht l&ouml;schen');
define ('_UDDEIM_NOID', 'Fehler: Keine Empfänger-ID gefunden. Nichts versendet.');
define ('_UDDEIM_NOMESSAGE', 'Fehler: Keine Nachricht eingetragen! Nichts versendet.');
define ('_UDDEIM_MESSAGE_REPLIEDTO', 'Nachricht beantwortet');
define ('_UDDEIM_MESSAGE_SENT', 'Nachricht versendet');
define ('_UDDEIM_MOVEDTOTRASH', ' und in den Papierkorb verschoben');
define ('_UDDEIM_NOSUCHUSER', 'Keinen Benutzer mit diesem Namen gefunden!');
define ('_UDDEIM_NOTTOYOURSELF', 'Schreibst du dir selber eine Nachricht? Das ist nicht m&ouml;glich!');
define ('_UDDEIM_VIOLATION', '<b>Zugriffsverletzung!</b> Du hast keine Rechte, diese Funktion auszuführen!');
define ('_UDDEIM_PRUNELINK', 'Nur Admins: Datenbank aufräumen');

// Admin

define ('_UDDEADM_SETTINGS', 'uddeIM Verwaltung');
define ('_UDDEADM_GENERAL', 'Allgemein');
define ('_UDDEADM_ABOUT', 'Über uddeIM');
define ('_UDDEADM_DATESETTINGS', 'Datum/Zeit');
define ('_UDDEADM_PICSETTINGS', 'Icons');
define ('_UDDEADM_DELETEREADAFTER_HEAD', 'Tage bis Löschung gelesener Nachrichten');
define ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Tage bis Löschung ungelesener Nachrichten');
define ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Tage bis Löschung aus Papierkorb');
define ('_UDDEADM_DAYS', 'Tag(e)');
define ('_UDDEADM_DELETEREADAFTER_EXP', 'Legt fest, wann <b>gelesene</b> Nachrichten aus dem Posteingang der Benutzer automatisch gelöscht werden? Wenn sie nicht automatisch gelöscht werden sollen, hier einen sehr hohen Wert angeben, der niemals erreicht wird (z.B. 36524 entspricht 100 Jahren).');
define ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Legt fest, wann <b>ungelesene</b> Nachrichten aus dem Posteingang der Benutzer automatisch gelöscht werden?');
define ('_UDDEADM_DELETETRASHAFTER_EXP', 'Legt fest, wann <b>gelöschte</b> Nachrichten aus dem Papierkorb der Benutzer automatisch entfernt werden. Es sind auch Dezimalwerte möglich (z.B. löscht der Wert 0.125 Nachrichten nach drei Stunden automatisch aus dem Papierkorb).');
define ('_UDDEADM_DATEFORMAT_HEAD', 'Format der Datumsanzeige');
define ('_UDDEADM_DATEFORMAT_EXP', 'In welchem Format soll das Datum der Nachricht angezeigt werden? Die Bezeichnung der Monate erfolgt nach den in Joomla/Mambo gewählten lokalen Spracheinstellungen (z.B. "Mär" für "März").');
define ('_UDDEADM_LDATEFORMAT_HEAD', 'Längere Datumsanzeige');
define ('_UDDEADM_LDATEFORMAT_EXP', 'Bei der Anzeige einzelner Nachrichten gibt es mehr Platz für das Datum. Wähle das Datumformat, das du bei geöffneter Nachricht anzeigen möchtest. Die Bezeichnung der Wochentage und Monate erfolgt nach den in Mambo gewählten lokalen Spracheinstellungen, also steht dort z. Bsp. "Di" für Dienstag (und nicht "Tue") oder "Mär" für März!');
define ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Initiierung der Löschvorgänge');
define ('_UDDEADM_ADMINIGNITIONONLY_YES', 'nur von Admins');
define ('_UDDEADM_ADMINIGNITIONONLY_NO', 'von allen Benutzer');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manuell');
define ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatische Löschvorgänge belasten Serverleistung und Datenbank. Bei <b>nur von Admins</b> werden die Nachrichten aller Benutzer nur dann gelöscht, wenn ein Admin seinen Posteingang aufruft. Das ist dann sinnvoll, wenn ein Admin regelmäßig seinen Posteingang aufruft, was bei den meisten Websites der Fall ist. Bei sehr kleinen oder selten betreuten Sites, ist die Einstellung <b>alle Benutzer</b> ggf. vorzuziehen.');
define ('_UDDEADM_SAVESETTINGS', 'Einstellungen speichern');
define ('_UDDEADM_THISHASBEENSAVED', 'Die folgenden Werte wurden in die Konfigurationsdatei geschrieben:');
define ('_UDDEADM_SETTINGSSAVED', 'Einstellungen gespeichert.');

define ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icon: Benutzer ist online');
define ('_UDDEADM_ICONONLINEPIC_EXP', 'Gib hier den Ort des Bildes an, das angezeigt wird, wenn ein Benutzer <b>online</b> ist');
define ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icon: Benutzer ist offline');
define ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Gib hier den Ort des Bildes an, das angezeigt wird, wenn ein Benutzer <b>offline</b> ist');
define ('_UDDEADM_ICONREADPIC_HEAD', 'Icon: Gelesene Nachricht');
define ('_UDDEADM_ICONREADPIC_EXP', 'Gib hier den Ort des Bildes an, das für <b>gelesene</b> Nachrichten angezeigt wird');
define ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icon: Ungelesene Nachricht');
define ('_UDDEADM_ICONUNREADPIC_EXP', 'Gib hier den Ort des Bildes an, das für <b>ungelesene</b> Nachrichten angezeigt wird');
define ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: Neue Nachrichten Icon');
define ('_UDDEADM_MODULENEWMESS_EXP', 'Diese Einstellung betrifft das mod_uddeim Modul. Gib hier den Ort des Bildes an, das in dem Modul angezeigt werden soll, wenn es neue Nachrichten gibt.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM Installation');
DEFINE ('_UDDEADM_FINISHED', 'Installation abgeschlossen');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Du hast den Community Builder nicht installiert. Du kannst uddeIM daher nicht nutzen!</span><br /><br />Du kannst den <a href="http://www.mambojoe.com">Mambo Community Builder</a> installieren.');
DEFINE ('_UDDEADM_CONTINUE', 'weiter');
DEFINE ('_UDDEADM_PMSFOUND_1', 'In deiner alten PMS-Installation sind ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' Nachrichten gespeichert. Sollen sie in uddeIM importiert werden?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Die alten PMS-Nachrichten bleiben vollständig erhalten und werden weder geändert noch gelöscht. Du kannst sie daher in uddeIM importieren, auch wenn du das alte PMS weiter benutzen möchtest. Du solltest zuerst Änderungen an den Einstellungen speichern, bevor du die Import-Funktion aufrufst!');
DEFINE ('_UDDEADM_IMPORT_YES', 'Die alten PMS-Nachrichten jetzt in uddeIM importieren.');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nein, keine PMS-Nachrichten importieren');   
DEFINE ('_UDDEADM_IMPORTING', 'Nachrichten werden importiert. Bitte warten.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Nachrichtenimport abgeschlossen. Bitte starte dieses Script nicht noch einmal, weil dadurch die Nachrichten erneut importiert (und mehrmals erscheinen) würden.'); 
DEFINE ('_UDDEADM_IMPORT', 'Import');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Nachrichten aus altem PMS importieren');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Keine andere PMS-Installation gefunden. Import nicht möglich.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Du hast die Nachrichten aus dem alten PMS bereits in uddeIM importiert.</span>');

//blocks

DEFINE ('_UDDEIM_BLOCKS', 'Geblockt');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nicht versendet (du wirst geblockt)');
DEFINE ('_UDDEIM_BLOCKNOW', 'Benutzer&nbsp;blocken');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Das ist eine Liste der Benutzer, die du geblockt hast. Diese können dir keine privaten Nachrichten schicken.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Du hast derzeit keine Benutzer geblockt.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Du hast derzeit ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' Benutzer geblockt.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[aufheben]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Ein geblockter Benutzer erhält eine Warnung, wenn er versucht dir eine Nachricht zu schicken.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Andere Benutzer können nicht sehen, ob du sie geblockt hast.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Admins können nicht geblockt werden');
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Blockade-System aktivieren');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Bei aktiviertem Blockade-System kann ein Benutzer einen anderen blocken. Ein geblockter Benutzer kann keine Nachrichten an den Benutzer schicken, der ihn geblockt hat.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'ja');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'nein');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Geblockte erhalten Nachricht');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Bei <b>Ja</b> erhalten Benutzer eine Nachricht, wenn sie versuchen eine Nachricht an jemanden zu schicken, der sie geblockt hat. Bei <b>Nein</b> merkt der Absender nicht, wenn die Nachricht wegen einer Blockade nicht zugestellt wird.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'ja');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'nein');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blockade-System nicht aktiviert');
DEFINE ('_UDDEADM_DELETIONS', 'Löschen'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blocken');

// new in 0.4 (0.1), admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integrierung');
DEFINE ('_UDDEADM_EMAIL', 'E-Mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'CB Links zeigen');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Bei <b>Ja</b> werden alle Usernamen als Links zum Community Builder Profil angezeigt (CB muss installiert sein).');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'CB Vorschaubild zeigen');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Bei <b>Ja</b> wird das Vorschaubild aus Community Builder angezeigt, wenn ein Benutzer eine Nachricht öffnet (CB muss installiert sein).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Online-Status zeigen');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Bei <b>Ja</b> zeigt uddeIM bei jedem Usernamen an, ob der betreffende Benutzer gerade online ist.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'E-Mail Benachrichtigung erlauben');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Bei <b>Ja</b> kann jeder Benutzer auswählen, ob er eine E-Mail bekommen möchte, wenn neue private Nachrichten für ihn eintreffen.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-Mail enthält Nachricht');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Bei <b>Nein</b> enthält diese E-Mail nur die Information, von wem die Nachricht stammt, nicht aber deren Inhalt.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Vergissmeinnicht E-Mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Diese Funktion sendet - unabhängig von den persönlichen Einstellungen des Benutzers - eine Erinnerungsnachricht, wenn für längere Zeit ungelesene Nachrichten im Posteingang lagern. Diese Funktion ist von der Einstellung \'E-Mail Benachrichtigung erlauben\' unabhängig. Du musst beide auf <b>Nein</b> setzen, um keine E-Mails zu senden.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Vergissmeinnicht nach Tagen');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Wenn die Vergissmeinnicht-Funktion aktiviert ist, kannst du hier die Anzahl der Tage einstellen, nach der eine E-Mail versendet wird.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Erste Zeichen (Listen)');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Hier kannst du einstellen, wieviel der Nachricht (in Zeichen ab Anfang) in Posteingang, Postausgang, Papierkorb und eventuell Archiv angezeigt wird.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Maximale Nachrichtenlänge');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Hier kannst du die maximale Nachrichtenlänge einstellen (in Zeichen). Jede Nachricht wird danach abgeschnitten. Auf <b>\'0\'</b> setzen, um keine maximale Länge festzulegen (nicht empfohlen).');
DEFINE ('_UDDEADM_YES', 'Ja');
DEFINE ('_UDDEADM_NO', 'Nein');
DEFINE ('_UDDEADM_ADMINSONLY', 'Nur Admins');
DEFINE ('_UDDEADM_SYSTEM', 'System');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Username in Systemnachrichten');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM unterstützt Systemnachrichten. Diese haben keinen Absender und Benutzer können nicht darauf antworten. Unter welchem Namen solche Nachrichten verschickt werden (z.B. <b>Support</b> oder <b>Webmaster</b> oder <b>Community Moderator</b>)?');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Admins dürfen Generalnachrichten verschicken');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM unterstützt Generalnachrichten, die an alle Benutzer verschickt werden (das sollte sparsam eingesetzt werden).');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-Mail Absendername');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Name, unter dem Benachrichtigungs-E-Mails verschickt werden, zum Beispiel <b>Deine Website</b> oder <b>Messaging Service</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-Mail Adresse');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'E-Mail Adresse, unter der die Benachrichtigungen verschickt werden. Das sollte die E-Mail Adresse deiner Website sein.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM Version');
DEFINE ('_UDDEADM_ARCHIVE', 'Archiv'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Archiv aktivieren');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Hier kannst du die Archiv-Funktion aktivieren. Im Archiv können Benutzer Nachrichten speichern, die nicht gelöscht werden.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Maximale Anzahl Archivnachrichten');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Die maximale Anzahl von Nachrichten, die ein Benutzer im Archiv speichern darf.');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Eigenkopien erlauben');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Damit können Benutzer sich selber eine Kopie einer Nachricht senden, die sie an einen anderen Benutzer geschickt haben. Diese Kopie landet im Posteingang (oder im Archiv, wenn diese Funktion aktiviert ist).');
DEFINE ('_UDDEADM_MESSAGES', 'Nachrichten');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Löschen nach Antwort vorschlagen');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Wenn diese Funktion aktiviert ist, erscheint neben der  \'Abschicken\'-Schaltfläche eine Checkbox \'beantwortete löschen\', die als Voreinstellung angehakt ist. In diesem Fall wird die Originalnachricht gelöscht, nachdem sie beantwortet wurde. Diese Funktion verringert die Anzahl der Nachrichten in der Datenbank. Benutzer können in jedem Fall das Häkchen in der Checkbox entfernen, um eine Nachricht im Posteingang aufzuheben.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Nachrichten pro Seite');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Anzahl der Nachrichten, die in Posteingang, Posteingang, Papierkorb und Archiv pro Seite angezeigt werden.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Verwendetes Charset');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Bei Problemen in der Darstellung nicht-lateinischer Schriftsätze kann hier ein anderer Charset für die Umwandlung des Datenbankinhalts in HTML-Code eingetragen werden. Der voreingestellte ist für die Verwendung in deutscher Sprache korrekt. <b>Wenn du dich damit nicht auskennst, verändere die Werte nicht!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Mail Charset');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Bei Problemen in der Darstellung nicht-lateinischer Schriftsätze kann hier ein anderer Charset für die Versendung von E-Mails eingetragen werden. Der voreingestellte ist für die Verwendung in deutscher Sprache korrekt. <b>Wenn du dich damit nicht auskennst, verändere die Werte nicht!</b>');

define ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Das ist der Inhalt der E-Mail Benachrichtigung (wenn die Option oben aktiviert ist). Bei diesem Mail wird der Nachrichteninhalt selbst nicht mitgeschickt. Die Variablen %you%, %user% und %site% müssen vorkommen. ');		
define ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Das ist der Inhalt der E-Mail Benachrichtigung (wenn die Option oben aktiviert ist). Bei diesem Mail wird der Nachrichteninhalt mitgeschickt. Die Variablen %you%, %user%, %pmessage% und %site% müssen vorkommen.');		
define ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Das ist der Inhalt des Vergissmeinnicht-E-Mails, wenn diese Option aktiviert ist. Die Variablen %you% und %site% müssen vorkommen. ');		
define ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Hier wird eingestellt, ob die Benutzer Nachrichten aus ihrem Archiv downloaden können sollen, indem sie sich selbst ein E-Mail mit diesen Nachrichten schicken.');
define ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Download erlauben');	
define ('_UDDEADM_EXPORT_FORMAT_EXP', 'Das ist das Format, in dem die Nachrichten im E-Mail dargestellt werden, wenn E-Mail Download aktiviert ist. Die Variablen %user%, %msgdate% und %msgbody% müssen vorkommen. ');	
		
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Limit im Posteingang');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Du kannst den Posteingang in das obige Nachrichtenlimit inkludieren. In diesem Fall werden die Nachrichten im Posteingang und im Archiv zusammengezählt. Du kannst diese Einstellung aber auch ohne das Archiv verwenden. Dann gilt das Nachrichtenlimit einfach nur für die maximale Anzahl von Nachrichten im Posteingang. Wenn ein Benutzer über das Limit kommt, kann er solange keine Nachrichten beantworten oder schreiben, bis er einige aus Posteingang bzw. Archiv löscht (Empfang und Lesen ist weiterhin möglich).');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Posteingang: Speicherverbrauch zeigen');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Zeigt unterhalb des Posteingangs an, wieviele Nachrichten schon gespeichert wurden.');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Du hast das Archiv deaktiviert. Was soll mit den Nachrichten passieren, die derzeit im Archiv gespeichert sind?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'im Archiv belassen');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Die Nachrichten verbleiben im Archiv gespeichert (Benutzer haben keinen Zugriff mehr darauf. Nachrichten werden weiter für Nachrichtenlimits gezählt.)');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'in Posteingang verschieben');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Archivierte Nachrichten in Posteingänge verschoben');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Archivierte Nachrichten werden in die Posteingänge der jeweiligen Benutzer verschoben (bzw. in die Papierkörbe, wenn die Nachrichten zu alt sind).');		

// 0.4 frontend
DEFINE ('_UDDEIM_EMNOFF', 'E-Mail Benachrichtigung ist aus. ');
DEFINE ('_UDDEIM_EMNON', 'E-Mail Benachrichtigung ist an. ');
DEFINE ('_UDDEIM_SETEMNON', '[einschalten]');
DEFINE ('_UDDEIM_SETEMNOFF', '[ausschalten]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Hallo %you%,\n\n%user% hat dir eine private Nachricht auf %site% geschickt. Bitte logge dich ein, um die Nachricht zu lesen!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Hallo %you%,\n\n%user% hat dir die folgende private Nachricht auf %site% geschickt. Bitte logge dich ein, um auf die Nachricht zu antworten!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Hallo %you%,\n\nauf %site% gibt es neue private Nachrichten für dich. Bitte logge dich ein, um sie zu lesen!");
define ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Nachrichten für dich auf %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'als Systemnachricht (=keine Antwort möglich)');
DEFINE ('_UDDEIM_SEND_TOALL', 'an alle Benutzer');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'an alle Admins');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'an alle gerade online');
DEFINE ('_UDDEIM_CANTREPLY', 'Auf diese Nachricht kannst du nicht antworten.');
DEFINE ('_UDDEIM_VALIDFOR_1', 'gültig für ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' Stunden. 0=dauerhaft (automatisches Löschen gilt aber)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[System- oder Generalnachricht erstellen]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Normale Nachricht erstellen]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'System- und Generalnachrichten nicht möglich.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Art der Nachricht');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Hilfe zu Systemnachrichten');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(öffnet in neuem Fenster)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Du möchtest die folgende Nachricht schicken. Bitte kontrolliere sie noch einmal, bevor du sie abschickst!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Nachricht an <b>alle Benutzer</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Nachricht an <b>alle Admins</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Nachricht an <b>alle Eingeloggten</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Antworten auf diese Nachricht sind nicht möglich.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Nachricht wird mit <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> als Username gesendet');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Unexpected error: ');
DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Verfallsdatum der Nachricht ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Nachricht hat kein Verfallsdatum');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Überprüfe den Link (klicke darauf), bevor du weitermachst!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Nur in <b>Systemnachrichten</b>:<br /> [b]<b>fett</b>[/b] [i]<em>kursiv</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] oder [url]http://www.someurl.com[/url] sind Links');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Keine Empfänger angegeben. Nachricht wurde nicht gesendet.');

DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Archiv nicht eingerichtet');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Nachricht konnte nicht im Archiv gespeichert werden.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Du hast ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>Du hast noch keine Nachrichten im Archiv gespeichert.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Du hast keine Nachrichten in deinem Archiv.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' Nachrichten gespeichert');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Du hast eine Nachricht gespeichert');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Um weitere Nachrichten zu speichern, musst du zuerst einige löschen.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Du kannst maximal ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' Nachrichten im Archiv ablegen.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Du hast ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' Nachrichten ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' Nachricht '); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'im Archiv gespeichert');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'im Posteingang gespeichert');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'in Posteingang und Archiv gespeichert');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Das Limit liegt bei ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Du kannst weiterhin Nachrichten empfangen und lesen. Um antworten oder schreiben zu können, musst du allerdings zuerst Nachrichten löschen.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Gespeicherte Nachrichten: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(von maximal ');
DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Nachricht archiviert');
DEFINE ('_UDDEIM_STORE', 'archivieren');		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'zurück');
DEFINE ('_UDDEIM_TRASHCHECKED', 'markierte löschen');	// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'alle zeigen');	// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Archiv');	// should be same as _UDDEADM_ARCHIVE
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Archiv voll. Nicht gespeichert.');	

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Keine Nachrichten ausgewählt.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopie einer Nachricht an ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'Kopie an mich');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'Kopie ins Archiv');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'beantwortete löschen');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Nachricht Download');
DEFINE ('_UDDEIM_EXPORT_NOW', 'markierte als E-Mail an mich schicken');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Kopie der Nachrichten als E-Mail gesendet');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Die E-Mail enthält deine privaten Nachrichten.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Das E-Mail konnte nicht verschickt werden.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Nachrichtenlimit erreicht. Nicht wieder hergestellt!');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Schreibe eine Nachricht an ');

$udde_smon[1]="Jan.";
$udde_smon[2]="Feb.";
$udde_smon[3]="Mär.";
$udde_smon[4]="Apr.";
$udde_smon[5]="Mai";
$udde_smon[6]="Jun.";
$udde_smon[7]="Jul.";
$udde_smon[8]="Aug.";
$udde_smon[9]="Sep.";
$udde_smon[10]="Okt.";
$udde_smon[11]="Nov.";
$udde_smon[12]="Dez.";

$udde_lmon[1]="Januar";
$udde_lmon[2]="Februar";
$udde_lmon[3]="M&auml;rz";
$udde_lmon[4]="April";
$udde_lmon[5]="Mai";
$udde_lmon[6]="Juni";
$udde_lmon[7]="Juli";
$udde_lmon[8]="August";
$udde_lmon[9]="September";
$udde_lmon[10]="Oktober";
$udde_lmon[11]="November";
$udde_lmon[12]="Dezember";

$udde_lweekday[0]="Sonntag";
$udde_lweekday[1]="Montag";
$udde_lweekday[2]="Dienstag";
$udde_lweekday[3]="Mittwoch";
$udde_lweekday[4]="Donnerstag";
$udde_lweekday[5]="Freitag";
$udde_lweekday[6]="Samstag";

$udde_sweekday[0]="So";
$udde_sweekday[1]="Mo";
$udde_sweekday[2]="Di";
$udde_sweekday[3]="Mi";
$udde_sweekday[4]="Do";
$udde_sweekday[5]="Fr";
$udde_sweekday[6]="Sa";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Template');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Wähle das Template, mit dem uddeIM angezeigt werden soll');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'CB Verbindungen anzeigen');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Auf <b>Ja</b> setzen, damit beim Schreiben einer neuen Nachricht die CB-Verbindungen (Connections) des jeweiligen Benutzers angezeigt werden.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Einstellungen anzeigen');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Der Menüpunkt \'Einstellungen\' erscheint automatisch, wenn das Blockade-System oder E-Mail Benachrichtigungen aktiviert sind. Du kannst ihn hier generell aktivieren.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'Ja, am unteren Ende');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'BB-Tags erlauben');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'Nur Schriftauszeichnung');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Verwende <b>nur Schriftauszeichnung</b>, damit deine Benutzer ihren Text fett, kursiv, unterstrichen, in unterschiedlicher Größe und Farbe erstellen können. Wenn du die Einstellung auf <b>Ja</b> setzt, werden alle BB-Tags ermöglicht, auch Bilder und Links.');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Smilies erlauben');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Auf <b>Ja</b> setzen, damit Smilies :-) als kleine Grafiken angezeigt werden.');
DEFINE ('_UDDEADM_DISPLAY', 'Darstellung');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Menüsymbole zeigen');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Auf <b>Ja</b> setzen, damit das Menü mit Symbolen angezeigt wird.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Titel der Komponente');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Gib den Titel für die Komponente ein, zum Beispiel \'Private Nachrichten\'. Leer lassen, um keinen Titel anzuzeigen.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Info anzeigen');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Auf <b>Ja</b> setzen, um einen Menüpunkt \'Info\' zu Software-Credits und Lizenzinformationen anzuzeigen.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'E-Mail Stopp');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Diese Funktion wählen, um jeden E-Mail Verkehr von uddeIM (Benachrichtigungen und Vergissmeinnicht) unabhängig von den persönlichen Einstellungen der Benutzer zu blockieren, zum Beispiel während des Testens.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB Bilder in Listen');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Auf <b>Ja</b> setzen, um die CB-Vorschaubilder auch in den Listen (Posteingang, Postausgang usw.) anzuzeigen.');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Alle Benutzer');
DEFINE ('_UDDEIM_CONNECTIONS', 'Verbindungen');
DEFINE ('_UDDEIM_SETTINGS', 'Einstellungen');
DEFINE ('_UDDEIM_NOSETTINGS', 'Es gibt keine Einstellungen, die du verändern kannst.');
DEFINE ('_UDDEIM_ABOUT', 'Info'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Schreiben'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Mail Benachrichtigung');
DEFINE ('_UDDEIM_EMN_EXP', 'Du kannst dich per E-Mail über neue Nachrichten benachrichtigen lassen.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-Mail Benachrichtigung bei neuen Nachrichten.');
DEFINE ('_UDDEIM_EMN_NONE', 'Keine E-Mail Benachrichtigungen');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Benachrichtigen, wenn nicht eingeloggt');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Keine Benachrichtigung bei Antworten');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Blocken'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Du kannst Benutzer blocken, die dir dann keine Nachrichten mehr schicken können. Wähle <b>Benutzer blocken</b>, wenn du eine Nachricht liest.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Änderung speichern');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB-Tags für fett Text. Verwendung: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB-Tags für kursiven Text. Verwendung: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB-Tags für unterstrichenen Text. Verwendung: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB-Tags für farbigen Text. Verwendung [color=#XXXXXX]colored[/color] mit dem Hex-Code der gewünschte Farbe als XXXXXX, zum Beispiel FF0000 für rot.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB-Tags für farbigen Text. Verwendung [color=#XXXXXX]colored[/color] mit dem Hex-Code der gewünschte Farbe als XXXXXX, zum Beispiel 00FF00 für grün.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB-Tags für farbigen Text. Verwendung [color=#XXXXXX]colored[/color] mit dem Hex-Code der gewünschte Farbe als XXXXXX, zum Beispiel 0000FF für blau.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB-Tags für sehr kleinen Text. Verwendung: [size=1]very small Text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB-Tags für kleinen Text. Verwendung: [size=2] small Text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB-Tags für großen Text. Verwendung: [size=4]big Text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB-Tags für sehr großen Text. Verwendung: [size=5]very big Text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB-Tags für Bild-Links. Verwendung: [img]Image-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB-Tags für Weblinks. Verwendung: [url]web address[/url]. Das http:// am Beginn der Adresse nicht vergessen!');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Alle BB-Tags schließen.');
