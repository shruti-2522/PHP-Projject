<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

<!--    PLACEHOLDER AS A LABEL WWORK-->
<link rel="stylesheet" href="css/float_style.css">

</head>
<body class="sb-nav-fixed">
  <?php include('header.php');?>
      <div class="col-sm-4 form-group"><h2><b>ADD FRUIT</b></h2></div>
     
<?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);
  $ses_id=$_SESSION['plot_id'];
  // echo $_SESSION["favcolor"] = "green";

 
  mysqli_query($db,"insert into tblfruit(fruit_name
    ,variety_name,ses_id)values('$txtfruit','$txtvariety','$ses_id')");

  echo "<script>window.location.href='fruit.php';</script>";
    exit;
}
 ?>

<form method="post" id="myform">
<div class="container">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
        <input type="text" id="name" class="form-control" name="txtfruit" required>
        <label class="form-control-placeholder" for="name"><b>Fruit Name</b></label>
      </div>
  </div>
<br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
        <input type="text" id="password" class="form-control" name="txtvariety" required>
        <label class="form-control-placeholder" for="password"><b>Variety</b></label>
      </div>
    
  </div>
</div>
  <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnadd"><b>ADD</b></button></div></center></form>
<?php include('footer.php');?>

<!--FOR RELOAD CODE-->
<script src="js/reload.js"></script>
             
    </body>
</html>
