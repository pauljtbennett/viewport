(function($) { $.fn.extend({ exists: function() {return this.length>0;} }); })(jQuery);

$(document).ready(function() {
	$('.flexslider').flexslider({
		animation: 'slide',
		prevText: '&lsaquo;',
		nextText: '&rsaquo;',
		controlNav: false,
		animationLoop: false,
		end: function(slider) {
			if ($('.next-page-link a').exists()) {
				var $next_page_link = $('.next-page-link');
				$.ajax({
					url: $next_page_link.find('a').attr('href'),
					success: function(data) {
						var $slides = $(data).find('.slides li');
						var $new_next_page_link = $(data).find('.next-page-link');

						if ($slides.length) {
							$slides.each(function(i, e) {
								slider.addSlide(e); // Add new slides
							});

							$next_page_link.html($new_next_page_link.html()); // Update next page link
						}
					}
				});
			}
		}
	});
});