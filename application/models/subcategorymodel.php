<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subcategorymodel
 *
 * @author Dev
 */
class subcategorymodel extends CI_Model {
       //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     * @name getCategoryList
     * @return type array
     */
    public function getSubCategoryList(){
        $data=array();
        $sql="SELECT
                subcategory.subcategory_id,
                subcategory.category_id,
                subcategory.sub_cat_desc,
                subcategory.thumnail_image,
                subcategory.subcat_image,
                category.category_name,
                subcategory.is_active
              FROM subcategory
              INNER JOIN category 
              ON subcategory.category_id = category.category_id
              ORDER BY category.category_name ";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "subcategory_id"=>$rows->subcategory_id,
                    "category_name"=>$rows->category_name,
                    "sub_cat_desc"=>$rows->sub_cat_desc,
                    "thumnail_image"=>$rows->thumnail_image,
                    "image_category"=>$rows->subcat_image,
                    "is_active"=>$rows->is_active
                );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
    
    public function getImageName($subcategoryId)
    {
        $image_name = "";
        $sql = "Select thumnail_image from subcategory where subcategory_id=".(int)$subcategoryId;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $rows = $query->row();
            $image_name = $rows->thumnail_image;
        }
        return $image_name;
    }
    public function getSubCategoryById($SubCategoryId){
        $data=array();
        $sql ="SELECT
                subcategory_id,
                category_id,
                sub_cat_desc,
                thumnail_image,
                subcat_image,
                is_active
              FROM subcategory
              WHERE subcategory.subcategory_id =".(int)$SubCategoryId;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            
            $row=$query->row();
            
            $data=array(
                "subcategory_id"=>$row->subcategory_id,
                "category_id"=>$row->category_id,
                "sub_cat_desc"=>$row->sub_cat_desc
            );
        
            return $data;
        }else{
            $data=array(
                "subcategory_id"=>"",
                "category_id"=>"",
                "sub_cat_desc"=>""
            );
        
            return $data;
        }
        
    }
    /**
     * @method insertCategory
     * @param type $data
     */
    public function insertSubcategory($data=  array()){
        try {
                $this->db->trans_begin();
                $this->db->insert('subcategory', $data);
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
                
        } catch (Exception $exc) {
           $this->db->trans_rollback();
           return FALSE;
        }
    }
    
    public function updateSubcategory($data = array(),$subcategoryId){
        
        try {
                $this->db->trans_begin();
                $this->db->where("subcategory_id",$subcategoryId);
                $this->db->update('subcategory', $data);
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
        } catch (Exception $ex) {
             $this->db->trans_rollback();
             return FALSE;
        }
    }
    
//    public function delete($categoryId){
//         try {
//                $this->db->trans_begin();
//                $data = array(
//                                'is_active' => 'N',
//                            );
//                $this->db->where("category_id",$categoryId);
//                $this->db->update('product_category', $data);
//                
//                if ($this->db->trans_status() === FALSE) {
//                    $this->db->trans_rollback();
//                    return FALSE;
//                } else {
//                    $this->db->trans_commit();
//                    return TRUE;
//                }
//        } catch (Exception $ex) {
//             $this->db->trans_rollback();
//             return FALSE;
//        }
//    }
    public function updateStatus($subcategoryid,$status){
             try {
                 $updtStatus='';
                if($status=='Y'){
                    $updtStatus ='N';
                } else{
                    $updtStatus='Y';
                }
                $this->db->trans_begin();
                $data = array(
                                'is_active' => $updtStatus
                            );
                $this->db->where("subcategory_id",$subcategoryid);
                $this->db->update('subcategory', $data);
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
        } catch (Exception $ex) {
             $this->db->trans_rollback();
             return FALSE;
        }
    }
    
    
    public function getSubcategoryByCategory($categoryId)
    {
        $data = array();
          $sql = "SELECT subcategory.subcategory_id,
                subcategory.sub_cat_desc
                FROM subcategory
                WHERE subcategory.category_id=".(int)$categoryId
                ." AND subcategory.is_active ='Y'
                ORDER BY subcategory.sub_cat_desc";
       
        
        $query =  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "subcategory_id"=>$rows->subcategory_id,
                    "sub_cat_desc"=>$rows->sub_cat_desc,
                  
                   
                );
                
            }
            return $data;
        }else{
            return $data;
        }
        
    }
}
