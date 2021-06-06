<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>


</head>
 <?php include('header.php');?>

<body class="sb-nav-fixed">
  <h2 style="margin-left:1%;"><b>SOIL ANALYSIS DETAILS</b></h2>
<?php
$q=mysqli_query($db,"select * from tblsoil where soil_id=".$_GET['id']);
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



     <table class="table" id="myTable" border="1" style="width:80%;margin-left: 1%;">
    <tr><td><b>Sr.No</b></td><td><b>Parameter</b></td><td><b>Unit</b></td><td><b>Actual Result</b></td><td><b>Limit</b></td><td><b>Status</b></td></tr>
    <tr><td>1</td><td>PH</td><td>-</td><td> <?php echo $r["ph_act"];?></td><td>6.5-7.5</td><td> <?php echo $r["ph_status"];?></td></tr>
    <td>2</td><td>Ec</td><td>dS/m</td><td> <?php echo $r["ec_act"];?></td><td>< 1.0</td><td> <?php echo $r["ec_status"];?></td></tr>
            <td>3</td><td>Organic Carbon</td><td>%</td><td> <?php echo $r["carbon_act"];?></td><td>1.01-3.0</td><td> <?php echo $r["carbon_status"];?></td></tr>
            <td>4</td><td>Nitrogen as N</td><td>ppm</td><td> <?php echo $r["N_act"];?></td><td>75-150</td><td> <?php echo $r["N_status"];?></td></tr>
            <td>5</td><td>Phosphorus as P</td><td>ppm</td><td> <?php echo $r["p_act"];?></td><td>10-20</td><td> <?php echo $r["P_status"];?></td></tr>
            <td>6</td><td>Potassium as K</td><td>ppm</td><td> <?php echo $r["K_act"];?></td><td>120-200</td><td> <?php echo $r["K_status"];?></td></tr>
            <td>7</td><td>Calcium as Ca</td><td>ppm</td><td> <?php echo $r["Ca_act"];?></td><td>1000-450</td><td> <?php echo $r["Ca_status"];?></td></tr>
            <td>8</td><td>Magnesium as Mg</td><td>ppm</td><td> <?php echo $r["Mg_act"];?></td><td>500-1000</td><td> <?php echo $r["Mg_status"];?></td></tr>
            <td>9</td><td>Sulphur as S</td><td>ppm</td><td> <?php echo $r["S_act"];?></td><td>10-20</td><td> <?php echo $r["S_status"];?></td></tr>
            <td>10</td><td>Ferrous as Fe</td><td>ppm</td><td> <?php echo $r["Fe_act"];?></td><td>3.1-5.0</td><td> <?php echo $r["Fe_status"];?></td></tr>
            <td>11</td><td>Manganese as Mn</td><td>ppm</td><td> <?php echo $r["Mn_act"];?></td><td>0.6-1.0</td><td> <?php echo $r["Mn_status"];?></td></tr>
            <td>12</td><td>zinc as Zn</td><td>ppm</td><td> <?php echo $r["Zn_act"];?><td>1.0-1.5</td><td> <?php echo $r["Zn_status"];?></td></tr>
            <td>13</td><td>Copper as Cu</td><td>ppm</td><td> <?php echo $r["Cu_act"];?></td><td>0.3-0.5</td><td> <?php echo $r["Cu_status"];?></td></tr>
            <td>14</td><td>Boron as B</td><td>ppm</td><td> <?php echo $r["B_act"];?></td><td>0-0.5</td><td> <?php echo $r["B_status"];?></td></tr>
            <td>15</td><td>Molybdenum as Mo</td><td>ppm</td><td> <?php echo $r["Mo_act"];?></td><td>0-0.5</td><td> <?php echo $r["Mo_status"];?></td></tr>
            <td>16</td><td>Sodium as Na</td><td>ppm</td><td> <?php echo $r["Na_act"];?></td><td>< 350</td><td> <?php echo $r["Na_status"];?></td></tr>
            <td>17</td><td>chloride as Cl</td><td>ppm</td><td> <?php echo $r["Cl_act"];?></td><td>< 350</td><td> <?php echo $r["Cl_status"];?></td></tr>
            <td>18</td><td>Calcium Carbonate as CaCO3</td><td>%</td><td> <?php echo $r["CaCO3_act"];?></td><td>< 3</td><td> <?php echo $r["CaCO3_status"];?></td></tr>
   
    </table>

 
  

</table>
<div style="margin-left:35%;">

  <button class="btn btn-success" onclick="window.location.href='soil.php'"><b>BACK</b></button>
  <button class="btn btn-success"  onclick="window.location.href='soil_rep.php?id=<?php echo $r['soil_id'];?>'"><b>PRINT</b></button>
</div>

   
    <?php
  }?>
   
<br>
<br><br>

  
  
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
