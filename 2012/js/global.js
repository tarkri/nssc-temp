$(document).ready(function() {
	$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none',
		helpers: {
			overlay: {
				opacity: 0.5
			}
		}
	});

	$(".fancyboxmedia").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			overlay: {
				opacity: 0.8
			},
			media : {}
		}
	});
});
