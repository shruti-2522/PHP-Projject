<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

<script>
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>
</head>
 
 <body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-7 form-group"><h2><b>CREDIT NOTE FOR JOURNAL VOUCHER</b></h2></div><br><br>
  <?php
if (isset($_POST["btnreg"])) {
   extract($_POST);

   $a=$_POST['debit'];
   $nar=$_POST['txtnar'];
  
  // mysqli_query($db,"update tblcontra(debit,narration)values('$a','$txtnar')")
  
}
?>

  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><font color="black">Credit</font></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
        <p></p>
                <form  method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="debit" placeholder="Cr">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="txtnar" placeholder="Enter Narration">
                    </div>
                    <button type="submit" class="btn btn-success" name="btnreg"><b>ADD</b></button>
                </form>
            </div>
        </div>
    </div>
</div>


   <form method="post">

<div class="w3-container w3-bordered">


<table style="margin-left: 20%" class="w3-table">
  <tr>

<?php

$q=mysqli_query($db,"select * from tbljournal where jid='".$_GET['id']."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
  <div style="margin-left: 7%">

  <div class="row">
    <div class="col-sm-2"></div>
     <label><font color="black"><b>Date:</b></font></label>
      <font color="black"><?php echo $r["date"];?></font>
    </div>



<table class="table" border="1" id="myTable" style="margin-left: 22%; width: 45%" >
  <tr class="w3-light-green">
    <td><b>Particulars</b></td>
  <!--   <td><font color="white"><b>Current Balance</b></font></td> -->
    <td><b>Credit</b></td>
    <td><b>Debit</b></td></tr>
      <?php 
      $str_arr = explode (",", $r['particuler']);  
      // $b = explode (",", $r['cbal']);
      $c = explode (",", $r['credit']);
      $d = explode (",", $r['debit']);

       for($i=0; $i< count($str_arr); $i++ )
       {
        ?>
        <tr>
     <td>
    <font color="black">
        <?php
          echo $str_arr[$i];
        ?>
      </font>
    </td>
     <!--  <td>
        <font color="black">
      <?php echo $b[$i];?>
    </font>
    </td>  -->
     <td>
      <font color="black">
      <?php echo $c[$i];?>
    </font>
    </td>
     <td>
      <font color="black">
      <?php echo $d[$i];?>
    </font>
    </td>


  </tr>

  <?php
    }
?>
</table>
<div class="container" style="margin-left: 20%">
  <div class="col-sm-8"></div>
<div class="row">
  <div class="col-sm-3 form-group">
    <font color="black"><b>Narration:</b></font>
    <font color="black">
      <?php echo $r["narration"];?>
    </font>
    </div>
  
  <div class="col-sm-3 form-group">
    <font color="black"><b>Total Credit:</b></font>
    <font color="black">
      <?php echo $r["tot_credit"];?>
    </font>
    </div>
  </div>


<div class="row">
  <div class="col-sm-3 form-group">
     <font color="black"><b>Credit Note:</b></font>
     <font color="black">
      <?php echo $a?>
    </font>
    </div>
 

  <div class="col-sm-6 form-group">
    <font color="black"><b>Narration For Credit Note:</b></font>
    <font color="black">
      <?php echo $nar;?>
    </font>
</div>
</div>  

<div class="row">
  <div class="col-sm-6 form-group">
    <font color="black"><b>Total:</b></font>
    <font color="black">
      <?php
      $add= $r["tot_credit"]+$a;
       echo $add;?>
     </font>
    </div>
  </div>
 <?php

   mysqli_query($db,"UPDATE tbljournal
     SET tot_credit='".$add."' WHERE jid=".$r['jid']);
   ?> 


    
<?php
}
?>
</table>
</div></div></div></div></form>


<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
