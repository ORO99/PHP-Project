<?php
  
  
 if(!empty($_GET["index"])){
    $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
    $user = 'kelany';
    $password = 'root';
  
    try {
        $db = new PDO($dsn, $user, $password);
        $query="DELETE FROM products WHERE (id = :product_Id)";
        $stmt=$db->prepare($query);
        
        $stmt->execute(["product_Id"=>$_GET["index"]]);
        $stmt->closeCursor();
        $db=null;
  
      } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
      }
     header("location: home.php");
 }else{
     header("location: home.php");
     exit;
 }
