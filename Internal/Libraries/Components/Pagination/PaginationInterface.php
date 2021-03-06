<?php
namespace ZN\Components;

interface PaginationInterface
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
	// Settings                                                                               
	//----------------------------------------------------------------------------------------------------
	//
	// @param array $config
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function settings(Array $config = []) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Create                                                                               
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed $start
	// @param array $settings
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function create($start, Array $settings = []) : String;
}