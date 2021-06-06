<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
</head>
 <?php
 if(isset($_GET['id']))
{
   
     mysqli_query($db,"update tblpolt set status=1 WHERE plot_id=".$_GET['id']);
     echo '<script>alert("Farmer Blocked")</script>';
 
}
?>
