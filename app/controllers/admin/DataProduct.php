<?php
class DataProduct extends Controller
{
    public $data=[];

    public function index(){
      if(!Auth::logged_in()){
        $this->redirect("admin/account/login");
      }
      $this->renderData();
     

    }
      
    public function renderData(){
      $this->data['sub_content']['data_brand'] =$this->model('ProductModel')->getBrand();
      $this->data['sub_content']['data_categories'] =$this->AllCategories();
        $this->data['sub_content']['data_product']= $this->dataProducts();
        $this->data['content']='admin/DataProduct';
        
        $this->render('layouts/admin_layout',$this->data);
    } 
    public function ApiProduct(){
      //Lấy ra thông tin tất cả sản phẩm
      $dataProduct=$this->dataProducts();
      echo json_encode($dataProduct);
    }
    public function dataProducts(){
      $getDataProduct=$this->model('ProductModel')->dataProduct();
      return $getDataProduct;
     }
     public function deleteProduct(){
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id=$_POST['id'];
        $this->model('ProductModel')->deleteOneItem("id={$id}");
      }
      else{
      header('Location:'._WEB_ROOT.'/admin/Home');
      }
     }
     public function deleteMultipleProduct(){
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data=$_POST['arrId'];
        $this->model('ProductModel')->deleteMultipleProductById($data);
        $data=$this->dataProducts();
        echo json_encode($data);
      }
      else{
      header('Location:'._WEB_ROOT.'/admin/Home');
      }
     }

     public function edit(){
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $price=$_POST["price"];
        $desc=$_POST["desc"];
        $cate_id=$_POST["cat_id"];
        $data=[
          'name'=>"'{$name}'",
          'price'=>"'{$price}'",
          'description'=>"'{$desc}'",
          'cat_id '=>"'{$cate_id}'",
        ];
        $checkFile=empty($this->uploadFile())? $data :$data["image"] = $this->uploadFile();
        $condition="id=${id}";
        $this->model('ProductModel')->editProduct($data,$condition);
        $data=$this->dataProducts();
        echo json_encode($data);
      }
      else{
      header('Location:'._WEB_ROOT.'/admin/Home');
      }

     }

     public function AllCategories(){
        $AllCategories= $this->model('ProductModel')->getCategories();
      return $AllCategories;
     }

     public function uploadFile(){
      if(isset($_FILES['file']['name'])){
        $file_name=$_FILES['file']['name'];
      $upload_dir=''.__DIR_ROOT.'/app/public/assets/admin/images/';
      $upload_file=$upload_dir.$file_name;
      move_uploaded_file($_FILES['file']['tmp_name'],$upload_file);
      return  $file_name;
      }
      else{
        return '';
      }

      
    }

    public function searchByName(){
      $string=$_POST["string"];
      $data= $this->model('ProductModel')->search($string)->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($data);
    }


    function getStatusProduct(){
      $result=$this->model('ProductModel')->getStatus();
      $options = str_getcsv($result[0]['value'], ',', "'");
      echo json_encode($options);
  }

  public function enum_values()
{
    $query = $this->model('ProductModel')->getStatus();

    if(!$query->rowCount()) return array();
    preg_match_all('~\'([^\']*)\'~', $query->row('Type'), $matches);

    return $matches[1];
}
  

   
}