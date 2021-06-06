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
.container {width:1100px;
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
	<title></title>
<body>
  <div id="printableArea" >
	<div class="container"  style="background: url('img/prashant.png'); no-repeat; background-size: cover; opacity:;">
	
		<page size="A4"></page>
		 <center><img src="img/PRINT.png"  style="height:15%;"></img></center>
 
  

     <h2 style="margin-left:40%"><b>LEDGER REPORT</b></h2>
     <div style="margin-left: 20%">

   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
 
<table class="table table-borderless table-condensed table-hover" >
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
</div>
<br><br>

<div id="noprint">
  <div class="row">
  <div class="col-sm-1" style="margin-left: 12%"></div>
  <label for="item"><b>Select Ledger:</b></label>  
  <div class="col-sm-5 form-group"> 
 <select name="voucher_type" id="ledger" class="form-control" onchange="showUser(this.value);">
        <option value="">Select Ledger:</option>
          <option value="cash">Cash</option>
              
                <?php
                    $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select name from tblledger where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $ledger){
                ?>
                        <option value="<?php echo $ledger['name'];?>"><?php echo $ledger['name'];?></option>
                <?php
                    }
                ?>
        </select>
  </div></div></div>
       



   <p  id="txtHint"></p>
   </div></div>

<script>
function showUser(str) {
  //alert(str);
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";

    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getLedger1.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>


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

  
