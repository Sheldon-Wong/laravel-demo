function setupActors() {

	$('#actor-edit').on('show.bs.modal', function(target) {

		var target_id 			= $(target.relatedTarget).attr('data-actor-id');
		var actor_name			= $('#actor-id-' + target_id).children('h3').children('a').text();
		var actor_description	= $('#actor-id-' + target_id).children('p').text();

		var $form_fields	= $(target.currentTarget).find('.card-content');
		$form_fields.children('input[name="id"]').val(target_id);
		$form_fields.children('input#actor-name').val(actor_name);
		$form_fields.children('textarea#actor-description').text(actor_description);
		
	});


	$('#actor-edit button[type="submit"]').click(function() {

		$('#actor-edit form').submit();

	});


	$('#actor-new button[type="submit"]').click(function() {

		$('#actor-new form').submit();

	});
	

	$('#actors .action-bar-input > button').click(function(event) {

		event.preventDefault();

		var nvalue = $(this).prev().val();

		$('#actor-new').find('.card-content input#actor-name').val(nvalue);

	});


	$('#actors .card-action').map(function() {
		$(this).find('li:eq(1) > a').click(function(event) {

			event.preventDefault();

			var deleted_id = $(this).attr('data-actor-id');
			console.log('actor to be deleted : ', deleted_id);

			$.ajax({

				method		: 		'DELETE',
				url 		: 		'/actor/' + deleted_id

			}).done(function(response) {

				console.log('success : ', response);

				var $deleted_node = $('[data-actor-id="' + deleted_id + '"]');

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
