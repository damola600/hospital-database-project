<?php
include 'dia.php';
$conn = OpenCon();
session_start();

if(isset($_POST['doctor'])) {
		
		$doctorid = $_SESSION['docid'];
		print "<h2>MySQL: Select Patient's Doctor Appointment table data</h2>";
		$result = mysqli_query($conn, "SELECT * FROM patient_doctor_appointment WHERE Docid = $doctorid");
		if (!$result) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}

		$patientArray = array();
		while ($row = $result->fetch_assoc()) {
			array_push($patientArray,$row);
		}

		function createXMLfile($patientArray){
			$filePath = 'appointment.xml';
			$dom = new DOMDocument('1.0','utf-8');
			$root      = $dom->createElement('appointment'); 
			   for($i=0; $i<count($patientArray); $i++){
				 
				 $date        =  $patientArray[$i]['App_date'];  
				 $patientname =  $patientArray[$i]['pname'];
				 $starttime   =  $patientArray[$i]['AppStartTime']; 
				 $endtime     =  $patientArray[$i]['AppEndTime']; 
		 
				 $row = $dom->createElement('row');
				 $row->setAttribute('Appointment', $i);
				 $date     = $dom->createElement('App_date', $date); 
				 $row->appendChild($date);
				 $name     = $dom->createElement('PatientName', $patientname); 
				 $row->appendChild($name); 
				 $starttime = $dom->createElement('StartTime', $starttime); 
				 $row->appendChild($starttime); 
				 $endtime   = $dom->createElement('EndTime', $endtime); 
				 $row->appendChild($endtime); 
			 
				 $root->appendChild($row);
			   }
			   
			   $dom->appendChild($root); 
			   $dom->save($filePath); 
		}

		if(count($patientArray)) {
			createXMLfile($patientArray);
		}

		$result->free();

		CloseCon($conn);

		
		
		if (file_exists('appointment.xml')) {
			$xml = simplexml_load_file('appointment.xml');

			var_dump($xml);
		} else {
			exit('Failed to open appointment.xml.');
		}

		/*echo "<script type='text/javascript'>
						window.location='appointment.xml';
					</script>";*/
		
		}

?>