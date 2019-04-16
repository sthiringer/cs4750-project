<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
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
        echo "<table class='table table-hover table-bordered'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Exhibit Number</th>";
        echo "<th>Exhibit Name</th>";
        echo "<th>Square Feet</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>" . $row['exhibit_number'] . "</td>";
                   echo "<td>" . $row['exhibit_name'] . "</td>";
                   echo "<td>" . $row['square_feet'] . "</td>";
                   echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
?>
</body>
</html>
