<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<title>enter</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
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
          <h1 class="text-center"> BA'S Registry</h1>
          <form class="form-group text-center" method="POST" action="insert2.php">
            <div class="row">
              <div class="col-lg-9">
            <label>Name of item</label> 
            <input type="text" name="Iname" id="Iname" class="form-control" placeholder="Enter the name of item">
          </div>
        </div>
        <br>
        <button type="submit" name="submit2" value="submit" class="btn btn-secondary">Submit</button>
    </form>
        <div class="col-lg-3"></div>
   </div>

 </div> 
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>