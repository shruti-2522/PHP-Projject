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
<?php include ("autoleaf.php");?>
<?php include ("try3js.php");?>

<body class="sb-nav-fixed">
  <h2 class="w3-container"><font color="Black"><b>ADD LEAF-PETIOLE ANALYSIS</b></font></b></h2>
 <?php

  $ses_id=$_SESSION['plot_id'];
if(isset($_POST["btndraft"]))
{
  extract($_POST);
  $status=1;
   mysqli_query($db,"insert into tblpleaf(plot_no,pname,date,prunning_day,sample_no,sample_purpose,sample_qty,sample_taken,presence_of,lab,strtype,nitro_act,nitro_status,no3n_act,no3n_status,nh4n_act,nh4n_status,p_act,p_status,k_act,k_status,ca_act,ca_status,mg_act,mg_status,s_act,s_status,fe_act,fe_status,mn_act,mn_status,zn_act,zn_status,cu_act,cu_status,b_act,b_status,mo_act,mo_status,na_act,na_status,cl_act,cl_status,ses_id,status)values('$plot_no','$pname','$txtdate','$txtpday','$txtsampleno','$txtpurpose','$txtqty','$txtstaken','$txtpresence','$txtlab','$txttype','$a1','$s1','$a2','$s2','$a3','$s3','$a5','$s5','$a6','$s6','$a7','$s7','$a8','$s8','$a9','$s9','$a10','$s10','$a11','$s11','$a12','$s12','$a13','$s13','$a14','$s14','$a15','$s15','$a16','$s16','$a17','$s17','$ses_id','$status')");
 
  echo "<script>window.location.href='leaf.php';</script>";
    exit;
  
}

if(isset($_POST["btnadd"]))
{
  extract($_POST);
   mysqli_query($db,"insert into tblpleaf(plot_no,pname,date,prunning_day,sample_no,sample_purpose,sample_qty,sample_taken,presence_of,lab,strtype,nitro_act,nitro_status,no3n_act,no3n_status,nh4n_act,nh4n_status,p_act,p_status,k_act,k_status,ca_act,ca_status,mg_act,mg_status,s_act,s_status,fe_act,fe_status,mn_act,mn_status,zn_act,zn_status,cu_act,cu_status,b_act,b_status,mo_act,mo_status,na_act,na_status,cl_act,cl_status,ses_id,status)values('$plot_no','$pname','$txtdate','$txtpday','$txtsampleno','$txtpurpose','$txtqty','$txtstaken','$txtpresence','$txtlab','$txttype','$a1','$s1','$a2','$s2','$a3','$s3','$a5','$s5','$a6','$s6','$a7','$s7','$a8','$s8','$a9','$s9','$a10','$s10','$a11','$s11','$a12','$s12','$a13','$s13','$a14','$s14','$a15','$s15','$a16','$s16','$a17','$s17','$ses_id','$status')");
 
  echo "<script>window.location.href='leaf.php';</script>";
    exit;
  
}
?>


<form method="post" id="myform">


<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-9">

          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Plot No:</b></font></label>
                 <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);" oninput="showUser4(this.value);" required>
        <option value="">Select plot no.:</option>
              
                <?php
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
              <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" required>
              </div>
            </div> 

 <input type="text"  id="pno" style="display: none">

<div class="row">
      <div class="col-sm-5 form-group">
        <label><font color="black"><b>Date:</b></font></label>
         <input type="Date" placeholder="Enter date.." class="form-control" name="txtdate" id="txtFirst"  oninput="myfunction();" required>


              </div>
 <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
          <label><font color="black"><b>Days after Prunning:</b></font></label>
          <input  type="text"  name="txtpday" id="txtSecond" placeholder="Enter Days After Prunning" class="form-control" required>
      
          </div>
        </div>


            <div class="row">
            <div class="col-sm-5 form-group">
                <label><font color="black"><b>Sample No.:</b></font></label>
                      <input  type="text" name="txtsampleno" placeholder="Enter Sample No.." class="form-control" required>
             
              </div>
           <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label><font color="black"><b>Purpose of sampling:</b></font></label>
               <input type="text"  name="txtpurpose" placeholder="Enter Sample Purpose.." class="form-control" required></textarea>
              </div>
            </div> 


<div class="row">
 <div class="col-sm-5 form-group">
  <label><font color="black"><b>Quantity of sample[Kg.]:</b></font></label>
  
   <input type="text"  class="form-control" placeholder="Enter Sample Quantity.." name="txtqty" required>
</div>
 <div class="col-sm-1"></div>
 <div class="col-sm-5 form-group">
                <label><font color="black"><b>Sample taken by:</b></font></label>
                <input type="text"  name="txtstaken" placeholder="sample Taken by.." class="form-control" required>
              </div>
            </div> 

<div class="row">
 <div class="col-sm-5 form-group">
  <label><font color="black"><b>In the presence of:</b></font></label>
   <input type="text"  name="txtpresence" placeholder="In presence of.." class="form-control" required>
</div>
 <div class="col-sm-1"></div>
 <div class="col-sm-5 form-group">
                <label><font color="black"><b>Sent to Laboratory:</b></font></label>
                 <input type="text" class="form-control" placeholder="Enter Laboratory.." name="txtlab" required>
   </div>
  </div> 

