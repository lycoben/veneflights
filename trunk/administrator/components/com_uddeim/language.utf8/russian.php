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
// Language file: Russian  (source file is CP1251)
// Translator:  www.freedom-ru.net, info@freedom-ru.net, Dmitriy Kindeev
// (v.1.2):     www.joomlaclub.ru, general@cre-active.eu, Eugene Sivokon
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
DEFINE ('_UDDEADM_CRYPT3', 'Закодировано Base64');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Установка часового пояса');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Если uddeIM отображает неверное время, Вы можете настроить часовой пояс здесь. Обычно когда все настройки сконфигурированы правильно, следует выставить ноль. Иначе Вам потребуется изменить это значение.');
DEFINE ('_UDDEADM_HOURS', 'часы');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Информация о версии:');
DEFINE ('_UDDEADM_STATISTICS', 'Статистика:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Показать статистику');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Здесь отображается статистика типа числа сохранённфх сообщений и пр.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'ПОКАЗАТЬ СТАТИСТИКУ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Сообщения сохранены в Базе Данных. ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Сообщения испорченные получателем: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Сообщения испорченные отправитетем: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Сообщения, ожидающие удаления: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Переписать Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Обычно uddeIM пытается определить правильный Itemid в случае, когда он не выставлен. В некоторых случаях возникает необходимость переписать это значение, например, когда Вы используете несколько ссылок из меню на компонент uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Определённые Itemid: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Ипользовать Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Использовать этот Itemid вместо определённого.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Использовать ссылки профиля');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Если установлено <i>да</i>, все имена пользователей, показываемые в uddeIM, будут отображаться в виде ссылок на пользовательский профиль.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Показать эскизы');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Когда установлено <i>даs</i>, эскиз соответствующего пользователя будет отображаться при чтении сообщения.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Показывать эскизы списком');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Установите <i>да</i> если хотите отображать аватары пользователей в имеющихся списках сообщений (входящие, исходящие и т.д.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Выключен');
DEFINE ('_UDDEADM_ENABLED', 'Включён');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Важно');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Допустить тегирование сообщения');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Возможность тегирования сообщений (uddeIM отображает звёздочку в списках, что позволяет выделить сообщения как важные.).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Важно: когда Вы обновляете uddeIM с ранней версии, пожалуйста, прочтите README файл. В некоторых случаях Вам понадобится добавить или изменить значения или поля в Базе Данных!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Добавить CC: линия');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Исключить цитируемый текст');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Исключить цитируемый текст на 2/3 максимальной длины текста если привышен этот лимит.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Записи папки входящие');
DEFINE ('_UDDEIM_PLUG_LAST', 'Последние ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' записи');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Статус');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Отправитель');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Сообщение');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Папка входящие пуста');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Доступ к корзине запрещен.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Ограничить доступ к корзине');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Вы можете ограничить доступ пользователей к корзине, для того что бы пользователи не смогли восстанавливать сообщения.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'нет ограничения');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'специальные пользователи');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'только администраторы');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Скрыть определенных пользователей из списка');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Введите ID пользователя, чтобы скрыть его в списке (пример: 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Скрыть определенных пользователей из списка');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Введите ID пользователя, чтобы скрыть его в списке (пример: 65,66,67). Admins will always see the complete list.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF определена атака');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF защита');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Если вы имеете спам запросы, то активируйте данную защиту.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Вы не можете отвечать на заархивированные сообщения.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Сообщения незарегистрированных пользователей не могут быть восстановлены.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Позволить ответы');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Позволить сообщения от гостей.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Здравствуйте, %user%,\n\n%you% прислал вам следующее сообщение %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Показывать имя/логин пользователя');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Показывать имя/логин пользователя гостям');
DEFINE ('_UDDEIM_USERLIST', 'Список пользователей');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Извините, прежде чем отправить новое сообщение необходимо подождать');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Последние отправленные');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Задержка времени');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Количество секунд между следующей отправкой сообщения (0 без ограничений).');
DEFINE ('_UDDEADM_SECONDS', 'сек.');
DEFINE ('_UDDEIM_PUBLICSENT', 'Сообщение отправлено.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Ошибка имени пользователя');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Ошибка email адреса');
DEFINE ('_UDDEIM_YOURNAME', 'Ваше имя:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Ваш email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Вы используете uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Вы используете последнюю версию uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Текущая версия ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Информация обновления:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Проверка обновлений');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Проверьте наличие новой версии.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'Проверить сейчас!');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Не могу получить информацию о версии.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Список не найден!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Превышено максимальное количество получателей (макс. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Максимальное число записей');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Максимальное количество записей в контакт-листе.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Контакт-лист запрещен');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Включить пользовательские списки');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'В uddeIM позволяет пользователям создавать списки контактов. Эти списки могут использоваться, чтобы отправлять сообщения сразу нескольким  пользователям. Незабудьте включить функцию в разделе СИСТЕМА');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'Отключено');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'Зарегистрированные пользователи');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'Специальные пользователи');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'Только администраторы');
DEFINE ('_UDDEIM_LISTSNEW', 'Создать контакт-лист');
DEFINE ('_UDDEIM_LISTSSAVED', 'Сохранить контакт-лист');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Обновить контакт-лист');
DEFINE ('_UDDEIM_LISTSDESC', 'Описание');
DEFINE ('_UDDEIM_LISTSNAME', 'Имя');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Имя (без мест)');
DEFINE ('_UDDEIM_EDITLINK', 'редактировать');
DEFINE ('_UDDEIM_LISTS', 'Контакты');
DEFINE ('_UDDEIM_STATUS_READ', 'Прочитано');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'непрочитанные');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'онлайн');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'оффлайн');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Показывать аватары из галереи CB');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'По умолчанию uddeIM показывает только загруженные аватары. Данная функция позволит показывать аватары из галереи СВ.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Разблокировать связь с CB');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Вы можете разблокировать списки CB, даже если включена общая блокировка.');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Вам запрещено отправлять сообщения данной группе.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Получатель заблокировал вас.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Заблокировать группы (зарегистрированные пользователи)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Группы, к которым зарегистрированные пользователи не разрешают отправлять сообщения. Это только для зарегистрированных пользователей. Специальные пользователи и администраторы не затронуты.');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Заблокировать группы (гости)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Группы, к которым гостям запрещено отправлять сообщения.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Гости');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB список');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Registered');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Author');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Пользователь принимает сообщения только от зарегистрированных пользователей.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Скрыть список пользователей от гостей');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Вы можете скрыть список пользователей от гостей, но обратите внимание, это только скрывает список, но не запрещает отправку/прием сообщений.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Скрыть группы пользователей в списке');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Вы можете скрыть определенные группы пользоваетлей в списке.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'нет');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'только суперадминистраторов');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'только администраторов');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'специальных пользователей');
DEFINE ('_UDDEADM_PUBLIC', 'Доступ');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Показывать список пользователей');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Позволить видеть список пользователей гостям.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Публичный доступ');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- выбрать -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Позволить гостям отправлять сообщения');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Вы достигли предела количества сообщений!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Гость');
DEFINE ('_UDDEIM_DELETEDUSER', 'Пользователь удален');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Количество символов Captcha');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Количество символов которые пользователь будет вводить.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Защита от спама Captcha');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Определите кто должен вводить защитный код при отправке сообщения');
DEFINE ('_UDDEADM_CAPTCHAF0', 'отключено');
DEFINE ('_UDDEADM_CAPTCHAF1', 'только гости');
DEFINE ('_UDDEADM_CAPTCHAF2', 'гости и пользователи');
DEFINE ('_UDDEADM_CAPTCHAF3', 'гости, пользователи, спец. пользователи');
DEFINE ('_UDDEADM_CAPTCHAF4', 'ВСЕ (включая администраторов)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Включить публичный доступ');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'При включении данной функции, гости сайта смогут отправлять сообщения зарегистрированным пользователям. (зарегистрированные пользователи могут отключить/включить эту функцию в своих настройках)');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Публичный доступ по умолчанию');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Значение по умолчанию у всех зарегистрированных пользователей.');
DEFINE ('_UDDEADM_PUBDEF0', 'откл.');
DEFINE ('_UDDEADM_PUBDEF1', 'вкл.');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Неверный код безопасности');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'неизвестно');
DEFINE ('_UDDEADM_DONATE', 'Поддержите Uddeim.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', '<br/><strong>Найдена конфигурация базы данных от:</strong> ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Резервная копия и восстановление конфигурации');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Вы можете сделать копию вашей конфигурации базы данных и восстановить когда это необходимо. Это полезно, когда Вы обновляете uddeIM или когда Вы хотите сохранить определенную конфигурацию.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'РЕЗЕРВНАЯ КОПИЯ');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', '| ВОССТАНОВИТЬ');
DEFINE ('_UDDEADM_CANCEL', 'Закрыть');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Кодировка языкового файла');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Рекомендуется параметр по умолчанию');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'по умолчанию');
DEFINE ('_UDDEIM_READ_INFO_1', 'Прочитанные сообщения будут храниться в папке "входящие"  ');
DEFINE ('_UDDEIM_READ_INFO_2', ' дней, а затем будут автоматически удалены.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Непрочитанные сообщения будут храниться в папке "входящие" ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' дней, а затем будут автоматически удалены.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Отправленные сообщения будут храниться в папке "исходящие" ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' дней, а затем будут автоматически удалены.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Уведомление о хранении прочитанных сообщений');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Будет показанно кол-во оставшихся дней до автамотического удаления прочитанных входящих сообщений');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Уведомление о хранении непрочитанных сообщений');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Будет показанно кол-во оставшихся дней до автамотического удаления непрочитанных входящих сообщений');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Уведомление о хранении отправленных сообщений');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Будет показанно кол-во оставшихся дней до автамотического удаления отправленных сообщений');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Уведомление о хранении сообщений в корзине');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Будет показанно кол-во оставшихся дней до автамотического удаления сообщений в корзине');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Хранить отправленные сообщения');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Введите число: сколько дней хранить в базе отправленные сообщения.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'отправить всем специальным пользователям');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Сообщение <strong>всем специальным пользователям</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- выберите логин -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- выберите имя -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Редактор настроек пользователей');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'существующий');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'не существующий');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- выберите статус -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- способ уведомления -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- режим popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Логин');
DEFINE ('_UDDEADM_USERSET_NAME', 'Имя');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Уведомления');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Последний раз был');
DEFINE ('_UDDEADM_USERSET_NO', 'Нет');
DEFINE ('_UDDEADM_USERSET_YES', 'Да');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'неизвестно');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Когда оффлайн (кроме ответов)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Всегда (кроме ответов)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Когда оффлайн');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Всегда');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Нет уведомлений');
DEFINE ('_UDDEADM_WELCOMEMSG', "Добро пожаловать в uddeIM!\n\nВы успешно установили компонент личных сообщений uddeIM.\n\nВы можете попробовать это сообщение с различными шаблонами. Вы можете изменить стиль в административной панели uddeIM.\n\nuddeIM iявляется развивающимся проектом. Если вы обнаружите какие либо ошибки, то обязательно напишите мне о них.\n\nУдачи вам!\n\nПеревод выполнен: [url=http://freedom-ru.net/]www.freedom-ru.net[/url]");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM полностью установлен.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Пожайлуста перейдите в меню настройки компонента.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Если вы используете кодировку CMS отличную от ISO 8859-1, то вам также необходимо настроить это в административной панели uddeIM.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'После установки, проверьте работу uddeIM с email уведомлениями, при необходимости дополнительно настройте.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Максимальное количество получателей');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Количество получателей за одно отправление (0=без ограничения)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'слишком много получателей');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Отправка emails отключена.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Поиск текста');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Автокомпилер осуществляет поиск в тексте');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Показать ссылку "все пользователи"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Выберите, показывать или нет ссылку/список пользователей.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Скрыть');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Показать');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Выводить список');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Файл конфигурации не доступен для записи:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Файл конфигурации доступен для записи:');
DEFINE ('_UDDEIM_FORWARDLINK', 'отправить');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'получатель нашел');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'получатели нашли');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'Функцию mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'Функцию php mail (по умолчанию)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Для отправки почты использовать:');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Выберите систему для отправки email.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Показать группы Joomla');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Будут показаны группы пользователей в общем списке.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Отправление сообщений');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Разрешить отправлять сообщения.');
DEFINE ('_UDDEIM_FWDFROM', 'Оригинал сообщения от');
DEFINE ('_UDDEIM_FWDTO', 'кому');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Сообщение не из архива');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Невозможно архивировать сообщение');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Позволить много получателей');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Позволить отправлять сообщения сразу нескольким получателям (разделенных запятой).');
DEFINE ('_UDDEIM_CHARSLEFT', 'Максимальное количество символов');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Показать поле "макс. кол-во символов"?');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Показать/скрыть поле.');
DEFINE ('_UDDEIM_CLEAR', 'Clear');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Позволить выбирать получателей в автоматическом режиме');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Данная функция позволяет пользователю выбирать получателей из выпадающего списка и автоматически подставлять в поле "кому".');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Отбор нескольких получателей');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Это позволяет делать отбор сразу нескольких получателей получателей.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS : ');
DEFINE ('_UDDEIM_ENTERNAME', 'введите имя');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Использовать автозаполнение');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Позволяет использовать автозаполнение.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Ключ шифрования');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Введите ключ для шифрования сообщений (Не изменяйте это если не знаете что это такое!).');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Файл конфигурации не найден!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Найденная версия:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Ожидаемая версия:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Преобразование конфигурации...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Готово!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Критическая Ошибка: Запись в файл конфигурации не произведена:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Зашифрованное сообщение! - Загрузить невозможно!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Неправильный пароль! - Загрузить невозможно!');
DEFINE ('_UDDEIM_WRONGPW', 'Неправильный пароль! - Пожалуйста свяжитесь с администратором базы данных!');
DEFINE ('_UDDEIM_WRONGPASS', 'Неправильный пароль!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Неверные даты в корзине (входящие/исходящие): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Исправление неверных дат');
DEFINE ('_UDDEIM_TODP', 'Кому: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Удалить сообщения сейчас?');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Показать иконку действия');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Когда установлено <i>да</i>, иконка будет отображаться ссылкой.');
DEFINE ('_UDDEIM_UNCHECKALL', 'все непроверенно');
DEFINE ('_UDDEIM_CHECKALL', 'проверьте все');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Показать иконку внизу');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Когда установлено <i>да</i>, то внизу иконка будет отображаться ссылкой.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Использовать анимационные смайлы');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Использовать анимационные смайлы вместо статичных.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Больше анимационных смайлов');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Показать все анимационные смайлы.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Зашифрованное сообщение - требуется Пароль');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Требуется пароль</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Пароль');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (зашифрованный текст)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (декодированный текст)');
DEFINE ('_UDDEIM_MORE', 'БОЛЬШЕ');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Личные сообщения');
DEFINE ('_UDDEMODULE_NONEW', 'нет');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Новые: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'сообщение');
DEFINE ('_UDDEMODULE_MESSAGES', 'сообщения');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Вы имеете');
DEFINE ('_UDDEMODULE_HELLO', 'Привет');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Экспресс сообщение');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Использовать шифрование');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Зашифруйте сохраненные сообщения');
DEFINE ('_UDDEADM_CRYPT0', 'Нет');
DEFINE ('_UDDEADM_CRYPT1', 'Перемешать сообщения');
DEFINE ('_UDDEADM_CRYPT2', 'Зашифруйте сообщения');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Уведомление по e-mail по умолчанию');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Уведомление по e-mail по умолчанию (будет применено для всех пользователей).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Нет уведомлений');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Всегда');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Уведомления только для оффлайн');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Подавить "Все пользователи"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Поадвить выпадающий список пользователей (полезно когда на сайте много пользователей).');
DEFINE ('_UDDEADM_POPUP_HEAD','Уведомление Popup');
DEFINE ('_UDDEADM_POPUP_EXP','Показать Popup когда приходит новое сообщение (необходим patched mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', 'Больше параметров настройки');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Здесь Вы можете формировать еще некоторые параметры настройки.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Покажите popup, когда приходит новое сообщение');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Уведомление Popup по умолчанию');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Позволить popup уведомление по умолчанию (будет применено для всех пользователей).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Обслуживание');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Обслуживание базы данных');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'ПРОВЕРИТЬ');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', '|  РЕМОНТ');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Когда пользователь очищен из базы данных, его сообщения обычно сохраняются в базе данных. Эта функция проверяет, необходимо ли удалять сообщения несуществующих пользователей, и Вы можете удалять их, если это требуется.<br />
то также проверит базу данных на наличие ошибок, которые будут исправлены. ");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Проверка...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Пользователь): [inbox|inbox trashed|outbox|outbox trashed]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>входящие: сообщения, сохраненные во входящем ящике</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>удаленные из входящих: удаленные сообщения, но оставшиеся во входящих</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>исходящие: сообщения, сохраненные в исодящем ящике</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>удаленные из исходящих: удаленные сообщения, но оставшиеся в исходящем ящике</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Удаление...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "<b>#$i не найдено (от/кому): $mvon/$man</b><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "удалить все предпочтения пользователя #$i<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "удалить блокирование пользователя #$i<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "удалить все сообщения отправленные пользователю #$i вы отправили\ исодящий ящик и пользователь #$i\'s входящие<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "удалить все сообщения полученные от пользователя #$i в #$i\ исходящие и получатель\'s входящие<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Никогда</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Требуемое обслуживание</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Показать реальное имя');
DEFINE ('_UDDEADM_NAMESDESC', 'Покажите реальные имя или логин?');
DEFINE ('_UDDEADM_REALNAMES', 'Реальное имя');
DEFINE ('_UDDEADM_USERNAMES', 'Логин');
DEFINE ('_UDDEADM_CONLISTBOX', 'Список соединений');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Показать мои соединения в виде списке или, в виде таблицы ?');
DEFINE ('_UDDEADM_LISTBOX', 'Список');
DEFINE ('_UDDEADM_TABLE', 'Таблица');
DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Сообщение будет находиться в корзине 24 ч., а потом будет удалено. Вы можете видеть только первые слова. Чтобы прочитать все сообщение, его надо восстановить..');

