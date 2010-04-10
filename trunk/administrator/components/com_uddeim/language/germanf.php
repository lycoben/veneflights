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
// Language file: German (formal) (source file is Latin-1)
// Translator:     Stephan Slabihoud <ssl@gmx.de>
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Lade MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Wie soll uddeIM MooTools laden (MooTools wird vom Autocompleter ben�tigt): <i>Nicht laden</i> ist n�tzlich, wenn die Template schon MooTools l�d, <i>Auto</i> ist die empfohlene Standardeinstellung (gleiches Verhalten wie in uddeIM 1.2), wenn J1.0 verwendet wird, dann kann das Laden von MooTools 1.1 oder 1.2 erzwungen werden.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'MooTools nicht laden');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'Auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'erzwinge Laden von MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'erzwinge Laden von MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...Standardeinstellung f�r MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 kodiert');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Zeitzone anpassen');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Wenn uddeIM die falsche Uhrzeit anzeigt, dann kann die Zeitzone hiermit angepasst werden. Normalerweise, wenn alles korrekt konfiguriert wurde, sollte hier eine Null stehen. Trotzdem mag es F�lle geben, bei denen dieser Wert angepasst werden muss.');
DEFINE ('_UDDEADM_HOURS', 'Stunden');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Versionsinformation:');
DEFINE ('_UDDEADM_STATISTICS', 'Statistiken:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Zeige Statistiken');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Zeigt einige Statistiken, wie die Anzahl der gespeicherten Nachrichten, an.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'STATISTIKEN');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Gespeicherte Nachrichten in Datenbank: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Vom Empf�nger gel�schte Nachrichten: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Vom Sender gel�schte Nachrichten: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Nachrichten, die demn�chst entfernt werden: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', '�berschreibe Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Normalerweise versucht uddeIM die korrekte Itemid automatisch zu ermitteln, wenn diese nicht vorgegeben ist. In einigen F�llen ist es notwendig diesen Wert zu �berschrieben, z.B. wenn mehrere Men�-Links zu uddeIM verwendet werden.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Die ermittelte Itemid ist: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Benutze Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Benutze diese Itemid anstelle der automatisch ermittelten.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Verwende Profil-Links');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Bei <b>Ja</b> werden alle Usernamen als Link zu einem Benutzerprofil angezeigt.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Zeige Vorschaubild');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Bei <b>Ja</b> wird das Vorschaubild aus dem Benutzerprofil angezeigt, wenn ein Benutzer eine Nachricht �ffnet.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Zeige Bilder in Listen');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Auf <b>Ja</b> setzen, um Vorschaubilder auch in den Listen (Posteingang, Postausgang usw.) anzuzeigen.');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Deaktiviert');
DEFINE ('_UDDEADM_ENABLED', 'Aktiviert');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Wichtig');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Erlaube Markierungen');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Auf <b>Ja</b> setzen, damit wichtige Nachrichten markiert werden k�nnen (uudeIM zeigt einen Stern, der angeklickt werden kann).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Wichtig: Wenn sie uddeIM auf eine neue Version aktualisiert haben, lesen sie bitte unbedingt das README. Manchmal �ndern sich einige Tabellen oder Felder in der Datenbank!');
DEFINE ('_UDDEIM_ADDCCINFO', 'F�ge CC: Zeile hinzu');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Zitierten Text k�rzen');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'K�rze den zitierten Text auf 2/3 der maximalen Textl�nge, wenn diese �berschritten wird.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Eintr�ge im Posteingang: ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Letzten ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' Eintr�ge');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Status');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Absender');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Nachricht');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Der Posteingang ist leer.');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Zugriff auf Papierkorb nicht erlaubt.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Zugriff auf Papierkorb beschr�nken');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Sie k�nnen den Zugriff auf den Papierkorb beschr�nken. Normalerweise ist dieser f�r jeden verf�gbar (<i>keine Beschr�nkung</i>). Eine Beschr�nkung ist auf spezielle Benutzer oder Admins m�glich, so dass Gruppen mit geringeren Rechten keinen Nachrichten zur�ckrufen k�nnen.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'keine Beschr�nkung');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'spezielle Benutzer');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'nur Admins');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Verstecke Benutzer');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Geben sie hier die IDs der Benutzer an, die nicht in der �ffentlichen "Alle Benutzer" Liste angezeigt werden sollen (z.B. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Verstecke Benutzer');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Geben sie hier die IDs der Benutzer an, die nicht in der "Alle Benutzer" Liste angezeigt werden sollen (z.B. 65,66,67). Admins bekommen immer die komplette Liste angezeigt.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF Angriff erkannt');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF Schutz');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Hiermit sch�tzen sie alle Formulare gegen Cross-Site Request Forgery Angriffe. Normalerweise sollte dieser Schutz aktiviert sein. Sollten erhebliche Probleme auftreten, dann kann dieser ausgeschaltet werden.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Auf archivierte Nachrichten k�nnen sie nicht antworten.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Antworten an unregistrierte Benutzer k�nnen nicht zur�ckgerufen werden.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Antworten erlauben');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Erlaube Antworten auf Nachrichten von unregistrierten Benutztern.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE', 
"Hallo %user%,\n\n%you% hat Ihnen die folgende private Nachricht auf %site% geschickt.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Zeige Realnamen');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Zeige Realnamen oder Usernamen im Public Frontend?');
DEFINE ('_UDDEIM_USERLIST', 'Benutzerliste');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Sie m�ssen noch etwas warten vor dem n�chsten Versandt');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Letzte Nachricht');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Wartezeit');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Zeit in Sekunden, die ein Anwender warten muss, bevor er eine weitere Nachricht versenden kann (0 f�r keine Wartezeit).');
DEFINE ('_UDDEADM_SECONDS', 'Sekunden');
DEFINE ('_UDDEIM_PUBLICSENT', 'Nachricht gesendet.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Fehler in Absender');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Fehler in E-Mail Adresse');
DEFINE ('_UDDEIM_YOURNAME', 'Ihr Name:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Ihre E-Mail:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Sie verwenden uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Sie haben bereits die aktuelle Version von uddeIM installiert.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Die aktuelle Version ist ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Update Informationen:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Pr�fe auf Updates');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Hiermit kontaktieren sie die uddeIM Entwicklerwebsite, um Informationen �ber die aktuelle Version zu erhalten. Au�er der Versionsnummer werden keine weiteren pers�nlichen Daten �bertragen.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'PR�FEN');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Kann Versionsdaten nicht herunterladen.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Kontaktliste nicht vorhanden!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Maximale Anzahl von Empf�ngern erreicht (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Max. Kontakte pro Liste');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Max. Anzahl von Kontakten, die pro Liste erlaubt sind.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Kontaktlisten sind nicht freigegeben.');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Erlaube Kontaktlisten');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'In uddeIM k�nnen Benutzer Kontaktlisten anlegen, mit denen Nachrichten bequem an mehrere Empf�nger gesendet werden k�nnen. Beachten sie: Es muss zus�tzlich auch erlaubt sein, Nachrichten an mehrere Empf�nger zu senden.');
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
DEFINE ('_UDDEIM_EDITLINK', '�ndern');
DEFINE ('_UDDEIM_LISTS', 'Kontakte');
DEFINE ('_UDDEIM_STATUS_READ', 'gelesen');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'ungelesen');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'Online');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'Offline');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Zeige CB Avatare');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Standardm��ig zeigt uddeIM nur Avatare an, die Benutzer selbst hochgeladen haben. Wenn diese Option aktiviert wird, werden auch Avatare aus der CB Galerie angezeigt.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'CB Verbindungen freigeben');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Hiermit werden Nachrichten an Empf�nger erlaubt, wenn diese sich in einer Gruppe befinden, die standardm��ig geblockt wird. Voraussetzung ist, dass der Sender auf der CB Verbindungsliste des Empf�ngers steht. Diese Einstellung ist unanh�ngig von individuellen Blockierungen, die jeder Benutzer selbst konfigurieren kann (siehe Einstellungen oben).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Sie d�rfen an diese Gruppe nichts senden.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Der Empf�nger blockiert sie.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blockierte Gruppen (registered users)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Gruppen, an die registrierte Benutzer (ohne spezielle Rechte) keine Nachrichten senden d�rfen. Spezielle Benutzer und Admins werden von dieser Einstellung nicht betroffen. Diese Einstellung ist unanh�ngig von individuellen Blockierungen, die jeder Benutzer selbst konfigurieren kann (siehe Einstellungen oben).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blockierte Gruppen (public users)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Gruppen, an die unregistrierte Benutzer (<i>Public Users</i>) keine Nachrichten senden d�rfen. Diese Einstellung ist unanh�ngig von individuellen Blockierungen, die jeder Benutzer selbst konfigurieren kann (siehe Einstellungen oben). Wenn eine Gruppe geblockt wird, bekommen deren Mitglieder in ihren Benutzereinstellungen die <i>Public Frontend</i> Option nicht angezeigt.');
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
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Verstecke von �ffentlicher "Alle Benutzer" Liste');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Bestimmte Gruppen k�nnen von der <b>�ffentlichen</b> "Alle Benutzer" Liste ausgenommen werden. Hinweis: Es werden nur die Namen nicht angezeigt, Nachrichten k�nnen dennoch gesendet werden. Benutzer, die das <i>Public Frontend</i> nicht aktiviert haben, werden grunds�tzlich nicht angezeigt.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Verstecke von "Alle Benutzer" Liste');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Bestimmte Gruppen k�nnen von der "Alle Benutzer" Liste ausgenommen werden. Hinweis: Es werden nur die Namen nicht angezeigt, Nachrichten k�nnen dennoch gesendet werden.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'keine');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'nur SuperAdmins');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'nur Admins');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'spezielle Benutzer');
DEFINE ('_UDDEADM_PUBLIC', 'Public');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Verhalten des "Alle Benutzer" Links');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Soll der "Alle Benutzer" Link im <b>�ffentlichen</b> Formular unterdr�ckt oder angezeigt werden oder sollen grunds�tzlich alle Benutzer direkt angezeigt werden.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Public Frontend');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- Auswahl PublicF -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Erlaube unregistrierten Benutzern eine Nachricht zu senden.');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Nachrichtenlimit erreicht!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Public User');
DEFINE ('_UDDEIM_DELETEDUSER', 'Benutzer gel�scht');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha L�nge');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Anzahl der Zeichen, die der Benutzer zur Kontrolle eingeben muss.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha Spam-Schutz');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Legt fest, wer ein Captcha eingeben muss.');
DEFINE ('_UDDEADM_CAPTCHAF0', 'gesperrt');
DEFINE ('_UDDEADM_CAPTCHAF1', 'nur unregistrierte Benutzer');
DEFINE ('_UDDEADM_CAPTCHAF2', 'unregistrierte und registrierte Benutzer');
DEFINE ('_UDDEADM_CAPTCHAF3', 'unreg., registrierte, spezielle Benutzer');
DEFINE ('_UDDEADM_CAPTCHAF4', 'Alle Benutzer (inkl. Admins)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Public Frontend freigeben');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Hiermit k�nnen unregistrierte Benutzer (<i>Public User</i>) Nachrichten an registrierte Benutzer senden (diese k�nnen in ihrem Profil festlegen, ob sie dieses Feature verwenden m�chten).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Public Frontend Standard');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Soll das <i>Public Frontend</i> f�r neue Benutzer grunds�tzlich gesperrt oder freigegeben sein?');
DEFINE ('_UDDEADM_PUBDEF0', 'gesperrt');
DEFINE ('_UDDEADM_PUBDEF1', 'freigegeben');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Falscher Sicherheitscode');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'keins oder unbekannt');
DEFINE ('_UDDEADM_DONATE', 'Wenn sie uddeIM einsetzen und die weitere Entwicklung unterst�tzen m�chten, w�rde ich mich �ber eine kleine Spende freuen.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Gefundene Konfiguration in der Datenbank: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Sichern und Wiederherstellen der Konfiguration');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Hiermit kann die aktuelle Konfiguration in der Datenbank gesichert und auch wieder hergestellt werden. Das ist dann n�tzlich, wenn uddeIM aktualisiert werden soll oder wenn aufgrund von Tests die aktuelle Konfiguration vor�bergehend gesichert werden soll.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'BACKUP');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RESTORE');
DEFINE ('_UDDEADM_CANCEL', 'Abbruch');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Verwendeter Zeichensatz (Sprachfile)');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Normalerweise ist <b>default</b> (i.d.R. ISO-8859-1) die korrekte Einstellung f�r Joomla 1.0 und <b>UTF-8</b> f�r Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'default');
DEFINE ('_UDDEIM_READ_INFO_1', 'Gelesene Nachrichten befinden sich ');
DEFINE ('_UDDEIM_READ_INFO_2', ' Tage im Posteingang und werden dann automatisch gel�scht.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Ungelesene Nachrichten befinden sich ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' Tage im Posteingang und werden dann automatisch gel�scht.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Gesendete Nachrichten befinden sich ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' Tage im Postausgang und werden dann automatisch gel�scht.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Posteingangshinweis f�r gelesene Nachrichten');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Zeige Hinweis <i>"Gelesene Nachrichten werden nach n Tagen gel�scht"</i>');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Posteingangshinweis f�r ungelesene Nachrichten');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Zeige Hinweis <i>"Ungelesene Nachrichten werden nach n Tagen gel�scht"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Postausgangshinweis f�r gesendete Nachrichten');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Zeige Hinweis <i>"Gesendete Nachrichten werden nach n Tagen gel�scht"</i>');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Papierkorbhinweis f�r gel�schte Nachrichten');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Zeige Hinweis <i>"Gel�schte Nachrichten werden nach n Tagen endg�ltig entfernt"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Tage bis L�schung gesendeter Nachrichten');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Legt fest, wann <b>gesendete</b> Nachrichten aus dem Postausgang der Benutzer automatisch gel�scht werden.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'an spezielle Benutzer');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Nachricht an <b>alle speziellen Benutzer</b>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- Auswahl Username -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- Auswahl Name -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', '�ndere Benutzereinstellungen');
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
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Wenn offline (au�er Antworten)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Immer (au�er Antworten)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Wenn offline');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Immer');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Keine Benachrichtigung');
DEFINE ('_UDDEADM_WELCOMEMSG', "Willkommen bei uddeIM!\n\nSie haben uddeIM erfolgreich installiert.\n\nLassen sie sich diese Nachricht einmal mit den unterschiedlichen Vorlagen anzeigen. Sie k�nnen diese im Backend von uddeIM ausw�hlen.\n\nuddeIM ist immer noch in Entwicklung. Falls sie Fehler oder Schwachstellen finden sollten, teilen sie mir diese bitte mit, so dass wir gemeinsam uddeIM noch besser machen k�nnen.\n\nViel Spa�!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'Installation von uddeIM abgeschlossen.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Bitte kontrollieren sie als n�chstes in der Administrationsoberfl�che die Einstellungen von uddeIM.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Wenn ihr CMS einen anderen Zeichensatz als ISO 8859-1 verwendet, so konfigurieren sie uddeIM dementsprechend.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Nach der Installation ist der Versandt von E-Mails aus uddeIM gesperrt (E-Mail Benachrichtigungen, Fotgetmenot E-Mails), so dass keine E-Mails versendet werden, solange sie noch testen. Vergessen sie nicht "E-Mail Stopp" im Backend zu deaktivieren, wenn sie mit dem Testen fertig sind.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. Empf�nger');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Max. Anzahl von Empf�ngern pro Nachricht (0=kein Limit)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'Zu viele Empf�nger');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'E-Mail Versand gesperrt.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Suche innerhalb des Texts');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Der Autocompleter sucht auch innerhalb des Namens (anderenfalls wird nur von Beginn an gesucht).');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Verhalten des "Alle Benutzer" Links');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Soll der "Alle Benutzer" Link unterdr�ckt oder angezeigt werden, oder sollen grunds�tzlich alle Benutzer direkt angezeigt werden.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Unterdr�cke "Alle Benutzer" Link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Zeige "Alle Benutzer" Link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Zeige immer alle Benutzer');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Konfigurationsdatei ist nicht beschreibbar:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Konfigurationsdatei ist beschreibbar:');
DEFINE ('_UDDEIM_FORWARDLINK', 'weiterleiten');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'Empf�nger gefunden');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'Empf�nger gefunden');
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
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Erlaube mehrere Empf�nger');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Erlaube mehrere durch ein Komma getrennte Empf�nger.');
DEFINE ('_UDDEIM_CHARSLEFT', 'Zeichen �brig');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Zeige Zeichenz�hler');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Zeigt einen Z�hler, der die Anzahl der Zeichen angibt, die noch eingegeben werden k�nnen.');
DEFINE ('_UDDEIM_CLEAR', 'L�schen');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Ausgew�hlte Emf�nger hinzuf�gen');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Hiermit k�nnen mehrere Empf�nger nacheinander aus der "Alle Benutzer"-Liste ausgew�hlt werden.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Ausgew�hlte Verbindungen hinzuf�gen');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Hiermit k�nnen mehrere Empf�nger nacheinander aus der "Verbindungen"-Liste ausgew�hlt werden.');
DEFINE ('_UDDEADM_PMSFOUND', 'Erkanntes PMS: ');
DEFINE ('_UDDEIM_ENTERNAME', 'Empf�nger fehlt');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Vervollst�ndige Namen');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Vervollst�ndige Namen von Nachrichtenempf�ngern.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Schl�ssel f�r Verschleierung');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Der Schl�ssel f�r die Nachrichtenverschleierung. Diesen Wert nicht mehr ver�ndert, wenn die Nachrichtenverschleierung aktiviert wurde.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Falsche Konfiguratinsdatei gefunden!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Version gefunden:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version erwartet:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Konvertiere Konfiguration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Erledigt!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Critical Error: Konnte Konfigurationsdatei nicht schreiben:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Nachricht verschl�sselt! - Download nicht m�glich!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Falsches Passwort! - Download nicht m�glich!');
DEFINE ('_UDDEIM_WRONGPW', 'Falsches Passwort! - Bitte den Administrator benachrichtigen!');
DEFINE ('_UDDEIM_WRONGPASS', 'Falsches Passwort!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Falsche L�schdaten (inbox/outbox): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Korrigiere falsche L�schdaten');
DEFINE ('_UDDEIM_TODP', 'An: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'L�schvorgang jetzt durchf�hren');
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
DEFINE ('_UDDEIM_PASSWORDREQ', 'Verschl�sselt - Passwort erforderlich');
DEFINE ('_UDDEIM_PASSWORD', '<b>Passwort erforderlich</b>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Passwort');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (Verschl�sselungstext)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (Entschl�sselungstext)');
DEFINE ('_UDDEIM_MORE', 'MEHR');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Private Nachrichten');
DEFINE ('_UDDEMODULE_NONEW', 'Keine neuen Nachrichten');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Neue Nachrichten: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'Nachricht');
DEFINE ('_UDDEMODULE_MESSAGES', 'Nachrichten');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Sie haben');
DEFINE ('_UDDEMODULE_HELLO', 'Hallo');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Express Nachricht');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Verschl�sselung');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Nachrichten in der Datenbank verschl�sseln');
DEFINE ('_UDDEADM_CRYPT0', 'Keine');
DEFINE ('_UDDEADM_CRYPT1', 'Verschleiern');
DEFINE ('_UDDEADM_CRYPT2', 'Verschl�sseln');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Standard E-Mail Benachrichtigung');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Standard E-Mail Benachrichtigung (f�r Benutzer, die noch keine eigenen Einstellungen festgelegt haben).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Keine Benachrichtigung');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Immer');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Benachrichtigung, wenn offline');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Unterdr�cke "Alle Benutzer"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Unterdr�cke "Alle Benutzer", wenn eine neue Nachricht geschrieben wird (n�tzlich, wenn sehr viele Benutzer registriert sind).');
DEFINE ('_UDDEADM_POPUP_HEAD', 'Erlaube Popups');
DEFINE ('_UDDEADM_POPUP_EXP', 'Erlaube Popups (nur zusammen mit mod_uddeim oder gepatchter mod_cblogin f�r uddeIM)');
DEFINE ('_UDDEIM_OPTIONS', 'Weitere Einstellungen');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Hier k�nnen weitere Einstellungen vorgenommen werden.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Benachrichtigung bei neuen Nachrichten per Popup');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Benachrichtigung mit Popup als Standard');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Standardm��ig soll eine Benachrichtigung mit einem Popup erfolgen (f�r Benutzer, die noch keine eigenen Einstellungen festgelegt haben).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Wartung');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Wartung der Datenbank');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'PR�FEN');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'REPARIEREN');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Wenn ein Benutzer aus der Datenbank gel�scht wird, bleiben seine Nachrichten i.d.R. in der Datenbank gespeichert. Diese Funktion pr�ft, ob es notwendig ist veraltete Nachrichten zu entfernen.<br />Weiterhin wird die Datenbank auf einige Fehler hin untersucht, die dann ggf. repariert werden.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Pr�fe...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Username): [inbox|inbox trashed|outbox|outbox trashed]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>inbox: Nachrichten im Posteingang</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>inbox trashed: Gel�schte Nachrichten im Posteingang, die aber noch in einem anderen Postausgang liegen</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>outbox: Nachrichten im Postausgang</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>outbox trashed: Gel�schte Nachrichten im Postausgang, die aber noch in einem anderen Posteingang liegen</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Entferne...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "nicht vorhanden (von/an/einstellungen/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "l�sche alle Einstellungen von");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "l�sche Blocking von");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "entferne alle Nachrichten an gel�schten Benutzer aus dem Postausgang des Senders und aus dem Posteingang des gel�schten Benutzers");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "entferne alle gesendeten Nachrichten vom gel�schten Benutzer aus dem Postausgang und aus dem Posteingang des Empf�ngers");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nichts zu tun</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Wartung erforderlich</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Zeige Realnamen');
DEFINE ('_UDDEADM_NAMESDESC', 'Zeige Realnamen oder Usernamen?');
DEFINE ('_UDDEADM_REALNAMES', 'Realnamen');
DEFINE ('_UDDEADM_USERNAMES', 'Usernamen');
DEFINE ('_UDDEADM_CONLISTBOX', 'CB Verbindungen als Listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Die eigenen im Community Builder festgelegten Verbindungen k�nnen in einer Listbox oder in einer Tabelle angezeigt werden.');
DEFINE ('_UDDEADM_LISTBOX', 'Listbox');
DEFINE ('_UDDEADM_TABLE', 'Tabelle');

