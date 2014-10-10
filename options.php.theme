<?php

function optionsframework_option_name() {
    // This gets the theme name from the stylesheet
    //$themename = wp_get_theme();
    //$themename = preg_replace("/W/", "_", strtolower($themename) );
    $themename = 'openmind';

    $optionsframework_settings = get_option( 'optionsframework' );
    $optionsframework_settings['id'] = $themename;
    update_option( 'optionsframework', $optionsframework_settings );
}


function optionsframework_options() {

    $options[] = array(
         'name' => __('General settings', 'options_framework_theme'),
         'type' => 'heading');

    $options[] = array(
         'name' => __('Title page header', 'options_check'),
         'desc' => __('Title page header. Using span tag for the secondary color. Example: Open &lt;span&gt; Mind &lt;/span&gt;.', 'options_check'),
         'id' => 'title_header',
         'std' => 'Open <span> Mind </span>',
         'type' => 'textarea');

    $options[] = array(
        'name' => __('Show Options Theme', 'options_framework_theme'),
        'desc' => __('Show the panel customization template?', 'options_framework_theme'),
        'id' => 'om_show_options_panel',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
         'name' => __('Category for Portfolio', 'options_check'),
         'desc' => __('Items in this category shall be as shown in the portfolio section.', 'options_check'),
         'id' => 'om_portfolio_category',
         'std' => 'Portfolio',
         'type' => 'text');

    $tags = get_tags();
    $tags_options = array();

    foreach ($tags as $tag) {
        $tags_options[$tag->slug] = __($tag->name, 'options_framework_theme');
    };

    $options[] = array(
        'name' => __('Portfolio Tags', 'options_framework_theme'),
        'desc' => __('List of tags to display in the portfolio section. They are used as filters.', 'options_framework_theme'),
        'id' => 'tags_portfolio',
        'type' => 'multicheck',
        'options' => $tags_options);

    // HOME PAGE

    $options[] = array(
         'name' => __('Home Options', 'options_framework_theme'),
         'type' => 'heading');


    $options[] = array(
        'name' => __('Display Latest Post', 'options_framework_theme'),
        'desc' => __('Show the last posts on the home page?', 'options_framework_theme'),
        'id' => 'om_display_lates_post_home',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
         'name' => __('Title latest post', 'options_check'),
         'desc' => __('Title for latest post section.', 'options_check'),
         'id' => 'om_title_latest_post_home',
         'std' => 'Latest post',
         'type' => 'text');

    $categories = get_categories();
    $cat_options = array();

    foreach ($categories as $cat) {
        $cat_options[$cat->slug] = __($cat->name, 'options_framework_theme');
    };

    $options[] = array(
        'name' => __('Catogories Display', 'options_framework_theme'),
        'desc' => __('List of categories to display in the Latest Post section.', 'options_framework_theme'),
        'id' => 'om_categoties_last_posts',
        'type' => 'multicheck',
        'options' => $cat_options);


    $options[] = array(
        'name' => __('Display Latest Works', 'options_framework_theme'),
        'desc' => __('Show the last works on the home page?', 'options_framework_theme'),
        'id' => 'om_display_lates_works_home',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
         'name' => __('Title latest post', 'options_check'),
         'desc' => __('Title for latest post section.', 'options_check'),
         'id' => 'om_title_latest_works_home',
         'std' => 'Recents works',
         'type' => 'text');


    //Pestaña información de contacto
    $options[] = array(
         'name' => __('Social Icon', 'options_framework_theme'),
         'type' => 'heading' );

    $options[] = array(
         'name' => __('Twitter', 'options_check'),
         'desc' => __('Twitter icon link.', 'options_check'),
         'id' => 'om_twitter_user',
         'type' => 'text');

    $options[] = array(
         'name' => __('Google Plus', 'options_check'),
         'desc' => __('Google Plus icon link.', 'options_check'),
         'id' => 'om_google_user',
         'type' => 'text');

    $options[] = array(
         'name' => __('Instagram', 'options_check'),
         'desc' => __('Instagram icon link.', 'options_check'),
         'id' => 'om_instagram_user',
         'type' => 'text');

    $options[] = array(
         'name' => __('Facebook', 'options_check'),
         'desc' => __('Facebook icon link.', 'options_check'),
         'id' => 'om_facebook_user',
         'type' => 'text');

    $options[] = array(
         'name' => __('Pinterest', 'options_check'),
         'desc' => __('Pinterest icon link.', 'options_check'),
         'id' => 'om_pinterest_user',
         'type' => 'text');

    $options[] = array(
         'name' => __('Linkedin', 'options_check'),
         'desc' => __('Linkedin icon link.', 'options_check'),
         'id' => 'om_linkedin_user',
         'type' => 'text');

    $options[] = array(
         'name' => __('Github', 'options_check'),
         'desc' => __('Github icon link.', 'options_check'),
         'id' => 'om_github_user',
         'type' => 'text');

    return $options;
}

?>
