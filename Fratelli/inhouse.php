<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

 

</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>
        <div class="col-sm-6 form-group"><h2><b>INHOUSE-CALIBRATION</b></h></div>

<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblinhouse where in_id=".$_GET['id']) ;
while ($r=mysqli_fetch_array($q)) {
  ?>

<div class="container ">
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
  <br><br>
<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Sr No:</b></font></label>
          <font color="black"><?php echo $r["srno"];?></font>
   </div>

<div class="col-sm-1"></div>
            <div class="col-sm-4 form-group">
          <label><font color="black"><b>Machine:</b></font></label>
        <font color="black"><?php echo $r["machine_name"];?></font>
        </div>
  
  </div>
    <div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date :</b></font></label>
          <font color="black"><?php echo $r["date_interval"];?></font>
   </div>



<div class="col-sm-1"></div>
            <div class="col-sm-4 form-group">
          <label><font color="black"><b>Time Interval:</b></font></label>
        <font color="black"><?php echo $r["time_interval"];?></font>
        </div>
  
  </div>
  <div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Used Interval:</b></font></label>
          <font color="black"><?php echo $r["used_interval"];?></font>
   </div>

   <div class="col-sm-1"></div>
      <div class="col-sm-5 form-group">
        <label><font color="black"><b>Title of work:</b></font></label>
          <font color="black"><?php echo $r["title"];?></font>
   </div>
 </div>

<div class="row">
 <div class="col-sm-6 form-group">
          <label><font color="black"><b>Remark:</b></font></label>
        <font color="black"><?php echo $r["remark"];?></font>
        </div>
  
  </div>
   </div>
</div>
</div>
<div class="row">
  <div class="col-sm-4"></div>
  <button class="btn btn-success" onclick="window.location.href='inhouse1.php'"><b>BACK</b></button>
  <div style="margin-left:3%"></div>
  <button class="btn btn-success"  onclick="window.location.href='inhouse_report.php?id=<?php echo $r['in_id'];?>'"><b>PRINT</b></button>
</div></div>



    <?php
  }?>
 
<br>


 
</form>

<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
