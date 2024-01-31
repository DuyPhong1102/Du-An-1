<?php
class StaffModel extends Database
{   
    protected $table="admin";
    public function getStaff($condition){
     $data=   $this->query("SELECT * from $this->table $condition");
     return $data;
    }
    public function addStaff($data){
        $this->insert($this->table,$data);
    }
    public function deleteStaff($condition){
        $this->delete($this->table,$condition);
    }
    public function updateStaff($data,$condition){
        $this->update($this->table,$data,$condition);

    }
}