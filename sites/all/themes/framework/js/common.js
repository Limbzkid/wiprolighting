var slideCtr=0;
var lastWidth = $(window).width();
$(function() {
	/*function called:start*/
    htmlClass();
	postBackFun();
	caseStudySectionSlider();
	productSlider();
	tabAccFunction();
	tableResponsive();
	productListSlider();
	responsiveTable();
	gridViewListHgt();
	bestSuitedCarousel();
	maplisting();
	lightboxPosition();
	ourTeam();	
	timelineScroll();
	backtoTop();
	ProLoadmore();
	InsgallLoadmore();
	containerHeight();
	timeline(0);
	animetClass();
	
	//alert($(window).width());
	if ($(window).width() > 767){
		siteMap(); 
	}else{ $('.sitemapPge *').removeAttr('style')}
	/*function called:end*/
	
	$(".ledSection .group .left_imgntext").hover(function(){
	$(this).find('.imgOverlay').slideToggle();
	});
	
	$(".ledSection .group .left_imgntext").hover(function(){
	$(this).find('.imgOverlayRight').slideToggle();
	});
	/*loader called:end*/
	$( window ).load(function() {
      $('.loaderOverlay').hide();
	});
	/*function called:end*/
	
	/*Led lumanaire functionality*/
	$(function() {
	$(document).on('click','.tabWrapper .tabList ul li',function(){
			thsIndex = $(this).index();
			//alert(thsIndex);
			$(this).addClass('active').siblings().removeClass('active')
			$(".tabWrapper .tabContainerWrap .tabContent").eq(thsIndex).fadeIn().siblings(".tabWrapper .tabContainerWrap .tabContent").hide();			
		}).eq(0).click();
		$(document).find(".tabWrapper .tabList ul li").eq(0).click();
		});
	/*Led lumanaire functionality*/
	
	if($('.horScrollPane').length){
		$(".horScrollPane").mCustomScrollbar({
			axis:"x",
			theme:"rounded-dark",
			//autoExpandScrollbar:true,
			advanced:{autoExpandHorizontalScroll:true},
			callbacks:{onScroll:function(){timeline($(".timelineSection").find(".animet:last").index());}}
		});
	}
	// Trimming the content to a limited characters starts
    $('.groupFullContent .box ul li').each(function () {
		var charLimit = 300;
        var charCount = 0;
        var wordArray, newText = "";

        wordArray = $(this).find("p").not(".title").text();
		//console.log(wordArray);
		wordArray = wordArray.split(" ");
        $(wordArray).each(function (i) {
            if (charCount <= charLimit) {
                charCount += ($(this).length + 1);
                newText += $(wordArray)[i] + " ";
            }
            else {
                return false;
            }
        });
		$(this).find("p").not(".title").remove();
		$("<p>"+newText + "...</p>").insertAfter($(this).find(".title"));
		//$(this).find("p").text(newText + "...");
    });
    // Trimming the content to a limited ends
	
	/*lightbox button click:start*/
	if($("body").hasClass("page-resources-installation-gallery")==true)
	{
		$(".sliderHidden").attr("rel",1);
	}

	$(document).on('click','.fullContentSection .gallerySection .imgPart li',function(){		
		$(this).find('img').addClass('zoomImg');
		$('.lightbox.insGal').css({'top':$(this).offset().top + 50});
		var cloneSection = $(this).parents(".gallerySection .group").find(".imgPart, .contentPart, .actionDiv").clone();
		$(".gallaryLb .gallerySection .group").append(cloneSection); 
		//lightboxName = 'gallaryLb';
		openLightbox('gallaryLb');
		//$('body').addClass('noscroll');
		lbGallarySlider($(this));
		scrollTopLightBox();
			 
	});
	
	$(".appStepSection .stepContent .emailProject").click(function (){
		//lightboxName = 'gallaryLb';
		openLightbox('lbEmailProject')
		//$('body').addClass('noscroll');
		scrollTopLightBox();
	});
	
	$(".clickHere").click(function (){
		//lightboxName = 'gallaryLb';
		openLightbox('lbLightingDesign')
		$("html,body").animate({scrollTop: $('body').offset().top}, 300);	
		//$('body').addClass('noscroll');
		//scrollTopLightBox();
	});
	
	/*feedbackPopup:start*/
	$(".feedbackPopup .feedbackContent .getStartedBtn").click(function (){
		$(".feedbackPopup .closeBtn").click();
		openLightbox('lbFeedbackForm')
		scrollTopLightBox();
	});
	$(".feedbackPopup .closeBtn").click(function(){
		$(this).parent(".feedbackPopup").fadeOut();
	});
	/*feedbackPopup:end*/
	
	$(".lbLedEdgeClick").click(function (){
		openLightbox('lbLedEdge')
		//scrollTopLightBox();
		$("html,body").animate({scrollTop: $('body').offset().top}, 300);				
	});
		
	$(".productLhs .brandLogo .actionLeft, .videoListSection ul li a").click(function (){
		var url = $(this).attr('data-video');
    alert(url);
		$('.lbVideo .video iframe').attr('src', url);
		openLightbox('lbVideo')
		scrollTopLightBox();
	});
	
	$(".lightbox .closeBtn, .overlay").click(function(){
		$(".overlay, .lightbox").hide();
		$('.fullContentSection .gallerySection .imgPart li img').removeClass('zoomImg');
		$('body').removeClass('noscroll');
		$(".gallaryLb .gallerySection .group").html('');		
		$('.lbVideo .video iframe').attr('src', '');		
	});		
	/*lightbox button click:end*/
	
	/*grocerySection:start*/
	$(".glossaryContent .atozContent").each(function(){
		if(typeof $(this).attr("rel")!="undefined")
		{
			$(this).show();
		}
	});
	/*var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
	var alphabetContent=[];
	$(".glossaryContent .atozContent").each(function(){
		if(typeof $(this).attr("rel")!="undefined")
		{
			alphabetContent.push($(this).attr("rel"));
		}
	});
		
	$.each(alphabet, function(letter) {
		if(alphabetContent.indexOf(alphabet[letter])!=-1)
		{
			$('.glossaryPagenation ul').append($('<li>' + alphabet[letter] + '</li>'));
			$('.glossaryPagenation select').append($('<option>' + alphabet[letter] + '</option>'));
		}
		else
		{
			$('.glossaryPagenation ul').append($('<li class="disable">' + alphabet[letter] + '</li>'));
			$('.glossaryPagenation select').append($('<option disabled="disabled">' + alphabet[letter] + '</option>'));
		}
	});
	
	$(".glossaryPagenation ul li").click(function(){
		var thsAlphabetIndex = $(this).index();		
		if(!$(this).hasClass('disable')){
			$(this).addClass('active').siblings().removeClass('active');
			$(".glossaryContent .atozContent").eq(thsAlphabetIndex).fadeIn().siblings(".glossaryContent .atozContent").hide();
		}
	}).eq(0).click();
	
	$(".glossaryPagenation select").change(function(){
		var thsAlphabetIndex = $(this).children("option:selected").index();
		$(".glossaryContent .atozContent").eq(thsAlphabetIndex).fadeIn().siblings(".glossaryContent .atozContent").hide();
	}).eq(0).change();*/
	/*grocerySection:end*/
	
	
	
	/*Below Code is for calling Menu on Hover: Starts*/		 
	menuhover();
	
	
	  $(".menutabWrp h3").click(function() {		  
		  $(".menutabWrp h3").not(this).removeClass('sel');
		  $('.menutabWrp .rgtMenuBox').hide();
		  $(this).toggleClass('sel');
		  $(this).parent('.menutabWrp').find('.rgtMenuBox').slideToggle();
	  	  $("html,body").animate({scrollTop: $(this).offset().top - 100}, 100);
	  }).eq(0).click();	 	  		
	/*Above Code is for calling Menu on Hover: Ends*/
	
	/*Below Code is for calling lightBox: Starts*/	
	$('.loginI').click(function() { 
		if ($('.loginI').hasClass('logOff')){
			$('.overlay, .lightboxWrp').hide();
		}else{
			$('.menuPopup').hide();
			$(this).addClass('sel');
			lightboxPosition();
			$('.overlay, .lightboxWrp').slideDown();
			$("html,body").animate({scrollTop: $('.lightboxWrp').offset().top - 50}, 100);
			$('#mainWrapper').addClass('ScrollOff');
			$('section').removeClass('contenterOverlay');
		}
    });
	
	$('.appStepSection .arrowLink.loginBtn').click(function() {
		$('.loginI').trigger('click');     
	});
	$('.popXbtn, .overlay').click(function() { 
	    $('.loginI').removeClass('sel');
	  //$('.menu li > a').removeClass('active');
       $('.overlay, .lightboxWrp, .menuPopup').hide(); 
	   $('#mainWrapper').removeClass('ScrollOff');
	   $('section').removeClass('contenterOverlay');      
    });
	$('section').click(function() {
		if($('section').hasClass('contenterOverlay')){
	  	 $('.menuPopup .popXbtn').trigger('click');    
    	}
    	
	});
	/*Above Code is for calling lightBox: Ends*/		
	
	/*Below is for Scroll Style*/
	if($('.scroll-pain').length){
		$('.scroll-pain').mCustomScrollbar({theme:"dark-3"});
	}
	$(".tablePayBacKCalc .resultSection .formBtn").click(function(){
		$(this).parents(".tablePayBacKCalc").find(".resultSection").slideUp();
		$(this).parents(".tablePayBacKCalc").find(".enterSection").slideDown();
		$("html,body").animate({scrollTop: $('.tablePayBacKCalc').offset().top - 50}, 500);
    $(".calBtnDiv").show();
	});
	/*Payback Calculator:end*/
	
	/*datepicker:start*/
	if($(".datepicker").length){
		$(".datepicker").datepicker({
		   //showOn: both - datepicker will come clicking the input box as well as the calendar icon
		   //showOn: button - datepicker will come only clicking the calendar icon
		   showOn: 'button',
		   //buttonImage: ("images/icon-calender.png"),
		   buttonImage: Drupal.settings.basePath+'sites/all/themes/framework/images/icon-calender.png',
		   buttonImageOnly: true,
		   changeMonth: true,
		   changeYear: true,
		   //showAnim: 'slideDown',
		   duration: 'fast',
		   dateFormat: "dd M yy",
		   buttonText : ''
		});
	}	
	/*datepicker:end*/
	
	/*Category Filter TabView:end*/
	$(".filtertabs a").click(function() {
		var index=$(this).index();
		$('.tabSection .tabcontent').eq(index).show().siblings('.tabSection .tabcontent').hide();
		$(this).addClass("active").siblings().removeClass("active"); 
	}).eq(0).click();
	/*Category Filter TabView:end*/
	
	/*tableView responsiveTable:start*/
	$('.tableView table').responsiveTable({});
	$('.responsiveTable table').responsiveTable({});
	/*tableView responsiveTable:End*/
	
	/*All Product Categories:start*/
	$(".selProductWrapper .productTitle").click(function(){
	  //if (e.target !== this) return;
	  $(this).toggleClass("sel");
	  $(this).find(".downArrow").toggleClass('active');
	  $(this).find(".productCatList").slideToggle();
	  $(".overlayProductCat").fadeToggle();
	});	
	$(".selProductWrapper .productTitle .productCatList").click(function(e) {
        e.stopPropagation();
   	});
	/*All Product Categories:end*/
	
	/*filterSubAppSection:start*/
	$(".filterSubAppSection .downArrow").click(function(){
		$(this).toggleClass('active');
		$(this).prev(".subApps").slideToggle();		
		bestSuitedCarousel();
	});
	/*filterSubAppSection:end*/
	
	/*productCompareSection:start*/
	$(".productCompareSection .compareLink, .productType .compareLink").click(function(){
		//$(this).hide();
		$(".productCompareSection .pickProductCompare").fadeIn();	
		$(".compareOverlay").fadeIn();	
		compareRelProductHeight();
	});
	$(".pickProductCompare .closeBtn").click(function(){
		$(".compareOverlay").fadeOut();
		$(this).parent().fadeOut();
		$(this).parent().find('.productList li').removeClass('active');
	});
	
	$(".pickProductCompare .productList li").click(function(){
		thsIndex = $(this).index()
		$(this).addClass('active').siblings().removeClass('active');
		$(".compareProducts .group .productListContent").eq(thsIndex).fadeIn().siblings(".compareProducts .group .productListContent").hide();
		$(".compareBestSuited .group .productListContent").eq(thsIndex).fadeIn().siblings(".compareBestSuited .group .productListContent").hide();
		//$(".compareProducts .group .productListContent").eq(thsIndex).fadeIn().siblings(".compareProducts .group .productListContent").hide();
		//$(".featuresSection .featuresTabContent .productListContent").eq(thsIndex).fadeIn().siblings(".featuresSection .featuresTabContent .productListContent").hide();
		$(".featuresSection .featuresTabContent").each(function(){
            $(this).find(".productListContent").eq(thsIndex).fadeIn().siblings(".featuresSection .featuresTabContent .productListContent").hide();
        });		
	});
	
	$(".pickProductCompare .formBtn").click(function(){
    	if($(this).parent().find('.productList li').hasClass('active')){
			$(this).parent().fadeOut();
			$(".productCompareSection .viewProductCompare").fadeIn();
			$(".compareOverlay").fadeIn();
			
			var getTopTitle = $(".productLhs h2").clone();
			$(".compareProducts .group .cloneProduct").prepend(getTopTitle);
			
			var getProductImg =$("<div class='productImg'><img alt='' src='"+$(".productSlider li:first").children("img").attr("src")+"'></div>")
			$(".compareProducts .group .cloneProduct").append(getProductImg);
			
			var getProductInfo = $(".productRhs .productInfo").clone();
			$(".compareProducts .group .cloneProduct .productImg").after(getProductInfo);
			
			var getBrandLogo = $(".productLhs .brandLogo").clone();
			$(".compareProducts .group .cloneProduct .productInfo").after(getBrandLogo);
			
			var getBestSuited = $(".productRhs .bestSuited").clone();
			$(".compareBestSuited .group .cloneProduct").append(getBestSuited);
			
			var getFeatures = $(".featuresSection").clone();
			$(".viewProductCompare .compareFeatures").append(getFeatures);
			
			/*table:start*/
			$(".compareFeatures .responsiveTable").each(function() {
            	var tableClmWidth = ($(this).find('table tbody tr td').outerWidth());
				var tableLen = ($(this).find('table tbody tr').length-1) * tableClmWidth;
				$(this).find('.tableData tbody').css({width: tableLen+'px'});    
            });
			
			/*table:end*/
			compareProductHeight();
			bestSuitedCarousel();
		}
		else{
			alert("Please select product");	
		}
	});
	$(".viewProductCompare .closeBtn").click(function(){
		$(".compareOverlay").fadeOut();
		$(this).parent().fadeOut();
		$(".compareProducts .group .cloneProduct, .compareBestSuited .group, .viewProductCompare .compareFeatures").html('');
		$(".pickProductCompare .productList li").removeClass('active');
	});
	$(".viewProductCompare .backArrow").click(function(){
		$(this).parent().fadeOut();
		$(".pickProductCompare").fadeIn();
		$(".compareProducts .group .cloneProduct, .compareBestSuited .group, .viewProductCompare .compareFeatures").html('');
	});
	/*productCompareSection:end*/
	 
	 /** Placeholder alternative for non-supporting browsers **/
	if(navigator.userAgent.match(/MSIE\s(?!10.0)/)) {
		$("input:text").each(function(){
			if($(this).attr("placeholder")){
				$(this).val($(this).attr("placeholder"));
				 
			}
		});
		
		$("input:text").focus(function(){
			if($(this).val()==$(this).attr("placeholder"))
			{
				$(this).val("");
			}
			
		});
		
		$("input:text").blur(function(){
			if($(this).val()=="")
			{
				$(this).val($(this).attr("placeholder"));
			}
		});
	}
/** Placeholder alternative for non-supporting browsers ends **/
		 
     /*Footer JS Start*/
     $(document).on('click', '.quickLinks', function() {		 
         //s$(this).parents('.footerLinks').find('.fixmenu').css('width', $('.container').width());
         $(this).find('a').toggleClass('sel');
         $(this).parents('.footerLinks').find('.fixmenu').slideToggle();
     });
     /*Footer JS End*/

/*Mobile Menu JS Starts*/
     $(document).on('click', '.navIcon', function() {
 		 $('.menuPopup,.overlay').hide();
		 $('.searchLink').removeClass('sel');
		 $('.searchBox').hide().removeClass('blankFld');
         $('.menu').removeClass('mobile')
         $(this).toggleClass('navIconOpen');
		  //$('.menuOverlay, #mainWrapper').css('height', $(window).height());
		 if ($('.menu').css('display') == 'block') {					 
             $('.menuOverlay').css('height', 0);
         } else {
			 $('.menuOverlay').css('height', '100%');
         }
         $('.menu, .menuOverlay').toggle();
         $('.menu').addClass('device')
		 moMenuBoxHgt();
		 $("html,body").animate({scrollTop: $('header').offset().top}, 100);
     });
	 /*Mobile Menu JS End*/
	 /*Mobile searchLink JS Starts*/
     $(document).on('click', '.searchLink', function() {
		 $(this).toggleClass('sel');
		 $('.searchIcon').addClass('active')
         $('.searchBox').slideToggle();	
     });	
	 /*Mobile searchLink JS End*/

	 /*FaqAcordian*/
 	$('.faqWrp h3').click(function() {	 
			$(".faqWrp h3").not(this).removeClass('sel').next().hide();
			$(this).addClass('sel').next().show();
	 }).eq(0).click(); 
 

 /*Site Menu Start*/
 $('.menu > ul > li > a').click(function() {	 	 
        var mybap = $(this).parents('li');
        if ($(window).width() > 767) {
            menuPopup();
			$('section').addClass('contenterOverlay');
        	mybap.find('.menuPopup').slideDown().parents('li').siblings().find('.menuPopup').hide();
			$('#mainWrapper').addClass('ScrollOff');
			   
        }else{ 
			$('.menu.device li > a').removeClass('active');
			mybap.find('.menuPopup').slideToggle().parents('li').siblings().find('.menuPopup').hide();
			//alert($(this).offset().top)
        	$("html,body").animate({scrollTop: $(this).offset().top - 100}, 100); 
		}
	});
   /*Site Menu End*/
		/*AddClass to each with delay*/
		$(".ourTeamRow .cols").each(function(index) {			 
			$(this).delay(400*index).animate({border:0},function(){
				$(this).removeClass('showcase').addClass('showcase');
			});
		});				
		$(".careersWrp .emplist li").each(function(index) {			 			 
			$(this).delay(100*index).animate({border:0},function(){				
  				$(this).removeClass('showcase').addClass('showcase');		
			});
		});
 });
 
 /*FaqAcordian*/
 	/*$('.faqWrp h3').click(function() {
			$(".faqWrp h3").not(this).removeClass('sel').next().hide();
			$(this).addClass('sel').next().show();
	 }).eq(0).click(); */
