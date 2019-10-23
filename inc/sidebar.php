
<div class="box box-informujeme">
<?php
    echo '<h2 class="h2">'.cpt_archive_title('_informujeme').'</h2>';
    $cpt_informujeme = get_posts(array( 'post_type'=>'_informujeme', 'posts_per_page'=>-1, 'fields'=>'ids', 'cache_results'=>false, 'no_found_rows'=>true ));
    if ($cpt_informujeme) {
        echo '<div class="box-wrapper"><ul>';
        foreach ($cpt_informujeme as $data) {
            echo '
                <li>
                    <small class="meta">'.get_the_date().'</small>
                    <h5>'.get_the_title($data).'</h5>
                    <p>'.get_post_meta( $data, "mb_informujeme_zprava", true ).'</p>
                </li>
            ';
        }
        echo '</ul></div>';
    }
?>
</div>

<?php
    $cal_shortcode = rwmb_meta( 'mb_extra_cal_shortcode', array( 'object_type' => 'setting' ), 'atom-settings' );
    if ($cal_shortcode) {
    echo '
        <div class="box box-kalendar">
            <h2 class="h2">'.__('Nejbližší akce','hazmicz').'</h2>
            <div class="box-wrapper">'.do_shortcode($cal_shortcode).'</div>
        </div>
    ';
    }