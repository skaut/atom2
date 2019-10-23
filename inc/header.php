<?php

    $logo = rwmb_meta( 'mb_logo', array( 'object_type' => 'setting' ), 'atom-settings' );
    if ($logo) {
        $id = current($logo)['ID'];
        $img = wp_get_attachment_image_src( $id, 'logo' );
        $img_tag = '<img src="'.current($img).'" alt="'.TEMP_NAME.'" width="'.$img[1].'" height="'.$img[2].'">';
        if (is_home() || is_front_page() ) {
            echo '<div id="logo">'.$img_tag.'</div>';
        } else {
            echo '<a href="'.home_url("/").'" title="'.TEMP_NAME.' ['.__( 'Úvodní stránka' ).']" id="logo">'.$img_tag.'</a>';
        }
    }

	wp_nav_menu(array(
		'theme_location' => 'navigace',
		'container' => 'nav',
		'container_class' => '',
		'menu_id' => '',
		'menu_class' => 'header-menu',
		'depth' => '1'
	));

	get_template_part('inc/searchform');

?>

