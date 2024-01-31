<?php
class Home extends Controller
{
    public $data=[];

    public function index(){
      if(!Auth::logged_in()){
        $this->redirect("admin/account/login");
      }
      $this->renderData();

    }
    public function renderData(){
      $dataCustomer=$this->model("CustomersModel")->DataCustomers();
      $dataProduct=$this->model("ProductModel")->getProducts();
      $dataCate=$this->model("CategoriesModel")->getCategories();
      $dataOrder=$this->model("OrdersModel")->getOrdersProduct("orders");
      $dataCatefetchAll=$dataCate->fetchAll(PDO::FETCH_ASSOC);
      $detail_Statistical=[];

   
      

      foreach ($dataCatefetchAll as $item):
        $getAll= $this->model("CategoriesModel")->query("SELECT max(price) as maxPrice,min(price) as minPrice,AVG(price) as average,count(*) as quantity  FROM categories a join products b on a.cat_id=b.cat_id where a.cat_id =$item[cat_id]")->fetch(PDO::FETCH_ASSOC);
        array_push($detail_Statistical,$getAll);
      endforeach;
    
      $countCustomer=$dataCustomer->rowCount();
      $countProduct=$dataProduct->rowCount();
      $countCate=$dataCate->rowCount();
      $count_order=$dataOrder->rowCount();
  
    $this->data['sub_content']['number_customers']=$countCustomer;
    $this->data['sub_content']['number_products']=$countProduct;
    $this->data['sub_content']['number_cate']=$countCate;
    $this->data['sub_content']['number_order']=$count_order;
   
    $this->data['sub_content']['dataCate']=$dataCatefetchAll;
    
    
    $this->data['sub_content']['detail_Statistical']=$detail_Statistical;
  

    $this->data['content']='admin/Home';

    $this->render('layouts/admin_layout',$this->data);
    }

   
}