<!-- Start Header -->

<?php

	$less_three_months = strtotime("-3 Months");
	$time_diff = $current_time - $less_three_months;
	$current_path = base_path().drupal_lookup_path('alias',current_path());
	$curpath = explode('/', drupal_lookup_path('alias',current_path()));
	$term = $page['content']['system_main']['term_heading']['term']['#term']->name;
	$tid = $page['content']['system_main']['term_heading']['term']['#term']->tid;
	$description = $page['content']['system_main']['term_heading']['term']['#term']->description;
	//
	if($page['content']['system_main']['term_heading']['term']['#term']->field_term_image) {
		$term_image = file_create_url($page['content']['system_main']['term_heading']['term']['#term']->field_term_image['und'][0]['uri']);
	} else {
		$term_image = '';
	}
	if($page['content']['system_main']['term_heading']['term']['#term']->field_icon_image) {
		$icon_image = file_create_url($page['content']['system_main']['term_heading']['term']['#term']->field_icon_image['und'][0]['uri']);
	} else {
		$icon_image = '';
	}
	$cat = explode(' ', $term);
	$cat_title1 = array_shift($cat);
	$cat_title2 = implode(' ',  $cat);
	
	$case_studies_block = get_case_study_block($tid);
	//echo $case_studies_block;

	//exit;
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
	<!--contentMaster:start-->
  <div class="contentMaster">
		<div id="container" class="clearfix container">
			<div id="main" role="main" class="clearfix">
				<?php print $messages; ?>
				<?php print $breadcrumb; ?>
				
				<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
				<?php print render($title_prefix); ?>
				<?php print render($title_suffix); ?>
				<?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
				<?php print render($page['help']); ?>
				<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				<?php //print render($page['content']); ?>
				<div class="sectionWrapper"> 
          <!--pageInfoSection:start-->
          <div class="pageInfoSection">
            <div class="lhsInfo"><img src="<?php echo $term_image; ?>" alt="">
              <div class="titleBox">
                <h2>Applications</h2>
              </div>
            </div>
            <div class="rhsInfo">
							<h1><?php echo $cat_title1; ?><br><span class="semiBold"><?php echo $cat_title2; ?></span> <div class="iconBox"><img src="<?php echo $icon_image; ?>" alt=""></div></h1>             
              <?php echo $description; ?>
            </div>
          </div>
          <!--pageInfoSection:end--> 
          
          <!--filterSubAppSection:start-->
					
						<?php echo get_sub_apps($tid); // code in template.php ?>
					
          <!--filterSubAppSection:end--> 
          
          <!--productListSection:strat-->
          <div class="productListSection">
            <h2><?php echo $cat_title1 .' '. $cat_title2; ?> Products</h2>
            <div class="productListSlider">
              <div class="actionDiv"> <span class="slideLength"><span class="sel">1</span>/<span class="total">3</span></span> <span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span> </div>
              <div class="productListWrap">
                <div class="productList">
									<?php
										$led_arr = array();
										$conv_arr = array();
										$prod_list = '';
										$query = new EntityFieldQuery();
										$query->entityCondition('entity_type', 'node')
												->entityCondition('bundle', 'product')
												->propertyCondition('status', NODE_PUBLISHED)
												->fieldCondition('field_application_area_recommend', 'tid', $tid);
										$result = $query->execute();
										
										if(isset($result['node'])) {
											$nids = array_keys($result['node']);
											/* Isolate LED and Conventional */
											foreach($nids as $nid) {
												
												$tid = db_query("SELECT field_product_category_tid FROM field_data_field_product_category WHERE entity_id=:arg", array(':arg' => $nid))->fetchField();
												$parents = taxonomy_get_parents_all($tid);
												foreach($parents as $parent) {
													if($parent->name == 'LED' || $parent->name == 'Conventional') {
														if($parent->name == 'LED') {
															if(!in_array($nid, $led_arr)) {
																array_push($led_arr, $nid);
															}
														} else {
															if(!in_array($nid, $conv_arr)) {
																array_push($conv_arr, $nid);
															}
														}
													}
												}
											}
											$node_array = array(
															'0' => $led_arr,
															'1' => $conv_arr,
											);
											/* Isolate LED and Conventional */
											foreach($node_array as $app_node) {											
												$nodes = node_load_multiple($app_node);
												$dup_arr = array();
												foreach($nodes as $node) {
													//echo '<pre>'; print_r($node); echo '</pre>';
													if(!in_array($node->model, $dup_arr)) {
														array_push($dup_arr, $node->model);
														//echo $node->field_product_code['und'][0]['value'] . '<br/>';
														//echo '<pre>'; print_r($node); echo '</pre>';
														$prod_launch_date = strtotime($node->field_product_launch_date['und'][0]['value']);
														//echo $prod_launch_date . '<br/>';
														if($user->uid) {
															$path = base_path().drupal_get_path_alias('node/'.$node->nid);
															$uidArr = $node->field_application_area_recommend['und'];
															$uidArr1 = array();
															foreach($uidArr as $val) {
																$uidArr1[]= $val['tid'];
															}
															$uidStr = implode(',',$uidArr1);
																//echo '<pre>'; print_r($node); echo '</pre>';
																//exit;
															$cat = explode(' ', $node->title);
															$cat_title1 = array_shift($cat);
															$cat_title2 = implode(' ', $cat);
															$prod_list .= '<div class="group" tid="'.$uidStr.'"><a href="'.$path.'"><div class="productImg"><img src="'.file_create_url($node->uc_product_image['und'][0]['uri']).'" alt=""></div></a>';
															$prod_list .= '<div class="productContent"><a href="'.$path.'"><h2><span class="bottomLine">'.$cat_title1.' <span class="semiBold">'.$cat_title2.'</span></span> <span class="redArrow"></span></h2></a>';
															$prod_list .= '<p>'.$node->field_product_code['und'][0]['value'].'</p>';
															if($node->field_brochure_download) {
																$brochure = file_create_url($node->field_brochure_download['und'][0]['uri']);
																$prod_list .= '<a href="'.$brochure.'" class="actionLink" target="_blank"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>';
															}
															$prod_list .= '</div></div>';
														} else {
															if(($current_time - $prod_launch_date) > $time_diff) {
																$path = base_path().drupal_get_path_alias('node/'.$node->nid);
																$uidArr = $node->field_application_area_recommend['und'];
																$uidArr1 = array();
																foreach($uidArr as $val) {
																	$uidArr1[]= $val['tid'];
																}
																$uidStr = implode(',',$uidArr1);
																	//echo '<pre>'; print_r($node); echo '</pre>';
																	//exit;
																$cat = explode(' ', $node->title);
																$cat_title1 = array_shift($cat);
																$cat_title2 = implode(' ', $cat);
																$prod_list .= '<div class="group" tid="'.$uidStr.'"><a href="'.$path.'"><div class="productImg"><img src="'.file_create_url($node->uc_product_image['und'][0]['uri']).'" alt=""></div></a>';
																$prod_list .= '<div class="productContent"><a href="'.$path.'"><h2><span class="bottomLine">'.$cat_title1.' <span class="semiBold">'.$cat_title2.'</span></span> <span class="redArrow"></span></h2></a>';
																$prod_list .= '<p>'.$node->field_product_code['und'][0]['value'].'</p>';
																if($node->field_brochure_download) {
																	$brochure = file_create_url($node->field_brochure_download['und'][0]['uri']);
																	$prod_list .= '<a href="'.$brochure.'" class="actionLink" target="_blank"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>';
																}
																$prod_list .= '</div></div>';
															}
														}
													}
												}
											}
										}
										echo $prod_list;
									?>
                </div>               
              </div>
              <div class="loadMoreContainer"><a href="javascript:;" class="loadmoreBtn">Load More</a></div>
            </div>
          <div class="errorMsg" style="display:none">No Products to show</div>
					</div>
          <!--productListSection:end--> 
          
          <!--caseStudySection:start-->
		  <?php get_installation_guide_block(); ?>
          <div class="caseStudySection fullWidthCaseStudySection">
            <div class="group">
              <h2>Installation <span class="semiBold">Gallery</span></h2>
              <div class="boxWrap">
                <div class="actionDiv">
									<span class="slideLength">
										<span class="sel">1</span>/<span class="total">3</span>
									</span>
									<span class="slideArrow">
										<span class="prevArrow">&nbsp;</span>
										<span class="nextArrow">&nbsp;</span>
									</span>
								</div>
                <div class="box">
                  <ul>
                    <?php print get_installation_guide_block(); ?>
                  </ul>
                </div>
                <a class="arrowLink" href="<?php echo base_path(). 'resources/installation-gallery'; ?>">View Gallery<span class="arrowIco"></span></a>
              </div>
            </div>
						<?php if($case_studies_block): ?>
							<div class="group groupFullContent">
								<h2>Case <span class="semiBold">Studies</span></h2>
								<div class="boxWrap">
									<div class="actionDiv">
										<span class="slideLength"><span class="sel">1</span>/<span class="total">3</span></span>
										<span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span>
									</div>
									<?php //echo $tid .' - '. $term; ?>
									<div class="box">
										<ul>
											<?php print $case_studies_block; ?>
										</ul>
									</div>
									<a class="arrowLink" href="<?php echo base_path(). 'resources/case-studies'; ?>">View All Case Studies <span class="arrowIco"></span></a>
								</div>
							</div>
						<?php endif; ?>
          </div>
          
          <!--caseStudySection:end--> 
          <!--formSection:start-->
          <div class="section formSection">
            <div class="formLeft">
              <div class="group greenLight">
                <h3>Innovation In Lighting</h3>
                <h2>Green<br>
                  <span class="semiBold">Lighting</span></h2>
                <a class="btnBox orange" href="<?php echo base_path(). 'innovation-in-lighting/force-green-lighting-design'; ?>"><span class="arow"></span></a> </div>
              <div class="group designService2">
              	<h3>Exclusive Tools</h3>
                <h2>Lighting<br>
                  <span class="semiBold">Design Service</span></h2>
                <a class="btnBox darkYello" href="<?php echo base_path(). 'resources/tools/lighting-design'; ?>"><span class="arow"></span></a> </div>
            </div>
            <?php print get_a_callback_form(); ?>
          </div>
          <!--formSection:end--> 
        </div>
				
			</div> <!-- /#main -->
		</div> <!-- /#container -->
	</div>
  <!--contentMaster:end--> 
</section>
<div class="overlay"></div>
<?php print render($page['header']); ?>
