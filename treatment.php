<?php
include 'dia.php';
$conn = OpenCon();
session_start();
			
$dept = $_SESSION['dept'];

$result = mysqli_query($conn, "SELECT * FROM treatment_file INNER JOIN department ON treatment_file.dnum = department.Dnum WHERE Dep_name = '$dept'");
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

CloseCon($conn);
?>

<html>
<head>
<script src="slideshow.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="hospital1.css">
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
<div id="container">
<div class="header">
<img src="logo.bmp" alt="logo">
</div>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<ul class="nav navbar-nav">
<li class="active"><a class="active" href="hospital1.html">Home</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Departments<span class="no-caret"></span></a>
<ul class="dropdown-menu">
<li><a href="er.php">Emergency </a></li>
<li><a href="oncology.php">Oncology </a></li>
<li><a href="cardiovascular.php">Cardiovascular</a></li>
<li><a href="Neurology.php">Neurology</a></li>
<li><a href="Cardiology.php">Cardiology</a></li>
<li><a href="Anesthesiology.php">Anesthesiology</a></li>
<li><a href="Obstetrics.php">Obstetrics</a></li>
<li><a href="Psychiatry.php">Psychaitry</a></li>
</ul>
<li><a class="active" href="contactus.html">Contact Us</a></li>
</li>
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

<h2> Department and Diagnosis They Treat</h2>
<table border='1'>
			
	<tr>
		<th>Diagnosis</th>
		<th>Treatment</th>
		<th>Department</th>
	</tr>
          
    <?php 
        while($row=mysqli_fetch_array($result))
        {
    ?>        
            <tr>
                <td><?php echo $row['Diag_abbrv']; ?></td>
                <td><?php echo $row['treatment']; ?></td>
				<td><?php echo $row['Dep_name']; ?></td>
            </tr>
    <?php     
        }
    ?>    
    </table>


</body>
</html>