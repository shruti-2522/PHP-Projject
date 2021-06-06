<!DOCTYPE html>
<html>
<head>
  <title>Plot Details</title>
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
  <?php include('header.php');?>

   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q)) {
  ?>
<div id="printableArea">
  <div class="container">

    <div style="margin-bottom:1px;margin-left: 43%;" class="text-success">
      <?php echo $r1['farm_name'];?>
    </div>
       <div style="margin-left:44%;" class="mt-0">
     <?php echo $r1['addrs'];?>
    </div>
    <div style="margin-left: 43%;" class="mt-0">
     <?php echo $r1['taluka'];?>  <?php echo $r1['district'];?>
    </div>
     <div style="margin-left: 44%;" class="mt-0">
     <?php echo $r1['pin_code'];?>  
    </div>
     <div style="margin-left: 37%;" class="mt-0">
     <i class="fas fa-phone"></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i> <?php echo $r1['email'];?>
    </div>

   
  </div>
    

   <?php
}
?>

 
<br>
   <?php
$q=mysqli_query($db,"select * from plot where pid=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
<table class="table border " border="1px"   style="width:50%;" align="center">
   <tr >

    <td style="border: 1px solid black;">
      Plot No:
    </td>
   <td style="border: 1px solid black;">
      <?php echo $r["plot_no"];?>
    </td>
  </tr>

    <tr >
  <td style="border: 1px solid black;">Plot Name:</td>
     <td style="border: 1px solid black;">
     <?php echo $r["pname"];?>
    </td>
  </tr>

    <tr >
  <td style="border: 1px solid black;">MH Number:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["mh_no"];?>
    </td>
  </tr>

    <tr>
  <td style="border: 1px solid black;">Site:</td>
     <td style="border: 1px solid black;">
     <?php echo $r["site"];?>
    </td>
  </tr>

<tr>
   <td style="border: 1px solid black;">Soil Type:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["soil_type"];?>
    </td>
  </tr>

    <tr>
    <td style="border: 1px solid black;">Year Of Plantation:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["plantation_year"];?>
    </td>
  </tr>

  <tr>
   <td style="border: 1px solid black;">Fruit  Name:</td>
     <td style="border: 1px solid black;">
     <?php echo $r["fruit_name"];?>
    </td>
  </tr>


   <tr>
   <td style="border: 1px solid black;">Variety:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["variety"];?>
    </td>
  </tr>

 


<tr>
    <td style="border: 1px solid black;">Spacing:</td></font>
     <td style="border: 1px solid black;">
      <?php echo $r["sp1"];?> X <?php echo $r["sp2"];?>
    </td>
  </tr>


  <tr>
   <td style="border: 1px solid black;">No. Of Plants:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["vines"];?>
    </td>
  </tr>

 
  <tr>
   <td style="border: 1px solid black;">Structure:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["stucture"];?>
    </td>

  </tr>
   <tr >
   <td style="border: 1px solid black;">Area:</td>
     <td style="border: 1px solid black;">
    <?php echo $r["area"];?>
    </td>
  </tr>

     <tr>
    <td style="border: 1px solid black;">Harvesting days:</td>
     <td style="border: 1px solid black;">
     <?php echo $r["harvesting_days"];?> days
    </td>
  </tr>
 
<tr>
    <td style="border: 1px solid black;">Source Of Water:</td>
    <td style="border: 1px solid black;">
     <?php echo $r["water_source"];?>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid black;">Gat No:</td>
    <td style="border: 1px solid black;">
     <?php echo $r["gat_no"];?>
    </td>
  </tr>
    <tr >
     <td style="border: 1px solid black;">Motor:</td>
       <td style="border: 1px solid black;">
     <?php echo $r["motor"];?>
    </td>
  </tr>

  <tr >
    <td style="border: 1px solid black;">Lateral Type:</td>
    <td style="border: 1px solid black;">
    <?php echo $r["lateral"];?>
    </td>
  </tr>
<tr >
     <td style="border: 1px solid black;">Type Of Dripper:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["dripper"];?>
    </td>
  </tr>


   
   <tr>
    <td style="border: 1px solid black;">Drip Discharge:</td>
   <td style="border: 1px solid black;">
      <?php echo $r["discharge"];?> <?php echo $r["unit"];?>
    </td>
  </tr>

    <tr>

  <td style="border: 1px solid black;">Number Of Dripper Per Plant:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["no_of_drip"];?>
    </td>

  </tr>
  


<br>

</table>


  </div>
</div>

<div class="text-center">

<button class="btn btn-success"  onclick="window.location.href='plot.php'">BACK</button></td>  

  <button class="btn btn-success" onclick="printDiv('printableArea')">PRINT!!</button>
</div>
 <?php
}?>


  <br>
 




<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>
<?php include('footer.php');?>
</body>

</html>