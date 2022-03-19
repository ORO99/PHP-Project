<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>home</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css"/>
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
.hide{
  display:none
}
    </style>
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
          <a class="nav-link active" aria-current="page" href="..\..\Rehab\cafateria\cafateria\UserOrderAdmin.php">Home</a>
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





    <div class="table_container">

    <div>
      <div class="table_header">
        <h3>All Users</h3>

        <a href="..\..\Yassmin\form.php" class="add">Add</a>

      </div>
     <table  id="tble" class="table">
        <thead class="thead ">
            <th onclick="myfun()" >Name</th>
            <th>Room</th>
            <th>Image</th>
            <th>EXt.</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php

            $dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
            $user = 'root';
            $password = '';

            try {
                $db = new PDO($dsn, $user, $password);
                $query = "select * from users";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $stds=$stmt->fetchAll(PDO::FETCH_OBJ);
                

                // while ($std = $stmt->fetchObject()) {
                foreach($stds as $std){
                    echo "
                    <tr>
                        <td class='td_first'>" . $std->name."</td>
                        <td class='td_second'> " . $std->room ."</td>
                        <td >" ."<img class='table_img' src='./img/". $std->photo."'/>" . "</td>
                        <td class='td_second'> " . $std->email ."</td>

                        <td '>
                          <button> <a href='edit.php?index=" . $std->id  . "'>Edit</a></button>
                          <button > <a  href='delete.php?index=" . $std->id  . "' >Delete</a></button>
                        </td>
                    </tr>
                ";
                }

                //close query
                $stmt->closeCursor();

                //close connection
                $db=null;
                
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
            ?>
        </tbody>
    </table> 
    </div>
    <div class="imag"></div>
    </div>

</body>

</html>


