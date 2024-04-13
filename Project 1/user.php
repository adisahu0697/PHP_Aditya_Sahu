<?php
include("connection.php");
session_start();
if(!isset($_SESSION["uid"])){
  header("location:login.php");
}

$qry="SELECT * from `notice` order by id desc limit 5";
$result=mysqli_query($connect,$qry);
$rows=mysqli_num_rows($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notice Card</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
   
  <div class="card">
    
    <div class="card-header bg-info text-white">
      Notice
    </div>
    
    <div class="card-body">
      <h5 class="card-title">Important Information</h5>

      <marquee direction="up" onmouseover="this.stop()" onmouseout="this.start()">
   

      <ul> <?php
      if($rows>0){
         while($data=mysqli_fetch_assoc($result)){
           ?><li style="line-height:50px;"><?php echo $data["notice"]; ?></li>
      <?php  }

         }
         else{
          ?><li style="line-height:50px;"><?php echo "No Notice Found"; ?></li>
          <?php
         } 
         ?>
        
      </ul>  </marquee>
     
    </div>
    <div class="card-footer">
      <small class="text-muted">Posted on <?php  
       if($rows>0){
          mysqli_data_seek($result, 0); // Reset the internal pointer to fetch the first row
          $time_data=mysqli_fetch_assoc($result); // Fetch the first row
          echo $time_data["time"];
       }
       else{
           echo "not";
       } ?></small>
     
    </div>
  </div>
</div>
<div class="container">
<div class="row">
    <div style="margin-left:500px;margin-top:20px;" class="col-md-4">
    <button class="btn btn-primary"><a href="logout.php" style="color:white;">Log Out</a></button>



    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
