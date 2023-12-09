(function ($) {
	
	"use strict";

	$('.owl-show-events').owlCarousel({
		items:4,
		loop:true,
		dots: true,
		nav: true,
		autoplay: true,
		margin:30,
		  responsive:{
			  0:{
				  items:1
			  },
			  600:{
				  items:2
			  },
			  1000:{
				  items:4
			  }
		  }
	  })

	const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;
	let countUP = new Date(finDayEventDate).getTime();
	let countDown = new Date(debutDayEventDate).getTime(),
    x = setInterval(function() {    

		let now = new Date();
		now = now.getTime();
        let distance = countDown - now ;
		if(distance >= 0) 
		{
        	document.getElementById('days').innerText = Math.floor(distance / (day)),
        	document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        	document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
    		document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
		}
		else
		{
			document.getElementById('days').innerText = Math.floor(-distance / (day)),
        	document.getElementById('hours').innerText = Math.floor((-distance % (day)) / (hour)),
        	document.getElementById('minutes').innerText = Math.floor((-distance % (hour)) / (minute)),
    		document.getElementById('seconds').innerText = Math.floor((-distance % (minute)) / second);
		}

      if (distance < 0 && day < countUP ) {
        document.getElementById('itsTime').innerText = "Event Days";
      }
    }, second)

	$(function() {
        $("#tabs").tabs();
    });
	

	$('.schedule-filter li').on('click', function() {
        var tsfilter = $(this).data('tsfilter');
        $('.schedule-filter li').removeClass('active');
        $(this).addClass('active');
        if (tsfilter == 'all') {
            $('.schedule-table').removeClass('filtering');
            $('.ts-item').removeClass('show');
        } else {
            $('.schedule-table').addClass('filtering');
        }
        $('.ts-item').each(function() {
            $(this).removeClass('show');
            if ($(this).data('tsmeta') == tsfilter) {
                $(this).addClass('show');
            }
        });
    });


	// Window Resize Mobile Menu Fix
	mobileNav();


	// Scroll animation init
	window.sr = new scrollReveal();
	

	// Menu Dropdown Toggle
	if($('.menu-trigger').length){
		$(".menu-trigger").on('click', function() {	
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
		});
	}


	// Page loading animation
	 $(window).on('load', function() {

        $('#js-preloader').addClass('loaded');

    });


	// Window Resize Mobile Menu Fix
	$(window).on('resize', function() {
		mobileNav();
	});


	// Window Resize Mobile Menu Fix
	function mobileNav() {
		var width = $(window).width();
		$('.submenu').on('click', function() {
			if(width < 767) {
				$('.submenu ul').removeClass('active');
				$(this).find('ul').toggleClass('active');
			}
		});
	}


})(window.jQuery);