// });
/*resize functionality:start*/
$(window).resize(function() {
    if (this.resizeTO) clearTimeout(this.resizeTO);
    this.resizeTO = setTimeout(function() {
        $(this).trigger('resizeEnd');
    }, 500);
	
	var field = $(document.activeElement);
	  if (field.is('.hasDatepicker')) {
			field.datepicker('hide');
	  }
});

$(window).bind('resizeEnd', function() {
	if ($(window).width() > 767){  
		siteMap(); 
	}else{ $('.sitemapPge *').removeAttr('style')}	
	if($(window).width()!=lastWidth){
      //execute code
		htmlClass();
		caseStudySectionSlider();
		productSlider();	
		tableResponsive();
		productListSlider();
		gridViewListHgt();
		bestSuitedCarousel();
		maplisting();
		lightboxPosition();
 		menuhover();
		timelineScroll();	
		lbGallarySlider();
		//ourTeam();
		backtoTop();
		ProLoadmore();
		tabAccFunction();
		moMenuBoxHgt();
		containerHeight();
		lastWidth=$(window).width();
		$('.popData .popXBtn').click();
   	}
/*Menu close on Resize*/
	if ($(window).width() > 767){  menuPopup(); }
	if($('.scroll-pain').length){
		$('.scroll-pain').mCustomScrollbar({theme:"dark-3"});
	}
	 
});
/*resize functionality:start*/
 
