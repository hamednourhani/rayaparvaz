<?php
/* naiau Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/naiau/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'naiau_flush_rewrite_rules' );

// Flush your rewrite rules
function naiau_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function tour_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'tour', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Tour', 'naiau' ), /* This is the Title of the Group */
			'singular_name' => __( 'Tour', 'naiau' ), /* This is the individual type */
			'all_items' => __( 'All Tours', 'naiau' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'naiau' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Tour', 'naiau' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'naiau' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Tours', 'naiau' ), /* Edit Display Title */
			'new_item' => __( 'New Tour', 'naiau' ), /* New Display Title */
			'view_item' => __( 'View Tour', 'naiau' ), /* View Display Title */
			'search_items' => __( 'Search Tour', 'naiau' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'naiau' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'naiau' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a Tour', 'naiau' ), /* Custom Type Description */
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
			'name' => __( 'Hotel', 'naiau' ), /* This is the Title of the Group */
			'singular_name' => __( 'Hotel', 'naiau' ), /* This is the individual type */
			'all_items' => __( 'All Hotel', 'naiau' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'naiau' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Hotel', 'naiau' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'naiau' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Hotels', 'naiau' ), /* Edit Display Title */
			'new_item' => __( 'New Hotel', 'naiau' ), /* New Display Title */
			'view_item' => __( 'View Hotel', 'naiau' ), /* View Display Title */
			'search_items' => __( 'Search Hotel', 'naiau' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'naiau' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'naiau' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a Hotel', 'naiau' ), /* Custom Type Description */
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
				'name' => __( 'Tour Categories', 'naiau' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Tour Category', 'naiau' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Tour Categories', 'naiau' ), /* search title for taxomony */
				'all_items' => __( 'All Tour Categories', 'naiau' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Tour Category', 'naiau' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Tour Category:', 'naiau' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Tour Category', 'naiau' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Tour Category', 'naiau' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Tour Category', 'naiau' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Tour Category Name', 'naiau' ) /* name title for taxonomy */
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
				'name' => __( 'Tour Tags', 'naiau' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Tour Tag', 'naiau' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Tour Tags', 'naiau' ), /* search title for taxomony */
				'all_items' => __( 'All Tour Tags', 'naiau' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Tour Tag', 'naiau' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Tour Tag:', 'naiau' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Tour Tag', 'naiau' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Tour Tag', 'naiau' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Tour Tag', 'naiau' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Tour Tag Name', 'naiau' ) /* name title for taxonomy */
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
				'name' => __( 'Hotel Categories', 'naiau' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Hotel Category', 'naiau' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Hotel Categories', 'naiau' ), /* search title for taxomony */
				'all_items' => __( 'All Hotel Categories', 'naiau' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Hotel Category', 'naiau' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Hotel Category:', 'naiau' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Hotel Category', 'naiau' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Hotel Category', 'naiau' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Hotel Category', 'naiau' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Hotel Category Name', 'naiau' ) /* name title for taxonomy */
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
				'name' => __( 'Hotel Tags', 'naiau' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Hotel Tag', 'naiau' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Hotel Tags', 'naiau' ), /* search title for taxomony */
				'all_items' => __( 'All Hotel Tags', 'naiau' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Hotel Tag', 'naiau' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Hotel Tag:', 'naiau' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Hotel Tag', 'naiau' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Hotel Tag', 'naiau' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Hotel Tag', 'naiau' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Hotel Tag Name', 'naiau' ) /* name title for taxonomy */
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
