<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1>Welcome to the tour guide admin page</h1>
<h3>Available actions for tour guides are listed here.</h3>

  <h5>Enter information for a tour here!</h5>
  <form class="form-group" action="addTour.php" method="post">
    <p>Tour Name: </p><input style="max-width:25%" class="form-control" type="text" name="tour_name">
    <p>Date: </p><input style="max-width:15%" class="form-control input-sm" type="date" name="date">
    <p>Start Time: </p><input style="max-width:10%" class="form-control input-sm" type="time" name="start">
    <p>End Time: </p><input style="max-width:10%" class="form-control input-sm" type="time" name="end">
    <input class="btn btn-primary" type="submit">
  </form>

</body>
</html>
