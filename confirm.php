<?php
	include 'dia.php';

	$conn = OpenCon();
	session_start();
	
	$date = $_POST['date'];
	$sqldate=date("Y-m-d",strtotime($date));
	$health = $_SESSION['card'];
	
	if(isset($_POST['confirm'])){



		$stime = $_POST['stime'];
		$etime = $_POST['etime'];
		$dname = $_POST['doc'];
		$did = $_POST['did'];

		$result = mysqli_query($conn, "INSERT INTO appointment (App_date, AppStartTime, AppEndTime, Docid, Pcardno, AppRoomno) VALUES ( '$sqldate', '$stime', '$etime', '$did', '$health', '101');");
				if (!$result) {
				printf("Error: %s\n", mysqli_error($conn));
				exit();    
				}
		}

	echo "<script type='text/javascript'>
					alert('Appointment Saved');
					window.location='patient.html';
				</script>";
				
				
	CloseCon($conn);
?>