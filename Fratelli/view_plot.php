<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
    <br>
<?php include('header.php');?>
<div class="col-sm-4 form-group"><h2><b>PLOT DETAILS</b></h></div>
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
 <?php
$q=mysqli_query($db,"select * from plot where pid=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
  
<table  class="table table-borderless table-condensed table-hover">
   <tr style="border:hiddden;">
    <td>
      <b>Plot No:</b>
    </td>
   <td>
      <?php echo $r["plot_no"];?>
    </td>
  </tr>
    <tr style="border:hiddden;">
  <td><b>Plot Name:</b></td>
     <td>
     <?php echo $r["pname"];?>
    </td>
  </tr>
    <tr style="border:hiddden;">
  <td><b>MH Number:</b></td>
     <td>
      <?php echo $r["mh_no"];?>
    </td>
  </tr>
    <tr style="border:hiddden;">
  <td><b>Site:</b></td>
     <td>
     <?php echo $r["site"];?>
    </td>
  </tr>
   <td><b>Soil Type:</b></td>
     <td>
      <?php echo $r["soil_type"];?>
    </td>
  </tr>
    <tr style="border:hiddden;">
    <td> <b>Year Of Plantation:</b></td>
     <td>
      <?php echo $r["plantation_year"];?>
    </td>
  </tr>

  <tr>
   <td><b>Fruit  Name:</b></td>
     <td>
     <?php echo $r["fruit_name"];?>
    </td>
  </tr>


   <tr style="border:hiddden;">
   <td><b>Variety:</b></td>
     <td>
      <?php echo $r["variety"];?>
    </td>
  </tr>

  <tr>


<tr style="border:hiddden;">
    <td><b>Spacing:</b></td></font>
     <td>
      <?php echo $r["sp1"];?>X<?php echo $r["sp2"];?>
    </td>
  </tr>


  <tr style="border:hiddden;">
   <td><b>No. Of Plants:</b></td>
     <td>
      <?php echo $r["vines"];?>
    </td>
  </tr>

 
  <tr style="border:hiddden;">
   <td><b>Structure:</b></td>
     <td>
      <?php echo $r["stucture"];?>
    </td>

  </tr>
   <tr style="border:hiddden;">
   <td><b>Area:</b></td>
     <td>
    <?php echo $r["area"];?>
    </td>
  </tr>

     <tr style="border:hiddden;">
    <td> <b>Harvesting days:</b></td>
     <td>
     <?php echo $r["harvesting_days"];?> days
    </td>
  </tr>
 
<tr style="border:hiddden;">
    <td><b>Source Of Water:</b></td>
    <td>
     <?php echo $r["water_source"];?>
    </td>
  </tr>
  <tr style="border:hiddden;">
    <td> <b>Gat No:</b></td>
    <td>
     <?php echo $r["gat_no"];?>
    </td>
  </tr>
    <tr style="border:hiddden;">
     <td><b>Motor:</b></td>
       <td>
     <?php echo $r["motor"];?>
    </td>
  </tr>

  <tr style="border:hiddden;">
    <td><b>Lateral Type:</b></td>
    <td>
    <?php echo $r["lateral"];?>
    </td>
  </tr>
<tr style="border:hiddden;">
     <td><b>Type Of Dripper:</b></td>
     <td>
      <?php echo $r["dripper"];?>
    </td>
  </tr>


   
   <tr style="border:hiddden;">
    <td><b>Drip Discharge:</b></td>
   <td>
      <?php echo $r["discharge"];?> <?php echo $r["unit"];?>
    </td>
  </tr>

    <tr style="border:hiddden;">

  <td><b>Number Of Dripper Per Plant:</b></td>
     <td>
      <?php echo $r["no_of_drip"];?>
    </td>
  </tr>

</table>

<br><br>
  <center><button class="btn btn-success" onclick="window.location.href='plot.php'"><b>BACK</b></button>
 
    <button class="btn btn-success" onclick="window.location.href='plot_report.php?id=<?php echo $r['pid'];?>'"><b>PRINT</b></button></center>
 


  <?php
}?>
</div></div></div>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
