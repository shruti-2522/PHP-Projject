<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
    <br>
<?php include('header.php');?>

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
$q=mysqli_query($db,"select * from tblfert1 where fert_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>



<table class="table" style="width:80%;margin-left: 10%;">
<tr style="border:hidden;">
     <td><b>Plot No:</b>  <?php echo $r["plot_no"];?></td>
     <td><b>Plot Name:</b>  <?php echo $r["pname"];?></td>
     <td><b>Date:</b>  <?php echo $r["fdate"];?></td>

  </tr>

  <tr style="border:hidden;">
      <td><b>Start Time:</b>  <?php echo $r["stime"];?></td>
     <td><b>End Time:</b>  <?php echo $r["etime"];?></td>
     <td><b>Duration:</b>  <?php echo $r["duration"];?> hour</td>
  </tr>

   <tr style="border:hidden;">
      <td><b>Days After Prunning:</b><?php echo $r["prunning_day"];?> days</td>
     <td><b>Method Of Application</b><?php echo $r["method_app"];?></td>
     <td><b>Equipment Used:</b><?php echo $r["equipment_used"];?></td>
  </tr>

  <tr style="border:hidden;">
      <td><b>Name Of Worker:</b><?php echo $r["worker_name"];?></td>
  </tr>



  <tr>
   
</tr>
 
    <table class="table" border="1" id="myTable" style="width:78%;margin-left: 10%;">
  <tr>
    <td><b>Fertilizer Name</b></td>
    <td><b>Applied Quantity</b></td>
    <td><b>Required Quantity</b></td>
     <td><b>Unit</b></td>
    <td><b>Reason Of Fertigation</b></td>
    </tr>
      <?php 
      $q1=mysqli_query($db,"select * from tblfertsession where fert_id=".$r['fert_id']); 
    while($r1=mysqli_fetch_array($q1))
    {
        ?>
        <tr>
     <td>
    <font color="black">
        <?php
          echo $r1['fert_name'];
        ?>
      </font>
    </td>
      <td>
        <font color="black">
      <?php echo $r1['Aqty_app'];?>
    </font>
    </td>
     <td>
        <font color="black">
      <?php echo $r1['ARec_qty'];?>
    </font>
    </td>      <td>
      <font color="black">
      <?php echo $r1['act_unit'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['fert_reason'];?>
    </font>
    </td>
      

  </tr>

  <?php
    }
?>
</table>
</div>
</div>

 <div style="margin-left:41%;">
<button type="button" class="btn btn-success" onclick="printDiv('printableArea')">PRINT!!</button>
</div>


<?php

}?>
</table>



<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>




<?php //include('reght_sidebar.php');?>
<script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
             
    </body>
</html>
