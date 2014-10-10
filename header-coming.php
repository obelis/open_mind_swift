<!DOCTYPE html>
<html  <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php bloginfo('name'); ?></title>

    <!-- CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" rel="stylesheet" media="screen">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/css/color-niceblue.css" rel="stylesheet" media="screen" title="default">
    <link href="<?php echo get_template_directory_uri(); ?>/css/width-full.css" rel="stylesheet" media="screen" title="default">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <![endif]-->

    <?php
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );
    ?>

    <?php wp_head(); ?>
</head>