<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
   
<?php include('header.php');?>

<br>

   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q)) {
  ?>


    <div style="margin-left: 17%;margin-bottom:1px;" class="text-success">
      <?php echo $r1['farm_name'];?>
    </div>
       <div style="margin-left: 18%;" class="mt-0">
     <?php echo $r1['addrs'];?>
    </div>
    <div style="margin-left: 17%;" class="mt-0">
     <?php echo $r1['taluka'];?>  <?php echo $r1['district'];?>
    </div>
     <div style="margin-left: 18%;" class="mt-0">
     <?php echo $r1['pin_code'];?>  
    </div>
     <div style="margin-left: 11%;" class="mt-0">
     <i class="fas fa-phone"></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i> <?php echo $r1['email'];?>
    </div>

   
  </div>
    

   <?php
}
?>

<?php
$q=mysqli_query($db,"select * from tblirrigation where iid=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
<table class="table border " border="1px"   style="width:42%;margin-left: 4%;">

 <tr>
    <td style="border: 1px solid black;">Plot No:</td>
    <td style="border: 1px solid black;"><?php echo $r["plot_no"];?></td>
  </tr>


<tr>
  <td style="border: 1px solid black;">Plot Name:</td>
  <td style="border: 1px solid black;"><?php echo $r["pname"];?></td>
</tr>

<tr>
  <td style="border: 1px solid black;">Date:</td>
  <td style="border: 1px solid black;"><?php echo $r["date"];?></td>
</tr>

<tr>
  <td style="border: 1px solid black;">Days After Prunning:</td>
  <td style="border: 1px solid black;"> <?php echo $r["prunning_day"];?> days</td>
</tr>

<tr>
  <td style="border: 1px solid black;">Start Time:</td>
  <td style="border: 1px solid black;"><?php echo $r["stime"];?></td>
</tr>

<tr>
   <td style="border: 1px solid black;">End Time:</td>
   <td style="border: 1px solid black;"><?php echo $r["etime"];?></td>
</tr>

<tr>
   <td style="border: 1px solid black;">Duration:</td>
   <td style="border: 1px solid black;"><?php echo $r["duration"];?> hour</td>
 </tr>

<tr>
    <td style="border: 1px solid black;">Moisture Before Irrigation:</td>
    <td style="border: 1px solid black;"><?php echo $r["moisure"];?></td>
</tr>

<tr>
 <td style="border: 1px solid black;">Water Discharge Per Plant:</td>
 <td style="border: 1px solid black;"><?php echo $r["water_dis"];?></td>
</tr>

 <tr>
  <td style="border: 1px solid black;">Pressure Reading:</td>
  <td style="border: 1px solid black;"><?php echo $r["pressure_read"];?></td>
 </tr>

<tr>
  <td style="border: 1px solid black;">Total Water Supplied:</td>
  <td style="border: 1px solid black;"><?php echo $r["tot_water"];?> Litre</td>
  </tr>


<tr>
    <td style="border: 1px solid black;">Temperature:</td>
     <td style="border: 1px solid black;"><?php echo $r["temp"];?></td>
</tr>

<tr>
 <td style="border: 1px solid black;">Remark:</td>
 <td style="border: 1px solid black;"><?php echo $r["remark"];?></td>
  </tr>

</table>

<br>

<div style="margin-left:20%;">
  <button class="btn btn-success" onclick="window.location.href='irrigation.php'"><b>BACK</b></button>
  <button class="btn btn-success"  onclick="window.location.href='irr_rep.php?id=<?php echo $r['iid'];?>'"><b>PRINT</b></button>
 </div> 
 <br>

  <?php
}?>


<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
