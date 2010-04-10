<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         ï¿½ 2007-2008 Stephan Slabihoud, ï¿½ 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: Italian (source file is Latin-1)
// Translator:    Viames Marino
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Carica MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Questo indica come uddeIM carica MooTools (MooTools è richiesto per l&rsquo;Autocompletamento): <i>non caricare MooTools</i> va utilizzato se il tuo template carica già MooTools, <i>auto</i> è consigliato (come accade in uddeIM 1.2), quando utilizzi J1.0 puoi anche forzare il caricamento di MooTools 1.1 o 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'non caricare MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'forza caricamento di MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'forza caricamento di MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...impostazione predefinita per MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Codifica Base64');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Imposta fuso orario');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Se uddeIM mostra un orario sbagliato puoi correggere il fuso orario. Solitamente, se tutto è configurato correttamente, questo dev&rsquo;essere zero. Tuttavia, vi possono essere casi in cui è necessario modificare questo valore.');
DEFINE ('_UDDEADM_HOURS', 'ore');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Informazioni versione:');
DEFINE ('_UDDEADM_STATISTICS', 'Statistiche:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Mostra statistiche');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Mostra alcune come numero dei messaggi memorizzati ecc.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'MOSTRA STATISTICHE');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Messaggi memorizzati nella base di dati: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Messaggi cestinati dal destinatario: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Messaggi cestinati dal mittente: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Messaggi trattenuti per la cancellazione: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Sovrascrivi Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Solitamente uddeIM rileva l&rsquo;Itemid corretto quando non è impostato. In alcuni casi potrebbe essere necessario sovrascrivere questo valore, per esempio quando si utilizzano diversi collegamenti per uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'L&rsquo;Itemid rilevato è: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Usa Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Usa questo Itemid invece che rilevarlo.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Usa collegamenti al profilo');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Quando impostato su <i>si</i>, tutti i nomi utente mostrati in uddeIM saranno visualizzati come collegamenti al loro profilo.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Mostra miniature');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Quando impostato su <i>si</i>, le miniature dei relativi utenti saranno visualizzate mentre si legge un messaggio.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Mostra miniature nelle liste');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Imposta su <i>si</i> se vuoi visualizzare miniature degli utenti nelle caselle di anteprima dei messaggi (Ricevuti, Spediti ecc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Disattivo');
DEFINE ('_UDDEADM_ENABLED', 'Attivo');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Importante');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Permetti di contrassegnare i messaggi');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Permette di contrassegnare i messaggi (uddeIM mostra una stella che può essere evidenziata per contrassegnare i messaggi importanti).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Importante: Se hai aggiornato uddeIM da una versione precedente per favore controlla il file README. Potrebbe essere necessario aggiungere o modificare campi o tabelle della base di dati!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Aggiungi CC: destinatari');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Limita il testo citato');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Limita il testo citato a 2/3 della lunghezza massima del testo se eccede questo limite.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Oggetti ricevuti ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Ultimo ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' oggetti');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Stato');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Mittente');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Messaggio');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Svuota Posta Ricevuta');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Non &egrave; consentito l&rsquo;accesso al cestino.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Accesso limitato al cestino');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Puoi limitare l&rsquo;accesso al cestino. Solitamente il cestino &egrave; disponibile per tutti (<i>nessun divieto</i>). Tu puoi vietare l&rsquo;accesso a utenti speciali o solo agli amministratori, cos&igrave; i gruppi con diritti di accesso inferiore non potranno riciclare i messaggi.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'nessuna limitazione');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'utenti speciali');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'solo amministratori');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Nascondi utenti dalla lista pubblica');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Inserisci gli ID da nascondere nella lista utenti pubblica (per es. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Nascondi utenti dalla lista');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Inserisci gli ID da nascondere nella lista utenti (per es. 65,66,67). Admins will always see the complete list.');
DEFINE ('_UDDEIM_ERRORCSRF', 'Intercettato attacco CSRF');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'Protezione CSRF');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Questo protegge tutti i moduli dati dall&rsquo;attacco Cross-Site Request Forgery. Solitamente dovrebbe essere attivato. Solo in caso di anomalie sul sito pu&ograve; essere disattivato.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Non puoi rispondere ai messaggi archiviati.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Le risposte agli utenti non registrati non possono essere richiamate.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Permetti risposte');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Permetti risposte dirette ai messaggi da utenti non registrati.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Ciao %user%,\n\n%you% ti ha spedito il seguente messaggio privato al sito web %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Mostra nomi veri');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Mostra nomi veri o pseudonimi nell&rsquo;Area Pubblica?');
DEFINE ('_UDDEIM_USERLIST', 'Lista utenti');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Spiacente, devi aspettare prima di poter spedire un nuovo messaggio');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Ultima spedizione');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Tempo Attesa');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Tempo in secondi che un utente deve attendere prima che possa spedire un nuovo messaggio (0 per nessuna attesa).');
DEFINE ('_UDDEADM_SECONDS', 'secondi');
DEFINE ('_UDDEIM_PUBLICSENT', 'Messaggio spedito.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Errore nel nome del mittente');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Errore nell&rsquo;indirizzo email');
DEFINE ('_UDDEIM_YOURNAME', 'Tuo nome:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Tua email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Stai usando uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Stai utilizzando l&rsquo;ultima versione di uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'La versione attuale &egrave; ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Informazioni aggiornamento:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Verifica aggiornamenti');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Questo contatter&agrave; il sito web dello sviluppatore di uddeIM per ricevere informazioni sull&rsquo;attuale versione di uddeIM. Non saranno trasmesse informazioni ulteriori alla versione uddeIM in uso.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'VERIFICA');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Impossibile ricevere informazioni sulla versione.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Non trovata la lista contatti!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Ecceduto il numero ammesso di destinatari (massimo ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Massimo numero di voci');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Massimo numero di voci ammesse per lista contatti.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Le liste contatti non sono attivate');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Attiva liste contatti');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM permette la creazione di liste contatti. Queste liste possono essere utilizzate per spedire messaggi a pi&ugrave; utenti. Non dimenticare di attivare i destinatari multipli se vuoi utilizzare le liste contatti.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'disattivata');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'utenti registrati');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'utenti speciali');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'solo amministratori');
DEFINE ('_UDDEIM_LISTSNEW', 'Crea nuova lista contatti');
DEFINE ('_UDDEIM_LISTSSAVED', 'Lista contatti memorizzata');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Lista contatti modificata');
DEFINE ('_UDDEIM_LISTSDESC', 'Descrizione');
DEFINE ('_UDDEIM_LISTSNAME', 'Nome');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Nome (senza spazi)');
DEFINE ('_UDDEIM_EDITLINK', 'modifica');
DEFINE ('_UDDEIM_LISTS', 'Contatti');
DEFINE ('_UDDEIM_STATUS_READ', 'letto');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'non letto');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'presente');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'assente');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Mostra immagini galleria CB');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Normalmente uddeIM mostra solo le foto personali caricate dagli utenti. Quando &egrave; attivata questa opzione, uddeIM mostra anche le immagini personali dalla galleria CB.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Sblocca connessioni CB');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Puoi permettere la spedizione di messaggi ai destinatari che fanno parte degli utenti connessi al mittente (anche qualora il destinatario si trovi in un gruppo bloccato). Questa impostaziont &egrave; indipendente dalla configurazione individuale degli utenti bloccati quando attivata (vedi impostazioni in alto).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Non ti &egrave; permesso l&rsquo;invio di messaggi a questo gruppo.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Il destinatario ti sta bloccando.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Gruppo bloccato (utenti registrati)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Gruppi ai quali gli utenti registrati non possono spedire messaggi. Questa è solo per utenti registrati. Non riguarda utenti speciali e amministratori. Questa impostazione è indipendente dal blocco individuale che ogni utente può impostare se attivo (vedi impostazioni precedenti).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Gruppi bloccati (utenti pubblici)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Gruppi ai quali gli utenti pubblici non possono spedire messaggi. Questa impostazione è indipendente dal blocco individuale che ogni utente può impostare se attivo (vedi impostazioni precedenti). Quando blocchi un gruppo, gli utenti nel gruppo non possono vedere l&rsquo;opzione per attivare il frontend pubblico nelle impostazioni personali.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Utenti pubblici');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'Connessioni CB');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Utenti registrati');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Autore');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editore');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Pubblicista');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Amministratore');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAmministratore');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Gli utenti accettano messaggi solo dagli utenti registrati.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Nascondi lista "Tutti gli utenti" al pubblico');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Puoi nascondere certi gruppi dalla lista pubblica "Tutti gli utenti". Nota: questo nasconde solo i nomi, gli utenti possono comunque riceve messaggi. Gli utenti che non hanno attivato L&rsquo;Area Pubblica non saranno mai elencati in questa lista.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Nascondi dalla lista "Tutti gli utenti"');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Puoi nascondere certi gruppi dalla lista "Tutti gli utenti". Nota: questo nasconde solo i nomi, gli utenti possono comunque riceve messaggi.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'nessuno');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'solo super amministratori');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'solo amministratori');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'utenti speciali');
DEFINE ('_UDDEADM_PUBLIC', 'Publico');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Comportamento del collegamento "Tutti gli utenti"');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Scegli se il collegamento "Tutti gli utenti" deve essere soppresso nell&rsquo;Area Pubblica, mostrato o se tutti gli utenti devono essere sempre mostrati.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Area Pubblica');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- scegli pubblico -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Permetti agli utenti pubblici di spedire un messaggio');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Limite di messaggi raggiunto!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Utenti Pubblici');
DEFINE ('_UDDEIM_DELETEDUSER', 'Utenti eliminati');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Lunghezza Captcha');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Specifica quanti caratteri devono essere inseriti dall&rsquo;utente.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Protezione spam Captcha');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Specifica chi deve inserire il captcha per spedire un messaggio');
DEFINE ('_UDDEADM_CAPTCHAF0', 'disattivato');
DEFINE ('_UDDEADM_CAPTCHAF1', 'solo utenti pubblici');
DEFINE ('_UDDEADM_CAPTCHAF2', 'utenti pubblici e registrati');
DEFINE ('_UDDEADM_CAPTCHAF3', 'utenti pubblici, registrati e speciali');
DEFINE ('_UDDEADM_CAPTCHAF4', 'tutti gli utenti (compresi amministratori)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Attiva Area Pubblica');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Quando attiva, gli utenti pubblici possono spedire messaggi agli utenti registrati (che potranno a loro volta scegliere nelle impostazioni personali se utilizzare questa funzionalit&agrave;).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Area Pubblica predefinita');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Questo &egrave; il valore predefinito se &egrave; concesso l&rsquo;invio di un messsaggio da un utente pubblico ad un utente registrato.');
DEFINE ('_UDDEADM_PUBDEF0', 'disattivato');
DEFINE ('_UDDEADM_PUBDEF1', 'attivato');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Codice sicurezza errato');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'Nessuno o sconosciuto');
DEFINE ('_UDDEADM_DONATE', 'Se ti piace uddeIM e vuoi sostenerne lo sviluppo, offri un piccolo contributo con una donazione.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Configurazione recuperata dalla base di dati: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Backup e recupero configurazione');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Puoi memorizzare la tua configurazione nella base di dati e recuperarla quando necessario. &Egrave; molto utile quando aggiorni uddeIM o quando vuoi memorizzare particolari configurazioni durante un collaudo.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'BACKUP');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RIPRISTINO');
DEFINE ('_UDDEADM_CANCEL', 'Annulla');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Set di caratteri del file lingua');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Solitamente <b>predefinita</b> (ISO-8859-1) &egrave; l&rsquo;impostazione corretta per Joomla 1.0 e <b>UTF-8</b> per Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'predefinita');
DEFINE ('_UDDEIM_READ_INFO_1', 'I messaggi letti rimarranno nella posta ricevuta per ');
DEFINE ('_UDDEIM_READ_INFO_2', ' giorni al massimo prima di essere eliminati automaticamente.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'I messaggi non letti rimarranno nella posta ricevuta per ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' giorni al massimo prima di essere eliminati automaticamente.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'I messaggi spediti rimarranno nella posta spedita per ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' giorni al massimo prima di essere eliminati automaticamente.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Mostra nota per i messaggi letti');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Mostra la nota "Elimina i messaggi letti dopo n giorni" nella posta ricevuta');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Mostra nota per i messaggi non letti');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Mostra la nota "Elimina i messaggi non letti dopo n giorni" nella posta ricevuta');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Mostra nota per i messaggi spediti');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Mostra la nota "Elimina i messaggi spediti dopo n giorni" nella posta spedita');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Mostra nota per i messaggi cestinati');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Mostra la nota "Elimina i messaggi dopo n giorni" nel cestino');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Messaggi spediti mantenuti per (giorni)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Inserisci il numero di giorni prima che i messaggi <b>spediti</b> siano automaticamente eliminati dalla posta spedita.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'invia a tutti gli utenti speciali');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Messaggio a <b>tutti gli utenti speciali</b>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- seleziona pseudonimo -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- seleziona nome -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Modifica impostazioni utente');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'esistente');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'non esistente');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- seleziona immissione -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- seleziona notifica -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- seleziona popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Pseudonimo');
DEFINE ('_UDDEADM_USERSET_NAME', 'Nome');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Notifica');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Ultimo accesso');
DEFINE ('_UDDEADM_USERSET_NO', 'No');
DEFINE ('_UDDEADM_USERSET_YES', 'Si');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'sconosciuto');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Quando assente (risposte escluse)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Sempre (risposte escluse)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Quando assente');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Sempre');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Nessuna notifica');
DEFINE ('_UDDEADM_WELCOMEMSG', "Benvenuto a uddeIM!\n\nHai installato correttamente uddeIM.\n\nProva a vedere questo messaggio su differenti template. Puoi impostarli dal lato amministrativo di uddeIM.\n\nuddeIM &egrave; un progetto in sviluppo. Se scopri errori o difetti, per favore inviali a me cos&igrave; possiamo migliorare uddeIM insieme.\n\nBuona fortuna e divertiti!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'Installazione uddeIM completata.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Per favore continua nel lato amministrativo rivedendo le impostazioni.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Se stai utilizzando il CMS con un set di caratteri diverso da ISO 8859-1 assicurati che sia impostato anche nella configurazione.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Dopo l&rsquo;installazione, tutto il traffico email di uddeIM (notifiche email, promemoria) &egrave; disattivato in modo da non spedire email durante il collaudo. Non dimenticare di disattivare "ferma e-mail" nell&rsquo;area amministrativa quando hai finito.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Massimi destinatari');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Massimo numero di destinatari ammessi per messaggio (0=nessun limite)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'troppi destinatari');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Spedizione di email disattivata.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Ricerca nel testo');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'L&rsquo;auto-completamento cerca nel testo (altrimenti cerca solo l&rsquo;inizio)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Comportamento del collegamento "Tutti gli utenti"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Scegli se il collegamento "Tutti gli utenti" dovrebbe essere soppresso, mostrato o se tutti gli utenti dovrebbero essere sempre visualizzati.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Sopprimi collegamento "Tutti gli utenti"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Mostra collegamento "Tutti gli utenti"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Mostra sempre tutti gli utenti');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'La configurazione non &egrave; modificabile:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'La configurazione &egrave; modificabile:');
DEFINE ('_UDDEIM_FORWARDLINK', 'inoltra');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'destinatario trovato');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'destinatari trovati');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (predefinito)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Sistema di posta');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Seleziona il sistema di posta che uddeIM deve utilizzare per inviare le notifiche.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Mostra gruppi di Joomla');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Mostra i gruppi di Joomla nella lista generale dei messaggi.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Inoltro dei messaggi');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Permetti inoltro dei messaggi.');
DEFINE ('_UDDEIM_FWDFROM', 'Messaggio originale da');
DEFINE ('_UDDEIM_FWDTO', 'a');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Dearchivia messaggio');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Impossibile dearchiviare il messaggio');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Permetti destinatari multipli');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Permetti destinatari multipli (separati da virgola).');
DEFINE ('_UDDEIM_CHARSLEFT', 'caratteri rimanenti');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Mostra contatore di caratteri');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Mostra un contatore del testo che indica quanti caratteri si possono ancora scrivere.');
DEFINE ('_UDDEIM_CLEAR', 'Pulisci');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Aggiungi i destinatari selezionati alla lista');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Questo attiva la selezione di destinatari multipli.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Aggiungi le connessioni selezionate alla lista');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Questo attiva la selezione di destinatari multipli.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS trovati: ');
DEFINE ('_UDDEIM_ENTERNAME', 'inserisci un nome');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Usa completamento automatico');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Usa completamento automatico per i nomi dei destinatari.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Chiave utilizzata per l&rsquo;offuscamento');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Inserisci la chiave da utilizzare per l&rsquo;offuscamento dei messaggi. Non cambiare questo valore dopo che l&rsquo;offuscamento dei messaggi &egrave; stato attivato.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Il file di configurazione trovato non &egrave; corretto!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Versione trovata:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Versione attesa:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Conversione configurazione...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Fatto!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Errore grave: La scrittura del file di configurazione &egrave; fallita:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Messaggio cifrato! - Impossibile scaricare!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Password errata! - Impossibile scaricare!');
DEFINE ('_UDDEIM_WRONGPW', 'Password errata! - Per favore contatta l&rsquo;amministratore della base di dati!');
DEFINE ('_UDDEIM_WRONGPASS', 'Password errata!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Data di cestinamento errata (ricevuti/spediti): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Correzione date di cestinamento errate');
DEFINE ('_UDDEIM_TODP', 'A: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Sfoltisci messaggi adesso');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Mostra icone azioni');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Quando impostato su <b>si</b>, i collegamenti alle azioni vengono rappresentati da icone.');
DEFINE ('_UDDEIM_UNCHECKALL', 'deseleziona tutti');
DEFINE ('_UDDEIM_CHECKALL', 'seleziona tutti');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Mostra icone inferiori');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Quando impostato su <b>si</b>, i collegamenti in basso vengono rappresentati da icone.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Usa emoticon animate');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Usa le emoticon animate invece di quelle statiche.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Emoticon animate aggiuntive');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Mostra le emoticon animate aggiuntive.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Messaggi cifrati - Password necessaria');
DEFINE ('_UDDEIM_PASSWORD', '<b>Password necessaria</b>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Password');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (testo cifratura)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (testo decifratura)');
DEFINE ('_UDDEIM_MORE', 'ALTRE');			
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Messaggi Privati');
DEFINE ('_UDDEMODULE_NONEW', 'nessun messaggio nuovo');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nuovi messaggi: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'messaggio');
DEFINE ('_UDDEMODULE_MESSAGES', 'messaggi');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Hai');
DEFINE ('_UDDEMODULE_HELLO', 'Ciao');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Messaggio rapido');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Usa cifratura');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Cifra i messaggi memorizzati');
DEFINE ('_UDDEADM_CRYPT0', 'Nessuno');
DEFINE ('_UDDEADM_CRYPT1', 'Offusca messaggi');
DEFINE ('_UDDEADM_CRYPT2', 'Cifra messaggi');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Predefinito per notifica email');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Predefinito per notifica email (per utenti che non hanno ancora modificato le loro preferenze).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Nessuna notifica');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Sempre');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Notifica quando assente');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Nascondi collegamento "Tutti gli utenti"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Nascondi collegamento "Tutti gli utenti" nella pagina Componi nuovo messaggio (molto utile per siti con molti utenti registrati).');
DEFINE ('_UDDEADM_POPUP_HEAD','Notifica popup');
DEFINE ('_UDDEADM_POPUP_EXP','Mostra un popup quando arriva un nuovo messaggio (&egrave; richiesto mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', 'Altre impostazioni');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Qui puoi configurare ulteriori impostazioni.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Mostra un popup quando arriva un nuovo messaggio');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Notifica popup predefinita');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Abilita la notifica popup predefinita (per utenti che non hanno ancora modificato le loro preferenze).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Manutenzione');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Cestina i messaggi degli utenti eliminati');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'CONTROLLA');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'CESTINA');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', 'Quando un utente viene eliminato dalla base di dati, i suoi messaggi rimangono memorizzati. Questa funzione controlla se ci sono messaggi orfani e ti permette di cestinarli se necessario.');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', 'Verifica...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (Nome utente): [inbox|inbox trashed|outbox|outbox trashed]</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>ricevuti: messaggi memorizzati nella posta ricevuta</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>ricevuti cestinati: messaggi cestinati dalla posta ricevuta, ma ancora presenti nella posta spedita dei rispettivi mittenti</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>outbox: messaggi memorizzati nella posta spedita</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>spediti cestinati: messaggi cestinati dalla posta spedita, ma ancora presenti nella posta ricevuta dei rispettivi destinatari</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', 'Cestinamento...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', '<b>#$i non trovato (da/a): $mvon/$man</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT2', 'Elimina tutte le preferenze dell&rsquo;utente #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT3', 'Elimina i blocchi dell&rsquo;utente #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT4', 'cestina tutti i messaggi spediti all&rsquo;utente #$i nella posta spedita del mittente e nella posta ricevuta dell&rsquo;utente #$i<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT5', 'cestina tutti i messaggi spediti dall&rsquo;utente #$i nella posta spedita di #$i e nella posta ricevuta del destinatario<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nessuna attivit&agrave; necessaria</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Manutenzione necessaria</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Mostra nomi veri');
DEFINE ('_UDDEADM_NAMESDESC', 'Mostra nomi veri o pseudonimi?');
DEFINE ('_UDDEADM_REALNAMES', 'Nomi veri');
DEFINE ('_UDDEADM_USERNAMES', 'Pseudonimi');
DEFINE ('_UDDEADM_CONLISTBOX', 'Lista connessioni');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Mostra le mie connessioni in elenco o in tabella?');
DEFINE ('_UDDEADM_LISTBOX', 'Elenco');
DEFINE ('_UDDEADM_TABLE', 'Tabella');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'I messaggi resteranno nel cestino per 24 ore prima di essere eliminati. Puoi vedere solo le prime parole del messaggio. Per leggere tutto il messaggio devi prima ripristinarlo.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'I messaggi resteranno nel cestino per ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' ore prima di essere eliminati. Puoi vedere solo le prime parole del messaggio. Per leggere tutto il messaggio devi prima ripristinarlo.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Questo messaggio &egrave; stato richiamato. Adesso puoi modificarlo e rispedirlo.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Il messaggio non pu&ograve; essere richiamato (probabilmente &egrave; stato letto o eliminato.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Ripristino messaggio fallito. (Probabilmente &egrave; rimasto per troppo a lungo nel cestino e nel frattempo &egrave; stato cancellato.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Ripristino messaggio fallito.');
DEFINE ('_UDDEIM_DONTSEND', 'Non spedire');
DEFINE ('_UDDEIM_SENDAGAIN', 'Rispedisci');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Non sei identificato sul sito.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<b>Non hai messaggi nella posta ricevuta.</b>');
	// changed in 0.4 (one dot that was too much after </b> deleted)
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<b>Non hai messaggi nella posta spedita.</b>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<b>Non hai messaggi nel tuo cestino.</b>');
DEFINE ('_UDDEIM_INBOX', 'Ricevuti');
DEFINE ('_UDDEIM_OUTBOX', 'Spediti');
DEFINE ('_UDDEIM_TRASHCAN', 'Cestino');
DEFINE ('_UDDEIM_CREATE', 'Nuovo messaggio');
DEFINE ('_UDDEIM_UDDEIM', 'Messaggi privati');
DEFINE ('_UDDEIM_READSTATUS', 'Letto');
DEFINE ('_UDDEIM_FROM', 'Da');
DEFINE ('_UDDEIM_FROM_SMALL', 'da');
DEFINE ('_UDDEIM_TO', 'A');
DEFINE ('_UDDEIM_TO_SMALL', 'a');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'La tua posta spedita contiene tutti i messaggi che hai spedito e che non sono stati ancora eliminati. Puoi richiamare un messaggio dalla posta spedita se non &egrave; stato letto. Se lo fai, non potr&agrave; pi&ugrave; essere letto dal destinatario. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'richiama');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Richiama questo messaggio');
DEFINE ('_UDDEIM_RESTORE', 'ripristina');
DEFINE ('_UDDEIM_MESSAGE', 'Messaggio');
DEFINE ('_UDDEIM_DATE', 'Data');
DEFINE ('_UDDEIM_DELETED', 'Eliminato');
DEFINE ('_UDDEIM_DELETE', 'elimina');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'elimina');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Questo messaggio non pu&ograve; essere visualizzato. <br />Cause possibili:<ul><li>Non hai i diritti necessari per leggere questo particolare messaggio</li><li>Il messaggio &egrave; stato eliminato</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Hai spostato questo messaggio nel cestino.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Messaggio da ');
DEFINE ('_UDDEIM_MESSAGETO', 'Messaggio da te stesso a ');
DEFINE ('_UDDEIM_REPLY', 'Rispondi');
DEFINE ('_UDDEIM_SUBMIT', 'Spedisci');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Sposta i messaggi originali nel cestino dopo la risposta');
DEFINE ('_UDDEIM_NOID', 'Errore: Non trovato ID ricevente. Messaggio non spedito.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Errore: Il messaggio non contiene testo! Messaggio non spedito.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Risposta spedita');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Messaggio spedito');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' e messaggio originale spostato nel cestino');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Non ci sono utenti con questo pseudonimo!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Non &egrave; possibile spedire un messaggio a te stesso!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Violazione di accesso!</b> Non hai diritti per compiere questa azione!');
DEFINE ('_UDDEIM_PRUNELINK', 'Solo amministratori: Sfoltisci');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'Amministrazione uddeIM');
DEFINE ('_UDDEADM_GENERAL', 'Generale');
DEFINE ('_UDDEADM_ABOUT', 'Info');
DEFINE ('_UDDEADM_DATESETTINGS', 'Data/ora');
DEFINE ('_UDDEADM_PICSETTINGS', 'Icone');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Messaggi letti mantenuti per (giorni)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Messaggi non letti mantenuti per (giorni)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Messaggi nel cestino mantenuti per (giorni)');
DEFINE ('_UDDEADM_DAYS', 'giorno(i)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Inserisci il numero di giorni prima che i messaggi <b>letti</b> vengano eliminati dalla vostra posta ricevuta. Se non volete utilizzare la funzione eliminazione automatica, inserite un valore molto alto (ad esempio, 36524 giorni che corrispondono ad un secolo). Ma considera che conservando tutti i messaggi, la base di dati crescer&agrave; rapidamente.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Inserisci il numero di giorni prima che i messaggi <b>non letti</b> vengano eliminati.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Inserisci il numero di giorni prima che i messaggi vengano eliminati dal cestino. Pu&ograve; essere impostato anche un valore pi&ugrave; basso di 1. Esempio: Per eliminare i messaggi dal cestino dopo 3 ore, inserire 0.125 come valore.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Formato data mostrato');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Scegli il formato della data/ora dei messaggi. I mesi vengono abbreviati in accordo al file lingua locale  (se il file lingua in uddeIM &egrave; presente).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Mostra data estesa');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Durante la visualizzazione del messaggio c&rsquo;&egrave; pi&ugrave; spazio per la stringa data/ora. Per i giorni della settimana ed i mesi viene utilizzata la lingua locale (se &egrave; presente un il file di traduzione uddeIM corrispondente).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Invocazione Cancellazione Automatica');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'solo dagli amministratori');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'da ogni utente');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manualmente');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'La cancellazione automatica comporta un grosso lavoro per la base di dati. Se scegli <b>solo&nbsp;dagli&nbsp;amministratori</b>, la cancellazione automatica viene eseguita quando un amministratore controlla la sua casella di posta ricevuta. Scegli questo metodo se l&rsquo;amministratore controlla di frequente la sua casella di posta ricevuta. I piccoli siti poco amministrati dovrebbero scegliere <b>da ogni utente</b>.');

	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Memorizza impostazioni');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Le seguenti impostazioni sono state memorizzate nel file config:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Impostazioni memorizzate correttamente.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icona: Utente presente');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Inserire il percorso della icona che desiderate mostrare dopo il nome utente quando questo utente &egrave; presente.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icona: Utente assente');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Inserire il percorso della icona che desiderate mostrare dopo il nome utente quando questo utente &egrave; assente.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Icona: Messaggio letto');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Inserire il percorso della icona che desiderate mostrare per i messaggi letti.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icona: Messaggio da leggere');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Inserire il percorso della icona che desiderate mostrare per i messaggi da leggere.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modulo: Icona nuovo messaggio');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Questo parametro si riferisce al modulo mod_uddeim_new. Inserire il percorso della icona che desiderate mostrare per questo modulo quando si ricevono nuovi messaggi.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'Installazione UddeIM ');
