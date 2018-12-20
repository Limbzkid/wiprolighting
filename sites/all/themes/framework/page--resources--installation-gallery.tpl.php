<!-- Start Header -->
<?php $curpath = explode('/', current_path()); ?>
<?php
	$output = '';
	$query = new EntityFieldQuery();
	$query->entityCondition('entity_type', 'node')
		->entityCondition('bundle', 'installation_gallery')
		->propertyCondition('status', NODE_PUBLISHED)
		->propertyOrderBy('created', 'DESC');
	$result = $query->execute();
	if(isset($result['node'])) {
		$nids = array_keys($result['node']);
		$nodes = node_load_multiple($nids);
		foreach($nodes as $node) {
			$images = '';
			//echo '<pre>'; print_r($node); echo '</pre>'; 
			$title = $node->title;
			if(!empty($node->body)) {
				$desc = $node->body['und'][0]['value'];
			} else {
				$desc = '';
			}
			$thumb = file_create_url($node->field_thumb_image['und'][0]['uri']);
			$images .= '<li><img src="'.$thumb.'" alt=""></li>';
			foreach($node->field_ins_image['und'] as $image) {
				$img_url = file_create_url($image['uri']);
				$images .= '<li><img src="'.$img_url.'" alt=""></li>';
			}
			$output .= '<div class="group"><div class="actionDiv">';
			$output .= '<span class="slideLength"><span class="sel">4</span>/<span class="total">12</span></span>';
			$output .= '<span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span> </div>';
			$output .= '<div class="thumb"><img src="'.$thumb.'" alt=""></div><div class="imgPart"><div class="sliderHidden">';
			$output .= '<ul>'.$images.'</ul></div></div><div class="contentPart">';
			$output .= '<p class="title">'.$title.'</p><p class="subTitle">'.$desc.'</p></div></div>';
			
		}
	}
	//echo $output;
	//exit;
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
  <!--contentMaster:start-->
  <div class="contentMaster">
    <div id="container" class="clearfix container">
			<?php print $messages; ?>
			<ul class="breadcrumbs">
				<li><a href="<?php print $front_page; ?>">Home</a></li>
				<li class="noBcLink"> Resources</li>
				<li class="sel">Installation Gallery</li>
			</ul>
      <div class="sectionWrapper">
          <div class="fullContentSection">
            <h1>Installation <span class="semiBold">Gallery</span></h1>
            <div class="gallerySection addingContents">
							
							<?php echo $output; ?>
              
            </div>
            <!--<a class="loadmoreBtn" href="javascript:;">Load More Installation Gallery</a> -->
          </div>
        </div>
      </div>
      <!-- /#main --> 
    </div>
    <!-- /#container --> 
  </div>
  <!--contentMaster:end--> 
</section>
<div class="overlay"></div>
<!--lightbox:start-->
<div class="lightbox gallaryLb insGal">
	<a class="closeBtn"></a>
  <div class="gallerySection">
  	<div class="group">&nbsp;</div>
  </div>
</div>
<!--lightbox:end-->
<?php print render($page['header']); ?>
