<?php

namespace Drupal\custom_contact_data\Form;

use Drupal\Core\Controller\ControllerBase;

class CustomController extends ControllerBase{
/**
 * 
 */
  public function getCustomData() {
    
    $query = \Drupal::database()->select('simple_form', 'n');
    $query->fields('n', ['name', 'gender', 'phone', 'email', 'address', 'city']);
    $results = $query->execute()->fetchAll();
    $rows=array();

    foreach($results as $data){
      $rows[] = array(
        'name' => $data->name,
        'gender' => $data->gender,
        'phone' => $data->phone,
        'email' => $data->email,
        'address' => $data->address,
        'city' => $data->city,
      );
    }
    return [
      '#theme' => 'table_list',
      '#items' => $rows,
    ];
    
    //  $data = array('1','lalit','lalit');
    //return [
    //  '#theme' => 'table_list',
    //  '#table_data' => $data,
    //];
  }
}
