<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>


</head>
<body class="sb-nav-fixed">

        <?php include('header.php');?>
         <div class="col-sm-5 form-group"><h2><b>DELETE FERTILIZER</b></h2></div>
         <br>
<?php
if(isset($_POST["btnyes"]))
{
extract($_POST);

   $x=0;
   $q=mysqli_query($db,"select * from tblfertsession where fert_id=".$_GET['id']);
   while($r=mysqli_fetch_array($q))
   {

    $x=$x+$r['qty_app'];
    $iname=$r['fert_name'];
   }
       
   $sum=0;
   $q1=mysqli_query($db,"select * from tblp1 where item_name='".$iname."'");
   $r1=mysqli_fetch_array($q1); 
   $sum=$r1['reduce_qty']+$x;
  
    

    mysqli_query($db,"update tblp1 set reduce_qty='$sum' where item_name='".$iname."'"); 
mysqli_query($db,"delete from tblfert1 where fert_id=".$_GET["id"]);
mysqli_query($db,"delete from tblfertsession where fert_id=".$_GET["id"]);
echo "<script>window.location.href='fertilizer.php';</script>";
    exit;
}
if(isset($_POST["btnno"]))
{
echo "<script>window.location.href='fertilizer.php';</script>";
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
      <div class="modal-body">
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
