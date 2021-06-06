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
  <h2 class="w3-container"><font color="Black"><b>EDIT LEAF PETIOLE ANALYSIS</b></font></b></h2>
 <?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);

    mysqli_query($db,"update tblpleaf set plot_no='$plot_no',pname='$pname',date='$txtdate',prunning_day='$txtpday',sample_no='$txtsampleno',sample_purpose='$txtpurpose',sample_qty='$txtqty',sample_taken='$txtstaken',presence_of='$txtpresence',lab='$txtlab',strtype='$txttype',nitro_act='$a1',nitro_status='$s1',no3n_act='$a2',no3n_status='$s2',nh4n_act='$a3',nh4n_status='$s3',p_act='$a4',p_status='$s4',k_act='$a5',k_status='$s5',ca_act='$a6',ca_status='$s6',mg_act='$a7',mg_status='$s7',s_act='$a8',s_status='$s8',fe_act='$a9',fe_status='$s9',mn_act='$a10',mn_status='$s10',zn_act='$a11',zn_status='$s11',cu_act='$a12',cu_status='$s12',b_act='$a13',b_status='$s13',mo_act='$a14',mo_status='$s14',na_act='$a15',na_status='$s15',cl_act='$a16',cl_status='$s16', status=0 where pleaf_id=".$_GET["id"]);

   
 echo "<script>window.location.href='leaf.php';</script>";
    exit;
}
  $q1=mysqli_query($db,"select * from tblpleaf where pleaf_id=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);

?>



<form method="post">


<div class="container ">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-8">

          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot No:</b></font></label>
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
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot name:</b></font></label>
              <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" value="<?php echo $r1['pname'];?>">
              </div>
            </div> 

 <input type="text"  id="pno" style="display: none">

<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date:</b></font></label>
         <input type="Date" placeholder="Enter date.." class="form-control" name="txtdate" id="txtFirst"  oninput="myfunction();" value="<?php echo $r1['date'];?>" onchange="selectdate();">


              </div>

            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Days after Prunning:</b></font></label>
          <input  type="text"  name="txtpday" id="txtSecond" class="form-control" value="<?php echo $r1['prunning_day'];?>">
       
          </div>
        </div>


            <div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Sample No.:</b></font></label>
                      <input  type="text" name="txtsampleno" placeholder="Enter sample No.." class="form-control" value="<?php echo $r1['sample_no'];?>">
             
              </div>
          
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Purpose of sampling:</b></font></label>
               <input type="text"  name="txtpurpose" placeholder="Enter sample purpose.." class="form-control" value="<?php echo $r1['sample_purpose'];?>"></textarea>
              </div>
            </div> 


<div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>Quantity of sample[Kg.]:</b></font></label>
  
   <input type="text"  class="form-control" placeholder="Enter sample Quantity.." name="txtqty" value="<?php echo $r1['sample_qty'];?>">
</div>
 <div class="col-sm-6 form-group">
                <label><b>Sample taken by::</b></label>
                <input type="text"  name="txtstaken" placeholder="sample taken by.." class="form-control" value="<?php echo $r1['sample_taken'];?>">
              </div>
            </div> 

<div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>In the presence of:</b></font></label>
   <input type="text"  name="txtpresence" placeholder="In presence of.." class="form-control" value="<?php echo $r1['presence_of'];?>">
</div>
 <div class="col-sm-6 form-group">
                <label><font color="black"><b>Sent to Laboratary:</b></font></label>
                 <input type="text" class="form-control" placeholder="Enter Laboratary.." name="txtlab" value="<?php echo $r1['lab'];?>">
   </div>
  </div> 

<table class="table" border="1" style="width: 0%">
  
        <tr rowspan="1">
             <td><font color="black"><b>Sr.No</b></font></td><td><font color="black"><b>parameter</b></font></td><td><font color="black"><b>Unit</b></font></td><td><font color="black"><b>Actual Result</b></td></font><td><select name="txttype" id="txtleaf" onclick="leafauto();">
              <Option value="<?php echo $r1['strtype'];?>"><?php echo $r1['strtype'];?></option>
              <Option value="april">April</option>
              <Option value="recut">Recut</option>
              <Option value="bloom">Bloom</option>
              <Option value="prebloom">Prebloom</option>
              <Option value="verasain">Verisons</option>
                <Option value="berry development">Berry Development</option>
                  <Option value="post harvest">Post Harvest</option>
              </select></td>
              <td colspan="4"><font color="black"><b>Status</b></font></td>
          </tr>
          <?php
            $q2=mysqli_query($db,"select * from tbldropleaf where leaf_type='".$r1['strtype']."'");
            $r2=mysqli_fetch_array($q2);          
          ?>
          <tr>
            <td colspan=6><font color="black"><b>MAJOR NUTRIENTS</b></font></td></tr><tr>
              <tr>
            <td><font color="black"><b>1</b></font></td><td><font color="black"><b>Total Nitrogen as N</b></font></td><td><font color="black"><b>%</b></font></td><td><input type="text" name="a1" id="txtn1" onkeyup="act1();"  value="<?php echo $r1['nitro_act'];?>"></td><td id="lnitro"><?php echo $r2['l1'];?></td><td><input type="text" name="s1" id="txtn2"  value="<?php echo $r1['nitro_status'];?>"></td></tr>

            <td><font color="black"><b>2</b></font></td><td><font color="black"><b>Nitrate Nitrogen as NO3-N</b></font></td><td><font color="black"><font color="black"><b>dS/m</b></font></td><td><input type="text" name="a2" id="no3ntxt1" onkeyup="act2();" value="<?php echo $r1['no3n_act'];?>"></td><td id="lno3n"><?php echo $r2['l2'];?></td><td><input type="text" name="s2" id="no3ntxt2"  value="<?php echo $r1['no3n_status'];?>"></td></tr>

            <td><font color="black"><b>3</b></font></td><td><font color="black"><b>Ammonical Nitrogen as NH4-N</b></font></td><td><font color="black"><b>%</b></font></td><td><input type="text" name="a3" id="nh4ntxt1" onkeyup="act3();"  value="<?php echo $r1['nh4n_act'];?>"></td><td id="lnh4n"><?php echo $r2['l3'];?></td><td><input type="text" name="s3" id="nh4ntxt2"  value="<?php echo $r1['nh4n_status'];?>"></td></tr>
            
              <td><font color="black"><b>4</b></font></td><td><font color="black"><font color="black"><b>Phosphorus as P</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a5" id="ptxt1" onkeyup="act4();"  value="<?php echo $r1['p_act'];?>"></td><td id="lp"><?php echo $r2['l4'];?></td><td><input type="text" name="s5" id="ptxt2"  value="<?php echo $r1['p_status'];?>"></td></tr>
            
            <td><font color="black"><b>5</b></font></td><td><font color="black"><b>Potassium as K</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a6" id="ktxt1" onkeyup="act5();"  value="<?php echo $r1['k_act'];?>"></td><td id="lk"><?php echo $r2['l5'];?></td><td><input type="text" name="s6" id="ktxt2"   value="<?php echo $r1['k_status'];?>"></td></tr>
            
            <td colspan=6><font color="black"><b>SECONDARY NUTRIENTS</b></font></td></tr><tr>
            <td><font color="black"><b>6</b></font></td><td><font color="black"><b>Calcium as Ca</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a7" id="catxt1" onkeyup="act6();"  value="<?php echo $r1['ca_act'];?>"></td><td id="lca"><?php echo $r2['l6'];?></td><td><input type="text" name="s7" id="catxt2"  value="<?php echo $r1['ca_status'];?>"></td></tr>
            
            <td>7</td><td><font color="black"><b>Magnesium as Mg</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a8" id="mgtxt1" onkeyup="act7();"   value="<?php echo $r1['mg_act'];?>"></td><td id="lmg"><?php echo $r2['l7'];?></td><td><input type="text" name="s8" id="mgtxt2"   value="<?php echo $r1['mg_status'];?>"></td></tr>
            
            <td><font color="black"><b>8</b></font></td><td><font color="black"><b>Sulphur as S</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a9" id="stxt1" onkeyup="act8();"  value="<?php echo $r1['s_act'];?>"></td><td id="ls"><?php echo $r2['l8'];?></td><td><input type="text" name="s9" id="stxt2"  value="<?php echo $r1['s_status'];?>"></td></tr>
            <td colspan=6><b><font color="black"><b>MICRO NUTRIENTS</b></font></b></td></tr><tr>
            
            <td><font color="black"><b>9</b></font></td><td><font color="black"><b>Ferrous as Fe</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a10" id="fetxt1" onkeyup="act9();"  value="<?php echo $r1['fe_act'];?>"></td><td id="lfe"><?php echo $r2['l9'];?></td><td><input type="text" name="s10" id="fetxt2"  value="<?php echo $r1['fe_status'];?>"></td></tr>
            
             <td><font color="black"><b>10</b></font></td><td><font color="black"><b>Manganese as Mn</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a11" id="mntxt1" onkeyup="act10();"  value="<?php echo $r1['mn_act'];?>"></td><td id="lmn"><?php echo $r2['l10'];?></td><td><input type="text" name="s11" id="mntxt2"  value="<?php echo $r1['mn_status'];?>"></td></tr>
            
            <td><font color="black"><b>11</b></td><td><font color="black"><b>zinc as Zn</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a12" id="zntxt1" onkeyup="act11();"  value="<?php echo $r1['zn_act'];?>"></td><td id="lzn"><?php echo $r2['l11'];?></td><td><input type="text" name="s12" id="zntxt2"  value="<?php echo $r1['zn_status'];?>"></td></tr>
            
            <td><font color="black"><b>12</b></font></td><td><font color="black"><b>Copper as Cu</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a13" id="cutxt1" onkeyup="act12();"  value="<?php echo $r1['cu_act'];?>"></td><td id="lcu"><?php echo $r2['l12'];?></td><td><input type="text" name="s13" id="cutxt2"   value="<?php echo $r1['cu_status'];?>"></td></tr>
            
            <td><font color="black"><b>13</b></font></td><td><font color="black"><b>Boron as B</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a14" id="btxt1" onkeyup="act13();"  value="<?php echo $r1['b_act'];?>"></td><td id="lb"><?php echo $r2['l13'];?></td><td><input type="text" name="s14" id="btxt2"  value="<?php echo $r1['b_status'];?>"></td></tr>
           
            <td><font color="black"><b>14</b></font></td><td><font color="black"><b>Molybdenum as Mo</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a15" id="motxt1" onkeyup="act14();"  value="<?php echo $r1['mo_act'];?>"></td><td id="lmo"><?php echo $r2['l14'];?></td><td><input type="text" name="s15" id="motxt2"  value="<?php echo $r1['mo_status'];?>"></td></tr>
            <td colspan=6><font color="black"><b>OTHER</b></font></td></tr><tr>
            
            <td><font color="black"><b>15</b></font></td><td><font color="black"><b>Sodium as Na</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a16" id="natxt1" onkeyup="act15();"  value="<?php echo $r1['na_act'];?>"></td><td id="lna"><?php echo $r2['l15'];?></td><td><input type="text" name="s16" id="natxt2"  value="<?php echo $r1['na_status'];?>"></td></tr>
            
            <td><font color="black"><b>16</b></font></td><td><font color="black"><b>chloride as Cl</b></font></td><td><font color="black"><b>ppm</b></font></td><td><input type="text" name="a17" id="cltxt1" onkeyup="act16();"  value="<?php echo $r1['cl_act'];?>"></td><td id="lcl"><?php echo $r2['l16'];?></td><td><input type="text" name="s17" id="cltxt2"   value="<?php echo $r1['cl_status'];?>"></td></tr>

  </td></tr>
        </table>


      <br><br><br>

 

   <center>
         <button type="Submit" class="btn btn-success" name="btnsave">UPDATE</button>
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

  
  
  
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
