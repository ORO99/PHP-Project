<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="myorders.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>myorders</title>
    <style>
      img{
        width: 150px;
        height: 200px;
        border-radius: 10px;
      }
     
      .card{
        height:300px;
        border-radius: 10%;
      }
    </style>
</head>

<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fa fa-align-justify" id="btn1"></i>
      <i class="fa fa-times" id="btn2"></i>
    </label>

    <ul>
      <li><a href="..\Sondos\cafateria\cafateria\UserOrder.php?id=<?php echo $_GET['id']; ?>">Home </a></li>
      <li><a href="">Products </a></li>
    </ul>
    <div class="nav_img"> <img src="pp.png" alt="">
      <h3>user</h3>
    </div>

  </nav>
    <div class="container">

     <div class="container-fluid" id="myOrders">
        <h2 class="text" id="head">My Orders </h2>
        <form name="form" method="POST" >
            <p class="search_input filter text">
                <label class="text">Start date</label>
                <input class="text" type="date" name="start" id="start">
                <label class="text">End date</label>
                <input class="text" type="date" name="end" id="end">
                <input class ="filterBtn btn btn-primary"  type="submit" value="submit" name="submit" class="submit">
            </p>
    </form>
    <div id="accordion">
    <?php
        if(isset($_POST['submit'])) {
            $start_date = date('Y-m-d', strtotime($_POST['start']));
            $end_date = date('Y-m-d', strtotime($_POST['end']));   
            $mysqli = new mysqli("localhost","root","","cafeteria","3306") or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM orders WHERE date between '".$start_date. "' and '".$end_date."'") or die($mysqli->error);
            
        }
    ?>
    </div>

    </div> 
    
<table id="myTable" style="background-color:white;" class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">OrderDate</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <?php
  // //$queryStringId = $_GET['id'];
  // print_r($_GET['id']);
                if(isset($result))
                 {while($row = $result->fetch_assoc()): ?>
                 <tr>
                      <?php $current_id = $row['orderID'];?>
                     <td><?php echo $row['date']; ?><button id="<?php echo "plusbtn$current_id"; ?>" style="margin-left: 40%;" class="btn btn-success">+</button></td>
                     <td><?php echo $row['status_Id']; ?></td>
                     <td><?php echo $row['order_action']; ?></td>
                     <?php if ($row['status_Id']=="1"): ?> 	
                     <td>
                        <?php 
                          $link = "progress.php?delete=$current_id";
                          //$queryLink = "getorderdata.php?clicked=";
                        ?>
                        <button class="btn btn-danger">Cancel Order</button> 
                     </td> 
                     <?php else: ?>
                     <td>
                        <p>No Actions</p>
                     </td>
                     <?php endif; ?>
                 </tr>
                 <tr >
                     <div class="container-fluid">
                   <td id="<?php echo "hidden$current_id" ?>" class="col-sm-12" colspan="4" style="display: none; width: 100%; flex-basis:100%">
                    <?php
                      $mysqli = new mysqli("localhost","root","","cafeteria","3306") or die(mysqli_error($mysqli));
                      $productsQuery = $mysqli->query("SELECT P.ProductName, P.ProductPrice, P.ProductPicture, PO.quantity FROM productorder PO LEFT JOIN products P ON P.ProductID = PO.product_Id WHERE order_Id = '".$current_id."'")or die($mysqli->error);
                      if(isset($productsQuery)){while($row = $productsQuery->fetch_assoc()){  ?>
                              <div class="card m-2">
                                <div class="cardheader">               
					                        <div class="avatar">
						                          <img alt="" src="<?php echo $row['ProductPicture']; ?>">
					                        </div>
				                        </div>
                                <div class="card-body info d-flex mt-2 align-items-center " style="justify-content: space-between;">
                                  <div class="title">
                                    <h4 ><?php echo $row['ProductName']; ?></h4>
                                  </div>
                                  <div class="title">
                                    <h5 class="btn-danger" style="border-radius: 50%;padding:10px"><?php echo $row['quantity']."x"; ?></h5>
                                  </div>
                                </div>
                                <div class="btn-danger" style='width:50px;height:50px;border-radius:50%;position:relative; left:80%;bottom:310px;text-align:center;vertical-align:middle'> <h5 style="margin-top: 20%;"><?php echo $row['ProductPrice']."$"; ?></h5></div>
                              </div>
                      <?php }} ?>
                  </td>
                      </div>
                      
                 </tr>
                 <?php endwhile;}?>
  </tbody>
  <?php
       $mysqli = new mysqli("localhost","root","","cafeteria","3306") or die(mysqli_error($mysqli));
       $result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);
       $result2 = $mysqli->query("SELECT * FROM productorder") or die($mysqli->error);
   
  ?>
</table>

<?php
       $result = $mysqli->query("SELECT sum(ProductPrice) AS total FROM products") or die($mysqli->error); 
       while($row = $result->fetch_assoc()): ?>
<div style=" height:100px;background-color:white; color:brown;font-size:55px;text-align:center;" class=" mb-5">Total : <?php echo $row['total']; ?></div>   

</div><?php endwhile; ?> 

<script>
  let jslink = '<?=$link?>'; 
  let table = document.getElementsByTagName("table")[0];
  //display order details on + button click
  table.addEventListener('click',function(e){
    let divId = `hidden${e.target.id.split('n')[1]}`;
    if(e.target.innerText == '+')
    {
      console.log('inside');
      e.target.innerText = '-';
      document.querySelector(`#${divId}`).style.display = "flex";
      e.target.classList.add("btn-danger");
    }
    //hide order data on - click
    else if(e.target.innerText == '-')
    {
      e.target.innerText = '+';
      document.querySelector(`#${divId}`).style.display = "none";
      e.target.classList.remove("btn-danger");
      e.target.classList.add("btn-success");
      
    }
    //alert for cancel order button
    else if(e.target.innerText == 'Cancel Order'){
      if(confirm("are you sure you want to cancel your order?"))
      {
        location.assign(jslink);
      }
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
<script src="jquery.js"></script>
</body>
</html>