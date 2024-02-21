<?php
class DataCustomers extends Controller
{
    public $data=[];

    public function index(){
      if(!Auth::logged_in()){
        $this->redirect("admin/account/login");
      }
      
      $connectDTB=$this->model('CustomersModel');
      $dataCustomers=$connectDTB->DataCustomers()->fetchAll(PDO::FETCH_ASSOC);
     
      $this->data['sub_content']['dataCustomers']=$dataCustomers;
      
      $this->data['content']='admin/DataCustomers';

      $this->render('layouts/admin_layout',$this->data);
     
    }

   


}