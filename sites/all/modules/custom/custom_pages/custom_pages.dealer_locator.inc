<?php
  function get_dealer_locator_content() {
		$breadcrumb[0] = l('Home', '<front>');
    $breadcrumb[1] = 'Dealer Locator';
    drupal_set_breadcrumb($breadcrumb);
    return '';
  }
  
  
  function get_dealer_locator_ajax_content() {
    if(isset($_POST['loc'])) {
      $loc = strtolower(filter_xss(trim($_POST['loc'])));
    } else {
      $loc = '';
    }
		
    if(isset($_POST['pin'])) {
      $pin = filter_xss(trim($_POST['pin']));
    } else {
      $pin = '';
    }
		
		if(isset($_POST['offDealLoc'])) {
			if(trim($_POST['offDealLoc']) == 'our-office'){
				$offDealLoc = 'Office';
			} else {
				$offDealLoc = 'Channel Partner';
			}
    }
		//echo '*'.$loc . '-' .$pin .'-'. $offDealLoc.'*';
		if($pin && $loc) {
			$result = db_query("SELECT * FROM {locator} WHERE (store_category= '".$offDealLoc."') AND ((LOWER(city) = '".$loc."' OR LOWER(state)= '".$loc."') AND pincode= '".$pin."')");
		} else {
			if($pin == '') {
				$result = db_query("SELECT * FROM {locator} WHERE store_category= '".$offDealLoc."' AND (LOWER(city) = '".$loc."' OR LOWER(state) = '".$loc."')");
			}
			if($loc == '') {
				$result = db_query("SELECT * FROM {locator} WHERE store_category= '".$offDealLoc."' AND pincode = '".$pin."'");
			}
			
		}
    
    $output = '';
    foreach($result as $row) {
      $data[] = array(
        'store_name'  => ucwords($row->store_name),
        'contact'     => $row->contact_person,
        'address'     => nl2br(trim($row->address1)),
        'city'        => $row->city,
        'state'       => $row->state,
        'pin'         => $row->pincode,
        'mobile'      => $row->mobile,
        'phone'       => $row->phone,
        'email'       => $row->email,
        'latitude'    => trim($row->latitude),
        'longitude'   => trim($row->longitude),
      );
    }
    echo json_encode($data);
  }
  
 