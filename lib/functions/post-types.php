<?php
// Register Coupon Post Type
add_action('init', 'lnbapp_posttype');
function lnbapp_posttype() {
	$labels = array(
		'name'               => _x( 'App Service Page', 'post type general name' ),
		'singular_name'      => _x( 'App Service Page', 'post type singular name' ),
		'add_new'            => _x( 'Add App Service Page', 'lnbapp' ),
		'add_new_item'       => __( 'Add New App Service Page' ),
		'edit_item'          => __( 'Edit App Service Page' ),
		'new_item'           => __( 'New App Service Page' ),
		'all_items'          => __( 'Manage App Service Page' ),
		'view_item'          => __( 'View App Service Page' ),
		'search_items'       => __( 'Search App Service Pages' ),
		'not_found'          => __( 'No App Service found' ),
		'not_found_in_trash' => __( 'No App Service found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'App Services'
	);	
	
	register_post_type(
		'lnbapp',
		array(
			'labels' => $labels,
			'public' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 15,
			'menu_icon' => 'dashicons-smartphone',
			'supports' => array(
				'title',
				'editor',
				'revisions',
				'thumbnail',
			),
			'taxonomies' => array(  
				'post_tag',
				'app-services',
				'app-troubleshooter',
				//'about',
			),
			'show_ui' => true,
			'show_in_menu' => true,
			'publicly_queryable' => true,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'show_in_rest' => true,
			'rest_base' => 'lnbapp',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
		)
	);	
}	

add_action('init', 'lnbfaq_posttype');
function lnbfaq_posttype() {
	$labels = array(
		'name'               => _x( 'App FAQ Page', 'post type general name' ),
		'singular_name'      => _x( 'App FAQ Page', 'post type singular name' ),
		'add_new'            => _x( 'Add App FAQ Page', 'lnbfaq' ),
		'add_new_item'       => __( 'Add New App FAQ Page' ),
		'edit_item'          => __( 'Edit App FAQ Page' ),
		'new_item'           => __( 'New App FAQ Page' ),
		'all_items'          => __( 'Manage App FAQ Page' ),
		'view_item'          => __( 'View App FAQ Page' ),
		'search_items'       => __( 'Search App FAQ Pages' ),
		'not_found'          => __( 'No App FAQ found' ),
		'not_found_in_trash' => __( 'No App FAQ found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'App FAQs'
	);	
	
	register_post_type(
		'lnbfaq',
		array(
			'labels' => $labels,
			'public' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 15,
			'menu_icon' => 'dashicons-smartphone',
			'supports' => array(
				'title',
				'editor',
				'revisions',
				'thumbnail',
			),
			'taxonomies' => array(  
				'post_tag',
				'app-faq',
			),
			'show_ui' => true,
			'show_in_menu' => true,
			'publicly_queryable' => true,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'show_in_rest' => true,
			'rest_base' => 'lnbfaq',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
		)
	);	
}

// Build taxonomies for each post type	
add_action( 'init', 'lnbapp_services');	
function lnbapp_services() {		
  $labels = array(			
    'add_new_item' => __( 'Add New Service' ),			
    'new_item_name' => __( 'New Service' ),			
    'edit_item' => __( 'Edit Service' ),			
    'view_item' => __( 'View Service' )		
  );		
  register_taxonomy(  			
    'app-services',  			
    'lnbapp',  			
    array(				
      'labels' => $labels,				
      'public' => true,				
      'show_in_nav_menus' => true,				
      'hierarchical' => true,				
      'label' => 'Mobile App Services',				
      'query_var' => true,				
      'rewrite' => true ,
      'show_in_rest' => true,
      'rest_base' => 'lnbapp-services',			
    )  		
  );  	
}

// Build taxonomies for each post type	
add_action( 'init', 'lnbapp_faq');	
function lnbapp_faq() {		
  $labels = array(			
    'add_new_item' => __( 'Add New FAQ' ),			
    'new_item_name' => __( 'New FAQ' ),			
    'edit_item' => __( 'Edit FAQ' ),			
    'view_item' => __( 'View FAQ' )			
  );		
  register_taxonomy(  			
    'app-faq',  			
    'lnbfaq',  			
    array(				
      'labels' => $labels,				
      'public' => true,				
      'show_in_nav_menus' => true,				
      'hierarchical' => true,				
      'label' => 'Mobile App FAQ',				
      'query_var' => true,				
      'rewrite' => true ,
      'show_in_rest' => true,
      'rest_base' => 'lnbapp-faq',
    )  		
  );  	
}

?>