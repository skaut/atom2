<!DOCTYPE html>
<html lang="cs-CZ">

<?php get_template_part( 'inc/head' ) ?>

<body <?php body_class() ?>>

<div id="main-wrapper"><div id="main">

<header id="header" class="content-wrapper"><?php get_template_part( 'inc/header' ) ?></header>

<?php

	get_template_part( 'inc/page-header' );

	switch( get_page_template_slug() ) {

	    case( 'inc/temp-kalendar.php' ):
	    case( 'inc/temp-fotogalerie.php' ):

	    echo '
            <div class="layout-wrapper no-sidebar content-wrapper">
            <div class="col-content">
        ';

	        get_template_part( 'inc/page' );

        echo '
            </div>
            </div><!--/layout-wrapper-->
        ';

	    break;

	    default:

        echo '
            <div class="layout-wrapper content-wrapper">
            <div class="col-content">
        ';

            if (is_home() || is_front_page()) {
                get_template_part( 'inc/home' );
            } elseif (is_archive()) {
                get_template_part( 'inc/archive' );
            } elseif (is_single()) {
                get_template_part( 'inc/single' );
            } elseif (is_search()) {
                get_template_part( 'inc/search' );
            } else {
                get_template_part( 'inc/page' );
            }

        echo '
            </div>
            <div class="col-sidebar">
        ';

        get_template_part( 'inc/sidebar' );

        echo '
            </div>
            </div><!--/layout-wrapper-->
        ';

	    break;

    }

    if (is_home() || is_front_page()) get_template_part( 'inc/home-rozcestnik' );

?>

</div></--/main-->

<footer id="footer"><?php get_template_part( 'inc/footer' ) ?></footer>

</div><!--/main-wrapper-->

</body>
</html>
