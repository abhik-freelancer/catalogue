<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contactmodel
 *
 * @author Dev
 */
class contactmodel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function contactList()
    {
        $data=array();
        $sql="SELECT
                    id,
                    NAME,
                    email_add,
                    message,
                    DATE_FORMAT(created_date,'%d-%m-%Y')AS created_date,
                    is_active
                  FROM catalogue_contact ORDER BY NAME";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "id"=>$rows->id,
                    "NAME"=>$rows->NAME,
                    "email_add"=>$rows->email_add,
                    "message"=>$rows->message,
                    "is_active"=>$rows->is_active,
                    "created_date"=>$rows->created_date
                 );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
  
}
