<!DOCTYPE html>
<html>
<head>

  <title>View Purchase</title>
  <?php include('head.php');?>
  <?php include('config.php');?>
</head>

  <body class="sb-nav-fixed">
  <?php  include('header.php');?>

 <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
 <div class="container">
  <div class="row">
    <div class="col">
     <h4 class="text-success">Farm Name:<?php echo $r['farm_name'];?></h4>
     <b>Address:</b> <?php echo $r['farm_name'];?></h6><br>

     <b>Taluka:</b>  <?php echo $r['taluka'];?>  <b>District:</b><?php echo $r['district'];?><br>

     <b>Pincode:</b><?php echo $r['pin_code'];?><br>

     <b>Address:</b><?php echo $r['phone_no'];?>  <b>Email:</b><?php echo $r['email'];?>
    </div>
    <div class="col">

      2 of 2
    </div>
  </div>
</div>


  <?php 
}
  ?>
<?php include 'footer.php';?>
</body>
</html>
