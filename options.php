<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$twitter = array(
		'one' => __('Yes, Please create a new Twitter account', 'options_check'),
		'two' => __('I have a Twitter account already.', 'options_check')
	);
	
	$facebook = array(
		'one' => __('Yes, Please create a new Facebook page', 'options_check'),
		'two' => __('I have a Facebook page already.', 'options_check')
	);
	
	$google = array(
		'one' => __('Yes, Please create a new Google+ Local page', 'options_check'),
		'two' => __('I have a Google+ Local page already.', 'options_check')
	);
	
	$email = array(
		'one' => __('Google Apps', 'options_check'),
		'two' => __('Exchange Server', 'options_check'),
		'three' => __('On The Same Server As My Website', 'options_check'),
		'four' => __('I Use A Free Service Like Gmail, Yahoo or AOL', 'options_check'),
		'five' => __('I Don\'t Know', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Array
	$services_array = array(
		'one' => __('Tinnitus', 'options_check'),
		'two' => __('Hearing Tests', 'options_check'),
		'three' => __('Custom Earmolds', 'options_check'),
		'four' => __('Assistive Listening Devices', 'options_check'),
		'five' => __('Seminars and Presentations', 'options_check'),
		'six' => __('Aural Rehabilitation', 'options_check'),
		'seven' => __('Balance Disorders', 'options_check'),
		'eight' => __('Hearing Conservation', 'options_check'),
		'twentyfive' => __('LACE', 'options_check'),
		'nine' => __('Pediatrics', 'options_check'),
		'ten' => __('Oticon Hearing Aids', 'options_check'),
		'eleven' => __('Lyric Hearing Aids', 'options_check'),
		'twelve' => __('Phonak Hearing Aids', 'options_check'),
		'thirteen' => __('ReSound Hearing Aids', 'options_check'),
		'fourteen' => __('Tinnitus SoundCure Serenade', 'options_check'),
		'fifteen' => __('Auditory Brainstem Response Test', 'options_check'),
		'sixteen' => __('Otoacoustic Emission Testing', 'options_check'),
		'seventeen' => __('Beltone', 'options_check'),
		'eighteen' => __('Unitron', 'options_check'),
		'nineteen' => __('Bluetooth', 'options_check'),
		'twenty' => __('Widex', 'options_check'),
		'twentyone' => __('Bell Hearing Instruments', 'options_check'),
		'twentytwo' => __('Siemens', 'options_check'),
		'twentythree' => __('Starkey', 'options_check'),
		'twentysix' => __('Sonic Hearing Aids', 'options_check'),
		'twentyfour' => __('Videonystagmography (VNG)', 'options_check')
	);
	
	// Multicheck Array
	$organizations_one_array = array(
		'one' => __('American Speech, Language, Hearing Association', 'options_check'),
		'two' => __('American Academy of Audiology', 'options_check'),
		'three' => __('Academy of Doctors of Audiology', 'options_check'),
		'four' => __('International Hearing Society', 'options_check'),
		'five' => __('American Tinnitus Association', 'options_check'),
		'six' => __('None', 'options_check'),
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
		
	// Color Pallets	
	$options[] = array(
	    "name" => "Base Color Scheme",
	    "desc" => "If you change the color scheme, your color options below will automatically update.",
	    "id" => "color_scheme",
	    "std" => "vibrant",
	    "type" => "select",
	    "options" => $base_color_scheme_array);
	    
	$options[] = array(
		"name" => "Color One",
	    "id" => "color1",
	    "std" => "#07dfff",
	    "type" => "color" );
	    
	$options[] = array(
	    "name" => "Color Two",
	    "id" => "color2",
	    "std" => "#3cff07",
	    "type" => "color");
	    
	$options[] = array(
	    "name" => "Color Three",
	    "id" => "color3",
	    "std" => "#fcff00",
	    "type" => "color");
	    
	$options[] = array(
	    "name" => "Color Four",
	    "id" => "color4",
	    "std" => "#ff0090",
	    "type" => "color");


	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);
	
	// Bio Page Theme	
	$bio_options = array(
		'Default Wordpress Page',
		'Bio Page 1',
		'Bio Page 2',
		'Bio Page 3',
		'Standard Bio'
	);	

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	
	$options[] = array(
		'name' => __('Instructions', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Application Instructions', 'options_check'),
		'desc' => __('Please complete this application completely. At any time you can save your progress, the "save button" is in the bottom right of the page. When you are satisfied with your application please file a support ticket here:
<a href="http://obelismedia.com/support/">Support Portal</a>', 'options_check'),
		'class' => 'instructions',
		'type' => 'info');
					
	$options[] = array(
		'name' => __('Basic Practice Info', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Practice/Company Name', 'options_check'),
		'desc' => __('Your Full Company Name', 'options_check'),
		'id' => 'company_name',
		'std' => '',
		'type' => 'text');

/*
	$options[] = array(
		'name' => __('Primary Contact Name', 'options_check'),
		'desc' => __('Primary Contact Full Name', 'options_check'),
		'id' => 'contact_name',
		'std' => '',
		'type' => 'text');
*/
		
	$options[] = array(
		'name' => __('Slogan', 'options_check'),
		'desc' => __('Your Company\'s Slogan ', 'options_check'),
		'id' => 'slogan',
		'std' => 'Your Goal Is Our Goal "Better Hearing"!',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Domain Name', 'options_check'),
		'desc' => __('Domain name of your current website if you have one.', 'options_check'),
		'id' => 'domain_name',
		'std' => 'http://example.com',
		'type' => 'text');
		
		
	$options[] = array(
		'name' => __('Practice Location(s)', 'options_check'),
		'type' => 'heading');


// Main Office
	$options[] = array(
		'name' => __('Main Office', 'options_check'),
		'desc' => __('Details about your main/first office location.', 'options_check'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Main phone number for this location.', 'options_check'),
		'id' => 'main_phone_number',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Secondary Phone Number', 'options_check'),
		'desc' => __('Secondary or 800 number for this location. Leave blank if none.', 'options_check'),
		'id' => 'main_secondary_phone_number',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
								
	$options[] = array(
		'name' => __('Plaza Name', 'options_check'),
		'desc' => __('If your practice is located in a plaza enter the plaza name here if you want it displayed.', 'options_check'),
		'id' => 'main_plaza',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Street Address', 'options_check'),
		'desc' => __('Street Address', 'options_check'),
		'id' => 'street_address',
		'std' => 'street_address',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Street Address Second Line', 'options_check'),
		'desc' => __('Street Address Second Line', 'options_check'),
		'id' => 'street_address_second_line',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('City', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'main_city',
		'std' => 'main_city',
		'type' => 'text');

	$options[] = array(
		'name' => __('State', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'main_state',
		'std' => 'main_state',
		'type' => 'text');

	$options[] = array(
		'name' => __('Zip', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'main_zip',
		'std' => 'Default Value',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Google+ Local Page', 'options_check'),
		'desc' => __('Google+ Local Page for this location', 'options_check'),
		'id' => 'main_g',
		'std' => '',
		'type' => 'text');
			
// Second Office
	$options[] = array(
		'name' => __('Do you have a second office?', 'options_check'),
		'desc' => __('Yes, I agree to pay $49/month to have this office optimized.', 'options_check'),
		'id' => 'show_second_office',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Second Office', 'options_check'),
		'desc' => __('Details about your second office location if you have one.', 'options_check'),
		'class' => 'hidden second-office-hide',
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Phone Number', 'options_check'),
		'id' => 'second_phone_number',
		'std' => '',
		'class' => 'mini hidden second-office-hide',
		'type' => 'text');
						
	$options[] = array(
		'name' => __('Plaza Name', 'options_check'),
		'desc' => __('If your practice is located in a plaza enter the plaza name here if you want it displayed.', 'options_check'),
		'id' => 'second_plaza',
		'std' => '',
		'class' => 'hidden second-office-hide',
		'type' => 'text');
						
	$options[] = array(
		'name' => __('Street Address', 'options_check'),
		'desc' => __('Street Address', 'options_check'),
		'id' => 'second_street_address',
		'std' => 'second_street_address',
		'class' => 'hidden second-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('City', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'second_city',
		'std' => 'Default Value',
		'class' => 'hidden second-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('State', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'second_state',
		'std' => 'Default Value',
		'class' => 'hidden second-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Zip', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'second_zip',
		'std' => 'Default Value',
		'class' => 'hidden second-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Google+ Local Page', 'options_check'),
		'desc' => __('Google+ Local Page for this location', 'options_check'),
		'id' => 'second_g',
		'std' => '',
		'class' => 'hidden second-office-hide',
		'type' => 'text');
		
// Third Office
	$options[] = array(
		'name' => __('Do you have a third office?', 'options_check'),
		'desc' => __('Yes, I agree to pay $49/month to have this office optimized.', 'options_check'),
		'id' => 'show_third_office',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Third Office', 'options_check'),
		'desc' => __('Details about your third office location if you have one.', 'options_check'),
		'class' => 'hidden third-office-hide',
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Phone Number', 'options_check'),
		'id' => 'third_phone_number',
		'std' => '',
		'class' => 'mini hidden third-office-hide',
		'type' => 'text');
						
	$options[] = array(
		'name' => __('Plaza Name', 'options_check'),
		'desc' => __('If your practice is located in a plaza enter the plaza name here if you want it displayed.', 'options_check'),
		'id' => 'third_plaza',
		'std' => '',
		'class' => 'hidden third-office-hide',
		'type' => 'text');
						
	$options[] = array(
		'name' => __('Street Address', 'options_check'),
		'desc' => __('Street Address', 'options_check'),
		'id' => 'third_street_address',
		'std' => 'third_street_address',
		'class' => 'hidden third-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('City', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'third_city',
		'std' => 'Default Value',
		'class' => 'hidden third-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('State', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'third_state',
		'std' => 'Default Value',
		'class' => 'hidden third-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Zip', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'third_zip',
		'std' => 'Default Value',
		'class' => 'hidden third-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google+ Local Page', 'options_check'),
		'desc' => __('Google+ Local Page for this location', 'options_check'),
		'id' => 'third_g',
		'std' => '',
		'class' => 'hidden third-office-hide',
		'type' => 'text');

// Fourth Office
	$options[] = array(
		'name' => __('Do you have a fourth office?', 'options_check'),
		'desc' => __('Yes, I agree to pay $49/month to have this office optimized.', 'options_check'),
		'id' => 'show_fourth_office',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('fourth Office', 'options_check'),
		'desc' => __('Details about your fourth office location if you have one.', 'options_check'),
		'class' => 'hidden fourth-office-hide',
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Phone Number', 'options_check'),
		'id' => 'fourth_phone_number',
		'std' => '',
		'class' => 'mini hidden fourth-office-hide',
		'type' => 'text');
										
	$options[] = array(
		'name' => __('Plaza Name', 'options_check'),
		'desc' => __('If your practice is located in a plaza enter the plaza name here if you want it displayed.', 'options_check'),
		'id' => 'fourth_plaza',
		'std' => '',
		'class' => 'hidden fourth-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Street Address', 'options_check'),
		'desc' => __('Street Address', 'options_check'),
		'id' => 'fourth_street_address',
		'std' => 'fourth_street_address',
		'class' => 'hidden fourth-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('City', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'fourth_city',
		'std' => 'Default Value',
		'class' => 'hidden fourth-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('State', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'fourth_state',
		'std' => 'Default Value',
		'class' => 'hidden fourth-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Zip', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'fourth_zip',
		'std' => 'Default Value',
		'class' => 'hidden fourth-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google+ Local Page', 'options_check'),
		'desc' => __('Google+ Local Page for this location', 'options_check'),
		'id' => 'fourth_g',
		'std' => '',
		'class' => 'hidden fourth-office-hide',
		'type' => 'text');
		
// fifth Office
	$options[] = array(
		'name' => __('Do you have a fifth office?', 'options_check'),
		'desc' => __('Yes, I agree to pay $49/month to have this office optimized.', 'options_check'),
		'id' => 'show_fifth_office',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('fifth Office', 'options_check'),
		'desc' => __('Details about your fifth office location if you have one.', 'options_check'),
		'class' => 'hidden fifth-office-hide',
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Phone Number', 'options_check'),
		'id' => 'fifth_phone_number',
		'std' => '',
		'class' => 'mini hidden fifth-office-hide',
		'type' => 'text');
						
	$options[] = array(
		'name' => __('Plaza Name', 'options_check'),
		'desc' => __('If your practice is located in a plaza enter the plaza name here if you want it displayed.', 'options_check'),
		'id' => 'fifth_plaza',
		'std' => '',
		'class' => 'hidden fifth-office-hide',
		'type' => 'text');
						
	$options[] = array(
		'name' => __('Street Address', 'options_check'),
		'desc' => __('Street Address', 'options_check'),
		'id' => 'fifth_street_address',
		'std' => 'fifth_street_address',
		'class' => 'hidden fifth-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('City', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'fifth_city',
		'std' => 'Default Value',
		'class' => 'hidden fifth-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('State', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'fifth_state',
		'std' => 'Default Value',
		'class' => 'hidden fifth-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Zip', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'fifth_zip',
		'std' => 'Default Value',
		'class' => 'hidden fifth-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Google+ Local Page', 'options_check'),
		'desc' => __('Google+ Local Page for this location', 'options_check'),
		'id' => 'fifth_g',
		'std' => '',
		'class' => 'hidden fifth-office-hide',
		'type' => 'text');
		
// sixth Office
	$options[] = array(
		'name' => __('Do you have a sixth office?', 'options_check'),
		'desc' => __('Yes, I agree to pay $49/month to have this office optimized.', 'options_check'),
		'id' => 'show_sixth_office',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('sixth Office', 'options_check'),
		'desc' => __('Details about your sixth office location if you have one.', 'options_check'),
		'class' => 'hidden sixth-office-hide',
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Phone Number', 'options_check'),
		'id' => 'sixth_phone_number',
		'std' => '',
		'class' => 'mini hidden sixth-office-hide',
		'type' => 'text');
						
	$options[] = array(
		'name' => __('Plaza Name', 'options_check'),
		'desc' => __('If your practice is located in a plaza enter the plaza name here if you want it displayed.', 'options_check'),
		'id' => 'sixth_plaza',
		'std' => '',
		'class' => 'hidden sixth-office-hide',
		'type' => 'text');
						
	$options[] = array(
		'name' => __('Street Address', 'options_check'),
		'desc' => __('Street Address', 'options_check'),
		'id' => 'sixth_street_address',
		'std' => 'sixth_street_address',
		'class' => 'hidden sixth-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('City', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'sixth_city',
		'std' => 'Default Value',
		'class' => 'hidden sixth-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('State', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'sixth_state',
		'std' => 'Default Value',
		'class' => 'hidden sixth-office-hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Zip', 'options_check'),
		'desc' => __('A text input field.', 'options_check'),
		'id' => 'sixth_zip',
		'std' => 'Default Value',
		'class' => 'hidden sixth-office-hide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Google+ Local Page', 'options_check'),
		'desc' => __('Google+ Local Page for this location', 'options_check'),
		'id' => 'sixth_g',
		'std' => '',
		'class' => 'hidden sixth-office-hide',
		'type' => 'text');
				
// extra stuff		
/*
	$options[] = array(
		'name' => __('Textarea', 'options_check'),
		'desc' => __('Textarea description.', 'options_check'),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Input Select Small', 'options_check'),
		'desc' => __('Small Select Box.', 'options_check'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Select Wide', 'options_check'),
		'desc' => __('A wider select box.', 'options_check'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Select a Category', 'options_check'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'options_check'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);
		
	$options[] = array(
		'name' => __('Select a Tag', 'options_check'),
		'desc' => __('Passed an array of tags with term_id and term_name', 'options_check'),
		'id' => 'example_select_tags',
		'type' => 'select',
		'options' => $options_tags);

	$options[] = array(
		'name' => __('Select a Page', 'options_check'),
		'desc' => __('Passed an pages with ID and post_title', 'options_check'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'options_check'),
		'desc' => __('Radio select with default options "one".', 'options_check'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Example Info', 'options_check'),
		'desc' => __('This is just some example information you can put in the panel.', 'options_check'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Input Checkbox', 'options_check'),
		'desc' => __('Example checkbox, defaults to true.', 'options_check'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');
*/	

// Images Tab
	$options[] = array(
		'name' => __('Image Uploads', 'options_check'),
		'type' => 'heading');

		
	$options[] = array(
		'name' => __('Images Uploads', 'options_check'),
		'desc' => __('Upload any images you would like to include on your site.', 'options_check'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Logo', 'options_check'),
		'desc' => __('Upload your Company\'s logo.', 'options_check'),
		'id' => 'logo_upload',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Patient Forms', 'options_check'),
		'desc' => __('Upload your first form', 'options_check'),
		'id' => 'form-one_upload',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Patient Forms', 'options_check'),
		'desc' => __('Upload your second form (if you have one)', 'options_check'),
		'id' => 'form-two_upload',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Patient Forms', 'options_check'),
		'desc' => __('Upload your third form (if you have one)', 'options_check'),
		'id' => 'form-three_upload',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Miscellaneous Images', 'options_check'),
		'desc' => __('Upload any image you would like added to your site', 'options_check'),
		'id' => 'misc_upload',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Miscellaneous Images', 'options_check'),
		'desc' => __('Upload another image you would like added to your site', 'options_check'),
		'id' => 'misc-two_upload',
		'type' => 'upload');
		
// Video Tab
	$options[] = array(
		'name' => __('Videos', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Instructions', 'options_check'),
		'desc' => __('Enter the full URL of the YouTube you\'d like included on your site. Ex. http://www.youtube.com/watch?v=4w_eHBPMCas', 'options_check'),
		'class' => '',
		'type' => 'info');		

	$options[] = array(
		'name' => __('Video One', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'video_1',
		'std' => 'http://www.youtube.com/watch?v=00000000',
		'type' => 'text');

	$options[] = array(
		'name' => __('Video Two', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'video_2',
		'std' => 'http://www.youtube.com/watch?v=00000000',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Video Three', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'video_3',
		'std' => 'http://www.youtube.com/watch?v=00000000',
		'type' => 'text');
								
// Practice Tab
	$options[] = array(
		'name' => __('About Your Practice ', 'options_check'),
		'type' => 'heading');

		
	$options[] = array(
		'name' => __('Services', 'options_check'),
		'desc' => __('', 'options_check'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Services', 'options_check'),
		'desc' => __('Check the services you provide.', 'options_check'),
		'id' => 'services-boxes',
		'type' => 'multicheck',
		'options' => $services_array);

/// Employees section
	$options[] = array(
		'name' => __('About Your Employees ', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Bio Page Style', 'options_check'),
		'desc' => __('Please leave this option set to default, one of out technicians will select the most appropriate option.', 'options_check'),
		'id' => 'bio_options',
		'type' => 'select',
		'options' => $bio_options);
			
	$options[] = array(
		'name' => __('Bios', 'options_check'),
		'desc' => __('', 'options_check'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Owner Headshot', 'options_check'),
		'desc' => __('Owner Headshot.', 'options_check'),
		'id' => 'owner_headshot',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Owner/Dr. Name', 'options_check'),
		'desc' => __('Include post-nominal letters (ie. Jane Doe, AuD)', 'options_check'),
		'id' => 'owner_name',
		'std' => 'Jane Doe, AuD',
		'type' => 'text');

	$options[] = array(
		'name' => __('Owner/Dr. Title', 'options_check'),
		'desc' => __('Practice Title (ie. Doctor of Audiology', 'options_check'),
		'id' => 'owner_title',
		'std' => 'Doctor of Audiology',
		'type' => 'text');

	$options[] = array(
		'name' => __('Owner/Dr. School', 'options_check'),
		'desc' => __('Owner/Dr. School', 'options_check'),
		'id' => 'owner_school',
		'std' => 'School',
		'type' => 'text');

	$options[] = array(
		'name' => __('Owner/Dr. School Graduation Year', 'options_check'),
		'desc' => __('Owner/Dr. School Graduation Year', 'options_check'),
		'id' => 'owner_school_year',
		'std' => 'Year',
		'type' => 'text');


	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Owner/Dr. Bio', 'options_check'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_check' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'owner_bio',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Organizations', 'options_check'),
		'desc' => __('Check the organizations this employee belongs to.', 'options_check'),
		'id' => 'organizations_owner',
		'type' => 'multicheck',
		'options' => $organizations_one_array);	
	
			
		/******/
	$options[] = array(
		'name' => __('Do you have another employee?', 'options_check'),
		'desc' => __('Check box to fill in the details about this employee', 'options_check'),
		'id' => 'show_first_employee',
		'type' => 'checkbox');
					
	$options[] = array(
		'name' => __('Employee 1 Headshot', 'options_check'),
		'desc' => __('Employee 1 Headshot.', 'options_check'),
		'id' => 'employee_one_headshot',
		'class' => 'hidden first_employee_hide',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Employee 1 Name', 'options_check'),
		'desc' => __('Include post-nominal letters (ie. Jane Doe, AuD)', 'options_check'),
		'id' => 'employee_one_name',
		'std' => '',
		'class' => 'hidden first_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 1 Title', 'options_check'),
		'desc' => __('Practice Title (ie. Doctor of Audiology', 'options_check'),
		'id' => 'employee_one_title',
		'std' => '',
		'class' => 'hidden first_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 1 School', 'options_check'),
		'desc' => __('Employee 1 School', 'options_check'),
		'id' => 'employee_one_school',
		'std' => '',
		'class' => 'hidden first_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 1 School Graduation Year', 'options_check'),
		'desc' => __('Employee 1 School Graduation Year', 'options_check'),
		'id' => 'employee_one_school_year',
		'std' => '',
		'class' => 'hidden first_employee_hide',
		'type' => 'text');

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Employee 1 Bio', 'options_check'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_check' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'employee_one_bio',
		'type' => 'editor',
		'class' => 'hidden first_employee_hide',
		'settings' => $wp_editor_settings );
	
	$options[] = array(
		'name' => __('Organizations', 'options_check'),
		'desc' => __('Check the organizations this employee belongs to.', 'options_check'),
		'id' => 'organizations_one',
		'type' => 'multicheck',
		'class' => 'hidden first_employee_hide',
		'options' => $organizations_one_array);	
	
	/*******/
						
				
	$options[] = array(
		'name' => __('Do you have another employee?', 'options_check'),
		'desc' => __('Check box to fill in the details about this employee', 'options_check'),
		'id' => 'show_second_employee',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Employee 2 Headshot', 'options_check'),
		'desc' => __('Employee 2 Headshot.', 'options_check'),
		'id' => 'employee_two_headshot',
		'class' => 'hidden second_employee_hide',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Employee 2 Name', 'options_check'),
		'desc' => __('Include post-nominal letters (ie. Jane Doe, AuD)', 'options_check'),
		'id' => 'employee_two_name',
		'std' => '',
		'class' => 'hidden second_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 2 Title', 'options_check'),
		'desc' => __('Practice Title (ie. Doctor of Audiology', 'options_check'),
		'id' => 'employee_two_title',
		'std' => '',
		'class' => 'hidden second_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 2 School', 'options_check'),
		'desc' => __('Employee 2 School', 'options_check'),
		'id' => 'employee_two_school',
		'std' => '',
		'class' => 'hidden second_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 2 School Graduation Year', 'options_check'),
		'desc' => __('Employee 2 School Graduation Year', 'options_check'),
		'id' => 'employee_two_school_year',
		'std' => '',
		'class' => 'hidden second_employee_hide',
		'type' => 'text');

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Employee 2 Bio', 'options_check'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_check' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'employee_two_bio',
		'type' => 'editor',
		'class' => 'hidden second_employee_hide',
		'settings' => $wp_editor_settings );
	
	/*******/


	$options[] = array(
		'name' => __('Do you have another employee?', 'options_check'),
		'desc' => __('Check box to fill in the details about this employee', 'options_check'),
		'id' => 'show_third_employee',
		'type' => 'checkbox');
						
	$options[] = array(
		'name' => __('Employee 3 Headshot', 'options_check'),
		'desc' => __('Employee 3 Headshot.', 'options_check'),
		'id' => 'employee_three_headshot',
		'class' => 'hidden third_employee_hide',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Employee 3 Name', 'options_check'),
		'desc' => __('Include post-nominal letters (ie. Jane Doe, AuD)', 'options_check'),
		'id' => 'employee_three_name',
		'std' => '',
		'class' => 'hidden third_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 3 Title', 'options_check'),
		'desc' => __('Practice Title (ie. Doctor of Audiology', 'options_check'),
		'id' => 'employee_three_title',
		'std' => '',
		'class' => 'hidden third_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 3 School', 'options_check'),
		'desc' => __('Employee 3 School', 'options_check'),
		'id' => 'employee_three_school',
		'std' => '',
		'class' => 'hidden third_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 3 School Graduation Year', 'options_check'),
		'desc' => __('Employee 3 School Graduation Year', 'options_check'),
		'id' => 'employee_three_school_year',
		'std' => '',
		'class' => 'hidden third_employee_hide',
		'type' => 'text');

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Employee 3 Bio', 'options_check'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_check' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'employee_three_bio',
		'type' => 'editor',
		'class' => 'hidden third_employee_hide',
		'settings' => $wp_editor_settings );


