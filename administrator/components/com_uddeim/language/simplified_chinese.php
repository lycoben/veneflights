<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5.X/Joomla 1.0.X
// Author         Benjamin Zweifel
// Version        1.3 Pre
// as of          2008/8/20
// License        This is free software and you may redistribute it under the GPL.
//                uddeim comes with absolutely no warranty. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
// *******************************************************************
// Language file: Simplified Chinese (source file is UTF-8)
// Translator: baijianpeng ( http://www.joomlagate.com )
//             Eric Cheng  ( http://www.webtmp.cn)
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', '加载 MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', '此设置将设定uddeIM加载MooTools脚本的方式 (自动完成器“Autocompleter”的使用需要加载MooTools脚本): 如果已经在模板设置中加载了MooTools脚本,请在此处设置为<i>从不</i>, 建议设置为<i>自动</i> , 如果使用的Joomla版本为1.0.x时请设置为强制加载MooTools 1.1版或者 1.2版脚本.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', '不加载 MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', '自动');
DEFINE ('_UDDEADM_MOOTOOLS_1', '强制加载 MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', '强制加载 MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '使用MooTools默认设置');
DEFINE ('_UDDEADM_AGORA', '集会');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 加密');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', '调整时区设置');
DEFINE ('_UDDEADM_TIMEZONE_EXP', '当uddeIM显示时间有误时，请在此处调整市区设置.时间显示正确时请在这里设置为0.');
DEFINE ('_UDDEADM_HOURS', '小时');
DEFINE ('_UDDEADM_VERSIONCHECK', '版本信息:');
DEFINE ('_UDDEADM_STATISTICS', '统计信息:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', '显示统计信息');
DEFINE ('_UDDEADM_STATISTICS_EXP', '此处将显示统计信息,如存储的消息条数等.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', '显示统计信息');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', '数据库中存储的消息条数: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', '被接收者删除的消息条数: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', '被发送者删除的消息条数: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', '待清理的消息条数: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', '覆盖项目id');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', '正常情况下 uddeIM 会自行检测项目id是否已被使用、是否正确.在一些情况下条目id可能需要被覆盖,比如.设定了多个菜单链接至uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', '目前项目 id 是: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', '使用此项目id');
DEFINE ('_UDDEADM_USEITEMID_EXP', '修改目前的项目为新的项目id.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', '启用个人资料链接');
DEFINE ('_UDDEADM_SHOWLINK_EXP', '当设定为<i>是</i>时,在uddeIM中显示的所有用户名将会自动链接至用户的个人资料页面.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', '显示用户头像');
DEFINE ('_UDDEADM_SHOWPIC_EXP', '当设定为<i>是</i>时,每个用户的头像将在阅读站内消息时显示.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', '在列表中显示用户头像');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', '当设定为<i>是</i>时,将在消息列表中显示联系人的头像(收件箱,发件箱等.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', '启用');
DEFINE ('_UDDEADM_ENABLED', '关闭');
DEFINE ('_UDDEIM_STATUS_FLAGGED', '导入');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', '开启消息标签功能');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', '开启消息标签功能 (启用此功能时,uddeIM将在被标记的消息前显示一个星型标签，用以表示此消息为重要消息).');
DEFINE ('_UDDEADM_REVIEWUPDATE', '注意:当从早期版本升级uddIM的话，请仔细阅读README.有时需要手动对数据库表格和内容加以调整!');
DEFINE ('_UDDEIM_ADDCCINFO', '添加转发信息');
DEFINE ('_UDDEIM_CC', '转发:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', '引用文字截取功能');
DEFINE ('_UDDEADM_TRUNCATE_EXP', '当引用文字超过字数限额时，将截取最大字数的2/3作为引用内容.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', '收件箱 ');
DEFINE ('_UDDEIM_PLUG_LAST', '最后的 ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' 条目');
DEFINE ('_UDDEIM_PLUG_STATUS', '状态');
DEFINE ('_UDDEIM_PLUG_SENDER', '发件人');
DEFINE ('_UDDEIM_PLUG_MESSAGE', '站内消息');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', '清空收件箱');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', '消息垃圾箱访问权限被关闭.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', '垃圾箱访问权限设定');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', '您可以关闭垃圾箱访问权限.默认设置下，所有会员可以访问消息垃圾箱(<i>没有限制</i>).当访问权限被关闭时，仅仅允许特定会员或者管理员可以访问垃圾箱, 而权限较低的群组成员就无法访问垃圾箱并恢复被删除的信件。.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', '无限制');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', '特殊用户组');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', '仅限管理员');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', '不在会员列表中显示下列用户');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', '输入用户的 ID(例如：65,66,67)，这些会员将不会显示在公开的会员列表中。');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', '不在会员列表中显示下列用户');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', '输入用户的 ID(例如：65,66,67)，这些会员将不会显示在会员列表中.，但管理员仍可查看包含隐藏用户的完整会员列表.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF 攻击识别');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF 保护开启');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', '此项保护将防止伪造的跨站请求攻击. 默认情况下请开启此功能.仅限于遇到无法解决问题时请关闭此功能.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', '您不能回复已存档消息.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', '向未注册用户发送的消息无法收回.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', '允许回复');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', '允许游客可以直接回复站内短信.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"你好, %user%,\n\n%you% 在%site%向你发送了一条站内短信.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', '显示真实姓名');
DEFINE ('_UDDEADM_PUBNAMESDESC', '在前台显示真实姓名或者用户名?');
DEFINE ('_UDDEIM_USERLIST', '用户列表');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', '很抱歉,请在发送新的站内消息前稍等片刻');
DEFINE ('_UDDEADM_USERSET_LASTSENT', '最后发送');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', '时间延迟');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', '两次发送新的站内消息最小间隔(秒)： (0 表示没有间隔时间要求).');
DEFINE ('_UDDEADM_SECONDS', '秒');
DEFINE ('_UDDEIM_PUBLICSENT', '消息已发送.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', '发件人信息有误');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'email地址有误');
DEFINE ('_UDDEIM_YOURNAME', '您的姓名:');
DEFINE ('_UDDEIM_YOUREMAIL', '您的email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', '你正在使用 uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', '你目前使用的为最新版uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', '目前使用版本为');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', '升级信息:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', '检测升级信息');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', '此连接将访问uddeIM官方网站并获取最新uddeIM版本信息. 除了你所使用uddeIM版本信息外,将不会发送任何其它信息.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', '立刻升级');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', '无法获得版本信息.');
DEFINE ('_UDDEIM_NOSUCHLIST', '联系列表不存在!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', '超过了同时收件人数限额(最大. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', '站内消息容量');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', '联系人列表容量.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', '联系人列表未启用');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', '启用联系人列表');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM 允许用户建立联系人列表.此列表可用于向多用户发送站内消息.当开启联系人列表使用功能时,请同时开启向多收件人发送站内消息功能.');
DEFINE ('_UDDEADM_ENABLELISTS_0', '关闭');
DEFINE ('_UDDEADM_ENABLELISTS_1', '注册用户');
DEFINE ('_UDDEADM_ENABLELISTS_2', '特殊用户组');
DEFINE ('_UDDEADM_ENABLELISTS_3', '仅限管理员');
DEFINE ('_UDDEIM_LISTSNEW', '建立新的联系人列表');
DEFINE ('_UDDEIM_LISTSSAVED', '新的联系人列表已保存');
DEFINE ('_UDDEIM_LISTSUPDATED', '联系人列表已更新');
DEFINE ('_UDDEIM_LISTSDESC', '联系人资料');
DEFINE ('_UDDEIM_LISTSNAME', '姓名');
DEFINE ('_UDDEIM_LISTSNAMEWO', '姓名 (请勿包含空格)');
DEFINE ('_UDDEIM_EDITLINK', '编辑');
DEFINE ('_UDDEIM_LISTS', '联系人');
DEFINE ('_UDDEIM_STATUS_READ', '已读');
DEFINE ('_UDDEIM_STATUS_UNREAD', '未读');
DEFINE ('_UDDEIM_STATUS_ONLINE', '在线');
DEFINE ('_UDDEIM_STATUS_OFFLINE', '离线');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', '显示 CB 图库图片');
DEFINE ('_UDDEADM_CBGALLERY_EXP', '默认设置下uddeIM不显示用户头像.当此设定开启时,uddeIM将显示用户在CB中的头像.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', '开启 CB 联系');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', '允许发送者向CB关系联系人列表中联系人发送消息 (无论收件人是否在屏蔽列表中).此设定独立于用户设定的单独屏蔽.');
DEFINE ('_UDDEIM_GROUPBLOCKED', '向该用户组发送消息受限.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', '收件人已将你加入忽略列表.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', '屏蔽用户组 (注册用户)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', '注册用户向该用户组发送消息将被屏蔽.此设定仅限于注册用户. 特殊用户组和管理员不受此设定影响. 此设定独立于用户设定的单独屏蔽.');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', '屏蔽用户组 (游客)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', '游客向该用户组成员发送消息将被屏蔽。此设定独立于用户设定的单独屏蔽.当该用户组被屏蔽时,此用户组成员将在个人设定中无法启用公众前台功能.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', '游客');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB 连接');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', '注册会员');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', '作者');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', '编辑');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', '发布者');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', '管理员');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', '超级管理员');
DEFINE ('_UDDEIM_NOPUBLICMSG', '会员仅接受来自注册会员的站内消息.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', '从公开用户列表中隐藏');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', '特定用户组成员将被从公开用户列表中隐藏. 注: 此设定仅隐藏用户名，用户仍能收到站内短信. 未启用公众前台的用户将不会加入此列表.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', '从所有用户列表中隐藏');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', '特定用户组成员将在所有用户列表中被隐藏.注: 此设定仅隐藏用户名，用户仍能收到站内短信.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', '无');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', '仅限超级管理员');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', '仅限管理员');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', '特殊用户组');
DEFINE ('_UDDEADM_PUBLIC', '游客');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', '"所有用户"链接设定');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', '是否在公众前台上隐藏 "所有用户" 链接, 还是始终都显示该链接.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', '公众前台');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- 选择游客 -');
DEFINE ('_UDDEIM_OPTIONS_F', '允许游客发送站内消息');
DEFINE ('_UDDEIM_MSGLIMITREACHED', '收件箱已满!');
DEFINE ('_UDDEIM_PUBLICUSER', '游客');
DEFINE ('_UDDEIM_DELETEDUSER', '用户已删除');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', '验证码长度');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', '指定用户需要输入的验证码字符数.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', '开启验证码验证功能');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', '指定发送消息时需要输入验证码的用户和用户组');
DEFINE ('_UDDEADM_CAPTCHAF0', '关闭');
DEFINE ('_UDDEADM_CAPTCHAF1', '仅限游客');
DEFINE ('_UDDEADM_CAPTCHAF2', '游客及注册用户');
DEFINE ('_UDDEADM_CAPTCHAF3', '游客，注册用户，特殊用户');
DEFINE ('_UDDEADM_CAPTCHAF4', '所有用户 (包括管理员)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', '开启公众前台');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', '此功能启用时，将允许游客向本站注册用户发送站内消息(会员可以在个人设定中选择是否愿意接收此功能).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', '公众前台默认设置');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', '此初始设置值下允许游客向注册用户发送站内消息.');
DEFINE ('_UDDEADM_PUBDEF0', '禁用');
DEFINE ('_UDDEADM_PUBDEF1', '启用');
DEFINE ('_UDDEIM_WRONGCAPTCHA', '验证码错误');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', '未知或者不存在');
DEFINE ('_UDDEADM_DONATE', '如果您喜爱 uddeIM 并打算给予开发团队一点支持的话，请向我们捐助.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', '数据库中存在以下设置: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', '备份及恢复设置.');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', '你可以将设置备份至数据库中并能在必要的时候从数据库中恢复.当你升级uddeIM或者测试的时候，这个功能非常有用.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', '备份');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', '恢复');
DEFINE ('_UDDEADM_CANCEL', '取消');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', '语言文件字符编码');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', '通常情况下， <strong>默认</strong>（ISO-8859-1）是 Joomla 1.0 的正确设置，Joomla 1.5 使用 <strong>UTF-8</strong> .');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', '默认');
DEFINE ('_UDDEIM_READ_INFO_1', '已读信件在收件箱中最多保留 ');
DEFINE ('_UDDEIM_READ_INFO_2', ' 天。然后就自动删除。');
DEFINE ('_UDDEIM_UNREAD_INFO_1', '未读信件在收件箱中最多保留 ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' 天。然后就自动删除。');
DEFINE ('_UDDEIM_SENT_INFO_1', '已发信件在发件箱中最多保留 ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' 天。然后就自动删除。');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', '为已读信件显示收件箱提示');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', '显示收件箱提示 "xx 天后删除已读信件"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', '为未读信件显示收件箱提示');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', '显示收件箱提示 "xx 天后删除未读信件"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', '为已发信件显示发件箱提示');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', '显示发件箱提示 "xx 天后删除已发信件"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', '为已删信件显示回收站提示');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', '显示回收站提示 "xx 天后清除已删信件"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', '已发信件保留天数');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', '输入一个天数，过了这个时间则自动从发件箱中删除 <b>已发信件</b> .');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', '发送给所有管理人员');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', '信件发送给 <strong>所有管理人员</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- 选择用户名 -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- 选择姓名 -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', '修改会员设定');
DEFINE ('_UDDEADM_USERSET_EXISTING', '现有');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', '不存在');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- 选择条目 -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- 选择通知 -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- 选择弹出窗口 -');
DEFINE ('_UDDEADM_USERSET_USERNAME', '用户名');
DEFINE ('_UDDEADM_USERSET_NAME', '姓名');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', '通知');
DEFINE ('_UDDEADM_USERSET_POPUP', '弹出窗口');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', '上次访问');
DEFINE ('_UDDEADM_USERSET_NO', '否');
DEFINE ('_UDDEADM_USERSET_YES', '是');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', '未知');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', '当离线时 (回复除外)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', '总是 (回复除外)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', '当离线时');
DEFINE ('_UDDEADM_USERSET_ALWAYS', '总是');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', '不通知');
DEFINE ('_UDDEADM_WELCOMEMSG', "欢迎使用 uddeIM!\n\n您已经成功安装了 uddeIM.\n\n请尝试用不同模板阅读此信件。您可以在 uddeIM 的管理后台设置模板。\n\nuddeIM 是一个仍然在开发中的项目。如果您发现了 bug 或者缺点，请写信告诉我，我们可以一起把 uddeIM 做的更好。\n\n祝您好运，请享用我们的产品!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM 安装完成.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', '请继续前往后台管理界面，检查本组件的各项设定。');
DEFINE ('_UDDEADM_REVIEWLANG', '如果您不是在以 ISO 8859-1 字符编码运行 Joomla! CMS，请注意调整成相应的编码设定。');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', '安装结束之后, uddeIM 的 email 发送功能 (email 通知, 未读提醒 emails) 是禁用状态，以便在您进行测试的时候，不会送出任何 email 。当您完成之后，不要忘记在后台禁用 "停止 email" 的选项。');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', '收件人最多允许');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', '每个信件最多允许有多少个收件人(0 表示没有限制)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', '收件人太多了');
DEFINE ('_UDDEIM_STOPPEDEMAIL', '已禁用发送 emails 功能.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', '在全文中搜索');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', '在信件全文中也应用自动完成式搜索 (否则，仅在摘要文字中搜索)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', '对 "全部会员" 链接的处理');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', ' "全部会员" 链接是隐藏，还是显示，还是总是显示全部会员？');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', '隐藏 "全部会员" 链接');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', '显示 "全部会员" 链接');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', '总是显示全部会员');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', '配置文件不可写:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', '配置文件可写:');
DEFINE ('_UDDEIM_FORWARDLINK', '转发');
DEFINE ('_UDDEIM_RECIPIENTFOUND', '收件人找到');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', '收件人找到');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (默认)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', '邮件发送系统');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', '选择 uddeIM 用来发送通知 e-mail 的邮件系统.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', '显示 Joomla 群组');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', '在广播信件列表上显示 Joomla 群组.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', '信件转发');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', '允许转发信件.');
DEFINE ('_UDDEIM_FWDFROM', '原始信件来自：');
DEFINE ('_UDDEIM_FWDTO', '给：');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', '取消信件存档');
DEFINE ('_UDDEIM_CANTUNARCHIVE', '无法取消信件存档');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', '允许群发');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', '允许发送给多个收件人(用逗号分隔).');
DEFINE ('_UDDEIM_CHARSLEFT', '个字符还可以输入');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', '显示文字计数');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', '显示还可以输入多少个文字的计数提示.');
DEFINE ('_UDDEIM_CLEAR', '清除');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', '将所选会员附加到收件人');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', '允许从“显示全部会员”的列表中选择多个收件人.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', '将所选好友附加到收件人');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', '允许从“CB 好友”的列表中选择多个收件人.');
DEFINE ('_UDDEADM_PMSFOUND', '找到的 PMS: ');
DEFINE ('_UDDEIM_ENTERNAME', '输入姓名');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', '使用自动完成');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', '输入收件人名称时使用自动完成功能.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', '用于干扰的字串');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', '输入用于信件干扰的字串。一旦信件干扰功能被启用，就不要更改此字串。');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', '配置文件错误!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', '找到的版本:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', '需要的版本:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', '正在转换配置...');
DEFINE ('_UDDEADM_CFGFILE_DONE', '完成!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', '严重错误: 无法写入配置文件:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', '信件已加密! - 无法下载!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', '密码错误! - 无法下载!');
DEFINE ('_UDDEIM_WRONGPW', '密码错误! - 请与管理员联系!');
DEFINE ('_UDDEIM_WRONGPASS', '密码错误!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', '错误的回收站日期 (inbox/outbox): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', '纠正错误的回收站日期');
DEFINE ('_UDDEIM_TODP', '收件人: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', '立即清理信件');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', '显示操作图标');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', '如果选择 <i>是</i>,操作链接将以图标显示。');
DEFINE ('_UDDEIM_UNCHECKALL', '取消全选');
DEFINE ('_UDDEIM_CHECKALL', '全选');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', '显示底部图标');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', '如果设为 <i>是</i>,页面底部将显示链接及图标.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', '使用动画表情图案');
DEFINE ('_UDDEADM_ANIMATED_EXP', '使用动画表情图案代替静态图案.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', '更多动画表情图案');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', '显示更多动画表情图案.');
DEFINE ('_UDDEIM_PASSWORDREQ', '信件已加密 - 需要输入密码');
DEFINE ('_UDDEIM_PASSWORD', '<strong>输入密码</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', '密码');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (加密文字)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (解密文字)');
DEFINE ('_UDDEIM_MORE', '更多');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', '站内信');
DEFINE ('_UDDEMODULE_NONEW', '没有新信件');
DEFINE ('_UDDEMODULE_NEWMESSAGES', '新信件: ');
DEFINE ('_UDDEMODULE_MESSAGE', '信件');
DEFINE ('_UDDEMODULE_MESSAGES', '信件');
DEFINE ('_UDDEMODULE_YOUHAVE', '您有');
DEFINE ('_UDDEMODULE_HELLO', '您好');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', '鸡毛信');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', '启用加密');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', '加密储存的信件');
DEFINE ('_UDDEADM_CRYPT0', '无');
DEFINE ('_UDDEADM_CRYPT1', '干扰信件');
DEFINE ('_UDDEADM_CRYPT2', '加密信件 - 还未实施');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', '默认 email 通知');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'email 通知默认值 (针对还没有更改个人喜好的会员生效).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', '不通知');
DEFINE ('_UDDEADM_NOTIFYDEF_1', '总是');
DEFINE ('_UDDEADM_NOTIFYDEF_2', '离线时通知');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', '隐藏 "显示全部会员" 链接');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', '在撰写新信件的窗口隐藏 "显示全部会员" 链接。 (如果注册会员很多，这一点很有帮助).');
DEFINE ('_UDDEADM_POPUP_HEAD','弹出窗口通知');
DEFINE ('_UDDEADM_POPUP_EXP','当有新信件来时显示弹出窗口 (必须使用修正版的 mod_cblogin 模块)');
DEFINE ('_UDDEIM_OPTIONS', '更多设定');
DEFINE ('_UDDEIM_OPTIONS_EXP', '您可以在此设置更多设定.');
DEFINE ('_UDDEIM_OPTIONS_P', '新信件来时显示弹出窗口');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', '默认使用弹出通知');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', '默认启用弹出窗口通知 (针对还没有更改个人喜好的会员生效).');
DEFINE ('_UDDEADM_MAINTENANCE', '维护');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', '当用户被删除时，将他的信件移到回收站');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', '检查');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', '回收站');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', '当会员被从数据库中删除时，他的信件往往还保留在数据库中。此功能可以检查是否需要删除孤儿信件。如果需要，您可以删除它们。');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', '正在检查 ...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (用户名): [收件箱|收件箱回收站|发件箱|发件箱回收站]</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>收件箱: 储存在用户收件箱中的信件。</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>收件箱回收站: 从用户的收件箱删除的信件，但仍然在其他某些人的发件箱中。</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>发件箱: 储存在用户发件箱的信件</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>发件箱回收站: 从用户的发件箱删除的信件，但仍然在其他某些人的收件箱中。</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', '正在删除 ...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', '<b>#$i 没有找到 (from/to): $mvon/$man</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT2', '删除会员 #$i 的全部个人喜好设定<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT3', '删除对会员 #$i 的屏蔽<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT4', '将全部发送给会员 #$i 的信件从发件人的“发件箱”和会员 #$i 的“收件箱”中删除。<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT5', '将全部来自会员 #$i 的信件从 #$i 的“发件箱”和收件人的“收件箱”中删除。 <br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>什么也不做</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>必须删除</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', '显示真实名称');
DEFINE ('_UDDEADM_NAMESDESC', '显示真实姓名还是用户名？');
DEFINE ('_UDDEADM_REALNAMES', '真实姓名');
DEFINE ('_UDDEADM_USERNAMES', '用户名');
DEFINE ('_UDDEADM_CONLISTBOX', '好友列表');
DEFINE ('_UDDEADM_CONLISTBOXDESC', '我的好友列表显示在呈列框中还是表格中?');
DEFINE ('_UDDEADM_LISTBOX', '列表');
DEFINE ('_UDDEADM_TABLE', '表格');

