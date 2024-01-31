<?php
class AddressModel extends Database
{

    public function getProvinces($condition=""){
        $dataProvinces=$this->query("SELECT * FROM provinces $condition");
        return  $dataProvinces;
    }   
    public function getDistricts($condition=""){
        $dataDistricts=$this->query("SELECT * FROM districts $condition");
        return  $dataDistricts;
    }   
    public function getWards($condition=""){
        $sql="SELECT * FROM wards $condition";
        $dataWards=$this->query($sql);
        return  $dataWards;
    }   

    public function get_address($table,$condition){
        $sql="SELECT full_name FROM $table where $condition";
        $dataAddress=$this->query($sql)->fetch(PDO::FETCH_ASSOC);
        return  $dataAddress;
    }

}