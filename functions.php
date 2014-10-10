<?php

/*-----------------------------------------*/
/* Cargar Panel de Opciones
/*-----------------------------------------*/
if ( !function_exists( 'optionsframework_init' ) ) {
    define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
    require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='imageborder alignleft img-responsive", $class) ;
return $class;
}


//Eliminar párrafos automáticos por defecto
remove_filter('the_content', 'wpautop');

/* Quitar barra de admin */
// add_filter( 'show_admin_bar', '__return_false' );



/* Tamaño del extracto */
function custom_excerpt_length( $length ) {
    return 500;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    } 
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}



/* Thumbails */
add_theme_support('post-thumbnails');
add_image_size('post', 100, 100, true);
add_image_size('blog_image', 760, 405, true);
add_image_size('post_list', 80 , 80, true);
add_image_size('post_100', 100 , 100, true);
add_image_size('portfolio', 800 , 533, true);
add_image_size('works_footer', 360 , 240, true);
add_image_size('home_post', 727 , 360, true);


/* Sidebar */
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'before_widget' => '<div class="panel panel-primary">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="panel-heading">',
        'after_title' => '</div class="panel-heading"><div class="panel-body">',
    ));

if (function_exists('register_sidebar'))
    register_sidebar(array(
        'id' => 'footer_sidebar',
        'before_widget' => '<div class="col-md-4"><div class="footer-widget">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));


add_filter('widget_text', 'do_shortcode');
    
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Openmind' ),
) );

register_nav_menus( array(
    'sitemap' => __( 'Sitemap', 'Openmind' ),
) );


/* Shortcodes */

function sc_section_title($atts, $content = null)
{
    extract(shortcode_atts(array(
        "level" => '3'
    ), $atts));

    return '<h'.$level.' class="section-title">'.$content.'</h'.$level.'>';
}

add_shortcode("section-title", "sc_section_title");


function sc_post_list($atts, $content = null)
{
    $result = '<ul class="media-list">';
    extract(shortcode_atts(array(
    ), $atts));

    $thumbnails = get_posts($atts);
    foreach ($thumbnails as $thumbnail) {
        if ( has_post_thumbnail($thumbnail->ID)) {
            $thumb = get_the_post_thumbnail($thumbnail->ID, 'post_list');
        }
        else {
            $thumb = '<img src="' . get_template_directory_uri() . '/img/no_image_80.png" class="img-responsive" alt="No image">';
        }
        $result .= '<li class="media">';
        $result .= '<a href="' . get_permalink( $thumbnail->ID ) . '" title="' . esc_attr( $thumbnail->post_title ) . '" class="pull-left media-object">';
        $result .= $thumb;
        $result .= '</a>';
        $result .= '<div class="media-body">';
        $result .= '<p class="media-heading">';
        $result .= '<a href="' . get_permalink( $thumbnail->ID ) . '" title="' . esc_attr( $thumbnail->post_title ) . '">';
        $result .= get_the_title($thumbnail->ID);
        $result .= '</a>';
        $result .= '</p>';
        $result .= '<small>';
        $result .= get_the_time('M d, Y', $thumbnail);
        $result .= '</small>';
        $result .= '</div>';
    }

    $result .= '</ul>';
    return $result;
}

add_shortcode("post-list", "sc_post_list");



/* ------------------------------------------------------------------------------ */
/* Comment Open Mind */
/* ------------------------------------------------------------------------------ */


function mind_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;

    ?>
     
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="panel panel-default">
 
            <div class="comment-content panel-body">
                <?php echo get_avatar($comment, 100); ?>
                <?php comment_text(); ?>
            </div>
 
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-8">
                        <i class="fa fa-user"> </i> <?php comment_author_link(); ?> <i class="fa fa-clock-o"></i> <?php comment_date('M d, Y'); ?>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <span class="pull-right"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
                    </div>
                </div>
            </div>
        </article>

    <?php
}

/* ------------------------------------------------------------------------------ */
/* WIDGETS Open Mind */
/* ------------------------------------------------------------------------------ */


/* Mind_Tabs_Widget */

// Cuando se inicializa el widget llamaremos al metodo register de la clase Mind_Tabs_Widget
add_action( "widgets_init", array( "Mind_Tabs_Widget", "register" ) );

