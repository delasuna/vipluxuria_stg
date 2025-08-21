// JavaScript Document
function horizontal() {
 
   var navItems = document.getElementById("menu_dropdown").getElementsByTagName("li");
    
   for (var i=0; i< navItems.length; i++) {
      if(navItems[i].className == "submenu")
      {
         if(navItems[i].getElementsByTagName('ul')[0] != null)
         {
            navItems[i].onmouseover=function() {this.getElementsByTagName('ul')[0].style.display="block";this.style.backgroundColor = "#f9f9f9";}
            navItems[i].onmouseout=function() {this.getElementsByTagName('ul')[0].style.display="none";this.style.backgroundColor = "#FFFFFF";}
         }
      }
   }
 
}



/* Accordion */

/* Fim Accordion */

/*

// Function Carrossel

	$(document).ready(function () {
		
		//jCarousel Plugin
	    $('#carousel').jcarousel({
			vertical: true,
			scroll: 1,
			auto: 2,
			wrap: 'last',
			initCallback: mycarousel_initCallback
	   	});

	//Front page Carousel - Initial Setup
   	$('div#slideshow-carousel a img').css({'opacity': '0.5'});
   	$('div#slideshow-carousel a img:first').css({'opacity': '1.0'});
   	$('div#slideshow-carousel li a:first').append('<span class="arrow"></span>')

  
  	//Combine jCarousel with Image Display
    $('div#slideshow-carousel li a').hover(
       	function () {
        		
       		if (!$(this).has('span').length) {
        		$('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
   	    		$(this).stop(true, true).children('img').css({'opacity': '1.0'});
       		}		
       	},
       	function () {
        		
       		$('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
       		$('div#slideshow-carousel li a').each(function () {

       			if ($(this).has('span').length) $(this).children('img').css({'opacity': '1.0'});

       		});
        		
       	}
	).click(function () {

	      	$('span.arrow').remove();        
		$(this).append('<span class="arrow"></span>');
       	$('div#slideshow-main li').removeClass('active');        
       	$('div#slideshow-main li.' + $(this).attr('rel')).addClass('active');	
        	
       	return false;
	});


});


//Carousel Tweaking

function mycarousel_initCallback(carousel) {
	
	// Pause autoscrolling if the user moves with the cursor over the clip.
	carousel.clip.hover(function() {
		carousel.stopAuto();
	}, function() {
		carousel.startAuto();
	});
} */