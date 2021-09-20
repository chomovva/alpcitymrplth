<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>

	<form method="post">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h3><?php // @codingStandardsIgnoreLine ?>


		<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

		<div class="woocommerce-address-fields__field-wrapper">
			<?php foreach ( $address as $key => $field ) : woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) ); endforeach; ?>
		</div>

		<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

		<div class="form-group">
			<button type="submit" name="save_address"><?php esc_html_e( 'Save address', 'woocommerce' ); ?></button>
			<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
			<input type="hidden" name="action" value="edit_address" />
		</div>

	</form>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' );
