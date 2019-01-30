<?php
class Backend{
	private $_menuSlug = 'zendvn-sp-manager';
	private $_page = '';
	public function __construct(){
		global $zController;
	}
	public function do_output_buffer(){
		ob_start();
	}	
}

















