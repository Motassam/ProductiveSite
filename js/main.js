$(document).ready(function() {
	
    $("html").niceScroll({cursorcolor:"#FF6600", cursorwidth:"7px"});
  	
	// set timer to change slides 
	
	
	var scrollBtn = $("#scroll-top");
	$(window).scroll(function(){
	if( $(this).scrollTop() >= 700 ){
		scrollBtn.show();
	} else {
		scrollBtn.hide();
	}});
	
	// add click evt to scrollBtn
	scrollBtn.click(function() {
		$("html,body").animate({ scrollTop:0 }, 2000);
	});
	
	
});