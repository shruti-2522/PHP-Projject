<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
</head>
 <?php include('header.php');?>

<body class="sb-nav-fixed">
<h2 style="margin-left:1%;"><b>WATER ANALYSIS DETAILS</b></h2>
<?php
$q=mysqli_query($db,"select * from tblwater where water_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>




<table class="table" style="width:80%;">
<tr style="border:hidden;">
     <td><b>Plot No:</b>   <?php echo $r["plot_no"];?></td>
     <td><b>Plot Name:</b> <?php echo $r["pname"];?></td>
     <td><b>Date:</b>      <?php echo $r["date"];?></td>
   </tr>

   <tr style="border:hidden;">
     <td><b>Days After Prunning:</b>  <?php echo $r["prunning_day"];?></td>
     <td><b>Sample No:</b>             <?php echo $r["sample_no"];?></td>
     <td><b>Purpose of Sample:</b>     <?php echo $r["sample_purpose"];?></td>
   </tr>

 <tr style="border:hidden;">
     <td><b>Quantity Of Sample:</b>    <?php echo $r["sample_qty"];?></td>
     <td><b>Sample Taken By:</b>        <?php echo $r["sample_taken"];?></td>
     <td><b>In the presence of:</b>     <?php echo $r["presence_of"];?></td>
   </tr>

   
    <tr style="border:hidden;">
     <td><b>Sent to Laboratory:</b>  <?php echo $r["lab"];?></td>
     
   </tr>

   
   
    
     <table border="1" class="table" id="myTable" style="margin-left:1%;width: 80%;">
    <tr><td><b>Sr.No</b></td><td><b>Parameter</b></td><td><b>Unit</b></td><td><b>Actual Result</b></td><td><b>Limit</b></td><td><b>Status</b></td></tr>
    <tr><td>1</td><td>PH</td><td>-</td><td> <?php echo $r["ph_act"];?></td><td>6.5-7.5</td><td> <?php echo $r["ph_status"];?></td></tr><tr>
         <td>2</td><td>TDS</td><td>ppm</td><td><?php echo $r["tds_act"];?></td><td>< 500</td><td><?php echo $r["tds_status"];?></td></tr>
            <td>3</td><td>EC</td><td>dS/m</td><td><?php echo $r["ec_act"];?></td><td>< 1.6</td><td><?php echo $r["ec_status"];?></td></tr>
            <td>4</td><td>Calcium as Ca</td><td>ppm</td><td><?php echo $r["ca_act"];?></td><td>< 100</td><td><?php echo $r["ca_status"];?></td></tr>
            <td>5</td><td>Magnesium as Mg</td><td>ppm</td><td><?php echo $r["mg_act"];?></td><td>< 30</td><td><?php echo $r["mg_status"];?></td></tr>
            <td>6</td><td>Carbonate as CaCO3</td><td>ppm</td><td><?php echo $r["co3_act"];?></td><td>Nil</td><td><?php echo $r["co3_status"];?></td></tr>
            <td>7</td><td>Bicarbonate as HCO3</td><td>ppm</td><td><?php echo $r["hco3_act"];?></td><td>< 305</td><td><?php echo $r["hco3_status"];?></td></tr>
            <td>8</td><td>Sodium as Na</td><td>ppm</td><td><?php echo $r["na_act"];?></td><td>< 35</td><td><?php echo $r["na_status"];?></td></tr>
            <td>9</td><td>Cloride as Cl</td><td>ppm</td><td><?php echo $r["cl_act"];?></td><td>< 178</td><td><?php echo $r["cl_status"];?></td></tr>
            <td>10</td><td>Nitrate Nitrogen as NO3-N</td><td>ppm</td><td><?php echo $r["no3n_act"];?></td><td>< 5</td><td><?php echo $r["no3n_status"];?></td></tr>
            <td>11</td><td>Potassium as K</td><td>ppm</td><td><?php echo $r["k_act"];?></td><td>-</td><td><?php echo $r["k_status"];?></td></tr>
            <td>12</td><td>Copper as Cu</td><td>ppm</td><td><?php echo $r["cu_act"];?></td><td>-</td><td><?php echo $r["cu_status"];?></td></tr>
            <td>13</td><td>Boron as B</td><td>ppm</td><td><?php echo $r["b_act"];?></td><td>< 0.7</td><td><?php echo $r["b_status"];?></td></tr>
            <td>14</td><td>SAR(Sodium Absorption Ratio)</td><td>meq/lit</td><td><?php echo $r["sar_act"];?></td><td>< 10</td><td><?php echo $r["sar_status"];?></td></tr>
            <td>15</td><td>RSC(Residual Sodium Carbonate)</td><td>meq/lit</td><td><?php echo $r["rsc_act"];?></td><td>< 1.25</td><td><?php echo $r["rsc_status"];?></td></tr>
       
    </table>
      
  <div style="margin-left:30%">
  <button class="btn btn-success" onclick="window.location.href='water.php'"><b>BACK</b></button>
 
  <button class="btn btn-success"  onclick="window.location.href='water_rep.php?id=<?php echo $r['water_id'];?>'"><b>PRINT</b></button>
</div>
    <?php
  }?>
  
<br>

<br><br>

  
  
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
