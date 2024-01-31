<?php
class handleBrand extends Controller
{
    public function index(){

    }
    public function add(){
        $brand_name=$_POST["brand_name"];
        $dataPost=[
            'brand_name'=>"'{$brand_name}'"
        ];
        $ProductModel=$this->model('ProductModel');
        $ProductModel->insertProduct('brand',$dataPost);
        $this->get();

    }
    function get(){
        $data=$this->model('ProductModel')->getBrand();
        echo json_encode($data);
    }
}



