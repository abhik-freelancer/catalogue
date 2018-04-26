<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class catelogue extends CI_Controller
{
	
	public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model("categorymodel","category",TRUE);
        $this->load->model("subcategorymodel","subcategory",TRUE);
        $this->load->model("itemmodel","item",TRUE);
        $this->load->model("cateloguemodel","catalogue",TRUE);
        $this->load->library("stripegateway");
        
    }
    public function index()
    {
            $result=array();
            $result['leftmenu']='catelogue/leftmenu';
            $result['catloguemenu']=$this->catalogue->categorymenu();
            $result['bodypage']='catelogue/body';
            $result['bodydata']=  $this->catalogue->getAllItemHomePage();
            $result['bannerpage']= 'catelogue/banner';
            $result['banners'] = $this->catalogue->getBanner();
            $result['carttotal'] = $this->cart->total_items();
            $this->load->view('front_template',$result);
    }
    public function getProductByCategoryId($catId="",$orderBy="DESC")
    {
        
        $result = array();
        $result["items"] =$this->catalogue->getItemsByCategory($catId,$orderBy);
        $result["orderby"] = $orderBy;
        $result["categoryId"] = $catId;
        $page = "catelogue/categorywiseitem";
        $this->load->view($page,$result);
    }
    public function getProductBySubcatId($subcatId="",$orderBy="DESC")
    {
        $result=array();
        $result["items"] = $this->catalogue->getItemsBySubCategory($subcatId,$orderBy);
        $result["orderby"]=$orderBy;
        $result["subcatId"]=$subcatId;
        $page = "catelogue/subcatwiseitem";
        $this->load->view($page,$result);
    }
    public function getItemBySearch()
    {
        $result=array();
        $searchcriteria=  $this->input->post('searchcriteria');
        $result["items"] = $this->catalogue->searchitem($searchcriteria);
        $page = "catelogue/searchitemwise";
        $this->load->view($page,$result);
        
    }
    
    public function getItemDetails($itemId = NULL)
    {
            $result=array();
            $result['leftmenu']='catelogue/leftmenu';
            $result['catloguemenu']=$this->catalogue->categorymenu();
            $result['bodypage']='catelogue/itemdetail';
            $result['bodydata']=  $this->catalogue->getItemDeatils($itemId);
            $result['bannerpage']= 'catelogue/banner';
            $result['banners'] = $this->catalogue->getBanner();
            $result['carttotal'] = $this->cart->total_items();
            $this->load->view('front_template',$result);
    }
    
    public function addToCart()
    {
        $itemId = $this->input->post("itemId");
        $qty = $this->input->post("qty");
        $cartItem = $this->catalogue->getItemDeatils($itemId);
        $jsonOutput=array();
        
        $isItemExist = 0;
        $rowIdForUpdate =0;
        $previousQty =0;

        
        foreach($this->cart->contents() as $cartdata){
            if($cartdata['id']==$itemId){
                $isItemExist=1;
                $rowIdForUpdate=$cartdata['rowid'];
                $previousQty = $cartdata['qty'];
            }
        }
        if($isItemExist!=1){
            $data= array(
             'id'      => $itemId,
             'qty'     => $qty,
             'price'   => $cartItem['item_price'],
             'name'    => $cartItem['item_name']
             );
            if($this->cart->insert($data))
            {
                $jsonOutput = array("msg_code"=>1,"msg"=>"Item has been added to cart");
            }
        }else{
          $data = array('rowid'=>$rowIdForUpdate,'qty'=>$previousQty + $qty);
           
            if($this->cart->update($data))
            {
                $jsonOutput = array("msg_code"=>1,"msg"=>"Item has been added to cart");
            }
        }
        
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($jsonOutput);
        exit;
    }
    public function displaycart()
    {
            $result=array();
            $result['leftmenu']='catelogue/leftmenu';
            $result['catloguemenu']=$this->catalogue->categorymenu();
            $result['bodypage']='catelogue/cartdisplay';
            $result['bannerpage']= 'catelogue/banner';
            $result['banners'] = $this->catalogue->getBanner();
            $result['carttotal'] = $this->cart->total_items();
            $this->load->view('front_template',$result);
    }
    public function updateCart()
    {
       $postData = $this->input->post();
       
       foreach ($postData as $items){
           $data = array('rowid'=>$items['rowid'],'qty'=>$items['qty']);
           $this->cart->update($data);
       }
       
       
        redirect('catelogue/displaycart');
    }
    public function displayplaceorder()
    {
            $result=array();
            $result['leftmenu']='catelogue/leftmenu';
            $result['catloguemenu']=$this->catalogue->categorymenu();
            $result['bodypage']='catelogue/orderlist';
            $result['bannerpage']= 'catelogue/banner';
            $result['banners'] = $this->catalogue->getBanner();
            $result['carttotal'] = $this->cart->total_items();
            $this->load->view('front_template',$result);
        
    }
    
    public function payform()
    {
            $result=array();
            $result['message']="";
            //Array ( [stripeToken] => tok_1BzmUZCGMOrcbBdaqJkBHIPJ [stripeTokenType] => card [stripeEmail] => abc@gmail.com ) 
           
                $token = $_POST['stripeToken'];
                $data = array(
                  "amount" => round($this->cart->total())* 100,
                  "currency" => "usd",
                  "description" => "ecomcatlogue test mode payment.",
                  "source" => $token,
                 );
            $result["message"] = $this->stripegateway->checkout($data);
            $result["messagedata"]= "Payment of ($)".$this->cart->format_number($this->cart->total())." successful.";
            $this->cart->destroy();
            $result['leftmenu']='catelogue/leftmenu';
            $result['catloguemenu']=$this->catalogue->categorymenu();
            $result['bodypage']='catelogue/payform';
            $result['bannerpage']= 'catelogue/banner';
            $result['banners'] = $this->catalogue->getBanner();
            $result['carttotal'] = NULL;
            $this->load->view('front_template',$result);
    }
    
    
    
}