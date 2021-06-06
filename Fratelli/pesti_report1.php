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
<body  class="sb-nav-fixed">


<?php include('header.php');?>

  <h2><b>PESTICIDE APPLICATION</b></h2>





<form method="post">
  

<div class="container">
<div class="row">
<div class="col-sm-0" style="margin-left: 2%"></div>   
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>
</div>
<br><br>
   <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-1">
    <b>Pesticide</b><input type="checkbox" class="checks" onclick="getValue();" value="Pesticide" style="margin-right:10px;" checked></div>
     <div class="col-sm-1">
      <b>Insecticide</b>
    <input type="checkbox" class="checks" onclick="getValue();" value="Insecticide" style="margin-right:10px;" checked></div>
    <div class="col-sm-1">
      <b>Fungicide</b>
    <input type="checkbox" class="checks" onclick="getValue();" value="Fungicide" style="margin-right:10px;" checked></div>
     <div class="col-sm-1">
      <b>Fertilizer</b>
    <input type="checkbox" class="checks" onclick="getValue();" value="Fertilizer" style="margin-right:10px;" checked></div>
     <div class="col-sm-2">
      <b>Growth Regulator</b><br>
    <input type="checkbox" class="checks" onclick="getValue();" value="Growth" style="margin-right:10px;" checked></div>
    <div  class="col-sm-1">
      <b>Cost</b>
           <br><input type="checkbox" class="checks" onclick="getValue();" value="cost" style="margin-right:10px;" checked></div>
         <div class="col-sm-0"><label><b>Inventory</b></label></div><div style="margin-left: 5%"></div><div class="col-sm-1"><label class="switch"><input type="checkbox" class="checks" onclick="getValue();" value="datewise" checked><span class="slider round" style="height:28px; width:50%;"></span></label></div><div  class="col-sm-1"><b>Datewise</b></font></div></div>

    <br>
 <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-4 form-group">
<select name="txtplot" id="plot" class="form-control checks"  onclick="getValue();">
    <option value="">Select Plot</option>
    <option value="allplot" selected><center>All Plot</center></option>
      <?php
      $ses_id=$_SESSION['plot_id'];
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

    for ( i = 0; i < 7; i++) {
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
    xmlhttp.open("GET","report_pest.php?q="+str+"&plot="+plot,true);
    xmlhttp.send();
  document.getElementById("myTable").remove(); 
   
}

</script>
</form>

<table id="myTable" border="1" class="table">
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
$ses_id=$_SESSION['plot_id'];
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide' or item_type='Fertilizer' or item_type='Growth Regulator') and ses_id='".$ses_id."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."' order by sdate");
        $r2=mysqli_fetch_array($q2);
   
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r2["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td> 
    <td><?php echo $r2["plot_no"];?></td>
    <td>
      <?php
      $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
        
      ?>
    </td>
     <Td>
      <?php echo $r1['bno'];?>
    </Td> 
    <td><?php echo $r1['edate'];?></td>
    <td><?php echo $r1['disease'];?></td>
    <td><?php echo $r2['preventive'];?></td>
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1["aunit"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
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


