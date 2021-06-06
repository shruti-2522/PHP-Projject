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
<body class="sb-nav-fixed">

 <?php include('header.php');?>
<?php include ("tryjs.php");?>
  <h2 class="container"><font color="Black"><b>EDIT SOIL</b></font></b></h2>
<?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);
  
  mysqli_query($db,"update tblsoil set plot_no='$plot_no',pname='$pname',date='$txtdate',prunning_day='$txtpday',sample_no='$txtsampleno',sample_purpose='$txtpurpose',sample_qty='$txtqty',sample_taken='$txtstaken',presence_of='$txtpresence',lab='$txtlab',ph_act='$a1',ph_status='$s1',ec_act='$a2',ec_status='$s2',carbon_act='$a3',carbon_status='$s3',N_act='$a4',N_status='$s4',p_act='$a5',P_status='$s5',K_act='$a6',K_status='$s6',Ca_act='$a7',Ca_status='$s7',Mg_act='$a8',Mg_status='$s8',S_act='$a9',S_status='$s9',Fe_act='$a10',Fe_status='$s10',Mn_act='$a11',Mn_status='$s11',Zn_act='$a12',Zn_status='$s12',Cu_act='$a13',Cu_status='$s13',B_act='$a14',B_status='$s14',Mo_act='$a15',Mo_status='$s15',Na_act='$a16',Na_status='$s16',Cl_act='$a17',Cl_status='$s17',CaCO3_act='$a18',CaCO3_status='$s18',status=0 where soil_id=".$_GET["id"]);
 echo "<script>window.location.href='soil.php';</script>";
    exit;
}
  $q1=mysqli_query($db,"select * from tblsoil where soil_id=".$_GET["id"]);
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
                <label><font color="Black"><b>Plot No:</b></font></label>
                 <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);" oninput="showUser4(this.value);">
        <option value="<?php echo $r1['plot_no'];?>"selected><?php echo $r1['plot_no'];?></option>
              
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
                <label><font color="Black"><b>Plot Name:</b></font></label>
              <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname"  value="<?php echo $r1['pname'];?>">
              </div>
            </div> 
     <input type="text"  id="pno" style="display: none">
<div class="row">
      <div class="col-sm-5 form-group">
        <label><font color="Black"><b>Date:</b></font></label>
         <input type="Date" placeholder="Enter date.." class="form-control" name="txtdate" id="txtFirst"  oninput="myfunction();"  value="<?php echo $r1['date'];?>" onchange="selectdate();">


              </div>
 <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
          <label><font color="Black"><b>Days after Prunning:</b></font></label>
          <input  type="text"  name="txtpday" id="txtSecond" class="form-control"  value="<?php echo $r1['prunning_day'];?>" >
       

          </div>
        </div>


            <div class="row">
            <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Sample No.:</b></font></label>
                      <input  type="text" name="txtsampleno" placeholder="Enter sample No.." class="form-control" value="<?php echo $r1['sample_no'];?>">
             
              </div>

               <div class="col-sm-1"></div>
          
            <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Purpose of sampling:</b></font></label>
               <input type="text"  name="txtpurpose" placeholder="Enter sample purpose.." class="form-control" value="<?php echo $r1['sample_purpose'];?>"></textarea>
              </div>
            </div> 


<div class="row">
 <div class="col-sm-5 form-group">
  <label><font color="Black"><b>Quantity of sample[Kg.]:</b></font></label>
  
   <input type="text"  class="form-control" placeholder="Enter sample Quantity.." name="txtqty" value="<?php echo $r1['sample_qty'];?>">
</div>
 <div class="col-sm-1"></div>
 <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Sample taken by::</b></font></label>
                <input type="text"  name="txtstaken" placeholder="sample taken by.." class="form-control" value="<?php echo $r1['sample_taken'];?>">
              </div>
            </div> 

<div class="row">
 <div class="col-sm-5 form-group">
  <label><font color="Black"><b>In the presence of:</b></font></label>
   <input type="text"  name="txtpresence" placeholder="In presence of.." class="form-control" value="<?php echo $r1['presence_of'];?>">
