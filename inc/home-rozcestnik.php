<?php
    $links = get_post_meta(my_ID(), 'mb_odkazy_group', false);
    if ($links) {
        echo '<div class="content-wrapper"><div class="section-rozcestnik"><ul class="cover">';
        foreach (current($links) as $data) {
            $id = $data['mb_odkaz_stranka'];
            $title = get_the_title($id);
            echo '
                <li>
                    <a href="'.get_permalink($id).'" title="'.$title.'">
                        <figure>'.wp_get_attachment_image( current($data['mb_odkaz_ico']) ).'</figure>
                        <h4>'.$title.'</h4>
                    </a>
                </li>
            ';
        }
        echo '</ul></div></div>';
    }
