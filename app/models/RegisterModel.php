<?php 
class RegisterModel extends Database
{
    protected $table='customers';
    public function addUser($data){
        
        $this->insert($this->table,$data);
    }
    public function checkEmail($email){
        $sql="select * from $this->table where email ='$email'";
        
        $data=   $this->query($sql);
        return $data;
    }
    public function updatePassword($data,$condition){
        $this->update($this->table,$data,$condition);
    }
    
}
?>