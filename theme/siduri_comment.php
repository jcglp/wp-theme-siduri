<?php
if(!defined('ABSPATH')) exit;

function siduri_comment($comment, $args, $depth) {

	$class_depth = false;
	if ($depth>1):
		$class_depth = 'left';
	endif;
	?>

	<div id="div-comment-<?php comment_ID() ?>"  class="grid1_of_2 <?php echo $class_depth; ?>">
		<div class="grid_img">
			<?php
			if ( $args['avatar_size'] != 0 ):
				echo get_avatar( $comment, $args['avatar_size'] );

			else: ?>
			<a href=""><img src="<?php echo SIDURI_THEME_URL.'/images/avatar-comment-default.jpg'; ?>" alt=""></a>

      <?php
			endif; ?>
		</div>

		<div class="grid_text">
			<?php
				$comment_author = get_comment_author();
			?>
			<h4 class="style1 list"><a href="#"><?php echo get_comment_author(); ?></a></h4>
			<h3 class="style">
				<?php printf(	__('%1$s at %2$s'),	get_comment_date(), get_comment_time() ); ?>
				<?php
					edit_comment_link( __( '(Editar)', SIDURI_TEXT_DOMAIN ), '  ', '' ); ?>
			</h3>

			<p class="para top">
				<?php
				if ( $comment->comment_approved == '0' ) { ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><?php
				} ?>
				<?php comment_text(); ?>


				<?php
				// Link para responder al comentario.
				$onclick = sprintf( 'return addComment.moveForm( "%1$s-%2$s", "%2$s", "%3$s", "%4$s" )',
			             'div-comment', $comment->comment_ID, 'respond', get_the_ID()
			         );


				$link = sprintf( "<a rel='nofollow' class='btn1' href='%s' onclick='%s' aria-label='%s'>%s</a>",
           esc_url( add_query_arg( 'replytocom', $comment->comment_ID, get_permalink( get_the_ID() ) ) ) . "#" . $args['respond_id'],
           $onclick,
					 esc_attr( sprintf( __('Responder a %1$s', SIDURI_TEXT_DOMAIN), $comment->comment_author ) ),
					 __('Click para responder', SIDURI_TEXT_DOMAIN)
       	);
			 	echo  $link ;

			 ?>

			</p>

		</div>
		<div class="clear"></div>
	</div>
<?php
}


add_filter('get_comment_author', 'siduri_comment_author', 10, 1);
function siduri_comment_author( $author = '' ) {
    // Get the comment ID from WP_Query
    $comment = get_comment( $comment_ID );

    if ( empty($comment->comment_author) ) {
        if (!empty($comment->user_id)){
            $user=get_userdata($comment->user_id);
            $author=$user->display_name; // this is the actual line you want to change
        } else {
            $author = __('Anonymous');
        }
    } else {
        $author = $comment->comment_author;
    }
    return $author;

}


add_filter( 'comment_form_default_fields', 'siduri_comment_fields', 10, 1);
function siduri_comment_fields($fields){
  unset($fields['url']);
  return $fields;

}
