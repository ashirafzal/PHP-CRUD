<?php

	include 'connection.php';

	$connect = mysqli_connect('localhost','root','','student');

	if (isset($_GET['id'])) {

		$sql_delete = "delete from studentrecord where id = '" .$_GET['id']."'";
		$query_delete = mysqli_query($con,$sql_delete);

		if($query_delete){
			echo "Deleted";
		}
		else{
			echo mysqli_error($con);
		}
	}

	$users=[];

	$sql="select * from studentrecord";
	$query=mysqli_query($con,$sql);
	while ($row= mysqli_fetch_array($query,MYSQLI_ASSOC)) {
		$users[]=$row;

	}
?>

<!DOCTYPE html>
	<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "style.css"/>
		<title>Student Record</title>
	</head>
	<body>
		<h1>WELCOME TO PHP CRUD</h1>
	<br><br>
	<table id="tb">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Username</th>
				<th>Password</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Delete Record</th>
				<th>Edit Record</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): 
			?>
				  <tr>
				  	<td><?php echo $user['id'] ?></td>
				  	<td><?php echo $user['name'] ?></td>
				  	<td><?php echo $user['username'] ?></td>
				  	<td><?php echo $user['password'] ?></td>
				  	<td><?php echo $user['email'] ?></td>
				  	<td><?php echo $user['phone'] ?></td>
				  	<td><?php echo $user['adress'] ?></td>
				  	<td><button class="delete"><a href="?id=<?php echo $user['id'] ?>">DELETE</a></button></td>
					<td><button class="edit"><a href="edit.php?edit=<?php echo $user['id'] ?>">EDIT</a></button></td>
				  </tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><br>
	<div class="end">
		<button class="logout"><a href="logout.php">LOGOUT</button>
	</div>
	</body>
</html>