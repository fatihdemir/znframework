<?php
namespace ZN\FileSystem;

class InternalDownload extends \CallController implements DownloadInterface
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
	// Start
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	//
	//----------------------------------------------------------------------------------------------------
	public function start(String $file)
	{
		if( ! file_exists($file) )
		{
			return \Exceptions::throws('File', 'notFoundError', $file);
		}
	
		$fileEx   = explode("/", $file);
		$fileName = $fileEx[count($fileEx)-1];
		$filePath = trim($file, $fileName);
		
		header("Content-type: application/x-download");
		header("Content-Disposition: attachment; filename=".$fileName);
		
		readfile($filePath.$fileName);
	}	
}