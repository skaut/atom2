<?php

	$id = my_ID();

	$page_title = get_post_meta( $id, 'mb_meta_title', true ) ? : get_the_title();
	$page_subtitle = null;
	$page_header = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'page-header' );
	$page_thumbnail = $page_header ? ' style="background: url('.current($page_header).')"' : null;

	if ( is_home() || is_front_page() ) {

		$page_title = get_post_meta( $id, 'mb_uvod_hlavicka_nadpis', true );
		$page_subtitle = '<h4>'.get_post_meta( $id, 'mb_uvod_hlavicka_podnadpis', true ).'</h4>';

	} elseif ( is_post_type_archive('_clanky') ) {

        $page_title = post_type_archive_title( null, false );
        $image = rwmb_meta( 'mb_header_clanky', array( 'object_type' => 'setting' ), 'atom-settings' );
        $page_thumbnail = ($bg = current(wp_get_attachment_image_src( current($image)['ID'], 'page-header' ))) ? ' style="background: url('.$bg.')"' : null;

    } elseif ( is_search() ) {

        $page_title = __('Výsledky vyhledávání','hazmicz');
        $image = rwmb_meta( 'mb_header_search', array( 'object_type' => 'setting' ), 'atom-settings' );
        $page_thumbnail = ($bg = current(wp_get_attachment_image_src( current($image)['ID'], 'page-header' ))) ? ' style="background: url('.$bg.')"' : null;

    }

	echo '
        <div class="page-header cover"'.$page_thumbnail.'"><div class="content-wrapper">
            <div class="summary animated fadeInLeft">
                <h1 class="h1">'.$page_title.'</h1>
                '.$page_subtitle.'
            </div>
        </div></div>
    ';
