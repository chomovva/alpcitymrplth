<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<h1><?php the_title( '', '', true ); ?></h1>

<div class="row">
	<div class="col-xs col-sm text-left">
		<?php get_template_part( 'parts/breadcrumbs' ); ?>
	</div>
	<?php if ( is_single() ) : ?>
		<div class="col-xs-4 col-sm-2 text-right">
			<time class="small" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?></time>
		</div>
	<?php endif; ?>
</div>

<div class="content">
	<?php the_content( null, false ); ?>
</div>

<?php get_template_part( 'parts/pager' ); ?>
