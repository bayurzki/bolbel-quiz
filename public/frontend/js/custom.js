$(document).ready(function() {
	$(window).scroll(function() {
        var windowBottom = $(this).scrollTop() + $(this).innerHeight();
        $(".fade").each(function() {
          /* Check the location of each desired element */
          var objectBottom = $(this).offset().top + $(this).outerHeight();
          objectBottom = objectBottom - 250;
          // console.log(windowBottom + ' - ' + objectBottom)
          /* If the element is completely within bounds of the window, fade it in */
          if (objectBottom < windowBottom) { //object comes into view (scrolling down)
            if ($(this).css("opacity")==0) {$(this).fadeTo(800,1);}
          } 
        });
    }).scroll();


	$(".owl-carousel").owlCarousel({
		center: true,
    	items:1,
		loop:true,
    	margin:10,
    	nav:true
	});
});