function postBackFun(){
/*Select code*/
	$(document).on('change', '.selBox select', function () {
        $(this).prev().html($(this).find("option:selected").text());
    });
/*Select code*/	
/*radioList:start*/
	$(".radioList input:radio").click(function (){		
		$(this).parent(".group").siblings(".group").find('span').addClass('uncheked').removeClass('cheked');
		//$(this).prev('span').addClass('cheked').removeClass('uncheked');
		var Check = $(this).is(':checked');
		if(Check){
			$(this).parent('.group').find('span').addClass('cheked').removeClass('uncheked');
		}
	});
	/*radioList:end*/
}

function caseStudySectionSlider(){	
	$('.caseStudySection .group').each(function(){
		var $this=$(this);
		var itemLength = $this.find('.box ul li').length;
		var itemWidth = $this.find('.box').outerWidth();
		var itemWrapWidth = itemWidth*itemLength;

		//$(this).find(".box ul").css({"width":itemWrapWidth});
		$(this).find(".box ul li").css({"width":itemWidth});
		$(this).find(".slideLength .total").html(itemLength);
		$(this).find('.box ul').css({"width":itemWidth*itemLength+"px", "left":"-"+(parseInt($this.find(".slideLength .sel").html())-1)*itemWidth+"px"});
		
		var itemAnimate = 1;
		var columnsVisibleCount = 1;
		var slideNo = 1;

		if($this.attr("rel"))
		{
			slideNoCtr=$this.attr("rel");
		}
		$this.attr("rel",slideNoCtr);

		if($this.attr("rel")==1)
		{
			$(this).find(".prevArrow").addClass('disableArrow');
			$(this).find('.nextArrow').removeClass('disableArrow');
		}
		
				
		//$(this).find(".prevArrow").addClass('disableArrow');
		$(this).find('.nextArrow').click(function(){
			if(columnsVisibleCount<itemLength && !($(this).parents('.group').find('ul').is(':animated')))
			{
				
				$(this).parents('.group').find(".prevArrow").removeClass('disableArrow');
				var left_indent = parseInt($(this).parents('.group').find('ul').css('left')) - $this.find('.box').outerWidth();           
				$(this).parents('.group').find('ul').animate({'left' : left_indent},1000);
				$(this).parents('.group').find('ul li').find('.banner').show();
				columnsVisibleCount+=itemAnimate;
				slideNo+=itemAnimate
				$(this).parents('.group').find(".slideLength .sel").html(slideNo);

				$this.attr("rel",parseInt($this.attr("rel"))+1);
				if(columnsVisibleCount>=itemLength)
				{
					$(this).addClass('disableArrow');
				}
			}
        });
        
        $(this).find('.prevArrow').click(function(){
			if(columnsVisibleCount>1 && !($(this).parents('.group').find('ul').is(':animated')))
			{
				$(this).parents('.group').find(".nextArrow").removeClass('disableArrow');
				var left_indent = parseInt($(this).parents('.group').find('ul').css('left')) + $this.find('.box').outerWidth();
				$(this).parents('.group').find('ul').animate({'left' : left_indent},1000);
			   	columnsVisibleCount-=itemAnimate;          
			   	slideNo-=itemAnimate
				$(this).parents('.group').find(".slideLength .sel").html(slideNo);
				$this.attr("rel",parseInt($this.attr("rel"))-1);
				if(columnsVisibleCount<=itemAnimate)
				{
					$(this).addClass('disableArrow');
				}
			}			
        });
		
		$(this).find('.box ul li').swipe({
			swipe: function(event, direction, distance, duration, fingerCount) {
				if (direction == "left") {$(this).parents('.group').find(".nextArrow").click();
				} else if ((direction == "right")) {
					$(this).parents('.box').find(".prevArrow").click();
				} else {return false;}
			},
			allowPageScroll: "vertical"
		});		
	});	
}


