<?php get_header(); ?>

	<div class="wrap">
		<div id="main" role="main">

			<?php
			if ( have_posts() ) : ?>
				<h3 class="info-title"><?php printf( __( 'Resultados de buscar : %s', SIDURI_TEXT_DOMAIN ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			<?php
			endif; ?>

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
							<div class="post-info-rate-share">
								<div class="rateit">
									<span> </span>
								</div>
								<div class="post-share">
									<span> </span>
								</div>
								<div class="clear"> </div>
							</div>
						</div>

					</li>

				<?php
				endwhile; ?>

				<li>
					<div class="">


					<?php
					the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( '<<', SIDURI_TEXT_DOMAIN ),
						'next_text' => __( '>>', SIDURI_TEXT_DOMAIN ),
					)); ?>
					</div>
				</li>
				</ul>

				<div  style="display:clear" class="text-center">

				</div>

			<?php
			else : ?>
				<h3 class="info-title"><?php printf( __( 'Ups, no se ha recuperado nada con ese criterio.', SIDURI_TEXT_DOMAIN ) ); ?></h3>

				<div class="artical-content"  >
					<p><?php _e("Prueba a realizar otra búsqueda.", SIDURI_TEXT_DOMAIN); ?></p>

					<div class="top-searchbar">
						<?php get_template_part('searchform'); ?>
					</div>
				</div>

			<?php
			endif; ?>

	  </div><!-- #id -->
	</div><!-- .wrap -->

<?php get_footer(); ?>
