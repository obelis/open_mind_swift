<?php
/*
 * Template Name: Home Template
 * Description: Home Template.
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content('Read More...'); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php if(of_get_option('om_display_lates_post_home','')) : ?>

<?php query_posts( array('posts_per_page' => 1, 'cat' => '-' . get_cat_ID(of_get_option('om_portfolio_category','')), ) ); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <section id="home-blog">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="section-title"><?php echo of_get_option('om_title_latest_post_home', ''); ?></h2>
                </div>
                <div class="col-md-7">
                    <section class="home-post">
                        <a href="<?php the_permalink() ?>" class="thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('home_post', array('class' => "attachment-$size, img-responsive")); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/no_image.png" class="img-responsive" alt="No image">
                            <?php endif; ?>
                        </a>
                        <h2 class="home-post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <div class="no-img"><?php echo content(100); ?></div>
                        <div class="row home-post-footer">
                            <div class="col-md-8">
                                <div class="home-post-meta">
                                    <i class="fa fa-clock-o"></i> <?php the_date(); ?> 
                                    <i class="fa fa-folder-open"></i> <?php the_category(', '); ?>
                                    <i class="fa fa-tags"></i><?php the_tags('', ', '); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-primary btn-block">Read more</a>
                            </div>
                        </div>
                    </section>
                </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query() ?>

<div class="col-md-5">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <?php
            $first_flag = true;
            $cats = of_get_option('om_categoties_last_posts','');
            if (!empty($cats)) {
                foreach ($cats as $key => $value) {
                    if ($value) {
                        $term = get_term_by('slug', $key, 'category');
                        if ($first_flag) {
                            echo ('<li class="active"><a href="#' . $term->slug . '" data-toggle="tab">' . $term->name . '</a></li>');
                             $first_flag = false;
                        }
                        else {
                            echo ('<li><a href="#' . $term->slug . '" data-toggle="tab">' . $term->name . '</a></li>');
                        }
                    }
                }
            }
        ?>
    </ul>

    <div class="tab-content">
    <?php if (!empty($cats)) : ?>
        <?php $flag = true; ?>
        <?php foreach ($cats as $key => $value) : ?>
            <?php if ($value) : ?>
                <?php $term = get_term_by('slug', $key, 'category'); ?>
                <div class="tab-pane <?php if($flag) { echo 'active'; $flag = false; } ?>" id="<?php echo $term->slug ?>">
                <?php query_posts( array('posts_per_page' => 4, 'cat' => get_category_by_slug($key)->term_id ) ); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="media">
                            <a class="pull-left" href="<?php the_permalink() ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('post_100', array('class' => "attachment-$size, img-responsive")); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/no_image_100.png" class="img-responsive" alt="No image">
                                <?php endif; ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                <p class="no-img"><?php echo excerpt(10); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php $cat_link = get_category_link( get_category_by_slug($key)->term_id ); ?> 
                    <a href="<?php echo esc_url( $cat_link ); ?>" class="btn btn-default pull-right">Read more articles</a>
                    <div class="clearfix"></div>
                <?php endif; ?>
                <?php wp_reset_query() ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php wp_reset_query() ?>
    <?php endif; ?>
    </div> <!-- tab-content -->
                    
            </div>
        </div>
    </div> <!-- container -->
</section>

<?php endif; ?>

<?php if(of_get_option('om_display_lates_works_home','')) : ?>
    <?php query_posts( array('posts_per_page' => 6, 'cat' => get_cat_ID(of_get_option('om_portfolio_category','')), ) ); ?>

    <?php if (have_posts()) : ?>
        <section id="home-works">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="section-title text-center"><?php echo of_get_option('om_title_latest_works_home', ''); ?></h2>
                    </div>
                    <?php while (have_posts()) : the_post(); ?>        
                        <div class="col-md-4 col-sm-6">
                            <div class="img-caption">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('portfolio', array('class' => "attachment-$size, img-responsive")); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/no_image_800x533.png" class="img-responsive" alt="No image">
                                <?php endif; ?>
                                <div class="caption">
                                    <div class="caption-content">
                                        <a href="<?php the_permalink() ?>" class="animated fadeInDown"><i class="fa fa-search"></i>More info</a>
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
    <?php endif; ?>
<?php endif; ?>
		<section id="home-map">
            <div class="container">
                <div class="row">
				<div class="col-md-8">
				<h2 class="section-title">Our Locations</h2>
                <?php echo do_shortcode('[map]'); ?>	
                </div>
				<div class="col-md-4">
<?php include 'location_variables.php'; ?>
<?php // Location HREF Links
    $location_url_prefix = "/our-location/hearing-aids-";
    $main_location_url = $location_url_prefix . $main_city . '-' . $main_state . '-' . $main_zip . '/';
    $main_location_url = strtolower($main_location_url);
    $second_location_url = $location_url_prefix . $second_city . '-' . $second_state . '-' . $second_zip . '/';
    $second_location_url = strtolower($second_location_url);
    $third_location_url = $location_url_prefix . $third_city . '-' . $third_state . '-' . $third_zip . '/';
    $third_location_url = strtolower($third_location_url);
?>
<?php
function phone_url($phone_number){
    $phone_number = str_replace("(", "", $phone_number);
    $phone_number = str_replace(")", "", $phone_number);
    $phone_number = str_replace("-", "", $phone_number);
    $phone_number = str_replace(".", "", $phone_number);
    $phone_number = str_replace(" ", "", $phone_number);
    return $phone_number;
}
$main_phone_url = phone_url($main_phone_number);
$second_phone_url = phone_url($second_phone_number);
$third_phone_url = phone_url($third_phone_number);
?>
<h2 class="section-title">Call us today</h2>
<p class="lead">
    <a href="<?php echo $main_location_url; ?>"><?php echo $main_city . ', ' . $main_state; ?></a><br>
    <a href="tel:+1<?php echo $main_phone_url; ?>"><?php echo $main_phone_number; ?></a>
</p>
<p class="lead">
    <a href="<?php echo $second_location_url; ?>"><?php echo $second_city . ', ' . $second_state; ?></a><br>
    <a href="tel:+1<?php echo $second_phone_url; ?>"><?php echo $second_phone_number; ?></a>
</p>
<p class="lead">
    <a href="<?php echo $third_location_url; ?>"><?php echo $third_city . ', ' . $third_state; ?></a><br>
    <a href="tel:+1<?php echo $third_phone_url; ?>"><?php echo $third_phone_number; ?></a>
</p>         
				</div>
                </div>
            </div>
		</section>
     <div class="container">
        <?php edit_post_link('edit', '<p>', '</p>'); ?>
    </div>

<?php get_footer(); ?>
