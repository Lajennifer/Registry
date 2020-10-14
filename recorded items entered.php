<?php
if(isset($_GET['notsuccess'])){ echo "<script>alert('data not deleted');</script>";}
$hostname="localhost";
$username="root";
$password="";
$databaseName="reg";

$connect = mysqli_connect($hostname,$username,$password,$databaseName);
$query="SELECT * FROM `category`";
$result2 = mysqli_query($connect,$query);
 $options=".";
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

	<title>Items in stock</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.min.css">
	
  <style type="text/css">
    body{
    background-image: url(quinc.jpg);
    background-size: cover;
    background-position: center center;
   background-attachment:fixed; 
    }
    #ui{ 
    	background-color: rgba(190,140,0,0.9);
      padding: 30px;
      margin-top: 50px;
      border-radius: 10px;
      opacity: ;


    }
    #ui label,h1{
      color: #000000;
    }
    .modal{
    	opacity:1;
    }
  </style>
</head>

<body>
 <div class="container">
  <div class="row">
      <div class="col-lg-12">
        <div id="ui" class='jumbotron'>
          <h1 class="text-center"> BA'S Registry</h1>

          <table id="displaydata" class="table table-striped table-bordered dt-responsive">
		<tr>
			
			<th>Name of Item</th>
			<th>Number of items</th>
			<th>Purchasing price unit</th>
			<th>Sale price unit</th>
			<th>Difference in unit price</th>
			<th>Action</th>
			<th>Update</th>
			<th>Delete</th>

		</tr>
		<?php
		function generateOptions($v,$array){
			$data=null;
			$isselected=false;
			// $data="<option>$v - ".implode(",",$array)."</option>";
			for ($i=0; $i <count ($array) ; $i++) { 
				# code...
				if ($isselected) {
					# code...
					$data.="<option>".$array[$i]."</option>";
						continue;				
				}
				if (trim($v)==$array[$i]){
					$data.="<option selected='selected'>".$array[$i]."</option>";
					$isselected=true;

				}else{
					$data.="<option>".$array[$i]."</option>";
				}
			}
			return $data;
		}
		$conn = mysqli_connect("localhost","root","","reg");
		if ($conn-> connect_error) {
			die("connection failed:".$conn-> connect_error);
		}
		$query="SELECT * FROM `category`";
        $result2 = mysqli_query($connect,$query);
        $options="";
        $optionsArray=[];
         while ($row2=mysqli_fetch_array($result2)) {
        $options=$options."<option>$row2[1]</option>";
        $optionsArray[]=$row2[1];
        
        }

		$sql ="SELECT ID,Name_of_item,Number_of_items,Purchasing_price_unit,Sale_price_unit,Difference_in_unit_price from registry";
		$result=$conn-> query($sql);

		if($result-> num_rows > 0){
			while ($row=$result->fetch_assoc()) {
             $opt=generateOptions($row['Name_of_item'],$optionsArray);

				echo "<tr><td>".$row["Name_of_item"]."</td><td>".$row["Number_of_items"]."</td><td>".$row["Purchasing_price_unit"]."</td><td>".$row["Sale_price_unit"]."</td><td>".$row["Difference_in_unit_price"]."</td>
				</tr>";
			}
			echo "</table>";
		}
		else{
			echo " result";
		}
		$conn->close();

		?>

	</table>
</div>

 </div>
</div>
</div>

<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="media/js/dataTables.bootstrap.min.js"></script>


<script>
	$(document).ready(function(){
		$('#displaydata').dataTables({
			'dom': fltip,
			'paging':true,
			'searching':true,
			'ordering':true
		});
	});
	$(document).ready(function(){
		$('.deletebtn').on('click',function(){
			$('#deletemodal').modal('show');
			$tr =$(this).closest('tr');
			var data=$tr.children("td").map(function(){
				return $(this).text();
			}).get();
			console.log(data);
			 // $('#delete_id').val(data[0]);

		});
	});

	$(document).ready(function(){
		$('.editbtn').on('click',function(){
			$('#editmodal').modal('show');
			$tr =$(this).closest('tr');
			var data=$tr.children("td").map(function(){
				return $(this).text();
			}).get();
			// alert(data[0]);
			// console.log(data[0]);
			 // $('#edit_id').val(data[0]);
			// $('#NoI').val(data[1]);
			// $('#NuOi').val(data[2]);
			// $('#pp').val(data[3]);
			// $('#sp').val(data[4]);
			// $('#DiU').val(data[5]);
			// $('#calc').val(data[6]);
		});
	});
	$( "#calc_id2" ).click(function() {
    
    var sale_price_unit = $('#sale_price_unit').val();
    var no_items = $('#no_items').val();
    console.log(sale_price_unit);
    console.log(no_items);
    let sale_p = parseInt(sale_price_unit);
    let noItems = parseInt(no_items);
    
    let total_price = sale_p*noItems;

    console.log(total_price);

    $('#total_price').val(total_price);

  });
	
</script>
</body>
</html>
	







































































































































