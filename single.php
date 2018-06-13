<?php get_header(); ?>
	<div class="wrap">
		<?php
		if (have_posts()):
			while (have_posts()): the_post(); ?>
			<div class="single-page">
				<div class="single-page-artical">
					<div class="artical-content" id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" >
						<?php
						if ((1==2)&&(has_post_thumbnail() )): ?>
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
						<?php
						else: ?>
							<img src="<?php echo get_template_directory_uri().'/images/single-post-pic.jpg';?>" width="282" height="118">
						<?php
						endif; ?>

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_content(); ?></p>
					</div>

					<div class="artical-links">
						<ul>
							<li><a href="#"><img src="<?php echo SIDURI_THEME_URL.'/images/blog-icon2.png'; ?>" title="Admin"><span>admin</span></a></li>
							<li><a href="#"><img src="<?php echo SIDURI_THEME_URL.'/images/blog-icon3.png'; ?>" title="Comments"><span>No comments</span></a></li>
							<li><a href="#"><img src="<?php echo SIDURI_THEME_URL.'/images/blog-icon4.png'; ?>" title="Lables"><span>View posts</span></a></li>
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
