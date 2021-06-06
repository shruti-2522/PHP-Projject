<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 

</head>
<body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-5 form-group"><h2><b>JOURNAL ENTRY DETAILS</b></h2></div>
       
      <form method="post">

<div class="container">


<table style="margin-left: 20%" class="w3-table">
  <tr>

<?php

$q=mysqli_query($db,"select * from tbljournal where jid='".$_GET['id']."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-8">
   <div class="col-sm-12">
  <div class="row">
    <div class="col-sm-1"></div>
    
     <label><font color="black"><b>Date:</b></font></label>
      <font color="black"><?php echo $r["date"];?></font>
    </div>

<table class="table" border="1" id="myTable" style="margin-left: 22%; width:48%" >
  <tr >
    <td><b>Particulars</b></td>
  <!--   <td><font color="white"><b>Current Balance</b></font></td> -->
    <td><b>credit</b></td>
    <td><b>Debit</b></td></tr>
      <?php 
      $str_arr = explode (",", $r['particuler']);  
      // $b = explode (",", $r['cbal']);
      $c = explode (",", $r['credit']);
      $d = explode (",", $r['debit']);

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
     <td>
      <font color="black">
      <?php echo $d[$i];?>
    </font>
    </td>


  </tr>

  <?php
    }
?>
</table>

<div style="margin-left: 6%">
<div class="row"> 
 <div class="col-sm-2"></div>
  <div class="col-sm-2 form-group">
    <font color="black"><b>Narration</b></font>
    <br>
      <font color="black"><?php echo $r["narration"];?></font>
    </div>
  
 <div class=" col-sm-2 form-group">
  <div class="col-sm-1"></div>
    <font color="black"><b>Total Credit</b></font>
    <br>
      <font color="black"><?php echo $r["tot_credit"];?></font>
    </div>
  
<div class=" col-sm-2 form-group">
  <div class="col-sm-1"></div>
    <font color="black"><b>Total Debit</b></font>
    <br>
      <font color="black"><?php echo $r["tot_debit"];?></font>
    </div>
  </div></div></div>
 


    
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
