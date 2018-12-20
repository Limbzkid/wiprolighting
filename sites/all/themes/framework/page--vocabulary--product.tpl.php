<!-- Start Header -->
<?php
	// 7890000
	$app_array = array();
	$node_array = array();
	$less_three_months = strtotime("-3 Months");
	$current_time = REQUEST_TIME;
	$time_diff = $current_time - $less_three_months;
	$current_path = str_replace('-&', '', drupal_lookup_path('alias',current_path()));
	//$current_path = drupal_lookup_path('alias',current_path());
	$curpath = explode('/', drupal_lookup_path('alias',current_path())); 
	$list_view = '';
	$grid_view = '';
	$prodCounter = 0;
	$name = $page['content']['system_main']['term_heading']['term']['#term']->name;
	$parent_tid = $page['content']['system_main']['term_heading']['term']['#term']->tid; // tid of parent cat - indoor/outdoor
	$description = $page['content']['system_main']['term_heading']['term']['#term']->description;
	$image_path = file_create_url($page['content']['system_main']['term_heading']['term']['#term']->field_cat_image['und'][0]['uri']);
	$cat = explode(' ', $name);
	$cat_title1 = array_shift($cat);
	$cat_title2 = implode(' ' , $cat);
	$row_count = 0;

	foreach($page['content']['system_main']['nodes'] as $prod) {
		//echo 'qqq<pre>'; print_r($prod); echo '</pre>';
		//echo $prod['#node']->nid . '<br/>';
		if(!empty($prod['#node']->field_application_area_recommend)) {
			$uidArr = $prod['#node']->field_application_area_recommend['und'];
		}
		$product_launch_date = strtotime($prod['#node']->field_product_launch_date['und'][0]['value']);
		if($user->uid) {   // if user is logged in
			$prodCounter++;
			
			$uidArr1 = array();
			foreach($uidArr as $val) {
				if(!in_array($val['tid'], $app_array)) {
					$app_array[] = $val['tid'];
				}
				$uidArr1[]= $val['tid'];
			}
			
			$uidStr = implode(',',$uidArr1);
			$path = drupal_get_path_alias('node/'.$prod['#node']->nid);
			
			$temp_path = explode('/', $path);
			array_pop($temp_path);
			$new_path = implode('/', $temp_path);
			//echo $new_path .' '. $current_path . '<br/>';
			
			
			if($new_path == $current_path) {
				
				$path = base_path().drupal_get_path_alias('node/'.$prod['#node']->nid);
				$title = $prod['#node']->title;
				$temp = explode(' ', $title);
				$title1 = array_shift($temp);
				$title2 = implode(' ',$temp);
				$img = file_create_url($prod['#node']->uc_product_image['und'][0]['uri']);
				
				if($prod['#node']->field_wattages) {
					$wattage = $prod['#node']->field_wattages['und'][0]['value'];
				} else {
					$wattage = '';
				}
				$desc = $prod['#node']->body['und'][0]['value'];
				if($prod['#node']->field_product_code) {
					$prod_code = $prod['#node']->field_product_code['und'][0]['value'];
				} else {
					$prod_code = '';
				}
				$model = $prod['#node']->model;
				if($prod['#node']->field_brochure_download) {
					$brochure = file_create_url($prod['#node']->field_brochure_download['und'][0]['uri']);
				} else {
					$brochure = '';
				}
				
				$list_view .= '<tr uid="'.$uidStr.'"><td><span class="productName"><a href="'.$path.'">'.$title1.' <span class="semiBold">'.$title2.'</span></span></td></td>';
				$list_view .= '<td>'.$prod_code.' | '.$model.'</td><td>'.$desc.'</td><td>'.$wattage.'</td></tr>';
				if($row_count == 0) {
					$grid_view .= '<ul class="gridRow">';
				}
				if($row_count > 7) {
					$row_count = 0;
					$grid_view .= '</ul><ul class="gridRow">';
				}
				
				$grid_view .= '<li uid="'.$uidStr.'"><a href="'.$path.'"><div class="productImg"><img alt="" src="'.$img.'"></div></a>
				<div class="productContent"><h2><a href="'.$path.'"><span class="bottomLine">';
				$grid_view .= $title1.' <span class="semiBold">'.$title2.'</span></span> <span class="redArrow ornegArow"></span></h2></a>';
				$grid_view .= '<p class="proCode">'.$prod_code.'</p><p>'.$desc.'</p>';
				if($brochure) {
					$grid_view .= '<a class="actionLink" href="'.$brochure.'" title="Download Brochure" target="_blank"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>';
				}
				$grid_view .= '</div></li>';
			}
			$row_count++;
		} else { // anonymous user
			$diff = REQUEST_TIME - $product_launch_date;
			if($diff > $time_diff) {
				$prodCounter++;
				//$uidArr = $prod['#node']->field_application_area_recommend['und'];
				$uidArr1 = array();
				foreach($uidArr as $val) {
					if(!in_array($val['tid'], $app_array)) {
						$app_array[] = $val['tid'];
					}
					$uidArr1[]= $val['tid'];
				}
				
				
				/*foreach($uidArr as $val) {
					$uidArr1[]= $val['tid'];
				}*/
				$uidStr = implode(',',$uidArr1);
				$path = drupal_get_path_alias('node/'.$prod['#node']->nid);
				
				$temp_path = explode('/', $path);
				array_pop($temp_path);
				$new_path = implode('/', $temp_path);
				//echo $new_path .' '. $current_path . '<br/>';
				
				
				if($new_path == $current_path) {
					
					$path = base_path().drupal_get_path_alias('node/'.$prod['#node']->nid);
					$title = $prod['#node']->title;
					$temp = explode(' ', $title);
					$title1 = array_shift($temp);
					$title2 = implode(' ',$temp);
					$img = file_create_url($prod['#node']->uc_product_image['und'][0]['uri']);
					
					if($prod['#node']->field_wattages) {
						$wattage = $prod['#node']->field_wattages['und'][0]['value'];
					} else {
						$wattage = '';
					}
					$desc = $prod['#node']->body['und'][0]['value'];
					if($prod['#node']->field_product_code) {
						$prod_code = $prod['#node']->field_product_code['und'][0]['value'];
					} else {
						$prod_code = '';
					}
					$model = $prod['#node']->model;
					if($prod['#node']->field_brochure_download) {
						$brochure = file_create_url($prod['#node']->field_brochure_download['und'][0]['uri']);
					} else {
						$brochure = '';
					}
					
					$list_view .= '<tr uid="'.$uidStr.'"><td><span class="productName"><a href="'.$path.'">'.$title1.' <span class="semiBold">'.$title2.'</span></span></td></td>';
					$list_view .= '<td>'.$prod_code.' | '.$model.'</td><td>'.$desc.'</td><td>'.$wattage.'</td></tr>';
					if($row_count == 0) {
						$grid_view .= '<ul class="gridRow">';
					}
					if($row_count > 7) {
						$row_count = 0;
						$grid_view .= '</ul><ul class="gridRow">';
					}
					
					$grid_view .= '<li uid="'.$uidStr.'"><a href="'.$path.'"><div class="productImg"><img alt="" src="'.$img.'"></div></a>
					<div class="productContent"><h2><a href="'.$path.'"><span class="bottomLine">';
					$grid_view .= $title1.' <span class="semiBold">'.$title2.'</span></span> <span class="redArrow ornegArow"></span></h2></a>';
					$grid_view .= '<p class="proCode">'.$prod_code.'</p><p>'.$desc.'</p>';
					if($brochure) {
						$grid_view .= '<a class="actionLink" href="'.$brochure.'" title="Download Brochure" target="_blank"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>';
					}
					$grid_view .= '</div></li>';
				}
				$row_count++;
			}
		}
		/*if(($current_time - $product_launch_date) >= $time_diff) {
			$prodCounter++;
			$uidArr = $prod['#node']->field_application_area_recommend['und'];
			$uidArr1 = array();
			foreach($uidArr as $val) {
				$uidArr1[]= $val['tid'];
			}
			$uidStr = implode(',',$uidArr1);
			$path = drupal_get_path_alias('node/'.$prod['#node']->nid);
			
			$temp_path = explode('/', $path);
			array_pop($temp_path);
			$new_path = implode('/', $temp_path);
			//echo $new_path .' '. $current_path . '<br/>';
			
			
			if($new_path == $current_path) {
				
				$path = base_path().drupal_get_path_alias('node/'.$prod['#node']->nid);
				$title = $prod['#node']->title;
				$temp = explode(' ', $title);
				$title1 = array_shift($temp);
				$title2 = implode(' ',$temp);
				$img = file_create_url($prod['#node']->uc_product_image['und'][0]['uri']);
				
				if($prod['#node']->field_wattages) {
					$wattage = $prod['#node']->field_wattages['und'][0]['value'];
				} else {
					$wattage = '';
				}
				$desc = $prod['#node']->body['und'][0]['value'];
				if($prod['#node']->field_product_code) {
					$prod_code = $prod['#node']->field_product_code['und'][0]['value'];
				} else {
					$prod_code = '';
				}
				$model = $prod['#node']->model;
				if($prod['#node']->field_brochure_download) {
					$brochure = file_create_url($prod['#node']->field_brochure_download['und'][0]['uri']);
				} else {
					$brochure = '';
				}
				
				$list_view .= '<tr uid="'.$uidStr.'"><td><span class="productName"><a href="'.$path.'">'.$title1.' <span class="semiBold">'.$title2.'</span></span></td></td>';
				$list_view .= '<td>'.$prod_code.' | '.$model.'</td><td>'.$desc.'</td><td>'.$wattage.'</td></tr>';
				if($row_count == 0) {
					$grid_view .= '<ul class="gridRow">';
				}
				if($row_count > 7) {
					$row_count = 0;
					$grid_view .= '</ul><ul class="gridRow">';
				}
				
				$grid_view .= '<li uid="'.$uidStr.'"><a href="'.$path.'"><div class="productImg"><img alt="" src="'.$img.'"></div></a>
				<div class="productContent"><h2><a href="'.$path.'"><span class="bottomLine">';
				$grid_view .= $title1.' <span class="semiBold">'.$title2.'</span></span> <span class="redArrow ornegArow"></span></h2></a>';
				$grid_view .= '<p class="proCode">'.$prod_code.'</p><p>'.$desc.'</p>';
				if($brochure) {
					$grid_view .= '<a class="actionLink" href="'.$brochure.'" title="Download Brochure" target="_blank"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>';
				}
				$grid_view .= '</div></li>';
			}
			$row_count++;
		}*/
		
	}
	$case_study_block = '';
	$app_mapped_products = '';
	$app_mapped_products_first = true;
	if(array_key_exists(3, $curpath) || (!array_key_exists(3, $curpath) && $curpath[2] != 'indoor' && $curpath[2] != 'outdoor')) {
		//echo 'not indoor/outdoor';
		foreach($app_array as $key => $value) {
			if($app_mapped_products_first) {
				$app_mapped_products .= $value;
				$app_mapped_products_first = false;
			} else {
				$app_mapped_products .= ','. $value;
			}
		}
		
		//echo $app_mapped_products;
		if($app_mapped_products) {
			$sql = "SELECT DISTINCT(n.nid) AS nid, n.title AS title, n.created AS created, pdf.field_pdf_download_fid AS field_pdf_download_fid, fdb.body_value AS body_value, fm.uri AS uri
							FROM {node} n
							LEFT OUTER JOIN {field_data_body} fdb ON fdb.entity_id = n.nid
							LEFT OUTER JOIN {field_data_field_pdf_download} pdf ON pdf.entity_id = n.nid
							LEFT OUTER JOIN {file_managed} fm ON fm.fid = pdf.field_pdf_download_fid
							LEFT OUTER JOIN {field_data_field_application} fpa ON fpa.entity_id = n.nid
							WHERE fpa.field_application_tid IN (".$app_mapped_products.")
							AND n.status = 1
							ORDER BY n.created DESC
							LIMIT 3";
			$results = db_query($sql);
			foreach($results as $row) {
				//echo '<pre>'; print_r($row); echo '</pre>';
				$pdf = file_create_url($row->uri);
				$case_study_block .= '<li><div class="content"><p class="title">'.$row->title.'</p>'.$row->body_value;
				$case_study_block .= '<a href="'.$pdf.'" class="actionLink" target="_blank"><i class="fa fa-file-pdf-o"></i>Download </a> </div></li>';
			}
		}
	}
	//echo $case_study_block;
	

	$grid_view .= '</ul>';
	$app_options = '';
	foreach($app_array as $app_list) {
		$app_tid = $app_list;
		$term_name = db_query("SELECT name FROM {taxonomy_term_data} WHERE tid=:arg", array(':arg' => $app_tid))->fetchField();
		$app_options .= '<option value="'.$app_tid.'">'.$term_name.'</option>';
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
	<!--contentMaster:start-->
  <div class="contentMaster">
		<div id="container" class="clearfix container">
			<div id="main" role="main" class="clearfix">
				<?php print $messages; ?>
				<?php print $breadcrumb; ?>
				<a id="main-content"></a>
				<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
				<?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
				<?php print render($page['help']); ?>
				<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				<?php //print render($page['content']); ?>
				<div class="sectionWrapper productCategory">
					<!--pageInfoSection:start-->
          <div class="pageInfoSection">
            <div class="lhsInfo"><img src="<?php print $image_path; ?>" alt="">
              <?php if(!empty($curpath[3])): ?>
								<div class="titleBox"><h2><?php echo $curpath[2]; ?></h2></div>
							<?php endif; ?>
            </div>
            <div class="rhsInfo">
              <h1><?php print $cat_title1; ?><br><span class="semiBold"><Luminiares ><?php print $cat_title2?></span> </h1>
              <?php print $description; ?>
            </div>
          </div>
          <!--pageInfoSection:end-->
				<?php if(!isset($curpath[3]) && ($curpath[2] == 'indoor' || $curpath[2] == 'outdoor')): ?>
					<div class="childList">
            <h2>All <span class="semiBold">Product Categories</span></h2>
						<ul>
							<?php
								$tid_array = array();
								$sub_terms = taxonomy_get_children($parent_tid, $vid = 3);
								foreach($sub_terms as $row) {
									array_push($tid_array, $row->tid);
									$child_path = base_path(). drupal_get_path_alias('taxonomy/term/'.$row->tid);
									echo '<li><a href="'.$child_path.'">'.$row->name.'<span class="arrowIco"></span></a></li>';
								}
							?>
						</ul>
						<!-- Case Study block -->
						
						<?php
							//echo 'indoor/outdoor';
							$prod_app_array = array();
							foreach($tid_array as $cat_tid) {
								$results = db_query("SELECT entity_id FROM field_data_field_product_category WHERE field_product_category_tid = :arg", array(':arg' => $cat_tid));
								foreach($results as $row) {
									array_push($node_array, $row->entity_id);
								}
							}
							//echo '<pre>'; print_r($node_array); echo '</pre>';
							$nodes = node_load_multiple($node_array);
							foreach($nodes as $node) {
								if(!empty($node->field_application_area_recommend)) {
									foreach($node->field_application_area_recommend['und'] as $aptid) {
										//echo '<pre>'; print_r($aptid); echo '</pre>';
										$temp_tid = $aptid['tid'];
										if(!in_array($temp_tid, $prod_app_array)) {
											array_push($prod_app_array, $temp_tid);
										}
									}
								}
							}
							
							foreach($prod_app_array as $key => $value) {
								if($app_mapped_products_first) {
									$app_mapped_products .= $value;
									$app_mapped_products_first = false;
								} else {
									$app_mapped_products .= ','. $value;
								}
							}
							
							//echo $app_mapped_products; exit;
							if($app_mapped_products) {
								$sql = "SELECT DISTINCT(n.nid) AS nid, n.title AS title, n.created AS created, pdf.field_pdf_download_fid AS field_pdf_download_fid, fdb.body_value AS body_value, fm.uri AS uri
												FROM {node} n
												LEFT OUTER JOIN {field_data_body} fdb ON fdb.entity_id = n.nid
												LEFT OUTER JOIN {field_data_field_pdf_download} pdf ON pdf.entity_id = n.nid
												LEFT OUTER JOIN {file_managed} fm ON fm.fid = pdf.field_pdf_download_fid
												LEFT OUTER JOIN {field_data_field_application} fpa ON fpa.entity_id = n.nid
												WHERE fpa.field_application_tid IN (".$app_mapped_products.")
												AND n.status = 1
												ORDER BY n.created DESC
												LIMIT 3";
								$results = db_query($sql);
								foreach($results as $row) {
									//echo '<pre>'; print_r($row); echo '</pre>';
									$pdf = file_create_url($row->uri);
									$case_study_block .= '<li><div class="content"><p class="title">'.$row->title.'</p>'.$row->body_value;
									$case_study_block .= '<a href="'.$pdf.'" class="actionLink" target="_blank"><i class="fa fa-file-pdf-o"></i>Download </a> </div></li>';
								}
							}
							//echo $case_study_block;
							//echo '<pre>'; print_r($prod_app_array); echo '</pre>';
						?>
						<!-- Case Study block -->
          </div>
				<?php else: ?>
					<?php if(!empty($page['content']['system_main']['nodes'])): ?> <!-- Products available, then show filter bar  ->
						<!--categoryFilter:start-->
						<div class="categoryFilter">
							<div class="filterBar">
								<div class="filterSelect">
									<ul>
										<li class="view">View</li>
										<li>
											<div class="selBox">
												<div class="selVal">All Application</div>
												<select id="applications" name="applications">
													<option value='all'>All Application</option>
													<?php echo $app_options; ?>
												</select>
											</div>
										</li>
									</ul>
								</div>
								<div class="filtertabs"> <a href="javascript:;" class="gridView"></a>  <a href="javascript:;" class="listView"></a> </div>
							</div>
							<div class="tabSection">
				<div class="tabcontent gridView">
									<?php print $grid_view; ?>
					<a href="javascript:;" class="loadmoreBtn" >Load More Products</a>
					<div class="error gridErrMsg" style="display:none">No Products to show</div>
					</div>
								<div class="tabcontent tableView">
									<table id="sortingTable">
										<thead>
											<tr>
												<th>Product Name <span class="dropBtns"> <a href="javascript:;" class="upBtn"></a> <a href="javascript:;" class="dwnBtn"></a> </span></th>
												<th>Product Code </th>
												<th>Description</th>
												<th>Wattage <span class="dropBtns"> <a href="javascript:;" class="upBtn"></a> <a href="javascript:;" class="dwnBtn"></a> </span></th>
											</tr>
										</thead>
										<tbody><?php print $list_view; ?></tbody>
									</table>
									<div class="error listErrMsg" style="display:none">No Products to show</div>
								</div>
								
							</div>
						</div>
						<!--categoryFilter:end-->
					<?php else: ?> <!-- Show tax Desc-->
						<div class="fullContentSection">
							<div class="pageContent">
								<div class="pgeCopy">
									<?php print $page['content']['system_main']['term_heading']['term']['#term']->field_content['und'][0]['value'];?>
								</div>
							</div>
						</div>
					
					
					<?php endif; ?> <!-- Products available, then show filter bar  ends->
				<?php endif; ?>
					
				
			<!--caseStudySection:start-->
		  <?php get_installation_guide_block(); ?>
          <div class="caseStudySection fullWidthCaseStudySection">
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
					
					
					
				</div>
				
			</div> <!-- /#main -->
		</div> <!-- /#container -->
	</div>
  <!--contentMaster:end--> 
</section>
<div class="overlay"></div>
<?php print render($page['header']); ?>
