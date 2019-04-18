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
	   $sql = $con->prepare("INSERT IGNORE INTO animal (name, species, conservation_status, weight) VALUES (?, ?, ?, ?)");
	   $sql->bind_param("ssss", $name, $species, $c_s, $weight);
	   
	   //Set parameters, execute
	   $name = $_POST['animalname'];
	   $species = $_POST['animaltype'];
	   $c_s = $_POST['conservationstatus'];
	   $weight = $_POST['weight'];
	   $sql->execute();
	   
           $sql->close();
	   $con->close();
	   $_SESSION['from'] = 'animal';
           header("Location: ./animalForm.php");
	}
	else{
		echo 'Improper session user type';
	   	$con->close();
	}
?>