<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the rayaparvaz directory)
 *
 * Be sure to replace all instances of 'rayaparvaz_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_rayaparvaz
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/rayaparvaz
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


function ed_metabox_include_front_page( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'] ) ) {
        return $display;
    }

    if ( 'front-page' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return !$display;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option( 'page_on_front' );

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
//add_filter( 'cmb2_show_on', 'ed_metabox_include_front_page', 10, 2 );
/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' rayaparvaz_box parameter
 *
 * @param  rayaparvaz object $cmb rayaparvaz object
 *
 * @return bool             True if metabox should show
 */
function rayaparvaz_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  rayaparvaz_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function rayaparvaz_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  rayaparvaz_Field object $field      Field object
 */
function rayaparvaz_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_init', 'rayaparvaz_register_background_image_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function rayaparvaz_register_background_image_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_rayaparvaz_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_background = new_cmb2_box( array(
		'id'           => $prefix . 'background_metabox',
		'title'        => __( 'Background Image', 'rayaparvaz' ),
		'object_types' => array( 'page','post','hotel','tour' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_background->add_field( array(
		'name' => __( 'Backgournd Image', 'rayaparvaz' ),
		'desc' => __( 'Upload an image or enter a URL.', 'rayaparvaz' ),
		'id'   => $prefix . 'background_image',
		'type' => 'file',
	) );

}

add_action( 'cmb2_init', 'rayaparvaz_register_hotel_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function rayaparvaz_register_hotel_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_rayaparvaz_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'hotel_metabox',
		'title'         => __( 'Hotel Information', 'rayaparvaz' ),
		'object_types'  => array( 'hotel' ), // Post type
		// 'show_on_cb' => 'rayaparvaz_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_demo->add_field( array(
		'name'       => __( 'Region', 'rayaparvaz' ),
		'desc'       => __( 'Region input field', 'rayaparvaz' ),
		'id'         => $prefix . 'hotel_region',
		'type'       => 'text',
		//'show_on_cb' => 'rayaparvaz_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'hotel rank', 'rayaparvaz' ),
		'desc' => __( 'number between 0 to 10', 'rayaparvaz' ),
		'id'   => $prefix . 'hotel_rank',
		'type' => 'text',
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'hotel degree', 'rayaparvaz' ),
		'desc' => __( 'number between 1 to 7', 'rayaparvaz' ),
		'id'   => $prefix . 'hotel_degree',
		'type' => 'text',
		// 'repeatable' => true,
	) );

	
	$cmb_demo->add_field( array(
		'name'         => __( 'Slider Images', 'rayaparvaz' ),
		'desc'         => __( 'Upload or add multiple images/attachments.', 'rayaparvaz' ),
		'id'           => $prefix . 'image_list',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	

}

add_action('cmb2_init','rayaparvaz_register_tour_information_metabox');

function rayaparvaz_register_tour_information_metabox(){
	$prefix2 ='_rayaparvaz_';
	/**
	 * Repeatable Field Groups
	 */
	$cmb_tour = new_cmb2_box( array(
		'id'            => $prefix2 . 'tour_metabox',
		'title'         => __( 'Tour Information', 'rayaparvaz' ),
		'object_types'  => array( 'tour' ), // Post type
		// 'show_on_cb' => 'rayaparvaz_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_tour->add_field( array(
		'name'       => __( 'Airline', 'rayaparvaz' ),
		'desc'       => __( 'the name of airline', 'rayaparvaz' ),
		'id'         => $prefix2 . 'tour_airline',
		'type'       => 'text',
		
	) );

	$cmb_tour->add_field( array(
		'name'       => __( 'Pickup time', 'rayaparvaz' ),
		'desc'       => __( 'the pickup time', 'rayaparvaz' ),
		'id'         => $prefix2 . 'pick_up_time',
		'type'       => 'text',
		
	) );

	$cmb_tour->add_field( array(
		'name'       => __( 'Landing time', 'rayaparvaz' ),
		'desc'       => __( 'the landing time', 'rayaparvaz' ),
		'id'         => $prefix2 . 'landing_time',
		'type'       => 'text',
		
	) );
}

add_action( 'cmb2_init', 'rayaparvaz_register_repeatable_tour_package_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function rayaparvaz_register_repeatable_tour_package_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_rayaparvaz_group_';
	
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'tour_metabox',
		'title'        => __( 'Tour Packages', 'rayaparvaz' ),
		'object_types' => array( 'tour', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'tour_package',
		'type'        => 'group',
		'description' => __( 'Generates reusable form entries', 'rayaparvaz' ),
		'options'     => array(
			'group_title'   => __( 'Hotel {#}', 'rayaparvaz' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Hotel', 'rayaparvaz' ),
			'remove_button' => __( 'Remove Hotel', 'rayaparvaz' ),
			'sortable'      => true, // beta
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	// WP_Query arguments
	
	$args = array (
		'post_type'              => array( 'hotel' ),
		'posts_per_page'         => '250',
	);


	// The Query
	$hotel_list = get_posts( $args );
	//var_dump($hotel_list);
	$package_hotels = array();
	foreach ( $hotel_list as $post ) : setup_postdata( $post );
			$package_hotels[$post->ID] = $post->post_title;
 	endforeach; 
 	//wp_reset_postdata();
	
	$cmb_group->add_group_field($group_field_id , array(
		'name'    => __( 'Hotel Name', 'rayaparvaz' ),
		'desc'    => __( 'choose hotel name', 'rayaparvaz' ),
		'id'      => 'package_hotel',
		'type'    => 'radio_inline',
		'options' => $package_hotels,
			
	) );

	$cmb_group->add_group_field($group_field_id , array(
		'name'             => __( 'Hotel Service', 'rayaparvaz' ),
		'desc'             => __( 'Hotet services', 'rayaparvaz' ),
		'id'               => 'hotel_service',
		'type'             => 'radio_inline',
		'show_option_none' => true,
		'options'          => array(
			'u_all' => __( 'U.All', 'rayaparvaz' ),
			'all' => __( 'All', 'rayaparvaz' ),
			'b_b'   => __( 'B.B', 'rayaparvaz' ),
			
		),
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Two Bed Price', 'rayaparvaz' ),
		'description' => __( 'Enter price with currency', 'rayaparvaz' ),
		'id'          => 'two_bed',
		'type'        => 'text',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'One Bed Price', 'rayaparvaz' ),
		'description' => __( 'Enter price with currency', 'rayaparvaz' ),
		'id'          => 'one_bed',
		'type'        => 'text',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Child With Bed Price', 'rayaparvaz' ),
		'description' => __( 'Enter price with currency', 'rayaparvaz' ),
		'id'          => 'child_with_bed',
		'type'        => 'text',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Child Without Bed Price', 'rayaparvaz' ),
		'description' => __( 'Enter price with currency', 'rayaparvaz' ),
		'id'          => 'child_without_bed',
		'type'        => 'text',
	) );

	
}
add_action( 'cmb2_init', 'rayaparvaz_register_intro_page_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function rayaparvaz_register_intro_page_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_rayaparvaz_intro_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_intro_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Intro Page Links Metabox', 'rayaparvaz' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => 'ed_metabox_include_front_page',//array( 'key' => 'page-template', 'value' => 'template-contact.php' ),, // Specific post IDs to display this metabox
	) );

	$cmb_intro_page->add_field( array(
		'name' => __( 'Internal Tour', 'rayaparvaz' ),
		'desc' => __( 'field description (optional)', 'rayaparvaz' ),
		'id'   => $prefix . 'internal_tours',
		'type' => 'text_url',
	) );
	$cmb_intro_page->add_field( array(
		'name' => __( 'External Tour', 'rayaparvaz' ),
		'desc' => __( 'field description (optional)', 'rayaparvaz' ),
		'id'   => $prefix . 'external_tours',
		'type' => 'text_url',
	) );

}

// add_action( 'cmb2_init', 'rayaparvaz_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
// function rayaparvaz_register_user_profile_metabox() {

// 	// Start with an underscore to hide fields from custom fields list
// 	$prefix = '_rayaparvaz_user_';

// 	/**
// 	 * Metabox for the user profile screen
// 	 */
// 	$cmb_user = new_cmb2_box( array(
// 		'id'               => $prefix . 'edit',
// 		'title'            => __( 'User Profile Metabox', 'rayaparvaz' ),
// 		'object_types'     => array( 'user' ), // Tells rayaparvaz to use user_meta vs post_meta
// 		'show_names'       => true,
// 		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
// 	) );

// 	$cmb_user->add_field( array(
// 		'name'     => __( 'Extra Info', 'rayaparvaz' ),
// 		'desc'     => __( 'field description (optional)', 'rayaparvaz' ),
// 		'id'       => $prefix . 'extra_info',
// 		'type'     => 'title',
// 		'on_front' => false,
// 	) );

// 	$cmb_user->add_field( array(
// 		'name'    => __( 'Avatar', 'rayaparvaz' ),
// 		'desc'    => __( 'field description (optional)', 'rayaparvaz' ),
// 		'id'      => $prefix . 'avatar',
// 		'type'    => 'file',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => __( 'Facebook URL', 'rayaparvaz' ),
// 		'desc' => __( 'field description (optional)', 'rayaparvaz' ),
// 		'id'   => $prefix . 'facebookurl',
// 		'type' => 'text_url',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => __( 'Twitter URL', 'rayaparvaz' ),
// 		'desc' => __( 'field description (optional)', 'rayaparvaz' ),
// 		'id'   => $prefix . 'twitterurl',
// 		'type' => 'text_url',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => __( 'Google+ URL', 'rayaparvaz' ),
// 		'desc' => __( 'field description (optional)', 'rayaparvaz' ),
// 		'id'   => $prefix . 'googleplusurl',
// 		'type' => 'text_url',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => __( 'Linkedin URL', 'rayaparvaz' ),
// 		'desc' => __( 'field description (optional)', 'rayaparvaz' ),
// 		'id'   => $prefix . 'linkedinurl',
// 		'type' => 'text_url',
// 	) );

// 	$cmb_user->add_field( array(
// 		'name' => __( 'User Field', 'rayaparvaz' ),
// 		'desc' => __( 'field description (optional)', 'rayaparvaz' ),
// 		'id'   => $prefix . 'user_text_field',
// 		'type' => 'text',
// 	) );

// }

// add_action( 'cmb2_init', 'rayaparvaz_register_theme_options_metabox' );
// /**
//  * Hook in and register a metabox to handle a theme options page
//  */
// function rayaparvaz_register_theme_options_metabox() {

// 	// Start with an underscore to hide fields from custom fields list
// 	$option_key = '_rayaparvaz_theme_options';

// 	/**
// 	 * Metabox for an options page. Will not be added automatically, but needs to be called with
// 	 * the `rayaparvaz_metabox_form` helper function. See wiki for more info.
// 	 */
// 	$cmb_options = new_cmb2_box( array(
// 		'id'      => $option_key . 'page',
// 		'title'   => __( 'Theme Options Metabox', 'rayaparvaz' ),
// 		'hookup'  => false, // Do not need the normal user/post hookup
// 		'show_on' => array(
// 			// These are important, don't remove
// 			'key'   => 'options-page',
// 			'value' => array( $option_key )
// 		),
// 	) );

// 	/**
// 	 * Options fields ids only need
// 	 * to be unique within this option group.
// 	 * Prefix is not needed.
// 	 */
// 	$cmb_options->add_field( array(
// 		'name'    => __( 'Site Background Color', 'rayaparvaz' ),
// 		'desc'    => __( 'field description (optional)', 'rayaparvaz' ),
// 		'id'      => 'bg_color',
// 		'type'    => 'colorpicker',
// 		'default' => '#ffffff',
// 	) );

// }
