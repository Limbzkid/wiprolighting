
<?php
	$app_mapped_first = true;
	foreach($node->field_application_area_recommend['und']as $aaa) {
		if($app_mapped_first) {
			$app_mapped_products = $aaa['tid'];
			$app_mapped_first = false;
		} else {
			$app_mapped_products .= ','.$aaa['tid'];
		}
	}
	//echo 'myList: '. $app_mapped_products;
	$case_study_block = get_product_page_case_study_block($app_mapped_products);
	//echo $case_study_block;
	
	/*$query = db_select('node', 'n')
	$query->leftJoin('field_data_body', 'fdb', 'fdb.entity_id = n.nid');
	$query->leftJoin('field_data_field_pdf_download', 'pdf', 'pdf.entity_id = n.nid');
	$query->leftJoin('file_managed', 'fm', 'fm.fid = pdf.field_pdf_download_fid');
	$query->leftJoin('field_data_field_application', 'fpa', 'fpa.entity_id = n.nid');
	$query->fields('n', array('nid', 'title', 'created'))
				->fields('pdf', array('field_pdf_download_fid'))
				->fields('fdb', array('body_value'))
				->condition('fpa.field_application_tid', array($app_mapped_products), 'IN')
				->condition('n.status', 1, '=')
				->orderBy('n.created', 'DESC')
				->range(0,3);*/
	

	$less_three_months = strtotime("-3 Months");
	$time_diff = REQUEST_TIME - $less_three_months;
	$prod_launch_date = strtotime($node->field_product_launch_date['und'][0]['value']);
	$difference = REQUEST_TIME - $prod_launch_date;
	$similar_products_found = false;
	
