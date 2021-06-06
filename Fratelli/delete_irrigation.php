<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">

        <?php include('header.php');?>
         <div class="col-sm-5 form-group"><h2><b>DELETE IRRIGATION</b></h2></div>
         <br>
<?php
if(isset($_POST["btnyes"]))
{
extract($_POST);
mysqli_query($db,"delete from tblirrigation where iid=".$_GET["id"]);
echo "<script>window.location.href='irrigation.php';</script>";
    exit;
}
if(isset($_POST["btnno"]))
{
echo "<script>window.location.href='irrigation.php';</script>";
    exit;
}
?>
<center>
<div class="container" style="width:40%; margin-left:25%;">
<form method="post">
    <div class="modal-ssssssdialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header flex-column">
                
        <h4 class="modal-title w-100">Are you sure?</h4> 
            </div>
      <div class="modal-body"><?php
if(isset($_POST["btnyes"]))
{
extract($_POST);
mysqli_query($db,"delete from tbldrip where did=".$_GET["id"]);
echo "<script>window.location.href='drip.php';</script>";
    exit;
}
if(isset($_POST["btnno"]))
{
echo "<script>window.location.href='drip.php';</script>";
    exit;
}
?>
        <p><b>Do you really want to delete this record?</b></p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="btnno">Cancel</button>
        <button type="submit" class="btn btn-danger" name="btnyes">Delete</button>
      </div>
    </div>
  </div>
  </center>
</form>
</div>


  <?php  //include('reght_sidebar.php');?>

<?php include('footer.php');?>
             
    </body>
</html>
