

<?php
session_start();
if ($_SESSION['user_type'] != 'ZOOKEEPER'){
   session_destroy();
   //include('../index.php');
   header("Location: ../index.php");
   die();
}
?>



<html>
<head>
  <meta charset="utf-8">

  <title>Delete Event Page</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

  <div class="container text-center p-3">
    <h4>Enter in the ID to delete for the event here!</h4>
  </div>
  <div class="container">
    <form action="deleteEvent.php" method="post">
      <div class="form-group">
        <label for="eventID">Event ID to delete: </label><input class="form-control" type="text" name="eventID" id="eventID" required>
        </div>
      <div class="container text-center p-3">
        <input class="btn btn-primary" type="submit">
      </div>
    </form>

</body>
</html>
