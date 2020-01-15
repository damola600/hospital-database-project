<?php
include 'dia.php';

$conn = OpenCon();
session_start();

	
	if(isset($_POST['access'])){
		
		if(empty($_POST['did']) || empty($_POST['card'])){
			echo "<script type='text/javascript'>
				alert('No Doctor ID or Patient Card Number');
				window.location='doctor.php';
			</script>";
		} else {
			$docid = $_SESSION['docid'];
			$did = $_POST['did'];
			$card = $_POST['card'];
			
			$result = mysqli_query($conn, "SELECT * FROM incharge_of WHERE Did = '$docid' AND Pcardno = '$card'");
			if (!$result) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();    
			}
			
				$row=mysqli_fetch_array($result);
				$dname = $row['Dname'];
				$pname = $row['Pname'];
				$result1 = mysqli_query($conn, "INSERT INTO incharge_of (Did, Dname, Pcardno, Pname) VALUES ( '$did', '$dname', '$card', '$pname');");
				
				if (!$result1) {
				printf("Error: %s\n", mysqli_error($conn));
				exit();    
				}
				
				echo "<script type='text/javascript'>
					alert('Access Granted');
					window.location='doctor.php';
					</script>";
			
		}
	}
CloseCon($conn);
?>