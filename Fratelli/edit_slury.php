<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>


</head>
<body class="sb-nav-fixed">
   
        <?php include('header.php');?>
         <div class="col-sm-4 form-group"><h2><b>EDIT SLURRY</b></h2></div>
<?php      
if(isset($_POST["btnsave"]))
{
  extract($_POST);
  mysqli_query($db,"update tblslury set content='$txtcontent',unit='$txtunit' where slid=".$_GET["id"]);
  echo "<script>window.location.href='slury.php';</script>";
    exit;
}
  $q1=mysqli_query($db,"select * from tblslury where slid=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
?>

<form method="post">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
       <label class="form-control-placeholder" for="name"><font color="black"><b>Content</b></font></label>
        <input type="text" id="name" class="form-control" name="txtcontent" value="<?php echo $r1['content'];?>">
        
      </div>
  </div>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
                <label class="form-control-placeholder" for="password"><font color="black"><b>Unit</b></font></label>
         <select name="txtunit" id="txtunit" class="form-control">
            <option value="<?php echo $r1['unit']; ?>"><?php echo $r1['unit']; ?></option>        
            <option value="kg">kg</option>
            <option value="gm">gm</option>
            <option value="ml">ml</option>
            <option value="ltr">ltr</option>
             </select>
      </div>
    
  </div></div>
   <br>
  <center>
<div class="row">
      <div class="col-sm-5"></div>

 <button type="submit" class="btn btn-success col-sm-1" name="btnsave"><b>UPDATE</b></button></div></center></form>



  

<?php include('footer.php');?>
             
    </body>
</html>
