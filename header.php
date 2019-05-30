<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head(); ?>

</head>

<body id="top" <?php body_class() ?>>

<!-- pageheader
================================================== -->
<section class="s-pageheader <?php echo apply_filters("philosophy_home_banner_class","s-pageheader--home"); ?>">

    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <h1><a href="<?php echo site_url(); ?>"><?php bloginfo( "name" ); ?></a></h1>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <?php
                    $socialicons = ot_get_option('social', array() );

                    if(! empty($socialicons)){
                        foreach ($socialicons as $socialicon) {
                        echo    '<li><a href="'.$socialicon['icon_link'].'" data-placement="top" title="'.$socialicon['title'].'"><i class="fa fa-'.$socialicon['icon_name'].'"></i></a></li>';
        
                        }
                    }
                ?>
            </ul> <!-- end header__social -->

            <a class="header__search-trigger" href="#0"></a>

            <div class="header__search">

                <?php get_template_part( "/searchform" ); ?>

                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

            </div>  <!-- end header__search -->


            <?php get_template_part( "template-parts/common/navigation" ); ?>

        </div> <!-- header-content -->
    </header> <!-- header -->


    <?php
    if ( is_home() ) {
        get_template_part( "template-parts/blog-home/featured" );
    }
    ?>

</section> <!-- end s-pageheader -->