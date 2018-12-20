<!-- Start Header -->
<?php $curpath = explode('/', current_path()); ?>
<style>
.selectProduct .group.disable { opacity: 0.5; }
</style>
<header>
  <div class="container relative">
    <div class="logo"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a> </div>
    <!-- Start Icon Menu -->
    <nav>
      <div class="topbar">
        <ul class="globalNav">
          <?php if($user->uid): ?>
          <li class="loginI logOff">
            <?php  print l(t('Sign Out'), 'user/logout'); ?>
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
                <?php print render($page['menu_apps']); ?> </div>
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
                <?php print render($page['menu_product']); ?> </div>
            </li>
            <li>
              <?php if($curpath[0] == 'resources'): ?>
              <a class="active" href="javascript:;">Resources </a>
              <?php else: ?>
              <a href="javascript:;">Resources </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_resources']); ?> </div>
            </li>
            <li>
              <?php if($curpath[0] == 'innovation-in-lighting'): ?>
              <a class="active" href="javascript:;">Innovation in Lighting </a>
              <?php else: ?>
              <a href="javascript:;">Innovation in Lighting </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_innovate']); ?> </div>
            </li>
            <li>
              <?php if($curpath[0] == 'about-us'): ?>
              <a class="active" href="javascript:;">About Us </a>
              <?php else: ?>
              <a href="javascript:;">About Us </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_about']); ?> </div>
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
  <!--contentMaster:start-->
  <div class="contentMaster">
    <div id="container" class="clearfix container">
      <div id="main" role="main" class="clearfix"> <?php print $messages; ?>
        <ul class="breadcrumbs">
          <li><a href="<?php print $front_page; ?>">Home</a></li>
          <li class="noBcLink">Resources</li>
          <li class="noBcLink">Tools</li>
          <li class="sel">Lighting Design Tool</li>
        </ul>
        <?php if ($page['highlighted']): ?>
        <div id="highlighted"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
        <?php print render($title_prefix); ?> <?php print render($title_suffix); ?>
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
        <!--breadcrumbs:start--> 
        
        <!--breadcrumbs:end-->
        
        <div class="sectionWrapper"> 
          <!--fullContentSection:start-->
          <div class="fullContentSection">
            <h1>Lighting<br>
              <span class="semiBold">Design Tool</span></h1>
            <p>The ultimate tool to help you make the right lighting selections for indoor spaces.</p>
            <div class="appStepSection">
              <ul class="steps">
                <li><span>Get Started</span></li>
                <li><span>Add Area Type</span></li>
                <li><span>Select Products</span></li>
                <li><span>Summary</span></li>
              </ul>
              <div class="stepContent">
                <h2>SELECT THE space <span class="semiBold">you are looking to design?</span></h2>
                <div class="designSelect">
                  <div class="group">
                    <h2>Office</h2>
                    <div class="imgBox"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/office-img.png" alt=""></div>
                    <div class="formBox">
                      <div class="row">
                        <label>Area</label>
                        <div class="field">
                          <div class="selBox">
                            <div class="selVal">Select Area</div>
                            <select id="officeArea" name="officeArea">
                              <?php echo getLightingAppAreas('Office'); ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label>Mounting Height</label>
                        <div class="field">
                          <div class="selBox">
                            <div class="selVal">Select Mounting Height</div>
                            <select id="offMountingHeight" name="offMountingHeight">
                              <?php echo getLightingAppMountingHeight('office'); ?>
                            </select>
                            <input id="offInd" type="hidden" value="Office">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="centerBtnGrp"><a class="arrowLink formBtn" id="officeProceed" href="javascript:;">Proceed <span class="arrowIco"></span></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="group">
                    <h2>Industry</h2>
                    <div class="imgBox"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/factory-img.png" alt=""></div>
                    <div class="formBox">
                      <div class="row">
                        <label>Area</label>
                        <div class="field">
                          <div class="selBox">
                            <div class="selVal">Select Area</div>
                            <select id="factoryArea" name="factoryArea">
                              <?php echo getLightingAppAreas('Factory'); ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label>Mounting Height</label>
                        <div class="field">
                          <div class="selBox">
                            <div class="selVal">Select Mounting Height</div>
                            <select id="mountingHeight" name="mountingHeight">
                              <?php echo getLightingAppMountingHeight('factory'); ?>
                            </select>
                            <input id="offInd" type="hidden" value="Office">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="centerBtnGrp"><a class="arrowLink formBtn" id="factoryProceed" href="javascript:;">Proceed <span class="arrowIco"></span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                
              <p class="lighting_text">To receive a personalized lighting design solution for your office or industrial layout, please <a href="javascript:;" class="lightAppClk clickHere">click here</a>.</p>
              
              </div>
              <div class="stepContent">
                <h2>SELECT <span class="semiBold">Office Area</span></h2>
                <div class="selectArea" id="addAreaType">
                  <ul>
                    <?php echo getLightingAppSubAreas(); ?>
                  </ul>
                  <div id="areaType" areaType="" style="display:none;"></div>
                  <div class="centerBtnGrp"> <a class="arrowLink backBtn" href="javascript:;" id="addAreaBack">Back <span class="arrowIco"></span></a> <a class="arrowLink formBtn" href="javascript:;" id="addAreaProceed">Proceed <span class="arrowIco"></span></a> </div>
                </div>
              </div>
              <div class="stepContent">
                <div class=""></div>
                <div class="selectLamp">
                  <div class="optionGroup">
                    <h2>SELECT <span class="semiBold">Type Of Lamp</span></h2>
                    <div class="radioList">
                      <div class="group">
                        <label for="led">LED</label>
                        <input id="led" type="radio" name="lampType" checked="checked" value="LED">
                        <span class="cheked"></span> </div>
                      <div class="group">
                        <label for="conventional">Conventional</label>
                        <input id="conventional" type="radio" name="lampType" value="Conventional">
                        <span class="uncheked"></span> </div>
                    </div>
                  </div>
                  <div class="optionGroup">
                    <h2>SELECT <span class="semiBold">Type Of Luminaire</span></h2>
                    <div class="radioList">
                      <div class="group">
                        <label for="recessed">Recessed</label>
                        <input id="recessed" type="radio" name="luminaireType" value="Recessed" checked="checked">
                        <span class="cheked"></span> </div>
                      <div class="group">
                        <label for="suspended">Suspended</label>
                        <input id="suspended" type="radio" name="luminaireType" value="Suspended">
                        <span class="uncheked"></span> </div>
                      <div class="group">
                        <label for="combo">Combo</label>
                        <input id="combo" type="radio" name="luminaireType" value="Combo">
                        <span class="uncheked"></span> </div>
                    </div>
                  </div>
                </div>
                <div class="selectProduct">
                  <h2></h2>
                  <div class="noProd" style="display:none">
                    <h2>No <span class="semiBold">Products to display</span></h2>
                  </div>
                  <div class="products sanCombo"></div>
                  <div class="products comboPck dnone"></div>
                  <div class="centerBtnGrp"> <a class="arrowLink backBtn" href="javascript:;">Back <span class="arrowIco"></span></a> <a class="arrowLink formBtn" href="javascript:;" id="selectProductsProceed">Proceed <span class="arrowIco"></span></a> </div>
                </div>
              </div>
              <div class="stepContent">
                <div class="summarySection">
                  <h2><span class="semiBold">Summary</span></h2>
                  <h3 id="breadcrum">Office +  Open Office +  LED +  Recessed +  Luminiares</h3>
                  <div class="summaryTable comboPck">
                    <table id="productSummary">
                      <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>&nbsp;</th>
                      </tr>
                    </table>
                    <a href="javascript:;" class="addProduct">Add Product <span class="plusIco">&nbsp;</span></a>
                    <div class="centerBtnGrp"><a href="javascript:;" class="addAnotherArea">add another area<span class="plusIco">&nbsp;</span></a></div>
                  </div>
                </div>
                <div class="viewDesign">
                  <h3>View Design Assumptions</h3>
                  <div class="viewDesignContent"> </div>
                </div>
                <div class="btnGrp"> <a href="<?php echo base_path().'resources/tools/lighting-design'; ?>" class="arrowLink formBtn">Start A New Project <span class="spireIcon newProjectIco"></span></a> <a href="javascript:;" class="arrowLink formBtn emailProject">Email Project <span class="spireIcon emailProjectIco"></span></a>
                  <div class="innerBtnGrp"> <a href="<?php echo base_path().'get-a-quote'; ?>" class="arrowLink formBtn requestBtn">Request For A Quote <span class="arrowIco"></span></a> <a href="javascript:;" class="arrowLink loginBtn <?php if($user->uid) { echo 'disableBtn';} ?>">Login/Register <span class="arrowIco"></span></a> </div>
                </div>
              </div>
            </div>
          </div>
          <!--fullContentSection:end--> 
        </div>
      </div>
      <!-- /#main --> 
    </div>
    <!-- /#container --> 
  </div>
