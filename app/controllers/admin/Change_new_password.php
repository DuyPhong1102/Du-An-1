<?php
class Change_new_password extends Controller
{
    public $data=[];
   public function index(){
    if(isset($_GET["token"])){
        $token=$_GET["token"];
      
        $result= $this->model("LoginModel")->getIdAdmin('admin',$token);
        
    
        if($result->rowCount()==1){
            $this->data['token']=$token;
           

            $this->updatePasswordWhenForget();
            
        }
        else{
         $this->redirect("admin/account/login");
        }
    }   
    else{
        $this->redirect("admin/account/login");
    }
    $this->render("admin/Change_new_password",$this->data);
   }
   public function updatePasswordWhenForget(){
    if(count($_POST)>0){
        $password=$_POST["password"];
       

        $token=$_POST["token"];
        $data=[
            'password' =>"'{$password}'",
        ];
        $this->model("LoginModel")->updatePassword($data,"token ='${token}'");
        $this->model("LoginModel")->updatePassword(["token" =>"NULL"],"token ='${token}'");
     $this->redirect("admin/account/login");
    }
   }

}