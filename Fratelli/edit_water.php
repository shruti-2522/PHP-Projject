<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

              <script type="text/javascript">
      function showUser(str) {
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;
              document.getElementById("pname").value = data[0].pname;
              console.log(data[0]['pname']);
            }
          };

          xmlhttp.open("GET", "getData5.php?str=" + str, true);
          xmlhttp.send();
        }
      }
    </script>
  
   
</head>
 <?php include('header.php');?>
 <?php include ("try2js.php");?>


<body class="sb-nav-fixed">
  <h2 class="w3-container"><font color="Black"><b> EDIT WATER ANALYSIS</b></font></b></h2>
    
<?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);
// mysqli_query($db,"update tblwater set plot_no='$plot_no',pname='$pname', date='$txtdate',prunning_day='$txtpday',sampleno='$txtsampleno' where water_id=".$_GET["id"]);

  mysqli_query($db,"update tblwater set plot_no='$plot_no',pname='$pname',date='$txtdate',prunning_day='$txtpday',sample_no='$txtsampleno',sample_purpose='$txtpurpose',sample_qty='$txtqty',sample_taken='$txtstaken',presence_of='$txtpresence',lab='$txtlab',ph_act='$a1',ph_status='$s1',tds_act='$a2',tds_status='$s2',ec_act='$a3',ec_status='$s3',ca_act='$a4',ca_status='$s4',mg_act='$a5',mg_status='$s5',co3_act='$a6',co3_status='$s6',hco3_act='$a7',hco3_status='$s7',na_act='$a8',na_status='$s8',cl_act='$a9',cl_status='$s9',no3n_act='$a10',no3n_status='$s10',k_act='$a11',k_status='$s11',cu_act='$a12',cu_status='$s12',b_act='$a13',b_status='$s13',sar_act='$a14',sar_status='$s14',rsc_act='$a15',rsc_status='$s15',status=0 where water_id=".$_GET["id"]);
  echo "<script>window.location.href='water.php';</script>";
    exit;
  
}
  $q1=mysqli_query($db,"select * from tblwater where water_id=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
?>

<form method="post">


<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-9">

    <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Plot No:</b></font></label>
                 <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);" oninput="showUser4(this.value);">
        <option value="<?php echo $r1['plot_no'];?>" selected><?php echo $r1['plot_no'];?></option>
              
                <?php
                       $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct(plot_no) from plot where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $plot_no){
                ?>
                        <option value="<?php echo $plot_no['plot_no'];?>"><?php echo $plot_no['plot_no'];?></option>
                <?php
                    }
                ?>
        </select>
        <div id="plot_no"></div>             
              </div>
                 <div class="col-sm-1"></div>
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Plot Name:</b></font></label>
              <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" value="<?php echo $r1['pname'];?>">
              </div>
            </div> 
 <input type="text"  id="pno" style="display: none">
<div class="row">
      <div class="col-sm-5 form-group">
        <label><font color="black"><b>Date:</b></font></label>
         <input type="Date" placeholder="Enter date.." class="form-control" name="txtdate" id="txtFirst"   oninput="myfunction();" value="<?php echo $r1['date'];?>" onchange="selectdate();">


              </div>
   <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
          <label><font color="black"><b>Days after Prunning:</b></font></label>
          <input  type="text"  name="txtpday" id="txtSecond" class="form-control"  value="<?php echo $r1['prunning_day'];?>">
      

          </div>
        </div>


            <div class="row">
            <div class="col-sm-5 form-group">
                <label><font color="black"><b>Sample No.:</b></font></label>
                      <input  type="text" name="txtsampleno" placeholder="Enter sample No.." class="form-control"  value="<?php echo $r1['sample_no'];?>">
             
              </div>
                 <div class="col-sm-1"></div>
          
            <div class="col-sm-5 form-group">
                <label><font color="black"><b>Purpose of sampling:</b></font></label>
               <input type="text"  name="txtpurpose" placeholder="Enter sample purpose.." class="form-control"  value="<?php echo $r1['sample_purpose'];?>"></textarea>
              </div>
            </div> 


<div class="row">
 <div class="col-sm-5 form-group">
  <label><font color="black"><b>Quantity of sample[Kg.]:</b></font></label>
  
   <input type="text"  class="form-control" placeholder="Enter sample Quantity.." name="txtqty"  value="<?php echo $r1['sample_qty'];?>">
