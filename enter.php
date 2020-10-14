<?php
$hostname="localhost";
$username="root";
$password="";
$databaseName="reg";

$connect = mysqli_connect($hostname,$username,$password,$databaseName);
$query="SELECT * FROM `category`";
$result2 = mysqli_query($connect,$query);
$options="";
while ($row2=mysqli_fetch_array($result2)) {
  $options=$options."<option>$row2[1]</option>";
}
?>

<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<title>enter</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
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
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div id="ui">
          <h1 class="text-center"> BA'S Registry</h1>
          <form class="form-group text-center" method="POST" action="insertItems.php">
            <div class="row">
              <div class="col-lg-8">
                <label>Name of item:</label>
                <select name="ItemName">
                  <?php echo $options;?>
                  </select>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <label>Number of items:</label>
                <input type="number" name="quantity" class="form-control" placeholder="number of items">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <label>Purchasing price unit:</label>
                <input type="text" name="purchase" class="form-control" placeholder="purchasing price" id="purchasing_price">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <label>Sale price unit:</label>
                <input type="text" name="sale" class="form-control" placeholder="Selling unit" id="selling_unit">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <label>Difference in unit price:</label>
                <input type="text" name="diff" class="form-control" placeholder="difference in units" id="difference_in_units">
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <label>Calculate</label>
                  <button type="button" value= "calculate" class="btn btn-success" id="calc_id">Calculate</button>
                </div>
              </div>
            </div>
      <br>
      <button type="submit" name="submit1" value="submit" class="btn btn-secondary">Submit</button>
    </form>
    <div class="col-lg-3"></div>
  </div>
</div>
</div>
</div>



<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>




<script type="text/javascript">
  
$( "#calc_id" ).click(function() {
    
    var purchase_p = $('#purchasing_price').val();
    var selling_u_p = $('#selling_unit').val();
    let purch_p = parseInt(purchase_p);
    let sell_p = parseInt(selling_u_p);
    
    let diff_in_unit_price = sell_p-purch_p;

    console.log(diff_in_unit_price);

    $('#difference_in_units').val(diff_in_unit_price);

  });

</script>
</body>
</html>