<?php
/*
 * Template Name: Portfolio Page
 * Description: Portfolio Template.
 */
?>


<?php get_header(); ?>

<header class="wrap-title">
    <div class="container">
        <h1 class="page-title">Portfolio</h1>

        <ol class="breadcrumb">
            <?php if(function_exists('bcn_display_list')) {
                bcn_display_list();
            } ?>
        </ol>
    </div>
</header>


<?php query_posts( array('paged' => get_query_var('paged'), 'posts_per_page' => 9999999999999, 'cat' => get_cat_ID(of_get_option('om_portfolio_category','')), ) ); ?>


<div class="container">
    <ul class="portfolio-control">
        <?php
            echo ('<li class="filter active" data-filter="all">All Items</li>');
            $tags_portfolio = of_get_option('tags_portfolio','');
            if (!empty($tags_portfolio)) {
                foreach ($tags_portfolio as $key => $value) {
                    if ($value) {
                        $term = get_term_by('slug', $key, 'post_tag');
                        echo ('<li class="filter" data-filter="' . $term->slug . '">' . $term->name . '</li>');
                    }
                }
            }
        ?> 
    </ul>

    <div class="row" id="Grid">

    <?php $num = 0; ?>
    
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
           <div class="col-sm-6 col-lg-3 col-md-4 mix 

            <?php
                $posttags = get_the_tags();
                if ($posttags) {
                    foreach($posttags as $tag) {
                        echo $tag->slug . ' '; 
                    }   
                }
            ?>

           ">
               <div class="img-caption">
                   <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('portfolio', array('class' => "attachment-$size, img-responsive")); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/no_image_800x533.png" class="img-responsive" alt="No image">
                    <?php endif; ?>
                   <div class="caption">
                       <div class="caption-content">
                           <a href="#" class="animated fadeInDown" data-toggle="modal" data-target="#myModal<?php echo $num ?>"><i class="fa fa-search"></i>More info</a>
                           <h4><?php the_title(); ?></h4>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Modal -->
           <div class="modal fade" id="myModal<?php echo $num ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>
                       </div>
                       <div class="modal-body">
                           <?php if (has_post_thumbnail()) : ?>
                               <?php the_post_thumbnail('portfolio', array('class' => "attachment-$size, img-responsive")); ?>
                           <?php else: ?>
                               <img src="<?php echo get_template_directory_uri(); ?>/img/no_image.png" class="img-responsive" alt="No image">
                           <?php endif; ?>
                           <div class="no-img"><?php echo  content(120); ?></div>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <a href="<?php the_permalink() ?>" class="btn btn-primary" role="button">View more</a>
                       </div>
                   </div><!-- modal-content -->
               </div><!-- modal-dialog -->
           </div><!-- modal -->
            <?php $num++; ?>
        <?php endwhile;?>
    <?php else : ?>
        <p>No entries.</p>
    <?php endif; ?>

    </div>

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
</div> <!-- container -->

<?php get_footer(); ?>