<?php
/**
 * Implements hook_html_head_alter().
 * We are overwriting the default meta character type tag with HTML5 version.
 */
function framework_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
  unset($head_elements['system_meta_generator']);
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */

function framework_breadcrumb($variables) {
	//echo '<pre>';print_r($variables); echo '</pre>'; //exit;
	$path = explode('/', drupal_get_path_alias(current_path()));
  $breadcrumb = $variables['breadcrumb'];
	//echo '<pre>'; print_r($path);echo '</pre>';
	//echo '<pre>';print_r($breadcrumb); echo '</pre>';
  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
		
		if($path[0] == 'applications') {
			$breadcrumb[1] = '<li class="noBcLink">Applications</li>';
		}
		if($path[0] == 'resources') {
			$breadcrumb[1] = '<li class="noBcLink">Resources</li>';
			if(isset($path[2])) {
				$breadcrumb[2] = '<li> <a href="javascript:;">'.str_replace('-', ' ', $path[1]).'</a></li>';
				if($path[1] == 'product-brochures') {
					//$breadcrumb[3] = '<li class="sel aaa">'.str_replace('-', ' ', $path[2]).'</li>';
				}
			}
			if($path[1] == 'knowledge-center') {
				$breadcrumb[2] = '<li class="sel">'.str_replace('-', ' ', $path[1]).'</li>';
				
			}
		}
		if($path[0] == 'innovation-in-lighting') {
			$breadcrumb[1] = '<li class="noBcLink">Innovation in Lighting</li>';
		}
		if($path[0] == 'about-us') {
			$breadcrumb[1] = '<li class="noBcLink">About Us</li>';
			if(isset($path[2])) {
				$breadcrumb[2] = '<li class="noBcLink">'.str_replace('-', ' ', $path[1]).'</li>';
			}
			
		}
		if($path[0] == 'products') {
			if(isset($path[4])) {
				$breadcrumb[1] = '<li class="noBcLink">'.$path[0].'</li>';
				$breadcrumb[2] = '<li class="noBcLink">' . $path[1].'</li>' ;
				$url =  'products/'.$path[1].'/'.$path[2];
				$breadcrumb[3] = l($path[2], $url);
				$url =  'products/'.$path[1].'/'.$path[2].'/'.$path[3];
				$breadcrumb[4] = l(str_replace('-', ' ', $path[3]), $url);
				
			} elseif(isset($path[3])) {
				$breadcrumb[1] = '<li class="noBcLink">Products</li>';
				if(isset($breadcrumb[2])) {
					$breadcrumb[2] = $path[1];
					$breadcrumb[2] = '<li class="2 noBcLink">'. $breadcrumb[2]. '</li>';
				} else {
					$breadcrumb[2] = '<li class="1 noBcLink">'. str_replace('-', ' ', $path[1]). '</li>';
				}
				if(isset($breadcrumb[3])) {
					$breadcrumb[3] = $breadcrumb[2];
				} else {
					if($path[2] == 'indoor' || $path[2] == 'outdoor') {
						$breadcrumb[3] = '<li>'. str_replace('-', ' ', l($path[2], '/'.$path[0].'/'.$path[1].'/'.$path[2])). '</li>';
					} else {
						$breadcrumb[3] = '<li class=" 3 noBcLink">'. str_replace('-', ' ', $path[2]). '</li>';
					}
				}
			} else {
				$breadcrumb[2] = '<li class="noBcLink">'. strip_tags($breadcrumb[1]). '</li>';
				$breadcrumb[1] = '<li class="noBcLink">Products</li>';
			}
			
		}
		
		
		//echo 'title' . drupal_get_title();
    $heading = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // Uncomment to add current page to breadcrumb
		$breadcrumb[] = '<li class="sel">' . drupal_get_title(). '</li>';
		if(arg(1) == 'register') {
			
			$breadcrumb[1] =  '<li class="sel">Register Now</li>';
			array_pop($breadcrumb);
		}
		if(arg(1) == 'password') {
			
			$breadcrumb[1] =  '<li class="sel">Forgot Password</li>';
			array_pop($breadcrumb);
		}
		
		if(arg(0) == 'user' && arg(2) == 'edit') {
			$breadcrumb[1] = '<li><a href="javascript:;">User</a></li>';
			//array_pop($breadcrumb);
		}
		
		if(arg(0) == 'search') {
			$breadcrumb[1] = $breadcrumb[3];
			array_pop($breadcrumb);
			array_pop($breadcrumb);
		}
		//echo '<pre>';print_r($breadcrumb); echo '</pre>'; exit;
		foreach($breadcrumb as $key => $value) {
			$a[$key]  = ' <li>' .$value. '</li>';
		}
		$breadcrumb = $a;
		//print_r($breadcrumb);
    return '<ul class="breadcrumbs">' . implode('', $breadcrumb) . '</ul>';
  }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function framework_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function framework_preprocess_node(&$variables) {
  $variables['submitted'] = t('Published by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
	if($variables['view_mode'] == 'teaser') {
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->type . '__teaser';   
  }
}

function framework_preprocess_page(&$variables) {
	if(arg(2) == 'get-a-quote') {
		drupal_set_title('Request a Quote');
	}
	if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
		//echo 'in here';
    $term = taxonomy_term_load(arg(2));
		//echo $term->vocabulary_machine_name;
    $variables['theme_hook_suggestions'][] = 'page__vocabulary__' . $term->vocabulary_machine_name;
  }

	if (isset($variables['node']->type)) {
		$variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
	}
	if (drupal_is_front_page()) {
		$variables['title']="";
		unset($variables['page']['content']['system_main']['default_message']);
	}
}

