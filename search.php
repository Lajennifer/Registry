<!-- 
<!DOCTYPE HTML>
<html>
<body background="quinc.jpg">
<center><h2> Management System</h2></center>
<form action = "display.php" method="get">
<br>
<center>Enter the title of the book to be searched :
<input type="text" name="search" size="48">
<br></br>
<input type="submit" value="submit">
<input type="reset" value="Reset">
</center>
<br>
</form>
</body>
</html> -->
<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<title>search</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
          <form class="form-group text-center" method="POST" action="display.php">

            <div class="row">
              <div class="col-lg-8">
                <label>Enter the name of item to be searched:</label>
                <input type="text" name="search" class="form-control" placeholder="search">
              </div>
            </div>
      <br>
      <button type="submit" name="submit1" value="submit" class="btn btn-secondary">Submit</button>
      <button type="reset" name="reset" value="reset" class="btn btn-secondary">Reset</button>

            

          </form>
        <div class="col-lg-3"></div>
   </div>

 </div> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>