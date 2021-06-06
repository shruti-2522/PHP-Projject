<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>

  
</head>
<body class="sb-nav-fixed">

<?php  include('header.php');?>

  <h2><b>SPRAYER DETAILS</b></h2>

 <?php
$q=mysqli_query($db,"select * from tblsprayer where sid=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {

    $q1=mysqli_query($db,"select stype from tblstype where sid=".$r["sprayer_type"]);
    $r1=mysqli_fetch_array($q1);

    $q2=mysqli_query($db,"select name_of_sprayer from tblntype where sid=".$r["sprayer_type"]." and nid=".$r["sprayer_name"]);
    
    $r2=mysqli_fetch_array($q2);
  ?>

  

<table   class="table table-borderless table-condensed table-hover"  id="myInput" align="center">
    <?php
if($r['nozzle_type']=='teejet')
{
  ?>

  <tr class="header">
    <tr>
  <td><font color="Black"><b>Type of sprayer:</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["stype"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Name  of  sprayer:</b></td></font>
     <td>
      <font color="Black"><?php echo $r2["name_of_sprayer"];?></font>
    </td>
  </tr>

  <tr>
   <td>  <font color="Black"><b>Type of  Nozzle:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["nozzle_type"];?></font>
    </td>
  </tr>


   <tr>
   <td><font color="Black"><b>Core-No plus:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["corenopls"];?></font>
    </td>
  </tr>

<tr>
    <td>  <font color="Black"><b>Core-No Minus:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["corenomin"];?></font>
    </td>
  </tr>

  <tr>
   <td>  <font color="Black"><b>Disc-No Plus:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["discnopls"];?></font>
    </td>
  </tr>

    <tr>
    <td>  <font color="Black"><b>Disc-No  Minus:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["discnomin"];?></font>
    </td>
  </tr>
  <tr>
   <td>  <font color="Black"><b>Nozzle:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["nozzle"];?></font>
    </td>

  </tr>
</table>
<?php
}
else

if($r['nozzle_type']=='italian')
{
  ?>
<table   class="table table-borderless table-condensed table-hover" id="myInput" align="center">

  <tr class="header">
    <tr>
  <td><font color="Black"><b>Type of sprayer:</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["stype"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Name  of  sprayer:</b></td></font>
     <td>
      <font color="Black"><?php echo $r2["name_of_sprayer"];?></font>
    </td>
  </tr>

  <tr>
   <td>  <font color="Black"><b>Type of  Nozzle:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["nozzle_type"];?></font>
    </td>
  </tr>


  <tr>
   <td>  <font color="Black"><b>Disc-No Plus:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["discnopls"];?></font>
    </td>
  </tr>

    <tr>
    <td>  <font color="Black"><b>Disc-No  Minus:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["discnomin"];?></font>
    </td>
  </tr>
  <tr>
   <td>  <font color="Black"><b>Nozzle:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["nozzle"];?></font>
    </td>

  </tr>
</table>
<?php
}
else
if($r['nozzle_type']=='local')
{
  ?>

<table  class="table table-borderless table-condensed table-hover"  id="myInput" align="center">
  <tr class="header">
    <tr>
  <td><font color="Black"><b>Type of sprayer:</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["stype"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Name  of  sprayer:</b></td></font>
     <td>
      <font color="Black"><?php echo $r2["name_of_sprayer"];?></font>
    </td>
  </tr>

  <tr>
   <td>  <font color="Black"><b>Type of  Nozzle:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["nozzle_type"];?></font>
    </td>
  </tr>


  <tr>
   <td>  <font color="Black"><b>Disc-No Plus:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["discnopls"];?></font>
    </td>
  </tr>

    <tr>
    <td>  <font color="Black"><b>Disc-No  Minus:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["discnomin"];?></font>
    </td>
  </tr>
  <tr>
   <td>  <font color="Black"><b>Nozzle:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["nozzle"];?></font>
    </td>

  </tr>
</table>
<?php
}
else
{
?>
<table  class="table table-borderless table-condensed table-hover"  align="center" id="myInput">
  <tr class="header">
    <tr>
  <td><font color="Black"><b>Type of sprayer:</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["stype"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Name  of  sprayer:</b></td></font>
     <td>
      <font color="Black"><?php echo $r2["name_of_sprayer"];?></font>
    </td>
  </tr>
</table>

<?php

}}
?>


</form>
  
   </div>
</div>
</div>
</div>
<br>

<div class="row">
<div class="col-sm-5"></div><button  class="btn btn-success"  onclick="window.location.href='sprayer.php'"><b>BACK</b></button></div>

<?php include('footer.php');?>
</body>
  </html>