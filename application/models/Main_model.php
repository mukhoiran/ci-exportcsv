<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

  function getUserDetails(){
 
    $response = array();
 
    // Select record
    $this->db->select('username,name,gender,email');
    $q = $this->db->get('users');
    $response = $q->result_array();
 
    return $response;
  }

}