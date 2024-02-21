<?php
class Checkouts extends Controller
{   
    public function index(){
        if(!Auth_user::logged_in()){
            
         }
        $connectDTB=$this->model('AddressModel');
        $dataProvinces=$connectDTB->getProvinces()->fetchAll(PDO::FETCH_ASSOC);
        $this->data['sub_content']['dataProvinces']= $dataProvinces;
        $this->data['content']='clients/Checkouts';
        $this->render('layouts/client_layout',$this->data);
    }
    public function dataDistricts(){
        $province_code =$_POST["id"];
        $connectDTB=$this->model('AddressModel');
        $dataProvinces=$connectDTB->getDistricts("where province_code=$province_code")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($dataProvinces);
    }

    public function dataWards(){
        $code =$_POST["code"];
        $connectDTB=$this->model('AddressModel');
        $dataProvinces=$connectDTB->getWards("where district_code=$code")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($dataProvinces);
    }
    public function success(){
        if(isset($_POST["submit"])){
            $cart=$_SESSION["cart"];
            $customer_id=$_POST["customer_id"];
            $name_receiver=$_POST["name"];
            $phone_receiver=$_POST["phone"];
            $email_receiver=$_POST["email"];
            $provinces=$_POST["provinces"];
            $provinces=$this->model("AddressModel")->get_address("provinces","code =$provinces");
            $provinces=$provinces["full_name"];
            $districts=$_POST["districts"];
            $districts=$this->model("AddressModel")->get_address("districts","code =$districts");
            $districts=$districts["full_name"];
            $wards=$_POST["wards"];
            $wards=$this->model("AddressModel")->get_address("wards","code =$wards");
            $wards=$wards["full_name"];
            $street=$_POST["street"];
            $status=0;
            $address_receiver="$street,$wards,$districts,$provinces";
            $total_price=$_POST["total_price"];
            $data=[
                "customer_id"=>"'$customer_id'",
                "name_receiver"=>"'$name_receiver'",
                "phone_receiver"=>"'$phone_receiver'",
                "email_receiver"=>"'$email_receiver'",
                "address_receiver"=>"'$address_receiver'",
                "status"=>"'$status'",
                "total_price"=>"'$total_price'"
            ];
            $lastId=  $this->model("OrdersModel")->insertOrder($data);
        
            foreach ($cart as $product_id =>$each) {
                $quantity=$each['quantity'];
                $data=[
                    "order_id"=>"$lastId",
                    "product_id"=>"$product_id",
                    "quantity"=>"$quantity",
                ];
                $this->model("OrdersModel")->insert_oder_product($data);
            }
            $info_user=$this->model("OrdersModel")->getOrdersProduct("orders","where id =$lastId")->fetchAll(PDO::FETCH_ASSOC);
            $this->data['sub_content']["info_user"]=$info_user;
            $order_data=$this->model("OrdersModel")->getOrdersProduct("order_product"," join products on order_product.product_id = products.id  where order_id =$lastId")->fetchAll(PDO::FETCH_ASSOC);
            $this->data['sub_content']["order_data"]=$order_data;
            $this->data['content']='clients/Success';
            $this->render('layouts/client_layout',$this->data);
           
        }
      

        
    }
}