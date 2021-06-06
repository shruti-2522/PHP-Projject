<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
    <?php include('head.php');?>

 
  <title></title>
 


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

    <div class="col-sm-4 form-group"><h1><b>ADD CROP</b></h1></div>
      
<?php
$ses_id=$_SESSION['plot_id'];
if(isset($_POST["btndraft"]))
{
  extract($_POST);
  $status=1;
   
  mysqli_query($db,"insert into tblcrop(plot_no,pname,date,stime,etime,duration,prunning_day,title,observation,ses_id,status)values('$plot_no','$pname','$txtdate','$txtstime','$txtetime','$txtduration','$txtpday','$txttitle','$txtobs','$ses_id','$status')");
 
echo "<script>window.location.href='crop.php';</script>";
    exit;
  
}
?>
<?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);

  mysqli_query($db,"insert into tblcrop(plot_no,pname,date,stime,etime,duration,prunning_day,title,observation,ses_id,status)values('$plot_no','$pname','$txtdate','$txtstime','$txtetime','$txtduration','$txtpday','$txttitle','$txtobs','$ses_id','$status')");
 
echo "<script>window.location.href='crop.php';</script>";
    exit;
  
}
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
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot Name:</b></font></label>
                 <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" required>
              </div>
            </div> 

<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date:</b></font></label>
       <input type="Date" placeholder="Enter date.." class="form-control" name="txtdate" id="txtFirst" oninput="myfunction();"  required>
              </div>
                    <input type="text"  id="pno" style="display: none">

          
                   <div class="col-sm-6 form-group">
                <label><font color="black"><b>Days After Prunning:</b></font></label>
              <input  placeholder="Enter Days After Prunning.." class="form-control" name="txtpday" id="txtSecond" required>

            </div>
</div>
        

        <div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Start Time:</b></font></label>
               <input type="time" class="form-control" placeholder="Enter Start Time.." name="txtstime"id="time1" oninput="difftime()"; required>
              </div>
       

   
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>End Time:</b></font></label>
                <input type="time" placeholder="Enter End Time.." oninput="difftime()"; class="form-control" name="txtetime" id="time2" required>
              </div>
              </div>
           
  <div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>Duration:</b></font></label>
    <input type="text" placeholder="Enter End Time.." id="time3" class="form-control" name="txtduration" required>

</div>
      
    
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Title:</b></font></label>
                 <input  placeholder="Enter Corrective Measures.." name="txttitle" class="form-control" required>
              </div>
            </div>
              
              <div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Observations:</b></font></label>
         <textarea name="txtobs" class="form-control" rows="5" cols="15" required></textarea>
    </div>
  </div>
  </div>


   <center>
         <button type="Submit" class="btn btn-success" name="btnadd"><b>ADD</b></button>
         <button type="Save" class="btn btn-success" name="btndraft" formnovalidate><b>SAVE AS DRAFT</b></button>
         </center>
         <br>
       </div>
</div>
</div>
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
</form>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
    </body>
</html>
