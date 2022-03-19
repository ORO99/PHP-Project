
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="./style_edit.css"/>
</head>
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../allproducts/">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../allusers/">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Manaul Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Checks</a>
        </li>

      </ul>
      <div class="d-flex ">
        <img src="./img/ss.jpg" class="admin_img"/>
        <h4 class="admin_name">Kelany</h4>
      </div>
    </div>
  </div>
</nav>

<?php
    if(!empty($_GET["index"])){
        $stdId=$_GET["index"];
        $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
        $user = 'kelany';
        $password = 'root';
        try {
            $db = new PDO($dsn, $user, $password);
            $query="SELECT * FROM products WHERE ProductID= :product_Id";
            $stmt=$db->prepare($query);
            $stmt->execute(["product_Id"=>$stdId]);
            $std=$stmt->fetchObject();
            $stmt->closeCursor();
            $db=null;
        }catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }else{
        header("location: home.php");
        exit;
    }
?>
<div class="container_f">
<form method="POST">
    <a class="back" href="./home.php">Back</a>
        <!-- <input type="hidden" class="form-control" id="id" placeholder="name@example.com"> -->
        <div class="mb-3">
            <input type="hidden" class="form-control" placeholder="id" name="id" value="<?php echo $std->ProductID; ?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control my_info" placeholder="name"  placeholder="Name" name="ProductName" value="<?php echo $std->ProductName; ?>">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" class="form-control my_info" id="price" placeholder="price" name="ProductPrice" value="<?php echo $std->ProductPrice; ?>">
        </div>

    <input type="submit" class="save" name="save" value="Save">


    <!-- <div class="mb-3">
            <label for="id" class="form-label">Name</label>
            <input type="email" class="form-control" id="id" placeholder="name@example.com">
        </div> -->
</form>
<div class="image">

</div>
</div>
<?php
    if(isset($_POST['save'])){
        $stdId=$_GET["index"];
        $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
        $user = 'kelany';
        $password = 'root';
        try {
            $db = new PDO($dsn, $user, $password);
            $updateQuery="UPDATE products SET ProductName = :ProductName, ProductPrice = :ProductPrice WHERE ProductID= :product_Id";
            $updateStmt=$db->prepare($updateQuery);
            $updateStmt->execute([
                'ProductName' => $_POST['ProductName'],
                'ProductPrice' => $_POST['ProductPrice'],
                "product_Id"=>$_POST["id"]
            ]);
        

            header('location: home.php');
            exit;
        }catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
?>
</body>
</html>
