<?php
// Widget

// widget sidebar
register_sidebar(array(
'name' => __('Widget Sidebar',TDM), 
'id' => 'sidebar-1',  
'description' => __('Widget Sidebar',TDM),
'before_widget' => '<div id="%1$s" class="%2$s sidebar-blog">',
'after_widget' => '</div><div class="clearfix"></div>',
'before_title'  => '<h4 class="wg-title">',  /**/
'after_title'   => '</h4>'
));

// widget footer x 4
for($i=1;$i<=4;$i++){
register_sidebar(array(
'name' => __('Widget Footer '. $i,TDM),
'id' => 'sidebar-footer-' . $i, 
'description' => __('Widget Footer ' . $i,TDM),
'before_widget' => '<div id="%1$s" class="%2$s sidebar-footer">', /**/
'after_widget' => '</div><div class="clearfix"></div>',
'before_title'  => '<h4 class="wg-title">',  /**/
'after_title'   => '</h4>'
));
}