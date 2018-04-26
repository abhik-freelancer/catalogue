<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contactlist extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('contactmodel');
    }
    
    public function index(){
        if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          $login=($session["login"]!=""?$session["login"]:"");
          $userId = ($session["userid"] != "" ? $session["userid"] : 0);
          
          if($login=="admin"){
           $result["contactlist"]= $this->contactmodel->contactList();
          }else{
             $result["contactlist"]=NULL;
          }
          
          $page="catguser/list";
          $header="";
          createbody_method($result, $page, $header, $session);
      }else{
          redirect('memberlogin', 'refresh');
      }
    }
    
    
}
