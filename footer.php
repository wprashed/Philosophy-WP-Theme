<!-- <!-- s-extra
================================================== -->
<section class="s-extra">

    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <div class="tagcloud">
                <?php
                if ( is_active_sidebar( "tag-cloud" ) ) {
                    dynamic_sidebar( "tag-cloud" );
                }
                ?>
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->

</section> <!-- end s-extra -->


<!-- s-footer
================================================== -->
<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <?php
                if ( is_active_sidebar( "footer-widget-one" ) ) {
                    dynamic_sidebar( "footer-widget-one" );
                }
            ?>

            <?php
                if ( is_active_sidebar( "footer-widget-two" ) ) {
                    dynamic_sidebar( "footer-widget-two" );
                }
            ?>

            <?php
                if ( is_active_sidebar( "footer-widget-three" ) ) {
                    dynamic_sidebar( "footer-widget-three" );
                }
            ?>

        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <?php
                        $copyright_text = ot_get_option('copyright_text');
                    ?>
                    <span><?php echo $copyright_text; ?></span>
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div> <!-- end s-footer__bottom -->

</footer> <!-- end s-footer -->


<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader">
        <div class="line-scale">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>


<!-- Java Script
================================================== -->
<?php wp_footer(); ?>

</body>

</html>