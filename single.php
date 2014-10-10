<?php get_header(); ?>

<header class="wrap-title">
    <div class="container">
        <h1 class="page-title">Article</h1>

        <ol class="breadcrumb hidden-xs">
            <?php if(function_exists('bcn_display_list')) {
                bcn_display_list();
            } ?>
        </ol>
    </div>
</header>

<div class="container blog-post">
    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()) : ?>
                 <?php while (have_posts()) : the_post(); ?>
                    <section>
                        <h2 class="post-title"><?php the_title(); ?></h2>
                        <?php the_content('Read more' ); ?>
                    </section>
                    <section>
                        <?php comments_template(); ?>
                    </section>
                <?php endwhile;?>
            <?php else : ?>
                <h2 class="post-title">No entries found</h2>
                <p>Not found anything that criteria. Try searching again or use the menu to navigate the site.</p>
                <?php get_search_form(); ?>
            <?php endif; ?>

        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div> <!-- row -->
</div> <!-- container -->

<?php get_footer(); ?>