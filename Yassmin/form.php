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
  <link rel="stylesheet" href="AddUser.css">
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
      <li><a href="..\Rehab\cafateria\cafateria\UserOrderAdmin.php">Home </a></li>
      <li><a href="..\Ahmad\allproducts\home.php">Products </a></li>
      <li><a href="..\Ahmad\AllUsers\home.php">Users</a></li>
      <li><a href="">Manual Orders</a></li>
      <li><a href="..\Youssef\checks\new.php">Checks</a></li>
    </ul>
    <div class="nav_img"> <img src="pp.png" alt="">
      <h3>Admin</h3>
    </div>

  </nav>

  <div class="container">
        <form  method="post" action="validation.php" enctype="multipart/form-data">
            <div>
                <label for="name" >Name: </label>
                <input type="text" name="name"  id="first name">
            <label style="color: red">
                <?php if (isset($_GET["name"])) {
        echo "name required";
    } ?>
            </label>
</div>
<div>
                <label for="email" >Email: </label>
                <input type="text" name="email"  id="email">
            <label style="color: red">
                <?php if (isset($_GET["email"])) {
        echo "email required <br>";
    }
                if (isset($_GET["wrongformat"])) {
                    echo "invalid email";
                } ?>
            </label>
</div>
<div>
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="password">
                <label style="color: red">
                <?php if (isset($_GET["password"])) {
                    echo "Password required";
                }
                if (isset($_GET['invalidpassword'])) {
                    echo"<br> Invalid password";
                } ?>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Confirm password:</label>
                <input type="password" name="confirmpassword" class="form-control" id="confirmpassword">
                <label style="color: red">
                <?php if (isset($_GET["confirmpassword"])) {
                    echo "Password doesn't match";
                } ?> </label>
            </div>
            <div>
                Room:
                <input type="number" name="room">
            </div>
            <div>
                Upload a picture: 
                <input type="file" name="img">
                <label style="color: red">
                <?php if (isset($_GET["file"])) {
                    echo "file doesn't match extentions<br>";
                }
                if (isset($_GET["wrongformat"])) {
                    echo "invalid email";
                } ?>
            </label>
            </div>
            <div>
            <div class="send_buttons">
          <input type="submit" value="Save" class="Save">
          <input type="submit" value="Reset" class="Reset">
        </div>
            </div>
        </form>
    </div>


  <div class=" col-sm-12 col-md-6 col-lg-6 d-none d-sm-none d-md-block">
    <img src="coffee.png" alt="" class="background_img">
  </div>
  </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

      
</body>

</html>