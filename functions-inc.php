<?php

	if (function_exists('register_sidebar')) {

		register_sidebar(array(
			'name' => 'Header Widget',
			'id'   => 'header_widget',
			'description'   => 'header_widget',
			'before_widget' => '<div id="header_widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));


	}
/* 
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

	<script type="text/javascript">
	jQuery(document).ready(function() {
	
		jQuery('#example_showhidden').click(function() {
	  		jQuery('.hidden').fadeToggle(400);
		});
		
		if (jQuery('#example_showhidden:checked').val() !== undefined) {
			jQuery('.hidden').show();
		}
		
	});
	
	jQuery(document).ready(function() {
	
		jQuery('#example_showhidden2').click(function() {
	  		jQuery('.two').fadeToggle(400);
		});
		
		if (jQuery('#example_showhidden2:checked').val() !== undefined) {
			jQuery('.two').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_second_office').click(function() {
	  		jQuery('.second-office-hide').fadeToggle(400);
		});
		
		if (jQuery('#show_second_office:checked').val() !== undefined) {
			jQuery('.second-office-hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_third_office').click(function() {
	  		jQuery('.third-office-hide').fadeToggle(400);
		});
		
		if (jQuery('#show_third_office:checked').val() !== undefined) {
			jQuery('.third-office-hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_fourth_office').click(function() {
	  		jQuery('.fourth-office-hide').fadeToggle(400);
		});
		
		if (jQuery('#show_fourth_office:checked').val() !== undefined) {
			jQuery('.fourth-office-hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_fifth_office').click(function() {
	  		jQuery('.fifth-office-hide').fadeToggle(400);
		});
		
		if (jQuery('#show_fifth_office:checked').val() !== undefined) {
			jQuery('.fifth-office-hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_sixth_office').click(function() {
	  		jQuery('.sixth-office-hide').fadeToggle(400);
		});
		
		if (jQuery('#show_sixth_office:checked').val() !== undefined) {
			jQuery('.sixth-office-hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_seventh_office').click(function() {
	  		jQuery('.seventh-office-hide').fadeToggle(400);
		});
		
		if (jQuery('#show_seventh_office:checked').val() !== undefined) {
			jQuery('.seventh-office-hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_first_employee').click(function() {
	  		jQuery('.first_employee_hide').fadeToggle(400);
		});
		
		if (jQuery('#show_first_employee:checked').val() !== undefined) {
			jQuery('.first_employee_hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_second_employee').click(function() {
	  		jQuery('.second_employee_hide').fadeToggle(400);
		});
		
		if (jQuery('#show_second_employee:checked').val() !== undefined) {
			jQuery('.second_employee_hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_third_employee').click(function() {
	  		jQuery('.third_employee_hide').fadeToggle(400);
		});
		
		if (jQuery('#show_third_employee:checked').val() !== undefined) {
			jQuery('.third_employee_hide').show();
		}
		
	});
	jQuery(document).ready(function() {
	
		jQuery('#show_fourth_employee').click(function() {
	  		jQuery('.fourth_employee_hide').fadeToggle(400);
		});
		
		if (jQuery('#show_fourth_employee:checked').val() !== undefined) {
			jQuery('.fourth_employee_hide').show();
		}
		
	});
	
	
	jQuery(document).ready(function() {
	
		jQuery('input#audiology_theme_3_0-twitter_radio-two').click(function() {
	  		jQuery('.twitter_hidden').fadeToggle(400);
		});
		
		jQuery('input#audiology_theme_3_0-twitter_radio-one').click(function() {
	  		jQuery('.twitter_hidden').hide();
		});
		
	});
	
	jQuery(document).ready(function() {
	
		jQuery('input#audiology_theme_3_0-facebook_radio-two').click(function() {
	  		jQuery('.facebook_hidden').fadeToggle(400);
		});
		
		jQuery('input#audiology_theme_3_0-facebook_radio-one').click(function() {
	  		jQuery('.facebook_hidden').hide();
		});
		
	});
	jQuery(document).ready(function() {
	
		jQuery('input#audiology_theme_3_0-google_radio-two').click(function() {
	  		jQuery('.google_hidden').fadeToggle(400);
		});
		
		jQuery('input#audiology_theme_3_0-google_radio-one').click(function() {
	  		jQuery('.google_hidden').hide();
		});
		
	});        
	</script>

 
<?php
}
/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}
/* 
 * This function adds the html that will appear in the sidebar module of the
 * options panel.  Feel free to alter this how you see fit.
 */

add_action( 'optionsframework_after','optionscheck_display_sidebar' );

function optionscheck_display_sidebar() { ?>
	<div id="optionsframework-sidebar">
		<div class="metabox-holder">
			<div class="postbox">
				<h3>Obelis Media</h3>
					<div class="inside">
						<p>When you are satisfied with your application please file a support ticket here:<br /><a href="http://obelismedia.com/support/">Support Portal</a></p>
					</div>
			</div>
		</div>
	</div>
<?php }

/* 
 * This function loads an additional CSS file for the options panel
 * which allows us to style the sidebar
 */
 
 if ( is_admin() ) {
    $of_page= 'toplevel_page_options-framework';
    add_action( "admin_print_styles-$of_page", 'optionsframework_custom_css', 100);
}
 
function optionsframework_custom_css () {
	wp_register_style( 'optionsframework_custom_css', get_stylesheet_directory_uri() .'/css/options-custom.css' );
	wp_enqueue_style( 'optionsframework_custom_css' );
}
// THIS INCLUDES THE THUMBNAIL IN OUR RSS FEED
function insertThumbnailRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '' . get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'alt' => get_the_title(), 'title' => get_the_title(), 'style' => 'float:right;' ) ) . '' . $content;
}
return $content;
}
add_filter('the_excerpt_rss', 'insertThumbnailRSS');
add_filter('the_content_feed', 'insertThumbnailRSS');




