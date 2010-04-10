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
// Language file: Serbian
// Translator:    Miloš
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'УВЕЗИ');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Учитај MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Ово одређује како uddeIM учитава MooTools (MooTools је неопходан за Autocompleter): <i>немој</i> је корисно када шаблон учитава MooTools, <i>ауто</i> се препоручује подразумевано (исто понашање као у uddeIM 1.2), када користите J1.0 такође можете приморати учитавање MooTools 1.1 или 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'немој учитавати MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'ауто');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'приморај учитавање MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'приморај учитавање MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...постављам подразумевано за MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Кодирано са Base64');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Подеси временску зону');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Када uddeIM показује погрешно време овде можете подесити временску зону. Када је све исправно подешено, ово обично треба да буде нула. Међутим могу постојати случајеви када морате променити ову вредност.');
DEFINE ('_UDDEADM_HOURS', 'часова');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Информације о верзији:');
DEFINE ('_UDDEADM_STATISTICS', 'Статистика:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Прикажи статистику');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Ово приказује неке статистике као што је број сачуваних порука итд.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'ПРИКАЖИ СТАТИСТИКУ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Поруке сачуване у бази података: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Поруке које је прималац бацио у смеће: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Поруке које је пошиљалац бацио у смеће: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Поруке задржане за прочишћавање: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Пребриши Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'uddeIM обично покушава да утврди тачан Itemid када исти није постављен. У неким случајевима може бити неопходно пребрисати ову вредност, нпр. када користите неколико веза из менија за uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Утврђени Itemid је: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Користи Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Користи овај Itemid уместо утврђеног.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Користи везе профила');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Када је постављено на <i>да</i>, сва корисничка имена која се појављују у uddeIM-у ће бити приказана као везе до њихових корисничких профила.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Прикажи сличице');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Када је постављено на <i>да</i>, биће приказана сличица дотичног корисника при читању поруке.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Прикажи сличице у списку');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Поставите на <i>да</i> ако желите да прикажете сличице корисника у прегледу списка порука (пријемно и отпремно сандуче, итд.)');
DEFINE ('_UDDEADM_FIREBOARD', 'FireBoard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Искључено');
DEFINE ('_UDDEADM_ENABLED', 'Укључено');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Важно');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Дозволи означавање порука');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Дозвољава означавање порука (uddeIM приказује звездицу у списку која може бити истакнута да обележи важне поруке).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Важно: Када надградите uddeIM са раније верзије проверите README. Понекад марте да додате или измените поља и табеле у бази података!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Додај CC: линију');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Скрати цитирани текст');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Скрати цитирани текст на 2/3 најдуже дужине текста ако он прелази ову границу.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Ставке у пријемном сандучету ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Последње ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' ставке');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Статус');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Пошиљалац');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Порука');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Празно пријемно сандуче');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Приступ канти за смеће није дозвољен.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Ограничи приступ канти за смеће');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Можете ограничити приступ канти за смеће. Канта за смеће је обично доступна свима (<i>без ограничења</i>). Можете ограничити приступ на специјалне кориснике или само администраторе, тако да групе са нижим правима приступа не могу да рециклирају поруке.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'без ограничења');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'специјални корисници');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'само администратори');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Сакриј кориснике у јавном списку корисника');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Унесите корисничке ИД-е које треба сакрити у јавном списку корисника (нпр. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Сакриј кориснике у списку корисника');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Унесите корисничке ИД-е које треба сакрити у списку корисника (нпр. 65,66,67). Администратори ће увек моћи да виде комплетан списак.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF напад је препознат');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF заштита');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Ово штити све формуларе против Cross-Site Request Forgery напада. Ово обично треба да је укључено. Искључите само ако имате чудне проблеме.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Не можете одговарати на архивиране поруке.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Одговори нерегистрованим корисницима не могу да буду опозвани.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Дозволи одговоре');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Дозволи директне одговоре на поруке од јавних корисника.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Здраво %user%,\n\n%you% вам је послао/ла следећу приватну поруку на %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Прикажи стварна имена');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Приказати стварна или корисничка имена у јавном сучељу?');
DEFINE ('_UDDEIM_USERLIST', 'Списак корисника');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Жалим, морате сачекати пре него што можете послати нову поруку');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Последње послато');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Временска задршка');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Време у секундама које корисник мора сачекати пре него што може послати следећу поруку (0 за никакву задршку).');
DEFINE ('_UDDEADM_SECONDS', 'секунди');
DEFINE ('_UDDEIM_PUBLICSENT', 'Порука је послата.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Грешка у имену пошиљаоца');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Грешка у адреси е-поште');
DEFINE ('_UDDEIM_YOURNAME', 'Ваше име:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Ваша е-пошта:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Користите uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Већ користите последњу uddeIM верзију.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Текућа верзија је ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Информације о ажурирању:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Провери за ажурирања');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Ово ступа у контакт са веб сајтом uddeIM програмера како би се добавиле информације о текућој uddeIM верзији. Сем uddeIM верзије коју користите, никакви други личини подаци неће бити послати.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'ПРОВЕРИ САДА');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Не могу да добавим податке о верзији.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Није пронађен списак контаката!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Максималан број прималаца је превазиђен (макс. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Максималан број ставки');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Максимално дозвољен број ставки по списку контаката.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Списак контаката није укључен');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Укључи списак контаката');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM дозвољава корисницима да направе списак контаката. Ови спискови могу да се употребе за слање порука вишеструким корисницима. Не заборавите да укључите вишеструке примаоце када желите да користите списак контаката.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'укључен');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'регистровани корисници');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'посебни корисници');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'само администратори');
DEFINE ('_UDDEIM_LISTSNEW', 'Направи нови списак контаката');
DEFINE ('_UDDEIM_LISTSSAVED', 'Списак контаката је сачуван');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Списак контаката је ажуриран');
DEFINE ('_UDDEIM_LISTSDESC', 'Опис');
DEFINE ('_UDDEIM_LISTSNAME', 'Име');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Име (без размака)');
DEFINE ('_UDDEIM_EDITLINK', 'уреди');
DEFINE ('_UDDEIM_LISTS', 'Контакти');
DEFINE ('_UDDEIM_STATUS_READ', 'прочитана');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'непрочитана');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'на вези');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'ван везе');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Прикажи слике CB галерије');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'uddeIM подразумевано приказује само аватаре које су корисници поставили. Када укључите ову поставку uddeIM такође приказује слике из CB галерије аватара.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Деблокирај CB везе');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Можете дозволити поруке примаоцима када је регистровани корисник у списку CB веза примаоца (иако је прималац у групи која је блокирана). Ова поставка је независна од појединачног блокирања које сваки корисник може да подеси када је укључено (видите поставке изнад).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Није вам дозвољено слање овој групи.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Овај прималац вас блокира.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Блокиране групе (регистровани корисници)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Групе за које регистрованим корисницима није дозвољено да шаљу поруке. Ово је само за регистроване кориснике. Ова поставка не утиче на посебне кориснике и администраторе. Ова поставка је независна од појединачног блокирања које сваки корисник може да подеси када је укључено (видите поставке изнад).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Блокиране групе (јавни корисници)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Групе за које јавним корисницима није дозвољено да шаљу поруке. Ова поставка не утиче на посебне кориснике и администраторе. Ова поставка је независна од појединачног блокирања које сваки корисник може да подеси када је укључено (видите поставке изнад). Када блокирате групу, корисници у овој групи не могу да виде опцију за укључивање јавног сучеља у својим поставкама профила.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Јавни корисник');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB веза');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Регистровани корисник');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Аутор');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Уредник');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Објављивач');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Менаџер');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Администратор');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'Суперадминистратор');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Корисник прихвата поруке само од регистрованих корисника.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Сакриј од јавног списка „Сви корисници“');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Можете скрити одређене групе од укључивања у јавни списак „Сви корисници“. Напомена: ово сакрива само имена, корисници још увек могу примати поруке. Корисници који немају укључено јавно сучеље никада неће бити уврштени у овај списак.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Сакриј од списка „Сви корисници“');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Можете скрити одређене групе од укључивања у списак „Сви корисници“. Напомена: ово сакрива само имена, корисници још увек могу примати поруке.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'ниједан');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'само суперадминистратори');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'само администратори');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'посебни корисници');
DEFINE ('_UDDEADM_PUBLIC', 'Јавно');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Понашање везе „Сви корисници“');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Изаберите да ли веза „Сви корисници“ треба да буде изостављена у јавном сучељу, приказана или су сви корисници увек приказани.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Јавно сучеље');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- изаберите јавне -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Дозволи слање порука јавним корисницима');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Достигнуто је ограничење порука!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Јавни корисник');
DEFINE ('_UDDEIM_DELETEDUSER', 'Корисник је обрисан');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha дужина');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Одређује колико знакова корисник мора да унесе.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha заштита од спама');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Одређује ко мора да унесе captcha при слању поруке');
DEFINE ('_UDDEADM_CAPTCHAF0', 'искључено');
DEFINE ('_UDDEADM_CAPTCHAF1', 'само јавни корисници');
DEFINE ('_UDDEADM_CAPTCHAF2', 'јавни и регистровани корисници');
DEFINE ('_UDDEADM_CAPTCHAF3', 'јавни, регистровани, посебни корисници');
DEFINE ('_UDDEADM_CAPTCHAF4', 'сви корисници (укључујући администраторе)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Укључи јавно сучеље');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Када је укључено, јавни корисници могу да шаљу поруке регистрованим корисницима (који могу да одреде у својим личним поставкама да ли желе да користе ову могућност).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Подразумевано за јавно сучеље');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Ово је подразумевана вредност ако јавном кориснику дозвољено шаље поруку регистрованом кориснику.');
DEFINE ('_UDDEADM_PUBDEF0', 'искључено');
DEFINE ('_UDDEADM_PUBDEF1', 'укључено');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Погрешан безбедносни код');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'нема или непознато');
DEFINE ('_UDDEADM_DONATE', 'Ако вам се свиђа uddeIM и желите да подржите развој молимо вас направите малу донацију.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Подешавања пронађена у бази података: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Резервна копија и повраћај подешавања');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Можете да направите резервну копију подешавања у бази података и повратити је када је то неопходно. Ово је корисно када ажурирате uddeIM или када желите да сачувате извесна подешавања због испробавања.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'КОПИРАЈ');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'ВРАТИ');
DEFINE ('_UDDEADM_CANCEL', 'Откажи');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Знаковни скуп језичке датотеке');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Обично је <b>подразумеван</b> (ISO-8859-1) исправна поставка за Joomla 1.0 и <b>UTF-8</b> за Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'подразумеван');
DEFINE ('_UDDEIM_READ_INFO_1', 'Прочитане поруке ће остати у пријемном сандучету највише ');
DEFINE ('_UDDEIM_READ_INFO_2', ' дана пре него што буду аутоматски обрисане.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Непрочитане поруке ће остати у пријемном сандучету највише ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' дана пре него што буду аутоматски обрисане.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Послате поруке ће остати у отпремном сандучету највише ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' дана пре него што буду аутоматски обрисане.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Прикажи обавештење за прочитане поруке у пријемном сандучету');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Прикажи обавештење <i>„Прочитане поруке ће бити обрисане после n дана“</i> у пријемном сандучету');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Прикажи обавештење за непрочитане поруке у пријемном сандучету');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Прикажи обавештење <i>„Непрочитане поруке ће бити обрисане после n дана“</i> у пријемном сандучету');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Прикажи обавештење за послате поруке у отпремном сандучету');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Прикажи обавештење <i>„Послате поруке ће бити обрисане после n дана“</i> у отпремном сандучету');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Прикажи обавештење за бачене поруке у канти за смеће');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Прикажи обавештење <i>„Бачене поруке ће бити прочишћене после n дана“</i> у канти за смеће');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Послате поруке се чувају (дана)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Унесите број дана пре него што се <b>послате</b> поруке аутоматски бришу из отпремног сандучета.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'пошаљи свим посебним корисницима');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Порука <b>свим посебним корисницима</b>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- изаберите корисничко име -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- изаберите име -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Уреди корисничке поставке');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'постојећи');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'непостојећи');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- изаберите ставку -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- изаберите обавештење -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- изаберите искачући прозор -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Корисничко име');
DEFINE ('_UDDEADM_USERSET_NAME', 'Име');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Обавештење');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Искачући прозор');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Последњи приступ');
DEFINE ('_UDDEADM_USERSET_NO', 'Не');
DEFINE ('_UDDEADM_USERSET_YES', 'Да');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'непознато');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Када није на вези (изузев одговора)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Увек (изузев одговора)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Када није на вези');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Увек');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Нема обавештења');
DEFINE ('_UDDEADM_WELCOMEMSG', "Добро дошли у uddeIM!\n\nУспешно сте инсталирали uddeIM.\n\nПокушајте да прегледате ову поруку под различитим шаблонима. Можете их поставити у административном зачељу uddeIM-а.\n\nuddeIM је пројекат у развоју. Ако пронађете грешке или слабости, молим вас да ми их дојавите како бисмо заједно могли да учинимо uddeIM бољим.\n\nСрећно и добро се забавите!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM инсталација је завршена.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Наставите до административног зачеља и прегледајте поставке.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Ако покрећете CMS са скупом знакова који није ISO 8859-1 побрините се да је ова поставка одговарајуће прилагођена.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Након инсталације, сав uddeIM саобраћај е-поште (е-пошта за обавештења, незаборавке) је искључен тако да се не шаље никаква е-пошта за време испробавања. Не заборавите да искључите „заустави е-пошту“ у зачељу када завршите.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Највише прималаца');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Највећи дозвољени број прималаца по поруци (0=без ограничења)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'превише прималаца');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Слање је е-поште је искључено.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Претрага унутар текста');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Autocompleter претражује унутар текста (у супротном претражује само почетак)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Понашање везе „Сви корисници“');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Изаберите да ли веза „Сви корисници“ треба да буде прикривена, приказана или да ли увек треба да буду приказани сви корисници.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Прикриј везу „Сви корисници“');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Прикажи везу „Сви корисници“');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Увек прикажи све кориснике');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Подешавање није уписиво:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Подешавање је уписиво:');
DEFINE ('_UDDEIM_FORWARDLINK', 'проследи');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'прималац је пронађен');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'прималаца је пронађено');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php пошта (подразумевано)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Поштански систем');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Изаберите поштански систем који uddeIM треба да користи за слање обавештења е-поштом.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Прикажи Joomla групе');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Прикажи Joomla групе у општем списку порука.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Прослеђивање порука');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Дозволи прослеђивање порука.');
DEFINE ('_UDDEIM_FWDFROM', 'Оригинална порука од');
DEFINE ('_UDDEIM_FWDTO', 'за');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Деархивирај поруку');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'не могу да деархивирам поруку');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Дозволи вишеструке примаоце');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Дозволи вишеструке примаоце (раздвојене зарезима).');
DEFINE ('_UDDEIM_CHARSLEFT', 'знакова је преостало');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Прикажи текстуални бројач');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Приказује текстуални бројач који показује колико је знакова преостало.');
DEFINE ('_UDDEIM_CLEAR', 'Очисти');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Додај изабране кориснике у примаоце');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Ово дозвољава вишеструки избор прималаца из списка „свих корисника“.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Додај изабране везе у примаоце');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Ово дозвољава вишеструки избор прималаца из списка „CB веза“.');
DEFINE ('_UDDEADM_PMSFOUND', 'Пронађени PMS: ');
DEFINE ('_UDDEIM_ENTERNAME', 'унесите име');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Користи аутоматско довршавање');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Користи аутоматско довршавање за име примаоца.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Кључ употребљен за замућивање');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Унесите кључ који се користи за замућивање поруке. Немојте мењати ову вредност након што укључите замућивање порука.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Пронађена је погрешна датотека подешавања!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Пронађена верзија:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Очекивана верзија:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Преносим подешавања...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Завршено!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Критична грешка: Неуспело уписивање у датотеку подешавања:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Шифрована порука! - Преузимање није могуће!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Погрешна лозинка! - Преузимање није могуће!');
DEFINE ('_UDDEIM_WRONGPW', 'Погрешна лозинка! - Контактирајте администратора базе података!');
DEFINE ('_UDDEIM_WRONGPASS', 'Погрешна лозинка!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Погрешан датум бацања у смеће (пријемно/отпремно сандуче): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Исправљам погрешне датуме бацања у смеће');
DEFINE ('_UDDEIM_TODP', 'За: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Прочисти поруке сада');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Прикажи иконе за акције');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Када је постављено на <b>да</b>, везе за акције ће бити приказане иконом.');
DEFINE ('_UDDEIM_UNCHECKALL', 'поништи све');
DEFINE ('_UDDEIM_CHECKALL', 'штиклирај све');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Прикажи доње иконе');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Када је постављено на <b>да</b>, доње везе ће бити приказане иконом.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Користи анимиране смешке');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Користи анимиране смешке уместо непокретних.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Додатни анимирани смешци');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Прикажи додатне анимиране смешке.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Шифрована порука - Неопходна је лозинка');
DEFINE ('_UDDEIM_PASSWORD', '<b>Неопходна је лозинка</b>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Лозинка');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (текст за шифровање)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (текст за дешифровање)');
DEFINE ('_UDDEIM_MORE', 'ЈОШ');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Приватне поруке');
DEFINE ('_UDDEMODULE_NONEW', 'нула нових');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Нове поруке: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'поруку');
DEFINE ('_UDDEMODULE_MESSAGES', 'порука');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Имате');
DEFINE ('_UDDEMODULE_HELLO', 'Здраво');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Хитна порука');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Користи шифровање');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Шифрирај сачуване поруке');
DEFINE ('_UDDEADM_CRYPT0', 'Ништа');
DEFINE ('_UDDEADM_CRYPT1', 'Замути поруке');
DEFINE ('_UDDEADM_CRYPT2', 'Шифрирај поруке');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Подразумевано обавештење е-поштом');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Подразумевана вредност за обавештење е-поштом (за кориснике који још нису изменили своје поставке).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Без обавештења');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Увек');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Обавештење ван везе');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Прикриј везу „Свим корисницима“');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Прикриј везу „Свим корисницима“ у оквиру за писање поруке (корисно када је регистровано пуно корисника).');
DEFINE ('_UDDEADM_POPUP_HEAD','Искачуће обавештење');
DEFINE ('_UDDEADM_POPUP_EXP','Прикажи искачуће обавештење када стигне нова порука (неопходан је mod_uddeim или закрпљени mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', 'Даља подешавања');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Овде можете подесити још неке поставке.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Прикажи искачуће обавештење када стигне нова порука');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Подразумевано укључи искачуће обавештење');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Подразумевано укључи искачуће обавештење (за кориснике који још нису изменили своје поставке).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Одржавање');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Одржавање базе података');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'ПРОВЕРИ');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'ПОПРАВИ');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Када је корисник очишћен из базе података његове поруке обично остају у бази. Ова функција проверава да ли је неопходно бацити напуштене поруке у смеће и можете их бацити ако је то неопходно.<br />Ово такође проверава базу за неке грешке које ће бити исправљене.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Проверавам...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (корисничко име): [пријемно сандуче|пријемно сандуче је избачено|отпремно сандуче|отпремно сандуче је избачено]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>пријемно сандуче: поруке су сачуване у пријемном сандучету корисника</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>пријемно сандуче је избачено: поруке из корисниковог пријемног сандучета су бачене у смеће, али су и даље у нечијем отпремном сандучету</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>отпремно сандуче: поруке су сачуване у отпремном сандучету корисника</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>отпремно сандуче је избачено: поруке из корисниковог отпремног сандучета су бачене у смеће, али су и даље у нечијем пријемном сандучету</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Избацујем...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "није пронађен (од/за/поставке/блокира/блокиран):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "обриши све поставке корисника");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "обриши блокирање корисника");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', " баци у смеће све поруке које су послате обрисаном кориснику из отпремног сандучета пошиљаоца и пријемног сандучета обрисаног корисника");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "баци у смеће све поруке које је послао обрисани корисник из његовог отпремног сандучета и пријемног сандучета примаоца");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Нема шта да се ради</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Потребно је одржавање</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Приказ правих имена');
DEFINE ('_UDDEADM_NAMESDESC', 'Приказ правих или корисничких имена?');
DEFINE ('_UDDEADM_REALNAMES', 'Права имена');
DEFINE ('_UDDEADM_USERNAMES', 'Корисничка имена');
DEFINE ('_UDDEADM_CONLISTBOX', 'Падајући списак CB веза');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Приказ веза у падајућем списку или у табели?');
DEFINE ('_UDDEADM_LISTBOX', 'Падајући списак');
DEFINE ('_UDDEADM_TABLE', 'Табела');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Поруке ће остати у канти за смеће 24 часа пре него што буду обрисане. Можете видети само почетне речи поруке. Да бисте прочитали целу поруку, морате је прво вратити.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Поруке ће остати у канти за смеће ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' часова пре него што буду обрисане. Можете видети само почетне речи поруке. Да бисте прочитали целу поруку, морате је прво вратити.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Ова порука је опозвана. Можете је уредити и поново послати.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Порука није могла бити опозвана (вероватно зато што је или прочитана или обрисана).');
DEFINE ('_UDDEIM_CANTRESTORE', 'Враћање поруке није успело. (Могуће је да је била предуго у канти за смеће и да је у међувремену обрисана.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Враћање поруке није успело.');
DEFINE ('_UDDEIM_DONTSEND', 'Не шаљи');
DEFINE ('_UDDEIM_SENDAGAIN', 'Пошаљи поново');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Нисте пријављени.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<b>Немате порука у пријемном сандучету.</b>');

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<b>Немате порука у отпремном сандучету.</b>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<b>Немате порука у канти за смеће.</b>');
DEFINE ('_UDDEIM_INBOX', 'Пријемно сандуче');
DEFINE ('_UDDEIM_OUTBOX', 'Отпремно сандуче');
DEFINE ('_UDDEIM_TRASHCAN', 'Канта за смеће');
DEFINE ('_UDDEIM_CREATE', 'Нова порука');
DEFINE ('_UDDEIM_UDDEIM', 'Приватне поруке');
DEFINE ('_UDDEIM_READSTATUS', 'Прочитана');
DEFINE ('_UDDEIM_FROM', 'Пошиљалац');
DEFINE ('_UDDEIM_FROM_SMALL', 'пошиљалац');
DEFINE ('_UDDEIM_TO', 'Прималац');
DEFINE ('_UDDEIM_TO_SMALL', 'прималац');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Отпремно сандуче садржи све поруке које сте послали. Можете их опозвати уколико још увек нису прочитане. Уколико то учините, прималац више неће моћи да их прочита. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'опозови');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Опозови ову поруку');
DEFINE ('_UDDEIM_RESTORE', 'врати');
DEFINE ('_UDDEIM_MESSAGE', 'Порука');
DEFINE ('_UDDEIM_DATE', 'Датум');
DEFINE ('_UDDEIM_DELETED', 'Обрисано');
DEFINE ('_UDDEIM_DELETE', 'обриши');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'обриши');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Ова порука не може бити обрисана<br />Могући разлози:<ul><li>Немате права да прочитате ову поруку.</li><li>Порука је већ обрисана.</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Преместили сте поруку у канту за смеће.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Порука од ');
DEFINE ('_UDDEIM_MESSAGETO', 'Порука од вас за ');
DEFINE ('_UDDEIM_REPLY', 'Одговори');
DEFINE ('_UDDEIM_SUBMIT', 'Пошаљи');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Премести оригиналну поруку у канту за смеће након одговора');
DEFINE ('_UDDEIM_NOID', 'Грешка: Није пронађен прималац. Порука није послата.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Грешка: Порука не садржи текст! Порука није послата.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Одговор је послат');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Порука је послата');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' а оригинална порука је пребачена у смеће');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Нема корисника са овим корисничким именом!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Не можете послати поруку сами себи!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Прекршај приступа!</b> Немате право да изведете ову операцију!');
DEFINE ('_UDDEIM_PRUNELINK', 'Само за администраторе: Прочисти');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM администрација');
DEFINE ('_UDDEADM_GENERAL', 'Опште');
DEFINE ('_UDDEADM_ABOUT', 'О компоненти');
DEFINE ('_UDDEADM_DATESETTINGS', 'Датум/време');
DEFINE ('_UDDEADM_PICSETTINGS', 'Иконе');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Прочитане поруке се чувају (дана)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Непрочитане поруке се чувају (дана)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Поруке се чувају у смећу (дана)');
DEFINE ('_UDDEADM_DAYS', 'дан(а)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', ' Унесите број дана пре него што <b>прочитане</b> поруке буду аутоматски обрисане из пријемног сандучета. Ако не желите да аутоматски бришете поруке, унесите веома велику вредност (нпр. 36524 дана је једнако једном веку). Имајте ипак на уму да се база података може брзо напунити ако задржавате све поруке.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Унесите број дана пре него што буду обрисане поруке које још увек <b>није прочитао</b> намерени прималац.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Унесите број дана пре него што поруке буду обрисане из канте за смеће. Децималне вредности су могуће, нпр. за брисање порука из канте за смеће после 3 часа унесите 0.125 као вредност.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Формат приказа датума');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Изаберите формат за приказивање датума/времена. Месеци ће бити скраћени у складу са локалном Joomla поставком за језик (уколико постоји одговарајућа uddeIM језичка датотека).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Приказ дужег датума');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Када се приказују поруке постоји више простора за низ датума/времена. Изаберите формат за приказивање датума при отварању нове поруке. За називе дана у недељи и месеци ће се употребити локална Joomla поставка за језик (уколико постоји одговарајућа uddeIM језичка датотека).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Брисање покреће');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'само администратор');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'било који корисник');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'ручно');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Аутоматско брисање ствара велико оптерећење сервера. Ако изаберете <b>само администратор</b>, аутоматско брисање се покреће када администратор проверава своје пријемно сандуче. Изаберите ову опцију ако администратор редовно проверава своје пријемно сандуче. Мали или сајтови који се ретко администрирају могу да изаберу <b>било који корисник</b>.');

	// above string changed in 0.4
