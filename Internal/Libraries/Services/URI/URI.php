<?php
namespace ZN\Services;

class InternalURI extends \CallController implements URIInterface
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
	// @param scalar $get
	// @param scalar $index
	// @param bool   $while
	//
	//----------------------------------------------------------------------------------------------------
	public function get($get = 1, $index = 1, Bool $while = false)
	{
		// Parametre kontrolleri yapılıyor. ---------------------------------------------------
		if( ! isChar($index) ) 
		{
			$index = 1;		
		}
		
		if( ! is_scalar($while) ) 
		{
			$while = false;
		}
		// ------------------------------------------------------------------------------------
		
		$segArr = $this->segmentArray();
		$segVal = '';
		
		if( is_numeric($get) )
		{
			return $this->getByIndex($get, $index);
		}
		
		if( in_array($get, $segArr) )
		{ 
			$segVal = array_search($get, $segArr); 
			
			// 3. parametrenin boş olmama durumu ve
			// 2. parametrenin sayısal olmama durumu
			if( ! empty($while) && ! is_numeric($index) )
			{
				return $this->getByName($get, $index);
			}
			
			// 2. parametrenin all olma durumu
			// 1. parametreden itibaren bütün 
			// segmentleri verir.
			if( $index === 'all' )
			{
				return $this->getNameAll($get);
			}
			
			// 3. parametrenin boş olmaması durumu
			if( ! empty($while) )
			{
				$return = '';
				
				$countSegArr = count($segArr) - 1;
				
				if( $index > $countSegArr )
				{
					$index = $countSegArr;
				}
				
				if( $index < 0 )
				{
					$index = $countSegArr + $index + 1;	
				}
				
				for( $i = 1; $i <= $index; $i++ )
				{
					$return .= $segArr[$segVal + $i]."/";
				}
				
				$return = substr($return,0,-1);
				
				return $return;
			}
			
			// 2. parametrenin count olma durumu
			// 1. parametrede belirtilen segmentten
			// itibaren kalan bölüm sayısını verir.
			if( $index === "count" )
			{
				return $this->getNameCount($get);
			}
			
			if( isset($segArr[$segVal + $index]) ) 
			{
				return $segArr[$segVal + $index]; 
			}		
			else 
			{
				return false;
			}	
		} 
		else
		{ 
			return false; 
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// getNameCount
	//----------------------------------------------------------------------------------------------------
	// 
	// Belirtilen segmentten sonra kaç adet segmentin olduğunu verir.
	//
	// @param string $get
	//
	//----------------------------------------------------------------------------------------------------
	public function getNameCount(String $get)
	{
		$segArr = $this->segmentArray();
		
		if( in_array($get, $segArr) )
		{ 
			$segVal = array_search($get, $segArr); 
		
			return count($segArr) - 1 - $segVal;
		}
		
		return false;
	}
	
	//----------------------------------------------------------------------------------------------------
	// getNameAll
	//----------------------------------------------------------------------------------------------------
	// 
	// Belirtilen segmentten sonra tüm segmentleri verir.
	//
	// @param string $get
	//
	//----------------------------------------------------------------------------------------------------
	public function getNameAll(String $get)
	{
		$segArr = $this->segmentArray();
		
		if( in_array($get, $segArr) )
		{ 
			$return = '';
			
			$segVal = array_search($get, $segArr); 
			
			for( $i = 1; $i < count($segArr) - $segVal; $i++ )
			{
				$return .= $segArr[$segVal + $i]."/";
			}
			
			$return = substr($return, 0, -1);
			
			return $return;
		}
		
		return false;
	}
	
	//----------------------------------------------------------------------------------------------------
	// getByIndex
	//----------------------------------------------------------------------------------------------------
	// 
	// Belirtilen segment indekslerine göre aralık almak için kullanılır.
	//
	// @param numeric $get
	// @param numeric $get
	//
	//----------------------------------------------------------------------------------------------------
	public function getByIndex(Int $get = 1, Int $index = 1)
	{
		$segArr = $this->segmentArray();
		
		if( $get == 0 )
		{
			$get = 1;	
		}
		
		$get -= 1;
		
		$uri = '';
		
		$countSegArr = count($segArr);
		
		if( $index < 0 )
		{
			$index = $countSegArr + $index + 1;	
		}
		
		if( $index > 0 )
		{
			$index = $get + $index;	
		}
		
		if( abs($index) > $countSegArr )
		{
			$index = $countSegArr;
		}
		
		for( $i = $get; $i < $index; $i++ )
		{
			$uri .= $segArr[$i].'/';
		}
		
		return rtrim($uri, '/');
	}
	
	//----------------------------------------------------------------------------------------------------
	// Get Name
	//----------------------------------------------------------------------------------------------------
	// 
	// Belirtilen segment isimlerine göre aralık almak için kullanılır.
	//
	// @param string $get
	// @param string $get
	//
	//----------------------------------------------------------------------------------------------------
	public function getByName(String $get, $index = NULL)
	{
		$segArr   = $this->segmentArray();	
			
		$getVal   = array_search($get, $segArr);
		
		if( $index === 'all' )
		{
			$indexVal = count($segArr) - 1;	
		}
		else
		{
			$indexVal = array_search($index, $segArr);
		}
		
		$return   = '';

		for( $i = $getVal; $i <= $indexVal; $i++ )
		{
			$return .= $segArr[$i]."/";
		}
		
		return substr($return, 0, -1);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Segment Array
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function segmentArray()
	{
		$segmentEx = explode("/", $this->_cleanPath());
		return $segmentEx;	
	}
	
	//----------------------------------------------------------------------------------------------------
	// Total Segments
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function totalSegments()
	{
		$segmentEx     = explode("/", $this->_cleanPath());	
		$segmentEx     = array_diff($segmentEx, ["", " "]);
		$totalSegments = count($segmentEx);
		
		return $totalSegments;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Segment Count
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function segmentCount()
	{
		return $this->totalSegments();
	}
	
	//----------------------------------------------------------------------------------------------------
	// Segment
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $seg
	//
	//----------------------------------------------------------------------------------------------------
	public function segment(Int $seg = 1)
	{
		$segments = $this->segmentArray();
		
		if( $seg > 0 )
		{
			$seg -= 1;	
		}
		elseif( $seg < 0 )
		{
			$count = count($segments);
			$seg   = $count + $seg;
		}
		
		if( ! empty($segments[$seg]) )
		{
			return $segments[$seg];
		}
	
		return false;
	}	
	
	//----------------------------------------------------------------------------------------------------
	// Current Segment
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function currentSegment()
	{	
		return $this->current(false);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Current
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  bool   $isPath: true
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function current(Bool $isPath = true)
	{
		return currentPath($isPath);
	}

	//----------------------------------------------------------------------------------------------------
	// Base
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  bool   $isPath: true
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function base(String $uri = '', Int $index = 0)
	{
		return basePath($uri, $index);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Prev
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  bool   $isPath: true
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function prev(Bool $isPath = true)
	{
		return prevPath($isPath);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected Clean Path
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//----------------------------------------------------------------------------------------------------
	protected function _cleanPath()
	{
		$pathInfo = \Security::htmlEncode(internalRequestURI());
	
		return $pathInfo;
	}
}