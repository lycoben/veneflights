﻿<?php
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
// Language file: Traditional Chinese (source file is UTF-8)
// Translator: http://www.whichworkstation.com
// dr.which@gmail.com
// *******************************************************************

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', '載入 MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', '此指定 uddeIM 如何載入 MooTools (自動完成需要 MooTools): <i>無</i> 當您的模板有載入 MooTools 時, <i>自動</i> 為建議預設 (與 uddeIM 1.2 相同), 當使用 J1.0 您可以強制載入 MooTools 1.1 或 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', '不載入 MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', '自動');
DEFINE ('_UDDEADM_MOOTOOLS_1', '強制載入 MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', '強制載入 MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...設定預設給 MooTools');
DEFINE ('_UDDEADM_AGORA', '集會所');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 編碼');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', '校正時區');
DEFINE ('_UDDEADM_TIMEZONE_EXP', '當 uddeIM 顯示錯誤的時間時您可以在此校正時區設定. 當所有其他設定正確時這裡通常為 0. 或是您可以更動此數值至您要的.');
DEFINE ('_UDDEADM_HOURS', '小時');
DEFINE ('_UDDEADM_VERSIONCHECK', '版本資訊:');
DEFINE ('_UDDEADM_STATISTICS', '狀態:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', '顯示統計');
DEFINE ('_UDDEADM_STATISTICS_EXP', '此顯示一些例如數字或是儲存的訊息等等的統計.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', '顯示統計');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', '儲存在資料庫的訊息: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', '收件人刪除的訊息: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', '寄件人刪除的訊息: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', '等待清除的訊息: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', '複寫項目id');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', '通常 uddeIM 會嘗試偵測正確的項目id 當沒有設定時. 某些情況可能需要複寫這個值, 例如 當您使用數個選單連結至 uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', '已偵測到項目id 為: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', '使用項目id');
DEFINE ('_UDDEADM_USEITEMID_EXP', '使用此項目id 替換偵測到的.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', '使用個人資料連結');
DEFINE ('_UDDEADM_SHOWLINK_EXP', '當設為 <i>是</i>, 所有在 uddeIM 出現的使用者名稱都將顯示連結至使用者個人資料.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', '顯示縮圖');
DEFINE ('_UDDEADM_SHOWPIC_EXP', '當設為 <i>是</i>, 當閱讀訊息時各自的使用者都將顯示個別的縮圖.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', '在清單中顯示縮圖');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', '設為 <i>是</i> 當您要在訊息總覽清單顯示使用者縮圖 (收件匣, 寄件匣, 等等.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', '已停用');
DEFINE ('_UDDEADM_ENABLED', '已啟用');
DEFINE ('_UDDEIM_STATUS_FLAGGED', '重要');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', '允許訊息加上標籤');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', '允許訊息加上標籤 (uddeIM 會在清單中顯示強調星號來對重要訊息做記號).');
DEFINE ('_UDDEADM_REVIEWUPDATE', '重要: 當您從較早版本的 uddeIM 升級時請檢視 README. 有時候您必須新增或是更動資料庫的表格或欄位!');
DEFINE ('_UDDEIM_ADDCCINFO', '新增副本: 行');
DEFINE ('_UDDEIM_CC', '副本:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', '截斷引言文字');
DEFINE ('_UDDEADM_TRUNCATE_EXP', '截斷引言文字至最長文字長度的三分之二如果超出限制的話.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', '收件匣項目 ');
DEFINE ('_UDDEIM_PLUG_LAST', '最新 ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' 項目');
DEFINE ('_UDDEIM_PLUG_STATUS', '狀態');
DEFINE ('_UDDEIM_PLUG_SENDER', '寄件人');
DEFINE ('_UDDEIM_PLUG_MESSAGE', '訊息');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', '清空收件匣');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', '不允許存取垃圾筒.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', '限制存取垃圾筒');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', '您可以限制垃圾筒存取. 通常垃圾筒是所有人皆可使用 (<i>無限制</i>). 您可以限制存取給特殊使用者或是管理員, 所以低於存取權限的群組無法回收訊息.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', '無限制');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', '特殊使用者');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', '只限管理員');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', '從使用者清單隱藏使用者');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', '輸入要從公用的使用者清單隱藏的使用者 ID (舉例. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', '從使用者清單隱藏使用者');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', '輸入要從使用者清單隱藏的使用者 ID (舉例. 65,66,67).');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF 攻擊已被辨識');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF 保護');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', '此可以保護所有表格抵擋 跨網站冒名請求 攻擊. 通常應該要啟動. 只在您遇到奇怪的問題時才關閉.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', '您無法回覆保存訊息.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', '無法回收給未註冊使用者的回覆.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', '允許回覆');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', '允許從公用使用者直接回覆訊息.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"您好 %user%,\n\n%you% 已經寄給您以下的私人訊息在 %site% 網站.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', '顯示真實名稱');
DEFINE ('_UDDEADM_PUBNAMESDESC', '顯示真實名稱或是使用者名稱在公用前台?');
DEFINE ('_UDDEIM_USERLIST', '使用者清單');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', '抱歉, 在您可以張貼新訊息之前您必須等待');
DEFINE ('_UDDEADM_USERSET_LASTSENT', '最後寄出');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', '時間延遲');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', '使用者在張貼下一則訊息之前所必須等待的秒數 (0 代表無時間延遲).');
DEFINE ('_UDDEADM_SECONDS', '秒');
DEFINE ('_UDDEIM_PUBLICSENT', '訊息已寄出.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', '寄件人名稱錯誤');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'email 地址錯誤');
DEFINE ('_UDDEIM_YOURNAME', '您的名稱:');
DEFINE ('_UDDEIM_YOUREMAIL', '您的 email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', '您正在使用 uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', '您已經使用最新版本的 uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', '目前版本為 ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', '更新資訊:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', '檢查更新');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', '此聯繫 uddeIM 發展者網站以接收關於目前最新的 uddeIM 版本資訊. 除了您所使用的 uddeIM 版本資訊之外, 沒有其他的個人資料會被傳送.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', '馬上檢查');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', '無法接收版本資訊.');
DEFINE ('_UDDEIM_NOSUCHLIST', '無聯絡清單!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', '已達到最多收件量限制 (最多. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', '最多項目數量');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', '每個聯絡清單允許的最多項目數量.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', '聯絡清單尚未啟動');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', '啟動聯絡清單');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM 允許使用者建立聯絡清單. 這些清單可以被用來寄訊息給多個使用者. 當您要使用聯絡清單時不要忘記啟動多重收件人選項.');
DEFINE ('_UDDEADM_ENABLELISTS_0', '已停用');
DEFINE ('_UDDEADM_ENABLELISTS_1', '已註冊的使用者');
DEFINE ('_UDDEADM_ENABLELISTS_2', '特殊使用者');
DEFINE ('_UDDEADM_ENABLELISTS_3', '只限管理員');
DEFINE ('_UDDEIM_LISTSNEW', '建立新的聯絡清單');
DEFINE ('_UDDEIM_LISTSSAVED', '聯絡清單已儲存');
DEFINE ('_UDDEIM_LISTSUPDATED', '聯絡清單已更新');
DEFINE ('_UDDEIM_LISTSDESC', '描述');
DEFINE ('_UDDEIM_LISTSNAME', '名稱');
DEFINE ('_UDDEIM_LISTSNAMEWO', '名稱 (不加空格)');
DEFINE ('_UDDEIM_EDITLINK', '編輯');
DEFINE ('_UDDEIM_LISTS', '聯絡');
DEFINE ('_UDDEIM_STATUS_READ', '已讀');
DEFINE ('_UDDEIM_STATUS_UNREAD', '未讀');
DEFINE ('_UDDEIM_STATUS_ONLINE', '線上');
DEFINE ('_UDDEIM_STATUS_OFFLINE', '離線');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', '顯示 CB 藝廊圖片');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'uddeIM 預設只會顯示使用者自行上傳的個人頭像. 當您啟動此設定時 uddeIM 也會顯示從 CB 個人頭像藝廊來的圖片.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', '解除封鎖 CB 連線');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', '您可以允許訊息寄至收件人當已註冊寄件人是在收件人的 CB 連線清單上時 (甚至當收件人是在被封鎖的群組上時). 當啟動時此設定獨立於每位使用者可以設定的個別封鎖 (看以上的設定).');
DEFINE ('_UDDEIM_GROUPBLOCKED', '您不被允許寄至此群組.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', '此收件人把您封鎖了.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', '被封鎖的群組 (已註冊使用者)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', '無法寄出訊息的已註冊使用者群組. 只限已註冊使用者. 特殊使用者以及管理員不受影響. 當啟動時此設定獨立於每位使用者可以設定的個別封鎖 (看以上的設定).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', '被封鎖群組 (公用使用者)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', '無法寄出訊息的公用使用者群組. 當啟動時此設定獨立於每位使用者可以設定的個別封鎖 (看以上的設定). 當您封鎖一個群組, 在此群組的使用者無法在他們的個人資料設定看到用來啟動公用前台的選項.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', '公用使用者');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB 連線');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', '已註冊使用者');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', '作者');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', '編者');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', '出版者');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', '經理');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', '管理員');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', '超級管理員');
DEFINE ('_UDDEIM_NOPUBLICMSG', '使用者只限從已註冊使用者接受訊息.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', '隱藏公用的 "所有使用者" 清單');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', '您可以隱藏特定的群組不被列入公用 "所有使用者" 清單. 注意: 只有隱藏名稱, 使用者還是可以收到訊息. 使用者沒有啟動公用前台將永遠不會被列入此清單中.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', '隱藏 "所有使用者" 清單');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', '您可以隱藏特定的群組不被列入 "所有使用者" 清單. 注意: 只有隱藏名稱, 使用者還是可以收到訊息.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', '無');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', '只限超級管理員');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', '只限管理員');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', '特殊使用者');
DEFINE ('_UDDEADM_PUBLIC', '公用的');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', ' "所有使用者" 連結的行為');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', '如果要讓 "所有使用者" 的連結在公用前台隱藏, 顯示或是總是顯示給所有使用者請選擇.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', '公用前台');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- 選擇公用 -');
DEFINE ('_UDDEIM_OPTIONS_F', '允許公用使用者寄訊息');
DEFINE ('_UDDEIM_MSGLIMITREACHED', '達到訊息限制!');
DEFINE ('_UDDEIM_PUBLICUSER', '公用使用者');
DEFINE ('_UDDEIM_DELETEDUSER', '使用者已刪除');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha 長度');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', '指定使用者必須輸入多少個字元.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam 保護');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', '指定誰必須在寄出訊息時必須輸入 captcha');
DEFINE ('_UDDEADM_CAPTCHAF0', '停用');
DEFINE ('_UDDEADM_CAPTCHAF1', '只限公用使用者');
DEFINE ('_UDDEADM_CAPTCHAF2', '公用及已註冊使用者');
DEFINE ('_UDDEADM_CAPTCHAF3', '公用, 已註冊, 特殊使用者');
DEFINE ('_UDDEADM_CAPTCHAF4', '所有使用者 (包括管理員)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', '啟動公用前台');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', '一旦啟動公用使用者可以寄訊息給您的已註冊使用者 (已註冊使用者可以在他們的個人設定裏決定要不要使用這個功能).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', '公用前台預設');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', '這是預設的值如果允許公用使用者寄訊息給已註冊使用者.');
DEFINE ('_UDDEADM_PUBDEF0', '停用');
DEFINE ('_UDDEADM_PUBDEF1', '啟動');
DEFINE ('_UDDEIM_WRONGCAPTCHA', '錯誤的保全碼');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', '無 或 未知');
DEFINE ('_UDDEADM_DONATE', '如果您喜歡 uddeIM 並且願意贊助發展請小筆捐獻.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', '組態已在資料庫找到: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', '備份與還原組態');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', '您可以備份您的組態至資料庫並且在需要的時候還原. 當您更新 uddeIM 時會很有用或是儲存當前的組態以進行測試.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', '備份');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', '還原');
DEFINE ('_UDDEADM_CANCEL', '取消');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', '語系檔字元設定');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', '通常 <b>預設</b> (ISO-8859-1) 是 Joomla 1.0 的正確設定. Joomla 1.5 為<b>UTF-8</b>.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', '預設');
DEFINE ('_UDDEIM_READ_INFO_1', '已讀訊息將在收件匣停留最多 ');
DEFINE ('_UDDEIM_READ_INFO_2', ' 天. 在自動抹除之前.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', '未讀訊息將在收件匣停留最多 ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' 天. 在自動抹除之前.');
DEFINE ('_UDDEIM_SENT_INFO_1', '已寄訊息將在寄件匣停留最多 ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' 天. 在自動抹除之前.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', '顯示收件匣註釋給已讀訊息');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', '顯示收件匣註釋 <i>"已讀訊息將在 n 天後被刪除"</i>');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', '顯示收件匣註釋給未讀訊息');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', '顯示收件匣註釋 <i>"未讀訊息將在 n 天後被刪除"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', '顯示寄件匣註釋給已寄訊息');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', '顯示寄件匣註釋 <i>"已寄訊息將在 n 天後被刪除"</i>');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', '顯示垃圾筒註釋給已刪訊息');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', '顯示垃圾筒註釋 <i>"已刪訊息將在 n 天後清除"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', '保留已寄訊息 (天)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', '輸入 <b>已寄</b> 訊息將自動從寄件匣抹除的保留天數.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', '寄給所有特別使用者');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', '訊息給 <b>所有特別使用者</b>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- 選擇使用者名稱 -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- 選擇姓名 -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', '編輯使用者設定');
DEFINE ('_UDDEADM_USERSET_EXISTING', '已存在');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', '不存在');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- 選擇項目 -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- 選擇通知 -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- 選擇彈出 -');
DEFINE ('_UDDEADM_USERSET_USERNAME', '使用者名稱');
DEFINE ('_UDDEADM_USERSET_NAME', '姓名');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', '通知');
DEFINE ('_UDDEADM_USERSET_POPUP', '彈出');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', '最後存取');
DEFINE ('_UDDEADM_USERSET_NO', '否');
DEFINE ('_UDDEADM_USERSET_YES', '是');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', '未知');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', '當離線時 (除了回覆)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', '總是 (除了回覆)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', '當離線時');
DEFINE ('_UDDEADM_USERSET_ALWAYS', '總是');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', '不通知');
DEFINE ('_UDDEADM_WELCOMEMSG', "歡迎至 uddeIM!\n\n您已成功安裝 uddeIM.\n\n請嘗試用不同的佈景瀏覽此訊息. 您可以從 uddeIM 的管理後台來設定它.\n\nuddeIM 是個發展中的專案. 如果您發現錯誤或漏洞, 請寫下並寄給我才能讓 uddeIM 變的更好.\n\n好好玩吧!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM 安裝完成.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', '請繼續至管理後台並檢閱設定.');
DEFINE ('_UDDEADM_REVIEWLANG', '如果您不是用 ISO 8859-1 的字元設定來運作您的 CMS 請確認調整好您的設定.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', '安裝之後, 所有 uddeIM 的 e-mail 活動 (e-mail 通知, 勿忘我 e-mails) 將被終止這樣在您測試的時候不會有 e-mails 被寄出. 在您完成之後不要忘記在後台終止 "停止 e-mail" .');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', '最多收件人');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', '每件訊息可允許的最多收件人數 (0=無限制)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', '收件人數太多');
DEFINE ('_UDDEIM_STOPPEDEMAIL', '寄出 e-mails 已停用.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', '內文搜尋');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', '自動搜尋內文 (否則將只從開頭搜尋)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', ' "所有使用者" 的連結行為');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', '選擇要讓 "所有使用者" 連結可以隱藏, 顯示或是讓所有使用者可以看到.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', '隱藏 "所有使用者" 連結');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', '顯示 "所有使用者" 連結');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', '總是顯示給所有使用者');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', '組態無法寫入:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', '組態可以寫入:');
DEFINE ('_UDDEIM_FORWARDLINK', '下一步');
DEFINE ('_UDDEIM_RECIPIENTFOUND', '收件人已找到');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', '收件人已找到');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (預設)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', '寄信系統');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', '選擇 uddeIM 要寄出通知的寄信系統.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', '顯示 Joomla 群組');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', '在一般訊息清單顯示 Joomla 群組.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', '轉寄訊息');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', '允許轉寄訊息.');
DEFINE ('_UDDEIM_FWDFROM', '原始訊息從');
DEFINE ('_UDDEIM_FWDTO', '至');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', '取消訊息存檔');
DEFINE ('_UDDEIM_CANTUNARCHIVE', '無法取消訊息存檔');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', '允許多個收件人');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', '允許多個收件人 (用逗號分開).');
DEFINE ('_UDDEIM_CHARSLEFT', '字元剩下');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', '顯示文字記數器');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', '顯示一個可以表示還剩下多少字元的文字記數器.');
DEFINE ('_UDDEIM_CLEAR', '清除');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', '附加選擇的使用者至收件人');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', '這允許從"所有使用者"清單中選擇多個收件人.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', '附加選擇的連線至收件人');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', '這允許從"CB 連線"清單中選擇多個收件人.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS 已找到: ');
DEFINE ('_UDDEIM_ENTERNAME', '輸入名稱');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', '使用自動完成');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', '收件人名稱使用自動完成功能.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', '用於擾亂的機碼');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', '輸入用來擾亂訊息的機碼. 當擾亂已經啟用請不要更改此值.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', '發現錯誤的配置檔案!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', '找到的版本:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', '需要的版本:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', '轉換配置中...');
DEFINE ('_UDDEADM_CFGFILE_DONE', '完成!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', '致命錯誤: 無法寫入配置檔案:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', '訊息已加密! - 無法下載!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', '密碼錯誤! - 無法下載!');
DEFINE ('_UDDEIM_WRONGPW', '密碼錯誤! - 請聯繫資料庫管理員!');
DEFINE ('_UDDEIM_WRONGPASS', '密碼錯誤!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', '垃圾訊息的日期錯誤 (收件匣/寄件匣): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', '更正垃圾訊息的錯誤日期');
DEFINE ('_UDDEIM_TODP', '至: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', '立即除去訊息');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', '顯示動作圖示');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', '當設為 <b>是</b>, 動作連結將顯示為圖示.');
DEFINE ('_UDDEIM_UNCHECKALL', '取消全選');
DEFINE ('_UDDEIM_CHECKALL', '全選');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', '顯示底部圖示');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', '當設為 <b>是</b>, 底部連結將顯示為圖示.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', '使用表情動畫圖示');
DEFINE ('_UDDEADM_ANIMATED_EXP', '使用表情動畫圖示取代靜態圖示.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', '更多表情動畫圖示');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', '顯示更多表情動畫圖示.');
DEFINE ('_UDDEIM_PASSWORDREQ', '訊息已加密 - 需密碼');
DEFINE ('_UDDEIM_PASSWORD', '<b>需要密碼</b>');
DEFINE ('_UDDEIM_PASSWORDBOX', '密碼');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (文字加密)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (文字解密)');
DEFINE ('_UDDEIM_MORE', '更多');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', '私人訊息');
DEFINE ('_UDDEMODULE_NONEW', '沒有新的');
DEFINE ('_UDDEMODULE_NEWMESSAGES', '新訊息: ');
DEFINE ('_UDDEMODULE_MESSAGE', '訊息');
DEFINE ('_UDDEMODULE_MESSAGES', '訊息');
DEFINE ('_UDDEMODULE_YOUHAVE', '您有');
DEFINE ('_UDDEMODULE_HELLO', '您好');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', '訊息快遞');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', '使用加密');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', '已儲存訊息加密');
DEFINE ('_UDDEADM_CRYPT0', '無');
DEFINE ('_UDDEADM_CRYPT1', '擾亂訊息');
DEFINE ('_UDDEADM_CRYPT2', '訊息加密 - 尚未實施');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'email 通知預設');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'email 通知的預設值 (給那些尚未更改偏好的使用者).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', '無通知');
DEFINE ('_UDDEADM_NOTIFYDEF_1', '總是');
DEFINE ('_UDDEADM_NOTIFYDEF_2', '離線時通知');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', '隱藏 "所有使用者" 連結');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', '在書寫新訊息的方塊里隱藏 "所有使用者" 連結 (當有很多註冊使用者時很有用).');
DEFINE ('_UDDEADM_POPUP_HEAD','彈出通知視窗');
DEFINE ('_UDDEADM_POPUP_EXP','當收到新訊息時彈出視窗 (需要修改過的 mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', '更多設定');
DEFINE ('_UDDEIM_OPTIONS_EXP', '這裡您可以配置一些更多設定.');
DEFINE ('_UDDEIM_OPTIONS_P', '當收到新訊息時顯示彈出視窗');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', '預設彈出通知視窗');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', '啟用彈出通知視窗預設 (給那些尚未更改偏好的使用者).');
DEFINE ('_UDDEADM_MAINTENANCE', '維護');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', '資料庫維護');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', '檢查');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', '修復');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "當一個使用者從資料庫中刪除時通常他的訊息還保留在資料庫中. 此功能可以用來檢查是否需要回收孤兒訊息並且如果需要的話您也可以回收它們.<br>同時也會檢查一些資料庫的小錯誤並且更正.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "檢查中...<br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (使用者名稱): [收件匣|回收的收件匣|寄件匣|回收的寄件匣]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>收件匣: 儲存在使用者收件匣的訊息</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>已刪的收件匣: 從使用者收件匣刪除的訊息, 但還在某人的寄件匣裏</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>寄件匣: 儲存在使用者寄件匣的訊息</i><br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>已刪的寄件匣: 從使用者寄件匣刪除的訊息, 但還在某人的收件匣裏</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "刪除中...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "未找到 (從/至/設定/封鎖/被封鎖):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "刪除使用者的所有偏好設定");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "解除封鎖使用者");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "刪除所有寄件者寄至被刪除使用者的寄件匣訊息以及刪除被刪除使用者的收件匣");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "刪除所有從被刪除使用者的寄件匣寄出的訊息以及收件人的收件匣");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>沒事做</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>需要維護</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', '顯示真實名稱');
DEFINE ('_UDDEADM_NAMESDESC', '顯示真實名稱或是使用者名稱?');
DEFINE ('_UDDEADM_REALNAMES', '真實名稱');
DEFINE ('_UDDEADM_USERNAMES', '使用者名稱');
DEFINE ('_UDDEADM_CONLISTBOX', '連線清單文字方塊');
DEFINE ('_UDDEADM_CONLISTBOXDESC', '顯示我的連線為清單文字方塊或是表格?');
DEFINE ('_UDDEADM_LISTBOX', '清單文字方塊');
DEFINE ('_UDDEADM_TABLE', '表格');

