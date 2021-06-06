<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}

@media print {
    html, body {
        height: 99%;    
    }
}


</style>
 <?php include 'head.php';?>
   <?php include 'config.php';?>
</head>
<body class="sb-nav-fixed">
    <?php include 'header.php';?>



 <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>

 <?php
$q=mysqli_query($db,"select * from tblmultitem where multi_id=".$_GET['id']);
while ($r1=mysqli_fetch_array($q)) {
  ?>
  <div id="printableArea">
  <div class="container">
<table style="width:70%">
  
  <tr>
    <td rowspan="2">
       <span class="text-success"><b><?php echo $r['farm_name'];?></b></span><br>
         <?php echo $r['addrs'];?><br>
         <?php echo $r['taluka'];?>   <?php echo $r['district'];?><br>
         <?php echo $r['pin_code'];?><br>
          <i class="fa fa-phone" ></i><?php echo $r['phone_no'];?> <i class="fas fa-envelope"></i>
<?php echo $r['email'];?>
</td>
    <td style="border:none;" colspan="2" class="text-center" >Bill No</td>
    <td  style="border: none;" class="text-center" colspan="2">Date</td>
    <td style="border:none;" colspan="2"  class="text-center">Supplier</td>
   
  </tr>
  <tr>
    <td style="border: none;" colspan="2"  class="text-center"><?php echo $r1['bill_no'];?><br></td>
    <td style="border: none;"  class="text-center" colspan="2"><?php echo $r1['date'];?></td>
    <td style="border: none;" colspan="2"  class="text-center"><?php echo $r1['supplier'];?></td>
    
  </tr>
 
</table>
<table  style="width:70%;">
  <tr>
          <td>
            Sr.No
          </td>
          <td>
            Item Name
          </td>
          <td>
            pkg.qty
          </td>
          <td>
            unit
          </td>
          <td>
            NOS
          </td>
          <td>
            Expiry Date
          </td>
          <td>
            Batch No
          </td>
          <td>
            CGST
          </td>
          <td>
            SGST
          </td>
          <td>
            Total
          </td>

        </tr>
          <?php 

      $q1=mysqli_query($db,"select * from tblp1 where multi_id=".$_GET['id']); 
     while ($r2=mysqli_fetch_array($q1)) 
     {

        ?>

         <tr>
          <td>
        1
          </td>
          <td>
             <?php
          echo $r2['item_name'];
        ?>
          </td>
          <td>
            <?php echo $r2['act_qty'];?>
          </td>
          <td>
          <?php echo $r2['act_unit'];?>
   
          </td>
          <td>
            <?php echo $r2['NOF'];?>
          </td>
          <td>
              <?php echo $r2['exp_date'];?>
          </td>
          <td>
           <?php echo $r2['batch_no'];?>
          </td>
          <td>
           <?php echo $r2['CGST'];?>
          </td>
          <td>
             <?php echo $r2['SGST'];?>
          </td>
          <td>
            <?php echo $r2['tot_amount'];?>
          </td>

        </tr>

<?php
}
?>
     

</table>
</div>
</div>
<br><br>

<div style="margin-left:30%;">

<button class="btn btn-success"  onclick="window.location.href='purchase.php'"><b>BACK</b></button>

 <button class="btn btn-success"  onclick="window.location.href='purchase_bill.php?id=<?php echo $r1['multi_id'];?>'"><b>PRINT</b></button>    
</div>
<?php
}
?>
 




<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>

<?php
} 
?>
</body>
</html>
