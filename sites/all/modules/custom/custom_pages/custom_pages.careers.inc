<?php

/**
 * Implementation of hook_menu().
 * Registers a form-based page that you can access at "http://localhost/mypage"
 */




/**
 * A form with a dropdown whose options are dependent on a
 * choice made in a previous dropdown.
 *
 * On changing the first dropdown, the options in the second are updated.
 */
function careers_content($form, &$form_state) {
	global $user;
	$loc_options['Select Location'] = 'Select Location';
	$des_options['Select Area of Interest'] = 'Select Area of Interest';
	$user_name = db_query("SELECT field_first_name_value FROM {field_data_field_first_name} WHERE entity_id=:arg", array(':arg' => $user->uid))->fetchField();
	$contact_number = db_query("SELECT field_contact_no__value FROM {field_data_field_contact_no_} WHERE entity_id=:arg", array(':arg' => $user->uid))->fetchField();
	
	$loc_tree = taxonomy_get_tree(15, $parent = 0, $max_depth = NULL, $load_entities = FALSE); 
	foreach($loc_tree as $term) {
		$loc_options[$term->name] = $term->name;
	}
	
	$des_tree = taxonomy_get_tree(16, $parent = 0, $max_depth = NULL, $load_entities = FALSE); 
	foreach($des_tree as $term) {
		$des_options[$term->name] = $term->name;
	}
	
	if($user->uid) {
		$name = $user_name;
		$mail = $user->mail;
		$contact = $contact_number;
	} else {
		$name = '';
		$mail = '';
		$contact = '';
	}
	$form['name'] = array(
      '#type' 					=> 'textfield', 
      '#title' 					=> 'Name',
      '#size' 					=> 50,
      '#maxlength' 			=> 50,
      '#required' 			=> TRUE, //make this field required
			'#default_value'	=> $name
    );
      
     $form['email'] = array(
      '#type' 					=> 'textfield', 
      '#title' 					=> 'Email',
      '#size' 					=> 50,
      '#maxlength' 			=> 50,
      '#required' 			=> TRUE, //make this field required
			'#default_value'	=> $mail
    );
    
     $form['mobile'] = array(
      '#type' 					=> 'textfield', 
      '#title' 					=> 'Contact No',
      '#size' 					=> 10,
      '#maxlength' 			=> 10,
      '#required' 			=> TRUE,
			'#default_value'	=> $contact
    );

    // Get the list of options to populate the first dropdown.
    //$options_first = mymodule_first_dropdown_options();

    // If we have a value for the first dropdown from $form_state['values'] we use
    // this both as the default value for the first dropdown and also as a
    // parameter to pass to the function that retrieves the options for the
    // second dropdown.
    //$value_location = isset($form_state['values']['location']) ? $form_state['values']['location'] : key($options_first);
		
		$form['loc_pref'] = array(
			'#type' =>	'checkbox', 
			'#title' => t('No Location Preference'),
		);
		
    $form['location'] = array(
        '#type' => 'select',
        '#title' => t('Location'),
        '#options' => $loc_options,
        //'#default_value' => $value_location,
				//'#default_value' => 'Select Location',

        // Bind an ajax callback to the change event (which is the default for the
        // select form type) of the first dropdown. It will replace the second
        // dropdown when rebuilt
				
				// Uncomment to use AJAX call for getting position according to LOCATION selected bu user
        /*'#ajax' => array(
            // When 'event' occurs, Drupal will perform an ajax request in the
            // background. Usually the default value is sufficient (eg. change for
            // select elements), but valid values include any jQuery event,
            // most notably 'mousedown', 'blur', and 'submit'.
            'event' => 'change',
            'callback' => 'mymodule_ajax_callback',
            'wrapper' => 'position_replace',
        ),*/
    );
    /*$form['position'] = array(
        '#type' => 'select',
        '#title' => 'Position',
        // The entire enclosing div created here gets replaced when location
        // is changed.
        '#prefix' => '<div id="position_replace">',
        '#suffix' => '</div>',
        // when the form is rebuilt during ajax processing, the $value_location variable
        // will now have the new value and so the options will change
        '#options' => mymodule_second_dropdown_options($value_location),
        '#default_value' => isset($form_state['values']['position']) ? $form_state['values']['position'] : '',
				'#validated' => TRUE,
    );*/
		$form['position'] = array(
        '#type' => 'select',
        '#title' => 'Area of Interest',
        '#prefix' => '<div id="position_replace">',
        '#suffix' => '</div>',
        '#options' => $des_options,
        //'#default_value' => isset($form_state['values']['position']) ? $form_state['values']['position'] : '',
				'#validated' => TRUE,
    );
		
		$form['upload'] = array(
            '#type' => 'managed_file',
            '#title' => t('Resume'),
						//'#default_value' => $settings['max_filesize'],
            '#required' => TRUE,
            //'#description' => t("Upload Image description"),
						//'#upload_validators' => array('file_validate_extensions' => array('pdf doc docx')),
						//'#upload_validators' => array('file_validate_extensions' => array('docx')),
						'#upload_validators' => array(
								'file_validate_extensions' => array('doc docx pdf txt'),
								// Pass the maximum file size in bytes -- 2MB
								'file_validate_size' => array(2*1024*1024),
        ),
    );
			$form['captcha'] = array(
			'#type' => 'captcha',
			'#captcha_type' => 'recaptcha/reCAPTCHA',
			'#required' => TRUE,
		);
  
    $form['submit_button'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
			//'#attributes' => array('onclick' => 'return (false);'),
    );
    return $form;
}

