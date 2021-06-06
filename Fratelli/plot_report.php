</head>
<!DOCTYPE html>
<html>
<head>
	<?php include('head.php');?>
	<?php include('config.php');?>

<style type="text/css">
.bottomright {
  position: absolute;
  bottom: 8px;
  right: 16px;
 }
</style>
	<title></title>
<body class="sb-nav-fixed" >
<div id="printableArea" >
<div class="container" >
  <div class="demo-bg" style="background: url('img/p2.jpg'); no-repeat; background-size: cover; opacity:0.9;"> 
    <page size="A4" >
  
 
 <div class="bg-secondary text-white" style="margin: 0.6rem 
padding:0.6rem "><h2><b>PLOT DETAILS</b></h2></div>


   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
 
<table class="table" >
   <tr style="border: hidden;">
    <td><b>Farm Name:</b>
      <?php echo $r["farm_name"];?></td>
      <td>
       <b>GGN no:</b>
     <?php echo $r['GGN_no'];?>
    </td>

  <td><b>Owner Name:</b>
    <?php echo $r["owner_name"];?>
    </td>
    
    <td><b>Address:</b>
     <?php echo $r["addrs"];?> 
    </td>
  
   <td><b>Phone No:</b> 
    <?php echo $r["phone_no"];?>
    </td>
  </tr> 
  <?php
}
?>
</table>
<br><br>
 <div style="margin-left:14%; width: 70%">
 <table class="table" border="1">
<?php
$q=mysqli_query($db,"select * from plot where pid=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
 
   <tr>
    <td>
      <b>Plot No:</b></td>
   <td>
      <?php echo $r["plot_no"];?>
    </td>
  </tr>
 
 <tr>
  <td><b>Plot Name:</b></td>
    <td>
     <?php echo $r["pname"];?>
    </td>
  </tr>

 <tr>
  <td><b>MH Number:</b></td>
     <td>
      <?php echo $r["mh_no"];?>
    </td>
  </tr>

<tr>
  <td><b>Site:</b></td>
     <td>
     <?php echo $r["site"];?>
    </td>
  </tr>

  <tr>
   <td><b>Soil Type:</b></td>
     <td>
      <?php echo $r["soil_type"];?>
    </td>
  </tr>

  <tr>
    <td> <b>Year Of Plantation:</b></td>
     <td>
      <?php echo $r["plantation_year"];?>
    </td>
  </tr>

  <tr>
   <td><b>Fruit  Name:</b></td>
     <td>
     <?php echo $r["fruit_name"];?>
    </td>
  </tr>

  <tr>
   <td><b>Variety:</b></td>
     <td>
      <?php echo $r["variety"];?>
    </td>
  </tr>

 

<tr>
    <td><b>Spacing:</b></td></font>
     <td>
      <?php echo $r["sp1"];?>X<?php echo $r["sp2"];?>
    </td></tr>
<tr>
   <td><b>No. Of Plants:</b></td>
     <td>
      <?php echo $r["vines"];?>
    </td>
  </tr>

 
  <tr>
   <td><b>Structure:</b></td>
     <td>
      <?php echo $r["stucture"];?>
    </td></tr>
<tr>
   <td><b>Area:</b></td>
     <td>
    <?php echo $r["area"];?>
    </td>
  </tr>

     <tr>
    <td> <b>Harvesting days:</b></td>
     <td>
     <?php echo $r["harvesting_days"];?> days
    </td>
  </tr>

 <tr>
    <td><b>Source Of Water:</b></td>
    <td>
     <?php echo $r["water_source"];?>
    </td>
  </tr>
  <tr>
    <td> <b>Gat No:</b></td>
    <td>
     <?php echo $r["gat_no"];?>
    </td>
  </tr>
  
  <tr>
     <td><b>Motor:</b></td>
       <td>
     <?php echo $r["motor"];?>
    </td>
  </tr>

  <tr>
    <td><b>Lateral Type:</b></td>
    <td>
    <?php echo $r["lateral"];?>
    </td>
  </tr>
 
 <tr>
     <td><b>Type Of Dripper:</b></td>
     <td>
      <?php echo $r["dripper"];?>
    </td>
  </tr>
<tr>
    <td><b>Drip Discharge:</b></td>
   <td>
      <?php echo $r["discharge"];?> <?php echo $r["unit"];?>
    </td>
  </tr>
  
<tr>

  <td><b>Number Of Dripper Per Plant:</b></td>
     <td>
      <?php echo $r["no_of_drip"];?>
    </td>
  </tr>
<?php

}?>
</table>


<div class="bg  bottomright">
  <img src="img/PRINT.png" style="height: 75px;"></img>
</div>


</div>

</div>
</div>
</div>

<page>
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

  
