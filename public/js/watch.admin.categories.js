function setupCategories() {

	$('#news .action-bar-input > button').click(function(event) {

		event.preventDefault();

		var nval = $('#news .action-bar-input > input[name="title"]').val();

		$.ajax({
			method 		: 	'post',
			url 		: 	'/category',
			data 		: 	{title : nval}
 		}).done(function(response) {

 		}).fail(function(response) {

 		});

	});


	$('#category-edit').on('show.bs.modal', function(target) {

		var target_id 		= $(target.relatedTarget).attr('data-category-id');
		var target_ovalue	= $('#category-id-' + target_id).text();

		var $form_fields	= $(target.currentTarget).find('.card-content');
		$form_fields.children('input[name="id"]').val(target_id);
		$form_fields.children('input#category-title').val(target_ovalue);
		
	});


	$('#category-edit button[type="submit"]').click(function(event) {

		event.preventDefault();

		var cat_id = $('#category-edit input:hidden').val();
		var cat_title = $('#category-edit input[name="title"]').val();

		console.log("category to be updated : ", cat_id);

		$.ajax({

			method 		: 		'PUT',
			url 		: 		'/category/' + cat_id,
			data 		: 		{id: cat_id, title : cat_title}

		}).done(function(response) {

			console.log("success : ", response);

		}).fail(function(response) {

			console.log("fail : ", response);

		});

	});


	$('#categories .action-bar-input > button').click(function(event) {

		event.preventDefault();

		var nvalue = $(this).prev().val();
		console.log('new category : ', nvalue);

		$.ajax({

			method		: 		'POST',
			url 		: 		'/category',
			data 		: 		{ title : nvalue }

		}).done(function(response) {

			console.log('success : ', response);

		}).fail(function(response) {

			console.log('fail : ', response);

		});

	});


	$('#categories .card-action').map(function() {
		$(this).find('li:eq(1) > a').click(function(event) {

			event.preventDefault();

			var deleted_id = $(this).attr('data-category-id');
			console.log('category to be deleted : ', deleted_id);

			$.ajax({

				method		: 		'DELETE',
				url 		: 		'/category/' + deleted_id

			}).done(function(response) {

				console.log('success : ', response);

				var $deleted_node = $('[data-category-id="' + deleted_id + '"]');

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
