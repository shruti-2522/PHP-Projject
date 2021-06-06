<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
  <?php include('graphcss.php');?>
</head>
<body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-4 form-group"><h2><b>LEDGER</b></h2></div>
        
       
 

<?php
$ses_id=$_SESSION['plot_id'];
if(isset($_POST['btnsave']))
{

$str1=$_POST['lname'];
 $_SESSION['lname']=$str1;
 $q11=mysqli_query($db,"select count(*) as cnt from tblmultitem where supplier = '".$_POST['lname']."' and payment_mode ='cash' and ses_id='".$ses_id."'" );
 $r11=mysqli_fetch_array($q11);


  $q12=mysqli_query($db,"select count(*) as cnt1 from tblpurcahse1 where paccount_name= '".$_POST['lname']."' and payment_mode ='cash' and ses_id='".$ses_id."'" );
 $r12=mysqli_fetch_array($q12);
 
 ?>
 <script>
    var s="<?php echo $str1;?>";
  </script>
  <?php
if($r11['cnt']==0 && $r12['cnt1']==0)
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
<div class="row">
  <div class="col-sm-2">
  <label for="item"><b>Select Ledger:</b></label>
</div>
<div class="col-sm-4 form-group">
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
    xmlhttp.open("GET","getLedger11.php?q="+str,true);
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
    xmlhttp.open("GET","getLedger12.php?q="+str,true);
    xmlhttp.send();
    
  }

}
</script>


<div id="myDiv" style="display: none;">
<div class="row">

  <div style="margin-left: 2%"></div>
<label><font color="black"><b>Cash</b></font></label>
     <div class="col-sm-1" style="margin-left: 3%">
   <label class="switch">
 <input type="checkbox" value='other' id='my' onclick="getValue1();" checked><span class="slider round" style="width:49px; height: 25px;"></span>
</label> 
</div><!-- col-sm-1 -->
 <div style="margin-left:0%"></div><label><font color="black"><b>Other Voucher</b></font></label></div>
  
  </div><!-- Row -->
</div><!-- MYDIV -->

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
    xmlhttp.open("GET","byitem.php?q="+str,true);
    xmlhttp.send();
  
}
</script>
<div id="mid" style="display: none;">
  <?php include('ab.php');?>

</div>

<div style="margin-left: 35%">
<button class="btn btn-success" onclick="window.location.href='ledger_print1.php'">PRINT</button>
</div>


<?php// include('reght_sidebar.php');?>
<?php// include('footer.php');?>
 <script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
          
             
    </body>
</html>