DEFINE ('_UDDEIM_TRASHCAN_INFO', '訊息在被抹除之前將在垃圾筒停留 24 小時. 您只能看見訊息的第一個字. 要閱讀整個訊息您必須先還原.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', '訊息將在垃圾筒停留 ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' 小時. 您只能看見訊息的第一個字. 要閱讀整個訊息您必須先還原.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', '此訊息已被回收. 您現在可以編輯並且重寄.');
DEFINE ('_UDDEIM_COULDNOTRECALL', '訊息無法回收 (可能因為已經被閱讀或是抹除了.)');
DEFINE ('_UDDEIM_CANTRESTORE', '訊息還原失敗. (可能在垃圾筒太久已在之前被抹除了.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', '訊息還原失敗.');
DEFINE ('_UDDEIM_DONTSEND', '不寄');
DEFINE ('_UDDEIM_SENDAGAIN', '再寄');
DEFINE ('_UDDEIM_NOTLOGGEDIN', '您尚未登入.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<b>您沒有訊息在您的收信匣.</b>');
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<b>您的寄件匣沒有訊息.</b>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<b>垃圾筒沒有您的訊息.</b>');
DEFINE ('_UDDEIM_INBOX', '收件匣');
DEFINE ('_UDDEIM_OUTBOX', '寄件匣');
DEFINE ('_UDDEIM_TRASHCAN', '垃圾筒');
DEFINE ('_UDDEIM_CREATE', '新訊息');
DEFINE ('_UDDEIM_UDDEIM', '私人訊息');
DEFINE ('_UDDEIM_READSTATUS', '已讀');
DEFINE ('_UDDEIM_FROM', '從');
DEFINE ('_UDDEIM_FROM_SMALL', '從');
DEFINE ('_UDDEIM_TO', '至');
DEFINE ('_UDDEIM_TO_SMALL', '至');
DEFINE ('_UDDEIM_OUTBOX_WARNING', '寄件匣有所有您已寄出的訊息. 如果訊息尚未被讀取則您可以從寄件匣回收. 但是一旦回收, 訊息將無法給收信者閱讀. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', '回收');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', '回收此訊息');
DEFINE ('_UDDEIM_RESTORE', '回存');
DEFINE ('_UDDEIM_MESSAGE', '訊息');
DEFINE ('_UDDEIM_DATE', '日期');
DEFINE ('_UDDEIM_DELETED', '已刪除');
DEFINE ('_UDDEIM_DELETE', '刪除');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', '刪除');
DEFINE ('_UDDEIM_MESSAGENOACCESS', '此訊息無法顯示. <br />可能原因:<ul><li>您沒有權限讀取此訊息</li><li>此訊息已被刪除</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>您已移動此訊息至垃圾筒.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', '訊息從 ');
DEFINE ('_UDDEIM_MESSAGETO', '訊息從您至 ');
DEFINE ('_UDDEIM_REPLY', '回覆');
DEFINE ('_UDDEIM_SUBMIT', '發送');
DEFINE ('_UDDEIM_DELETEREPLIED', '回信之後移動原始訊息到垃圾筒');
DEFINE ('_UDDEIM_NOID', '錯誤: 未找到收件人. 沒有寄出訊息.');
DEFINE ('_UDDEIM_NOMESSAGE', '錯誤: 訊息沒有內容! 沒有寄出訊息.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', '回覆已寄出');
DEFINE ('_UDDEIM_MESSAGE_SENT', '訊息已寄出');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' 且原始訊息已移至垃圾筒');
DEFINE ('_UDDEIM_NOSUCHUSER', '沒有這個使用者名稱的使用者!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', '不能寄訊息給自己啦!');
DEFINE ('_UDDEIM_VIOLATION', '<b>存取違規!</b> 您沒有權限執行此動作!');
DEFINE ('_UDDEIM_PRUNELINK', '只限管理員: 去除');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM 管理');
DEFINE ('_UDDEADM_GENERAL', '一般');
DEFINE ('_UDDEADM_ABOUT', '關於');
DEFINE ('_UDDEADM_DATESETTINGS', '日期/時間');
DEFINE ('_UDDEADM_PICSETTINGS', '圖示');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', '已讀訊息保留天數');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', '未讀訊息保留天數');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', '訊息在垃圾筒保留天數');
DEFINE ('_UDDEADM_DAYS', '天');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', '輸入將自動從收件匣抹除<b>已讀</b>訊息的天數. 如果您不要自動抹除訊息, 輸入一個很大的值 (例如, 36524 天等於一百年). 但是請記住如果您保留所有訊息資料庫將會快速的變大.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', '輸入尚未被收件人讀取的<b>未讀</b>訊息將被抹除的天數.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', '輸入將自動從垃圾筒抹除訊息的天數. 值可以小於 1 . 範例: 3 小時之後從垃圾筒抹除訊息, 輸入 0.125 的值.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', '日期顯示格式');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', '選擇訊息所要顯示的 日期/時間 格式. 月份縮寫將根據您的 Joomla 本地的語言設定 (如果符合 uddeIM 的語系檔案存在).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', '較長的日期顯示');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', '當訊息顯示的地方有更多空間可以顯示日期. 當開啟訊息時請選擇顯示的日期格式. Joomla 本地的語言設定將用來顯示星期以及月份 (如果符合 uddeIM 的語系檔案存在).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', '刪除運用');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', '只限管理員');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', '任何使用者');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', '手動');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', '自動刪除將讓伺服器負荷變大. 如果您選擇 <b>只限管理員</b> 當管理員檢查他的收件匣時將運作自動刪除. 如果管理員規律的檢查收件匣可以選擇此選項. 在那些較少或是很少管理的網站可以選擇 <b>任何使用者</b>.');

	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', '儲存設定');
