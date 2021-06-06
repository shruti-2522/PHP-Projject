<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
 
 <body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-7 form-group"><h2><b>DETAILS OF <i>'<?php echo $_GET['str'];?>'</i></b></h2></div><br><br>
 

   <form method="post">




<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tbljournal where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
    $p=explode(',', $r['toby']);
    $x=explode(',', $r['particuler']);
   
    $z=explode(',', $r['credit']);
    $s=explode(',', $r['debit']);
  for($i=0;$i<sizeof($x);$i++)
  {
    if($x[$i]==$_GET['str'])
    {
  ?>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-3 form-group">
     <label><font color="black"><b>Date:</b></font></label>
      <font color="black"><?php echo $r["date"];?></font>
    </div>
</div>

<table class="table" border="1" id="myTable" style="margin-left: 17%; width: 45%" >
  <tr class="w3-light-green">
    <td><b>To/By</b></td>
    <td><b>Particulars</b></td>
   
    <td><b>Credit</b></td>
        <td><b>Debit</b></td>
  </tr>
      <?php
        ?>
        <tr>
     <td>
    <font color="black">
        <?php
          echo $p[$i];
        ?>
      </font>
    </td>
     <td>
    <font color="black">
        <?php
          echo $x[$i];
        ?>
      </font>
    </td>
      
     <td>
      <font color="black">
      <?php echo $z[$i];?>
    </font>
    </td>
    <td>
      <font color="black">
      <?php echo $s[$i];?>
    </font>
    </td>
  </tr>
</table>
<div class="row">
    <div class="col-sm-2"></div>
  <div class="col-sm-3 form-group">
    <font color="black"><b>Narration:</b></font>
    <font color="black">
      <?php echo $r["narration"];?>
    </font>
  </div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
  <div class="col-sm-3 form-group">
    <font color="black"><b>Total Credit:</b></font>
    <font color="black">
      <?php echo $r["tot_credit"];?>
    </font>
  </div>
  <div class="col-sm-3 form-group">
    <font color="black"><b>Total Debit:</b></font>
    <font color="black">
      <?php echo $r["tot_debit"];?>
    </font>
    </div>
  </div>

    <br><br>
<?php
}
}
}
?>
</div></div></form>



<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
