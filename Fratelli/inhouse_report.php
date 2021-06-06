</head>
<!DOCTYPE html>
<html>
<head>
  <?php include('head.php');?>
  <?php include('config.php');?>

<style type="text/css">
td
{
 padding:0 4px;  
}
.container {width:1070px;
      margin:0 auto;
      padding:10px 25px;
      border:1px solid #ccc;
      background:#fff; }
</style>
  <title></title>
 
<body>
   <div id="printableArea">
  <div class="container">
    <div  style="background: url('img/prashant.png'); no-repeat; background-size: cover; opacity:;">
 
    <page size="A4"></page>
     <center><img src="img/PRINT.png"  style="height:18%;"></img></center>
 
  

     <h1 style="margin-left:22%"><b>INHOUSE CALIBRATION DETAILS</b></h1>

   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");

while ($r=mysqli_fetch_array($q)) {
  ?>
  <div style="margin-left: 18%">
 
<table class="table" >
   <tr style="border: hidden;">
    <td><b>Farm Name:</b>
      <?php echo $r["farm_name"];?></td>
      <td>
       <b>GGN no:</b>
     <?php echo $r['GGN_no'];?>
    </td>
  </tr>

 <tr style="border: hidden;">
  <td><b>Owner Name:</b>
    <?php echo $r["owner_name"];?>
    </td>
    
    <td><b>Address:</b>
     <?php echo $r["addrs"];?> 
    </td>
  
  </tr>
  
  <tr>
   <td><b>Phone No:</b> 
    <?php echo $r["phone_no"];?>
    </td>

 
  </tr>

  <tr>
  </tr>
 
  <?php
}
?>
</table>
<br><br>
<?php
$q=mysqli_query($db,"select * from tblinhouse where in_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
 

<div style="margin-left: 1%">
<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Sr No:</b></font></label>
          <font color="black"><?php echo $r["srno"];?></font>
   </div>

<div class="col-sm-0"></div>
            <div class="col-sm-4 form-group">
          <label><font color="black"><b>Machine:</b></font></label>
        <font color="black"><?php echo $r["machine_name"];?></font>
        </div>
  
  </div>
    <div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date:</b></font></label>
          <font color="black"><?php echo $r["date_interval"];?></font>
   </div>



<div class="col-sm-0"></div>
            <div class="col-sm-4 form-group">
          <label><font color="black"><b>Time Interval:</b></font></label>
        <font color="black"><?php echo $r["time_interval"];?></font>
        </div>
  
  </div>
  <div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Used Interval:</b></font></label>
          <font color="black"><?php echo $r["used_interval"];?></font>
   </div>

   <div class="col-sm-0"></div>
      <div class="col-sm-5 form-group">
        <label><font color="black"><b>Title of work:</b></font></label>
          <font color="black"><?php echo $r["title"];?></font>
   </div>
 </div>

<div class="row">
 <div class="col-sm-6 form-group">
          <label><font color="black"><b>Remark:</b></font></label>
        <font color="black"><?php echo $r["remark"];?></font>
        </div>
  
  </div></div>
 
           
<?php
}?>   

</div>
</div>
</div>
</div>

<br>


<center><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></center>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>
<br>
</body>
</html>

  