DEFINE ('_UDDEADM_FINISHED', 'Installazione completata');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Non hai il componente Community Builder installato. Non sarai in grado di utilizzare uddeIM.</span><br /><br />Puoi scaricarlo da <a href="http://www.joomlapolis.com">Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continua');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Ci sono ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' messaggi nella tua installazione di myPMS . Desideri importarli in uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Questa opzione non altera i messaggi di myPMS o la tua installazione. Essi rimarranno intatti. Puoi tranquillamnete importarli in uddeIM, se intendi continuare ad utilizzare myPMS. (Devi memorizzare ogni modifica apportata alla configurazione prima di iniziare la procedura di importazione!) Ogni messaggio che si trova attualmente nel database uddeIM rimarr&agrave; intatto.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4

DEFINE ('_UDDEADM_IMPORT_YES', 'Importa messaggi myPMS in uddeIM adesso');
DEFINE ('_UDDEADM_IMPORT_NO', 'No, non desidero importare alcun messaggio');
DEFINE ('_UDDEADM_IMPORTING', 'Attendere: sto importando i messaggi.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Importazione messaggi da myPMS eseguita correttamente. Non effettuate questa procedura di nuovo in quanto verranno importati nuovamente i messaggi che potrebbero apparire doppi.');
DEFINE ('_UDDEADM_IMPORT', 'Importa');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importa messaggi da myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Nessuna intallazione di myPMS trovata. Importazione impossibile.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Hai gi&agrave; importato i messaggi da myPMS in UddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Bloccato');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Non inviato (l&rsquo;utente ti ha bloccato)');
DEFINE ('_UDDEIM_BLOCKNOW', 'blocca&nbsp;utente');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Questa &egrave; la lista degli utenti che stai bloccando. Questi utenti non potranno inviarti messaggi privati.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Al momento non stai bloccando alcun utente.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Hai bloccato ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' utente(i).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[sblocca]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Se un utente bloccato tenta di inviarti un messaggio, egli (ella) verr&agrave; informato che &egrave; bloccato e che il messaggio non &egrave; stato spedito.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Un utente bloccato non pu&ograve; sapere che lo hai bloccato.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Non puoi bloccare gli amministratori.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Abilita sistema blocco');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Quando attivata, un utente pu&ograve; bloccare altri utenti. Un utente bloccato non pu&ograve; inviare messaggi agli utenti che lo hanno bloccato. Gli amministratori non possono essere bloccati.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'si');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'no');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Utente bloccato riceve notifiche');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Se configurato su <b>si</i>, un utente bloccato verr&agrave; informbto che il suo messaggio non &egrave; stato spedito poich&egrave; il destinatario lo ha bloccato. Se configurato su <i>no</i>, l\'utente bloccato non ricever&agrave; alcuna notifica che il suo messaggio non &egrave; stato spedito .');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'si');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'no');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistema blocco non attivato');
// DEFINE ('_UDDEADM_DELETIONS', 'Messaggi');
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Gestione'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blocco');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integrazione');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Mostra collegamenti CB');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Se configurato su <b>si</b>, tutti gli pseudonimi mostrati in uddeIM vengono visualizzati come collegamenti ai profili di Community Builder.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Mostra miniature CB');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Se configurato su <b>si</b>, le miniature dei rispettivi utenti vengono visualizzate durante la lettura di un messaggio.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Mostra presenza');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Se configurato su <b>si</b>, uddeIM mostra ogni pseudonimo con una piccola icona che informa sulla presenza dell&rsquo;utente.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Permetti notifica e-mail');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Se configurato su <b>si</b>, gli utenti possono scegliere se ricevere una e-mail all&rsquo;arrivo di un nuovo messaggio.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail contiene messaggio');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Se configurato su <b>no</b>, le e-mail di notifica conterranno solo informazioni sul mittente e sulla data di spedizione del messaggio, senza il contenuto del messaggio.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'E-mail promemoria');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Questa funzione spedisce - indipendentemente dalle configurazioni individuali - una e-mail ad un utente che ha un messaggio non letto nella propria posta ricevuta da molto tempo (configura in basso). Questa configurazione &egrave; indipendente dalla configurazione \'permetti notifiche e-mail\'. Se non vuoi spedire mai messaggi e-mail devi disattivarli entrambi.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Promemoria spedito dopo giorni');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Se la funzione promemoria (in alto) &egrave configurata su <b>si</b>, inserire qui i giorni da attendere prima di inviare la notifica dei messaggi non letti.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Mostra primi caratteri');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Puoi configurare quanti caratteri di anteprima dei messaggi vengono mostrati in posta ricevuta, spedita e cestino.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Massima lunghezza messaggio');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Imposta qui la lunghezza massima di un messaggio. Esso verr&agrave; automaticamente troncato dopo questo numero. Imposta \'0\' per permettere messaggi di qualsiasi lunghezza (non consigliato).');
DEFINE ('_UDDEADM_YES', 'si');
DEFINE ('_UDDEADM_NO', 'no');
DEFINE ('_UDDEADM_ADMINSONLY', 'solo aministratori');
DEFINE ('_UDDEADM_SYSTEM', 'Sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Pseudonimo per messaggi di sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM supporta i messaggi di sistema. Questi non hanno un mittente visibile e gli utenti non possono rispondervi. Inserisci qui un alias predefinito per i messaggi di sistema (ad esempio <i>Supporto</i> o <i>Help desk</i> oppure <i>Responsabile Community</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Permetti agli amministratori di inviare messaggi generali');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM supporta messaggi generali. Questi vengono inviati a tutti gli utenti del sistema. Usare con giudizio.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nome mittente e-mail');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Inserire il nome dal quale arrivano le notifiche e-mail (ad esempio <b>Mio Sito</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Indirizzo e-mail mittente');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Inserire un indirizzo e-mail dal quale devono essere spedite le e-mail di notifica (questo potrebbe essere l&rsquo;indirizzo e-mail principale del tuo sito).');
DEFINE ('_UDDEADM_VERSION', 'uddeIM versione');
DEFINE ('_UDDEADM_ARCHIVE', 'Archivio'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Abilita archivio');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Scegli quali utenti saranno in grado di memorizzare messaggi in archivio. I messaggi in archivio non saranno eliminati.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Massimo numero di messaggi archiviabile');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Configura quanti messaggi potr&agrave; memorizzare ogni utente nel suo archivio (nessun limite per gli amministratori).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Permetti copie personali');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Permette agli utenti di ricevere copie dei messaggi che spediscono. Queste copie compariranno nella posta ricevuta.');
DEFINE ('_UDDEADM_MESSAGES', 'Messaggi');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Suggerisci di cestinare originali');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Quando attiva, questa inserir&agrave; una spunta vicino al pulsante \'Spedisci\' chiamato \'cestina originale\' che sar&agrave; automaticamente spuntato. In questo caso, un messaggio verr&agrave; immediatamente spostato dalla posta ricevuta al cestino quando viene spedita una risposta. Questa funzione terr&agrave; basso il numero di messaggi nella base di dati. Gli utenti possono sempre non spuntare la casella se vogliono conservare un messaggio nella posta ricevuta.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL

DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Messaggi per pagina');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Definire il numero di messaggi mostrati per pagina in posta ricevuta, posta spedita, cestino e archivio.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Charset utilizzato');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Se riscontri problemi con caratteri non-latin, puoi inserire qui il charset che uddeIM deve utilizzare per convertire il flusso di dati in codice HTML. <b>Se non ti &egrave; chiaro il significato, non modificare i valori predefiniti!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Charset mail utilizzato');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Se riscontri problemi con caratteri non-latin, puoi inserire qui il charset che uddeIM deve utilizzare per spedire le e-mail. <b>Se non ti &egrave; chiaro il significato, non modificare i valori predefiniti!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'

DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Questo &egrave; il contenuto della e-mail che gli utenti riceveranno quando &egrave; impostata l&acute;opzione sopra. Il contenuto del messaggio non sar&agrave; nella email. Mantieni intatte le variabili %you%, %user% e %site% . ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Questo &egrave; il contenuto della e-mail che gli utenti riceveranno quando &egrave; impostata l&acute;opzione sopra. Questa email include il contenuto del messaggio. Mantieni intatte le variabili %you%, %user%, %pmessage% e %site% . ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Questo &egrave; il contenuto della e-mail promemoria che gli utenti riceveranno quando &egrave; impostata l&acute;opzione sopra. Mantieni intatte le variabili %you% e %site%. ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Permetti agli utenti di scaricare i propri messaggi archiviati tramite invio di una email a loro stessi.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Permetti scaricamento');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Questo &egrave; il formato della e-mail che gli utenti riceveranno quando scaricheranno i propri messaggi dall&acute;archivio. Mantieni intatte le variabili %user%, %msgdate% e %msgbody% . ');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Configura limite posta ricevuta');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Puoi inserire il numero di messaggi nella posta ricevuta e il numero massimo di messaggi archiviati. In questo caso, il totale del numero di messaggi nella posta ricevuta ed in archivio  non devono superare il numero massimo configurato. In alternativa, possiamo configurare il limite della inbox senza un archivio. In tal caso, gli utenti non avranno il numero dei messaggi configurati per le  loro inbox. Se il numero massimo viene raggiunto, non saranno pi&ugrave; in grado di scrivere o rispondere a nessun messaggio prima di aver cancellato i vecchi messaggi dalla posta ricevuta o in archivio (gli utenti invece continueranno a riceve messaggi e saranno in grado di leggerli).');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Mostra limite utilizzo della posta ricevuta');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Mostra quanti messaggi un utente ha storicizzato (e quanti ne pu&ograve; ancora memorizzare) nella linea sotto la casella di posta ricevuta.');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Archivio disattivato. Come gestire i messaggi che sono memorizzati al suo interno?');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Lasciali');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Lasciali in archivio (agli utenti non &egrave; permesso accedere a questi perch&eacute; raggiunto il limite dei messaggi).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Sposta in posta ricevuta');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Messaggi archiviati spostati nella casella di posta ricevuta');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'I messaggi verranno spostati nelle caselle di posta ricevuta dei rispettivi utenti (o nel cestino se sono pi&ugrave; vecchi di quelli permessi nella posta ricevuta).');


