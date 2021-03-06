<?php
namespace ZN\ViewObjects;

interface CDNInterface
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
	// Get
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $configName
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function get(String $configName, String $name) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Image
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function image(String $name) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Style
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function style(String $name) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Script
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function script(String $name) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Font
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function font(String $name) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Other
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function file(String $name) : String;
}