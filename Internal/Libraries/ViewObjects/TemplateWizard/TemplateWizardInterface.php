<?php
namespace ZN\ViewObjects;

interface TemplateWizardInterface
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
	// Data
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $string
	// @param array  $data
	//
	//----------------------------------------------------------------------------------------------------
	public static function data(String $string, Array $data = []) : String;
}