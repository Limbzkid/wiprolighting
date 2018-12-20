<?php
  function lighting_design_app() {
    return '';
  }
  
  function applications_filter_data() {
    $tid = filter_xss($_POST['tid']);
    $output = '';
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
          ->entityCondition('bundle', 'product')
          ->fieldCondition('field_application_area_recommend', 'tid', $tid);
    $result = $query->execute();
    if(isset($result['node'])) {
      $nids = array_keys($result['node']);
      $nodes = node_load_multiple($nids);
      $first = true;
      foreach($nodes as $node) {
        //print_r($node);
        
        $title = $node->title;
        $temp = explode(' ', $title);
        $title1 = array_shift($temp);
        $title2 = implode($cat);
        $img = file_create_url($node->uc_product_image['und'][0]['uri']);
        if($first) {
          $output .= '<div class="group" style="width: 250.5px;">';
          $first = false;
        } else {
          $output .= '<div class="group" style="width: 250.5px; left: 250px;">';
        }
        
        $output .= '<div class="productImg"><img src="' .$img. '" alt="'.$title.'"></div><div class="productContent">';
        $output .= '<h2>'.$title1.'<span class="semiBold">'.$title2.'</span> <span class="redArrow"></span></h2><p>'.$node->model.'</p>';
        if($node->field_brochure_download) {
          $output .= '<a href="'.file_create_url($node->field_brochure_download['und'][0]['uri']).'" target="_blank" class="actionLink"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>';
        }
        $output .= '</div></div>';
      }
    }
    echo $output;
  }
  
  function get_products() {
		$offInd = filter_xss($_POST['offInd']);
		if(isset($_POST['offInd']) && $offInd == 'Office') {
			$area = filter_xss($_POST['officeArea']);
		} else  {
			$area = filter_xss($_POST['factoryArea']);
		}
		$mount_ht = filter_xss($_POST['mountingHeight']);
		$sub_area = filter_xss($_POST['areaType']);
		/**************************************/
		$query = db_select('node', 'n');
		$query->leftJoin('field_data_field_area', 'fa', 'fa.entity_id = n.nid');
		$query->leftJoin('field_data_field_sub_area_type', 'sat', 'sat.entity_id = n.nid');
		$query->leftJoin('field_data_field__total_area', 'fta', 'fta.entity_id = n.nid');
		$query->leftJoin('field_data_field_sub_area_in_sft', 'sa', 'sa.entity_id = n.nid');
		$query->leftJoin('field_data_field_length_in_ft', 'fl', 'fl.entity_id = n.nid');
		$query->leftJoin('field_data_field_width_in_ft', 'fw', 'fw.entity_id = n.nid');
		$query->leftJoin('field_data_field_uo', 'uo', 'uo.entity_id = n.nid');
		/*******************************************New Block Starts***********************************/
		$query->leftJoin('field_data_field_mf', 'fwa', 'fwa.entity_id = n.nid');
		$query->leftJoin('field_data_field_wp', 'fwb', 'fwb.entity_id = n.nid');
		$query->leftJoin('field_data_field_rc_', 'fwc', 'fwc.entity_id = n.nid');
		$query->leftJoin('field_data_field_rw_', 'fwd', 'fwd.entity_id = n.nid');
		$query->leftJoin('field_data_field_rf_', 'fwe', 'fwe.entity_id = n.nid');
		$query->leftJoin('field_data_field_avg_lux', 'fwf', 'fwf.entity_id = n.nid');			
		/*******************************************New Block Ends*************************************/
		$query->leftJoin('field_data_field_lamp_type', 'lt', 'lt.entity_id = n.nid');
		$query->leftJoin('field_data_field_mounting_height', 'mh', 'mh.entity_id = n.nid');
		$query->leftJoin('taxonomy_term_data', 'ttd', 'ttd.tid = fa.field_area_tid');
		$query->leftJoin('taxonomy_term_data', 'tt', 'tt.tid = sat.field_sub_area_type_tid');
		$query->leftJoin('field_data_field_type_of_luminaire', 'tol', 'tol.entity_id = n.nid');
		$query->leftJoin('field_data_field_type', 'df', 'df.entity_id = tol.field_type_of_luminaire_value');
		$query->leftJoin('field_data_field_type_code', 'tc', 'tc.entity_id = tol.field_type_of_luminaire_value');
		$query->leftJoin('field_data_field_quantity', 'dfq', 'dfq.entity_id = tol.field_type_of_luminaire_value');
		$query->leftJoin('field_data_field_quantity_type', 'dfqt', 'dfqt.entity_id = tol.field_type_of_luminaire_value');
		$query->fields('n', array('nid', 'title'))
					->fields('ttd', array('name'))
					->fields('tt', array('name'))
					->fields('tc', array('field_type_code_value'))
					->fields('lt', array('field_lamp_type_value'))
					->fields('df', array('field_type_value'))
					->fields('fta', array('field__total_area_value'))
					->fields('sa', array('field_sub_area_in_sft_value'))
					->fields('fl', array('field_length_in_ft_value'))
					->fields('fw', array('field_width_in_ft_value'))
					->fields('dfq', array('field_quantity_value'))
					->fields('uo', array('field_uo_value'))
					/*******************************************New Block Starts***********************************/
					->fields('fwa', array('field_mf_value'))
					->fields('fwb', array('field_wp_value'))
					->fields('fwc', array('field_rc__value'))
					->fields('fwd', array('field_rw__value'))
					->fields('fwe', array('field_rf__value'))
					->fields('fwf', array('field_avg_lux_value'))
					->fields('mh', array('field_mounting_height_value'))
					->fields('dfqt', array('field_quantity_type_value'))
					/*******************************************New Block Ends*************************************/
					->condition('n.type', array('lighting_design_matrix'), 'IN')
					->condition('ttd.name', $area, '=')
					->condition('tt.name', $sub_area, '=')
					->condition('n.status', 1, '=')
					->condition('mh.field_mounting_height_value', $mount_ht, '=');
		//echo (string)$query;
		$result = $query->execute();
		//foreach($result as $row) { echo '<pre>'; print_r($row); echo '</pre>'; } exit;
		foreach($result as $row) {
			if($row->field_lamp_type_value == 'Combo') { continue; }
			//echo '<pre>'; print_r($row); echo '</pre>'; exit;
			$prod_code = trim($row->field_type_code_value);
			//echo $row->field_quantity_type_value .' - '.$row->field_type_value. ' - '.$row->nid.' - '.$prod_code .'<br/>';
			$type = $row->field_type_value;
			$quantity = $row->field_quantity_value; 
			$lamp_type = $row->field_lamp_type_value;
			if($row->field_mounting_height_value) {
				$m_height = $row->field_mounting_height_value;
			} else {
				$m_height = '';
			}
			$var_results = db_query("SELECT * FROM field_data_field_product_variants WHERE FIND_IN_SET('". $prod_code. "', field_product_variants_value) LIMIT 1");
			
			foreach($var_results as $variants) {
				//echo '<pre>'; print_r($variants); echo '</pre>';
				$vars = $variants->field_product_variants_value;
				$temp = explode(',', $vars);
				if(in_array($prod_code, $temp)) {
					$node_arr[] = array(
											'matrix_id'						=> $row->nid,
											'nid' 								=> $variants->entity_id,
											'lamp_type' 					=> $lamp_type,
											'lum_type'  					=> $row->field_type_value,
											'mh'									=> $row->field_mounting_height_value,
											'prod_code' 					=> $prod_code,
											'qty_type'  					=> $row->field_quantity_type_value,
											'qty'									=> $quantity,
											'prod_code' 					=> $row->field_type_code_value,
											'percent_total_area' 	=> $row->field__total_area_value,
											'sub_area_sft' 				=> $row->field_sub_area_in_sft_value,
											'length_ft'						=> $row->field_length_in_ft_value,
											'width_ft'						=> $row->field_width_in_ft_value,
											'mf'									=> $row->field_mf_value,
											'wp'									=> $row->field_wp_value,
											'rc'									=> $row->field_rc__value,
											'rw'									=> $row->field_rw__value,
											'rf'									=> $row->field_rf__value,
											'avg_lux'							=> $row->field_avg_lux_value,
											'uo'									=> $row->field_uo_value,

					);
				}
			}
		}
		//echo '<pre>'; print_r($node_arr); echo '</pre>';
		$cmb_html = '';
		$nd_count = count($node_arr);
		for($i=0;$i<$nd_count-1;$i++) {
			for($j=$i+1; $j< $nd_count;$j++) {
				if(($node_arr[$i]['lum_type'] == 'Combo' && $node_arr[$j]['lum_type'] == 'Combo') && ($node_arr[$i]['qty_type'] == $node_arr[$j]['qty_type']) && ($node_arr[$i]['lamp_type'] == $node_arr[$j]['lamp_type'])) {
					//echo '<pre>'; print_r($node1); echo '</pre>'; exit;
					$node1 = node_load($node_arr[$i]['nid']);
					$node2 = node_load($node_arr[$j]['nid']);
					$cmb_qty = $node_arr[$i]['qty']. ' + ' .$node_arr[$j]['qty'];
					//$uo1 = $node_arr[$i]['uo'];
					//echo '<pre>';
					//print_r($node1);
					//print_r($node2);
					//echo '</pre>';
					$image1 = file_create_url($node1->uc_product_image['und'][0]['uri']);
					$image2 = file_create_url($node2->uc_product_image['und'][0]['uri']);
					$cmb_html .= '<div rel="'.$node_arr[$i]['qty_type'].'" class="group '.$node_arr[$i]['lamp_type'].'"><div class="productImg"><span class="checkedArrow">&nbsp;</span>';
					$cmb_html .= '<div class="comboImg"><img alt="" src="'.$image1.'"></div>';
					$cmb_html .= '<div class="comboImg"><img alt="" src="'.$image2.'"></div></div>';
					$cmb_html .= '<div class="productContent" rel="'.$cmb_qty.'">';
					$cmb_html .= '<div class="comboInfo" mh="'.$node_arr[$i]["mh"].'" percent_total_area="'.$node_arr[$i]["percent_total_area"].'" sub_area="'.$sub_area.'" length_ft="'.$node_arr[$i]["length_ft"].'" width_ft="'.$node_arr[$i]["width_ft"].'" mf="'.$node_arr[$i]["mf"].'" wp="'.$node_arr[$i]["wp"].'" rc="'.$node_arr[$i]["rc"].'" rw="'.$node_arr[$i]["rw"].'" rf="'.$node_arr[$i]["rf"].'" uo="'.$node_arr[$i]["uo"].'" avg_lux="'.$node_arr[$i]["avg_lux"].'">';
					$cmb_html .= '<h2>'.$node1->title.'</h2><p>'.$node_arr[$i]['prod_code'].'</p></div>';
					$cmb_html .= '<div class="comboInfo" uo="'.$node_arr[$j]["uo"].'">';
					$cmb_html .= '<h2>'.$node2->title.'</h2><p>'.$node_arr[$j]['prod_code'].'</p></div></div></div>';
				}
			}
		}
		//echo $cmb_html;
		//exit;
		
		foreach($node_arr as $nde) {
			//echo '<pre>'; print_r($nde); echo '</pre>'; exit;
			$nodeid = $nde['nid'];
			
			$lamp = $nde['lamp_type'];
			$lum_type = $nde['lum_type'];
			if($lum_type != 'Combo') {
				$mounting_height = $nde['mh'];
				$variant = $nde['prod_code'];
				$node = node_load($nodeid);
				if($node->status == 1) {   // check if node is published
					//echo '<pre>'; print_r($node); echo '</pre>';
					$path = base_path(). drupal_get_path_alias('node/'.$node->nid);
					$temp_path = explode('/', $path);
					$last = end($temp_path);
					if($_SERVER['HTTP_HOST'] == '10.132.150.4:8081') {
						if($last == $temp_path[5]) {
							$cat = ucwords(str_replace('-', ' ',$temp_path[3])) .' | '. ucwords(str_replace('-', ' ',$temp_path[4]));
						} else {
							$cat = ucwords(str_replace('-', ' ',$temp_path[3])) .' | '. ucwords(str_replace('-', ' ',$temp_path[4])) .' | '. ucwords(str_replace('-', ' ',$temp_path[5]));
						}
					} else {
						if($last == $temp_path[4]) {
							$cat = ucwords(str_replace('-', ' ',$temp_path[2])) .' | '. ucwords(str_replace('-', ' ',$temp_path[3]));
						} else {
							$cat = ucwords(str_replace('-', ' ',$temp_path[2])) .' | '. ucwords(str_replace('-', ' ',$temp_path[3])) .'|'. ucwords(str_replace('-', ' ',$temp_path[4]));
						}
					}
					//echo '<pre>'; print_r($node); echo '</pre>';exit;
					if($lum_type == 'Suspension') { $lum_type = 'Suspended'; }
					$data[] = array(
							'type'								=> $nde['qty_type'],
							'nid'									=> $node->nid,
							'category_id'					=> $node->field_product_category['und'][0]['tid'],
							'title' 							=> $node->title,
							'lamp_type' 					=> $lamp,
							'model' 							=> $node->model,
							'path'								=> $path,
							'image' 							=> file_create_url($node->uc_product_image['und'][0]['uri']),
							'prod_code' 					=> $nde['prod_code'],
							'lum_type'						=> $lum_type,
							'mounting_height' 		=> $mounting_height,
							'percent_total_area' 	=> $row->field__total_area_value,
							'sub_area_sft' 				=> $row->field_sub_area_in_sft_value,
							'length_ft'						=> $row->field_length_in_ft_value,
							'width_ft'						=> $row->field_width_in_ft_value,
							'mf'									=> $row->field_mf_value,
							'wp'									=> $row->field_wp_value,
							'rc'									=> $row->field_rc__value,
							'rw'									=> $row->field_rw__value,
							'rf'									=> $row->field_rf__value,
							'avg_lux'							=> $row->field_avg_lux_value,
							'qty'									=> $nde['qty'],
							'uo'									=> $row->field_uo_value,
							'category'						=> $cat,
							'variant'							=> $variant,
					);
				}
			}
		}
		 
		echo json_encode(array('prod' => $data, 'cmb_htm' => $cmb_html)); 
	}