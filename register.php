<?php
include 'connection.php';
if (isset($_POST['insert'])) {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	$sql = "Insert INTO studentrecord (name,username,password,email,phone,adress) 
	VALUES ('".$name."','".$username."','".$password."','".$email."','".$phone."','".$address."')";
    
    $query=mysqli_query($con,$sql);
    if($query){
      header("location: index.php");
    }else{
    	echo mysqli_error($con);
    }
 
   
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style.css"/>
	<title>Registered Yourself</title>
</head>
<body>
	<h1>REGISTER YOURSELF TO USE CRUD APPLICATION</h1>
	<div id="container">
		<form method="post" enctype="multipart/form-data" id="form-box">
			<label class="label">Name :</label> <input type="text" name="name" placeholder="Enter name" class="input" required/> <br/><br/>
			Username : <input type="text" name="username" placeholder="Enter username" class="input" required/> <br/><br/>
			Password : <input type="password" name="password" placeholder="Enter password" class="input" required/> <br/><br/>
			Email : <input type="email" name="email" placeholder="Enter email" class="input" required/> <br/><br/>
			Phone : <input type="text" name="phone" placeholder="Enter phone"class="input" required/> <br/><br/>
			Address : <input type="text" name="address" placeholder="Enter address" class="input" required/> <br/><br/>
			<input class="register" type="submit" name="insert" value="REGISTER">
			<button class="back"><a href="index.php">BACK</a></button>
		</form>
	</div>
</body>
</html>