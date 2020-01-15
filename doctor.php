<?php
//include("xml.php");
include 'dia.php';

$conn = OpenCon();
session_start();

$docid = $_SESSION['docid'];

	$result = mysqli_query($conn, "SELECT * FROM incharge_of WHERE Did = '$docid'");
	if (!$result) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();    
	}
	
	if(isset($_POST['access'])){
		
		$did = $_POST['did'];
		$card = $_POST['card'];
		
		$result2 = mysqli_query($conn, "SELECT * FROM incharge_of WHERE Did = '$did' AND Pcardno = '$card'");
		if (!$result2) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();    
		}
	}




CloseCon($conn);
?>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="slideshow.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="hospital1.css">
<!--link rel="stylesheet" href="doctor.css"-->
<title>doctor Website</title>
<style>
.header{
	background-color:white;
	height:102px;
	width:100%;
	border:2px solid black;
	color:white;
	
	
}
label{
	border:1px solid green;
}
</style>
</head>
<body style="background-color:green">
<div id="container-fluid">
<div class="header">
<img src="logo.bmp" alt="logo">
</div>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<ul class="nav navbar-nav">
<li class="active"><a class="active" href="hospital1.html">Home</a></li>
<li><a class="active" href="department.html">Department</a></li>
<li><a class="active" href="contactus.html">Contact Us</a></li>

</ul>
<form class="navbar-form navbar-right" action="search.php" method="GET">
<div class="form-group">
<input type="text" placeholder="Search" name="query" class="form-control">
</div>
<button type="submit" value="search" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
</form>
</div>
</nav>
<img name="slide" width="100%" align="middle" height="500"><br><br>
<div class="btn-group btn-group-lg">
<form action="schedule.php" method="POST" align="center" >
		<input name="schedule" type="submit" value="Schedule" style="padding:30px 60px; font-size:32px" class="btn btn-primary">
		
	</form>
	<form action="xml.php" method="POST" align="center">
		<input name="doctor" type="submit" value="Appointments" style="padding:30px 60px; font-size:32px" class="btn btn-primary">
		
	</form>
</div>
	
	<?php 
        if($row=mysqli_fetch_array($result))
        { 
    ?>      
			<form method="POST" action="access.php">
			<div class="form-group">
			<label>Doctor's ID</label><br>
				<input name="did" type="text" style="padding:30px 60px; font-size:32px"  class="form-control" /><br><br>
				<label>Patient's Health Card No</label><br>
				<input name="card" type="text" style="padding:30px 60px; font-size:32px"   class="form-control" /><br><br>
				<input name="access" type="submit" value="Give Access To Doctor" style="padding:30px 60px; font-size:32px" class="btn btn-primary"/><br><br>
			</form>
			
			<form method='POST' action='retrieve.php'>
				<input type="submit" value="Retrieve Patients' Files" name="retrieve" style="padding:30px 60px; font-size:32px" class="btn btn-primary"/>
			</form>
    <?php     
        }
    ?> 

	
	
</div>


</body>
</html>