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

		<td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal".$row['ID']."'>Sell</button>	
		<div class='modal fade' id='myModal".$row['ID']."'>
		<div class='modal-dialog modal-md'>
			<div class='modal-content'>
				<div class='modal-header'>
					<h1 class='text-center'>Selling</h1>
                      </div>
                      <div class='modal-body'>
                      <input type='hidden' name='sale_id' id='sale_id' value='".$row['ID']."'>
                      <form action='salesinsert.php' method='POST'>
                      <label>Name of item:</label>
                      <input type='text' name='na_of_items' id='na_of_items' class='' placeholder='number of items' value=".$row["Name_of_item"].">
                        
                         <label>Number of items in the store:</label>
                         <input type='text' name='no_of_items' id='no_items' class='' placeholder='number of items' value=".$row["Number_of_items"].">
                 
                         <label>Sale price unit:</label>
                         <input type='text' name='saleprice' id='sale_price_unit' class='' placeholder='number of items' value=".$row["Sale_price_unit"]."><br>
                        
                       
                        <label>Items to be sold:</label>
                        <input type='text' name='itemstobesold' id='itemstobesold' class='' placeholder='number of items' ><br>
                        <label>Total Price:</label>
                        <input type='text' name='price' class='' placeholder='Total price' id='total_price'>
                        <button type='button' value= 'calculate' class='btn btn-success' id='calc_id2'>Calculate</button>
                        
                      </div>
                      <div class='modal-footer'>
                        <input type='button' class='btn btn-primary' data-dismiss='modal' name='' value='close'>
                        <input  type='submit' class='btn btn-primary' name='' value='Sell'>
                      </div>
                      </form>
                    </div>
                  </div>
                  </div></td>
                  
                  <td>
                  <button type='button' class=' btn btn-success editbtn' data-toggle='modal' data-target='#editmodal".$row['ID']."'>Edit</button>
                  <div class='modal fade'id='editmodal".$row['ID']."'>
                  <div class='modal-dialog modal-md'>
                  <div class='modal-content'>
                  <div class='modal-header'>
                  <h1 class='text-center'>Edit record</h1>
                  </div>
                  <form method='POST' action='update.php'>
                  <div class='modal-body'>
                  <input type='hidden' name='edit_id' id='edit_id' value='".$row['ID']."'>
                  
                   <div class='row'>
                   <div class='col-lg-8'>
                    <label>Name of item:</label>
                     <select id='NoI' name='Name'>
                      ".$opt."
                     </select>
                      </div>
                       </div>

                    <div class='row'>
                    <div class='col-lg-6'>
                    <label>Number of items:</label>
                    <input type='number' name='quantity' class='form-control' placeholder='number of items' id='NuOi' value='".$row["Number_of_items"]."'>
                    </div>
                    </div>

                    <div class='row'>
                    <div class='col-lg-6'>
                    <label>Purchasing price unit:</label>
                <input type='text' name='purchase' class='form-control' placeholder='purchasing price' id='purchasing_price'value='".$row["Purchasing_price_unit"]."'>
                </div>
                </div>

                <div class='row'>
                <div class='col-lg-6'>
                <label>Sale price unit:</label>
                <input type='text' name='sale' class='form-control' placeholder='Selling unit' id='selling_unit' value='".$row["Sale_price_unit"]."'>
                </div>
                </div>

                <div class='row'>
                <div class='col-lg-6'>
                <label>Difference in unit price:</label>
                <input type='text' name='diff' class='form-control' placeholder='difference in units' id='difference_in_units'value='".$row["Difference_in_unit_price"]."'>
                </div>

                <div class='row'>
                <div class='col-lg-6'>
                  <label>Calculate</label>
                  <button type='button'  class='btn btn-success' id='calc_id1'>Calculate</button>
                  </div>
                  </div>
                  </div>
                
            
              </div>

		    <div class='modal-footer'>
		    <button type='button' class='btn btn-secondary' data-dismiss='modal' name=''> cancel </button>
		    <button type='submit' class='btn btn-primary' name='update'>Yes update it</button>
               </div>
                </form>
           
	        </div>
	        </div>
	        </div>
	        </td>


                  

                  <td>
                  <button type='button' class=' btn btn-danger deletebtn' data-toggle='modal' data-target='#deletemodal".$row['ID']."'>Delete</button>
                  <div class='modal fade' id='deletemodal".$row['ID']."'>
                  <div class='modal-dialog modal-md'>
                  <div class='modal-content'>
                  <div class='modal-header'>
                  <h1 class='text-center'>delete record</h1>
                  </div>
                  <form action='deleterecord.php' method='POST'>
                  <div class='modal-body'>
                  <input type='hidden' name='delete_id' id='delete_id' value='".$row['ID']."'>

                  <h2>Do you want to delete this data?</h2>

                  </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal' name=''> No </button>
                        <button type='submit' class='btn btn-primary' name='deletedata'>Yes delete it</button>
                      </div>
                      </form>
                    </div>
                  </div>
                  </div>
                  </td>
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
    
    var salePriceUnit = $('#sale_price_unit').val();
    var noItems = $('#itemstobesold').val();
    console.log(salePriceUnit);
    console.log(noItems);
    let sale_pr = parseInt(salePriceUnit);
    let NoItems = parseInt(noItems);
    
    let total_price = sale_pr*NoItems;

    console.log(total_price);

    $('#total_price').val(total_price);

  });
	$( "#calc_id1" ).click(function() {
    
    var purchase_p = $('#purchasing_price').val();
    var selling_u_p = $('#selling_unit').val();
    let purch_p = parseInt(purchase_p);
    let sell_p = parseInt(selling_u_p);
    console.log(purch_p);
    console.log(sell_p);
    
    let diff_in_unit_price = sell_p-purch_p;

    console.log(diff_in_unit_price);

    $('#difference_in_units').val(diff_in_unit_price);

  });
	
</script>
</body>
</html>
	







































































































