function my_insert_custom_image_sizes( $sizes ) {
    // get the custom image sizes
    global $_wp_additional_image_sizes;
    // if there are none, just return the built-in sizes
    if ( empty( $_wp_additional_image_sizes ) )
        return $sizes;

    // add all the custom sizes to the built-in sizes
    foreach ( $_wp_additional_image_sizes as $id => $data ) {
        // take the size ID (e.g., 'my-name'), replace hyphens with spaces,
        // and capitalise the first letter of each word
        if ( !isset($sizes[$id]) )
            $sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
    }

    return $sizes;
}


function custom_image_setup () {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'custom-image-size-1', 160, 9999 ); //  small columned
    add_image_size( 'custom-image-size-2', 300, 9999, true  ); //  medium //  cropped
    add_image_size( 'fearured', 630, 9999); 
    add_filter( 'image_size_names_choose', 'my_insert_custom_image_sizes' );
}

add_action( 'after_setup_theme', 'custom_image_setup' );

 /* 
 * The CSS file selected in the options panel 'stylesheet' option
 * is loaded on the theme front end
 *
 * If you'd prefer to use the 'auto_stylesheet' option, replace
 * of_get_option('stylesheet') with of_get_option('auto_stylesheet')
 *
 * If the "Default" option is selected, "0" is returned (equivalent to false),
 * which means no files will be registered or enqueued
 */
 
/*
function options_stylesheets_alt_style()   {
	if ( of_get_option('stylesheet') ) {
		wp_enqueue_style( 'options_stylesheets_alt_style', of_get_option('auto_stylesheet'), array(), null );
	}
	wp_register_style( 'ebright_global', get_stylesheet_directory_uri() .'/css/ebright/global-style.css' );
	wp_enqueue_style( 'ebright_global' );
}
add_action( 'wp_enqueue_scripts', 'options_stylesheets_alt_style' );
*/



//google maps geocode function
function lookup($string){
 
   $string = str_replace (" ", "+", urlencode($string));
   $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
 
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $details_url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $response = json_decode(curl_exec($ch), true);
 
   // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
   if ($response['status'] != 'OK') {
   // echo $response['status']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   }
 
   /* print_r($response); */
   $geometry = $response['results'][0]['geometry'];
 
    $longitude = $geometry['location']['lat'];
    $latitude = $geometry['location']['lng'];
 
    $array = array(
        'latitude' => $geometry['location']['lng'],
        'longitude' => $geometry['location']['lat'],
        'location_type' => $geometry['location_type'],
    );
 
    return $array;
 
}

add_action('optionsframework_after_validate', 'geocoder'); // runs geocoder when business profiles is updated
$theme = get_template();

// geocoder gets address data from business profile. 
function geocoder(){
	foreach ($_POST['openmind'] as $key => $val) {
	   // echo 'key= '.$key.'<br />';
	   // echo 'val = '.$val.'<br /><br />';
	    if($key == 'street_address'){
		    $main_street = $val;
	    }
	    if($key == 'main_city'){
		    $main_city = $val;
	    }
		if($key == 'main_state'){
		    $main_state = $val;
	    }
	    if($key == 'main_zip'){
		    $main_zip = $val;
	    }
		// Second Address
	    if($key == 'second_street_address'){
		    $second_street = $val;
	    }
	    if($key == 'second_city'){
		    $second_city = $val;
	    }
		if($key == 'second_state'){
		    $second_state = $val;
	    }
	    if($key == 'second_zip'){
		    $second_zip = $val;
	    }
		// Third Address
	    if($key == 'third_street_address'){
		    $third_street = $val;
	    }
	    if($key == 'third_city'){
		    $third_city = $val;
	    }
		if($key == 'third_state'){
		    $third_state = $val;
	    }
	    if($key == 'third_zip'){
		    $third_zip = $val;
	    }
	    // Fourth Address
	    if($key == 'fourth_street_address'){
		    $fourth_street = $val;
	    }
	    if($key == 'fourth_city'){
		    $fourth_city = $val;
	    }
		if($key == 'fourth_state'){
		    $fourth_state = $val;
	    }
	    if($key == 'fourth_zip'){
		    $fourth_zip = $val;
	    }
	}
	
	// geo codes addresses
	$address1 = $main_street.', '.$main_city.' '.$main_state.' '.$main_zip;
	$address2 = $second_street.', '.$second_city.' '.$second_state.' '.$second_zip;
	$address3 = $third_street.', '.$third_city.' '.$third_state.' '.$third_zip;
	$address4 = $fourth_street.', '.$fourth_city.' '.$fourth_state.' '.$fourth_zip;
	
	$array = lookup($address1);
	$lat1 = $array[latitude];
	$lon1 = $array[longitude];
	
	$array = lookup($address2);
	$lat2 = $array[latitude];
	$lon2 = $array[longitude];
	
	$array = lookup($address3);
	$lat3 = $array[latitude];
	$lon3 = $array[longitude];
	
	$array = lookup($address4);
	$lat4 = $array[latitude];
	$lon4 = $array[longitude];


	// writes geocodes to wp options database
/*
	update_option( 'lat1', $lat1 );
	update_option( 'lon1', $lon1 );
	
	update_option( 'lat2', $lat2 );
	update_option( 'lon2', $lon2 );
	
	update_option( 'lat3', $lat3 );
	update_option( 'lon3', $lon3 );
	
	update_option( 'lat4', $lat4 );
	update_option( 'lon4', $lon4 );
	
	
*/

}



?>