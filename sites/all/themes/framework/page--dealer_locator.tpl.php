<!-- Start Header -->

<?php $curpath = explode('/', drupal_lookup_path('alias',current_path())); ?>
<?php if(empty($curpath[0])) { $curpath = explode('/', current_path()); } ?>
<?php
	global $user;
	
	$user_name = db_query("SELECT field_first_name_value FROM {field_data_field_first_name} WHERE entity_id=:arg", array(':arg' => $user->uid))->fetchField();
	$contact_number = db_query("SELECT field_contact_no__value FROM {field_data_field_contact_no_} WHERE entity_id=:arg", array(':arg' => $user->uid))->fetchField();
	if($user->uid) {
		$name = $user_name;
		$mail = $user->mail;
		$contact = $contact_number;
	} else {
		$name = '';
		$mail = '';
		$contact = '';
	}


?>
<header>
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
				<a href="<?php echo base_path(); ?>dealer-locator/our-office" <?php if(arg(1) =='our-office') { echo 'class="active"'; } ?>>Our Office</a>
				<a href="<?php echo base_path(); ?>dealer-locator/channel-partner" <?php if(arg(1) =='channel-partner') { echo 'class="active"'; } ?>>Channel Partner</a>
			</div>
		</div>
	</div>
	<!--topBar:end--> 
	<!--contentMaster:start-->
  <div class="contentMaster">
		<div id="container" class="clearfix container">
			<div id="main" role="main" class="clearfix">
				<?php print $messages; ?>
					<ul class="breadcrumbs">
						<li><a href="<?php print $front_page; ?>">Home</a></li>
						<li class="noBcLink">Where to Buy</li>
						<?php if(arg(1) == 'our-office'): ?>
							<li class="sel">Sales Office</li>
						<?php else: ?>
							<li class="sel"><?php echo str_replace('-', ' ', arg(1)); ?></li>
						<?php endif; ?>
					</ul>
				
				<a id="main-content"></a>
				<?php if ($page['highlighted']): ?>
					<div id="highlighted">
						<?php print render($page['highlighted']); ?>
					</div>
				<?php endif; ?>
				<?php print render($title_prefix); ?>

				<?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
				<?php print render($page['help']); ?>
				<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				<?php print render($page['content']); ?>
			</div> <!-- /#main -->
			 
				<div class="sectionWrapper"> 
          <!--locationFinder:start-->
          <div class="locationFinder">
            <div class="lgt">
              <div class="fields">
								<?php if(isset($_GET['clk'])): ?>
									<input id="pin" type="tel" placeholder="Enter Your Postal Code" value="411005" autocomplete="false">
								<?php else: ?>
									<input id="pin" type="tel" placeholder="Enter Your Postal Code" autocomplete="false">
								<?php endif; ?>
              </div>
              <span class="or">OR</span>
              <div class="fields">
                <input id="city" type="text" placeholder="Enter Your Location (City, State)" autocomplete="false">
              </div>
            </div>
            <div class="rgt">
              <div class="boxBtn locateCon"><a href="javascript:;">Use Current Location <span class="fa fa-location-arrow"></span> </a></div>
              <div class="boxBtn arowNext"> <a href="javascript:;" class="arrowLink formBtn locate">Locate <span class="arrowIco"></span></a> </div>
            </div>
          </div>
          <!--locationFinder:end--> 
          
          <!--locationFinder:start-->
          <div class="mapBox">
            <div class="addressList">
							<a href="javascript:;" class="moIcons mapLocate"><span class="fa fa-location-arrow"></span> </a>
              <div class="title">
								<?php if(arg(1) =='our-office') { ?>
									<h3>View our <span class="semiBold">offices network</span></h3>
								<?php } else { ?>
									<h3>View channel <span class="semiBold">partner network</span></h3>
								<?php } ?>
              </div>
              <div class="innerbox scroll-pain"></div>
            </div>
            <div class="addressMap">
							<a href="javascript:;" class="moIcons mapList"><span class="fa fa-map"></span> </a>
							<div id="map"></div>
						</div>
          </div>
          <!--locationFinder:end--> 
          
          <!--formSection:start-->
          <div class="box2 formSection">
            <div class="formLeft">
              <a href="<?php echo base_path(); ?>delighted-to-assist/support-form">
			  <div class="group">
                <h2>Delighted To <span class="semiBold">Assist</span></h2>
                <div class="thum"><img src="<?php echo base_path(); ?>sites/all/themes/framework/images/assist-thum.jpg" alt=""></div>
                <p>If you have a question or need assistance by a 
                  professional, contact us and let our staff help you. </p>
              </div>
			  </a>
            </div>
            <div class="formRight">
              <div class="form">
                <h2>Get a <span class="semiBold">Call Back</span></h2>
                <div class="formData">
                <form action="<?php echo base_path().current_path(); ?>" method="POST">
								<div class="lefSide">
                  <div class="row">
                    <div class="formIco"><span class="spireIcon nameIco"></span></div>
                    <div class="field">
                      <input id="name" type="text" value="<?php echo $name; ?>" placeholder="*Name" maxlength="50" minlength="2" autocomplete="false">
											<span class="errorVisible">Please enter valid name</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="formIco"><span class="spireIcon mailIco"></span></div>
                    <div class="field">
                      <input id="email" type="text" value="<?php echo $mail; ?>" placeholder="*E-mail" maxlength="50" minlength="6" autocomplete="false">
											<span class="errorVisible">Please enter valid email</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="formIco"><span class="spireIcon mobileIco"></span></div>
                    <div class="field">
                      <input id="mobile" type="tel" value="<?php echo $contact; ?>" placeholder="*Mobile Number" maxlength="10" minlength="10" autocomplete="false">
											<span class="errorVisible">Please enter valid mobile number</span>
                    </div>
                  </div>
									<div class="row">
                    <div class="formIco"><span class="spireIcon cityIco"></span></div>
                    <div class="field">
                      <input id="frmcity" type="text" value="" placeholder="*City" maxlength="25" minlength="3" autocomplete="false">
											<span class="errorVisible">Please enter valid city name</span>
                    </div>
                  </div>
                  </div>
								<div class="rgtSide">
									<div class="row capchBox">
										<div class="g-recaptcha" data-sitekey="6LfdChsTAAAAAMedO_GDChZ3BAGTFM7Cj6ar0ieY"></div>
									</div>
									<div class="row capchBox">
                    <div class="clm">
											<div class="input-group">
												<div class="g-recaptcha" data-sitekey="6LfdChsTAAAAAMedO_GDChZ3BAGTFM7Cj6ar0ieY"></div>
												<span class="captchaErr dnone"></span>
											</div>
										</div>
									</div>
                  <div class="row"> <a id="submitThis" class="arrowLink formBtn" href="javascript:;">Send <span class="arrowIco"></span></a></div></div>
                </form>
								</div>
                <span class="thankYouMsg">Thank you for getting in touch with us. We will get back to you shortly.</span>
              </div>
            </div>
            <a href="<?php echo base_path(); ?>delighted-to-assist/support-form" class="arrowLink">Fill the Query Form <span class="arrowIco"></span></a> </div>
          <!--formSection:end--> 
        </div>
		</div> <!-- /#container -->
	</div>
</section>
<div class="overlay"></div>
<?php print render($page['header']); ?>
