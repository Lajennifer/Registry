<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'reg');

if(isset($_POST['deletedata'])){
	$id=$_POST['delete_id'];
	
	$query="DELETE FROM registry WHERE ID='$id'";
	$query_run=mysqli_query($connection,$query);

	if($query_run)
	{
		// echo '<script> alert("Data deleted");window.location="data.php";</script>';
		// echo '<script> alert("Data deleted");</script>';
		header("Location:data.php");
	}
	else{
		header("Location:data.php?notsuccess");
	}
}
?>