<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
</head>
        

 <?php
 if(isset($_GET['id']))
{
	    mysqli_query($db,"DELETE FROM tblpayment WHERE  pid=".$_GET['id']);
     echo 'Deleted successfully.';
 
}
?>
