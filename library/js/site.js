$(document).ready(function(){ 
	
	var winHeight = $(window).height();
	var banner = $('div.banner');
	var contentDown = $('div.banner a.move-down');
	var conferenceDown = $('div.banner-content div.callout.right a.link-down');
	var showDown = $('div.banner-content div.callout.left a.link-down');
	var bannerContent = $('div.banner-content');
	
	
	
	
	//Scroll to the main content from the banner
	$(contentDown).click(function(){
		$('html,body').animate({ scrollTop: $('div.scroll-marker').offset().top }, 'slow');
		$(this).fadeOut();
	});
	$(conferenceDown).click(function(){
		$('html,body').animate({ scrollTop: $('div.scroll-marker').offset().top }, 'slow');
		$(contentDown).fadeOut();
	});
	$(showDown).click(function(){
		$('html,body').animate({ scrollTop: $('div.show-marker').offset().top }, 'slow');
		$(contentDown).fadeOut();
	});
	
	
	
	
	
	//Scales banner to full size of window on load	
	if(winHeight > 620) {
		$(banner).css({
			height: winHeight + 'px'
		});
		$(contentDown).animate({
			opacity:'0'
		}, 0).animate({
			opacity:1
		}, 1000);
	}
	
	if(winHeight < 768) {
		$(contentDown).hide();
	}
	
	//$('nav#main').scrollToFixed();
	
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$(bannerContent).removeClass('fixed');
		$(contentDown).removeClass('fixed');
	}
	
});