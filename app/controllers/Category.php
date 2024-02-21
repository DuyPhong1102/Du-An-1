<?php
class Category extends Controller
{
   public $data=[];
   public function index(){
    $dataCate=$this->getCate();
    $dataBrand=$this->getDataBrand();
    $this->data['sub_content']['dataCategories']=$dataCate;
    $this->data['sub_content']['dataBrand']=$dataBrand;

    $this->data['content']='clients/category';
    $this->render('layouts/client_layout',$this->data);
   }
   public function getCate(){
      $data=$this->model('CategoriesModel')->getCategories()->fetchAll(PDO::FETCH_ASSOC);
      return $data;
   }
   public function getDataBrand(){
      $data=$this->model('CategoriesModel')->getBrand();
      return $data;
   }
   public function getDataProduct(){
      $condition="where product_status ='1'";
      $data=$this->model('CategoriesModel')->getProduct($condition)->fetchAll(PDO::FETCH_ASSOC);
     echo json_encode($data);
   }
   public function handlePagination(){
      
      $item_per_page=isset($_POST["perPage"]) ? $_POST["perPage"] : '';
      $current_page=isset($_POST["currentPage"]) ? $_POST["currentPage"] : '';
      $offset=($current_page-1)*$item_per_page;
    
      $data=$this->model('CategoriesModel')->LimitProduct($item_per_page,$offset);
     echo json_encode($data);
      }
   
   public function ProductFilter(){
     
      $condition = "";
     $connectModel=$this->model('CategoriesModel');
      if(count($_POST)>0){
        if(isset($_POST["brand"]) && !empty($_POST["brand"])){
         $brand_name=$_POST["brand"];
         $brand_filter = explode("," , "$brand_name");
         $valueStr=$connectModel->handleString($brand_filter);
         $condition.="AND brand_name IN ($valueStr)";
        }
        if(isset($_POST["categories"]) && !empty($_POST["categories"])){
         $cat_name=$_POST["categories"];
         $cate_filter = explode("," , "$cat_name");
         $valueStr=$connectModel->handleString($cate_filter);
         $condition.="AND cat_name IN ($valueStr)";
        }
        if(isset($_POST["min_price"]) && !empty($_POST["max_price"])){
         $min_price=$_POST["min_price"];
         $max_price=$_POST["max_price"];

         $min_price = explode("," , "$min_price");
         $max_price = explode("," , "$max_price");

         $min_price=$connectModel->handleString($min_price);
         $max_price=$connectModel->handleString($max_price);

         
         $condition.="AND price BETWEEN $min_price AND $max_price";
        }
      $result=$connectModel->getAllInfoProduct($condition)->fetchAll(PDO::FETCH_ASSOC);
     
      echo json_encode($result);

      }
   }

   

}
