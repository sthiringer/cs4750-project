<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="/~sjt7zn/project/jquery-3.4.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<body style="background-color:cornsilk;">
  <style>
  html { margin-left: calc(100vw - 100%);}
  .table thead th{vertical-align: top !important;}
  </style>
  <script>
    function getTable() {
      if($("#tableDisplay").is(":hidden") || $("#tableDisplay").children().length == 0){

        $.ajax({
          url:"./getTable.php",
          success: function(data){
            $("#tableDisplay").hide().html(data).fadeIn(200);
            $('#table').dataTable();
            $('select[name=table_length]').addClass("form-control");
            $('input[type=search]').addClass("form-control");
            $($("label:nth-of-type(1)")[0]).html($($("label:nth-of-type(1)")[0]).children("select"));
            $($("label:nth-of-type(1)")[0]).prepend("Show");
            $($("label:nth-of-type(1)")[0]).css("display", "block").css("float", "left");
            $($("label:nth-of-type(1)")[1]).css("display", "block").css("float", "right");
            $("#tableBtn").html("Hide Table");
            $("#export").click(function() {
              //console.log("clicked!");
              //$.ajax({
              //  type: "POST",
              //  url: "./export.php",
              //}).done(function( msg ) {
                window.location = 'export.php';
              //});
           });
          }
        });
      }else{
        $("#tableDisplay").fadeOut(200);
        $("#tableBtn").html("Display Table");
      }
    }
  </script>

  <div class="container text-center mt-5">
    <h1 class="display-1"><b> Tours </b></h1>
  </div>
  <div class="container-flex text-center mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-5 p-4 mr-4 border-right border-bottom rounded">
        <p>The zoo currently has <b class="text-success" style="font-size:24px"><?php echo getNum(); ?></b> tours to sign up for!</p>
      </div>
      <div class="col-md-5 p-4 ml-4 border-left border-bottom rounded">
        <p>The shortest tour being offered is <b class="text-success" style="font-size:24px"><?php echo getShortestTour()[0]; ?></b> for <b class="text-success" style="font-size:24px"><?php echo number_format(getShortestTour()[1]); ?></b> minutes! Efficient!</p>
      </div>
      <div class="w-100"></div>
      <div class="col-md-5 p-4 mr-4 border-top border-right rounded">
        <p>How descriptive! Looks like <b class="text-success" style="font-size:24px"><?php echo number_format(getPctToursWithTourInName()); ?>%</b> of our tours have the word <b class="text-success" style="font-size:24px">tour</b> in them.</p>
      </div>
      <div class="col-md-5 p-4 ml-4 border-left border-top rounded">
        <p>Our oldest (least recently added) tour is the <b class="text-success" style="font-size:24px"><?php echo getOldestTour(); ?></b>.</p>
      </div>
    </div>
  </div>

  <div class="container text-center pt-5">
    <button id="tableBtn" class="btn btn-success" onclick="getTable()">Display Table</button>
    <a href="../" <button class="btn btn-danger ml-5">Back to Main</button></a>
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
   $sql = 'CALL getNumTours';
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
   $sql = 'CALL getShortestTour';
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
   $sql = 'CALL getPctToursWithTourInName';
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
   
   $sql = 'CALL getOldestTour';
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($con);
   return $row['tour_name'];
}
?>
