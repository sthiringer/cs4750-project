
<?php
session_start();
//echo "user type" . $_SESSION['user_type'];
if ($_SESSION['user_type'] != 'ZOOKEEPER'){
   session_destroy();
   //include('../index.php');
   header("Location: ../index.php");
   die();
}else if($_SESSION['from'] == 'event'){
   echo '<script language="javascript">';
   echo 'alert("Event successfully added.")';
   echo '</script>';
   $_SESSION['from'] = '';
   $_SESSION['user_type'] = 'ZOOKEEPER';
}
?>

<html>
<head>
  <meta charset="utf-8">

  <title>Insert Event Page</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body style="background-color:lightgreen;">
  <div class="container text-center mt-3 mb-3">
    <h1 class="display-1"><b>New Event</b></h4>
  </div>
  <div class="container">
    <form action="addEvent.php" method="post">
      <div class="form-group">
	<label for="eventname">Event Name: </label><input class="form-control" type="text" name="eventname" id="eventname" required>
	</div>
      <div class="form-group">
	<label for="date">Date: </label><input class="form-control" type="date" name="date" id="date" required>
	</div>
      <div class="form-group">
	<label for="start">Start Time: </label><input class="form-control" type="time" name="start" id="start" required>
	</div>
      <div class="form-group">
	<label for="end">End Time: </label><input class="form-control" type="time" name="end" id="end" required>
	</div>
      <div class="form-group">

	<label for="location">Location: </label>
	       <!-- <input class="form-control" type="number" name="location" id="location" required> -->
	       <select name="location" required class="form-control" data-dropup-auto="false">
  	       	       <option value="">Select...</option>
  		       <option value="1">Location 1</option>
  		       <option value="2">Location 2</option>
		       <option value="3">Location 3</option>
		       <option value="4">Location 4</option>
	       </select>
	</div>
      <div class="container text-center p-3">
	<input class="btn btn-primary" type="submit">
      </div>  
    </form>
    <div class="container text-center p-3">
      <a href="./"><button class="btn btn-danger">Back to Main</button></a>
    </div>

</body>
</html>
