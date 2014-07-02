$(function() {

	$('.js-raty').raty({
		starHalf    : '/js/vendor/raty/images/star-half.png',
		starOff     : '/js/vendor/raty/images/star-off.png',
		starOn      : '/js/vendor/raty/images/star-on.png',
		score 		: function() {
					  		return $(this).attr('data-score') != undefined ? $(this).attr('data-score') : 2.5;
					},
		readOnly	: function() {
							return $(this).attr('data-read-only') != undefined ? $(this).attr('data-read-only') : false;
					}
	});

});
