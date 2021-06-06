<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/float_style.css">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

</head>
<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2 class="w3-container"><font color="black"><b>ALL LEDGERS</b></font></b></h2>
<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblledger where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>



      <b>
   <center> <a href="edit_led.php?id=<?php echo $r['id'];?>"> <?php echo $r["name"];?></a></center>
    </b><br><br>
    
<?php
}
?>

</div></div>
</table>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>

</body>
</html>