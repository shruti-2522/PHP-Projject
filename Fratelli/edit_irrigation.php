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
               document.getElementById("discharge").value = data[0].discharge;
              document.getElementById("vines").value = data[0].vines;
              document.getElementById("no_of_drip").value = data[0].no_of_drip;
              console.log(data[0]['no_of_drip']);
            }
          };

          xmlhttp.open("GET", "getData6.php?str=" + str, true);
          xmlhttp.send();
        }
      }
    </script>

        
        

</head>
<body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-4 form-group"><h2><b>EDIT IRRIGATION</b></h2></div>
       
      
<?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);
  echo $_POST['pname'];

 mysqli_query($db,"update tblirrigation set plot_no='$plot_no',pname='$pname',date='$txtdate',stime='$txtstime',etime='$txtetime',duration='$txtduration',prunning_day='$txtpday',water_dis='$txtwaterdis',pressure_read='$txtpressure',tot_water='$txttotwater',temp='$txttemp',remark='$txtremark',status=0 where iid=".$_GET["id"]);

   
 
  echo "<script>window.location.href='irrigation.php';</script>";
    exit;
 
  
}
  $q1=mysqli_query($db,"select * from tblirrigation where iid=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
?>
<form method="post">
  
<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-7">

    <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot No:</b></font></label>
                 <select name="plot_no" id="plot_no" class="form-control" oninput="showUser4(this.value);"   onchange="showUser(this.value);">
        <option value="<?php echo $r1['plot_no']; ?>"selected><?php echo $r1['plot_no']; ?></option>
              
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
                <label><font color="black"><b>Plot Name:</b></font></label>
             <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" value="<?php echo $r1['pname'];?>">
              </div>
            </div> 
<input type="text"  id="pno" style="display: none">
<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date:</b></font></label>
    <input type="Date" placeholder="Enter date.." name="txtdate" class="form-control" id="txtFirst" oninput="myfunction()";  value="<?php echo $r1['date'];?>" onclick="selectdate();">
       
      </SELECT>


              </div>

               <div class="col-sm-6 form-group">
  <label><font color="black"><b>Days  After Prunning:</b></font></label>
  
<input type="text" placeholder="Enter Days After Prunning.." name="txtpday" id="txtSecond" class="form-control" value="<?php echo $r1['prunning_day'];?>">
</div>
</div>


<div class="row">
            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Start Time:</b></font></label>
        <input type="Time" placeholder="Enter Start Time.." name="txtstime" class="form-control" id="time1"  oninput="difftime()"; value="<?php echo $r1['stime'];?>" >
          </div>
        
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>End Time:</b></font></label>
              <input type="Time" placeholder="Enter End Time.." name="txtetime" class="form-control" id="time2"  oninput="difftime()"; value="<?php echo $r1['etime'];?>">
              </div>
            </div>

          
<div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Duration:</b></font></label>
               <input type="text" placeholder="Enter Duration .." name="txtduration" id="time3" class="form-control" value="<?php echo $r1['duration'];?>">
              </div>
            
        
               
        <div class=" col-sm-6 form-group">
          <label><font color="black"><b>Moisture Before Irrigation(%):</b></font></label>
         
                    <input type="text"  placeholder="Enter Moisure Before irrigation.." name="txtmoisure" class="form-control" onchange="multiply(this.value)"; value="<?php echo $r1['moisure'];?>">
              
              </div>
            </div>
          
           
<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Water  Discharge Per  Plant:</b></font></label>
       
                 <input type="text"  placeholder="Enter Water Discharge per plant.."  class="form-control" name="txtwaterdis" id="water"   value="<?php echo $r1['water_dis'];?>">              
              </div>
          
      <div class="col-sm-6 form-group">
          <label><font color="black"><b>Pressure  Reading[Kg]:</b></font></label>
          
             <input type="text"  placeholder="Enter Pressure Reading.."class="form-control" name="txtpressure" value="<?php echo $r1['pressure_read'];?>" onchange="multiply1(this.value)";>
          </div>
        </div>
       

<div class="row">
  <div class="col-sm-6 form-group">
          <label><font color="black"><b>Total  Water Supplied[Litre]:</b></font></label>
         
                   
                    <input type="text" placeholder="Enter Total Water Supplied.." id="txttotwater" class="form-control" name="txttotwater" value="<?php echo $r1['tot_water'];?>">
              
              </div>
           
          <div class="col-sm-6 form-group">
          <label><font color="black"><b>Temperature:</b></font></label>
           
                <input type="text"  placeholder="Enter Temperature.." name="txttemp" class="form-control" value="<?php echo $r1['temp'];?>">
          </div>
        </div>
        


         <div class="row">
          <div class="col-sm-6 form-group">
          <label><font color="black"><b>Remark:</b></font></label>
          
                     
                 <input type="text" placeholder="Enter Remark.." name="txtremark" class="form-control" value="<?php echo $r1['remark'];?>">
              </div>
         
            <div class="col-sm-6 form-group">
         
          <input type="Text" placeholder="Plot Name.." name="vines" id="vines" class="form-control" style="display: none;"
          >
              
              </div>
            </div>
          
            
           <div class="row">
             <div class="col-sm-6 form-group">
             <input type="Text" placeholder="Plot Name.." name="no_of_drip" id="no_of_drip" class="form-control" style="display: none;">
                 <input type="Text" placeholder="Plot Name.." name="vines" id="discharge" class="form-control" style="display: none">
              </div>
            </div>
           
     <br>      

   <center>
         <button type="Submit" class="btn btn-success" name="btnsave"><b>UPDATE</b></button>
         </center>
         <br>
       </div>
       <br><br>



            

</div>
</div>
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

<script>

  function multiply() {
  a = Number(document.getElementById('discharge').value);
  b = Number(document.getElementById('no_of_drip').value);
 duration=document.getElementById('time3').value
  water_dis=duration.split(' ');
 // alert(water_dis[0]);
  c = Number(water_dis[0]);
  //alert(c);


  d = a*b*c;
 

  document.getElementById('water').value = d;
}
 </script>


<script>

  function multiply1() {
  a = Number(document.getElementById('vines').value);
  b=Number(document.getElementById('water').value);
  //  duration=document.getElementById('time3').value
  // water_dis=duration.split(' ');
  // c=Number(water_dis[0]);


  d = a*b;
 // alert(d);
 

  document.getElementById('txttotwater').value = d+"lit";
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
  function selectdate()
  {
    alert("If you want to update the date please select plot no!..");
  }
  
</script>
 
 



  
 
</form>


</div>
</div>
</div>



<?php// include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
