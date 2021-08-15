<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


?>


<div class="container">

		
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); include get_theme_file_path( 'views/entry-singular.php' ); endwhile; ?>

	<?php endif; ?>


</div>


<?php


get_footer();