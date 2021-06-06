<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
  <link rel="stylesheet" href="css/float_style.css">
 
   
</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>
         <div class="col-sm-4 form-group"><h2><b>ADD WORKER</b></h2></div>
      
 <?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);
   $ses_id=$_SESSION['plot_id'];
  
    mysqli_query($db,"insert into tblworker(worker_name,wages,contact_no,adhar_no,ses_id)values('$txtworker','$txtwages','$txtcontact','$txtadhar','$ses_id')");
   
    $q=mysqli_query($db,"select max(id) as mid from tblworker"); 
    $r=mysqli_fetch_array($q);
    $id=0;
    $id=$id+$r['mid'];

    mysqli_query($db,"insert into tblledger(name,under,mno,ses_id,work_id)values('$txtworker','labour expense','$txtcontact','$ses_id','$id')");

     echo "<script>window.location.href='worker.php';</script>";
    exit;
 }

?>


<form method="post" id="myform">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
                <input type="text" id="name" class="form-control" name="txtworker" required>
        <label class="form-control-placeholder" for="name"><font color="black"><b>Worker Name</font></b></label>
      </div>
  </div>
<br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
             <input type="text" id="name" class="form-control" name="txtwages" required>
        <label class="form-control-placeholder" for="name"><font color="black"><b>Wages</font></b></label>
      </div>
    
  </div>
  <br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
              <input type="text" id="name" class="form-control" name="txtcontact" required>
        <label class="form-control-placeholder" for="name"><b><font color="black">Contact Number</font></b></label>
      </div>
  </div><br>
   <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
         <input type="text" id="name" class="form-control" name="txtadhar" required>
        <label class="form-control-placeholder" for="name"><font color="black"><b>Aadhar Number</font></b></label>
      </div>
    
  </div>
  <br>

</div>
  <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnadd"><b>ADD</b></button></div></center></form>

<?php include('footer.php');?>
<script src="js/reload.js"></script>

             
    </body>
</html>
