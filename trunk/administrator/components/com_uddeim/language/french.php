<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         ? 2007-2008 Stephan Slabihoud, ? 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: French (source file is Latin-1)
// Translator:    Florent Nouvellon <noemail>
// Translator:    Jyhelle <noemail> (1.1)
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Load MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'This specifies how uddeIM loads MooTools (MooTools is required for Autocompleter): <i>None</i> is useful when your template loads MooTools, <i>Auto</i> is the recommended default (same behavior as in uddeIM 1.2), when using J1.0 you can also force loading MooTools 1.1 or 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'do not load MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'force loading MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'force loading MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...setting default for MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 encoded');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'R�gler le fuseau horaire');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Lorsque uddeIM affiche la mauvaise heure, vous pouvez r�gler le fuseau horaire ici. G�n�ralement, si tout est configur� correctement, ceci devrait �tre z�ro. N�anmois, dans certains cas vous devrez changer cette valeur.');
DEFINE ('_UDDEADM_HOURS', 'heures');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Version :');
DEFINE ('_UDDEADM_STATISTICS', 'Statistiques :');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Afficher les statistiques');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Ceci affiche quelques statistiques comme le nombre de messages archiv�s, etc.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'VOIR LES STATS');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Messages enregistr�s dans la base de donn�es : ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Messages supprim�s par le destinataire : ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Messages supprim�s par l\'exp�diteur: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Messages en attente de purge : ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Contourner Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'G�n�ralement, uddeIM essaie de d�tecter le bon Itemid lorsqu\'il n\'est pas r�gl�. Dans certains cas, il se peut qu\'il soit n�cessaire de forcer cette valeur, par exemple lorsque vous avez plusieurs liens de menu vers uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'L\'Itemid d�tect� est : ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Utiliser l\'Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Utiliser cet Itemid au lieu de celui d�tect�.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Utiliser les liens vers les profils');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Lorsque <i>oui</i> est s�lectionn�, tous les pseudos affich�s dans uddeIM seront affich�s comme liens vers le profil de l\'utilisateur.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Voir les portraits');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Lorsque <i>oui</i> est s�lectionn�, le portrait de l\'utilisateur sera affich� pendant la lecture des messages.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Voir les portraits dans les listes');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Cochez <i>oui</i> si vous souhaitez afficher les portrais des utilisateurs dans les listes de messages (Bo�te de r�ception, Bo�te d\'envoi, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'D�sactiv�');
DEFINE ('_UDDEADM_ENABLED', 'Activ�');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Important');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Permettre les tags de messages');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Permet la classification des messages (uddeIM affiche une �toile dans les listes qui peut �tre mise en surbrillance pour indiquer les messages importants).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Important : Lorsque vous avez mis � jour uddeIM depuis une version pr�c�dente, merci de lire le fichier README. Parfois vous devrez ajouter ou changer des tables ou des champs de la base de donn�es !');
DEFINE ('_UDDEIM_ADDCCINFO', 'Ajouter une ligne de CC:');
DEFINE ('_UDDEIM_CC', 'CC :');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Raccourcir le texte cit�');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Raccourcir le texte cit� � 2/3 de la longueur maximum si elle d�passe la limite.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Messages re�us ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Dernier(s) ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' message(s)');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Statut');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Exp�diteur');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Message');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Aucun message re�u');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Acc�s � la corbeille interdit.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Limiter l\'emploi de la corbeille');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Vous pouvez limiter l\'acc�s � la corbeille. Celle-ci est normalement disponible pour tous (<i>pas de restriction</i>). Vous pouvez limiter cette fonction aux utilisateurs sp�ciaux ou aux seuls admins, les groupes de rang inf�rieur ne pourront pas r�cup�rer un message.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'pas de restriction');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'utilisateurs sp�ciaux');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'admins seuls');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Masquer des utilisateurs dans la liste');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Indiquez les ID des utilisateurs � masquer dans la liste sur l\'acc�s public (p.ex. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Masquer des utilisateurs dans la liste');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Indiquez les ID des utilisateurs � masquer dans la liste (p.ex. 65,66,67). Admins will always see the complete list.');
DEFINE ('_UDDEIM_ERRORCSRF', 'Attaque CSRF d�tect�e');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'Protection CSRF');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Protection contre les attaques Cross-Site Request Forgery. Ceci devrait �tre valid�, ne le retirez que pour diagnostiquer des probl�mes �tranges.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Vous ne pouvez pas r�pondre � un message archiv�.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Les r�ponses aux utilisateurs externes ne peuvent pas �tre rappel�es.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Autoriser les r�ponses');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Autoriser les r�ponses directes aux messages des utilisateurs externes.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Bonjour %user%,\n\n%you% vous a envoy� le message suivant sur site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Montrer les noms r�els');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Montrer les noms r�els ou les pseudos dans l\'acc�s public ?');
DEFINE ('_UDDEIM_USERLIST', 'Liste d\'utilisateurs');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'D�sol�, vous devez attendre avant de pouvoir envoyer un nouveau message');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Dernier envoi');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'D�lai');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'D�lai d\'attente en secondes avant qu\'un utilisateur puisse envoyer � nouveau un message (0 pour aucun d�lai).');
DEFINE ('_UDDEADM_SECONDS', 'secondes');
DEFINE ('_UDDEIM_PUBLICSENT', 'Message envoy�.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Erreur dans le nom d\'exp�diteur');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Erreur dans l\'adresse email');
DEFINE ('_UDDEIM_YOURNAME', 'Votre nom:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Votre email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Vous utilisez uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Vous utilisez d�j� la derni�re version de uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'La version actuelle est ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Informations de mise � jour:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'V�rifier les mises � jour');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Cette option contacte le site de d�veloppement uddeIM uniquement pour conna�tre la version courante. Aucune autre information que le num�ro de version que vous utilisez n\'est transmise.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'VERIFIER');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Impossible de recevoir le num�ro de la version actuelle.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Pas de liste de contact trouv�e!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Vous avez d�pass� le nombre maximum de destinataires (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Nombre max. de destinataires');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Nombre max. de destinataires dans une liste de contacts.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Listes de contacts d�sactiv�es');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Listes de contacts activ�es');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM permet la cr�ation de listes de contacts. Ces listes permettent l\'envoi de messages � plusieurs destinataires, mais n\'oubliez pas dans ce cas d\'autoriser les destinataires multiples.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'd�sactiv�');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'utilisateurs enregistr�s');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'utilisateurs sp�ciaux');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'admins uniquement');
DEFINE ('_UDDEIM_LISTSNEW', 'Cr�er une ouvelle liste de contacts');
DEFINE ('_UDDEIM_LISTSSAVED', 'Liste de contacts archiv�e');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Liste de contacts mise � jour');
DEFINE ('_UDDEIM_LISTSDESC', 'Description');
DEFINE ('_UDDEIM_LISTSNAME', 'Nom');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Nom (sans espaces)');
DEFINE ('_UDDEIM_EDITLINK', 'moodifier');
DEFINE ('_UDDEIM_LISTS', 'Contacts');
DEFINE ('_UDDEIM_STATUS_READ', 'lu');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'unread');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'connect�');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'd�connect�');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Montrer les images de la galerie CB');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Par d�faut uddeIM ne montre que les avatars upload�s par les utilisateurs. Ici vous autorisez � afficher aussi les images de la galerie d\'avatars de CB.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'D�bloquer les connexions CB');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Vous pouvez autoriser les messages aux destinataires qui ont l\'exp�diteur dans leur liste de connexions CB (m�me si le destinataire appartient � un groupe normalement bloqu� pour cet exp�diteur).  Ce r�glage est ind�pendant des blocages d�finis individuellement par chaque utilisateur (si autoris�, voir plus haut).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Vous ne pouvez pas envoyer de message � ce groupe.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Le destinataire a bloqu� la r�ception de vos messages.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Groupes bloqu�s (utilisateurs enregistr�s)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Groupes auxquels les utilisateurs enregistr�s ne peuvent pas envoyer de messages. Ceci ne concerne que les utilisateurs enregistr�s. Les utilisateurs speciaux et les admins ne sont pas concern�s. Ce r�glage est ind�pendant des blocages d�finis individuellement par chaque utilisateur (si autoris�, voir plus haut).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Groupes bloqu�s (externes)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Groupes auxquels les utilisateurs externes ne peuvent pas envoyer de messages. Ce r�glage est ind�pendant des blocages d�finis individuellement par chaque utilisateur (si autoris�, voir plus haut). Quand un groupe est bloqu�, ces utilisateurs n\'ont pas l\'option d\'autoriser l\'acc�s public dans leurs param�tres.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Utilisateur externe');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'Connexion CB');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Utilisateur enregistr�');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Auteur');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editeur');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Cet utilisateur n\'accepte pas de messages des utilisateurs non enregistr�s.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Cacher dans la liste "Montrer les utilisateurs" publique');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Vous pouvez masquer certains groupes dans la liste "Montrer les utilisateurs" publique. Note: les noms sont cach�s mais ces utilisateurs peuvent recevoir des messages. Les utilisateurs qui n\'ont pas autoris� l\'acc�s public n\'appara�tront jamais dans cette liste.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Masquer dans la liste "Montrer les utilisateurs"');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Vous pouvez masquer certains groupes dans la liste "Montrer les utilisateurs" publique. Note: les noms sont cach�s mais ces utilisateurs peuvent recevoir des messages.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'aucun');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'superadmins seuls');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'admins seuls');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'utilisateurs sp�ciaux');
DEFINE ('_UDDEADM_PUBLIC', 'externes');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Comportement du lien "Montrer les utilisateurs"');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'D�finir si le lien "Montrer les utilisateurs" doit appara�tre ou �tre masqu� dans l\'acc�s public.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Acc�s public');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- s�lectionner public -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Permet aux utilisateurs externes d\'envoyer un message');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Limite atteinte!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Utilisateur externe');
DEFINE ('_UDDEIM_DELETEDUSER', 'Utilisateur effac�');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Longueur anti-spam');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Specifie combien de caract�res sont demand�s.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Protection anti-spam');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Indiquez qui doit entrer un code de s�curit� avant d\'envoyer un message');
DEFINE ('_UDDEADM_CAPTCHAF0', 'personne');
DEFINE ('_UDDEADM_CAPTCHAF1', 'externes uniquement');
DEFINE ('_UDDEADM_CAPTCHAF2', 'externes et enregistr�s');
DEFINE ('_UDDEADM_CAPTCHAF3', 'externes, enregistr�s, sp�ciaux');
DEFINE ('_UDDEADM_CAPTCHAF4', 'tous (admins aussi)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Activer l\'acc�s public');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Si activ�, les utilisateurs externes peuvent envoyer des messages aux utilisateurs enregistr�s (ceux-ci peuvent pr�ciser dans leurs param�tres s\'ils le permettent).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Acc�s public par d�faut');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Valeur par d�faut lorsqu\'un utilisateur externe peut envoyer un message  un utilisateur enregistr�.');
DEFINE ('_UDDEADM_PUBDEF0', 'd�sactiv�');
DEFINE ('_UDDEADM_PUBDEF1', 'activ�');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Code de s�curit� erron�');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'aucun ou inconnu');
DEFINE ('_UDDEADM_DONATE', 'Si vous appr�ciez uddeIM et voulez supporter son d�velopment veuillez faire une petite donation.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Configuration trouv�e dans la base de donn�es: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Sauvegarde et restauration de la configuration');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Vous pouvez savegarder votre configuration dans la base de donn�e et la restaurer quand c\'est n�cessaire. Ceci est utile quand vous mettez � jour uddeIM ou quand vous voulez sauvegarder une certaine configuration pour faire des tests.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'SAUVEGARDER');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RESTAURER');
DEFINE ('_UDDEADM_CANCEL', 'Annuler');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Jeu de caract�re du fichier de langue');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Habituellement le param�tre par <strong>defaut</strong> (ISO-8859-1) est bon pour Joomla 1.0 et <strong>UTF-8</strong> pour Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'par d�faut');
DEFINE ('_UDDEIM_READ_INFO_1', 'Les messages lus resteront dans la boite de r�ception pendant ');
DEFINE ('_UDDEIM_READ_INFO_2', ' jours max. avant d\'�tre supprim� automatiquement.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Les messages non lus resteront dans la boite de reception pendant ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' jours max. avant d\'�tre supprim� automatiquement.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Les messages envoy�s resteront dans la boite d\'envoi pendant ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' jours max. avant d\'�tre supprim� automatiquement.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Montrer la note sur les messages lus');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Montrer la note "Les messages lus seront effac�s apr�s n jours"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Montrer la note sur les messages non-lus');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Montrer la note "Les messages non-lus seront effac�s apr�s n jours"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Montrer la note sur les messages envoy�s');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Montrer la note "Les messages envoy�s seront effac�s apr�s n jours"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Montrer la note sur les messages supprim�s');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Montrer la note "Les messages supprim�s seront effac�s apr�s n jours"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Les messages envoy�s sont gard�s pendant (jours)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Entrer le nombre de jours avant que les messages <b>envoy�s</b> seront automatiquement supprim�s de la boite d\'envoi.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'envois � tous les utilisateurs sp�ciaux');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Message pour <strong>tous les utilisateurs sp�ciaux</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- selectionner le nom d\utilisateur -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- selectionner le nom -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Editer les param�tres de l\utilisateur');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'existant');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'non existant');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- selectionner une entr�e -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- selectionner une notification -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- selectionner une popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Nom d\'utilisateur');
DEFINE ('_UDDEADM_USERSET_NAME', 'Nom');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Notification');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Dernier acc�s');
DEFINE ('_UDDEADM_USERSET_NO', 'Non');
DEFINE ('_UDDEADM_USERSET_YES', 'Oui');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'Inconnu');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Lorsque hors-ligne (excepter les r�ponses)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Toujours (excepter les r�ponses)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Lorsque hors-ligne');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Toujours');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Pas de notification');
DEFINE ('_UDDEADM_WELCOMEMSG', "Bienvenue dans uddeIM!\n\nVous avez avec succ�s install� uddeIM.\n\nEssayer de voir ce message avec differentes templates. Vous pouvez param�trer ceci dans la partie administration de uddeIM.\n\nuddeIM est un projet en development. Si vous trouvez des bugs ou une faille, veuillez m\'�crire pour que je rende uddeIM meilleur.\n\nBonne chance et passer un bon moment!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'L\'installation de uddeIM est complete.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Veuillez continuer sur la partie administration et v�rifiez les param�tres.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Si vous faites fonctionner le CMS dans un jeu de caract�re autre que ISO 8859-1 assurez-vous d\'ajuster les param�tres avec attention.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Apr�s l\'installation, tout le traffic email d\'uddeIM (notifications d\'email , fotgetmenot emails) est d�sactiv� donc aucun emails n\est envoy� tant que vous faites des tests. N\'oubliez pas de d�sactiver "stop email" dans la partie administration lorsque vous avez fini.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Destinataires max.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Nombre max. de destinataires autoris� par message (0=pas de limitation)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'Trop de destinataires');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Envoi d\'emails d�sactiv�.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Chercher tout le texte');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'L\'autocompleteur cherche dans tout le texte (sinon depuis le d�but seulement)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Autoriser le lien "Montrer les utilisateurs"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Choisissez si le lien "Montrer les utilisateurs" doit �tre supprim�, affich� ou si tous les utilisateurs doivent �tre toujours visibles.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Supprimer le lien "Montrer les utilisateurs');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Montrer le lien "Montrer les utilisateurs');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'toujours afficher tous les utilisateurs');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'La configuration n\'est pas "modifiable":');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'La configuration est "modifiable":');
DEFINE ('_UDDEIM_FORWARDLINK', 'Transf�rer');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'Destinataire trouv�');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'Destinataires trouv�s');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (par defaut)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Syst�me de courrier');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'S�lectionnez le syst�me de courrier pour qu\'uddeIM puisse envoyer des notifications.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Montrer les groupes sous Joomla');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Montrer les groupes sous Joomla dans une liste.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Transfert des messages');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Autoriser les transferts de messages.');
DEFINE ('_UDDEIM_FWDFROM', 'Message original de');
DEFINE ('_UDDEIM_FWDTO', 'pour');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Message non archiv�');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Impossible d\'enlever le message en tant qu\'archive');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Autoriser plusieurs destinataires');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Autoriser plusieurs destinataires (s�par�s par des virgules).');
DEFINE ('_UDDEIM_CHARSLEFT', 'Caract�res restant');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Montrer un compteur');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Montrer un compteur qui affiche le nombre de caract�res restant.');
DEFINE ('_UDDEIM_CLEAR', 'Effacer les destinataires');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Ajouter � la liste des destinataires s�lectionn�s');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Permettre la s�lection de destinataires multiples.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Ajouter les connexions s�lectionn�es � la liste');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Permettre la s�lection de destinataires multiples.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS trouv�: ');
DEFINE ('_UDDEIM_ENTERNAME', 'entrer un nom');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Utiliser la saisie semi-automatique');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Utiliser la saisie semi-automatique pour les noms des destinataires.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Cl�s utilis�s pour occulter');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Entrez la cl� qui est utilis�e pour brouiller le message. Ne pas changer cette valeur apr�s que le brouillage du message a �t� activ�e.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Mauvais fichier de confguration trouv�!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Version trouv�e:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version attendue:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Conversion de la configuration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Fait!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Erreur critique: Echec d\'�criture dans le fichier de configuration:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Message crypt�! - T�l�chargement impossible!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Mauvais mot de passe! - T�l�chargement impossible!');
DEFINE ('_UDDEIM_WRONGPW', 'Mauvais mot de passe! - Veuillez contacter l\'administrateur de la base de donn�e!');
DEFINE ('_UDDEIM_WRONGPASS', 'Mauvais mot de passe!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Mauvaises dates de suppression (boite de reception/boite de reception): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Correction des mauvaises dates de suppression');
DEFINE ('_UDDEIM_TODP', 'A: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Purger les messages maintenant');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Montrer les ic�nes d\'action');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Si vous s�lectionnez <i>oui</i>, action links will be displayed with an icon.');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Show bottom icons');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Si vous s�lectionnez <i>oui</i>, bottom links will be displayed with an icon.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Utiliser smileys anim�s');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Utiliser smileys anim�s au lieu des statiques.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Plus de smileys anim�s');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Montrer plus de smileys anim�s.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Message crypt�  - Mot de passe requis');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Mot de passe requis</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Mot de passe');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (texte crypt�)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (texte d�crypt�)');
DEFINE ('_UDDEIM_MORE', 'PLUS');
// uddeIM Module
define ('_UDDEMODULE_PRIVATEMESSAGES', 'Messagerie priv�e');
define ('_UDDEMODULE_NONEW', 'Aucun nouveau message');
define ('_UDDEMODULE_NEWMESSAGES', 'Nouveaux messages: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'message');
DEFINE ('_UDDEMODULE_MESSAGES', 'messages');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Vous avez');
DEFINE ('_UDDEMODULE_HELLO', 'Salut');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Message Express');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Type de cryptage');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Permet de crypter les messages stock�s. Le brouillage des messages permet d\'emp�cher un administrateur de lire accidentellement les messages mais n\'assure pas r�ellement la s�curit� des donn�es sauvegard�es.');
DEFINE ('_UDDEADM_CRYPT0', 'Aucun');
DEFINE ('_UDDEADM_CRYPT1', 'Brouiller les messages');
DEFINE ('_UDDEADM_CRYPT2', 'Crypter les messages');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Notification email par d�faut');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Valeur par d�faut pour la notification email (valable uniquement pour les utilisateurs qui n\'ont pas encore utilis� UDDEIM).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Pas de notification');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Toujours');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Notification quand d�connect�');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Supprimer le lien "Tous les utilisateurs"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Supprime le lien "Tous les utilisateurs" pour un nouveau message (utile quand beaucoup d\'utilisateurs sont enregistr�s).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup de notification');
DEFINE ('_UDDEADM_POPUP_EXP','Affiche une popup lors de l\'arriv�e de nouveaux messages');
DEFINE ('_UDDEIM_OPTIONS', 'Options avanc�es');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Param�tres avanc�s de votre messagerie priv�e :');
DEFINE ('_UDDEIM_OPTIONS_P', 'Afficher une popup lors de l\'arriv�e de nouveaux messages');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup notification by default');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Enable popup notification by default (for users who have not changed their preferences yet).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Maintenance');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Maintenance de la base de donn�es');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'VERIFIER');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'REPARER');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Quand un utilisateur est purg� de la base de donn�e ses messages sont habituellement gard�s dans la base de donn�e. Cette fonction v�rifi� si c\'est n�cessaire de supprimer les messages orphelins et vous pouvez supprimer ceux-ci si vous le d�sirez.<br />Ceci v�rifie aussi la base de donn�e pour que les erruers seront bien corrig�es.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "V�rification...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Nom d\'utilisateur): [inbox|inbox trashed|outbox|outbox trashed]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>boite de r�ception: les messages sont stock�s dans la boite de reception des utilisateurs</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>boite de r�ception supprim�e: les messages sont supprim�s de la boite de reception des utilisateurs, mais toujours pr�sents dans la boite d\'envois</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>boite d'envois: les messages sont stock�s dans la boite d\'envois des utilisateur</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>boite d'envois supprim�e: les messages sont supprim�s de la boite de reception des utilisateurs, mais toujours pr�sents dans la boite de reception</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Suppression...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "pas trouv� (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "supprimer toutes les preferences d\'un utilisateur");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "supprimer le blocage d\'un utilisateur");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "supprime tous les messages envoy�s par un utilisateur supprim� dans sa boite d\'envois et reception et supprim la boite de l\'utilisateur");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "supprime tous les messages envoy�s par un utilisateur supprim� dans sa boite d\'envois et de reception");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Rien � faire</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Nettoyage requis</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Noms r�els');
DEFINE ('_UDDEADM_NAMESDESC', 'Montrer les noms d\'utilisateur ou les noms r�els ?');
DEFINE ('_UDDEADM_REALNAMES', 'Noms r�els');
DEFINE ('_UDDEADM_USERNAMES', 'Noms d\'utilisateur');
DEFINE ('_UDDEADM_CONLISTBOX', 'Liste de connexions');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Montrer mes connexions sous forme de listbox ou de tableau ?');
DEFINE ('_UDDEADM_LISTBOX', 'Listbox');
DEFINE ('_UDDEADM_TABLE', 'Tableau');
DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Les messages resteront dans la corbeille 24 heures avant d\'�tre supprim�es. Vous pouvez seulement voir les premiers mots des messages. Pour lire la totalit� du message vous devrez d\'abord le retaurer.');
define ('_UDDEIM_TRASHCAN_INFO_1', 'Les messages resteront dans la corbeille pendant ');
define ('_UDDEIM_TRASHCAN_INFO_2', ' heures avant d\'�tre supprim�s. Seule la premi�re partie du message est visible. Pour le voir en entier, vous devez d\'abord le restaurer.');
define ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Ce message a �t� restaur�. Vous pouvez l\'�diter et le renvoyer.');
define ('_UDDEIM_COULDNOTRECALL', 'Ce message ne peut �tre restaur� (il a probablement �t� d�j� lu ou effac�.)');
define ('_UDDEIM_CANTRESTORE', 'La r�cup�ration du message a �chou�. ( Il peut s\'agir d\'un message longtemps rest� dans le corbeille et effac� entretemps .)');
define ('_UDDEIM_COULDNOTRESTORE', 'La r�cup�ration du message a �chou�.');
define ('_UDDEIM_DONTSEND', 'Annuler l\'envoi');
define ('_UDDEIM_SENDAGAIN', 'Envoyer');
define ('_UDDEIM_NOTLOGGEDIN', ' Vous n\'�tes pas identifi�(e).');
define ('_UDDEIM_NOMESSAGES_INBOX', '<strong>Bo�te de r�ception vide.</strong>');
define ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>Bo�te d\'envoi vide.</strong>');
define ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Corbeille vide.</strong>');
define ('_UDDEIM_INBOX', 'Re�us');
define ('_UDDEIM_OUTBOX', 'Envoy�s');
define ('_UDDEIM_TRASHCAN', 'Corbeille');
define ('_UDDEIM_CREATE', 'Nouveau');
define ('_UDDEIM_UDDEIM', 'Messagerie priv�e');
	// this is the headline/name of the component as it appears in Mambo

