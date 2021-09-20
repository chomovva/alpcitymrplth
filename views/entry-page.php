<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


the_title( '<h1>', '</h1>', true );

get_template_part( 'parts/breadcrumbs' ); ?>

<div class="content">
	<?php the_content( null, false ); ?>
</div>

<?php comments_template();