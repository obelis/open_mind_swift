<?php
/*
Template Name: Page Whithout Rows
*/
?>


<?php get_header(); ?>

<?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>
        <header class="wrap-title">
            <div class="container">
                <h1 class="page-title"><?php the_title(); ?></h1>

                <ol class="breadcrumb">
                    <?php if(function_exists('bcn_display_list')) {
                        bcn_display_list();
                    } ?>
                </ol>
            </div>
        </header>

        <div class="container">
            <?php the_content('Read More...'); ?>
            <?php edit_post_link('edit', '<p>', '</p>'); ?>
        </div> <!-- container -->
    <?php endwhile;?>
<?php else : ?>
    <div class="container">
        <p>No entries.</p>
    </div>
<?php endif; ?>

<?php get_footer(); ?>