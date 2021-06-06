<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('head.php');?>

	<?php include('config.php');?>
  

</head>
<body class="sb-nav-fixed">
  <?php  include('header.php');?>
    <h2 ><b>PURCHASE DETAILS</b></h2>


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

   <table class="table" border="1" id="myTable" style="margin-left:-2%; width: 45%">
  <tr>
    <th><b>Item Name</b></th>
    <th><b>Purchase Rate</b></th> 
    <th><b>Quantity</b></th>
      <th><b>Unit</b></th>
      <th ><b>Expiry Date</b></font></th>
      <th><b>NOS</b></th>
       <th><b>Batch No</b></th>
       <th><b>Amount</b></th>
       <th><b>GST</b></th>
      <th><b>SGST</b></th>
      <th><b>GGST</b></th>
      <th><b>Net Total</b></th>
      <th><b>PHI</b></th>                                                                                                              
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
      <?php echo $r1['tot_amount'];?>
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
      <?php echo $r1['net_total'];?>
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
<div class="row">
  <div class="col-sm-2"></div>
  <button class="btn btn-success" onclick="window.location.href='purchase.php'"><b>BACK</b></button>
  <div style="margin-left:3%"></div>
  <button class="btn btn-success" onclick="window.location.href='purchase_report1.php?id=<?php echo $r['id'];?>'"><b>PRINT</b></button>
</div></div>

   
    <?php
  }?>
   </div>
</div>
</div>
<br><br>


<?php include('footer.php');?>
</body>
  </html>