<?php
trait DBStringFunctionsTrait
{
	/******************************************************************************************
	* ASCII                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function ascii()
	{
		return $this->_math('ASCII', func_get_args());
	}
	
	/******************************************************************************************
	* BIN                                                                                     *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function bin()
	{
		return $this->_math('BIN', func_get_args());
	}
	
	/******************************************************************************************
	* BIT_LENGTH                                                                              *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function bitLength()
	{
		return $this->_math('BIT_LENGTH', func_get_args());
	}
	
	/******************************************************************************************
	* CHAR_LENGTH                                                                             *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function charLength()
	{
		return $this->_math('CHAR_LENGTH', func_get_args());
	}
	
	/******************************************************************************************
	* ELT                                                                                     *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function elt()
	{
		return $this->_math('ELT', func_get_args());
	}
	
	/******************************************************************************************
	* EXPORT SET                                                                              *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function exportSet()
	{
		return $this->_math('EXPORT_SET', func_get_args());
	}
	
	/******************************************************************************************
	* FIELD                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function field()
	{
		return $this->_math('FIELD', func_get_args());
	}
	
	/******************************************************************************************
	* FIND_IN_SET                                                                             *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function findInSet()
	{
		return $this->_math('FIND_IN_SET', func_get_args());
	}
	
	/******************************************************************************************
	* FORMAT                                                                                  *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function format()
	{
		return $this->_math('FORMAT', func_get_args());
	}
	
	/******************************************************************************************
	* TO_BASE64                                                                               *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function toBase64()
	{
		return $this->_math('TO_BASE64', func_get_args());
	}
	
	/******************************************************************************************
	* FROM_BASE64                                                                             *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function fromBase64()
	{
		return $this->_math('FROM_BASE64', func_get_args());
	}
	
	/******************************************************************************************
	* HEX                                                                                     *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function hex()
	{
		return $this->_math('HEX', func_get_args());
	}
	
	/******************************************************************************************
	* UNHEX                                                                                     *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function unhex()
	{
		return $this->_math('UNHEX', func_get_args());
	}
	
	/******************************************************************************************
	* CONV                                                                                    *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function conv()
	{
		return $this->_math('CONV', func_get_args());
	}
	
	/******************************************************************************************
	* INSTR                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function instr()
	{
		return $this->_math('INSTR', func_get_args());
	}
	
	/******************************************************************************************
	* LOWER                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function lower()
	{
		return $this->_math('LOWER', func_get_args());
	}
	
	/******************************************************************************************
	* UPPER                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function upper()
	{
		return $this->_math('UPPER', func_get_args());
	}
	
	/******************************************************************************************
	* LEFT                                                                                    *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function left()
	{
		return $this->_math('LEFT', func_get_args());
	}
	
	/******************************************************************************************
	* LENGTH                                                                                  *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function length()
	{
		return $this->_math('LENGTH', func_get_args());
	}
	
	/******************************************************************************************
	* LOAD FILE                                                                               *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function loadFile()
	{
		return $this->_math('LOAD_FILE', func_get_args());
	}
	
	/******************************************************************************************
	* LOCATE                                                                                  *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function locate()
	{
		return $this->_math('LOCATE', func_get_args());
	}
	
	/******************************************************************************************
	* LPAD                                                                                    *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function lpad()
	{
		return $this->_math('LPAD', func_get_args());
	}
	
	/******************************************************************************************
	* LTRIM                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function ltrim()
	{
		return $this->_math('LTRIM', func_get_args());
	}
	
	/******************************************************************************************
	* MAKE_SET                                                                                *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function makeSet()
	{
		return $this->_math('MAKE_SET', func_get_args());
	}
	
	/******************************************************************************************
	* MID                                                                                     *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function mid()
	{
		return $this->_math('MID', func_get_args());
	}
	
	/******************************************************************************************
	* SUBSTRING                                                                               *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function substring()
	{
		return $this->_math('SUBSTRING', func_get_args());
	}
	
	/******************************************************************************************
	* OCT                                                                                     *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function oct()
	{
		return $this->_math('OCT', func_get_args());
	}
	
	/******************************************************************************************
	* OCTET_LENGTH                                                                            *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function octetLength()
	{
		return $this->_math('OCTET_LENGTH', func_get_args());
	}
	
	/******************************************************************************************
	* ORD                                                                                     *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function ord()
	{
		return $this->_math('ORD', func_get_args());
	}
	
	/******************************************************************************************
	* POSITION                                                                                *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function position()
	{
		return $this->_math('POSITION', func_get_args());
	}
	
	/******************************************************************************************
	* QUOTE                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function quote()
	{
		return $this->_math('QUOTE', func_get_args());
	}
	
	/******************************************************************************************
	* REPEAT                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function repeat()
	{
		return $this->_math('REPEAT', func_get_args());
	}
	
	/******************************************************************************************
	* REVERSE                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function reverse()
	{
		return $this->_math('REVERSE', func_get_args());
	}
	
	/******************************************************************************************
	* RIGHT                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function right()
	{
		return $this->_math('RIGHT', func_get_args());
	}
	
	/******************************************************************************************
	* RPAD                                                                                    *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function rpad()
	{
		return $this->_math('RPAD', func_get_args());
	}
	
	/******************************************************************************************
	* RTRIM                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function rtrim()
	{
		return $this->_math('RTRIM', func_get_args());
	}
	
	/******************************************************************************************
	* SOUNDEX                                                                                 *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function soundex()
	{
		return $this->_math('SOUNDEX', func_get_args());
	}
	
	/******************************************************************************************
	* SPACE                                                                                 *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function space()
	{
		return $this->_math('SPACE', func_get_args());
	}
	
	/******************************************************************************************
	* SUBSTR                                                                                 *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function substr()
	{
		return $this->_math('SUBSTR', func_get_args());
	}
	
	/******************************************************************************************
	* SUBSTRING_INDEX                                                                         *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function substringIndex()
	{
		return $this->_math('SUBSTRING_INDEX', func_get_args());
	}
	
	/******************************************************************************************
	* TRIM                                                                                    *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function trim()
	{
		return $this->_math('TRIM', func_get_args());
	}
	
	/******************************************************************************************
	* UCASE                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function ucase()
	{
		return $this->_math('UCASE', func_get_args());
	}
	
	/******************************************************************************************
	* LCASE                                                                                   *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function lcase()
	{
		return $this->_math('LCASE', func_get_args());
	}
	
	/******************************************************************************************
	* WEIGHT_STRING                                                                           *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function weightString()
	{
		return $this->_math('WEIGHT_STRING', func_get_args());
	}

	/******************************************************************************************
	* STRCMP                                                                                  *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function strcmp()
	{
		return $this->_math('STRCMP', func_get_args());
	}
}