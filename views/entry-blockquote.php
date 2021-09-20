<?php


namespace alpcitymrplth;


use WP_Term;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$review = function_exists( 'glsr_get_review' ) ? glsr_get_review( get_the_ID() ) : false;

$author = trim( is_object( $review ) && property_exists( $review, 'author' ) ? $review->author : get_post_meta( get_the_ID(), 'author', true ) );
$rating = intval( is_object( $review ) && property_exists( $review, 'rating' ) ? $review->rating : get_post_meta( get_the_ID(), 'rating', false ) );
$content = trim( is_object( $review ) && property_exists( $review, 'content' ) ? $review->content : get_the_content( null, false ) );

if ( ! $rating ) {
	$rating = 5;
}

$categories = function_exists( 'glsr' ) ? get_the_terms( get_the_ID(), glsr()->taxonomy ) : get_the_category( get_the_ID() );


?>


<div <?php post_class( 'entry' ) ?> id="post-<?php the_ID(); ?>">

	<blockquote>

		<?php echo $content; ?>

		<cite>
			
			<?php if ( ! empty( $author ) ) : ?>
				<span><?php echo esc_html( $author ); ?>,</span>
			<?php endif; ?>
			
			<?php if ( is_array( $categories ) && ! empty( $categories ) && $categories[ 0 ] instanceof WP_Term ) : ?>
				<snap class="text-primary"><?php echo esc_html( $categories[ 0 ]->name ); ?></snap>
			<?php endif; ?>

			<br>

			<?php for ( $i = 1; $i <= $rating; $i++ ) : ?>
				<span class="star"></span>
			<?php endfor; ?>

		</cite>

	</blockquote>

</div>