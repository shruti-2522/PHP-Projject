<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>


</head>
<?php include("header.php");?>
<body class="sb-nav-fixed">
 


  <h2 class="container"><font color="black"><b>SALES DETAILS</b></font></b></h2>

  <br>
 <?php //include('reght_sidebar.php');?>
   <form method="post">

<div class="container">
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">


<?php

$q=mysqli_query($db,"select * from tblsales where sid='".$_GET['id']."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
<div class="row">
    <div class="col-sm-6 form-group">
     <font color="black"><b>Sales No.:</b></font>
      <font color="black"><?php echo $r["sales_no"];?></font>
    </div>
    <div class="col-sm-6 form-group">
     <font color="black"><b>Date:</b></font>
      <font color="black"><?php echo $r["date"];?></font>
    </div>
  </div>
   <div class="row">
    <div class="col-sm-6 form-group">     <font color="black"><b>Invoice No:</b></font>
      <font color="black"><?php echo $r["invoice_no"];?></font>
   </div>

<div class="col-sm-6 form-group">
    <font color="black"><b>Purchase  Account name:</b></font>
      <font color="black"><?php echo $r["paccount_name"];?></font>
    </div>
   
     
   
     </div>
   
  

<table class="table" border="1" id="myTable" style="margin-left: 0%; width: 90%">
  <tr class="w3-light-green">
    <td><b>Item Name</b></td>
    <td><b>Item Variety</b></td>
    <td><b>Quantity</b></td>
    <td><b>Unit</b></td>
    <td><b>Rate</b></td>
    <td><b>Amount</b></td></tr>
      <?php 
      $str_arr = explode (",", $r['item_name']); 
       $v = explode (",", $r['variety']); 
      $b = explode (",", $r['qty']);
      $e = explode (",", $r['unit']);
      $d = explode (",", $r['rate']);
      $c = explode (",", $r['amount']);

       for($i=0; $i< count($str_arr); $i++ )
       {
        ?>
        <tr>
     <td>
    
       <font color="black"> <?php
          echo $str_arr[$i];
        ?></font>
    </td>
     <td>
    
       <font color="black"> <?php
          echo $v[$i];
        ?></font>
    </td>
      <td>
        <font color="black">
      <?php echo $b[$i];?></font>
    </td> 
      <td>
        <font color="black">
      <?php echo $e[$i];?></font>
    </td> 
     <td>
      <font color="black"><?php echo $d[$i];?></font>
    </td> 
     <td>
      <font color="black"><?php echo $c[$i];?></font>
    </td>

  </tr>

  <?php
    }
?>
</table>
<div class="container">
 
<div class="row">
  <div style="margin-left:-4%"></div>
  <div class="col-sm-6 form-group">
    <font color="black"><b>Narration:</b></font>
      <font color="black"><?php echo $r["narration"];?></font>
    </div>
  <div style="margin-left:5%"></div> 
 <div class="form-group"></div>
    <font color="black"><b>Total:</b></font>
      <font color="black"><?php echo $r["total"];?></font>
    </div>
  </div>



    
<?php
}
?>
</table>





<?php include('footer.php');?>
</body>
</html>