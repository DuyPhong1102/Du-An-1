<?php
class DataComment extends Controller
{
    public $data=[];

    public function index(){
      if(!Auth::logged_in()){
        $this->redirect("admin/account/login");
      }
      
      $connectDTB=$this->model('CommentModel');
      $dataComment=$connectDTB->getAllComments()->fetchAll(PDO::FETCH_ASSOC);
     
      $this->data['sub_content']['dataComment']=$dataComment;
  
      
      $this->data['content']='admin/DataComment';

      $this->render('layouts/admin_layout',$this->data);
     
    }
    public function detailComment($id=""){
      if(!Auth::logged_in()){
        $this->redirect("admin/account/login");
      }
      $connectDTB=$this->model('CommentModel');
      $dataComment=$connectDTB->getComment($id)->fetchAll(PDO::FETCH_ASSOC);
    
      $this->data['sub_content']['dataComment']=$dataComment;
      $this->data['content']='admin/DetailComment';
      $this->render('layouts/admin_layout',$this->data);

    }
   


}