<?php
include("connection.php");
session_start();
$id=$_SESSION["uid"];
$qry="SELECT * from `student` where `id`='$id'";
$result=mysqli_query($connect,$qry);

$data=mysqli_fetch_assoc($result);

if(isset($_POST["change_btn"])){

  $cpwd= md5($_POST["cpwd"]);


  if($cpwd == $data["password"]){
    $npwd=md5($_POST["npwd"]);
    $rpwd=md5($_POST["rpwd"]);
    if($npwd==$rpwd){
       $qry="UPDATE `student` SET `password`='$npwd' WHERE `id`='$id'";
       $result=mysqli_query($connect,$qry);
       ?> <script> alert("password changed");</script> <?php
     
    }
    else{
      ?> <script> alert("password does not match");</script> <?php
    }

  }
  
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navigation Bar with Dropdown</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Change password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<div class="container mx-0">
  <div class="row">
    <div class="col-md-3">
     <ul class="list-group">
       <li class="list-group-item "><a href="#account" data-toggle="tab">Account</a></li>
          <li class="list-group-item"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
            <li class="list-group-item"><a href="#changepwd" data-toggle="tab">change password</a></li>
                 <li class="list-group-item"><a href="#edit" data-toggle="tab">edit profile</a></li>
                 <li class="list-group-item"><a href="logout.php" >log out</a></li>
     </ul>
   </div>
   <div class="col-md-9">
        <div class="col-md-5">
        <div class="tab-content">
        <div id="account" class="tab-pane">
            <h1> Account setting related page</h1>
        </div>
        <div id="dashboard" class="tab-pane">
            <h1> dashboard</h1>
        </div>
        <div id="changepwd" class="tab-pane">
        <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">Change Password</h4>
          <form method="post">
            <div class="form-group">
              <label for="currentPassword">Current Password</label>
              <input type="password" name="cpwd"class="form-control" id="currentPassword" placeholder="Enter current password">
            </div>
            <div class="form-group">
              <label for="newPassword">New Password</label>
              <input type="password" name="npwd" class="form-control" id="newPassword" placeholder="Enter new password">
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm New Password</label>
              <input type="password" name="rpwd"  class="form-control" id="confirmPassword" placeholder="Re-enter new password">
            </div>
            <button type="submit" name="change_btn" class="btn btn-primary btn-block">Change Password</button>
          </form>
        </div>
      </div>


        </div>
        <div id="edit " class="tab-pane">
            <h1>edit profile </h1>
        </div>
     </div>
       
    </div>
 </div>
</div>


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