</section>
<!--lightbox:start-->
<div class="lightbox lbEmailProject"> <a class="closeBtn"></a>
  <div class="form">
    <h2>Share Project <span class="semiBold">Via E-Mail</span></h2>
    <span class="thankYouMsg">Mail sent successfully</span>
    <div class="formData">
      <div class="clm">
        <div class="formIco"><span class="spireIcon nameIco"></span></div>
        <div class="field">
          <label>Sender's Name</label>
          <input id="sendersName" type="text" name="" value="">
          <span class="errorVisible">Please enter valid name</span> </div>
      </div>
      <div class="clm">
        <div class="formIco"><span class="spireIcon mobileIco"></span></div>
        <div class="field">
          <label>Project Name</label>
          <input id="projectName" type="text" name="" value="">
          <span class="errorVisible">Please enter valid project name</span> </div>
      </div>
      <div class="clm">
        <div class="formIco"><span class="spireIcon mailIco"></span></div>
        <div class="field">
          <label>Receiver's Email</label>
          <input id="toMail" type="text" name="" value="">
          <span class="errorVisible">Please enter valid email address</span> </div>
      </div>
      <div class="clm">
        <div class="formIco noBg"></div>
        <div class="field">
          <label>&nbsp;</label>
          <a id="sendMail" href="javascript:;" class="arrowLink formBtn">Send <span class="arrowIco"></span></a></div>
      </div>
    </div>
  </div>
