<?php
class Backend{
	private $_menuSlug = 'zendvn-sp-manager';
	private $_page = '';
	public function __construct(){
		global $zController;
		$zController->getHelper("CreatePage");
	}
	public function do_output_buffer(){
		ob_start();
	}	
}

















