<!DOCTYPE html>
<html>
<head>
  <title>View Disease</title>
  <?php include('head.php');?>
  <?php include('config.php');?>
   <style>
@media print {
    html, body {
        height: 99%;    
    }
}
</style>
</head>
<body class="sb-nav-fixed">
  <?php  include('header.php');?>


<div id="printableArea">
  <div class="container ">

 <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q)) {
  ?>


    <div style="margin-left: 40%;margin-bottom:1px;" class="text-success">
      <?php echo $r1['farm_name'];?>
    </div>
       <div style="margin-left: 41%;" class="mt-0">
     <?php echo $r1['addrs'];?>
    </div>
    <div style="margin-left: 40%;" class="mt-0">
     <?php echo $r1['taluka'];?>  <?php echo $r1['district'];?>
    </div>
     <div style="margin-left: 41%;" class="mt-0">
     <?php echo $r1['pin_code'];?>  
    </div>
     <div style="margin-left: 36%;" class="mt-0">
     <i class="fas fa-phone"></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i> <?php echo $r1['email'];?>
    </div>

   
  </div>
    

   <?php
}
?>

<br>

   <?php
$q=mysqli_query($db,"select * from tbldisease1 where did=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>

     
<table class="table" style="width:80%;margin-left: 10%;">
  <tr style="border:hidden;">
     <td><b>Plot Name:</b>  <?php echo $r["pname"];?></td>
     <td><b>Date:</b>  <?php echo $r["sdate"];?></td>
     <td><b>Disposal:</b>  <?php echo $r["dor"];?></td>

  </tr>

<tr style="border:hidden;">
     <td><b>Plot No:</b>  <?php echo $r["plot_no"];?></td>
     <td><b>Days after prunning:</b>  <?php echo $r["days_after_prunning"];?> days</td>
     <td><b>Temperature:</b>  <?php echo $r["temp"];?></td>

  </tr>
  <tr style="border:hidden;">
     <td><b>Action:</b>  <?php echo $r["preventive"];?></td>
     <td></td>
     <td><b>Humidity:</b>  <?php echo $r["humidity"];?></td>

  </tr>
  <tr style="border:hidden;">
     <td><b>Equipment:</b>  <?php echo $r["equipment"];?></td>
     <td><b>No.of nozzle:</b>  <?php echo $r["no_of_nozzle"];?></td>
    </tr>

  <tr style="border:hidden;">
     <td><b>Discharge:</b>  <?php echo $r["discharge"];?></td>
     <td><b>Duration:</b>  <?php echo $r["duration"];?> Hour</td>
   </tr>

   <tr>
     <td><b>Water Required:</b> <?php echo $r["water_required"];?></td>
     <td><b>Water Used:</b>    <?php echo $r["water_used"];?></td>
   </tr>

    <tr style="border:hidden;">
     <td><b>Method:</b>  <?php echo $r["moa"];?></td>
     <td><b>Operated By:</b>  <?php echo $r["oworker"];?></td>
   </tr>

  


</table>


 <table class="table " border="1" id="myTable" style="width: 85%;margin-left: 10%;border-color: black;">
  <tr>
    <td><b>Item Name</b></td>
    <td><b>PHI</b></td>
    <td><b>Qty/litre</b></td>
     <td><b>Total Qty</b></td>
    <td><b>Unit</b></td>
    <td><b>Pest/Disease</b></td>
     <td><b>Expiry Date</b></td>
    <td><b>Batch No</b></td>
  
      <?php 
      $q1=mysqli_query($db,"select * from tbldissession where did=".$r['did']); 
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
      <?php echo $r1['phi'];?>
    </font>
    </td>
     <td>
        <font color="black">
      <?php echo $r1['Auqty'];?>
    </font>
    </td>      <td>
      <font color="black">
      <?php echo $r1['Aaqty'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['act_unit'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['disease'];?>
    </font>
    </td>  
    <td>
      <font color="black">
      <?php echo $r1['edate'];?>
    </font>
    </td>
 <td>
      <font color="black">
      <?php echo $r1['bno'];?>
    </font>
    </td>
     
  </tr>

  <?php
    }

?>

</table>

<?php
}
?>
</div>


<div style="margin-left:42%">
<button class="btn btn-success" onclick="window.location.href='disease.php'">BACK</button>
<input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/>
</div>

<br><br>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>

<script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 

</body>
</html>