// версия 0.4
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Сообщение будет находиться в корзине ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' часов, а потом будет удалено. Вы можете видеть только первые слова. Чтобы прочитать все сообщение, его надо восстановить.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Это сообщение было отозвано. Теперь вы можете его заменить и снова отправить.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Сообщение нельзя отозвать (оно было прочитано или удалено).');
DEFINE ('_UDDEIM_CANTRESTORE', 'Не удалось восстановить сообщение. (Вероятно, оно было удалено при автоматической чистке корзины).');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Не удалось восстановить сообщение.');
DEFINE ('_UDDEIM_DONTSEND', 'Не отправлять');
DEFINE ('_UDDEIM_SENDAGAIN', 'Отправить снова');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Вы не авторизованы.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', 'В папке "<strong>Входящие</strong>" нет сообщений.');
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', 'В папке "<strong>Исходящие</strong>" нет сообщений.');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>Нет сообщений в Корзине.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Входящие');
DEFINE ('_UDDEIM_OUTBOX', 'Исходящие');
DEFINE ('_UDDEIM_TRASHCAN', 'Корзина');
DEFINE ('_UDDEIM_CREATE', 'Новое');
DEFINE ('_UDDEIM_UDDEIM', 'Личные сообщения');
        // this is the headline/name of the component as it appears in Mambo

