<?php
the_post();
get_header();
?>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php _e( 'Oops! That page can&rsquo;t be found.', 'philosophy' ); ?>
                </h1>
            </div> <!-- end s-content__header -->

            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/404.png">
                </div>
            </div> <!-- end s-content__media -->

        </article>

    </section>


<?php get_footer(); ?>