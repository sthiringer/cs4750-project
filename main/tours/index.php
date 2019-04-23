<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="/~sjt7zn/project/jquery-3.4.0.min.js"></script>
</head>
<body>
<style>
  html { margin-left: calc(100vw - 100%); }
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



  <div class="container text-center mt-5">
    <h1>Tours</h1>
  </div>
  <div class="container-flex text-center mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-5 p-4 mr-4 border-right border-bottom rounded">
        <p>The zoo currently has <b class="text-success" style="font-size:24px"><?php echo getNum(); ?></b> tours to sign up for!</p>
      </div>
      <div class="col-md-5 p-4 ml-4 border-left border-bottom rounded">
        <p>The shortest tour being offered is <b class="text-success" style="font-size:24px"><?php echo getShortestTour()[0]; ?></b>, at <b class="text-success" style="font-size:24px"><?php echo number_format(getShortestTour()[1]); ?></b> minutes! Efficient!</p>
      </div>
      <div class="w-100"></div>
      <div class="col-md-5 p-4 mr-4 border-top border-right rounded">
        <p>How descriptive! Looks like <b class="text-success" style="font-size:24px"><?php echo number_format(getPctToursWithTourInName()); ?>%</b> of our tours have the word <b class="text-success" style="font-size:24px">tour</b> in them.</p>
      </div>
      <div class="col-md-5 p-4 ml-4 border-left border-top rounded">
        <p>Our oldest (least recently added) tour is <b class="text-success" style="font-size:24px"><?php echo getOldestTour(); ?></b>.</p>
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
   $sql = "SELECT COUNT(*) AS num FROM tour";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return $row['num'];
}

function getShortestTour()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT tour_name as name, (TIME_TO_SEC(end_time) - TIME_TO_SEC(start_time))/60 as length FROM tour WHERE end_time-start_time=(SELECT MIN(end_time-start_time) FROM tour LIMIT 1)";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   //Format decimal place
   return array($row['name'], $row['length']);
}

function getPctToursWithTourInName()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT (SELECT COUNT(*) FROM tour WHERE tour_name LIKE '%Tour%')/count(*) * 100 as pct FROM tour";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return $row['pct'];
}

function getOldestTour()
{
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = "SELECT tour_name FROM tour WHERE tour_id=(SELECT min(tour_id) FROM tour) LIMIT 1";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return $row['tour_name'];
}
?>
