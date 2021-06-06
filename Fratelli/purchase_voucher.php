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
            <div class="col-sm-7 form-group"><h2><b>DEBIT NOTE FOR PURCHASE VOUCER</b></h2></div><br><br>
  <?php
if (isset($_POST["btnreg"])) {
   extract($_POST);

   $a=$_POST['debit'];
   $nar=$_POST['txtnar'];
  
  // mysqli_query($db,"update tblcontra(debit,narration)values('$a','$txtnar')")
  
}
?>

  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><font color="black">Debit</font></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
        <p></p>
                <form  method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="debit" placeholder="Dr">
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

<table style="margin-left: 20%" class="table" width="35%">
  <tr>

<?php

$q=mysqli_query($db,"select * from tblpurcahse1 where pid='".$_GET['id']."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
  <div class="row">
    <div class="col-sm-6 form-group">
     <font color="black"><b>Purchase no:</b></font>
      <font color="black"> <?php echo $r["purchase_no"];?></font>
    </div>
  <div class="col-sm-6 form-group">
       <font color="black"><?php echo $r["date"];?></font>
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
     <font color="black"> <?php echo $r["payment_mode"];?></font>
    </div>
   
  </div>
</table>
<br>
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
      $c = explode (",", $r['amount']);
      $e = explode (",", $r['unit']);

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
      <font color="black"><?php echo $e[$i];?></font>
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
      $add= $r["amount1"]-$a;
       echo $add;?></font>
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
<div class="col-sm-6 form-group">
     <font color="black"><b>Debit Note:</b></font>
      <font color="black"><?php echo $a?></font>
    </div>
  </div>
<div class="row">
  <div class="col-sm-6 form-group">
    <font color="black"><b>Narration For Debit Note:</b></font>
     <font color="black"> <?php echo $nar;?></font>
    </div>

    </table>
 <?php

   $ses_id=$_SESSION['plot_id'];
   mysqli_query($db,"UPDATE tblpurcahse1
     SET amount1='$add' WHERE ses_id='".$ses_id."' and purchase_no=".$r['purchase_no']  );


   $sub=$r['cur_bal1']+$a;

  
  mysqli_query($db,"UPDATE tblpurcahse1
     SET cur_bal1='$sub' WHERE ses_id='".$ses_id."' and  purchase_no=".$r['purchase_no']);

     mysqli_query($db,"UPDATE tblledger SET open='$sub' WHERE name='".$r['purchase_ledger']."' and ses_id=".$ses_id); 
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
