<?php
/*
 * Template Name: Home Template
 * Description: Home Template.
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content('Read More...'); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php if(of_get_option('om_display_lates_post_home','')) : ?>

<?php query_posts( array('posts_per_page' => 1, 'cat' => '-' . get_cat_ID(of_get_option('om_portfolio_category','')), ) ); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <section id="home-blog">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="section-title"><?php echo of_get_option('om_title_latest_post_home', ''); ?></h2>
                </div>
                <div class="col-md-7">
                    <section class="home-post">
                        <a href="<?php the_permalink() ?>" class="thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('home_post', array('class' => "attachment-$size, img-responsive")); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/no_image.png" class="img-responsive" alt="No image">
                            <?php endif; ?>
                        </a>
                        <h2 class="home-post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <div class="no-img"><?php echo content(100); ?></div>
                        <div class="row home-post-footer">
                            <div class="col-md-8">
                                <div class="home-post-meta">
                                    <i class="fa fa-clock-o"></i> <?php the_date(); ?> 
                                    <i class="fa fa-folder-open"></i> <?php the_category(', '); ?>
                                    <i class="fa fa-tags"></i><?php the_tags('', ', '); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-primary btn-block">Read more</a>
                            </div>
                        </div>
                    </section>
                </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query() ?>

<div class="col-md-5">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <?php
            $first_flag = true;
            $cats = of_get_option('om_categoties_last_posts','');
            if (!empty($cats)) {
                foreach ($cats as $key => $value) {
                    if ($value) {
                        $term = get_term_by('slug', $key, 'category');
                        if ($first_flag) {
                            echo ('<li class="active"><a href="#' . $term->slug . '" data-toggle="tab">' . $term->name . '</a></li>');
                             $first_flag = false;
                        }
                        else {
                            echo ('<li><a href="#' . $term->slug . '" data-toggle="tab">' . $term->name . '</a></li>');
                        }
                    }
                }
            }
        ?>
    </ul>

    <div class="tab-content">
    <?php if (!empty($cats)) : ?>
        <?php $flag = true; ?>
        <?php foreach ($cats as $key => $value) : ?>
            <?php if ($value) : ?>
                <?php $term = get_term_by('slug', $key, 'category'); ?>
                <div class="tab-pane <?php if($flag) { echo 'active'; $flag = false; } ?>" id="<?php echo $term->slug ?>">
                <?php query_posts( array('posts_per_page' => 4, 'cat' => get_category_by_slug($key)->term_id ) ); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="media">
                            <a class="pull-left" href="<?php the_permalink() ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('post_100', array('class' => "attachment-$size, img-responsive")); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/no_image_100.png" class="img-responsive" alt="No image">
                                <?php endif; ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                <p class="no-img"><?php echo excerpt(10); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php $cat_link = get_category_link( get_category_by_slug($key)->term_id ); ?> 
                    <a href="<?php echo esc_url( $cat_link ); ?>" class="btn btn-default pull-right">Read more articles</a>
                    <div class="clearfix"></div>
                <?php endif; ?>
                <?php wp_reset_query() ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php wp_reset_query() ?>
    <?php endif; ?>
    </div> <!-- tab-content -->
                    
            </div>
        </div>
    </div> <!-- container -->
</section>

<?php endif; ?>

<?php if(of_get_option('om_display_lates_works_home','')) : ?>
    <?php query_posts( array('posts_per_page' => 6, 'cat' => get_cat_ID(of_get_option('om_portfolio_category','')), ) ); ?>

    <?php if (have_posts()) : ?>
        <section id="home-works">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="section-title text-center"><?php echo of_get_option('om_title_latest_works_home', ''); ?></h2>
                    </div>
                    <?php while (have_posts()) : the_post(); ?>        
                        <div class="col-md-4 col-sm-6">
                            <div class="img-caption">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('portfolio', array('class' => "attachment-$size, img-responsive")); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/no_image_800x533.png" class="img-responsive" alt="No image">
                                <?php endif; ?>
                                <div class="caption">
                                    <div class="caption-content">
                                        <a href="<?php the_permalink() ?>" class="animated fadeInDown"><i class="fa fa-search"></i>More info</a>
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
    <?php endif; ?>
<?php endif; ?>
		<section id="home-map">
            <div class="container">
                <div class="row">
				<div class="col-md-8">
				<h2 class="section-title">Our Locations</h2>
            <?php	include 'home_mini_map.php'; ?>	
                </div>
				<div class="col-md-4">
<h2 class="section-title">Call us today</h2>
<p class="lead">
<?php 
$address_one_peramiter = "?specialty=Hearing+Aids&city=".urlencode($main_city)."&state=".urlencode($main_state)."&zip=".urlencode($main_zip);

$address_two_peramiter = "?specialty=Hearing+Aids&city=".urlencode($second_city)."&state=".urlencode($second_state)."&zip=".urlencode($second_zip);

$address_three_peramiter = "?specialty=Hearing+Aids&city=".urlencode($third_city)."&state=".urlencode($third_state)."&zip=".urlencode($third_zip);

$address_four_peramiter = "?specialty=Hearing+Aids&city=".urlencode($fourth_city)."&state=".urlencode($fourth_state)."&zip=".urlencode($fourth_zip);

$address_five_peramiter = "?specialty=Hearing+Aids&city=".urlencode($fifth_city)."&state=".urlencode($fifth_state)."&zip=".urlencode($fifth_zip);

$address_six_peramiter = "?specialty=Hearing+Aids&city=".urlencode($sixth_city)."&state=".urlencode($sixth_state)."&zip=".urlencode($sixth_zip);

$address_seven_peramiter = "?specialty=Hearing+Aids&city=".urlencode($seventh_city)."&state=".urlencode($seventh_state)."&zip=".urlencode($seventh_zip);

?>
<a href="/our-location/main-office/<?php echo $address_one_peramiter; ?>"><strong><?php echo $main_city.', '.$main_state ?></strong></a> - <br /><?php echo $main_phone_number ?><br><br>
<?php if (isset($second_phone_number) && $second_phone_number=="")  {
	   echo NULL; 

} elseif (isset($second_phone_number) && $second_phone_number!="") {
	
    if ($second_city=="") {
    echo " ";
           
    } else {
        echo "<a href=\"/our-location/second-office/".$address_two_peramiter."\"><strong>".$second_city.", ";
    }


    if ($second_state=="") {
        echo NULL;
   
    } else {
        echo $second_state."</strong></a> - <br />";
    }
    

    if ($second_phone_number=="") {
        echo NULL;
    
    } else {
        echo $second_phone_number."<br /><br />";
    }

} else {
   echo NULL; 
}

if (isset($third_phone_number) && $third_phone_number=="")  {
	   echo NULL; 

} elseif (isset($third_phone_number) && $third_phone_number!="") {
	
    if ($third_city=="") {
    echo " ";
           
    } else {
        echo "<a href=\"/our-location/third-office/".$address_three_peramiter."\"><strong>".$third_city.", ";
    }


    if ($third_state=="") {
        echo NULL;
   
    } else {
        echo $third_state."</strong></a> - <br />";
    }
    

    if ($third_phone_number=="") {
        echo NULL;
    
    } else {
        echo $third_phone_number."<br /><br />";
    }

} else {
   echo NULL; 
}

if (isset($fourth_phone_number) && $fourth_phone_number=="")  {
	   echo NULL; 

} elseif (isset($fourth_phone_number) && $fourth_phone_number!="") {
	
    if ($fourth_city=="") {
    echo " ";
           
    } else {
        echo "<a href=\"/our-location/fourth-office/".$address_four_peramiter."\"><strong>".$fourth_city.", ";
    }


    if ($fourth_state=="") {
        echo NULL;
   
    } else {
        echo $fourth_state."</strong></a> - ";
    }
    

    if ($fourth_phone_number=="") {
        echo NULL;
    
    } else {
        echo $fourth_phone_number."<br />";
    }

} else {
   echo NULL; 
}

if (isset($fifth_phone_number) && $fifth_phone_number=="")  {
	   echo NULL; 

} elseif (isset($fifth_phone_number) && $fifth_phone_number!="") {
	
    if ($fifth_city=="") {
    echo " ";
           
    } else {
        echo "<a href=\"/our-location/fifth-office/".$address_five_peramiter."\"><strong>".$fifth_city.", ";
    }


    if ($fifth_state=="") {
        echo NULL;
   
    } else {
        echo $fifth_state."</strong></a> - ";
    }
    

    if ($fifth_phone_number=="") {
        echo NULL;
    
    } else {
        echo $fifth_phone_number."<br />";
    }

} else {
   echo NULL; 
}

if (isset($sixth_phone_number) && $sixth_phone_number=="")  {
	   echo NULL; 

} elseif (isset($sixth_phone_number) && $sixth_phone_number!="") {
	
    if ($sixth_city=="") {
    echo " ";
           
    } else {
        echo "<a href=\"/our-location/sixth-office/".$address_six_peramiter."\"><strong>".$sixth_city.", ";
    }


    if ($sixth_state=="") {
        echo NULL;
   
    } else {
        echo $sixth_state."</strong></a> - ";
    }
    

    if ($sixth_phone_number=="") {
        echo NULL;
    
    } else {
        echo $sixth_phone_number."<br />";
    }

} else {
   echo NULL; 
}

if (isset($seventh_phone_number) && $seventh_phone_number=="")  {
	   echo NULL; 

} elseif (isset($seventh_phone_number) && $seventh_phone_number!="") {
	
    if ($seventh_city=="") {
    echo " ";
           
    } else {
        echo "<a href=\"/our-location/seventh-office/".$address_seven_peramiter."\"><strong>".$seventh_city.", ";
    }


    if ($seventh_state=="") {
        echo NULL;
   
    } else {
        echo $seventh_state."</strong></a> - ";
    }
    

    if ($seventh_phone_number=="") {
        echo NULL;
    
    } else {
        echo $seventh_phone_number."<br />";
    }

} else {
   echo NULL; 
}
?>



</p>




				</div>
                </div>
            </div>
		</section>
     <div class="container">
        <?php edit_post_link('edit', '<p>', '</p>'); ?>
    </div>

<?php get_footer(); ?>
