



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js" defer> </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href = "style3.css">
    <title>Home</title>
</head>
<body class="back_color">

    

<!-- <div class="container ">
    <div class="row justify-content-center ">
        <div class="col-12  mt-5">
             <i class="fa-solid fa-bars fa-3x "></i>
        </div>
        
    </div>
</div> -->

<form action="" method="post">
    <div class="container  margin">
        <div class="row justify-content-center  ">
            <div class="col-4  px-4 mt-5 round-border shad xxx">
                <input type="hidden" value="<?php echo $currentID; ?>" name="id">
                <h1 class="mt-4 bt-text text-center ">Cafeteria</h1>
                <label for="" class="fs-5 shad bt-text mt-4"  >Username</label>
                <input type="text" class="form-control cb" name="name" value="enter a name... " >
                <label for="" class="fs-5 shad mt-3 bt-text"  >Password</label>
                <input type="password" class="form-control cb" name="password" value="enter a password...">
                <!-- <button class=" shad btn-coffee">Login</button> -->
                <input class="btn-coffee shad text-white" type="submit"></input>
                <!-- <p class="bro">kelany</p> -->
            </div>
            <!-- <div class="col-6  p-2 mt-5 round-border shad">
                <div>
                    <img src="55.png" class="img-fluid">
                </div>
            </div> -->
            

        </div>
        
    </div>
</form>

<?php 


// print_r($_POST);
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password,"cafeteria");
$currentID;
$path;
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";


// if(isset($_POST)){

$name = $_POST["name"];
$pass = $_POST["password"];

// print_r($_POST);
// }
$sql = "SELECT  id, name, password, is_admin FROM users where name = '$name' and password = '$pass' ";
$result = $conn->query($sql);
// print_r($result->fetch_assoc());
if($row = $result->fetch_assoc()){
    if($row['is_admin']=='t'){
        //print_r($row);
        //$path = "..\..\Rehab\cafateria\cafateria\UserOrderAdmin.php";
        header("Location:..\..\Rehab\cafateria\cafateria\UserOrderAdmin.php?id=$currentID"); //the next page
        
    }else {
        $currentID = $row['id'];
        //$path = "..\..\Sondos\cafateria\cafateria\UserOrder.php";
        header("Location:..\..\Sondos\cafateria\cafateria\UserOrder.php?id=$currentID");


    }
}
// print_r($result->fetch_assoc());




?>
<!-- <div class="container-fluid ">
    <div class="row justify-content-center footer text-white bg-dark">
        <div class="col-3">
                <p class="mb-0">All Copyrights are preserved for CMS</p>
        </div>
    </div>
</div> -->

</body>
</html>