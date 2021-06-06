<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>

  

</head>
<body class="sb-nav-fixed">
<?php  include('header.php');?>
  
  <h2 class="w3-container"><b>DISEASE-CONTROL</b></b></h2>
  <br>


 <?php
$q=mysqli_query($db,"select * from tbldisease1 where did=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>

<div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">


<table class="table table-borderless table-condensed table-hover" id="myInput">
  <tr class="header">
     <tr>
     <td><b>Plot No:</b></td>
      <td>
     <?php echo $r["plot_no"];?>
    </td>
  </tr>


      <tr>
    <td><b>Plot Name:</b></td>
     <td>
     <?php echo $r["pname"];?>
    </td>
    </tr>

     <tr>
    <td><b>Date:</b></td>
     <td>
     <?php echo $r["sdate"];?>
    </td>
  </tr>

  <tr>
    <td><b>Days After Prunning:</b></td>
     <td>
     <?php echo $r["days_after_prunning"];?>
  </tr>


    <tr>
    <td><b>Preventive:</b></td>
    <td>
     <?php echo $r["preventive"];?>
    </td>
  </tr>

  <tr>
    <td><b>Equipment Used:</b></td> 
     <td>
      <?php echo $r["equipment"];?>
    </td>
  </tr>

  <tr>
    <td><b>No. Of Nozzle:</b></td>
     <td>
      <?php echo $r["no_of_nozzle"];?>
    </td>
  </tr>

  <tr>
    <td><b>Discharge:</b></td>
    <td>
     <?php echo $r["discharge"];?> lit/min
    </td>
  </tr>

  <tr>
      <td><b>Duration:</b></td>
   
    <td>
      <?php echo $r["duration"];?>
    </td>
  </tr>

<tr>
    <td><b>Water Required:</b></td>
    
    <td>
      <?php echo $r["water_required"];?>
    </td>
  </tr>
  <tr>
    <td><b>Water Used:</b></td>
    
    <td>
    <?php echo $r["water_used"];?>
    </td>
  </tr>
   <tr>
    <td><b>Method Of Application:</b></td>
    
    <td>
     <?php echo $r["moa"];?>
    </td>
  </tr>

   <tr>
    <td><b>Operated By Worker:</b></td>
    
    <td>
     <?php echo $r["oworker"];?>
  </tr>
  
   <tr>
    <td><b>Disposal Other Remain:</b></td>
    
    <td>
     <?php echo $r["dor"];?></td>
  </tr>
  <tr>
      <td><b>Temperature:</b></td>
    
    <td>
    <?php echo $r["temp"];?>
    </td>
  </tr>
  <tr>
      <td><b>Humidity:</b></td>
    
    <td>
     <?php echo $r["humidity"];?>
    </td>
  </tr>
  </td>
    
    
    
    
  

</table>
<br>
    <table class="table" border="1" id="myTable" style="margin-left: 3%; width: 45%">
  <tr>
    <td><b>Name Of Pesticide</b></td>
    <td><b>Batch No</b></td>
    <td><b>Expiry Date</b></td>
     <td><b>Pes/Disease</b></td>
    <td><b>PHI</b></td>
    <td><b>Requred Quantity</b></td>
     <td><b>Used Quantity</b></td>
    <td><b>Applied Quantity</b></td>
   <td><b>Unit</b></td></tr>
      <?php 
      $q1=mysqli_query($db,"select * from tbldissession where did=".$r['did']); 
     while ($r1=mysqli_fetch_array($q1)) 
     {

     
      // $str_arr = explode (",", $r['pesticide']);  
      // $b = explode (",", $r['bno']);
      // $g = explode (",", $r['edate']);
      // $c = explode (",", $r['disease']);
      // $d = explode (",", $r['phi']);
      // $e = explode (",", $r['Arqty']);
      //  $f = explode (",", $r['Auqty']);
      //   $g = explode (",", $r['Aaqty']);
      //  $h = explode (",", $r['act_unit']);

        ?>
        <tr>
     <td>
    <font color="black">
        <?php
          echo $r1['item_name'];
        ?>
      </font>
    </td>
      <td>
        <font color="black">
      <?php echo $r1['bno'];?>
    </font>
    </td>
     <td>
        <font color="black">
      <?php echo $r1['edate'];?>
    </font>
    </td>      <td>
      <font color="black">
      <?php echo $r1['disease'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['phi'];?>
    </font>
    </td>
      <td>
      <font color="black">
      <?php echo $r1['Arqty'];?>
    </font>
    </td>  
    <td>
      <font color="black">
      <?php echo $r1['Auqty'];?>
    </font>
    </td>
 <td>
      <font color="black">
      <?php echo $r1['Aaqty'];?>
    </font>
    </td>
     <td>
      <font color="black">
      <?php echo $r1['act_unit'];?>
    </font>
    </td>
  </tr>

  <?php
    }

?>
</table>

<div class="row">
  <div class="col-sm-6"></div>
  <button class="btn btn-success" onclick="window.location.href='disease.php'"><b>BACK</b></button>
  <div style="margin-left:3%"></div>
  <button class="btn btn-success"  onclick="window.location.href='disease_report.php?id=<?php echo $r['did'];?>'"><b>PRINT</b></button>
</div></div>


   
    <?php
  }?>
   </div>
</div>
</div>
<br><br>

<?php include('footer.php');?>
</body>
  </html>