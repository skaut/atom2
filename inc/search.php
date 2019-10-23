<?php

    echo '<h5 class="h5">'.__('Hledané slovo','hazmicz').' "'.$s.'" <span class="search-count">('.$wp_query->found_posts.'&times;)</span></h5>';

	echo '<div class="cpt-clanky">';
    if ( have_posts() ): while( have_posts() ): the_post();

        $keys = explode(' ',$s);
        //$title = preg_replace('/('.implode('|', $keys) .')/iu','<span class="search-word">\0</span>',get_the_title());
        $summary = get_the_excerpt() ? wp_trim_words( get_the_excerpt(), 40 ) : wp_trim_words( get_the_content(), 40 );
        $summary = preg_replace('/('.implode('|', $keys) .')/iu','<span class="search-word">\0</span>', $summary);

        echo '
            <article>
                <figure><a href="'.get_permalink().'">'.wp_get_attachment_image( get_post_thumbnail_id(), "medium" ).'</a></figure>
                <div class="summary">
                    <h4><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h4>
                    <div class="meta small">
                        <time datetime="'.get_the_time( 'Y-m-d' ).'" pubdate>'.get_the_date().'</time>
                        <span class="comments">'.get_comments_number().'</span>
                    </div>
                    <p>'.$summary.'</p>
                </div>
            </article>
        ';

    endwhile; endif;
    echo '</div>';

	if( get_previous_posts_link() || get_next_posts_link() ){
        echo '<ul class="nav-posts">';
            if(get_previous_posts_link()) echo '<li class="prev">'.get_previous_posts_link('Předchozí články').'</li>';
            if(get_next_posts_link()) echo '<li class="next">'.get_next_posts_link('Následující články').'</li>';
        echo '</ul>';
    }