DEFINE ('_UDDEIM_READSTATUS', 'Прочитано');
        // as in 'this message has been "read"'

DEFINE ('_UDDEIM_FROM', 'от');
DEFINE ('_UDDEIM_FROM_SMALL', 'от');
DEFINE ('_UDDEIM_TO', 'кому');
DEFINE ('_UDDEIM_TO_SMALL', 'кому');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Папка "<strong>Исходящие</strong>" содержит все отправленные сообщения (если вы их не удалили). Вы можете отозвать сообщение, если получатель еще не прочитал его. Если вы отозвете сообщение, получатель не сможет его прочесть. ');
DEFINE ('_UDDEIM_RECALL', 'отозвать');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Отозвать это сообщение');
DEFINE ('_UDDEIM_RESTORE', 'восстановить');
DEFINE ('_UDDEIM_MESSAGE', 'Сообщение');
DEFINE ('_UDDEIM_DATE', 'Дата');
DEFINE ('_UDDEIM_DELETED', 'Удалено');
DEFINE ('_UDDEIM_DELETE', 'удалить');
DEFINE ('_UDDEIM_DELETELINK', 'удалить');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Это сообщение не может быть отображено. <br />Возможные причины:<ul><li>У вас нет прав на просмотр этого сообщения</li><li>Сообщение было удалено</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Вы перенесли это сообщение в корзину.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Отправитель ');
DEFINE ('_UDDEIM_MESSAGETO', 'Сообщение от вас для ');
DEFINE ('_UDDEIM_REPLY', 'Ответ');
DEFINE ('_UDDEIM_SUBMIT', 'Отправить');
DEFINE ('_UDDEIM_NOMESSAGE', 'Ошибка: Пустое сообщение! Сообщение не отправлено.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', '<font color="#CC0000"><p><strong>Ответ отправлен!</strong></p>
<p>&nbsp; </p></font>');
DEFINE ('_UDDEIM_MESSAGE_SENT', '<font color="#CC0000" size="4"><p>&nbsp;</p><p><strong>Сообщение отправлено!</strong></p><p>&nbsp; </p></font>');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' и оригинальное сообщение помещено в корзину');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Нет пользователя с таким логином!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Нельзя послать сообщение самому себе!');
DEFINE ('_UDDEIM_PRUNELINK', 'Администраторы: Очистка');
DEFINE ('_UDDEIM_BLOCKS', 'Заблокировано');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Не отправлено (получатель заблокировал сообщения от вас)');
DEFINE ('_UDDEIM_BLOCKNOW', 'заблокировать&nbsp;пользователя');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Список пользователей, получение сообщений от которых вы заблокировали.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Нет заблокированных пользователей.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'В данный момент заблокировано ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' пользователей.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[разблокировать]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Если заблокированный пользователь попытается отправить вам сообщение, он будет поставлен в известность о блокировке.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Заблокированный пользователь не может видеть факта блокировки.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Нельзя заблокировать сообщения от администраторов.');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Система блокировки не включена');
DEFINE ('_UDDEIM_CANTREPLY', 'Вы не можете ответить на это сообщение.');
DEFINE ('_UDDEIM_EMNOFF', 'Уведомление по E-mail отключено. ');
DEFINE ('_UDDEIM_EMNON', 'Уведомление по E-mail включено. ');
DEFINE ('_UDDEIM_SETEMNON', '[включить]');
DEFINE ('_UDDEIM_SETEMNOFF', '[выключить]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Здравствуйте, %you% 

%user% отправил вам личное сообщение на %site%.
Пожалуйста, зайдите на сайт, чтобы прочитать его!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Здравствуйте, %you%  

%user% отправил вам личное сообщение на %site%.
Чтобы ответить на него, зайдите на сайт!

*****************

%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Здравствуйте, %you%

на сайте %site% ожидают непрочитанные личные сообщения.
Пожалуйста, зайдите на сайт, чтобы прочитать их!
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Личные сообщения на %site%');





DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Не удалось сохранить сообщение в архиве.');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>В архиве</strong> нет сохраненных сообщений.'); 
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Вы архивировали ');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' сообщений');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Вы заархивировали одно сообщение');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Чтобы заархивировать сообщения, надо предварительно освободить место в архиве.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Вы можете сообщить не более ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' сообщений.');

DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Сохранено ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' сообщений в папке');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'архив');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'входящие');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'архив и входящие');
        // The lines above are to make up a sentence like
        // "You have | 126 | messages in your | inbox and archive"

DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Разрешено максимум ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Вы по-прежнему можете получать сообщения, но не сможете отвечать или создавать новые, пока не очистите старые.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Сохранено сообщений: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(макс. ');
        // don't add closing bracket

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Сообщение сохранено в архиве.');
DEFINE ('_UDDEIM_STORE', 'архив');
        // translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'назад');

DEFINE ('_UDDEIM_TRASHCHECKED', 'удалить отмеченные');
        // translators info: plural! (as in "delete checked" messages)
        
DEFINE ('_UDDEIM_SHOWALL', 'показать все');
        // translators example "SHOW ALL messages"
        
DEFINE ('_UDDEIM_ARCHIVE', 'Архив');
        // should be same as _UDDEADM_ARCHIVE
        
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Архив полон. Не сохранено.');     
        
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Не выбраны сообщения.');
DEFINE ('_UDDEIM_THISISACOPY', 'Копия сообщения, отправленого к ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'копия себе');
        // as in 'send a "copy to me"' or cc: me

DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'копировать в архив');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'оригинал в корзину');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Загрузка сообщения');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Отправлен E-mail с экспортированными сообщениями');
DEFINE ('_UDDEIM_EXPORT_NOW', 'отправить выбранные на мой E-mail');
        // as in "send the messages checked above by E-Mail to me"

DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Это письмо содержит ваши личные сообщения.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Не могу отправить E-mail с сообщениями.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Ограничение количества! Не восстановлено.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Не писать сообщение к ');
        // as in "write a message to" (a person)

// months and weeknames (please translate according 
// to your language)

$udde_smon[1]="Янв";
$udde_smon[2]="Фев";
$udde_smon[3]="Мар";
$udde_smon[4]="Апр";
$udde_smon[5]="Май";
$udde_smon[6]="Июн";
$udde_smon[7]="Июл";
$udde_smon[8]="Авг";
$udde_smon[9]="Сен";
$udde_smon[10]="Окт";
$udde_smon[11]="Ноя";
$udde_smon[12]="Дек";

$udde_lmon[1]="Январь";
$udde_lmon[2]="Февраль";
$udde_lmon[3]="Март";
$udde_lmon[4]="Апрель";
$udde_lmon[5]="Май";
$udde_lmon[6]="Июнь";
$udde_lmon[7]="Июль";
$udde_lmon[8]="Август";
$udde_lmon[9]="Сентябрь";
$udde_lmon[10]="Октябрь";
$udde_lmon[11]="Ноябрь";
$udde_lmon[12]="Декабрь";

$udde_lweekday[0]="Воскреснье";
$udde_lweekday[1]="Понедельник";
$udde_lweekday[2]="Вторник";
$udde_lweekday[3]="Среда";
$udde_lweekday[4]="Четверг";
$udde_lweekday[5]="Пятница";
$udde_lweekday[6]="Суббота";

