<?php 
function get_column($tbl,$col,$id) {
    global $conn;
   $query = "select $col as col from $tbl  where id='$id' ";
   $result=mysqli_query($conn,$query);
   $row = mysqli_fetch_assoc($result);
     return $row['col'];
  }

  function get_tableList($tbl) {
    global $conn;
   $array = array();
   $query = "SELECT * FROM  $tbl  WHERE 1 order by id DESC";
   $result=mysqli_query($conn,$query);
   while($row = mysqli_fetch_object($result)) {
         $array[] = $row;
     }
     return $array;
  }
?>