function productSlider(){
	var itemLength = $('.productSection .productSlider ul li').length;
	var itemWidth = $('.productSection .productSlider').width();
	var itemWrapWidth = itemWidth*itemLength;	
	$(".productSection .productSlider ul").css({"width":itemWrapWidth});
	$(".productSection .productSlider ul li").css({"width":itemWidth});
	var itemAnimate = 1;
	var columnsVisibleCount = 1;
	var slideNo = 1;
	
	$(".productSection .productLhs .slideLength .total").html(itemLength);
	$(".productSection .productLhs .slideLength .sel").html(slideNo);
	
	if(itemLength>1){
		$(".productSection .productLhs .actionDiv").show();
	}
	else{
		$(".productSection .productLhs .actionDiv").hide();
	}
	
	
	$('.productSection .productSlider ul li').eq(slideCtr).addClass('active').siblings("li").removeClass("active")
	
	if(slideCtr>0)
	{
		$('.productSection .productSlider ul').animate({"left":-($('.productSection .productSlider ul li.active').index()*itemWidth)},200);
	}
	else
	{
		$(".productSection .productLhs .prevArrow").addClass('disableArrow');
	}
	
	//$(".productSection .productLhs .prevArrow").addClass('disableArrow');
	$('.productSection .productLhs .nextArrow').click(function(){
		if(columnsVisibleCount<itemLength && !($('.productSection .productSlider ul').is(':animated')))
		{
			$(".productSection .productLhs .prevArrow").removeClass('disableArrow');
			var left_indent = parseInt($('.productSection .productSlider ul').css('left')) - $('.productSection .productSlider').width(); 
			$('.productSection .productSlider ul').animate({'left' : left_indent},500);
			slideCtr++;
			$('.productSection .productSlider ul li').eq(slideCtr).addClass('active').siblings("li").removeClass("active");
			columnsVisibleCount+=itemAnimate;
			slideNo+=itemAnimate;
			$(".productSection .productLhs .slideLength .sel").html(slideNo)
			if(columnsVisibleCount>=itemLength)
			{
				$(this).addClass('disableArrow');
			}
		}
	});
	        
	$('.productSection .productLhs .prevArrow').click(function(){
		if(columnsVisibleCount>1 && !($('.productSection .productSlider ul').is(':animated')))
		{
			$(".productSection .productLhs .nextArrow").removeClass('disableArrow');
			var left_indent = parseInt($('.productSection .productSlider ul').css('left')) + $('.productSection .productSlider').width();
			$('.productSection .productSlider ul').animate({'left' : left_indent},500);
			slideCtr--;
			$('.productSection .productSlider ul li').eq(slideCtr).addClass('active').siblings("li").removeClass("active");
			columnsVisibleCount-=itemAnimate;          
		   slideNo-=itemAnimate
			$(".productSection .productLhs .slideLength .sel").html(slideNo)
		   if(columnsVisibleCount<=itemAnimate)
			{
				$(this).addClass('disableArrow');
			}
		}			
	});	
		
	$(".productLhs .productSlider ul li").swipe({		
		swipe: function(event, direction, distance, duration, fingerCount) {
			if (direction == "left") {$(".productSection .productLhs .nextArrow").click();
			} else if ((direction == "right")) {
				$(".productSection .productLhs .prevArrow").click();
			} else {return false;}
		},
		allowPageScroll: "vertical"
	});
}

function tabAccFunction(){			
	var windowWidth = $(window).width();
	if( windowWidth < 768){
		//alert("mobile");
		$(".featuresSection h3").removeClass('active');
		$(".featuresSection .featuresTabContent").hide();		

		$(".featuresSection h3").click(function(){
			var _this = $(this);
			$(this).addClass('active').siblings().removeClass('active');
			$(this).next(".featuresSection .featuresTabContent").slideDown(function(){
				var focusClick = $(_this).offset().top;
					$('html, body').animate({
							scrollTop:focusClick
					},500);			
			}).siblings(".featuresSection .featuresTabContent").slideUp();
			/*$(this).next(".featuresSection .featuresTabContent").slideDown().siblings(".featuresSection .featuresTabContent").slideUp();
			setTimeout(function(){
					var focusClick = $(_this).offset().top;
					$('html, body').animate({
							scrollTop:focusClick
					},500);					
			},800);*/
		});	
	}
	else{
		//alert("desktop");
		var tabLen = $(".featuresSection .featuresTab li").length;
		$(".featuresSection .featuresTab li").css("width",100/tabLen + "%");
		$(".featuresSection .featuresTab li").eq(0).addClass('active');
		$(".featuresSection .featuresTabContent").eq(0).show();
		$(document).on('click','.featuresSection .featuresTab li',function(){
			thsIndex = $(this).index();
			//alert(thsIndex);
			$(this).addClass('active').siblings().removeClass('active')
			$(".featuresSection .featuresTabContent").eq(thsIndex).fadeIn().siblings(".featuresSection .featuresTabContent").hide();
			if($(this).parents(".compareFeatures").length>0)
			{	
				compareFeaturesHeight(thsIndex);
			}
		}).eq(0).click();
		$(document).find(".featuresSection .featuresTab li").eq(0).click();		
	}
}
function tableResponsive(){
	$('.responsiveTable').each(function(){
		var tableClmWidth = ($(this).find('table tbody tr td').outerWidth())/* + $(this).find('table tbody tr:first-child th').length +1*/;
		var tableLen = ($(this).find('table tbody tr').length-1) * tableClmWidth;
		if($(window).width() < 768){			
			$(this).find('.tableData tbody').css({width: tableLen+'px'});		
		}
		else{
			$(this).find('.tableData tbody').css({width:'100%'});
		}
	});
}

/*//responsiveTable Start//*/
 function responsiveTable(){
	 /*Below Function is for responsive Table which will float one after one in below 480px device == Sunit*/
	$.fn.responsiveTable = function(options) {
		_this = this,
		responsiveTable = {
			dataContent: '',
			init: function(){
				responsiveTable.findTable();
		},
		findTable: function(){
			var that = this;
			_this.find('tr').each(function(){
				$(this).find('td').each(function(i, v){
					that.checkTableHead( $(this), i );
					$(this).addClass('tdno' + i);
				});
			});
		},
		checkTableHead: function(element, index){
			if( _this.find('th').length ){
				this.dataContent = _this.find('th')[index].textContent;
			}else{
				this.dataContent = _this.find('tr:first td')[index].textContent;
			}
			element.attr('data-content', this.dataContent);
		}
	};

	$(function(){
		responsiveTable.init();
	});
		return this;
	};
}
/*//responsiveTable End//*/

function gridViewListHgt(){
	/*Code is for li Hight on product-category Page*/	 
	if ($(window).width() > 599) {
		var maxHig = 0;
		$(".gridView li").each(function() {
 			maxHig = $(this).outerHeight() > maxHig ? $(this).outerHeight() : maxHig;
		}); 		 
 		$(".gridView li").css('height',maxHig);
	}else{$(".gridView li").css('height','auto');}	
	/*Code is for li Hight on product-category Page*/
}

