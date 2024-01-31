<?php
class CommentModel extends Database
{   
    protected $table = 'comment';

   public function insertComment($data){
    $this->insert($this->table, $data);
   }
   public function getAllComments(){
    $sql="select * from $this->table  GROUP BY `product_id` order by  `product_id` desc";
   
   $data= $this->query($sql);
   return $data;
   }
   public function getComment($id){
    $sql="select * from $this->table join customers on customers.id=comment.customer_id   where product_id=$id  ORDER BY comment_id desc;";
  
   $data= $this->query($sql);
   return $data;

   }
}