<?php
        require_once('/u/sjt7zn/public_html/project/library.php');
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
           mysqli_connect_error());
           return null;
        }
        $sql="INSERT IGNORE INTO event (event_name, date, start_time, end_time, event_location) 
		     VALUES ('$_POST[eventname]', '$_POST[date]', '$_POST[start]', '$_POST[end]', '$_POST[location]')";
        if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
?>
<h1>Added Event</h1>