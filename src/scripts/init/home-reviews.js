( function ( $ ) {

	var $slider = jQuery( '#reviews-content' );

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
		prevArrow: '#reviews-prev-button',
		nextArrow: '#reviews-next-button',
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		],
	} );

} )( jQuery );