DEFINE ('_UDDEIM_TRASHCAN_INFO', '信件在回收站中会保留 24 小时，然后被删除。您只能看到信件开头的几个字。要阅读信件完整内容，您就必须首先还原信件到原来的位置.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', '信件在回收站中会保留 ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' 小时，然后被删除。您只能看到信件开头的几个字。要阅读信件完整内容，您就必须首先还原信件到原来的位置.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', '此信件已被召回，您现在可以修改它并重新发送。');
DEFINE ('_UDDEIM_COULDNOTRECALL', '信件无法召回。 (可能它已被阅读或者删除了)');
DEFINE ('_UDDEIM_CANTRESTORE', '信件还原失败。 (可能它在回收站中时间太久了，现在已经被彻底删除了。)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', '信件还原失败.');
DEFINE ('_UDDEIM_DONTSEND', '不发送');
DEFINE ('_UDDEIM_SENDAGAIN', '重新发送');
DEFINE ('_UDDEIM_NOTLOGGEDIN', '您还未登录.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>您的收件箱中没有信件。</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>您的发件箱中没有信件.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>您的回收站中没有信件.</strong>');
DEFINE ('_UDDEIM_INBOX', '收件箱');
DEFINE ('_UDDEIM_OUTBOX', '发件箱');
DEFINE ('_UDDEIM_TRASHCAN', '回收站');
DEFINE ('_UDDEIM_CREATE', '新信件');
DEFINE ('_UDDEIM_UDDEIM', '站内信件');
DEFINE ('_UDDEIM_READSTATUS', '已读');
DEFINE ('_UDDEIM_FROM', '发件人：');
DEFINE ('_UDDEIM_FROM_SMALL', '发件人：');
DEFINE ('_UDDEIM_TO', '收件人：');
DEFINE ('_UDDEIM_TO_SMALL', '收件人：');
DEFINE ('_UDDEIM_OUTBOX_WARNING', '您的发件箱中保存您已经送出并且还没有被删除的信件。如果对方还没有阅读，您可以在发件箱中收回该信件。如果您这么做了，收件人就无法再读取该信件。');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', '收回');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', '收回该信件');
DEFINE ('_UDDEIM_RESTORE', '还原');
DEFINE ('_UDDEIM_MESSAGE', '信件');
DEFINE ('_UDDEIM_DATE', '日期');
DEFINE ('_UDDEIM_DELETED', '已删除');
DEFINE ('_UDDEIM_DELETE', '删除');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', '删除');
DEFINE ('_UDDEIM_MESSAGENOACCESS', '此信件无法显示。<br />可能的原因:<ul><li>您没有权限阅读此特殊信件</li><li>该信件已被删除</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>您已将该信件移除到回收站.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', '信件来自 ');
DEFINE ('_UDDEIM_MESSAGETO', '您的信件发送给 ');
DEFINE ('_UDDEIM_REPLY', '回复');
DEFINE ('_UDDEIM_SUBMIT', '发送');
DEFINE ('_UDDEIM_DELETEREPLIED', '回复之后将原始信件删除到回收站');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', '错误: 收件人 ID 未找到。信件没有送出。');
DEFINE ('_UDDEIM_NOMESSAGE', '错误: 信件没有正文! 信件没有送出.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', '已送出的回复');
DEFINE ('_UDDEIM_MESSAGE_SENT', '已送出的信件');
DEFINE ('_UDDEIM_MOVEDTOTRASH', '且原始信件已移除到回收站');
DEFINE ('_UDDEIM_NOSUCHUSER', '没有叫这个用户名的用户!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', '您不能给自己发送信件!');
DEFINE ('_UDDEIM_VIOLATION', '<b>访问被拒绝!</b> 您没有权限执行此项操作。!');
DEFINE ('_UDDEIM_PRUNELINK', '仅限管理员: 清理');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM 管理');
DEFINE ('_UDDEADM_GENERAL', '常规');
DEFINE ('_UDDEADM_ABOUT', '关于');
DEFINE ('_UDDEADM_DATESETTINGS', '日期/时间');
DEFINE ('_UDDEADM_PICSETTINGS', '图标');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', '已读信件保留天数');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', '未读信件保留天数');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', '回收站中的信件保留天数');
DEFINE ('_UDDEADM_DAYS', '天');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', '输入一个天数，过了这个时限，则 <b>已读</b> 信件将被自动从收件箱中删除。如果您不想自动删除信件，那就输入一个非常大的数字，(例如, 36524 天相当于一个世纪). 但是不要忘了，如果您保留所有信件，数据库将增长很快。');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', '输入一个天数，过了这个时限，则目标收件人的 <b>未读</b> 信件将被自动删除。');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', '输入一个天数，过了这个时限，回收站里面的信件就会被彻底删除。小于 1 的数值也可以。例如：如果您希望信件进入回收站后 3 小时就被彻底删除，请输入 0.125 作为天数.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', '日期显示格式');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', '选择信件日期/时间的显示格式。月份名称将根据您的 Joomla! 中的本地语言设定来缩写(如果对应的 uddeIM 语言文件也存在的话).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', '长日期格式');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', '当展示信件时，就有较大空间可以显示完整日期。选择当打开信件后，日期的显示格式。星期名称及月份名称将根据 Joomla! 中的本地语言设定来显示(如果对应的 uddeIM 语言文件也存在的话).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', '只有管理员可以启动删除操作');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', '是, 仅限管理员');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', '否, 任何会员');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', '自动删除会给服务器和数据库增加较重的负荷。如果您选择 <i>是, 仅限管理员</i>，只有当管理员检查自己的信箱时，才能启动自动删除（针对全部会员的信件）。 假如您网站的管理员大约1天查看一次自己的信箱，或者更频繁，这也是大多数网站的情形，那么就选择此项。(如果您的网站有多个管理员，不管哪个登录都能诱发自动删除动作。) 如果网站很小，并且管理员很少查看自己的站内信，那么请选择 <i>否, 任何会员</i>. 如果您不明白此功能，或者不知如何操作，请选择 <i>否, 任何会员</i>.');

	// above string changed in 0.4
