<?php
include("connection.php");

if(isset($_POST["register_button"])){



  $filename=$_FILES["photo"]["tmp_name"];
  $orgname= $_FILES["photo"]["name"];
  $filesize=$_FILES["photo"]["size"];
  $ext=pathinfo("uploads/$orgname",PATHINFO_EXTENSION);
  $allowtype=array('jpg','png','jpeg');
  if($filesize<=1000000){
      if(in_array($ext,$allowtype)){
          move_uploaded_file(  $filename,"uploads/$orgname");
       }
       else{
          echo"Photo should be in 'jpg','png','jpeg' ";
       }
  }
  else{
      echo "Photo should be 1mb or less";
  }







    $fn=$_POST["fullname"];
    $eid=$_POST["emailid"];
    $cont=$_POST["phoneno"];
    $pwd=md5($_POST["password"]);
    $dob=$_POST["dob"];
    $gen=$_POST["gender"];
    $add=$_POST["address"];
    

  $qry="INSERT INTO `Student`(`id`, `fullname`,`emailid`,`phoneno`, `password`, `dob`, `gender`,`photo`, `address` ) VALUES (null,'$fn','$eid','$cont','$pwd','$dob','$gen','$orgname','$add') ";

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
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      
      background-image: url(images/laptop.jpg);
      background-size: cover;
      background-attachment: fixed;
    }
    .form-container {
      max-width: 800px;
      margin: 0 auto;
      margin-top: 30px;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      background-color: #f8f9fa48;
    }
    label,h2{
      font-weight: bold;
    }
    button{
      margin-left: 300px;
      
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="form-container">
          <h2 class="text-center">Registration Form</h2>
          <form method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control"name="fullname" id="fullname" placeholder="Enter your full name">
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email Address</label>
                <input type="email" class="form-control"name="emailid" id="email" placeholder="Enter your email address">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" name="phoneno"id="phone" placeholder="Enter your phone number">
              </div>
              <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control"name="password" id="password" placeholder="Enter your password">
              </div>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob"class="form-control" id="dob">
              </div>
              <div class="form-group col-md-6">
                <label>Gender</label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" name="gender"type="radio" id="male" value="male">
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                  <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                  <label class="form-check-label" for="other">Other</label>
                </div>
              </div>
               
              
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="photo">Photo</label>
              <input type="file" class="form-control-file" name="photo" id="photo">
            </div>
            
              <div class="form-group col-md-6">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address"></textarea>
              </div>
            </div>
            <button type="submit" name="register_button"class="btn btn-primary btn-lg">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