$udde_sweekday[0]="Вс";
$udde_sweekday[1]="Пн";
$udde_sweekday[2]="Вт";
$udde_sweekday[3]="Ср";
$udde_sweekday[4]="Чт";
$udde_sweekday[5]="Пт";
$udde_sweekday[6]="Сб";

// *********************************************************
// the following can remain English
// *********************************************************

DEFINE ('_UDDEIM_NOID', 'Ошибка: Такого пользователя не существует.');
DEFINE ('_UDDEIM_VIOLATION', '<b>Нарушение доступа!</b> У Вас нет прав на данное действие!');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Неизвестная ошибка: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Архив запрещен.');


// *********************************************************
// No translation necessary below this line
// *********************************************************

DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Администратор');
DEFINE ('_UDDEADM_GENERAL', 'Общие');
DEFINE ('_UDDEADM_ABOUT', 'О нас');
DEFINE ('_UDDEADM_DATESETTINGS', 'Дата/время');
DEFINE ('_UDDEADM_PICSETTINGS', 'Смайлы');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Хранить прочитанные сообщения');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Не прочитанные сообщения');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Сообщения в корзине');
DEFINE ('_UDDEADM_DAYS', 'дней');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Введите число: сколько времени вы желаете хранить сообщения (при больших значениях потребляются значительные ресурсы базы данных).');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Введите число: сколько дней хранить в базе не прочитанные сообщения.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Введите число: сколько дней хранить сообщения в корзине (рекомендуется указывать значение в пределах от 1 до 4-х дней).');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Формат даты');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Выберите формат, в котором показывается дата/время сообщения. Месяцы будут сокращены, согласно настройкам CMS.');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Расширенный формат даты');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Дата внутри сообщения.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Удаление доступно только администратору');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'Да, только админ.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'Нет, любой пользователь');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Автоматическое удаление создают большую нагрузку на сервер и базу данных!.<br /> <i>"Да, только админ</i>" - рекомендуется для больших сайтов,<br />"<i>Нет, любой пользователь</i>" - рекомендуется для маленьких сайтов.');
        // replace the translation.php with your language, of course
