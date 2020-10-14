<!DOCTYPE>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">

  <title>categoRYStock</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.min.css">
  
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
          <h1 class="text-center">Items category</h1>
          <table id="displaydata" class="table table-striped table-bordered dt-responsive">
    <tr>
      <th>Name of Item</th>
      <th>Number of items</th>
      <th>Purchasing price unit</th>
      <th>Sale price unit</th>
      <th>Difference in unit price</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","reg");
    if ($conn-> connect_error) {
      die("connection failed:".$conn-> connect_error);
    }

    $sql ="SELECT Name_of_item,Number_of_items,Purchasing_price_unit,Sale_price_unit,Difference_in_unit_price from registry";
    $result=$conn-> query($sql);

    if($result-> num_rows > 0){
      while ($row=$result->fetch_assoc()) {
        echo "<tr><td>".$row["Name_of_item"]."</td><td>".$row["Number_of_items"]."</td><td>".$row["Purchasing_price_unit"]."</td><td>".$row["Sale_price_unit"]."</td><td>".$row["Difference_in_unit_price"]."</td></tr>";
      }
      echo "</table>";
    }
    else{
      echo " result";
    }
    $conn->close();

    ?>
  </table>
  <div class="col-lg-0"></div>
   </div>

 </div> 
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="media/js/dataTables.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function{
    $('#displaydata').dataTables({
      'dom': fltip,
      'paging':true,
      'searching':true,
      'ordering':true
    });
  });
  $(document).ready(function{
    // get elements by id and set element by id
  })
  
</script>
</body>
</html>
  







































































































































