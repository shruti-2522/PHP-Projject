<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
 <?php include('header.php');?>
<?php include ("autoleaf.php");?>
<?php include ("try3js.php");?>

<body class="sb-nav-fixed">
  <h2 class="w3-container"><b>LEAF PETIOLE DETAILS</b></b></h2>
<?php
$q=mysqli_query($db,"select * from tblpleaf where pleaf_id=".$_GET['id']);
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
</table>

     <table class="table" id="myTable" border="1" style="width: 80%;">
    <tr>
            <tr>
            <td><b>Sr.No</b></td><td><b>Parameter</b></td><td><b>Unit</b></td><td><b>Actual Result</b></td>              <td><b>Period</b> <?php echo $r['strtype']; ?></td>
              <td colspan="4"><b>Status</b></td>
          </tr>
        <?php

          $q1=mysqli_query($db,"select * from tbldropleaf where leaf_type='".$r['strtype']."'");
          $r1=mysqli_fetch_array($q1);
        ?>
          <tr>
            <td colspan=6><b>MEJOR NUTRIENTS</b></td></tr><tr>
              <tr>
            <td>1</td><td>Total Nitrogen as N</td><td>%</td><td><?php echo $r['nitro_act']?></td><td id="lnitro"><?php echo $r1['l1']; ?></td><td><?php echo $r['nitro_status']?></td></tr>

            <td>2</td><td>Nitrate Nitrogen as NO3-N</td><td>dS/m</td><td><?php echo $r['no3n_act']?></td><td id="lno3n"><?php echo $r1['l2']; ?></td><td><?php echo $r['no3n_status']?></td></tr>

            <td>3</td><td>Ammonical Nitrogen as NH4-N</td><td>%</td><td><?php echo $r['nh4n_act']?></td><td id="lnh4n"><?php echo $r1['l3']; ?></td><td><?php echo $r['nh4n_status']?></td></tr>
            
            <td>4</td><td>Phosphorus as P</td><td>ppm</td><td><?php echo $r['p_act']?></td><td id="lp"><?php echo $r1['l4']; ?></td><td><?php echo $r['p_status']?></td></tr>
            
            
            
            <td>5</td><td>Potassium as K</td><td>ppm</td><td><?php echo $r['k_act']?></td><td id="lk"><?php echo $r1['l5']; ?></td><td><?php echo $r['k_status']?></td></tr>
            
            <td colspan=6><b>SECONDARY NUTRIENTS</b></td></tr><tr>
            <td>6</td><td>Calcium as Ca</td><td>ppm</td><td><?php echo $r['ca_act']?></td><td id="lca"><?php echo $r1['l6']; ?></td><td><?php echo $r['ca_status']?></td></tr>
            
            <td>7</td><td>Magnesium as Mg</td><td>ppm</td><td><?php echo $r['mg_act']?></td><td id="lmg"><?php echo $r1['l7']; ?></td><td><?php echo $r['mg_status']?></td></tr>
            
            <td>8</td><td>Sulphur as S</td><td>ppm</td><td><?php echo $r['s_act']?></td><td id="ls"><?php echo $r1['l8']; ?></td><td><?php echo $r['s_status']?></td></tr>

            <td colspan=6><b>MICRO NUTRIENTS</b></td></tr><tr>
            
            <td>9</td><td>Ferrous as Fe</td><td>ppm</td><td><?php echo $r['fe_act']?></td><td id="lfe"><?php echo $r1['l9']; ?></td><td><?php echo $r['fe_status']?></td></tr>
            
             <td>10</td><td>Manganese as Mn</td><td>ppm</td><td><?php echo $r['mn_act']?></td><td id="lmn"><?php echo $r1['l10']; ?></td><td><?php echo $r['mn_status']?></td></tr>
            
            <td>11</td><td>zinc as Zn</td><td>ppm</td><td><?php echo $r['zn_act']?></td><td id="lzn"><?php echo $r1['l11']; ?></td><td><?php echo $r['zn_status']?></td></tr>
            
            <td>12</td><td>Copper as Cu</td><td>ppm</td><td><?php echo $r['cu_act']?></td></td><td id="lcu"><?php echo $r1['l12']; ?></td></td><td><?php echo $r['cu_status']?></td></tr>
            
            <td>13</td><td>Boron as B</td><td>ppm</td><td><?php echo $r['b_act']?></td><td id="lb"><?php echo $r1['l13']; ?></td><td><?php echo $r['b_status']?></td></tr>
           
            <td>14</td><td>Molybdenum as Mo</td><td>ppm</td><td><?php echo $r['mo_act']?></td><td id="lmo"><?php echo $r1['l14']; ?></td><td><?php echo $r['mo_status']?></td></tr>
            <td colspan=6><b>OTHER</b></td></tr><tr>
            
            <td>15</td><td>Sodium as Na</td><td>ppm</td><td><?php echo $r['na_act']?></td><td id="lna"><?php echo $r1['l15']; ?></td><td><?php echo $r['na_status']?></td></tr>
            
            <td>16</td><td>chloride as Cl</td><td>ppm</td><td><?php echo $r['cl_act']?></td><td id="lcl"><?php echo $r1['l16']; ?></td><td><?php echo $r['cl_status']?></td></tr>

      
            
            </td></tr></table>
            <br>
            
            <div style="margin-left:30%;">
  <button class="btn btn-success" onclick="window.location.href='leaf.php'"><b>BACK</b></button>
  
  <button class="btn btn-success"  onclick="window.location.href='leaf_rep.php?id=<?php echo $r['pleaf_id'];?>'"><b>PRINT</b></button>
</div><

    <?php
  }?>
   
<br><br>

<?php include('footer.php');?>
</body>
  </html>