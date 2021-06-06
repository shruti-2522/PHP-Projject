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


  <h2 class="container"><font color="Black"><b>ADD SOIL</b></font></b></h2>
<?php
if(isset($_POST["btndraft"]))
{
  extract($_POST);
  $status=1;
  $ses_id=$_SESSION['plot_id'];
   mysqli_query($db,"insert into tblsoil(plot_no,pname,date,prunning_day,sample_no,sample_purpose,sample_qty,sample_taken,presence_of,lab,ph_act,ph_status,ec_act,ec_status,carbon_act,carbon_status,N_act,N_status,p_act,P_status,K_act,K_status,Ca_act,Ca_status,Mg_act,Mg_status,S_act,S_status,Fe_act,Fe_status,Mn_act,Mn_status,Zn_act,Zn_status,Cu_act,Cu_status,B_act,B_status,Mo_act,Mo_status,Na_act,Na_status,Cl_act,Cl_status,CaCO3_act,CaCO3_status,ses_id,status)values('$plot_no','$pname','$txtdate','$txtpday','$txtsampleno','$txtpurpose','$txtqty','$txtstaken','$txtpresence','$txtlab','$a1','$s1','$a2','$s2','$a3','$s3','$a4','$s4','$a5','$s5','$a6','$s6','$a7','$s7','$a8','$s8','$a9','$s9','$a10','$s10','$a11','$s11','$a12','$s12','$a13','$s13','$a14','$s14','$a15','$s15','$a16','$s16','$a17','$s17','$a18','$s18','$ses_id','$status')");
 
  echo "<script>window.location.href='soil.php';</script>";
    exit;
  
}
if(isset($_POST["btnadd"]))
{
  extract($_POST);
  $ses_id=$_SESSION['plot_id'];
   mysqli_query($db,"insert into tblsoil(plot_no,pname,date,prunning_day,sample_no,sample_purpose,sample_qty,sample_taken,presence_of,lab,ph_act,ph_status,ec_act,ec_status,carbon_act,carbon_status,N_act,N_status,p_act,P_status,K_act,K_status,Ca_act,Ca_status,Mg_act,Mg_status,S_act,S_status,Fe_act,Fe_status,Mn_act,Mn_status,Zn_act,Zn_status,Cu_act,Cu_status,B_act,B_status,Mo_act,Mo_status,Na_act,Na_status,Cl_act,Cl_status,CaCO3_act,CaCO3_status,ses_id,status)values('$plot_no','$pname','$txtdate','$txtpday','$txtsampleno','$txtpurpose','$txtqty','$txtstaken','$txtpresence','$txtlab','$a1','$s1','$a2','$s2','$a3','$s3','$a4','$s4','$a5','$s5','$a6','$s6','$a7','$s7','$a8','$s8','$a9','$s9','$a10','$s10','$a11','$s11','$a12','$s12','$a13','$s13','$a14','$s14','$a15','$s15','$a16','$s16','$a17','$s17','$a18','$s18','$ses_id','$status')");
 
  echo "<script>window.location.href='soil.php';</script>";
    exit;
  
}
?>

<form method="post">


<div class="container ">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-9">

   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Plot No:</b></font></label>
                 <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);" oninput="showUser4(this.value);" required>
        <option value="">Select plot no.:</option>
              
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
              <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" required>
              </div>
            </div> 
             <input type="text"  id="pno" style="display: none">


