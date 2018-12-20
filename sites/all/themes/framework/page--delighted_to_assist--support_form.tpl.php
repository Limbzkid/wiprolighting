<!-- Start Header -->
<?php $curpath = explode('/', drupal_lookup_path('alias',current_path())); ?>
<?php $captcha_path = base_path().'captcha.php'; ?>
<?php
	global $user;
	global $base_url;
	$user_name = db_query("SELECT field_first_name_value FROM {field_data_field_first_name} WHERE entity_id=:arg", array(':arg' => $user->uid))->fetchField();
	$contact_number = db_query("SELECT field_contact_no__value FROM {field_data_field_contact_no_} WHERE entity_id=:arg", array(':arg' => $user->uid))->fetchField();
	if($user->uid) {
		$name 		= $user_name;
		$mail 		= $user->mail;
		$contact 	= $contact_number;
	} else {
		$name 		= '';
		$mail			= '';
		$contact	= '';
	}
?>
<header>
  <div class="container relative">
    <div class="logo"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a> </div>
    <!-- Start Icon Menu -->
    <nav>
      <div class="topbar">
        <ul class="globalNav">
					<?php if($user->uid): ?>
						<li class="loginI logOff"><?php  print l(t('Sign Out'), 'user/logout'); ?>
					<?php else: ?>
						<li class="loginI"><a href="javascript:;">Sign In</a></li>
					<?php endif;?>
					<li class="locateI"><a href="<?php echo base_path(); ?>dealer-locator/our-office">Locate Us</a></li>
					<li class="contactI"><a href="<?php echo base_path(); ?>delighted-to-assist/write-to-us">Delighted to assist</a></li>
				</ul>
        <div class="callBar">
          <h3>Toll-Free No.  1800-425-1969</h3>
          <p>Mon to Fri, 9 AM TO 5 PM</p>
        </div>
      </div>
      <div class="menuBox">
				<div class="menu">
					<ul>
						<li>
							<?php if($curpath[0] == 'applications'): ?>
								<a class="active" href="javascript:;">Applications </a>
							<?php else: ?>
								<a href="javascript:;">Applications </a>
							<?php endif; ?>
							<div class="menuPopup">
								<div class="popXbtn"><a class="" href="javascript:;"></a></div>
								<?php print render($page['menu_apps']); ?>
							</div>
						</li>
						<li>
							<?php if($curpath[0] == 'products'): ?>
								<a class="active" href="javascript:;">Products </a>
							<?php else: ?>
								<a href="javascript:;">Products </a>
							<?php endif; ?>
							<div class="menuPopup">
								<div class="popXbtn"><a class="" href="javascript:;"></a></div>
								<div class="navTabLink">
									<ul>
										<li><a href="javascript:;"> LED </a></li>
										<li><a href="javascript:;">Conventional </a></li>
									</ul>
								</div>
								<?php print render($page['menu_product']); ?>
							</div>
						</li>
						<li>
							<?php if($curpath[0] == 'resources'): ?>
								<a class="active" href="javascript:;">Resources </a>
							<?php else: ?>
								<a href="javascript:;">Resources </a>
							<?php endif; ?>
							<div class="menuPopup">
								<div class="popXbtn"><a class="" href="javascript:;"></a></div>
								<?php print render($page['menu_resources']); ?>
							</div>
						</li>
						<li>
							<?php if($curpath[0] == 'innovation-in-lighting'): ?>
								<a class="active" href="javascript:;">Innovation in Lighting </a>
							<?php else: ?>
								<a href="javascript:;">Innovation in Lighting </a>
							<?php endif; ?>
							<div class="menuPopup">
								<div class="popXbtn"><a class="" href="javascript:;"></a></div>
								<?php print render($page['menu_innovate']); ?>
							</div>
						</li>
						<li>
							<?php if($curpath[0] == 'about-us'): ?>
								<a class="active" href="javascript:;">About Us </a>
							<?php else: ?>
								<a href="javascript:;">About Us </a>
							<?php endif; ?>
							<div class="menuPopup">
								<div class="popXbtn"><a class="" href="javascript:;"></a></div>
								<?php print render($page['menu_about']); ?>
							</div>
						</li>
					</ul>
				</div>
				<div class="searchBox">
					<div class="placeholder">
						<input type="text" placeholder="SEARCH" class="search">
						<a class="searchIcon" href="javascript:;"> </a> </div>
						<div style="display:none;"><?php print render($page['top_navigation']); ?></div>
				</div>
                 <div class="searchLink"> <a href="javascript:;">&nbsp;</a></div>
                <div class="navIcon"><a href="javascript:;">&nbsp;</a></div>
          		<div class="menuOverlay"></div>
			</div>
    </nav>
    
    <!-- End Icon Menu --> 
    
  </div>
