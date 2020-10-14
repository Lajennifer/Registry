<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<title>baaaaaaaaaaaaa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  <style type="text/css">
    body{
    background-image: url(quinc.jpg);
    background-size: cover;
    background-position: center center;
   background-attachment:fixed; 
    }
    #ui{ background-color: #ffdab9;
      padding: 30px;
      margin-top: 50px;
      border-radius: 10px;
      opacity: 0.9;

    }
    #ui label,h1{
      color: #000000;


    }
  </style>
</head>

<body>
 <div class="container">
  
   <div class="row">
    <div class="col-lg-0"></div>
      <div class="col-lg-12">
        <div id="ui">
          <center><h2>Insert</h2></center>
<br>

<?php
include("DBconBa.php");

$Name_of_items=$_POST["na_of_items"];
$Number_of_items=$_POST["no_of_items"];
$Sale_price_unit=$_POST["saleprice"];
$items_to_be_sold=$_POST["itemstobesold"];
$total_price=$_POST['price'];

$query = "INSERT  into sales(Name_of_item,Number_of_items,Sale_price_unit,Items_sold,Total_price) values('
$Name_of_items','$Number_of_items','$Sale_price_unit','$items_to_be_sold','$total_price')"; //Insert query to add items details into the registry table
print($query);
$result = mysqli_query($db,$query) or die(mysqli_error($db)) ;
echo "\data.php";

?>

<h3> Item information is inserted successfully </h3>

<a href="data.php"> View all recorded items</a>
<div class="col-lg-0"></div>
</div>
</div> 


<script src="js/jquery.js"></script>
</body>
</html>