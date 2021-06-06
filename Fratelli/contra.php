<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
  <link rel="stylesheet" href="css/float_style.css">

</head>
<body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-5 form-group"><h2><b>CONTRA ENTRY DETAILS</b></h2></div>
     
      <form method="post">

<div class="container">


<table style="margin-left: 20%" class="table">
  <tr>

<?php

$q=mysqli_query($db,"select * from tblcontra where cid='".$_GET['id']."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">
  <div class="row">
    <div class="col-sm-6 form-group">
     <label><b>Date:</b></label>
      <font color="black"><?php echo $r["date"];?></font>
    </div>
<div class="col-sm-6 form-group">
    <label><b>Account:</b></label>
      <font color="black"><?php echo $r["account"];?></font>
    </div>
    </div>
     <div class="row">
   


<table class="table" border="1" id="myTable" style="margin-left: 18%; width: 40%" >
  <tr class="w3-light-green">
    <td><b>Particulars</b></td>
 <!--    <td><font color="white"><b>Current Balance</b></font></td> -->
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
    <!--   <td>
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
</div></div></div></div></form>


<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