// 0.4 frontend, admins only (no translation necessary)
DEFINE ('_UDDEIM_VALIDFOR_1', 'valido per ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' ore. 0=per sempre (applica cancellazione automatica)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Crea messaggio sistema o generale]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Crea un messaggio normale (predefinito)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Messaggi di sistema e messaggi generali non permessi.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Scrivi un messaggio');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Aiuto per messaggi di sistema');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(apri in nuova finestra)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Stai per spedire il messaggio mostrato di seguito, controllalo e poi confermalo o annullalo!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Messaggio per <b>tutti gli utenti</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Messaggio per <b>tutti gli amministratori</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Messaggio per <b>tutti gli utenti collegati in questo momento</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Il destinatario non potr&agrave; rispondere a questo messaggio.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Il messaggio  viene spedito con <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> come pseudonimo');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Il messaggio scadr&agrave; ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Il messaggio non scadr&agrave;');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Controlla il collegamento web (cliccandolo) prima di procedere!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Utilizzo solo nei<b>messaggi di sistema</b>:<br /> [b]<b>grassetto</b>[/b] [i]<em>corsivo</em>[/i]<br />
[url=http://www.someurl.com]pagina web[/url] oppure [url]http://www.someurl.com[/url] sono collegamenti');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Errore: Nessun destinatario trovato. Messaggio non spedito.');

DEFINE ('_UDDEIM_CANTREPLY', 'Non puoi rispondere a questo messaggio.');
DEFINE ('_UDDEIM_EMNOFF', 'La notifica E-mail &egrave; disattivata. ');
DEFINE ('_UDDEIM_EMNON', 'La notifica E-mail &egrave; attivata. ');
DEFINE ('_UDDEIM_SETEMNON', '[attiva]');
DEFINE ('_UDDEIM_SETEMNOFF', '[disattiva]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Salve %you%,\n\n%user% ti ha spedito un messaggio privato su %site%. Collegati al sito per leggerlo!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Salve %you%,\n\n%user% ti ha spedito il seguente messaggio privato su %site%. Collegati al sito per rispondere!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Salve %you%,\n\nhai messaggi privati da leggere su %site%. Collegati al sito per leggerli!");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Hai messaggi su %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'invia come messaggio di sistema (=il ricevente non potr&agrave; rispondere)');
DEFINE ('_UDDEIM_SEND_TOALL', 'invia a tutti gli utenti');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'invia a tutti gli amministratori');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'invia a tutti gli utenti collegati');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Errore imprevisto: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Archivio non attivato.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Fallita la storicizzazione del messaggio in archivio.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Hai memorizzato  ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>Non hai memorizzato alcun messaggio nell&rsquo;archivio.</b>');
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Non hai messaggi in archivio.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' messaggi');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Hai memorizzato un messaggio');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Per memorizzare nuovi messaggi, devi prima eliminare qualche messaggio vecchio.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Puoi memorizzare un massimo di ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' messaggi.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Hai ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' messaggi in');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' messaggio in'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'archivio');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'posta ricevuta');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'posta ricevuta e archivio');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Il massimo numero di messaggi &egrave; ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Puoi ancora ricevere e leggere messaggi ma non puoi rispondere o spedire nuovi messaggi prima di averne eliminati alcuni.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Messaggi memorizzati: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(al massimo ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Messaggio memorizzato in archivio.');
DEFINE ('_UDDEIM_STORE', 'archivio');				// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'indietro');
DEFINE ('_UDDEIM_TRASHCHECKED', 'elimina selezionati');// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'mostra tutti');			// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Archivia');				// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Archivio pieno. Non memorizzato.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Nessun messaggio selezionato.');
DEFINE ('_UDDEIM_THISISACOPY', 'Copia di un messaggio spedito a ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'copia personale');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'copia in archivio');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'cestina originale');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Scarica messaggio');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Spedita l&rsquo;e-mail con i messaggi esportati');
DEFINE ('_UDDEIM_EXPORT_NOW', 'e-mail controllata da me');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Questa e-mail include i tuoi messaggi privati.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Impossibile spedire e-mail che contenene i messaggi.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Raggiunto il limite messaggi! Non ripristinato.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Scrivi un messaggio a ');

$udde_smon[1]="Gen";
$udde_smon[2]="Feb";
$udde_smon[3]="Mar";
$udde_smon[4]="Apr";
$udde_smon[5]="Mag";
$udde_smon[6]="Giu";
$udde_smon[7]="Lug";
$udde_smon[8]="Ago";
$udde_smon[9]="Set";
$udde_smon[10]="Ott";
$udde_smon[11]="Nov";
$udde_smon[12]="Dic";

$udde_lmon[1]="Gennaio";
$udde_lmon[2]="Febbraio";
$udde_lmon[3]="Marzo";
$udde_lmon[4]="Aprile";
$udde_lmon[5]="Maggio";
$udde_lmon[6]="Giugno";
$udde_lmon[7]="Luglio";
$udde_lmon[8]="Agosto";
$udde_lmon[9]="Settembre";
$udde_lmon[10]="Ottobre";
$udde_lmon[11]="Novembre";
$udde_lmon[12]="Dicembre";

$udde_lweekday[0]="Domenica";
$udde_lweekday[1]="Luned&igrave;";
$udde_lweekday[2]="Marted&igrave;";
$udde_lweekday[3]="Mercoled&igrave;";
$udde_lweekday[4]="Gioved&igrave;";
$udde_lweekday[5]="Venerd&igrave;";
$udde_lweekday[6]="Sabato";

$udde_sweekday[0]="Dom";
$udde_sweekday[1]="Lun";
$udde_sweekday[2]="Mar";
$udde_sweekday[3]="Mer";
$udde_sweekday[4]="Gio";
$udde_sweekday[5]="Ven";
$udde_sweekday[6]="Sab";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'Template uddeIM');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Scegli il template che desideri utilizzare con uddeIM');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Mostra connessioni CB');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Usa <b>si</b> se il componente Community Builder &egrave; installato e vogliamo che venga presentato con il nome nelle composizioni delle pagine dei nuovi messaggi.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Mostra configurazione');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Un collegamento alla configurazione appare in uddeIM se hai attivato le email di notifica o il sistema di blocco. Se non lo desideri, puoi disattivarlo qui. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'si, in basso');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Permetti BB code ');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'solo formato caratteri');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Usa <i>solo formato caratteri</i> per permettere agli utenti di utilizzare il BB code codes per grassetto, corsivo, sottolineato, colore ed ampiezza caratteri. Quando configuriamo questa opzione su <b>si</b>, gli utenti potranno utilizzare <b>tutti</b> i codici BB supportati nei loro messaggi (inclusi collegamenti web ed immagini).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Permetti Emoticon');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Quando configurato su <b>si</b>, i codici emoticon come :-) vengono rimpiazzati con emoticon grafiche nella vista messaggi. Vedi il file readme per la lista delle emoticon supportate.');
DEFINE ('_UDDEADM_DISPLAY', 'Mostra');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Mostra icone menu');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Quando configurato su <b>si</b>, menu e collegamenti ad azioni vengono visualizzate con una icona.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Titolo componente');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Inserire il titolo del vostro componente per la messaggistica privata, ad esempio \'Messaggi Privati\'. Lasciate il campo vuoto se non intendete utilizzarlo.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Mostra collegamento Info');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Configura su <b>si</b> per mostrare un collegamento web a crediti e licenza di uddeIM. Questo collegamento viene mostrato in basso al codice HTML di uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Ferma e-mail adesso');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Apponi la spunta su <b>si</b> per impedire ad uddeIM la spedizione di e-mail (notifiche e promemoria) trascurando le impostazioni individuali degli utenti, per esempio durante il collaudo del sito.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'Miniature CB nelle liste');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Imposta su <b>si</b> se vuoi mostrare le miniature CB degli utenti nella lista messaggi (ricevuti, spediti ecc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Tutti gli utenti');
DEFINE ('_UDDEIM_CONNECTIONS', 'Connessioni');
DEFINE ('_UDDEIM_SETTINGS', 'Configurazione');
DEFINE ('_UDDEIM_NOSETTINGS', 'Non ci sono opzioni da configurare.');
DEFINE ('_UDDEIM_ABOUT', 'Info'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Componi'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Notifica E-Mail');
DEFINE ('_UDDEIM_EMN_EXP', 'Puoi ricevere una e-mail quando arrivano nuovi messaggi privati.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Notifiche e-mail per nuovi messaggi');
DEFINE ('_UDDEIM_EMN_NONE', 'Nessuna notifica e-mail');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Notifica e-mail quando non connesso');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Non inviare notifica alle risposte');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Blocco utente'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Puoi impedire agli utenti di inviarti messaggi bloccandoli. Scegli <i>blocca utente</i> quando vedi un messaggio dal rispettivo utente.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Memorizza modifiche');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'Marcatore BB code per produrre testo grassetto. Utilizzo: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'Marcatore BB code per produrre testo corsivo. Utilizzo: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'Marcatore BB code per produrre testo sottolineato. Utilizzo: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'Marcatore BB code per produrre caratteri di colorati. Utilizzo [color=#XXXXXX]colored[/color] dove XXXXXX equivale al codice hex del colore desiderato, ad esempio FF0000 rosso.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'Marcatore BB code per produrre caratteri colorati. Utilizzo [color=#XXXXXX]colored[/color] where XXXXXX dove XXXXXX equivale al codice hex del colore desiderato, ad esempio 00FF00 verde.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'Marcatore BB code per produrre caratteri colorati. Utilizzo [color=#XXXXXX]colored[/color] where XXXXXX dove XXXXXX equivale al codice hex del colore desiderato, ad esempio 0000FF blue.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'Marcatore BB code per produrre caratteri molto piccoli. Utilizzo: [size=1]very small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'Marcatore BB code per produrre caratteri piccoli. Utilizzo: [size=2] small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'Marcatore BB code per produrre caratteri grandi. Utilizzo: [size=4]big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'Marcatore BB code per produrre caratteri molto grandi. Utilizzo: [size=5]very big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'Marcatore BB code per inserire un collegamento web ad una immagine. Utilizzo [img]Indirizzo immagine[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'Marcatore BB code per inserire un hyperlink. Utilizzo: [url]indirizzo web[/url]. Non dimenticare http:// prima di ogni indirizzo web.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Chiudi tutti i marcatore BB code aperti.');
