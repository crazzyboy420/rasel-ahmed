<?php

function blog_sidebar(){
   register_sidebar( array(
    'name' => __('Blog Sidebar', 'theme-slug' ),
    'id' => 'sidebar-blog',
    'description' => __( 'Blog Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
    'before_widget' => ' <div class="blog_right_widget blog_widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="blog_widget_title">',
	'after_title'   => '</h3>',
    ) );	
}
add_action('widgets_init','blog_sidebar');





