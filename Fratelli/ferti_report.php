<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
<?php include('head.php');?>
<?php include('config.php');?>

    <?php include("graphcss.php"); ?>
</head> 
<body class="sb-nav-fixed">
<?php  include('header.php');?>
  <h2 class="container"><b>FERTIGATION</b></b></h2>

<br>
<br>
 
<div class="row"> 
  <div style="margin-left: 0%"></div>
<div class="col-sm-5 form-group">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div></div>

<br><br>
    
<div class="row">
  <div style="margin-left: 0%"></div>
  <div class="col-sm-3">
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
  <div style="margin-left: 2%"></div>
  <div class="col-sm-2">
   <label><font color="black"><b>Cost</b></font></label>
  <input type="checkbox" class="checks" id="cost" onclick="f1();" value="cost" checked>
</div>

<div style="margin-left: -4%"></div>
<label><font color="black"><b>Total</b></font></label>
     <div class="col-sm-1" style="margin-left: 3%">
   <label class="switch">
  <input type="checkbox" class="checks" id="toggle" onclick="f1();" value="datewise" checked><span class="slider round" style="width:49px; height: 25px;"></span>
</label> 
</div> <div style="margin-left: -2%"></div><label><font color="black"><b>Datewise</b></font></label>
    </div>
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

 <table id="myTable" border="1" align="center" class="table" style="margin-left:2%;width:70%">
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
    <div class="col-sm-4" style="margin-left: -1%"></div>
    <div class="col-sm-5">
        <label><font color="black"><b>Total Worth:</b></font></label>
        <?php 
      echo $total;
   ?> 
</div></div>

<div style="margin-left: 35%">
<button class="btn btn-success" onclick="window.location.href='fertigation_report.php'">PRINT</button></div>
<?php include('footer.php'); ?>


</body>
</html>