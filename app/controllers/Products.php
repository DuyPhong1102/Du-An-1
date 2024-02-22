<?php
class Products extends Controller
{
    public $data = [];
    public function index()
    {
    }


    public function detail($id = '')
    {
         if(!isset($id)){
            $this->redirect('404page');
         }
        $connectDTB=$this->model('CategoriesModel');

        $arrProduct = $connectDTB->getProduct("where products.id='{$id}'");
        if ($arrProduct->rowCount() !== 1) {
            $this->redirect('404page');
        }
        $arrProduct=$arrProduct->fetchAll(PDO::FETCH_ASSOC);

        if(Auth_user::logged_in()){
            $arrProduct[0]["view"]++;
            $conn=$this->model('ProductModel');
            $data=[
                "view" => $arrProduct[0]["view"]
            ];
            $condition="id =$id";
            $updateView=$conn->updateView($data,$condition);
        }
  
        $arrProductSame = $connectDTB->productSame($arrProduct[0]['cat_id']);
        $dataComment=$this->model("CommentModel")->getComment($id)->fetchAll(PDO::FETCH_ASSOC); 

        $this->data['sub_content']['data_product'] = $arrProduct;
        $this->data['sub_content']['product_same'] = $arrProductSame;
        $this->data['sub_content']['product_id'] = $id;
        $this->data['sub_content']['dataComment'] = $dataComment;

        $this->data['content'] = 'clients/detail';
        $this->render('layouts/client_layout', $this->data);
    }
    public function addCommentProduct(){
     
        $connectDTB=$this->model('CommentModel');
        $content=$_POST["content_comment"];
        $product_id=$_POST["product_id"];
        $customer_id=$_POST["customer_id"];
      
        $data=[
        "content"=>  "'$content'",
        "customer_id"=>  "'$customer_id'",
        "product_id"=>"'$product_id'",
        ];
        $connectDTB->insertComment($data);   
        $dataComment=$this->model("CommentModel")->getComment($product_id)->fetchAll(PDO::FETCH_ASSOC); 
        echo json_encode($dataComment);
    }
    

}
