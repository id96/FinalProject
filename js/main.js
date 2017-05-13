// Home Page Slideshow
if (top.location.pathname === '/index.php'){
    showSlides();
}

function showSlides() {
    function Slideshow( element ) {
        this.el = document.querySelector( element );
        this.init();
    }

    Slideshow.prototype = {
        init: function() {
            this.wrapper = this.el.querySelector( ".slider-wrapper" );
            this.slides = this.el.querySelectorAll( ".slide" );
            this.previous = this.el.querySelector( ".slider-previous" );
            this.next = this.el.querySelector( ".slider-next" );
            this.index = 0;
            this.total = this.slides.length;
            this.timer = null;
            this.action();  
        },
        _slideTo: function( slide ) {
            var currentSlide = this.slides[slide];
            currentSlide.style.opacity = 1;
            for( var i = 0; i < this.slides.length; i++ ) {
                var slide = this.slides[i];
                if( slide !== currentSlide ) {
                    slide.style.opacity = 0;
                }
            }
        },
        action: function() {
            var self = this;
            self.timer = setInterval(function() {
                self.index++;
                if( self.index == self.slides.length ) {
                    self.index = 0;
                }
                self._slideTo( self.index );  
            }, 3500);
        },
    };
    
    document.addEventListener( "DOMContentLoaded", function() {
        var slider = new Slideshow( "#main-slider" );
    });
}


// HIDING NAVBAR FUNCTION
// Code taken from https://medium.com/@mariusc23/hide-header-on-scroll-down-show-on-scroll-up-67bbaae9a78c
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

// on scroll, let the interval function know the user has scrolled
$(window).scroll(function(event){
    didScroll = true;
    //console.log(didScroll);
});

// run hasScrolled() and reset didScroll status
setInterval(function() {
    if (didScroll) {
        //hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    //console.log("function runs");
    var st = $(this).scrollTop();
    if (Math.abs(lastScrollTop - st) <= delta) {
        return;
    }
    // If current position > last position AND scrolled past navbar...
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
        
    } else {
        // Scroll Up
        // If did not scroll past the document (possible on mac)...
        if(st + $(window).height() < $(document).height()) { 
            $('header').removeClass('nav-up').addClass('nav-down');
        }
    }
    lastScrollTop = st;
}


// image resizing
$(window).load(function() {
    $('.small-img').each(function() {
        var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
        $(this).addClass(imgClass);
    })
})

$('.small-img').click(function on() {
    document.getElementById("overlay").style.display = "block";
});


// overlay effect for aerial portfolio
function openModal() {
  document.getElementById('myModal-aerial').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal-aerial').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  
  var slides = document.getElementsByClassName("mySlides-aerial");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}


// overlay effect for dslr portfolio
function openModalDSLR() {
  document.getElementById('myModal-dslr').style.display = "block";
}

function closeModalDSLR() {
  document.getElementById('myModal-dslr').style.display = "none";
}

var slideIndexDSLR = 1;
showSlidesDSLR(slideIndexDSLR);

function plusSlidesDSLR(n) {
  showSlidesDSLR(slideIndexDSLR += n);
}

function currentSlideDSLR(n) {
  showSlidesDSLR(slideIndexDSLR = n);
}

function showSlidesDSLR(n) {
  var i;
  
  var slidesDSLR = document.getElementsByClassName("mySlides-dslr");
  if (n > slidesDSLR.length) {slideIndexDSLR = 1}
  if (n < 1) {slideIndexDSLR = slidesDSLR.length}
  for (i = 0; i < slidesDSLR.length; i++) {
      slidesDSLR[i].style.display = "none";
  }
  slidesDSLR[slideIndexDSLR-1].style.display = "block";
}