</div>
<!--lightbox:end-->

<!--lignting design lightbox:start-->
<div class="lightbox lbLightingDesign"> <a class="closeBtn"></a>
<div class="thanxMsg">Thank You</div>
  <form id="myForm" action="<?php echo base_path(); ?>ajax-upload" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="queryForm">            
      <div class="formWrap">              
        <div class="fieldGroup">
          <div class="group">
            <div class="row">
              <div class="clm">
                <label>Name</label>
                <div class="field">
                  <input type="text" name="" value="" id="lightName" maxlength="50">
                  <span class="dnone fError errName">errors</span>
                </div>
              </div>
              <div class="clm">
                <label>Phone No.</label>
                <div class="field"> 
                  <input type="text" name="" value="" id="lightPhone" maxlength="10">
                  <span class="dnone fError errPhone">errors</span>
                </div>
              </div>
              <div class="clm">
                <label>Email Id</label>
                <div class="field">
                  <input type="text" name="" value="" id="lightMail" maxlength="50">
                  <span class="dnone fError errMail">errors</span>
                </div>
              </div>                            
            </div>
            <div class="row">
              <div class="clm uploadFileBox">
                <label>Upload File</label>
                <div class="field">
                  <input type="file" name="myfile" id="lightUpload" rel="">
                  <span class="dnone fError errUpload">errors</span>
                </div>
                
              </div>
              <div class="clm">
                <label>&nbsp;</label>
                <div class="field uploadFile">
                  <input type="submit" value="Upload" class="jobResumeUpload">
                </div>
                <div class="field removeFile">
                  <div class="fileName"></div>
                  <a href="javascript:;" class="removeUpload">Remove</a>
                </div>
              </div>
            </div>
            <div id="progress" class="dnone">
              <div id="bar" ></div>
              <div id="percent" class="dnone">0%</div>
              <div id="message" class="dnone fError"></div>
            </div>

            <div class="row capchBox">
              <div class="clm">
                <div class="field">
                  <div class="g-recaptcha" data-sitekey="6LfdChsTAAAAAMedO_GDChZ3BAGTFM7Cj6ar0ieY"></div>
                  <span class="fError captchaErr"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <a href="javascript:;" class="arrowLink resetBtn lightingFrmReset">Reset<span class="arrowIco"></span></a>
              <a href="javascript:;" class="arrowLink formBtn lightingFrm">Submit <span class="arrowIco"></span></a>
            </div>
            <div class="row">
              <p> In case the file size is more than 10 MB, please mail it to <a href="mailto:helpdesk.lighting@wipro.com ">helpdesk.lighting@wipro.com</a> </p>
            </div>
          </div>
        </div>
      </div>
    </div>
	</form> 
