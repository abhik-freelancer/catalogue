<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banner
 *
 * @author Dev
 */
class banner extends CI_Controller{
    public function __construct() 
     {
        parent::__construct();
        $this->load->model("bannermodel","banner",TRUE);
     }
     public function index() {
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $result["bannerlist"] = $this->banner->getBannerList();
            $page = "banner/list";
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

                $bannerId = 0;
            } else {
                $bannerId = $this->uri->segment(4);
            }
            if ($bannerId != 0) {
                $result["banner"] = $this->banner->getBannerById($bannerId);
                $page = 'banner/addEdit';
            } else {
                $result["banner"] = NULL;
                $page = 'banner/addEdit';
            }
            createbody_method($result, $page, $header, $session);
        } else {
            redirect('memberlogin', 'refresh');
        }
    }

    public function savebanner() {
        if ($this->session->userdata('user_data')) {
            $bannerId = $this->input->post('hdbannerid');
            $bannertext = $this->input->post('bannertext');
            
            $uploadedImage = "";
            $data = array();
            $result=FALSE;

            if ($this->validate($bannertext) != 0) {
                if ($bannerId == "") {
                    if ($_FILES['banner_image']['error'] != 4) {
                        $dir = APPPATH . 'assets/images/bannerimages/';
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
                        if ($this->upload->do_upload('banner_image')) {
                            $bannerimage_data = $this->upload->data();
                            $uploadedImage = $bannerimage_data['file_name'];

                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $bannerimage_data['full_path']; //get original image
                            $resize_config['maintain_ratio'] = TRUE;
                            $resize_config['width'] = 900;
                            $resize_config['height'] = 350;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();

                        } else {
                            $this->session->set_flashdata('banneruploaderr', $this->upload->display_errors());
                            redirect('banner/addEdit');
                        }
                    } //file select or not(else)
                    $data = array(
                        "bannertext" => $bannertext,
                        "bannerimage" => $uploadedImage,
                        
                    );
                    $result = $this->banner->insertBanner($data);
                } else { //edit 
                    if ($_FILES['banner_image']['error'] != 4) {

                        $uploaded_image = $this->banner->getImageName($bannerId);
                        $this->unlinkimages($uploaded_image);
                        //file upload in edit mode
                         $dir = APPPATH . 'assets/images/bannerimages/';
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
                        if ($this->upload->do_upload('banner_image')) {
                            $bannerimage_data = $this->upload->data();
                            $uploadedImage = $bannerimage_data['file_name'];

                            $resize_config['image_library'] = 'gd2';
                            $resize_config['source_image'] = $bannerimage_data['full_path']; //get original image
                            $resize_config['maintain_ratio'] = TRUE;
                            $resize_config['width'] = 900;
                            $resize_config['height'] = 350;
                            $this->load->library('image_lib', $resize_config);
                            $this->image_lib->initialize($resize_config);
                            $this->image_lib->resize();

                            
                        } else {
                            $this->session->set_flashdata('fileuploaderror', $this->upload->display_errors());
                            redirect('banner/addEdit');
                        }
                        $data = array(
                             "bannertext" => $bannertext,
                             "bannerimage" => $uploadedImage,
                        );
                        //file upload in edit mode
                        
                    } else {//file did not upload in edit mode
                        $data = array(
                             "bannertext" => $bannertext,
                             
                        );
                        
                    }
                    $result = $this->banner->updateBanner($data,$bannerId);
                }

         if ($result) {
                    redirect('banner', 'refresh');
                } else {
                    $this->session->set_flashdata('fatalerror', "Fatal error occured");
                    redirect('banner/addEdit');
                }
            } else {
                $this->session->set_flashdata('bannertxtempty', "Banner text  is mandatory");
                redirect('banner/addEdit');
            }
        } else {
            redirect('memberlogin', 'refresh');
        }
    }

    public function validate($bannertext) {
        if ($bannertext != "") {
            return 1;
        } else {
            return 0;
        }
    }

    public function unlinkimages($images){
        $dir = APPPATH . 'assets/images/bannerimages/';
        $imagepath = $dir.$images;
        if(file_exists($imagepath)){
            @unlink($imagepath);
        }
     }
    
   public function status(){
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $header = "";
            $bannerId = $this->uri->segment(4);
            $status = $this->uri->segment(6);
            $this->banner->updateStatus($bannerId,$status);
            redirect('banner');
            
        } else {
            redirect('memberlogin', 'refresh');
        }
   }
}
