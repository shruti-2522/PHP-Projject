<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
</head>
        

 <?php
 if(isset($_GET['id']))
{
	 
	 $q=mysqli_query($db,"select * from tblgrowthsession where gid=".$_GET['id']);
	 $r=mysqli_fetch_array($q);
	 $q1=mysqli_query($db,"select * from tblp1 where item_name='".$r['gr_name']."'");
	 $r1=mysqli_fetch_array($q1);
	  
	 $sum=$r1['reduce_qty']+$r['quantity'];
	 mysqli_query($db,"update tblp1 set reduce_qty='$sum' where  item_name='".$r['gr_name']."'");  
     mysqli_query($db,"DELETE FROM tblgrowthsession WHERE gid=".$_GET['id']);
     echo 'Deleted successfully.';
 
}
?>