/**
 * Preprocess variables for region.tpl.php
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
function framework_preprocess_region(&$variables, $hook) {
  // Use a bare template for the content region.
  if ($variables['region'] == 'content') {
    $variables['theme_hook_suggestions'][] = 'region__bare';
  }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function framework_preprocess_block(&$variables, $hook) {
  // Use a bare template for the page's main content.
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'][] = 'block__bare';
  }
  $variables['title_attributes_array']['class'][] = 'block-title';
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function framework_process_block(&$variables, $hook) {
  // Drupal 7 should use a $title variable instead of $block->subject.
  $variables['title'] = $variables['block']->subject;
}

/**
 * Changes the search form to use the "search" input element of HTML5.
 */
function framework_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}

function framework_preprocess_html(&$vars) {
	
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/jquery.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/table.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/jquery.cookie.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/custom.js', array('type' => 'file', 'scope' => 'footer'));
	if(arg(1) == 'support-form') {
		drupal_add_css(drupal_get_path('theme', 'framework').'/css/jquery-ui.css');
		drupal_add_js(drupal_get_path('theme', 'framework').'/js/jquery-ui.js', array('type' => 'file', 'scope' => 'footer'));
	}
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/jquery.touchSwipe.min.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/jquery.easing.1.3.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/common.js', array('type' => 'file', 'scope' => 'footer'));	
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/homepage.js', array('type' => 'file', 'scope' => 'footer'));
	
	if(drupal_is_front_page()) {
		drupal_add_js(drupal_get_path('theme', 'framework').'/js/locator.js', array('type' => 'file', 'scope' => 'footer'));
	}
	if(arg(0) == 'dealer-locator') {
		drupal_add_js(drupal_get_path('theme', 'framework').'/js/locator.js', array('type' => 'file', 'scope' => 'footer'));
		drupal_add_js(drupal_get_path('theme', 'framework').'/js/mCustomScrollbar.min.js', array('type' => 'file', 'scope' => 'footer'));
	}
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/mCustomScrollbar.min.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(drupal_get_path('theme', 'framework').'/js/jquery.form.js', array('type' => 'file', 'scope' => 'footer'));
	
}

function framework_block_view_user_login_alter(&$data, $block) {
    global $user;
    if (!$user->uid && !(arg(0) == 'user' && (arg(1) == 'login'))) {
        $block->subject = t('User login');
        $block->content = drupal_get_form('user_login_block');
    }
}


