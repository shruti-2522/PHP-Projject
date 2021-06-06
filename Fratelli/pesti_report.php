<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <?php include('head.php');?>
  <style>
body{
  overflow: auto;
}
</style>

  <?php include('config.php');?>

  <?php include('graphcss.php');?>
</head>

<?php  include('header.php');?>
<?php 

  $ses_id=$_SESSION['plot_id'];
  $q=mysqli_query($db,"SELECT SUM(tot_amount) as psum FROM tblp1 where ses_id='".$ses_id."' and status=0 ");
  $r=mysqli_fetch_array($q);
  
  $q1=mysqli_query($db,"select sum(tblp1.tot_amount) as asum from tblp1,tblitem WHERE tblitem.item_type='Assets' and tblitem.item_name=tblp1.item_name and tblp1.ses_id='".$ses_id."' and status=0 ");
  $r1=mysqli_fetch_array($q1);
   
   $q5=mysqli_query($db,"select sum(firstSum) as fsum from (select Sum(total) firstSum from tbldisease where tbldisease.ses_id=5 and status=0 union select Sum(total) firstSum from tblfertilizer where tblfertilizer.ses_id=5 and status=0 union select Sum(total) firstSum from tblgr WHERE tblgr.ses_id='".$ses_id."' and status=0 ) tbl");
  $r5=mysqli_fetch_array($q5);

 
?>

  <h2><b>PESTICIDE APPLICATION</b></h2>
<br><br>

<?php

?>

<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']}).then(function drawChart() {

        

</script>
<body  class="sb-nav-fixed">

<form method="post">
<div class="row">
<div class="col-sm-0" style="margin-left: 0%"></div>   
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>
<br><br>

   <div class="row">
    <div class="col-sm-0"></div>
    <div class="col-sm-1">
    <b>Pesticide</b><input type="checkbox" class="checks" onclick="getValue();" value="pesticide" style="margin-right:10px;" checked></div>
     <div class="col-sm-1">
      <b>Insecticide</b>
    <input type="checkbox" class="checks" onclick="getValue();" value="insecticide" style="margin-right:10px;" checked></div>
    <div class="col-sm-1">
      <b>Fungicide</b>
    <input type="checkbox" class="checks" onclick="getValue();" value="fungicide" style="margin-right:10px;" checked></div>
    <div  class="col-sm-1">
      <b>Cost</b>
           <br><input type="checkbox" class="checks" onclick="getValue();" value="cost" style="margin-right:10px;" checked></div>
         <div class="col-sm-0"><label><b>Inventory</b></label></div><div style="margin-left: 5%"></div><div class="col-sm-1"><label class="switch"><input type="checkbox" class="checks" onclick="getValue();" value="datewise" checked><span class="slider round" style="height:28px; width:50%;"></span></label></div><div  class="col-sm-1"><b>Datewise</b></font></div></div>

    <br>
 <div class="row">
    <div style="margin-left: 0%"></div>
    <div class="col-sm-4 form-group">
<select name="txtplot" id="plot" class="form-control checks"  onclick="getValue();">
    <option value="">Select Plot</option>
    <option value="allplot" selected><center>All Plot</center></option>
      <?php
         $q=mysqli_query($db,"select distinct(plot_no) from tbldisease1 where ses_id=".$ses_id);
            foreach ($q as $txtplot){
      ?>
      <option value="<?php echo $txtplot['plot_no'];?>"><?php echo $txtplot['plot_no'];?></option>
      <?php
          }
      ?> 
    </select>

</div>
</div>
     <p  id="txtHint"></p>

<script>
function getValue() {
    document.getElementById('tworth').style.display='none';
 
    var checks = document.getElementsByClassName('checks');
    var plot=document.getElementById('plot').value;
   // alert(plot);
    
    var str = '';

    for ( i = 0; i < 5; i++) {
        if ( checks[i].checked === true ) {
            str += checks[i].value + " ";
        }
    }
   // alert(str);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","showpreport.php?q="+str+"&plot="+plot,true);
    xmlhttp.send();
  document.getElementById("myTable").remove(); 
   
}

</script>
</form>

<table id="myTable" border="1" class="w3-table">
  <tr >
   <th><b>Sr No.</b></th>
    <th><b>Date</b></th>
    <th><b>Particular</b></th>
    <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Cost</b></th>
    <th><b>Water lit</b></th>
    <th><b>Type</b></th>
    <th><b>Application</b></th>
</tr>
<?php
   $q1=mysqli_query($db,"select * from tbldis where (item_type='pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["pesticide"];?>
    </Td> 
    <td><?php echo $r1["plot_no"];?></td>
    <td>
      <?php
        $q2=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["pesticide"]."' and ses_id='".$ses_id."'");
        $r2=mysqli_fetch_array($q2);
        echo $r2['ingredient'];
      ?>
    </td>
     <Td>
      <?php echo $r1['bno'];?>
    </Td> 
    <td><?php echo $r1['edate'];?></td>
    <td><?php echo $r1['disease'];?></td>
    <td><?php echo $r1['preventive'];?></td>
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1["aunit"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r1["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r1["moa"];;
      ?>
    </Td> 
   
  </tr>


<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
?>
</table>
<br>

<div class="row" id="tworth">
  <div style="margin-left: 40%">
    <b>Total Worth:</b> <?php 
      echo $total;
   ?> 
  </div>
  </div>
  <br><br>

<div style="margin-left: 45%">
<button class='btn btn-success' onclick="window.location.href='pesticide_report.php'">PRINT</button>
</div>


<?php include('footer.php');?>
</body>
</html>


