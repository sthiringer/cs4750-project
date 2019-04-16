<?php
        require_once('/u/sjt7zn/public_html/project/library.php');
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
           mysqli_connect_error());
           return null;
        }
        $sql="INSERT IGNORE INTO guest (fname, lname) VALUES ('$_POST[firstname]', '$_POST[lastname]')";
        if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
?>

<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container text-center">
    <h1> Main Page </h1>
  </div>
  <div class="container text-center" style="margin-top:10%">
    <div class="row justify-content-md-center">
      <div class="col-md-4 p-4">
        <a href="./animals"><button class="btn btn-primary btn-block" type="button">See the animals</button></a>
      </div>
      <div class="col-md-4 p-4">
        <a href="./tours"><button class="btn btn-primary btn-block" type="button">Sign up for a tour</button></a>
      </div>
      <div class="w-100"></div>
      <div class="col-md-4 p-4">
        <a href="./events"><button class="btn btn-primary btn-block" type="button">Browse events</button></a>
      </div>
      <div class="col-md-4 p-4">
        <a href="./exhibits"><button class="btn btn-primary btn-block" type="button">Check out the exhibits</button></a>
      </div>
    </div>
  </div>

</body>
</html>
