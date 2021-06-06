
<?php

include('config.php');
//fetch.php

// $connect = new PDO("mysql:host=localhost;dbname=dbfarm", "root", "");

if(isset($_POST["pname"]))
{
	//echo $_POST['from_date'];
 //$query = "select MONTHNAME(date) as month,sum(duration) as dur from tblirrigation where pname='".$_POST['pname']."'  group by MONTH(date)";
	$sql ="select date,MONTHNAME(date) as month,sum(duration) as dur, FLOOR((DAYOFMONTH(date) - 1) / 7) + 1 AS week from tblirrigation where pname='".$_POST['pname']."' group by week(date) order by(date) ";
 // $statement = $connect->prepare($query);
 // $statement->execute();
 // $result = $statement->fetchAll();
	$result=mysqli_query($db, $sql);

 foreach($result as $row)
 {
  $output[] = array(
  	'week' =>$row['week'],
   'month'   => $row["month"],
   'dur'  => floatval($row["dur"])
  );
 }
 echo json_encode($output);
}

?>

