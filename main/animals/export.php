<?php
//function exportAsCSV(){
   require('/u/sjt7zn/public_html/project/library.php');
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD,$DATABASE);
   // Check connection
   if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
   }
   $sql = 'SELECT * FROM animal';
   $result = mysqli_query($con,$sql);
   $num_fields = mysqli_num_fields($result);
   $headers = array();
   while($fields = mysqli_fetch_field($result)){
     $headers[] = $fields->name;
   }

   $f = fopen('php://temp', 'wt');
   fputcsv($f, $headers);
   while($row = $result->fetch_array(MYSQLI_NUM)){
     foreach($row as &$val){
       str_replace('"', "", $val);
     }
     fputcsv($f, array_values($row));
   }
   mysqli_close($con);
   $size = ftell($f);
   rewind($f);

   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Content-Length: $size");
   header("Content-type: text/csv");
   header("Content-Disposition: attachment; filename='zoo-animal-data.csv'");
   fpassthru($f);
   exit;
//}
?>