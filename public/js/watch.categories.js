$(function() {
	
	$('#js-order-to-confirm').on('shown.bs.modal', function (e) {
		var movie_id = $(e.relatedTarget).attr('data-movie-id');

		var $movie = $('[data-dom-movie="' + movie_id + '"]');
		var $confirm_content = $(e.target).find('.modal-body');

		var movie_img = $movie.find('.content-picture img').clone();
		var movie_header = $movie.find('.content-main h3').text();
		console.log('movie header : ' + movie_header);
		var movie_price = $movie.find('.content-main .price').html();
		console.log('movie_price : ' + movie_price);

		$confirm_content.children('.order-picture').html(movie_img);
		$confirm_content.find('.order-main > h3').text(movie_header);
		$confirm_content.find('.order-main > b > span').html(movie_price);

		$('button.js-btn-to-buy').attr({
			'data-movie-id': movie_id
		});
	});

	$('.js-btn-to-buy').click(function(event) {

		event.preventDefault();

		var movie_id = $(this).attr('data-movie-id');

		$.ajax({

			method : 'post',
			url : '/order',
			data: {id: movie_id}

		}).done(function(response) {

			console.log('order successfully');

		}).fail(function(response) {

		});

	});

	$('.card-list').masonry({
		itemSelector: '.card-list > li'
	});

});