define ('_UDDEIM_READSTATUS', 'lu');
	// as in 'this message has been "read"'

define ('_UDDEIM_FROM', 'De');
define ('_UDDEIM_FROM_SMALL', 'de');
define ('_UDDEIM_TO', '�');
define ('_UDDEIM_TO_SMALL', '�');
define ('_UDDEIM_OUTBOX_WARNING', ' La bo�te d\'envoi contient tous les messages envoy�s qui ne sont pas encore supprim�s. Vous pouvez les modifier tant qu\'il ne sont pas encore lus. Ils ne peuvent pas �tre lus par leurs destinaitaires pendant l\'�dition. ');
define ('_UDDEIM_RECALL', 'Editer');
define ('_UDDEIM_RECALLTHISMESSAGE', 'Editer ce message');
define ('_UDDEIM_RESTORE', 'Restaurer');
define ('_UDDEIM_MESSAGE', 'Message');
define ('_UDDEIM_DATE', 'Date');
define ('_UDDEIM_DELETED', 'Effac�');
define ('_UDDEIM_DELETE', 'effacer');
define ('_UDDEIM_DELETELINK', 'Effacer');
define ('_UDDEIM_MESSAGENOACCESS', 'Ce message ne peut �tre supprim�. <br />Raisons possibles:<ul><li> Vous n\'avez pas le droit de lire ce message particulier</li><li> Ce message a �t� supprim�</li></ul>');
define ('_UDDEIM_YOUMOVEDTOTRASH', '<b> Vous avez d�plac� ce message dans le corbeille.</b>');
define ('_UDDEIM_MESSAGEFROM', 'Message de ');
define ('_UDDEIM_MESSAGETO', 'Mon message � ');
define ('_UDDEIM_REPLY', 'R�pondre');
define ('_UDDEIM_SUBMIT', 'Envoyer');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Apr�s une r�ponse, d�placer le message original dans la corbeille');
define ('_UDDEIM_NOMESSAGE', 'Erreur: Le message ne contient aucun texte ! Le message n\'a pas �t� envoy�.');
define ('_UDDEIM_MESSAGE_REPLIEDTO', 'Reponse envoy�e');
define ('_UDDEIM_MESSAGE_SENT', 'Message envoy�');
define ('_UDDEIM_MOVEDTOTRASH', ' et l\'original d�plac� dans le corbeille');
define ('_UDDEIM_NOSUCHUSER', ' Identifiant inconnu !');
define ('_UDDEIM_NOTTOYOURSELF', ' L\'envoi de message � soi-m�me n\'est pas permis!');
define ('_UDDEIM_PRUNELINK', 'Administrateur seulement : Nettoyer');
define ('_UDDEIM_BLOCKS', 'Bloqu�');
define ('_UDDEIM_YOUAREBLOCKED', 'Non envoy� (Vous �tes bloqu� par le destinataire)');
define ('_UDDEIM_BLOCKNOW', 'bloquer l\'utilisateur');
define ('_UDDEIM_BLOCKS_EXP', 'Liste des utilisateurs que vous avez bloqu�s. Ils ne peuvent pas vous envoyer de message personnel.');
define ('_UDDEIM_NOBODYBLOCKED', 'Vous n\'avez bloqu� aucun utilisateur.');
define ('_UDDEIM_YOUBLOCKED_PRE', 'Vous avez bloqu� ');
define ('_UDDEIM_YOUBLOCKED_POST', ' utilisateur(s).');
define ('_UDDEIM_UNBLOCKNOW', '[d�bloquer]');
define ('_UDDEIM_BLOCKALERT_EXP_ON', 'Si un utilisateur bloqu� tente de vous envoyer un message, il sera avis� de son statut "bloqu�" et son message ne sera pas envoy�.');
define ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Un utilisateur bloqu� ne peut pas identifier qui l\'a bloqu�.');
define ('_UDDEIM_CANTBLOCKADMINS', 'Les administrateurs ne peuvent pas �tre bloqu�s.');
define ('_UDDEIM_BLOCKSDISABLED', 'Bloquage non activ�');
define ('_UDDEIM_CANTREPLY', 'Vous ne pouvez pas r�pondre � ce message.');
define ('_UDDEIM_EMNOFF', 'Notification par e-mail d�sactiv�e. ');
define ('_UDDEIM_EMNON', 'Notification par e-mail activ�e. ');
define ('_UDDEIM_SETEMNON', '[activer]');
define ('_UDDEIM_SETEMNOFF', '[d�sactiver]');
define ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Bonjour %you%, 