DEFINE ('_UDDEADM_SAVESETTINGS', 'Сохранить');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Следующие параметры относятся к файлу конфигурации:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Настройки были сохранены.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Смайл: Пользователь онлайн');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Иконка пользователя в статусе онлайн.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Смайл: Пользователь оффлайн');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Иконка пользователя в статусе оффлайн.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Смайл: Читать сообщение');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Иконка прочитанных сообщений.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Смайл: Непрочитанное сообщение');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Иконка непрочитанных сообщений.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Модуль: Иконка новых сообщений');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Эта настройка относится к mod_uddeim_new module. Укажите изображение, которое модуль должен показывать при новых сообщениях.');
DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM Инсталляция');
DEFINE ('_UDDEADM_FINISHED', 'Установка закончена. Добро пожаловать в uddeIM 0.4 Rus www.freedom-ru.net. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Установите Community Builder! Иначе нельзя будет использовать uddeIM!</span><br /><br />Вы хотите загрузить сейчас? <a href="http://communitybuilder.ru/">Русская дружина Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'продолжить');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Есть ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' сообщения в myPMS. Вы хотите импортировать их в uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Это не будет влиять на myPMS сообщения. Они будут сохранены не поврежденными. Вы можете благополучно импортировать их в uddeIM, даже если Вы будете продолжать использовать myPMS (рекомендуется, сначала сделать апдейт сайта!). Любые сообщения, которые уже находятся в вашей uddeIM базе данных, останутся не поврежденными.');
DEFINE ('_UDDEADM_IMPORT_YES', 'Импортировать myPMS в uddeIM сейчас');
DEFINE ('_UDDEADM_IMPORT_NO', 'Нет, не импортировать сообщения');  
DEFINE ('_UDDEADM_IMPORTING', 'Пожалуйста, подождите окончание импортирования и не предпринимайте ни каких действий!');
DEFINE ('_UDDEADM_IMPORTDONE', 'сообщения импортирования от myPMS. Не повторяйте Импорт дважды, это может привести к системным ошибкам.'); 
DEFINE ('_UDDEADM_IMPORT', 'Импорт');
DEFINE ('_UDDEADM_IMPORT_HEADER', ' myPMS сообщения импортированы');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'myPMS не найден. Импорт невозможен.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Вы уже импортировали сообщения из myPMS в uddeIM.</span>');
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Включить систему блокирования');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Когда действие разрешено, пользователи могут блокировать других пользователей. Блокированный пользователь не может послать сообщения пользователю, который блокировал его/её. Администратор не может быть заблокирован.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'Да');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'Нет');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Разрешить получать сообщения заблокированным пользователям');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Если установлено <i>да</i>, блокированному пользователю будут сообщать о том, что его сообщение не послали из-за блокировки получателем. Если установлено <i>нет</i>, блокированный пользователь не получит никакого уведомления, о том, что его сообщение не послано.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'Да');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'Нет');
DEFINE ('_UDDEADM_DELETIONS', 'Удаление');
DEFINE ('_UDDEADM_BLOCK', 'Блокирование');
DEFINE ('_UDDEADM_INTEGRATION', 'Интеграция');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Интеграция CB');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Когда установлено <i>да</i>, то все имена пользователей, обнаруженные в uddeIM, будут показаны в CB.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Показать аватар CB');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', '');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Покажите статус онлайн');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Когда установлено <i>да</i>, <b>uddeIM</b> показывает каждое имя пользователя с маленьким изображением, которое сообщает: онлайн или оффлайн этот пользователь. Вы можете установить изображения в admin диалог.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Позволить уведомление E-mail');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Если установлено <i>да</i>, каждый пользователь сможет выбрать, хочет ли он получать уведомления.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'Будет ли E-mail содержать сообщение?');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Если <i>нет</i>, то эта электронная почта будет содержать только информацию о том, когда и кем сообщение было послано, но не само сообщение.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Напоминание E-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Эта сообщение посылается независимо от пользовательских настроек, 
которые имеют не прочитанное входящее сообщение в течение очень долгого времени. Эта настройка независит от опции \'Позволить уведомление E-mail\'. ');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Напомнить через ... дней');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Интервал напоминания (исчисляется в днях).');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Список сообщений');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Сколько сообщений показывать на странице.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Максимальная длина сообщения (кол-во символов)');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Задайте максимальную длину сообщения. Введите "<strong>0</strong>"  для снятия ограничения длины сообщения (не рекомендуется).');
DEFINE ('_UDDEADM_YES', 'да');
DEFINE ('_UDDEADM_NO', 'нет');
DEFINE ('_UDDEADM_ADMINSONLY', 'Только администратор');
DEFINE ('_UDDEADM_SYSTEM', 'Система');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Системные сообщения пользователям');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM поддерживает системные сообщения. Они не имеют видимого отправителя, 
и пользователи не могут  отвечать им. Введите здесь псевдоним имени пользователя (по умолчанию для сообщений системы). Примеры: <i>Support</i> или <i>Помощь</i>, или <i>Администратор</i>');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Позволить администратору посылать сообщ. всем пользователям');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', '');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-mail имя отправителя');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Введите название, от имени которого посылаются уведомления электронной почты (например: <i>Администратор</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-mail адрес отправителя');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Это должен быть главный E-mail адрес вашего сайта.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM версия');
DEFINE ('_UDDEADM_ARCHIVE', 'Архив'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Включить архив');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Выберите, будут ли пользователям разрешено хранить сообщения в архиве. Сообщения в архиве не будут удалены.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Максимальное кол-во сообщ. в архиве');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Сколько сообщений будет хранить в архиве каждый пользователь.');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Разрешить копии');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Позволяет пользователям получать копии сообщений, которые они посылают. Эти копии появятся во входящем почтовом ящике.');
DEFINE ('_UDDEADM_MESSAGES', 'Сообщения');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Предложить удаление оригинала');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Пользователям будет предложено удалить оригинал сообщения');
        // translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
        // and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Сообщений в страницу');  
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Определите здесь число сообщений, показанных на странице.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Кодировка сообщений');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Изменяйте это только в случае, если вы имеете проблемы с отображением сообщений в нужной вам кодировке');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Кодировка E-mail');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Изменяйте это только в случае, если вы имеете проблемы с отображением сообщений в нужной вам кодировке');
                // translators info: if you're translating into a language that uses a latin charset
                // (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
                // saying 'For usage in [mylanguage] the default value is correct.'
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Данные теги будут заменены переменными и отправлены по E-mail. Не нарушайте синтаксис данных тегов %you%, %user% and %site%.');            
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Данные теги будут заменены переменными и отправлены по E-mail. Не нарушайте синтаксис данных тегов %you%, %user%, %pmessage% and %site% intact. ');               
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Данные теги будут заменены переменными и отправлены по E-mail при упоминаниях и уведомлениях. Не нарушайте синтаксис данных тегов  %you% и %site% . ');         
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Позвольте пользователям загружать сообщения из архива, посылая эти сообщения на свой E-mail.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Позволить загрузку');      
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Эти тэги будут заменены переменными, когда пользователь загружает собственные сообщения из архива. Держите переменные %user%, %msgdate% и %msgbody% без изменения. ');       
                // translators info: Don't translate %you%, %user%, etc. in the strings above. 
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Лимит входящих сообщений');         
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Пользователи не смогут оставлять новые сообщения, пока не очистят папку "<strong>Входящие</strong>" и "<strong>архив</strong>" (если превышен лимит), но они будут иметь возможность получать новые сообщения');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Показать пользователям, сколько сообщений они могут хранить');           
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Будет показано, сколько хранится сообщений и сколько позволено хранить.');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Вы выключили архив?');         
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Leave them');            
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Leave them in the archive (user will not be able to access them and they will still count against message limits).');             
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Move to inbox');         
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Archived messages moved to inboxes');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Messages will be moved to the inbox of the respective user (or to trash if they are older than allowed in the inbox).');          

                
// 0.4 frontend, but visible admins only (no translation necessary)             

