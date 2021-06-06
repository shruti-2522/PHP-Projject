



<?php

$connect = new PDO("mysql:host=localhost;dbname=dbfarm", "root", "");

if(isset($_POST["type"]))
{
 if($_POST["type"] == "category_data")
 {
  $query = "
  SELECT * FROM tblstype
  ORDER BY stype ASC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["sid"],
    'name'  => $row["stype"]
   );
  }
  echo json_encode($output);
 }
 else
 {
 $query = "
  SELECT * FROM tblntype
  WHERE sid = '".$_POST["category_id"]."' 
  ORDER BY name_of_sprayer ASC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["nid"],
    'name'  => $row["name_of_sprayer"]
   );
  }
  echo json_encode($output);
  
 }
}

?>