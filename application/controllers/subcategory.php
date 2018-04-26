<?php
class subcategory extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('subcategorymodel', 'subcategory', TRUE);
        $this->load->model('categorymodel','category',TRUE);
    }
    
     public function index() {
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $login = ($session["login"] != "" ? $session["login"] : "");
            $userId = ($session["userid"] != "" ? $session["userid"] : 0);
            $result["subcatg"] = $this->subcategory->getSubCategoryList();
            $page = "subcategory/list";
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

                $subcategoryid = 0;
            } else {
                $subcategoryid = $this->uri->segment(4);
            }
            $result["category"]= $this->category->getActiveCategory();
            if ($subcategoryid != 0) {
                $result["subcategory"] = $this->subcategory->getSubCategoryById($subcategoryid);
                $page = 'subcategory/addEdit';
            } else {
                $result["subcategory"] = NULL;
                $page = 'subcategory/addEdit';
            }
            createbody_method($result, $page, $header, $session);
        } else {
            redirect('memberlogin', 'refresh');
        }
    }
    
     public function savesubcategory() {
        if ($this->session->userdata('user_data')) {
            $subcategoryId = $this->input->post('hdsubcategoryid');
            $subcategory = $this->input->post('subcategory');
            $categoryId = $this->input->post('category');
            
            $uploadedImage = "";
            $data = array();
            $result=FALSE;

            if ($this->validate($subcategory,$categoryId) != 0) {
                if ($subcategoryId == "") {
                    if ($_FILES['subcategory_image']['error'] != 4) {
                        $dir = APPPATH . 'assets/images/subcategoryimages/';
                        $config = array(
                            'upload_path' => $dir,
                            'allowed_types' => 'gif|jpg|png',
                            //allowed max file size. 0 means unlimited file size
                            'max_size' => '2048KB',
                            //max file name size
                            'max_filename' => '255',
                            //whether file name should be encrypted or not
                            'encrypt_name' => TRUE
                                //store image info once uploaded
                        );
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('subcategory_image')) {
                            $subcategoryimage_data = $this->upload->data();
                            $uploadedImage = $subcategoryimage_data['file_name'];

                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $subcategoryimage_data['full_path']; //get original image
                            $resize_config['maintain_ratio'] = TRUE;
                            $resize_config['width'] = 800;
                            $resize_config['height'] = 600;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();

                            // thumnail creation
                            $thumpath = APPPATH . 'assets/images/subcategoryimages/thumbnail/';
                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $subcategoryimage_data['full_path']; //get original image
                            $resize_config['maintain_ratio'] = TRUE;
                            $resize_config['new_image'] = $thumpath;
                            $resize_config['width'] = 115;
                            $resize_config['height'] = 115;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();
                        } else {
                            $this->session->set_flashdata('fileuploaderror', $this->upload->display_errors());
                            redirect('subcategory/addEdit');
                        }
                    } //file select or not(else)
                    $data = array(
                        "sub_cat_desc" => $subcategory,
                        "category_id"=>$categoryId,
                        "thumnail_image" => $uploadedImage,
                        "subcat_image" => $uploadedImage
                    );
                    $result = $this->subcategory->insertSubcategory($data);
                } else { //edit 
                    if ($_FILES['subcategory_image']['error'] != 4) {

                        $uploaded_image = $this->subcategory->getImageName($subcategoryId);
                        $this->unlinkimages($uploaded_image);
                        //file upload in edit mode
                         $dir = APPPATH . 'assets/images/subcategoryimages/';
                        $config = array(
                            'upload_path' => $dir,
                            'allowed_types' => 'gif|jpg|png',
                            //allowed max file size. 0 means unlimited file size
                            'max_size' => '2048KB',
                            //max file name size
                            'max_filename' => '255',
                            //whether file name should be encrypted or not
                            'encrypt_name' => TRUE
                                //store image info once uploaded
                        );
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('subcategory_image')) {
                            $subcategoryimage_data = $this->upload->data();
                            $uploadedImage = $subcategoryimage_data['file_name'];

                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $subcategoryimage_data['full_path']; //get original image
                            $resize_config['maintain_ratio'] = TRUE;
                            $resize_config['width'] = 800;
                            $resize_config['height'] = 600;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();

                            // thumnail creation
                            $thumpath = APPPATH . 'assets/images/subcategoryimages/thumbnail/';
                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $subcategoryimage_data['full_path']; //get original image
                            $resize_config['new_image'] = $thumpath;
                            $resize_config['maintain_ratio']=TRUE;
                            $resize_config['width'] = 115;
                            $resize_config['height'] = 115;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();
                        } else {
                            $this->session->set_flashdata('fileuploaderror', $this->upload->display_errors());
                            redirect('subcategory/addEdit');
                        }
                        $data = array(
                             "sub_cat_desc" => $subcategory,
                             "category_id" => $categoryId,
                             "thumnail_image" => $uploadedImage,
                             "subcat_image" => $uploadedImage
                        );
                        //file upload in edit mode
                        
                    } else {//file did not upload in edit mode
                        $data = array(
                           "sub_cat_desc" => $subcategory,
                           "category_id" => $categoryId
                        );
                        
                    }
                    $result = $this->subcategory->updateSubcategory($data,$subcategoryId);
                }

         if ($result) {
                    redirect('subcategory', 'refresh');
                } else {
                    $this->session->set_flashdata('fatalerror', "Fatal error occured");
                    redirect('subcategory/addEdit');
                }
            } else {
                $this->session->set_flashdata('subcatempty', "*Field are mandatory");
                redirect('subcategory/addEdit');
            }
        } else {
            redirect('memberlogin', 'refresh');
        }
    }

    public function validate($subcategory,  $categoryId) {
        if ($subcategory != "") {
            return 1;
        } else {
            return 0;
        }
        if($categoryId!="")
        {
            return 1;
        }  else {
            return 0;
        }
    }
    
    public function unlinkimages($images){
        $dir = APPPATH . 'assets/images/subcategoryimages/';
        $imagepath = $dir.$images;
        $thumnailpath = $dir.'thumbnail/'.$images;
        if(file_exists($imagepath)){
            @unlink($imagepath);
        }
        
        if(file_exists($thumnailpath)){
            @unlink($thumnailpath);
        }
        
    }
    
    public function status(){
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $header = "";
            $subcategoryId = $this->uri->segment(4);
            $status = $this->uri->segment(6);
            $this->subcategory->updateStatus($subcategoryId,$status);
            redirect('subcategory');
            
        } else {
            redirect('memberlogin', 'refresh');
        }
   }

    
    
    
}
