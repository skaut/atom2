<?php

date_default_timezone_set( 'Europe/Prague' );

// ----------> konstanty

define( 'CURRENT_DATE', date_i18n('Y-m-d') );
define( 'CURRENT_DATE_TIME', date_i18n('Y-m-d H:i') );
define( 'POSTS_PER_PAGE', get_option('posts_per_page') );
define( 'TEMP_NAME', get_bloginfo( 'name' ) );
define( 'TEMP_DESC', get_bloginfo( 'description' ) );
define( 'TEMP_URI', get_template_directory_uri() );



// ----------> přesměrování

// ----------> main QUERY

// ----------> assets

add_action( 'wp_enqueue_scripts', function() {

	wp_register_style( 'google-webfont', 'https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900&display=swap&subset=latin-ext', false );
	wp_register_style( 'lightcase', TEMP_URI . '/css/lightcase.css', array(), null, 'all' );
	wp_register_style( 'perfect-scrollbar', TEMP_URI . '/css/perfect-scrollbar.css', array(), null, 'all' );
	wp_register_style( 'css', TEMP_URI . '/css/style.css', array(), filemtime(substr( parse_url( TEMP_URI.'/css/style.css', PHP_URL_PATH ), 1 )), 'all' );
	wp_register_style( 'rcss', TEMP_URI . '/css/rstyle.css', array(), filemtime(substr( parse_url( TEMP_URI.'/css/rstyle.css', PHP_URL_PATH ), 1 )), 'all' );
	wp_register_style( 'print', TEMP_URI . '/css/print.css', array(), filemtime(substr( parse_url( TEMP_URI.'/css/print.css', PHP_URL_PATH ), 1 )), 'print' );

	wp_register_script( 'events-touch', TEMP_URI . '/js/jquery.events.touch.js', array('jquery'), '1.5.0', true );
	wp_register_script( 'lightcase', TEMP_URI . '/js/lightcase.js', array('jquery'), '2.5.0', true );
	wp_register_script( 'perfect-scrollbar', TEMP_URI . '/js/perfect-scrollbar.min.js', array('jquery'), '0.5.2', true );
	wp_register_script( 'main-js', TEMP_URI . '/js/main.js', array('jquery'), filemtime(substr( parse_url( TEMP_URI.'/js/main.js', PHP_URL_PATH ), 1 )), true );

	wp_enqueue_style( 'google-webfont' );
	wp_enqueue_style( 'lightcase' );
	wp_enqueue_style( 'perfect-scrollbar' );
	wp_enqueue_style( 'css' );
	wp_enqueue_style( 'rcss' );
	wp_enqueue_style( 'print' );

	wp_enqueue_script( 'events-touch' );
	wp_enqueue_script( 'lightcase' );
	wp_enqueue_script( 'perfect-scrollbar' );
	wp_enqueue_script( 'main-js' );

});



// ----------> ADMIN - customizace

add_action( 'login_head', function() { echo '<style type="text/css"> body.login h1 { background: none; margin: 0 0 20px; padding: 0 } body.login h1 a { margin: 0 auto; background: transparent url('.TEMP_URI.'/img/a-tom_logo.png) no-repeat 50% 0 !important; background-size: 100% !important; position: relative; left: 0; top: 0; display: block; width: 75px !important; height: 120px !important } </style>'; } );
add_filter( 'login_headerurl', function() { return home_url('/'); } );
add_filter( 'login_headertext', function() { return TEMP_NAME; } );

add_theme_support( 'post-thumbnails', array( 'page', '_clanky' ) );
add_image_size( 'page-header', 1280, 3840 );
add_image_size( 'full_hd', 1920, 1080 );
add_image_size( 'logo', 100, 100 );
add_image_size( 'logo_partner', 999, 100 );

add_shortcode( 'gallery', function($atts) { $atts['link'] = 'file'; return gallery_shortcode( $atts ); } );

