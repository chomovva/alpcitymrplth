( function ( $ ) {

	var $panel = jQuery( '#panel' ).clone().addClass( 'cloned' ).appendTo( '#wrapper' );
	var $window = jQuery( window );

	function Toggle () {
		if ( $window.scrollTop() > screen.height * 1.5 ) {
			$panel.addClass( 'fixed' );
		} else {
			$panel.removeClass( 'fixed' );
		}
	}

	$window.on( 'scroll', Toggle );
	Toggle();

} )( jQuery );