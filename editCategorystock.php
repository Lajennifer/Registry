<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'reg');

if(isset($_POST['edit'])){
	$name=$_POST['Iname'];
	$query="UPDATE category SET Name_of_item='$name' WHERE ID='$id'";
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
