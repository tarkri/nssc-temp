$(document).ready(function(){
	
	var winnersList = $('ul.winners');
	var winnerItem = $('ul.winners li a');
	var overlay = $('div.overlay');
	
	$(winnerItem).click(function(){
		var winnerParent = $(this).parent('li');
		var winnerMedia
		$(overlay).fadeIn();
	});
	
	$('div.overlay a.close').click(function(){
		$('div.overlay').fadeOut();
	});
	
	$('div.overlay').click(function(){
		$(this).fadeOut();
	});
	
});