// Cuando se active el plugin se llamara al metodo activate de la clase Widget_ultimosPostPorAutor
// donde añadiremos los argumentos por defecto para que funcione el plugin
register_activation_hook( __FILE__, array( 'Mind_Tabs_Widget', 'activate' ) );

// Cuando se desactive el plugin se llamara al metodo desactivate de la clase Widget_ultimosPostPorAutor
// donde se eliminaran los argumentos anteriormente guardados, para tener una DB limpia
register_deactivation_hook( __FILE__, array( 'Mind_Tabs_Widget', 'deactivate' ) );

// Clase
class Mind_Tabs_Widget
{
    function activate()
    {
        // Argumentos y sus valores por defecto
        $aData = array( 'post_tab' => true,
                        'NUMERO_POST' => 5 );

        // Comprobamos si existe opciones para este Widget, si no existe las creamos por el contrario actualizamos
        if( ! get_option( 'mindTabsWidget' ) )
            add_option( 'mindTabsWidget' , $aData );
        else
            update_option( 'mindTabsWidget' , $data);
    }

    function deactivate()
    {
        // Cuando se desactive el plugin se eliminaran todas las filas de la DB que le sirven a este plugin
        delete_option( 'mindTabsWidget' );
    }
    
    // Panel de control que se mostrara abajo de nuestro Widget en el panel de configuración de Widgets
    function control()
    {
        /*$aData = get_option( 'mindTabsWidget' );

        // Mostraremos un formulario en HTML para modificar los valores del Widget
        ?>
            <p>
                <input type="checkbox" name="mindTabsWidget_post_tabs" value="<?php echo $aData['post_tab']; ?>">
                <label>Post Tab </label>
            </p>
        <?php

        // Si se ha enviado uno de los valores del formulario por POST actualizaremos los datos
        if( isset( $_POST['mindTabsWidget_post_tabs'] ) )
        {
            $aData['post_tab'] = attribute_escape( $_POST['mindTabsWidget_post_tabs'] );
            update_option( 'mindTabsWidget', $aData );
        }*/
        echo "<p>Options in next version.</p>";
    }

    // Metodo que se llamara cuando se visualize el Widget en pantalla
    function widget($args)
    {
        ?>

         <div class="block">
            <ul class="nav nav-tabs" id="myTab2">
                <li class="active"><a href="#fav" data-toggle="tab"><i class="fa fa-star"></i></a></li>
                <li><a href="#categories" data-toggle="tab"><i class="fa fa-folder-open"></i></a></li>
                <li><a href="#archive" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
                <li><a href="#tags" data-toggle="tab"><i class="fa fa-tags"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="fav">
                    <h3 class="post-title">Favorite Post</h3>
                    <?php echo do_shortcode('[post-list posts_per_page="3" orderby="comment_count"]'); ?>
                </div>
                <div class="tab-pane" id="archive">
                     <h3 class="post-title">Archives</h3>
                    <ul class="simple">
                        <?php wp_get_archives( $args ); ?>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <h3 class="post-title">Categories</h3>
                    <ul class="simple">
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </div>

                <div class="tab-pane" id="tags">
                    <h3 class="post-title">Tags</h3>
                    <div class="tags-cloud">
                        <?php
                            $args = array(
                                'smallest'                  => 1, 
                                'largest'                   => 1,
                                'unit'                      => 'em', 
                                'number'                    => 45,  
                                'format'                    => 'flat',
                                'separator'                 => ""
                            );

                            wp_tag_cloud($args);
                        ?>
                    </div>
                </div>
            </div> <!-- tab-content -->
        </div>

        <?php
    }

    // Meotodo que se llamara cuando se inicialice el Widget
    function register()
    {
        // Incluimos el widget en el panel control de Widgets
        register_sidebar_widget( "Mind Tabs Widget", array( "Mind_Tabs_Widget", "widget" ) );

        // Formulario para editar las propiedades de nuestro Widget
        register_widget_control( "Mind Tabs Widget", array( "Mind_Tabs_Widget", "control" ) );
    }
}

/* Mind_Search_Widget */

// Cuando se inicializa el widget llamaremos al metodo register de la clase Mind_Tabs_Widget
add_action( "widgets_init", array( "Mind_Search_Widget", "register" ) );

