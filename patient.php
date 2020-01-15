<?php
include 'dia.php';
$conn = OpenCon();
session_start();			
$health = $_SESSION['card'];

$result = mysqli_query($conn, "SELECT * FROM chart WHERE Healthcard_no = '$health'");
if (!$result) {
printf("Error: %s\n", mysqli_error($conn));
exit();
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
<li><a class="active" href="contact.html">Contact Us</a></li>
<li><a class="active" href="booking.php">Book an appointment</a></li>

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
<table border='1'>
            <tr>
				<th>Name</th>
				<th>Health Card Number</th>
				<th>Birth Date</th>
				<th>Doctor's Name</th>
				<th>Complaints</th>
				<th>Diagnosis Abbrv</th>
				<th>Diagnosis Name</th>
				<th>Treatment</th>
			</tr>
    <?php 
        while($row=mysqli_fetch_array($result))
        {
    ?>        
            <tr>
                <td><?php echo $row['Pname']; ?></td>
                <td><?php echo $row['Healthcard_no']; ?></td>
				<td><?php echo $row['Bdate']; ?></td>
				<td><?php echo $row['Dname']; ?></td>
				<td><?php echo $row['complaints']; ?></td>
				<td><?php echo $row['Diag_abbrv']; ?></td>
				<td><?php echo $row['diag_name']; ?></td>
				<td><?php echo $row['treatment_used']; ?></td>
            </tr>
    <?php     
        }
    ?>    
    </table>

</body>
</html>