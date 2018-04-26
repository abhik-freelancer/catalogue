<?php
class cateloguemodel extends CI_Model
{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
	
	 public function categorymenu()
	 {
        $data=array();
        $sql="SELECT
			  category_id,
			  category_name,
			  category_desc,
			  image_thumnail,
			  image_category,
			  is_active
			FROM category  WHERE is_active='Y' order by category_name";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "category_id"=>$rows->category_id,
                    "category_name"=>$rows->category_name,
                    "category_desc"=>$rows->category_desc,
                    "image_thumnail"=>$rows->image_thumnail,
                    "image_category"=>$rows->image_category,
                    "is_active"=>$rows->is_active,
                    "subcategory"=>$this->getSubcategoryByCatId($rows->category_id)
                );
            }
            return $data;
        }else{
            return $data;
        }
    }
	
	public function getSubcategoryByCatId($categoryId)
	{
		$data=array();
                        $sql="SELECT
			  subcategory_id,
			  category_id,
			  sub_cat_desc,
			  thumnail_image,
			  subcat_image,
			  is_active
			FROM subcategory
			WHERE
			subcategory.category_id =".$categoryId ." AND is_active='Y'";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "subcategory_id"=>$rows->subcategory_id,
                    "category_id"=>$rows->category_id,
                    "sub_cat_desc"=>$rows->sub_cat_desc,
                    "thumnail_image"=>$rows->thumnail_image,
                    "subcat_image"=>$rows->subcat_image,
                    "is_active"=>$rows->is_active,
                    
                );
                
            }
            return $data;
        }else{
            return $data;
        }
		
	}
        
        public function getAllItemHomePage()
        {
           $data =array();
           $sql = "SELECT
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
                    WHERE is_active = 'Y' 
                    ORDER BY item_name LIMIT 0,6";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows)
            {
                $data[]=array(
                    "item_id"=>$rows->item_id,
                    "item_name"=>$rows->item_name,
                    "item_catg_id"=>$rows->item_catg_id,
                    "item_sub_catg"=>$rows->item_sub_catg,
                    "item_image_1"=>$rows->item_image_1,
                    "item_image_2"=>$rows->item_image_2,
                    "item_image_3"=>$rows->item_image_3,
                    "item_price"=>$rows->item_price,
                    "is_active"=>$rows->is_active,
                    "item_desc"=>$rows->item_desc
                    
                );
                
            }
            return $data;
        }else{
            return $data;
        }
            
        }
        
        public function getItemsByCategory($categoryId,$orderBy)
        {
            if($orderBy=="DESC"){
                $orderByClause = " ORDER BY item_price DESC";
            }
            else {
                $orderByClause = " ORDER BY item_price ASC";
            }
            
                    $data =array();
                 $sql = "SELECT
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
                             WHERE is_active = 'Y' AND item_catg_id= ".(int)$categoryId.$orderByClause;
                             
                 $query=  $this->db->query($sql);
                 if($query->num_rows()>0){
                     foreach ($query->result() as $rows)
                     {
                         $data[]=array(
                             "item_id"=>$rows->item_id,
                             "item_name"=>$rows->item_name,
                             "item_catg_id"=>$rows->item_catg_id,
                             "item_sub_catg"=>$rows->item_sub_catg,
                             "item_image_1"=>$rows->item_image_1,
                             "item_image_2"=>$rows->item_image_2,
                             "item_image_3"=>$rows->item_image_3,
                             "item_price"=>$rows->item_price,
                             "is_active"=>$rows->is_active,
                             "item_desc"=>$rows->item_desc

                         );

                     }
                     return $data;
                 }else{
                     return $data;
                 }
        }
        
        
        public function getItemsBySubCategory($subcatId,$orderBy)
        {
            if($orderBy=="DESC"){
                $orderByClause = " ORDER BY item_price DESC";
            }
            else {
                $orderByClause = " ORDER BY item_price ASC";
            }
            
                $data =array();
                 $sql = "SELECT
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
                             WHERE is_active = 'Y' AND item_sub_catg= ".(int)$subcatId.$orderByClause;
                             
                 $query=  $this->db->query($sql);
                 if($query->num_rows()>0){
                     foreach ($query->result() as $rows)
                     {
                         $data[]=array(
                             "item_id"=>$rows->item_id,
                             "item_name"=>$rows->item_name,
                             "item_catg_id"=>$rows->item_catg_id,
                             "item_sub_catg"=>$rows->item_sub_catg,
                             "item_image_1"=>$rows->item_image_1,
                             "item_image_2"=>$rows->item_image_2,
                             "item_image_3"=>$rows->item_image_3,
                             "item_price"=>$rows->item_price,
                             "is_active"=>$rows->is_active,
                             "item_desc"=>$rows->item_desc

                         );

                     }
                     return $data;
                 }else{
                     return $data;
                 }
        }
        
        public function searchitem($itemdata=NULL)
        {
            $data =array();
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
                WHERE item_desc REGEXP '".$itemdata."' OR item_name LIKE '".$itemdata."'";
            $query=  $this->db->query($sql);
                 if($query->num_rows()>0){
                     foreach ($query->result() as $rows)
                     {
                         $data[]=array(
                             "item_id"=>$rows->item_id,
                             "item_name"=>$rows->item_name,
                             "item_catg_id"=>$rows->item_catg_id,
                             "item_sub_catg"=>$rows->item_sub_catg,
                             "item_image_1"=>$rows->item_image_1,
                             "item_image_2"=>$rows->item_image_2,
                             "item_image_3"=>$rows->item_image_3,
                             "item_price"=>$rows->item_price,
                             "is_active"=>$rows->is_active,
                             "item_desc"=>$rows->item_desc

                         );

                     }
                     return $data;
                 }else{
                     return $data;
                 }
        }
        
        public function getBanner()
        {
            $data =array();
            $sql ="SELECT
                        id,
                        bannertext,
                        bannerimage,
                        is_active,
                        created_date
                    FROM banner
                    WHERE is_active ='Y' ORDER BY id";
            $query=  $this->db->query($sql);
                 if($query->num_rows()>0){
                     foreach ($query->result() as $rows)
                     {
                         $data[]=array(
                             "id"=>$rows->id,
                             "bannertext"=>$rows->bannertext,
                             "bannerimage"=>$rows->bannerimage
                             

                         );

                     }
                     return $data;
                 }else{
                     return $data;
                 }
            
        }
        public function getItemDeatils($itemId)
        {
            $data=array();
            $sql="SELECT
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
                            "item_image_1"=>$row->item_image_1,
                            "item_image_2"=>$row->item_image_2,
                            "item_image_3"=>$row->item_image_3,
                            "item_price"=>$row->item_price,
                            "item_desc"=>$row->item_desc
                        );

                        return $data;
                    }else{
                        $data=array(
                            "item_id"=>"",
                            "item_name"=>"",
                            "item_catg_id"=>"",
                            "item_image_1"=>"",
                            "item_image_2"=>"",
                            "item_image_3"=>"",
                            "item_price"=>"",
                            "item_desc"=>""
                        );

                        return $data;
                    }
        }
        
        public function insertContact($data=array())
        {
            try {
                $this->db->trans_begin();
                $this->db->insert('catalogue_contact', $data);
                
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
        
        
}