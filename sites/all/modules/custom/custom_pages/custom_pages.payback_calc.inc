<?php
  function get_payback_calculator_content() {
    return '';
  }
  
  function get_associate_products_ajax() {
    //$nid = $_POST['nid'];
    $prod = $_POST['prod'];
    // get general info
    $query = db_select('field_data_field_base_name', 'bp');
    $query->leftJoin('field_data_field_base_general_info', 'gi', 'gi.entity_id = bp.entity_id');
    $query->condition('bp.field_base_name_value', $prod, '=')
          ->fields('gi', array('field_base_general_info_value'));
    $general_info = $query ->execute() ->fetchField();
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
          ->entityCondition('bundle', 'payback_calculator_matrix')
          ->propertyCondition('status', NODE_PUBLISHED)
          ->fieldCondition('field_base_name', 'value', $prod);
    $result = $query->execute();
    if(isset($result['node'])) {
      $nids = array_keys($result['node']);
      $nodes = node_load_multiple($nids);
      foreach($nodes as $node) {
        $data[] = array(
          'general_info'                  => $general_info,
          'assoc_prod'                    => $node->field_assoc_name['und'][0]['value'],
        );
      }
    }
    echo json_encode($data);
  }
  
  function get_matrix_data_ajax() {
    $assoc_prod = $_POST['prod'];
    $query = db_select('field_data_field_assoc_name', 'bp');
    $query->leftJoin('field_data_field_assoc_general_info', 'gi', 'gi.entity_id = bp.entity_id');
    $query->condition('bp.field_assoc_name_value', $assoc_prod, '=')
          ->fields('gi', array('field_assoc_general_info_value'));
    $general_info = $query ->execute() ->fetchField();
    
    
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
          ->entityCondition('bundle', 'payback_calculator_matrix')
          ->fieldCondition('field_assoc_name', 'value', $assoc_prod);
    $result = $query->execute();
    if(isset($result['node'])) {
      $nids = array_keys($result['node']);
      $nodes = node_load_multiple($nids);
      foreach($nodes as $node) {
        
        $data[] = array(
          'general_info'                  => $general_info,
          //'assoc_prod'                    => $node->field_associated_product_name['und'][0]['value'],
          'total_no_of_lamps_assoc'       => $node->field_total_no_of_lamps_assoc['und'][0]['value'],
          'total_power_consumption_base'  => $node->field_total_power_comsumption['und'][0]['value'],
          'total_power_comsumption_assoc' => $node->field_total_pow_comsumption_asso['und'][0]['value'],
          'average_life_of_lamp_base'     => $node->field_average_life_of_lamp['und'][0]['value'],
          'average_life_of_lamp_assoc'    => $node->field_average_life_of_lamp_assoc['und'][0]['value'],
          'cost_of_luminaires_base'       => $node->field_cost_of_luminaires['und'][0]['value'],
          'lamp_replacement_cost_assoc'   => $node->field_lamp_replacement_cost_asso['und'][0]['value'],
          'gear_replacement_cost_asso'    => $node->field_gear_replacement_cost_asso['und'][0]['value'],
          
        );
      }
    }
    echo json_encode($data);
  }