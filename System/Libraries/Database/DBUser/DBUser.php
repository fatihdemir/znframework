<?php
class __USE_STATIC_ACCESS__DBUser implements DBUserInterface
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
	// Common
	//----------------------------------------------------------------------------------------------------
	// 
	// $config
	// $prefix
	// $secure
	// $table
	// $tableName
	// $stringQuery
	// $unlimitedStringQuery
	//
	// run()
	// table()
	// stringQuery()
	// differentConnection()
	// secure()
	// error()
	// close()
	// version()
	//
	//----------------------------------------------------------------------------------------------------
	use DatabaseTrait;
	
	//----------------------------------------------------------------------------------------------------
	// $name
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $name 	  	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $host
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $host 	  	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $identified
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $identified 	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $required
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $required 	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $encode
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $encode 		  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $with
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $with 		  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $resource
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $resource 	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $passwordExpire
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $passwordExpire = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $type
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $type           = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $select
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $select         = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $grantOption
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $grantOption	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $resources
	//----------------------------------------------------------------------------------------------------
	// 
	// @var array
	//
	//----------------------------------------------------------------------------------------------------
	protected $resources      = array
	(
		'query' 			=> 'MAX_QUERIES_PER_HOUR',
	 	'update' 			=> 'MAX_UPDATES_PER_HOUR',
	 	'connection' 		=> 'MAX_CONNECTIONS_PER_HOUR',
	  	'user' 				=> 'MAX_USER_CONNECTIONS'
	);
	
	//----------------------------------------------------------------------------------------------------
	// name()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name: USER()
	//
	//----------------------------------------------------------------------------------------------------
	public function name($name = 'USER()')
	{
		$this->name = $this->_stringQuote($name);	
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// host()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host: localhost
	//
	//----------------------------------------------------------------------------------------------------
	public function host($host = 'localhost')
	{
		$this->host = '@'.$this->_stringQuote($host);	
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected _stringQuote()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $string: empty
	//
	//----------------------------------------------------------------------------------------------------
	protected function _stringQuote($string = '')
	{
		if( ! empty($string) )
		{
			if( ! preg_match('/^\w+\(.*?\)/xi', $string) )
			{
				$string = str_replace('@', '\'@\'', $string);	
				
				return ' \''.$string.'\' '; 
			}
			
			return ' '.$string.' ';	
		}
		
		return false;
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedBy()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedBy($authString = '')
	{
		$this->identified = ' IDENTIFIED BY '.$this->_stringQuote($authString);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedByPassword()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $hashString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedByPassword($hashString = '')
	{
		$this->identified = ' IDENTIFIED BY PASSWORD '.$this->_stringQuote($hashString);
		
		return $this;
	}

	//----------------------------------------------------------------------------------------------------
	// Protected _identifiedWithType()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authPlugin: empty
	// @param string $authString: empty
	// @param string $type      : BY
	//
	//----------------------------------------------------------------------------------------------------
	protected function _identifiedWithType($authPlugin = '', $authString = '', $type = 'BY')
	{
		$this->identified = ' IDENTIFIED WITH '.$authPlugin.' '.$this->_stringQuote($authString);
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedWith()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authPlugin: empty
	// @param string $type      : empty
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedWith($authPlugin = '', $type = '', $authString = '')
	{
		$this->_identifiedWithType($authPlugin, $authString, $type);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedWithBy()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authPlugin: empty
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedWithBy($authPlugin = '', $authString = '')
	{
		$this->_identifiedWithType($hashPlugin, $hashString, 'BY');
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedWithAs()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $hashPlugin: empty
	// @param string $hashString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedWithAs($hashPlugin = '', $hashString = '')
	{
		$this->_identifiedWithType($hashPlugin, $hashString, 'AS');
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// required()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function required()
	{
		$this->required = ' REQUIRE ';
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// with()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function with()
	{
		$this->with = ' WITH ';
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// encode()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type     : SSL, X509, CIPHER value, ISSUER value, SUBJECT value 
	// @param string $string   : empty value
	// @param string $condition: and, or
	//
	//----------------------------------------------------------------------------------------------------
	public function encode($type = 'SSL', $string = '', $condition = '')
	{
		$this->encode = ' '.$type.' '.$this->_stringQuote($string).' '.$condition.' ';
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// resource()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $resource: query       => MAX_QUERIES_PER_HOUR
	//						    update 		=> 'MAX_UPDATES_PER_HOUR
	//						    connection 	=> 'MAX_CONNECTIONS_PER_HOUR
	//						    user 		=> 'MAX_USER_CONNECTIONS
	// @param string $count   : 0
	//
	//----------------------------------------------------------------------------------------------------
	public function resource($resource = 'query', $count = 0)
	{
		if( isset($this->resources[$resource]) )
		{
			$resource  = $this->resources[$resource];
		}
		else
		{
			// Errors::set()	
		}
		
		$this->resource = ' '.$resource.' '.$count.' ';
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// passwordExpire()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: empty, DEFAULT, NEVER, INTERVAL
	// @param numeric $n   : 0
	//
	//----------------------------------------------------------------------------------------------------
	public function passwordExpire($type = '', $n = 0)
	{
		if( strtolower($type) === 'interval' )
		{
			$type = 'INTERVAL '.$n.' DAY ';
		}
		
		$this->passwordExpire = ' PASSWORD EXPIRE '.$type.' ';
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected _lock()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: lock, unlock
	//
	//----------------------------------------------------------------------------------------------------
	protected function _lock($type = 'lock')
	{
		$this->lock = ' ACCOUNT '.$type.' ';
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// lock()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: lock, unlock
	//
	//----------------------------------------------------------------------------------------------------
	public function lock($type = 'lock')
	{
		$this->lock = $this->_lock($type);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// unlock()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: unlock, lock
	//
	//----------------------------------------------------------------------------------------------------
	public function unlock($type = 'unlock')
	{
		$this->lock = $this->_lock($type);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// type()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: TABLE, FUNCTION, PROCEDURE
	//
	//----------------------------------------------------------------------------------------------------
	public function type($type = 'TABLE')
	{
		$this->type = $type;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// select()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $select: *.*
	//
	//----------------------------------------------------------------------------------------------------
	public function select($select = '*.*')
	{
		$this->select = $select;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// grantOption()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void()
	//
	//----------------------------------------------------------------------------------------------------
	public function grantOption()
	{
		$this->grantOption = ' GRANT OPTION ';
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected _process()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name       : USER()
	// @param string  $type       : ALTER USER
	// @param string  $grantType  : empty
	// @param string  $grantSelect: empty
	//
	//----------------------------------------------------------------------------------------------------
	protected function _process($name = 'USER()', $type = 'ALTER USER', $grantType = '', $grantSelect = '')
	{
		$grant     = '';
		
		if( $type === 'GRANT' || $type === 'REVOKE' )
		{	
			if( ! empty($this->type) )
			{
				$grantType = $this->type;			
			}
			
			if( ! empty($this->select) )
			{
				$grantSelect = $this->select;			
			}
			
			$toFrom = ( $type === 'REVOKE' ) ? ' FROM ' : ' TO ';
			
			$grant = ' '.$name.' ON '.$grantType.' '.$grantSelect.$toFrom;	
			
			$name = '';
					  
		}
		
		if( empty($this->name) )
		{
			$this->name($name);			
		}
		
		$query = $type.' '.
				 $grant.
		         $this->name.
				 $this->host. 
				 $this->identified.
				 $this->required.
				 $this->encode.
				 $this->with.
				 $this->grantOption.
				 $this->resource.
				 $this->passwordExpire;
	
		$this->_resetQuery();

		return $this->db->query($this->_querySecurity($query), $this->secure);
	}
	
	//----------------------------------------------------------------------------------------------------
	// alter()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name: USER()
	//
	//----------------------------------------------------------------------------------------------------
	public function alter($name = 'USER()')
	{
		return $this->_process($name, 'ALTER USER');
	}
	
	//----------------------------------------------------------------------------------------------------
	// create()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name: USER()
	//
	//----------------------------------------------------------------------------------------------------
	public function create($name = 'USER()')
	{
		return $this->_process($name, 'CREATE USER');
	}
	
	//----------------------------------------------------------------------------------------------------
	// drop()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name: USER()
	//
	//----------------------------------------------------------------------------------------------------
	public function drop($name = 'USER()')
	{
		return $this->_process($name, 'DROP USER');
	}
	
	//----------------------------------------------------------------------------------------------------
	// grant()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name  : ALL
	// @param string  $type  : *.*
	// @param string  $select: *.*
	//
	//----------------------------------------------------------------------------------------------------
	public function grant($name = 'ALL', $type = '', $select = '*.*')
	{
		return $this->_process($name, 'GRANT', $type, $select);
	}
	
	//----------------------------------------------------------------------------------------------------
	// revoke()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name  : ALL
	// @param string  $type  : *.*
	// @param string  $select: *.*
	//
	//----------------------------------------------------------------------------------------------------
	public function revoke($name = 'ALL', $type = '', $select = '*.*')
	{
		return $this->_process($name, 'REVOKE', $type, $select);
	}
	
	//----------------------------------------------------------------------------------------------------
	// rename()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $oldName: empty
	// @param string  $newName: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function rename($oldName = '', $newName = '')
	{
		$query = ' RENAME USER '.$this->_stringQuote($oldName).' TO '.$this->_stringQuote($newName);
		
		return $this->db->query($this->_querySecurity($query), $this->secure);
	}
	
	//----------------------------------------------------------------------------------------------------
	// setPassword()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $user: empty
	// @param string  $pass: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function setPassword($user = '', $pass = '')
	{
		if( empty($this->name) )
		{
			$this->name($user);	
		}
	
		if( ! empty($this->name) )
		{
			$this->name = 'FOR '.$this->name;
		}
		
		if( $pass === 'old:')
		{
			$pass = 'OLD_PASSWORD(\''.$pass.'\')';
		}
		elseif( $pass === 'new:' )
		{
			$pass = 'PASSWORD(\''.$pass.'\')';	
		}
		else
		{
			$pass = $this->_stringQuote($pass);	
		}
		
		$query = ' SET PASSWORD '.$this->name.' = '.$pass;
		
		$this->_resetQuery();
		
		return $this->db->query($this->_querySecurity($query), $this->secure);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected _resetQuery()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void()
	//
	//----------------------------------------------------------------------------------------------------
	protected function _resetQuery()
	{
		$this->name				= NULL;
		$this->host				= NULL;
		$this->identified 		= NULL;
		$this->required 		= NULL;
		$this->encode 			= NULL;
		$this->with 			= NULL;
		$this->resource 		= NULL;
		$this->passwordExpire 	= NULL;
		$this->type 			= NULL;	
		$this->select 			= NULL;	
		$this->grantOption	    = NULL;
	}
}