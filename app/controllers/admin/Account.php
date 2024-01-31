<?php
class Account extends Controller
{
    public $data=[];
    
	function index()
	{
        
	}

    public function login(){
        if(Auth::logged_in()){
            $this->redirect("admin/home");
        }

        if(count($_POST) > 0){
         
            $email=$_POST["email"];
            $password=$_POST["password"];
  
            $result= $this->model("LoginModel")->CheckLogin($email,$password);
            $remember=isset($_POST["remember"])?true:false;
            $token=uniqid('user_',true);  
            if($result->rowCount()==1){
       
               $user=$result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($user as $row) {
                 Auth::authenticate($row);
               
                }
                if($remember){
                 setcookie('remember', $_SESSION["user"]["id"],time()+60*60*24*30);
                 }
                $this->redirect('admin/home');
            }
 
            if(empty($_POST["email"]) || empty($_POST["password"])  ){
             
             $this->data['errors']['empty']="Bạn phải nhập đầy đủ các trường";
            }
           else {
             $this->data['errors']['login']="Tên đăng nhập hoặc mật khẩu không chính xác";
            }
         
 
            }
           $this->render('admin/login',$this->data);


    }
    
    public function ForgetPassword(){
        if(count($_POST) > 0){

            if(empty($_POST['email'])){
                $this->data['errors']['empty'] = 'Không được để trống trường này';
            }
           
            $email=$_POST["email"];
         
            
          
            $result= $this->model("LoginModel")->getInfo($email);
          
            if($result->rowCount()==1){
            
              $each=$result->fetch(PDO::FETCH_ASSOC);
              $id=$each["id"];
              $username=$each["username"];
              $this->model("LoginModel")->deleteById("id={$id}");
                $token=uniqid();
                $table='`forget_password`';
                $data=[
                    'id'=>"'{$id}'",
                    'token'=>"'{$token}'",
                    'token_expires'=>'DATE_ADD(NOW(), INTERVAL 5 MINUTE)'
                ];
             
    
                $result= $this->model("LoginModel")->update("admin",$data,"id='$id'");
               $link=_WEB_ROOT.'/admin/Change_new_password?token='.$token.'';    
              
              $title='Change new password';
               $content=" 
               Hi {$username},
               We received a request to reset your  password.
               Click here to reset password: <html>
               <a href='{$link}'>Reset Password</a>
               </html>";
                sendMail($email,$username,$title,$content)   ;
                $this->data['success']['checkEmail']='Vui lòng kiểm tra email của bạn';
            
            }
            else{
                $this->data['errors']['notExist'] = 'Không tồn tại email này';

            }
            }
            $this->render('/admin/ForgetPassword',$this->data);
    }
	public function logout()
	{
		
		Auth::logout();
 		$this->redirect('admin/account/login');
	}
    
}
