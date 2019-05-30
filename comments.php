<?php

if ( post_password_required() ) {
    return;
}
?>
<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">

        <?php
        // You can start editing here -- including this comment!
        if ( have_comments() ) : ?>
            <h3 class="h2 comments-title">
                <?php
                $comments_number = get_comments_number();
                if ( '1' === $comments_number ) {
                    /* translators: %s: post title */
                    printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'philosophy' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s Reply to &ldquo;%2$s&rdquo;',
                            '%1$s Replies to &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'philosophy'
                        ),
                        number_format_i18n( $comments_number ),
                        get_the_title()
                    );
                }
                ?>
            </h3>

            <ol class="commentlist">
                <?php
                    wp_list_comments( array(
                        'avatar_size' => 100,
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'reply_text'  => '<i class="fa fa-mail-reply"></i>' . __( 'Reply', 'philosophy' ),
                    ) );
                ?>
            </ol>
            <div class="comments-pagination">
                <?php the_comments_pagination( array(
                    'prev_text' => '<' . __( 'Previous Comments', 'philosophy' ),
                    'next_text' => '>' . __( 'Next Comments', 'philosophy' ),
                ) );

                endif; // Check for have_comments().

                // If comments are closed and there are comments, let's leave a little note, shall we?
                if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

                    <p class="no-comments"><?php _e( 'Comments are closed.', 'philosophy' ); ?></p>
            </div>
            <div class="respond">
                <?php
                endif;

                comment_form();
                ?>
            </div>

        </div> <!-- end col-full -->

    </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->