</div>
<!--lignting design :ends-->
<div class="overlay"></div>
<?php print render($page['header']); ?> 
<script type="text/javascript">
	function floorFigure(figure, decimals){
		 if (!decimals) decimals = 2;
		 var d = Math.pow(10,decimals);
		 return ((figure*d)/d).toFixed(decimals);
	}
	(function ($) {  // document ready starts
		// populate associate products
    
    $(".lightingFrmReset").click(function() {
      $("#lightName").val('');
      $("#lightPhone").val('');
      $("#lightMail").val('');
      $("#lightUpload").val('');
      $(".errName").text('');
      $(".errPhone").text('');
      $(".errUpload").text('');
      $(".errMail").text('');
      $(".captchaErr").css("display", "none");
      grecaptcha.reset();
    }); 
      
		$(document).on('click', '#officeProceed', function() {
			if($(this).parents(".formBox").find(".row").eq(0).find(".selVal").text() == 'Select Area') {
				return false;
      }
			$(".stepContent").eq(1).find(".semiBold").text("Office Area");
			$('#offInd').val('Office');
			$.ajax({
        type:'POST',
        url: Drupal.settings.basePath + 'lighting-app-office-sub-area',
				data: {area: 'Office'},
        success:function(data){
					$("#addAreaType ul").html('');
					$("#addAreaType ul").html(data);
        }
      });
		});
		
		$(document).on('click', '#factoryProceed', function() {
			$(".stepContent").eq(1).find(".semiBold").text("Industrial Area");
			$('#offInd').val('Factory');
			$.ajax({
        type:'POST',
        url: Drupal.settings.basePath + 'lighting-app-factory-sub-area',
				data: {area: 'Factory'},
        success:function(data){
					$("#addAreaType ul").html('');
					$("#addAreaType ul").html(data);
        }
      });
		});
		
		$(document).on('click', '.areaType', function() {
			if($(this).hasClass("disable")) { 
			} 
			else {
				var areaType = $(this).text();
				$(this).addClass('sel').siblings().removeClass('sel');
				$('#areaType').attr('areaType',areaType);
			}
		});
		
		
		/********************************Send Mail Starts****************************/
		$(document).on('change', '.field input', function() {
			$(this).parents('.field').find('.errorVisible').css('visibility','hidden');
		});
		$(document).on('click', '#sendMail', function() {
			var products = new Array();
			var areaDetail = new Array();
			var areas = new Array();
			var i = 0;
			var j = 0;
			var sendersName = $("#sendersName").val();
			var projectName = $("#projectName").val();
			var toMail = $("#toMail").val();
			if(!sendersName.trim() || !projectName.trim() || !toMail.trim()) {
				if(!sendersName.trim())
				{
					$("#sendersName").parents('.field').find('.errorVisible').css('visibility','visible');
				}
				if(!projectName.trim())
				{
					$("#projectName").parents('.field').find('.errorVisible').css('visibility','visible');
				}
				if(!toMail.trim())
				{
					$("#toMail").parents('.field').find('.errorVisible').css('visibility','visible');
				}
			} else {
				$.each($('#productSummary .indProduct'), function( index, value ) {
					products[i++] = {'lum_type':$(value).attr('lum-type'),'lamp_type':$(value).attr('lamp-type'),'product_img':$(value).find('.productImg img').attr('src'),'product_name':$(value).find('.productName .semiBold').text(),'product_code':$(value).find('.prodCode').text(),'product_quantity':$(value).find('.prodQuantity').text()}
				});
				
				$.each($('.viewDesignContent .group'), function( index, value ) {
					var areaTitle = $(value).find('.title').text();
					var k = 0;
					$.each($(value).find('.designDetails .clm .value'), function( index, value1 ) {
						areaDetail[k++] = $(value1).text();
					});
					areas[j++] = {'area_title':areaTitle,'percent_area':areaDetail[0],'maintance_factor':areaDetail[1],'wp_height':areaDetail[2],'reflectance_celling':areaDetail[3],'reflectance_floor':areaDetail[4],'reflectance_wall':areaDetail[5],'average_lux':areaDetail[6],'mounting_height':areaDetail[7]};
				});
				var productsJsonString = JSON.stringify(products);
				var areasJsonString = JSON.stringify(areas);
				
				$.ajax({
					type: "POST",
					dataType : "json",
					url: Drupal.settings.basePath + 'lighting-design-app/share-project-via-email',
					data: {'productsJsonString' : productsJsonString, 'areasJsonString' : areasJsonString,'sendersName' : sendersName,'projectName' : projectName,'toMail' : toMail},
					success: function(resp) {
						$(".formData").hide();
						$('.thankYouMsg').show();
						setTimeout(function() {
							//alert(1);
							//$('.closeBtn').trigger('click');
						}, 1000);
						//console.log(resp); 
					}
				});
			}
		});
		
		/********************************Send Mail Ends******************************/
		
		$(document).on('click', '#addAreaProceed', function() {
			$(".sanCombo").html('');
			$('.selectProduct .comboPck').html('');
			$(".selectProduct").find("h2").html('Select <span class="semiBold">a LED Product</span>');
			var proceedFurther = 0;
			var tempArr = [];
			var typeArr = [];
			var dataCount = 0;
			$.each($('.areaType'), function( index, value ) {
				if($(value).hasClass('sel') || $(value).hasClass('disable')) {
					proceedFurther = 1;
				} 
			});
			if(proceedFurther == 1) {
				$('.sel').removeClass('sel').addClass('disable'); 
				$('#areaType').attr('areaType',areaType);
				var areaType = $('#areaType').attr('areaType').trim(); 
				var officeArea = $('#officeArea').val();
				var mountingHeight = $('#mountingHeight').val();
				var factoryArea = $('#factoryArea').val();
				var offInd = $('#offInd').val();
				if(offInd == 'Office') {
          var mountingHeight = $('#offMountingHeight').val();
        } else {
					var mountingHeight = $('#mountingHeight').val();
				}
				var temp = '';
				$.ajax({
					type: "POST",
					async: "false",
					dataType : "json",
					url: Drupal.settings.basePath + 'lighting-design-app/get-products',
					data: {
							'areaType' : areaType,
							'officeArea' : officeArea,
							'mountingHeight' : mountingHeight,
							'factoryArea' : factoryArea,
							'offInd' : offInd
					},
					success: function(data) {
						//console.log(data.prod);
						/*$('.radioList').find('group').eq(0).each(function() {
							if($(this).find('input').attr('id') == 'led') {
                $(this).find('#led').attr('checked', 'checked');
								$(this).find('span').text('cheked');
              } else {
								$(this).find('span').text('uncheked');
							}
						});*/
						//$('.radioList .group').find('#led').find('span').text('cheked');
						count = 0;
						if(data.prod == null) {
              //alert('No products available');
							$("#selectProductsProceed").css("display", "none");
							$(".selectProduct").find("h2").html('No <span class="semiBold">Products to show</span>');
							
            } else {
							for(var i in data.prod) {
								dataCount ++;
								$("#selectProductsProceed").css("display", "inline-block");
								if($.inArray(data.prod[i].model, tempArr) != -1) {
									
								} else {
									//temp += '<div type= "'+ data[i].type +'" nid="'+ data[i].nid +'" class="group" uo="'+ data[i].uo +'" mounting-height="'+ data[i].mounting_height +'" percent-area="'+ data[i].percent_total_area +'"  sub-area-sft="'+ data[i].sub_area_sft +'"  length-ft="'+ data[i].length_ft +'"  width-ft="'+ data[i].width_ft +'"  area-type="'+areaType+'"  mf="'+ data[i].mf +'"  rc="'+ data[i].rc +'"  rw="'+ data[i].rw +'"  rf="'+ data[i].rf +'"  wp="'+ data[i].wp +'"  avg-lux="'+ data[i].avg_lux +'"  lum-type="'+ data[i].lum_type +'" lamp-type="' + data[i].lamp_type + '" data-at="' + data[i].title + '" 	prod_code="' + data[i].prod_code + '" data-model="' + data[i].model + '" data-image="' + data[i].image + '" data-qty="' + data[i].qty + '" set-it="0"><div class="productImg"><span class="checkedArrow">&nbsp;</span><img src="' + data[i].image + '"></div><div class="productContent"><h2><a href="'+ data[i].path +'">' + data[i].title + '</span></a></h2><p>' + data[i].model + '</p><p class="dsp">'+data[i].category+'</p><p>'+ data[i].variant +'</p></div></div>';
									temp += '<div type= "'+ data.prod[i].type +'" nid="'+ data.prod[i].nid +'" class="group" uo="'+ data.prod[i].uo +'" mounting-height="'+ data.prod[i].mounting_height +'" percent-area="'+ data.prod[i].percent_total_area +'"  sub-area-sft="'+ data.prod[i].sub_area_sft +'"  length-ft="'+ data.prod[i].length_ft +'"  width-ft="'+ data.prod[i].width_ft +'"  area-type="'+areaType+'"  mf="'+ data.prod[i].mf +'"  rc="'+ data.prod[i].rc +'"  rw="'+ data.prod[i].rw +'"  rf="'+ data.prod[i].rf +'"  wp="'+ data.prod[i].wp +'"  avg-lux="'+ data.prod[i].avg_lux +'"  lum-type="'+ data.prod[i].lum_type +'" lamp-type="' + data.prod[i].lamp_type + '" data-at="' + data.prod[i].title + '" 	prod_code="' + data.prod[i].prod_code + '" data-model="' + data.prod[i].model + '" data-image="' + data.prod[i].image + '" data-qty="' + data.prod[i].qty + '" set-it="0"><div class="productImg"><span class="checkedArrow">&nbsp;</span><img src="' + data.prod[i].image + '"></div><div class="productContent"><h2>' + data.prod[i].title + '</span></h2><p>'+ data.prod[i].variant +'</p></div></div>';
								}
								tempArr.push(data.prod[i].model);
							}

							$('.stepContent .selectProduct .sanCombo').html(temp);
							$(".selectProduct .comboPck").html(data.cmb_htm);
							
							
							
						}
						/*$("#addAreaType ul li").each(function() {
							if($(this).hasClass('disable')) {
                $(this).removeClass('disable');
              }
						});*/
						$("#led").click();
						$("#recessed").click();
					}
					
					//
				});
			} else {
				//alert('in');
				return false;
			}
		});
		
		$(document).on('click', '.deleteIco', function() {
			var indexToEnable = $(this).attr("rel");
			var indexToRemove = $(this).parents(".indProduct").index() - 1;
			$(this).parent().parent().remove();
			$(".viewDesignContent").find(".group").eq(indexToRemove).remove();
			if(!$(".indProduct").is(":visible")) {
				alert("No products to show");
			}
			$(".products").find(".group").eq(indexToEnable).removeClass("disable");
		});
		
		$(document).on('click', '.selectProduct .group', function() {
			if($(this).attr('set-it') == 0 && !$(this).hasClass('disable')) {
				$('.selectProduct .group').attr('set-it',0);
				$('.selectProduct .group').removeClass('sel');
				$(this).attr('set-it',1);
				$(this).addClass('sel');
			} else {
				$(this).attr('set-it',0);
				$(this).removeClass('sel');
			}
		});
	
		var areaType = '';
		
		$(document).on('click', '#selectProductsProceed', function() {
			var prodSelected = false;
			$(".products .group").each(function() {
				if($(this).hasClass('sel')) {
					prodSelected = true;
					areaType = $(this).attr('area-type');
					$('.areaType').each(function() {
						if($(this).find('p').text() == areaType) {
              $(this).addClass('disable');
							$(this).addClass('finito');
            }
					});
				}	
			});
			if (!prodSelected) {
        alert("Please select a LED product");
				return false;
      }
			
			var typeOfLuminair = $('input[name="luminaireType"]:checked').val();
			var typeOfLamp = $('input[name="lampType"]:checked').val();
			var areaType = $('#areaType').attr('areaType').trim();
			var breadcrum = '';
			var subArea = '';
			//alert(typeOfLuminair);
			if($('#officeArea').val() != '')
				breadcrum = 'Office';
			else
				breadcrum = 'Factory';
			breadcrum += ' + ' +  areaType;
			breadcrum += ' + ' +  typeOfLamp;
			breadcrum += ' + ' +  typeOfLuminair + ' + Luminair';
			console.log(breadcrum);
			$('#breadcrum').text(breadcrum); 
			
			//var typeOfLamp = $('#typeOfLamp').val();
			//var typeOfLuminair = $('#typeOfLuminair').val();
			var product = '';
			var tableContents = '';
			//alert(typeOfLuminair);
			
			if(typeOfLuminair == 'Combo') {
        $(".comboPck .group").each(function() {
					if($(this).attr('set-it') == 1) {
            $(this).attr('set-it', 0);
						$(this).addClass('disable');
						$(this).removeClass('sel');
						var image1 = $(this).find('.comboImg').eq(0).find("img").attr("src");
						var image2 = $(this).find('.comboImg').eq(1).find("img").attr("src");
						var title1 = $(this).find('.comboInfo').eq(0).find('h2').text();
						var title2 = $(this).find('.comboInfo').eq(1).find('h2').text();
						var variant1 = $(this).find('.comboInfo').eq(0).find('p').text();
						var variant2 = $(this).find('.comboInfo').eq(1).find('p').text();
						var qty = $(this).find('.productContent').attr('rel');
						tableContents += '<tr class="indProduct"><td><div class="productImg">';
            tableContents += '<div class="comboImg"><img alt="" src="'+image1+'"></div>';
						tableContents += '<div class="comboImg"><img alt="" src="'+image2+'"></div>';
						tableContents += '</div>';
						tableContents += '<div class="productName">';
						tableContents += '<div class="comboInfo">';
						tableContents += '<p class="title">'+ title1 +'</p>';
						tableContents += '<p class="code">'+ variant1 +'</p>';
						tableContents += '</div>';
						tableContents += '<div class="comboInfo">';
						tableContents += '<p class="title">'+ title2 +'</p>';
						tableContents += '<p class="code">'+ variant2 +'</p>';
						tableContents += '</div>';
						tableContents += '</div></td><td>'+ qty +'</td>';
						tableContents += '<td><span class="deleteIco">&nbsp;</span></td></tr>';
						subArea += '<div class="group"><p class="title">'+$(this).find(".comboInfo").eq(0).attr('sub_area')+'</p><div class="designDetails">';
						subArea += '<div class="clm"><label>Percent of Area</label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('percent_total_area')+'%</span> </div>';
						subArea += '<div class="clm"><label>Maintainance Factor</label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('mf')+'</span> </div>';
						subArea += '<div class="clm"><label>Work Plane Height</label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('wp')+'</span> </div>';
						subArea += '<div class="clm"><label>Reflectance of Celling</label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('rc')+'%</span> </div>';
						subArea += '<div class="clm"><label>Reflectance of Floor</label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('rf')+'%</span> </div>';
						subArea += '<div class="clm"><label>Reflectance of Wall</label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('rw')+'%</span> </div>';
						subArea += '<div class="clm"><label>Average Lux</label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('avg_lux')+'</span> </div>';
						subArea += '<div class="clm"><label>Mounting Height</label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('mh')+'</span> </div>';
						if($(this).find(".comboInfo").eq(0).attr('uo') == 'null') {
							subArea += '<div class="clm"><label>Uniformity </label><span class="value">0</span> </div>';
						} else {
							subArea += '<div class="clm"><label>Uniformity </label><span class="value">'+$(this).find(".comboInfo").eq(0).attr('uo')+'</span> </div>';
						}
						subArea += '</div></div>';
          }
					
				});
      } else {
				$.each($('.selectProduct .group'), function( index, value ) {
					if($(value).attr('set-it') == 1) {
						$(value).attr('set-it',0);
						$(value).addClass('disable');
						$(value).removeClass('sel');
						tableContents +=  '<tr class="indProduct" lum-type="'+ $(value).attr('lum-type') +'" lamp-type="' + $(value).attr('lamp-type') + '"><td><div class="productImg"><img src="'+$(value).attr('data-image')+'"></div><div class="productName"><div class="prodInfo"><p class="title"> <span class="semiBold">'+ $(value).attr('data-at') +'</span></p><p class="code">'+ $(value).attr('prod_code') +'</p></div></div></td><td class="prodQuantity">'+ $(value).attr('data-qty') +'</td><td><span class="deleteIco" rel="'+index+'">&nbsp;</span></td></tr>';
						subArea += '<div class="group"><p class="title">'+$(value).attr('area-type')+'</p><div class="designDetails">';
						subArea += '<div class="clm"><label>Percent of Area</label><span class="value">'+$(value).attr('percent-area')+'%</span> </div>';
						subArea += '<div class="clm"><label>Maintainance Factor</label><span class="value">'+$(value).attr('mf')+'</span> </div>';
						subArea += '<div class="clm"><label>Work Plane Height</label><span class="value">'+$(value).attr('wp')+'</span> </div>';
						subArea += '<div class="clm"><label>Reflectance of Celling</label><span class="value">'+$(value).attr('rc')+'%</span> </div>';
						subArea += '<div class="clm"><label>Reflectance of Floor</label><span class="value">'+$(value).attr('rf')+'%</span> </div>';
						subArea += '<div class="clm"><label>Reflectance of Wall</label><span class="value">'+$(value).attr('rw')+'%</span> </div>';
						subArea += '<div class="clm"><label>Average Lux</label><span class="value">'+$(value).attr('avg-lux')+'</span> </div>';
						subArea += '<div class="clm"><label>Mounting Height</label><span class="value">'+$(value).attr('mounting-height')+'</span> </div>';
						if($(value).attr('uo') == 'null') {
							subArea += '<div class="clm"><label>Uniformity </label><span class="value">0</span> </div>';
						} else {
							subArea += '<div class="clm"><label>Uniformity </label><span class="value">'+$(value).attr('uo')+'</span> </div>';
						}
						subArea += '</div></div>';
					}
				});
      }
			
			
			$('#productSummary').append(tableContents);
			$('.viewDesignContent').append(subArea);
			$(".summaryTable").removeClass('dnone');
		});
		
		$(document).on('click', 'input[name="luminaireType"]', function() {
			var visible = false;
			var typeOfLamp = $('input[name="lampType"]:checked').val();
			var typeOfLuminair = $('input[name="luminaireType"]:checked').val();
			//alert(typeOfLamp);
			//alert(typeOfLuminair);
			if(typeOfLuminair == 'Combo') {
				//if('.stepContent').is(':visible') {
					$(".comboPck .group").each(function() {
						$(this).removeAttr("style");
					});
					if(!$(".sanCombo").hasClass("dnone")) {
						//alert('i am in');
						$(".sanCombo").addClass("dnone");
					}
					if($(".comboPck").hasClass("dnone")) {
						$(".comboPck").removeClass("dnone");
					}
					$(".comboPck .group").each(function() {
						if(!$(this).hasClass(typeOfLamp)) {
							$(this).css("display", "none");
						}
						if($(this).is(":visible")) {
							visible = true;
						}
					});
					if(visible) {
						$("#selectProductsProceed").css("display", "inline-block");
						$(".selectProduct").find("h2").first().html('Select <span class="semiBold">a LED Product</span>');
					} else {
						$("#selectProductsProceed").css("display", "none");
						$(".selectProduct").find("h2").first().html('No <span class="semiBold">Products to show</span>');
					}
				//}
      } else {
				if($(".sanCombo").hasClass("dnone")) {
          $(".sanCombo").removeClass("dnone");
        }
				if(!$(".comboPck").hasClass("dnone")) {
          $(".comboPck").addClass("dnone");
        }
				$.each($('.selectProduct .group'), function( index, value ) {
					if($(value).attr('lum-type') == typeOfLuminair && $(value).attr('lamp-type') == typeOfLamp) {
						$(value).css('display','block');
					}
					else {
						$(value).css('display','none');
					}
				});
				$(".products .group").each(function() {
					if($(this).is(":visible")) {
						visible = true;
					}
				});
				if(visible) {
					$("#selectProductsProceed").css("display", "inline-block");
					$(".selectProduct").find("h2").first().html('Select <span class="semiBold">a LED Product</span>');
				} else {
					$("#selectProductsProceed").css("display", "none");
					$(".selectProduct").find("h2").first().html('No <span class="semiBold">Products to show</span>');
				}
			}
			
			
			
			
		});
		
		$(".selectProduct .backBtn").click(function() {
			$("#led").click();
			$("#recessed").click();
			$(".areaType").each(function() {
				if($(this).hasClass('disable')) {
					if(!$(this).hasClass('finito')) {
						$(this).removeClass('disable');
						$(this).addClass('sel');
          }
        }
			});
			if($(".selectProduct .sanCombo").hasClass('dnone')) {
        $(".selectProduct .sanCombo").removeClass('dnone')
      }
			if(!$(".selectProduct .comboPck").hasClass('dnone')) {
        $(".selectProduct .comboPck").addClass('dnone')
      }
		});
		
		$(document).on('click', 'input[name="lampType"]', function() {
			var visible = false;
			var typeOfLamp = $('input[name="lampType"]:checked').val();
			var typeOfLuminair = $('input[name="luminaireType"]:checked').val();
			//alert(typeOfLamp);
			//alert(typeOfLuminair);
			if(typeOfLuminair == 'Combo') {
				if(!$(".sanCombo").hasClass("dnone")) {
          $(".sanCombo").addClass("dnone");
        }
				if($(".comboPck").hasClass("dnone")) {
          $(".comboPck").removeClass("dnone");
        }
				$(".comboPck .group").each(function() {
					if($(this).hasClass(typeOfLamp)) {
            $(this).removeAttr("style");
          } else {
						$(this).css("display", "none");
					}
					if($(this).is(":visible")) {
						visible = true;
					}
				});
				
				$(".comboPck .group").each(function() {
					if($(this).is(":visible")) {
						visible = true;
					}
				});
				if(visible) {
					$("#selectProductsProceed").css("display", "inline-block");
					$(".selectProduct").find("h2").first().html('Select <span class="semiBold">a LED Product</span>');
				} else {
					$("#selectProductsProceed").css("display", "none");
					$(".selectProduct").find("h2").first().html('No <span class="semiBold">Products to show</span>');
				}
				
				
        
      } else {
				$.each($('.selectProduct .group'), function( index, value ) {
					if($(value).attr('lum-type') == typeOfLuminair && $(value).attr('lamp-type') == typeOfLamp) {
						$(value).css('display','block');
					}
					else {
						$(value).css('display','none');
					}
				});
				$(".products .group").each(function() {
					if($(this).is(":visible")) {
						visible = true;
					}
				});
				if(visible) {
					$("#selectProductsProceed").css("display", "inline-block");
					$(".selectProduct").find("h2").first().html('Select <span class="semiBold">a LED Product</span>');
				} else {
					$("#selectProductsProceed").css("display", "none");
					$(".selectProduct").find("h2").first().html('No <span class="semiBold">Products to show</span>');
				}
			}
			
		});
		
		
		/*$(document).on('click', 'input[type="radio"]', function() {
			$(".selectProduct h2").eq(0).css('display', 'block');
			$(".noProd").css("display", "none");
			var isProd = false;
			$(".products .group").each(function() {
				if(!$(this).css('display') == 'none'){ 
					isProd = true;
				} 
			});
			alert(isProd);
			if(!isProd) {
				//$(".selectProduct h2").eq(0).css('display', 'none');
        //$(".noProd").css("display", "block");
      }
		});*/
		
		
	})(jQuery);  // end of document ready
	
</script>