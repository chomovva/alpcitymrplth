<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="row middle-sm mb-3">
	<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 text-xs-center text-sm-left">
		<?php woocommerce_result_count(); ?>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-2 col-lg-4 col-lg-offset-4 text-xs-center text-sm-right">
		<?php woocommerce_catalog_ordering(); ?>
	</div>
</div>