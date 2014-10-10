<?php
/*
 * Template Name: Blog Page Full
 * Description: Last Entries.
 */
?>


<?php get_header(); ?>

<header class="wrap-title">
    <div class="container">
        <h1 class="page-title">Blog</h1>

        <ol class="breadcrumb">
            <?php if(function_exists('bcn_display_list')) {
                bcn_display_list();
            } ?>
        </ol>
    </div>
</header>

<?php query_posts( array('paged' => get_query_var('paged'), 'cat' => '-' . get_cat_ID(of_get_option('om_portfolio_category','')), ) ); ?>

<?php add_filter('the_content', 'strip_images',2);

function strip_images($content){
   return preg_replace('/<img[^>]+./','',$content);
} ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="post-title"><a href="<?php the_permalink() ?>" class="transicion"><?php the_title(); ?></a></h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('blog_image', array('class' => "attachment-$size, imageborder img-responsive")); ?>
                                        <?php else: ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/no_image.png" class="img-responsive imageborder" alt="No image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo  content(140); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-lg-10 col-md-9 col-sm-8">
                                        <i class="fa fa-clock-o"></i> <?php the_date(); ?> 
                                        <i class="fa fa-user"></i> <a href="#"><?php the_author(); ?></a> 
                                        <i class="fa fa-folder-open"></i> <?php the_category(', '); ?>.
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4">
                                        <a href="<?php the_permalink() ?>" class="pull-right">Read more &raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article> <!-- post -->
                <?php endwhile;?>
            <?php else : ?>
                <p>No entries.</p>
            <?php endif; ?>

           <?php
           global $wp_query;

           $big = 999999999; // need an unlikely integer

           echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'prev_text'    => __('«'),
            'next_text'    => __('»'),
            'end_size'     => 1,
            'mid_size'     => 3,
           ) );
           ?>

            <?php wp_reset_query() ?>
        </div> <!-- col-md-12 -->
    </div> <!-- row -->
</div> <!-- container -->

<?php get_footer(); ?>