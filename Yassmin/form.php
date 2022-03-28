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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="addUser.css">

</head>
<style>
  .navbar-brand img{
    width: 70px;
}
.admin_img{
  width: 70px;
  border-radius: 50%;
}
.admin_name{
  align-self: center;
  margin-left: 1rem;
}
.div{
  height: 5rem;
}
label{
      color: #4d351d;
      font-size: 1em;
      font-weight: bolder;
  }
  .my_info{
      border-bottom: 3px solid #4d351d;
  }
  input[type=text], input[type=password] , input[type=email], input[type=number] ,input[type=file]{
    border: none !important;

    border-bottom: 3px solid #4d351d !important;

  }
  .ssave{
      background-color: #4d351d !important;
      border: none;
      color: #fff;
      padding: 1em 2em;
  }
  </style>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container">
    <a class="navbar-brand" href="#">
        <img src="./img/coffee-place.jpg"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="..\Rehab\cafateria\cafateria\UserOrderAdmin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\Ahmad\allproducts\home.php"">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\Ahmad\AllUsers\home.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Manaul Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\Youssef\checks\new.php">Checks</a>
        </li>

      </ul>
      <div class="d-flex ">
        <img src="./img/ss.jpg" class="admin_img"/>
        <h4 class="admin_name">Kelany</h4>
      </div>
    </div>
  </div>
</nav>


  <div class="container">
        <form  method="post" action="validation.php" enctype="multipart/form-data">
            <div class="div">
                <label for="name" >Name: </label>
                <input type="text" name="name"  id="first name" class="form-control">
            <label style="color: red">
                <?php if (isset($_GET["name"])) {
                    echo "name required";
                } ?>
                        </label>
            </div>
<div class="div">
                <label for="email" >Email: </label>
                <input type="text" name="email"  id="email" class="form-control">
            <label style="color: red">
                <?php if (isset($_GET["email"])) {
        echo "email required <br>";
    }
                if (isset($_GET["wrongformat"])) {
                    echo "invalid email";
                } ?>
            </label>
</div>
<div class="div">
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
            <div class="col-md-6 div" >
                <label for="password" class="form-label">Confirm password:</label>
                <input type="password" name="confirmpassword" class="form-control" id="confirmpassword">
                <label style="color: red">
                <?php if (isset($_GET["confirmpassword"])) {
                    echo "Password doesn't match";
                } ?> </label>
            </div>
            <div class="div">
            <label  class="form-label">Room:</label>

                
                <input type="number" class="form-control" name="room">
            </div>
            <div class="div">
            <label  class="form-label">Upload a picture: :</label>

                
                <input type="file" name="img" class="form-control">
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
          <input type="submit" value="Save" class="ssave">
          <input type="submit" value="Reset" class="ssave">
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