<?php 
namespace ZN\IndividualStructures;

class InternalCart extends \CallController implements CartInterface
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
	// Items
	//----------------------------------------------------------------------------------------------------
	// 
	// @var array
	//
	//----------------------------------------------------------------------------------------------------
	private $items = [];
	
	//----------------------------------------------------------------------------------------------------
	// Insert Item
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $product
	//
	//----------------------------------------------------------------------------------------------------
	public function insertItem(Array $product)
	{
		// Ürünün parametresinin boş olması durumunda rapor edilmesi istenmiştir.
		if( empty($product) )
		{
			return \Exceptions::throws('Error', 'emptyParameter', 'product');	
		}

		// Ürünün adet parametresinin belirtilmemesi durumunda 1 olarak kabul edilmesi istenmiştir.
		if( ! isset($product['quantity']) )
		{
			$product['quantity'] = 1;
		}
		
		// Sepettin daha önce oluşturulup oluşturulmadığına göre işlemler gerçekleştiriliyor.
		if( $sessionCart = \Session::select(md5('SystemCartData')) )
		{
			$this->items = $sessionCart;
		}
		
		array_push($this->items, $product);
		
		\Session::insert(md5('SystemCartData'), $this->items);
		
		$this->items = \Session::select(md5('SystemCartData'));
		
		return $this->items;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Select Items
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function selectItems()
	{
		if( $sessionCart = \Session::select(md5('SystemCartData')) )
		{
			return $this->items = $sessionCart;
		}
		else
		{
			return false;
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Select Item
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $code
	//
	//----------------------------------------------------------------------------------------------------
	public function selectItem($code)
	{
		$this->items = ( $sessionCart = \Session::select(md5('SystemCartData')) ) 
		               ? $sessionCart 
					   : '';
		
		if( empty($this->items) ) 
		{
			return false;
		}
		
		foreach( $this->items as $row )
		{
			if( ! is_array($code) )
			{
				$key = array_search($code, $row);
			}
			else
			{
				if( isset($row[key($code)]) && $row[key($code)] == current($code) )
				{
					$key = $row;
				}
			}
			
			if( ! empty($key) )
			{
				return (object)$row;
			}
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Total Items
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function totalItems()
	{
		if( $sessionCart = \Session::select(md5('SystemCartData')) )
		{
			$this->items = $sessionCart;
			$total_items = 0;
			
			if( ! empty($this->items) ) foreach( $this->items as $item )
			{
				$total_items += $item['quantity'];	
			}
			
			return $total_items;
		}
		else
		{
			return 0;	
		}
	}
	
	
	//----------------------------------------------------------------------------------------------------
	// Total Prices
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $code
	//
	//----------------------------------------------------------------------------------------------------
	public function totalPrices()
	{
		$this->items = ( $sessionSelect = \Session::select(md5('SystemCartData')) ) 
				       ? $sessionSelect
					   : '';
		
		if( empty($this->items) )
		{
			return 0;	
		}
		
		$total = '';
		
		foreach( $this->items as $values )
		{
			$quantity  = isset($values['quantity']) 
					   ? $values['quantity'] 
					   : 1;
			
			$price = isset($values['price'])
			       ? $values['price']
				   : 0;
			
			$total    += $price * $quantity;
		}
		
		return $total;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Update Item
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $code
	// @param array $data
	//
	//----------------------------------------------------------------------------------------------------
	public function updateItem($code, Array $data)
	{	
		$this->items = ( $sessionSelect = \Session::select(md5('SystemCartData')) ) 
				       ? $sessionSelect
					   : '';
		
		if( empty($this->items) ) 
		{
			return false;
		}
		
		$i=0;
		
		foreach( $this->items as $row )
		{
			if( is_array($code) ) 
			{
				if(isset($row[key($code)]) && $row[key($code)] == current($code))
				{
					$code = $row[key($code)];
				}
			}
			
			$key = array_search($code,$row);
			
			if( ! empty($key) )
			{
				array_splice($this->items, $i, 1);
				
				if( count($data) !== count($row) )
				{
					foreach( $data as $k => $v )
					{
						$row[$k] = $v;	
					}
					
					array_push($this->items, $row);
				}
				else
				{
					array_push($this->items, $data);
				}
			}
		
			$i++;
		}
		
		\Session::insert(md5('SystemCartData'), $this->items);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Delete Item
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $code
	//
	//----------------------------------------------------------------------------------------------------
	public function deleteItem($code)
	{		
		$this->items = ( $sessionSelect = \Session::select(md5('SystemCartData')) ) 
				       ? $sessionSelect
					   : '';
		
		if( empty($this->items) ) 
		{
			return false;
		}
		
		$i=0;
		
		foreach( $this->items as $row )
		{	
			if( is_array($code) ) 
			{
				if( isset($row[key($code)]) && $row[key($code)] == current($code) )
				{
					$code = $row[key($code)];
				}
			}
			
			$key = array_search($code, $row);
			
			if( ! empty($key) )
			{
				array_splice($this->items, $i--, 1);
			}
		
			$i++;
		}
		
		\Session::insert(md5('SystemCartData'), $this->items);		
	}
	
	//----------------------------------------------------------------------------------------------------
	// Delete Items
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function deleteItems()
	{
		\Session::delete(md5('SystemCartData'));
	}
	
	//----------------------------------------------------------------------------------------------------
	// Money Format
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int    $money
	// @param string $type
	//
	//----------------------------------------------------------------------------------------------------
	public function moneyFormat(Int $money, String $type = NULL)
	{
		$moneyFormat = '';
		$money  	 = round($money, 2);
		$str_ex 	 = explode(".",$money);
		$join   	 = [];
		$str    	 = strrev($str_ex[0]);
		
		for( $i = 0; $i < strlen($str); $i++ )
		{
			if( $i%3 === 0 )
			{
				array_unshift($join, '.');
			}
			
			array_unshift($join, $str[$i]);
		}
		
		for( $i = 0; $i < count($join); $i++ )
		{
			$moneyFormat .= $join[$i];	
		}
		
		$type = ! empty($type) 
		        ? ' '.$type 
				: '';
		
		$remaining = ( isset($str_ex[1]) ) 
					 ? $str_ex[1] 
					 : '00';
		
		if( strlen($remaining) === 1 ) 
		{
			$remaining .= '0';
		}
		
		$moneyFormat = substr($moneyFormat,0,-1).','.$remaining.$type;
		
		return $moneyFormat;
	}
}