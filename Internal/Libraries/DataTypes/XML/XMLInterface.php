<?php
namespace ZN\DataTypes;

interface XMLInterface
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
	// Version		                                                                          
	//----------------------------------------------------------------------------------------------------
	//
	// Genel Kullanım: Bir XML belgesinin versiyonunu oluşturur.				 				                                     
	//  
	// @param  string	$version -> 1.0
	// @return this
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function version(String $version = '1.0');
	
	//----------------------------------------------------------------------------------------------------
	// Encoding		                                                                          
	//----------------------------------------------------------------------------------------------------
	//
	// Genel Kullanım: Bir XML belgesinin kodlama türünü belirtir.			 				                                       
	//  
	// @param  string	$encoding -> UTF-8
	// @return this
	//        																				  
	//----------------------------------------------------------------------------------------------------
	public function encoding(String $encoding = 'UTF-8');

	
	//----------------------------------------------------------------------------------------------------
	// Build       	                                                                          
	//----------------------------------------------------------------------------------------------------
	//
	// @param array  $data
	// @param string $version
	// @param string $encoding
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function build(Array $data, String $version = NULL, String $encoding = NULL);
	
	//----------------------------------------------------------------------------------------------------
	// Save      	                                                                         
	//----------------------------------------------------------------------------------------------------						 				                                      
	// 
	// @param string $file
	// @param string $data 
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function save(String $file, String $data);
	
	//----------------------------------------------------------------------------------------------------
	// Load               	                                                                  
	//----------------------------------------------------------------------------------------------------				 				                                       
	//  
	// @param  string 	$file
	// @return string
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function load(String $file);
	
	//----------------------------------------------------------------------------------------------------
	// Parse Array		                                                                          
	//----------------------------------------------------------------------------------------------------
	//
	// Genel Kullanım: Bir XML verisini diziye çevirir.							 			                                      
	// 
	// @param  string 	$data
	// @return array
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function parseArray(String $data);
	
	//----------------------------------------------------------------------------------------------------
	// Parse Json		                                                                          
	//----------------------------------------------------------------------------------------------------
	//
	// Genel Kullanım: Bir XML verisini json'a çevirir.							 			                                      
	//  
	// @param  string 	$data
	// @return array
	//          																				 
	//----------------------------------------------------------------------------------------------------
	public function parseJson(String $data);
	
	//----------------------------------------------------------------------------------------------------
	// Parse Object
	//----------------------------------------------------------------------------------------------------
	//
	// Genel Kullanım: Bir XML verisini object veri türüne çevirir.				 			                                      
	// 
	// @param  string 	$data
	// @return object
	//          																				 
	//----------------------------------------------------------------------------------------------------
	public function parseObject(String $data);
	
	//----------------------------------------------------------------------------------------------------
	// Parse
	//----------------------------------------------------------------------------------------------------
	//
	// Genel Kullanım: Bir XML verisini object veri türüne çevirir.				 			                                      
	// 
	// @param  string 	$data
	// @return object
	//          																				 
	//----------------------------------------------------------------------------------------------------
	public function parse(String $xml, String $result = 'object');
}