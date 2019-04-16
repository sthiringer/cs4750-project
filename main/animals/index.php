<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

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
   require_once('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
     echo("Can't connect to MySQL Server. Error code: " .
     mysqli_connect_error());
     return null;
   }
   $sql_entries = "SELECT COUNT(*) AS num FROM Animal";
   $row = mysqli_fetch_array($result));
   mysqli_close($con);
   return $row['num'];
}

function getPctEndangered()
{
   require_once('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
     echo("Can't connect to MySQL Server. Error code: " .
     mysqli_connect_error());
     return null;
   }
   $sql_entries = "SELECT (SELECT COUNT(*) FROM animal WHERE conservation_status NOT LIKE 'Least Concern')/count(*) * 100 as pctEndangered FROM animal";
   $row = mysqli_fetch_array($result));
   mysqli_close($con);
   //Format decimal place
   return $row['pctEndangered'];
}


?>

</body>
</html>
