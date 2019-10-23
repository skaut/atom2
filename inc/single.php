<?php

	//echo'<pre>';print_r(get_queried_object());echo'</pre>';

	$id = get_the_ID();

	if (have_posts()): while (have_posts()): the_post();

	    if( is_singular('_clanky') ){

            echo '
                <div class="content-post clearfix">
                    <div class="post-meta">
                        <time datetime="'.get_the_time( 'Y-m-d' ).'" pubdate>'.get_the_date().'</time>
                        <span class="comments">'.get_comments_number().'</span>
                    </div>
                    '.apply_filters('the_content',get_the_content()).'
                    <div class="post-share tar">
                    '.__("Dejte o tomto článku vědět ostatním","hazmicz").' &nbsp; &rarr; &nbsp;
                        <a href="#" class="btn btn-fb" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u=\'+encodeURIComponent(location.href),\'facebook-share-dialog\',\'width=626,height=436\');return false;">Sdílet na Facebooku</a>
                    </div>
                </div>
            ';

            if ( comments_open() || get_comments_number() ) { comments_template( '/inc/comments.php' ); }

        }

	endwhile; endif;