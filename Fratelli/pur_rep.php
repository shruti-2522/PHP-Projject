<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
 
 <body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-7 form-group"><h2><b>DETAILS OF <i>'<?php echo $_GET['str'];?>'</i></b></h2></div><br><br>
 

   <form method="post">
<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblmultitem where supplier='".$_GET['str']."' and multi_id='".$_GET['str1']."' and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
  <div class="container">
  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-6">


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
     <table class="table" border="1" id="myTable" style="margin-left:-10%; width: 190%">
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
      <td><b>GGST</b></td>
      <td><b>Net Total</b></td>
      <td><b>PHI</b></td>                                                                                                                                                                                          
      <?php 

      $q1=mysqli_query($db,"select * from tblp1 where multi_id=".$_GET['str1']); 
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
}

?>
</table>
   </div>
</div>
</div>
<br><br>
</form>



<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