// Old: 0.5
define ('_UDDEIM_TRASHCAN_INFO', 'Nachrichten befinden sich 24 Stunden im Papierkorb und werden dann endg�ltig gel�scht. Sie sehen nur die ersten paar Worte. Um die ganze Nachricht lesen zu k�nnen, m�ssen sie sie erst wieder herstellen.');
define ('_UDDEIM_TRASHCAN_INFO_1', 'Nachrichten befinden sich ');
define ('_UDDEIM_TRASHCAN_INFO_2', ' Stunden im Papierkorb und werden dann endg�ltig gel�scht. Sie sehen nur die ersten paar Worte. Um die ganze Nachricht lesen zu k�nnen, m�ssen sie sie erst wieder herstellen.');
define ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Diese Nachricht wurde zur�ckgerufen. Wenn sie m�chten, k�nnen sie sie hier bearbeiten und noch einmal senden.');
define ('_UDDEIM_COULDNOTRECALL', 'Nachricht konnte nicht zur�ckgerufen werden (wahrscheinlich wurde sie in der Zwischenzeit gelesen oder gel�scht.)');
define ('_UDDEIM_CANTRESTORE', 'Nachricht konnte nicht wieder hergestellt werden (vielleicht war sie zu lange im Papierkorb und wurde bereits endg�ltig gel�scht.)');
define ('_UDDEIM_COULDNOTRESTORE', 'Nachricht konnte nicht wieder hergestellt werden.');
define ('_UDDEIM_DONTSEND', 'Nicht versenden');
define ('_UDDEIM_SENDAGAIN', 'Erneut absenden');
define ('_UDDEIM_NOTLOGGEDIN', 'Sie sind nicht eingeloggt.');
define ('_UDDEIM_NOMESSAGES_INBOX', '<b>Sie haben keine Nachrichten im Posteingang</b>');
define ('_UDDEIM_NOMESSAGES_OUTBOX', '<b>Sie haben keine Nachrichten im Postausgang.</b>');
define ('_UDDEIM_NOMESSAGES_TRASHCAN', '<b>Sie haben keine Nachrichten im Papierkorb.</b>');
define ('_UDDEIM_INBOX', 'Posteingang');
define ('_UDDEIM_OUTBOX', 'Postausgang');
define ('_UDDEIM_TRASHCAN', 'Papierkorb');
define ('_UDDEIM_CREATE', 'Neue Nachricht');
define ('_UDDEIM_UDDEIM', 'Private Nachrichten');
define ('_UDDEIM_READSTATUS', 'Gelesen');
define ('_UDDEIM_FROM', 'Von');
define ('_UDDEIM_FROM_SMALL', 'von');
define ('_UDDEIM_TO', 'An');
define ('_UDDEIM_TO_SMALL', 'an');
define ('_UDDEIM_OUTBOX_WARNING', 'Im Postausgang befinden sich alle verschickten Nachrichten. Ungelesene Nachrichten k�nnen zur�ckgerufen werden, so dass der Empf�nger sie nicht mehr lesen kann.');
define ('_UDDEIM_RECALL', 'zur�ckrufen');
define ('_UDDEIM_RECALLTHISMESSAGE', 'Diese Nachricht zur�ckrufen');
define ('_UDDEIM_RESTORE', 'wieder herstellen');
define ('_UDDEIM_MESSAGE', 'Nachricht');
define ('_UDDEIM_DATE', 'Datum');
define ('_UDDEIM_DELETED', 'Gel�scht');
define ('_UDDEIM_DELETE', 'l&ouml;schen');
define ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
define ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
define ('_UDDEIM_DELETELINK', 'l�schen');
define ('_UDDEIM_MESSAGENOACCESS', 'Die Nachricht kann nicht angezeigt werden.<br />M�gliche Gr�nde:<ul><li>Sie haben keine Berechtigung, diese Nachricht zu lesen</li><li>Die Nachricht wurde inzwischen gel�scht</li></ul>');
define ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Sie haben diese Nachricht in den Papierkorb verschoben.</b>');
define ('_UDDEIM_MESSAGEFROM', 'Nachricht von ');
define ('_UDDEIM_MESSAGETO', 'Nachricht von Ihnen an ');
define ('_UDDEIM_REPLY', 'Antwort');
define ('_UDDEIM_SUBMIT', 'Absenden');
define ('_UDDEIM_DELETEREPLIED', 'Beantwortete Nachricht l&ouml;schen');
define ('_UDDEIM_NOID', 'Fehler: Keine Empf�nger-ID gefunden. Nichts versendet.');
define ('_UDDEIM_NOMESSAGE', 'Fehler: Keine Nachricht eingetragen! Nichts versendet.');
define ('_UDDEIM_MESSAGE_REPLIEDTO', 'Nachricht beantwortet');
define ('_UDDEIM_MESSAGE_SENT', 'Nachricht versendet');
define ('_UDDEIM_MOVEDTOTRASH', ' und in den Papierkorb verschoben');
define ('_UDDEIM_NOSUCHUSER', 'Keinen Benutzer mit diesem Namen gefunden!');
define ('_UDDEIM_NOTTOYOURSELF', 'Sie k�nnen sich nicht selbst Nachrichten schicken!');
define ('_UDDEIM_VIOLATION', '<b>Zugriffsverletzung!</b> Sie haben keine Rechte, diese Funktion auszuf�hren!');
define ('_UDDEIM_PRUNELINK', 'Nur Admins: Datenbank aufr�umen');

