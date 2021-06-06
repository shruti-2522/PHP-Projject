
</head>
<!DOCTYPE html>
<html>
<head>
  <?php include('head.php');?>
  <?php include('config.php');?>


  <title></title>

<body>
   <div id="printableArea">
    <div class="container">


   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q)) {
  ?>

  <br>

 <div style="margin-bottom:1px;margin-left: 43%;" class="text-success">
      <?php echo $r1['farm_name'];?>
    </div>
       <div style="margin-left:44%;">
     <?php echo $r1['addrs'];?>
    </div>
    <div style="margin-left: 43%;">
     <?php echo $r1['taluka'];?>  <?php echo $r1['district'];?>
    </div>
     <div style="margin-left: 44%;">
     <?php echo $r1['pin_code'];?>  
    </div>
     <div style="margin-left: 37%;" >
     <i class="fas fa-phone"></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i> <?php echo $r1['email'];?>
    </div>

   

 
  <?php
}
?>

  <br><br>
<div>
 <table class="table" style="margin-left:-5%;width:110%" border="1px">
  <th style="border: 1px solid black;">Plot No</th>
  <th style="border: 1px solid black;">Plot Name</th>
  <th style="border: 1px solid black;">Prunning Type</th>
  <th style="border: 1px solid black;">Date</th>
  <th style="border: 1px solid black;">Start Time</th>
  <th style="border: 1px solid black;">End Time</th>
  <th style="border: 1px solid black;">Duration</th>
  <th style="border: 1px solid black;">Climate</th>
  <th style="border: 1px solid black;">Temperature</th>
  <th style="border: 1px solid black;">Name  Of Labour</th>
  <th style="border: 1px solid black;">Total Wages</th>

 
 
<?php
$q=mysqli_query($db,"select * from tblprunning where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
 
   <tr>
    <td style="border: 1px solid black;"><?php echo $r["plot_no"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["plot_name"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["prunning_type"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["date"];?> 
    <td style="border: 1px solid black;"><?php echo $r["stime"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["etime"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["duration"];?> <?php echo $r["runit"];?>
    <td style="border: 1px solid black;"><?php echo $r["climate"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["temp"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["worker_name"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["tot_wages"];?></td>
  

  </tr>


<?php

}?>
</table>
</div>
</div>
</div>
</div>
<br>


<center><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></center>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>
<br>
</body>
</html>

  
