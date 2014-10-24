<?php get_header(); ?>

<?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>
        <header class="wrap-title">
            <div class="container">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
            <div id="breadcrumbs-background">
                <div class="container">
                    <?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<p id="breadcrumbs" class="hidden-xs">','</p>');
                    } ?>
                </div>
            </div>
        </header>

			        <div class="container">
						<div class="row">
						    <div class="col-md-8">
						
						                <?php the_content('Read More...'); ?>
						                <?php edit_post_link('edit', '<p>', '</p>'); ?>
							</div> <!-- col-md-8 -->
							<div class="col-md-4">
							<?php get_sidebar(); ?>
							</div>
						</div> <!-- row -->
			        </div> <!-- container -->
    <?php endwhile;?>
<?php else : ?>
    <div class="container">
        <p>No entries.</p>
    </div>
<?php endif; ?>

<?php get_footer(); ?>