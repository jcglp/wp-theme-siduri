<?php get_header(); ?>
	<div class="wrap">
		<?php
		if (have_posts()):
			while (have_posts()): the_post(); ?>
			<div class="single-page">
				<div class="single-page-artical">
					<div class="artical-content" id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" >
						<?php
						if (has_post_thumbnail()): ?>
							<img class="siduri-destacada" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
						<?php
						else: ?>
							<img src="<?php echo get_template_directory_uri().'/images/single-post-pic.jpg';?>" >
						<?php
						endif; ?>

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_content(); ?></p>
					</div>

					<div class="artical-links">
						<ul>

							<li>
								<a href="<?php echo get_author_posts_url(get_the_author_id()); ?>">
									<img src="<?php echo SIDURI_THEME_URL.'/images/blog-icon2.png'; ?>" title="<?php echo get_the_author(); ?>">
									<span><?php echo get_the_author(); ?></span>
								</a>
							</li>

							<?php
							// Si los comentarios estan abiertos, se muestra
							// el icono y el número de los mismos.
							if ( comments_open() ): ?>
							<li>
								<a href="#">
								<img src="<?php echo SIDURI_THEME_URL.'/images/blog-icon3.png'; ?>" title="Comments">
								<?php
								if ( get_comments_number() ) : ?>
									<span>
									<?php
										printf( _nx( 'Un comentario', '%1$s comentarios', get_comments_number(), '', SIDURI_TEXT_DOMAIN ),
							            	number_format_i18n( get_comments_number() ) );
									?>
									</span>

						    <?php
						    else: ?>
									<span><?php _e('Sin comentarios', SIDURI_TEXT_DOMAIN);?></span>

								<?php
								endif; ?>

								</a>
							</li>
							<?php
							endif; ?>
							<li>
								<a href="<?php echo get_author_posts_url(get_the_author_id()); ?>">
									<img src="<?php echo SIDURI_THEME_URL.'/images/blog-icon4.png'; ?>" title="<?php printf('Entradas de %1$s', get_the_author_meta('display_name'), SIDURI_TEXT_DOMAIN); ?>">
									<span><?php _e('Ver entradas', SIDURI_TEXT_DOMAIN); ?></span>
								</a>
							</li>

						</ul>
					</div>

					<div class="share-artical">
						<ul>
							<li><a href="#"><img src="<?php echo SIDURI_THEME_URL.'/images/facebooks.png'; ?>" title="facebook">Facebook</a></li>
							<li><a href="#"><img src="<?php echo SIDURI_THEME_URL.'/images/twiter.png'; ?>" title="Twitter">Twiiter</a></li>
							<li><a href="#"><img src="<?php echo SIDURI_THEME_URL.'/images/google+.png'; ?>" title="google+">Google+</a></li>
							<li><a href="#"><img src="<?php echo SIDURI_THEME_URL.'/images/rss.png'; ?>" title="rss">Rss</a></li>
						</ul>
					</div>
					<div class="clear"> </div>

				</div>

				<!---start-comments-section--->
				<?php comments_template(); ?>
				<!---//End-comments-section--->

			</div> <!-- .single-page -->

		<?php
			endwhile;

		endif; ?>

	</div><!-- .wrap -->

<?php get_footer(); ?>
