<?php	
namespace ZN\VariableTypes;

class StaticFunctions implements FunctionsInterface
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
	// Call Undefined Method                                                                       
	//----------------------------------------------------------------------------------------------------
	//
	// __call()
	//																						  
	//----------------------------------------------------------------------------------------------------
	use \CallUndefinedMethodTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Error Control
	//----------------------------------------------------------------------------------------------------
	// 
	// $error
	// $success
	//
	// error()
	// success()
	//
	//----------------------------------------------------------------------------------------------------
	use \ErrorControlTrait;
	
	/******************************************************************************************
	* CALL ARRAY                                                                              *
	*******************************************************************************************
	| Genel Kullanım: call_user_func_array().									 	          |
	|          																				  |
	******************************************************************************************/
	public function callArray($callback = '', $params = [])
	{
		if( ! is_callable($callback) )
		{
			return \Errors::set('Error', 'callableParameter', '1.(callback)');	
		}
		
		if( ! is_array($params) )
		{
			return \Errors::set('Error', 'arrayParameter', '2.(params)');	
		}
		
		return call_user_func_array($callback, $params);		
	}	
	
	/******************************************************************************************
	* CALL		                                                                              *
	*******************************************************************************************
	| Genel Kullanım: call_user_func().									 	         		  |
	|          																				  |
	******************************************************************************************/
	public function call(...$args)
	{
		return call_user_func(...$args);
	}
	
	/******************************************************************************************
	* STATIC CALL ARRAY                                                                       *
	*******************************************************************************************
	| Genel Kullanım: forward_static_call_array().								 	          |
	|          																				  |
	******************************************************************************************/
	public function staticCallArray($callback = '', $params = [])
	{
		if( ! is_callable($callback) )
		{
			return \Errors::set('Error', 'callableParameter', '1.(callback)');	
		}
		
		if( ! is_array($params) )
		{
			return \Errors::set('Error', 'arrayParameter', '2.(params)');	
		}
		
		return forward_static_call_array($callback, $params);		
	}	
	
	/******************************************************************************************
	* STATIC CALL		                                                                      *
	*******************************************************************************************
	| Genel Kullanım: call_user_func().				  							 	          |
	|          																				  |
	******************************************************************************************/
	public function staticCall(...$args)
	{
		return forward_static_call(...$args);	
	}
	
	/******************************************************************************************
	* REGISTER SHUTDOWN                                                                       *
	*******************************************************************************************
	| Genel Kullanım: register_shutdown_function().		    		     		 	          |
	|          																				  |
	******************************************************************************************/
	public function shutdown(...$args)
	{
		return register_shutdown_function(...$args);	
	}
	
	/******************************************************************************************
	* TICK                                                                                    *
	*******************************************************************************************
	| Genel Kullanım:Her tikte çalıştırılacak işlevi tanımlar.		     	 	          |
	|          																				  |
	******************************************************************************************/
	public function tick(...$args)
	{
		return register_tick_function(...$args);
	}
	
	/******************************************************************************************
	* UNTICK                                                                                  *
	*******************************************************************************************
	| Genel Kullanım: unregister_tick_function().   		 			     	 	          |
	|          																				  |
	******************************************************************************************/
	public function untick(...$args)
	{
		return unregister_tick_function(...$args);
	}

	/******************************************************************************************
	* DEFINED    		                                                                      *
	*******************************************************************************************
	| Genel Kullanım: get_defined_functions().							 	   			      |
	|          																				  |
	******************************************************************************************/
	public function defined()
	{
		return get_defined_functions();
	}	
}