?>
<?php if($user->uid || ($difference > $time_diff)): ?>
	<?php
		$cmp_prod_list 		= '';
		$grp_prod_info 		= '';
		$grp_best_suited 	= '';
		$grp_features			= '';
		$grp_specs				= '';
		$grp_access				= '';
		$grp_install			= '';
		$grp_elect				= '';
		$similar_products_bottom = '';
		$cnt = 01;
		// get product codes for product compare
		if($node->field_similar_products) {
			$similar_products = $node->field_similar_products['und'][0]['value'];
			$similar_products_arr = explode(',', $similar_products);
			//$arr = array('LL13-ProLED', 'LM15-411-XXX-60-XX', 'LM11-291-XXX-57-XX', 'LM15-321-XXX-60-XX');
			foreach($similar_products_arr as $prod_code) {
				$nid = db_query("SELECT nid FROM {uc_products} WHERE model = :arg", array(':arg'=>$prod_code))->fetchField();
				$nod = node_load($nid);
				//echo 'AAAA'. $nod->status;
				if($nod->status ==1) {
					$similar_products_found = true;
					$_SESSION['similar_prods'] = 1;
					$cmp_path = base_path().drupal_get_path_alias('node/'.$nod->nid);
					//echo '<pre>'; print_r($nod); echo '</pre>';
					$prod_term = taxonomy_term_load($nod->field_product_category['und'][0]['tid']);
					$prod_term_name = $prod_term->name;
					
					if(!empty($nod->uc_product_image)) {
						$cmp_img = file_create_url($nod->uc_product_image['und'][0]['uri']);
					} else {
						$cmp_img = '';
					}
					$cat = explode(' ', $nod->title);
					$title1 = array_shift($cat);
					$title2 = implode(' ', $cat);
					
					$cmp_prod_list .= '<li id="'.$cnt.'"> <span class="checkedArrow">&nbsp;</span>';
					$cmp_prod_list .= '<div class="imgProduct"><img src="'.$cmp_img.'" alt="'.$nod->title.'" style="width:186px;"></div>';
					$cmp_prod_list .= '<div class="relProduct"><a href="'.$cmp_path.'">'.$nod->title.' <span class="arrowIco"></span></a></div></li>';
					$grp_prod_info .= '<div class="productListContent"><h2>'.$prod_term_name.'</h2><div class="productImg"><img src="'.$cmp_img.'" alt=""></div>';
					$grp_prod_info .= '<div class="productInfo"><h2>'.$title1.' <span class="semiBold"> '.$title2.'</span></h2>';
					$grp_prod_info .= '<p class="description">'.$nod->field_product_code['und'][0]['value'].' | '.$nod->model.'</p>'.$nod->body['und'][0]['value'];
					
					$grp_prod_info .= '</div><div class="brandLogo"><img alt="" src="'.base_path().'sites/all/themes/framework/images/led-edge.png">';
					if($nod->field_brochure_download) {
						$grp_prod_info .= '<a href="'.file_create_url($nod->field_brochure_download['und'][0]['uri']).'" class="actionLink"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>';
					}
					$grp_prod_info .= '</div></div>';
					
			
					$grp_best_suited .= '<div class="productListContent"><div class="bestSuited">';
					$grp_best_suited .= '<h2>Best <span class="semiBold">Suited For</span></h2>';
					$grp_best_suited .= '<div class="bestSuitedCarousel"><div class="bestSuitedCarouselWrap"><ul>';
					foreach($nod->field_application_area_recommend['und'] as $app_term) {
						$appTerm = taxonomy_term_load($app_term['tid']);
						$app_term_name = $appTerm->name;
						$app_icon_img = file_create_url($appTerm->field_icon_image['und'][0]['uri']);
						$grp_best_suited .= '<li><div class="iconBox"><img alt="" src="'.$app_icon_img.'"></div><p>'.$app_term_name.'</p></li>';
					}
					$grp_best_suited .= '</ul></div><div class="actionDiv"><span class="slideLength">';
					$grp_best_suited .= '<span class="sel">4</span>/<span class="total">12</span></span><span class="slideArrow">';
					$grp_best_suited .= '<span class="prevArrow disableArrow">&nbsp;</span><span class="nextArrow">&nbsp;</span></span></div></div></div></div>';
					
					$grp_features .= '<div class="productListContent"><div class="group"><!--<h2>Product 01</h2>-->';
					$grp_features .= $nod->field_features_and_benefits['und'][0]['value'].'</div></div>';
					
					$grp_specs .= '<div class="productListContent"><div class="group"><!--<h2>Product 01</h2>-->';
					$grp_specs .= $nod->field_specifications['und'][0]['value'].'</div></div>';
					
					$grp_access .= '<div class="productListContent"><div class="group"><!--<h2>Product 01</h2>-->';
					$grp_access .= $nod->field_accessories_lighting_modes['und'][0]['value'].'</div></div>';
					
					$grp_install .= '<div class="productListContent"><div class="group"><!--<h2>Product 01</h2>-->';
					$grp_install .= $nod->field_installation['und'][0]['value'].'</div></div>';
					
					$grp_elect_pack .= '<div class="productListContent"><div class="responsiveTable">';
					$grp_elect_pack .= $nod->field_electrical_packaging_data['und'][0]['value'].'</div></div>';
					
					$similar_products_bottom .= '<li><div class="productImg"><img src="'.$cmp_img.'" alt=""></div>';
					$similar_products_bottom .= '<a href="'.$cmp_path.'">'.$nod->title.' <span class="arrowIco2"></span></a> </li>';
				}
				$cnt++;
			}
		}	
		$tmp = explode(' ', $node->title);
		$node_title1 = array_shift($tmp) . ' ';
		$node_title2 = implode(' ',$tmp);
	?>
	
	
	<?php if($page): ?>
		<?php if($node->field_similar_products): ?>
			<div class="productCompareSection">
				<!--<div class="compareLink">
					<a href="javascript:;" class="arrowLink"><span class="spireIcon"></span> Similar Products <span class="arrowIco"></span></a>
				</div>-->
				<!--pickProductCompare:start-->
				<div class="pickProductCompare"> <span class="closeBtn">&nbsp;</span>
					<h2>Pick a <span class="semiBold">Product</span></h2>
					<ul class="productList"><?php print $cmp_prod_list; ?></ul>
					<a class="arrowLink formBtn" href="javascript:;">View Details <span class="arrowIco"></span></a>
				</div>
				<!--pickProductCompare:end--> 
				<!--viewProductCompare:start-->
				<div class="viewProductCompare"> <span class="closeBtn">&nbsp;</span> <span class="backArrow">&nbsp;</span>
					<div class="compareProducts">
						<div class="group"><div class="cloneProduct"></div></div>
						<div class="group"><?php print $grp_prod_info; ?></div>
					</div>
					<div class="compareBestSuited">
						<div class="group"><div class="cloneProduct"></div></div>
						<div class="group"><?php print $grp_best_suited; ?></div>
					</div>
					<div class="compareFeatures">&nbsp;</div>
				</div>
				<!--viewProductCompare: end--> 
			</div>
		<?php endif; ?>
		<div class="sectionWrapper sectionWrapperSpacing"> 
			<!--productSection:start-->
			<div class="section productSection">
				<div class="productLhs">
					<h2><?php echo $node->field_product_category['und'][0]['taxonomy_term']->name; ?></h2>
					<div class="productSlider">
						<ul>
							<?php foreach($node->uc_product_image['und'] as $img) : ?>
								<li><img src="<?php echo file_create_url($img['uri']); ?>" alt=""></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="brandLogo">
						<img class="lbLedEdgeClick" src="<?php echo base_path(); ?>sites/all/themes/framework/images/led-edge.png" alt="">
						<?php if($node->field_product_launch_video): ?>
							<a class="actionLeft" href="javascript:;" data-video="https://www.youtube.com/embed/<?php echo $node->field_product_launch_video['und'][0]['value']; ?>?autoplay=1">
								<span class="videoIco"></span> Experience the Innovation
							</a>
						<?php endif; ?>	
            <?php if(!empty($node->field_brochure_download)): ?>
							<a class="actionLink" href="<?php print file_create_url($node->field_brochure_download['und'][0]['uri']); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>								
						<?php endif; ?>
					</div>
					<div class="actionDiv">					
						<div class="actionRight"> <span class="slideLength"><span class="sel">1</span>/<span class="total">3</span></span> <span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span> </div>
					</div>
				</div>
				<div class="productRhs">
					<div class="productInfo">
						<h2><?php echo $node_title1; ?><span class="semiBold"><?php echo $node_title2; ?></span></h2>
						<p class="description"><?php echo $node->field_product_code['und'][0]['value']; ?></p>
						<?php echo $node->body['und'][0]['value']; ?>
					</div>
					<div class="bestSuited">
						<h2>Best <span class="semiBold">Suited For</span></h2>
						<div class="bestSuitedCarousel">
						<div class="bestSuitedCarouselWrap">
							<ul>
							<?php foreach($node->field_application_area_recommend['und'] as $application): 
							 /* echo '<pre>';
							print_r($application);
							echo '</pre>';  */
							?>
								<li><div class="iconBox"><img alt="" src="<?php echo file_create_url($application['taxonomy_term']->field_icon_image['und'][0]['uri']); ?>"></div><p><?php echo $application['taxonomy_term']->name; ?></p></li>
							<?php endforeach; ?>
						</ul>
						</div>
						<div class="actionDiv"> <span class="slideLength"><span class="sel">4</span>/<span class="total">3</span></span> <span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span> </div>                
						</div>
					</div>
				</div>
			</div>
			<!--productSection:end--> 
						
			<!--featuresSection:start-->
			<div class="section featuresSection">
				<ul class="featuresTab">
					<?php if($node->field_features_and_benefits): ?>
						<li><a href="javascript:;">Features &amp; Benefits</a></li>
					<?php endif; ?>
					<?php if($node->field_specifications): ?>
						<li><a href="javascript:;">Specifications</a></li>
					<?php endif; ?>
					<?php if($node->field_accessories_lighting_modes): ?>
						<li><a href="javascript:;">Accessories &amp; Controls</a></li>
					<?php endif; ?>
					<?php if($node->field_electrical_packaging_data): ?>
						<li><a href="javascript:;">Electrical &amp; Packaging</a></li>
					<?php endif; ?>
					<?php if($node->field_installation): ?>
						<li><a href="javascript:;">Installation</a></li>
					<?php endif; ?>
				</ul>
				<?php if($node->field_features_and_benefits): ?>
					<h3>Features &amp; Benefits <span class="accArrow"></span></h3>
					<div class="featuresTabContent">
						<div class="activeTitle"><h2>Features &amp; Benefits</h2></div>
						<div class="activeContent">
							<div class="groupParent">
								<?php foreach($node->field_features_and_benefits['und'] as $feature) : ?>
									<?php echo $feature['value']; ?>
								<?php endforeach; ?>
							</div>
															<!--compareListContent:start-->
							<div class="groupParent compareListContent"><?php print $grp_features; ?></div>
							<!--compareListContent:start-->
						</div>
					</div>
				<?php endif; ?>
				<?php if($node->field_specifications): ?>
					<h3>Specifications<span class="accArrow"></span></h3>
					<div class="featuresTabContent">
						<div class="activeTitle"><h2>Specifications</h2></div>
						<div class="activeContent">
							<div class="groupParent">
								<?php foreach($node->field_specifications['und'] as $feature) : ?>
									<?php echo $feature['value']; ?>
								<?php endforeach; ?>
								
							</div>
							<!--compareListContent:start-->
							<div class="groupParent compareListContent"><?php print $grp_specs; ?></div>
							<!--compareListContent:start-->
						</div>
					</div>
				<?php endif; ?>
				<?php if($node->field_accessories_lighting_modes): ?>
					<h3>Accessories &amp; Controls<span class="accArrow"></span></h3>
					<div class="featuresTabContent">
						<div class="activeTitle"><h2>Accessories &amp; Controls</h2></div>
						<div class="activeContent">
							<div class="groupParent">
								<?php foreach($node->field_accessories_lighting_modes['und'] as $feature) : ?>
									<?php echo $feature['value']; ?>
								<?php endforeach; ?>
							</div>
							 <!--compareListContent:start-->
							<div class="groupParent compareListContent"><?php print $grp_access; ?></div>
							<!--compareListContent:start-->
						</div>
					</div>
				<?php endif; ?>
				<?php if($node->field_electrical_packaging_data): ?>
					<h3>Electrical &amp; Packaging<span class="accArrow"></span></h3>
					<div class="featuresTabContent">
						<div class="activeTitle">
							<h2>Electrical &amp; Packaging</h2>
						</div>
						<div class="activeContent">
							<div class="groupParent">
								<div class="responsiveTable">
									<?php print $node->field_electrical_packaging_data['und'][0]['value']; ?>
								</div>
							</div>
							<!--compareListContent:start-->
							<div class="groupParent compareListContent"><?php echo $grp_elect_pack; ?></div>
							<!--compareListContent:start-->
						</div>
					</div>
				<?php endif; ?>
				<?php if($node->field_installation): ?>
					<h3>Installation<span class="accArrow"></span></h3>
					<div class="featuresTabContent">
						<div class="activeTitle"><h2>Installation</h2></div>
						<div class="activeContent">
							<div class="groupParent">
								<?php foreach($node->field_installation['und'] as $feature) : ?>
									<?php echo $feature['value']; ?>
								<?php endforeach; ?>
							</div>
							<!--compareListContent:start-->
							<div class="groupParent compareListContent"><?php print $grp_install; ?></div>
							<!--compareListContent:start-->
						</div>
					</div>
				<?php endif; ?>
			</div>
			<!--featuresSection:end--> 
						
			<!--formSection:start-->
			<div class="section formSection">
				<div class="formLeft">
					<div class="group designService">
						<h2>Lighting<br>
							<span class="semiBold">Design Service</span></h2>
						<a class="btnBox darkGreen" href="<?php print base_path(); ?>resources/tools/lighting-design"><span class="arow"></span></a>
						<div class="btmStrip">
							<div class="left">Already have a product quantity proposal?</div>
							<div class="right">
								<a href="<?php print base_path(); ?>get-a-quote" class="arrowLink">Get a Quote <span class="arrowIco"></span></a>
							</div>
						</div>
					</div>
					<div class="group calculator">
						<h2>Payback<br>
							<span class="semiBold">Calculator</span></h2>
						<a class="btnBox white" href="<?php print base_path(); ?>resources/tools/payback-calculator"><span class="arow"></span></a> </div>
				</div>
				<?php print get_a_callback_form(); ?>
	
			</div>
			<!--formSection:end--> 
						
			<!--caseStudySection:start-->
				<?php get_installation_guide_block(); ?>
						<div class="section caseStudySection fullWidthCaseStudySection">
							<div class="group">
								<h2>Installation <span class="semiBold">Gallery</span></h2>
								<div class="boxWrap">
									<div class="actionDiv"> <span class="slideLength"><span class="sel">1</span>/<span class="total">3</span></span> <span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span> </div>
									<div class="box">
										<ul>
											<?php print get_installation_guide_block(); ?>
										</ul>
									</div>
									<a class="arrowLink" href="<?php echo base_path(). 'resources/installation-gallery'; ?>">View Gallery<span class="arrowIco"></span></a>
								</div>
							</div>
							<?php if($case_study_block): ?>
								<div class="group groupFullContent">
									<h2>Case <span class="semiBold">Studies</span></h2>
									<div class="boxWrap">
										<div class="actionDiv"> <span class="slideLength"><span class="sel">1</span>/<span class="total">3</span></span> <span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span> </div>
										<div class="box">
											<ul><?php print $case_study_block; ?></ul>
										</div>
										<a class="arrowLink" href="<?php echo base_path(). 'resources/case-studies'; ?>">View All Case Studies <span class="arrowIco"></span></a>
									</div>
								</div>
							<?php endif; ?>
						</div>
						
						<!--caseStudySection:end--> 
						
			<!--similarSection:start-->
			<?php if($node->field_similar_products): ?>
				<?php if($similar_products_found): ?>
					<div class="section similarSection">
						<h2>Similar <span class="semiBold">Products</span></h2>
						<ul class="productList"><?php print $similar_products_bottom; ?></ul>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<!--similarSection:end--> 
		</div>
	<?php endif; ?>
<?php else: ?>
	<?php drupal_set_message('Access Denied.'); ?>
<?php endif; ?>
