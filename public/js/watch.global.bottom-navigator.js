 /**
 *	a javascript used to controll
 *  the height of '.bottom-navigator .nav-content' according to the window's height
 *  
 *  @author    Doray Hong
 *  @since     2014/05/11
 */

'use strict';

(function() {
	
	$( window ).resize(function() {
		// when the window is resized
		// the navigation content's height should recalc
		calcContentHeight();
	});

	function calcContentHeight() {
		var top_nav_height		= $( '.navigator' ).height();
		var nav_content_height	= $( window ).height();

		// the height
		$( '.bottom-navigator .nav-content' )
				//.css( 'height', (nav_content_height) + 'px' );
				.css( 'height', (nav_content_height + top_nav_height) + 'px' );

		// the position
		$( '.bottom-navigator .nav-content' )
				//.css( 'top', (-nav_content_height + top_nav_height * 2) + 'px' );
				.css( 'top', (-nav_content_height + top_nav_height) + 'px' );

		// the content background
		$( '.bottom-navigator .nav-content .nav-content-bg > img' )
				//.css( 'height', (nav_content_height - top_nav_height) + 'px' );
				.css( 'height', (nav_content_height + top_nav_height) + 'px' );

		// the search content's height and top should be redifined
		$( '.bottom-navigator .search-content' )
				.css( 'height', (nav_content_height + top_nav_height) + 'px' );

		$( '.bottom-navigator .search-content' )
				.css( 'top', (-nav_content_height + top_nav_height) + 'px' );
	}

	calcContentHeight();
	
})(jQuery);

(function() {

	$('.search-input > input').on('keyup', function(e) {
		var keyword = e.target.value;

		if(keyword.length < 4) {
			return;
		}
		
		$.ajax({
			method: 'get',
			url: '/search',
			data: {keyword : keyword, category : 'movie'}
		}).done(function(response) {

			insertSearchResult(response);

		});

	});

	function insertSearchResult(results) {
		console.log( 'search result : ', results);
		var $container = $('.search-content > ul');
		$container.html();
		var json_results = eval('(' + results +')');
		for(var i = 0; i < json_results.length; i++) {
			var content = '<li> \
							<img src="' + '/images/category-nav-content/final-destination-4.jpg' + '" alt=""> \
							<div class="intro"> \
								<p style="color:#fff">' + json_results[i].title + '</p> \
								<p style="color:#fff">' + json_results[i].summary + '</p> \
							</div> \
						</li>';
			$container.append(content);
		}
	}

	
	$( '.bottom-navigator > a.search-icon' )
		.click(function( event ) {
			event.preventDefault(); // don't refresh the page

			if( $( this ).hasClass( 'js-to-hidden' ) ) {

				// remove the flag
				$( this ).removeClass( 'js-to-hidden' );
				closeSearchContent();

			} else {

				$( this ).addClass( 'js-to-hidden' );

				var $content = $( '.bottom-navigator .nav-content' );
				// before the search content appears,
				// no content should be shown
				if( $content.hasClass( 'show' ) ) {

					$( '.bottom-navigator .navs > a' )
							.removeClass( 'active' );

					$( '.bottom-navigator .nav-content.show' )
							.removeClass( 'animated \
											slideInRight \
											slideInLeft \
											bounceInUp' )
							.addClass( 'animated bounceOutDown' );

					doAfterAnimationEnds(
							$( '.bottom-navigator .nav-content.show' ),
							function() {
								if( !!bottom_navigator ) {
									bottom_navigator.closeContent();
								}

								$( '.bottom-navigator .nav-content.show' )
										.removeClass( 'animated \
														bounceOutDown' );

								$( '.bottom-navigator .nav-content.show')
										.removeClass( 'show' );
								openSearchContent();
							});

				} else {
					openSearchContent();
				}

			}
	});


 	function closeSearchContent() {

 		$( '.bottom-navigator .search-content' )
				.removeClass( 'animated bounceInUp' )
				.addClass( 'animated bounceOutDown' );

		$( '.bottom-navigator .navs' )
				.removeClass('animated slideOutRight')
				.addClass('animated slideInRight')
		
		doAfterAnimationEnds(
				$( '.bottom-navigator .navs'),
				function() {
					$( '.bottom-navigator .search-input' ).hide();
					$( '.bottom-navigator .search-content' ).removeClass( 'show' );
				});

 	}


 	function openSearchContent() {

 		$( '.bottom-navigator .search-input' ).show();

		$( '.bottom-navigator .navs' )
				.removeClass( 'animated slideInRight' )
				.addClass( 'animated slideOutRight' );

		$( '.bottom-navigator .search-content' )
				.removeClass( 'animated bounceOutDown' )
				.addClass( 'animated bounceInUp show' );

 	}


 	function doAfterAnimationEnds( $animated_node, to_be_done ) {
 		$animated_node.one('webkitAnimationEnd \
						mozAnimationEnd \
						MSAnimationEnd \
						oanimationend \
						animationend',
						function() {
							to_be_done();
						});
 	}
	
})(jQuery);

