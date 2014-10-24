<?php
/*
 * Template Name: First Location
 * Description: Page With Sidebar
 */
?>

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
						    
						    
						    <?php include 'location_variables.php';
								
								if (isset($main_plaza) && $main_plaza!=''){
									$plaza = $main_plaza.'<br />';
								} else {
									$plaza = NULL;
								}
								
								if (isset($street_address_second_line) && $street_address_second_line!=''){
									$address_second_line = $street_address_second_line.'<br />';
								} else {
									$address_second_line = NULL;
								}
								
								if (isset($main_secondary_phone_number) && $main_secondary_phone_number !="" && $display_full_address == 1) {
									$main_secondary_phone_number_set = "<br />".$main_secondary_phone_number;
								} else {
									$main_secondary_phone_number_set = NULL;
								}
								?>
								
								<div id="content" class="col-clear <?php echo $content_class; ?>">
										<div class="two-third last"><div class="clear"></div><div class="service">
										<img class="service-icon" src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/black-and-white/blackandwhite-38.png">
										<h3>Our Location:</h3><div itemscope itemtype="http://schema.org/LocalBusiness">
								<?php echo "<span itemprop='name'><strong>".$company_name.'</strong></span><br />'.$plaza."<span itemprop='streetAddress'>".$main_street.'</span><br />'.$address_second_line.'<span itemprop="addressLocality">'.$main_city.'</span>, '."<span itemprop='addressRegion'>".$main_state.'</span> <span itemprop="postalCode">'.$main_zip.'</span><br />'.$main_phone_number.$main_secondary_phone_number_set;
									$g_plus = of_get_option('main_g');
									
									if(isset($g_plus) && $g_plus!=''){
										echo '<br /><a href="'.$g_plus.'">Leave us a review on Google</a>';
									}
								?></div>
									<div class="clear"></div><div class="clear"></div></div> </div>
									<div class="two-third last"><div class="separator clean"></div><br /><br /></div>
								<div class="two-third last">	
									<?php echo $main_street.', '.$main_city.' '.$main_state.' '.$main_zip;?>
								
								
								
								
								<?php
								 
								
								 
								$address = $main_street.', '.$main_city.' '.$main_state.' '.$main_zip;
								$bubble = '<span style=\"font-weight:bold;\">'.$main_street.'</span><br />'.$main_city.', '.$main_state.' '.$main_zip;
								$lat = get_option( 'lat1' );
								$lon = get_option( 'lon1' );
								
								$stylesheet_directory = get_stylesheet_directory() . '/theme-option-includes/location-map.php';
								
								include($stylesheet_directory);
								
							?>

						    
								</div></div>
						    
						
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