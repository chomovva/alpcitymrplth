<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


			</main>

			<?php get_sidebar(); ?>

			<footer class="wrapper__item wrapper__item--footer footer" id="footer">
				<div class="container">
					<div class="row middle-xs pb-2 pt-2">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-xs-center text-sm-left">
							<p>&copy; АльпСити, 2021</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-xs-center text-sm-right">
							<p>Разработка: <a href="https://chomovva.ru/" target="_blank">chomovva</a></p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php
			wp_footer();
			do_action( 'body_end' );
		?>
	</body>
</html>