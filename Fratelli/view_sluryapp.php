<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('head.php');?>

	<?php include('config.php');?>


</head>
<body class="sb-nav-fixed">

<?php  include('header.php');?>

	<h3 style="margin-left:3%;">SLURRY DETAILS</h2>
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

<?php
$q=mysqli_query($db,"select * from tblsluryapp where sid=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>






<table class="table border " border="1px"  style="width:47%;margin-left: 3%;">
 

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
    <td style="border: 1px solid black;">Prunninng Days:</td>
    <td style="border: 1px solid black;"><?php echo $r["prunning_day"];?></td>
  </tr>
  

   <tr>
    <td style="border: 1px solid black;">Equipment Used:</td>
    <td style="border: 1px solid black;"><?php echo $r["equipment_used"];?></td>
  </tr>


 <tr>
    <td style="border: 1px solid black;">Worker Name:</td>
    <td style="border: 1px solid black;"><?php echo $r["worker_name"];?></td>
  </tr>

 <tr>
    <td style="border: 1px solid black;">Slurry Type:</td>
    <td style="border: 1px solid black;"><?php echo $r["slury_typ"];?></td>
  </tr>

  <tr>
    <td style="border: 1px solid black;">Content:</td>
    <td style="border: 1px solid black;"><?php echo $r["content"];?></td>
  </tr>
     

 <tr>
    <td style="border: 1px solid black;">Unit:</td>
    <td style="border: 1px solid black;"><?php echo $r["unit"];?></td>
  </tr>
     


       

     
           
    
</table>
   <br>
  <div style="margin-left:20%;">
  <button class="btn btn-success" onclick="window.location.href='sluryapp.php'"><b>BACK</b></button>
  <button class="btn btn-success"  onclick="window.location.href='sluryapp_report.php?id=<?php echo $r['sid'];?>'"><b>PRINT</b></button>
</div>
    <?php
  }?>
  
<br><br>
<?php include('footer.php');?>


</body>
  </html>