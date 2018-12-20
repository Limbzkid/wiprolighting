var slideLen //This will be dinamic
var caroDotLen,dotSlideNo
var masterWidth = $(window).width();
$(window).resize(function() {
    if (this.resizeTO) clearTimeout(this.resizeTO);
    this.resizeTO = setTimeout(function() {
        $(this).trigger('resizeEnd');
    }, 10);
});
$(window).bind('resizeEnd', function() {
	 $('#mainWrapper.homepge').css("width", $(window).width());
     if ($(window).width() > 767) {
		 
        $('.sliderDiv, .sliderDiv *').not('.copyBox *, .bannerShow *').removeAttr('style')
		$('.homePageRoll').css("visibility", 'hidden');
		//if($(window).width()!=lastWidth){
    		homeBanner();
   		//}
		$('.homePageRoll').css("visibility", 'visible');
		$('.homepge .footerLinks').css("width", $(window).width());
        $('.sliderDiv').animate({'left': -$('.sliderDiv .slide').width() * $('.paginav li.sel').index()}, 100, function() {
            if ($(window).width() < 767) {			
                $('.sliderDiv').css({'left': 0});
            }
        });
    } else {
		 
        $('.sliderDiv, .sliderDiv *').not('.copyBox *, .bannerShow *').removeAttr('style');
        $('.sliderDiv').css({'left': 0});
    }

    $(".bannerShow, .bannerShow .banner").css('height', $('.sliderDiv').height());
	if($(window).width()!=lastWidth){
			slideOneShow();	
   		}
		//calling proCarousel()
   			proCarousel();
			bannerimages();
	 $('.animDiv').removeAttr('style')
	 $('.animDiv li').eq($('.pagination li.sel').index()).click();
	
});

$(function() {
    //For Home Page Landing Banner :::: Start
    /*Below Code Is For Home page Paginetion :::: Start*/
	 $('#mainWrapper.homepge').css("width", $(window).width());
    $('.paginav li').eq(0).addClass('curr');
    $('.paginav li').click(function() {
        var me = $(this);
        var ind = me.index();
        var curr = $('.curr').index();
        var thisOffset = parseInt($('.paginav .pagiBar').width() / 5)
        $('.animDiv').animate({'width': thisOffset * ind}, 1000, function() {
            me.prevAll().addClass('visit');
            me.addClass('sel').siblings().removeClass('sel');
            me.nextAll().removeClass('visit');
        });
        $('.animDiv ul').css({'width': $('.paginav .pagiBar').width()})
         $(this).addClass('curr').siblings().removeClass('curr'); 
		
		//$('.animDiv li').eq($('.paginav li.sel').index()).click();

		/*Main Slides Animeted*/
        $('.sliderDiv').animate({'left': -ind * $('.container').width()}, 1000,'easeInOutCubic', function() {
			$(this).find('.slide').eq(ind).addClass('animateMe');
        });

        if ((ind + 1) == $($(".sliderDiv")).children(".slide").length) {
            $(".nex").addClass("Off");
            $(".prv").removeClass("Off");
        } else if ((ind + 1) == 1) {
            $(".nex").removeClass("Off");
            $(".prv").addClass("Off");
        } else {
            $(".nex,.prv").removeClass("Off");
        }
    });
	/* Slides Next And Prv Clicks*/
    $(".nex").click(function() {
        $(".paginav").find(".sel").next().click();
    });
    $(".prv").click(function() {
        $(".paginav").find(".sel").prev().click();
    });
    /*Below Code Is For Home page Paginetion :::: End*/
	
    if ($(window).width() > 767) {
        $('.homePageRoll').css("visibility", 'hidden');
        homeBanner();
		$('.homePageRoll').css("visibility", 'visible');
		$('.homepge .footerLinks').css("width", $(window).width());
    } else {
        $('.sliderDiv, .sliderDiv *').not('.copyBox *, .bannerShow *').removeAttr('style');
        $('.sliderDiv').css({'left': 0});
    }
	/*dotSlider*/
	var dotLen = $('.innovativeBox .dotWrap').length;
    for (i = 0; i < dotLen; i++) {
        var dotSlideNo = i + 1;
        $('.innovativeBox .dotBtns').append('<li> <a href="javascript:;">' + dotSlideNo + '</a></li>');
    }
    dotSlider();
	/*dotSlider*/
	
	/*latestBox dotSlider*/
	var latestBoxDotLen = $('.latestBox .dotWrap').length;
    for (i = 0; i < latestBoxDotLen; i++) {
        var latestBoxdotSlideNo = i + 1;
        $('.latestBox .dotBtns').append('<li> <a href="javascript:;">' + latestBoxdotSlideNo + '</a></li>');
    }
    latestBoxdotSlider();
	/*latestBox dotSlider*/
    

    var bannerLen = $('.banner').length;;
    for (i = 0; i < bannerLen; i++) {
        var bannerNo = i + 1;
        $('.thumDot').append('<li> <a href="javascript:;">' + bannerNo + '</a></li>');
    }
    slideOneShow();
	//calling proCarousel()	
	proCarousel();
	bannerimages();
    //For Home Page Landing Banner :::: End
	//$('.slide.fns .listData #map').css('height',$('.slideBox').height());	
});

