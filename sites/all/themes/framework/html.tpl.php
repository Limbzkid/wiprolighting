<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 8]> <!--> <html class="" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->

	<head>
		<?php print $head; ?>
		<!-- Set the viewport width to device width for mobile -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable = no"/>
		<title><?php print $head_title; ?></title>
		<link type="text/css" rel="stylesheet" href="<?php echo base_path(); ?>sites/all/themes/framework/css/style.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_path(); ?>sites/all/themes/framework/css/media.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_path(); ?>sites/all/themes/framework/css/mCustomScrollbar.min.css"/>
		<?php if(drupal_is_front_page()): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo base_path(); ?>sites/all/themes/framework/css/homepage.css"/>
		<?php endif; ?>
		<?php print $styles; ?>
		<?php print $scripts; ?>
		<?php if(drupal_is_front_page() || arg(0) == 'dealer-locator'): ?>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
		<?php endif; ?>
		<!-- IE Fix for HTML5 Tags -->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<?php if(drupal_is_front_page() || arg(2) == 'lighting-design' || arg(0) == 'dealer-locator' || arg(1) == 'support-form' || arg(0) == 'applications'): ?>
			<script src='https://www.google.com/recaptcha/api.js'></script>
		<?php endif; ?>
			<script>
				//function showLoader() { $(".submitLoader").removeClass("dnone"); }
			</script>
		<![endif]-->
	</head>

	<body class="<?php print $classes; ?>" <?php print $attributes;?>>
		<?php if(drupal_is_front_page()): ?>
			<div id="mainWrapper" class="homepge">
		<?php else: ?>
			<div id="mainWrapper">
		<?php endif; ?>
		<?php print $page_top; ?> <?php print $page; ?> <?php print $page_bottom; ?>
		<?php if(arg(0) != 'inter'): ?>
			<footer>
				<div class="footerLinks">
					<div class="container">
						<div class="quickLinks"><a href="javascript:;">Get Help <span class="icon"></span></a></div>
						<div class="fixmenu">
							<ul>
								<li class="infoLinks">
									<h3>Informational Links</h3>
									<ul>
										<li><a href="<?php echo base_path(); ?>sitemap">Sitemap</a></li>
										<li><a href="<?php echo base_path(); ?>privacy-security">Privacy &amp; Security </a></li>
										<li><a href="<?php echo base_path(); ?>terms-conditions">*Terms &amp; Conditions </a></li>
									</ul>
								</li>
								<li class="tollNum">
									<h3>Toll Free Number</h3>
									<p>1800-425-1969</p>
								</li>
								<li class="helpDesk">
									<h3>Help Desk</h3>
									<p>If you are facing any problem, 
										you can also mail your request to</p>
									<a href="mailto:helpdesk.lighting@wipro.com">helpdesk.lighting@wipro.com</a> </li>
								<li class="smo">
									<!--<h3>connect with us</h3>-->
									<ul class="socialLinks">
										<li class="fb"><a href="javascript:;"><span class="icon">Facebook</span></a></li>
										<li class="utube"><a href="javascript:;"><span class="icon">Youtube</span></a></li>
										<li class="twt"><a href="javascript:;"><span class="icon">Twitter</span></a></li>
									</ul>
									<p>&copy <?php echo date('Y'); ?> Wipro Lighting All right reserved</p>
									<ul class="companyLinks">
										<li><a href="http://wiproel.com/" target="_blank">Wipro Enterprises (P) Limited</a></li>
										<li><a href="http://wiproconsumercare.com/" target="_blank">Wipro Consumer Care and Lighting (WCCLG)</a></li>
										<li><a href="http://www.yardleyoflondon.com/" target="_blank">Yardley India</a></li>
										<li><a href="http://www.north-west.wipro.com/" target="_blank">NorthWest Switches</a></li>
										<li><a href="http://wiproconsumerlighting.com/home" target="_blank">Wipro Consumer Lighting</a></li>
									</ul>
								</li>
							</ul>
							<div class="fotviewMore">If you are looking for domestic lighting solutions,
								<a href="http://wiproconsumerlighting.com/home" target="_blank"> click here </a>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<?php endif; ?>
			</div>
		</div>
		<a href="javascript:;" class="backtoTop"><span class="toparow"></span> Back to Top</a>
	
		<script type="text/javascript">	
		$(function(){
			if($('.tableView').length) {
				 $('.tableView table').responsiveTable({
			});
			}
		});
		</script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
</html>