/*******/



	$options[] = array(
		'name' => __('Do you have another employee?', 'options_check'),
		'desc' => __('Check box to fill in the details about this employee', 'options_check'),
		'id' => 'show_fourth_employee',
		'type' => 'checkbox');
						
	$options[] = array(
		'name' => __('Employee 4 Headshot', 'options_check'),
		'desc' => __('Employee 4 Headshot.', 'options_check'),
		'id' => 'employee_fourth_headshot',
		'class' => 'hidden fourth_employee_hide',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Employee 4 Name', 'options_check'),
		'desc' => __('Include post-nominal letters (ie. Jane Doe, AuD)', 'options_check'),
		'id' => 'employee_fourth_name',
		'std' => '',
		'class' => 'hidden fourth_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 4 Title', 'options_check'),
		'desc' => __('Practice Title (ie. Doctor of Audiology', 'options_check'),
		'id' => 'employee_fourth_title',
		'std' => '',
		'class' => 'hidden fourth_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 4 School', 'options_check'),
		'desc' => __('Employee 4 School', 'options_check'),
		'id' => 'employee_fourth_school',
		'std' => '',
		'class' => 'hidden fourth_employee_hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Employee 4 School Graduation Year', 'options_check'),
		'desc' => __('Employee 4 School Graduation Year', 'options_check'),
		'id' => 'employee_fourth_school_year',
		'std' => '',
		'class' => 'hidden fourth_employee_hide',
		'type' => 'text');

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Employee 4 Bio', 'options_check'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_check' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'employee_fourth_bio',
		'type' => 'editor',
		'class' => 'hidden fourth_employee_hide',
		'settings' => $wp_editor_settings );

	/*******/
