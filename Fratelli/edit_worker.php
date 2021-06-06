<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>


</head>
<body class="sb-nav-fixed">
   
        <?php include('header.php');?>
         <div class="col-sm-4 form-group"><h2><b>EDIT WORKER</b></h2></div>
 <?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);
  mysqli_query($db,"update tblworker set worker_name='$txtworker',wages='$txtwages',contact_no='$txtcontact',adhar_no='$txtadhar' where id=".$_GET["id"]);

  mysqli_query($db,"update tblledger set name='$txtworker',mno='$txtcontact' where work_id=".$_GET["id"]);
  echo "<script>window.location.href='worker.php';</script>";
    exit;
}
  $q1=mysqli_query($db,"select * from tblworker where id=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
?>
 
<form method="post">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
<label class="form-control-placeholder" for="name"><font color="black"><b>Worker Name</font></b></label>
        <input type="text" id="name" class="form-control" name="txtworker" value="<?php echo $r1['worker_name'];?>">
         </div>
  </div>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
              <label class="form-control-placeholder" for="name"><font color="black"><b>Wages</font></b></label>
        <input type="text" id="name" class="form-control" name="txtwages"  value="<?php echo $r1['wages'];?>">
      
      </div>
  </div>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
           <label class="form-control-placeholder" for="name"><b><font color="black">Contact Number</font></b></label>
        <input type="text" id="name" class="form-control" name="txtcontact" value="<?php echo $r1['contact_no'];?>">
       
      </div>
    
  </div>
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
    <label class="form-control-placeholder" for="name"><font color="black"><b>Aadhar Number</font></b></label>
        <input type="text" id="name" class="form-control" name="txtadhar" value="<?php echo $r1['adhar_no'];?>">
         </div>
    
  </div>
  </div>
  <br>
  <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnsave"><b>UPDATE</b></button></div></center></form>



<?php include('footer.php');?>
             
    </body>
</html>
