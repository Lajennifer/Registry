<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<title>display</title>
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
          <center><h2>display</h2></center>
<br>

<?php
include("DBconBa.php");

$search = $_REQUEST["search"];

$query = "select Name_of_items,Number_of_items,Purchasing_price_unit,Sale_price_unit,Difference_in_unit_price from registry where title like '%$search%'"; //search with a book name in the table book_info
$result = mysqli_query($db,$query);

if(mysqli_num_rows($result)>0){
?>

<table border="2" align="center" cellpadding="5" cellspacing="5">

<tr>
<th> Name_of_items </th>
<th> Number_of_items </th>
<th> Purchasing_price_unit </th>
<th> Sale_price_unit </th>
<th> Difference_in_unit_price </th>
</tr>

<?php while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $row["Name_of_items"];?> </td>
<td><?php echo $row["Number_of_items"];?> </td>
<td><?php echo $row["Purchasing_price_unit"];?> </td>
<td><?php echo $row["Sale_price_unit"];?> </td>
<td><?php echo $row["Difference_in_unit_price"];?> </td>
</tr>
<?php
}
}
else
echo "<center>No item found in the store by the name $search </center>" ;
?>
</table>          
        <div class="col-lg-0"></div>
   </div>

 </div> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