/**
 * Selects just the second dropdown to be returned for re-rendering
 *
 * Since the controlling logic for populating the form is in the form builder
 * function, all we do here is select the element and return it to be updated.
 *
 * @return renderable array (the second dropdown)
 */
function mymodule_ajax_callback($form, $form_state) {
    return $form['position'];
}


/**
 * Helper function to populate the first dropdown. This would normally be
 * pulling data from the database.
 *
 * @return array of options
 */
	function mymodule_first_dropdown_options() {
		$query = db_query("SELECT field_location_value FROM {field_data_field_location} ORDER BY field_location_value");
		$loc_options['Select Location'] = 'Select Location';
		foreach($query as $row) {
			$loc_options[$row->field_location_value] = $row->field_location_value;
		}
		return $loc_options;
		//echo '<pre>'; print_r($loc_options); echo '</pre>';
			/*return array(
					'colors' => 'Names of colors',
					'cities' => 'Names of cities',
					'animals' => 'Names of animals',
			);*/
	}
	
	function mymodule_second_dropdown_options() {
		$results = db_query("SELECT DISTINCT(field_position_value) FROM {field_data_field_position} ORDER BY field_position_value");
		$options['Select'] = 'Select';
		foreach($results as $row) {
			$options[$row->field_position_value] = $row->field_position_value;
		}
		return $options;
	}


/**
 * Helper function to populate the second dropdown. This would normally be
 * pulling data from the database.
 *
 * @param key. This will determine which set of options is returned.
 *
 * @return array of options
 *
 */
	
 
 
