<?php
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
        echo "<table id='table' class='table table-hover table-bordered'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Animal ID</th>";
        echo "<th>Species</th>";
        echo "<th>Name</th>";
        echo "<th>Weight</th>";
        echo "<th>Conservation Status <button id='export' onClick='exportTable()' class='btn btn-warning btn-sm float-right'><b>Export as CSV</b></button></th>";
        echo "</tr>";
        echo "</thead>";
	echo "<tbody>";
        while($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>" . $row['animal_id'] . "</td>";
                   echo "<td>" . $row['species'] . "</td>";
                   echo "<td>" . $row['name'] . "</td>";
                   echo "<td>" . $row['weight'] . "</td>";
                   echo "<td>" . $row['conservation_status'] . "</td>";
                   echo "</tr>";
        }
	echo "</tbody>";
        echo "</table>";
        mysqli_close($con);
	

?>