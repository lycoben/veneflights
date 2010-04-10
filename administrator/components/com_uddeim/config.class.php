<?php
if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }
if (defined('_uddeConfig')) {
 return true;
} else {
 define('_uddeConfig', 1);
 class uddeimconfigclass {
  var $version = '1.0';
  var $cryptkey = 'uddeIMcryptkey';
  var $datumsformat = 'j M, H:i';
  var $ldatumsformat = 'j F Y, H:i';
  var $emn_sendermail = 'webmaster';
  var $emn_sendername = 'Messaging';
  var $sysm_username = 'System';
  var $charset = 'ISO8859-1';
  var $mailcharset = 'UTF-8';
  var $emn_body_nomessage = 'Hi %you%,

%user% has sent you a private message at %site%. Please log in to read it!';
  var $emn_body_withmessage = 'Hi %you%,

%user% has sent you the following private message at %site%. Please log in to reply!
__________________
%pmessage%';
  var $emn_forgetmenot = 'Hi %you%,

you have unread private messages on %site%. Please log in to read them!';
  var $export_format = '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================';
  var $showtitle = '';
  var $templatedir = 'default';
  var $quotedivider = '__________';
  var $blockgroups = '';
  var $pubblockgroups = '';
  var $hideusers = '62';
  var $pubhideusers = '62';
  var $ReadMessagesLifespan = 36524;
  var $UnreadMessagesLifespan = 36524;
  var $SentMessagesLifespan = 36524;
  var $TrashLifespan = 2;
  var $ReadMessagesLifespanNote = 0;
  var $UnreadMessagesLifespanNote = 0;
  var $SentMessagesLifespanNote = 0;
  var $TrashLifespanNote = 1;
  var $adminignitiononly = 1;
  var $pmsimportdone = 2;
  var $blockalert = 0;
  var $blocksystem = 0;
  var $allowemailnotify = 0;
  var $notifydefault = 0;
  var $popupdefault = 0;
  var $allowsysgm = 0;
  var $emailwithmessage = 0;
  var $firstwordsinbox = 40;
  var $longwaitingdays = 75;
  var $longwaitingemail = 0;
  var $maxlength = 2500;
  var $showcblink = 1;
  var $showcbpic = 1;
  var $showonline = 1;
  var $allowarchive = 0;
  var $maxarchive = 100;
  var $allowcopytome = 1;
  var $trashoriginal = 1;
  var $perpage = 8;
  var $enabledownload = 0;
  var $inboxlimit = 0;
  var $showinboxlimit = 0;
  var $allowpopup = 0;
  var $allowbb = 1;
  var $allowsmile = 1;
  var $animated = 0;
  var $animatedex = 0;
  var $showmenuicons = 1;
  var $bottomlineicons = 1;
  var $actionicons = 1;
  var $showconnex = 1;
  var $showsettingslink = 2;
  var $showabout = 0;
  var $emailtrafficenabled = 0;
  var $getpiclink = 0;
  var $connex_listbox = 1;
  var $forgetmenotstart = 0;
  var $realnames = 0;
  var $cryptmode = 0;
  var $modeshowallusers = 1;
  var $useautocomplete = 0;
  var $allowmultipleuser = 1;
  var $connexallowmultipleuser = 1;
  var $allowmultiplerecipients = 1;
  var $showtextcounter = 1;
  var $allowforwards = 1;
  var $showgroups = 0;
  var $mailsystem = 0;
  var $searchinstring = 1;
  var $maxrecipients = 0;
  var $languagecharset = 1;
  var $usecaptcha = 0;
  var $captchalen = 4;
  var $pubfrontend = 0;
  var $pubfrontenddefault = 0;
  var $pubmodeshowallusers = 1;
  var $hideallusers = 0;
  var $pubhideallusers = 0;
  var $unblockCBconnections = 1;
  var $CBgallery = 0;
  var $enablelists = 0;
  var $maxonlists = 100;
  var $timedelay = 0;
  var $pubrealnames = 0;
  var $pubreplies = 0;
  var $csrfprotection = 0;
  var $trashrestriction = 0;
  var $replytruncate = 0;
  var $allowflagged = 0;
  var $overwriteitemid = 0;
  var $useitemid = 0;
  var $timezone = 0;
  var $pubuseautocomplete = 0;
  var $pubsearchinstring = 1;
  var $mootools = 1;
  // temporary variables
  var $flags = 0;
 }
}
