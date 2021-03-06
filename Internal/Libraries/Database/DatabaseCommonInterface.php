<?php
namespace ZN\Database;

interface DatabaseCommonInterface
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
	// Table
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $table
	//
	//----------------------------------------------------------------------------------------------------
	public function table(String $table) : DatabaseCommon;
	
	//----------------------------------------------------------------------------------------------------
	// Column
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $col
	// @param mixed  $val
	//
	//----------------------------------------------------------------------------------------------------
	public function column(String $col, $val) : DatabaseCommon;
	
	//----------------------------------------------------------------------------------------------------
	// String Query
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function stringQuery() : String;
	
	//----------------------------------------------------------------------------------------------------
	// Different Connection
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $connectName
	//
	//----------------------------------------------------------------------------------------------------
	public function differentConnection($connectName) : DatabaseCommon;
	
	//----------------------------------------------------------------------------------------------------
	// Secure
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $data
	//
	//----------------------------------------------------------------------------------------------------
	public function secure(Array $data) : DatabaseCommon;
	
	//----------------------------------------------------------------------------------------------------
	// Func
	//----------------------------------------------------------------------------------------------------
	// 
	// @param variadic $args
	//
	//----------------------------------------------------------------------------------------------------
	public function func(...$args);
	
	//----------------------------------------------------------------------------------------------------
	// Error
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function error();
	
	//----------------------------------------------------------------------------------------------------
	// Close
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function close();
	
	//----------------------------------------------------------------------------------------------------
	// Version
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function version();
}