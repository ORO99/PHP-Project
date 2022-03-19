<?php require('productdatabase.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

     if (isset($_POST["go"]))
     {
         $userEmail=$_POST["email"];
         $res= Selectuser($userEmail);
         if(!$res)
         {
             echo "no data found";
         }
      while($row = mysqli_fetch_array($res)):
               $UserId=$row["id"];
    ?>
    <form action="UserOrder.php" method="post">
    <input type="email" name="email">
    <input type="password" >
    <a href="UserOrder.php?id=<?=$UserId?>">hello</a>
   
    </form>
    <?php endwhile;
      } 
     ?>
</body>
</html>