<?php


session_start();
if ($_SESSION['user_type'] != 'ZOOKEEPER'){
   session_destroy();
   //include('../index.php');
   header("Location: ../index.php");
   die();
}


?>


<!doctype html>

<html lang="en">
<head>
<style>
body, html {
  height: 100%;
  margin: 0;
  color:white;
}

h1, h3, h4, h5, label{
  color: white;
}

.bg {
  /* The image used */
  background:
    linear-gradient(
      rgba(0, 0, 0, 0.5),
      rgba(0, 0, 0, 0.5)
    ),url("zoo.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>


  <meta charset="utf-8">

  <title>Zookeeper page</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<div class="bg">
  <div class="container text-center pt-3 mb-3">
    <h1>Welcome to the Zookeeper Admin Page!</h1>
  </div>

  <div class="container text-center pt-5">
    <a href="./animalForm.php"><button class="btn" style="background-color:lightgreen">Add Animal</button></a>
    <a href="./eventForm.php"><button class="btn" style="background-color:lightgreen">Add Event</button></a>
    <a href="./deleteForm.php"><button class="btn btn-danger">Delete Event</button></a>
  </div>
  <div class="container text-center p-3">
    <a href="logout.php"><button class="btn btn-danger" type="button">Go Back to the Welcome Page</button></a>
  </div>
</div>
</body>
</html>
