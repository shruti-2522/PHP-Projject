<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
   
<?php include('header.php');?>
<div class="col-sm-5 form-group"><h2><b>DRIP OBSERVATION DETAILS</b></h></div>
<br>
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
<?php
$q=mysqli_query($db,"select * from tbldrip where did=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
<table  class="table table-borderless table-condensed table-hover">
   <tr>
    <td>
      <b>Plot No:</b>
    </td>
   <td>
      <?php echo $r["plot_no"];?>
    </td>
  </tr>
    <tr>
  <td><b>Plot Name:</b></td>
     <td>
     <?php echo $r["pname"];?>
    </td>
  </tr>
    <tr>
  <td><b>Date:</b></td>
     <td>
      <?php echo $r["date"];?>
    </td>
  </tr>
    <tr>
  <td><b>Days After Prunning:</b></td>
     <td>
     <?php echo $r["prunning_day"];?> day
    </td>
  </tr>
  <tr>
   <td><b>Start Time:</b></td>
     <td>
     <?php echo $r["stime"];?>
    </td>
  </tr>


   <tr>
   <td><b>End Time:</b></td>
     <td>
      <?php echo $r["etime"];?>
    </td>
  </tr>

  <tr>
   <td><b>Duration:</b></td>
     <td>
      <?php echo $r["duration"];?> Hour
    </td>
  </tr>
    <tr>
    <td> <b>Corrective Measures:</b></td>
     <td>
      <?php echo $r["corrective"];?>
    </td>
  </tr>

 

</table>

  <?php
}?>
</table>
<br><br>
<center><button class="btn btn-success" onclick="window.location.href='drip.php'"><b>BACK</b></button></center>
</div></div></div>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
