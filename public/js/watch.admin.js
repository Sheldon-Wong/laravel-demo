
const PAGE_URL = {
	'#movies' 		: 'movie',
	'#news'			: 'news',
	'#actors'		: 'actor',
	'#categories' 	: 'category',
	'#users'		: 'user',
	'#orders'		: 'order'
};

$(function() {

	initTab();
	initDashboard();
	
});


function initDashboard() {

	$('#navigator a:eq(0)').click();

}


function initTab() {

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

		var prev_pane 	= $(e.relatedTarget).attr('href');
		var cur_pane 	= $(e.target).attr('href');

		
		loadPane(cur_pane);
		$(prev_pane).children().remove();

	});

	function loadPane(pane_id) {

		var $pane = $(pane_id);

		$pane.load(

			PAGE_URL[pane_id],

			function(response, status, xhr) {

				if(status == 'error') {
					alert('can not load the pane');
					return;
				}

				$pane.addClass('animated fadeInDown');
				$pane.one('webkitAnimationEnd \
						mozAnimationEnd \
						MSAnimationEnd \
						oanimationend \
						animationend',
					function() {
						$pane.removeClass('animated fadeInDown');
						initMasonry($pane);
				});

				
				switch(pane_id) {
					case '#movies' 		: 	setupMovies(); break;
					case '#news' 		: 	setupNews(); break;
					case '#actors' 		: 	setupActors(); break;
					case '#categories' 	: 	setupCategories(); break;
					case '#users' 		: 	setupUsers(); break;
					case '#orders' 		: 	setupOrders(); break;
				}

		});

	}


	function initMasonry(node) {

		node.find('.card-list').masonry({ 
	        itemSelector: '.card-list > li'
	    });

	}

}
