<?php //echo ip_address(); ?>
<!-- Start Header -->
<?php global $user; ?>
<?php
	if($user->uid == 0) {
		if(!isset($_SESSION['first_visit'])) {
			drupal_goto('inter');
		}
	}
?>
<?php print render($page['case_studies']); ?>

<header>
<div class="loaderOverlay"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/loading.gif" alt=""></div>

  <div class="container relative">
    <div class="logo">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo">
      <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    </div>
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
          <li class="contactI"><a href="<?php echo base_path(); ?>delighted-to-assist/support-form">Delighted to assist</a></li>
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
              <?php if(arg(0) == 'applications'): ?>
              <a class="active" href="javascript:;">Applications </a>
              <?php else: ?>
              <a href="javascript:;">Applications </a>
              <?php endif; ?>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_apps']); ?> </div>
            </li>
            <li><a href="javascript:;">Products </a>
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
            <li><a href="javascript:;">Resources </a>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_resources']); ?> </div>
            </li>
            <li><a href="javascript:;">Innovation in Lighting </a>
              <div class="menuPopup">
                <div class="popXbtn"><a class="" href="javascript:;"></a></div>
                <?php print render($page['menu_innovate']); ?> </div>
            </li>
            <li><a href="javascript:;">About Us </a>
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

<div id="container" class="clearfix"> 
  <!--<div id="map"style="height:350px;width:1350px;"></div>
  <div id="main" role="main" class="clearfix">
    <?php //print $messages; ?>
    <a id="main-content"></a>
    <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
    <?php print render($title_prefix); ?>
    <?php //if ($title): ?><h1 class="title" id="page-title"><?php //print $title; ?></h1><?php //endif; ?>
    <?php print render($title_suffix); ?>
    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
  </div> <!-- /#main --> 
</div>
<!-- /#container -->

