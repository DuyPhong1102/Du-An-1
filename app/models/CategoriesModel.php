<?php
class CategoriesModel extends Database
{
    protected $table = 'categories';

    public function getCategories(){
    $data = $this->query("SELECT * FROM $this->table");
    return $data;
    }
  
    public function productSame($cat_id){
      $sql="SELECT products.*,cat_name,brand_name FROM products join categories on products.cat_id=categories.cat_id join brand on  products.brand_id =brand.id where products.cat_id ='$cat_id'";
   
      $data = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }
    public function getAllInfoProduct($condition){
     $sql="SELECT * FROM `products` join brand on (brand_id=brand.id)  join categories on products.cat_id=categories.cat_id where product_status='1' $condition ";
    
   $data= $this->query($sql);
   return $data;
     }
     public function handleString($data){
      $valueStr='';
      foreach ($data as  $value) {
          
        $valueStr .= "'$value'" . ',';
    } 
    $valueStr = rtrim($valueStr, ',');

    return $valueStr;
     }
     public function LimitProduct($limit,$offset)
     {
    
      $sql="SELECT products.*,cat_name,brand_name FROM products join categories on products.cat_id=categories.cat_id join brand on  products.brand_id =brand.id  where product_status='1' limit $limit offset $offset";
       $data = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
       return $data;
     }
     public function getProduct($condition=""){
      $sql="SELECT products.*,cat_name,brand_name FROM products join categories on products.cat_id=categories.cat_id join brand on  products.brand_id =brand.id $condition ";
   
       $data = $this->query($sql);
       return $data;
     }
    public function getBrand(){
      $data = $this->query("SELECT * FROM `brand`")->fetchAll(PDO::FETCH_ASSOC);
          return $data;
      }
    public function insertProduct($data)
    {
      $this->insert($this->table, $data);
    }
}