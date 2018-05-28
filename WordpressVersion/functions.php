<?php
require_once('bootstrap-navwalker.php');
require_once('widgets/class-wp-widget-categories.php');

    //Theme Support
    function roxy_theme_support(){
        //Featured Image Support 
        add_theme_support('post-thumbnails');

        //Custom Logo
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 100,
            'flex-width' => true,
         ) );

        //Nav Menus
        register_nav_menus(array(
            'menu-1' => esc_html__( 'Primary', 'theme-textdomain' ),
            'footer' => __('Footer Menu')
        ));

        // Post Format Support
        add_theme_support('post-formats', array('gallery'
        )); 

    }

    add_action('after_setup_theme', 'roxy_theme_support');

//Widgets Setup
function init_widgets($id){
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar'
    ));

    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="pt-2"><i class="fa fa-phone" aria-hidden="true"></i>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Footer 2',
        'id' => 'footer2',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="pt-2"><i class="fa fa-clock-o" aria-hidden="true"></i>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Footer 3',
        'id' => 'footer3',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'init_widgets');

// Register Widgets

function custom_register_widgets(){
    register_widget('WP_Widget_Categories_Custom');
}

add_action('idgets_init', 'custom_register_widgets');

//Exclude pages from WordPress Search
if (!is_admin()) {
    function wpb_search_filter($query) {
    if ($query->is_search) {
    $query->set('post_type', 'post');
    }
    return $query;
    }
    add_filter('pre_get_posts','wpb_search_filter');
    }

// Boostrap 4 pagination 


function roxy_pagination($pages = '', $range = 2) 
{  
	$showitems = ($range * 2) + 1;  
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
	
		if(!$pages)
			$pages = 1;		 
	}   
	
	if(1 != $pages)
	{
	    echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs">';
		
        echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Page '.$paged.' of '.$pages.'</span></li>';
	
	 	if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block"> First</span></a></li>';
	
	 	if($paged > 1 && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block"> Previous</span></a></li>';
	
		for ($i=1; $i <= $pages; $i++)
		{
		    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
		}
		
		if ($paged < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Next </span>&rsaquo;</a></li>';  
	
	 	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Last </span>&raquo;</a></li>';
	
	 	echo '</ul>';
        echo '</nav>';
        //echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
	}
}

