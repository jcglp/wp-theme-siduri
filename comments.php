
<?php
if ( ! comments_open() )
  return;

?>

<div class="comment-section">
  <div class="grids_of_2">

    <h2><?php _e('Comentarios', SIDURI_TEXT_DOMAIN); ?></h2>

    <?php if ( have_comments() ) : ?>
      <?php wp_list_comments( array(
                                    'type' => 'comment'
                                  , 'avatar_size' => 32
                                  , 'callback' => 'siduri_comment'
                                )
                             ); ?>

    <?php endif; ?>

    <div class="artical-commentbox div-comment">

      <?php
      $commenter = wp_get_current_commenter();
      $req = get_option( 'require_name_email' );
      $aria_req = ( $req ? " aria-required='true'" : '' );

      $fields = array(
        'author' => '<div><label for="author">'
                      . __( 'Nombre', SIDURI_TEXT_DOMAIN )
                      . ( $req ? '<span class="required">*</span>' : '' ) . '</label>'
                      .'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                      '" size="30"' . $aria_req . ' />'
                      .'</div>',
        'email' =>  '<div><label for="email">'
                      . __( 'Email', SIDURI_TEXT_DOMAIN )
                      . ( $req ? '<span class="required">*</span>' : '' ) . '</label>'
                      . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                      '" size="30"' . $aria_req . ' />'
                      .'</div>' );

      $comments_args = array(
        'title_reply' => '<h2>' . __('Deja un comentario', SIDURI_TEXT_DOMAIN) . '</h2>',
        'fields'=> $fields

      );
      comment_form( $comments_args );
      ?>

    </div>
  </div>
</div>
<!---//End-comments-section--->
