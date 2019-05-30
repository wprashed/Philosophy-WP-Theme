<div class="entry__text">
    <div class="entry__header">
        <div class="entry__date">
            <?php 
            $archive_year  = get_the_time('Y'); 
            $archive_month = get_the_time('m'); 
            $archive_day   = get_the_time('d'); 
            ?>
            <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo esc_html( get_the_date() ); ?></a>
        </div>
        <h1 class="entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

    </div>
    <div class="entry__excerpt">
        <?php the_excerpt(); ?>
    </div>
    <div class="entry__meta">
        <span class="entry__meta-links">
            <?php
            echo get_the_tag_list();
            ?>
        </span>
    </div>
</div>