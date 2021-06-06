
</head>
<!DOCTYPE html>
<html>
<head>
  <?php include('head.php');?>
  <?php include('config.php');?>




</style>
</head>

  <title></title>

<body>
  <br>
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
</table>

<br>

 <table class="table border " border="1px" align="center">
  <th style="border: 1px solid black;">Item Name</th>
  <th style="border: 1px solid black;">Item Type</th>
  <th style="border: 1px solid black;">Ingredient</th>
  <th style="border: 1px solid black;">PHI</th>
  <th style="border: 1px solid black;">MR</th>
  <th style="border: 1px solid black;">Dose</th>
  <th style="border: 1px solid black;">Pest</th>
  <th style="border: 1px solid black;">Company</th>
 
 
<?php
$q=mysqli_query($db,"select * from tblitem where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
 
   <tr>
   <td style="border: 1px solid black;"><?php echo $r["item_name"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["item_type"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["ingredient"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["PHI"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["MRI"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["dose"];?> <?php echo $r["runit"];?>
    <td style="border: 1px solid black;"><?php echo $r["pest"];?></td>
    <td style="border: 1px solid black;"><?php echo $r["company"];?></td>
  

  </tr>
<?php

}?>
</table>
</div>
 </div>
</div>

<br><br>

<div class='row'>
  <div style="margin-left:45%"></div>
<div class='col-sm-2'><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></div>


</div>


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

  
