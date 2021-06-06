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
            <div class="col-sm-4 form-group"><h2><b>ADD IRRIGATION</b></h2></div>
       
      
<?php

if(isset($_POST["btndraft"]))
{
  extract($_POST);
  $status=1;
  $ses_id=$_SESSION['plot_id'];
  mysqli_query($db,"insert into tblirrigation(plot_no,pname,date,stime,etime,duration,prunning_day,moisure,water_dis,pressure_read,tot_water,temp,remark,ses_id,status)values('$plot_no','$pname','$txtdate','$txtstime','$txtetime','$txtduration','$txtpday','$txtmoisure','$txtwaterdis','$txtpressure','$txttotwater','$txttemp','$txtremark','$ses_id','$status')");
 echo "<script>window.location.href='irrigation.php';</script>";
    exit;
  
}
if(isset($_POST["btnadd"]))
{
  extract($_POST);
  
  $ses_id=$_SESSION['plot_id'];
  mysqli_query($db,"insert into tblirrigation(plot_no,pname,date,stime,etime,duration,prunning_day,moisure,water_dis,pressure_read,tot_water,temp,remark,ses_id,status)values('$plot_no','$pname','$txtdate','$txtstime','$txtetime','$txtduration','$txtpday','$txtmoisure','$txtwaterdis','$txtpressure','$txttotwater','$txttemp','$txtremark','$ses_id','$status')");
 echo "<script>window.location.href='irrigation.php';</script>";
    exit;
  
}
?>
<form method="post">
  
<div class="container">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-7">

    <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot No:</b></font></label>
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
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot Name:</b></font></label>
             <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" required>
              </div>
            </div> 
<input type="text"  id="pno" style="display: none">
<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date:</b></font></label>
    <input type="Date" placeholder="Enter date.." name="txtdate" class="form-control" id="txtFirst" oninput="myfunction()";  required>
       
      </SELECT>


              </div>

               <div class="col-sm-6 form-group">
  <label><font color="black"><b>Days  After Prunning:</b></font></label>
  
<input type="text" placeholder="Enter Days After Prunning.." name="txtpday" id="txtSecond" class="form-control" required>
</div>
</div>


<div class="row">
            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Start Time:</b></font></label>
        <input type="Time" placeholder="Enter Start Time.." name="txtstime" class="form-control" id="time1"  oninput="difftime()"; required>
          </div>
        
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>End Time:</b></font></label>
              <input type="Time" placeholder="Enter End Time.." name="txtetime" class="form-control" id="time2"  oninput="difftime()"; required>
              </div>
            </div>

          
<div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Duration:</b></font></label>
               <input type="text" placeholder="Enter Duration .." name="txtduration" id="time3" class="form-control" required>
              </div>
            
        
               
        <div class=" col-sm-6 form-group">
          <label><font color="black"><b>Moisture Before Irrigation(%):</b></font></label>
         
                    <input type="text"  placeholder="Enter Moisure Before irrigation.." name="txtmoisure" class="form-control" onchange="multiply(this.value)"; required>
              
              </div>
            </div>
          
           
<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Water  Discharge Per  Plant:</b></font></label>
       
                 <input type="text"  placeholder="Enter Water Discharge per plant.."  class="form-control" name="txtwaterdis" id="water"   required >
              
              </div>
          
      <div class="col-sm-6 form-group">
          <label><font color="black"><b>Pressure  Reading[Kg]:</b></font></label>
          
             <input type="text"  placeholder="Enter Pressure Reading.."class="form-control" name="txtpressure" onchange="multiply1(this.value)"; required>
          </div>
        </div>
       

<div class="row">
  <div class="col-sm-6 form-group">
          <label><font color="black"><b>Total  Water Supplied[Litre]:</b></font></label>
         
                   
                    <input type="text" placeholder="Enter Total Water Supplied.." class="form-control" id="txttotwater" name="txttotwater" required>
              
              </div>
           
          <div class="col-sm-6 form-group">
          <label><font color="black"><b>Temperature:</b></font></label>
           
                <input type="text"  placeholder="Enter Temperature.." name="txttemp" class="form-control" required>
          </div>
        </div>
        


         <div class="row">
          <div class="col-sm-6 form-group">
          <label><font color="black"><b>Remark:</b></font></label>
          
                     
                 <input type="text" placeholder="Enter Remark.." name="txtremark" class="form-control" >
              </div>
         
            <div class="col-sm-6 form-group">
         
          <input type="Text" placeholder="Plot Name.." name="vines" id="discharge" class="form-control" style="display: none;"  required>
              
              </div>
            </div>
          
            
           <div class="row">
             <div class="col-sm-6 form-group">
             <input type="Text" placeholder="Plot Name.." name="no_of_drip" id="no_of_drip" class="form-control"  style="display: none;">
                <input type="Text" placeholder="Plot Name.." name="no_of_drip" id="vines" class="form-control"  style="display: none;">
              
              </div>
            </div>
           
          
           
     <br>      

   <center>
         <button type="Submit" class="btn btn-success" name="btnadd"><b>ADD</b></button>
         <button type="Submit" class="btn btn-success" name="btndraft" formnovalidate><b>SAVE AS DRAFT</b></button>
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
   // duration=document.getElementById('time3').value
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
         
 



  
 
</form>


</div>
</div>
</div>



<?php// include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
