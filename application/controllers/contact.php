<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contact
 *
 * @author Dev
 */
class contact extends CI_Controller
{
    
   public function __construct() 
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->helper('email');
        $this->load->model("cateloguemodel","catalogue",TRUE);
    }
    
    
    public function index()
    {
            $result=array();
            $result['leftmenu']='catelogue/leftmenu';
            $result['catloguemenu']=$this->catalogue->categorymenu();
            $result['bodypage']='catelogue/contact';
            $result['bannerpage']= 'catelogue/banner';
            $result['banners'] = $this->catalogue->getBanner();
            $result['carttotal'] = $this->cart->total_items();
            $this->load->view('front_template',$result);
    }
    /**
     * @author Abhik Ghosh
     * @method addContacts
     */
    public function  addContacts()
    {
        $json_response=array();
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $message = $this->input->post("message");
        $grecaptcharesponse =  $this->input->post("g-recaptcha-response");
        //your site secret key
        
        $secret = '6LdiBUcUAAAAAHfWhlamDH9sQbzvaA7NpClQ8_JA'; 
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$grecaptcharesponse);
        $responseData = json_decode($verifyResponse);
        
        if($responseData->success){
            
            if($this->validation($name, $email)){
                $data = array("name"=>$name,
                               "email_add"=>$email,
                               "message"=>$message);
                
                if(valid_email($email)){
                    
                    $rslt = $this->catalogue->insertContact($data);
                    if($rslt){
                        $json_response = array("msg_code"=>1,"msg_data"=>"");
                    }
                }else{
                    
                    $json_response = array("msg_code"=>3,"msg_data"=>"Email verification fail !");
                }
                
                
            }else{
                $json_response = array("msg_code"=>2,"msg_data"=>"* Fields are mandatory !");
            }
            
            
        }else{
            $json_response = array("msg_code"=>4,"msg_data"=>"Captcha validation failed!");
        }
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    echo json_encode( $json_response );
    exit;
    }
    public function validation($name,$email)
    {
        if($name==""){return FALSE;}
        if($email==""){
           return FALSE;
            
        }
        
        return true;
        
    }
}