</div>
   <div class="col-sm-1"></div>
 <div class="col-sm-5 form-group">
                <label><font color="black"><b>Sample taken by:</b></font></label>
                <input type="text"  name="txtstaken" placeholder="sample taken by.." class="form-control"   value="<?php echo $r1['sample_taken'];?>">
              </div>
            </div> 

<div class="row">
 <div class="col-sm-5 form-group">
  <label><font color="black"><b>In the presence of:</b></font></label>
   <input type="text"  name="txtpresence" placeholder="In presence of.." class="form-control"  value="<?php echo $r1['presence_of'];?>">
</div>
   <div class="col-sm-1"></div>
 <div class="col-sm-5 form-group">
                <label><font color="black"><b>Sent to Laboratory:</b></font></label>
                 <input type="text" class="form-control" placeholder="Enter Laboratary.." name="txtlab"  value="<?php echo $r1['lab'];?>">
   </div>
  </div> 

<table class="table" border="1" style="width: 92%">
  
        <tr rowspan="2">
            <th><font color="black"><b>Sr.No</b></font></th><th><font color="black"><b>Parameter</b></font></th><th><font color="black"><b>Unit</b></font></th><th><font color="black"><b>Actual Resul</b></font></th><th><font color="black"><b>Limit</b></font></th><th><font color="black"><b>Status</b></font></th>
         </tr><tr>
           <td><font color="black"><b>1</b></font></td><td><font color="black"><b>PH</b></font></td><td><b>-</b></td><td><input type="text" name="a1" id="phtxt1" onkeyup="act1();"  value="<?php echo $r1['ph_act'];?>"></td><td><font color="black"><b>6.5-7.5</b></font></td><td><input type="text" name="s1" id="phtxt2"   value="<?php echo $r1['ph_status'];?>"></td></tr>
            <td><font color="black"><b>2</b></font></td><td><font color="black"><b>TDS</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a2" id="tdstxt1" onkeyup="act2();"  value="<?php echo $r1['tds_act'];?>"></td><td><font color="black"><b>< 500</b></font></td><td><input type="text" name="s2" id="tdstxt2"  value="<?php echo $r1['tds_status'];?>"></td></tr>
            <td><font color="black"><b>3</b></font></td><td><font color="black"><b>EC</b></font></td><td><font color="black"><b>dS/m</b></font></td><td><input type="text" name="a3" id="ectxt1" onkeyup="act3();"  value="<?php echo $r1['ec_act'];?>"></td><td><font color="black"><b>< 1.6</b></font></td><td><input type="text" name="s3" id="ectxt2"  value="<?php echo $r1['ec_status'];?>"></td></tr>
            <td><font color="black"><b>4</b></font></td><td><font color="black"><b>Calcium as Ca</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a4" id="catxt1" onkeyup="act4();"  value="<?php echo $r1['ca_act'];?>"></td><td><font color="black"><b>< 100</b></td><td><input type="text" name="s4" id="catxt2"   value="<?php echo $r1['ca_status'];?>"></td></tr>
            <td><font color="black"><b>5</b></font></td><td><font color="black"><b>Magnesium as Mg</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a5" id="mgtxt1" onkeyup="act5();"   value="<?php echo $r1['mg_act'];?>"></td><td><font color="black"><b>< 30</b></font></td><td><input type="text" name="s5" id="mgtxt2"  value="<?php echo $r1['mg_status'];?>"></td></tr>
            <td><font color="black"><b>6</b></font></td><td><font color="black"><b>Carbonate as CaCO3</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a6" id="caco3txt1" onkeyup="act6();"  value="<?php echo $r1['co3_act'];?>"></td><td><font color="black"><b>Nil</b></font></td><td><input type="text" name="s6" id="caco3txt2"  value="<?php echo $r1['co3_status'];?>"></td></tr>
            <td><font color="black"><b>7</b></font></td><td><font color="black"><b>Bicarbonate as HCO3</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a7" id="hco3txt1" onkeyup="act7();"  value="<?php echo $r1['hco3_act'];?>"></td><td><font color="black"><b>< 305</b></font></td><td><input type="text" name="s7" id="hco3txt2"  value="<?php echo $r1['hco3_status'];?>"></td></tr>
            <td><font color="black"><b>8</b></font></td><td><font color="black"><b>Sodium as Na</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a8" id="natxt1" onkeyup="act8();"  value="<?php echo $r1['na_act'];?>"></td><td><font color="black"><b>< 35</b></font></td><td><input type="text" name="s8" id="natxt2"  value="<?php echo $r1['na_status'];?>"></td></tr>
            <td><font color="black"><b>9</b></font></td><td><font color="black"><b>Cloride as Cl</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a9" id="cltxt1" onkeyup="act9();"  value="<?php echo $r1['cl_act'];?>"></td><td><font color="black"><b>< 178</b></b></td><td><input type="text" name="s9" id="cltxt2"  value="<?php echo $r1['cl_status'];?>"></td></tr>
            <td><font color="black"><b>10</b></font></td><td><font color="black"><b>Nitrate Nitrogen as NO3-N</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a10" id="no3ntxt1" onkeyup="act10();"  value="<?php echo $r1['no3n_act'];?>"></td><td><b><font color="black"><b>< 5</b></font></td><td><input type="text" name="s10" id="no3ntxt2"  value="<?php echo $r1['no3n_status'];?>"></td></tr>
            <td><font color="black">11</font></td><td><font color="black"><b>Potassium as K</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a11" id="ktxt1" onkeyup="act11();"  value="<?php echo $r1['k_act'];?>"></td><td><b>-</b></td><td><input type="text" name="s11" id="ktxt2"  value="<?php echo $r1['k_status'];?>"></td></tr>
            <td><font color="black"><b>12</b></font></td><td><font color="black"><b>Copper as Cu</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a12" id="cutxt1" onkeyup="act12();"  value="<?php echo $r1['cu_act'];?>"></td><td><font color="black"><b>-</b></font></td><td><input type="text" name="s12" id="cutxt2"  value="<?php echo $r1['cu_status'];?>"></td></tr>
            <td><font color="black"><b>13</b></font></td><td><font color="black"><b>Boron as B</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a13" id="btxt1" onkeyup="act13();"   value="<?php echo $r1['b_act'];?>"></td><td><font color="black"><b>< 0.7</b></font></td><td><input type="text" name="s13" id="btxt2"  value="<?php echo $r1['b_status'];?>"></td></tr>
            <td><font color="black"><b>14</b></font></td><td><font color="black"><b>SAR(Sodium Absorption Ratio)</b></font></td><td><font color="black"><b>meq/lit</b></font></td><td><input type="text" name="a14" id="sartxt1" onkeyup="act14();"  value="<?php echo $r1['sar_act'];?>"></td><td><font color="black"><b>< 10</b></font></td><td><input type="text" name="s14" id="sartxt2"   value="<?php echo $r1['sar_status'];?>"></td></tr>
            <td><font color="black"><b>15</b></font></td><td><font color="black"><b>RSC(Residual Sodium Carbonate)</b></font></td><td><font color="black"><b>meq/lit</b></font></td><td><input type="text" name="a15" id="rsctxt1" onkeyup="act15();"  value="<?php echo $r1['rsc_act'];?>"></td><td><font color="black"><b>< 1.25</b></font></td><td><input type="text" name="s15" id="rsctxt2"  value="<?php echo $r1['rsc_status'];?>"></td></tr>
        </table>


      <br><br><br>

 

   <center>
         <button type="Submit" class="btn btn-success" name="btnsave"><b>UPDATE</b></button>
         </center>
         <br>
       </div>
