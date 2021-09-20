<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-success d-block btn-lg">
	<?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
</a>