var productListPageCtr=1;
function productListSlider() 
{
		//if($(".productListSlider .productListWrap .group").length<=4)
		var productListSliderItem=[];
		var groupVisibleCounter=0;
		$(".productListSlider .productListWrap .group").each(function(){
			productListSliderItem.push($(this).outerHeight(true));
			if($(this).is(":visible")==true)
			{
				groupVisibleCounter++;
			}
		});
		//console.log(groupVisibleCounter);
		productListSliderItem.sort();
		$(".productListSlider .productListWrap .group").css("height",productListSliderItem[productListSliderItem.length-1])
		
		var productsLen=$(".productListSlider .productListWrap .group").length;
		$(".productListSlider .slideLength .total").text(Math.ceil(productsLen/8));

		if($(window).width()>1024)
		{
			if(groupVisibleCounter>4)
			{
				$(".productListSlider .productListWrap").css("height",productListSliderItem[productListSliderItem.length-1]*2);
				$('.productListSlider .actionDiv').show();
				$('.productListSlider .prevArrow').addClass("disableArrow");
			}
			else
			{
				$(".productListSlider .productListWrap").css("height",productListSliderItem[productListSliderItem.length-1]);
				$('.productListSlider .actionDiv').hide();
			}
		}
		else
		{
			if(productsLen>4)
			{
				$(".productListSlider .productListWrap").css("height",productListSliderItem[productListSliderItem.length-1]*2);
			}

			if($(".loadMoreContainer").css("display")=="none")
			{
				$(".loadMoreContainer .loadmoreBtn").trigger("click");
			}

		}



		$(".loadMoreContainer .loadmoreBtn").click(function(){
			if(parseInt($(".productListSlider .productListWrap").css("height"))<$(".productListSlider .productListWrap .productList").outerHeight())
			{
				$(this).parents(".loadMoreContainer").hide();
				$(".productListSlider .productListWrap").css({"height":"auto"});
			}
		});

		$('.productListSlider .nextArrow').click(function(){
			if(!$(".productListSlider .productListWrap .productList").is(":animated"))
			{
				if(parseInt($(".productListSlider .slideLength .sel").text())<parseInt($(".productListSlider .slideLength .total").text()))
				{
					$(this).parents('.productListSlider').find('.prevArrow').removeClass('disableArrow');
					$(".productListSlider .productListWrap .productList").animate({"margin-top":"-="+parseInt($(".productListSlider .productListWrap").css("height"))+"px"});
					$(".productListSlider .slideLength .sel").text(parseInt($(".productListSlider .slideLength .sel").text())+1);
					
					if($(".productListSlider .slideLength .sel").text()==$(".productListSlider .slideLength .total").text())
					{
						$(this).addClass("disableArrow");
						//$('.productListSlider .prevArrow').removeClass("disableArrow");
					}
				}
				
			}
        });

        $('.productListSlider .prevArrow').click(function(){
			if(!$(".productListSlider .productListWrap .productList").is(":animated"))
			{
				if(parseInt($(".productListSlider .slideLength .sel").text())>productListPageCtr)
				{
					$(this).parents('.productListSlider').find('.nextArrow').removeClass('disableArrow');
					$(".productListSlider .productListWrap .productList").animate({"margin-top":"+="+parseInt($(".productListSlider .productListWrap").css("height"))+"px"});
					$(".productListSlider .slideLength .sel").text(parseInt($(".productListSlider .slideLength .sel").text())-1);
					if($(".productListSlider .slideLength .sel").text()==productListPageCtr)
					{
						$(this).addClass("disableArrow");
						//$('.productListSlider .nextArrow').removeClass("disableArrow");
					}
				}
				
			}
        });

}

var itemAnimate = 4;
var itemVisibleCount = 4;
var slideNo = 4;
var itemWrapWid=0;
var slideNoCtr=1;

function bestSuitedCarousel(){
	$('.bestSuitedCarousel').each(function(){
			var $this=$(this);
			
			if($this.attr("rel"))
			{
				slideNoCtr=$this.attr("rel");
			}
			$this.attr("rel",slideNoCtr);
			itemWrapWid = $this.outerWidth();
			
			$(this).find('ul li').css({"width":itemWrapWid/4});
			var itemLen = $(this).find('ul li').length;
			var itemWid = $(this).find('ul li').outerWidth()+1;
			
			$(this).find(".slideLength .sel").html($this.attr("rel"));
			$(this).find(".slideLength .total").html(Math.ceil(itemLen/itemVisibleCount));
			$(this).find('ul').css({"width":itemWid*itemLen+"px", "left":"-"+(parseInt($this.find(".slideLength .sel").html())-1)*itemWrapWid+"px"});
			
			if(itemLen>4){
				$(this).find(".actionDiv").show();
			}
			else{
				$(this).find(".actionDiv").hide();
			}
			
			if($this.attr("rel")==1)
			{
				$(this).find(".prevArrow").addClass('disableArrow');
				$(this).find('.nextArrow').removeClass('disableArrow');
			}
			
			$(this).find('.nextArrow').click(function(){
				if((parseInt($this.find(".slideLength .sel").html())<parseInt($this.find(".slideLength .total").html())) && !($this.find('ul').is(':animated')))
				{
					$(this).parents('.bestSuitedCarousel').find('.prevArrow').removeClass('disableArrow').attr("rel","");
					var leftPos = parseInt($(this).parents('.bestSuitedCarousel').find('ul').css('left')) - $this.outerWidth();
					$(this).parents('.bestSuitedCarousel').find('ul').animate({'left' : leftPos},1000);
					$(this).parents('.bestSuitedCarousel').find(".slideLength .sel").html(parseInt($this.attr("rel"))+1);
					$this.attr("rel",parseInt($this.attr("rel"))+1);
					if(parseInt($this.find(".slideLength .sel").html())==parseInt($this.find(".slideLength .total").html()))
					{
						$(this).addClass('disableArrow');
					}						
				}
			});
			
			$(this).find('.prevArrow').click(function(){
				if((parseInt($this.find(".slideLength .sel").html())>1) && !($this.find('ul').is(':animated')))
					{
						$(this).parents('.bestSuitedCarousel').find('.nextArrow').removeClass('disableArrow');
						var leftPos = parseInt($(this).parents('.bestSuitedCarousel').find('ul').css('left')) + $this.outerWidth();
						$(this).parents('.bestSuitedCarousel').find('ul').animate({'left' : leftPos},1000);
					  	$(this).parents('.bestSuitedCarousel').find(".slideLength .sel").html(parseInt($this.attr("rel"))-1);
					  	$this.attr("rel",parseInt($this.attr("rel"))-1);
					   	if(parseInt($this.find(".slideLength .sel").html())==1)
						{
							$(this).addClass('disableArrow');
						}
					}			
			});
			
			$(this).find("ul").swipe({		
			swipe: function(event, direction, distance, duration, fingerCount) {
				if (direction == "left") {$(".bestSuitedCarousel .nextArrow").click();
				} else if ((direction == "right")) {
					$(".bestSuitedCarousel .prevArrow").click();
				} else {return false;}
			},
			allowPageScroll: "vertical"
		});
			
	});
}

function maplisting() {
	if( $(window).width() < 768){

	$('.mapLocate').click(function() {
		$(this).parents('.addressList').hide();
			$('.addressMap').show();
	});
	$('.mapList').click(function() {
		$(this).parents('.addressMap').hide();
			$('.addressList').show();
	});
	}else{
		$('.addressMap, .addressList').show();
		}
}
function htmlClass() {
    if ($(window).width() < 979) {
        $('html').addClass('mobile').removeClass('desktop');
    } else {
        $('html').addClass('desktop').removeClass('mobile');
    }
}

function lightboxPosition() {
	var lightboxWth = $('.container').width();    	
    $('.lightboxWrp').css({top: $('header').outerHeight(),width: lightboxWth});
}

