<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
</head>
        

 <?php
 if(isset($_GET['id']))
{

	$q=mysqli_query($db,"select * from tbldissession where d_id=".$_GET['id']);
	 $r=mysqli_fetch_array($q);
	 $sum=0;
	 $q1=mysqli_query($db,"select * from tblp1 where item_name='".$r['item_name']."'");
	 $r1=mysqli_fetch_array($q1);	
	 $sum=$r1['reduce_qty']+$r['aqty'];
	// echo $sum;
     mysqli_query($db,"update tblp1 set reduce_qty='$sum' where item_name='".$r['item_name']."'"); 
	 
     mysqli_query($db,"DELETE FROM tbldissession WHERE d_id=".$_GET['id']);
     echo 'Deleted successfully.';


 
}
?>
