<?php
/*
  init hook single loop
*/

// before
add_action('p_before_single_content_loop','p_single_loop_time', 10);


// after
add_action('p_after_single_content_loop','p_single_loop_tag', 10);
add_action('p_after_single_content_loop','p_single_loop_related', 20);
//add_action('p_after_single_content_loop','p_single_loop_author', 30);
//add_action('p_after_single_content_loop','p_single_loop_next_prev_link', 40);


// before
function p_single_loop_time(){
	require_once dirname(__File__) . '/time.php';
}


// after
function p_single_loop_tag(){
	require_once dirname(__File__) . '/tag.php';
}

function p_single_loop_related(){
	require_once dirname(__File__) . '/related.php';
}

function p_single_loop_author(){
	require_once dirname(__File__) . '/author.php';
}

function p_single_loop_next_prev_link(){
	require_once dirname(__File__) . '/next_prev_link.php';
}