<section> 
  <!--<div id="map" style="height:420px;width:100%; "> </div>-->
  <div class="homePageRoll"> <a class="prv Off" href="javascript:;"></a>
    <div class="slideBox">
      <div class="sliderDiv"> <?php print render($page['banner']); ?>
        <div class="slide wwl">
          <div class="copyBox">
            <div class="title">
              <h2><span class="open_sanslight">Why</span> Wipro
                Lighting</h2>
            </div>
            <div class="listData">
              <div class="data">
                <div class="thum quality"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/technology-oriented.png" alt="Quality Assurance"></div>
                <h3>Technology Oriented</h3>
                <p>We pride ourselves in offering the latest and best in-class LED luminaires that are efficient, eco-sustainable and reliable.</p>
              </div>
              <div class="data">
                <div class="thum technology"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/design-driven.png" alt="Technology Oriented"></div>
                <h3>Design driven</h3>
                <p>All our products are engineered with exceptional design and a keen eye on aesthetics and functionality. </p>
              </div>
              <div class="data">
                <div class="thum invDesign"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/customer-centric.png" alt="Design &amp; Innovation"></div>
                <h3>Customer-centric</h3>
                <p>We are driven to reach out to our customers, understand their needs and deliver excellent lighting solutions consistently. </p>
              </div>
            </div>
          </div>
          <a class="viwMore sansbold" href="<?php echo base_path(); ?>about-us/wipro-lighting/why-wipro-lighting">View more <span class="arow"></span></a>
          <div class="led-edge lbLedEdgeClick"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/led-edge-con.png" alt=""></div>
        </div>
        <div class="slide ilp">
          <div class="copyBox">
            <div class="title">
              <h2><span class="open_sanslight">What's </span> New</h2>
            </div>
            <div class="listData">
              <div class="innovativeBox">
                <div class="dotSlideBox">
                  <div class="dotSlide">
                    <div class="dotWrap">
                      <div class="thum"> <img src="<?php echo base_path(); ?>sites/all/themes/framework/images/Product1.png" alt=""> </div>
                      <div class="info">
                        <h2 class="centerLine">Our Lighting <span class="sansbold">Innovations</span></h2>
                        <h3>Right Light Philosophy</h3>
                        <p>Complete solutions to create dynamic lighting environments with enhanced efficiency.</p>
                        <a class="btnBox whtBtn red" href="<?php echo base_path(); ?>innovation-in-lighting/right-light-philosophy"><span class="arow"></span></a> </div>
                    </div>
                    <div class="dotWrap">
                      <div class="thum"> <img src="<?php echo base_path(); ?>sites/all/themes/framework/images/Product1.png" alt=""> </div>
                      <div class="info">
                        <h2 class="centerLine">Our Lighting <span class="sansbold">Innovations</span></h2>
                        <h3>Smart Lighting Solution</h3>
                        <p></p>
                        <a class="btnBox whtBtn red" href="<?php echo base_path(); ?>innovation-in-lighting/smart-lighting"><span class="arow"></span></a> </div>
                    </div>
                    <div class="dotWrap">
                      <div class="thum"> <img src="<?php echo base_path(); ?>sites/all/themes/framework/images/Product1.png" alt=""> </div>
                      <div class="info">
                        <h2 class="centerLine">Our Lighting <span class="sansbold">Innovations</span></h2>
                        <h3>Force Green - Leadership in Green Building Lighting</h3>
                        <p></p>
                        <a class="btnBox whtBtn red" href="<?php echo base_path(); ?>innovation-in-lighting/force-green-lighting-design"><span class="arow"></span></a> </div>
                    </div>
                  </div>
                  <div class="dotBtns"> </div>
                </div>
              </div>
              <div class="latestBox">
                <div class="dotSlideBox">
                  <div class="dotSlide"><?php print render($page['inspired_lighting_products']); ?></div>
                  <div class="dotBtns"> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="led-edge lbLedEdgeClick"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/led-edge-con.png" alt=""></div>
        </div>
        <div class="slide wla">
          <div class="copyBox">
            <div class="title">
              <h2><span class="open_sanslight">Why </span> LED</h2>
            </div>
            <div class="listData">
              <div class="data">
                <div class="thum efficiency"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-efficiency.png" alt=""></div>
                <h3>Efficiency</h3>
              </div>
              <div class="data">
                <div class="thum lsl"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-long-service-life.png" alt=""></div>
                <h3>Long Service life, low maintenance </h3>
              </div>
              <div class="data">
                <div class="thum gbd"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-green-by-design.png" alt=""></div>
                <h3>Green by design - No Mercury content</h3>
              </div>
              <div class="data">
                <div class="thum noUv"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-no-uv.png" alt=""></div>
                <h3>No UV/IR radiation</h3>
              </div>
              <div class="data">
                <div class="thum excellent"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-excellent-rendering.png" alt=""></div>
                <h3>Excellent colour rendering</h3>
              </div>
              <div class="data">
                <div class="thum controlled"><img src="<?php echo base_path(); ?>sites/default/files/staticimgs/icon-controlled-focus.png" alt=""></div>
                <h3>Controlled focus</h3>
              </div>
            </div>
          </div>
          <a class="viwMore sansbold" href="<?php echo base_path(); ?>resources/why-led">View more <span class="arow"></span></a>
          <div class="led-edge lbLedEdgeClick"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/led-edge-con.png" alt=""></div>
        </div>
        <div class="slide ae">
          <div class="copyBox">
            <div class="title">
              <h2><span class="open_sanslight">Awards</span> And News</h2>
            </div>
            <div class="listData">
              <div class="awardsBox">
                <div class="textBox">
                  <div class="thum"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/awards_recognitions.png" alt=""> </div>
                  <div class="info">
										
                    <h2 class="centerLine">Awards &amp; <span class="sansbold">Recognitions</span> </h2>
										<?php echo wipro_latest_award(); ?>
                    <!--<h3> <span class="sansbold">Wipro Wins The</span>'India Design Mark-2015' Award <span class="sansbold">For its Stylish And Best-in-</span> <span class="sansbold">Class LED Luminaires.</span></h3>-->
                    
                    <!--<a href="javascript:;" class="btnBox ylow"><span class="arow"></span></a>--> 
                  </div>
                </div>
                <a href="<?php echo base_path(); ?>about-us/wipro-lighting/awards-and-recognitions" class="viwMore">View Awards & Recognitions <span class="arow"></span></a> </div>
              <!--<div class="latestNewsBox">
                  <div class="rotetBg"><img src="<?php //echo base_path(); ?>sites/all/themes/framework/images/latestNewsBg.png" alt=""></div>
                  <div class="textBox">
                    <h2 class="centerLine">Latest <span class="sansbold">News and Events</span> </h2>
                    <h3>Let There Be Light</h3>
                    <p>Bangalore-November 22, 2005</p>
                    <a href="javascript:;" class="btnBox white"><span class="arow"></span></a> </div>
                  <a href="javascript:;" class="viwMore">View Events <span class="arow"></span></a>
								</div>--> 
              <?php print render($page['awards_and_events']); ?> </div>
          </div>
          <div class="led-edge lbLedEdgeClick"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/led-edge-con.png" alt=""></div>
        </div>
        <div class="slide fns">
          <div class="copyBox">
            <div class="title">
              <h2><span class="open_sanslight">Our </span>Channel Network </h2>
              
            </div>
            <div class="listData">
              <div id="map"style="height:350px;width:100%"> </div>
              <!--<div class="mapBtn"><a href="<?php echo base_path(); ?>dealer-locator/channel-partner" class="viwMore">Locate Us <span class="arow"></span></a> </div>
              <div class="locatebox">
								
								<h2 class="centerLine">Locate <span class="sansbold">Now</span> </h2>
								<div class="thum"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/maptum.png" alt=""></div>
								<a class="btnBox linBlank" href="javascript:;"><span class="arow"></span></a>
							</div>--> 
                            
								<p class="mapLink">
									<a href="<?php echo base_path(); ?>dealer-locator/our-office" class="viwMap">Locate a Sales Office/Channel Partner
									<span class="arow"></span>
									</a>
								</p>
            </div>
          </div>
          <div class="led-edge lbLedEdgeClick"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/led-edge-con.png" alt=""></div>
        </div>
      </div>
    </div>
    <a class="nex" href="javascript:;"></a> </div>
  <div class="paginav">
    <div class="pagiBar">
      <ul class="pagination">
        <li class="homeNav sel">
          <div class="linkName">Home</div>
        </li>
        <li class="wwlNav">
          <div class="linkName"><span class="light">Why</span> Wipro Lighting</div>
        </li>
        <li class="ilpNav">
          <div class="linkName"><span class="light">What's</span> New</div>
        </li>
        <li class="wlaNav">
          <div class="linkName"><span class="light">Why</span> LED</div>
        </li>
        <li class="aeNav">
          <div class="linkName"><span class="light">Awards</span> And News</div>
        </li>
        <li class="fnsNav">
          <div class="linkName"><span class="light">Where</span> to buy</div>
        </li>
      </ul>
      <div class="animDiv">
        <ul>
          <li class="homeNav"> </li>
          <li class="wwlNav"> </li>
          <li class="ilpNav"> </li>
          <li class="wlaNav"> </li>
          <li class="aeNav"> </li>
          <li class="fnsNav"> </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="overlay"></div>
