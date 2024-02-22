<?php
class Cart extends Controller
{   
    public $data=[];
    public function index(){
      
        
        $this->data['sub_content']['cart']=   $this->items();
        $this->data['content']='clients/Cart';
        $this->render('layouts/client_layout',$this->data);
    }

    public function items(){
        $id_user=isset($_SESSION["user"]) ? $_SESSION["user"]["id"] : "" ;
        if(isset($_POST["add_product"])){
            
           $product_id=$_POST["product_id"];    

           $quantity=$_POST["quantity"];    
           $connectDTB=$this->model("ProductModel");
           $dataProduct=$connectDTB->searchProductById($product_id);
       
            if(empty($_SESSION["cart"][$product_id])){
             
                     $_SESSION["cart"][$product_id]["id"]=$dataProduct[0]["id"];
                    $_SESSION["cart"][$product_id]["name"]=$dataProduct[0]["name"];
                    $_SESSION["cart"][$product_id]['price']=$dataProduct[0]["price"];
                    $_SESSION["cart"][$product_id]['image']=$dataProduct[0]["image"];
                    $_SESSION["cart"][$product_id]['quantity']=$quantity;
            }else{
                
                $_SESSION["cart"][$product_id]['quantity']+= $quantity;
            }
            

        
    
        }
        


        $this->handleCart();
       
        if(isset($_SESSION["cart"])){
            return $_SESSION["cart"];
        }
    }

    public function handleCart(){
        $action=isset($_POST["action"]) ? $_POST["action"] : "";
        $product_id=isset($_POST["product_id"]) ? (int)$_POST["product_id"] : "" ;
        
        if($action=='minus'){

            $quantity= $_POST["quantity"] ;
            $_SESSION["cart"][$product_id]['quantity']=$quantity;
        }
        else if($action=='increase'){      
          $quantity= $_POST["quantity"];
            $_SESSION["cart"][$product_id]['quantity']=$quantity;
          
        }
        else if($action=="delete"){
         unset($_SESSION["cart"][$product_id]);
            }
             
        }
    }

