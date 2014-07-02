function setupUsers() {

	$('#user-edit').on('show.bs.modal', function(target) {

		var target_id 		= $(target.relatedTarget).attr('data-user-id');
		var user_name		= $('#user-id-' + target_id).children('p:eq(0)').text();
		var user_email		= $('#user-id-' + target_id).children('p:eq(1)').text();

		var $form_fields	= $(target.currentTarget).find('.card-content');
		$form_fields.children('input[name="id"]').val(target_id);
		$form_fields.children('input#user-name').val(user_name);
		$form_fields.children('input#user-email').val(user_email);
		
	});


	$('#users .action-bar-input > button').click(function(event) {

		event.preventDefault();

		var nvalue = $(this).prev().val();

		$('#user-new').find('.card-content input#user-name').val(nvalue);

	});


	$('#user-edit button[type="submit"]').click(function(event) {

		event.preventDefault();

		var user_id = $('#user-edit input:hidden').val();
		var user_name = $('#user-edit input[name="name"]').val();
		var user_email = $('#user-edit input[name="email"]').val();

		console.log("user to be updated : ", user_id);

		$.ajax({

			method 		: 		'PUT',
			url 		: 		'/user/' + user_id,
			data 		: 		{id: user_id, name : user_name, email : user_email}

		}).done(function(response) {

			console.log("success : ", response);

		}).fail(function(response) {

			console.log("fail : ", response);

		});

	});


	$('#user-new button[type="submit"]').click(function(event) {

		event.preventDefault();

		var user_name = $('#user-new input[name="name"]').val();
		var user_email = $('#user-new input[name="email"]').val();
		var user_password = $('#user-new input[name="password"]').val();

		$.ajax({

			method 		: 	'POST',
			url 		: 	'/user',
			data 		: 	{name : user_name, email : user_email, password : user_password}

		}).done(function(response) {

			console.log("success : ", response);

		}).fail(function(response) {

			console.log("fail : ", response);

		});

	});


	$('#users .content-addon').map(function() {
		$(this).children('a:eq(1)').click(function(event) {

			event.preventDefault();

			var deleted_id = $(this).attr('data-user-id');
			console.log('user to be deleted : ', deleted_id);

			$.ajax({

				method		: 		'DELETE',
				url 		: 		'/user/' + deleted_id

			}).done(function(response) {

				console.log('success : ', response);

				var $deleted_node = $('[data-user-id="' + deleted_id + '"]');

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
