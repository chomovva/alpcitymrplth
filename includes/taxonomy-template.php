<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function edit_taxonomy_template_fields( $term ) {
	?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="posts_template"><?php _e( 'Шаблон вывода записей', ALPCITYMRPLTH_TEXTDOMAIN ); ?></label>
			</th>
			<td>
				<?php include get_theme_file_path( 'views/field-posts_template.php' ); ?>
			</td>
		</tr>
	<?php
}

function add_taxonomy_template_fields( $taxonomy_slug ) {
	?>
		<div class="form-field">
			<label for="posts_template"><?php _e( 'Шаблон вывода записей', ALPCITYMRPLTH_TEXTDOMAIN ); ?></label>
			<?php include get_theme_file_path( 'views/field-posts_template.php' ); ?>
		</div>
	<?php
}


function save_taxonomy_template_meta( $term_id ) {
	if ( ! current_user_can( 'edit_term', $term_id ) ) return;
	if (
		( isset( $_POST[ '_wpnonce' ] ) && ! wp_verify_nonce( $_POST[ '_wpnonce' ], "update-tag_$term_id" ) ) ||
		( isset( $_POST[ '_wpnonce_add-tag' ] ) && ! wp_verify_nonce( $_POST[ '_wpnonce_add-tag' ], "add-tag" ) )
	) return;
	// Шаблон вывода записей 
	if ( isset( $_POST[ 'posts_template' ] ) && array_key_exists( $_POST[ 'posts_template' ], apply_filters( 'taxonomy_template_list', [] ) ) ) {
		update_term_meta( $term_id, 'posts_template', sanitize_text_field( $_POST[ 'posts_template' ] ) );
	} else {
		delete_term_meta( $term_id, 'posts_template' );
	}
	return $term_id;
}


foreach ( apply_filters( 'taxonomy_template_names', [] ) as $taxonomy_name ) {
	add_action( $taxonomy_name . '_add_form_fields', 'alpcitymrplth\add_taxonomy_template_fields');
	add_action( $taxonomy_name . '_edit_form_fields', 'alpcitymrplth\edit_taxonomy_template_fields');
	add_action( 'create_' . $taxonomy_name, 'alpcitymrplth\save_taxonomy_template_meta');
	add_action( 'edited_' . $taxonomy_name, 'alpcitymrplth\save_taxonomy_template_meta');
}