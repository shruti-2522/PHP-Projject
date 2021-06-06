<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
 
 <body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-7 form-group"><h2><b>DETAILS OF <i>'<?php echo $_GET['q'];?>'</i></b></h2></div><br><br>
   <form method="post">

<?php
$ses_id=$_SESSION['plot_id'];


$q=mysqli_query($db,"select * from tblpayment where account='".$_GET['q']."' and pid='".$_GET['str1']."' and ses_id=".$ses_id);
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


<table class="table" border="1" id="myTable" style="margin-left: 17%; width: 45%" >
  <tr>
    <td><b>Particulars</b></td>
  
    <td><b>amount</b></td>
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

<?php
}}
?>
</table>
<br>
<div class="row">
    <div class="col-sm-2"></div>
  <div class="col-sm-3 form-group">
    <font color="black"><b>Naration:</b></font>
    <font color="black">
      <?php echo $r["narration"];?>
    </font>
  </div>
  <div class="col-sm-3 form-group">
    <font color="black"><b>Total:</b></font>
    <font color="black">
      <?php echo $r["total"];?>
    </font>
    </div>
  </div>
    <br><br>
<?php
}
?>
</div></div></form>



<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
