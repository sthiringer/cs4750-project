<?php
        require_once('/u/sjt7zn/public_html/project/library.php');
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
           mysqli_connect_error());
           return null;
        }
        $sql="DELETE FROM event WHERE event_id= " .$_POST['eventID'];
	if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
?>

<h1>One event deleted from the table.</h1>