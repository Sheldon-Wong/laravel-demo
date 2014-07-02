function setupNews() {

	$('#news-wysiwyg-new').editable({
		inlineMode: false,
		buttons: ['undo', 'redo'],
		language: 'zh_cn'
	});

	$('#news-wysiwyg-edit').editable({
		inlineMode: false,
		buttons: ['undo', 'redo'],
		language: 'zh_cn'
	});


	$('#news .action-bar-input > button').click(function(event) {

		event.preventDefault();

		var nvalue = $(this).prev().val();

		$('#news-new').find('.card-content input#news-title').val(nvalue);

	});

	
	$('#news-new button[type="submit"]').click(function(event) {

		$('#news-new form').submit();

	// 	event.preventDefault();

	// 	var news_title = $('#news-new input[name="title"]').val();
	// 	var news_content = $('#news-wysiwyg-new').editable("getText")[0];

	// 	console.log("news to be created : ", news_title, news_content);

	// 	$.ajax({

	// 		method 		: 	'POST',
	// 		url 		: 	'/news',
	// 		data 		: 	{title : news_title, content : news_content}

	// 	}).done(function(response) {

	// 		console.log("success : ", response);

	// 	}).fail(function(response) {

	// 		console.log("fail : ", response);

	// 	});

	});


	$('#news-edit').on('show.bs.modal', function(target) {

		var target_id 			= $(target.relatedTarget).attr('data-news-id');
		var news_title			= $('#news-id-' + target_id).children('h3').children('a').text();
		var news_content		= $('#news-id-' + target_id).children('p').html();

		console.log(news_content);

		var $form_fields	= $(target.currentTarget).find('.card-content');
		$form_fields.children('input[name="id"]').val(target_id);
		$form_fields.children('input#news-title').val(news_title);
		$("#news-wysiwyg-edit").editable('setText', news_content, true);
		
	});


	$('#news-edit button[type="submit"]').click(function(event) {

		event.preventDefault();

		var news_id = $('#news-edit input:hidden').val();
		var news_title = $('#news-edit input[name="title"]').val();
		var news_content = $('#news-wysiwyg-edit').editable("getText");

		console.log("news to be updated : ", news_id);

		$.ajax({

			method 		: 		'PUT',
			url 		: 		'/news/' + news_id,
			data 		: 		{id: news_id, title : news_title, content : news_content}

		}).done(function(response) {

			console.log("success : ", response);

		}).fail(function(response) {

			console.log("fail : ", response);

		});

	});


	$('#news .card-action').map(function() {
		$(this).find('li:eq(1) > a').click(function(event) {

			event.preventDefault();

			var deleted_id = $(this).attr('data-news-id');
			console.log('news to be deleted : ', deleted_id);

			$.ajax({

				method		: 		'DELETE',
				url 		: 		'/news/' + deleted_id

			}).done(function(response) {

				console.log('success : ', response);

				var $deleted_node = $('[data-news-id="' + deleted_id + '"]');

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
