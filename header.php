<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> >

	<?php get_template_part( 'parts/head' ); ?>

	<body <?php body_class(); ?> >

		<?php do_action( 'body_start' ); ?>

		<div class="wrapper" id="wrapper">

			<?php get_template_part( 'parts/mobilenav' ); ?>

			<div class="wrapper__item wrapper__item--panel panel" id="panel">
				<div class="container">

					<header class="header" id="header">
						<?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
							<a href="<?php echo home_url( '/', null ); ?>" class="bloginfo-name">
								<strong><?php bloginfo( 'name' ); ?></strong>
							</a>
						<?php endif; ?>
					</header>

					<nav class="nav" id="nav">
						<?php
							if ( has_nav_menu( 'main' ) ) {
								wp_nav_menu( [
									'theme_location'  => 'main',
									'menu'            => 'main',
									'container'       => false,
									'menu_id'         => 'main-nav-list',
									'menu_class'      => 'nav__list list',
									'echo'            => true,
									'depth'           => 1,
								] );
							}
						?>
						<?php if ( has_nav_menu( 'mobile' ) || is_active_sidebar( 'mobile' ) ) : ?>
							<button class="burger" data-mobilenav="toggle">
								<span class="line"></span> <span class="line"></span> <span class="line"></span>
								<span class="sr-only"><?php esc_html_e( 'Открыть меню', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span>
							</button>
						<?php endif; ?>
					</nav>

					<?php get_template_part( 'parts/languages', null, [] ); ?>

					<?php if ( ( bool ) $panel_phone = trim( get_theme_mod( 'headerphone' ) ) ) : ?>
						<a id="panel-phone" class="phone" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $panel_phone ) ); ?>">
							<span class="value"><?php echo esc_html( $panel_phone ); ?></span>
						</a>
					<?php endif; ?>

				</div>
			</div>
			<main class="wrapper__item wrapper__item--main main" id="main">