%user% vous a envoy� un message personnel sur %site%.
Identifiez-vous pour y r�pondre!');
define ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Bonjour %you%, 

%user% vous a envoy� le message suivant sur %site%.
Identifiez-vous pour y r�pondre!
__________________
%pmessage%
');
define ('_UDDEIM_EMN_FORGETMENOT', 'Bonjour %you%,

vous avez des messages personnels non lus sur %site%.
Identifiez-vous pour y r�pondre!
');

define ('_UDDEIM_EMN_SUBJECT', 'Vous avez un message sur %site%. Identifiez-vous  pour le lire! ');





define ('_UDDEIM_ARCHIVE_ERROR', 'L\'archivage a �chou�.');
define ('_UDDEIM_ARC_SAVED_NONE', '<strong>Vous n\'avez pas encore archiv� de message.</strong>'); 
define ('_UDDEIM_ARC_SAVED_1', 'Vous avez archiv� ');
define ('_UDDEIM_ARC_SAVED_2', ' messages');
define ('_UDDEIM_ARC_SAVED_ONE', ' Vous avez archiv� un message');
define ('_UDDEIM_ARC_SAVED_3', 'Avant d\'archiver ces messages, vous devez d\'abord supprimer d\'autres.');
define ('_UDDEIM_ARC_CANSAVEMAX_1', 'Vous pouvez archiver au maximum ');
define ('_UDDEIM_ARC_CANSAVEMAX_2', ' messages.');

define ('_UDDEIM_INBOX_LIMIT_1', 'Vous avez ');
define ('_UDDEIM_INBOX_LIMIT_2', ' messages dans votre');
define ('_UDDEIM_ARC_UNIVERSE_ARC', 'archive');
define ('_UDDEIM_ARC_UNIVERSE_INBOX', 'bo�te de r�ception');
define ('_UDDEIM_ARC_UNIVERSE_BOTH', 'bo�te de r�ception et archive');
	// The lines above are to make up a sentence like
	// "You have | 126 | messages in your | inbox and archive"

define ('_UDDEIM_INBOX_LIMIT_3', ' La limite autoris�e est ');
define ('_UDDEIM_INBOX_LIMIT_4', 'Vous pouvez toujours recevoir et lire des messages mais vous ne pouvez pas r�pondre ou r�diger de nouveau jusqu\'� ce que vous en supprimmiez d\'autres.');
define ('_UDDEIM_SHOWINBOXLIMIT_1', 'Messages stock�s: ');
define ('_UDDEIM_SHOWINBOXLIMIT_2', '(au max. ');
	// don't add closing bracket

define ('_UDDEIM_MESSAGE_ARCHIVED', 'Message archiv�.');
define ('_UDDEIM_STORE', 'archiver');
	// translators info: as in: 'store this message in archive now'

define ('_UDDEIM_BACK', 'retour');

define ('_UDDEIM_TRASHCHECKED', 'effacer la s�lection');
	// translators info: plural! (as in "delete checked" messages)
	
define ('_UDDEIM_SHOWALL', 'Afficher tous');
	// translators example "SHOW ALL messages"
	
define ('_UDDEIM_ARCHIVE', 'Archiv�s');
	// should be same as _UDDEADM_ARCHIVE
	
define ('_UDDEIM_ARCHIVEFULL', 'Bo�te d\'archive pleine. Archivage �chou�.');	
	
define ('_UDDEIM_NOMSGSELECTED', 'Aucun message s�lectionn�.');
define ('_UDDEIM_THISISACOPY', 'Copie du message que vous avez envoy� � ');
define ('_UDDEIM_SENDCOPYTOME', 'm\'envoyer une copie');
	// as in 'send a "copy to me"' or cc: me

define ('_UDDEIM_SENDCOPYTOARCHIVE', 'envoyer une copie � l\'archive');
define ('_UDDEIM_TRASHORIGINAL', 'supprimer l\'original');

define ('_UDDEIM_MESSAGEDOWNLOAD', 'T�l�charger le message');
define ('_UDDEIM_EXPORT_MAILED', 'E-mail avec les messages envoy�s');
define ('_UDDEIM_EXPORT_NOW', 'M\'envoyer par e-mail les messages coch�s');
	// as in "send the messages checked above by E-Mail to me"

define ('_UDDEIM_EXPORT_MAIL_INTRO', ' Ce message contient votre messagerie personnelle.');
define ('_UDDEIM_EXPORT_COULDNOTSEND', 'Ne peut pas envoyer d\'e-mail contenant les messages.');

define ('_UDDEIM_LIMITREACHED', 'Nombre de messages limit� ! Non restaur�.');

define ('_UDDEIM_WRITEMSGTO', 'Envoyer un message � ');
	// as in "write a message to" (a person)

// months and weeknames (please translate according 
// to your language)

$udde_smon[1]="Jan";
$udde_smon[2]="F�v";
$udde_smon[3]="Mar";
$udde_smon[4]="Avr";
$udde_smon[5]="Mai";
$udde_smon[6]="Jun";
$udde_smon[7]="Jul";
$udde_smon[8]="A�t";
$udde_smon[9]="Sep";
$udde_smon[10]="Oct";
$udde_smon[11]="Nov";
$udde_smon[12]="D�c";

$udde_lmon[1]="Janvier";
$udde_lmon[2]="F�vrier";
$udde_lmon[3]="Mars";
$udde_lmon[4]="Avril";
$udde_lmon[5]="Mai";
$udde_lmon[6]="Juin";
$udde_lmon[7]="Juillet";
$udde_lmon[8]="Ao�t";
$udde_lmon[9]="Septembre";
$udde_lmon[10]="Octobre";
$udde_lmon[11]="Novembre";
$udde_lmon[12]="D�cembre";

$udde_lweekday[0]="Dimanche";
$udde_lweekday[1]="Lundi";
$udde_lweekday[2]="Mardi";
$udde_lweekday[3]="Mercredi";
$udde_lweekday[4]="Jeudi";
$udde_lweekday[5]="Vendredi";
$udde_lweekday[6]="Samedi";

$udde_sweekday[0]="Dim";
$udde_sweekday[1]="Lun";
$udde_sweekday[2]="Mar";
$udde_sweekday[3]="Mer";
$udde_sweekday[4]="Jeu";
$udde_sweekday[5]="Ven";
$udde_sweekday[6]="Sam";



define ('_UDDEIM_NOID', 'Erreur: Destinataire non trouv�. Message non envoy�.');
define ('_UDDEIM_VIOLATION', '<b>Intrusion!</b> Vous n\'avez pas le droit d\'effectuer cette t�che !');
define ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'erreur non identifi�e : ');
define ('_UDDEIM_ARCHIVENOTENABLED', 'Archive non activ�e.');


