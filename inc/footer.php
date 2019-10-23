<?php $settings = get_option( 'atom-settings' ) ?>

<div class="content-wrapper">

    <div class="col-left foo-logos">
    <?php
        if ($settings['mb_loga_group']) {
            foreach($settings['mb_loga_group'] as $logo){
                $id = current($logo['mb_logo_img']);
                $img = wp_get_attachment_image_src( $id, 'logo_partner' );
                if (isset($logo['mb_logo_url'])) {
                    echo '<a href="'.$logo['mb_logo_url'].'" onclick="return!window.open(this.href);" rel="nofollow"><img src="'.current( $img ).'" alt="" width="'.$img[1].'" height="'.$img[2].'"></a>';
                } else {
                    echo '<img src="'.current( $img ).'" alt="" width="'.$img[1].'" height="'.$img[2].'">';
                }
            }
        }
    ?>
    </div>

    <div class="col-right">
        <div class="tar copyright">
            &copy;&nbsp;<?php echo date('Y') ?>&nbsp;<strong><?php echo $_SERVER["SERVER_NAME"] ?></strong><br>
            Webové stránky běží na <a href="https://cs.wordpress.org/" onclick="return!window.open(this.href);" rel="nofollow">Wordpressu</a>
        </div>
        <div class="foo-icons">
        <?php
            if ($settings['mb_extra_facebook']) echo '<a href="'.$settings['mb_extra_facebook'].'" class="ico-fb" title="Jsme na Facebooku" onclick="return!window.open(this.href);">Jsme na Facebooku</a>';
            if ($settings['mb_extra_instagram']) echo '<a href="'.$settings['mb_extra_instagram'].'" class="ico-ig" title="Jsme na Instagramu" onclick="return!window.open(this.href);">Jsme na Instagramu</a>';
        ?>
        </div>
    </div>

</div>

<?php wp_footer() ?>
