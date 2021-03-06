<?php
namespace ZN\IndividualStructures;

interface SupportInterface
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
	// Func
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string  $name
	// @param  string  $value
	//
	//----------------------------------------------------------------------------------------------------
	public function func(String $name, String $value);

	//----------------------------------------------------------------------------------------------------
	// Extension
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string  $name
	// @param  string  $value
	//
	//----------------------------------------------------------------------------------------------------
	public function extension(String $name, String $value);

	//----------------------------------------------------------------------------------------------------
	// Library
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string  $name
	// @param  string  $value
	//
	//----------------------------------------------------------------------------------------------------
	public function library(String $name, String $value);
}