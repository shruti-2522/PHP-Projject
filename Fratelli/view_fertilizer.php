<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
    <br>
<?php include('header.php');?>

 <?php
$q=mysqli_query($db,"select * from tblfert1 where fert_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>

<h3 style="margin-left:1%;">FERTILIZER DETAILS</h3>
<table class="table" style="width:80%;">
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
 
    <table class="table" border="1" id="myTable" style="width:78%;margin-left: 1%;">
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

 <div style="margin-left:37%;">
 <button class="btn btn-success" onclick="window.location.href='fertilizer.php'"><b>BACK</b></button>
 
  <button class="btn btn-success"  onclick="window.location.href='fertilizer_report.php?id=<?php echo $r['fert_id'];?>'"><b>PRINT</b></button>
</div>


<?php

}?>
</table>




<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