</header>
<!-- End Header -->
<section> 
    <!--topBar:start-->
    <div class="topBar">
        <div class="container">
            <div class="links">
							<a href="<?php echo base_path(); ?>delighted-to-assist/write-to-us" <?php if(arg(1) =='write-to-us') { echo 'class="active"'; } ?>>Write to Us</a>
              <a href="<?php echo base_path(); ?>delighted-to-assist/support-form" <?php if(arg(1) =='support-form') { echo 'class="active"'; } ?>>Service Request</a>  
            </div>
        </div>
    </div>
    <!--topBar:end-->
  <!--contentMaster:start-->
  <div class="contentMaster">
    <div id="container" class="clearfix container">
			<?php if ($page['breadcrumb']): ?><?php print render($page['breadcrumb']); ?><?php endif; ?>
      <div id="main" role="main" class="clearfix"> <?php print $breadcrumb; ?> <?php print $messages; ?> <a id="main-content"></a>
        <?php if ($page['highlighted']): ?>
        <div id="highlighted"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
        <?php if (!empty($tabs['#primary'])): ?>
        <div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div>
        <?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <div class="sectionWrapper">
          <div class="fullContentSection">
            <h1>Service <span class="semiBold">Request Form</span></h1>         
          <div class="queryForm">
            <div class="formTitle"> <span class="noIco lightBlue">1</span>
              <h2>Fill <span class="semiBold">in your Query</span></h2>
            </div>
            <div class="formWrap">
              <div class="formValue">
                <div class="group cnn" style="display:none;">
                  <div class="grpClm">
                    <label>Complaint Number</label>
                    <span id="cnnNumber" class="value">1441445541</span> </div>
                  <div class="grpClm">
                    <label>Complaint Date</label>
                    <span id="cnnDate" class="value">07-09-2015</span> </div>
                </div>
              </div>
              <div class="thankYouMsg"><strong>Thank you</strong> for contacting us. Our service team will get back to you shortly.</div>
              <div class="fieldGroup">
                <div class="group">
                  <div class="grpTitle">Personal Details</div>
                  <div class="row">
                    <div class="clm">
                      <label>Enter Your Name <span class="astric">*</span></label>
                      <div class="field"> 
                      	 <input id="name" type="text" value="<?php echo $name; ?>" placeholder="Enter your Name" maxlength="50" minlength="2">
						  <span class="errors">Please enter valid name</span>
                      </div>
                    </div>
                    <div class="clm">
                      <label>Enter Your Email ID</label>
                      <div class="field">
                        <input id="email" type="text" value="<?php echo $mail; ?>" placeholder="Enter Your Email ID" maxlength="50" minlength="6" autocomplete="false">
					  <span class="errors">Please enter valid email</span> </div>
                    </div>
                    <div class="clm">
                      <label>Enter Your Contact Number <span class="astric">*</span></label>
                      <div class="field"> 
                       <input id="mobile" type="tel" value="<?php echo $contact; ?>" placeholder="Enter your contact number" maxlength="10" minlength="10" autocomplete="false">
					  <span class="errors">Please enter valid contact number</span> </div>
                    </div>                    
                  </div>
                </div>
                <div class="group">
                  <div class="grpTitle">Wipro Invoice Details</div>
                  <div class="row">
                    <div class="clm">
                      <label>Enter Invoice Number <span class="astric">*</span></label>
                      <div class="field"> 
                       <input id="invoiceId" type="text" value="" placeholder="Enter Invoice Number" maxlength="10" minlength="10" autocomplete="false">
					  <span class="errors">Please enter valid Invoice number</span> </div>
                    </div>
                    <div class="clm">
                      <label>Enter Invoice Date <span class="astric">*</span></label>
                      <div class="field"> 
                        <input readonly="readonly" class="datepicker" autocomplete="false" id="invoiceDate" type="text" value="" placeholder="Enter Invoice Date" maxlength="10" minlength="10">
					  <span class="errors">Please enter valid Invoice date</span> </div>
                    </div>
                  </div>
                </div>
                <div class="group">
                  <div class="grpTitle">Query Details</div>
                  <div class="row topSpace">
                    <div class="clm">
                      <label>Product Complaint <span class="astric">*</span></label>
                      <div class="field">
                     	<input id="complaint" type="text" value="" autocomplete="false" placeholder="Product Complaint" maxlength="10" minlength="10">
					  <span class="errors">Please enter valid Product complaint</span>
                     </div>
                    </div>
                    <div class="clm">
                      <label>Product Category Reference <span class="astric">*</span></label>
                      <div class="field">
                        <input id="category" type="text" value="" autocomplete="false" placeholder="Enter Product Category Reference" maxlength="10" minlength="10">
					  <span class="errors">Please enter valid Product Category Reference</span>
                         </div>
                    </div>
                    <div class="clm">
                      <label> Product Failure Quantity <span class="astric">*</span></label>
                      <div class="field">
                        <input id="quantity" autocomplete="false" type="text" value="" placeholder="Enter Product Failure Quantity" maxlength="10" minlength="10">
					  <span class="errors">Please enter valid Product Failure Quantity</span>
                        
                         </div>
                    </div>
                  </div>
                  <div class="row">                    
                    <div class="clm">
                      <label>Batch Code</label>
                      <div class="field">
                        <input id="batchCode" autocomplete="false" type="text" value="" placeholder="Enter Batch Code" maxlength="10" minlength="10">
					  <span class="errors">Please enter valid Enter Batch Code</span>
                         </div>
                    </div>
                    <div class="clm">
                      <label>Packaging Date</label>
                      <div class="field">
                        <input  readonly="readonly" autocomplete="false" class="datepicker" id="packagingDate" type="text" value="" placeholder="Enter Packaging Date" maxlength="10" minlength="10">
					  <span class="errors">Please enter valid Packaging Date</span>
                         </div>
                    </div>
                  </div>
                  <div class="row row2">
                    <div class="clm">
                      <label>Describe Complaint <span class="astric">*</span></label>
                      <div class="field">
                        <div class="inputWrap"><textarea id="reference" type="text" autocomplete="false" maxlength="500" minlength="10"></textarea>
                       
                        <span class="textLimit">500 Character Left</span></div>
                        <span class="errors">Please enter valid Product Catalog Reference</span> </div>
                    </div>
                  </div>
									<div class="row capchBox">
                    <div class="clm">
											<div class="field">
												<div class="g-recaptcha" data-sitekey="6LfdChsTAAAAAMedO_GDChZ3BAGTFM7Cj6ar0ieY"></div>
												<span class="captchaErr dnone">Please enter correct Captcha Code</span> </div>
											</div>
                    </div>
                  </div>
									
                  <div class="row">
										<a href="javascript:;" class="arrowLink resetBtn">Reset<span class="arrowIco"></span></a>
										<a id="support" href="javascript:;" class="arrowLink formBtn">Submit <span class="arrowIco"></span></a>
										<div class="dnone subLoadSupport"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/submit_loader.gif" id="" class=""/></div>
									</div>
                </div>
              </div>
            </div>            
          </div>
          <div class="contactSection">
            <div class="group"> <span class="noIco">2</span>
              <div class="gropTitle"> <span class="spireIcon businessOffIco"></span>
                <h2>Business <span class="semiBold">Office</span></h2>
              </div>
              <p>Wipro Enterprise Ltd.<br>
                5th Floor, Godrej Eternia, 'C' Wing,<br>
                Old Pune-Mumbai Road,<br>
                Shivajinagar, Pune- 411005</p>
              <p class="topSpace"><a href="<?php echo base_path(); ?>dealer-locator/our-office?clk=rdda" class="arrowLink viewOnMap">View on map <span class="arrowIco"></span></a></p>
              <p> <span class="phoneNo"><strong>Tel:</strong> 020-66098700</span> <span class="phoneNo"><strong>Fax:</strong> 020-66098777</span> </p>
            </div>
            <div class="group"> <span class="noIco lightGreen">3</span>
              <div class="gropTitle"> <span class="spireIcon mailIco"></span>
                <h2>Mail your <span class="semiBold">Feedback to</span></h2>
              </div>
              <p><a href="mailto:helpdesk.lighting@wipro.com" class="arrowLink" >helpdesk.lighting@wipro.com <span class="arrowIco"></span></a></p>
            </div>
          </div>
          </div>
        </div>
      </div>
      <!-- /#main --> 
    </div>
    <!-- /#container --> 
  </div>
  <!--contentMaster:end--> 
