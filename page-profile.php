<?php
/*
 * Template Name: Profile Page
 */
?>

<?php ob_start(); ?>
<?php get_header(); ?>

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
        <?php if ( is_user_logged_in() ) : ?>
            <?php global $current_user;
                get_currentuserinfo();
            ?>
            <div class="col-md-4">
                <section>
                    <?php echo get_avatar( $current_user->user_email, 370); ?> 
                    <div class="clearfix"></div>
                </section>
                <section>
                    <h3 class="section-title">Update your status</h3>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                    </form>
                    <hr>
                    <a href="<?php echo get_edit_user_link(); ?>"class="btn btn-block btn-warning">Edit your profile</a>
                    <a href="<?php echo wp_logout_url(home_url()); ?>"class="btn btn-block btn-danger">Logout</a>
                </section>
            </div>
            <div class="col-md-8">
                <section>
                    <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fa fa-user"></i> General Information</div>
                        <table class="table table-striped">
                            <tr>
                                <th>User Name</th>
                                <td><?php echo $current_user->display_name; ?></td>
                            </tr>
                            <tr>
                                <th>Fullname</th>
                                <td><?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><a href="mailto:<?php echo $current_user->user_email; ?>"><?php echo $current_user->user_email; ?></a></td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td><a href="<?php echo $current_user->user_url; ?>"><?php echo $current_user->user_url; ?></a></td>
                            </tr>
                            <tr>
                                <th>Member Since</th>
                                <td>
                                    <?php $registered = ($user_info->user_registered . "\n");
                                    echo date(get_option('date_format'), strtotime($registered)); ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </section>

                <section>
                    <h2 class="section-title">Latest Comments</h2>
                    <div class="list-group">
                        <?php
                        $args = array(
                            'user_email' => $current_user->user_email,
                            'number' => '3'
                        );
                        $comments = get_comments($args);
                        foreach($comments as $comment) :
                        ?>
                            <a href="<?php echo get_page_link($comment->comment_post_ID); ?>" class="list-group-item">
                                <h3><?php echo get_the_title($comment->comment_post_ID); ?></h3>
                                <?php echo $comment->comment_content; ?>
                            </a>
                        <?php endforeach; ?>
                    </div> <!--list-group -->
                </section>
            </div>
        <?php else: ?>
            <?php wp_redirect(get_permalink(get_page_by_title('Login')->ID)); ?>
        <?php endif; ?>
    </div>
</div> <!-- container  -->

<?php get_footer(); ?>