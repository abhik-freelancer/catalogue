<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item
 *
 * @author Dev
 */
class item extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("categorymodel","category",TRUE);
        $this->load->model("subcategorymodel","subcategory",TRUE);
        $this->load->model("itemmodel","item",TRUE);
        
    }
    public function index()
    {
         if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $result["item"] = $this->item->getItemList();
            $page = "item/list";
            $header = "";
            createbody_method($result, $page, $header, $session);
        } else {
            redirect('memberlogin', 'refresh');
        }
    }
    
    public function addEdit()
    {
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $header = "";
            if ($this->uri->segment(4) === FALSE) {

                $itemid = 0;
            } else {
                $itemid = $this->uri->segment(4);
            }
            $result["category"] = $this->category->getActiveCategory();
            $result["subcategory"] = $this->subcategory->getSubCategoryList();
            
            if ($itemid != 0) {
                $result["item"] = $this->item->getItemById($itemid);
                $page = 'item/addEdit';
            } else {
                $result["item"] = NULL;
                $page = 'item/addEdit';
            }
            createbody_method($result, $page, $header, $session);
        } else {
            redirect('memberlogin', 'refresh');
        }
    }
    public function getsubcategory(){
        $categoryId = $this->input->post('categoryId');
        $result["catSub"] = $this->subcategory->getSubcategoryByCategory($categoryId);
        
        //print_r($result);
        $page = "item/subcat.php";
        $this->load->view($page, $result);
       }
       
       public function getImagesById(){
        if ($this->session->userdata('user_data')) {
            $itemId = $this->input->post("itemId");
            $result["imgesdata"] = $this->item->getImagesName($itemId);
            
           
            $page = "item/image.php";
            $this->load->view($page, $result);
        }else{
             redirect('memberlogin', 'refresh');
        }
    }
       
       
       
    public function saveitem()
    {
     //   print_r($this->input->post());
      //  print_r($_FILES);
         $json_response = array();
         if ($this->session->userdata('user_data')) {
             $json_response = array();
             
             $item_id = $this->input->post("hditemid");
             $item_name = $this->input->post('product');
             $item_desc = $this->input->post('proddesc');
             $item_catg_id  = $this->input->post('category');
             $item_sub_catg = $this->input->post('subcategory');
             $item_price = $this->input->post('itemprice');
             $image_1 = "";
             $image_2 = "";
             $image_3 = "";
             $data=array();
             $file_err= array();
             
             if($this->validate($item_name,$item_catg_id))
             {
                
                if($item_id=="") //add mode
                {
                 if($_FILES["img_1"]["error"]!=4)
                 {
                     $imageupload_1=$this->uploadItemImages($_FILES["img_1"],'img_1');
                     if($imageupload_1=="")
                     {
                         $file_msg["0"]="image_1_error";
                     }
                    else{
                        $image_1 = $imageupload_1;
                    }
                 }
                    
                 if($_FILES["img_2"]["error"]!=4)
                 {
                     $imageupload_2 = $this->uploadItemImages($_FILES["img_2"],'img_2');
                     if($imageupload_2==""){
                        $file_msg["1"]="image_2_error";
                    }else{
                        $image_2 = $imageupload_2;
                    }
                 }
                 
                 if($_FILES["img_3"]["error"]!=4)
                 {
                   $imageupload_3 = $this->uploadItemImages($_FILES["img_3"],'img_3');
                   if($imageupload_3=="")
                    {
                        $file_msg["2"]="image_3_error";
                    }else
                    {
                        $image_3 = $imageupload_3;
                    }
                 }
                 $flag=0;
                 foreach ($file_err as $value) {
                     if($value!=""){$flag=1;}
                 }
                 
                 if($flag==1){
                     $json_response = array("msg_code"=>5,"msg_data"=>"File upload error");
                 }else{
                     $data =array(
                         "item_name"=>$item_name,
                         "item_catg_id"=>$item_catg_id,
                         "item_sub_catg"=>$item_sub_catg,
                         "item_image_1"=>$image_1,
                         "item_image_2"=>$image_2,
                         "item_image_3"=>$image_3,
                         "item_price"=>$item_price,
                         "item_desc"=>$item_desc,
                       );
                     
                     //insertion
                     $result = $this->item->insertItem($data);
                     //insertion
                     }
                     
                 }
                 else
                 {//edit mode
                      if($_FILES["img_1"]["error"]!=4)
                        {

                            if($item_id!="")
                            {
                                $images = $this->item->getImagesName($item_id);
                                $this->unlinkImage($images["item_image_1"]);
                            }
                            $imageupload_1=$this->uploadItemImages($_FILES["img_1"],'img_1');

                            if($imageupload_1=="")
                            {
                                $file_msg["0"]="image_1_error";
                            }
                           else{
                               $image_1 = $imageupload_1;
                           }
                        }
                        else
                        {
                             $image_1 = $this->item->getImagesName($item_id)["item_image_1"];
                        }
                    
                 if($_FILES["img_2"]["error"]!=4)
                 {
                     if($item_id!="")
                     {
                          $images = $this->item->getImagesName($item_id);
                          $this->unlinkImage($images["item_image_2"]);
                         
                     }
                     
                     $imageupload_2 = $this->uploadItemImages($_FILES["img_2"],'img_2');
                     if($imageupload_2==""){
                        $file_msg["1"]="image_2_error";
                    }else{
                        $image_2 = $imageupload_2;
                    }
                 }
                 else
                 {
                     $image_2 = $this->item->getImagesName($item_id)["item_image_2"];
                 }
                 
                 if($_FILES["img_3"]["error"]!=4)
                 {
                     if($item_id!="")
                     {
                          $images = $this->item->getImagesName($item_id);
                          $this->unlinkImage($images["item_image_3"]);
                         
                     }
                     $imageupload_3 = $this->uploadItemImages($_FILES["img_3"],'img_3');
                     if($imageupload_3==""){
                        $file_msg["2"]="image_3_error";
                    }else{
                        $image_3 = $imageupload_3;
                    }
                 }else{
                     $image_3 = $this->item->getImagesName($item_id)["item_image_3"];
                 }
                 $flag=0;
                 foreach ($file_err as $value) {
                     if($value!=""){$flag=1;}
                 }
                 
                 if($flag==1){
                     $json_response = array("msg_code"=>5,"msg_data"=>"File upload error");
                 }else{
                     $data =array(
                         "item_name"=>$item_name,
                         "item_catg_id"=>$item_catg_id,
                         "item_sub_catg"=>$item_sub_catg,
                         "item_image_1"=>$image_1,
                         "item_image_2"=>$image_2,
                         "item_image_3"=>$image_3,
                         "item_price"=>$item_price,
                         "item_desc"=>$item_desc,
                       );
                     
                     //insertion
                     $result = $this->item->updateItem($data,$item_id);
                     //insertion
                     }
                     
                 }
                 
                 if($result){
                         $json_response = array("msg_code"=>1,"msg_data"=>"Data successfully saved");
                     }else{
                         $json_response = array("msg_code"=>0,"msg_data"=>"Internal error occured");
                     }
                 
                 
             }else{
                 
                 $json_response = array("msg_code"=>3,"msg_data"=>"* Input fields are mandatory");
             }
             
         }else{
              $json_response = array("msg_code" => 500, "msg_data" => "Session time out,Redirect to login");
         }
        
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit;
        
    }
    
    public function validate($itemname,$categoryid)
    {
        if($itemname==""){return FALSE;}
        If($categoryid==""){return false;}
        
        return true;
        
    }
    
    public function uploadItemImages($file,$filecontrol)
    {
        //print_r($file);
        $image="";
        $dir = APPPATH . 'assets/images/itemimages/';
        $config = array(
                            'upload_path' => $dir,
                            'allowed_types' =>'gif|jpg|png',
                            'max_size'=>'2048KB',
                            'max_filename' => '255',
                            'encrypt_name' => TRUE
                    );
        $this->load->library('upload', $config);
        if($this->upload->do_upload($filecontrol))
        {
             $image_data = $this->upload->data();
             $image = $image_data['file_name'];
             
            $resize_config['image_library'] = 'gd2';
            $resize_config['source_image'] = $image_data['full_path']; //get original image
            $resize_config['maintain_ratio'] = TRUE;
            $resize_config['width'] = 200;
            $resize_config['height'] = 149;
            $this->load->library('image_lib', $resize_config);
            $this->image_lib->initialize($resize_config);
            $this->image_lib->resize();

             
            
            return $image;
        }else{
            return $image;
        }
        
    }
    
    public function unlinkImage($image)
    {
        $dir = APPPATH . 'assets/images/itemimages/';
        $imagepath = $dir.$image;
        
        if(file_exists($imagepath)){
            @unlink($imagepath);
        }
    }
    
     public function status(){
        if ($this->session->userdata('user_data')) {
            $header = "";
            $itemid = $this->uri->segment(4);
            $status = $this->uri->segment(6);
            $this->item->updateStatus($itemid,$status);
            redirect('item');
            
        } else {
            redirect('memberlogin', 'refresh');
        }
   }
    
 
}
