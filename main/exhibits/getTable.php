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
        $sql="SELECT * FROM exhibit";
        $result = mysqli_query($con,$sql);
        // Print the data from the table row by row
	echo "<button id='export' style='margin-top:25px; padding-bottom:9px' class='btn btn-warning btn-sm float-right'><b>Export All as CSV</b></button>";
        echo "<table id='table' class='table table-hover table-bordered'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Exhibit Number</th>";
        echo "<th>Square Feet</th>";
        echo "<th>Exhibit Name</th>";
        echo "</tr>";
        echo "</thead>";
	echo "<tbody>";
        while($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>" . $row['exhibit_number'] . "</td>";
                   echo "<td>" . $row['square_feet'] . "</td>";
                   echo "<td>" . $row['exhibit_name'] . "</td>";
                   echo "</tr>";
        }
	echo "</tbody>";
        echo "</table>";
        mysqli_close($con);
	

?>