DEFINE ('_UDDEADM_THISHASBEENSAVED', '下列的設定已儲存至組態檔案:');
DEFINE ('_UDDEADM_SETTINGSSAVED', '設定已儲存.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', '圖示: 使用者在線上');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', '加入要顯示在使用者名稱旁邊圖示的位置當使用者在線上時.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', '圖示: 使用者離線');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', '加入要顯示在使用者名稱旁邊圖示的位置當使用者離線時.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', '圖示: 訊息已讀');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', '給已讀的訊息加上圖示顯示.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', '圖示: 未讀訊息');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', '給未讀的訊息加上圖示顯示.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', '模組: 新訊息圖示');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', '此設定參照到 mod_uddeim_new module. 當有新訊息時加入此模組要顯示的圖示.');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM 安裝');
DEFINE ('_UDDEADM_FINISHED', '安裝已完成. 歡迎來到 uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">您尚未安裝 Community Builder. 您將還不能使用 uddeIM.</span><br /><br />您可以到 <a href="http://www.joomlapolis.com/">Community Builder</a>下載.');
DEFINE ('_UDDEADM_CONTINUE', '繼續');
DEFINE ('_UDDEADM_PMSFOUND_1', '那裡有 ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' 個訊息在舊安裝的 PMS 程式裏. 您要將它們匯入到 uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', '這不會影響舊 PMS 裡的訊息或是您的程式. 它們將保留完好. 您可以安全地匯入它們到 uddeIM, 甚至當您考慮繼續使用舊的 PMS. 匯入之前您需要先儲存您所做的任何改變到設定! 任何已經在 uddeIM 資料庫存在的訊息都將繼續保留.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', '立刻匯入舊 PMS 訊息到 uddeIM');
DEFINE ('_UDDEADM_IMPORT_NO', '否, 不要匯入任何訊息');  
DEFINE ('_UDDEADM_IMPORTING', '訊息正在匯入中請稍候.');
DEFINE ('_UDDEADM_IMPORTDONE', '從舊 PMS 匯入訊息完畢. 請不要再執行本安裝指令碼因為會導致訊息再次匯入並重複顯示.'); 
DEFINE ('_UDDEADM_IMPORT', '匯入');
DEFINE ('_UDDEADM_IMPORT_HEADER', '從舊 PMS 匯入訊息');
DEFINE ('_UDDEADM_PMSNOTFOUND', '沒有安裝其他的 PMS. 無法匯入.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">您已經從舊 PMS 匯入訊息到 uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', '已封鎖');
DEFINE ('_UDDEIM_YOUAREBLOCKED', '未寄出 (使用者已經封鎖您)');
DEFINE ('_UDDEIM_BLOCKNOW', '封鎖&nbsp;使用者');
DEFINE ('_UDDEIM_BLOCKS_EXP', '這是您已經封鎖使用者的清單. 這些使用者無法發送私人訊息給您.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', '您目前尚未封鎖任何使用者.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', '您目前已經封鎖 ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' 位使用者.');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[解除封鎖]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', '如果被封鎖的使用者嘗試要發送訊息給您, 他或她將被告知訊息無法發送因為被封鎖了.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', '被封鎖的使用者無法得知您將他或她封鎖了.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', '您無法封鎖管理員.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', '啟用封鎖系統');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', '當啟用時, 使用者可以封鎖其他使用者. 被封鎖的使用者將無法發送訊息給封鎖他的使用者. 管理員無法被封鎖.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', '是');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', '否');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', '通知被封鎖使用者');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', '如果設成 <b>是</b>, 被封鎖的使用者將被通知他的訊息無法發送因為收件人已經把他封鎖了. 如果設成 <b>否</b>, 被封鎖的使用者將不會被通知他的訊息無法發送.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', '是');
DEFINE ('_UDDEADM_BLOCKALERT_NO', '否');
DEFINE ('_UDDEIM_BLOCKSDISABLED', '封鎖系統未啟動');
// DEFINE ('_UDDEADM_DELETIONS', '訊息'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', '刪除'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', '封鎖');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', '整合');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', '顯示 CB 連結');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', '當設為 <b>是</b>, 所有在 uddeIM 的使用者名稱都將在他們的 Community Builder 個人資料顯示成連結.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', '顯示 CB 縮圖');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', '當設為 <b>是</b>, 閱讀訊息時將顯示儲存在 Community Builder 內個別的使用者縮圖.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', '顯示線上狀態');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', '當設為 <b>是</b>, uddeIM 會顯示每位使用者一個小圖示來提示該名使用者在線上或是離線.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', '允許 e-mail 通知');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', '當設為 <b>是</b>, 每位使用者可以設定每次有新訊息到達收信匣要不要收到一封 e-mail.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail 包含訊息');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', '當設為 <b>否</b>, 此 e-mail 將只包含有關何時以及由誰寄出的訊息, 而不是訊息本身.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', '勿忘我 e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', '此功能寄出一封 e-mail 給在收件匣有很久還未讀取訊息的使用者 (下方設定). 此設定獨立於 \'允許 e-mail 通知\' 的設定. 如果您不要寄出任何 e-mail 訊息, 您必須兩者都關閉.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', '經過多少天寄出勿忘我');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', '如果勿忘我功能(上方)設為 <b>是</b>, 設定 e-mail 通知寄出之後經過多少天還尚未讀取的訊息將會被處決.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', '第一個字元列表');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', '您可以在這裡設定訊息在收件匣, 寄件匣, 垃圾筒要顯示的字元數.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', '訊息最大長度');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', '在這裡設定訊息的最大長度(超過長度限制的訊息將自動被截斷). 設為 \'0\' 允許任何長度的訊息 (不建議).');
DEFINE ('_UDDEADM_YES', '是');
DEFINE ('_UDDEADM_NO', '否');
DEFINE ('_UDDEADM_ADMINSONLY', '限管理員');
DEFINE ('_UDDEADM_SYSTEM', '系統');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', '系統訊息使用者名稱');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM 支援系統訊息. 它們沒有寄出者並且使用者無法對它們回覆. 輸入預設的使用者別名給系統訊息 (例如 <i>Support</i> 或是 <i>Help desk</i> 或是 <i>Community Master</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', '允許管理員寄出全體訊息');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM 支援全體訊息. 它們將寄到您系統的所有使用者. 請少量的使用它們.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-mail 寄出者名稱');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', '輸入 e-mail-通知 的寄件人名稱 (例如 <b>您網站名稱</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', '寄信人地址');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', '輸入 e-mail-通知 的寄件人 e-mail 地址 (可以是您網站主要的聯絡 e-mail-地址.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM 版本');
DEFINE ('_UDDEADM_ARCHIVE', '保存匣'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', '啟動保存');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', '選擇則可以允許使用者儲存訊息在保存匣. 在保存匣的訊息不會被刪除.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', '最大保存訊息數');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', '設定每位使用者可以儲存在保存匣的數目 (管理員沒有限制).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', '允許自行複製');
DEFINE ('_UDDEADM_COPYTOME_EXP', '允許使用者收到寄出訊息的複製. 這些複製將出現在收件匣.');
DEFINE ('_UDDEADM_MESSAGES', '訊息');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', '建議回收原件');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', '一旦啟用, 將會在 \'發送\' 回覆按鈕之後置入一個核取方塊名為 \'回收原件\' 並且預設選取. 這種情況, 當回覆寄出之後訊息將立刻從收件匣移動到垃圾筒. 此功能可以讓在資料庫眾多的訊息保持較小的資料量. 使用者如果想要保留訊息在收件匣可以選擇不要選取核許方塊.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', '每頁訊息');	
DEFINE ('_UDDEADM_PERPAGE_EXP', '定義在收件匣, 寄件匣, 垃圾筒, 保存匣每一頁所要選擇的訊息數量.');
DEFINE ('_UDDEADM_CHARSET_HEAD', '使用的字元編碼');
DEFINE ('_UDDEADM_CHARSET_EXP', '如果您使用非拉丁語系字元編碼遭遇顯示困難, 您可以在此處輸入 uddeIM 從資料庫轉換輸出至 HTML 使用的字元編碼. <b>如果您不知道這是做什麼用的, 請勿更改其預設值!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', '郵件的字元編碼');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', '如果您使用非拉丁語系字元編碼遭遇顯示困難, 您可以在此處輸入 uddeIM 寄出信件使用的字元編碼. <b>如果您不知道這是做什麼用的, 請勿更改其預設值!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', '這是使用者將收到的 e-mail 內容當選項設為以上. 訊息本身的內容將不會出現在 e-mail 裏. 保持變數 %you%, %user% 及 %site% 完整. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', '這是使用者將收到的 e-mail 內容當選項設為以上. 此 e-mail 將包括訊息的內容. 保持變數 %you%, %user%, %pmessage% 及 %site% 完整. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', '這是使用者將收到的 勿忘我-email 內容當選項設為以上. 保持變數 %you% 及 %site% 完整. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', '允許使用者從他們的保存匣下載訊息利用 e-mail 訊息給他們自己.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', '允許下載');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', '這是使用者將收到的 e-mail 格式當他們從他們的保存匣下載訊息. 保持變數 %user%, %msgdate% 及 %msgbody% 完整. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', '設定收件匣限制');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', '您可以在收件匣裏儲存最多的保留訊息數目. 此狀況下, 在收件匣訊息跟保存訊息的總數不能超出上面的設定. 另一種方式, 您可以設定不包括保存訊息的收件匣限制. 這樣子, 使用者可能無法儲存超過上面限制的訊息數. 如果到達限制, 將無法回覆或是寫新的訊息直到從收件匣或是保存匣刪除舊的訊息. (使用者還是可以收訊息並閱讀.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', '顯示使用限制在收件匣');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', '顯示使用者儲存了多少訊息 (以及允許儲存的數目) 在收件匣的下面一行.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', '您已經關閉保存匣. 您要如何處理已經儲存在保存匣內的訊息?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', '保留');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', '保留它們在保存匣 (使用者將無法存取它們並且計算至訊息限制量).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', '移至收件匣');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', '保存的訊息已移至收件匣');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', '訊息將被移至個別使用者的收件匣 (如果超過收件匣時限限制將被回收).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', '有效時間 ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' 小時. 0=永遠 (套用自動刪除)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[建立系統或是全體訊息]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[建立一個標準訊息]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', '不允許系統及全體訊息.');
DEFINE ('_UDDEIM_SYSGM_TYPE', '訊息類型');
DEFINE ('_UDDEIM_HELPON_SYSGM', '幫助給系統訊息');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(在新視窗打開)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'You are about to send the message displayed below. Please review and confirm or cancel!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', '訊息給 <b>所有使用者</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', '訊息給 <b>所有管理員</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', '訊息給 <b>所有目前登入的使用者</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', '收件人將無法回覆此訊息.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', '寄出訊息將以 <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> 為使用者名稱寄出');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', '訊息將到期 ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', '訊息不會到期');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>繼續之前請先檢查連結 (在上面點擊)!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', '使用 <b>只限系統訊息</b>:<br /> [b]<b>粗體</b>[/b] [i]<em>斜體</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] 或是 [url]http://www.someurl.com[/url] 為連結');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', '錯誤: 無收件人. 訊息未寄出.');		