function MouseWheelHandler() {	
    return function (e) {
        // cross-browser wheel delta
        var e = window.event || e;
        var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
        //scrolling down?
		if( !$('.sliderDiv').is(':animated') ) {
			if($('#mainWrapper').hasClass('ScrollOff')){
				return false;
			}else{				 
				  if (delta < 0) {
				$(".paginav").find(".sel").next().click();
				} else {
				$(".paginav").find(".sel").prev().click();
				}
				  }
		}
        return false;
    }
}
function bannerimages(){
		$('.banner').each(function() {
			var deskAttr = $(this).attr('desk-attr');
			var mobAttr = $(this).attr('mob-attr');
			if ($(window).width() < 981) {
 		     $(this).css('background-image', 'url("'+ mobAttr +'")');  
			}  else{
				$(this).css('background-image', 'url("'+ deskAttr +'")'); 
				}  
});

}
function slideOneShow() {

    var openedBanner, clickedA, index = null;
    var $banners = $('.banner');
    var banner_count = $banners.length;
	$banners.hide();
	$banners.eq(0).show().addClass('animet');
   // 
    var bannerAnimation = function() {
		
            index = $('.thumDot a').index(this);
			
            var curBanner = $banners[index];
            if (openedBanner != curBanner) {
				//$('.banner').removeClass('animet').hide();
				//alert(openedBanner)
                 		//alert();
						//$banners.slideUp();
						
						//$banners.slideUp(1000,'easeOutBack');
                        $(openedBanner).slideUp(1000,'easeOutBack').removeClass('animet');
                        $(curBanner).slideDown(1000,'easeOutBack').addClass('animet');
						$(clickedA).removeClass('active');
						$(this).addClass('active');
						clickedA = this;
						openedBanner = curBanner;
            }
			
            return false;
        }
		
        //Based on click;
 
    $('.thumDot a').click(bannerAnimation).eq(0).click();
    //Based on delay :: Auto //Sunit
     window.setInterval(function(){
     	if(index < (banner_count)){$('.thumDot a').eq(index).click(); index++;}
     	else index=0;
     },6000);
	 
	 $(".homePageRoll .bannerShow").swipe({
		 swipe: function(event, direction, distance, duration, fingerCount) { 
		 if (direction == "left") {$('.thumDot a').eq(index+1).click(); } 
		 else if ((direction == "right")) {$('.thumDot a').eq(index-1).click(); 		 
		 } 
		 else {return false;}
	  },
	 allowPageScroll: "vertical"
	 });
	$(".bannerShow, .bannerShow .banner").css('height', $('.sliderDiv').height());
		 
	$(document).on('click','.banner',function(){ 
	  if($(this).find('.btnBox').length) {      
		  window.location = $(this).find('.btnBox').attr("href");
          return false;
	  }
    });
}

function getIEVersion() {
    var rv = -1; // Return value assumes failure.
    if (navigator.appName == 'Microsoft Internet Explorer') {
        var ua = navigator.userAgent;
        var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
        if (re.test(ua) != null)
            rv = parseFloat(RegExp.$1);
    }
    return rv;
}

function homeBanner() {	

	//Mouse handler//

	if ($(window).width() > 1023) {	
			if (document.addEventListener) {
				document.addEventListener("mousewheel", MouseWheelHandler(), false);
				document.addEventListener("DOMMouseScroll", MouseWheelHandler(), false);
			} else {
				
			sq.attachEvent("onmousewheel", MouseWheelHandler());
			}			 
		 }	
$('.animDiv li').click(function() {
        var ind = $(this).index();
        $('.paginav li').eq(ind).click()
    }); 
    var midHgt = $("nav").height() + 120;
    var slideHgt = $(window).height() - midHgt
    $(".sliderDiv").css('height', slideHgt);
	$(".locateMap").css('height', slideHgt);
    $('.sliderDiv .slide, .paginav').css('width', $('.container').width());
    var scrollWidth = $($(".sliderDiv")).children(".slide").length * $(".sliderDiv .slide").width();
    $(".sliderDiv").css("width", scrollWidth + "px");
	//$(".sliderDiv").animate({width: scrollWidth + "px"},'slow','easeInOutBounce');	 
	 //$($(".sliderDiv")).css("width", scrollWidth + "px");
	$('.slide .title h2').addClass('notIE')
	/* IF IE 9*/
    function checkVersion() {
        var ver = getIEVersion();
        if (ver != -1) {
            if (ver <= 9.0) {
				/*Slide Home Animetion fix  Start*/	
				$('.slide .copyBox *,.slide .title h2:after').css({'opacity': '1', 'filter': 'alpha(opacity=100)'});
				$('.gmnoprint div img').trigger('click')
				//$('.slide .copyBox *').animate({'opacity': '1'}, 1000);				   
				$('.slide .title h2').removeClass('notIE') 				
				/*Slide Home Animetion End*/		 
               }
        }
    }
    checkVersion();
    $('.sliderDiv .slide').eq(0).addClass('animateMe');
	
	 if ($(window).width() > 1199) {
		  $('.paginav').css('width', $('.container').width());		 
	 } else if ($(window).width() > 1023) {
		  $('.paginav').css('width', $('.container').width() - 50);
	 }else{
		 $('.paginav').css('width', '98%');
	 }
	 //$('.sliderDiv .slide').animate({width:'100%'},'slow','easeInOutBounce');
}