// Clase
class Mind_Search_Widget
{
    // Metodo que se llamara cuando se visualize el Widget en pantalla
    function widget($args)
    {
        ?>

        <div class="block">

        <?php get_search_form(); ?>

        </div>

        <?php
    }

    // Meotodo que se llamara cuando se inicialice el Widget
    function register()
    {
        // Incluimos el widget en el panel control de Widgets
        register_sidebar_widget( "Mind Search Widget", array( "Mind_Search_Widget", "widget" ) );
    }
}


/* Mind_Video_Widget */

// Cuando se inicializa el widget llamaremos al metodo register de la clase Mind_Video_Widget
add_action( "widgets_init", array( "Mind_Video_Widget", "register" ) );

// Cuando se active el plugin se llamara al metodo activate de la clase Widget_ultimosPostPorAutor
// donde añadiremos los argumentos por defecto para que funcione el plugin
register_activation_hook( __FILE__, array( 'Mind_Video_Widget', 'activate' ) );

// Cuando se desactive el plugin se llamara al metodo desactivate de la clase Widget_ultimosPostPorAutor
// donde se eliminaran los argumentos anteriormente guardados, para tener una DB limpia
register_deactivation_hook( __FILE__, array( 'Mind_Video_Widget', 'deactivate' ) );

// Clase
class Mind_Video_Widget
{
    function activate()
    {
        // Argumentos y sus valores por defecto
        $aData = array( 'url' => "" );

        // Comprobamos si existe opciones para este Widget, si no existe las creamos por el contrario actualizamos
        if( ! get_option( 'mindVideoWidget' ) )
            add_option( 'mindVideoWidget' , $aData );
        else
            update_option( 'mindVideoWidget' , $data);
    }

    function deactivate()
    {
        // Cuando se desactive el plugin se eliminaran todas las filas de la DB que le sirven a este plugin
        delete_option( 'mindVideoWidget' );
    }
    
    // Panel de control que se mostrara abajo de nuestro Widget en el panel de configuración de Widgets
    function control()
    {
        $aData = get_option( 'mindVideoWidget' );

        // Mostraremos un formulario en HTML para modificar los valores del Widget
        ?>
            <p>
                <label>URL: </label><br>
                <input type="text" name="mindVideoWidget_post_Video" value="<?php echo $aData['url']; ?>">
            </p>
        <?php

        // Si se ha enviado uno de los valores del formulario por POST actualizaremos los datos
        if( isset( $_POST['mindVideoWidget_post_Video'] ) )
        {
            $aData['url'] = attribute_escape( $_POST['mindVideoWidget_post_Video'] );
            update_option( 'mindVideoWidget', $aData );
        }
    }

    // Metodo que se llamara cuando se visualize el Widget en pantalla
    function widget($args)
    {
        $aData = get_option( 'mindVideoWidget' );

        ?>

        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-play-circle"></i>Featured video</div class="panel-heading">
            <div class="video">
                <iframe src="<?php echo $aData['url'] ?>"></iframe>
            </div>
        </div>


        <?php
    }

    // Meotodo que se llamara cuando se inicialice el Widget
    function register()
    {
        // Incluimos el widget en el panel control de Widgets
        register_sidebar_widget( "Mind Video Widget", array( "Mind_Video_Widget", "widget" ) );

        // Formulario para editar las propiedades de nuestro Widget
        register_widget_control( "Mind Video Widget", array( "Mind_Video_Widget", "control" ) );
    }
}

/* Mind_Comments_Widget */

// Cuando se inicializa el widget llamaremos al metodo register de la clase Mind_Comments_Widget
add_action( "widgets_init", array( "Mind_Comments_Widget", "register" ) );

// Cuando se active el plugin se llamara al metodo activate de la clase Widget_ultimosPostPorAutor
// donde añadiremos los argumentos por defecto para que funcione el plugin
register_activation_hook( __FILE__, array( 'Mind_Comments_Widget', 'activate' ) );

// Cuando se desactive el plugin se llamara al metodo desactivate de la clase Widget_ultimosPostPorAutor
// donde se eliminaran los argumentos anteriormente guardados, para tener una DB limpia
register_deactivation_hook( __FILE__, array( 'Mind_Comments_Widget', 'deactivate' ) );