DEFINE ('_UDDEADM_SAVESETTINGS', 'Сачувај подешавања');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Следећа подешавања су сачувана у датотеку подешавања:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Подешавања су сачувана.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Икона: корисник је на вези');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Унесите локацију иконе која ће бити приказана поред корисничког имена када је овај корисник на вези.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Икона: корисник није на вези');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Унесите локацију иконе која ће бити приказана поред корисничког имена када овај корисник није на вези.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Икона: прочитана порука');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Унесите локацију иконе која ће бити приказана за прочитане поруке.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Икона: непрочитана порука');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Унесите локацију иконе која ће бити приказана за непрочитане поруке.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Модул: икона нове поруке');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Ово подешавање се односи на модул mod_uddeim. Унесите локацију иконе коју овај модул треба да прикаже када постоје нове поруке.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM инсталација');
DEFINE ('_UDDEADM_FINISHED', 'Инсталација је завршена. Добро дошли у uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Немате инсталиран Mambo Community Builder. Нећете бити у могућности да користите uddeIM.</span><br /><br />Можда бисте желели да преузмете <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'настави');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Постоји ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' порука у старој инсталацији PMS-а. Да ли желите да увезете ове поруке у uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Ово неће изменити поруке или инсталацију старог PMS-а. Они ће бити нетакнути и можете их безбедно увести у uddeIM, чак и када размишљате о наставку употребе старог PMS-а. Требало би прво да сачувате било какве промене направљене у подешавањима пре него што покренете увоз! Све поруке које се већ налазе у uddeIM баци података ће остати нетакнуте.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4

DEFINE ('_UDDEADM_IMPORT_YES', 'Увези поруке старог PMS-а у uddeIM сада');
DEFINE ('_UDDEADM_IMPORT_NO', 'Не, немој увозити никакве поруке');
DEFINE ('_UDDEADM_IMPORTING', 'Сачекајте док се поруке увозе.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Завршен је увоз порука из старог PMS-а. Немојте покретати ову инсталациону скрипту поново јер ће се тиме поново увести поруке и појављиваће се двапут.');
DEFINE ('_UDDEADM_IMPORT', 'Увоз');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Увоз порука из старог PMS-а');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Није пронађена инсталација другог PMS-а. Увоз није могућ.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Већ сте увезли поруке из старог PMS-а у uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Блокирано');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Није послато (корисник вас је блокирао)');
DEFINE ('_UDDEIM_BLOCKNOW', 'блокирај&nbsp;корисника');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Ово је листа корисника које сте блокирали. Ови корисници вам не могу слати приватне поруке.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Тренутно нисте блокирали ниједног корисника.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Тренутно сте блокирали ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' корисника.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[деблокирај]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Уколико блокирани корисник покуша да вам пошаље поруку, добиће обавештење да је блокиран/а и да порука неће бити послата.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Блокирани корисник не може да види да сте га/је блокирали.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Не можете блокирати администраторе.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Укључи систем за блокирање');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Када је укључено, корисници могу да блокирају друге кориснике. Блокирани корисник не може да шаље поруке кориснику који га је блокирао. Администратори не могу да буду блокирани.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'да');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'не');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Информисање блокираног корисника');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Ако је постављено на <b>да</b>, блокирани корисник ће бити информисан да порука није послата јер га је прималац блокирао. Ако је постављено на <b>не</b>, блокирани корисник неће примити никакво обавештење да порука није послата.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'да');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'не');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Систем за блокирање није укључен');
// DEFINE ('_UDDEADM_DELETIONS', 'Порука');
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Брисање'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Блокирање');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Интеграција');
DEFINE ('_UDDEADM_EMAIL', 'Е-пошта');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Прикажи CB везе');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Када је постављено на <b>да</b>, сва корисничка имена која се појављују у uddeIM-у ће се приказати као везе ка њиховом Community Builder профилу.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Прикажи CB сличицу');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Када је постављено на <b>да</b>, сличица корисника сачувана у Community Builder-у ће бити приказана при читању поруке.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Прикажи статус везе');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Када је постављено на <b>да</b>, uddeIM приказује свако корисничко име са малом иконом која обавештава да ли је корисник на вези ли не.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Дозволи обавештења е-поштом');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Када је постављено на <b>да</b>, корисници могу да бирају да ли желе да приме е-пошту сваки пут када им нова порука стигне у пријемно сандуче.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'Е-пошта садржи поруку');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Када је постављено на <b>не</b>, ова е-пошта ће садржати податке само о томе када и ко је послао поруку, али не и саму поруку.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Е-пошта незаборавка');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Ова функција шаље е-пошту корисницима који имају непрочитане поруке у свом пријемном сандучету јако дуго времена (постављено испод). Ова поставка је независна од оне „дозволи обавештења е-поштом“. Ако не желите да шаљете било какве поруке е-поштом морате искључити обе.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Незаборавак се шаље после дан(а)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Ако је функција незаборавка (изнад) постављена на <b>да</b>, овде одредите после колико дана се е-поштом отпремају обавештења о непрочитаним порукама.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Почетни знакови у списку');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Овде можете поставити колико ће почетних знакова поруке бити приказано у пријемном и отпремном сандучету, и канти за смеће.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Највећа дужина поруке');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Поставите највећу дужину поруке (порука ће бити аутоматски скраћена када њена дужина прелази ову вредност). Поставите на „0“ за дозвољавање порука било које дужине (није препоручљиво).');
DEFINE ('_UDDEADM_YES', 'да');
DEFINE ('_UDDEADM_NO', 'не');
DEFINE ('_UDDEADM_ADMINSONLY', 'само администратори');
DEFINE ('_UDDEADM_SYSTEM', 'Систем');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Корисничко име за системске поруке');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM подржава системске поруке. Оне немају пошиљаоца и корисници не могу одговарати на њих. Овде унесите подразумевани псеудоним корисничког имена за системске поруке (на пример <b>Подршка</b> или <b>Помоћни сервис</b> или <b>Газда заједнице</b>).');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Дозволи администраторима слање општих порука');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM подржава опште поруке. Оне се шаљу свим корисницима на систему. Не користите их пречесто.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Име пошиљаоца е-поште');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Унесите име са којим долазе обавештења е-поштом (на пример <b>Ваш сајт</b> или <b>Сервис за поруке</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Адреса е-поште пошиљаоца');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Унесите адресу е-поште са које се шаљу обавештења е-поштом (ово би требало да буде главна контакт адреса е-поште за ваш сајт).');
DEFINE ('_UDDEADM_VERSION', 'uddeIM верзија');
DEFINE ('_UDDEADM_ARCHIVE', 'Архива'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Укључи архиву');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Изаберите да ли ће корисницима бити дозвољено да сачувају поруке у архиви. Поруке у архиви неће бити аутоматски обрисане.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Највише порука у архиви');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Поставите колико порука сваки корисник може сачувати у архиви (нема ограничења за администраторе).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Дозволи копије самом себи');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Дозвољава корисницима да приме копије поруке које шаљу. Ове копије ће се појавити у пријемном сандучету.');
DEFINE ('_UDDEADM_MESSAGES', 'Поруке');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Предложи бацање оригинала');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Када је ово активирано, поред дугмета „Пошаљи“ при одговарању ће се појавити кућица са ознаком „оригинал у смеће“ која је подразумевано штиклирана. У овом случају ће порука бити непосредно премештена из пријемног сандучета у канту за смеће када је одговор послат. Ова функција смањује број порука које се чувају у бази података. Корисници могу да очисте кућицу ако желе да задрже поруку у пријемном сандучету.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL

DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Порука по страници');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Овде дефинишите број приказаних порука по страници у пријемном и отпремном сандучету, канти за смеће и архиви.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Употребљен скуп знакова');
DEFINE ('_UDDEADM_CHARSET_EXP', ' Ако наилазите на проблеме са приказом нелатиничних скупова знакова, овде можете унети скуп знакова које uddeIM користи за пребацивање излаза базе података у HTML код. Подразумевана вредност је исправна за већину европских језика.');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Скуп знакова употребљен за е-пошту');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Ако наилазите на проблеме са приказом нелатиничних скупова знакова, можете унети скуп знакова које uddeIM користи за слање отпремне е-поште. Подразумевана вредност је исправна за већину европских језика.');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'

DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Ово је садржај е-поште коју ће корисници примити када је постављена опција изнад. Садржај поруке неће бити у е-пошти. Оставите променљиве %you%, %user% и %site% нетакнуте. ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Ово је садржај е-поште коју ће корисници примити када је постављена опција изнад. Ова е-пошта ће укључивати и садржај поруке. Оставите променљиве %you%, %user%, %pmessage% и %site% нетакнуте. ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Ово је садржај е-поште незаборавка коју ће корисници примити када је постављена опција изнад. Оставите променљиве %you% и %site% нетакнуте. ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Дозволи корисницима да преузму поруке из своје архиве шаљући их е-поштом њима самима.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Дозволи преузимање');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Ово је формат е-поште коју корисници примају када преузму своје поруке из архиве. Оставите променљиве %user%, %msgdate% и %msgbody% нетакнуте. ');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Постави ограничење на пријемно сандуче');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Можете укључити број порука у пријемном сандучету у максимални број архивираних порука. У овом случају, укупан број порука у пријемном сандучету и архиви не сме прећи горе постављени број. Алтернативно, можете поставити ограничење на пријемно сандуче без архиве. У овом случају, корисници не смеју имати већи број порука и њиховим пријемним сандучићима од изнад постављеног. Ако је тај број досегнут, неће моћи да одговарају или пишу нове поруке док не обришу старе поруке из пријемног сандучета или архиве. (Корисници ће још увек моћи да примају и читају поруке.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Прикажи искоришћеност ограничења код пријемног сандучета');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Прикажи колико порука су корисници сачували (и колико им је дозвољено да сачувају) у реду испод пријемног сандучета.');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Искључили сте архиву. Шта желите да учините са порукама које су сачуване у архиви?');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Остави их');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Остави их у архиви (корисник неће бити у могућности да приступи порукама и оне ће се и даље бројати ради ограничења порука).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Премести у пријемно сандуче');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Архивиране поруке су премештене у пријемно сандуче');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Поруке ће бити премештене у пријемно сандуче корисника у питању (или у смеће ако су старије него што је дозвољено за пријемно сандуче).');


