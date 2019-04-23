<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="/~sjt7zn/project/jquery-3.4.0.min.js"></script>
</head>
<body>
 <style>
  html { margin-left: calc(100vw - 100%); }
  .table thead th {vertical-align: top; } 
 </style>
  <script>
    function getTable() {
      if($("#tableDisplay").is(":hidden") || $("#tableDisplay").children().length == 0){

        $.ajax({
          url:"./getTable.php",
          success: function(data){
            $("#tableDisplay").hide().html(data).fadeIn(200);
          }
        });
        $("#tableBtn").html("Hide Table");
      }else{
        $("#tableDisplay").fadeOut(200);
        $("#tableBtn").html("Display Table");
      }
    }
  </script>

  <script>
    function exportTable() {
      console.log("i got clicked");
      var csv = $('#table').table2CSV({
          delivery: 'value'
      });
      var a = document.createElement("a");
      a.setAttribute("href", encodeURIComponent(csv));
      a.setAttribute("download", "zoo-data.csv");
      document.body.appendChild(a);
      a.click();
    }
  </script>


  <div class="container text-center mt-5">
    <h1>Events</h1>
  </div>
  <div class="container-flex text-center mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-5 p-4 mr-4 border-right border-bottom rounded">
        <p>The zoo currently has <b class="text-success" style="font-size:24px"><?php echo getNum(); ?></b> events scheduled.</p>
      </div>
      <div class="col-md-5 p-4 ml-4 border-left border-bottom rounded">
        <p>These events are occuring across <b class="text-success" style="font-size:24px"><?php echo getUniqueLocations(); ?></b> locations throughout the zoo.</p>
      </div>
      <div class="w-100"></div>
      <div class="col-md-5 p-4 mr-4 border-top border-right rounded">
        <p><b class="text-success" style="font-size:24px"><?php echo getEventsInPast(); ?></b> events listed have already happened. Time marches on!</p>
      </div>
      <div class="col-md-5 p-4 ml-4 border-left border-top rounded">
        <p>The longest event on record at our zoo is <b class="text-success" style="font-size:24px"><?php echo getLongestEvent()[0]; ?></b>. It lasted for <b class="text-success" style="font-size:24px"><?php echo number_format(getLongestEvent()[1]); ?> HOURS!</b> Incredible.</p>
      </div>
    </div>
  </div>

  <div class="container text-center pt-5">
    <button id="tableBtn" class="btn btn-success" onclick="getTable()">Display Table</button>
    <a href="../" <button class="btn btn-primary ml-5">Back to Main</button></a>
  </div>
  
  <div class="container pt-5" id="tableDisplay">
    
  </div>

</body>
</html>

<?php
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
   $sql = "SELECT COUNT(*) AS num FROM event";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return $row['num'];
}

function getUniqueLocations()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT COUNT(DISTINCT event_location) as num FROM event";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   //Format decimal place
   return number_format($row['num']);
}

function getEventsInPast()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT COUNT(*) as num from event WHERE date < CURDATE()";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return $row['num'];
}

function getLongestEvent()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT (TIME_TO_SEC(end_time)- TIME_TO_SEC(start_time))/3600 AS length, event_name FROM event WHERE end_time-start_time=(SELECT MAX(end_time-start_time) FROM event LIMIT 1)";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return array($row['event_name'], $row['length']);
}
?>