</div>
 <div class="col-sm-1"></div>
 <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Sent to Laboratory:</b></font></label>
                 <input type="text" class="form-control" placeholder="Enter Laboratary.." name="txtlab" value="<?php echo $r1['lab'];?>">
   </div>
  </div> 

<table class="table" border="1" style="width:92%">
  
        <tr rowspan="2">
            <th><font color="Black"><b>Sr.No</b></font></th><th><font color="Black"><b>Parameter</b></font></th><th><font color="Black"><b>Unit</font></b></th><th><font color="Black"><b>Actual Result</b></font></th><th><font color="Black"><b>Limit</b></font></th><th><font color="Black"><b>Status</b></font></th>
         </tr><tr>
            <td colspan=6><font color="Black"><b>Chemical Properties</b></font></td></tr>
            <tr>
            <td><font color="Black">1</font></td><td><font color="Black"><b>PH</b></font></td><td>-</td><td><input type="text" name="a1" id="phtxt1" onkeyup="act1();" value="<?php echo $r1['ph_act'];?>"></td><td><font color="Black"><b>6.5-7.5</b></font></td><td><input type="text" name="s1" id="phtxt2" value="<?php echo $r1['ph_status'];?>"></td></tr>
          
            <td><font color="Black">2</font></td><td><font color="Black"><b>Ec</b></font></td><td><font color="Black"><b>dS/m</b></font></td><td><input type="text" name="a2" id="ectxt1" onkeyup="act2();"  value="<?php echo $r1['ec_act'];?>"></td><td><font color="Black"><b><1.0</b></td><td><input type="text" name="s2" id="ectxt2" value="<?php echo $r1['ec_status'];?>"></td></font></tr>
            <td><font color="Black">3</font></td><td><font color="Black"><b>Organic carbon</b></font></td><td><font color="Black"><b>%</b></font></td><td><input type="text" name="a3" id="carbontxt1" onkeyup="act3();" value="<?php echo $r1['carbon_act'];?>"></td><td><font color="Black"><b>1.01-3.0</b></font></td><td><input type="text" name="s3" id="carbontxt2" value="<?php echo $r1['carbon_status'];?>"></td></tr>
            <td><font color="Black">4</font></td><td><font color="Black"><b>Nitrogen as N</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a4" id="ntxt1" onkeyup="act4();" value="<?php echo $r1['N_act'];?>"></td><td><b><font color="Black">>75-150</b></font></td><td><input type="text" name="s4" id="ntxt2" value="<?php echo $r1['N_status'];?>"></td></tr>
            <td><font color="Black">5</font></td><td><font color="Black"><b>Phosphorus as P</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a5" id="ptxt1" onkeyup="act5();" value="<?php echo $r1['p_act'];?>"></td><td><b><font color="Black">10-20</b></font></td><td><input type="text" name="s5" id="ptxt2" value="<?php echo $r1['P_status'];?>"></td></tr>
            <td><font color="Black">6</font></td><td><font color="Black"><b>Potassium as K</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a6" id="ktxt1" onkeyup="act6();" value="<?php echo $r1['K_act'];?>"></td><td><b><font color="Black">120-200</b></font></td><td><input type="text" name="s6" id="ktxt2"  value="<?php echo $r1['K_status'];?>"></td></tr>
            <td><font color="Black">7</font></td><td><font color="Black"><b>Calcium as Ca</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a7" id="catxt1" onkeyup="act7();" value="<?php echo $r1['Ca_act'];?>"></td><td><font color="Black"><b>1000-4500</b></font></td><td><input type="text" name="s7" id="catxt2" value="<?php echo $r1['Ca_status'];?>"></td></tr>
            <td><font color="Black">8</font></td><td><font color="Black"><b>Magnesium as Mg</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a8" id="mgtxt1" onkeyup="act8();" value="<?php echo $r1['Mg_act'];?>"></td><td><font color="Black"><b>500-1000</b></font></td><td><input type="text" name="s8" id="mgtxt2" value="<?php echo $r1['Mg_status'];?>"></td></tr>
            <td><font color="Black">9</font></td><td><font color="Black"><b>Sulphur as S</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a9" id="stxt1" onkeyup="act9();" value="<?php echo $r1['S_act'];?>"></td><td><font color="Black"><b>10-20</b></font></td><td><input type="text" name="s9" id="stxt2"  value="<?php echo $r1['S_status'];?>"></td></tr>
            <td><font color="Black">10</font></td><td><font color="Black"><b>Ferrous as Fe</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a10" id="fetxt1" onkeyup="act10();"  value="<?php echo $r1['Fe_act'];?>"></td><td><font color="Black"><b>3.1-5.0</b></font></td><td><input type="text" name="s10" id="fetxt2" value="<?php echo $r1['Fe_status'];?>"></td></tr>
            <td><font color="Black">11</font></td><td><font color="Black"><b>Manganese as Mn</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a11" id="mntxt1" onkeyup="act11();" value="<?php echo $r1['Mn_act'];?>"></td><td><font color="Black"><b>0.6-1.0</b></font></td><td><input type="text" name="s11" id="mntxt2" value="<?php echo $r1['Mn_status'];?>"></td></tr>
            <td><font color="Black">12</font></td><td><font color="Black"><b>zinc as Zn</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a12" id="zntxt1" onkeyup="act12();" value="<?php echo $r1['Zn_act'];?>"></td><td><font color="Black"><b>1.0-1.5</b></font></td><td><input type="text" name="s12" id="zntxt2" value="<?php echo $r1['Zn_status'];?>"></td></tr>
            <td><font color="Black">13</font></td><td><font color="Black"><b>Copper as Cu</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a13" id="cutxt1" onkeyup="act13();" value="<?php echo $r1['Cu_act'];?>"></td><td><font color="Black"><b>0.3-0.5</b></font></td><td><input type="text" name="s13" id="cutxt2" value="<?php echo $r1['Cu_status'];?>"></td></tr>
            <td><font color="Black">14</font></td><td><font color="Black"><b>Boron as B</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a14" id="btxt1" onkeyup="act14();" value="<?php echo $r1['B_act'];?>"></td><td><font color="Black"><b>0-0.5</b></font></td><td><input type="text" name="s14" id="btxt2"  value="<?php echo $r1['B_status'];?>"></td></tr>
            <td><font color="Black">15</font></td><td><font color="Black"><b>Molybdenum as Mo</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a15" id="motxt1" onkeyup="act15();"  value="<?php echo $r1['Mo_act'];?>"></td><td><font color="Black"><b>0-0.5</b></font></td><td><input type="text" name="s15" id="motxt2" value="<?php echo $r1['Mo_status'];?>"></td></tr>
            <td><font color="Black">16</font></td><td><font color="Black"><b>Sodium as Na</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a16" id="natxt1" onkeyup="act16();"  value="<?php echo $r1['Na_act'];?>"></td><td><font color="Black"><b>< 350</b></font></td><td><input type="text" name="s16" id="natxt2" value="<?php echo $r1['Na_status'];?>"></td></tr>
            <td><font color="Black">17</font></td><td><font color="Black"><b>chloride as Cl</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a17" id="cltxt1" onkeyup="act17();" value="<?php echo $r1['Cl_act'];?>"></td><td><font color="Black"><b>< 350</b></font></td><td><input type="text" name="s17" id="cltxt2" value="<?php echo $r1['Cl_status'];?>"></td></tr>
            <td><font color="Black">18</font></td><td><font color="Black"><b>Calcium Carbonate as CaCO3</b></font></td><td><font color="Black"><b>%</b></font></td><td><input type="text" name="a18" id="caco3txt1" onkeyup="act18();"  value="<?php echo $r1['CaCO3_act'];?>"></td><td><font color="Black"><b>< 3</b></font></td><td><input type="text" name="s18" id="caco3txt2" value="<?php echo $r1['CaCO3_status'];?>"></td></tr>
        </table>


      <br><br><br>
   <center>
         <button type="Submit" class="btn btn-success" name="btnsave"><b>UPDATE</b></button>
         </center>
         <br>

</div></div></div></div></form>
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
  

  
  
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
