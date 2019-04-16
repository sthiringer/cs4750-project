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
        $sql="SELECT * FROM event";
        $result = mysqli_query($con,$sql);
        // Print the data from the table row by row
        echo "<table class='table table-hover table-bordered'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Event ID</th>";
        echo "<th>Event Name</th>";
        echo "<th>Date</th>";
        echo "<th>Start Time</th>";
        echo "<th>End Time</th>";
	echo "<th>Event Location</th>";
        echo "</tr>";
        echo "</thead>";
        while($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>" . $row['event_id'] . "</td>";
                   echo "<td>" . $row['event_name'] . "</td>";
                   echo "<td>" . $row['start_time'] . "</td>";
                   echo "<td>" . $row['end_time'] . "</td>";
                   echo "<td>" . $row['date'] . "</td>";
		   echo "<td>" . $row['event_location'] . "</td>";
                   echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
?>



</body>
</html>