// *********************************************************
// No translation necessary below this line
// *********************************************************

define ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
define ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');

define ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');

// Admin

define ('_UDDEADM_SETTINGS', 'Administration d\'uddeIM');
define ('_UDDEADM_GENERAL', 'G�n�ralit�s');
define ('_UDDEADM_ABOUT', 'A propos');
define ('_UDDEADM_DATESETTINGS', 'Date/heure');
define ('_UDDEADM_PICSETTINGS', 'Ic�nes');
define ('_UDDEADM_DELETEREADAFTER_HEAD', 'Messages lus � conserver pendant (jours)');
define ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Messages non lus � conserver pendant (jours)');
define ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Messages effac�s � garder dans le corbeille pendant (jours)');
define ('_UDDEADM_DAYS', 'jour(s)');
define ('_UDDEADM_DELETEREADAFTER_EXP', 'Au bout de combien de jours les messages <b>lus</b> seront-ils syst�matiquement supprim�s de la bo�te de r�ception ? Si vous ne voulez pas de suppression automatique, entrez un nombre assez �lev� (ex. 36524 jours �quivaut � 1 si�cle). Notez toutefois que si vous voulez tout garder, votre base de don�e risque de charger rapidement.');
define ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Au bout de combien de jours les messages <b>non lus</b> par leurs destinataires seront-ils supprim�s ?');
define ('_UDDEADM_DELETETRASHAFTER_EXP', 'Au bout de combien de jours les messages dans le corbeille seront-ils supprim�s ? Les valeurs inf�rieures � 1 sont autoris�es. Ex : Pour supprimer du corbeille les messages �ffac�s apr�s 3h, entrez la valeur 0,125.');
define ('_UDDEADM_DATEFORMAT_HEAD', 'Format d\'affichage de la date');
define ('_UDDEADM_DATEFORMAT_EXP', 'S�lectionnez le format d\'affichage Date/Heure. Les mois seront affich�s sous la forme abr�g�e de votre langue.');
define ('_UDDEADM_LDATEFORMAT_HEAD', 'Affichage date longue');
define ('_UDDEADM_LDATEFORMAT_EXP', 'Seulement s\'il y a suffisamment d\'espace pour l\'affichage. S�lectionnez le format d\'affichage de la date � l\'ouverture d\'un message. Les noms de jours et des mois seront affich�s en fonction de la configuration de la langue de Mambo/Joomla (si un fichier de langue uddeIM est disponible).');
define ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Suppression uniquement par l\'administrateur');
define ('_UDDEADM_ADMINIGNITIONONLY_YES', 'oui, uniquement par l\'administrateur');
define ('_UDDEADM_ADMINIGNITIONONLY_NO', 'non, par tout utilisateur');
define ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'La suppression automatique alourdit le serveur et la base de donn�es. Si vous choisissez <i>oui, uniquement par l\'administrateur</i>, la suppression automatique (de tous les messages) peut �tre lanc�e par un adminisrateur qui v�rifie sa b�ite de r�ception. A ne s�l�ctionner que si un  administrateur lit au moins 1 fois par jour sa bo�te de r�ception. C\'est la majorit� des cas (si votre site a plusieurs administrateurs, elle peut �tre lanc�e par n\'importe quel administrateur). Pour un site de faible fr�quentation ou ou pour un site o� l\'administrateur v�rifie ses messages rarement, choisissez <i>non, par tout utilisateur</i>. Si vous ne comprenez pas ou si vous ne savez pas quoi faire, choisissez <i>non, par tout utilisateur</i>.');
define ('_UDDEADM_SAVESETTINGS', 'Enregistrer les param�tres');
define ('_UDDEADM_THISHASBEENSAVED', 'Les param�tres suivants sont enregistr�s dans le fichier de configuration :');
define ('_UDDEADM_SETTINGSSAVED', 'Param�tres enregistr�s.');
define ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ic�ne : utilisateur connect�');
define ('_UDDEADM_ICONONLINEPIC_EXP', 'D�finir l\'emplacement de l\'ic�ne � afficher apr�s l\'identifiant lorsque l\'utilisateur est connect�.');
define ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ic�ne : utilisateur d�connect�');
define ('_UDDEADM_ICONOFFLINEPIC_EXP', 'D�finir l\'emplacement de l\'ic�ne � afficher apr�s l\'identifiant lorsque l\'utilisateur est d�connect�.');
define ('_UDDEADM_ICONREADPIC_HEAD', 'Ic�ne : messages lus');
define ('_UDDEADM_ICONREADPIC_EXP', 'D�finir l\'emplacement de l\'ic�ne � afficher pour les messages lus.');
define ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ic�ne : messages non lus');
define ('_UDDEADM_ICONUNREADPIC_EXP', 'D�finir l\'emplacement de l\'ic�ne � afficher pour les messages non lus.');
define ('_UDDEADM_MODULENEWMESS_HEAD', 'Module : ic�ne nouveau(x) messages');
define ('_UDDEADM_MODULENEWMESS_EXP', 'Ce param�tre est utilis� par le module mod_uddeim_new. D�finir l\'emplacement de l\'ic�ne que le module affiche quand il y a de nouveaux messages.');
define ('_UDDEADM_UDDEINSTALL', 'Installation d\'uddeIM');
define ('_UDDEADM_FINISHED', 'Installation termin�e. Bienvenue � uddeIM. ');
define ('_UDDEADM_NOCB', '<span style="color: red;">Vous n\'avez pas install� Community Builder. Vous ne pourrez pas utiliser uddeIM.</span><br /><br />T�l�chargez <a href="http://www.joomlapolis.com">Community Builder</a>.');
define ('_UDDEADM_CONTINUE', 'suivant');
define ('_UDDEADM_PMSFOUND_1', 'Il existe ');
define ('_UDDEADM_PMSFOUND_2', ' messages dans votre configuration PMS. Voulez-vous les importer ?');
define ('_UDDEADM_IMPORT_EXP', 'Cela n\'affecte ni vos message PMS ni le programme. Ils resteront intacts. Vous pouvez les importer en toute confiance, m�me si vous pensez continuer � utiliser PMS. (Vous devez enregistrer les modifications aux param�tres avant de lancer la proc�dure d\'importation !) Tous les messages qui sont d�j� dans la base d\'uddeIM resteront intacts.');
define ('_UDDEADM_IMPORT_YES', 'Importez maintenant les messages PMS.');
define ('_UDDEADM_IMPORT_NO', 'Non, ne rien importer');  
define ('_UDDEADM_IMPORTING', 'Patientez pendant le processus d\'importation.');
define ('_UDDEADM_IMPORTDONE', 'Importation des messages PMS effectu�e. Veuillez ne pas ex�cuter ce script d\'importation une seconde fois pour �viter les doublons.'); 
define ('_UDDEADM_IMPORT', 'Importer');
define ('_UDDEADM_IMPORT_HEADER', 'Importer les messages de PMS');
define ('_UDDEADM_PMSNOTFOUND', 'Aucun programme PMS trouv�. Impossible de proc�der � l\'importation.');
define ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Vous avez d�j� import� les messages de PMS.</span>');
define ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Activer le blocage');
define ('_UDDEADM_BLOCKSYSTEM_EXP', 'Blocage activ� : les utilisateurs peuvent en bloquer d\'autres. Un utlilisateur bloqu� ne peut envoyer de message � celui qui l\'a bloqu�. Les Administateurs ne peuvent pas �tre bloqu�s.');
define ('_UDDEADM_BLOCKSYSTEM_YES', 'oui');
define ('_UDDEADM_BLOCKSYSTEM_NO', 'non');
define ('_UDDEADM_BLOCKALERT_HEAD', 'L\'utilisateur bloqu� recevra une notification');
define ('_UDDEADM_BLOCKALERT_EXP', 'Si vous s�lectionnez <i>oui</i>, un utilisateur bloqu� recevra un avis lui informant que son message n\'a pas pu �tre envoy� car le destinataire l\'a bloqu�. Si vous s�lectionnez <i>non</i>, l\'utilisateur bloqu� ne sera pas inform�.');
define ('_UDDEADM_BLOCKALERT_YES', 'oui');
define ('_UDDEADM_BLOCKALERT_NO', 'non');
define ('_UDDEADM_DELETIONS', 'Suppression');
define ('_UDDEADM_BLOCK', 'Blocage');
define ('_UDDEADM_INTEGRATION', 'Int�gration');
define ('_UDDEADM_EMAIL', 'e-mail');
define ('_UDDEADM_SHOWCBLINK_HEAD', 'Montrer les liens CB');
define ('_UDDEADM_SHOWCBLINK_EXP', 'Si <i>oui</i> est s�l�ctionn�, tous les noms d\'utlisateurs uddeIM seront affich�s en tant que liens vers leurs profils Community Builder.');
define ('_UDDEADM_SHOWCBPIC_HEAD', 'Afficher l\'avatar CB');
define ('_UDDEADM_SHOWCBPIC_EXP', 'Si <i>oui</i> est s�l�ctionn�, l\'avatar de l\'exp�diteur sera affich� quand lors de la lecture du message. (si l\'utilisateur charg� un avatar dans son profil Community Builder).');
define ('_UDDEADM_SHOWONLINE_HEAD', 'Afficher le statut de connexion');
define ('_UDDEADM_SHOWONLINE_EXP', 'Si <i>oui</i>, uddeIM affiche tous les identifiants avec respectivement un petit ic�ne connect� ou d�connect�. Vous pouvez param�trer les ic�nes dans l\'onglet <i>Ic�nes</i> de la zone d\'administration.');
define ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Autoriser notification e-mail.');
define ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Si <i>oui</i> est s�l�ctionn�, chaque utilisateur pourra choisir s\'il veut recevoir un e-mail � l\'arriv�e d\'un nouveau message.');
define ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail avec le message');
define ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Si <i>non</i> est s�l�ctionn�, l\'email informera uniquement de la date d\'arriv�e du nouveau message et son exp�diteur et non pas du contenu du message.');
define ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Rappel e-mail');
define ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Cette possibilit� permet (ind�pendamment des ses propres param�tres) d\'informer par e-mail l\'utilisateur qui a un message non lu depuis une certaine p�riode (param�tres ci-apr�s). Elle est ind�pendante du param�tre de l\'option \'Autoriser la notification par email\' d�finie plus haut. Si vous ne voulez aucune alerte par e-mail, d�sactivez ces deux options en m�me temps.');
define ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Envoi du rappel e-mail apr�s jour(s)');
define ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Si le rappel e-mail est activ�, d�finir ici le nombre de jours avant l\'envoi du rappel sur la non lecture d\'un message.');
define ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Premiers caract�res');
define ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Vous pouvez d�finir ici la longueur d\'affichage des messages dans les b�ite de r�ception, d\'envoi et corbeille.');
define ('_UDDEADM_MAXLENGTH_HEAD', 'Longueur maximum');
define ('_UDDEADM_MAXLENGTH_EXP', 'Longeur maximum d\'un message. Au del� de cette valeur, le message est tronqu�. Mettez \'0\' pour permettre n\'importe quelle longueur (non recommand�).');
define ('_UDDEADM_YES', 'oui');
define ('_UDDEADM_NO', 'non');
define ('_UDDEADM_ADMINSONLY', 'Uniquement par les administateurs');
define ('_UDDEADM_SYSTEM', 'Syst�me');
define ('_UDDEADM_SYSM_USERNAME_HEAD', 'Identifiant message syst�me');
define ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM prend en charge les messages syst�mes. Leur auteur ne sont pas visibles et les utilisateurs ne peuvent pas r�pondre � ce type de messages. Entrez ici l\'alias de l\'identifiant par d�faut pour les messages syst�mes (par exemple <i>Support</i>, <i>Aide</i> ou <i>Mod�rateur</i>).');
define ('_UDDEADM_ALLOWTOALL_HEAD', 'Permettre les administrateurs � envoyer des messages en masse.');
define ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM permet l\'envoi de messages en masse. Les messages seront envoy�s � tous les utilisateurs. A utiliser avec mod�ration.');
define ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nom de l\'auteur de l\'Email');
define ('_UDDEADM_EMN_SENDERNAME_EXP', 'D�finissez ici le nom de l\'exp�diteur qui doit �tre affich� dans l\'e-mail du rappel (par exemple <i>Le_nom_de_votre_site</i>)');
define ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adresse email de l\'auteur');
define ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Entrez l\'adresse e-mail depuis laquelle les notifications sont envoy�es. Elle pourrait �tre l\'adresse de contact principal de votre site.');
define ('_UDDEADM_VERSION', 'Version ');
define ('_UDDEADM_ARCHIVE', 'Archives'); // translators info: headline for Archive system
define ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Autoriser l\'archivage');
define ('_UDDEADM_ALLOWARCHIVE_EXP', 'D�finir si les utilisateurs pourront archiver leurs messages. Les messages archiv�s ne peuvent pas �tre suprim�s.');
define ('_UDDEADM_MAXARCHIVE_HEAD', 'Nombre max de messages archivables');
define ('_UDDEADM_MAXARCHIVE_EXP', 'D�finir combien de messages un utilisateur peut stocker dans l\'archive. (non limit� pour les administrateurs).');
define ('_UDDEADM_COPYTOME_HEAD', 'Autoriser les copies');
define ('_UDDEADM_COPYTOME_EXP', 'Permet aux utilisateurs de recevoir une copie du message qu\'il envoie. Ces copies seront visibles dans la b�ite de r�ception.');
define ('_UDDEADM_MESSAGES', 'Messages');
define ('_UDDEADM_TRASHORIGINAL_HEAD', 'Permettre la suppression de l\'original');
define ('_UDDEADM_TRASHORIGINAL_EXP', 'L\'activation de cette option ajoute une case � cocher intitul�e \'Supprimer l\'original\' � c�t� du bouton \'Envoyer\'. Selectionn�e par d�faut, le message sera imm�diatement d�plac� dans le corbeille quand une r�ponse est envoy�e. Cela permet de r�duire le nombre de message dans la base. Evidemment, vous pouvez d�cocher cette option si vous voulez garder vos messages dans la Bo�te de r�ception.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
define ('_UDDEADM_PERPAGE_HEAD', 'Messages par page');	
define ('_UDDEADM_PERPAGE_EXP', 'Definir le nombre de messages affich�s par page dans les Bo�tes de r�ception, d\'envoi, corbeille et archive.');
define ('_UDDEADM_CHARSET_HEAD', 'Jeu de caract�res utilis�');
define ('_UDDEADM_CHARSET_EXP', 'Si vous rencontrez des probl�mes d\'affichage avec un jeu de caract�res non latin, vous pouvez entrer ici le jeu de caract�res que uddeIM va utiliser pour convertir les donn�es de la base en codes HTML. <b> Si vous ne savez pas quelle valeur utiliser, laissez la valeur par d�faut !</b>');
define ('_UDDEADM_MAILCHARSET_HEAD', 'Jeu de caract�res utilis� pour les e-mails');
define ('_UDDEADM_MAILCHARSET_EXP', 'Si vous rencontrez des probl�mes d\'affichage avec un jeu de caract�res non latin, vous pouvez entrer ici le jeu de caract�res que uddeIM va utiliser pour converir les donn�es de la base en codes HTML. <b> Si vous ne savez pas quelle valeur utiliser, laissez la valeur par d�faut !</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
define ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Voici le contenu de l\'email que les utilisateurs vont recevoir quand cette option est activ�e. Le contenu du message priv� n\'est pas inclu. Gardez intactes les variables %you%, %user%, %pmessage% et %site%. ');		
define ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', ' Voici le contenu de l\'e-mail que les utilisateurs vont recevoir quand cette option est activ�e. Cet e-mail va inclure le contenu du message. Gardez intactes les variables %you%, %user%, %pmessage% et %site%. ');	
define ('_UDDEADM_EMN_FORGETMENOT_EXP', ' Voici le contenu de l\'e-mail "forgetmenot" que l\'utilisateur recevra quand cette option est activ�e. Gardez intactes les variables %you% et %site%. ');		
define ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Permet � l\'utilisateur de r�cuperer les messages archiv�s en les envoyant � son adresse e-mail.');
define ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Autoriser le t�l�chargement');	
define ('_UDDEADM_EXPORT_FORMAT_EXP', 'Voici le format de l\'e-mail que l\'utilisaeur recevra apr�s t�l�chargement des messages depuis l\'archive. Gardez intactes les variables %user%, %msgdate% et %msgbody% . ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 
define ('_UDDEADM_INBOXLIMIT_HEAD', 'Limite de la bo�te de r�ception');		
define ('_UDDEADM_INBOXLIMIT_EXP', 'Vous pouvez mettre une limite de messages dans la bo�te de r�ception comprenant tous les messages, dont les messages archiv�s. Dans ce cas, le nombre de messages dans la bo�te de r�ception et les messages archiv�s ne doit pas d�passer le nombre d�termin� ci-dessus.
Autrement, vous pouvez limiter le nombre de message dans la bo�te de r�ception sans compter ceux dans la bo�te d\'archive. Dans ce cas, les utilisateurs ne pourront pas avoir plus de messages dans leur bo�te de r�ception que le nombre d�termin� ci-dessus. Si le maximum est atteint, ils ne pourront plus r�pondre ou composer de nouveaux messages tant qu\'ils n\'en effacent pas dans leur bo�te de r�ception ou dans leurs archives (ils pourront tout de m�me recevoir des messages et le lire).');
define ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Afficher la limite autoris�e dans la bo�te de r�ception');		
define ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Affiche le nombre de messages et de messages archiv�s (et la limite autoris�e) en dessous de la bo�te de r�ception.');
define ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Vous avez d�sactiv� l\'archivage. Quel traitement voulez-vous appliquer aux messages d�j� archiv�s ?');		
define ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Les oublier');		
define ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Les laisser dans l\'archive (l\'utilisateur ne pourra plus y acc�der mais ils restent compt�s pour le calcul de la limite autoris�e.).');		
define ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Les d�placer dans la bo�te de r�ception');		
define ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Archive d�plac�e dans la bo�te de r�ception');
define ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Les messages seront d�plac�s dans la bo�te de r�ception de chaque utilisateur (ou dans le corbeille s\'ils ne sont plus conformes � la dur�e de conservation d�finie).');		

		
// 0.4 frontend, but visible admins only (no translation necessary)		

