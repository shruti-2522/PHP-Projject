<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>
  

</head>
<body class="sb-nav-fixed">

<?php  include('header.php');?>


<div id="printableArea">
  <div class="container ">

 <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q)) {
  ?>


    <div style="margin-left: 42%;margin-bottom:1px;" class="text-success">
      <?php echo $r1['farm_name'];?>
    </div>
       <div style="margin-left: 43%;" class="mt-0">
     <?php echo $r1['addrs'];?>
    </div>
    <div style="margin-left: 42%;" class="mt-0">
     <?php echo $r1['taluka'];?>  <?php echo $r1['district'];?>
    </div>
     <div style="margin-left: 43%;" class="mt-0">
     <?php echo $r1['pin_code'];?>  
    </div>
     <div style="margin-left: 37%;" class="mt-0">
     <i class="fas fa-phone"></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i> <?php echo $r1['email'];?>
    </div>

   
  </div>
    

   <?php
}
?>

<br>




<?php
$q=mysqli_query($db,"select * from tblgrowth1 where gr_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>

<table class="table" style="width:80%;margin-left: 10%;">

<tr style="border:hidden;">
     <td><b>Plot No:</b><?php echo $r["plot_no"];?></td>
     <td><b>Plot Name:</b><?php echo $r["pname"];?></td>
     <td><b>Date:</b><?php echo $r["date"];?></td>
   </tr>

  <tr style="border:hidden;">
      <td><b>Start Time:</b><?php echo $r["stime"];?></td>
     <td><b>End Time:</b><?php echo $r["etime"];?></td>
     <td><b>Duration:</b><?php echo $r["duration"];?></td>
  </tr>

   <tr style="border:hidden;">
      <td><b>Days After Prunning:</b><?php echo $r["days_after_prunning"];?></td>
      <td><b>Equipment Used:</b><?php echo $r["equipment_used"];?></td>
       <td><b>Operated By Worker:</b><?php echo $r["worker_name"];?></td>
  </tr>

   <tr style="border:hidden;">
      <td><b>Water PH:</b><?php echo $r["water_ph"];?></td>
      <td><b>Method Of Application:</b><?php echo $r['moa'];?></td>
       <td><b>Water Used:</b><?php echo $r["water_used"];?></td>
  </tr>


   <tr style="border:hidden;">
      <td><b>Temperature:</b><?php echo $r["temp"];?> days</td>
      <td><b>Humidity:</b><?php echo $r['humidity'];?></td>
      
  </tr>


   
  
 </table>
    <table class="table" border="1" id="myTable" style="width:78%;margin-left: 10%;">
  <tr>
    <td><b>Growth Regulator Name</b></td>
    <td><b>PPM</b></td>
    <td><b>Actual Quantity[gm]</b></td>
     <td><b>Water</b></td>
    <td><b>Used Solvent</b></td>
    <td><b>Quantity</b></td>
     <td><b>Unit</b></font></td></tr>
      <?php

       $q1=mysqli_query($db,"select * from tblgrowthsession where gr_id=".$r['gr_id']); 
          while ($r1=mysqli_fetch_array($q1)) 
          {

        ?>
        <tr>
     <td>
    <font color="black">
        <?php
          echo $r1['gr_name'];
        ?>
      </font>
    </td>
      <td>
        <font color="black">
      <?php echo $r1['ppm'];?>
    </font>
    </td>
     <td>
        <font color="black">
      <?php echo $r1['Aqty'];?>
    </font>
    </td>      <td>
      <font color="black">
      <?php echo $r1['water'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['used_solvent'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['Aquantity'];?>
    </font>
    </td>  
    <td>
      <font color="black">
      <?php echo $r1['act_unit'];?>
    </font>
    </td>

  </tr>

  <?php
    }
?>
</table>
</div></div>
   


    
  <div style="margin-left:41%;">
<button type="button" class="btn btn-success" onclick="printDiv('printableArea')">PRINT!!</button></div>




    <?php
  }?>
 
<br><br>

<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>
<script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 


</body>
  </html>