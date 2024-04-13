<?php
include("connection.php");

session_start();
if(isset($_SESSION["uid"])){
  header("location:user.php");
}

if(isset($_POST["login_btn"])){
  $eid=$_POST["eid"];
  $pwd=$_POST["pwd"];



$pwd=md5($_POST["pwd"]);

 
   
  $qry="SELECT * from `student` where emailid='$eid' AND password='$pwd'";
  $result=mysqli_query($connect,$qry);
  $rows=mysqli_num_rows($result);
  $data=mysqli_fetch_assoc($result);

  if($rows>0){
       session_start();
       $_SESSION["uid"]=$data["id"];
    header("location:user.php");

  }
  else{
    ?> <script> alert("Invalid username or password");</script> <?php
  }
}




?>









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    body {
      
      background-image: url(images/laptop.jpg);
      background-size: cover;
      background-attachment: fixed;
    }
    .login-box {
      max-width: 400px;
      margin: auto;
      margin-top: 100px;
      padding: 40px;
      border-radius: 10px;
      background-color: #ffffff50;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .signup-link {
      text-align: center;
    }
    label{
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="login-box">
          <h2>Login</h2>
          <form  method="post">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control"name="eid" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control"name="pwd" id="password" placeholder="Password">
            </div>
            <button type="submit" name="login_btn"class="btn btn-primary btn-block">Login</button>
          </form>
          <div class="signup-link" style="font-weight: bold; margin-top: 30px;">
            <p>Don't have an account? <a href="registration.php">Sign Up</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
