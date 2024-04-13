<?php
include("connection.php");

if(isset($_POST["submit_btn"])){
    
  $notice=$_POST["notice"];
  
  $qry="INSERT INTO `notice`( `notice`) VALUES ('$notice')";

  $result=mysqli_query($connect,$qry);

  if($result){
    ?><script> alert("Noticed"); </script> <?php
  }
  else{
    ?><script> alert("Failed! Try again"); </script> <?php
  }



}







?>














<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Textarea Card</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Some additional styling */
    .card {
      margin: 50px auto;
      max-width: 500px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <form method="post" id="myForm">
          <div class="form-group">
            <label for="textarea">Type notice/news:</label>
            <textarea class="form-control" name="notice"id="textarea" rows="5"></textarea>
          </div>
          <button type="submit" name="submit_btn"class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional, only if you need JavaScript features) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
