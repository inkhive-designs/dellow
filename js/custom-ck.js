function hefct(){var e=jQuery(window).scrollTop();jQuery("#parallax-bg").css("top",0-e*.2+"px")}jQuery(document).ready(function(){jQuery("#main-menu").sidr();jQuery("time.entry-date").timeago();jQuery(".featured-thumb").hoverIntent(function(){jQuery(".img-meta",this).slideDown(600,"easeOutBounce");jQuery(".img-meta-link",this).css("margin-right","50px");jQuery(".img-meta-link",this).animate({"margin-right":"0px"},500)},function(){jQuery(".img-meta-link",this).animate({"margin-right":"50px"},500);jQuery(".img-meta",this).fadeOut("fast")});jQuery("a.meta-link-img").nivoLightbox();jQuery(window).bind("scroll",function(e){hefct()});jQuery(function(){var e=jQuery("#top-bar").offset().top,t=function(){var t=jQuery(window).scrollTop();if(t>e){jQuery("#top-bar").css({position:"fixed",top:0,width:"100%"});jQuery("body.admin-bar #top-bar").css({position:"fixed",top:28,width:"100%"})}else{jQuery("#top-bar").css({position:"relative"});jQuery("body.admin-bar #top-bar").css({position:"relative",top:0})}jQuery(window).width()<960&&jQuery("#top-bar").css({position:"relative"})};t();jQuery(window).scroll(function(){t()})})});