<?php get_header() ?>


    <!-- s-content
    ================================================== -->
    <section class="s-content">

        <div class="row narrow">
            <div class="s-content__author">
                    <?php echo get_avatar( get_the_author_meta( "ID" ) ); ?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <?php echo strtoupper(get_the_author_meta( "display_name" )); ?>
                        </h4>

                        <p>
                            <?php echo get_the_author_meta( "description" ); ?>
                        </p>

                        <ul class="s-content__author-social">
                            <?php
                            $philosophy_author_facebook  = get_field( "facebook", "user_" . get_the_author_meta( "ID" ) );
                            $philosophy_author_twitter   = get_field( "twitter", "user_" . get_the_author_meta( "ID" ) );
                            $philosophy_author_instagram = get_field( "instagram", "user_" . get_the_author_meta( "ID" ) );
                            ?>
                            <?php if ( $philosophy_author_facebook ): ?>
                                <li><a href="<?php echo esc_url( $philosophy_author_facebook ); ?>">Facebook</a></li>
                            <?php endif; ?>
                            <?php if ( $philosophy_author_twitter ): ?>
                                <li><a href="<?php echo esc_url( $philosophy_author_twitter ); ?>">Twitter</a></li>
                            <?php endif; ?>
                            <?php if ( $philosophy_author_instagram ): ?>
                                <li><a href="<?php echo esc_url( $philosophy_author_instagram ); ?>">Instagram</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
        </div>

        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <?php
                if ( ! have_posts() ):
                    ?>
                    <h5 class="text-center"><?php _e("There is no post in this category","philosophy"); ?></h5>
                <?php
                endif;
                ?>


                <?php
                while ( have_posts() ) {
                    the_post();
                    get_template_part( "template-parts/post-formats/post", get_post_format() );
                }
                ?>

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <?php philosophy_pagination(); ?>
                </nav>
            </div>
        </div>


    </section> <!-- s-content -->


<?php get_footer(); ?>