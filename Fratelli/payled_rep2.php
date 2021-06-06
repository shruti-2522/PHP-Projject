<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
 
 <body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-7 form-group"><h2><b>DETAILS OF <i>'<?php echo $_GET['str'];?>'</i></b></h2></div><br><br>
 
<form method="post">

<?php
$ses_id=$_SESSION['plot_id'];

$q=mysqli_query($db,"select * from tblpayment where payment_no='".$_GET['str2']."' and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-3 form-group">
     <label><font color="black"><b>Date:</b></font></label>
      <font color="black"><?php echo $r["date"];?></font>
    </div>
<div class="col-sm-3 form-group">
    <label><font color="black"><b>Account:</b></font></label>
      <font color="black"><?php echo $r["account"];?></font>
    </div>
    </div>


<table class="w3-table" border="1" id="myTable" style="margin-left: 17%; width: 45%" >
  <tr class="w3-light-green">
    <td><font color="white"><b>Particulars</b></font></td>
   
    <td><font color="white"><b>amount</b></font></td>
  </tr>
      <?php
      $x=explode(',', $r['particuler']);

    $z=explode(',', $r['amount']);
  for($i=0;$i<sizeof($x);$i++)
  {
    if($x[$i]==$_GET['str'])
    {
        ?>
        <tr>
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
  <div class="col-sm-3 form-group">
    <font color="black"><b>Total:</b></font>
    <font color="black">
      <?php echo $z[$i];?>
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
