<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<div class="row">
	
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<?php do_action( 'woocommerce_account_navigation' ); ?>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<?php do_action( 'woocommerce_account_content' ); ?>
	</div>

</div>