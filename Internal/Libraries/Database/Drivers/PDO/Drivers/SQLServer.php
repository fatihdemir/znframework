<?php
namespace ZN\Database\Drivers\PDO\Drivers;

use ZN\Database\Drivers\PDO\DriverInterface;
use ZN\Database\Drivers\PDO\DriverTrait;

class PDOSQLServerDriver implements DriverInterface
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	use DriverTrait;
	
	/******************************************************************************************
	* DNS       		                                                                      *
	*******************************************************************************************
	| Bu sürücü için dsn bilgisi oluşturuluyor.  							                  |
	******************************************************************************************/
	public function dsn()
	{
		$dsn  = 'sqlsrv:Server=';
		
		if( ! empty($this->config['server']) ) 
		{
			$dsn .= $this->config['server'];
		}
		elseif( ! empty($this->config['host']) ) 
		{
			$dsn .= $this->config['server'];
		}
		else 
		{
			$dsn .= '127.0.0.1';
		}
		
		$dsn .= ( ! empty($this->config['port']) ) 
				? ','.$this->config['port'] 
				: '';
		
		$dsn .= ( ! empty($this->config['database'])) 
				? ';Database='.$this->config['database'] 
				: '';
	
		return $dsn;
	}	
}