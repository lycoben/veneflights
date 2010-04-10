<?php 
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2008 Stephan Slabihoud
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

function uddeIMgetMessage($message, $cryptpass, $cryptmode, $crypthash, $cryptkey) {
	$ret = "";
	if ($cryptmode==1) {
		if ($crypthash && md5($cryptkey)!=$crypthash)
			$ret = _UDDEIM_WRONGPW;
		else
			$ret = uddeIMdecrypt($message, $cryptkey, CRYPT_MODE_BASE64);
	} elseif ($cryptmode==2 && !strlen($cryptpass)) {
		$ret = _UDDEIM_PASSWORDREQ;
	} elseif ($cryptmode==2 && strlen($cryptpass)) {
		if (md5($cryptpass)==$crypthash)
			$ret = uddeIMdecrypt($message, $cryptpass, CRYPT_MODE_BASE64);
		else
			$ret = _UDDEIM_WRONGPASS;
	} elseif ($cryptmode==3) {
		$ret = uddeIMdecrypt($message, "", CRYPT_MODE_STOREBASE64);
	} else {
		$ret = $message;
	}
	return $ret;
}

define('CRYPT_MODE_BINARY'     , 0);
define('CRYPT_MODE_BASE64'     , 1);
define('CRYPT_MODE_HEXADECIMAL', 2);
define('CRYPT_MODE_STOREBINARY', 16);
define('CRYPT_MODE_STOREBASE64', 17);
define('CRYPT_MODE_STOREHEXADECIMAL', 18);

define('CRYPT_HASH_MD5' , 'md5');
define('CRYPT_HASH_SHA1', 'sha1');

function uddeIMencrypt($data,$key,$mode) {
	$data = (string) $data;
	if ($mode<16) {
		for ($i=0;$i<strlen($data);$i++)
			@$encrypt .= $data[$i] ^ $key[$i % strlen($key)];
	} else {
		@$encrypt = $data;
		$mode = $mode & 0x0f;
	}
	if ($mode == CRYPT_MODE_BINARY)
		return @$encrypt;
	@$encrypt = base64_encode(@$encrypt);
	if ($mode == CRYPT_MODE_BASE64)
		return @$encrypt;
	if ($mode == CRYPT_MODE_HEXADECIMAL)
		return uddeIMdoEncodeHexadecimal(@$encrypt);
}

function uddeIMdecrypt($crypt,$key,$mode) {
	$mode2 = $mode & 0x0f;
	if ($mode2 == CRYPT_MODE_HEXADECIMAL)
		$crypt = uddeIMdoDecodeHexadecimal($crypt);
	if ($mode2 == CRYPT_MODE_BASE64)
		$crypt = (string)base64_decode($crypt);
	if ($mode<16) {
		for ($i=0;$i<strlen($crypt);$i++)
			@$data .= $crypt[$i] ^ $key[$i % strlen($key)];
	} else {
		@$data = $crypt;
	}
	return @$data;
}

function uddeIMdoEncodeHexadecimal($data) {
	$data = (string) $data;
	for ($i=0;$i<strlen($data);$i++)
		@$hexcrypt .= dechex(ord($data[$i]));
	return @$hexcrypt;
}

function uddeIMdoDecodeHexadecimal($hexcrypt) {
	$hexcrypt = (string) $hexcrypt;
	for ($i=0;$i<strlen($hexcrypt);$i+=2)
		@$data .= chr(hexdec(substr($hexcrypt, $i, 2)));
	return @$data;
}
