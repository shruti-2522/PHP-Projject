<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
   
        <?php include('header.php');?>
            <div class="col-sm-4 form-group"><h2><b>EDIT FRUIT</b></h2></div>
      
<?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);

  mysqli_query($db,"update tblfruit set fruit_name='$txtfruit',variety_name='$txtvariety' where fid=".$_GET["id"]);

  echo "<script>window.location.href='fruit.php';</script>";
    exit;
}
  $q1=mysqli_query($db,"select * from tblfruit where fid=".$_GET["id"]);

  $r1=mysqli_fetch_array($q1);
?>

<form method="post">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
       <label class="form-control-placeholder" for="name"><font color="black"><b>Fruit Name</b></font></label>
        <input type="text" id="name" class="form-control" name="txtfruit" value="<?php echo $r1['fruit_name'];?>">
       
      </div>
  </div>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
        <label class="form-control-placeholder" for="password"><font color="black"><b>Variety</b></font></label>
        <input type="text" id="password" class="form-control" name="txtvariety" value="<?php echo $r1['variety_name'];?>">
      </div>
    
  </div></div>
  <br>
  <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnsave"><b>UPDATE</b></button></div></center></form>




        


  <?php  //include('reght_sidebar.php');?>

<?php include('footer.php');?>
             
    </body>
</html>
