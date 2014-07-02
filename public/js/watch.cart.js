$(function() {
	
	$('.js-btn-cart-item-remove').click(function(event) {
		event.preventDefault();

		var cart_item_id = $(this).attr('data-cart-item-id');

		$.ajax({
			method: 'delete',
			url: '/cart/' + cart_item_id
		}).done(function(response) {

			var deleted_id = cart_item_id;
			console.log('news to be deleted : ', deleted_id);

			var $deleted_node = $('[data-cart-item-id="' + deleted_id + '"]');

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

		});
	});

	$('.js-btn-order').click(function(event) {
		event.preventDefault();

		var cart_id = $(this).attr('data-cart-id');

		$.ajax({
			method: 'post',
			url: '/order',
			data: {cartId : cart_id}
		}).done(function(response) {
			
			$('#total-price').html('总额：<i class="fa fa-jpy"></i> 0');
			$('.card-list').addClass('animated rollOut');
			$('.card-list').one(
				'webkitAnimationEnd \
					mozAnimationEnd \
					MSAnimationEnd \
					oanimationend \
					animationend',
				function(event) {
					$('.card-list').remove();
			});

		});

	});

});
