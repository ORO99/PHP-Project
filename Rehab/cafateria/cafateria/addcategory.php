<?php require('productdatabase.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="AddProduct.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fa fa-align-justify" id="btn1"></i>
      <i class="fa fa-times" id="btn2"></i>
    </label>

    <ul>
      <li><a href="">Home </a></li>
      <li><a href="">Products </a></li>
      <li><a href="">Users</a></li>
      <li><a href="">Manual Orders</a></li>
      <li><a href="">Checks</a></li>
    </ul>
    <div class="nav_img"> <img src="Coffe.png" alt="">
      <h3>Admin</h3>
    </div>
  </nav>
  <?php
  if(isset($_POST["add"]))
   {
       $category_name=$_POST["category"];
       insertcategory($category_name);
   }
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-sm-12  col-lg-6">
        <h1 class="form_header">Add Category</h1>
        <form action="addcategory.php" method="POST" >
          <div class="input_group">
            <label for="category">add category</label>
            <input type="text" name="category">
          </div><!-- first -->
            <input type="submit" value="add" id="save" name="add">
            
        </form>
      </div>
      <div class=" col-sm-12 col-md-6 col-lg-6">
        <img src="2cup.png" alt="" class="background_img">
      </div>
    </div>
  </div>




   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>