<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seattlepremiumtowncarservice
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<div class="header"  id="header_main">
		<header class="container">
				<div class="header__wrap">
					<?php if (theme_logo()) : ?>
						<?= theme_logo();  ?>
					<?php else : ?>
						<a href="/" class="site-branding" rel="home" aria-current="page" tabindex="0">
							<?php bloginfo('name'); ?>
						</a><!-- .site-branding -->
					<?php endif; ?>
					<div class="header__wrap_main">
						<nav class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
							<div class="social">
								<a href="#"><img src="/wp-content/uploads/2025/01/arcticons_instagram.svg" alt="social"></a>
								<a href="#"><img src="/wp-content/uploads/2025/01/arcticons_facebook.svg" alt="social"></a>
								<a href="#"><img src="/wp-content/uploads/2025/01/arcticons_facebook-1.svg" alt="social"></a>
							</div>
						</nav>

						<div class="header_main_button">
							<a href="#" class="btn_small">Booking</a>
							<div id="burger-menu" class="burger-menu">
								<div class="bar1 bar"></div>
								<div class="bar2 bar"></div>
								<div class="bar3 bar"></div>
							</div>
						</div>
					</div>


				</div>

		</header>
	</div>
