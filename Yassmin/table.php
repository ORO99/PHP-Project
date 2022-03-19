<?php


include("DataBase.php");
$mydb = new DataBase('mysql:dbname=cafeteria;host=127.0.0.1;port=3306;', 'root','');
try{
    $mydb->connect();
    $mydb->draw_the_table("users", "name", "email", "room","path");
}catch(Exception $e){
    echo $e->getMessage();
}