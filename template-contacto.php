<?php
/*
Template Name: Página Contacto
*/

$direccion = SIDURI_Theme_Options::get_theme_option( 'direccion' );
$url_google_maps = 'https://maps.google.co.in/maps?f=q'
								.	'&amp;q='.urlencode($direccion)
								.	'&amp;ie=UTF8'
								.	'&amp;z=17'
								.	'&amp;output=embed'
								;
?>


<?php get_header(); ?>
<div class="wrap">
	<div class="contact-info">
		<div class="map">
			<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
				  	src="<?php echo $url_google_maps;?>">
			</iframe>
		</div>

		<div class="contact-grids">
			<div class="col_1_of_bottom span_1_of_first1">
				<h5><?php _e('Dirección', SIDURI_TEXT_DOMAIN); ?></h5>
				<ul class="list3">
					<li>
						<img src="<?php echo SIDURI_THEME_URL.'/images/home.png'; ?>" alt="">
						<div class="extra-wrap">
							<p>
								<?php  echo SIDURI_Theme_Options::get_theme_option( 'direccion' );?>
							</p>
						</div>
					</li>
				</ul>
			</div>

			<div class="col_1_of_bottom span_1_of_first1">
				<h5><?php _e('Telefónos', SIDURI_TEXT_DOMAIN); ?></h5>
				<ul class="list3">
					<li>
						<img src="<?php echo SIDURI_THEME_URL.'/images/phone.png'; ?>" alt="">
						<div class="extra-wrap">
							<p><span><?php _e('Telefóno:', SIDURI_TEXT_DOMAIN);?></span><?php  echo SIDURI_Theme_Options::get_theme_option( 'telefono' );?></p>
						</div>
						<img src="<?php echo SIDURI_THEME_URL.'/images/fax.png'; ?>" alt="">
						<div class="extra-wrap">
							<p><span><?php _e('Fax:', SIDURI_TEXT_DOMAIN);?></span><?php  echo SIDURI_Theme_Options::get_theme_option( 'fax' );?></p>
						</div>
					</li>
				</ul>
			</div>

			<div class="col_1_of_bottom span_1_of_first1">
				<h5><?php _e('Email', SIDURI_TEXT_DOMAIN); ?></h5>
				<ul class="list3">
					<li>
						<img src="<?php echo SIDURI_THEME_URL.'/images/email.png'; ?>" alt="">
						<div class="extra-wrap">
							<?php $email = SIDURI_Theme_Options::get_theme_option( 'email' ); ?>
							<p><span class="mail"><a href="mailto:<?php echo $email;?>"><?php echo str_replace('@', '(at)', $email); ?></a></span></p>
						</div>
					</li>
				</ul>
			</div>

			<div class="clear"></div>

		</div>

		<form method="post" action="contact-post.html">
			<div class="contact-form">
				<div class="contact-to">
					<input type="text" class="text" value="<?php _e('Nombre...', SIDURI_TEXT_DOMAIN);?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php _e('Nombre...', SIDURI_TEXT_DOMAIN);?>';}">
					<input type="text" class="text" value="<?php _e('Email...', SIDURI_TEXT_DOMAIN);?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php _e('Email...', SIDURI_TEXT_DOMAIN);?>';}">
					<input type="text" class="text" value="<?php _e('Asunto...', SIDURI_TEXT_DOMAIN);?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php _e('Asunto...', SIDURI_TEXT_DOMAIN);?>';}">
				</div>
				<div class="text2">
					<textarea value="<?php _e('Mensaje:', SIDURI_TEXT_DOMAIN);?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php _e('Mensaje...', SIDURI_TEXT_DOMAIN);?>';}"><?php _e('Mensaje...', SIDURI_TEXT_DOMAIN);?></textarea>
				</div>
				<span><input type="submit" class="" value="<?php _e('Enviar', SIDURI_TEXT_DOMAIN);?>"></span>
				<div class="clear"></div>
			</div>
		</form>

	</div><!-- .contact-info -->
</div><!-- .wrap -->
<?php get_footer(); ?>