DEFINE ('_UDDEADM_SAVESETTINGS', '保存设定');
DEFINE ('_UDDEADM_THISHASBEENSAVED', '下列设定已被保存到配置文件:');
DEFINE ('_UDDEADM_SETTINGSSAVED', '设定已保存.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', '图标: 用户在线');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', '当用户在线时将在其用户名旁边显示一个指示图标，请输入该图标的位置。');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', '图标: 用户离线');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', '当用户离线时将在其用户名旁边显示一个指示图标，请输入该图标的位置。');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', '图标: 已读信件');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', '当信件已被阅读时将显示一个指示图标，请输入该图标的位置。');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', '图标: 未读信件');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', '当信件未被阅读时将显示一个指示图标，请输入该图标的位置。');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', '模块: 新信件图标');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', '此设定是针对 mod_uddeim_new 模块的. 输入图标的路径，当有新信件时该模块就显示此图标。');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM 安装');
DEFINE ('_UDDEADM_FINISHED', '安装已完成。欢迎使用 uddeIM . ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">您没有安装 Community Builder. 您将无法使用 uddeIM.</span><br /><br />您可以下载一个 <a href="http://www.mambojoe.com">Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', '继续');
DEFINE ('_UDDEADM_PMSFOUND_1', '您的 myPMS 站内信系统中共有 ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' 封信件。您想要把它们导入 uddeIM 吗?');
DEFINE ('_UDDEADM_IMPORT_EXP', '此举不会影响 myPMS 信件或者该组件本身。它们将保持原状。您可以安全地将它们导入 uddeIM, 即使您打算继续使用 myPMS 也没问题。(如果您对设定作了什么更改，请在导入之前首先保存设定参数!) 您的 uddeIM 数据库中已有的信件不会受到影响.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4

DEFINE ('_UDDEADM_IMPORT_YES', '立即从 myPMS 中导入信件到 uddeIM');
DEFINE ('_UDDEADM_IMPORT_NO', '否, 不导入信件');
DEFINE ('_UDDEADM_IMPORTING', '请稍等，正在导入信件.');
DEFINE ('_UDDEADM_IMPORTDONE', '从 myPMS 中导入信件成功。请不要再次运行此安装程序，因为这样将导致再次导入信件，从而显示为两份重复信件。');
DEFINE ('_UDDEADM_IMPORT', '导入');
DEFINE ('_UDDEADM_IMPORT_HEADER', '从 myPMS 导入信件');
DEFINE ('_UDDEADM_PMSNOTFOUND', '没有安装 myPMS。无法导入。');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">您已经把 myPMS 中的信件导入到 uddeIM 了.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', '被屏蔽');
DEFINE ('_UDDEIM_YOUAREBLOCKED', '未送出 (对方屏蔽了你)');
DEFINE ('_UDDEIM_BLOCKNOW', '屏蔽会员');
DEFINE ('_UDDEIM_BLOCKS_EXP', '这是您已经屏蔽了的会员列表。这些会员将不能给您发送站内信。');
DEFINE ('_UDDEIM_NOBODYBLOCKED', '您目前没有屏蔽任何会员.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', '您现在已经屏蔽了 ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' 个会员.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[取消屏蔽]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', '如果已被屏蔽的会员试图给您发送站内信，他/她将被告知他/她已被屏蔽，信件未能送出。');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', '被屏蔽的会员无法得知您已经屏蔽了他/她.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', '您不能屏蔽管理员.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', '启用屏蔽功能');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', '如果启用，会员就可以屏蔽其他会员。被屏蔽的会员无法发送信件给屏蔽了他的会员。管理员永远不会被屏蔽。');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', '是');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', '否');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', '通知被屏蔽的会员');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', '如果选择 <i>是</i>, 当被屏蔽的会员所发送的信件未能送出时，会告知他由于收件人屏蔽了他，所以信件没有送出。如果选择 <i>否</i>, 则当被评蔽的会员的信件没有送出时，他不会得到任何通知.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', '是');
DEFINE ('_UDDEADM_BLOCKALERT_NO', '否');
DEFINE ('_UDDEIM_BLOCKSDISABLED', '屏蔽系统未启用');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages');
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', '删除'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', '屏蔽');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', '整合');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', '显示 CB 链接');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', '如果选择 <i>是</i>, 所有在 uddeIM 中显示的用户名都将链接到该会员的 Community Builder 资料页.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', '显示 CB 头像');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', '如果选择 <i>是</i>, 当阅读信件时，发件人的头像将同时显示（假如他/她已经在 Community Builder 的个人资料中添加了头像的话）。');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', '显示在线状态');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', '如果选择 <i>是</i>, uddeIM 将在显示会员用户名时用小图标提示该会员目前是在线还是离线。您可以在图标管理页面设置图标。');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', '允许 e-mail 通知');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', '如果选择 <i>是</i>, 会员可以选择当他/她收到新的站内信时，是否由系统发送 e-mail 通知给他/她。');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail 中包含站内信内容');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', '如果选择 <i>否</i>, 则 e-mail 中仅说明什么时间、什么人发送了该站内信件，但不展示该站内信的内容。');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', '未读提醒 e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', '无论会员自己如何设定，本功能负责在会员过了相当长一段时间（时间可以在下面指定）之后还有未读信件在收件箱时，就发送 e-mail 给该会员进行提醒。 此选项不受上面的 \'允许 e-mail 通知\' 设定影响。如果您不想发送任何 e-mail 通知, 您就必须将这两项都关闭。');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', '多少天之后发送未读提醒');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', '如果上面的未读提醒功能被启用，请在此输入一个天数，那么在这个时限之后，就会发送提醒未读信件的 e-mail 通知。');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', '信件摘要长度');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', '收件箱、发件箱及回收站中的信件，在未打开之前，标题列表上显示多少个开头文字？');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', '信件正文长度限制');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', '限定信件正文的最大长度。超过此长度的文字将被自动删除。输入“0”表示不限制长度（不推荐）.');
DEFINE ('_UDDEADM_YES', '是');
DEFINE ('_UDDEADM_NO', '否');
DEFINE ('_UDDEADM_ADMINSONLY', '仅限管理员');
DEFINE ('_UDDEADM_SYSTEM', '系统');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', '系统信件的用户名');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM 支持发送系统信件。系统信件没有发件人用户，收到信件的会员也无法回复系统信件。请在此输入用于系统信件的发件人别名，(例如 <i>支持小组</i> 或者 <i>帮助中心</i> 或者 <i>设区管理小组</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', '允许管理员发送广播信件');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM 支持发送广播信件。这些信件将被发送给您网站上的每一个注册会员。请勿滥用.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-mail 发件人名称');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', '输入 e-mail 通知时显示的发件人名称 (例如 <i>您的网站名称</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-mail 发件人地址');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', '输入发送 e-mail 通知的 e-mail 地址。(应该是您网站的管理员联系信箱.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM 版本');
DEFINE ('_UDDEADM_ARCHIVE', '信件存档'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', '启用存档功能');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', '是否允许会员将信件进行存档. 存档的信件不会被删除。');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', '会员信件存档的数量限制');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', '每个会员的信件存档中最多允许保留多少封信件(管理员不受限制).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', '允许保留副本');
DEFINE ('_UDDEADM_COPYTOME_EXP', '允许会员收到一个自己正在发送的信件的副本。这些副本将出现在收件箱里。');
DEFINE ('_UDDEADM_MESSAGES', '信件');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', '建议删除原始信件');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', '如果启用，将在回复信件时的“发送”按钮旁边显示一个选项，名为“删除原始信件”并且默认已经钩选。在这种情况下，一旦回复内容送出，则原信会被立即从收件箱中删除到回收站。此功能有助于减少数据库中记录的信件数量。如果会员希望在收件箱中保留原始信件，他们可以取消钩选此项。');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL

