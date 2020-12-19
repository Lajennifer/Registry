<?php
include 'include/db_conn.php';

$username = ltrim($_POST['username']);
$username = rtrim($username);

$password = ltrim($_POST['password']);
$password = rtrim($_POST['password']);

$username = stripslashes($username);
$password = stripslashes($password);



if($password=="" &&  $username==""){
   echo "<head><script>alert('Username and Password can not be empty');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=login.php'>";
  
}
else if($password=="" ){
   echo "<head><script>alert('Password can not be empty');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=login.php'>";
  
}
else if($username=="" ){
   echo "<head><script>alert('Username can not be empty');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=login.php'>";
  
}

else{

$username = mysqli_real_escape_string($link, $username);
$password     = mysqli_real_escape_string($link, $password);
$sql          = "SELECT * FROM users WHERE username='$username' and password='$password'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
	$row = mysqli_fetch_assoc($result);
	
    

	$usertype = $row['usertype'];

	//0 farmer
	//1 transporter
	//2 distributor
	//3 consumer
	//4 admin

	if ($usertype == "0") {
	//farmer
	session_start();
    // store session data
    $_SESSION['username']  = $username;
    $_SESSION['logged']     = "start";
	$_SESSION['id']  = $row['id'];
	
	header("location: ./dashboard/uf/");

	} else if ($usertype == "1") {
	//tra
	session_start();
    // store session data
    $_SESSION['username']  = $username;
    $_SESSION['logged']     = "start";
	$_SESSION['id']  = $row['id'];
	
	header("location: ./dashboard/ut/");

	} else if ($usertype == "2") {
	//dis
	session_start();
    // store session data
    $_SESSION['username']  = $username;
    $_SESSION['logged']     = "start";
	$_SESSION['id']  = $row['id'];
	
	header("location: ./dashboard/ud/");

	} else if ($usertype == "3") {
	//cons
	session_start();
    // store session data
    $_SESSION['username']  = $username;
    $_SESSION['logged']     = "start";
	$_SESSION['id']  = $row['id'];
	
	header("location: ./dashboard/uc/");

	} else if ($usertype == "4") {
	//admin
	session_start();
    // store session data
    $_SESSION['username']  = $username;
    $_SESSION['logged']     = "start";
	$_SESSION['id']  = $row['id'];
	
	header("location: ./dashboard/ua/");

	} else {
	//nothing
	}
	
        
  
} else {
    echo "<html><head><script>alert('Username OR Password is Invalid');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
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
