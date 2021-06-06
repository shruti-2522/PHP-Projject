
<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=dbfarm", "root", "");

if(isset($_POST["plot_no"]))
{
	//echo $_POST['from_date'];
 $query = "select MONTHNAME(date) as month,qty_app from tblfertilizer where date BETWEEN '".$_POST["from_date"]."' and '".$_POST['to_date']."' or plot_no='".$_POST['plot_no']."' and fertilizer_name= 'acrobat1'  group by MONTH(date)";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["month"],
   'qty_app'  => floatval($row["qty_app"])
  );
 }
 echo json_encode($output);
}

?>

