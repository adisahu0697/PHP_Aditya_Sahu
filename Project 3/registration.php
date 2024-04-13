<?php
include("connection.php");

if(isset($_POST["register_btn"])){



    $un=$_POST["username"];
    $cont=$_POST["phone"];
    $pwd=md5($_POST["password"]);
   
    

  $qry="INSERT INTO `Student`(`emailid`,`phoneno`, `password` ) VALUES ('$un','$cont','$pwd') ";

  $result = mysqli_query($connect, $qry);
  if($result){
    ?><script> alert("Registration Successfull"); </script> <?php
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
<title>User Registration</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 400px;
    width: 100%;
  }
  .card-header {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
  }
  .form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
  }
  .btn {
    background-color: #007bff;
    border: none;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
  }
  .btn:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>

<div class="card">
  <div class="card-header"> Registration Form</div>
  <form id="registration-form" method="post">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="email" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
      <small>Format: 1234567890</small>
    </div>
    <button type="submit" name="register_btn" class="btn">Register</button>
  </form>
</div>

</body>
</html>
