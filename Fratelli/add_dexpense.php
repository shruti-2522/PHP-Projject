    <!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 

</head>
<body class="sb-nav-fixed">
  
            
<?php  include('header.php');?>
                <div class="col-sm-4 form-group"><h2><b>ADD ASSETS</b></h2></div>
<br>
<?php
if(isset($_POST["btnadd"]))
{
   extract($_POST);
     $ses_id=$_SESSION['plot_id'];
  
  mysqli_query($db,"insert into tbldexpense(exp_name,ses_id)values('$txtdexp','$ses_id')");
 
       echo "<script>window.location.href='account_grp.php';</script>";
    exit;
 
}
?>

  <form method="post">

<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">

   <div class="col-sm-12">
            <div class="row">
              
                <label><font color="black"><b>Enter New direct expence:</b></font></label>
              
              <div class="col-sm-6 form-group"> <input  type="text"
name="txtdexp" placeholder="enter new expence" class="form-control" required> </div> </div> 
<br>
<div class="row">
   <div class="col-sm-3"></div>
    <div class="col-sm-6">
         <button type="Submit" class="btn btn-success" name="btnadd" onclick="location.href='acc_grp.php';"><b>ADD</b></button>
         </div>
         </div>
         <br>
       </div>



<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