<?php print get_LEDEDGE_popup_box(); ?> <?php print render($page['header']); ?>
<div class="feedbackPopup"> <a class="closeBtn"></a>
  <div class="feedbackPopupInner">
    <div class="feedbackContent">
      <p>We appreciate your valuable feedback to help us enhance your experience.</p>
      <div class="centerBtnGrp"><a class="getStartedBtn" href="javascript:;">Get Started</a></div>
    </div>
  </div>
</div>
<div class="lightbox lbFeedbackForm" tabindex="-1"> <a class="closeBtn"></a>
  <h2>Feedback <span class="semiBold">Form</span></h2>
  <div class="thanxMsg dnone">Thank You</div>
  <div class="feedbackForm">
    <div class="row">
      <div class="clm">
        <label>How would you classify your feedback about our website?</label>
        <div class="fields">
          <div class="selBox">
            <div class="selVal">Select</div>
            <select id="classific">
              <option>Select</option>
              <option>Needs Improvement</option>
              <option>Meets your requirement</option>
              <option>Like it</option>
              <option>Loved the experience!</option>
            </select>
            <div class="dnone fError errCat"></div>
          </div>
        </div>
      </div> 
      <div class="clm">
        <label>Is there a specific feedback about our website?</label>
        <div class="fields">
          <div class="selBox">
            <div class="selVal">Select</div>
            <select id="feedView">
              <option value="0">Select</option>
              <option value="1">Suggest your views</option>
              <option value="2">Compliment</option>
              <option value="3">Report an error</option>
              <option value="4">Other feedback</option>
            </select>
            <div class="dnone fError errView"></div>
          </div>
        </div>
      </div>     
    </div>
    <div class="row">
     
      <div class="clm feedTxt">
        <div class="group dnone">
        	<label>Please share your opinion with us</label>
            <div class="fields">
              <textarea id="feedBackTxt"></textarea>
            </div>
            <div class="dnone fError errTxt"></div>
        </div>
        <div class="group dnone">
        	<label>Please share your delightful experience with us</label>
            <div class="fields">
             <textarea id="feedBackTxt"></textarea>
            </div>
            <div class="dnone fError errTxt"></div>
        </div>
        <div class="group dnone">
        	<label>Please elaborate on the error encountered</label>
            <div class="fields">
              <textarea id="feedBackTxt"></textarea>
            </div>
            <div class="dnone fError errTxt"></div>
        </div>
        <div class="group dnone">
        	<label>Please mention your views here</label>
            <div class="fields">
             <textarea id="feedBackTxt"></textarea>
            </div>
            <div class="dnone fError errTxt"></div>
        </div>
      </div>      
    </div>
    <div class="row">
    <div class="clm">
        <label>Was there a specific purpose of your visit today?</label>
        <div class="fields">
          <div class="selBox">
            <div class="selVal">select</div>
            <select id="feedPurpose">
              <option>Select</option>
              <option>Learn about our lighting product/services</option>
              <option>Compare our offerings</option>
              <option>Locate our Sales offices/Channel Partners</option>
              <option>Contact our service team</option>
              <option>Others</option>
            </select>
            <div class="dnone fError errPurpose"></div>
          </div>
        </div>
      </div>
      <div class="clm">
        <label>Was the purpose of your visit accomplished?</label>
        <div class="fields">
          <div class="radioBtnWrap">
            <div class="group">
              <input id="yes" type="radio" name="thinkRadio" value="yes" checked="chceked"/>
              <label for="yes">Yes</label>
            </div>
            <div class="group">
              <input id="no" type="radio" name="thinkRadio" value="no" />
              <label for="no">No</label>
            </div>
            <div class="dnone fError errRadio"></div>
          </div>
        </div>
      </div>      
    </div>
    <div class="row">
    	<div class="clm">
        <label>Which one of the following options best describes your profession/role?</label>
        <div class="fields">
          <div class="selBox">
            <div class="selVal">select</div>
            <select id="feedOptions">
              <option>Select</option>
              <option>Architect</option>
              <option>Channel Partner/Dealer</option>
              <option>Project Management Consultant</option>
              <option>Electrical Consultant</option>
              <option>Electrical Contractor</option>
              <option>Customer</option>
              <option>Others</option>
            </select>
            <div class="dnone fError errPro"></div>
          </div>
        </div>
      </div>
      <div class="clm">
        <label>We would love to get back to you, please leave your email below:</label>
        <div class="fields">
          <input type="text" value="" id="feedMail"/>
        </div>
        <div class="dnone fError errMail"></div>
      </div>
    </div>
    
    <div class="row capchBox" rel="0";>
      <div class="clm">
      <?php /*?><label>Enter Captcha code:</label><?php */?>
      <div class="fields">
        <div class="g-recaptcha" data-sitekey="6LfdChsTAAAAAMedO_GDChZ3BAGTFM7Cj6ar0ieY"></div>
        <span class="fError captchaErr dnone">Please enter correct Captcha Code</span>
			</div>
      </div>
    </div>
    
    <p>Your email address will only be used to send you feedback and will be processed according to our privacy statement.</p>
    <div class="row">
    <div class="clm">
      <a class="arrowLink formBtn feedBackFrmSubmit" href="javascript:;" class="feedBackFrmSubmit" id="sendMail" onclick="">Send <span class="arrowIco"></span></a><div class=" dnone submitLoader"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/submit_loader.gif" id="" class=""/></div>
			<!--<div class=" dnone submitLoader">
				<img src="<?php echo base_path(); ?>sites/all/themes/framework/images/submit_loader.gif" id="" class=""/>
			</div>-->
      </div>
    </div>
  </div>
</div>