// HIPAA		
	$options[] = array(
		'name' => __('HIPAA Information', 'options_check'),
		'type' => 'heading');

/* Donain Name */
	$options[] = array(
		'name' => __('HIPAA Information', 'options_check'),
		'desc' => __('', 'options_check'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Domain Name', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'hippa_domain_name',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
		
	$options[] = array(
		'name' => __('Company\'s Full Legal Name', 'options_check'),
		'desc' => __('Include DBA if applicable', 'options_check'),
		'id' => 'hippa_company_name',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Privacy Officer\'s Name', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'hippa_privacy_officer_name',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Privacy Officer\'s Email', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'hippa_privacy_officer_email',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Privacy Officer\'s Phone Number', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'hippa_privacy_officer_phone',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Privacy Officer\'s Mailing Address', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'hippa_privacy_officer_address',
		'std' => '',
		'class' => '',
		'type' => 'textarea');	


/*******/
// Testamonials		
	$options[] = array(
		'name' => __('Patient Testimonials', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Patient testimonial', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'testimonial1',
		'std' => '',
		'class' => '',
		'type' => 'textarea');			
	
	$options[] = array(
		'name' => __('Patient testimonial', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'testimonial2',
		'std' => '',
		'class' => '',
		'type' => 'textarea');			
	
	$options[] = array(
		'name' => __('Patient testimonial', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'testimonial3',
		'std' => '',
		'class' => '',
		'type' => 'textarea');			
	
	$options[] = array(
		'name' => __('Patient testimonial', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'testimonial4',
		'std' => '',
		'class' => '',
		'type' => 'textarea');			
	
	$options[] = array(
		'name' => __('Patient testimonial', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'testimonial5',
		'std' => '',
		'class' => '',
		'type' => 'textarea');			
	
	$options[] = array(
		'name' => __('Patient testimonial', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'testimonial6',
		'std' => '',
		'class' => '',
		'type' => 'textarea');			
							
		
// Social Tab		
	$options[] = array(
		'name' => __('Social Media & Accounts', 'options_check'),
		'type' => 'heading');

/* Donain Name */
	$options[] = array(
		'name' => __('Domain Name', 'options_check'),
		'desc' => __('The company that your domain name is registered with (ex: godaddy.com or networksolutions.com).', 'options_check'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Domain Name Registrar', 'options_check'),
		'desc' => __('The company that your domain name is registered with (ex: godaddy.com or networksolutions.com).', 'options_check'),
		'id' => 'domain_registrar',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Domain Name Registrar User name', 'options_check'),
		'desc' => __('The user name for your domain registrar.).', 'options_check'),
		'id' => 'domain_user',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Domain Name Registrar Password', 'options_check'),
		'desc' => __('The password for your domain registrar.).', 'options_check'),
		'id' => 'domain_pass',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

/* Donain Name */
	$options[] = array(
		'name' => __('Email Account', 'options_check'),
		'desc' => __('', 'options_check'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Email Hosting', 'options_check'),
		'desc' => __('Where is your email currently hosted?', 'options_check'),
		'id' => 'email_account',
		'std' => 'one',
		'type' => 'radio',
		'options' => $email);		
		
	$options[] = array(
		'name' => __('Social Media', 'options_check'),
		'desc' => __('The company that your domain name is registered with (ex: godaddy.com or networksolutions.com).', 'options_check'),
		'type' => 'info');
		
/* Twitter */
	$options[] = array(
		'name' => __('Twitter Profile', 'options_check'),
		'desc' => __('Do you already have a <strong>Twitter</strong> account?', 'options_check'),
		'id' => 'twitter_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $twitter);

	$options[] = array(
		'name' => __('Twitter Username', 'options_check'),
		'desc' => __('The twitter user name (ie the @yourname).', 'options_check'),
		'id' => 'twiter_user',
		'std' => '',
		'class' => 'mini twitter_hidden hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter Password', 'options_check'),
		'desc' => __('The password you use to log into twitter.', 'options_check'),
		'id' => 'twiter_pass',
		'std' => '',
		'class' => 'mini twitter_hidden hidden',
		'type' => 'text');

/* Facebook */
	$options[] = array(
		'name' => __('Facebook Page', 'options_check'),
		'desc' => __('Do you already have a <strong>Facebook</strong> Page?', 'options_check'),
		'id' => 'facebook_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $facebook);

	$options[] = array(
		'name' => __('Facebook instructions', 'options_check'),
		'desc' => __('
					Please follow these instructions to add us as an administrator to your Facebook page in order to allow us to manage your page.
					
					Steps for Making "Riley Poole" an Administrator
					<ol>
					<li>Go into your company\'s page.</li>
					<li>Go into "Edit Page" in the top right-hand corner.</li>
					<li>In the drop-down menu, click "Admin Roles."</li>
					<li>In the blank box under the original admin (you), type in riley@obelismedia.com to add Riley Poole as an Admin (Manager).</li>
					</ol>
		', 'options_check'),
		'id' => 'facebook_user',
		'std' => '',
		'class' => 'mini facebook_hidden hidden',
		'type' => 'info');

/* Google + */
	$options[] = array(
		'name' => __('Google+ Local', 'options_check'),
		'desc' => __('Do you already have a <strong>Google+ Local</strong> page?', 'options_check'),
		'id' => 'google_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $google);

	$options[] = array(
		'name' => __('Google+ Local Username', 'options_check'),
		'desc' => __('The Google+ Local user name (will most likely be a gmail address).', 'options_check'),
		'id' => 'google_user',
		'std' => '',
		'class' => 'mini google_hidden hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google+ Local Password', 'options_check'),
		'desc' => __('The password you use to log into Google+ Local page.', 'options_check'),
		'id' => 'google_pass',
		'std' => '',
		'class' => 'mini google_hidden hidden',
		'type' => 'text');
	
		
	$options[] = array(
		'name' => __('Facebook Page Address', 'options_check'),
		'desc' => __('Please enter the full URL of your Facebook Page. Starting with "http://". Leave this blank of you don\'t yet have a Facebook page.', 'options_check'),
		'id' => 'facebook_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Twitter Profile Address', 'options_check'),
		'desc' => __('Please enter the full URL of your Twitter profile. Starting with "http://". Leave this blank of you don\'t yet have a Twitter profile.', 'options_check'),
		'id' => 'twitter_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Google+ Address', 'options_check'),
		'desc' => __('Please enter the full URL of your Google+ page. Starting with "http://". Leave this blank of you don\'t yet have a Google+ page.', 'options_check'),
		'id' => 'google_plus_url',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
				
		
// SEO Tab		
	$options[] = array(
		'name' => __('SEO Information', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Owner Cell Number', 'options_check'),
		'desc' => __('Please supply a cell number that can receive text messages. Verification codes use to establish online listings from companies like Google, Bing and Yahoo will be sent to this cell number. We\'ll provide instructions about where to send any codes that you receive. ', 'options_check'),
		'id' => 'cell_phone_number',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
/*
		
		// Advanced Tab
	$options[] = array(
		'name' => __('Advanced Settings', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'options_check'),
		'desc' => __('Click here and see what happens.', 'options_check'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');
*/

/*
	$options[] = array(	
		'id' => 'example_text_hidden',
		'type' => 'info_hide_top');
		

	$options[] = array(
		'name' => __('Your Name', 'options_check'),
		'desc' => __('Your Full Company Name', 'options_check'),
		'id' => 'your_name',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('My Name', 'options_check'),
		'desc' => __('Your Full Company Name', 'options_check'),
		'id' => 'my_name',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'type' => 'info_hide_bottom');
*/
/*
		
		
	$options[] = array(
		'name' => __('Hidden Text Input', 'options_check'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'options_check'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Hidden Text Input', 'options_check'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'options_check'),
		'id' => 'example_text_hidden2',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');
		
*/
		
/******      **********/
/*
	$options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'options_check'),
		'desc' => __('Click here and see what happens.', 'options_check'),
		'id' => 'example_showhidden2',
		'type' => 'checkbox');
				
	$options[] = array(
		'name' => __('Hidden Text Input', 'options_check'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'options_check'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden two',
		'type' => 'text');

	$options[] = array(
		'name' => __('Hidden Text Input', 'options_check'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'options_check'),
		'id' => 'example_text_hidden2',
		'std' => 'Hello',
		'class' => 'hidden two',
		'type' => 'text');


	$options[] = array(
		'name' => __('Uploader Test', 'options_check'),
		'desc' => __('This creates a full size uploader that previews the image.', 'options_check'),
		'id' => 'example_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
		'2c-r-fixed' => $imagepath . '2cr.png')
	);

	$options[] = array(
		'name' =>  __('Example Background', 'options_check'),
		'desc' => __('Change the background CSS.', 'options_check'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'options_check'),
		'desc' => __('Multicheck description.', 'options_check'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);

	$options[] = array(
		'name' => __('Colorpicker', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );
		
	$options[] = array( 'name' => __('Typography', 'options_check'),
		'desc' => __('Example typography.', 'options_check'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );
		
	$options[] = array(
		'name' => __('Custom Typography', 'options_check'),
		'desc' => __('Custom typography options.', 'options_check'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );
*/

// Advanced Tab
/*
	$options[] = array(
		'name' => __('Text Editor', 'options_check'),
		'type' => 'heading' );
*/

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

/*
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Default Text Editor', 'options_check'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_check' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
*/

// Style Tab
	$options[] = array(
		'name' => __('Style', 'options_check'),
		'type' => 'heading' );
		
	$options[] = array(
		'name' => __('Style Options', 'options_check'),
		'desc' => __('<h3>Feel free to skip this section entirely, our design team will happily complete this.</h3>', 'options_check'),
		'type' => 'info');
				
	$options[] = array(
		'name' => __('Display Hearing test Button', 'options_check'),
		'desc' => __('Check to display a hearing test button on header.', 'options_check'),
		'id' => 'display_test',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Display Slogan', 'options_check'),
		'desc' => __('Check to display your Company Name and Slogan in header Area', 'options_check'),
		'id' => 'display_slogan',
		'std' => '1',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Display Logo', 'options_check'),
		'desc' => __('Check to display your logo in the header area', 'options_check'),
		'id' => 'display_logo',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Display Full Address in Header', 'options_check'),
		'desc' => __('Check to display your Full Address in Header Area', 'options_check'),
		'id' => 'display_full_address',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Display "X locations" tag line', 'options_check'),
		'desc' => __('Check to display "With X Locations To Serve You" instead of each address', 'options_check'),
		'id' => 'display_x_locations',
		'std' => '0',
		'type' => 'checkbox');	

	$options[] = array(
		'name' => __('Display intro line', 'options_check'),
		'desc' => __('Check to display intro line below banner.', 'options_check'),
		'id' => 'display_intro',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Custom Intro line', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'intro_custom',
		'std' => '',
		'class' => '',
		'type' => 'textarea');
								
	$options[] = array(
		'name' => __('Primary Color', 'options_check'),
		'desc' => __('Use ColorPicker or Type Hex Color, (ie&nbsp;#333333)
		Or choose 00000 and leave the color decisions in our hands.', 'options_check'),
		'id' => 'primary_color',
		'std' => '#333333',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Secondary Color', 'options_check'),
		'desc' => __('Use ColorPicker or Type Hex Color, (ie&nbsp;#666666)
		Or choose 00000 and leave the color decisions in our hands.', 'options_check'),
		'id' => 'secondary_color',
		'std' => '#666666',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Body Background Color', 'options_check'),
		'desc' => __('Use ColorPicker or Type Hex Color, (ie&nbsp;#666666)
		Or choose 00000 and leave the color decisions in our hands.', 'options_check'),
		'id' => 'body_background_color',
		'std' => '#E1E1E1',
		'type' => 'color' );
		
	// Generated list of stylesheets in the "CSS" directory
	// Use template_directory paths if you're using a parent theme
		
/*
	$alt_stylesheets = options_stylesheets_get_file_list(
		get_stylesheet_directory() . '/css/enqueued/', // $directory_path
		'css', // $filetype
		get_stylesheet_directory_uri() . '/css/enqueued/' // $directory_uri
	);
	
	$options[] = array( 
		"name" => "Theme Style",
		"desc" => 'In this example the css files in the "css" directory are automatically loaded into the option.',
		"id" => "auto_stylesheet",
		"type" => "select",
		"options" => $alt_stylesheets );
*/
		
	// Defined Stylesheet Paths
	// Use get_template_directory_uri if it's a parent theme
		
	$defined_stylesheets = array(
		"0" => "Default", // There is no "default" stylesheet to load
		get_stylesheet_directory() . '/css/enqueued/new_style.php' => "New Style",
		'/css/ebright/skin-four.css' => "ebright",
		'/css/cadem/styles.css' => "cadem",
		'/css/pei/styles.css' => "pei"		
	);
	
	$options[] = array( "name" => "Select a Stylesheet to be Loaded",
		"desc" => "This is a manually defined list of stylesheets.",
		"id" => "stylesheet",
		"std" => "0",
		"type" => "select",
		"options" => $defined_stylesheets );

	$options[] = array(
		'name' => __('Upgrades', 'options_check'),
		'type' => 'heading' );
		
	$options[] = array(
		'name' => __('Account Upgrades', 'options_check'),
		'desc' => __('If you are interested in any of the following:
					<ul>
					<li>Branded Email Accounts (ie yourname@yourdomain.com).</li>
					<li>Online Review Management.</li>
					<li>Google Adwords.</li>
					<li>Additional Optimized Locations.</li>
					</ul>
					Fill out a support ticket here: <a href="http://obelismedia.com/support/">Support Portal</a>
		', 'options_check'),
		'id' => 'upgrades',
		'std' => '',
		'class' => '',
		'type' => 'info');
		
	return $options;
}