function framework_css_alter(&$css) {
	// Remove Drupal core css
	$exclude = array(
				'modules/aggregator/aggregator.css' 																=> FALSE,
				'modules/block/block.css' 																					=> FALSE,
				'modules/book/book.css' 																						=> FALSE,
				'modules/comment/comment.css' 																			=> FALSE,
				'modules/dblog/dblog.css' 																					=> FALSE,
				'modules/field/theme/field.css' 																		=> FALSE,
				'modules/file/file.css' 																						=> FALSE,
				'modules/filter/filter.css' 																				=> FALSE,
				'modules/forum/forum.css' 																					=> FALSE,
				'modules/help/help.css' 																						=> FALSE,
				'modules/menu/menu.css' 																						=> FALSE,
				'modules/node/node.css' 																						=> FALSE,
				'modules/openid/openid.css' 																				=> FALSE,
				'modules/poll/poll.css' 																						=> FALSE,
				'modules/profile/profile.css' 																			=> FALSE,
				'modules/search/search.css' 																				=> FALSE,
				'modules/statistics/statistics.css' 																=> FALSE,
				'modules/syslog/syslog.css' 																				=> FALSE,
				'modules/system/admin.css' 																					=> FALSE,
				'modules/system/maintenance.css' 																		=> FALSE,
				//'modules/system/system.css' 																				=> FALSE,
				'modules/system/system.admin.css' 																	=> FALSE,
				'modules/system/system.base.css' 																		=> FALSE,
				'modules/system/system.maintenance.css' 														=> FALSE,
				'modules/system/system.messages.css' 																=> FALSE,
				'modules/system/system.menus.css' 																	=> FALSE,
				//'modules/system/system.theme.css' 																	=> FALSE,
				'modules/taxonomy/taxonomy.css' 																		=> FALSE,
				'modules/tracker/tracker.css' 																			=> FALSE,
				'modules/update/update.css' 																				=> FALSE,
				'sites/all/modules/contributed/ubercart/uc_product/uc_product.css'	=> FALSE,
				'sites/all/modules/contributed/ubercart/uc_store/uc_store.css' 			=> FALSE,
				//'modules/user/user.css' 								=> FALSE,
				'misc/vertical-tabs.css' 																						=> FALSE,
	 
				// Remove contrib module CSS
				//drupal_get_path('module', 'views') . '/css/views.css' => FALSE,
	);
	$css = array_diff_key($css, $exclude);

}

function get_payback_dropdown_list() {
	//$options = '<option id="0" value="Quantity">Quantity</option>';
	$temp_arr = array();
	$options = '';
	$query = db_select('field_data_field_base_name', 'p')
				->fields('p', array('entity_id', 'field_base_name_value'));			
	$result = $query->execute();
	foreach($result as $row) {
		if(!in_array($row->field_base_name_value, $temp_arr)) {
			$options .= '<option id="'.$row->entity_id.'" value="'.$row->field_base_name_value.'">'.$row->field_base_name_value.'</option>';
			array_push($temp_arr, $row->field_base_name_value);
		}
	}
	return $options;
}

