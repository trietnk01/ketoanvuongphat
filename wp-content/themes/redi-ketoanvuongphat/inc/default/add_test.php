<?php

function p_add_test1(){
	if ( isset($_GET['test1'])){
		return true;
	} else{
		return false;
	}
}

function p_add_test1_lh(){
	if ( is_localhost() ) {

		if ( isset($_GET['test1'])){
			return true;
		} else{
			return false;
		}

	} else {
		return false;
	}

}

