<?php
class Auth
{
    public static function authenticate($row)
    {
       $_SESSION["admin"]=$row;
  
    }
    public static function logout()
    {
      if(isset($_SESSION["admin"])){
        unset($_SESSION["admin"]);
      }
      if (isset($_COOKIE['remember'])) {
        unset($_COOKIE['remember']); 
        setcookie('remember', null, -1); 
    }
    }
    public static function logged_in()
    {
      if(isset($_SESSION["admin"]) && $_SESSION["admin"]["position"]==1){
        return true;
      }
      return false;
    }
}