function get_sub_apps($term_id) {   // 
	$query = db_select('taxonomy_term_data', 'tt');
	$query->leftJoin('taxonomy_term_hierarchy', 'th', 'th.tid = tt.tid');
	$query->fields('tt', array('name', 'tid'))
				->condition('th.parent', $term_id, '=');
	$result = $query->execute();
	$output = '<div class="filterSubAppSection"><div class="titleBox"> <span class="greyBorder"><span class="spireIcon filterIco"></span></span><h3>Filter By Sub Application</h3></div><div class="subApps"><div class="bestSuitedCarousel"><div class="bestSuitedCarouselWrap"><ul>';
	$i = 0;
	foreach($result as $row) {
		$i++;
		$term_name = $row->name;
		$tid = $row->tid;
		$term = taxonomy_term_load($tid);
		//echo '<pre>'; print_r($term); echo '</pre>';
		if($term->field_icon_image) {
			$icon_img = file_create_url($term->field_icon_image['und'][0]['uri']);
		} else {
			$icon_img = '';
		}
		$output .= '<li class="appSelector applications1" tid="'.$term->tid.'"><div class="iconBox"><img id="'.$tid.'" src="'.$icon_img.'" alt=""></div>';
		$output .= '<p>'.$term_name.'</p></li>';
		
	}
	$output .='</ul></div><div class="actionDiv"> <span class="slideLength"><span class="sel">4</span>/<span class="total">3</span></span> <span class="slideArrow"> <span class="prevArrow">&nbsp;</span> <span class="nextArrow">&nbsp;</span> </span> </div></div></div><div class="downArrow"></div></div>';
	if($i >= 1)
		return $output;
	else
		return '<div style="margin:30px 0px 30px 0px; float:left;width:100%;"></div>';
}


	function get_a_callback_form() {
		global $user;
		global $base_url;
		$action = base_path(). drupal_get_path_alias(current_path());
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
    $output = '<div class="formRight">
              <div class="form">
                <h2>Get a <span class="semiBold">Call Back</span></h2>
								<span class="thankYouMsg">Thank you for getting in touch with us. We will get back to you shortly.</span>
								<form type="POST" action="'.$action.'" autocomplete="off">
                <div class="formData">
                  <div class="row">
                    <div class="formIco"><span class="spireIcon nameIco"></span></div>
                    <div class="field">
                      <input id="name" type="text" value="'.$name.'" placeholder="*Name" maxlength="50" minlength="2" autocomplete="false">
											<span class="errorVisible">Please enter valid name</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="formIco"><span class="spireIcon mailIco"></span></div>
                    <div class="field">
                      <input id="email" type="text" value="'.$mail.'" placeholder="*E-mail" maxlength="50" minlength="6" autocomplete="false">
											<span class="errorVisible">Please enter valid email</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="formIco"><span class="spireIcon mobileIco"></span></div>
                    <div class="field">
                      <input id="mobile" type="tel" value="'.$contact.'" placeholder="*Mobile Number" maxlength="10" minlength="10" autocomplete="false">
											<span class="errorVisible">Please enter valid mobile number</span>
                    </div>
                  </div>
									<div class="row">
                    <div class="formIco"><span class="spireIcon cityIco"></span></div>
                    <div class="field">
                      <input id="city" type="text" value="" placeholder="*City" maxlength="25" minlength="3" autocomplete="false">
											<span class="errorVisible">Please enter valid city name</span>
                    </div>
                  </div>
									<div class="row capchBox">
                    <div class="clm">
                      <!--<label>Enter Captcha code:</label>-->
											<div class="field">
												<div class="capchImg"><img src="'.$base_url.'/captcha.php" id="captcha" class="imgCaptcha"/></div>
												<a href="javascript:;" onclick="document.getElementById(\'captcha\').src=\''.base_path().'captcha.php?\'+Math.random();document.getElementById(\'captcha-form\').focus();"id="change-image">Not readable? Change text.</a>
												<input type="text" name="captcha" id="captcha-form" autocomplete="off" placeholder="Enter Captcha code" />
												<span class="errors captchaErr">Please enter correct Captcha Code</span> </div>
											</div>
                    </div>
									
									
                  <div class="row"> <a id="submitThis" class="arrowLink formBtn" href="javascript:;">Send <span class="arrowIco"></span></a></div>
                </div>
								</form>
              </div>
            </div>';
    return $output;
  }
  
  function getLightingAppAreas($area) {
		$sql = "SELECT DISTINCT(ttd.name) FROM field_data_field_area fa 
						LEFT JOIN field_data_field_space fs ON fs.entity_id = fa.entity_id
						LEFT JOIN taxonomy_term_data ttd ON ttd.tid = fa.field_area_tid
						WHERE fs.field_space_value = '".$area."' 
						ORDER BY ttd.name ASC";
		$result = db_query($sql);
		//echo '<pre>'; print_r($tree); echo '</pre>';
		$options = '';
		$options .='<option value="">Select Area</option>';
		foreach ($result as $row) {
			echo '<pre>'; print_r($term); echo '</pre>';
			$options .='<option value="'.$row->name.'">'.$row->name.'</option>';

		}
		return $options;
  }
  
  function getLightingAppSubAreas() {
		$tree = 	taxonomy_get_tree(8, $parent = 0, $max_depth = NULL, $load_entities = TRUE);
		$options = '';
		foreach ($tree as $term) {
			$icon_img = file_create_url($term->field_icon['und'][0]['uri']);
			//echo '<pre>'; print_r($term); echo '</pre>';
			$options .='<li class="areaType"><div class="iconBox"><span class="checkedArrow">&nbsp;</span> <img src="'.$icon_img.'"></div><p>'.$term->name.'</p></li>';
		}
		return $options;
  }
    
  function getLightingAppMountingHeight($arg) {
		$options = '';
		$query = db_query("select distinct(field_mounting_height_value) from {field_data_field_mounting_height}");
		$options .='<option value="">Select Mounting Height</option>';
		foreach ($query as $row) {
			if($arg == 'factory') {
				if($row->field_mounting_height_value != '2.8M') {
					$options .='<option value="'.$row->field_mounting_height_value.'">'.$row->field_mounting_height_value.'</option>';
				}
			} else {
				if($row->field_mounting_height_value == '2.8M') {
					$options .='<option value="'.$row->field_mounting_height_value.'">'.$row->field_mounting_height_value.'</option>';
				}
			}
			
			
		}
		return $options;
  }
	
	function get_case_study_block($tid) {
		//$term = taxonomy_term_load(arg(3));
		//echo 'TID :'. $tid;
		$app_ids = array($tid);
		$children = taxonomy_get_children($tid, $vid = 5);
		if(!empty($children)) {
			foreach($children as $child) {
				array_push($app_ids, $child->tid);
			}
		}
		//echo '<pre>'; print_r($app_ids); echo '</pre>';
		$output = '';
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
          ->entityCondition('bundle', 'case_studies')
					->fieldCondition('field_application', 'tid', $app_ids)
					->fieldOrderBy('field_case_study_date', 'value', 'DESC')
          ->range(0, 3);
    $result = $query->execute();
    if(isset($result['node'])) {
      $nids = array_keys($result['node']);
      $nodes = node_load_multiple($nids);
      foreach($nodes as $node) {
        $title = $node->title;
        $desc = $node->body['und'][0]['value'];
        $pdf = file_create_url($node->field_pdf_download['und'][0]['uri']);
        $created = date('d m Y', strtotime($node->field_case_study_date['und'][0]['value']));
				$path = base_path(). 'resources/case-studies';
				$output .= '<li><div class="content"><p class="title">'.$title.'</p>'.$desc;
				$output .= '<a href="'.$pdf.'" class="actionLink" target="_blank"><i class="fa fa-file-pdf-o"></i>Download </a> </div></li>';
      }
    }
    return $output;
	}
	
	
	function get_case_study_block_p() {
		//$term = taxonomy_term_load(arg(3));
		$output = '';
		$query = new EntityFieldQuery();
		$query->entityCondition('entity_type', 'node')
					->entityCondition('bundle', 'case_studies')
					->fieldOrderBy('field_case_study_date', 'value', 'DESC')
					->range(0, 2);
		$result = $query->execute();
		if(isset($result['node'])) {
		  $nids = array_keys($result['node']);
		  $nodes = node_load_multiple($nids);
		  foreach($nodes as $node) {
			$title = $node->title;
			$desc = $node->body['und'][0]['value'];
			$pdf = file_create_url($node->field_pdf_download['und'][0]['uri']);
			$created = date('d m Y', strtotime($node->field_case_study_date['und'][0]['value']));
				if(arg(1) == 'term') {
					$path = base_path(). 'resources/case-studies';
					$output .= '<li><div class="content"><p class="title">'.$title.'</p>'.$desc;
					$output .= '<a href="'.$pdf.'" class="actionLink" target="_blank"><i class="fa fa-file-pdf-o"></i>Download </a> </div></li>';
				} else {
					$output .= '<li><div class="content"><p class="title">'.$title.'</p>'.$desc;
					$output .= '<a href="'.$pdf.'" class="actionLink" target="_blank"><i class="fa fa-file-pdf-o"></i>Download </a> </div></li>';
				}
		  }
		}
		return $output;
	}
	
	
	function get_installation_guide_block() {
		//$term = taxonomy_term_load(arg(3));
		$output = '';
		$query = new EntityFieldQuery();
		$query->entityCondition('entity_type', 'node')
					->entityCondition('bundle', 'installation_gallery')
					->propertyCondition('status', NODE_PUBLISHED)
					->propertyOrderBy('created', 'DESC')
					->range(0, 3);
		$result = $query->execute();
		if(isset($result['node'])) {
		  $nids = array_keys($result['node']);
		  $nodes = node_load_multiple($nids);
		  foreach($nodes as $node) {
				//echo '<pre>'; print_r($node); echo '</pre>'; 
				$title = $node->title;
				$desc = $node->body['und'][0]['value'];
				$img = file_create_url($node->field_thumb_image['und'][0]['uri']);
				//echo $img;
				$path = base_path(). 'resources/installation-gallery';
				$output .= '<li><div class="banner"><img src="'.$img.'" alt=""></div>
				<div class="content"><p class="title">'.$title.'</p>';
				//$output .= '<p>'.$desc.'</p>';
				$output .= '</div></li>';
		  }
			//exit;
		}
		return $output;
	}
	
	function get_installation_guide_block_p() {
		//$term = taxonomy_term_load(arg(3));
		$output = '';
		$query = new EntityFieldQuery();
		$query->entityCondition('entity_type', 'node')
			  ->entityCondition('bundle', 'installation_gallery')
			  //->fieldOrderBy('field_case_study_date', 'value', 'DESC')
			  ->range(0, 3);
		$result = $query->execute();
		if(isset($result['node'])) {
		  $nids = array_keys($result['node']);
		  $nodes = node_load_multiple($nids);
		  foreach($nodes as $node) {
			 //echo '<pre>'; print_r($node); echo '</pre>'; exit;
			$title = $node->title;
			$desc = $node->body['und'][0]['value'];
			$img = file_create_url($node->field_ins_image['und'][0]['uri']);
			$path = base_path(). 'resources/installation-gallery';
			$output .= '<li><div class="banner"><img src="'.$img.'" alt=""></div><div class="content"><p class="title">'.$title.'</p><p>'.$desc.'</p></div></li>';
		  }
		}
		return $output;
	}
	
	function get_product_page_case_study_block($app_mapped_products) {
		$temp = explode(',',$app_mapped_products);
		$output = '';
		$query = db_select('node', 'n');
		$query->leftJoin('field_data_body', 'fdb', 'fdb.entity_id = n.nid');
		$query->leftJoin('field_data_field_pdf_download', 'pdf', 'pdf.entity_id = n.nid');
		$query->leftJoin('file_managed', 'fm', 'fm.fid = pdf.field_pdf_download_fid');
		$query->leftJoin('field_data_field_application', 'fpa', 'fpa.entity_id = n.nid');
		//$query->condition('n.type', array('case_studies'), 'IN')
		$query->condition('field_application_tid', $temp, 'IN')
					->condition('n.status', 1, '=')
					->fields('n', array('nid', 'title', 'created'))
					->fields('pdf', array('field_pdf_download_fid'))
					->fields('fdb', array('body_value'))
					->fields('fm', array('uri'))
					->orderBy('n.created', 'DESC');
					//->range(0,3);
		//echo (string)$query;
		$results = $query->execute();
		$temp_title = array();
		$count = 1;
		foreach($results as $row) {
			//echo '<pre>'; print_r($results); echo '</pre>';
			if(!in_array($row->title, $temp_title)) {
				if($count <= 3) {
					$pdf = file_create_url($row->uri);
					$output .= '<li><div class="content"><p class="title">'.$row->title.'</p>'.$row->body_value;
					$output .= '<a href="'.$pdf.'" class="actionLink" target="_blank"><i class="fa fa-file-pdf-o"></i>Download </a> </div></li>';
					$count++;
					array_push($temp_title, $row->title);
				}
				
			}
			
		}
		//echo $output;
		//exit;
		return $output;
	}
	
	function get_LEDEDGE_popup_box() {
		$output = '<div class="lightbox lbLedEdge">
		<a class="closeBtn"></a>
		<div class="lightboxContent">
  <h2>LED<span class="semiBold">EDGE</span></h2>
  <ul class="ledGroup">
    <li class="eco"><span class="firstLetter">E</span>co - sustainability</li>
    <li class="design"><span class="firstLetter">D</span>esign &amp; innovation</li>
    <li class="green"><span class="firstLetter">G</span>reen Technology</li>
    <li class="effi"><span class="firstLetter">E</span>fficient lighting solutions</li>
  </ul>
  <p>Wipro Lighting\'s LED Edge offers an opportunity to discover the benefits of good lighting with futuristic, functional and eco-sustainable lighting solutions. LED EDGE provides a healthy lighting environment to the people in every way.</p>
  <div class="ledEdgeAdvantages"> <span class="titleWrap">
    <h3>LEDEDGE <span class="semiBold">advantages</span></h3>
  </div>
  <img class="imgCall" src="'.base_path().'sites/default/files/staticimgs/lededge-advantage-img.jpg" alt="" />
</div>
		</div>';
		return $output;
	}
	
	function wipro_latest_award() {
		$output = '';
		$query = db_select('node', 'n');
    $query->leftJoin('weight_weights', 'ww', 'ww.entity_id = n.nid');
    $query->fields('n', array('nid', 'status', 'created', 'title'))
          ->condition('n.status', 1)
          ->condition('n.type', array('awards'), '=')
          ->orderBy('ww.weight', DESC)
          ->range(0,1);
    $result = $query->execute();

    while($row = $result->fetchAssoc()) {
			$title = $row['title'];
			if(strlen($title) > 91) {
				$title = substr($title, 0, strrpos( substr( $title, 0, 91), ' ' )). '...';
			} 
      $output .= '<h3> '.$title.'</h3>';
    }
		return $output;
	}	
	
	

	
	