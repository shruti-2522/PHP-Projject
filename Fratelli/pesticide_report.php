</head>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <?php include('head.php');?>
  <style>

.container {width:1900px;
      margin:0 auto;
      padding:10px 25px;
      border:1px solid #ccc;
      background:#fff; }


    @media print {
      #noprint, #noprint *
    {
        display: none !important;
    }

}
</style>
  <?php include('config.php');?>
  <?php include('graphcss.php');?>
</head>
<body class="sb-nav-fixed">
<br><br>
  
 <div id="printableArea">
  

    <div style="background: url('img/prashant.png'); no-repeat; background-size: cover; opacity:;">
  
    <page size="A4"></page>
     <center><img src="img/PRINT.png"  style="height:15%;"></img></center>
 
 

     <h2 style="margin-left:35%"><b>PESTICIDE APPLICATION</b></h2>

   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
 <div style="margin-left: 12%">
 
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
 
  <?php
}
?>
</table>
<html>
<head>

</script>
<body  class="sb-nav-fixed">

<form method="post">
  <div id="noprint">
<div class="row">
<div class="col-sm-0" style="margin-left: 0%"></div>   
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>
</div>

<br><br>

<div id="noprint">
   <div class="row">
    <div class="col-sm-3">
    <b>Pesticide</b><input type="checkbox" class="checks" onclick="getValue();" value="pesticide" checked></div>
     <div class="col-sm-3">
      <b>Insecticide</b>
    <input type="checkbox" class="checks" onclick="getValue();" value="insecticide"  checked></div>
    <div class="col-sm-3">
      <b>Fungicide</b>
    <input type="checkbox" class="checks" onclick="getValue();" value="fungicide"  checked></div>
    <div  class="col-sm-3">
      <b>Cost</b>
           <input type="checkbox" class="checks" onclick="getValue();" value="cost" checked></div>
         </div>
         <br>
         <div class="row">
         <div class="col-sm-1"><label><b>Inventory</b></label></div><div style="margin-left: 5%"></div><div class="col-sm-1"><label class="switch"><input type="checkbox" class="checks" onclick="getValue();" value="datewise" checked><span class="slider round" style="height:28px; width:50%;"></span></label></div><div  class="col-sm-1"><b>Datewise</b></font></div></div>

    <br>
 <div class="row">
    <div class="col-sm-0"></div>
    <div class="col-sm-5 form-group">
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
    xmlhttp.open("GET","showpreport1.php?q="+str+"&plot="+plot,true);
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
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 order by sdate");
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
  

</div></div></div><div></div>
  <br><br>

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


<?php include('footer.php');?>
</body>

</html>


