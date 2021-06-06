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
   

<body>
    <div id="printableArea">
  <div class="container" style="background: url('img/prashant.png'); no-repeat; background-size: cover; opacity:;">

    <page size="A4"></page>
     <center><img src="img/PRINT.png"  style="height:18%;"></img></center>
 
  

     <h1 style="margin-left:30%"><b>SLURY APPLICATION DETAILS</b></h1>

   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");

while ($r=mysqli_fetch_array($q)) {
  ?>
  <div style="margin-left: 20%">
 
<table class="table table-borderless table-condensed table-hover">
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
   
  </tr>
  
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
 <table class="table table-borderless table-condensed table-hover">
<?php
$q=mysqli_query($db,"select * from tblsluryapp where sid=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
 
    <tr>
    <td><b>Plot no:</b></td>
    <td>
      <?php echo $r["plot_no"];?>
    </td>
  </tr>

  <tr>
    <td><b>Plot name:</b></td>
    <td>
<?php echo $r["pname"];?>
    </td>
  </tr>

  <tr>
    <td><b>Date:</b></td>
     <td>
     <?php echo $r["date"];?>
    </td>
  </tr>

     <tr>
     <td><b>Start Time:</b></td>
      <td>
      <?php echo $r["stime"];?>
    </td>
   </tr>


   <tr>
     <td><b>End Time:</b></td>
      <td>
      <?php echo $r["etime"];?>
   </tr>

   <tr>
     <td><b>Duration:</b></td>
      <td>
      <?php echo $r["duration"];?> Hour
   </tr>

    <tr>
     <td><b>Prunning days:</b></td>
     <td>
     <?php echo $r["prunning_day"];?> day
    </td>
   </tr>

    <tr>
     <td><b>Equipment used:</b></td>
     <td>
     <?php echo $r["equipment_used"];?>
    </td>
   </tr>

   <tr>
      <td><b>Worker name:</b></td>
      <td>
      <?php echo $r["worker_name"];?>
    </td>
       </tr>

       <tr>
       <td><b>Slurry type:</b></td>
       <td>
    <?php echo $r["slury_typ"];?>
       <tr>

        <tr>
       <td><b>Content:</b></font>
       <td>
      <?php echo $r["content"];?>
    </td>
     </tr>


        <tr>
       <td><b>Quantity:</b></td>
       <td>
      <?php echo $r["quantity"];?> <?php echo $r["unit"];?>
    </td>
     </tr>
</table>
           
<?php
}?>   

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

  
