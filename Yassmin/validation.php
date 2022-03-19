<?php

$errors =[];

if (empty($_REQUEST["name"])&& $_REQUEST["name"]=="") {
    $errors['name']="Name_is_empty";
}

if (empty($_REQUEST["password"]) ||$_REQUEST["password"]=="") {
    $errors["password"]="password_is_empty";
}

//$pass_pattern = "/^[a-z0-9_]{8}$/";

//if (!preg_match_all($pass_pattern, $_REQUEST["password"], $matches)) {
 //   $errors["invalidpassword"]="invalid_password";
//}


if (empty($_REQUEST["password"]) ||$_REQUEST["password"]=="") {
    $errors["password"]="password_is_empty";
}

if (empty($_REQUEST["confirmpassword"])&& $_REQUEST["confirmpassword"]=="") {
    $errors['confirmpassword']="confirmpassword_is_empty";
}

if ($_REQUEST["password"] != $_REQUEST["confirmpassword"]) {
    $errors['confirmpassword']="confirmpassword_doesn't_match";
}


//$pattern = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/";



if (empty($_REQUEST["email"]) ||$_REQUEST["email"]=="") {
    $errors["email"]="email_is_empty";
}

if (!filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)) {
    $errors["wrongformat"]="invalid_email";
}



$file_name = $_FILES['img']['name'];
$file_tmp =$_FILES['img']['tmp_name'];
$file_type=$_FILES['img']['type'];

$extention = explode("/", $file_type)[1];
$extensions= array("jpeg","jpg","png", "gif");

if (in_array($extention, $extensions)=== false) {
    $errors["file"]="extension not allowed, please choose a JPEG, jpg, gif or PNG file.";
}

$str="Form.php?";
if (count($errors)>0) {
    foreach ($errors as $k=>$val) {
        $str.=$k."=".$val."&";
    }
    header("Location: $str");
    return;
}
$the_picture = $_REQUEST["name"].".".$extention;

move_uploaded_file($file_tmp, "Img/".$_REQUEST["name"].".".$extention);


include("DataBase.php");
$mydb = new DataBase('mysql:dbname=cafeteria;host=127.0.0.1;port=3306;', 'root','');
try {
    $mydb ->connect();
    $mydb->insert_into_users($_REQUEST['name'], $_REQUEST['password'], $_REQUEST['email'], $_REQUEST['room'], $the_picture);
    header("Location: table.php");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
