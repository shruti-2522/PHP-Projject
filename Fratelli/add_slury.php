<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
  <link rel="stylesheet" href="css/float_style.css">

</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>
         <div class="col-sm-4 form-group"><h2><b>ADD SLURRY</b></h2></div>
      
<?php  
   if(isset($_POST["btnadd"]))
   {
   extract($_POST);
   $ses_id=$_SESSION['plot_id'];
   
   

    mysqli_query($db,"insert into tblslury(content,unit,ses_id)values('$txtcontent','$txtunit','$ses_id')");
    echo "<script>window.location.href='slury.php';</script>";
    exit;

    }
    ?>

<form method="post" id="myform">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
                <input type="text" id="name" class="form-control" name="txtcontent" required>
        <label class="form-control-placeholder" for="name"><b>Content</b></label>
      </div>
  </div>
<br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
     <select name="txtunit" id="txtunit" class="form-control">
            <option value="text">Select unit</option>        
            <option value="kg">kg</option>
            <option value="gm">gm</option>
            <option value="ml">ml</option>
            <option value="ltr">ltr</option>
             </select>
          </div>
    
  </div>
</div>
  <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnadd"><b>ADD</b></button></div></center></form>

<?php include('footer.php');?>
<script src="js/reload.js"></script>

    </body>
</html>