define ('_UDDEIM_SEND_ASSYSM', 'envoyer en tant que message syst�me (= le destinataire ne peut pas r�pondre)');
define ('_UDDEIM_SEND_TOALL', 'envoyer � tous les utilisateurs');
define ('_UDDEIM_SEND_TOALLADMINS', 'envoyer � tous les administrateurs');
define ('_UDDEIM_SEND_TOALLLOGGED', 'envoyer � tous les utilisateurs connect�s');
define ('_UDDEIM_VALIDFOR_1', 'valable pour ');
define ('_UDDEIM_VALIDFOR_2', ' heures. 0=jamais (application de la suppresion automatique)');
define ('_UDDEIM_WRITE_SYSM_GM', '[Cr�er un message g�n�ral ou syst�me]');
define ('_UDDEIM_WRITE_NORMAL', '[Cr�er un message normal]');
define ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Message g�n�ral ou syst�me non permis.');
define ('_UDDEIM_SYSGM_TYPE', 'Type du message');
define ('_UDDEIM_HELPON_SYSGM', 'Aide sur les messages syst�me');
define ('_UDDEIM_HELPON_SYSGM_2', '(ouvrir dans une nouvelle fen�tre)');

define ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Vous �tes en train d\'envoyer le message suivant. Confirmer ou annuler!');
define ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Message � <strong>tous les utilisateurs</strong>');
define ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Message � <strong>tous les administrateurs</strong>');
define ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Message � <strong>tous les utilisateurs connect�s</strong>');
define ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Le destinataire ne peut pas r�pondre � ce message.');
define ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Le message sera envoy� avec <strong>');
define ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> comme identifiant');

