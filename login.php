<?php

include 'dia.php';
$conn = OpenCon();
session_start();                      

if(isset($_POST['doctor'])) {
	if(empty($_POST['doctorid']) || empty($_POST['password'])){//error message if the id is not given 
		echo "<script type='text/javascript'>
			alert('Wrong Username or Password');
			window.location='doctorlogin.html';
		</script>";
	} else{//defining the username and password
		$doctorid = $_POST['doctorid'];
		$password = $_POST['password'];
		$_SESSION['docid'] = $doctorid;
		
		$result = mysqli_query($conn, "SELECT password FROM doctor WHERE Did = $doctorid");
		if (!$result) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();
		}
		$row = mysqli_fetch_array($result);
		
		if($password == $row['password']) {
			echo "<script type='text/javascript'>
				alert('Valid Login');
				window.location='doctor.php';
			</script>";
		} else {
			echo "<script type='text/javascript'>
				alert('Invalid Login');
				window.location='doctorlogin.html';
			</script>";
		}	
	}
	
} else if(isset($_POST['nurse'])){
	if(empty($_POST['nurseid']) || empty($_POST['password'])){//error message if the id is not given 
		echo "<script type='text/javascript'>
			alert('Wrong Username or Password');
			window.location='nurselogin.html';
		</script>";
	}else{//defining the username and password
		$nurseid = $_POST['nurseid'];
		$password = $_POST['password'];
		$_SESSION['nurseid'] = $nurseid;
		
		$result = mysqli_query($conn, "SELECT password FROM nurse WHERE Nid = '$nurseid'");
		if (!$result) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();
		}
		$row = mysqli_fetch_array($result);
		
		if($password == $row['password']) {
			echo "<script type='text/javascript'>
				alert('Valid Login');
				window.location='nurse.html';
			</script>";
		} else {
			echo "<script type='text/javascript'>
				alert('Invalid Login');
				window.location='nurselogin.html';
			</script>";
		}	
	}
} else if(isset($_POST['patient'])){
	if(empty($_POST['card'])){//error message if the id is not given 
		echo "<script type='text/javascript'>
			alert('Wrong Healthcard Number');
			window.location='patientlogin.html';
		</script>";
	}else{//defining the username and password
		$pname = $_POST['pname'];
		$card = $_POST['card'];
		$_SESSION['card'] = $card;
		$result = mysqli_query($conn, "SELECT * FROM patient WHERE Healthcard_no = '$card'");
		if (!$result) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();
		}
		$row = mysqli_fetch_array($result);
		
		if($card == $row['Healthcard_no']) {
			echo "<script type='text/javascript'>
				alert('Valid Login');
				window.location='patient.html';
			</script>";
		} else {
			echo "<script type='text/javascript'>
				alert('Invalid Login');
				window.location='patientlogin.html';
			</script>";
		}	
	}
}
CloseCon($conn);

?>