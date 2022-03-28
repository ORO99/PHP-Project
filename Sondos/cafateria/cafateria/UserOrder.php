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
  <link rel="stylesheet" href="userorder3.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>


<body>
  <?php
  $userID=$_GET["id"];
  $result=selectUserByID($userID);
  while($row = mysqli_fetch_array($result)):
    $Username=$row["name"];
    $Userphoto=$row["photo"];
   ?>


    <?php
  if(isset($_POST["confirm"]))
  {
    $productName;
    $productPrice;
    $productQuntity;
    if(isset($_COOKIE["orderItems"]))
    {
      $productName=$_COOKIE["orderItems"];
    
    }
    
    if(isset($_COOKIE["orderprice"]))
    {

      $productPrice=$_COOKIE["orderprice"];

    }
    if(isset($_COOKIE["orderNumber"]))
    {
     $productQuntity=$_COOKIE["orderNumber"];
     print_r($productQuntity);
  
    }

 
  
  $producrRoom=$_POST["room"];
  $productNote=$_POST["Notes"];
  
  }    
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
    <?php endwhile?>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-12">
        <div class="card" style="width: 18rem;">
        <form action="UserOrder.php?id=<?=$userID?>" method="POST">
          <div class="card-body">
        
            <div id="productContainer">
            <h5 style="text-align:center; color:#4d351d;">Order Items</h5>
            </div>
            
            <div id="notes">
              <label for="">Notes</label>
              <br>
              <textarea name="Notes" id="" cols="30" rows="5"></textarea>
            </div>
            <div>
              <label for="" id="label_room">Room</label>
              <select name="room" id="select_room">
              
                <option value=""> Room 2 </option>
                <option value=""> Room 3 </option>
                <option value=""> Room 4 </option>
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

      
      
      <div class="col-lg-10 col-md-8 col-sm-12">
        <!--  <form action="">
        <input type="text" id="search" placeholder="search">
                <button class="btnSearch" type="submit" name="btn_submit" id="btnSearch">  
                <i class="fas fa-search"></i>                 
                </button>
        </form> -->
        
        <p class="lastorder">Lastes Order</p>
        <div class="order">
          <img src="./images/cola.png" alt="">
          <img src="./images/1.png" alt="">
        </div>
        <hr>
        <div id="allproducttt">
        <?php
            $allproduct=selectallproduct();
            while($row = mysqli_fetch_array($allproduct)):
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

        <?php endwhile;?>
        </div>

      </div>
    </div>


  </div>
  <script src="script.js" defer></script>  
  <script src="script2.js" ></script>

</body>

</html>