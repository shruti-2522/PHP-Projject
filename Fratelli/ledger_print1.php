</head>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
  <?php include('graphcss.php');?>

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


</head>
<body class="sb-nav-fixed">
  
       
  <div id="printableArea" >
  <div class="container"  style="background: url('img/prashant.png'); no-repeat; background-size: cover; opacity:;">
  
    <page size="A4"></page>
     <center><img src="img/PRINT.png"  style="height:15%;"></img></center>
 
  
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
        
       
 

<?php
$ses_id=$_SESSION['plot_id'];
if(isset($_POST['btnsave']))
{

$str1=$_POST['lname'];

 $_SESSION['lname']=$str1;
 $q11=mysqli_query($db,"select count(*) as cnt from tblmultitem where supplier = '".$_POST['lname']."' and payment_mode ='cash' and ses_id='".$ses_id."'" );
 $r11=mysqli_fetch_array($q11);
 ?>
 <script>
    var s="<?php echo $str1;?>";
  </script>
  <?php
if($r11['cnt']==0)
{
    echo '<BODY onLoad="showUser12(s)">';

}
else
{

    echo '<BODY onLoad="showUser13(s)">';

}
}
?>

<form method="post">

  <div id="noprint">
<div class="row">
   <div class="col-sm-1" style="margin-left: 13.5%"></div>
  <label for="item"><b>Select Ledger:</b></label>  
  <div class="col-sm-5 form-group"> 
  <select name="voucher_type" id="ledger" class="form-control"  onchange="showUser11(this.value);">
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

         <input type="text" id="lname" name="lname" value="<?php echo $_SESSION['lname']; ?>" style="display: none;">

  </div><!-- seelect -->


  <div class="col-sm-3" >
    <input type="submit" class="btn btn-success" name="btnsave" value="GET REPORT">
  </div><!-- button -->
</div><!-- row -->
    <div id="ledger"></div>
  </div>
     


 <p  id="txtHint"></p>
</form>




<script>
  function showUser11(str)
  {
  
    document.getElementById('lname').value=str;

  }
</script>

<script>
function showUser12(str) {
//  alert(str);
    document.getElementById("my").remove(); 

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
    xmlhttp.open("GET","getLedger111.php?q="+str,true);
    xmlhttp.send();

    document.getElementById("my").remove();
  }
}
</script>


<script>
function showUser13(str) {
 // alert(str);
  document.getElementById('myDiv').style.display="block";

  document.getElementById('mid').style.display="block";
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
    xmlhttp.open("GET","getLedger123.php?q="+str,true);
    xmlhttp.send();
    
  }

}
</script>


<div id="noprint">
<div id="myDiv" style="display: none;">
<div class="row">

  <div style="margin-left: 22%"></div>
<label><font color="black"><b>Other Voucher</b></font></label>
     <div class="col-sm-1" style="margin-left: 3%">
   <label class="switch">
 <input type="checkbox" value='cash' id='my' onclick="getValue1();" checked><span class="slider round" style="width:49px; height: 25px;"></span>
</label> 
</div><!-- col-sm-1 -->
 <div style="margin-left:0%"></div><label><font color="black"><b>Cash</b></font></label>
  
  </div><!-- Row -->
</div><!-- MYDIV -->
</div>
 
  <p  id="txtHin"></p>   


   
<script>
function getValue1() {
    document.getElementById('mid').style.display="none";
var x=document.getElementById('lname').value;
var y=document.getElementById('my');
if(y.checked)
{
var final=y.value;
}
var str=final+" "+x; 
 // alert(str);  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHin").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","byitem1.php?q="+str,true);
    xmlhttp.send();
  
}
</script>
<div id="mid" style="display: none;">
  <?php include('ab1.php');?>

</div>
 

 </div></div>

<div id="noprint">
<center><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></center></div>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>


<?php// include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>