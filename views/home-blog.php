<?php


namespace alpcitymrplth;


use WP_Post;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--blog mt-3 mb-3 pt-3 pb-3 blog" id="blog">
	<div class="container">

		<div class="row mb-3 pb-3">

			<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<h2 class="mb-3" id="blog-title"><?php echo esc_html( $title ); ?></h2>
				</div>
			<?php endif; ?>

			<?php if ( isset( $permalink ) && is_url( $permalink ) && isset( $label ) && ! empty( trim( $label ) ) ) : ?>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right">
					<a id="blog-permalink" class="btn btn-primary" href="<?php echo esc_attr( $permalink ); ?>"><?php echo esc_html( $label ); ?></a>
				</div>
			<?php endif; ?>

		</div>
		<div class="row stratch-xs mt-3 center-xs">
			<?php if ( $sticky && $sticky instanceof WP_Post ) : setup_postdata( $post = $sticky ); ?>
				<article id="post-<?php the_ID() ?>" <?php post_class( array( 'col-xs-12', 'col-sm-12', 'col-md-6', 'col-lg-6', 'mb-3', 'entry' ), null ); ?> >
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<a class="thumbnail" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'wp-post-thumbnail' ] ); ?>
							</a>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="row">
								<div class="col-xs-8 text-xs-left">
									<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title( '', '', true ); ?></a></h3>
								</div>
								<div class="col-xs-4 text-xs-right">
									<time class="small" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?></time>
								</div>
							</div>
							<?php the_excerpt(); ?>
							<p><a class="permalink" href="<?php the_permalink() ?>"><?php esc_html_e( 'Читать полностью…', ALPCITYMRPLTH_TEXTDOMAIN ); ?></a></p>
						</div>
					</div>
				</article>
			<?php endif; wp_reset_postdata(); ?>

			<?php if ( is_array( $entries ) && ! empty( $entries ) ) : ?>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">

						<?php while ( ( $entry = current( $entries ) ) !== false ) : ?>
							<?php if ( $entry && $entry instanceof \WP_Post ) : setup_postdata( $post = $entry ); ?>
								<article id="post-<?php the_ID() ?>" <?php post_class( array( 'short', 'col-xs-12', 'col-sm-6', 'col-md-6', 'col-lg-6', 'mb-3', 'entry' ), null ); ?> >
									<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title( '', '', true ); ?></a></h3>
									<?php the_excerpt(); ?>
									<div class="row bottom-xs">
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<a class="thumbnail" href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'wp-post-thumbnail' ] ); ?>
											</a>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<time class="small" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?></time>
										</div>
									</div>
								</article>
							<?php endif; ?>
						<?php next( $entries ); endwhile; wp_reset_postdata(); ?>

					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>