function menuPopup() {
	// alert( $('header').outerHeight())

	var menuPopup = $('.container').width();
	$('.menuPopup').css({top: $('header').height() + 10, width: menuPopup, height:480});

     
}
function menuhover() {
  //  $('.menu li.subMenu > a').removeClass('active');
    if ($(window).width() > 767) {
        $(".menu > ul > li").each(function() {
            if ($(this).find(".menuPopup").length == 1) {
                $(this).addClass("subMenu")
            }
        });
		
        $(".subMenu .menuPopup .navTabLink li").click(function() {
            $('.menuSection .menutabWrp').hide();
            var index = $(this).index();
            $('.menuSection .menutabWrp').eq(index).show()
            $(this).addClass("sel").siblings().removeClass("sel");
        }).eq(0).click();
		 
        $('.subMenu .submenuBox li a').hover(function() {
			ind = $(this).parent().index();
			/*var haveContent = $(this).parents('.menuSection').find('.rgtMenuBox>ul>li .hoverList .mCSB_container').children().eq(ind).text();		 
			if(haveContent.length > 0){
				$(this).removeClass('haveData').addClass('haveData')
			
			if($(this).hasClass('haveData')){ */
            $(this).parents('.menuSection').find('.rgtMenuBox').show();
            $('.subMenu .submenuBox li').removeClass('active');
            $('.rgtMenuBox li').removeClass('onHover');
            $(this).parents('.menuSection').find('.rgtMenuBox>ul>li').eq(ind).removeClass('onHover').addClass('onHover');
            $(this).parent().addClass('active');
			/*}
			else{ return false}
			}else{
				$(this).removeClass('haveData')
				}*/
        });
    } else {	 
        $('.rgtMenuBox li').removeClass('onHover');
    }
	/*Menu List mCustomScrollbar*/
    if ($('.subMenu .rgtMenuBox .hoverList').length) {
        $('.subMenu .rgtMenuBox .hoverList').mCustomScrollbar({
            theme: "hoverListScroll",
            scrollbarPosition: "inside"

        });
    }
    if ($('.subMenu .submenuBox').length) {
        $('.subMenu .submenuBox').mCustomScrollbar({
            theme: "subMenuScroll",
            scrollbarPosition: "inside"

        });
    }
}

/*openLightbox:start*/
function openLightbox(lightboxName)
{	
	$('.overlay').fadeIn();
	$("." + lightboxName).fadeIn()
}

function scrollTopLightBox(){	
	var lightBoxTopFocus = $('.lightbox').offset().top - 50;
		$('html, body').animate({
				scrollTop:lightBoxTopFocus
		},300);	
}
/*openLightbox:end*/

/*ourTeam:start*/
function ourTeam(){	
		$('.ourTeamRow .popData').remove();
		$('.ourTeamRow .cols').removeClass("active");
		$(".ourTeamRow .cols").wrap("<div class='prvItemMaster' data-added='wrapped from common js'/>");
		$(document).on('click', '.ourTeamRow .cols', function() {			 
			    $('.ourTeamRow .popData').remove();
			   	$('.ourTeamRow .cols').removeClass("active");
				var $itemSelector = $(this).parents(".ourTeamRow").find(".prvItemMaster");
				var $this = $(this).parents(".prvItemMaster");
				$this.removeClass("inactive").addClass("active").siblings().removeClass("active").addClass("inactive");
				$(this).addClass("active").siblings()
				$(".popData:visible").remove();
				var thisInd = $(this).parents(".prvItemMaster").index();
				if($(window).width() >= 768){
					// For 3 Items
					var insertIndex = ((Math.floor(thisInd / 3) + 1)*3)-1;  
				}else if($(window).width() > 480){
					// For 2 Items
					var insertIndex = ((Math.floor(thisInd / 2) + 1)*2)-1;	
				}else if($(window).width() <= 480){
					// For 1 Item	
					var insertIndex = ((Math.floor(thisInd / 1) + 1)*1)-1;  
				}
				if(insertIndex >= $itemSelector.length){
					var me = $itemSelector.last();
				}else{
					var me = $itemSelector.eq(insertIndex);
				}			 
			$(this).parents(".prvItemMaster").find(".popUp").clone().insertAfter(me).wrap("<div class='popData' />");
			$('html, body').animate({scrollTop:$(this).offset().top}, 100);			
		});
		$(document).on('click', '.popData .popXBtn', function() {
			$('.ourTeamRow .cols').removeClass('active');
			 $(this).parents(".prvCarousel").find(".prvItemMaster").removeClass("inactive").removeClass("active");
			 $(this).parents('.popData').remove();
		});
	
}
/*ourTeam:End*/

