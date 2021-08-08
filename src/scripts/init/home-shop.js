( function ( $ ) {

	var $slider = jQuery( '#shop-content' );

	$slider.slick( {
		dots: false,
		arrows: true,
		fade: false,
		autoplay: false,
		slidesToShow: 3,
		adaptiveHeight: true,
		centerMode: false,
		slidesToScroll: 1,
		autoplaySpeed: 5000,
		speed: 500,
		lazyLoad: 'ondemand',
		prevArrow: '#shop-prev-button',
		nextArrow: '#shop-next-button',
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		],
	} );

} )( jQuery );