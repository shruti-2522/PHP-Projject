
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
</head>

	<title></title>

<body>
  <br>
    <div id="printableArea">
    <div class="container">


 
    <div class="demo-bg" style="background: url('img/p2.jpg'); no-repeat; background-size: cover; opacity:0.9;"> 
	
		<page size="A4" >
	
 <div class="bg-secondary text-white" style="margin: 0.6rem 
padding:0.6rem "><h2><b>ITEM DETAILS</b></h2></div>

   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>

  <br>

<table class="table">
   <tr style="border: hidden;">
    <td><b>Farm Name:</b>
      <?php echo $r["farm_name"];?></td>
      <td>
       <b>GGN No:</b>
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


  <tr style="border: hidden;">
   
  </tr>

 
  <?php
}
?>
</table>

<br>
<div style="margin-left:%; width: 100%">
 <table class="table" border="1">
  <th>Item Name</th>
  <th>Item Type</th>
  <th>Ingredient</th>
  <th>PHI</th>
  <th>MR</th>
  <th>Dose</th>
  <th>Pest</th>
  <th>Company</th>
 
 
<?php
$q=mysqli_query($db,"select * from tblitem where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
 
   <tr>
   <td><?php echo $r["item_name"];?></td>
    <td><?php echo $r["item_type"];?></td>
    <td><?php echo $r["ingredient"];?></td>
<!--     <td><?php echo $r["qty"];?> <?php echo $r["unit"];?></td> -->
    <td><?php echo $r["PHI"];?></td>
    <td><?php echo $r["MRI"];?></td>
    <td><?php echo $r["dose"];?> <?php echo $r["runit"];?>
    <td><?php echo $r["pest"];?></td>
    <td><?php echo $r["company"];?></td>
  

  </tr>
<?php

}?>
</table>
</div>
 
 <div class="bg text-white  bottomright"><img src="img/PRINT.png" style="height: 75px"></img></div>


</div>

</div>
</div>
<page>
<br><br>

<div class='row'>
  <div style="margin-left:45%"></div>
<div class='col-sm-2'><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></div>


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
<br>
</body>
</html>

  
