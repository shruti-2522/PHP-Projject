<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
</head>
        

 <?php
 if(isset($_GET['id']))
{
	    mysqli_query($db,"DELETE FROM tbljournal WHERE  jid=".$_GET['id']);
     echo 'Deleted successfully.';
 
}
?>
