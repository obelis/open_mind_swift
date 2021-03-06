<footer id="footer">
    <div class="container">
        <div class="row">
            <p id="site-copyright" class="col-sm-6">&copy; <?php echo date("Y"); ?> <a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a>, Inc. All rights reserved.</p>
            <p id="site-creator" class="col-sm-6">Web Site by <a href="http://www.obelismedia.com/" rel="nofollow" target="_blank">Obelis Media</a></p>
        </div>
    </div>
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
