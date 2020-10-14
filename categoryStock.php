
<!DOCTYPE>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">

  <title>categoRYStock</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.min.css">
  
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
      opacity: ;

    }
    #ui label,h1{
      color: #000000;
    }
  </style>
</head>

<body>
 <div class="container">
  <div class="row">
    <div class="col-lg-0"></div>
    <div class="col-lg-12">
      <div id="ui">
        <h1 class="text-center">Items category</h1>
        <table id="displaydata" class="table table-striped table-bordered dt-responsive">
          <tr>
            <th>Name of item</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          <?php


          $conn = mysqli_connect("localhost","root","","reg");
          if ($conn-> connect_error) {
            die("connection failed:".$conn-> connect_error);}
            $sql ="SELECT ID,Name_of_item from category";
            $result=$conn-> query($sql);
            if($result-> num_rows > 0){
              while ($row=$result->fetch_assoc()) {
                echo "<tr><td>".$row["Name_of_item"]."</td>

                  <td>
                  <button type='button' class=' btn btn-success updatebtn' data-toggle='modal' data-target='#updatemodal".$row['ID']."'>Edit</button>
                  <div class='modal fade'id='updatemodal".$row['ID']."'>
                  <div class='modal-dialog modal-md'>
                  <div class='modal-content'>
                  <div class='modal-header'>
                  <h1 class='text-center'>Edit record</h1>
                  </div>
                  <form method='POST' action='updatecat.php'>
                  <div class='modal-body'>
                  <input type='hidden' name='update_id' id='update_id' value='".$row['ID']."'>

                    <div class='row'>
                    <div class='col-lg-6'>

                    <label>Name of item</label> 
            <input type='text' name='Iname' id='Iname' class='form-control' placeholder='Enter the name of item'value='".$row["Name_of_item"]."'>
                    </div>
                    </div>
                    </div>

        <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal' name=''> cancel </button>
        <button type='submit' class='btn btn-primary' name='updatecat'>Yes update it</button>
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
                  <form action='catstodelete.php' method='POST'>
                  <div class='modal-body'>
                  <input type='hidden' name='delete_id' id='delete_id'value='".$row['ID']."'>

                  <h2>Do you want to delete this data?</h2>

                  </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal' name=''> No </button>
                        <button type='submit' class='btn btn-primary' name='delete'>Yes delete it</button>
                      </div>
                      </form>
                    </div>
                  </div>
                  </div>
                  </td>
                </tr>";
              }
               // echo "</table>";
            }
            else{
              echo " result";
            }
          
            $conn->close();


            ?>
          </table>
          <div class="col-lg-0"></div>
        </div>
      </div>
    </div>
  </div>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="media/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function{
    $('#displaydata').dataTables({
      'dom': fltip,
      'paging':true,
      'searching':true,
      'ordering':true
    });
  });


  $(document).ready(function(){
    $('.updatebtn').on('click',function(){
      $('#updatemodal').modal('show');
      $tr =$(this).closest('tr');
      var data=$tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#update_id').val(data[0]);
      $('#Iname').val(data[1]);

    });
  });

  $(document).ready(function(){
  $('.deletbtn').on('click',function(){
    $('#deletmodal').modal('show');
    $tr =$(this).closest('tr');
    var data=$tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);
    $('#delet_id').val(data[0]);

    });
  });

</script>
</body>
</html>  