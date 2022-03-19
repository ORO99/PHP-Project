<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"cafeteria");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT id,orders.name,item,price FROM orders INNER JOIN order_details WHERE id = orderID;";
// $result = $conn->query($sql);
// // print_r(mysqli_fetch_assoc($result));
// while ($row = mysqli_fetch_assoc($result)){
//   $info[] = $row;
// }

// echo "========================================";
// $sql2 = "SELECT item,price FROM order_details";
// $result2 = $conn->query($sql2);
// print_r(mysqli_fetch_assoc($result2));
// while ($row2 = mysqli_fetch_assoc($result2)){
//   $info2[] = $row2;
// }

// print_r($info2);
// // echo "Connected successfully";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />

    <title>Checks</title>
    <link rel="stylesheet" href="./style.css" />
  </head>

  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="./img/coffee-place.jpg" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="..\..\Rehab\cafateria\cafateria\UserOrderAdmin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\..\Ahmad\allproducts\home.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\..\Ahmad\AllUsers\home.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Manual Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Checks</a>
            </li>
          </ul>
          <div class="d-flex">
            <img src="./img/ss.jpg" class="admin_img" />
            <h4 class="admin_name">Kelany</h4>
          </div>
        </div>
      </div>
    </nav>
    <!-- -->
    <div class="the_container">
      <div class="container col-sm-8">
        <table class="table accordion" id="accordionSection">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">total Amount</th>
            </tr>
          </thead>
          <tbody>



          <?php

              // $dsn = 'mysql:dbname=users;host=127.0.0.1;port=3306;';
              // $user = 'root';
              // $password = '';

              try {

                $sql_name = "SELECT name FROM users";
                $result_name = $conn->query($sql_name);
            
                while ($row_name = mysqli_fetch_assoc($result_name)){
                  $info_name[] = $row_name;
                }
                  // $db = new PDO($dsn, $user, $password);
                  // $query = "select * from orders";
                  // $stmt = $db->prepare($query);
                  // $stmt->execute();
                  // $stds=$stmt->fetchAll(PDO::FETCH_OBJ);
                  

                  // while ($std = $stmt->fetchObject()) {
                    for($i = 0 ; $i < sizeof($info_name); $i++){
                      $order_info =[];
                      $anchor = $info_name[$i]['name'];
                    //   print_r($anchor) ;
                      echo "
                      
                      <div class='accordion-item'>
                      <tr class='main_tr'>
                        <td class='accord_class'>
                          <h2 class='accordion-header lessss'>
                            <button
                              type='button'
                              class='accordion-button collapsed'
                              data-bs-toggle='collapse'
                              data-bs-target='#collapse".$anchor."'
                            >".  $anchor ." 
                             
                            </button>
                          </h2>
                        </td>
                        <td class='tex_center'> 200 </td>
                      </tr>
                      <tr>
                        <td colspan='2'>
                          <div
                            class='accordion-collapse collapse'
                            id='collapse". $anchor ."'
                            data-bs-parent='#accordionSection'
                          >
                            <div class='accordion-body'>
                              <table
                                class='table accordion order_table'
                                id='accordionSection".$anchor."'
                              >
                                <thead>
                                  <tr>
                                    <th scope='col'>OrderName</th>
                                    <th scope='col'>total Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                             " ;  
                             // products table
                             $sql_info = "SELECT U.name, P.ProductName, P.ProductPrice
                             FROM Products P
                             LEFT JOIN Productorder PO
                             ON P.ProductID = PO.product_id
                             LEFT JOIN orders O 
                             ON O.orderID = PO.order_Id
                             LEFT JOIN users U
                             ON O.userID = U.id
                             WHERE U.name = '$anchor'";
                             $result_info = $conn->query($sql_info);
                             
                            //  print_r($result_info);
                             
                             while ($row_info = mysqli_fetch_assoc($result_info)){
                               $order_info[] = $row_info ;
                            //    print_r($order_info);
                             }
                             for($k = 0; $k < sizeof($order_info); $k++){
                              echo "
                              <div class='accordion-item'>
                              <tr class='main_tr'>
                                <td class='accord_class'>
                                  <h2 class='accordion-header lessss'>
                                    <button
                                      type='button'
                                      class='accordion-button collapsed'
                                      data-bs-toggle='collapse'
                                      data-bs-target='#collapseO".$order_info[$k]['ProductName']."'
                                    >".
                                    $order_info[$k]['ProductName'] . "
                                    </button>
                                    <!-- <span>110</span> -->
                                  </h2>
                                </td>
                                <td class='tex_center'>".$order_info[$k]['ProductPrice']."</td>
                              </tr>
                              <tr>
                                <td colspan='2'>
                                  <div
                                    class='accordion-collapse collapse'
                                    id='collapseO".$order_info[$k]['ProductPrice']."'
                                    data-bs-parent='#accordionSection".$order_info[$k]['ProductPrice']."'
                                  >
                                    <div class='accordion-body'>
                                      <div class='order_box'>
                                        <img src='./img/ss.jpg' />
                                        <img src='./img/ss.jpg' />
                                        <img src='./img/ss.jpg' />
                                        <img src='./img/ss.jpg' />
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </div>
                              ";}; 
                             echo"
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </div>
                  ";
                  }

                  //close query
                  // $stmt->closeCursor();

                  //close connection
                  // $db=null;
                  
              } catch (PDOException $e) {
                  echo 'Connection failed: ' . $e->getMessage();
              }
              ?>

          </tbody>
        </table>
      </div>

      <div class="imag"></div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
