<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
  <link rel="stylesheet" href="css/float_style.css">

</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>
        <h2 class="w3-container"><font color="black"><b>ADD MACHINE</b></font></b></h2>

<?php
 if(isset($_POST["btnadd"]))
   {
  extract($_POST);
  $ses_id=$_SESSION['plot_id'];
  mysqli_query($db,"insert into tblmachine(machine_name,manufacturer,model_no,ses_id)values('$txtmname','$txtman','$txtmno','$ses_id')");

  echo "<script>window.location.href='addm.php';</script>";
    exit;
}
 
?>

<form method="post" id="myform">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
          <input type="text" id="name" class="form-control" name="txtmname" required>
        <label class="form-control-placeholder" for="name"><font color="black"><b>Machine Name</b></font></label>
      </div>
  </div>
<br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
       <input type="text" id="name" class="form-control" name="txtman" required>
        <label class="form-control-placeholder" for="name"><font color="black"><b>Manufacturer</b></font></label>
      </div>
    
  </div>
  <br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
      <input type="text" id="name" class="form-control" name="txtmno" required>
        <label class="form-control-placeholder" for="name"><font color="black"><b>Model Number</b></font></label>
      </div>
    
  </div>
</div>
<br>
  <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnadd"><b>ADD</b></button></div></center></form>

<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
 <script type="text/javascript" src="js/file.js"></script>
