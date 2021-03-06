<?php
namespace ZN\IndividualStructures;

interface BufferInterface
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
	// Take File Buffer
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $file
	// @return content
	//
	//----------------------------------------------------------------------------------------------------
	public function file(String $file) : String; 	
	
	//----------------------------------------------------------------------------------------------------
	// Take Func Buffer
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string/callable $func
	// @param  array           $params
	// @return callable
	//
	//----------------------------------------------------------------------------------------------------
	public function func($func, Array $params = []);

	//----------------------------------------------------------------------------------------------------
	// Take Func Buffer
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string/callable $func
	// @param  array           $params
	// @return callable
	//
	//----------------------------------------------------------------------------------------------------
	public function callback($func, Array $params = []);
	
	//----------------------------------------------------------------------------------------------------
	// Insert
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string 				  $name
	// @param  callable/object/string $data
	// @param  array				  $params
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function insert(String $name, $data, Array $params = []) : Bool;
	
	//----------------------------------------------------------------------------------------------------
	// Select
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $name
	// @return callable/content
	//
	//----------------------------------------------------------------------------------------------------
	public function select(String $name);
	
	//----------------------------------------------------------------------------------------------------
	// Delete
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $name
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function delete($name) : Bool;
}