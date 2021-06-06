<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include ("head.php");?>
<?php include ("config.php");?>




</head>
<?php include("header.php") ?>
<body class="sb-nav-fixed">
 
 <div class="container">
  <h2 class="w3-container"><font color="black"><b>PURCHASE VOUCHER DETAILS</b></font></b></h2>
</div>

<div align="center">
  </div>
  <br>
 <?php //include('reght_sidebar.php');?>
   <form method="post">

<div class="container">
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">

<table style="margin-left: 20%" class="table" width="35%">
  <tr>

<?php

$q=mysqli_query($db,"select * from tblpurcahse1 where pid='".$_GET['id']."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
  <div class="row">
    <div class="col-sm-6 form-group">
     <font color="black"><b>Purchase no:</b></font>
      <font color="black"><?php echo $r["purchase_no"];?></font>
    </div>
  <div class="col-sm-6 form-group">
     <font color="black"><b>Date:</b></font>
     <font color="black"> <?php echo $r["date"];?></font>
    </div>
    </div>

   <div class="row">
    <div class="col-sm-6 form-group">
     <font color="black"><b>Invoice No:</b></font>
      <font color="black"><?php echo $r["invoice_no"];?></font>
    </div>
     <div class="col-sm-6 form-group">
    <font color="black"><b>Plot Name:</b></font>
      <font color="black"><?php 
      $q1=mysqli_query($db,"select pname from plot where plot_no='".$r['plot_name']."'");
      $r1=mysqli_fetch_array($q1);

      echo $r1["pname"];?></font>
    </div></div>
  <div class="row">
  <div class="col-sm-6 form-group">
     <font color="black"><b>Purchase  Account name:</b></font>
      <font color="black"><?php echo $r["paccount_name"];?></font>
    </div>
    <div class="col-sm-6 form-group">
    <font color="black"><b>Payment Mode:</b></font>
      <font color="black"><?php echo $r["payment_mode"];?></font>
    </div>
   
  </div>
</table>

<table class="table" border="1" id="myTable" style="margin-left: 0%; width: 90%">
  <tr class="w3-light-green">
    <td><b>Item  Name</b></td>
    <td><b>Quantity</b></td>
    <td><b>Unit</b></td>
    <td><b>Rate</b></td>
    <td><b>Amount</b></td></tr>
      <?php 
      $str_arr = explode (",", $r['item_name']);  
      $b = explode (",", $r['qty']);
      $d = explode (",", $r['rate']);
      $e = explode (",", $r['unit']);
      $c = explode (",", $r['amount']);

       for($i=0; $i< count($str_arr); $i++ )
       {
        ?>
        <tr>
     <td>
    
        <font color="black"><?php
          echo $str_arr[$i];
        ?>
      </font>
    </td>
      <td>
        <font color="black">
      <?php echo $b[$i];?>
    </font>
    </td>
     <td>
        <font color="black">
      <?php echo $e[$i];?>
    </font>
    </td>  
     <td>
      <font color="black">
      <?php echo $d[$i];?>
    </font>
    </td> 
     <td>
      <font color="black"><?php echo round($c[$i],2);?></font>
    </td>

  </tr>

  <?php
    }
?>
</table>
<br>
<table class="table">
<div class="row">
  <div class="col-sm-6 form-group">
    <font color="black"><b>Net  Total:</b></font>
      <font color="black"><?php
      echo $r["amount1"];?></font>
    </div>
    <div class="col-sm-6 form-group">
    <font color="black"><b>GST:</b></font>
     <font color="black"><?php echo $r["GST"];?></font>
   </div>
 </div>
 <div class="row">
  <div class="col-sm-6 form-group">
    <font color="black"><b>CGST:</b></font>
      <font color="black"><?php echo $r["CGST"];?></font>
    </div>
  <div class="col-sm-6 form-group">
    <font color="black"><b>SGST:</b></font>
      <font color="black"><?php echo $r["SGST"];?></font>
   </div>
 </div>

<div class="row">
  <div class="col-sm-6 form-group">
    <font color="black"><b>Narration:</b></font>
      <font color="black"><?php echo $r["narration"];?></font>
    </div>

    </table>


    
<?php
}
?>
</table>




<?php include('footer.php');?>

</body>
</html>