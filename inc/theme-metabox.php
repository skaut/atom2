<?php

add_filter( 'mb_settings_pages', 'option_page' );
function option_page( $settings_pages ) {
    $settings_pages[] = array(
        'id'          => 'atom-settings',
        'columns' => 1,
        'menu_title'  => 'Extra',
        'position' => 1,
        'submit_button' => 'Uložit nastavení',
        'message' => 'Nastavení uloženo.'
    );
    return $settings_pages;
}

add_filter( 'rwmb_meta_boxes', 'mb_register_meta_boxes' );
function mb_register_meta_boxes( $meta_boxes ) {

	$prefix = 'mb_';
	$meta_boxes = array();

	// ----------> EXTRA (settings)

        $meta_boxes[] = array(

            'title' => __( 'Logo organizace', 'hazmicz' ),
            'settings_pages' => 'atom-settings',

            'fields' => array(
                array(
                    'id'   => $prefix . 'logo',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'max_status' => false
                )
            )

        );

    	$meta_boxes[] = array(

    		'title' => __( 'Sociální sítě', 'hazmicz' ),
    		'settings_pages' => 'atom-settings',

    		'fields' => array(
    			array(
    			    'name' 	=> __( 'Facebook', 'hazmicz' ),
    				'id'    => $prefix . 'extra_facebook',
    				'type'  => 'text',
    				'size' 	=> 75
    			),
    			array(
                    'name' 	=> __( 'Instagram', 'hazmicz' ),
                    'id'    => $prefix . 'extra_instagram',
                    'type'  => 'text',
                    'size' 	=> 75
                )
    		)

    	);

    	$meta_boxes[] = array(

            'title' => __( 'Google Analytics', 'hazmicz' ),
            'settings_pages' => 'atom-settings',

            'fields' => array(
                array(
                    'name' 	=> __( 'Měřící kód', 'hazmicz' ),
                    'id'    => $prefix . 'extra_ga',
                    'type'  => 'text',
                    'desc' => 'např. UA-1234567-8',
                    'size' 	=> 75
                )
            )

        );

        $meta_boxes[] = array(

            'title' => __( 'Kalendář (sidebar)', 'hazmicz' ),
            'settings_pages' => 'atom-settings',

            'fields' => array(
                array(
                    'name' 	=> __( 'Shortcode', 'hazmicz' ),
                    'id'    => $prefix . 'extra_cal_shortcode',
                    'type'  => 'text',
                    'desc' => 'viz. nastavení kalendáře',
                    //'size' 	=> 75
                )
            )

        );

        $meta_boxes[] = array(

            'title' => __( 'Archiv článků (úvodní obrázek)', 'hazmicz' ),
            'settings_pages' => 'atom-settings',

            'fields' => array(
                array(
                    'id'   => $prefix . 'header_clanky',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'max_status' => false,
                    'image_size' => 'medium'
                )
            )

        );

        $meta_boxes[] = array(

            'title' => __( 'Výsledky vyhledávání (úvodní obrázek)', 'hazmicz' ),
            'settings_pages' => 'atom-settings',

            'fields' => array(
                array(
                    'id'   => $prefix . 'header_search',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'max_status' => false,
                    'image_size' => 'medium'
                )
            )

        );

        $meta_boxes[] = array(

            'title' => __( 'Loga v patičce', 'hazmicz' ),
            'settings_pages' => 'atom-settings',

            'fields' => array(
                array(
                    'type'  => 'divider'
                ),
                array(
                    'id' => $prefix . 'loga_group',
                    'type' => 'group',
                    'clone' => true,
                    'sort_clone' => true,
                    'collapsible' => true,
                    'group_title' => '{#}',
                    'save_state' => true,
                    'add_button' => '+ Přidat logo',
                    'fields' => array(
                        array(
                            'name' => __( 'URL', 'hazmicz' ),
                            'id' => $prefix . 'logo_url',
                            'type' => 'text',
                            'size' => 75
                        ),
                        array(
                            'name' => __( 'Logo', 'hazmicz' ),
                            'id'   => $prefix . 'logo_img',
                            'type' => 'image_advanced',
                            'max_file_uploads' => 1,
                            'max_status' => false
                        ),
                    ),
                ),
                array(
                    'type'  => 'divider'
                ),
            )

        );

	// ----------> META (title)

	$meta_boxes[] = array(

        'id' => 'meta-title',
        'title' => __( 'Titulek (meta tag)', 'hazmicz' ),
        'post_types' => array( 'page', '_clanky' ),
        //'style' => 'seamless',
        'context' => 'after_title',
        'closed' => true,

        'fields' => array(
            array(
                'id'    => $prefix . 'meta_title',
                'type'  => 'text',
                'size' 	=> 75
            )
        )

    );

	// ----------> META (description)

	$meta_boxes[] = array(

		'id' => 'meta-description',
		'title' => __( 'Popisek (meta tag)', 'hazmicz' ),
		'post_types' => array( 'page', '_clanky' ),
		//'style' => 'seamless',
		'context' => 'after_title',
		'closed' => true,

		'fields' => array(
			array(
                'type'  => 'divider'
            ),
			array(
				'id'    => $prefix . 'meta_description',
				'type'  => 'textarea',
				'maxlength' => 160,
				'after' => '<small>max. 160 znaků</small>'
			)
		)

	);



	// ----------> Homepage

	$meta_boxes[] = array(

		'title' => __( 'Hlavička', 'hazmicz' ),
		'post_types' => array( 'page' ),

		'include' => array(
			'template' => 'inc/temp-home.php'
		),

		'fields' => array(
			array(
				'type'  => 'divider'
			),
			array(
				'name' 	=> __( 'Nadpis', 'hazmicz' ),
				'id'   => $prefix . 'uvod_hlavicka_nadpis',
				'type' => 'text'
			),
			array(
				'name' 	=> __( 'Podnadpis', 'hazmicz' ),
				'id'   => $prefix . 'uvod_hlavicka_podnadpis',
				'type' => 'text'
			),
			array(
				'type'  => 'divider'
			)
		)

	);

	$meta_boxes[] = array(

        'title' => __( 'Odkazy', 'hazmicz' ),
        'post_types' => array( 'page' ),

        'include' => array(
            'template' => 'inc/temp-home.php'
        ),

        'fields' => array(
            array(
                'type'  => 'divider'
            ),
            array(
                'id' => $prefix . 'odkazy_group',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'collapsible' => true,
                'group_title' => array( 'field' => $prefix . 'odkaz_stranka' ),
                //'group_title' => '{#}',
                'save_state' => true,
                'add_button' => '+ Přidat odkaz',
                'fields' => array(
                    array(
                        'name' => __( 'Stránka', 'hazmicz' ),
                        'id' => $prefix . 'odkaz_stranka',
                        'type' => 'post',
                        'post_type' => 'page',
                        'field_type' => 'select_advanced',
                        'placeholder' => __( 'Vybrat', 'hazmicz' ),
                        'query_args'  => array(
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                        ),
                    ),
                    array(
                        'name' => __( 'Ikona', 'hazmicz' ),
                        'id'   => $prefix . 'odkaz_ico',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'max_status' => false
                    ),
                ),
            ),
            array(
                'type'  => 'divider'
            ),
        )

    );



    // ----------> Mapa (kontakt)

    $meta_boxes[] = array(

        'title' => __( 'Mapa', 'hazmicz' ),
        'post_types' => array( 'page' ),

        'include' => array(
            'template' => 'inc/temp-kontakt.php'
        ),

        'fields' => array(
            array(
                'type'  => 'divider'
            ),
            array(
                'name' 	=> __( 'Adresa (na mapě)', 'hazmicz' ),
                'id'   => $prefix . 'mapa_adresa',
                'type' => 'text',
                'size' => 75
            ),
            array(
                'id'   => $prefix . 'mapa',
                'type' => 'osm',
                'std' => '50.0598058,14.3255438',
                'address_field' => 'mb_mapa_adresa',
                //'language' => 'cs',
                'region' => 'CZ'
            ),
            array(
                'type'  => 'divider'
            )
        )

    );



    // ----------> Medailonky (kontakt)

    $meta_boxes[] = array(

        'title' => __( 'Medailonky vedoucích členů', 'hazmicz' ),
        'post_types' => array( 'page' ),

        'include' => array(
            'template' => 'inc/temp-kontakt.php'
        ),

        'fields' => array(
            array(
                'type'  => 'divider'
            ),
            array(
                'id' => $prefix . 'medailonky_group',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'collapsible' => true,
                'group_title' => array( 'field' => $prefix . 'medailonek_jmeno' ),
                //'group_title' => '{#}',
                'save_state' => true,
                'add_button' => '+ Přidat člena',
                'fields' => array(
                    array(
                        'name' => __( 'Jméno', 'hazmicz' ),
                        'id' => $prefix . 'medailonek_jmeno',
                        'type' => 'text'
                    ),
                    array(
                        'name' => __( 'Pozice', 'hazmicz' ),
                        'id' => $prefix . 'medailonek_pozice',
                        'type' => 'text',
                        'size' => 75
                    ),
                    array(
                        'name' => __( 'E-mail', 'hazmicz' ),
                        'id' => $prefix . 'medailonek_email',
                        'type' => 'text'
                    ),
                    array(
                        'name' => __( 'Telefon', 'hazmicz' ),
                        'id' => $prefix . 'medailonek_telefon',
                        'type' => 'text',
                        'size' => 75
                    ),
                    array(
                        'name' => __( 'Fotografie', 'hazmicz' ),
                        'id'   => $prefix . 'medailonek_fotografie',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'max_status' => false
                    ),
                ),
            ),
            array(
                'type'  => 'divider'
            ),
        )

    );



    // ----------> Dokumenty ke stažení

    $meta_boxes[] = array(

        'title' => __( 'Dokumenty ke stažení', 'hazmicz' ),
        'post_types' => array( 'page' ),

        'exclude' => array(
            'template' => 'inc/temp-home.php'
        ),

        'fields' => array(
            array(
                'id'   => $prefix . 'dokument_soubor',
                'type' => 'file_advanced',
                //'max_file_uploads' => 1,
                'max_status' => false
            )
        )

    );



    // ----------> Informujeme

    $meta_boxes[] = array(

        'title' => __( 'Text', 'hazmicz' ),
        'post_types' => array( '_informujeme' ),

        'fields' => array(
            array(
                'id'   => $prefix . 'informujeme_zprava',
                'type' => 'textarea',
            )
        )

    );

	return $meta_boxes;

}



