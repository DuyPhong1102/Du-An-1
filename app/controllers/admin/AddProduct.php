<?php
class AddProduct extends Controller
{
    public $data=[];

    public function index(){
      if(!Auth::logged_in()){
        $this->redirect("admin/account/login");
      }
      $this->renderData();

      
    }
    public function renderData(){
     
      $this->data['sub_content']['DataCategories']=$this->renderCategories();
      $this->data['content']='admin/AddProduct';

      $this->render('layouts/admin_layout',$this->data);
    } 
    public function renderCategories(){
   $dataCategories= $this->model('ProductModel')->getCategories();
    return $dataCategories;
    }
    

    public function store() {
     
        
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
      $name=$_POST["name"];
      $price=$_POST["price"];
      $image=$this->uploadFile();
      $desc=$_POST["desc"];
      $cate_id=$_POST["cat_id"];
      $brand=$_POST["brand_id"];
      $product_status=$_POST["product_status"];

      $data=[
        'name'=>"'{$name}'",
        'price'=>"'{$price}'",
        'image'=>"'{$image}'",
        'description'=>"'{$desc}'",
        'cat_id '=>"'{$cate_id}'",
        'brand_id '=>"'{$brand}'",
        'product_status '=>"'{$product_status}'",

      ];
   
      $InsertProduct=$this->model('ProductModel')->insertProduct('products',$data);

     }
     else{
      $this->redirect("admin/home");
     }
    }
    public function uploadFile(){
     if(isset($_FILES['file']['name'])){
      $file_name=$_FILES['file']['name'];
      $upload_dir=''.__DIR_ROOT.'/app/public/assets/admin/images/';
      $upload_file=$upload_dir.$file_name;
      $type=pathinfo($file_name,PATHINFO_EXTENSION);
      // $type_allow=array('png', 'jpg', 'jpeg','gif');

      if(file_exists($upload_file)){
        $name=pathinfo($file_name,PATHINFO_FILENAME);
        $new_name=$name.'-Coppy.';
        $upload_new=$upload_dir.$new_name.$type;
        $k=1;
        while (file_exists($upload_new)){
            $k++;
        $new_name=$name."-Coppy.({$k}).";
        $upload_new=$upload_dir.$new_name.$type;
        }
        $upload_file=$upload_new;
        $file_name=$new_name.$type;
    }
   
    move_uploaded_file($_FILES['file']['tmp_name'],$upload_file);

      return  $file_name;
     }
     else{
     $this->redirect("admin/home");
    }
    }
 
    

   
}
