<?php	
class __USE_STATIC_ACCESS__Vars
{
	/***********************************************************************************/
	/* CLASSES LIBRARY					                   	                           */
	/***********************************************************************************/
	/* Yazar: Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	/* Site: www.zntr.net
	/* Lisans: The MIT License
	/* Telif Hakkı: Copyright (c) 2012-2015, zntr.net
	/*
	/* Sınıf Adı: Vars
	/* Versiyon: 2.0 Eylül Güncellemesi
	/* Tanımlanma: Karışık
	/* Dahil Edilme: Gerektirmez
	/* Erişim: Vars::, $this->Vars, zn::$use->Vars, uselib('Vars')
	/* Not: Büyük-küçük harf duyarlılığı yoktur.
	/***********************************************************************************/
	
	/******************************************************************************************
	* CALL                                                                                    *
	*******************************************************************************************
	| Genel Kullanım: Geçersiz fonksiyon girildiğinde çağrılması için.						  |
	|          																				  |
	******************************************************************************************/
	public function __call($method = '', $param = '')
	{	
		die(getErrorMessage('Error', 'undefinedFunction', "Vars::$method()"));	
	}	
	
	/******************************************************************************************
	* BOOLEAN VALUE                                                                           *
	*******************************************************************************************
	| Genel Kullanım: Bir değişkenin boolean değer Alın.	 						          |
	
	  @param mixed $var
	  @return bool
	|          																				  |
	******************************************************************************************/
	public function bool($var = '')
	{
		return boolval($var);		
	}	
	
	/******************************************************************************************
	* BOOLEAN VALUE                                                                           *
	*******************************************************************************************
	| Genel Kullanım: Bir değişkenin boolean değer Alın.	 						          |
	
	  @param mixed $var
	  @return bool
	|          																				  |
	******************************************************************************************/
	public function boolean($var = '')
	{
		return boolval($var);		
	}
	
	/******************************************************************************************
	* FLOAT VALUE                                                                             *
	*******************************************************************************************
	| Genel Kullanım: Bir değişkenin gerçek sayı değerini döndürür.	 				          |
	
	  @param  mixed $var
	  @return float
	|          																				  |
	******************************************************************************************/
	public function float($var = '')
	{
		return floatval($var);		
	}
	
	/******************************************************************************************
	* DOUBLE VALUE                                                                            *
	*******************************************************************************************
	| Genel Kullanım: Bir değişkenin gerçek sayı değerini döndürür.	 				          |
	
	  @param  mixed $var
	  @return float
	|          																				  |
	******************************************************************************************/
	public function double($var = '')
	{
		return floatval($var);		
	}
	
	/******************************************************************************************
	* INTEGER VALUE                                                                           *
	*******************************************************************************************
	| Genel Kullanım: Bir değişkenin tam sayı değerini döndürür.	 				          |
	
	  @param  mixed $var
	  @return int
	|          																				  |
	******************************************************************************************/
	public function int($var = '')
	{
		return intval($var);		
	}
	
	/******************************************************************************************
	* INTEGER VALUE                                                                           *
	*******************************************************************************************
	| Genel Kullanım: Bir değişkenin tam sayı değerini döndürür.	 				          |
	
	  @param  mixed $var
	  @return int
	|          																				  |
	******************************************************************************************/
	public function integer($var = '')
	{
		return intval($var);		
	}
	
	/******************************************************************************************
	* STRING VALUE                                                                           *
	*******************************************************************************************
	| Genel Kullanım: Bir değişkenin dizgesel değerini döndürür.	 				          |
	
	  @param  mixed $var
	  @return string
	|          																				  |
	******************************************************************************************/
	public function string($var = '')
	{
		return strval($var);		
	}
	
	/******************************************************************************************
	* TYPE              		                                                              *
	*******************************************************************************************
	| Genel Kullanım: Değişkenin türünü döndürür.									          |
	
	  @param  mixed $var
	  @return string
	|          																				  |
	******************************************************************************************/
	public function type($var = '')
	{
		return gettype($var);		
	}
	
	/******************************************************************************************
	* RESOURCE TYPE                                                                           *
	*******************************************************************************************
	| Genel Kullanım: Özkaynak türünü döndürür.	 									          |
	
	  @param  resource $resource
	  @return string
	|          																				  |
	******************************************************************************************/
	public function resourceType($resource = '')
	{
		if( ! is_resource($resource) )
		{
			return Error::set(lang('Error', 'resourceParameter', '1.(resource)'));	
		}
		
		return get_resource_type($resource);		
	}
	
	/******************************************************************************************
	* SERIAL	                                                                              *
	*******************************************************************************************
	| Genel Kullanım: Bir değerin saklanabilir bir gösterimini üretir.	        			  |
	  
	  @param  mixed $var
	  @return bool
	|          																				  |
	******************************************************************************************/
	public function serial($var = '')
	{
		return serialize($var);		
	}
	
	/******************************************************************************************
	* UNSERIAL	                                                                              *
	*******************************************************************************************
	| Genel Kullanım: Saklanan veriyi orjinal haline çevirir.			        			  |
	  
	  @param  mixed $var
	  @return bool
	|          																				  |
	******************************************************************************************/
	public function unserial($var = '')
	{
		return unserialize($var);		
	}
	
	/******************************************************************************************
	* REMOVE 	                                                                              *
	*******************************************************************************************
	| Genel Kullanım: Belirtilen değişkeni tanımsız yapar.				        			  |
	  
	  @param  mixed $var
	  @return void
	|          																				  |
	******************************************************************************************/
	public function remove($var = '')
	{
		unset($var);		
	}
	
	/******************************************************************************************
	* DELETE 	                                                                              *
	*******************************************************************************************
	| Genel Kullanım: Belirtilen değişkeni tanımsız yapar.				        			  |
	  
	  @param  mixed $var
	  @return void
	|          																				  |
	******************************************************************************************/
	public function delete($var = '')
	{
		unset($var);		
	}
	
	/******************************************************************************************
	* TO TYPE	                                                                              *
	*******************************************************************************************
	| Genel Kullanım: Bir değişkenin türünü belirler.					        			  |
	  
	  @param  mixed  $var
	  @param  string $type
	  @return bool
	|          																				  |
	******************************************************************************************/
	public function toType($var = '', $type = 'integer')
	{
		settype($var, $type);
		
		return $var;		
	}
}