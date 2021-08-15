<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<article <?php post_class( 'mb-3 mt-3', get_the_ID() ); ?> id="post-<?php the_ID(); ?>">
	<div class="row middle-xs top-sm top-md middle-lg center-xs">
		<div class="col-xs-12 col-sm col-md">
			<h3><a href="#"><?php the_title( '', '', true ); ?></a></h3>
			<div class="excerpt">
				<?php the_excerpt(); ?>
				<div class="row middle-xs mt-3">
					<div class="col-xs-6 text-left">
						<time class="small" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?></time>
					</div>
					<?php edit_post_link( __( 'Редактировать', ALPCITYMRPLTH_TEXTDOMAIN ), '', '', get_the_ID(), 'post-edit-link' ); ?>
					<div class="col-xs-6 text-right">
						<a class="btn btn-default"><?php _e( 'Подробнее', ALPCITYMRPLTH_TEXTDOMAIN ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 first-xs">
				<figure class="ml-0 mr-0 mb-0">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'medium', [ 'class' => 'center-block' ] ); ?>
					</a>
				</figure>
			</div>
		<?php endif; ?>
	</div>
</article>