<?php 
namespace ZN\DataTypes;

interface JsonInterface
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
	// Encode                                                                 
	//----------------------------------------------------------------------------------------------------
	//
	// @param variadic $args
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function encode($data, String $type = 'unescaped_unicode') : String;
	
	//----------------------------------------------------------------------------------------------------
	// Decode                                                                 
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $data
	// @param bool   $array
	// @param int    $length
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function decode(String $data, Bool $array = false, Int $length = 512);
	
	//----------------------------------------------------------------------------------------------------
	// Decode Object                                                                 
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $data
	// @param int    $length
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function decodeObject(String $data, Int $length = 512);
	
	//----------------------------------------------------------------------------------------------------
	// Decode Array                                                                 
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $data
	// @param int    $length
	//																						  
	//----------------------------------------------------------------------------------------------------	
	public function decodeArray(String $data, Int $length = 512) : Array;
	
	//----------------------------------------------------------------------------------------------------
	// Error                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param void
	//																						  
	//----------------------------------------------------------------------------------------------------	
	public function error() : String;
	
	//----------------------------------------------------------------------------------------------------
	// Errval                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param void
	//																						  
	//----------------------------------------------------------------------------------------------------	
	public function errval() : String;
	
	//----------------------------------------------------------------------------------------------------
	// Errno                                                               
	//----------------------------------------------------------------------------------------------------
	//
	// @param void
	//																						  
	//----------------------------------------------------------------------------------------------------	
	public function errno() : Int;
}