DEFINE ('_UDDEADM_PERPAGE_HEAD', '每页显示信件数');
DEFINE ('_UDDEADM_PERPAGE_EXP', '在收件箱、发件箱、回收站及存档信件页面上，每页显示多少封信件？');
DEFINE ('_UDDEADM_CHARSET_HEAD', '网站语言编码');
DEFINE ('_UDDEADM_CHARSET_EXP', '如果您在使用非拉丁语系字符时遇到问题，请输入前台需要的字符编码，uddeIM 将把从数据库中读取的数据转换为此种编码然后输出到前台 HTML 代码。 <b>如果您不了解这个含义，请勿更改默认值!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'e-mail 语言编码');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', '如果您在使用非拉丁语系字符时遇到问题，请输入特定的字符编码，uddeIM 将使用该字符编码来发送寄往站外的 e-mails 。<b>如果您不了解这个含义，请勿更改默认值!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'

DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', '这是 e-mail 的内容，如果上面设定中已启用，会员就会收到这样的邮件。此 e-mail 不包含站内信的内容。请不要更改 %you%, %user% 和 %site% 这些变量. ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', '这是 e-mail 的内容，如果上面设定中已启用，会员就会收到这样的邮件。 此 e-mail 将包含站内信的内容。请不要更改 %you%, %user%, %pmessage% 和 %site% 这些变量. ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', '这是未读提醒 e-mail 的内容，如果上面设定中已启用此功能，会员将收到这样的邮件。请不要更改 %you% 和 %site% 这些变量. ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', '允许会员从存档中下载自己的信件（将以 e-mail 发送给他们）.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', '允许下载');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', '当会员从存档下载他们自己的信件时，会收到 e-mail ，这就是该 e-mail 的格式。请不要更改 %user%, %msgdate% 和 %msgbody% 这些变量. ');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', '限定收件箱容量');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', '您可以把收件箱中的信件数量包含到存档信件的最大数字里面。在这种情况下，收件箱中的信件数量与存档信件数量之和不能超过上面设定的数字。另外一种选择是, 您可以单独设置收件箱的限额，与存档信件无关。在这种情况下，会员收件箱中的信件数量不能超过上面设定的数字。如果达到这个数量，他们将无法回复信件，或者撰写新信件，除非从收件箱或者存档中删除旧信件。(会员还能继续接收信件并阅读.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', '在收件箱显示限额使用情况');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', '在收件箱底部显示会员已经保存了多少封信件。(同时显示他最多能存储多少).');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', '您已关闭存档. 您打算如何处理储存在存档中的信件？');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', '保留信件');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', '继续保留在存档 (会员将不能访问它们，并且这些信件还占用数量限额).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', '移动到收件箱');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', '存档信件已经移动到收件箱');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', '信件将移动到相应会员的收件箱。(如果信件超过了允许储存在收件箱的天数，则直接被删除到回收站).');


