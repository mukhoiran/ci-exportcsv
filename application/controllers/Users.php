<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
  public function __construct(){
   parent::__construct();
   
   // load base_url 
   $this->load->helper('url');
   
   // Load Model 
   $this->load->model('Main_model'); 
  } 

  public function index(){
   // get data $data = array(); 
   $data['usersData'] = $this->Main_model->getUserDetails();
  
   // load view 
   $this->load->view('users_view',$data); 
  }
 
  // Export data in CSV format 
  public function exportCSV(){ 
   // file name 
   $filename = 'users_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");
   
   // get data 
   $usersData = $this->Main_model->getUserDetails();

   // file creation 
   $file = fopen('php://output', 'w');
 
   $header = array("Username","Name","Gender","Email"); 
   fputcsv($file, $header);
   foreach ($usersData as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   exit; 
  }
}