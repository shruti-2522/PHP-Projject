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
            <div class="col-sm-7 form-group"><h2><b>CREDIT NOTE FOR SALES VOUCHER</b></h2></div><br><br>
  <?php
if (isset($_POST["btnreg"])) {
   extract($_POST);

   $a=$_POST['debit'];
   $nar=$_POST['txtnar'];
  
 
  
}
?>

  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><font color="black">Credit</font></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
        <p></p>
                <form  method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="debit" placeholder="Cr">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="txtnar" placeholder="Enter Narration">
                    </div>
                    <button type="submit" class="btn btn-success" name="btnreg"><b>ADD</b></button>
                </form>
            </div>
        </div>
    </div>
</div>


   <form method="post">

<div class="container">
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">

<table style="margin-left: 20%" class="w3-table" width="35%">
  <tr>

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
    <div class="col-sm-6 form-group">
     <font color="black"><b>Invoice No:</b></font>
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
    <td><b>Variety</b></td>
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
     <font color="black">
        <?php
          echo $str_arr[$i];
        ?>
      </font>
    </td>
     <td>
     <font color="black">
        <?php
          echo $v[$i];
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
       <font color="black">
      <?php echo $c[$i];?>
    </font>
    </td>

  </tr>

  <?php
    }
?>
</table>
<div style="margin-left:1%">

<div class="row">
  <div class="col-sm-6 form-group">
    <font color="black"><b>Narration:</b></font>
       <font color="black"><?php echo $r["narration"];?></font>
    </div>
 <div class="col-sm-6 form-group">
     <font color="black"><b>Credit Note:</b></font>
      <font color="black"> <?php echo $a?></font>
    </div>
  </div>
<div class="row">
  <div class="col-sm-6 form-group">    
    <font color="black"><b>Narration For Credit Note:</b></font>
       <font color="black"><?php echo $nar;?></font>
    </div>

    <div class="col-sm-6">
    <font color="black"><b>Total:</b></font>
     <font color="black"> <?php
     $add= $r["total"]+$a;
       echo $add;?> </font>
   </div>
 </div>
</div>
 <?php

   mysqli_query($db,"UPDATE tblsales
     SET total='$add' WHERE sales_no=".$r['sales_no']);
   ?> 


    
<?php
}
?>
</table>

<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
