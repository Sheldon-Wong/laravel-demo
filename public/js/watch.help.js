$(function() {

	
	$('.blank-form-card input').on('keyup', function(e) {

		$('div[data-keyword-scope]').unhighlight();
		console.log($('p'));
		$('div[data-keyword-scope]').highlight(e.target.value);

	});

	$('.card-list').masonry({
		itemSelector: 'li'
	});

});
