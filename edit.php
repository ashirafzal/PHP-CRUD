<?php
    include 'connection.php';

    $connect = mysqli_connect('localhost','root','','student');

    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];
        $query = mysqli_query($connect,"Select id,name,username,password,email,phone,adress from studentrecord where id = $id ");
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		
		
		if($row){
			$_SESSION['id']= $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['phone'] = $row['phone'];
			$_SESSION['adress'] = $row['adress'];
		}
		else{
			
			echo "Error";
		}

    }

    if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
	
		$sql = "update studentrecord set name = '".$name."', username = '".$username."', password = '".$password."', email = '".$email."',phone = '".$phone."',adress = '".$address."' where id = '".$id."' ";
		
		$query=mysqli_query($con,$sql);
		if($query){
		  header("location: dashboard.php");
		  echo "Success";
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
		<title>Student Record</title>
	</head>
	<body>
    <h1>EDIT RECORD</h1>
        <div id="container">
            <form method="post" enctype="multipart/form-data" id="form-box">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" class="input" required/>
                    Name : <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" class="input" required/> <br/><br/>
                    Username : <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" class="input" required/> <br/><br/>
                    Password : <input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" class="input" required/> <br/><br/>
                    Email : <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"  class="input" required/> <br/><br/>
                    Phone : <input type="text" name="phone" value="<?php echo $_SESSION['phone']; ?>" class="input"required/> <br/><br/>
                    Address : <input type="text" name="address" value="<?php echo $_SESSION['adress']; ?>" class="input" required/> <br/><br/>
                    <input class="register" type="submit" name="update" value="UPDATE">
                    <button class="back"><a href="dashboard.php">BACK</a></button>
            </form>
        </div>
    </body>
</html>