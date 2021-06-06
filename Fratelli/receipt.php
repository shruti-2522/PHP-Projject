<html>
<head>
<title></title>
<?php include ("head.php");?>
<?php include ("config.php");?>

</head>
<?php include("header.php");?>
<body class="sb-nav-fixed">
  <?php
if (isset($_POST["btnreg"])) {
   extract($_POST);

   $a=$_POST['debit'];
   $nar=$_POST['txtnar'];
  
  // mysqli_query($db,"update tblcontra(debit,narration)values('$a','$txtnar')")
  
}
?>

 
  <h2 class="container"><font color="black"><b>RECEIPT DETAILS</b></font></b></h2>

  <br><br>
 <?php //include('reght_sidebar.php');?>
   <form method="post">

<div class="w3-container w3-bordered">


<?php

$q=mysqli_query($db,"select * from tblreceipt where rid='".$_GET['id']."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
  
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">
  <div class="row">
    <div class="col-sm-6 form-group">
    <font color="black"><b>Date:</b></font>
      <font color="black"><?php echo $r["date"];?></font>
    </div>
 <div class="col-sm-6 form-group">
    <font color="black"><b>Account:</b></font>
      <font color="black"><?php echo $r["account"];?></font>
    </div>
   
    
  </div>

<table class="table" border="1" id="myTable" style="margin-left: 0%; width: 83%" >
  <tr class="w3-light-green">
    <td><b>Particulars</b></td>
   <!--  <td><font color="white"><b>Current Balance</b></font></td> -->
    <td><b>Amount</b></td></tr>

      <?php 
      $str_arr = explode (",", $r['particuler']);  
      // $b = explode (",", $r['cur_bal']);
      $c = explode (",", $r['amount']);

       for($i=0; $i< count($str_arr); $i++ )
       {
        ?>
        <tr>
     <td>
    <font color="black">
        <?php
          echo $str_arr[$i];
        ?>
      </font>
    </td>
     <!--  <td>
        <font color="black">
      <?php echo $b[$i];?>
    </font>
    </td>  -->
     <td>
      <font color="black">
      <?php echo $c[$i];?>
    </font>
    </td>

  </tr>

  <?php
    }
?>

</table>
<div class="row">
  
  <div class="col-sm-4 form-group">
    <font color="black"><b>Narration:</b></font>
    <font color="black"><?php echo $r["narration"];?> </font>
    </div>
 <div class="col-sm-2"></div>
  <div class="col-sm-4 form-group">
     <font color="black"><b>Total:</b></font>
     <font color="black"><?php echo $r['total']?></font>
    </div>
  </div>


 

    
<?php
}
?>
</table>
<?php include("footer.php");?>
</body>
</html>