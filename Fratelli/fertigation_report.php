
<!DOCTYPE html>
<html>
<head>
	<?php include('head.php');?>
	<?php include('config.php');?>

<style type="text/css">


        @media print {
      #noprint, #noprint *
    {
        display: none !important;
    }}
</style>
	<title></title>
</head>
	 <body>
    <div id="printableArea">
    <div class="container" >
        <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q)) {
  ?>


    <div style="margin-left: 42%;margin-bottom:1px;" class="text-success">
      <?php echo $r1['farm_name'];?>
    </div>
       <div style="margin-left: 43%;" class="mt-0">
     <?php echo $r1['addrs'];?>
    </div>
    <div style="margin-left: 42%;" class="mt-0">
     <?php echo $r1['taluka'];?>  <?php echo $r1['district'];?>
    </div>
     <div style="margin-left: 43%;" class="mt-0">
     <?php echo $r1['pin_code'];?>  
    </div>
     <div style="margin-left: 37%;" class="mt-0">
     <i class="fas fa-phone"></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i> <?php echo $r1['email'];?>
    </div>

   

   <?php
}
?>

 

  
<br><br>
<div id="noprint">

<div class="row"> 
  <div class="col-sm-0" style="margin-left:27%;"></div>
<div class="col-sm-5 form-group">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div></div>

<br><br>
    
<div class="row">
  <div class="col-sm-0" style="margin-left:27%;"></div>
  <div class="col-sm-4">
   <select name="txtplot" id="plot" class="form-control" onchange ="f1();">
    <option value=""><center>Select Plot</center></option>
    <option value="allplot" selected><center>All Plot</center></option>
      <?php
      $ses_id=$_SESSION['plot_id'];
         $q=mysqli_query($db,"select plot_no from plot where ses_id=".$ses_id);
            foreach ($q as $txtplot){
      ?>
      <option value="<?php echo $txtplot['plot_no'];?>"><?php echo $txtplot['plot_no'];?></option>
      <?php
          }
      ?> 
    </select>
  </div>
 
  <div class="col-sm-2">
   <label><font color="black"><b>Cost</b></font></label>
  <input type="checkbox" class="checks" id="cost" onclick="f1();" value="cost" checked>
</div>

<div style="margin-left: -7%"></div>
<label><font color="black"><b>Total</b></font></label>
     <div class="col-sm-1" style="margin-left: 2%">
   <label class="switch">
  <input type="checkbox" class="checks" id="toggle" onclick="f1();" value="datewise" checked><span class="slider round" style="width:49px; height: 25px;" ></span>
</label> 
</div> <div style="margin-left: -4%"></div><label><font color="black"><b>Datewise</b></font></label>
    </div></div>
     <p  id="txtHint"></p>

   </div>


    <script type="text/javascript">
        function f1()
        {
            var e = document.getElementById("plot");
        
    var result = e.options[e.selectedIndex].value;
    var checkBox = document.getElementById("toggle");
     var str1='';
     if (checkBox.checked == true){
     str1=document.getElementById("toggle").value;
        }
     var checkBox1 = document.getElementById("cost");
     var str2='';
     if (checkBox1.checked == true){
     str2=document.getElementById("cost").value;
        } 
     
        var ss=result+' '+str1+' '+str2;
       // alert(ss);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","show_ferti.php?q="+ss,true);
    xmlhttp.send();
         document.getElementById("myTable").remove(); 
    document.getElementById('tworth').style.display='none';
 
    
}
    </script>
 <table id="myTable" border="1" align="center" class="table" style="width:60%">
    <tr>
    <td><b> Sr No.</b></td>
    <td><b>Date</b></td>
    <td><b>Particular</b></td>
    <td><b>Plot No</b></td>
    <td><b>Quantity</b></td>
    <td><b>Cost</b></td>
    <td><b>Method</b></td></div></div>
  </tr>
    <?php
 
     $q1=mysqli_query($db,"SELECT fdate,fert_name,plot_no,qty_app,purchase_rate,method_app FROM tblfertsession where ses_id='".$ses_id."' and draft_status=0 order by fdate");
 
    $i=1;
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fdate']; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>
            <td>
              <?php
                echo $r1['plot_no'];
              ?>
            </td>
            <td>
              <?php echo $r1['qty_app'].' Kg'; ?>
            </td>
            <td>
              <?php 
                $amt=$r1['purchase_rate']*$r1['qty_app'];
              echo $amt; ?>
            </td>
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
        <?php
        $total=$total+$amt;
        }
  
  ?>
  </table>
  <br>
  <div class="row" id="tworth">
    <div class="col-sm-4" style="margin-left: 8%"></div>
    <div class="col-sm-5">
        <label><font color="black"><b>Total Worth:</b></font></label>
        <?php 
      echo $total;
   ?> 
</div></div></div>
<br>
</div></div><br>


<dib style="margin-left: 45%;"><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></div>
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

  
