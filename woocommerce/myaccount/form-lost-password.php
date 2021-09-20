<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


do_action( 'woocommerce_before_lost_password_form' );

?>

<form method="post">

	<input type="hidden" name="wc_reset_password" value="true" />

	<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

	<div class="row">
		<div class="form-group col-xs-12 col-sm-6">
			<label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
			<input class="form-control" type="text" name="user_login" id="user_login" autocomplete="username" />
		</div>
	</div>


	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<div class="form-group mt-3">
		<button type="submit"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
	</div>

	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

</form>
<?php
do_action( 'woocommerce_after_lost_password_form' );
