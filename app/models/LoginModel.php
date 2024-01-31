<?php
class LoginModel extends Database
{
    protected $table= 'admin';
    public function getAllAdmin(){
        $data=$this->query("select * from $this->table join position on admin.position = position.id_position ");
        return $data;
    }

    public function CheckLogin($email,$password){
       
        $row_count= $this->query("SELECT * FROM $this->table WHERE email='$email' and password='$password'");
   
       return $row_count;
    } 
    public function checkPassword($password){
        $sql="SELECT * FROM customers WHERE password='$password'";
        $row_count= $this->query($sql);
       return $row_count;
    }
    public function updateUser($data,$condition){
        $data= $this->update('customers',$data,$condition);
            
    
    }
    public function checkLoginUser($email,$password){
        
        $row_count= $this->query("SELECT * FROM `customers` WHERE email='$email' and password='$password'");
   
       return $row_count;
    }
    
    public function getInfo($email){
        $sql="select * from `$this->table` where email = '{$email}'";
        $row_count= $this->query($sql);
       return $row_count;

    }
    
    public function getInfoUser($id){
        $sql="select id,fullname,email,image,phone_number,gender from `customers` where id = '{$id}'";
        $row_count= $this->query($sql);
       return $row_count;

    }
    
    public function getIdAdmin($table,$token){
        $sql="SELECT id from $table where token ='$token' and token_expires >NOW() ";
        $data=  $this->query($sql);
        return $data;
      
    }
    public function updatePassword($data,$condition){
        $this->update($this->table,$data,$condition);
    }   
    public function deleteById($condition){
        $this->delete('forget_password',$condition);
    }
   
   
}