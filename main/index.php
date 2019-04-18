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
        if($_POST['login-btn']=='guest') {
   		$sql="INSERT IGNORE INTO guest (fname, lname) VALUES ('$_POST[firstname]', '$_POST[lastname]')";
   		if (!mysqli_query($con,$sql))
   		{
   		die('Error: ' . mysqli_error($con));
   		}
   		mysqli_close($con);
		$_SESSION['user_type'] = 'GUEST';
   		include('guest.html');
   		}
   	else if($_POST['login-btn']=='tourguide') {
                $sql="SELECT * FROM guide WHERE (first_name='$_POST[firstname]' AND last_name='$_POST[lastname]')";
                $res = mysqli_query($con,$sql); 
                if (!$res)
                {
                die('Error: ' . mysqli_error($con));
                }
                mysql_close($con);              
                $row = mysqli_fetch_array($res);
                if (is_null($row)) {
                        echo "Please continue as a guest instead";
                }
                else {
		     $_SESSION['user_type'] = 'TOURGUIDE';
                     //include('tourguide.html');
		     header("Location: ./tourguide.php");
		     die();
                }
        }
   	else if($_POST['login-btn']=='zookeeper') {
   	     $sql="SELECT * FROM zookeeper WHERE (first_name='$_POST[firstname]' AND last_name='$_POST[lastname]')";
   	     $res = mysqli_query($con,$sql); 
   	     if (!$res)
             {
	     die('Error: ' . mysqli_error($con));
             }
   	     mysql_close($con);
   	     $row = mysqli_fetch_array($res); 
   	     if (is_null($row)) {
   	     	echo "Please continue as a guest instead";
   	     }
   	     else 
	     {
		$_SESSION['user_type'] = 'ZOOKEEPER';
		//echo $_SESSION['user_type'];
   	     	include('zookeeper.php');
   	     }
       	}
?>
