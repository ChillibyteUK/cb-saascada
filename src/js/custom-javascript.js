// Add your custom JS here.
(function(){

  // hide header on scroll

    var doc = document.documentElement;
    var w = window;
  
    var prevScroll = w.scrollY || doc.scrollTop;
    var curScroll;
    var direction = 0;
    var prevDirection = 0;
  
    var header = document.getElementById('wrapper-navbar');
  
    var checkScroll = function() {
  
      /*
      ** Find the direction of scroll
      ** 0 - initial, 1 - up, 2 - down
      */
  
      curScroll = w.scrollY || doc.scrollTop;
      if (curScroll > prevScroll) { 
        //scrolled up
        direction = 2;
      }
      else if (curScroll < prevScroll) { 
        //scrolled down
        direction = 1;
      }
  
      if (direction !== prevDirection) {
        toggleHeader(direction, curScroll);
      }
  
      prevScroll = curScroll;
    };
  
    var toggleHeader = function(direction, curScroll) {
      if (direction === 2 && curScroll > 52) { 

        //replace 52 with the height of your header in px
        if (!document.getElementById('primaryNav').classList.contains("show")) {
            header.classList.add('hide');
            prevDirection = direction;
        }
      }
      else if (direction === 1) {
        header.classList.remove('hide');
        prevDirection = direction;
      }
    };
  
    window.addEventListener('scroll', checkScroll);

    // header background

  	$(document).on('scroll', function () {
      var $nav = $("#wrapper-navbar");
      // $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height() );
      if (!$('#primaryNav').hasClass('show')) {
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height() );
      }
    });

    $('#navToggle').on('click', function(){
      var $nav = $("#wrapper-navbar");
      $nav.toggleClass('navwhite');
    });

    // hero parallax
    $(document).ready(function($){
      $(window).on('scroll', function () {
          if ($(window).scrollTop() < 770) {
              $('#hero').css('background-position-x', -($(window).scrollTop()));        
          }  
      });
    });

})();