// Admin

define ('_UDDEADM_SETTINGS', 'uddeIM Verwaltung');
define ('_UDDEADM_GENERAL', 'Allgemein');
define ('_UDDEADM_ABOUT', '�ber uddeIM');
define ('_UDDEADM_DATESETTINGS', 'Datum/Zeit');
define ('_UDDEADM_PICSETTINGS', 'Icons');
define ('_UDDEADM_DELETEREADAFTER_HEAD', 'Tage bis L�schung gelesener Nachrichten');
define ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Tage bis L�schung ungelesener Nachrichten');
define ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Tage bis L�schung aus Papierkorb');
define ('_UDDEADM_DAYS', 'Tag(e)');
define ('_UDDEADM_DELETEREADAFTER_EXP', 'Legt fest, wann <b>gelesene</b> Nachrichten aus dem Posteingang der Benutzer automatisch gel�scht werden. Wenn sie nicht automatisch gel�scht werden sollen, hier einen sehr hohen Wert angeben, der niemals erreicht wird (z.B. 36524 entspricht 100 Jahren).');
define ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Legt fest, wann <b>ungelesene</b> Nachrichten aus dem Posteingang der Benutzer automatisch gel�scht werden?');
define ('_UDDEADM_DELETETRASHAFTER_EXP', 'Legt fest, wann <b>gel�schte</b> Nachrichten aus dem Papierkorb der Benutzer automatisch entfernt werden. Es sind auch Dezimalwerte m�glich (z.B. l�scht der Wert 0.125 Nachrichten nach drei Stunden automatisch aus dem Papierkorb).');
define ('_UDDEADM_DATEFORMAT_HEAD', 'Format der Datumsanzeige');
define ('_UDDEADM_DATEFORMAT_EXP', 'In welchem Format soll das Datum der Nachricht angezeigt werden? Die Bezeichnung der Monate erfolgt nach den in Joomla/Mambo gew�hlten lokalen Spracheinstellungen (z.B. "M�r" f�r "M�rz").');
define ('_UDDEADM_LDATEFORMAT_HEAD', 'L�ngere Datumsanzeige');
define ('_UDDEADM_LDATEFORMAT_EXP', 'Bei der Anzeige einzelner Nachrichten gibt es mehr Platz f�r das Datum. W�hle das Datumformat, das sie bei ge�ffneter Nachricht anzeigen m�chten. Die Bezeichnung der Wochentage und Monate erfolgt nach den in Mambo gew�hlten lokalen Spracheinstellungen, also steht dort z. Bsp. "Di" f�r Dienstag (und nicht "Tue") oder "M�r" f�r M�rz!');
define ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Initiierung der L�schvorg�nge');
define ('_UDDEADM_ADMINIGNITIONONLY_YES', 'nur von Admins');
define ('_UDDEADM_ADMINIGNITIONONLY_NO', 'von allen Benutzer');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manuell');
define ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatische L�schvorg�nge belasten Serverleistung und Datenbank. Bei <b>nur von Admins</b> werden die Nachrichten aller Benutzer nur dann gel�scht, wenn ein Admin seinen Posteingang aufruft. Das ist dann sinnvoll, wenn ein Admin regelm��ig seinen Posteingang aufruft, was bei den meisten Websites der Fall ist. Bei sehr kleinen oder selten betreuten Sites, ist die Einstellung <b>alle Benutzer</b> ggf. vorzuziehen.');
define ('_UDDEADM_SAVESETTINGS', 'Einstellungen speichern');
define ('_UDDEADM_THISHASBEENSAVED', 'Die folgenden Werte wurden in die Konfigurationsdatei geschrieben:');
define ('_UDDEADM_SETTINGSSAVED', 'Einstellungen gespeichert.');

define ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icon: Benutzer ist online');
define ('_UDDEADM_ICONONLINEPIC_EXP', 'Geben sie hier den Ort des Bildes an, das angezeigt wird, wenn ein Benutzer <b>online</b> ist');
define ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icon: Benutzer ist offline');
define ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Geben sie hier den Ort des Bildes an, das angezeigt wird, wenn ein Benutzer <b>offline</b> ist');
define ('_UDDEADM_ICONREADPIC_HEAD', 'Icon: Gelesene Nachricht');
define ('_UDDEADM_ICONREADPIC_EXP', 'Geben sie hier den Ort des Bildes an, das f�r <b>gelesene</b> Nachrichten angezeigt wird');
define ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icon: Ungelesene Nachricht');
define ('_UDDEADM_ICONUNREADPIC_EXP', 'Geben sie hier den Ort des Bildes an, das f�r <b>ungelesene</b> Nachrichten angezeigt wird');
define ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: Neue Nachrichten Icon');
define ('_UDDEADM_MODULENEWMESS_EXP', 'Diese Einstellung betrifft das mod_uddeim Modul. Geben sie hier den Ort des Bildes an, das in dem Modul angezeigt werden soll, wenn es neue Nachrichten gibt.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM Installation');
DEFINE ('_UDDEADM_FINISHED', 'Installation abgeschlossen');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Sie haben den Community Builder nicht installiert. Sie k�nnen uddeIM daher nicht nutzen!</span><br /><br />Sie k�nnen den <a href="http://www.mambojoe.com">Mambo Community Builder</a> installieren.');
DEFINE ('_UDDEADM_CONTINUE', 'weiter');
DEFINE ('_UDDEADM_PMSFOUND_1', 'In ihrer alten PMS-Installation sind ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' Nachrichten gespeichert. Sollen sie in uddeIM importiert werden?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Die alten PMS-Nachrichten bleiben vollst�ndig erhalten und werden weder ge�ndert noch gel�scht. Sie k�nnen sie daher in uddeIM importieren, auch wenn sie das alte PMS weiter benutzen m�chten. Sie sollten zuerst �nderungen an den Einstellungen speichern, bevor sie die Import-Funktion aufrufen!');
DEFINE ('_UDDEADM_IMPORT_YES', 'Die alten PMS-Nachrichten jetzt in uddeIM importieren.');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nein, keine PMS-Nachrichten importieren');   
DEFINE ('_UDDEADM_IMPORTING', 'Nachrichten werden importiert. Bitte warten.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Nachrichtenimport abgeschlossen. Bitte starte dieses Script nicht noch einmal, weil dadurch die Nachrichten erneut importiert (und mehrmals erscheinen) w�rden.'); 
DEFINE ('_UDDEADM_IMPORT', 'Import');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Nachrichten aus altem PMS importieren');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Keine andere PMS-Installation gefunden. Import nicht m�glich.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Sie haben die Nachrichten aus dem alten PMS bereits in uddeIM importiert.</span>');