<div class="row">
      <div class="col-sm-5 form-group">
        <label><font color="Black"><b>Date:</b></font></label>
         <input type="Date" placeholder="Enter date.." class="form-control" name="txtdate" id="txtFirst" oninput="myfunction();" required>


              </div>
              <div class="col-sm-1"></div>

            <div class="col-sm-5 form-group">
          <label><font color="Black"><b>Days after Prunning:</b></font></label>
          <input  type="text"  name="txtpday" id="txtSecond" placeholder="Enter Days After Prunning" class="form-control" required>
        

          </div>
        </div>


            <div class="row">
            <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Sample No.:</b></font></label>
                      <input  type="text" name="txtsampleno" placeholder="Enter sample No.." class="form-control" required>
             
              </div>
              <div class="col-sm-1"></div>
          
            <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Purpose of sampling:</b></font></label>
               <input type="text"  name="txtpurpose" placeholder="Enter Sample purpose.." class="form-control" required></textarea>
              </div>
            </div> 


<div class="row">
 <div class="col-sm-5 form-group">
  <label><font color="Black"><b>Quantity of sample[Kg.]:</b></font></label>
  
   <input type="text"  class="form-control" placeholder="Enter Sample Quantity.." name="txtqty" required>
</div>
<div class="col-sm-1"></div>
 <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Sample taken by:</b></font></label>
                <input type="text"  name="txtstaken" placeholder="Sample Taken By.." class="form-control" required>
              </div>
            </div> 

<div class="row">
 <div class="col-sm-5 form-group">
  <label><font color="Black"><b>In the presence of:</b></font></label>
   <input type="text"  name="txtpresence" placeholder="In Presence of.." class="form-control" required>
