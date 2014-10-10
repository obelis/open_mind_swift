<?php
/*
 * Template Name: Blank Page
 * Description: Blank Template.
 */
?>

<?php get_header('coming'); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content('Read More...'); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer('coming'); ?>
