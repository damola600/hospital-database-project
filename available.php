<?php
include 'dia.php';

$conn = OpenCon();
session_start();

if(isset($_POST['pick'])) {
	$date = $_POST['date'];
	$sqldate=date("Y-m-d",strtotime($date));
	$health = $_SESSION['card'];

	$result = mysqli_query($conn, "SELECT * FROM doc_oncall WHERE call_date = '$sqldate'");
	if (!$result) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();    
	}
	
	/*if(isset($_POST['confirm'])){
		
		$stime = $_POST['stime'];
		$etime = $_POST['etime'];
		$dname = $_POST['doc'];
		$did = $_POST['did'];
		
		$result1 = mysqli_query($conn, "INSERT INTO appointment (App_date, AppStartTime, AppEndTime, Docid, Pcardno, AppRoomno) VALUES ( '$sqldate', '$stime', '$etime', '$did', '$health', '101');");
		if (!$result1) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();    
		}
	}*/

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
table tr:not(:first-child){
	cursor: pointer;transition: all .25s ease-in-out;
}
table tr:not(:first-child):hover{background-color: #ddd;}

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
<table id='table' border='1'>
            <tr>
				<th>Doctor ID</th>
				<th>Doctor</th>
				<th>Date</th>
				<th>Start Time</th>
				<th>End Time</th>
			</tr>
    <?php 
        while($row=mysqli_fetch_array($result))
        { $i = 0;
    ?>        
            <tr>
				<td><?php echo $row['Did']; ?></td>
                <td><?php echo $row['Dname']; ?></td>
				<td><?php echo $row['call_date']; ?></td>
                <td><?php echo $row['callStartTime']; ?></td>
				<td><?php echo $row['callEndTime']; ?></td>
				<td><input type="submit" value="Choose" style="padding:30px 60px; font-size:32px"/></td>
            </tr>
    <?php     
        }
    ?>    
    </table>
	
	<form method="POST" action="confirm.php" >
		<input type="hidden" name="date" id="date"><br><br>
		Chosen Start Time:<input type="text" name="stime" id="stime"><br><br>
		Chosen End Time:<input type="text" name="etime" id="etime"><br><br>
		Chosen Doctor<input type="text" name="doc" id="doc"><br><br>
		Chosen Doctor's ID<input type="text" name="did" id="did"><br><br>
		<input type="submit" name="confirm" value="Confirm" /><br><br>
	 </form>
	
	<script>
		var table = document.getElementById('table');
		
		  for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                          document.getElementById("did").value = this.cells[0].innerHTML;
                          document.getElementById("doc").value = this.cells[1].innerHTML;
						  document.getElementById("date").value = this.cells[2].innerHTML;
                          document.getElementById("stime").value = this.cells[3].innerHTML;
						  document.getElementById("etime").value = this.cells[4].innerHTML;
                    };
                }
	</script>
	
	
	
	

</body>
</html>