//blocks
DEFINE ('_UDDEIM_BLOCKS', 'Geblockt');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nicht versendet (sie werden geblockt)');
DEFINE ('_UDDEIM_BLOCKNOW', 'Benutzer&nbsp;blocken');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Das ist eine Liste der Benutzer, die von Ihnen geblockt wurden. Diese k�nnen Ihnen keine privaten Nachrichten schicken.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Sie haben derzeit keine Benutzer geblockt.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Sie haben derzeit ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' Benutzer geblockt.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[aufheben]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Ein geblockter Benutzer erh�lt eine Warnung, wenn er versucht Ihnen eine Nachricht zu schicken.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Andere Benutzer k�nnen nicht sehen, ob sie sie geblockt haben.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Admins k�nnen nicht geblockt werden');

DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Blockade-System aktivieren');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Bei aktiviertem Blockade-System kann ein Benutzer einen anderen blocken. Ein geblockter Benutzer kann keine Nachrichten an den Benutzer schicken, der ihn geblockt hat.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'ja');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'nein');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Geblockte erhalten Nachricht');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Bei <b>Ja</b> erhalten Benutzer eine Nachricht, wenn sie versuchen eine Nachricht an jemanden zu schicken, der sie geblockt hat. Bei <b>Nein</b> merkt der Absender nicht, wenn die Nachricht wegen einer Blockade nicht zugestellt wird.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'ja');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'nein');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blockade-System nicht aktiviert');
DEFINE ('_UDDEADM_DELETIONS', 'Nachrichten');
DEFINE ('_UDDEADM_BLOCK', 'Blocken');

