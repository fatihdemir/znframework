<?php
namespace ZN\Services;

class InternalHTTP extends \Requirements implements HTTPInterface
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
	// const config
	//----------------------------------------------------------------------------------------------------
	// 
	// @const string
	//
	//----------------------------------------------------------------------------------------------------
	const config = 'Services:http';
	
	//----------------------------------------------------------------------------------------------------
	// Settings
	//----------------------------------------------------------------------------------------------------
	// 
	// @var array
	//
	//----------------------------------------------------------------------------------------------------
	protected $settings;
	
	//----------------------------------------------------------------------------------------------------
	// Types
	//----------------------------------------------------------------------------------------------------
	// 
	// @var array
	//
	//----------------------------------------------------------------------------------------------------
	protected $types = array
	(
		'post',
		'get',
		'env',
		'server',
		'request'
	);

	//----------------------------------------------------------------------------------------------------
	// Is Ajax
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function isAjax()
	{
		if( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Browser Lang
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $default tr
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function browserLang(String $default = 'en')
	{
		$languages = \Config::get('Language', 'shortCodes');
		
		$lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
		
		if( isset($languages[$lang]) )
		{
			return strtolower($lang);
		}
	
		return $default;
	}

	//----------------------------------------------------------------------------------------------------
	// Code
	//----------------------------------------------------------------------------------------------------
	// 
	// @param numeric $code
	//
	//----------------------------------------------------------------------------------------------------
	public function code(Int $code = 200)
	{
		$messages = \Arrays::multikey($this->config['messages']);
		
		if( isset($messages[$code]) )
		{
			return $messages[$code];	
		}
		
		return false;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Message
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $message
	//
	//----------------------------------------------------------------------------------------------------
	public function message(String $message)
	{
		return $this->code($message);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Name
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function name(String $name)
	{
		$this->settings['name'] = $name;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Value
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $value
	//
	//----------------------------------------------------------------------------------------------------
	public function value(String $value)
	{
		$this->settings['value'] = $value;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Input
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $input
	//
	//----------------------------------------------------------------------------------------------------
	public function input(String $input)
	{
		if( in_array($input, $this->types) )
		{
			$this->settings['input'] = $input;
		}
		else
		{
			\Exceptions::throws(lang('Error', 'invalidInput', $input).' : get, post, server, env, request');	
		}
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Select
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function select(String $name)
	{
		$name  = isset($this->settings['name'])  ? $this->settings['name']  : $name;
		$input = isset($this->settings['input']) ? $this->settings['input'] : false;

		$this->settings = [];
		
		switch( $input )
		{
			case 'post' 	: return \Method::post($name); 	 break;
			case 'get' 		: return \Method::get($name); 	 break;
			case 'env' 		: return \Method::env($name); 	 break;
			case 'server' 	: return \Method::server($name);  break;
			case 'request' 	: return \Method::request($name); break;
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Insert
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function insert(String $name, $value)
	{
		$name  = isset($this->settings['name'])  ? $this->settings['name']  : $name;
		$input = isset($this->settings['input']) ? $this->settings['input'] : false;   
		$value = isset($this->settings['value']) ? $this->settings['value'] : $value;
		
		$this->settings = [];
		
		switch( $input )
		{
			case 'post' 	: return \Method::post($name, $value); 	 break;
			case 'get' 		: return \Method::get($name, $value); 	 break;
			case 'env' 		: return \Method::env($name, $value); 	 break;
			case 'server' 	: return \Method::server($name, $value);  break;
			case 'request' 	: return \Method::request($name, $value); break;
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Delete
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function delete(String $name)
	{
		$name  = isset($this->settings['name'])  ? $this->settings['name']  : $name;
		$input = isset($this->settings['input']) ? $this->settings['input'] : false;
		
		$this->settings = [];
		
		switch( $input )
		{
			case 'post' 	: unset($_POST[$name]);    break;
			case 'get' 		: unset($_GET[$name]); 	   break;
			case 'env' 		: unset($_ENV[$name]); 	   break;
			case 'server' 	: unset($_SERVER[$name]);  break;
			case 'request' 	: unset($_REQUEST[$name]); break;
		}
	}
}