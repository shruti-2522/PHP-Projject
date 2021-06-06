<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

<script>
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>
</head>
 
 <body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-7 form-group"><h2><b>DETAILS OF <i>'<?php echo $_GET['str'];?>'</i></b></h2></div><br><br>

   <form method="post">

<div class="w3-container w3-bordered">
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">

<table style="margin-left: 20%" class="w3-table" width="35%">
  <tr>

<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpurcahse1 where paccount_name='".$_GET['str']."' and pid='".$_GET['str1']."' and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {

  ?>
  <div class="row">
    <div class="col-sm-6 form-group">
     <font color="black"><b>Purchase no:</b></font>
      <font color="black"> <?php echo $r["purchase_no"];?></font>
    </div>
  <div class="col-sm-6 form-group">
      <font color="black"><b>Date:</b></font>
  <font color="black"><?php echo $r["date"];?></font>
    </div>
    </div>
   <div class="row">
    <div class="col-sm-6 form-group">
     <font color="black"><b>Invoice No:</b></font>
      <font color="black"><?php echo $r["invoice_no"];?></font>
    </div>
    <div class="col-sm-6 form-group">
     <font color="black"><b>Purchase  Account name:</b></font>
      <font color="black"><?php echo $r["paccount_name"];?></font>
    </div>
    </div>
    <div class="row">
     <div class="col-sm-6 form-group">
    <font color="black"><b>Payment Mode:</b></font>
     <font color="black"> <?php echo $r["payment_mode"];?></font>
    </div>
    </div>
</table>
<br>
<table class="table" border="1" id="myTable" style="margin-left: 0%; width: 90%">
  <tr class="w3-light-green">
    <td><b>Item  Name</b></td>
    <td><b>Quantity</b></td>
    <td><b>Rate</b></td>
    <td><b>Amount</b></td></tr>
      <?php 
      $str_arr = explode (",", $r['item_name']);  
      $b = explode (",", $r['qty']);
      $d = explode (",", $r['rate']);
      $c = explode (",", $r['amount']);

       for($i=0; $i< count($str_arr); $i++ )
       {
        ?>
        <tr>
     <td>
    <font color="black">
        <?php
          echo $str_arr[$i];
        ?></font>
    </td>
      <td>
      <font color="black"><?php echo $b[$i];?></font>
    </td> 
     <td>
     <font color="black"> <?php echo $d[$i];?></font>
    </td> 
     <td>
      <font color="black"><?php echo $c[$i];?></font>
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
     <font color="black"> <?php echo $r["CGST"];?></font>
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
    
    <br><br>
<?php
}
?>
</table>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
