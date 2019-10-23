<head>
<meta charset="utf-8">

<title><?php wp_title('') ?></title>

<base href="<?php echo home_url('/') ?>">

<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<!--<meta name="author" content="<?php echo TEMP_NAME ?>">-->
<meta name="description" content="<?php echo get_post_meta( my_ID(), 'mb_meta_description', true ) ? : TEMP_DESC ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:locale" content="cs_CZ">
<meta property="og:site_name" content="<?php echo TEMP_NAME ?>">
<meta property="og:title" content="<?php echo is_single() ? get_the_title() : TEMP_NAME ?>">
<meta property="og:url" content="<?php echo (is_singular()) ? get_permalink() : home_url('/') ?>">
<meta property="og:type" content="<?php echo is_single() ? 'article' : 'website' ?>">
<meta property="og:description" content="<?php echo is_single() ? get_post_meta( my_ID(), 'mb_meta_description', true ) : TEMP_DESC ?>">
<meta property="og:image" content="<?php echo (is_single() && has_post_thumbnail()) ? current(wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )) : TEMP_URI.'/img/og-image.png' ?>">
<?php // <meta property="fb:app_id" content=""> ?>

<meta name="msapplication-TileColor" content="#1b3165">
<meta name="msapplication-config" content="<?php echo TEMP_URI ?>/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#1b3165">

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo TEMP_URI ?>/img/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo TEMP_URI ?>/img/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo TEMP_URI ?>/img/favicons/favicon-16x16.png">
<link rel="manifest" href="<?php echo TEMP_URI ?>/img/favicons/site.webmanifest">
<link rel="mask-icon" href="<?php echo TEMP_URI ?>/img/favicons/safari-pinned-tab.svg" color="#1b3165">
<link rel="shortcut icon" href="<?php echo TEMP_URI ?>/img/favicons/favicon.ico">

<?php
	get_template_part( 'inc/gtag' );
	wp_head();
?>

</head>
