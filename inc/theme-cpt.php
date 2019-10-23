<?php

 // ----------> Custom Taxonomies & Post Types

add_action( 'init', function() {

	register_post_type( '_clanky',
		array(
			'labels' => array(
				'name' => __( 'Archiv článků', 'hazmicz' ),
				'menu_name' => __( 'Články', 'hazmicz' ),
				'all_items' => __( 'Archiv', 'hazmicz' ),
				'archives' => __( 'Články', 'hazmicz' ),
				'singular_name' => __( 'Články', 'hazmicz' ),
				'add_new' => __( 'Přidat článek', 'hazmicz' ),
				'add_new_item' => __( 'Přidat článek', 'hazmicz' ),
				'edit_item' => __( 'Editovat článek', 'hazmicz' ),
				'new_item' => __( 'Přidat článek', 'hazmicz' ),
				'view' => __( 'Zobrazit článek', 'hazmicz' ),
				'view_item' => __( 'Zobrazit článek', 'hazmicz' ),
				'search_items' => __( 'Vyhledat článek', 'hazmicz' ),
				'not_found' => __( 'Seznam je prázdný...', 'hazmicz' ),
				'not_found_in_trash' => __( 'Koš je prázdný', 'hazmicz' ),
				//'featured_image' => __( 'Náhledový obrázek', 'hazmicz' ),
				//'set_featured_image' => __( 'Zvolit náhledový obrázek', 'hazmicz' ),
				//'remove_featured_image' => __( 'Odstranit náhledový obrázek', 'hazmicz' ),
			),
		'rewrite' => array( 'slug' => 'clanky', 'with_front' => false ),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-welcome-write-blog',
		'supports' => array( 'title', 'editor', 'excerpt', 'comments', 'thumbnail' )
		)
	);

	register_post_type( '_informujeme',
        array(
            'labels' => array(
                'name' => __( 'Archiv zpráv', 'hazmicz' ),
                'menu_name' => __( 'Informujeme', 'hazmicz' ),
                'all_items' => __( 'Archiv', 'hazmicz' ),
                'archives' => __( 'Informujeme', 'hazmicz' ),
                'singular_name' => __( 'Informujeme', 'hazmicz' ),
                'add_new' => __( 'Přidat zprávu', 'hazmicz' ),
                'add_new_item' => __( 'Přidat zprávu', 'hazmicz' ),
                'edit_item' => __( 'Editovat zprávu', 'hazmicz' ),
                'new_item' => __( 'Přidat zprávu', 'hazmicz' ),
                'view' => __( 'Zobrazit zprávu', 'hazmicz' ),
                'view_item' => __( 'Zobrazit zprávu', 'hazmicz' ),
                'search_items' => __( 'Vyhledat zprávu', 'hazmicz' ),
                'not_found' => __( 'Seznam je prázdný...', 'hazmicz' ),
                'not_found_in_trash' => __( 'Koš je prázdný', 'hazmicz' ),
            ),
        'public' => true,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array( 'title' )
        )
    );

});

