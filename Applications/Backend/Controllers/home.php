<?php
class Home extends Controller
{	
    //--------------------------------------------------------------------------------------------------------
    // Called URL: http://example.com/zeroneed.php/home/main
    //--------------------------------------------------------------------------------------------------------
    public function main(String $params = NULL)
    {	
        //----------------------------------------------------------------------------------------------------
        // Sending Data: font, style, title
        //----------------------------------------------------------------------------------------------------
        $data['font']  = Import::font('font', true);
        $data['style'] = Import::style('style', true);	
        $data['title'] = 'ZERONEED PHP WEB FRAMEWORK';
		
        //----------------------------------------------------------------------------------------------------
        // Imported Page: Application/Views/welcome.php
        //----------------------------------------------------------------------------------------------------
        Import::view('welcome', $data);
    }	
	
    //--------------------------------------------------------------------------------------------------------
    // Executed URL: http://example.com/zeroneed.php/home/test
    //--------------------------------------------------------------------------------------------------------
    public function test()
    {
        // Your codes ...
	}
}