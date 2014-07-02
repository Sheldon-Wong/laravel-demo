$(function() {

	$('#js-order-to-confirm').on('shown.bs.modal', function (e) {
		var movie_id = $(e.relatedTarget).attr('data-movie-id');
		console.log('movie to be bought : ', movie_id);
		var $movie = $('#movie-details').find('.card-heading');
		var $confirm_content = $(e.target).find('.modal-body');

		var movie_img = $movie.find('.movie-poster > img').clone();
		var movie_header = $movie.find('.movie-intro > h2').text();
		console.log('movie header : ' + movie_header);
		var movie_price = $movie.find('.movie-intro span').html();
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

	$('.js-btn-cart-add').click(function(event) {

		event.preventDefault();

		var $btn = $(this);
		var movie_id = $btn.attr('data-movie-id');

		$.ajax({

			method : 'post',
			url : '/cart',
			data : {id : movie_id}

		}).done(function(response) {

			$btn.attr('disabled', true);
			$btn.html('<i class="fa fa-check"></i> 已加入购物车');

		}).fail(function(response) {



		});

	});


	$('.js-btn-comment').click(function(event) {

		event.preventDefault();

		var movie_id = $(this).attr('data-movie-id');
		console.log('movie to be commented : ', movie_id);
		var rates = $('.js-comment-rates').raty('score');
		console.log('rates : ', rates);
		var comment_content = $('#comments textarea').val();
		console.log('comment content : ', comment_content);

		$.ajax({
			method: 'post',
			url: '/comment',
			data: {movieId : movie_id, rates: rates, content: comment_content}
		}).done(function(response) {

			location.reload();

		});

	});

});
