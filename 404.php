<!DOCTYPE html>
<html lang="cs-CZ">

<?php get_template_part('inc/head') ?>

<body <?php body_class() ?>>

<div id="main">
<?php
    echo '
        <h1>'.__( '404' ).'</h1>
        <p>'.__( 'Je nám líto, ale požadovaná stránka nebyla nalezena...' ).'</p>
        <a href="'.home_url('/').'" class="btn">'.__('Zpět na hlavní stránku', 'hazmicz').'</a>
    ';
?>
</div>

</body>
</html>
