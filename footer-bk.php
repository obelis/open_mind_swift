<aside id="footer-widgets">
    <div class="container">
        <div class="row">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_sidebar') ) : ?>

                <div class="col-md-4">
                    <h3 class="footer-widget-title">Sitemap</h3>
                    <?php
                        wp_nav_menu( array(
                            'menu'              => 'sitemap',
                            'theme_location'    => 'sitemap',
                            'depth'             => 2,
                            'container'         => '',
                            'container_class'   => '',
                            'menu_class'        => 'list-unstyled three_cols',
                        ));
                    ?>
                    <h3 class="footer-widget-title">Subscribe</h3>
                    <p>Lorem ipsum Amet fugiat elit nisi anim mollit in labore ut esse Duis ullamco ad dolor veniam velit lorem ipsum dolor sit amet, consectetur adipisicing..</p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email Adress">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button">Subscribe</button>
                        </span>
                    </div><!-- /input-group -->
                </div>
                <div class="col-md-4">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Recent Post</h3>
                        <?php $portfolio_id = get_cat_ID(of_get_option('om_portfolio_category','')); ?>
                        <?php echo do_shortcode('[post-list posts_per_page="3" orderby="date" category="-' . $portfolio_id . '"]'); ?>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Recent Works</h3>
                        <div class="row">
                            <?php $the_query = new WP_Query( 'category_name=portfolio&posts_per_page=4' ); ?>
                            <?php if ($the_query -> have_posts()) : ?>
                                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6">
                                        <a href="<?php the_permalink() ?>" class="thumbnail">
                                    <?php if (has_post_thumbnail()) : ?>
                                         <?php the_post_thumbnail('works_footer', array('class' => "attachment-$size, img-responsive")); ?>
                                     <?php else: ?>
                                         <img src="<?php echo get_template_directory_uri(); ?>/img/no_image_360x240.png" class="img-responsive" alt="No image">
                                     <?php endif; ?>
                                        </a>
                                    </div>
                                <?php endwhile;?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        </div> <!-- row -->
    </div> <!-- container -->
</aside> <!-- footer-widgets -->

<footer id="footer">
    <p>&copy; 2013 <a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a>, inc. All rights reserved.</p>
</footer>

</div> <!-- boxed -->

<div id="back-top">
    <a href="#header"><i class="fa fa-chevron-up"></i></a>
</div>

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mixitup.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/lightbox-2.6.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/holder.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>

    <script>
        if($.cookie("color-wp")) {
            $("link[href|='<?php echo get_template_directory_uri(); ?>/css/color']").attr("href","<?php echo get_template_directory_uri(); ?>/css/" + $.cookie("color-wp"));
        }

        if($.cookie("width-wp")) {
            $("link[href|='<?php echo get_template_directory_uri(); ?>/css/width']").attr("href","<?php echo get_template_directory_uri(); ?>/css/" + $.cookie("width-wp"));
        }

        $(document).ready(function() { 
            $("#color-switcher-content .color").click(function() { 
                $("link[href|='<?php echo get_template_directory_uri(); ?>/css/color']").attr("href", "<?php echo get_template_directory_uri(); ?>/css/" + $(this).attr('rel'));
                $.cookie("color-wp",$(this).attr('rel'), {expires: 7, path: '/'});
                return false;
            });

            $("#color-switcher-content .option").click(function() { 
                $("link[href|='<?php echo get_template_directory_uri(); ?>/css/width']").attr("href", "<?php echo get_template_directory_uri(); ?>/css/" + $(this).attr('rel'));
                console.log('test');
                $.cookie("width-wp",$(this).attr('rel'), {expires: 7, path: '/'});
                return false;
            });
        });
    </script>

<?php wp_footer(); ?>

<script>
    window.location.refresh()
</script>

</body>

</html>
