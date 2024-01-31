<?php
class ProductModel extends Database
{
  protected $table = 'products';

  public function getProducts()
  {
    $data = $this->query("SELECT * FROM $this->table");
    return $data;
  }
  public function updateView($data,$condition){
    $this->update($this->table, $data, $condition);
  }
  public function getTopView(){
    $data=$this->query("SELECT * FROM $this->table ORDER BY `view` DESC limit 10");
    return $data;

  }
  public function getProductsByIdCate($condition){
    $sql="SELECT * FROM $this->table where cat_id=$condition limit 8";
    $data = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $data;
    }
  public function getCategories()
  {
    $data = $this->query("SELECT * FROM `categories`")->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function insertProduct($table,$data)
  {
    $this->insert($table, $data);
   
  }
  public function dataProduct()
  {
    $data = $this->query("SELECT products.*,cat_name,brand_name FROM products join categories on products.cat_id=categories.cat_id join brand on  products.brand_id =brand.id")->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function deleteMultipleProductById($data)
  {
    $this->deleteMultipleById($this->table, $data);
  }
  public function deleteOneItem($condition)
  {
    $this->delete($this->table, $condition);
  }

  public function editProduct($data, $condition)
  {
    $this->update($this->table, $data, $condition);
  }
  // public function selectLimit($limit)
  // {
  //   $data = $this->query("SELECT $this->table.*,cat_name FROM products join categories on products.cat_id=categories.cat_id limit {$limit}")->fetchAll(PDO::FETCH_ASSOC);
  //   return  $data;
  // }
  public function search($string){
    $sql="SELECT $this->table.*,cat_name FROM products join categories on products.cat_id=categories.cat_id where products.name LIKE '%$string%'";
    $data=$this->query($sql);
    return $data;
  }
  public function searchProductById($id){
    $sql="SELECT products.id,name,price,image FROM products join categories on products.cat_id=categories.cat_id join brand on  products.brand_id =brand.id where products.id =$id ";
   
    $data = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }



  public function getBrand(){
    $data = $this->query("SELECT * FROM `brand`")->fetchAll(PDO::FETCH_ASSOC);
    return  $data;

  }
  public function getStatus(){
    $sql="SELECT SUBSTRING(COLUMN_TYPE, 6, LENGTH(COLUMN_TYPE) - 6) AS value FROM  information_schema.COLUMNS WHERE TABLE_NAME = '$this->table' AND COLUMN_NAME = 'product_status'";
    $data = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return  $data;
  }
}
