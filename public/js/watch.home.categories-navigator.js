/**
 *	a javascript used to controll
 *  the animation of '#categories .nav-content'
 *  
 *  @author    Doray Hong
 *  @since     2014/05/10
 */

// TODO :
// (1) improve the animation performance
// (2) support swiping to shift the content
// (3) make each content work as a tab panel rather than as a seperated 'div'
var bottom_navigator = 
(function() {
	var prev_item_index		= -1;
	var $nav_item			= $( '#categories .navs > a' );
	var is_animating		= false;

	$nav_item.click(function() {
		if( is_animating ) return;		// wait until the animation ends

		var $content	=	$( $( this ).attr( 'href' ) );
		var cur_index	=	$( this ).index();

		// no content has been shown yet
		// so, do show some content
		if( prev_item_index == -1 ) {
			openContent( cur_index );
			$( this ).addClass( 'active' );
			$content.addClass( 'animated bounceInUp show' );
			return;
		}

		// some content has been shown
		// so, to show another content or to close the current content
		$nav_item.removeClass( 'active' );
		// now start animating
		is_animating = true;

		if( cur_index == prev_item_index ) {
			// which indicates to close the content
			$content.addClass( 'animated bounceOutDown' );
			$( this ).removeClass( 'active' );
			hiddenAfterAnimationEnds( $content );
			closeContent();
			return;
		}

		$( this ).addClass( 'active' );

		if( cur_index > prev_item_index ) {
			// which indicates the right item is clicked
			// so the content of the clicked item should slide in from right
			// and then the current content should slide out to left
			$( '.nav-content.show' ).addClass( 'animated slideOutLeft to-hidden' );
			$content.addClass( 'animated slideInRight show' );

		} else {
			// which indicates the left item is clicked
			// so the content of the clicked item should slide in from left
			// and then the current content should slide out to right
			$( '.nav-content.show' ).addClass( 'animated slideOutRight to-hidden' );
			$content.addClass( 'animated slideInLeft show' );
		}

		hiddenShownContent();
		openContent( cur_index );
	});

	function openContent(index) {
		prev_item_index = index;
	}

	function closeContent() {
		prev_item_index = -1;
	}

	function hiddenShownContent() {
		doAfterAnimationEnds($('.nav-content.show'), function() {
			$( '.nav-content.to-hidden' ).removeClass('show to-hidden');
		});
	}

	function doAfterAnimationEnds(node, to_be_done) {
		var deferred = $.Deferred();
		var promise = deferred.promise();
		node.one('webkitAnimationEnd \
					mozAnimationEnd \
					MSAnimationEnd \
					oanimationend \
					animationend',
					function() {
						to_be_done();
						clearAnimation();
						is_animating = false;
						deferred.resolve();
					});
		return promise;
	}

	function hiddenAfterAnimationEnds(node) {
		return doAfterAnimationEnds(node, function() {
			node.removeClass('show');
		});
	}

	function clearAnimation() {
		$('.nav-content')
			.removeClass('animated \
							slideOutLeft \
							slideOutRight \
							slideInLeft \
							slideInRight \
							bounceInUp \
							bounceOutDown');
	}

	var public_methods = {
		closeContent : closeContent
	};

	return public_methods;
	
})(jQuery);