// 0.4 frontend, admins only (no translation necessary)
DEFINE ('_UDDEIM_VALIDFOR_1', '有效时间： ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' 小时. 0=永远 (自动删除有效)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[创建系统消息或广播信件]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[创建常规 (标准) 信件]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', '不允许发送广播信件及系统消息');
DEFINE ('_UDDEIM_SYSGM_TYPE', '信件类型');
DEFINE ('_UDDEIM_HELPON_SYSGM', '关于系统消息的帮助');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(在新窗口中打开)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', '您将要发送下面的信件. 请复查并确认内容，或者取消发送!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', '发送给 <strong>所有会员</strong> 的信件');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', '发送给 <strong>全部管理员</strong> 的信件');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', '发送给 <strong>所有当前登录的会员</strong> 的信件');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', '收件人将不能回复此信件.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', '信件将以 <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> 作为用户名送出');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', '信件将过期 ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', '信件不会过期');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '在继续之前 <b>检查链接 (点击链接) !</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', '用法 <strong>仅用于系统消息</strong>:<br /> [b]<strong>粗体</strong>[/b] [i]<em>斜体</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] 或者 [url]http://www.someurl.com[/url] 都是链接');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', '错误: 没有找到收件人. 信件未送出.');


// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', '您不能回复此信件.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail 通知已关闭. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail 通知已启用. ');
DEFINE ('_UDDEIM_SETEMNON', '[启用]');
DEFINE ('_UDDEIM_SETEMNOFF', '[关闭]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', '您好 %you%,

在 %site% 网站，会员 %user% 给您发送了站内信。
请登录到网站去阅读!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', '您好 %you%,

在 %site% 网站，会员 %user% 给您发送了站内信。内容如下：
__________________
%pmessage%

	请登录到网站去回复!
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', '您好 %you%,

在 %site% 网站，您还有未读的站内信.
请登录到网站去阅读!
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', '在 %site% 网站有您的站内信');
DEFINE ('_UDDEIM_SEND_ASSYSM', '作为系统消息发送 (意味着收件人不能回复)');
DEFINE ('_UDDEIM_SEND_TOALL', '发送给全部会员');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', '发送给全部管理员');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', '发送给全部在线会员');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', '意外错误: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', '存档未启用.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', '在存档中储存信件失败.');
DEFINE ('_UDDEIM_ARC_SAVED_1', '您已存储了 ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>您还没有在存档中储存信件.</strong>');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' 封信件');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', '您已存储了一封信件');
DEFINE ('_UDDEIM_ARC_SAVED_3', '要存储信件，您必须首先删除其它信件。');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', '您最多可以存储 ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' 封信件.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', '您有 ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' 条信件在您的');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', '存档');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', '收件箱');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', '收件箱和存档');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', '最多允许 ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', '您可以继续接收和阅读信件，但是您不能回复或者撰写新信件，除非您删除一些信件.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', '已存储信件： ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(最多： ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', '存储在存档中的信件.');
DEFINE ('_UDDEIM_STORE', '存档');
		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', '返回');

DEFINE ('_UDDEIM_TRASHCHECKED', '删除所选');
	// translators info: plural!

DEFINE ('_UDDEIM_SHOWALL', '显示全部');
	// translators example "SHOW ALL messages"

DEFINE ('_UDDEIM_ARCHIVE', '存档');
	// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', '存档已满. 未能保存.');

DEFINE ('_UDDEIM_NOMSGSELECTED', '没有选择信件.');
DEFINE ('_UDDEIM_THISISACOPY', '邮件副本，您发送给： ');
DEFINE ('_UDDEIM_SENDCOPYTOME', '发送副本给我');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', '副本存档');
DEFINE ('_UDDEIM_TRASHORIGINAL', '删除原始信件');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', '下载信件');
DEFINE ('_UDDEIM_EXPORT_MAILED', '带有导出信件的 E-mail 已送出');
DEFINE ('_UDDEIM_EXPORT_NOW', '用 e-mail 给我发送钩选的站内信');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', '此 e-mail 含有您的站内信.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', '无法发送含有站内信的 e-mail.');

DEFINE ('_UDDEIM_LIMITREACHED', '信件限额! 没有存储.');

DEFINE ('_UDDEIM_WRITEMSGTO', '撰写信件给 ');

$udde_smon[1]="1";
$udde_smon[2]="2";
$udde_smon[3]="3";
$udde_smon[4]="4";
$udde_smon[5]="5";
$udde_smon[6]="6";
$udde_smon[7]="7";
$udde_smon[8]="8";
$udde_smon[9]="9";
$udde_smon[10]="10";
$udde_smon[11]="11";
$udde_smon[12]="12";

$udde_lmon[1]="一月";
$udde_lmon[2]="二月";
$udde_lmon[3]="三月";
$udde_lmon[4]="四月";
$udde_lmon[5]="五月";
$udde_lmon[6]="六月";
$udde_lmon[7]="七月";
$udde_lmon[8]="八月";
$udde_lmon[9]="九月";
$udde_lmon[10]="十月";
$udde_lmon[11]="十一月";
$udde_lmon[12]="十二月";

$udde_lweekday[0]="星期日";
$udde_lweekday[1]="星期一";
$udde_lweekday[2]="星期二";
$udde_lweekday[3]="星期三";
$udde_lweekday[4]="星期四";
$udde_lweekday[5]="星期五";
$udde_lweekday[6]="星期六";

$udde_sweekday[0]="日";
$udde_sweekday[1]="一";
$udde_sweekday[2]="二";
$udde_sweekday[3]="三";
$udde_sweekday[4]="四";
$udde_sweekday[5]="五";
$udde_sweekday[6]="六";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains
// information abouth the [newurl] code. [newurl] is no
// longer supported by this version of uddeIM.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM 模板');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', '选择您希望 uddeIM 使用的模板');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', '显示 CB 好友');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', '如果您已安装了 Community Builder 并且想要在撰写信件的页面上为用户显示他/她的好友名单，就设为 <i>是</i>.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', '显示设定');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', '如果您已经启用了 e-mail 通知或阻止系统，将在 uddeIM 中显示“设定”链接。如果您不想要这个，您可以在此关闭它。');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', '是, 在底部');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', '允许 BB 代码');
DEFINE ('_UDDEADM_FONTFORMATONLY', '仅限字体格式');
DEFINE ('_UDDEADM_ALLOWBB_EXP', '使用 <i>仅限字体格式</i> 以便允许用户使用 bb 代码来实现粗体、斜体、下划线、文字颜色及文字大小。 当您将此项设为 <i>是</i>, 用户将能在他们的信件中(甚至链接和图片)使用 <strong>全部的</strong> 支持的 BB 代码。.');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', '允许表情');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', '当设为 <i>是</i>, 在显示信件时，表情代码如 :-) 将被表情图案代替。请参看 readme 文件了解支持的字符表情。');
DEFINE ('_UDDEADM_DISPLAY', '显示');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', '显示菜单图标');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', '当设为 <i>是</i>, 菜单及操作链接在显示时将带有图标。');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', '组件标题');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', '为此组件输入大标题，例如：“站内信”. 如果您不想显示大标题就不要填写。');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', '显示“关于”链接');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', '设为 <i>是</i> 就会显示一个指向 uddeIM 软件开发小组和相关许可的链接。此链接将被放置在 uddeIM HTML 输出页面的底部.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', '立即停止 e-mail');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', '钩选此框使 uddeIM 停止向外发送 e-mails (e-mail 通知及未读提醒 e-mail) ，不管用户自己如何设置，例如， 当测试网站时. 如果您不再需要这些功能, 将上述选项都设置为 <i>否</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', '手动');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', '列表中的 CB 缩略图');
DEFINE ('_UDDEADM_GETPICLINK_EXP', '如果您希望在信件列表概览(收件箱, 发件箱, 等等.)中显示用户的 CB 缩略图，就设为 <i>是</i>。');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', '显示全部会员');
DEFINE ('_UDDEIM_CONNECTIONS', '好友');
DEFINE ('_UDDEIM_SETTINGS', '设定');
DEFINE ('_UDDEIM_NOSETTINGS', '没有设定需要调整。');
DEFINE ('_UDDEIM_ABOUT', '关于'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', '撰写'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Mail 通知');
DEFINE ('_UDDEIM_EMN_EXP', '当您收到新站内信时，系统可以用 e-mail 来通知您。');
DEFINE ('_UDDEIM_EMN_ALWAYS', '有新信件时发送 E-mail 通知');
DEFINE ('_UDDEIM_EMN_NONE', '不要 e-mail 通知');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', '离线时发送 E-mail 通知');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', '有回复时不要发送通知');
DEFINE ('_UDDEIM_BLOCKSYSTEM', '用户阻止'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', '您可以通过阻止用户来防止他们给您发送信件。请在阅读来自那个用户的信件时选择 <i>阻止用户</i>.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', '保存更改');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', '生成下粗体文字的 BB 代码标记。用法： [b]粗体[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', '生成斜体文字的 BB 代码标记。用法： [i]斜体[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', '生成下划线文字的 BB 代码标记。用法： [u]下划线[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', '生成彩色字符的 BB 代码标记。用法： [color=#XXXXXX]colored[/color] 其中 XXXXXX 是您想要的颜色的16进制代码。例如： FF0000 就代表红色。');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', '生成彩色字符的 BB 代码标记。用法： [color=#XXXXXX]colored[/color] 其中 XXXXXX 是您想要的颜色的16进制代码。例如： 00FF00 就代表绿色.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', '生成彩色字符的 BB 代码标记。用法： [color=#XXXXXX]colored[/color] 其中 XXXXXX 是您想要的颜色的16进制代码。例如： 0000FF 就代表蓝色。');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', '生成很小的字符的 BB 代码标记。用法： [size=1]很小的文字.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', '生成小字符的 BB 代码标记。用法： [size=2] 小字符.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', '生成大字符的 BB 代码标记。用法： [size=4]大字符.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', '生成很大的字符的 BB 代码标记。用法： [size=5]很大的文字.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', '插入图片链接的 BB 代码标记。用法: [img]图片 URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', '插入超级链接的 BB 代表标记. 用法: [url]网址[/url]. 不要忘记每个网址都要以 http:// 开始。');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', '关闭所有开放的 BB 标记.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' 信件在您的'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>您没有信件存档。</strong>');

// reserved by baijianpeng
DEFINE ('_UDDEADM_ABOUTTEXT', '
<strong>udde 站内信组件 (uddeIM)</strong><br />
为 Mambo 4.5.X/Joomla 1.0.X 开发的即时信件系统<br />
作者:         Benjamin Zweifel<br />
语言文件:     simplified_chinese.php<br />
版权:         Benjamin Zweifel<br />
这是一款免费软件，您可以基于 GPL 许可分发它。uddeIM+ 软件本身不承诺任何担保。
	欲知详情，请参看许可全文：
 <a href="http://www.gnu.org/licenses/gpl.txt">www.gnu.org/licenses/gpl.txt</a>.
');
?>