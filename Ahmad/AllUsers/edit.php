
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="./sytle.css"/>
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
        $user = 'root';
        $password = '';
        try {
            $db = new PDO($dsn, $user, $password);
            $query="SELECT * FROM users WHERE id= :userr_Id";
            $stmt=$db->prepare($query);
            $stmt->execute(["userr_Id"=>$stdId]);
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
        <div class="mb-3">
            <input type="hidden" class="form-control" placeholder="id" name="id" value="<?php echo $std->id; ?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" class="form-control my_info" placeholder="name"  placeholder="Name" name="name" value="<?php echo $std->name; ?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Email</label>
            <input type="text" class="form-control my_info" placeholder="name"  placeholder="Email" name="email" value="<?php echo $std->email; ?>">
        </div>

    <input type="submit" class="save" name="save" value="Save">

</form>
<div class="image">

</div>
</div>
<?php
    if(isset($_POST['save'])){
        $stdId=$_GET["index"];
        $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
        $user = 'root';
        $password = '';
        try {
            $db = new PDO($dsn, $user, $password);
            $updateQuery="UPDATE users SET name = :name, email = :email  WHERE id= :userr_Id";
            $updateStmt=$db->prepare($updateQuery);
            $updateStmt->execute([
                'name' => $_POST['name'],
                'email' => $_POST['email'],

                "userr_Id"=>$_POST["id"]
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