define ('_UDDEIM_SYSGM_WILLEXPIRE', 'Le message expirera ');
define ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Le message n\'expirera pas');
define ('_UDDEIM_SYSGM_CHECKLINK', '<b>V�rifier le lien (en cliquant sur) avant toute action !</b>');
define ('_UDDEIM_SYSGM_SHORTHELP', 'Utilisation <strong>uniquement pour les messages syst�me</strong>:<br /> [b]<strong>gras</strong>[/b] [i]<em>italique</em>[/i]<br />
[url=http://www.unlien.com]un lien[/url] or [url]http://www.unlien.com[/url] sont des liens.');
define ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Erreur: Destinataire non trouv�. Message non envoy�.');			

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'Style de uddeIM');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Choisissez le style de uddeIM');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Montrer les connexions CB');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Choisissez <i>oui</i> si vous avez install� Community Builder et voulez montrer � l\'utilisateur le nom des utilisateurs connect�s lorsqu\'il compose un nouveau message.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Montrer le lien Param�tres');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Le lien Param�tres appara�t dans uddeIM si vous avez activ� la notification email ou le syst�me de blocage. Si vous n\'en voulez pas, vous pouvez le d�sactiver ici.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'oui, en bas');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Autoriser le BBcode');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'format des caract�res seulement');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Choisissez <i>format des caract�res seulement</i> pour autoriser aux utilisateurs le BBcode � mettre des caract�res en gras, italique, soulign�, en couleur et changer la taille. Si vous choisissez <i>oui</i>, les utilisateurs pourront utiliser <strong>la totalit�</strong> des fonctionnalit�s du BBcode dans leurs messages (m�me les liens et les images).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Autoriser �motic�nes');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Choisissez <i>oui</i> pour que les �motic�nes (smileys) comme :-) soient remplac�s par un ic�ne graphique lors de la lecture du message. Voyez le fichier readme pour avoir la liste des �motic�nes support�s.');
DEFINE ('_UDDEADM_DISPLAY', 'Affichage');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Montrer les ic�nes de menu');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Choisissez <i>oui</i> pour que les liens de menu et d\'action soient affich�s avec un ic�ne.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Titre du composant');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Vous pouvez changer le titre de la messagerie priv�e, par exemple \'Messagerie priv�e\'. Laissez vide si vous ne voulez pas afficher de titre.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Montrer le lien a propos');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Choisissez <i>oui</i> pour que s\'affiche un lien vers les cr�dits et la licence du logiciel uddeIM. Ce lien sera plac� en bas lorsque s\'affiche uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Arr�ter les emails maintenant');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Cochez cette case pour interdire uddeIM d\'envoyer des mails (emails de notification et de rappel) sans tenir compte du choix des utilisateurs, par exemple pour tester le site. Si vous ne voulez pas utilisez cette fonction, mettez toutes les fonctions ci-dessus sur <i>non</i>');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manuellement');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'Miniatures CB dans la liste');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Choisissez <i>oui</i> si vous voulez afficher des miniature des avatars Community Builder des utilisateurs dans les listes de messages (bo�te de r�ception, bo�te d\'envoi, etc.)');


// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Montrer les utilisateurs');
DEFINE ('_UDDEIM_CONNECTIONS', 'Connexions');
DEFINE ('_UDDEIM_SETTINGS', 'Param�tres');
DEFINE ('_UDDEIM_NOSETTINGS', 'Il n\'y a pas de param�tre � changer.');
DEFINE ('_UDDEIM_ABOUT', 'A propos'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Nouveau'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Notification e-mail');
DEFINE ('_UDDEIM_EMN_EXP', 'Vous pouvez recevoir un e-mail lors de la r�ception de nouveaux messages priv�s.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Notification e-mail de nouveaux messages');
DEFINE ('_UDDEIM_EMN_NONE', 'Pas de notification e-mail');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Notification e-mail seulement si d�connect�');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Ne pas envoyer d\'e-mail de notification');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Bloquer des utilisateurs'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Vous pouvez emp�cher des utilisateurs de vous envoyer des messages en les bloquant. Choisissez <i>bloquer l\'utilisateur</i> quand vous lisez un message de la personne que vous voulez bloquer.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Enregistrer les changements');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'Tags BB Code pour d�finir du texte en gras. Utilisation : [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'Tags BB Code pour d�finir du texte en italique. Utilisation : [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'Tags BB Code pour d�finir du texte soulign�. Utilisation : [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'Tags BB Code pour d�finir la couleur du texte. Utilisation : [color=#XXXXXX]en couleurs[/color] o� XXXXXX est le code hexad�cimal de la couleur que vous voulez, par exemple FF0000 pour du rouge.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'Tags BB Code pour d�finir la couleur du texte. Utilisation : [color=#XXXXXX]en couleurs[/color] o� XXXXXX est le code hexad�cimal de la couleur que vous voulez, par exemple 00FF00 pour du vert.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'Tags BB Code pour d�finir la couleur du texte. Utilisation : [color=#XXXXXX]en couleurs[/color] o� XXXXXX est le code hexad�cimal de la couleur que vous voulez, par exemple 0000FF pour du bleu.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'Tags BB Code pour d�finir du texte de tr�s petite taille. Utilisation : [size=1]texte de tr�s petite taille.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'Tags BB Code pour d�finir du texte de petite taille. Utilisation : [size=2]texte de petite taille.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'Tags BB Code pour d�finir du texte de grande taille. Utilisation : [size=4]texte de grande taille.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'Tags BB Code pour d�finir du texte de tr�s grande taille. Utilisation : [size=5]texte de tr�s grande taille.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'Tags BB Code pour ins�rer un lien d\'image. Utilisation : [img]URL-Image[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'Tags BB Code pour ins�rer un hyperlien. Utilisation : [url]adresse web[/url]. N\'oubliez pas le http:// au d�but des adresses.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Fermer tous les tags BBcode.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' message dans votre'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>Vous n\'avez pas de message archiv�.</strong>'); 
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Idem pour l\'encodage des e-mails');
