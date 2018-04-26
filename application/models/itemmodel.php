<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of itemmodel
 *
 * @author Dev
 */
class itemmodel extends CI_Model{
         //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     * @name getCategoryList
     * @return type array
     */
    public function getItemList(){
        $data=array();
        $sql="SELECT 
                item.item_name,
                item.item_price,
                item.item_id,
                category.category_name,
                item.item_image_1,
                item.item_image_2,
                item.item_image_3,
                subcategory.sub_cat_desc,
                item.is_active
            FROM
            item
                INNER JOIN category ON
                item.item_catg_id  = category.category_id
            LEFT JOIN
                subcategory ON item.item_sub_catg = subcategory.subcategory_id
            ORDER BY item.item_name";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "item_id"=>$rows->item_id,
                    "item_name"=>$rows->item_name,
                    "item_price"=>$rows->item_price,
                    "sub_cat_desc"=>$rows->sub_cat_desc,
                    "category_name"=>$rows->category_name,
                    "item_image_1"=>$rows->item_image_1,
                    "item_image_2"=>$rows->item_image_2,
                    "item_image_3"=>$rows->item_image_3,
                    "is_active"=>$rows->is_active
                );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
    
    public function getImagesName($itemId)
    {
        $images = array();
        $sql = "SELECT
                item_image_1,
                item_image_2,
                item_image_3
              FROM item
                WHERE item.item_id = ".(int)$itemId;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $rows = $query->row();
            
            $images = array(
                                "item_image_1" => $rows->item_image_1,
                                "item_image_2" => $rows->item_image_2,
                                "item_image_3" => $rows->item_image_3
                            );
            
            
            
        }
        return $images;
    }
    public function getItemById($itemId){
        $data=array();
        $sql ="SELECT
                    item_id,
                    item_name,
                    item_catg_id,
                    item_sub_catg,
                    item_image_1,
                    item_image_2,
                    item_image_3,
                    item_price,
                    is_active,
                    item_desc
                FROM item
                WHERE item.item_id =".(int)$itemId;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            
            $row=$query->row();
            
            $data=array(
                "item_id"=>$row->item_id,
                "item_name"=>$row->item_name,
                "item_catg_id"=>$row->item_catg_id,
                "item_sub_catg"=>$row->item_sub_catg,
                "item_desc"=>$row->item_desc,
                "item_price"=>$row->item_price,
                "item_image_1"=>$row->item_image_1,
                "item_image_2"=>$row->item_image_2,
                "item_image_3"=>$row->item_image_3
            );
        
            return $data;
        }else{
            $data=array(
                "item_id"=>"",
                "item_name"=>"",
                "item_catg_id"=>"",
                "item_sub_catg"=>"",
                "item_desc"=>"",
                "item_price"=>""
            );
        
            return $data;
        }
        
    }
    /**
     * @method insertCategory
     * @param type $data
     */
    public function insertItem($data =array())
    {
        try {
                $this->db->trans_begin();
                $this->db->insert('item', $data);
                
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
    
    public function updateItem($data = array(),$itemid){
        
        try {
                $this->db->trans_begin();
                $this->db->where("item_id",$itemid);
                $this->db->update('item', $data);
                
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
    

    public function updateStatus($itemid,$status){
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
                $this->db->where("item_id",$itemid);
                $this->db->update('item', $data);
                
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