<table class="table" border="1" style="width:0%">
  
        <tr>
             <td><font color="black"><b>Sr.No</b></font></td><td><font color="black"><b>Parameter</b></font></td><td><font color="black"><b>Unit</b></font></td><td><font color="black"><b>Actual Result</b></td></font><td><select name="txttype" id="txtleaf" onclick="leafauto();">
              <Option value="">Select Period</option>
              <Option value="april">April</option>
              <Option value="recut">Recut</option>
              <Option value="bloom">Bloom</option>
              <Option value="prebloom">Prebloom</option>
              <Option value="verasain">Verisons</option>
                <Option value="berry development">Berry Development</option>
                  <Option value="post harvest">Post Harvest</option>
              </select></td>
              <td colspan="2"><b>Status</b></td>
          </tr><tr>
            <td colspan=6><font color="black"><b>MAJOR NUTRIENTS</b></font></td></tr><tr>
              <tr>
            <td><font color="black"><b>1</b></font></td><td><font color="black"><b>Total Nitrogen as N</b></font></td><td><font color="black"><b>%</b></font></td><td><input type="text" name="a1" id="txtn1" onkeyup="act1();"></td><td id="lnitro"></td><td><input type="text" name="s1" id="txtn2"></td></tr>

            <td><font color="black"><b>2</b></font></td><td><font color="black"><b>Nitrate Nitrogen as NO3-N</b></font></td><td><font color="black"><font color="black"><b>dS/m</b></font></td><td><input type="text" name="a2" id="no3ntxt1" onkeyup="act2();"></td><td id="lno3n"></td><td><input type="text" name="s2" id="no3ntxt2" ></td></tr>

            <td><font color="black"><b>3</b></font></td><td><font color="black"><b>Ammonical Nitrogen as NH4-N</b></font></td><td><font color="black"><b>%</b></font></td><td><input type="text" name="a3" id="nh4ntxt1" onkeyup="act3();"></td><td id="lnh4n"></td><td><input type="text" name="s3" id="nh4ntxt2"></td></tr>
            
              <td><font color="black"><b>4</b></font></td><td><font color="black"><font color="black"><b>Phosphorus as P</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a5" id="ptxt1" onkeyup="act4();"></td><td id="lp"></td><td><input type="text" name="s5" id="ptxt2"></td></tr>
            
            <td><font color="black"><b>5</b></font></td><td><font color="black"><b>Potassium as K</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a6" id="ktxt1" onkeyup="act5();"></td><td id="lk"></td><td><input type="text" name="s6" id="ktxt2"></td></tr>
            
            <td colspan=6><font color="black"><b>SECONDARY NUTRIENTS</b></font></td></tr><tr>
            <td><font color="black"><b>6</b></font></td><td><font color="black"><b>Calcium as Ca</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a7" id="catxt1" onkeyup="act6();"></td><td id="lca"></td><td><input type="text" name="s7" id="catxt2"></td></tr>
            
            <td>7</td><td><font color="black"><b>Magnesium as Mg</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a8" id="mgtxt1" onkeyup="act7();"></td><td id="lmg"></td><td><input type="text" name="s8" id="mgtxt2"></td></tr>
            
            <td><font color="black"><b>8</b></font></td><td><font color="black"><b>Sulphur as S</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a9" id="stxt1" onkeyup="act8();"></td><td id="ls"></td><td><input type="text" name="s9" id="stxt2"></td></tr>
            <td colspan=6><b><font color="black"><b>MICRO NUTRIENTS</b></font></b></td></tr><tr>
            
            <td><font color="black"><b>9</b></font></td><td><font color="black"><b>Ferrous as Fe</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a10" id="fetxt1" onkeyup="act9();"></td><td id="lfe"></td><td><input type="text" name="s10" id="fetxt2"></td></tr>
            
             <td><font color="black"><b>10</b></font></td><td><font color="black"><b>Manganese as Mn</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a11" id="mntxt1" onkeyup="act10();"></td><td id="lmn"></td><td><input type="text" name="s11" id="mntxt2"></td></tr>
            
            <td><font color="black"><b>11</b></font></td><td><font color="black"><b>zinc as Zn</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a12" id="zntxt1" onkeyup="act11();"></td><td id="lzn"></td><td><input type="text" name="s12" id="zntxt2"></td></tr>
            
            <td><font color="black"><b>12</b></font></td><td><font color="black"><b>Copper as Cu</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a13" id="cutxt1" onkeyup="act12();"></td><td id="lcu"></td><td><input type="text" name="s13" id="cutxt2"></td></tr>
            
            <td><font color="black"><b>13</b></font></td><td><font color="black"><b>Boron as B</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a14" id="btxt1" onkeyup="act13();"></td><td id="lb"></td><td><input type="text" name="s14" id="btxt2"></td></tr>
           
            <td><font color="black"><b>14</b></font></td><td><font color="black"><b>Molybdenum as Mo</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a15" id="motxt1" onkeyup="act14();"></td><td id="lmo"></td><td><input type="text" name="s15" id="motxt2"></td></tr>
            <td colspan=6><font color="black"><b>OTHER</b></font></td></tr><tr>
            
            <td><font color="black"><b>15</b></font></td><td><font color="black"><b>Sodium as Na</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a16" id="natxt1" onkeyup="act15();"></td><td id="lna"></td><td><input type="text" name="s16" id="natxt2"></td></tr>
            
            <td><font color="black"><b>16</b></font></td><td><font color="black"><b>chloride as Cl</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a17" id="cltxt1" onkeyup="act16();"></td><td id="lcl"></td><td><input type="text" name="s17" id="cltxt2"></td></tr>

      
            
            </td></tr>
        </table>

<br><br><br>
   <center>
         <button type="Submit" class="btn btn-success" name="btnadd"><b>ADD</b></button>
         <button type="Submit" class="btn btn-success" name="btndraft" formnovalidate><b>SAVE AS DRAFT</b></button>
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
      

  
  
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>WW
             
    </body>
</html>