/*lbGallarySlider:start*/
var imgWidth, imgHeight;
//var slideCtr=0;
var itemAnimate = 1;
var columnsVisibleCount = 1;
var slideNo = 1;
function lbGallarySlider(param){
	var columnsVisibleCount = 1;
	var slideCtr=1; 
	if($(param).parents(".sliderHidden").attr("rel"))
	{
		//slideCtr=$(param).parents(".sliderHidden").attr("rel");
	}

	$(param).parents(".sliderHidden").attr("rel",slideCtr);
	/*if($(".lightbox .gallerySection .sliderHidden ul").attr("rel"))
	{
		slideCtr=$(".lightbox .gallerySection .sliderHidden ul").attr("rel");
	}*/
	var itemLength = $('.lightbox .gallerySection .sliderHidden ul li').length;
	var itemWidth = $('.lightbox .gallerySection .sliderHidden').width();
	var itemWrapWidth = itemWidth*itemLength;
	//console.log($(param).parents(".sliderHidden").attr("rel"));
	$(".lightbox .gallerySection .sliderHidden ul").css({"width":itemWrapWidth, "left":"-"+(parseInt($(param).parents(".sliderHidden").attr("rel"))-1)*itemWidth+"px"});
	$(".lightbox .gallerySection .sliderHidden ul li").css({"width":itemWidth});
	
	$(".lightbox .gallerySection .slideLength .total").html(itemLength);
	$(".lightbox .gallerySection .slideLength .sel").html(parseInt($(param).parents(".sliderHidden").attr("rel")));
	 
	if(itemLength>1){
		$(".lightbox .gallerySection .actionDiv").show();
	}
	else{
		$(".lightbox .gallerySection .actionDiv").hide();
	}
	  
	$('.lightbox .gallerySection .sliderHidden ul li').eq(slideCtr-1).addClass('active').siblings("li").removeClass("active");
	
	if(slideCtr>1)
	{
		 
		$('.lightbox .gallerySection .sliderHidden ul').animate({"left":-($('.lightbox .gallerySection .sliderHidden ul li.active').index()*itemWidth)},200);
	}
	else
	{
		 
		$(".lightbox .gallerySection .prevArrow").addClass('disableArrow');
	}
	
	/*****/
	//console.log($(window).width() + "------" + $(window).height());
	if(screen.width<600 || screen.height<600)
	{
		//console.log($(".lightbox .gallerySection .sliderHidden ul li.active").width());
		$(".lightbox .gallerySection .sliderHidden ul li.active img").css("width","100%");
		$(".lightbox .gallerySection .sliderHidden ul li").css("height",$(".lightbox .gallerySection .sliderHidden ul li.active img").height());
	}
	else
	{
		/*imgWidth=$(".lightbox .gallerySection .sliderHidden ul li.active img").width();
		imgHeight=$(".lightbox .gallerySection .sliderHidden ul li.active img").height();
		
		if(imgWidth>952 || imgHeight>400)
		{
			$(".lightbox .gallerySection .sliderHidden ul li.active img").css("height","400px");
		}*/

		/*** setting the height of the lightbox basis on the height of the image which should be lesser than or equal to available screen height ***/
		if($('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')<=screen.availHeight)
		{
			$('.lightbox .gallerySection .sliderHidden ul li.active img').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-300+"px");
			$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('ul').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-300);
			$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('.lightbox').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-180);
		}
		else
		{
			$('.lightbox .gallerySection .sliderHidden ul li.active img').css("height",screen.availHeight-300);
			$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('ul').css("height",screen.availHeight-300);
			$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('.lightbox').css("height",screen.availHeight-180);
		}
		/*** setting the height of the lightbox basis on the height of the image which should be lesser than or equal to available screen height ***/
	}
	/****/
	
	//$(".lightbox .gallerySection .prevArrow").addClass('disableArrow');
	$('.lightbox .gallerySection .nextArrow').click(function(){
		if(columnsVisibleCount<itemLength && !($('.lightbox .gallerySection .sliderHidden ul').is(':animated')))
		{
			$(".lightbox .gallerySection .prevArrow").removeClass('disableArrow');
			var left_indent = parseInt($('.lightbox .gallerySection .sliderHidden ul').css('left')) - $('.lightbox .gallerySection .sliderHidden').width(); 
			$('.lightbox .gallerySection .sliderHidden ul').animate({'left' : left_indent},500);
			slideCtr++;
			$('.lightbox .gallerySection .sliderHidden ul li.active').next("li").addClass('active').siblings("li").removeClass("active");
			columnsVisibleCount+=itemAnimate;
			
			slideNo+=itemAnimate;
			$(".lightbox .gallerySection .slideLength .sel").html(parseInt($(param).parents(".sliderHidden").attr("rel"))+1);
			//$(".lightbox .gallerySection .sliderHidden ul").attr("rel",parseInt($(".lightbox .gallerySection .sliderHidden ul").attr("rel"))+1);
			$(param).parents(".sliderHidden").attr("rel",parseInt($(param).parents(".sliderHidden").attr("rel"))+1);
			
			/************styling for image*****************/
			//console.log($(window).width() + "------" + $(window).height());
			if(screen.width<600 || screen.height<600)
			{
				$(".lightbox .gallerySection .sliderHidden ul li.active img").css("width","100%");
				//$(".lightbox .gallerySection .sliderHidden ul").css("height",$(".lightbox .gallerySection .sliderHidden ul li.active img").height());
				$(".lightbox .gallerySection .sliderHidden ul li").css("height",$(".lightbox .gallerySection .sliderHidden ul li.active img").height());
			}
			else
			{
				/*imgWidth=$(".lightbox .gallerySection .sliderHidden ul li.active img").width();
				imgHeight=$(".lightbox .gallerySection .sliderHidden ul li.active img").height();
				
				if(imgWidth>952 || imgHeight>400)
				{
					$(".lightbox .gallerySection .sliderHidden ul li.active img").css("height","400px");
				}*/
				/*** setting the height of the lightbox basis on the height of the image which should be lesser than or equal to available screen height ***/
				if($('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')<=screen.availHeight)
				{
					$('.lightbox .gallerySection .sliderHidden ul li.active img').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-300+"px");
					$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('ul').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-300);
					$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('.lightbox').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-180);
				}
				else
				{
					$('.lightbox .gallerySection .sliderHidden ul li.active img').css("height",screen.availHeight-300);
					$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('ul').css("height",screen.availHeight-300);
					$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('.lightbox').css("height",screen.availHeight-180);
				}
				/*** setting the height of the lightbox basis on the height of the image which should be lesser than or equal to available screen height ***/
			}
			/*****************************/
			
			if(columnsVisibleCount>=itemLength)
			{
				$(this).addClass('disableArrow');
			}
			
		}
	});
	        
	$('.lightbox .gallerySection .prevArrow').click(function(){
		if(columnsVisibleCount>1 && !($('.lightbox .gallerySection .sliderHidden ul').is(':animated')))
		{
			$(".lightbox .gallerySection .nextArrow").removeClass('disableArrow');
			var left_indent = parseInt($('.lightbox .gallerySection .sliderHidden ul').css('left')) + $('.lightbox .gallerySection .sliderHidden').width();
			$('.lightbox .gallerySection .sliderHidden ul').animate({'left' : left_indent},500);
			slideCtr--;
			$('.lightbox .gallerySection .sliderHidden ul li.active').prev("li").addClass('active').siblings("li").removeClass("active");
			columnsVisibleCount-=itemAnimate;          
		   	slideNo-=itemAnimate
			$(".lightbox .gallerySection .slideLength .sel").html(parseInt($(param).parents(".sliderHidden").attr("rel"))-1);
			//$(".lightbox .gallerySection .sliderHidden ul").attr("rel",parseInt($(".lightbox .gallerySection .sliderHidden ul").attr("rel"))-1);

			$(param).parents(".sliderHidden").attr("rel",parseInt($(param).parents(".sliderHidden").attr("rel"))-1);
			/************styling for image*****************/
			if(screen.width<600 || screen.height<600)
			{
				$(".lightbox .gallerySection .sliderHidden ul li.active img").css("width","100%");
				//$(".lightbox .gallerySection .sliderHidden ul").css("height",$(".lightbox .gallerySection .sliderHidden ul li.active img").height());
				$(".lightbox .gallerySection .sliderHidden ul li").css("height",$(".lightbox .gallerySection .sliderHidden ul li.active img").height());
			}
			else
			{
				/*imgWidth=$(".lightbox .gallerySection .sliderHidden ul li.active img").width();
				imgHeight=$(".lightbox .gallerySection .sliderHidden ul li.active img").height();
				
				if(imgWidth>952 || imgHeight>400)
				{
					$(".lightbox .gallerySection .sliderHidden ul li.active img").css("height","400px");
				}*/
				/*** setting the height of the lightbox basis on the height of the image which should be lesser than or equal to available screen height ***/
				if($('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')<=screen.availHeight)
				{
					$('.lightbox .gallerySection .sliderHidden ul li.active img').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-300+"px");
					$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('ul').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-300);
					$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('.lightbox').css("height",$('.lightbox .gallerySection .sliderHidden ul li.active img').prop('naturalHeight')-180);
				}
				else
				{
					$('.lightbox .gallerySection .sliderHidden ul li.active img').css("height",screen.availHeight-300);
					$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('ul').css("height",screen.availHeight-300);
					$('.lightbox .gallerySection .sliderHidden ul li.active img').parents('.lightbox').css("height",screen.availHeight-180);
				}
				/*** setting the height of the lightbox basis on the height of the image which should be lesser than or equal to available screen height ***/
			}
			/*****************************/
		   if(columnsVisibleCount<=itemAnimate)
			{
				$(this).addClass('disableArrow');
			}
		}			
	});
		
		$(".lightbox .gallerySection .sliderHidden ul li").swipe({		
			swipe: function(event, direction, distance, duration, fingerCount) {
				if (direction == "left") {$(".lightbox .gallerySection .nextArrow").click();
				} else if ((direction == "right")) {
					$(".lightbox .gallerySection .prevArrow").click();
				} else {return false;}
			},
			allowPageScroll: "vertical"
		});
	}
/*lbGallarySlider:end*/

function stepSectionFocus(){
	$("html,body").animate({scrollTop: $('.appStepSection').offset().top - 5}, 500);
	}
/*timelineSection:start*/
function timelineScroll(){
	var calculationVal = 180
	
	if($(window).width() < 768){
		var itemWidth = $(".timelineSection ul li").width();		
	}
	else{
		var itemWidth = $(".timelineSection ul li").width()-calculationVal;
	}
	var itemLen = $(".timelineSection ul li").length;
	$(".timelineSection ul").width(itemWidth*itemLen);
	
	timeSecWidth = $(".timelineSection").width();
	contWidth = $(".container").width();
	finalLeft = timeSecWidth - contWidth;
	$(".timelineSection ul").css("margin-left",finalLeft/2+calculationVal);
}
/*timelineSection:end*/

/*backtoTop:start*/
function backtoTop(){
	if($(window).width() > 1024){
		$('.backtoTop').show();
	/*backtoTop Start*/
		var offset = $(window).height(),
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.backtoTop');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('backtoTop-visible') : $back_to_top.removeClass('backtoTop-visible backtoTop-fade-out');
		if( $(this).scrollTop() > offset_opacity ) {$back_to_top.addClass('backtoTop-fade-out');}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({scrollTop: 0,}, scroll_top_duration);
	});
	/*backtoTop Start*/
	}else{ $('.backtoTop').hide();}
	}
