<div class="cpt-clanky">
    <header>
        <h2 class="h2"><?php _e('Články z akcí','hazmicz') ?></h2>
        <a href="<?php echo get_post_type_archive_link('_clanky') ?>" class="btn"><?php _e('Archiv článků','hazmicz') ?></a>
    </header>
    <?php
        $clanky = get_posts(array( 'post_type'=>'_clanky','posts_per_page'=>POSTS_PER_PAGE, 'cache_results'=>false, 'no_found_rows'=>true ));
        foreach ($clanky as $clanek) {
            $summary = $clanek->post_excerpt ? wp_trim_words( $clanek->post_excerpt, 40 ) : wp_trim_words( $clanek->post_content, 40 );
            echo '
                <article>
                    <figure><a href="'.get_permalink($clanek->ID).'">'.wp_get_attachment_image( get_post_thumbnail_id($clanek->ID), "medium" ).'</a></figure>
                    <div class="summary">
                        <h4><a href="'.get_permalink($clanek->ID).'" title="'.$clanek->post_title.'">'.$clanek->post_title.'</a></h4>
                        <div class="meta small">
                            <time datetime="'.date( 'Y-m-d', strtotime($clanek->post_date) ).'" pubdate>'.date('j. n. Y', strtotime($clanek->post_date) ).'</time>
                            <span class="comments">'.get_comments_number($clanek->ID).'</span>
                        </div>
                        <p>'.$summary.'</p>
                    </div>
                </article>
            ';
        }
    ?>
</div>