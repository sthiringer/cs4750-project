<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The DB Project</title>
  <meta name="ok" content="Project">
  <meta name="project" content="yeah">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
  <div class="container text-center p-3">
    <h1>Welcome to the Zoo!</h1>
    <h5>Maintained by the Hookeepers</h3>
  </div>
<div class="container pt-5">
    <h4>To proceed to the site as a guest, please enter your name below.</h4>
    <form action="main/index.php" method="post">
      <div class="form-group">
	<label for="firstname">First Name: </label><input class="form-control" type="text" name="firstname" id="firstname" required>
      </div>
      <div class="form-group">
	<label for="lastname">Last Name: </label><input class="form-control" id="lastname" type="text" name="lastname" required>
      </div>
      <div class="container text-center p-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  
  <div class="container text-center pt-5">
    <a href="./zookeeper"><button class="btn btn-danger">Zookeeper Admin Portal</button></a>
    <a href="./tourguide"><button class="btn btn-danger">Tour Guide Admin Portal</button></a>
  </div>

</body>
</html>
