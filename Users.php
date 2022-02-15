<?php  

include_once('config.php');
session_start();

$fname='';
$lname='';
$cnumber='';
$address='';
$nic='';
$id=0;

?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  	  <style type="text/css">

		body{background-image:url("images/image.jpg");}

		}


		  .topnav {
		    overflow: hidden;
		    background-color: #2e1a3f;
		  }
		  
		  .topnav a {
		    float: left;
		    color: #f2f2f2;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		    font-size: 17px;
		  }
		  .container{
		  	color: #f2f2f2;
		  }
		  .container table{
		  	color: #f2f2f2;
		  	background-color: black;
		  }
		  .topnav a:hover {
		    background-color: #ddd;
		    color: black;
		  }
		  
		  .topnav a.active {
		    background-color: #4CAF50;
		    color: white;
		  }

		  .topnav img{
		      float: right;
		      width:50px;
		  }
		 h1{

		    text-align: center;
		    font-family: Arial, Helvetica, sans-serif;
		    margin-bottom: 0;
		  }
	</style>
		</head>
		<body>
		<div class="topnav">
  			<a class="active" href="#home">Home</a>
 		    <a href="UserRegistration.php">User Registration</a>
 		    <a href="Users.php">Registered Users</a>
  			
  			<a href="#" style="float:right;">About us</a>
  			<a href="#" style="float:right;">Contact</a>
	

	
	    
    
		</div>
			<div class="container">
			<?php 
				$mysqli=new mysqli('localhost','root','','ewis') or die(mysqli_error($mysqli));
				$result =$mysqli->query("SELECT * FROM users") or die(mysqli->error);
				?>
				<div class="row justify-content-center">
			 	<table class="table">
			 		<thead>
			 			<tr>
			 				<th>First Name</th>
			 				<th>Last Name</th>
			 				<th>Contact Number</th>
			 				<th>Address</th>
			 				<th>NIC</th>
			 				<th colspan="5">Action</th>
			 			</tr>
			 		</thead>
			 		<?php  
			 			while ($row= $result->fetch_assoc()):
			 		?>
			 		<tr>
			 			<td><?php echo $row['FirstName'];?></td>
			 			<td><?php echo $row['LastName'];?></td>
			 			<td><?php echo $row['ContactNumber'];?></td>
			 			<td><?php echo $row['Address'];?></td>
			 			<td><?php echo $row['NIC'];?></td>
			 			<td>
			 				<a href="Users.php?delete=<?php echo $row['id'];?>"class="btn btn-warning">Delete</a>

							<a href="Users.php?edit=<?php echo $row['id'];?>"class="btn btn-info">Edit</a>

							<a href="Users.php"class="btn btn-info">Refresh</a>
							<a href="Home.html"class="btn btn-info">Home</a>
			 				

			 				
			 			</td>
			 		</tr>
			 	<?php endwhile; ?>
			 	</table>

			 </div>
			 <?php
				function pre_r($array){
					echo '<pre>';
					print_r($array);
					echo '</pre>';
				}
			 ?>
		<?php
			if(isset($_GET['delete'])){
				$id=$_GET['delete'];
				$mysqli->query("DELETE FROM users WHERE id=$id")or die(mysqli->error());
					$_SESSION['message']="data deleted !!";
					$_SESSION['msg_type']="danger";
					

	}



		?>
		
		<?php
			if(isset($_GET['edit'])){
				$id =$_GET['edit'];
				$result=$mysqli->query("SELECT * FROM users WHERE id=$id")or die($mysqli->error());
					$row=$result->fetch_array();
					$fname=$row['FirstName'];
					$lname=$row['LastName'];
					$cnumber=$row['ContactNumber'];
					$address=$row['Address'];
					$nic=$row['NIC'];

				
			}

		?>


		<div class="container">
		  <h2>Update User Information </h2>
		  <form id = "myForm" name="registration" id="registration"  method="post" action="Users.php" >
		  	<input type="hidden" name="id" value="<?php echo $id;?>">
		    <div class="form-group">
		      <label for="Name">First Name:</label>
		      <input type="text" class="form-control" value="<?php echo $fname;?>" placeholder="Enter Your First Name" name="firstname" required>
		    </div>
		    <div class="form-group">
		      <label for="Last Name">Last Name:</label>
		      <input type="text" class="form-control" id="Last Name" value="<?php echo $lname;?>" placeholder="Enter Your Last Name" name="lastname" required>
		    </div>
		    <div class="form-group">
		      <label for="Contact Number">Contact Number:</label>
		      <input type="Contact" class="form-control" id="Contact Number" value="<?php echo $cnumber;?>" placeholder="Enter Your Contact Number" maxlength="10" name="cnumber" required>
		    </div>
		     <div class="form-group">
		      <label for="Address">Address:</label>
		      <input type="text" class="form-control" id="Address" value="<?php echo $address;?>" placeholder="Enter Your Address" name="address" required>
		    </div>
		     
		    <button type="submit" class="btn btn-default" name="update">Update</button>
		    <input type="reset" value="Reset" class="btn btn-warning">
		  		  </form>


		</div>  
</div>

<! update PHP-->

<?php
if(isset($_POST['update'])){
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$cnumber=$_POST['cnumber'];
	$address=$_POST['address'];
	$id=$_POST['id'];

	$mysqli->query("UPDATE users SET FirstName='$fname',LastName='$lname',ContactNumber='$cnumber',Address='$address' WHERE id=$id") or die($mysqli->error);
	$_SESSION['message']= "updated!";

	
}

?>
		</body>
</html>