</div>
</div>
<script type="text/javascript">
function difftime()
{
myStart=document.getElementById("time1").value;
myEnd=document.getElementById("time2").value;


function getTimeDiff(start, end) {

  return moment.duration(moment(end, "HH:mm").diff(moment(start, "HH:mm")));
}

diff = getTimeDiff(myStart, myEnd)
document.getElementById("time3").value=(`${diff.hours()} Hour`);

}
</script>

  
<script type='text/javascript'>
        function myfunction()
        {
            var ddate =document.getElementById('pno').value;
            var start_date=document.getElementById('txtFirst').value;
            var diff =  Math.floor(( Date.parse(start_date) - Date.parse(ddate) ) / 86400000);
            document.getElementById('txtSecond').value=(diff)+ "days";
        }
      </script>

 <script type="text/javascript">
      function showUser4(pno) {
        if (pno == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              
             
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;
              document.getElementById("pno").value = data[0].date;
              
              console.log(data[0]['date']);
            }
          };

          xmlhttp.open("GET", "getpdate.php?pno=" + pno, true);
          xmlhttp.send();
        }
      }

    </script>
    <script type="text/javascript">
  function selectdate()
  {
    alert("If you want to update the date please select plot no!..");
  }
  
</script>
      
</form>

  
  
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
