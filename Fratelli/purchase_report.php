
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
<div style="margin-left:-5%;width:110%">
 <table class="table" border="1px">
  <th style="border: 1px solid black;">Bill No</th>
  <th style="border: 1px solid black;">Date</th>
  <th style="border: 1px solid black;">Supplier</th>
  <th style="border: 1px solid black;">Payment Mode</th>
  <th style="border: 1px solid black;">Item Name</th>
  <th style="border: 1px solid black;">Purchase Rate</th>
  <th style="border: 1px solid black;">Quantity</th>
  <th style="border: 1px solid black;">NOS</th>
  <th style="border: 1px solid black;">Expiry Date</th>
  <th style="border: 1px solid black;">Batch-No</th>
  
 
<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblp1 where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
 
   <tr>
   <td style="border: 1px solid black;"><?php echo $r["bill_no"];?></td>
   <td style="border: 1px solid black;"><?php echo $r["date"];?></td>
   <td style="border: 1px solid black;"><?php echo $r["supplier"];?></td>
   <td style="border: 1px solid black;"><?php echo $r["payment_mode"];?></td>
   <td style="border: 1px solid black;"><?php echo $r["item_name"];?></td>
   <td style="border: 1px solid black;"><?php echo $r["purchase_rate"];?></td>
   <td style="border: 1px solid black;"><?php echo $r["qty"];?> <?php echo $r["unit"];?></td>
   <td style="border: 1px solid black;"><?php echo $r["NOF"];?></td>
   <td style="border: 1px solid black;"><?php echo $r["exp_date"];?> <?php echo $r["runit"];?>
   <td style="border: 1px solid black;"><?php echo $r["batch_no"];?></td>
  


  </tr>

<?php

}?>
</table>
<br>
</div>
</div>
</div>
</div>
<br>
<div class="text-center"><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></div>
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

  
