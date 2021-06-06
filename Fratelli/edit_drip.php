<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
    <?php include('head.php');?>

 




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

    <div class="col-sm-4 form-group"><h1><b>EDIT DRIP</b></h1></div>

     <?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);

   
  mysqli_query($db,"update tbldrip set plot_no='$plot_no', pname='$pname',date='$txtdate',stime='$txtstime',etime='$txtetime',duration='$txtduration',prunning_day='$txtpday',corrective='$txtcorrective',status=0 where did=".$_GET["id"]);
 echo "<script>window.location.href='drip.php';</script>";
    exit;
}
  $q1=mysqli_query($db,"select * from tbldrip where did=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
?>
      

<form method="post" id="myform">
<div class="container" style="margin-top: 50px">
  <div class="row">
  <div class="col-sm-7 form-group">


    <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Select Plot No:</b></font></label>
               
               <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);" oninput="showUser4(this.value)">
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
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot Name:</b></font></label>
                  <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname"  value="<?php echo $r1['pname'];?>" >
              </div>
            </div> 
<input type="text"  id="pno" style="display: none">

<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date:</b></font></label>
              <input type="Date" placeholder="Enter date.." class="form-control" name="txtdate" id="txtFirst" oninput="myfunction();"  value="<?php echo $r1['date'];?>" onclick="selectdate();">
              </div>

               <div class="col-sm-6 form-group">
                <label><font color="black"><b>Days After Prunning:</b></font></label>
                <input  placeholder="Enter Days After Prunning.." class="form-control" name="txtpday" id="txtSecond" value="<?php echo $r1['prunning_day'];?>">

</div></div>

          

        <div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Start Time:</b></font></label>
               <input type="time" class="form-control" placeholder="Enter Start Time.." name="txtstime"id="time1" oninput="difftime()"; value="<?php echo $r1['stime'];?>" >
              </div>
           

            <div class="col-sm-6 form-group">
                <label><font color="black"><b>End Time:</b></font></label>
                <input type="time" placeholder="Enter End Time.." oninput="difftime()"; class="form-control" name="txtetime" id="time2" value="<?php echo $r1['etime'];?>">
              
              </div>
            </div>
    
    <div class="row">       
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>Duration:</b></font></label>
    <input type="text" placeholder="Enter End Time.." id="time3" class="form-control" name="txtduration" value="<?php echo $r1['duration'];?>">

</div>          
              
      


              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Corrective Measures:</b></font></label>
                 <input  placeholder="Enter Corrective Measures.." name="txtcorrective" class="form-control" value="<?php echo $r1['corrective'];?>">
              </div>
            </div>
              
<!--               <div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Observed By:</b></font></label>
        <input  placeholder="Enter Corrective Measures.." class="form-control" name="txtobserved" required>
    </div> -->
 <!--  </div>
  </div>
 -->
 <br>
   <center>
         <button type="Submit" class="btn btn-success" name="btnsave"><b>UPDATE</b></button>
         </center>
         <br>
       </div>
</div>
</div>
        
       </div>
     </form>
 
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
            </div>
          </div>
   <?php include('footer.php');?>
   
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/reload.js"></script> -->
    </body>
</html>
