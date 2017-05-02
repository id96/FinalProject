// Home Page Slideshow
showSlides();
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
    console.log(didScroll);
});

// run hasScrolled() and reset didScroll status
setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    console.log("function runs");
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


// Picture Hover Interactivity

// get mouseover 

// add class active when mouse is over photo
// this active class on css makes the div display over the photo
// div contains information for each photo, pulled from the database

// remove class when not over a photo
// make the div display: none


