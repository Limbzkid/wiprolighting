(function ($) {
	//$(".submitLoader").hide();
	$(".jobResumeUpload").click(function() {
		var _this = $(this);
		var options = {
			beforeSend: function() {
				$("#progress").show();
				//clear everything
				$("#bar").width('0%');
				$("#message").html("");
				$("#percent").html("0%");
			},
			uploadProgress: function(event, position, total, percentComplete)   {
				$("#bar").width(percentComplete+'%');
				$("#percent").html(percentComplete+'%');
			},
			success: function() {
				$("#bar").width('100%');
				$("#percent").html('100%');
			},
			complete: function(response) {
				console.log(response);
				var jsonObj = $.parseJSON(response.responseText);
				$("#lightUpload").attr("rel", jsonObj.nid);
				if(jsonObj.status == 0) {
					_this.closest(".formBox").find("#message").html("");
					$("#message").text(jsonObj.msg).removeClass('dnone');
				} else {
					_this.closest(".formBox").find("#message").html("<font color='green'>"+jsonObj.msg+"</font>");
					_this.closest(".upload").attr("rel", jsonObj.nid);
					$(".uploadFileBox").hide();
					$(".uploadFile").hide();
					$(".removeFile").show();
					var filePath = jsonObj.msg;
					$(".fileName").text(filePath);
					
				}
			},
			error: function() {
				$("#message").html("<font color='red'> ERROR: unable to upload files</font>");
			}
		};
		_this.parents("#myForm").ajaxForm(options);
	});
  
  if($("body").hasClass("page-user-register")) {
    $(".password-suggestions").remove();
  }
  
  $("#edit-field-dealer-code-").addClass("dnone");
  
  $("#edit-field-occupation-und").change(function() {
    //console.log($($(this).find("input").attr("class")));
    if($(this).val() == 6) {
      $(".field-name-field-dealer-code-").removeClass("dnone");
      if($("#edit-field-dealer-code-und-0-value").hasClass("dnone")) {
        $("#edit-field-dealer-code-und-0-value").removeClass("dnone")
      }
    } else {
      $(".field-name-field-dealer-code-").addClass("dnone");
    }
  });
  
  var isClicked = false;
  $(".userLogin").click(function() {
    $('.error').remove();
    var error = false;
    if(!isClicked) {
      isClicked = true;
      var uname = $("#userLoginName").val();
      var pass = $("#userLoginPass").val();
      if(uname == '') {
        $('<div class="messages error messages-inline">Email id is required.</div>' ).insertAfter($("#userLoginName").parent(".fields"));
        error = true;
      }
      if(pass == '') {
        $('<div class="messages error messages-inline">Password is required.</div>' ).insertAfter($("#userLoginPass").parent(".fields"));
        error = true;
      }
      if(!error) {
        $.ajax({
          dataType : "json",
          type:'POST',
          url: Drupal.settings.basePath + 'authenticate-user',
          data: {uname: uname, pass: pass},
          success:function(data){
            //console.log(data);
            if(data.uid > 0) {
              $(".form-item-name > input").val(uname);
              $(".form-item-pass > input").val(pass);
              $("#user-login-form .form-submit").click();
            } else {
              // display error msg - data.msg
              var msg = data.msg[0];
              //console.log(msg[0]);
              var id = msg.split('-')[0];
              var msg = msg.split('-')[1];
              $('<div class="messages error messages-inline">'+ msg +'</div>' ).insertAfter($('#'+id).parent(".fields"));
            }
          }
        });
      }
      isClicked = false;
    }
  });
  
  $(".breadcrumbs li").each(function() {
    if($(this).text() == '') {
      $(this).remove();
    }
  });
   
  $(".searchBox").on('keydown', '.search', function (e) {
    var key = e.which;
    if(key == 13) {
      if($(this).val() == '') {
        alert('Please enter a Search text.');
        return false;
      }
      $(".form-item-search-block-form input").val($(".search").val());
      $("#search-block-form .form-submit").click();
      //$("#search-block-form .form-submit").click();
      return false;
    }
  });
  
  $(".searchIcon").click(function() {
    if($(".search").val() == '' || $('.searchBox input:text').val() == $('.searchBox input:text').attr("placeholder")) {
      $(".searchBox").addClass("blankFld");
      return false;
    }
    $(".form-item-search-block-form input").val($(".search").val());
    $("#search-block-form .form-submit").click();
    //$("#search-block-form #edit-submit--2").click();
  });
  
	$(document).on('click', '#submitThis', function () {
		$(".captchaErr").text('').addClass('dnone');
    $('#name').parent().find('.errorVisible').css('visibility','hidden');
    $('#email').parent().find('.errorVisible').css('visibility','hidden');
    $('#mobile').parent().find('.errorVisible').css('visibility','hidden');
    if($("body").hasClass("page-dealer-locator")) {
      $('#frmcity').parent().find('.errorVisible').css('visibility','hidden'); 
    } else {
      $('#city').parent().find('.errorVisible').css('visibility','hidden');
    }
    
    function ValidateEmail(email) {
      var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      return expr.test(email);
    }
    function ValidateName(name) {
      var letters = /^([a-zA-Z.\']+\s?)*$/;
      if(name == '' || !name.match(letters) || name.length < 2 || name.length > 51){
        return false;
      } else {
        return true;
      }  
    }
    function ValidateMobile(mobile) {
      var validmobile = /^[987].*$/;
      if(mobile.trim() == '' || mobile.trim() == 0 || mobile.trim().length != 10 || !mobile.match(validmobile)) {
        return false;
      } else {
        return true;
      }  
    }
    
    function ValidateCity(city) {
      var validcity = /^[a-zA-Z ]*$/;
      if(city.trim() == '' || city.trim() == 0 || !city.match(validcity)) {
        return false;
      } else {
        return true;
      }  
    }
    
    var name    = $('#name').val();
    var email   = $("#email").val();
    var mobile  = $('#mobile').val();
    if($("body").hasClass("page-dealer-locator")) {
      var city    = $('#frmcity').val();
    } else {
      var city    = $('#city').val();
    }
		var captchaErr = false;
		console.log(Drupal.settings.basePath + "recaptcha-verify");
		console.log('captcha response: ' + grecaptcha.getResponse()); // --> captcha response: 
		// ajax to the php file to send the mail
		$.ajax({
			async: false,
			type: "POST",
			url: Drupal.settings.basePath + "recaptcha-verify",
			data: "&g-recaptcha-response=" + grecaptcha.getResponse()
		}).done(function(status) {
			console.log(status);
			if (status == "ok") {
					// slide down the "ok" message to the user
					/*$status.text('Thanks! Your message has been sent, and I will contact you soon.');
					$status.slideDown();*/
					// clear the form fields
			} else {
				$(".captchaErr").text(status).removeClass('dnone');
				grecaptcha.reset();
				captchaErr = true;
			}
		});

    
    if(!ValidateName(name) || !ValidateEmail(email) || !ValidateMobile(mobile) || !ValidateCity(city) || captchaErr) {
			$(".submitLoader").addClass("dnone");
      $('.errors').css('display','none');
      if(!ValidateName(name))
        $('#name').parent().find('.errorVisible').css('visibility','visible');
      if(!ValidateEmail(email))
        $('#email').parent().find('.errorVisible').css('visibility','visible');
      if(!ValidateMobile(mobile))
        $('#mobile').parent().find('.errorVisible').css('visibility','visible');
      if(!ValidateCity(city)) {
        if ($("body").hasClass("page-dealer-locator")) {
          $('#frmcity').parent().find('.errorVisible').css('visibility','visible'); 
        } else {
          $('#city').parent().find('.errorVisible').css('visibility','visible'); 
        }
      }
			grecaptcha.reset();

    } else {
      $.ajax({
        type:'POST',
        url: Drupal.settings.basePath + 'get-a-call-back',
        data:{'name' : name, 'mail': email, 'mobile' : mobile, 'city' : city},
        //cache:false,
        dataType: "json",
        success:function(data){
          //console.log(data);
          if(data.status == 0) {
						grecaptcha.reset();
            for(var x in data.msg) {
              var temp = data.msg[x].split("-");
              var errID = temp[0];
              //console.log(errID);
              $("#"+errID).parent(".field").find('.errorVisible').css('visibility','visible');
            }
          } else {
            $('.thankYouMsg').css('display','block');
            $('.formData').css('display','none');
          }
					$(".submitLoader").addClass("dnone");
        },
        errors: function(data){
          grecaptcha.reset();
        }
      });
    }
  });
	
	$("#submitThis").click(function() {
		$(".submitLoader").removeClass("dnone");
	});
	
	//$('#sortingTable').DataTable();
	$('#sortingTable').DataTable({
			"lengthMenu": [[100, 250, 500, -1], [100, 250, 500, "All"]]
	});
	
	$("#applications").change(function() {
		if($(this).val() == 'all') {
      $(".loadmoreBtn").show();
			$(this).parents(".selBox").find(".selVal").text("All Applications");
    }
		var applications = $(this).val();
		if(applications == 'all') {
			$('#sortingTable tbody tr').show();
			$('.tabcontent.gridView li').show();
			return false;
		}
		$.each($('#sortingTable tbody tr'), function(index, value) {
      
			$(value).hide();
			if($(value).attr('uid') && $(value).attr('uid').indexOf(applications) >= 0){
				$(value).show();
			}
		});
		
		$.each($('.tabcontent.gridView li'), function(index, value) {
			$(value).hide();
      //console.log(value);
			if($(value).attr('uid') && $(value).attr('uid').indexOf(applications) >= 0){
				$(value).show();
			}
		});
    var gridViewProdPresent = "0";
    $(".gridRow>li").each(function() {
      if($(this).is(":visible")) {
        gridViewProdPresent = "1";
      }
    });
    //console.log(gridViewProdPresent);
    if($(".gridView").hasClass("active")) {
      $(".gridErrMsg").css('display', 'none');
      if(gridViewProdPresent == "0") {
        $(".loadmoreBtn").hide();
        $(".gridErrMsg").css('display', 'block');
      }
    }
    
    if($(".listView").hasClass("active")) {
      $("#sortingTable").find("thead").show();
      var listViewProdPresent = "0";
      $("#sortingTable").find("tbody").find("tr").each(function() {
        if($(this).is(":visible")) {
          listViewProdPresent = "1";
        }
      });
      $(".listErrMsg").css('display', 'none');
      if(listViewProdPresent == "0") {
        $("#sortingTable").find("thead").hide();
        $(".listErrMsg").css('display', 'block');
      }
    }
    
		
	});	
	
	$(".applications1").click(function() {
    $(".errorMsg").hide();
    var prodFound = "0";
		if($(this).hasClass('active')) {
			$(this).removeClass('active')
			$('.productList .group').show();
			return false;
		}
		var application = $(this).attr('tid');
		//console.log($(this).attr('tid'));
		$(this).addClass('active').siblings().removeClass('active');
		$.each($('.productList .group'), function(index, value) {
			$(value).hide();
			if($(value).attr('tid') && $(value).attr('tid').indexOf(application) >= 0){
				$(value).show();
        prodFound = "1";
			}
		});
    if(prodFound == "0") {
      $(".errorMsg").show();
    }
		productListSlider();
	});

/*Ligthting design app functionality:start*/
	$('.appStepSection .stepContent').eq(0).show();
	
	/*designSelect:start*/
	$(".designSelect .group .imgBox").click(function() {
    var $this=$(this);
    /***/
    $this.parents(".group").find(".formBox").find("select").each(function(){
      var selText = $(this).find("option:first-child").text();
        $(this).find("option:first-child").attr("selected", "selected");
        $(this).parents(".selBox").find(".selVal").text(selText);
        $(this).parents(".selBox").css("border-color", "#b8b8b8");
      })    
    $(this).parent().addClass('active').siblings().removeClass('active');
		$(this).next(".formBox").slideDown().parent().siblings().find(".formBox").hide();
		$(this).parents('.appStepSection').find(".steps li").eq(0).addClass('active');		
	});
	
	$(".stepContent .designSelect #officeProceed").click(function(){
		//console.log('dinesh');
		if($(this).parents('.designSelect').find('#officeArea').val() && $(this).parents('.designSelect').find('#offMountingHeight').val()) {
			$(this).parents('.appStepSection').find(".steps li").eq(0).removeClass('active').addClass('complete').next().addClass('active');
			$(this).parents('.stepContent').hide().next().fadeIn();
			stepSectionFocus();
		} else {
      if(!$(this).parents('.designSelect').find('#officeArea').val()) {
				$('#officeArea').parent('.selBox').css('border-color','red');
			} else {
        $('#officeArea').parent('.selBox').removeAttr('style');
      }
      if(!$(this).parents('.designSelect').find('#offMountingHeight').val()) {
				$('#offMountingHeight').parent('.selBox').css('border-color','red');
			} else {
        $('#offMountingHeight').parent('.selBox').removeAttr('style');
      }
			//$(this).parents('.active').find('.selBox').css('border-color','red');
		}
	});
	
	$(".stepContent .designSelect #factoryProceed").click(function(){
		if($(this).parents('.designSelect').find('#factoryArea').val() && $(this).parents('.designSelect').find('#mountingHeight').val()) {
			$(this).parents('.appStepSection').find(".steps li").eq(0).removeClass('active').addClass('complete').next().addClass('active');
			$(this).parents('.stepContent').hide().next().fadeIn();
			stepSectionFocus();
		}
		else {
			if(!$(this).parents('.designSelect').find('#factoryArea').val()) {
				$('#factoryArea').parent('.selBox').css('border-color','red');
			} else {
        $('#factoryArea').parent('.selBox').removeAttr('style');
      }
			if(!$(this).parents('.designSelect').find('#mountingHeight').val()) {
				$('#mountingHeight').parent('.selBox').css('border-color','red');
			} else {
        $('#mountingHeight').parent('.selBox').removeAttr('style');
      }
		}
	});
	
	//Delay might need
	$(".group.active .formBox .selBox select").change(function(){
		$(this).parents('.active').find('.selBox').css('border-color','#b8b8b8');
	});	
	/*selectArea:start*/
  
	$(".stepContent .selectArea .formBtn").click(function(){
    var areaSelected = false;
    $("#addAreaType .areaType").each(function() {
      if($(this).hasClass("sel")) {
        areaSelected = true;
      }
    });
    if (areaSelected) {
      $(this).parents('.appStepSection').find(".steps li").eq(1).removeClass('active').addClass('complete').next().addClass('active');
      if(areaSelected) {
        $(this).parents('.stepContent').hide().next().fadeIn();
      }	
      stepSectionFocus();
    }
	});
  
  
	$(".stepContent .selectArea .backBtn").click(function(){
		$(this).parents('.appStepSection').find(".steps li").eq(0).addClass('active').removeClass('complete').next().removeClass('active');
		$(this).parents('.stepContent').hide().prev().fadeIn();
		stepSectionFocus();
	});
	
	
	/*selectProduct:start*/
	$(".stepContent .selectProduct .formBtn").click(function(){
    var prodSelected = false;
    $(".products .group").each(function() {
      if($(this).hasClass("sel")) {
        prodSelected = true;
      }
    });
    if(prodSelected) {
      $(this).parents('.appStepSection').find(".steps li").eq(2).removeClass('active').addClass('complete').next().addClass('active');
      $(this).parents('.stepContent').hide().next().fadeIn();
      stepSectionFocus();
    }
	});
  
	$(".stepContent .selectProduct .backBtn").click(function(){
		$(this).parents('.appStepSection').find(".steps li").eq(1).addClass('active').removeClass('complete').next().removeClass('active');
		$(this).parents('.stepContent').hide().prev().fadeIn();
		stepSectionFocus();
	});
	
	/*addProduct:start*/
	$(".summarySection .summaryTable .addProduct").click(function(){
		$(this).parents('.appStepSection').find(".steps li").eq(2).addClass('active').removeClass('complete').next().removeClass('active');
		$(this).parents('.stepContent').hide().prev().fadeIn();
		stepSectionFocus();
	});
	
	/*addAnotherArea:start*/
	$(".summarySection .summaryTable .addAnotherArea").click(function(){
		$(this).parents('.appStepSection').find(".steps li").removeClass('active').eq(1).addClass('active').removeClass('complete').next().removeClass('complete');
		$(this).parents('.stepContent').hide().prev().prev().fadeIn();
		stepSectionFocus();
	});
	
	/*Ligthting design app functionality:end*/
  
  
  
  
  
  $(document).on('click','.submit_sku',function(){
  //$(".submit_sku").live("click", function() {
    if($("#filter_sku").is(":checked")) {
			var sku = $("#filter_sku_text").val();
			if(sku == '') {
				alert('Please enter Product SKU');
				return false;
			} else {
				$.ajax({
					type: "POST",
					url: Drupal.settings.basePath + 'edit-product-details',
					data:{ psku : sku },
					success: function(data) {
						//console.log(data);
						/*$("#node-admin-content").find(".table-select-processed").find("tbody").remove();
						$(".item-list").addClass("dnone");
						$("#node-admin-content").find(".table-select-processed").find("thead").html("");
						$("#node-admin-content").find(".table-select-processed").find("thead").after(data);*/
					}
				});
			}
		}
	});
  /*------- Careers Form ------*/
  $("#careers-content #edit-location").change(function() {
    var loc = $(this).val();
    $.ajax({
      dataType : "json",
      type:'POST',
      url: Drupal.settings.basePath + 'about-us/careers/career-positions',
      data: {loc: loc},
      success:function(data){
        //console.log(data);
        $("#careers-content #edit-position").html('');
        $("#careers-content #edit-position").append(data);
        
      }

    });
  });
  
  /*setTimeout(function(){
    var menuHtm = '<li><a href="/wiprolighting/products/led/lamps-accessories" rel="Lamps & Accessories"> <span class="sansXbold">Lamps & Accessories</span> <span class="arow"></span></a></li>';
    menuHtm += '<li><a href="/wiprolighting/products/led/lighting-management-system" rel="Lighting Management System"> <span class="sansXbold">Lighting Management System</span> <span class="arow"></span></a></li>';
    menuHtm += '<li><a href="/wiprolighting/products/led/cleanray" rel="Cleanray"> <span class="sansXbold">Cleanray</span> <span class="arow"></span></a></li>';
    $('.subMenu').eq(1).find('.menuSection').eq(0).find(".rgtMenuBox").find('ul').append(menuHtm);
  }, 1000);*/
  
  $("#edit-loc-pref").click(function() {
    if($(this).is(':checked')) {
      $(".form-item-location").hide();
    } else {
      $(".form-item-location").show();
    }
  });
  
	var isFeedBackClicked = false;
  $(".feedBackFrmSubmit").click(function() {
		//$(".submitLoader").removeClass("dnone");
		$(".thanxMsg").text('').css('display', 'none');
    $(".fError").addClass("dnone");
    var error = false;
		var feedTxt = '';
		if(!isFeedBackClicked) {
			isFeedBackClicked = true;
			var classify = $("#classific").val();
			var feedView = $("#feedView").val();
			var feedPurpose = $("#feedPurpose").val();
			var feedProfession = $("#feedOptions").val();
			var feedMail = $("#feedMail").val();
			if($("input[id=yes]:checked").val() == 'yes') {
				var feedradio = 'Yes';
			}
			if($("input[id=no]:checked").val() == 'no') {
				var feedradio = 'No';
			}
			$(".feedTxt .group").each(function() {
				if(!$(this).hasClass("dnone")) {
					feedTxt = $(this).find("#feedBackTxt").val();
				}
			});	
			if(typeof $("input[id=yes]:checked").val() === 'undefined' && typeof $("input[id=no]:checked").val() === 'undefined') {
				feedradio = '';
				error = true;
			}
			if(classify == 'Select') {
				$(".errCat").text('Please select a category').removeClass('dnone');
				error = true;
			}
			if(feedView == '0') {
				$(".errView").text('Please select a view').removeClass('dnone');
				error = true;
			}
			if(feedPurpose == 'Select') {
				$(".errPurpose").text('Please select a purpose').removeClass('dnone');
				error = true;
			}
			
			if(feedProfession == 'Select') {
				$(".errPro").text('Please select a profession').removeClass('dnone');
				error = true;
			}
			if(feedradio == '') {
				$(".errRadio").text('Please select an option').removeClass('dnone');
				error = true;
			}
			if(feedMail == '') {
				$(".errMail").text('Please enter an email').removeClass('dnone');
				error = true;
			}
			if (feedMail != '') {
				//var re = /\S+@\S+\.\S+/;
				var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
				if(!re.test(feedMail)) {
				//if(!ValidateEmail(feedMail)) {
					$(".errMail").text('Please enter a valid email').removeClass('dnone');
					error = true;	
				}
			}
			
			if(feedTxt == '') {
				$(".feedTxt .group").each(function() {
					if(!$(this).hasClass('dnone')) {
						$(this).find('.errTxt').text('Please enter your feedback.').removeClass('dnone');
					}
				});
			}
			
				if(verify_recaptcha() != 'ok') {
					error = true;
				}

			if(error) {
				grecaptcha.reset();
				//$('.captchaErr').text('').addClass('dnone');
				isFeedBackClicked = false;
				$("html, body").animate({ scrollTop: 0 }, "slow");
				return false;
			} else {
				$.ajax({
					dataType : "json",
					type:'POST',
					async : false,
					url: Drupal.settings.basePath + 'feedback-form-data',
					data: {
							classify				: classify,
							feedView				: feedView,
							feedPurpose			: feedPurpose,
							feedradio				: feedradio,
							feedProfession	: feedProfession,
							feedMail				: feedMail,
							feedTxt					: feedTxt
					},
					success:function(data){
						if(data.status == 1) {
								// display Thank you msg
								
								$("#classific").parent('.selBox').find('.selVal').text('Select');
								$("#feedView").parent('.selBox').find('.selVal').text('Select');
								$("#feedPurpose").parent('.selBox').find('.selVal').text('Select');
								$("#feedOptions").parent('.selBox').find('.selVal').text('Select');
								$("#feedMail").val('');
								$(".feedTxt .group").each(function() {
									if(!$(this).hasClass("dnone")) {
										feedTxt = $(this).find("#feedBackTxt").val('');
									}
								});
								
								$(".thanxMsg").text('Thank you for submitting your valuable feedback. We really appreciate it').css('display', 'block');
								$("html, body").animate({ scrollTop: 0 }, "slow");
								$(".submitLoader").addClass("dnone");
								$(".feedbackForm").hide();
						} else {
							 // error
							for(var x in data.msg) {
								$(".errors").addClass("dnone");
								var temp = data.msg[x].split("-");
								var errID = temp[0];
								var errMsg = temp[1];
								$("."+errID).text(errMsg).removeClass('dnone');
							}
							
							$("#classific").parent('.selBox').find('.selVal').text('Select');
							$("#feedView").parent('.selBox').find('.selVal').text('Select');
							$("#feedPurpose").parent('.selBox').find('.selVal').text('Select');
							$("#feedOptions").parent('.selBox').find('.selVal').text('Select');
							$("#feedMail").val('');
							$(".feedTxt .group").each(function() {
								if(!$(this).hasClass("dnone")) {
									feedTxt = $(this).find("#feedBackTxt").val('');
								}
							});
							
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
						
						isFeedBackClicked = false;
					}
				});
			}
		}
  });
	
	$("#feedView").change(function() {
    var done = false;
    var feedIndex = $(this).val();
		$(".feedTxt .group").each(function() {
      var txtIndex = $(this).index() + 1;
      if(txtIndex == feedIndex) {
        if(!done) {
					if($(this).hasClass("dnone")) {
						$(this).removeClass("dnone");
						done = true;
					}
				}
			} else {
				if(!$(this).hasClass("dnone")) {
          $(this).addClass("dnone");
				}	
			}
		});
	});
	
	function verify_recaptcha() {
		var msg = ''; 
		var captchaErr = false;
		//console.log(Drupal.settings.basePath + "recaptcha-verify");
		//console.log('captcha response: ' + grecaptcha.getResponse()); // --> captcha response: 
		// ajax to the php file to send the mail
		$.ajax({
			async: false,
			type: "POST",
			url: Drupal.settings.basePath + "recaptcha-verify",
			data: "&g-recaptcha-response=" + grecaptcha.getResponse()
		}).done(function(status) {
			msg = status;
			if (status == "ok") {
					// slide down the "ok" message to the user
					/*$status.text('Thanks! Your message has been sent, and I will contact you soon.');
					$status.slideDown();*/
					// clear the form fields
					isFeedBackClicked = false;
					$(".capchBox").attr("rel", "1");
			} else {
				$(".captchaErr").text(status).removeClass('dnone');
				$(".capchBox").attr("rel", "0");
				captchaErr = true;
			}
		});

		return msg;
	}
	
	$(".getStartedBtn").click(function() {
		$(".thanxMsg").text('').css('display', 'none');
		$("#classific").parent('.selBox').find('.selVal').text('Select');
		$("#feedView").parent('.selBox').find('.selVal').text('Select');
		$("#feedPurpose").parent('.selBox').find('.selVal').text('Select');
		$("#feedOptions").parent('.selBox').find('.selVal').text('Select');
		$("#feedMail").val('');
		$(".feedTxt .group").each(function() {
			if(!$(this).hasClass("dnone")) {
				feedTxt = $(this).find("#feedBackTxt").val('');
			}
		});
		$(".feedbackForm").show();
	});
	
	var isLightingClicked = false;
	$(".lightingFrm").click(function() {
		if(!isLightingClicked) {
			var errFocus = false;
			isLightingClicked = true;
			$('.thanxMsg').text("").css('display', 'none');
			$(".errName").text('').addClass('dnone');
			$(".errPhone").text('').addClass('dnone');
			$(".errMail").text('').addClass('dnone');
			$(".errUpload").text('').addClass('dnone');
			var error = false;			
			var name = $("#lightName").val();
			var phone = $("#lightPhone").val();
			var mail = $("#lightMail").val();
			var fileId = $("#lightUpload").attr("rel");
			
			if(name == '') {
				$(".errName").text('Please enter a name').removeClass('dnone');
				if(!errFocus) {
					setTimeout(function(){
						$("#lightName").focus();
					},1);
					errFocus = true;
				}
				
				error = true;
			} else {
				var letters = /^[a-zA-Z\.' ]*$/;
				if(!name.match(letters)) {
					$(".errName").text('Please enter a valid name').removeClass('dnone');
					if(!errFocus) {
						setTimeout(function(){
							$("#lightName").focus();
						},1);
						
						errFocus = true;
					}
					error = true;
					
				}
			}
			
			if(phone == '') {
				$(".errPhone").text('Please enter a phone number').removeClass('dnone');
				error = true;
			} else {
				var validmobile = /^[987].*$/;
				if(!phone.match(validmobile)) {
					$(".errPhone").text('Please enter a valid phone number').removeClass('dnone');
					if(!errFocus) {
						setTimeout(function(){
							$("#lightPhone").focus();
						},1);
						
						errFocus = true;
					}
					error = true;
				}
			}	
			
			if(mail == '') {
				$(".errMail").text('Please enter an email').removeClass('dnone');
				error = true;	
			} else {
				//var re = /\S+@\S+\.\S+/;
				var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
				if(!re.test(mail)) {
					$(".errMail").text('Please enter a valid email').removeClass('dnone');
					if(!errFocus) {
						setTimeout(function(){
							$("#lightMail").focus();
						},1);
						
						errFocus = true;
					}
					error = true;	
				}
			}
			
			if($("#lightUpload").val() == '') {
				$(".errUpload").text('Please upload  a file').removeClass('dnone');
				error = true;	
			}
			
			if($("#percent").text() == '0%') {
				$(".errUpload").text('Please upload  a file').removeClass('dnone');
				error = true;	
			}
			
			if(verify_recaptcha() != 'ok') {
				error = true;
			} else {
				$('.captchaErr').text('').addClass('dnone');
			}
			
			if(error) {
				//
				grecaptcha.reset();
				isLightingClicked = false;
				return false;
			} else {
				$.ajax({
					dataType : "json",
					data: {
						name   : name,
						phone  : phone,
						mail   : mail,
						fileId : fileId,
					},
					type: "post",
					url: Drupal.settings.basePath + "lighting-form-data",
					success: function(data) {
						console.log(data);
						if (data.status == 1) {
	
							$('.thanxMsg').text("Thanks for uploading your requirement.Our lighting solution experts will get back to you shortly.").css('display', 'block');
							$("#lightName").val('');
							$("#lightPhone").val('');
							$("#lightMail").val('');
							$("#lightUpload").val('');
							$("#myForm").hide();
							//isLightingClicked = false;
						}
						$("html, body").animate({ scrollTop: 0 }, "slow");
						
					}
				});
			}
		}
	});
	
	$(".lightAppClk").click(function() {
		grecaptcha.reset();
		$('.thanxMsg').text("").css('display', 'none');
		$('.uploadFileBox').show();
		$("#myForm").show();
		$("#lightPhone").val('');
		$("#lightMail").val('');
		$("#lightUpload").val('');
		$("#captcha-form").val('');
		$(".removeFile").hide();
		$(".uploadFile").show();
		$(".errName").addClass("dnone");
		$(".errPhone").addClass("dnone");
		$(".errMail").addClass("dnone");
		$(".errUpload").addClass("dnone");
		$(".captchaErr").addClass("dnone");
		setTimeout(function(){
			$("#lightName").val('').focus();
		}, 1);
		
	});
	
	$(".clickReg").click(function() {
		$(".loginI a").click();
	});
	
	$(".removeUpload").click(function() {
		$("#lightUpload").attr("rel", "");
		$("#lightUpload").val("");
		$(".uploadFileBox").show();
		$(".uploadFile").show();
		$(".removeFile").hide();
		
	});
	
	
	
  
  
 
	
})(jQuery);  // end of document ready



