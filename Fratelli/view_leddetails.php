<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

 

</head>
<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2 class="w3-container"><font color="black"><b>LEDGERS DETAILS</b></font></b></h2>
<?php

$q=mysqli_query($db,"select * from tblledger where id=".$_GET['id']);
$r=mysqli_fetch_array($q);
$ex=$r["name"];
  $q1=mysqli_query($db,"select * from tblled_bank where led_id='".$_GET['id']."' ");
 $r1=mysqli_fetch_array($q1);    

?><br>
<div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">


<table  class="table table-borderless table-condensed table-hover" id="myInput">
  <tr class="header">
    <?php
 if($r["under"]=="Bank Accounts")
  {
    
  ?>
 <tr>
      <td><font color="Black"><b>
      Name :</b></font>
    </td>
     <td>
      <font color="Black"><?php echo $r["name"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Under :</b></td></font>
     <td>
      <font color="Black"><?php echo $r["under"];?></font>
    </td>
  </tr>

  <tr>
   <td>  <font color="Black"><b>Bank Holder Name :</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["holder"];?></font>
    </td>
  </tr>


   <tr>
   <td><font color="Black"><b>Account No :</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["acc_no"];?></font>
    </td>
  </tr>

<tr>
    <td>  <font color="Black"><b>Branch :</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["branch"];?></font>
    </td>
  </tr>

<tr>
    <td>  <font color="Black"><b>IFSC :</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["IFSC_CODE"];?></font>
    </td>
  </tr>


  </tr>
   <tr>
   <td><font color="Black"><b>Name:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mail_name"];?></font>
    </td>
  </tr>
  
   <tr>
   <td><font color="Black"><b>Email:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["email"];?></font>
    </td>
  </tr>
  
     <tr>
    <td> <font color="Black"><b>Address :</b></font></td>
     <td>
      <font color="Black"><?php echo $r["address"];?></font>
    </td>
  </tr>
   <tr>
   <td><font color="Black"><b>Mobile No.:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mno"];?></font>
    </td>
  </tr>
  
      
<?php
}
else
if($r["under"]=="Duties and Taxes")
{
  ?>
      <tr>
      <td><font color="Black"><b>
      Name :</b></font>
    </td>
     <td>
      <font color="Black"><?php echo $r["name"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Under :</b></td></font>
     <td>
      <font color="Black"><?php echo $r["under"];?></font>
    </td>
  </tr>

<tr>
    <td>  <font color="Black"><b>percentage of caculations:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["perc_calc"];?></font>
    </td>
  </tr>

  
   </tr>
   <tr>
   <td><font color="Black"><b>Name:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mail_name"];?></font>
    </td>
  </tr>
  
   <tr>
   <td><font color="Black"><b>Email:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["email"];?></font>
    </td>
  </tr>
  
     <tr>
    <td> <font color="Black"><b>Address :</b></font></td>
     <td>
      <font color="Black"><?php echo $r["address"];?></font>
    </td>
  </tr>
   <tr>
   <td><font color="Black"><b>Mobile No.:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mno"];?></font>
    </td>
  </tr>
  
<?php
}
else
{
?>
    <tr>
      <td><font color="Black"><b>
      Name :</b></font>
    </td>
     <td>
      <font color="Black"><?php echo $r["name"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Under :</b></td></font>
     <td>
      <font color="Black"><?php echo $r["under"];?></font>
    </td>
  </tr>


 
  </tr>
   <tr>
  </tr>
   <tr>
   <td><font color="Black"><b>Name:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mail_name"];?></font>
    </td>
  </tr>
  
   <tr>
   <td><font color="Black"><b>Email:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["email"];?></font>
    </td>
  </tr>
  
     <tr>
    <td> <font color="Black"><b>Address :</b></font></td>
     <td>
      <font color="Black"><?php echo $r["address"];?></font>
    </td>
  </tr>
   <tr>
   <td><font color="Black"><b>Mobile No.:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mno"];?></font>
    </td>
  </tr>
  
    <?php
}

?>
</table>

   </div>
</div>
</div>
<br>
<div class="row">
  <div class="col-sm-4"></div>
<div class="col-sm-6">
  <button class="btn btn-success" onclick="location.href='view_led.php';"><b>BACK</b></button>
</div></div>
<?php //include('reght_sidebar.php');?>
 

  <script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
</body>
  </html> 