// ----------> Metabox - filters

add_filter( 'rwmb_media_add_string', function(){
    return '+ Přidat soubor(y)';
});
add_filter( 'rwmb_media_remove_string', function(){
    return 'Odebrat';
});
add_filter( 'rwmb_media_edit_string', function(){
    return 'Upravit';
});

// ----------> Metabox - css customizace

add_action( 'admin_head', 'my_custom_metabox_css' );
function my_custom_metabox_css(){

    echo '
    	<style type="text/css">

			small { font-size: 11px }
			.new-files h4, .rwmb-add-file, .rwmb-map-goto-address-button { display: none }
			.rwmb-input h3 { margin: 0 !important }
			.rwmb-divider-wrapper hr { margin: 5px 0 0 !important; border: 0 !important }
			.rwmb-divider-wrapper.divider hr { display: block; padding-top: 30px; border-top: 5px solid #e6e6e6 !important }
			.rwmb-label { width: 130px !important; position: relative; top: 2px }
			.rwmb-checkbox-wrapper .rwmb-label { top: -3px !important }
			.rwmb-group-wrapper .rwmb-clone:after { padding: 0 0 20px !important; margin: 0 !important; border: 0 !important }
			.rwmb-field textarea { width: 100% !important }
			.rwmb-taxonomy-wrapper { padding-top: 0 !important }
			.rwmb-switch-wrapper .rwmb-label { top: -2px !important }
			#meta-title, #meta-description { margin: 20px 0 0 }
			.rwmb-heading-wrapper { margin: 0 0 5px !important }
			.rwmb-heading-wrapper h4 { border: 0; margin: 0; padding: 0 }
			#poststuff h2, .rwmb-heading-wrapper h4 { font-size: 20px; text-transform: none }

			#mb_uvod_hlavicka_nadpis, #mb_uvod_hlavicka_podnadpis { width: 100% !important }

    </style>
    ';

}



?>
