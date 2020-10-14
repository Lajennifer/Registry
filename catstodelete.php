<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'reg');

if(isset($_POST['delete'])){
	$id=$_POST['delete_id'];
	$query=" DELETE FROM category WHERE ID='$id' ";
	$query_run=mysqli_query($connection,$query);

	if($query_run)
	{
		echo '<script> alert("Data deleted");</script>';
		header("Location:categoryStock.php");
	}
	else{
		echo '<script> alert("Data not Deleted");</script>';
	}
}
?>


