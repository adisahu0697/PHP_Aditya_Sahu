<?php
include("connection.php");
session_start();
$id=$_SESSION["uid"];
$qry="SELECT * from `student` where `id`='$id'";
$result=mysqli_query($connect,$qry);

$data=mysqli_fetch_assoc($result);

if(isset($_POST["reset_btn"])){
  $un=$_POST["username"];
  $cont=$_POST["phone"];

  if($un==$data["fullname"] && $cont==$data["phoneno"] ){
  
    
    $data["password"] = generateRandomString(10); 
    $npwd= mb_convert_encoding($data["password"], 'UTF-8');
        
      ?> <script>alert("<?php echo "Your new password is:".$npwd;?>"); </script> <?php
    
    
} else {
    echo "Username and/or phone number do not match our records.";
}
}


function generateRandomString($length = 10) {
$characters = '0123ABCDEFG';
$randomString = '';
for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
}
return $randomString;
}

  






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        input[type="text"], input[type="tel"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
      
       
        h1 {
            text-align: center;
        }
        a{
            text-decoration:none;
            
            color:white;
        }
        
    </style>
</head>
<body>
    <div class="card">
        <h1>User Form</h1>
        <form id="userForm" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="phone">Phone:</label><br>
            <input type="tel" id="phone" name="phone"  placeholder="Format: 123-456-7890" required><br>
            <button type="button" class="btn btn-success" ><a href="logout.php">Log Out</a></button>
            <button type="submit"name="reset_btn" class="btn btn-success" >Reset</button>
           
        </form>
    </div>
</body>
</html>

</body>
</html>
