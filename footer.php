<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$copy_name = get_theme_mod( 'footercopyname' );

if ( empty( trim( $copy_name ) ) ) {
	$copy_name = get_bloginfo( 'name', 'raw' );
}

?>


			</main>

			<?php get_sidebar(); ?>

			<footer class="wrapper__item wrapper__item--footer footer" id="footer">
				<div class="container">
					<div class="row middle-xs pb-2 pt-2">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-xs-center text-sm-left">
							<p><?php printf( __( '&copy; <span id="footer-copy-name">%s</span>, %s', ALPCITYMRPLTH_TEXTDOMAIN ), $copy_name, date( 'Y' ) ); ?></p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-xs-center text-sm-right">
							<p><?php _e( 'Разработка: <a href="https://chomovva.ru/" target="_blank">chomovva</a>', ALPCITYMRPLTH_TEXTDOMAIN ); ?></p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php
			wp_footer();
			get_template_part( 'parts/modals' );
			do_action( 'body_end' );
		?>
	</body>
</html>