<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
</head>
        

 <?php
 if(isset($_GET['id']))
{
	 
     mysqli_query($db,"DELETE FROM tblledger WHERE id=".$_GET['id']);
     mysqli_query($db,"DELETE FROM tblled_bank WHERE led_id=".$_GET['id']);
     echo 'Deleted successfully.';
 
}
?>
