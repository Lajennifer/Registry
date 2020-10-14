<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'reg');

if(isset($_POST['update'])){
	$id=$_POST['edit_id'];
	$name=$_POST['Name'];
	$number=$_POST['quantity'];
	$purchase=$_POST['purchase'];
	$selling=$_POST['sale'];
	$differ=$_POST['diff'];
	

	$query="UPDATE registry SET Name_of_item='$name',Number_of_items='$number',Purchasing_price_unit='$purchase',Sale_price_unit=$selling,Difference_in_unit_price='$differ' WHERE ID='$id'";
	$query_run=mysqli_query($connection,$query);

	if($query_run)
	{
		echo '<script> alert("Data updated");</script>';
		header("Location:data.php");
	}
	else{
		echo '<script> alert("Data not updated");</script>';
	}
}
?>
