<?php
class CustomersModel extends Database{
    protected $table = 'customers';
    public function DataCustomers(){
        $data=$this->query("select * from $this->table");
        return $data;
    }
    public function updatePassword($data,$condition){
        $this->update($this->table,$data,$condition);
    }   
}
