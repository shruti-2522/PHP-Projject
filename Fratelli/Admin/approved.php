<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
</head>
 <?php
 if(isset($_GET['id']))
{
	 
     mysqli_query($db,"update tblpolt set status=0 WHERE plot_id=".$_GET['id']);
     echo 'Updated successfully.';
 
}
?>
