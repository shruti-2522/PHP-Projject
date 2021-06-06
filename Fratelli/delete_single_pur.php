<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
</head>
         <?php
 if(isset($_GET['id']))
{
   

     mysqli_query($db,"DELETE FROM tblp1 WHERE id=".$_GET['id']);
     echo 'Deleted successfully.';
 
}
?>