/*backtoTop:end*/
/* siteMap Page Start*/
function siteMap(){
/*site-map-box-terms:start*/	
	//$(".sitemapPge .site-map-box-terms").css({'visibility':'hidden'}); 
	var innerBoxLeftPosEven=0;
	var innerBoxLeftPosOdd= $(".sitemapPge").width()/2;
	var innerBoxTopPosEven=0;
	var innerBoxTopPosOdd=0;
	var innerBoxEvenIndex, innerBoxOddIndex;

	
	$(".sitemapPge .site-map-box-terms").each(function(){		 		
		if($(this).index()%2)
		{
			innerBoxTopPosEven+=10;
			$(this).css({"left":innerBoxLeftPosOdd+"px","top":innerBoxTopPosEven+"px"});			
			if($(this).index()!=0)
			{
				innerBoxEvenIndex=$(this).index();
				innerBoxTopPosEven+=$(".sitemapPge .site-map-box-terms").eq(innerBoxEvenIndex).height()+10;				
			}			
		}
		else
		{
			innerBoxTopPosOdd+=10;
			$(this).css({"left":innerBoxLeftPosEven+"px","top":innerBoxTopPosOdd+"px"});
			if($(this).index()!=1)
			{	$(this).css({"width":innerBoxLeftPosOdd-10+"px"});
				innerBoxOddIndex=$(this).index();
				innerBoxTopPosOdd+=$(".sitemapPge .site-map-box-terms").eq(innerBoxOddIndex).height()+10;
			}			
		}
	}).promise().done(function(){ 
		innerBoxTopPosEven<innerBoxTopPosOdd ? $(".doubleWrap").css("height",innerBoxTopPosOdd+"px") : $(".doubleWrap").css("height",innerBoxTopPosEven+"px");		 		$(".sitemapPge .site-map-box-terms").show();
	});
 
}
/* siteMap Page End*/

/*product category LoadMore Start*/
function ProLoadmore(){
	
	$('.gridView > ul.gridRow').eq(0).show();
	$('.gridView > ul.gridRow').hide();
	var counter = 1
	var gridRow = $('.gridView > ul.gridRow').length;	
	var datashowval = 1;	
	$(".productCategory .loadmoreBtn").click(function(){
		 for(i=((counter-1)*datashowval);i<(counter*datashowval);i++){
			// alert((counter-1)*datashowval)
			 var minus = ($('.gridView > ul.gridRow').eq(i+1).length)
			 //alert(minus)
			 if(minus==0){ $(".productCategory .loadmoreBtn").hide();} 
			 $('.gridView > ul.gridRow').eq(i).show();
		 }
		 counter++;
	}).eq(0).click();
	$('.gridView > ul.gridRow').eq(0).show();
}
/*product category LoadMore End*/

/*Installation Gallery LoadMore Start*/
function InsgallLoadmore(){
	
	$('.gallerySection .groupRow').eq(0).show();
	$('.gallerySection .groupRow').hide();
	var counter = 1
	var groupRow = $('.gallerySection .groupRow').length;	
	var datashowval = 1;	
	$(".gallerySection .loadmoreBtn").click(function(){
		 for(i=((counter-1)*datashowval);i<(counter*datashowval);i++){
			// alert((counter-1)*datashowval)
			 var minus = ($('.gallerySection .groupRow').eq(i+1).length)
			 //alert(minus)
			 if(minus==0){ $(".gallerySection .loadmoreBtn").hide();} 
			 $('.gallerySection .groupRow').eq(i).show();
		 }
		 counter++;
	}).eq(0).click();
	$('.gallerySection .groupRow').eq(0).show();
}
/*Installation Gallery LoadMore End*/

/*Mobile Menu Box height : Start */ 
function moMenuBoxHgt() {
	 if($('.menuOverlay').is(':visible')){
		$('body').addClass('menuAdded')
		$('.menuBox').addClass('scrollAdded').css({'height': $(window).height() - 20,'width': $(window).width()})
	 } else{
 		  $('body').removeClass('menuAdded')
  		  $('.menuBox').removeClass('scrollAdded').css({'height': 'auto','width': 'auto'})
		}
   
  
}
/*Mobile Menu Box height : End */ 

/*container height:start*/
function containerHeight(){
		var winHeight = $(window).outerHeight();
		var headerHeight = $("header").outerHeight();
		var footerHeight = $(".fixmenu").outerHeight();
		//console.log(winHeight + "---" + headerHeight + "---" + footerHeight);
		$("section").css({'min-height':(winHeight - headerHeight - footerHeight)});	
}
/*container height:end*/

/*compareProductHeight:start*/
function compareProductHeight(){
	var highestBox = 0;
        $('.compareProducts .group').each(function(){  
                if($(this).height() > highestBox){  
                highestBox = $(this).height();  
        }
    });    
    $('.compareProducts .group').height(highestBox);	
}
/*compareProductHeight:end*/

/*compareFeaturesHeight:start*/
function compareFeaturesHeight(paramIndex){
	var highestBox = 0;
	$('.compareFeatures .featuresSection .featuresTabContent').eq(paramIndex).find('.groupParent').each(function(){
		if($(this).height() > highestBox){  
        	highestBox = $(this).height();
		}
	});
          
    $('.compareFeatures .featuresSection .featuresTabContent').eq(paramIndex).find('.groupParent').height(highestBox);
	
	/*$('.compareFeatures .featuresSection .featuresTabContent').each(function() {
        var maxHeight = 0;
        $(this).find(".groupParent").each(function() {
            if($(this).height() > maxHeight) 
                maxHeight = $(this).height();
        });
        $(this).find(".groupParent").height(maxHeight);
    });*/
}
/*compareFeaturesHeight:end*/

/*compareProductHeight:start*/
function compareRelProductHeight(){
	var highestBox = 0;
        $('.pickProductCompare .productList li .relProduct').each(function(){  
                if($(this).height() > highestBox){  
                highestBox = $(this).height();  
        }
    });    
    $('.pickProductCompare .productList li .relProduct').height(highestBox);
}
/*compareProductHeight:end*/

/*TimelineEffect:start*/
var i=0;
function timeline(paramIndex) {	
	//$('.timelineSection').css('visibility','hidden');
	var timelineDiv = $(".timelineSection ul li").length;
	for(i=paramIndex;i<timelineDiv;i++)
	{
		var winWidth = $(window).width();
		var offsetVal = $(".timelineSection ul li").eq(i).offset().left;
		if ((winWidth-offsetVal) > 0) {
			$(".timelineSection ul li").eq(i).delay((i-paramIndex)*400).animate({border:0},function(){
				$(this).addClass('animet');
			}); 
		}
		else
		{
			paramIndex=$(".timelineSection").find(".animet:last").index();
			return false;
		}
		function checkVersion() {
        var ver = getIEVersion();
        if (ver != -1) { 
            if (ver <= 9.0) {
				$('.timelineSection').removeClass('timeEffect')					
				$('.timelineSection').css('visibility','visible'); 
               }else{				 
			   $('.timelineSection').addClass('timeEffect');
			   $('.timelineSection').css('visibility','visible');
			   }
        }else{				 
			   $('.timelineSection').addClass('timeEffect');
			   $('.timelineSection').css('visibility','visible');
			   }
    }
    checkVersion();	
	} 
}
 /*TimelineEffect:end*/
 
 /*Animetion Class*/
 function animetClass() {
	function checkVersion() {
		
        var ver = getIEVersion();
        if (ver != -1) {
            if (ver <= 9.0) {
					
				$('.pageInfoSection .lhsInfo,.fullContentSection .pageContent .bigImg,.usprows .icons').addClass('noEffect')					
				 
               }
        }else{		
			 
			   $('.pageInfoSection .lhsInfo,.fullContentSection .pageContent .bigImg,.usprows .icons').removeClass('noEffect');
			   
			   }
    }
	 checkVersion();	
	}

$(window).load(function() {
     $(".feedbackPopup").slideDown(1000);
});