<?php

// Files

require_once( get_theme_file_path( "/inc/tgm.php" ) );
require_once( get_theme_file_path( "/inc/attachments.php" ) );
require_once( get_theme_file_path( "/inc/custom-fields.php" ) );
require_once( get_theme_file_path( "/inc/theme-options.php" ) );

// Theme Support

function philosophy_theme_setup() {
    load_theme_textdomain( "philosophy" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    $philosophy_custom_header_details = array(
        'header-text'           => true,
        'default-text-color'    => 'white',
    );
    add_theme_support("custom-header", $philosophy_custom_header_details);
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support( "post-formats", array( "image", "gallery", "quote", "audio", "video", "link" ) );
    add_theme_support("custom-background");
    add_editor_style( "/assets/css/editor-style.css" );
    register_nav_menu( "topmenu", __( "Top Menu", "philosophy" ) );
    add_image_size( "philosophy-home-square", 400, 400, true );
}

add_action( "after_setup_theme", "philosophy_theme_setup" );

// Assets Enqueue

function philosophy_assets() {
    wp_enqueue_style( "fontawesome-css", get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.css" ), null, "1.0" );
    wp_enqueue_style( "fonts-css", get_theme_file_uri( "/assets/css/fonts.css" ), null, "1.0" );
    wp_enqueue_style( "base-css", get_theme_file_uri( "/assets/css/base.css" ), null, "1.0" );
    wp_enqueue_style( "vendor-css", get_theme_file_uri( "/assets/css/vendor.css" ), null, "1.0" );
    wp_enqueue_style( "main-css", get_theme_file_uri( "/assets/css/main.css" ), null, "1.0" );
    wp_enqueue_style( "philosophy-css", get_stylesheet_uri(), null, VERSION );

    wp_enqueue_script( "modernizr-js", get_theme_file_uri( "/assets/js/modernizr.js" ), null, "1.0" );
    wp_enqueue_script( "pace-js", get_theme_file_uri( "/assets/js/pace.min.js" ), null, "1.0" );
    wp_enqueue_script( "plugins-js", get_theme_file_uri( "/assets/js/plugins.js" ), array( "jquery" ), "1.0", true );
    wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/main.js" ), array( "jquery" ), "1.0", true );
    
    wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/comment-reply.min.js" ), array( "jquery" ), "4.7", true );
}

add_action( "wp_enqueue_scripts", "philosophy_assets" );

// Pagination

function philosophy_pagination() {
    global $wp_query;
    $links = paginate_links( array(
        'current'  => max( 1, get_query_var( 'paged' ) ),
        'total'    => $wp_query->max_num_pages,
        'type'     => 'list',
        'mid_size' => apply_filters( "philosophy_pagination_mid_size", 3 )
    ) );
    $links = str_replace( "page-numbers", "pgn__num", $links );
    $links = str_replace( "<ul class='pgn__num'>", "<ul>", $links );
    $links = str_replace( "next pgn__num", "pgn__next", $links );
    $links = str_replace( "prev pgn__num", "pgn__prev", $links );
    echo $links;
}

// Widget

function philosophy_widgets() {
    register_sidebar( array(
        'name'          => __( 'About Us Page', 'philosophy' ),
        'id'            => 'about-us',
        'description'   => __( 'Widgets in this area will be shown on about us page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Maps Section', 'philosophy' ),
        'id'            => 'contact-maps',
        'description'   => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Information Section', 'philosophy' ),
        'id'            => 'contact-info',
        'description'   => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Tags Section', 'philosophy' ),
        'id'            => 'tag-cloud',
        'description'   => __( 'Widgets in this area will be shown on Tags Section.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="tagcloud %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget One', 'philosophy' ),
        'id'            => 'footer-widget-one',
        'description'   => __( 'Widgets in this area will be shown on Footer Section.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-four md-four s-footer__sitelinks %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget Two', 'philosophy' ),
        'id'            => 'footer-widget-two',
        'description'   => __( 'Widgets in this area will be shown on Footer Section.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-four md-four s-footer__sitelinks %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget Three', 'philosophy' ),
        'id'            => 'footer-widget-three',
        'description'   => __( 'Widgets in this area will be shown on Footer Section.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-four md-four s-footer__sitelinks %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}

add_action( "widgets_init", "philosophy_widgets" );

// Filter

remove_action( "term_description", "wpautop" );

function philosophy_home_banner_class( $class_name ) {
    if ( is_home() ) {
        return $class_name;
    } else {
        return "";
    }
}

add_filter( "philosophy_home_banner_class", "philosophy_home_banner_class" );

function pagination_mid_size( $size ) {
    return 2;
}

add_filter( "philosophy_pagination_mid_size", "pagination_mid_size" );

function uppercase_text( $param1, $param2, $param3 ) {
    return ucwords( $param1 ) . " " . strtoupper( $param2 ) . " " . ucwords( $param3 );
}

add_filter( "philosophy_text", "uppercase_text", 10, 3 );

?>

