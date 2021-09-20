<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };

$selected = array_key_exists( 'tag_ID', $_GET ) ? get_term_meta( $_GET[ 'tag_ID' ], 'posts_template', true ) : '';
$template_list = apply_filters( 'taxonomy_template_list', [] );


if ( empty( $selected ) || ! array_key_exists( $selected, $template_list ) ) {
	$selected = apply_filters( 'taxonomy_template_default', '' );
}


?>

<select name="posts_template" class="alpcitymrplth-control postform">
	<?php foreach ( $template_list as $value => $label ) : ?>
		<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $selected, $value, true ); ?> >
			<?php echo esc_html( $label ); ?>
		</option>
	<?php endforeach; ?>
</select>