// 0.4 frontend, admins only (no translation necessary)
DEFINE ('_UDDEIM_VALIDFOR_1', 'важи ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' часова. 0=заувек (аутоматско брисање се примењује)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Направите системску или општу поруку]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Направите обичну (стандардну) поруку]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Системске и опште поруке нису дозвољене.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Врста поруке');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Помоћ за системске поруке');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(отвара се у новом прозору)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Спремате се да пошаљете поруку приказану испод. Прегледајте је и потврдите или откажите!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Порука <b>свим корисницима</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Порука <b>свим администраторима</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Порука <b>свим тренутно пријављеним корисницима</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Примаоци неће бити у могућности да одговоре на ову поруку.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Порука ће бити послата са <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> као корисничким именом');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Порука ће истећи ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Порука неће истећи');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Проверите везу (притиском на њу) пре наставка!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Употреба <b>само у системским порукама</b>:<br /> [b]<b>подебљано</b>[/b] [i]<em>курзив</em>[/i]<br />
[url=http://www.nekiurl.com]неки урл[/url] или [url]http://www.nekiurl.com[/url] су везе');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Грешка: Нису пронађени примаоци. Порука није послата.');

DEFINE ('_UDDEIM_CANTREPLY', 'Не можете одговорити на ову поруку.');
DEFINE ('_UDDEIM_EMNOFF', 'Обавештење путем е-поште је искључено. ');
DEFINE ('_UDDEIM_EMNON', 'Обавештење путем е-поште је укључено. ');
DEFINE ('_UDDEIM_SETEMNON', '[укључи]');
DEFINE ('_UDDEIM_SETEMNOFF', '[искључи]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Здраво %you%,\n\n%user% вам је послао/ла поруку на %site%. Молимо вас да се пријавите да бисте је прочитали!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Здраво %you%,\n\n%user% вам је послао/ла следећу приватну поруку на %site%. Молимо вас да се пријавите да бисте одговорили!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Здраво %you%,\n\nимате непрочитаних приватних порука на %site%. Молимо вас да се пријавите и прочитате их!");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Имате поруке на %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'пошаљи као системску поруку (=примаоци не могу одговарати)');
DEFINE ('_UDDEIM_SEND_TOALL', 'пошаљи свим корисницима');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'пошаљи свим администраторима');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'пошаљи свим корисницима на вези');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Неочекивана грешка: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Архива није омогућена.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Пребацивање порука у архиву није успело.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Сачували сте ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>Још увек немате сачуваних порука</b>');
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Немате порука у архиви.</b>');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' порука');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Сачували сте једну поруку');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Да бисте сачували поруке морате прво обрисати неке поруке.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Можете сачувати највише ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' порука.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Имате ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' порука у');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' поруку у'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'архиви');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'сандучету');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'сандучету и архиви');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Дозвољени максимум је ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Моћи ћете да примате и читате поруке али нећете моћи да одговарате и пишете нове док не обришете старе.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Сачуване поруке: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(од макс. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Порука је сачувана у архиву.');
DEFINE ('_UDDEIM_STORE', 'архивирај');				// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'назад');
DEFINE ('_UDDEIM_TRASHCHECKED', 'обриши означене');	// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'прикажи све');	// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Архива');				// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Архива је пуна. Није сачувано.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Нема изабраних порука.');
DEFINE ('_UDDEIM_THISISACOPY', 'Копија поруке коју сте послали ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'копија за мене');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'копирај у архиву');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'оригинал у смеће');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Преузимање порука');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Е-пошта са сачуваним порукама је послата');
DEFINE ('_UDDEIM_EXPORT_NOW', 'е-пошта означена за мене');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Ова е-пошта садржи ваше приватне поруке.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Није било могуће послати е-пошту са порукама.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Ограничење броја порука! Није враћено.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Напишите поруку ');

