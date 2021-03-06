<?php
namespace ZN\Helpers;

interface FormatInterface
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
	// Byte
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int  $bytes
	// @param int  $precision
	// @param bool $unit
	//
	//----------------------------------------------------------------------------------------------------
	public function byte($bytes, $precision, $unit);

	//----------------------------------------------------------------------------------------------------
	// Money
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int    $money
	// @param string $type
	//
	//----------------------------------------------------------------------------------------------------
	public function money($money, String $type);

	//----------------------------------------------------------------------------------------------------
	// Time
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int    $count
	// @param string $type
	// @param string $output
	//
	//----------------------------------------------------------------------------------------------------
	public function time($count, String $type, String $output);	
}