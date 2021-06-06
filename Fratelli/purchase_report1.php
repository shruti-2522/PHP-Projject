</head>
<!DOCTYPE html>
<html>
<head>
  <?php include('head.php');?>
  <?php include('config.php');?>

<style type="text/css">
td
{
 padding:0 4px;  
}
.container {width:1700px;
      margin:0 auto;
      padding:10px 25px;
      border:1px solid #ccc;
      background:#fff; }
</style>
  <title></title>

<body>
   <div id="printableArea">
  <div class="container" >
    <div style="background: url('img/prashant.png'); no-repeat; background-size: cover; opacity:;">
 
    <page size="A4"></page>
     <center><img src="img/PRINT.png"  style="height:18%;"></img></center>
 

     <h1 style="margin-left:30%"><b>PURCHASE-ITEM DETAILS</b></h1>

   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
  <div style="margin-left: 20%">
 
<table class="table table-borderless table-condensed table-hover">
   <tr style="border: hidden;">
    <td><b>Farm Name:</b>
      <?php echo $r["farm_name"];?></td>
      <td>
       <b>GGN no:</b>
     <?php echo $r['GGN_no'];?>
    </td>
  </tr>

 <tr style="border: hidden;">
  <td><b>Owner Name:</b>
    <?php echo $r["owner_name"];?>
    </td>
    
    <td><b>Address:</b>
     <?php echo $r["addrs"];?> 
    </td>
   
  </tr>
  
  <tr>
   <td><b>Phone No:</b> 
    <?php echo $r["phone_no"];?>
    </td>
  </tr>
 
  <?php
}
?>
</table>
<br><br>
  <?php
$q=mysqli_query($db,"select * from tblmultitem where multi_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>



<table  class="table table-borderless table-condensed table-hover"  id="myInput">
  <tr class="header">
    <tr>
  <td><b>Bill No:</b></td>
     <td>
     <?php echo $r["bill_no"];?>
    </td>
  </tr>

  <tr>
   <td><b>Date:</b></td>
     <td>
     <?php echo $r["date"];?>
    </td>
  </tr>

  <tr>
   <td> <b>Supplier:</b></td>
     <td>
    <?php echo $r['supplier'];?>
    </td>
  </tr>


   <tr>
   <td><b>Payment Mode:</b></td>
     <td>
      <?php echo $r["payment_mode"];?>
    </td>
  </tr>
</table>
   <!-- <tr>
    <td> <b>HSN:</b></td>
     <td>
      <?php echo $r["HSN"];?>
    </td>
  </tr> -->

   <table class="table" border="1" id="myTable" style="margin-left:-28%;width:130%">
  <tr>
    <td><b>Item Name</b></td>
    <td><b>Purchase Rate</b></td> 
    <td><b>Quantity</b></td>
      <td><b>Unit</b></td>
      <td><b>Expiry Date</b></td>
      <td><b>NOS</b></td>
       <td><b>Batch No</b></td>
      
       <td><b>GST</b></td>
      <td><b>SGST</b></td>
      <td><b>CGST</b></td>
      <td><b>Net Total</b></td>
      <td><b>PHI</b></td>                                                                                                              
      <?php 

      $q1=mysqli_query($db,"select * from tblp1 where multi_id=".$_GET['id']); 
     while ($r1=mysqli_fetch_array($q1)) 
     {

        ?>
        <tr>
     <td>
    <font color="black">
        <?php
          echo $r1['item_name'];
        ?>
      </font>
    </td>
      <td>
        <font color="black">
      <?php echo $r1['purchase_rate'];?>
    </font>
    </td>
     <td>
        <font color="black">
      <?php echo $r1['act_qty'];?>
    </font>
    </td>      <td>
      <font color="black">
      <?php echo $r1['act_unit'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['exp_date'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['NOF'];?>
    </font>
    </td>  
    <td>
      <font color="black">
      <?php echo $r1['batch_no'];?>
    </font>
    </td>

     <td>
      <font color="black">
      <?php echo $r1['GST'];?>
    </font>
    </td>
    <td>
      <font color="black">
      <?php echo $r1['SGST'];?>
    </font>
    </td>
    <td>
      <font color="black">
      <?php echo $r1['CGST'];?>
    </font>
    </td>
    <td>
      <font color="black">
      <?php echo $r1['tot_amount'];?>
    </font>
    </td>
    <td>
      <font color="black">
      <?php echo $r1['PHI'];?>
    </font>
    </td>
  </tr>

  <?php
    }

?>
</table>


 

</table>

</div>
</div>
</div>
</div>


<?php

}?>

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

  
