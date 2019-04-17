<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container text-center">
    <h1>Animals</h1>
  </div>
  <div class="container-flex text-center mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-5 p-4 mr-4 border-right border-bottom rounded">
        <p>The zoo currently has <b class="text-success" style="font-size:24px"><?php echo getNum(); ?></b> animals.</p>
      </div>
      <div class="col-md-5 p-4 ml-4 border-left border-bottom rounded">
        <p><b class="text-success" style="font-size:24px"><?php echo getPctEndangered(); ?></b>% of our animals are more endangered than 'Least Concern'.</p>
      </div>
      <div class="w-100"></div>
      <div class="col-md-5 p-4 mr-4 border-top border-right rounded">
        <p>Wow! Currently, <b class="text-success" style="font-size:24px"><?php echo getNumAnimalsOverWeight(500); ?></b> animals weigh over 500 pounds.</p>
      </div>
      <div class="col-md-5 p-4 ml-4 border-left border-top rounded">
        <p>Our newest animal is <b class="text-success" style="font-size:24px"><?php echo getNewestAnimal()[0]; ?></b>, a <b class="text-success" style="font-size:24px"><?php echo getNewestAnimal()[1]; ?></b>!</p>
      </div>
    </div>
  </div>

  <div class="container">
    <button class="btn btn-success">Display Table</button>
  </div>

</body>
</html>

<?php
function showTable()
{
	require_once('/u/sjt7zn/public_html/project/library.php');
  $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
  // Check connection
  if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
  }   
        // Form the SQL query (a SELECT query)
        $sql="SELECT * FROM animal";
        $result = mysqli_query($con,$sql);
        // Print the data from the table row by row
        echo "<table class='table table-hover table-bordered'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Animal ID</th>";
        echo "<th>Species</th>";
        echo "<th>Name</th>";
        echo "<th>Weight</th>";
        echo "<th>Conservation Status</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>" . $row['animal_id'] . "</td>";
                   echo "<td>" . $row['species'] . "</td>";
                   echo "<td>" . $row['name'] . "</td>";
                   echo "<td>" . $row['weight'] . "</td>";
                   echo "<td>" . $row['conservation_status'] . "</td>";
                   echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
}

function getNum()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT COUNT(*) AS num FROM animal";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return $row['num'];
}

function getPctEndangered()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT (SELECT COUNT(*) FROM animal WHERE conservation_status NOT LIKE 'Least Concern')/count(*) * 100 as pctEndangered FROM animal";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   //Format decimal place
   return number_format($row['pctEndangered']);
}

function getNumAnimalsOverWeight($weight)
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT COUNT(*) as num FROM animal";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return $row['num'];
}

function getNewestAnimal()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT name, species FROM animal WHERE animal_id=(SELECT max(animal_id) FROM animal) LIMIT 1";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return array($row['name'], $row['species']);
}
?>
