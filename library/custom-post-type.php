<?php
/* rayaparvaz Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/rayaparvaz/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'rayaparvaz_flush_rewrite_rules' );

// Flush your rewrite rules
function rayaparvaz_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function tour_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'tour', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Tour', 'rayaparvaz' ), /* This is the Title of the Group */
			'singular_name' => __( 'Tour', 'rayaparvaz' ), /* This is the individual type */
			'all_items' => __( 'All Tours', 'rayaparvaz' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'rayaparvaz' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Tour', 'rayaparvaz' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'rayaparvaz' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Tours', 'rayaparvaz' ), /* Edit Display Title */
			'new_item' => __( 'New Tour', 'rayaparvaz' ), /* New Display Title */
			'view_item' => __( 'View Tour', 'rayaparvaz' ), /* View Display Title */
			'search_items' => __( 'Search Tour', 'rayaparvaz' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'rayaparvaz' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'rayaparvaz' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a Tour', 'rayaparvaz' ), /* Custom Type Description */
			'public' => true,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/images/tour-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'tour', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'tour', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type( 'category', 'tour' );
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type( 'post_tag', 'tour' );
	
}


function hotel_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'hotel', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Hotel', 'rayaparvaz' ), /* This is the Title of the Group */
			'singular_name' => __( 'Hotel', 'rayaparvaz' ), /* This is the individual type */
			'all_items' => __( 'All Hotel', 'rayaparvaz' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'rayaparvaz' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Hotel', 'rayaparvaz' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'rayaparvaz' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Hotels', 'rayaparvaz' ), /* Edit Display Title */
			'new_item' => __( 'New Hotel', 'rayaparvaz' ), /* New Display Title */
			'view_item' => __( 'View Hotel', 'rayaparvaz' ), /* View Display Title */
			'search_items' => __( 'Search Hotel', 'rayaparvaz' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'rayaparvaz' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'rayaparvaz' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a Hotel', 'rayaparvaz' ), /* Custom Type Description */
			'public' => true,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/images/hotel-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'hotel', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'hotel', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type( 'category', 'tour' );
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type( 'post_tag', 'tour' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'tour_post_type');
	add_action( 'init', 'hotel_post_type');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'tour_cat', 
		array('tour'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Tour Categories', 'rayaparvaz' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Tour Category', 'rayaparvaz' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Tour Categories', 'rayaparvaz' ), /* search title for taxomony */
				'all_items' => __( 'All Tour Categories', 'rayaparvaz' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Tour Category', 'rayaparvaz' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Tour Category:', 'rayaparvaz' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Tour Category', 'rayaparvaz' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Tour Category', 'rayaparvaz' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Tour Category', 'rayaparvaz' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Tour Category Name', 'rayaparvaz' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'tour-cat' ),
			'show_in_nav_menus' => true,
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'tour_tag', 
		array('tour'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Tour Tags', 'rayaparvaz' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Tour Tag', 'rayaparvaz' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Tour Tags', 'rayaparvaz' ), /* search title for taxomony */
				'all_items' => __( 'All Tour Tags', 'rayaparvaz' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Tour Tag', 'rayaparvaz' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Tour Tag:', 'rayaparvaz' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Tour Tag', 'rayaparvaz' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Tour Tag', 'rayaparvaz' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Tour Tag', 'rayaparvaz' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Tour Tag Name', 'rayaparvaz' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
		)
	);

	register_taxonomy( 'hotel_cat', 
		array('hotel'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Hotel Categories', 'rayaparvaz' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Hotel Category', 'rayaparvaz' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Hotel Categories', 'rayaparvaz' ), /* search title for taxomony */
				'all_items' => __( 'All Hotel Categories', 'rayaparvaz' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Hotel Category', 'rayaparvaz' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Hotel Category:', 'rayaparvaz' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Hotel Category', 'rayaparvaz' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Hotel Category', 'rayaparvaz' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Hotel Category', 'rayaparvaz' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Hotel Category Name', 'rayaparvaz' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'hotel-cat' ),
			'show_in_nav_menus' => true,
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'hotel_tag', 
		array('hotel'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Hotel Tags', 'rayaparvaz' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Hotel Tag', 'rayaparvaz' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Hotel Tags', 'rayaparvaz' ), /* search title for taxomony */
				'all_items' => __( 'All Hotel Tags', 'rayaparvaz' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Hotel Tag', 'rayaparvaz' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Hotel Tag:', 'rayaparvaz' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Hotel Tag', 'rayaparvaz' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Hotel Tag', 'rayaparvaz' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Hotel Tag', 'rayaparvaz' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Hotel Tag Name', 'rayaparvaz' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
		)
	);
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>
