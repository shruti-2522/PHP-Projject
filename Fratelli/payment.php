<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include ("head.php");?>
<?php include ("config.php");?>



</head>
<body class="sb-nav-fixed">
  <?php include("header.php");?>


  
 <div class="container">
  <h2 class="container"><font color="black"><b>PAYMENT DETAILS</b></font></b></h2>
</div>

<div align="center">
  </div>
  <br>
 <?php //include('reght_sidebar.php');?>
   <form method="post">

<div class="container">



<?php

$q=mysqli_query($db,"select * from tblpayment where pid='".$_GET['id']."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
 
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-3 form-group">
     <font color="black"><b>Date:</b></font>
      <font color="black"><?php echo $r["date"];?></font>
    </div>
  
 <div class="col-sm-4 form-group">
    <font color="black"><b>Plot Name:</b></font>
      <font color="black"><?php 
      $q1=mysqli_query($db,"select pname from plot where plot_no='".$r['plot_name']."'");
      $r1=mysqli_fetch_array($q1);

      echo $r1["pname"];?></font>
    </div></div>
   
<div class="row">
  <div class="col-sm-2"></div>
      <div class="col-sm-3 form-group">
    <font color="black"><b>Account:</b></font>
      <font color="black"><?php echo $r["account"];?></font>
    </div>
   
  </div>

<table class="table" border="1" id="myTable" style="margin-left: 17%; width:47%" >
  <tr class="w3-light-green">
    <td><b>Particulars</b></td>

    <td><b>Amount</b></td></tr>
      <?php 
      $str_arr = explode (",", $r['particuler']);  
   
      $c = explode (",", $r['amount']);

       for($i=0; $i< count($str_arr); $i++ )
       {
        ?>
        <tr>
     <td>
    
        <font color="black"><?php
          echo $str_arr[$i];
        ?>
      </font>
    </td>
     
     <td>
      <font color="black"><?php echo $c[$i];?></font>
    </td>

  </tr>

  <?php
    }
?>
</table>
<div style="margin-left:1%">
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-3 form-group">
    <font color="black"><b>Narration:</b></font>
    <font color="black"><?php echo $r["narration"];?> </font>
    </div>
 
  <div class="col-sm-6 form-group">
     <font color="black"><b>Total:</b></font>
     <font color="black"><?php echo $r['total']?></font>
    </div>
  </div>




 

    

    
<?php
}
?>
</table>

<?php include("footer.php"); ?>
</body>
</html>