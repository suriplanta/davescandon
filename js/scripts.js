//Config

var autoplay = false;
var autoplaytime = 5000;
var scroll = true;
var keyboard = true;
var navigation = false;

// Parameters

var winHeight = $(".slider").height();
var slideLength = $(".slider .slide").length;
var count = 1;
var scrollPixels = 0; // variable to store scroll delta
var scrolling; // timeout function var

// Slide styles

function current(count) {
  $('.slide-header').removeClass().addClass('slide-header header-' + count);
  $('.slide-right.slide-' + count).css({"top": 0, "visibility": "visible"});
  // Nav active styling
  $('.main-nav li a').removeClass();
  $('.main-nav li:nth-child(' + (count - 1) + ') a').addClass('active');
}
function after(count) {
  //$('.slide-left.slide-' + (count + 1)).css({"top": winHeight, "visibility": "visible"});
  $('.slide-header').removeClass().addClass('slide-header header-' + count);
  $('.slide-right.slide-' + (count + 1)).css({"top": winHeight, "visibility": "visible", "z-index": 100});
}
function before(count) {
  //$('.slide-left.slide-' + (count - 1)).css({"top": -(winHeight), "visibility": "visible"});
  $('.slide-header').removeClass().addClass('slide-header header-' + count);
  $('.slide-right.slide-' + (count - 1)).css({"top": -(winHeight), "visibility": "visible", "z-index": 100});
}

// Default slide order

function organizeSlides() {
  count = 1;
  current(count);
  after(count);
}

// Next Slide

function nextSlide() {
  if(count < slideLength) {
    count++;
    current(count);
    after(count);
    before(count);
  }
}

// Previous Slide

function prevSlide() {
  if(count > 1) {
    count--;
    current(count);
    after(count);
    before(count);
  }
}

// Slide Navigation Menu

$(".main-nav li").click(function() {
  var index = $( "li" ).index( this );
  //$( ".tagline" ).text( "That was div index #" + (index + 1) + "and" + slideLength);
  
  if((index + 1) != slideLength) {
    var slidenum = index + 2;
    $(".slide-right").css({"top": winHeight, "visibility": "hidden"});
    current(slidenum);
    after(slidenum);
    before(slidenum);
    count = slidenum; 
  }
});


// Slider Display

function sliderDisplay(auto, playtime, scroll, keyboard, navi) {
  organizeSlides();
  // Autoplay
  if(auto == true) {
    setInterval(
      function(){ 
        if(count < slideLength) {
          nextSlide();
        } else {
          $(".slide").removeAttr("style");
          organizeSlides();
        }
      }, autoplaytime
    );
  }
  // Scroll
  if(scroll == true) {
    $('.slider').bind('mousewheel', function(e){
      scrollPixels += e.originalEvent.wheelDelta;
      clearTimeout(scrolling);
      scrolling = setTimeout(function() {
        scrolling = undefined;
        if(scrollPixels < -200) {
          scrollPixels = 0;
          nextSlide();
        } else if (scrollPixels > 200){
          scrollPixels = 0;
          prevSlide();
        }
      }, 100);
    });
  }
  // Keyboard
  if(keyboard == true) {
    $(document).keydown(function(e) {
      switch(e.which) {
        case 37: // left
          prevSlide();
        break;
        case 38: // up
          prevSlide();
        break;
        case 39: // right
          nextSlide();
        break;
        case 40: // down
          nextSlide();
        break;
        default: return;
      }
      e.preventDefault();
    });
  }
  // Navigation
  if(navi == true) {
    //Nav HTML
    $('.slider').append(`
      <div class="nav-right">
        <a href="#" id="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
      </div>
      <div class="nav-left">
        <a href="#" id="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      </div>
    `);
    //Click functions
    $("#next").click(function() {
      nextSlide();
    });
    $( "#prev" ).click(function() {
      prevSlide();
    });   
  }
}

sliderDisplay(autoplay, autoplaytime, scroll, keyboard, navigation);