add_action( 'admin_head', function() {
	echo '
		<style type="text/css">
			#publish { font-size: 16px; height: 40px; line-height: 38px; padding: 0 20px 2px }
		</style>
	';
});

function wpc_dashboard_widget_function() { echo "Nacházíte se v administraci webových stránek."; }
add_action( 'wp_dashboard_setup', function() {
	wp_add_dashboard_widget( 'wp_dashboard_widget', TEMP_NAME, 'wpc_dashboard_widget_function' );
});

add_action( 'wp_dashboard_setup', function() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // Aktivity
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Aktuální přehled/Right Now
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins - Popular, New and Recently updated WordPress Plugins
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press Form
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts List
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // Wordpress Development Blog Feed
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News Feed
	//unset($wp_meta_boxes['dashboard']['normal']['high']['dashboard_browser_nag']); // hláška o nepodporovaném prohlížeči
	//unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
});

remove_action( 'welcome_panel', 'wp_welcome_panel' );

add_action( 'wp_before_admin_bar_render', function() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
	//$wp_admin_bar->remove_menu( 'comments' );
	$wp_admin_bar->remove_menu( 'updates' );
	$wp_admin_bar->remove_menu( 'new-content' );
});

add_action( 'admin_menu', function() {
	remove_menu_page( 'edit.php' );
	//remove_menu_page( 'edit-comments.php' );
	//remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	//remove_submenu_page( 'edit.php', 'post-new.php' );
	//remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
	//remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
});

add_filter( 'custom_menu_order', 'custom_menu_order' );
add_filter( 'menu_order', 'custom_menu_order' );
function custom_menu_order($menu_ord) {

	if (!$menu_ord) return true;

	return array(
		'index.php', // Dashboard
		'separator1', // First separator
		'edit.php?post_type=_clanky',
		'edit-comments.php', // Comments
		'edit.php?post_type=_informujeme',
		'edit.php?post_type=page', // Pages
		'separator2', // Second separator
		'separator-last', // Last separator
		//'edit.php', // Posts
		'upload.php', // Media
		'users.php', // Users
		'link-manager.php', // Links
		'themes.php', // Appearance
		'plugins.php', // Plugins
		'tools.php', // Tools
		'options-general.php', // Settings
	);

}

add_filter( 'get_sample_permalink_html', function( $return, $post_id, $new_title, $new_slug, $post ) {
	if ( ($post->post_type === '_informujeme') ) {
		return '';
	}
	return $return;
}, 10, 5 );

add_action( 'admin_head-post-new.php', 'posttype_admin_css' );
add_action( 'admin_head-post.php', 'posttype_admin_css' );
function posttype_admin_css() {
    global $post_type;
    $post_types = array( '_informujeme' );
    if( in_array($post_type, $post_types) )
    echo '<style type="text/css">#post-preview, #view-post-btn {display: none;}</style>';
}

add_filter( 'post_row_actions', function( $actions, $post ) {
	if( ($post->post_type == '_informujeme') ) {
		unset( $actions['inline hide-if-no-js'] );
		unset( $actions['view'] );
	}
	return $actions;
}, 10, 2 );

add_filter( 'manage_pages_columns', function( $posts_columns ) {
	$posts_columns = array(
		"cb" => '<input type="checkbox" />',
		"title" => __( 'Název' , 'hazmicz' ),
	);
	return $posts_columns;
});

add_action( 'admin_menu', function() {
	remove_meta_box( 'tagsdiv-post_tag' , 'page' , 'side' );
});

add_filter( 'manage_posts_columns', function( $columns, $post_type ) {
	switch( $post_type ){

	    case '_clanky':
	    $columns['post_thumb'] = __( 'Náhledový obrázek', 'hazmicz' );
	    //unset( $columns['date'] );
	    //unset( $columns['tags'] );
	    break;

	    case '_informujeme':
        $columns['post_zprava_text'] = __( 'Text', 'hazmicz' );
        break;

	}
	return $columns;
}, 10, 2 );

