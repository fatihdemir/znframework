<?php
namespace ZN\FileSystem;

interface FolderInterface
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
	// create()
	//----------------------------------------------------------------------------------------------------
	//
	// Dizin oluşturmak için kullanılır.
	//
	//----------------------------------------------------------------------------------------------------
	public function create(String $file, Int $permission = 0755, Bool $recursive = true) : Bool;
	
	//----------------------------------------------------------------------------------------------------
	// rename()
	//----------------------------------------------------------------------------------------------------
	//
	// Dosya veya dizinin adını değiştirmek için kullanılır.
	//
	//----------------------------------------------------------------------------------------------------
	public function rename(String $oldName, String $newName) : Bool;

	//----------------------------------------------------------------------------------------------------
	// deleteEmpty()
	//----------------------------------------------------------------------------------------------------
	//
	// Boş bir dizini silmek için kullanılır.
	//
	//----------------------------------------------------------------------------------------------------
	public function deleteEmpty(String $folder) : Bool;

	//----------------------------------------------------------------------------------------------------
	// delete()
	//----------------------------------------------------------------------------------------------------
	//
	// Bir dizin ve içindekilerinin tamamını silmek için kullanılır.
	//
	//----------------------------------------------------------------------------------------------------
	public function delete(String $name);

	//----------------------------------------------------------------------------------------------------
	// fileInfo()
	//----------------------------------------------------------------------------------------------------
	//
	// Bir dosya veya dizine ait dosyalar ve dizinler hakkında çeşitli bilgiler almak için kullanılır.
	//
	//----------------------------------------------------------------------------------------------------
	public function fileInfo(String $dir, String $extension = NULL) : Array;

	//----------------------------------------------------------------------------------------------------
	// Copy()
	//----------------------------------------------------------------------------------------------------
	//
	// Bir dizini belirtilen başka bir konuma kopyalamak için kullanılır. Bu işlem kopyalanacak dizine
	// ait diğer alt dizin ve dosyaları da kapsamaktadır.
	//
	//----------------------------------------------------------------------------------------------------
	public function copy(String $source, String $target);

	//----------------------------------------------------------------------------------------------------
	// change()
	//----------------------------------------------------------------------------------------------------
	//
	// PHP'nin aktif çalışma dizinini değiştirmek için kullanılır.
	//
	//----------------------------------------------------------------------------------------------------	
	public function change(String $name) : Bool;

	//----------------------------------------------------------------------------------------------------
	// files()
	//----------------------------------------------------------------------------------------------------
	//
	// Bir dizin içindeki dosya ve dizin listesini almak için kullanılır. Eğer listelenecek dosyalar
	// arasında belli uzantılı dosyaların listelenmesi istenilirse 2. parametreye dosya uzantısı
    // verilebilir. Sadece dizinlerin listelenmesi istenirse 'dir' parametresini kullanmanız gerekir.
    // Birden fazla uzantı belirmek isterseniz 2. parametreyi ['dir', 'php'] gibi belirtebilirsiniz.
	//
	//----------------------------------------------------------------------------------------------------
	public function files(String $path, $extension = NULL) : Array;

	//----------------------------------------------------------------------------------------------------
	// allFiles()
	//----------------------------------------------------------------------------------------------------
	//
	// Bir dizine ait tüm alt dizin ve dosyaların listesini almak için kullanılır. İç içe dizinlerde de
	// yer alan dosyaların listelenmesini isterseniz 2. parametreyi true ayarlayabilirsiniz.
	//
	//----------------------------------------------------------------------------------------------------
	public function allFiles(String $pattern = '*', Bool $allFiles = false) : Array;

	//----------------------------------------------------------------------------------------------------
	// permission()
	//----------------------------------------------------------------------------------------------------
	//
	// Bir dizin veya dosyaya yetki vermek için kullanılır.
	//
	//----------------------------------------------------------------------------------------------------
	public function permission(String $name, Int $permission = 0755) : Bool;
}