</div>
<div class="col-sm-1"></div>
 <div class="col-sm-5 form-group">
                <label><font color="Black"><b>Sent to Laboratory:</b></font></label>
                 <input type="text" class="form-control" placeholder="Enter Laboratary.." name="txtlab" required>
   </div>
  </div> 
  <table class="table" border="1" style="width:92%">
  
        <tr rowspan="2">
            <th><font color="Black"><b>Sr.No</b></font></th><th><font color="Black"><b>Parameter</b></font></th><th><font color="Black"><b>Unit</font></b></th><th><font color="Black"><b>Actual Result</b></font></th><th><font color="Black"><b>Limit</b></font></th><th><font color="Black"><b>Status</b></font></th>
         </tr><tr>
            <td colspan=6><font color="Black"><b>Chemical Properties</b></font></td></tr>
            <tr>
            <td><font color="Black">1</font></td><td><font color="Black"><b>PH</b></font></td><td>-</td><td><input type="text" name="a1" id="phtxt1" onkeyup="act1();"></td><td><font color="Black"><b>6.5-7.5</b></font></td><td><input type="text" name="s1" id="phtxt2"></td></tr>
          
            <td><font color="Black">2</font></td><td><font color="Black"><b>Ec</b></font></td><td><font color="Black"><b>dS/m</b></font></td><td><input type="text" name="a2" id="ectxt1" onkeyup="act2();"></td><td><font color="Black"><b><1.0</b></td><td><input type="text" name="s2" id="ectxt2" ></td></font></tr>
            <td><font color="Black">3</font></td><td><font color="Black"><b>Organic carbon</b></font></td><td><font color="Black"><b>%</b></font></td><td><input type="text" name="a3" id="carbontxt1" onkeyup="act3();"></td><td><font color="Black"><b>1.01-3.0</b></font></td><td><input type="text" name="s3" id="carbontxt2"></td></tr>
            <td><font color="Black">4</font></td><td><font color="Black"><b>Nitrogen as N</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a4" id="ntxt1" onkeyup="act4();"></td><td><b><font color="Black">75-150</b></font></td><td><input type="text" name="s4" id="ntxt2"></td></tr>
            <td><font color="Black">5</font></td><td><font color="Black"><b>Phosphorus as P</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a5" id="ptxt1" onkeyup="act5();"></td><td><b><font color="Black">10-20</b></font></td><td><input type="text" name="s5" id="ptxt2"></td></tr>
            <td><font color="Black">6</font></td><td><font color="Black"><b>Potassium as K</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a6" id="ktxt1" onkeyup="act6();"></td><td><b><font color="Black">120-200</b></font></td><td><input type="text" name="s6" id="ktxt2"></td></tr>
            <td><font color="Black">7</font></td><td><font color="Black"><b>Calcium as Ca</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a7" id="catxt1" onkeyup="act7();"></td><td><font color="Black"><b>1000-4500</b></font></td><td><input type="text" name="s7" id="catxt2"></td></tr>
            <td><font color="Black">8</font></td><td><font color="Black"><b>Magnesium as Mg</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a8" id="mgtxt1" onkeyup="act8();"></td><td><font color="Black"><b>500-1000</b></font></td><td><input type="text" name="s8" id="mgtxt2"></td></tr>
            <td><font color="Black">9</font></td><td><font color="Black"><b>Sulphur as S</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a9" id="stxt1" onkeyup="act9();"></td><td><font color="Black"><b>10-20</b></font></td><td><input type="text" name="s9" id="stxt2"></td></tr>
            <td><font color="Black">10</font></td><td><font color="Black"><b>Ferrous as Fe</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a10" id="fetxt1" onkeyup="act10();"></td><td><font color="Black"><b>3.1-5.0</b></font></td><td><input type="text" name="s10" id="fetxt2"></td></tr>
            <td><font color="Black">11</font></td><td><font color="Black"><b>Manganese as Mn</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a11" id="mntxt1" onkeyup="act11();"></td><td><font color="Black"><b>0.6-1.0</b></font></td><td><input type="text" name="s11" id="mntxt2"></td></tr>
            <td><font color="Black">12</font></td><td><font color="Black"><b>zinc as Zn</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a12" id="zntxt1" onkeyup="act12();"></td><td><font color="Black"><b>1.0-1.5</b></font></td><td><input type="text" name="s12" id="zntxt2"></td></tr>
            <td><font color="Black">13</font></td><td><font color="Black"><b>Copper as Cu</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a13" id="cutxt1" onkeyup="act13();"></td><td><font color="Black"><b>0.3-0.5</b></font></td><td><input type="text" name="s13" id="cutxt2"></td></tr>
            <td><font color="Black">14</font></td><td><font color="Black"><b>Boron as B</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a14" id="btxt1" onkeyup="act14();"></td><td><font color="Black"><b>0-0.5</b></font></td><td><input type="text" name="s14" id="btxt2"></td></tr>
            <td><font color="Black">15</font></td><td><font color="Black"><b>Molybdenum as Mo</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a15" id="motxt1" onkeyup="act15();"></td><td><font color="Black"><b>0-0.5</b></font></td><td><input type="text" name="s15" id="motxt2"></td></tr>
            <td><font color="Black">16</font></td><td><font color="Black"><b>Sodium as Na</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a16" id="natxt1" onkeyup="act16();"></td><td><font color="Black"><b>< 350</b></font></td><td><input type="text" name="s16" id="natxt2"></td></tr>
            <td><font color="Black">17</font></td><td><font color="Black"><b>chloride as Cl</b></font></td><td><font color="Black"><b>ppm</b></font></td><td><input type="text" name="a17" id="cltxt1" onkeyup="act17();"></td><td><font color="Black"><b>< 350</b></font></td><td><input type="text" name="s17" id="cltxt2"></td></tr>
            <td><font color="Black">18</font></td><td><font color="Black"><b>Calcium Carbonate as CaCO3</b></font></td><td><font color="Black"><b>%</b></font></td><td><input type="text" name="a18" id="caco3txt1" onkeyup="act18();"></td><td><font color="Black"><b>< 3</b></font></td><td><input type="text" name="s18" id="caco3txt2"></td></tr>
        </table>

<br><br><center>
         <button type="Submit" class="btn btn-success" name="btnadd"><b>ADD</b></button>
         <button type="Submit" class="btn btn-success" name="btndraft" formnovalidate><b>SAVE AS DRAFT</b></button></center>
         <br>

</div></div></div></div></form>
 
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
             
    </body>
</html>
