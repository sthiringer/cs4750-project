<?php
	//echo $_SESSION['user_type'] . 'elo';
        require_once('/u/sjt7zn/public_html/project/library.php');
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
           mysqli_connect_error());
           return null;
        }
	if ($_SESSION['user_type'] == 'ZOOKEEPER'){
	   $sql="INSERT IGNORE INTO animal (name, species, conservation_status, weight) 
	   	VALUES ('$_POST[animal]', '$_POST[type]', '$_POST[consv]', '$_POST[weight]')";
           if (!mysqli_query($con,$sql))
           {
           die('Error: ' . mysqli_error($con));
           }
	   echo '<h1>One new record added to the table.</h1>';
           mysqli_close($con);
	}
	else{
		echo 'Improper session user type';
	}
?>