DEFINE ('_UDDEIM_CANTREPLY', '您無法回覆此訊息.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail 通知已關閉. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail 通知已打開. ');
DEFINE ('_UDDEIM_SETEMNON', '[打開]');
DEFINE ('_UDDEIM_SETEMNOFF', '[關閉]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"您好 %you%,\n\n%user% 寄給您一個私人訊息在 %site% 網站. 請登入閱讀!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"您好 %you%,\n\n%user% 寄給您一個以下的私人訊息在 %site% 網站. 請登入並回覆!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"您好 %you%,\n\n您尚有未讀取的私人訊息在 %site% 網站. 請登入閱讀!");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', '您有訊息在 %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', '系統寄出訊息 (=收件人無法回覆)');
DEFINE ('_UDDEIM_SEND_TOALL', '寄給所有使用者');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', '寄給所有管理員');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', '寄給所有線上使用者');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', '不可預期的錯誤: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', '保存匣尚未啟動.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', '儲存訊息至保存匣失敗.');
DEFINE ('_UDDEIM_ARC_SAVED_1', '您已儲存 ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>您尚未在保存匣儲存任何訊息.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>您的保存匣沒有訊息.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' 訊息');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', '您已儲存一個訊息');
DEFINE ('_UDDEIM_ARC_SAVED_3', '要儲存新訊息您必須先刪除一些訊息.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', '您最多可以儲存 ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' 個訊息.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', '您有 ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' 個訊息在您的');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' 個訊息在您的'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', '保存匣');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', '收件匣');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', '收件匣及保存匣');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', '最大允許的數目為 ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', '您還是可以接收並閱讀訊息但是您無法回覆或是寫新的訊息直到您刪除訊息.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', '已儲存訊息: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(最多. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', '個訊息儲存在保存匣.');
DEFINE ('_UDDEIM_STORE', '保存匣');				// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', '上一頁');
DEFINE ('_UDDEIM_TRASHCHECKED', '刪除已選取');	// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', '顯示全部');				// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', '保存匣');				// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', '保存匣已滿. 未儲存.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', '尚未選取訊息.');
DEFINE ('_UDDEIM_THISISACOPY', '複製一份您寄出的訊息至 ');
DEFINE ('_UDDEIM_SENDCOPYTOME', '複製給自己');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', '複製至保存匣');
DEFINE ('_UDDEIM_TRASHORIGINAL', '刪除原始的');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', '訊息下載');
DEFINE ('_UDDEIM_EXPORT_MAILED', '訊息匯入的 E-mail 已寄出');
DEFINE ('_UDDEIM_EXPORT_NOW', 'e-mail 寄給我');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', '此郵件包括您的私人訊息.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', '無法寄出包括訊息的 e-mail.');
DEFINE ('_UDDEIM_LIMITREACHED', '已到達訊息限制! 無法儲存.');
DEFINE ('_UDDEIM_WRITEMSGTO', '寫一個訊息至 ');

