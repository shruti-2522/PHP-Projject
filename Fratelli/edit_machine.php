<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
   
</head>
<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2 class="w3-container"><font color="black"><b>EDIT MACHINE</b></font></b></h2>

<?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);

  mysqli_query($db,"update tblmachine set machine_name='$txtmname',manufacturer='$txtman',model_no='$txtmno' where mid=".$_GET["id"]);

  echo "<script>window.location.href='addm.php';</script>";
    exit;
}
  $q1=mysqli_query($db,"select * from tblmachine where mid=".$_GET["id"]);

  $r1=mysqli_fetch_array($q1);
?>


<form method="post" id="myform">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
<label class="form-control-placeholder" for="name"><font color="black"><b>Machine Name:</b></font></label>
        <input type="text" id="name" class="form-control" name="txtmname" value="<?php echo $r1['machine_name']?>">      </div>
  </div>
<br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
       <label class="form-control-placeholder" for="name"><font color="black"><b>Manufacturer:</b></font></label>
        <input type="text" id="name" class="form-control" name="txtman" value="<?php echo $r1['manufacturer']?>">
      </div>
    
  </div>
  <br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
     <label class="form-control-placeholder" for="name"><font color="black"><b>Model Number:</b></font></label>
        <input type="text" id="name" class="form-control" name="txtmno" value="<?php echo $r1['model_no']?>">

      </div>
    
  </div>
</div>
<br> 
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnsave"><b>UPDATE</b></button></div></form>

<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
