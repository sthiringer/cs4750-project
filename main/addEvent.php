<?php
	session_start();
        require_once('/u/sjt7zn/public_html/project/library.php');
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
           mysqli_connect_error());
           return null;
        }
	if ($_SESSION['user_type'] == 'ZOOKEEPER'){
           $sql=$con->prepare("INSERT IGNORE INTO event (event_name, date, start_time, end_time, event_location) 
	   VALUES (?, ?, ?, ?, ?)");
	   $sql->bind_param("sssss", $event_name, $date, $start, $end, $location);
        
	   //Prepare vars and execute them
	   $event_name = $_POST['eventname'];
	   $date = $_POST['date'];
	   $start = $_POST['start'];
	   $end = $_POST['end'];
	   $location = $_POST['location'];
	
	   if (!$sql->execute()))
           {	
		exit (
			'Error: ' . mysqli_error($con);
		//	'<script type="text/javascript"> alert("Error: You cannot create an event for a date that has already passed.") </script>';
		);
           }
	   $_SESSION['from'] = 'event';
	   header("Location: ./eventForm.php");
	}else{
	   echo "Improper session user type";
	}
        mysqli_close($con);
?>