DEFINE ('_UDDEIM_SEND_ASSYSM', 'послать как системное сообщение (получатели не смогут ответить)');
DEFINE ('_UDDEIM_SEND_TOALL', 'всем пользователям');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'всем администраторам');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'всем пользователям в статусе онлайн');
DEFINE ('_UDDEIM_VALIDFOR_1', 'действительно ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' часов. 0 = неограниченно (применяется автоудаление)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Создайте системное или общее сообщение]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Создайте нормальное (стандартное) сообщение]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Системные и общие сообщения не позволены.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Тип сообщения');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Помощь');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(открывается в новом окне)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Проверьте еще раз сообщение и подтвердите отправку!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Сообщение <strong>всем пользователям</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Сообщение <strong>всем админам</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Сообщение <strong>всем пользователям в статусе онлайн</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Получатели не смогут ответить на это сообщение.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Сообщение будет послано <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> как имя пользователя');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Сообщение истечет ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Бессрочное сообщение');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Проверьте ссылку перед переходом!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Использовать <strong>в системных сообщ. только </strong>:<br /> [b]<strong>жирный</strong>[/b] [i]<em>курсив</em>[/i]<br />
[url=http://www.freedom-ru.net]текст[/url] или [url]http://www.freedom-ru.net[/url] ссылка');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Ошибка: "Сообщение не отправлено".');                
// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM шаблон');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Выберите шаблон (дизайн) отображения компонента.');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Показать ссылку на профиль CB');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Выберите <i>да</i>, если Вы желаете показать ссылку на профиль CB.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Показать настройки');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Показ настроек ЛС. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'да, основные');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Позволить использовать <strong>BB</strong>-коды');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'только форматирование шрифтов');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Если выбрано <i>только форматирование шрифтов</i>, то пользователи смогут только форматировать шрифты. Когда вы установите <i>да</i> - все <strong>BB</strong>-коды.');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Позволить смайлы');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Если установлено  <i>да</i>, то пользователям будет разрешено использовать смайлы.');
DEFINE ('_UDDEADM_DISPLAY', 'Вид');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Показать иконки меню');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Если установлено <i>да</i>, то ссылки будут отображаться в виде иконок.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Заголовок компонента');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Здесь вы можете ввести заголовок компонента, который будет показан всем пользователям.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Показать копирайт');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Установите <i>да</i>, если хотите показать копирайт uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Отключить E-mail сейчас');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Установите флажок, чтобы - независимо от установленных выше настроек - блокировать отправку E-mail.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'вручную');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB список');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Установите <i>да</i>, если хотите отображать информацию о сообщениях в профайле CB');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Все пользователи');
DEFINE ('_UDDEIM_CONNECTIONS', 'Друзья');
DEFINE ('_UDDEIM_SETTINGS', 'Настройки');
DEFINE ('_UDDEIM_NOSETTINGS', 'Нет доступных настроек.');
DEFINE ('_UDDEIM_ABOUT', 'О программе'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Новое'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', '<strong>E-Mail</strong>-уведомление');
DEFINE ('_UDDEIM_EMN_EXP', 'Вы можете получать уведомление о новых сообщениях на E-mail.');
DEFINE ('_UDDEIM_EMN_ALWAYS', '<strong>E-mail</strong>-уведомление');
DEFINE ('_UDDEIM_EMN_NONE', 'Нет <strong>E-mail</strong>-уведомления');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', '<strong>E-mail</strong>-уведомление, когда вы не на сайте');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Не посылать уведомления на ответы');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Блокировка пользователей'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Вы можете заблокировать получение сообщений от некоторых пользователей. Это можно сделать при просмотре сообщения от конкретного пользователя.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Сохранить изменения');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'Жирный');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'Курсив');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'Подчеркнутый');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'Красный');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'Зеленый');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'Синий');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'очень маленькие буквы');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'маленькие буквы');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'большие буквы');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'очень большие буквы');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB-код для ссылки на картинку. Пример: [img]URL адрес рисунка[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'URL-адрес. Не забывайте ставить http:// в начале каждого адреса');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Закрыть все теги.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' сообщений в вашем'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>Нет сообщений в архиве.</strong>'); 
?>