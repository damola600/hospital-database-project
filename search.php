<?php
$conn = mysqli_connect("localhost","root","") or die("Error connecting to the database:".mysqli_error());
mysqli_select_db($conn,"hospital") or die(mysqli_error());
$query=$_GET['query'];
$min_length=1;
if(strlen($query) >= $min_length){
	$query=htmlspecialchars($query);
	$query=mysqli_real_escape_string($query);
	$raw_results=mysqli_query("SELECT * FROM doctor WHERE ('Dname' LIKE '%".$query."%') OR ('Dposition' LIKE '%".$query."%') OR ('Did' LIKE '%".$query."%')") or die(mysqli_error());
	  if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['Dname'].$results['Dposition']."</h3>".$results['Did']."</p>";
             
            }
             
        }
		else{
			echo "no result";
		}
}
else{
	echo "Minimum length is".$min_length;
}
?>