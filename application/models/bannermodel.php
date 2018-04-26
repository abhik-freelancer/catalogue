<?php
class bannermodel extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     * @name getCategoryList
     * @return type array
     */
    public function getBannerList(){
        $data=array();
        $sql="SELECT
                id,
                bannertext,
                bannerimage,
                is_active,
                created_date
              FROM banner ORDER BY id";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "id"=>$rows->id,
                    "bannertext"=>$rows->bannertext,
                    "bannerimage"=>$rows->bannerimage,
                    "is_active"=>$rows->is_active,
                    "created_date"=>$rows->created_date
                 );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
    
    public function getImageName($bannerId)
    {
        $image_name = "";
        $sql = "Select bannerimage from banner where id=".(int)$bannerId;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $rows = $query->row();
            $image_name = $rows->bannerimage;
        }
        return $image_name;
    }
    public function getBannerById($bannerId){
        $data=array();
        $sql="SELECT
                id,
                bannertext,
                bannerimage,
                is_active,
                created_date
            FROM banner 
            WHERE   id=".$bannerId."";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            
            $row=$query->row();
            
            $data=array(
                "id"=>$row->id,
                "bannertext"=>$row->bannertext,
                "bannerimage"=>$row->bannerimage
            );
        
            return $data;
        }else{
            $data=array(
                 "id"=>"",
                "bannertext"=>"",
                "bannerimage"=>""
            );
        
            return $data;
        }
        
    }
    /**
     * @method insertCategory
     * @param type $data
     */
    public function insertBanner($data=  array()){
        try {
                $this->db->trans_begin();
                $this->db->insert('banner', $data);
                
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
    
    public function updateBanner($data = array(),$bannerId){
        
        try {
                $this->db->trans_begin();
                $this->db->where("id",$bannerId);
                $this->db->update('banner', $data);
                
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
    public function updateStatus($bannerId,$status){
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
                $this->db->where("id",$bannerId);
                $this->db->update('banner', $data);
                
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
    
    
    public function getActiveBanner()
    {
        $data=array();
        $sql="SELECT
                id,
                bannertext,
                bannerimage,
                is_active,
                created_date
          FROM banner WHERE is_active='Y' ORDER BY id";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
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
   
}
