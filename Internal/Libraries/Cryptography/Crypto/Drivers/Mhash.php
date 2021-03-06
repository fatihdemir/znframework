<?php
namespace ZN\Cryptography\Drivers;

use ZN\Cryptography\CryptoMapping;

class MhashDriver extends CryptoMapping
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Encrypt
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $data
	// @param array  $settings
	//
	//----------------------------------------------------------------------------------------------------
	public function encrypt($data, $settings)
	{
		$cipher = isset($settings['cipher']) ? $settings['cipher'] : 'sha256';
	 	$key    = isset($settings['key'])    ? $settings['key']    : \Config::get('Encode', 'projectKey'); 
		
		// MHASH_ ön eki ilave ediliyor.
		$cipher = \Convert::toConstant($cipher, 'MHASH_');
		
		return base64_encode(trim(mhash($cipher, $data, $key)));
	}
	
	//----------------------------------------------------------------------------------------------------
	// Keygen
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $length
	//
	//----------------------------------------------------------------------------------------------------
	public function keygen($length)
	{
		return mhash_keygen_s2k(MHASH_MD5, md5(mt_rand()), md5(mt_rand()), $length);
	}
}