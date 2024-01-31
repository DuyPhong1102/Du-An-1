<?php
class OrdersModel extends Database
{
        protected $table="orders";
        public function getOrdersProduct($table,$condition=""){
            $sql="SELECT * FROM $table $condition";
      
            $data=$this->query($sql);
            return $data;
        }
    public function insertOrder($data){
        $this->insert($this->table,$data);
        $last_id=$this->lastInsertId();
        return $last_id;
    }
    public function insert_oder_product($data){
        $this->insert("order_product",$data);
    }
}