<?php

define('db_host','localhost');
define('db_user','root');
define('db_pass','');
define('db_name','cafeteria');

function Selectcategory()
 {
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query="SELECT `category_name` FROM `product_category`";
    $query_res= mysqli_query($con,$sql_query);
    return $query_res;
  }
  function insertnewproduct($product_name,$product_price,$product_category,$product_image){
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query2= "INSERT INTO `products`( `ProductName`, `ProductPrice`, `ProductCategory`,`ProductPicture`)VALUES ('$product_name','$product_price','$product_category','$product_image')";
    $sql_query=mysqli_query($con,$sql_query2);
  }
  function insertcategory($category_name){
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query2= "INSERT INTO `product_category`(`category_name`) VALUES ('$category_name')";
    $sql_query=mysqli_query($con,$sql_query2);
  }
  function selectallproduct(){
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query2= "SELECT `ProductID`, `ProductName`, `ProductPrice`, `ProductPicture` FROM `products`";
    $sql_query=mysqli_query($con,$sql_query2);
    return $sql_query;
  }
  function Selectuser($email)
 {
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query="SELECT `id` FROM `users` WHERE `email`='$email'";
    $query_res= mysqli_query($con,$sql_query);
    return $query_res;
  }
  function selectUserByID($id)
  {
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query="SELECT  `name`, `photo` FROM `users` WHERE `id`='$id'";
    $query_res= mysqli_query($con,$sql_query);
    return $query_res;
  }
  function InsertUserOrder($orderName,$Quantity,$Notes,$room,$userId,$productTotalprice)
  {
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query2="INSERT INTO `orders`(`orderName`, `quantity`, `notes`, `room`, `userID`, `productTotalPrice`) VALUES ('$orderName','$Quantity','$Notes','$room','$userId','$productTotalprice')";
    $sql_query=mysqli_query($con,$sql_query2);
  }
  function selectAllUsers()
  {
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query="SELECT  `name` FROM `users`";
    $query_res= mysqli_query($con,$sql_query);
    return $query_res;
  }
  function selectProductIdByName($name)
  {
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query="SELECT  `ProductID` FROM `products` WHERE `ProductName` ='$name'";
    $query_res= mysqli_query($con,$sql_query);
    return $query_res;
  }
  function getLastOrderId()
  {
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query="SELECT MAX(orderID) FROM `orders` ";
    $query_res= mysqli_query($con,$sql_query);
    return $query_res;
  }
  function insertIntoProductOrder($productId,$orderId,$quantity)
  {
    $con=mysqli_connect(db_host,db_user,db_pass,db_name);
    $sql_query="INSERT INTO `productorder`(`product_Id`, `order_Id`, `quantity`) VALUES ('$productId','$orderId','$quantity')";
    $query_res= mysqli_query($con,$sql_query);
    return $query_res;
  }
  // function getLatestOrder($uid)
  // {
  //   $con=mysqli_connect(db_host,db_user,db_pass,db_name);
  //   $sql_query="SELECT  FROM `orders` WHERE ";
  //   $query_res= mysqli_query($con,$sql_query);
  //   return $query_res;
  // }

?>