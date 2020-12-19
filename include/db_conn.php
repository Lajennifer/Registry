<?php
$host     = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
$db_name  = "agrisupplychain"; // Database name 

// Connect to server and select databse.
$link = mysqli_connect($host, $username, $password, $db_name);

// Check connection
if (mysqli_connect_errno($link)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// include("config.inc.php");
// if (function_exists('mysqli_connect') == false) {
//  echo "Need to enable mysqli";
//  error_log("Need to enable mysqli",0);
//  # code...
//  return;
// }
// $connect = mysqli_connect($hostname, $username, $password, $dbname);
// $link = mysqli_connect($hostname, $username, $password, $dbname);
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to mysql DB:" . mysqli_connect_errno();
//     error_log("Failed:" . mysqli_connect_errno());
//     return;
// }

function page_protect()
{
    session_start();
    
    global $db;
    
    /* Secure against Session Hijacking by checking user agent */
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            echo "<meta http-equiv='refresh' content='0; url=../../index.html'>";
            exit();
        }
    }
    
    // before we allow sessions, we need to check authentication key - ckey and ctime stored in database
    
    /* If session not set, check for cookies set by Remember me */
    if (!isset($_SESSION['user_data']) && !isset($_SESSION['logged']) && !isset($_SESSION['auth_level'])) {
        session_destroy();
        echo "<meta http-equiv='refresh' content='0; url=../../index.html'>";
        exit();
    } else {
        
    }
    
}
?>