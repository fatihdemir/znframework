<?php
namespace ZN\Database;

class InternalDBForge extends DatabaseCommon implements DBForgeInterface
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
	// Extras
	//----------------------------------------------------------------------------------------------------
	// 
	// @var mixed
	//
	//----------------------------------------------------------------------------------------------------
	protected $extras;

	//----------------------------------------------------------------------------------------------------
	// Forge
	//----------------------------------------------------------------------------------------------------
	// 
	// @var object
	//
	//----------------------------------------------------------------------------------------------------
	protected $forge;

	//----------------------------------------------------------------------------------------------------
	// Construct
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();

		$this->forge = $this->_drvlib('Forge');
	}

	//----------------------------------------------------------------------------------------------------
	// Extras
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $extras
	//
	//----------------------------------------------------------------------------------------------------
	public function extras($extras) : InternalDBForge
	{
		$this->extras = $extras;

		return $this;
	}

	//----------------------------------------------------------------------------------------------------
	// Create Database
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $dbname
	// @param mixed  $extras
	//
	//----------------------------------------------------------------------------------------------------
	public function createDatabase(String $dbname, $extras = NULL) : Bool
	{
		$query = $this->forge->createDatabase($dbname, $this->_p($extras, 'extras'));	
		
		return $this->_runExecQuery($query);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Drop Database
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $dbname
	//
	//----------------------------------------------------------------------------------------------------
	public function dropDatabase(String $dbname) : Bool
	{
		$query = $this->forge->dropDatabase($dbname);	
		
		return $this->_runExecQuery($query);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Create Table
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $table
	// @param mixed $colums
	// @param mixed $extras
	//
	//----------------------------------------------------------------------------------------------------
	public function createTable(String $table = NULL, Array $colums, $extras = NULL) : Bool
	{		
		$query = $this->forge->createTable($this->_p($table), $colums, $extras);
	
		return $this->_runExecQuery($query);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Drop Table
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $table
	//
	//----------------------------------------------------------------------------------------------------
	public function dropTable(String $table = NULL) : Bool
	{	
		$query = $this->forge->dropTable($this->_p($table));
		
		return $this->_runExecQuery($query);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Alter Table
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $table
	// @param mixed $condition
	//
	//----------------------------------------------------------------------------------------------------
	public function alterTable(String $table = NULL, Array $condition = NULL) : Bool
	{
		$table = $this->_p($table);	
		
		if( key($condition) === 'renameTable' ) 			
		{
			return $this->renameTable($table, $condition['renameTable']);
		}
		elseif( key($condition) === 'addColumn' ) 		
		{
			return $this->addColumn($table, $condition['addColumn']);
		}
		elseif( key($condition) === 'dropColumn' ) 		
		{
			return $this->dropColumn($table, $condition['dropColumn']);	
		}
		elseif( key($condition) === 'modifyColumn' ) 	
		{
			return $this->modifyColumn($table, $condition['modifyColumn']);
		}
		elseif( key($condition) === 'renameColumn' ) 	
		{
			return $this->renameColumn($table, $condition['renameColumn']);
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Rename Table
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	// @param string $newName
	//
	//----------------------------------------------------------------------------------------------------
	public function renameTable(String $name, String $newName) : Bool
	{
		$query = $this->forge->renameTable($this->_p($name, 'prefix'), $this->_p($newName, 'prefix'));
		
		return $this->_runExecQuery($query);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Truncate
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $table
	//
	//----------------------------------------------------------------------------------------------------
	public function truncate(String $table = NULL) : Bool
	{
		$query = $this->forge->truncate($this->_p($table));
		
		return $this->_runExecQuery($query);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Add Column
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $table
	// @param array  $condition
	//
	//----------------------------------------------------------------------------------------------------
	public function addColumn(String $table = NULL, Array $columns = NULL) : Bool
	{	
		$query = $this->forge->addColumn($this->_p($table), $this->_p($columns, 'column'));
		
		return $this->_runExecQuery($query);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Drop Column
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $table
	// @param mixed  $column
	//
	//----------------------------------------------------------------------------------------------------
	public function dropColumn(String $table = NULL, $columns = NULL) : Bool
	{
		if( ! is_array($columns) )
		{
			$query = $this->forge->dropColumn($this->_p($table), $columns);
			
			return $this->_runExecQuery($query);
		}
		else
		{
			$columns = $this->_p($columns, 'column');

			foreach( $columns as $col )
			{
				$query = $this->forge->dropColumn($this->_p($table), $col);
				
				$this->_runExecQuery($query);
			}
			
			return true;
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Modify Column
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $table
	// @param mixed  $columns
	//
	//----------------------------------------------------------------------------------------------------
	public function modifyColumn(String $table = NULL, Array $columns = NULL) : Bool
	{
		$query = $this->forge->modifyColumn($this->_p($table), $this->_p($columns, 'column'));
		
		return $this->_runExecQuery($query);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Rename Column
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $table
	// @param mixed  $columns
	//
	//----------------------------------------------------------------------------------------------------
	public function renameColumn(String $table = NULL , Array $columns = NULL) : Bool
	{	
		$query = $this->forge->renameColumn($this->_p($table), $this->_p($columns, 'column'));
		
		return $this->_runExecQuery($query);
	}
}