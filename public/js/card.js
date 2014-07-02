
$( '.card-list' ).children()
	.each(function( index, node ) {
		$( node ).bind('click', function() {
			if( $( '#layout' ).hasClass( 'active' ) ) {
				return;
			}

			var url = $( this ).attr( 'data-card-item-url' );
			if( url ) {
				location.href = url;
			} else {
				location.href = '#';
			}
		})
	});

