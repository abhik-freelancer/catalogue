<?php
/**
 * Description of category
 * * @author Dev
 */
class category extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('categorymodel', 'category', TRUE);
        
    }

    public function index() {
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $login = ($session["login"] != "" ? $session["login"] : "");
            $userId = ($session["userid"] != "" ? $session["userid"] : 0);
            $result["ctglist"] = $this->category->getCategoryList();
            $page = "category/list";
            $header = "";
            createbody_method($result, $page, $header, $session);
        } else {
            redirect('memberlogin', 'refresh');
        }
    }

    public function addEdit() {
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $header = "";
            if ($this->uri->segment(4) === FALSE) {

                $categoryid = 0;
            } else {
                $categoryid = $this->uri->segment(4);
            }
            if ($categoryid != 0) {
                $result["category"] = $this->category->getCategoryById($categoryid);
                $page = 'category/addEdit';
            } else {
                $result["category"] = NULL;
                $page = 'category/addEdit';
            }
            createbody_method($result, $page, $header, $session);
        } else {
            redirect('memberlogin', 'refresh');
        }
    }

    public function savecategory() {
        if ($this->session->userdata('user_data')) {
            $categoryId = $this->input->post('hdcategoryid');
            $category = $this->input->post('category');
            $categoryDescription = $this->input->post('categorydesc');
            $uploadedImage = "";
            $data = array();
            $result=FALSE;

            if ($this->validate($category) != 0) {
                if ($categoryId == "") {
                    if ($_FILES['category_image']['error'] != 4) {
                        $dir = APPPATH . 'assets/images/categoryimages/';
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
                        if ($this->upload->do_upload('category_image')) {
                            $categoryimage_data = $this->upload->data();
                            $uploadedImage = $categoryimage_data['file_name'];

                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $categoryimage_data['full_path']; //get original image
                            $resize_config['maintain_ratio'] = TRUE;
                            $resize_config['width'] = 800;
                            $resize_config['height'] = 600;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();

                            // thumnail creation
                            $thumpath = APPPATH . 'assets/images/categoryimages/thumbnail/';
                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $categoryimage_data['full_path']; //get original image
                            $resize_config['new_image'] = $thumpath;
                            $resize_config['width'] = 128;
                            $resize_config['height'] = 128;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();
                        } else {
                            $this->session->set_flashdata('fileuploaderror', $this->upload->display_errors());
                            redirect('category/addEdit');
                        }
                    } //file select or not(else)
                    $data = array(
                        "category_name" => $category,
                        "category_desc" => $categoryDescription,
                        "image_thumnail" => $uploadedImage,
                        "image_category" => $uploadedImage
                    );
                    $result = $this->category->insertCategory($data);
                } else { //edit 
                    if ($_FILES['category_image']['error'] != 4) {

                        $uploaded_image = $this->category->getImageName($categoryId);
                        $this->unlinkimages($uploaded_image);
                        //file upload in edit mode
                         $dir = APPPATH . 'assets/images/categoryimages/';
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
                        if ($this->upload->do_upload('category_image')) {
                            $categoryimage_data = $this->upload->data();
                            $uploadedImage = $categoryimage_data['file_name'];

                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $categoryimage_data['full_path']; //get original image
                            $resize_config['maintain_ratio'] = TRUE;
                            $resize_config['width'] = 800;
                            $resize_config['height'] = 600;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();

                            // thumnail creation
                            $thumpath = APPPATH . 'assets/images/categoryimages/thumbnail/';
                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $categoryimage_data['full_path']; //get original image
                            $resize_config['new_image'] = $thumpath;
                            $resize_config['width'] = 128;
                            $resize_config['height'] = 128;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();
                        } else {
                            $this->session->set_flashdata('fileuploaderror', $this->upload->display_errors());
                            redirect('category/addEdit');
                        }
                        $data = array(
                             "category_name" => $category,
                             "category_desc" => $categoryDescription,
                             "image_thumnail" => $uploadedImage,
                             "image_category" => $uploadedImage
                        );
                        //file upload in edit mode
                        
                    } else {//file did not upload in edit mode
                        $data = array(
                            "category_name" => $category,
                            "category_desc" => $categoryDescription,
                        );
                        
                    }
                    $result = $this->category->updateCategory($data,$categoryId);
                }

         if ($result) {
                    redirect('category', 'refresh');
                } else {
                    $this->session->set_flashdata('fatalerror', "Fatal error occured");
                    redirect('category/addEdit');
                }
            } else {
                $this->session->set_flashdata('catenameempty', "Category name is mandatory");
                redirect('category/addEdit');
            }
        } else {
            redirect('memberlogin', 'refresh');
        }
    }

    public function validate($categoryname) {
        if ($categoryname != "") {
            return 1;
        } else {
            return 0;
        }
    }

    public function unlinkimages($images){
        $dir = APPPATH . 'assets/images/categoryimages/';
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
            $categoryid = $this->uri->segment(4);
            $status = $this->uri->segment(6);
            $this->category->updateStatus($categoryid,$status);
            redirect('category');
            
        } else {
            redirect('memberlogin', 'refresh');
        }
   }

}
