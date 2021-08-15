<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$socials = [];

foreach ( apply_filters( 'social_networks', [] ) as $key => $label ) {
	$url = get_theme_mod( 'asidesocial' . $key );
	if ( ! empty( $url ) ) {
		$socials[] = [
			'url'   => $url,
			'key'   => $key,
			'label' => $label,
		];
	}
}


$phone = trim( get_theme_mod( 'asidephone' ) );
$email = trim( get_theme_mod( 'asideemail' ) );
$address = trim( get_theme_mod( 'asideaddress' ) );


?>


<aside class="wrapper__item wrapper__item--aside aside" id="aside">

	<?php if ( ( bool ) $phone || ( ( bool ) $email && is_email( $email, false ) ) || ( bool ) $address ) : ?>
		<div class="container font-weight-bold">
			<div class="row middle-xs pt-2 pb-2">
				<div class="col-xs-12 col-sm-6 col-md col-lg text-xs-center text-sm-left first-md">
					<?php if ( ( bool ) $phone ) : ?>
						<p class="h3">
							<a id="aside-phone" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $phone ) ); ?>">
								<?php echo esc_html( $phone ); ?>
							</a>
						</p>
					<?php endif; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md col-lg last-sm text-xs-center text-sm-right">
					<?php if ( ( bool ) $email && is_email( $email, false ) ) : ?>
						<p>
							<a id="aside-email" href="mailto:<?php echo esc_attr( $email ); ?>">
								<?php echo $email; ?>
							</a>
						</p>
					<?php endif; ?>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 text-xs-center first-xs">
					<?php if ( ( bool ) $address ) : ?>
						<p id="aside-address"><?php echo esc_html( $address ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'basement' ) || ! empty( $socials ) ) : ?>
		<div class="container">
			<div class="row pt-2 pb-2">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 last-sm text-xs-center text-sm-right">
					<?php get_template_part( 'parts/socials', null, $socials ); ?>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<div class="row">
						<?php dynamic_sidebar( 'basement' ) ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

</aside>