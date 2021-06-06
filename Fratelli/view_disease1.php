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

<?php
$q=mysqli_query($db,"select * from tbldisease1 where did=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>

      <h3 style="margin-left:1%;">DISEASE APPLICATION</h3>
<table class="table" style="width:80%;">
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
</div>

 <table class="table " border="1" id="myTable" style="width: 85%;margin-left:3%;border-color: black;">
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


<div style="margin-left:40%">
<button class="btn btn-success" onclick="window.location.href='disease.php'"><b>BACK</b></button>
 <button class="btn btn-success"  onclick="window.location.href='disease_report.php?id=<?php echo $r['did'];?>'"><b>PRINT</b></button></div>

<?php
}
?>
</div>



<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>

<?php  include('footer.php');?>

</body>
</html>