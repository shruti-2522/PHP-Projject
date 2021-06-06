<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('head.php');?>

	<?php include('config.php');?>
	

</head>
<body class="sb-nav-fixed">

<?php  include('header.php');?>
<?php
$q=mysqli_query($db,"select * from tblgrowth1 where gr_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
<h4 style="margin-left:1%;">GROWTH REGULATOR DETAILS</h4>
<table class="table" style="width:80%;">

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
    <table class="table" border="1" id="myTable" style="width:78%;margin-left: 1%;">
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
   


    
<div style="margin-left:30%;">
  <div class="col-sm-4"></div>
  <button class="btn btn-success" onclick="window.location.href='growth_regulator.php'"><b>BACK</b></button>
  <button class="btn btn-success" onclick="window.location.href='growth_reg_rep.php?id=<?php echo $r['gr_id'];?>'"><b>PRINT</b></button>
</div></div>



    <?php
  }?>
 
<br><br>

<?php include('footer.php');?>
</body>
  </html>