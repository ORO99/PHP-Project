<?php require('productdatabase.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="userOrder3.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>


<body>
  <?php

    $Username="Admin";
    $Userphoto="admin.png";
   ?>


    <?php
  if(isset($_POST["confirm"]))
  {
    $productName;
    $singleProductName;
    $productPrice;
    $productQuntity;
    $singleProductQuntity;
    $singleProductPrice;


    if(isset($_COOKIE["orderItems"]))
    {
      $productName=$_COOKIE["orderItems"];
      $products = explode(",",$productName);
      $productArr=[];
      $productArr2=[];
      for ($i=0; $i <count($products) ; $i++) { 
          $productArr=selectProductIdByName($products[$i]);
        if(  $row = mysqli_fetch_array($productArr)){
             $productID=$row["ProductID"];
             $productArr2[$i]=$productID;
             
         
         
        }
    }
   
  }
    
    if(isset($_COOKIE["orderprice"]))
    {

      $productPrice=$_COOKIE["orderprice"];
     $productPrice=explode(",",$productPrice);



    }
    if(isset($_COOKIE["orderNumber"]))
    {
     $productQuntity=$_COOKIE["orderNumber"];
     $productQuntity=explode(",",$productQuntity);
  
    }

    if(isset($_COOKIE["userId"]))
    {
    $userId =$_COOKIE["userId"];
    }

 

  $singleProductName=$products[0];
  $singleProductQuntity=$productQuntity[0];
  $singleProductPrice=$productPrice[0];
  $producrRoom=$_POST["room"];
  $productNote=$_POST["Notes"];

  InsertUserOrder($singleProductName,$singleProductQuntity,$productNote,$producrRoom,$userId,$singleProductPrice);
  $output = getLastOrderId();
  while($row = mysqli_fetch_array($output)){
    
    $orderId=($row["MAX(orderID)"] );
  }
  for ($index=0; $index <count($productQuntity) ; $index++) { 
    insertIntoProductOrder($productArr2[$index],$orderId,$productQuntity[$index]);
  }}
   
    ?>
  <nav>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fa-solid fa-plus-minus"></i>
    </label>

    <ul>
      <li><a href="">Home </a></li>
      <li><a href="">My Orders </a></li>
    </ul>
    <div class="nav_img"> <img src="./images/<?=$Userphoto?>" alt="">
      <h3>
        <?=$Username?>
      </h3>
    </div>
   
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="card" style="width: 18rem;">
        <form action="UserOrderAdmin.php" method="POST">
          <div class="card-body">
        
            <div id="productContainer">
            <h5 style="text-align:center;color:#7b5520;">Order Items</h5>
            </div>
            
            <div id="notes">
              <label for="">Notes</label>
              <br>
              <textarea name="Notes" id="" cols="30" rows="5"></textarea>
            </div>
            <div>
              <label for="" id="label_room">Room</label>
              <select name="room" id="select_room">
              
                <option value="room 1"> Room 1 </option>
                <option value="room 2"> Room 2 </option>
                <option value="room 3"> Room 3 </option>
                <option value="room 4"> Room 4 </option>
              </select>
              <hr>
              <div id="totalSum">
                <span>EGP</span>
                <span id="totalAmount"></span>
              </div>
            </div>
                    

            <br>
            <input type="submit" value="confirm" class="btn" name="confirm" id="confirmBtn">

          </div>
          </form>
        </div>

      </div>

      <div id="parentUser">
        <select name="user" id="user">
        <?php
  $allUsers=selectAllUsers();
  while($row = mysqli_fetch_array($allUsers)){
    $User=$row["name"];
    $id=$row["id"];
    ?>

    <option class="userOption" class="userOption" value="<?=$id?>"><?=$User ?></option>
  <?php
  }
  ?>

      </select>
      </div>
      <div class="col-lg-10 col-md-8 col-sm-12">
        <!-- <input type="text" id="search" placeholder="search"> -->
        <p class="addToUser">Add to user : </p>
        <div class="order">
          <!-- <img src="./images/cola.png" alt=""> -->
          <!-- <img src="./images/1.png" alt=""> -->
        </div>
        <hr>
        <div id="allproducttt">
        <?php
    
            $allproduct=selectallproduct();
            while($row = mysqli_fetch_array($allproduct)):
           
               $productID= $row["ProductID"];
               $productname=$row["ProductName"];
               $productprice=$row["ProductPrice"];
               $productimage=$row["ProductPicture"];
          
                 ?>
                 <div  class="all"  >
                    <img src="./images/<?=$productimage?>" class="allproduct" >
                    <br>
                    <span class="productname" id="productname">
                      <?=$productname?>
                    </span>
                    <span class="allproductprice">
                      <?=$productprice?>
                    </span>
                    <span class="EGPP">EGP</span>
                  </div>
                 
                <?php  endwhile;?>
        </div>

      </div>
    </div>


  </div>
  <!-- <script src="script.js" defer></script>   -->
  <!-- <script src="script2.js" ></script> -->
  <!-- <script src="script3.js" defer ></script> -->
  <script src="script4.js" defer ></script>

</body>

</html>