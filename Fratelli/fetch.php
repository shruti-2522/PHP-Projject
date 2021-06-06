<?php

//fetch.php;

$data = array();

if(isset($_GET["query"]))
{
 $connect = new PDO("mysql:host=localhost; dbname=dbfarm", "root", "");

 $query = "
 SELECT worker_name FROM tblworker
 WHERE worker_name LIKE '".$_GET["query"]."%' 
 ORDER BY worker_name ASC 
 LIMIT 15
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row["worker_name"];
 }
}

echo json_encode($data);

?>
