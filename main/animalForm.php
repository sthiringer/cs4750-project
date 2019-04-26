<?php
session_start();
//echo $_SESSION['user_type'];
if ($_SESSION['user_type'] != 'ZOOKEEPER'){
   session_destroy();
   //include('../index.php');
   header("Location: ../index.php");
   die();   
}else if($_SESSION['from'] == 'animal'){
   echo '<script language="javascript">';
   echo 'alert("Animal successfully added.")';
   echo '</script>';
   $_SESSION['from'] = '';
   $_SESSION['user_type'] = 'ZOOKEEPER';
}
?>

<html>
<head>
  <meta charset="utf-8">

  <title>Add Animals Page</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body style="background-color:lightgreen;">

<div class="container text-center mt-3 mb-3">
    <h1 class="display-1"><b>New Animal</b></h4>
</div>

<div class="container">
    <form action="addAnimal.php" method="post">
      <div class="form-group">
        <label for="animalname">Animal Name: </label><input class="form-control" type="text" name="animalname" id="animalname" required>
      </div>
      <div class="form-group">
        <label for="animaltype">Animal Type: </label><input class="form-control" type="text" name="animaltype" id="animaltype" required>
      </div>
      <div class="form-group">
        <label for="conservationstatus">Conservation Status: </label><input class="form-control" type="text" name="conservationstatus" id="conservationstatus" required>
      </div>
      <div class="form-group">
        <label for="weight">Weight: </label><input class="form-control" type="text" name="weight" id="weight" required>
      </div>
      <div class="container text-center pt-2">
	<button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    <div class="container text-center p-3">
      <a href="./"><button class="btn btn-danger">Back to Main</button></a>
    </div>

  </div>


</body>
</html>
