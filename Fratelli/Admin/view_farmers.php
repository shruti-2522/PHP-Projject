<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
   
<?php include('header.php');?>
<br><br>
 <h2 class="w3-container" style="margin-left: 2%"><font color="black"><b>FARMERS DETAILS</b></font></b></h2>
<br>
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
  
<?php
$q=mysqli_query($db,"select * from tblpolt where plot_id=".$_GET['id']." and status=1");
while ($r=mysqli_fetch_array($q)) {
  ?>
<table class="w3-table">
   <tr>
    <td>
      <font color="black"><b>Farm Name:</b></font>
    </td>
   <td>
      <font color="black"><?php echo $r["farm_name"];?></font>
    </td>
  </tr>
    <tr>
  <td><font color="black"><b>Owner Name:</b></font></td>
     <td>
     <font color="black"><?php echo $r['owner_name'];?></font>
    </td>
  </tr>
    <tr>
  <td><font color="black"><b>GGN No:</b></font></td>
     <td>
      <font color="black"><?php echo $r["GGN_no"];?></font>
    </td>
  </tr>
    <tr>
  <td><font color="black"><b>Address:</b></font></td>
     <td>
     <font color="black"><?php echo $r["addrs"];?> </font>
    </td>
  </tr>
  <tr>
   <td><font color="black"><b>TALUKA:</b></font></td>
     <td>
     <font color="black"><?php echo $r["taluka"];?></font>
    </td>
  </tr>


   <tr>
   <td><font color="black"><b>District:</b></font></td>
     <td>
      <font color="black"><?php echo $r["district"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="black"><b>State:</b></font></td>
     <td>
      <font color="black"><?php echo $r["state"];?></font>
  </tr>
    <tr>
    <td><font color="black"> <b>Pin Code:</b></font></td>
     <td>
      <font color="black"><?php echo $r["pin_code"];?></font>
    </td>
  </tr>

<tr>
    <td><font color="black"><b>Nationality:</b></font></td>
     <td>
      <font color="black"><?php echo $r["nationality"];?></font>
    </td>
  </tr>
  <tr>
    <td><font color="black"><b>Phone Number:</b></font></td>
     <td>
      <font color="black"><?php echo $r["phone_no"];?></font>
    </td>
  </tr>
  <tr>
    <td><font color="black"><b>Fax Number:</b></font></td>
     <td>
      <font color="black"><?php echo $r["fax_no"];?></font>
    </td>
  </tr>

  <tr>
    <td><font color="black"><b>Email:</b></font></td>
     <td>
      <font color="black"><?php echo $r["email"];?></font>
    </td>
  </tr>
  <tr>
    <td><font color="black"><b>Technical Authorisation:</b></font></td>
     <td>
      <font color="black"><?php echo $r["tech_auth"];?></font>
    </td>
  </tr>
  
  <tr>
    <td><font color="black"><b>Machine code:</b></font></td>
     <td>
      <font color="black"><?php echo $r["machine_code"];?></font>
    </td>
  </tr>
  <tr>
    <td><font color="black"><b>Registration Number:</b></font></td>
     <td>
      <font color="black"><?php echo $r["reg_no"];?></font>
    </td>
  </tr>

 

</table>

  <?php
}?>
</table>
<br><br>
<center><button class="w3-button w3-green w3-round" onclick="window.location.href='show_farmer.php'"><b>BACK</b></button></center>
</div></div></div>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
