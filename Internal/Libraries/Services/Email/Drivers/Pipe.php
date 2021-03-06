<?php
namespace ZN\Services\Drivers;

use ZN\Services\Abstracts\EmailMappingAbstract;

class PipeDriver extends EmailMappingAbstract
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
	// Construct
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function __construct()
	{
		\Support::func('popen');
	}
	
	//----------------------------------------------------------------------------------------------------
	// Send
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $to
	// @param string $subject
	// @param string $message
	// @param mixed  $headers
	// @param mixed  $settings
	//
	//----------------------------------------------------------------------------------------------------
	public function send($to, $subject, $message, $headers = NULL, $settings = [])
	{
		$returnPath = $settings['mailPath'].' -oi -f '.$settings['from'].' -t -r '.$settings['returnPath'];
		
		$open = @popen($returnPath, 'w');
		
		if( empty($open) )
		{
			return \Exceptions::throws('Email', 'sendFailureSendmail');
		}
		
		@fputs($open, $headers);
		@fputs($open, $message);
		
		$status = @pclose($open);
		
		if( $status !== 0 )
		{
			\Exceptions::throws('Email', 'exitStatus', $status);
			\Exceptions::throws('Email', 'noSocket');
			
			return false;
		}
		
		return true;	
	}
}