$udde_smon[1]="јан";
$udde_smon[2]="феб";
$udde_smon[3]="мар";
$udde_smon[4]="апр";
$udde_smon[5]="мај";
$udde_smon[6]="јун";
$udde_smon[7]="јул";
$udde_smon[8]="авг";
$udde_smon[9]="сеп";
$udde_smon[10]="окт";
$udde_smon[11]="нов";
$udde_smon[12]="дец";

$udde_lmon[1]="јануар";
$udde_lmon[2]="фебруар";
$udde_lmon[3]="март";
$udde_lmon[4]="април";
$udde_lmon[5]="мај";
$udde_lmon[6]="јун";
$udde_lmon[7]="јул";
$udde_lmon[8]="август";
$udde_lmon[9]="септембар";
$udde_lmon[10]="октобар";
$udde_lmon[11]="новембар";
$udde_lmon[12]="децембар";

$udde_lweekday[0]="недеља";
$udde_lweekday[1]="понедељак";
$udde_lweekday[2]="уторак";
$udde_lweekday[3]="среда";
$udde_lweekday[4]="четвртак";
$udde_lweekday[5]="петак";
$udde_lweekday[6]="субота";

$udde_sweekday[0]="нед";
$udde_sweekday[1]="пон";
$udde_sweekday[2]="уто";
$udde_sweekday[3]="сре";
$udde_sweekday[4]="чет";
$udde_sweekday[5]="пет";
$udde_sweekday[6]="суб";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM шаблон');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Изаберите шаблон који желите да uddeIM користи');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Прикажи CB везе');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Употребите <b>да</b> уколико имате инсталиран Community Builder и желите да прикажете имена корисникових веза на страници за писање нове поруке.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Прикажи подешавања');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Веза ка подешавањима се аутоматски приказује у uddeIM-у уколико вам је омогућено обавештавање путем е-поште или је систем за блокирање активан. Можете одредити њену позицију или је потпуно искључити.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'да, на дну');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Дозволи BB кодове');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'само форматирање слова');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Употребите <b>само форматирање слова</b> да дозволите корисницима употребу BB кода за подебљана, курзивна, подвучена, и обојена слова и промену њихове величине. Када поставите ову опцију на <b>да</b>, корисници ће моћи да користе <b>сав</b> подржани BB код (нпр. слике и везе).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Дозволи емотиконе');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Када је подешено на <b>да</b>, код за емотиконе као :-) се замењује графичким емотиконама при приказу порука.');
DEFINE ('_UDDEADM_DISPLAY', 'Прикажи');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Прикажи иконе у менију');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Када је подешено на <b>да</b>, везе менија ће бити приказане иконама.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Наслов компоненте');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Унесите име за компоненту приватних порука, рецимо „Приватне поруке“. Оставите празно уколико не желите приказивање наслова.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Прикажи информативну везу');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Изаберите <b>да</b> за приказивање информација о ауторима и uddeIM лиценцу. Ова веза ће бити приказана на дну uddeIM излаза.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Заустави е-пошту');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Означите ово поље да спречите uddeIM да шаље е-пошту (обавештења и незаборавака путем е-поште) без обзира на подешавања корисника, када, рецимо, тестирате сајт.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB сличице у листама');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Изаберите <b>да</b> уколико желите приказ CB сличица у прегледу листа порука (примљене, послате итд.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Прикажи кориснике');
DEFINE ('_UDDEIM_CONNECTIONS', 'Везе');
DEFINE ('_UDDEIM_SETTINGS', 'Подешавања');
DEFINE ('_UDDEIM_NOSETTINGS', 'Нема подешавања за измену.');
DEFINE ('_UDDEIM_ABOUT', 'О uddeIM-у'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Напиши'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Обавештавање путем е-поште');
DEFINE ('_UDDEIM_EMN_EXP', 'Примите обавештење путем е-поште о новој приватној поруци.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Обавештавање е-поштом о новој поруци');
DEFINE ('_UDDEIM_EMN_NONE', 'Без обавештавања путем е-поште');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Обавештавање путем е-поште када нисте на вези');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Не шаљи обавештења о одговорима');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Блокирање корисника'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Можете спречити кориснике да вам шаљу поруке њиховим блокирањем. Изаберите <b>блокирај корисника</b> када читате поруку од корисника кога желите блокирати.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Сачувај измене');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB код за прављење подебљаног текста. Употреба: [b]подебљано[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB код за прављење курзивног текста. Употреба: [i]курзив[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB код за прављење подвученог текста. Употреба: [u]подвучено[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB код за прављење обојеног текста. Употреба: [color=#XXXXXX]обојено[/color] где је XXXXXX хексадекадни код боје коју желите, рецимо FF0000 за црвену.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB код за прављење обојеног текста. Употреба: [color=#XXXXXX]обојено[/color] где је XXXXXX хексадекадни код боје коју желите, рецимо 00FF00 за зелену.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB код за прављење обојеног текста. Употреба: [color=#XXXXXX]обојено[/color] где је XXXXXX хексадекадни код боје коју желите, рецимо 0000FF за плаву.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB код за прављење веома малих слова. Употреба: [size=1]веома мала слова.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB код за прављење малих слова. Употреба: [size=2]мала слова.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB код за прављење великих слова. Употреба: [size=4]велика слова.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB код за прављење веома великих слова. Употреба: [size=5]веома велика слова.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB код за убацивање слике. Употреба: [img]УРЛ слике[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB код за убацивање хипер везе. Употреба: [url]адреса[/url]. Не заборавите http:// на почетку сваке адресе.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Затвори све отворене BB ознаке.');
