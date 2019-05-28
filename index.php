<?php
include 'connection.php';
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];


	$sql = "select * from studentrecord where username='".$username."'
	and password='".$password."'";

	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query,MYSQLI_ASSOC);

   if($row){
   	$_SESSION['id']= $row['id'];
   	$_SESSION['name'] = $row['name'];

   	echo "<script> 
    window.location.href='dashboard.php';
    </script>";
   }
   else{
   	echo "Incorrect username or password";
   }

}

?>

<!DOCTYPE html>
<!-- if script not works this works and this not works script works
header("location : dashboard.php"); -->
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style.css"/>
	<title>CURD LOGIN</title>
</head>
<body>
		<h1>LOGIN TO USE CRUD APPLICATION OR REGISTER</h1>
		<div id="container">
			<form method="post" id="form-box-2">
				<br><br>
				Username : <input type="text" name="username" class="input" placeholder="Enter username">
				<br><br>
				Password : <input type="password" name="password" class="input" placeholder="Enter password">
				<br><br>
				<input type="submit" name="login" value="LOGIN" class="register">
				<br><br>
				<div class="center"><a href="register.php" class="regist">Register yourself</a></div>
			</form>
		</div>
</body>
</html>