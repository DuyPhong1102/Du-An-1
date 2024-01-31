<?php
class handleCategories extends Controller
{
    public function index(){
    }
    public function add(){
        $cat_name=$_POST["cat_name"];

        $dataPost=[
            'cat_name'=>"'$cat_name'"
        ];
        $CategoriesModel=$this->model('CategoriesModel');
        // $data=$this->model('CategoriesModel')->getCategories()->fetchAll(PDO::FETCH_ASSOC);
        // $temp=0;
        // foreach ($data as $item) {
        //     if(strcasecmp($cat_name ,$item["cat_name"]) ==0 ){

        //     }
        // }
        $CategoriesModel->insertProduct($dataPost);
        $this->get();

    }

    public function get(){
        $data=$this->model('CategoriesModel')->getCategories()->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }

   
}



