<?php get_header(); ?>

	<div class="wrap">
		<div id="main" role="main">
			<?php
			if (have_posts()) :?>
				<ul id="tiles">
				<?php
				while (have_posts()) : the_post(); ?>
					<li id="post-<?php the_ID(); ?>" onclick="location.href='<?php the_permalink(); ?>';" title="<?php the_title_attribute(); ?>">
						<?php
						if (has_post_thumbnail() ): ?>
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
						<?php
						else: ?>
							<img src="<?php echo get_template_directory_uri().'/images/img1.jpg';?>" width="282" height="118">
						<?php
						endif; ?>

						<div class="post-info">
							<div class="post-basic-info">
								<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<span><a href="#"><label> </label></a><?php the_category(', ') ?></span>
								<p><?php the_excerpt(); ?></p>
							</div>

							<!-- Valorar y compartir -->
    					<?php  get_template_part( 'post-info', 'rate-share' ); ?>
							
						</div>

					</li>

				<?php
				endwhile; ?>
				</ul>


			<?php
			else :
				_e( 'Ups, no se ha recuperado nada con ese criterio.', SIDURI_TEXT_DOMAIN );

			endif; ?>

	  </div><!-- #id -->

		<div class="sidure-post-navigation">
			<hr>
			<style media="screen">
				.nav-links .page-numbers { border-radius: 50% !important;margin: 0 5px;}
			</style>
			<?php
			the_posts_pagination( array(
				'screen_reader_text' => ' ',
				'mid_size' => 2,
				'prev_text' => __( '<<', SIDURI_TEXT_DOMAIN ),
				'next_text' => __( '>>', SIDURI_TEXT_DOMAIN ),
			)); ?>
		</div>

	</div><!-- .wrap -->

<?php get_footer(); ?>
