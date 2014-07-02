function setupMovies() {

	$('#movies .action-bar-input > button').click(function(event) {

		event.preventDefault();

		var nvalue = $(this).prev().val();

		$('#movie-new').find('.card-content input#movie-title').val(nvalue);

	});

	
	$('#movie-new button[type="submit"]').click(function() {

		$('#movie-new form').submit();

	});


	$('#movies .card-action').map(function() {
		$(this).find('li:eq(1) > a').click(function(event) {

			event.preventDefault();

			var deleted_id = $(this).attr('data-movie-id');
			console.log('movie to be deleted : ', deleted_id);

			$.ajax({

				method		: 		'DELETE',
				url 		: 		'/movie/' + deleted_id

			}).done(function(response) {

				console.log('success : ', response);

				var $deleted_node = $('[data-movie-id="' + deleted_id + '"]');

				$deleted_node.addClass('animated fadeOutDown');
				$deleted_node.one(
					'webkitAnimationEnd \
						mozAnimationEnd \
						MSAnimationEnd \
						oanimationend \
						animationend',
					function(event) {
						$deleted_node.remove();
				});

			}).fail(function(response) {

				console.log('fail : ', response);

			});

		});
	});

}
