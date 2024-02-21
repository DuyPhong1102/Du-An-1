<?php
class DataStaff extends Controller
{
    public $data=[];

    public function index(){
   
      
      if(!Auth::logged_in()){
        $this->redirect("admin/account/login");
      }
      $deleteStaff=$this->deleteStaff();
   
      $getData=$this->model('LoginModel');
      $allStaff=  $getData->getAllAdmin();
      $this->data['sub_content']['allStaff']=$allStaff;
      $this->data['sub_content']['error']=$deleteStaff;
    
      $this->data['content']='admin/DataStaff';

      $this->render('layouts/admin_layout',$this->data);
     
    }
    
    public function addStaff(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
          $name=$_POST["name"];
          $email=$_POST["email"];
          $phone_number=$_POST["phone_number"];
          $position=$_POST["position"];
          $image =  $this->uploadFile();
   
         
          $data=[
            "username"=>"'$name'",
            "email"=>"'$email'",
            "phone_number"=>"'$phone_number'",
            "position"=>"'$position'",
           "image"=>"'$image'"
          ];
          $conn=$this->model('StaffModel');
          $conn->addStaff($data);
          return ;
      }


      $getData=$this->model('PositionModel');
      $allPosition=  $getData->getPosition();
      $this->data['sub_content']['allPosition']=$allPosition;
      
      $this->data['content']='admin/AddStaff';

      $this->render('layouts/admin_layout',$this->data);
    }
    public function updateStaff($id=""){
      if(empty($id)){
        $this->redirect("404page");
      }
      $conn=$this->model('StaffModel');
      $getStaffById=$conn->getStaff("where id =$id")->fetch(PDO::FETCH_ASSOC);  
     
      $getData=$this->model('PositionModel');
      $allPosition=  $getData->getPosition();
      if(count($_POST)>0){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone_number=$_POST["phone_number"];
        $position=$_POST["position"];
        $image=!empty($_POST["image"]) ?  $this->uploadFile(): $getStaffById["image"];
        $data=[
          "username"=>"'$name'",
          "email"=>"'$email'",
          "phone_number"=>"'$phone_number'",
          "position"=>"'$position'",
         "image"=>"'$image'"
        ];
        $condition="id =$id";
  $updateStaff=$conn->updateStaff($data,$condition);
      }


      
      $this->data['sub_content']['dataStaffById']=$getStaffById;
      $this->data['sub_content']['allPosition']=$allPosition;
      $this->data['content']='admin/updateStaff';

      $this->render('layouts/admin_layout',$this->data);
    }
    public function deleteStaff(){
      if(count($_POST)>0){
        $id=$_POST["id"];
      $position=(int) $_POST["id_position"];
      if($position!==1){
       $conn=$this->model("StaffModel")->deleteStaff("id =$id");
      }   
      else{
       return "Không được xóa người có cùng cấp bậc";
      }
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
  
  
    public function addPosition(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $position=$_POST["position"];
        $data=[
          "name_position"=>"'$position'"
        ];
       $conn=$this->model("PositionModel")->addPosition($data);
      }
      $this->data['content']='admin/AddPosition';
      $this->data['sub_content']['allPosition']="";

      $this->render('layouts/admin_layout',$this->data);
    }


}