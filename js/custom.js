jQuery(document).ready(function() {
    //Mobile Menu
    jQuery('.menu-link').bigSlide({
        menu: '#menu',
        easyClose: true
    });

    jQuery("time.entry-date").timeago();

    jQuery(".featured-dthumb").hoverIntent(function() {
            jQuery('.img-meta',this).slideDown(600,'easeOutBounce');
            jQuery('.img-meta-link',this).css('margin-right','50px');
            jQuery('.img-meta-link',this).animate({'margin-right':'0px'},500);
        },
        function() {
            jQuery('.img-meta-link',this).animate({'margin-right':'50px'},500);
            //jQuery('.img-meta-link').css('margin-right','50px');
            jQuery('.img-meta',this).fadeOut('fast');
            //jQuery('.img-meta-link').stop(true,false);
        });

    jQuery('a.meta-link-img').nivoLightbox();

	jQuery(window).bind('scroll', function(e) {
		hefct();
	});		
	
	jQuery(function() {
 
    // grab the initial top offset of the navigation 
    var sticky_navigation_offset_top = jQuery('#top-bar').offset().top;
     
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(){
        var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top
         
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scroll_top > sticky_navigation_offset_top) { 
            jQuery('#top-bar').css({ 'position': 'fixed', 'top':0, 'width':'100%' });
            jQuery("body.admin-bar #top-bar").css({ 'position': 'fixed', 'top':28, 'width':'100%' });
        } else {
            jQuery('#top-bar').css({ 'position': 'relative' }); 
            jQuery('body.admin-bar #top-bar').css({ 'position': 'relative','top':0 }); 
        }
        if (jQuery(window).width() < 960 ) {
	         jQuery('#top-bar').css({ 'position': 'relative' }); 
        }     
    };
     
    // run our function on load
    sticky_navigation();
     

    // and run it again every time you scroll
    jQuery(window).scroll(function() {
         sticky_navigation();
    });
 

    });

}); //endready



    	
function hefct() {
	var scrollPosition = jQuery(window).scrollTop();
	jQuery('#parallax-bg').css('top', (0 - (scrollPosition * .2)) + 'px');
}


jQuery(window).load(function() {
    jQuery('#nivoSlider').nivoSlider({
        prevText: "<i class='fa fa-chevron-circle-left'></i>",
        nextText: "<i class='fa fa-chevron-circle-right'></i>",
    });
});

(function(jQuery) {
    jQuery(document).ready(function() {

        function showSlide(slide) {
            jQuery('.slide').removeClass('visible');
            $('.'+slide).addClass('visible');
        }


        jQuery('.slide').addClass('not-visible');
        jQuery('.slide1').addClass('visible');
        jQuery('.thumb1').addClass('arrowed');
        jQuery('.thumb').click(function() {
            jQuery('.thumb').removeClass('arrowed');
            jQuery(this).addClass('arrowed');

            if ( jQuery(this).hasClass('thumb1') ) {
                showSlide('slide1');
            }
            if ( jQuery(this).hasClass('thumb2') ) {
                showSlide('slide2');
            }
            if ( jQuery(this).hasClass('thumb3') ) {
                showSlide('slide3');
            }
            if ( jQuery(this).hasClass('thumb4') ) {
                showSlide('slide4');
            }
        });
    });

})( jQuery );

function hefct() {
    var scrollPosition = jQuery(window).scrollTop();
    jQuery('#parallax-bg').css('top', (0 - (scrollPosition * .2)) + 'px');
}