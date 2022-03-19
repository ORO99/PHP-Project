<?php

$mysqli = new mysqli("localhost","root","","cafeteria","3306") or die(mysqli_error($mysqli));

if (isset($_GET["delete"])){
    $id = $_GET['delete'];
    $mysqli->query("delete from orders where orderID=$id") or die($mysqli->error());
    header("location: myorders.php");
}
?>