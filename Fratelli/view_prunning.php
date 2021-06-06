<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>
  

</head>
<body class="sb-nav-fixed">
  <?php  include('header.php');?>
    <h4><b>PRUNNING DETAILS</b></h4>

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

 
<br>



<table class="table border " border="1px"   style="width:42%;margin-left: 4%;" >

 <?php
$q=mysqli_query($db,"select * from tblprunning where prunning_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>


  <tr class="header">
     <tr>
     <td style="border: 1px solid black;">Plot No:</td>
     <td style="border: 1px solid black;"><?php echo $r["plot_no"];?></td>
  </tr>


 <tr>
    <td style="border: 1px solid black;">Plot Name:</td>
    <td style="border: 1px solid black;"><?php echo $r["plot_name"];?></td>
    </tr>

    <tr>
    <td style="border: 1px solid black;">Prunning Type:</td>
    <td style="border: 1px solid black;"><?php echo $r["prunning_type"];?></td>
  </tr>

  <tr>
    <td style="border: 1px solid black;">Date:</td>
     <td style="border: 1px solid black;"><?php echo $r["date"];?></td>
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
     <td style="border: 1px solid black;"><?php echo $r["duration"];?> Hour</td>
  </tr>

  <tr>
    <td style="border: 1px solid black;">Climate:</td>
    <td style="border: 1px solid black;"><?php echo $r["climate"];?></td>
  </tr>

  <tr>
   <td style="border: 1px solid black;">Temperature:</td>
   <td style="border: 1px solid black;"><?php echo $r["temp"];?></td>
  </tr>

<tr>
    <td style="border: 1px solid black;">Name  Of Labour:</td>
    <td style="border: 1px solid black;"><?php echo $r["worker_name"];?></td>
  </tr>
  
  <tr>
  <td style="border: 1px solid black;">Total Wages:</td>
  <td style="border: 1px solid black;"><?php echo $r["tot_wages"];?></td>
  </tr>
    
  

</table>
<br>
<div style="margin-left:18%;">
 
  <button class="btn btn-success" onclick="window.location.href='prunning.php'"><b>BACK</b></button>
  <button class="btn btn-success"  onclick="window.location.href='prunning_report.php?id=<?php echo $r['prunning_id'];?>'"><b>SHOW REPORT</b></button>
</div>
   
    <?php
  }?>
  
<br><br>


<?php include('footer.php');?>
</body>
  </html>