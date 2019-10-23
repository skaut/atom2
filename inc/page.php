
<?php

	$id = get_the_ID();

	if (have_posts()): while (have_posts()): the_post();

		switch( get_page_template_slug() ) {

			case( 'inc/temp-kontakt.php' ):

                $args = array(
                    'width' => '100%',
                    'height' => '400px',
                    //'zoom' => 14,
                    //'marker' => true,
                    //'marker_icon'  => 'https://url_to_icon.png',
                    //'marker_title' => 'Detail',
                    //'info_window'  => '<h3>Title</h3><p>Content</p>',
                    'js_options' => array(
                        'scrollWheelZoom' => false,
                    )
                );
                $mapa = !empty( get_post_meta($id,'mb_mapa_adresa',true) ) ? '<h3>'.__('Kde nás najdete','hazmicz').'</h3>'.rwmb_meta( 'mb_mapa', $args ) : null;

                $medailonky_group = rwmb_meta( 'mb_medailonky_group' );

                if ($medailonky_group) {
                    $medailonky = '<h3 class="h3-medailonky">'.__('Vedoucí oddílu','hazmicz').'</h3><section class="section-medailonky">';
                    foreach ($medailonky_group as $kontakt) {
                        $pozice = isset($kontakt['mb_medailonek_pozice']) ? '<small><em>'.$kontakt['mb_medailonek_pozice'].'</em></small><br>' : null;
                        $email = isset($kontakt['mb_medailonek_email']) ? '<div class="email"><a href="mailto:'.$kontakt['mb_medailonek_email'].'" class="small">'.$kontakt['mb_medailonek_email'].'</a></div>' : null;
                        $telefon = isset($kontakt['mb_medailonek_telefon']) ? $kontakt['mb_medailonek_telefon'] : null;
                        $medailonky .= '
                            <article>
                                <figure>'.wp_get_attachment_image( current($kontakt["mb_medailonek_fotografie"]) ).'</figure>
                                <div class="summary">
                                    <h5>'.$kontakt['mb_medailonek_jmeno'].'</h5>
                                    '.$pozice.$email.$telefon.'
                                </div>
                            </article>
                        ';
                    }
                    $medailonky .= '</section>';
                }

                echo '
                    <div class="content-post clearfix">
                        '.apply_filters( 'the_content', get_the_content() ).'
                        '.$mapa.'
                        '.$medailonky.'
                    </div>
                ';

			break;
			default:

				echo '
					<div class="content-post clearfix">
						'.apply_filters( 'the_content', get_the_content() ).'
					</div>
				';

			break;

		}

		$dokumenty = rwmb_meta( 'mb_dokument_soubor' );
		if ($dokumenty) {
		    echo '<h3 class="h3-dokumenty">'.__('Dokumenty ke stažení','hazmicz').'</h3><div class="section-dokumenty"><ul>';
		    foreach ($dokumenty as $soubor) {
                echo '<li><a href="'.$soubor['url'].'" title="'.$soubor['title'].'">'.$soubor['title'].'</a></li>';
		    }
		    echo '</ul></div>';
		}

	endwhile; endif;
