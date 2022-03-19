<?php require('productdatabase.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafeteria</title>
  <!-- Bootstrap Core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="AddProduct.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body>
<?php
if(isset($_POST["save"]))
{
$product_name=$_POST["product"];
$product_price=$_POST["price"];
$product_category=$_POST["category"];
$product_image=$_FILES['product_image']['name'];
$product_image_tmp=$_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_tmp,"./images/$product_image");
insertnewproduct($product_name,$product_price,$product_category,$product_image);
}
?>

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
    <div class="nav_img"> <img src="./images/coffe.jpg" alt="">
      <h3>Admin</h3>
    </div>

  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12  col-lg-12">
        <h1 class="form_header">Add Products</h1>
        <form action="addproduct.php" method="POST" enctype="multipart/form-data">
          <div class="input_group">
            <label for="product">Product</label>
            <input type="text" name="product">
          </div><!-- first -->
          <div class="input_group">
            <label>Price</label>
            <input type="number" name="price" id="Price">
          </div><!-- second -->

          <div class="input_group">
            <label for="product">Category</label>
            <select  id="category_select" name="category">
              <?php
              $query_res= Selectcategory();
              while($row = mysqli_fetch_array($query_res)):
                $cat_name=$row['category_name'];
              ?>
                <option><?=$cat_name?></option>
                <?php endwhile;?>
              </select>
              <a href="addcategory.php">Add</a>
          </div><!-- first -->

          <div class="input_group">
            <label for="">photos</label>
            <input type="file" id="photo" name="product_image">
          </div>
          
            <input type="submit" value="save" id="save" name="save">
            <input type="submit" value="reset" id="reset" name="reset" >
          
        </form>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>