// new in 0.4 (0.1), admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integrierung');
DEFINE ('_UDDEADM_EMAIL', 'E-Mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'CB Links zeigen');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Bei <b>Ja</b> werden alle Usernamen als Links zum Community Builder Profil angezeigt (CB muss installiert sein).');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'CB Vorschaubild zeigen');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Bei <b>Ja</b> wird das Vorschaubild aus Community Builder angezeigt, wenn ein Benutzer eine Nachricht �ffnet (CB muss installiert sein).');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Online-Status zeigen');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Bei <b>Ja</b> zeigt uddeIM bei jedem Usernamen an, ob der betreffende Benutzer gerade online ist.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'E-Mail Benachrichtigung erlauben');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Bei <b>Ja</b> kann jeder Benutzer ausw�hlen, ob er eine E-Mail bekommen m�chte, wenn neue private Nachrichten f�r ihn eintreffen.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-Mail enth�lt Nachricht');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Bei <b>Nein</b> enth�lt diese E-Mail nur die Information, von wem die Nachricht stammt, nicht aber deren Inhalt.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Vergissmeinnicht E-Mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Diese Funktion sendet - unabh�ngig von den pers�nlichen Einstellungen des Benutzers - eine Erinnerungsnachricht, wenn f�r l�ngere Zeit ungelesene Nachrichten im Posteingang lagern. Diese Funktion ist von der Einstellung \'E-Mail Benachrichtigung erlauben\' unabh�ngig. Sie m�ssen beide auf <b>Nein</b> setzen, um keine E-Mails zu senden.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Vergissmeinnicht nach Tagen');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Wenn die Vergissmeinnicht-Funktion aktiviert ist, k�nnen sie hier die Anzahl der Tage einstellen, nach der eine E-Mail versendet wird.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Erste Zeichen (Listen)');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Hier k�nnen sie einstellen, wieviel der Nachricht (in Zeichen ab Anfang) in Posteingang, Postausgang, Papierkorb und eventuell Archiv angezeigt wird.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Maximale Nachrichtenl�nge');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Hier k�nnen sie die maximale Nachrichtenl�nge einstellen (in Zeichen). Jede Nachricht wird danach abgeschnitten. Auf <b>\'0\'</b> setzen, um keine maximale L�nge festzulegen (nicht empfohlen).');
DEFINE ('_UDDEADM_YES', 'Ja');
DEFINE ('_UDDEADM_NO', 'Nein');
DEFINE ('_UDDEADM_ADMINSONLY', 'Nur Admins');
DEFINE ('_UDDEADM_SYSTEM', 'System');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Username in Systemnachrichten');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM unterst�tzt Systemnachrichten. Diese haben keinen Absender und Benutzer k�nnen nicht darauf antworten. Unter welchem Namen solchen die Nachrichten verschickt werden (z.B. <b>Support</b> oder <b>Webmaster</b> oder <b>Community Moderator</b>)?');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Admins d�rfen Generalnachrichten verschicken');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM unterst�tzt Generalnachrichten, die an alle Benutzer verschickt werden (das sollte sparsam eingesetzt werden).');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-Mail Absendername');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Name, unter dem Benachrichtigungs-E-Mails verschickt werden, zum Beispiel <b>Ihre Website</b> oder <b>Messaging Service</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-Mail Adresse');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'E-Mail Adresse, unter der die Benachrichtigungen verschickt werden. Das sollte die E-Mail Adresse ihrer Website sein.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM Version');
DEFINE ('_UDDEADM_ARCHIVE', 'Archiv'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Archiv aktivieren');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Hier k�nnen sie die Archiv-Funktion aktivieren. Im Archiv k�nnen Benutzer Nachrichten speichern, die nicht gel�scht werden.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Maximale Anzahl Archivnachrichten');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Die maximale Anzahl von Nachrichten, die ein Benutzer im Archiv speichern darf.');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Eigenkopien erlauben');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Damit k�nnen Benutzer sich selber eine Kopie einer Nachricht senden, die sie an einen anderen Benutzer geschickt haben. Diese Kopie landet im Posteingang (oder im Archiv, wenn diese Funktion aktiviert ist).');
DEFINE ('_UDDEADM_MESSAGES', 'Nachrichten');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'L�schen nach Antwort vorschlagen');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Wenn diese Funktion aktiviert ist, erscheint neben der  \'Abschicken\'-Schaltfl�che eine Checkbox \'beantwortete l�schen\', die als Voreinstellung angehakt ist. In diesem Fall wird die Originalnachricht gel�scht, nachdem sie beantwortet wurde. Diese Funktion verringert die Anzahl der Nachrichten in der Datenbank. Benutzer k�nnen in jedem Fall das H�kchen in der Checkbox entfernen, um eine Nachricht im Posteingang aufzuheben.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Nachrichten pro Seite');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Anzahl der Nachrichten, die in Posteingang, Posteingang, Papierkorb und Archiv pro Seite angezeigt werden.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Verwendetes Charset');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Bei Problemen in der Darstellung nicht-lateinischer Schrifts�tze kann hier ein anderer Charset f�r die Umwandlung des Datenbankinhalts in HTML-Code eingetragen werden. Der voreingestellte ist f�r die Verwendung in deutscher Sprache korrekt. <b>Wenn sie sich damit nicht auskennen, ver�nderen sie diesen Wert nicht!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Mail Charset');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Bei Problemen in der Darstellung nicht-lateinischer Schrifts�tze kann hier ein anderer Charset f�r die Versendung von E-Mails eingetragen werden. Der voreingestellte ist f�r die Verwendung in deutscher Sprache korrekt. <b>Wenn sie sich damit nicht auskennen, ver�nderen sie die Werte nicht!</b>');

define ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Das ist der Inhalt der E-Mail Benachrichtigung (wenn die Option oben aktiviert ist). Bei diesem Mail wird der Nachrichteninhalt selbst nicht mitgeschickt. Die Variablen %you%, %user% und %site% m�ssen vorkommen. ');		
define ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Das ist der Inhalt der E-Mail Benachrichtigung (wenn die Option oben aktiviert ist). Bei diesem Mail wird der Nachrichteninhalt mitgeschickt. Die Variablen %you%, %user%, %pmessage% und %site% m�ssen vorkommen.');		
define ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Das ist der Inhalt des Vergissmeinnicht-E-Mails, wenn diese Option aktiviert ist. Die Variablen %you% und %site% m�ssen vorkommen. ');		
define ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Hier wird eingestellt, ob die Benutzer Nachrichten aus ihrem Archiv downloaden k�nnen sollen, indem sie sich selbst eine E-Mail mit diesen Nachrichten schicken.');
define ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Download erlauben');	
define ('_UDDEADM_EXPORT_FORMAT_EXP', 'Das ist das Format, in dem die Nachrichten im E-Mail dargestellt werden, wenn E-Mail Download aktiviert ist. Die Variablen %user%, %msgdate% und %msgbody% m�ssen vorkommen. ');	
		
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Limit im Posteingang');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Sie k�nnen den Posteingang in das obige Nachrichtenlimit inkludieren. In diesem Fall werden die Nachrichten im Posteingang und im Archiv zusammengez�hlt. Sie k�nnen diese Einstellung aber auch ohne das Archiv verwenden. Dann gilt das Nachrichtenlimit einfach nur f�r die maximale Anzahl von Nachrichten im Posteingang. Wenn ein Benutzer �ber das Limit kommt, kann er solange keine Nachrichten beantworten oder schreiben, bis er einige aus Posteingang bzw. Archiv l�scht (Empfang und Lesen ist weiterhin m�glich).');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Posteingang: Speicherverbrauch zeigen');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Zeigt unterhalb des Posteingangs an, wieviele Nachrichten schon gespeichert wurden.');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Sie habendas Archiv deaktiviert. Was soll mit den Nachrichten passieren, die derzeit im Archiv gespeichert sind?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'im Archiv belassen');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Die Nachrichten verbleiben im Archiv gespeichert (Benutzer haben keinen Zugriff mehr darauf. Nachrichten werden weiter f�r Nachrichtenlimits gez�hlt.)');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'in Posteingang verschieben');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Archivierte Nachrichten in Posteing�nge verschoben');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Archivierte Nachrichten werden in die Posteing�nge der jeweiligen Benutzer verschoben (bzw. in die Papierk�rbe, wenn die Nachrichten zu alt sind).');		

// 0.4 frontend
DEFINE ('_UDDEIM_EMNOFF', 'E-Mail Benachrichtigung ist aus. ');
DEFINE ('_UDDEIM_EMNON', 'E-Mail Benachrichtigung ist an. ');
DEFINE ('_UDDEIM_SETEMNON', '[einschalten]');
DEFINE ('_UDDEIM_SETEMNOFF', '[ausschalten]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Hallo %you%,\n\n%user% hat Ihnen eine private Nachricht auf %site% geschickt. Bitte loggen sie sich ein, um die Nachricht zu lesen!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 
"Hallo %you%,\n\n%user% hat Ihnen die folgende private Nachricht auf %site% geschickt. Bitte loggen sie sich ein, um auf die Nachricht zu antworten!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 
"Hallo %you%,\n\nauf %site% gibt es neue private Nachrichten f�r sie. Bitte loggen sie sich ein, um sie zu lesen!");
define ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Nachrichten f�r sie auf %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'als Systemnachricht (=keine Antwort m�glich)');
DEFINE ('_UDDEIM_SEND_TOALL', 'an alle Benutzer');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'an alle Admins');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'an alle gerade online');
DEFINE ('_UDDEIM_CANTREPLY', 'Auf diese Nachricht k�nnen sie nicht antworten.');
DEFINE ('_UDDEIM_VALIDFOR_1', 'g�ltig f�r ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' Stunden. 0=dauerhaft (automatisches L�schen gilt aber)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[System- oder Generalnachricht erstellen]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Normale Nachricht erstellen]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'System- und Generalnachrichten nicht m�glich.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Art der Nachricht');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Hilfe zu Systemnachrichten');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(�ffnet in neuem Fenster)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Sie m�chten die folgende Nachricht schicken. Bitte kontrollieren sie die Nachricht noch einmal, bevor sie diese abschicken!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Nachricht an <b>alle Benutzer</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Nachricht an <b>alle Admins</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Nachricht an <b>alle Eingeloggten</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Antworten auf diese Nachricht sind nicht m�glich.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Nachricht wird mit <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> als Username gesendet');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Unexpected error: ');
DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Verfallsdatum der Nachricht ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Nachricht hat kein Verfallsdatum');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>�berpr�fen sie den Link (darauf klicken), bevor sie weitermachen!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Nur in <b>Systemnachrichten</b>:<br /> [b]<b>fett</b>[/b] [i]<em>kursiv</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] oder [url]http://www.someurl.com[/url] sind Links');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Keine Empf�nger angegeben. Nachricht wurde nicht gesendet.');

DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Archiv nicht eingerichtet');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Nachricht konnte nicht im Archiv gespeichert werden.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Sie haben ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>Sie haben noch keine Nachrichten im Archiv gespeichert.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Sie haben keine Nachrichten in ihrem Archiv.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' Nachrichten gespeichert');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Sie haben eine Nachricht gespeichert');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Um weitere Nachrichten zu speichern, m�ssen sie zuerst einige l�schen.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Sie k�nnen maximal ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' Nachrichten im Archiv ablegen.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Sie haben ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' Nachrichten ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' Nachricht '); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'im Archiv gespeichert');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'im Posteingang gespeichert');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'in Posteingang und Archiv gespeichert');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Das Limit liegt bei ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Sie k�nnen weiterhin Nachrichten empfangen und lesen. Um antworten or schreiben zu k�nnen, m�ssen sie allerdings zuerst Nachrichten l�schen.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Gespeicherte Nachrichten: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(von maximal ');
DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Nachricht archiviert');
DEFINE ('_UDDEIM_STORE', 'archivieren');		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'zur�ck');
DEFINE ('_UDDEIM_TRASHCHECKED', 'markierte l�schen');	// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'alle zeigen');	// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Archiv');	// should be same as _UDDEADM_ARCHIVE
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Archiv voll. Nicht gespeichert.');	

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Keine Nachrichten ausgew�hlt.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopie einer Nachricht an ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'Kopie an mich');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'Kopie ins Archiv');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'beantwortete l�schen');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Nachricht Download');
DEFINE ('_UDDEIM_EXPORT_NOW', 'markierte als E-Mail an mich schicken');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Kopie der Nachrichten als E-Mail gesendet');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Die E-Mail enth�lt ihre privaten Nachrichten.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Das E-Mail konnte nicht verschickt werden.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Nachrichtenlimit erreicht. Nicht wieder hergestellt!');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Schreiben sie eine Nachricht an ');

$udde_smon[1]="Jan.";
$udde_smon[2]="Feb.";
$udde_smon[3]="M�r.";
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
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'W�hlen sie das Template, mit dem uddeIM angezeigt werden soll');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'CB Verbindungen anzeigen');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Auf <b>Ja</b> setzen, damit beim Schreiben einer neuen Nachricht die CB-Verbindungen (Connections) des jeweiligen Benutzers angezeigt werden.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Einstellungen anzeigen');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Der Men�punkt \'Einstellungen\' erscheint automatisch, wenn das Blockade-System oder E-Mail Benachrichtigungen aktiviert sind. Sie k�nnen ihn hier generell aktivieren.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'Ja, am unteren Ende');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'BB-Tags erlauben');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'Nur Schriftauszeichnung');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Verwenden sie <b>nur Schriftauszeichnung</b>, damit die Benutzer ihren Text fett, kursiv, unterstrichen, in unterschiedlicher Gr��e und Farbe erstellen k�nnen. Wenn sie die Einstellung auf <b>Ja</b> setzen, werden alle BB-Tags erm�glicht, auch Bilder und Links.');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Smilies erlauben');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Auf <b>Ja</b> setzen, damit Smilies :-) als kleine Grafiken angezeigt werden.');
DEFINE ('_UDDEADM_DISPLAY', 'Darstellung');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Men�symbole zeigen');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Auf <b>Ja</b> setzen, damit das Men� mit Symbolen angezeigt wird.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Titel der Komponente');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Geben sie den Titel f�r die Komponente ein, zum Beispiel  \'Private Nachrichten\'. Leer lassen, um keinen Titel anzuzeigen.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Info anzeigen');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Auf <b>Ja</b> setzen, um einen Men�punkt \'Info\' zu Software-Credits und Lizenzinformationen anzuzeigen.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'E-Mail Stopp');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Diese Funktion w�hlen, um jeden E-Mail Verkehr von uddeIM (Benachrichtigungen und Vergissmeinnicht) unabh�ngig von den pers�nlichen Einstellungen der Benutzer zu blockieren, zum Beispiel w�hrend des Testens.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB Bilder in Listen');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Auf <b>Ja</b> setzen, um die CB-Vorschaubilder auch in den Listen (Posteingang, Postausgang usw.) anzuzeigen.');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Alle Benutzer');
DEFINE ('_UDDEIM_CONNECTIONS', 'Verbindungen');
DEFINE ('_UDDEIM_SETTINGS', 'Einstellungen');
DEFINE ('_UDDEIM_NOSETTINGS', 'Es gibt keine Einstellungen, die sie ver�ndern k�nnen.');
DEFINE ('_UDDEIM_ABOUT', 'Info'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Schreiben'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Mail Benachrichtigung');
DEFINE ('_UDDEIM_EMN_EXP', 'Sie k�nnen sich per E-Mail �ber neue Nachrichten benachrichtigen lassen.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-Mail Benachrichtigung bei neuen Nachrichten.');
DEFINE ('_UDDEIM_EMN_NONE', 'Keine E-Mail Benachrichtigungen');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Benachrichtigen, wenn nicht eingeloggt');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Keine Benachrichtigung bei Antworten');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Blocken'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Sie k�nnen Benutzer blocken, die Ihnen dann keine Nachrichten mehr schicken k�nnen. W�hlen sie <b>Benutzer blocken</b>, wenn sie eine Nachricht lesen.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', '�nderung speichern');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB-Tags f�r fett Text. Verwendung: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB-Tags f�r kursiven Text. Verwendung: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB-Tags f�r unterstrichenen Text. Verwendung: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB-Tags f�r farbigen Text. Verwendung [color=#XXXXXX]colored[/color] mit dem Hex-Code der gew�nschte Farbe als XXXXXX, zum Beispiel FF0000 f�r rot.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB-Tags f�r farbigen Text. Verwendung [color=#XXXXXX]colored[/color] mit dem Hex-Code der gew�nschte Farbe als XXXXXX, zum Beispiel 00FF00 f�r gr�n.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB-Tags f�r farbigen Text. Verwendung [color=#XXXXXX]colored[/color] mit dem Hex-Code der gew�nschte Farbe als XXXXXX, zum Beispiel 0000FF f�r blau.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB-Tags f�r sehr kleinen Text. Verwendung: [size=1]very small Text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB-Tags f�r kleinen Text. Verwendung: [size=2] small Text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB-Tags f�r gro�en Text. Verwendung: [size=4]big Text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB-Tags f�r sehr gro�en Text. Verwendung: [size=5]very big Text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB-Tags f�r Bild-Links. Verwendung: [img]Image-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB-Tags f�r Weblinks. Verwendung: [url]web address[/url]. Das http:// am Beginn der Adresse nicht vergessen!');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Alle BB-Tags schlie�en.');