$udde_smon[1]="一月";
$udde_smon[2]="二月";
$udde_smon[3]="三月";
$udde_smon[4]="四月";
$udde_smon[5]="五月";
$udde_smon[6]="六月";
$udde_smon[7]="七月";
$udde_smon[8]="八月";
$udde_smon[9]="九月";
$udde_smon[10]="十月";
$udde_smon[11]="十一月";
$udde_smon[12]="十二月";

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

$udde_sweekday[0]="Sun";
$udde_sweekday[1]="Mon";
$udde_sweekday[2]="Tue";
$udde_sweekday[3]="Wed";
$udde_sweekday[4]="Thu";
$udde_sweekday[5]="Fri";
$udde_sweekday[6]="Sat";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM 模板');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', '選擇您要 uddeIM 使用的模板');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', '顯示 CB 連線');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', '使用 <b>是</b> 如果您有安裝 Community Builder 並且要在寫新訊息的頁面顯示使用者連線.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', '顯示設定');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', '設定的連結將自動在 uddeIM 出現如果您有啟動 e-mail 通知或是 封鎖系統. 您可以指定它的位置或是完全關閉它.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', '是, 在底部');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', '允許 BB 代碼標籤');
DEFINE ('_UDDEADM_FONTFORMATONLY', '只限字體格式');
DEFINE ('_UDDEADM_ALLOWBB_EXP', '使用 <b>只限字體格式</b> 可以允許使用者使用 BB 代碼在 粗體, 斜體, 底線, 字體顏色以及大小. 當您選項設成 <b>是</b>, 使用者允許使用 <b>所有</b> 被支援的 BB 代碼標籤 (例如. 連結與圖片).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', '允許表情圖示');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', '當設成 <b>是</b>, 表情代碼例如 :-) 將在訊息李被換成表情圖示圖像.');
DEFINE ('_UDDEADM_DISPLAY', '顯示');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', '顯示選單圖示');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', '當設成 <b>是</b>, 選單連結將用圖示顯示.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', '組件名稱');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', '輸入私人訊息組件的標題, 舉例 \'私人訊息\'. 如您不想顯示標題請留下空白.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', '顯示 關於 連結');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', '設為 <b>是</b> 顯示 uddeIM software 的開發人員以及版權連結. 此連結將會放在 uddeIM 的最底部.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', '停止 e-mail');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', '核取此方塊避免 uddeIM 寄出 e-mails (e-mail 通知以及勿忘我 e-mails) 無視於使用者設定, 測試網站時很有用.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB 縮圖在清單裏');
DEFINE ('_UDDEADM_GETPICLINK_EXP', '設為 <b>是</b> 如果您要在訊息清單總覽裏顯示 Community Builder 縮圖 (收件匣, 寄出匣, 等等.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', '顯示使用者');
DEFINE ('_UDDEIM_CONNECTIONS', '連線');
DEFINE ('_UDDEIM_SETTINGS', '設定');
DEFINE ('_UDDEIM_NOSETTINGS', '沒有設定需要調整.');
DEFINE ('_UDDEIM_ABOUT', '關於'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', '撰寫'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-mail 通知');
DEFINE ('_UDDEIM_EMN_EXP', '收到新私人訊息的 e-mail 通知.');
DEFINE ('_UDDEIM_EMN_ALWAYS', '新訊息的 E-mail 通知');
DEFINE ('_UDDEIM_EMN_NONE', '無 e-mail 通知');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', '當離線時 E-mail 通知');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', '不寄回覆的通知');
DEFINE ('_UDDEIM_BLOCKSYSTEM', '使用者封鎖'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', '您可以封鎖使用者預防它們寄給您訊息. 選擇 <b>封鎖使用者</b> 當您瀏覽從這位使用者寄來的訊息.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', '儲存改變');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB 代碼標籤讓文字粗體. 使用: [b]粗體[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB 代碼標籤讓文字斜體. 使用: [i]斜體[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB 代碼標籤加文字底線. 使用: [u]底線[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB 代碼標籤改變文字顏色. 使用 [color=#XXXXXX]colored[/color] XXXXXX 是您要的顏色的 hex 代碼, 例如 FF0000 為紅色.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB 代碼標籤改變文字顏色. 使用 [color=#XXXXXX]colored[/color] XXXXXX 是您要的顏色的 hex 代碼, 例如 00FF00 為綠色.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB 代碼標籤改變文字顏色. 使用 [color=#XXXXXX]colored[/color] XXXXXX 是您要的顏色的 hex 代碼, 例如 0000FF 為藍色.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB 代碼標籤改變文字至最小. 使用: [size=1]very small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB 代碼標籤改變文字至中等. 使用: [size=2] small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB 代碼標籤改變文字至較大. 使用: [size=4]big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB 代碼標籤改變文字至最大. 使用: [size=5]very big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB 代碼標籤加入圖像連結. 使用: [img]圖像-網址[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB 代碼標籤加入超連結. 使用: [url]網址[/url]. 不要忘記在網址的最前面加入 http:// .');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', '關閉所有 BB 代碼標籤.');
