<?php

class Home extends Controller{
    public $data=[];
    public function index(){
        $connectDTB=$this->model("CategoriesModel");
        $dataCate=$connectDTB->getCategories()->fetchAll(PDO::FETCH_ASSOC);
        $dataTopView= $this->TopView();
        $this->data['sub_content']['dataTopView']=$dataTopView;
        $this->data['sub_content']['dataCate']=$dataCate;
        $this->data['content']='clients/Home';
        $this->render('layouts/client_layout',$this->data);
    }
    
    public function cateById(){
        $connectDTB=$this->model("ProductModel");
        $cat_id=$_POST["cat_id"];
        $dataCate=$connectDTB->getProductsByIdCate($cat_id);
        echo json_encode($dataCate);
    }
    public function TopView(){
       $data= $this->model("ProductModel")->getTopView()->fetchAll(PDO::FETCH_ASSOC);
       return $data;
    } 
   
}