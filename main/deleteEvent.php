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
           $sql= $con->prepare("DELETE FROM event WHERE event_id=?");
	   $sql->bind_param("s", $id);

	   $id = $_POST['eventID'];
	   if (!$sql->execute())
           {
		die('Error: ' . mysqli_error($con));
           }
           mysqli_close($con);
	   header("Location: ./deleteForm.php");
	}else{
	   echo "Improper user session type";
	}
	$con->close();
?>