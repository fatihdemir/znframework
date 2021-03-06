<?php
class Model
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
	// @param string $class
	//
	//----------------------------------------------------------------------------------------------------	
	public function __get($class)
	{
		if( ! isset($this->$class) )
		{
			return $this->$class = uselib($class);	
		}
	}
}