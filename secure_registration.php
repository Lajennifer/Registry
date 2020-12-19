<?php
include 'include/db_conn.php';

$firstname = ltrim($_POST['firstname']);
$firstname = rtrim($firstname);

$lastname = ltrim($_POST['lastname']);
$lastname = rtrim($lastname);

$phone = ltrim($_POST['phone']);
$phone = rtrim($phone);

$username = ltrim($_POST['username']);
$username = rtrim($username);

$password = ltrim($_POST['password']);
$password = rtrim($password);

$conf_password = ltrim($_POST['conf_password']);
$conf_password = rtrim($conf_password);



 if($firstname=="" ){
	echo "<head><script>alert('Firstname can not be empty');</script></head></html>";
				echo "<meta http-equiv='refresh' content='0; url=register.php'>";
   
 }
 else if($lastname=="" ){
	echo "<head><script>alert('Lastname can not be empty');</script></head></html>";
				echo "<meta http-equiv='refresh' content='0; url=register.php'>";
   
 }
 else if($phone=="" ){
	echo "<head><script>alert('Phone can not be empty');</script></head></html>";
				echo "<meta http-equiv='refresh' content='0; url=register.php'>";
 }
 else if($username=="" ){
	echo "<head><script>alert('Username can not be empty');</script></head></html>";
				echo "<meta http-equiv='refresh' content='0; url=register.php'>";
   
 }
 else if($password=="" ){
	echo "<head><script>alert('Password can not be empty');</script></head></html>";
				echo "<meta http-equiv='refresh' content='0; url=register.php'>";
   
 }
 else if($conf_password=="" ){
	echo "<head><script>alert('Confirm Password can not be empty');</script></head></html>";
				echo "<meta http-equiv='refresh' content='0; url=register.php'>";
   
 }
 else{
	if ($password != $conf_password) {
		echo "<head><script>alert('Passwords do not match');</script></head></html>";
				   echo "<meta http-equiv='refresh' content='0; url=register.php'>";
	}else{
		//register
		$username = stripslashes($username);
		$password = stripslashes($conf_password);

		$username = mysqli_real_escape_string($link, $username);
		$password     = mysqli_real_escape_string($link, $password);

		$sql1          = "INSERT INTO users (username,password,usertype) VALUES('$username','$password','0') ";
		
		if($result1 = mysqli_query($link, $sql1)){

			$userid = mysqli_insert_id($link);
			$sql2          = "INSERT INTO farmers_data (id, first_name,last_name,phone) VALUES('$userid','$firstname','$lastname','$phone') ";
			if($result2 = mysqli_query($link, $sql2)){
				echo "<head><script>alert('Registration succeed! You can log in.');</script></head></html>";
				   echo "<meta http-equiv='refresh' content='0; url=login.php'>";
			}
		}



	}
 }





// if ($result = mysqli_query($link, $sql)) {
// if ($count = mysqli_num_rows($result)) {
// if ($count == 1) {
//     $row = mysqli_fetch_assoc($result);
//     session_start();
//     // store session data
//     $_SESSION['username']  = $username;
//     $_SESSION['logged']     = "start";
//     $_SESSION['id']  = $row['ID'];

//         header("location: ./dashboard/admin/");
  
// } else {
//     echo "<html><head><script>alert('Username OR Password is Invalid');</script></head></html>";
//     echo "<meta http-equiv='refresh' content='0; url=login.php'>";
// }
// }
// } else {
//   echo "Opps!! Something went wrong! Try Again Later..";
// }


// }
?>
