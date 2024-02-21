<?php 
class Account extends Controller
{
  public function index(){
    $this->login();
    $this->register();

  }
  public function login(){
    if(Auth_user::logged_in()){
        $this->redirect("home");
      }
    if(count($_POST) > 0){
         
        $email=$_POST["email"];
        $password=$_POST["password"];

        $result= $this->model("LoginModel")->CheckLoginUser($email,$password);
        $remember=isset($_POST["remember"])?true:false;
        $token=uniqid('user_',true);  
        if($result->rowCount()==1){
   
           $user=$result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($user  as $row) {
             Auth_user::authenticate($row);
                
            }
            if($remember){
             setcookie('remember', $_SESSION["user"]["id"],time()+60*60*24*30);
             }
            $this->redirect('home');
        }

        if(empty($_POST["email"]) || empty($_POST["password"])  ){
        
         $errors['empty']="Bạn phải nhập đầy đủ các trường";
        }
       else {
     
         $errors['login']="Tên đăng nhập hoặc mật khẩu không chính xác";
        }
    
        }
        $errors=isset($errors) ?$errors : ""; 

    $this->data['sub_content']['errors']= $errors;
    $this->data['content']='clients/login';
    $this->render('layouts/client_layout',$this->data);
  }
  public function register(){
    if(count($_POST) > 0){
        $connDTB=$this->model('RegisterModel');
        $fullname=$_POST["fullname"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $phone_number=$_POST["phone_number"];
        $data=[
        'fullname'=>"'$fullname'",
        'email'=>"'$email'",
        'password'=>"'$password'",
        'phone_number'=>"'$phone_number'",
        ];
        $result= $connDTB->checkEmail($email);
    
        if($result->rowCount()==1){
     
        $this->data['sub_content']['errors']['email']="Email đăng nhập đã tồn tại";
        }else{
            $connDTB->addUser($data);
            $this->data['sub_content']['success']="Đăng ký tài khoản thành công";
        }
       
        }
        $this->data['sub_content']['']="";

        $this->data['content']='clients/register';
        $this->render('layouts/client_layout',$this->data);
      
  }
  public function setting(){
    if(!Auth_user::logged_in()){
      $this->redirect('account/login');
    }
    $info_user=$_SESSION["user"];
    $info_user= $this->update_info();

    $this->data['sub_content']['info_user']=$info_user;
   
    $this->data['content']='clients/setting';
    $this->render('layouts/client_layout',$this->data);

  }
  public function change_password(){
    if(!Auth_user::logged_in()){
      $this->redirect('account/login');
    }
    if(count($_POST)>0){
      $password=$_POST["password"];
      $cf_password=$_POST["confirmPassword"];
      $old_password=$_POST["oldPassword"];
      $row=$this->model('LoginModel')->checkPassword($old_password);

      if($password !== $cf_password ){
        
        $this->data['sub_content']['errors']['password']="Mật khẩu chưa trùng khớp";
        }
        else if($row->rowCount()<1) {
        $this->data['sub_content']['errors']['password']="Mật khẩu không đúng với mật khẩu hiện tại ";
        }
        else{

            $data=[
                "password"=>"'$password'"
            ];
            $id=$_SESSION["user"]["id"];
            $condition="id =$id";
            $connDTB=$this->model('RegisterModel')->updatePassword($data,$condition);

            $this->data['sub_content']['success']="Đổi mật khẩu thành công";
        }
    }

    $this->data['sub_content']['']="";

    $this->data['content']='clients/Change_Password';
    $this->render('layouts/client_layout',$this->data);
  }

  public function HandleForgetPassword(){
    if(isset($_GET["token"])){
        $token=$_GET["token"];
       $result= $this->model("LoginModel")->getIdAdmin('customers',$token);
        
        if($result->rowCount()==1){
            $this->data["sub_content"]['token']=$token;
          $data=  $this->updatePasswordWhenForget();
          $this->data['sub_content']['errors']["not_match"] = $data;
            
        }
        else{
         $this->redirect("account/login");
        }
    }   
    else{
        $this->redirect("account/login");
    }
   

    $this->data['content']='clients/HandleForgetPassword';
    $this->render('layouts/client_layout',$this->data);


   }
   public function updatePasswordWhenForget(){
    if(count($_POST)>0){
        $password=$_POST["password"];
        $confirmPassword=$_POST["confirmPassword"];
        if($password !== $confirmPassword ){
          return "Mật khẩu chưa trùng khớp";
          }
          else{
            $token=$_POST["token"];
            $data=[
                'password' =>"'{$password}'",
            ];
            $this->model("CustomersModel")->updatePassword($data,"token ='${token}'");
            $this->model("CustomersModel")->updatePassword(["token" =>"NULL"],"token ='${token}'");
            $this->redirect("account/login");
          }
       
    }
   }

 
   public function forget_password(){
    if(count($_POST) > 0){
      if(empty($_POST['email'])){
        $this->data['sub_content']['error'] = 'Không được để trống trường này';
      }
   
      $email = $_POST['email'];
      $conn=$this->model("RegisterModel");
      $result=$conn->checkEmail($email);
      if($result->rowCount()==1){
        $each=$result->fetch(PDO::FETCH_ASSOC);
     
        $id=$each["id"];
        $username=$each["fullname"];
        // $this->model("LoginModel")->deleteById("admin_id={$id}");
        $token=uniqid();
     
        $data=[
            'token'=>"'{$token}'",
            'token_expires'=>'DATE_ADD(NOW(), INTERVAL 5 MINUTE)'
        ];
       $result= $this->model("LoginModel")->update("customers",$data,"id='$id'");
        //  $this->model("LoginModel")->insert("customers",$data);

       $link=_WEB_ROOT.'/Account/HandleForgetPassword?token='.$token.'';    
      
      $title='Change new password';
       $content=" 
       Hi {$username},
       We received a request to reset your  password.
       Click here to reset password: <html>
       <a href='{$link}'>Reset Password</a>
       </html>";
        sendMail($email,$username,$title,$content)   ;
        $this->data['sub_content']['success']['checkEmail']='Vui lòng kiểm tra email của bạn';
      }
      
    
    $email=$_POST["email"];
    $this->data['sub_content']['error'] = 'Không tồn tại email này';
 
    }
    $this->data['sub_content']['']="";

    $this->data['content']='clients/Forget_password';
    $this->render('layouts/client_layout',$this->data);
  }



  public function update_info(){
    $connDTB=$this->model('LoginModel');
    $id=$_SESSION["user"]["id"];
    if(isset($_POST["update_info_user"])){
      $fullname=$_POST["fullname"];
      $gender=$_POST["gender"];  
      $id=$_POST["id_user"];
      $image=$this->upload_Avatar_User() ?? $_SESSION["user"]["image"] ;
      $data=[
        'fullname' => "'{$fullname}'",
        'gender' => "'{$gender}'",
        'image' => "'{$image}'",
      ];
    
      $condition="id={$id}";
     $info_user= $connDTB->updateUser($data,$condition);
    echo json_encode($image);
    
    }
    if(isset($_POST["email"])){
      $email=$_POST["email"];
    
      $data=[
        'email' => "'$email'",
     
      ];
      $condition="id={$id}";
      $connDTB->updateUser($data,$condition);

    }
    if(isset($_POST["phone_number"])){
      $phone_number=$_POST["phone_number"];
  
      $data=[
        'phone_number' => "'$phone_number'",
      ];
      $condition="id={$id}";
      $connDTB->updateUser($data,$condition);

    }
    
    $result=$connDTB->getInfoUser($id)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
      Auth_user::authenticate($row);
    }
    
    return $_SESSION["user"];
  }
  public function upload_Avatar_User(){
    if(isset($_FILES['file']['name'])){
 
     $file_name=$_FILES['file']['name'];
   
     $upload_dir=''.__DIR_ROOT.'/app/public/assets/clients/images/';
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
   
   }
   
  public function logout() {
    Auth_user::logout();
 	$this->redirect('account/login');
  }
}
?>