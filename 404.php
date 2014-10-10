<?php get_header(); ?>

<header class="wrap-title">
    <div class="container">
        <h1 class="page-title">Error 404</h1>

        <ol class="breadcrumb">
            <?php if(function_exists('bcn_display_list')) {
                bcn_display_list();
            } ?>
        </ol>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="center-block error-404">
                <section class="text-center">
                    <h1>Error 404</h1>
                    <h2>Page not found</h2>
                </section>
                <section>
                    <form  method="get" role="form" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="form-group">
                            <input class="form-control input-lg" type="text" placeholder="Search here" name="s" id="s">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-lg btn-success">Search</button>
                        </div>
                    </form>
                </section>
            </div>
        </div> <!-- col-md-12 -->
    </div> <!-- row -->
</div> <!-- container -->

<?php get_footer(); ?>