/*function mymodule_second_dropdown_options($key = '') {
	$options1 = array();
	$first = true;
	$temp_arr = array();
	$query = db_select('node', 'n');
	$query->leftJoin('field_data_field_location', 'fl', 'fl.entity_id = n.nid');
	$query->leftJoin('field_data_field_designation', 'fd', 'fd.entity_id = n.nid');
	$query->leftJoin('field_data_field_position', 'fp', 'fp.entity_id = fd.field_designation_value');
	$query->fields('fp', array('field_position_value'))
				->fields('fl', array('field_location_value'))
				->condition('n.type', 'careers_form', '=');
				//->condition('fl.field_location_value', $location, '=');
	//echo (string)$query;
	//exit;
	$result = $query->execute();
	foreach($result as $row) {
		//echo '<pre>'; print_r($temp_arr); echo '</pre>';
		if($first) {
			$city = $row->field_location_value;
			$temp_arr[$row->field_position_value] = $row->field_position_value;
			$first = false;
		} else {
			if($row->field_location_value == $city) {
				$temp_arr[$row->field_position_value] = $row->field_position_value;
			} else {
				$options1[$city] = $temp_arr;
				$temp_arr = array();
				$temp_arr[$row->field_position_value] = $row->field_position_value;
			}
			$city = $row->field_location_value;
		}

		
	}
	$options1[$city] = $temp_arr;
	//echo '<pre>'; print_r($options1); echo '</pre>';
	
    //$options = array(
    //    'colors' => array(
    //        'red' => 'Red',
    //        'green' => 'Green',
    //        'blue' => 'Blue'
    //    ),
    //    'cities' => array(
    //        'paris' => 'Paris, France',
    //        'tokyo' => 'Tokyo, Japan',
    //        'newyork' => 'New York, US'
    //    ),
    //    'animals' => array(
    //        'dog' => 'Dog',
    //        'cat' => 'Cat',
    //        'bird' => 'Bird'
    //    ),  
    //);
		//echo '<pre>'; print_r($options); echo '</pre>';
    if (isset($options1[$key])) {
        return $options1[$key];
    }
    else {
        return array();
    }
}*/

	function careers_content_validate($form, &$form_state) {
		//echo'<pre>'; print_r($form_state['input']); echo'</pre>'; exit;
		//if($form_state['input']['upload']['fid'] == 0) {
		//	form_set_error('upload', t('Please upload a file.'));
		//}
		if(!preg_match("/^([a-zA-Z.\']+\s?)*$/", $form_state['input']['name'])) {
			form_set_error('name', t('Invalid entry in name field.'));
		}
		if(!valid_email_address($form_state['input']['email'])) {
			form_set_error('email', t('Invalid Email Format.'));
		}
		if(!preg_match("/^[789][0-9]{9}$/", $form_state['input']['mobile']) && $form_state['input']['mobile'] != '') {
			form_set_error('mobile', t('Invalid Mobile Number.'));
		}
		if($form_state['input']['loc_pref'] == 0) {
			if($form_state['input']['location'] == 'Select Location') {
				form_set_error('location', t('Please Select a Location.'));
			}
		}	
		if($form_state['input']['position'] == 'Select Area of Interest') {
			form_set_error('position', t('Please Select a Position.'));
		}
		/*if($form_state['input']['g-recaptcha-response'] == '') {
			form_set_error('captcha', t('Please check the captcha box.'));
		}*/
	}
	
	function careers_content_submit($form, &$form_state) {
		//echo'<pre>'; print_r($form_state); echo'</pre>'; exit;
		global $base_url;
		$path = drupal_get_path('theme', 'framework');
		require ($path . '/PHPMailer/PHPMailerAutoload.php');
		$name 		= $form_state['input']['name'];
		$email 		= $form_state['input']['email'];
		$mobile 	= $form_state['input']['mobile'];
		$location = $form_state['input']['location'];
		$position = $form_state['input']['position'];
		$fid 			= $form_state['values']['upload'];
		$loc_pref = $form_state['input']['loc_pref'];
		$uri = db_query("SELECT uri from {file_managed} WHERE fid = :arg", array(":arg" => $fid))->fetchField();
		$temp = explode("//", $uri);
		$filename = $temp[1];
		$file_url = file_create_url($uri);
		$data = array();
		$data['from'] = $email;
		$data['subject'] = 'Careers form data';
		$body = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border:solid #ccc 1px">
							<tr>
									<td style="border-bottom:solid #ccc 1px;">
										<table align="center" cellpadding="0" cellspacing="0" width="560">
											<tr>
												<td style="padding:15px 0"><img src="'.$base_url.'/sites/default/files/logo_3.jpg" alt="Wipro Industrial Lighting" title="Wipro Industrial Lighting"></td>
											</tr>
										</table>
									</td>
								</tr>
						  <tr>
							<td><table align="center" border="0" cellpadding="0" cellspacing="0" width="560">
								<tr>
								  <td style="font-family:Arial; font-size:12px; font-weight:bold; padding-top:15px;">Dear Admin,</td>
								</tr>
								<tr>
								  <td style="font-family:Arial; font-size:12px; padding:15px 0;">You have received a new job notification. Below are details of applicant:
									Please find the data as below.<br/><br/><table><tr>
									<td>name</td><td>'.$name.'</td></tr><tr>
									<td>email</td><td>'.$email.'</td></tr>
									<tr><td>Mobile</td><td>'.$mobile.'</td></tr>';
			if($loc_pref == 0) {
				$body .= '<tr><td>Location</td><td>'.$location.'</td></tr>';
			}
			$body .= '<tr><td>Position</td><td>'.$position.'</td></tr>
								<tr><td>File ID</td><td>'.$fid.'</td></tr>
								</table></td></tr></table></td></tr></table>';
				
		$mail = new PHPMailer;								// Set PHPMailer to use the sendmail transport
		//$mail->isSendmail();									//Set who the message is to be sent from
		$mail->setFrom($email, $name);
		//Set an alternative reply-to address
		//$mail->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		//$career_mail = variable_get('careers_mail');
		//echo $career_mail ; exit;
		//$career_mail_name = variable_get('careers_mail_name');
		//$mail->addAddress($career_mail, $career_mail_name);
		$mail->addAddress('limbuzkid@gmail.com', 'Sunil Limboo');
		//Set the subject line
		$mail->Subject = 'Wipro Lighting Career Form Data';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($body);
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		if(file_exists($uri)) {
			$mail->addAttachment($uri);
		} else {
			drupal_set_message('file not found');
		}
		//send the message, check for errors
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			//exit;
			drupal_set_message("There was a problem sending email.");
		} else {
			drupal_set_message("Thank you for applying to us. We will get back to you shortly");
		}				
	}
		
	