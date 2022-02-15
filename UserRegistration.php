<?php
include_once('config.php');


if(isset($_POST['submit']))
{
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$cnumber=$_POST['cnumber'];
$address=$_POST['address'];
$nic=$_POST['nic'];

$query=mysqli_query($con,"insert into users(FirstName,LastName,ContactNumber,Address,NIC) values('$fname','$lname','$cnumber','$address','$nic')");
if($query)
{
	echo "<script>alert('Successfully Registered');</script>";
	
}
}
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
		    .container{
		  	color: #f2f2f2;
		  }
		  .topnav a {
		    float: left;
		    color: #f2f2f2;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		    font-size: 17px;
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
<?php

if (isset($_SESSION['message'])):
?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
	echo $_SESSION['message'];
	unset($_SESSION['message']);
?>
</div><?php endif ?>
<br><br><br>
		<div class="container">
		  <h2>User Registration </h2>
		  <form id = "myForm" name="registration" id="registration"  method="post" >
		    <div class="form-group">
		      <label for="Name">First Name:</label>
		      <input type="text" class="form-control" id="Name" placeholder="Enter Your First Name" name="firstname" required>
		    </div>
		    <div class="form-group">
		      <label for="Last Name">Last Name:</label>
		      <input type="text" class="form-control" id="Last Name" placeholder="Enter Your Last Name" name="lastname" required>
		    </div>
		    <div class="form-group">
		      <label for="Contact Number">Contact Number:</label>
		      <input type="Contact" class="form-control" id="Contact Number" placeholder="Enter Your Contact Number" maxlength="10" name="cnumber" required>
		    </div>
		     <div class="form-group">
		      <label for="Address">Address:</label>
		      <input type="text" class="form-control" id="Address" placeholder="Enter Your Address" name="address" required>
		    </div>
		     <div class="form-group">
		      <label for="NIC">NIC:</label>
		      <input type="text" class="form-control" id="NIC" placeholder="Enter Your NIC Number" maxlength="10" name="nic" required>
		    </div>
		    <button type="submit" class="btn btn-submit" name="submit">Submit</button>
		    <input type="reset" value="Reset" class="btn btn-warning">
		    <a href="Home.html"class="btn btn-info">Home</a>

		    
		  		  </form>


		</div>  
		
		
	</body>
</html>