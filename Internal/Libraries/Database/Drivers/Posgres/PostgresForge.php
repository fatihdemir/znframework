<?php
namespace ZN\Database\Drivers;

use ZN\Database\DriverForge;

class PostgresForge extends DriverForge
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
	// Modify Column
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $table
	// @param mixed  $column
	//
	//----------------------------------------------------------------------------------------------------
	public function modifyColumn($table, $column)
	{
		return 'ALTER TABLE '.$table.' ALTER COLUMN '.rtrim($column, ',').';';
	}

	//----------------------------------------------------------------------------------------------------
	// Rename Column
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $table
	// @param mixed  $column
	//
	//----------------------------------------------------------------------------------------------------
	public function renameColumn($table, $column)
	{ 
		return 'ALTER TABLE '.$table.' RENAME COLUMN '.key($column).' TO '.current($column).';';
	}
}