// Clase
class Mind_Comments_Widget
{
    function activate()
    {
        // Argumentos y sus valores por defecto
        $aData = array( 'num' => "" );

        // Comprobamos si existe opciones para este Widget, si no existe las creamos por el contrario actualizamos
        if( ! get_option( 'mindCommentsWidget' ) )
            add_option( 'mindCommentsWidget' , $aData );
        else
            update_option( 'mindCommentsWidget' , $data);
    }

    function deactivate()
    {
        // Cuando se desactive el plugin se eliminaran todas las filas de la DB que le sirven a este plugin
        delete_option( 'mindCommentsWidget' );
    }
    
    // Panel de control que se mostrara abajo de nuestro Widget en el panel de configuración de Widgets
    function control()
    {
        $aData = get_option( 'mindCommentsWidget' );

        // Mostraremos un formulario en HTML para modificar los valores del Widget
        ?>
            <p>
                <label>Number of Comments: </label><br>
                <input type="text" name="mindCommentsWidget_post_Comments" value="<?php echo $aData['num']; ?>">
            </p>
        <?php

        // Si se ha enviado uno de los valores del formulario por POST actualizaremos los datos
        if( isset( $_POST['mindCommentsWidget_post_Comments'] ) )
        {
            $aData['num'] = attribute_escape( $_POST['mindCommentsWidget_post_Comments'] );
            update_option( 'mindCommentsWidget', $aData );
        }
    }

    // Metodo que se llamara cuando se visualize el Widget en pantalla
    function widget($args)
    {
        $aData = get_option( 'mindCommentsWidget' );

        ?>

        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-comments"></i> Recent Comments</div>
            <div class="panel-body">
                <ul class="comments-sidebar">

                    <?php $attr = array(
                        'author_email' => '',
                        'ID' => '',
                        'karma' => '',
                        'number' => '5',
                        'offset' => '',
                        'orderby' => '',
                        'order' => 'DESC',
                        'parent' => '',
                        'post_author' => '',
                        'post_name' => '',
                        'post_parent' => '',
                        'post_status' => '',
                        'post_type' => '',
                        'status' => '',
                        'type' => '',
                        'user_id' => '',
                        'search' => '',
                        'count' => false,
                        'meta_key' => '',
                        'meta_value' => '',
                        'meta_query' => '',
                    ); ?>

                    <?php $comments = get_comments( $attr ); ?>

                        <?php foreach($comments as $comment) : ?>
                            <li>
                                <?php echo get_avatar( $comment, 75 ); ?>
                                <h4><a href="<?php echo ($comment->comment_author_url) ?>"><?php echo ($comment->comment_author) ?></a> in <a href="<?php get_permalink($comment->comment_post_ID) ?>"><?php echo get_the_title($comment->comment_post_ID); ?> </a></h4>
                                <?php
                                    $aText =  substr($comment->comment_content, 0, 120);
                                    $aText .= "...";
                                ?>
                                <p><?php echo $aText  ?></p>
                            </li>
                        <?php endforeach; ?>
                </ul>
            </div>
        </div>


        <?php
    }

    // Meotodo que se llamara cuando se inicialice el Widget
    function register()
    {
        // Incluimos el widget en el panel control de Widgets
        register_sidebar_widget( "Mind Comments Widget", array( "Mind_Comments_Widget", "widget" ) );

        // Formulario para editar las propiedades de nuestro Widget
        register_widget_control( "Mind Comments Widget", array( "Mind_Comments_Widget", "control" ) );
    }
}

// Creación automática de páginas
if (isset($_GET['activated']) && is_admin())
{
    $titles = array('Blog', 'Blog Full', 'Blog Left Sidebar', 'Portfolio', 'Profile', 'Login', 'Register');
    $templates = array('page-blog.php', 'page-blog-full-php', 'page-blog-left.php', 'page-portfolio.php', 'page-login.php', 'page-register.php');

    for ($i=0; $i < count($titles); $i++)
    {
        $page_check = get_page_by_title($titles[i]);
        if(isset($page_check->ID))
            continue;

        $page = array(
            'post_type' => 'page',
            'post_title' => $tiles[i],
            'post_status' => 'publish',
            'post_author' => 1);

        $page_id = wp_insert_post($page);
        update_post_meta($new_page_id, '_wp_page_template', $templates[i]);
    }
}

include(get_stylesheet_directory().'/functions-inc.php');

?>
