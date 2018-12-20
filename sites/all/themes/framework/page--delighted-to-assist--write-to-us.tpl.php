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
						<a class="searchIcon" href="javascript:;"> </a>
					</div>
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
      <div id="main" role="main" class="registerPage"> <?php print $breadcrumb; ?> 
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <div class="sectionWrapper">
					<div class="fullContentSection">
						<h1>Write <span class="semiBold">to Us</span></h1>
						<p class="bold">Have a question that should be answered by a professional?<br>
            Contact us and let our staff help you through the following ways.</p> 
						<div class="queryForm">
							<div class="formWrap">
								<div class="successMsg"><?php print $messages; ?></div>
								<?php print render($page['content']); ?>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /#main --> 
		</div><!-- /#container --> 
	</div>
  <!--contentMaster:end--> 
</section>
<div class="overlay"></div>
<?php print render($page['header']); ?>