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
    ),url("animal-background-wallpaper-2.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
  <meta charset="utf-8">

  <title>The DB Project</title>
  <meta name="Welcome Page" content="Project">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<div class="bg">
  <div class="container text-center mt-3 mb-3">
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
	<button type="submit" class="btn btn-primary" name="login-btn" value="guest" style="margin-right:30px;">Continue as Guest</button><button type="submit" class="btn btn-danger" name="login-btn" value="zookeeper" style="margin-right:30px;">Continue as Zookeeper</button><button type="submit" class="btn btn-warning" name="login-btn" value="tourguide">Continue as Tour Guide</button>
	</div>
     </form>
  </div>
</div>
</body>
</html>
