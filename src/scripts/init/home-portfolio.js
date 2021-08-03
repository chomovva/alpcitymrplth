( function ( $ ) {

	var $slider = jQuery( '#portfolio-content' );

	$slider.slick( {
		dots: false,
		arrows: true,
		fade: false,
		autoplay: false,
		slidesToShow: 2,
		adaptiveHeight: true,
		centerMode: false,
		slidesToScroll: 1,
		autoplaySpeed: 5000,
		speed: 500,
		lazyLoad: 'ondemand',
		prevArrow: '#portfolio-prev-button',
		nextArrow: '#portfolio-next-button',
	} );

} )( jQuery );