function dotSlider() {
    // For Home Page dotSlider
    var openedBanner, clickedA, index = null;
    var $banners = $('.innovativeBox .dotWrap');
    var banner_count = $banners.length;
    $('.innovativeBox .dotWrap').hide();

    var bannerAnimation = function() {
        index = $('.innovativeBox .dotBtns a').index(this);
        var curBanner = $banners[index];
        if (openedBanner != curBanner) {
            $(openedBanner).fadeOut().removeClass('animet');
            $(curBanner).slideDown().addClass('animet');
            $(clickedA).parent().removeClass('sel');
            $(this).parent().addClass('sel');
            clickedA = this;
            openedBanner = curBanner;
        }
        return false;
    }

    $('.innovativeBox .dotBtns a').click(bannerAnimation).eq(0).click();
	
	 $(".innovativeBox .dotSlideBox").swipe({
		 swipe: function(event, direction, distance, duration, fingerCount) {
		 if (direction == "left") { $('.innovativeBox .dotBtns a').eq(index+1).click(); } 
		 else if ((direction == "right")) { $('.innovativeBox .dotBtns a').eq(index-1).click(); } 
		 else {return false;}
	  },
	 allowPageScroll: "vertical"
	 });
		 
}

/*****************************************/
function latestBoxdotSlider() {
    // For Home Page dotSlider
    var openedBanner, clickedA, index = null;
    var $banners = $('.latestBox .dotWrap');
    var banner_count = $banners.length;
    $('.latestBox .dotWrap').hide();

    var latestBoxbannerAnimation = function() {
        index = $('.latestBox .dotBtns a').index(this);
        var curBanner = $banners[index];
        if (openedBanner != curBanner) {
            $(openedBanner).fadeOut().removeClass('animet');
            $(curBanner).slideDown().addClass('animet');
            $(clickedA).parent().removeClass('sel');
            $(this).parent().addClass('sel');
            clickedA = this;
            openedBanner = curBanner;
        }
        return false;
    }

    $('.latestBox .dotBtns a').click(latestBoxbannerAnimation).eq(0).click();
	
	/*autoslide:start*/
	$('.paginav li').eq(2).click(function() {
		window.setInterval(function(){
     		if(index < (banner_count)){$('.latestBox .dotBtns a').eq(index).click(); index++;}
     		else index=0;
     	},4000);
	});
	/*autoslide:end*/
	
	 $(".latestBox .dotSlideBox").swipe({
		 swipe: function(event, direction, distance, duration, fingerCount) {
		 if (direction == "left") { $('.latestBox .dotBtns a').eq(index+1).click(); } 
		 else if ((direction == "right")) { $('.latestBox .dotBtns a').eq(index-1).click(); } 
		 else {return false;}
	  },
	 allowPageScroll: "vertical"
	 });
		 
}

/*********************** start proCarousel slider***************/
 

function proCarousel() {
		slideLen =  3
 		$('.caroDots').html('')	
		  caroDotLen = $('.carouselOuter ul li').length/slideLen;
		  for (i = 0; i < caroDotLen; i++) {
		  dotSlideNo = i + 1;
		  $('.caroDots').append('<a href="javascript:;">' + dotSlideNo + '</a>');
		}
		$('.caroDots a').eq(0).addClass('sel');
 		var carowidth = $('.carouselOuter ul li').width()*slideLen;
			$('.proCarousel').css('width', carowidth);
			$('.carouselInner').css('width', $('.carouselOuter ul li').length * $('.carouselOuter ul li').width()) ;		
 		
 		$(document).on('click','.caroDots a',function(){
 			var ind= $(this).index();
			$('.carouselInner').animate({'margin-left':-ind*carowidth},400,function(){		});		
			$(this).addClass('sel').siblings().removeClass('sel')
 
	
		});
		
	  $(".proApp").swipe({
		 swipe: function(event, direction, distance, duration, fingerCount) {
		 if (direction == "left") { $('.caroDots a.sel').next().click(); } 
		 else if ((direction == "right")) { $('.caroDots a.sel').prev().click(); } 
		 else {return false;}
	  },
	 allowPageScroll: "vertical"
	 });
		
		 
	 }
	 

 
/*********************** end proCarousel slider***************/