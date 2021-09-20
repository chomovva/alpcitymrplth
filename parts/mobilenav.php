<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="wrapper__item wrapper__item--mobilenav mobilenav" id="mobilenav">

	<button class="close" data-mobilenav="toggle">
		<snan class="sr-only"><?php esc_html_e( 'Закрыть меню', ALPCITYMRPLTH_TEXTDOMAIN ); ?></snan>
	</button>

	<div class="text-center">
		<?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
			<a href="<?php echo home_url( '/', null ); ?>" class="bloginfo-name">
				<strong><?php bloginfo( 'name' ); ?></strong>
			</a>
		<?php endif; ?>
	</div>

	<?php

		wp_nav_menu( [
			'theme_location'  => 'main',
			'menu'            => 'main',
			'container'       => false,
			'menu_id'         => 'mobile-nav-list',
			'menu_class'      => 'list',
			'echo'            => true,
			'depth'           => 1,
			'fallback_cb'     => '__return_empty_string',
		] );

		get_sidebar( 'mobile' );

	?>

</div>