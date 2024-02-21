<?php
class DataOrder extends Controller
{
    public $data=[];

    public function index(){
      if(!Auth::logged_in()){
        $this->redirect("admin/account/login");
      }
      
      $getData=$this->model('OrdersModel');
      $info_order=$this->model("OrdersModel")->getOrdersProduct("orders")->fetchAll(PDO::FETCH_ASSOC);
      $this->data['sub_content']["info_order"]=$info_order;
  
      
      $this->data['content']='admin/DataOrder';

      $this->render('layouts/admin_layout',$this->data);
     
    }
    public function detail($id){
      if(!isset($id)){
        $this->redirect('404page');
      }
      $getData=$this->model('OrdersModel');
      $detail_product=$this->model("OrdersModel")->getOrdersProduct("order_product join products on order_product.product_id = products.id where order_id=$id")->fetchAll(PDO::FETCH_ASSOC);
      $this->data['sub_content']["detail_product"]=$detail_product;
      $this->data['content']='admin/Detail';
      $this->render('layouts/admin_layout',$this->data);

    }
   


}