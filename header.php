<?php  ?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri().'/images/fav-icon.png';?>" />

	<!----webfonts---->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!----//webfonts---->


	<?php wp_head(); ?>
</head>
<body>
<!---start-wrap---->
			<!---start-header---->
			<div class="header">
				<div class="wrap">
				<div class="logo">
					<a href="<?php echo home_url();?>"><img src="<?php echo get_template_directory_uri().'/images/logo.png';?>" title="pinbal" /></a>
				</div>
				<?php if ( has_nav_menu( 'siduri-primary-menu' ) ) : ?>
				<div class="nav-icon">
					 <a href="#" class="right_bt" id="activator"><span> </span> </a>
				</div>
				 <div class="box" id="box">
					 <div class="box_content">
						<div class="box_content_center">
						 	<div class="form_content">

										<?php
											wp_nav_menu(
												array(
													'container' => 'div',
													'container_class' => 'menu_box_list',
													'theme_location' => 'siduri-primary-menu',
													'menu_class' => 'primary-menu',
												)
											);
										?>

								<a class="boxclose" id="boxclose"> <span> </span></a>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<div class="top-searchbar">
					<?php get_template_part('searchform'); ?>
				</div>
				<div class="userinfo">
					<div class="user">
						<ul>
							<li><a href="#"><img src="<?php echo get_template_directory_uri().'/images/user-pic.png';?>" title="user-name" /><span>Ipsum</span></a></li>
						</ul>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<!---//End-header---->

		<!---start-content---->
		<div class="content">
