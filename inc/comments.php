<?php

$comments_args = array(
    'style' => 'div'
);
$form_args = array(
    //'comment_notes_before' => ''
);

?>

<div class="comments-wrapper content-post">

    <?php
        if( get_comments_number() ) {
            echo '<div class="comments-list">';
            wp_list_comments( $comments_args );
            echo '</div>';
        }
    ?>

    <div class="comment-form">
        <?php comment_form( $form_args ) ?>
    </div>

</div>