add_action( 'manage_posts_custom_column', function( $column, $post_id ) {
	switch( $column ){

		case 'post_thumb':
			if ( has_post_thumbnail() ) { set_post_thumbnail_size(160,80,true); the_post_thumbnail(); }
		break;

		case 'post_zprava_text':
            echo get_post_meta( get_the_ID(), 'mb_informujeme_zprava', true ) ? : null;
        break;

		case '__COL__':
			echo get_post_meta( get_the_ID(), 'mb_', true ) ? : null;
		break;

	}
}, 10, 2 );

add_action( 'init', function() {
	register_nav_menus(
		array(
			'navigace' => __( 'Hlavička', 'hazmicz' )
		)
	);
});



// ----------> Odstraní P tagy kolem obrázků

add_filter( 'the_content', function( $content ) { return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content); });



// ----------> Odstraní inline CSS pro nativní galerie

add_filter( 'gallery_style', function( $css ) { return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css ); });



// ----------> získá ID postu (i na statické front_page) !!!

function my_ID() {
	return is_front_page() ? get_option( 'page_on_front' ) : get_the_ID();
}



// ----------> vlastní TITLE

add_filter( 'wp_title', function( $title ) {

	if( is_404() ) return '404';
	if( is_home() || is_front_page() ) return ($meta_title = get_post_meta( my_ID(), 'mb_meta_title', true )) ? $meta_title.' - '.TEMP_DESC : TEMP_NAME.' - '.TEMP_DESC;
	return ($meta_title = get_post_meta( my_ID(), 'mb_meta_title', true )) ? $meta_title.' | '.TEMP_NAME : trim($title).' | '.TEMP_NAME;

}, 10, 1 );



// ----------> add class to previous/next

add_filter( 'next_posts_link_attributes', 'posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'posts_link_attributes' );
function posts_link_attributes() {
    return 'class="btn"';
}



// ----------> disable content editor for custom page

add_action( 'admin_head', function() {

	$template_file = basename( get_page_template() );
	if(
		($template_file == 'temp-home.php')
	){
		remove_post_type_support( 'page', 'editor' );
	}

});



// ----------> ponechání hierarchie zaškrtnutých kategorií/taxonomií

add_filter( 'wp_terms_checklist_args', function( $args ) {
	$args['checked_ontop'] = false;
	return $args;
});



// ----------> remove IDs a CLASSes from wp_nav_menu

add_filter( 'nav_menu_item_id', '__return_null', 10, 3 );
//add_filter( 'nav_menu_css_class', '__return_empty_array', 10, 3 );



// ----------> enable SVG support to media library

add_filter( 'image_downsize', 'wpse240579_fix_svg_size_attributes', 10, 2 );
function wpse240579_fix_svg_size_attributes( $out, $id ) {
    $image_url  = wp_get_attachment_url( $id );
    $file_ext   = pathinfo( $image_url, PATHINFO_EXTENSION );
    if ( is_admin() || 'svg' !== $file_ext ) {
        return false;
    }
    return array( $image_url, null, null, false );
}
/*
add_filter( 'upload_mimes', 'cc_mime_types' );
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
*/



// ----------> Post Type Archive Title

function cpt_archive_title($cpt) {
    $obj = get_post_type_object($cpt);
    return apply_filters( 'post_type_archive_title', $obj->labels->menu_name );
}



// ----------> PRE GET POSTS (main Query)

add_action( 'pre_get_posts', function($query) {

    // vyhledávání pouze mezi články
    if( !is_admin() && $query->is_main_query() && is_search() ) {
        $query->set( 'post_type', array( '_clanky' ) );
		}

});



// ----------> Comments (fields)

add_filter( 'comment_form_default_fields', function($fields) {
    unset($fields['url']);
    unset($fields['cookies']);
    return $fields;
});




