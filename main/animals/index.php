<html>
4<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="/~sjt7zn/project/jquery-3.4.0.min.js"></script>
<script src="/~sjt7zn/project/table2CSV.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<body>
  <style>
  html { margin-left: calc(100vw - 100%);}
  .table thead th{vertical-align: top;}
  </style>
  <script>
    
    </script>
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
          }
        });
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

  <div class="container text-center pt-5">
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
        <p>Our newest animal is <b class="text-success" style="font-size:24px"><?php echo getNewestAnimal()[0]; ?></b>, a <b class="text-success" style="font-size:24px"><?php echo getNewestAnimal()[1] . "!"; ?></b></p>
      </div>
    </div>
  </div>

  <div class="container text-center pt-5">
    <button id="tableBtn" class="btn btn-success mr-5" onclick="getTable()">Display Table</button>
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
