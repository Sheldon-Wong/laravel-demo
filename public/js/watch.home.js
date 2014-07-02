$(function() {
	
	$('.banner').unslider({
		dots: true,
		fluid: true
	});

	$('#js-order-to-confirm').on('shown.bs.modal', function (e) {
		var movie_id = $(e.relatedTarget).attr('data-movie-id');

		var $movie = $('[data-dom-movie="' + movie_id + '"]');
		var $confirm_content = $(e.target).find('.modal-body');

		var movie_img = $movie.find('img').clone();
		var movie_header = $movie.children('h3').text();
		console.log('movie header : ' + movie_header);
		var movie_price = $movie.children('p').html();
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



});
