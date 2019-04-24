
<?php
session_start();
if ($_SESSION['user_type'] != 'TOURGUIDE'){
   session_destroy();
   //include('../index.php');
   header("Location: ../index.php");
   die();
}
?>




<html>
<head>
  <meta charset="utf-8">

  <title>Add Tour Page</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container text-center mt-3 mb-3">
  <h3>Enter information for a tour here!</h3>
</div>

 <div class="container">
  <form action="addTour.php" method="post">
    <div class="form-group">
      <label for="tourname">Tour Name: </label><input class="form-control" type="text" name="tourname" id="tourname" required>
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
    <div class="container text-center p-3">
      <input class="btn btn-primary" type="submit">
      </div>
  </form>
  <div class="container text-center p-3">
    <a href="logout.php"> Go back to Welcome Page </a>
  </div>

</body>
</html>