</section>

<script>
	
  (function ($) {
		
		function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
      }
      function ValidateName(name) {
        var letters = /^[a-zA-Z\.' ]*$/;
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

    $(document).on('click', '#support', function () {
//			if($(".subLoadSupport").hasClass("dnone")) {
//        $(".subLoadSupport").removeClass("dnone");
//      }
			
			//console.log('clicked');
			$(".captchaErr").addClass("dnone");
			
			var errorFocus = false;
			var captchaErr = false;
			console.log('captcha response: ' + grecaptcha.getResponse()); // --> captcha response: 
			// ajax to the php file to send the mail
			if(grecaptcha.getResponse()) {
				$(".captchaErr").text('').css('display', 'none');
        $.ajax({
				type: "POST",
				url: Drupal.settings.basePath + "recaptcha-verify",
				data: "&g-recaptcha-response=" + grecaptcha.getResponse()
				}).done(function(status) {
					console.log('captcha stats: ' , status);
					if (status == "ok") {
						// slide down the "ok" message to the user
						/*$status.text('Thanks! Your message has been sent, and I will contact you soon.');
						$status.slideDown();*/
						// clear the form fields
					} else {
						
						//$(".subLoadSupport").addClass("dnone");
						$(".captchaErr").text(status).css('display', 'block');
						captchaErr = true;
					}
				});
      } else {
				$(".captchaErr").text('Captcha has not been checked').css('display', 'block');
				captchaErr = true;
			}
			
			
      
      var name 					=	$('#name').val();
      var email 				= $("#email").val();
      var mobile 				=	$('#mobile').val();
      var invoiceId 		=	$('#invoiceId').val();
      var invoiceDate 	=	$('#invoiceDate').val();
      var complaint 		=	$('#complaint').val();
      var category 			=	$('#category').val();
      var quantity 			=	$('#quantity').val();
      var batchCode 		=	$('#batchCode').val();
      var packagingDate =	$('#packagingDate').val();
      var reference 		=	$('#reference').val();
      if(!ValidateName(name) || invoiceId =='' || invoiceDate =='' || complaint =='' || category =='' || quantity =='' || reference =='' || !ValidateMobile(mobile) || captchaErr)  {
       // alert(1);
				$('.errors').css('display','none');
        if(!ValidateName(name)) {
          $('#name').parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#name').focus();
            errorFocus = true;
          }
        }
        if(!ValidateEmail(email) && email != '') {
          $('#email').parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#email').focus();
            errorFocus = true;
          }
        }
        if(!ValidateMobile(mobile)) {
          $('#mobile').parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#mobile').focus();
            errorFocus = true;
          }
        }
        if(invoiceId == '') {
          $('#invoiceId').parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#invoiceId').focus();
            errorFocus = true;
          }
        }
        if(invoiceDate =='') {
          $('#invoiceDate').parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#invoiceDate').focus();
            errorFocus = true;
          }
        }
        if(complaint =='') {
          $('#complaint').parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#complaint').focus();
            errorFocus = true;
          }
        }
        if(category =='') {
          $('#category').parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#category').focus();
            errorFocus = true;
          }
        }
        if(quantity =='') {
          $('#quantity').parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#quantity').focus();
            errorFocus = true;
          }
        }
        if(reference =='') {
          $('#reference').parent().parent().find('.errors').css('display','block');
					if(!errorFocus) {
						$('#reference').focus();
            errorFocus = true;
          }
        }
				if(captchaErr) {
					$(".captchaErr").removeClass('dnone');
					if(!errorFocus) {
						$('#captchaErr').focus();
            errorFocus = true;
          }
					//$(".subLoadSupport").addClass("dnone");
					return false;
				}
				grecaptcha.reset();
				
      } else {
				//alert(2);
				var today = new Date();
				today = today.getDate()+'-'+parseInt(today.getMonth()+1)+'-'+today.getFullYear();
		
				$('#cnnDate').text(today);
        var formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('mobile', mobile);
        formData.append('invoiceId', invoiceId);
        formData.append('invoiceDate', invoiceDate);
        formData.append('complaint', complaint);
        formData.append('category', category);
        formData.append('quantity', quantity);
        formData.append('batchCode', batchCode);
        formData.append('packagingDate', packagingDate);
        formData.append('reference', reference);
        $.ajax({
          type:'POST',
          url: Drupal.settings.basePath + 'get-a-support',
          data:formData,
          cache:false,
					async: false,
          contentType: false,
          processData: false,
          success:function(data){
            $('.errors').css('display','none');
						if(data.trim() == 'name' || data.trim() == 'email' || data.trim() == 'mobile' || data.trim() == 'invoiceId' || data.trim() == 'invoiceDate' || data.trim() == 'complaint' || data.trim() == 'category' || data.trim() == 'quantity' || data.trim() == 'reference') {
							if(data.trim() == 'name')
								$('#name').parent().find('.errors').css('display','block');
							if(data.trim() == 'email')
								$('#email').parent().find('.errors').css('display','block');
							if(data.trim() == 'mobile')
								$('#mobile').parent().find('.errors').css('display','block');
							if(data.trim() == 'invoiceId')
								$('#invoiceId').parent().find('.errors').css('display','block');
							if(data.trim() == 'invoiceDate')
								$('#invoiceDate').parent().find('.errors').css('display','block');
							if(data.trim() == 'complaint')
								$('#complaint').parent().find('.errors').css('display','block');
							if(data.trim() == 'category')
								$('#category').parent().find('.errors').css('display','block');
							if(data.trim() == 'quantity')
								$('#quantity').parent().find('.errors').css('display','block');
							if(data.trim() == 'reference')
								$('#reference').parent().parent().find('.errors').css('display','block');
						} else {
							//$(".subLoadSupport").addClass("dnone");
							name =$('#name').val('');
							email = $("#email").val('');
							mobile =$('#mobile').val('');
							invoiceId =$('#invoiceId').val('');
							invoiceDate =$('#invoiceDate').val('');
							complaint =$('#complaint').val('');
							category =$('#category').val('');
							quantity =$('#quantity').val('');
							batchCode =$('#batchCode').val('');
							packagingDate =$('#packagingDate').val('');
							reference =$('#reference').val('');
							$('#cnnNumber').text(data.trim());
							$('.cnn').css('display','block');
							$('.thankYouMsg').css('display','block');
							$(".fieldGroup").hide();
							$("html, body").animate({ scrollTop: 0 }, "slow");
							
						}

					
          },
          errors: function(data){
          
          }
					
        });
      }
      
        
    });
  
  })(jQuery); 
</script>
<div class="overlay"></div>
<?php print render($page['header']); ?>