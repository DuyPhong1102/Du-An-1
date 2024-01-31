<?php
class PositionModel extends Database
{
    protected $table="position";
    public function getPosition(){
        $data=$this->query("SELECT * from $this->table");
        return $data;
    }
    public function addPosition($data){
        $this->insert($this->table,$data);
    }
}