<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>


  <?php include('config.php');?>
  <script src="js/pressure.js"></script>
  <link rel="stylesheet" href="css/t.css">
  

   <script type="text/javascript">
      function show(str) {
       
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
                document.getElementById("txtharvest").value = data[0].harvesting_days;

              console.log(data[0]['harvesting_days']);
            }
          };

          xmlhttp.open("GET", "getData5.php?str=" + str, true);
          xmlhttp.send();
        }
      }
    </script>
  

  </head>
<body class="sb-nav-fixed" onload="notifyMe();">
<?php  include('header.php');?>
 <h2 class="w3-container"><b>EDIT GROWTH REGULATOR</b></b></h2>

<?php
mysqli_query($db,"update tblgrowthsession set status=1");
$ses_id=$_SESSION['plot_id'];
$id=$_GET['id'];
if(isset($_POST["btnupdate"]))
{
  extract($_POST);
  
  
  $_SESSION['plot']=$plot_no;
  $_SESSION['date']=$txtdate;
  // //echo $otherdisposal;



 mysqli_query($db,"update tblgrowth1 set plot_no='$plot_no',pname='$pname',date='$txtdate',stime='$txtstime',etime='$txtetime',duration='$txtduration',days_after_prunning='$txtpday',equipment_used='$txtmachine',worker_name='$txtworker',water_ph='$txtph',moa='$txtmapp',water_used='$txtwater',temp='$txttemp',humidity='$txthum',status=0 where gr_id=".$_GET["id"]);

     echo "<script>window.location.href='edit_gr3.php?id=$id';</script>";
  exit; 
}
  $q1=mysqli_query($db,"select * from tblgrowth1 where gr_id=".$_GET['id']); 
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
                <label><font color="black"><b>Select Plot No:</b></font></label>
               <select name="plot_no" id="plot_no" class="form-control" onchange="show(this.value);" oninput="showUser4(this.value)" required>
                        <option value="<?php echo $r1['plot_no']; ?>"><?php echo $r1['plot_no']; ?></option>
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
                  <input type="Text" value="<?php echo $r1['pname']; ?>" placeholder="Plot Name.." name="pname" class="form-control" id="pname" required>
              </div>
            </div> 
<input type="text"  id="pno" style="display: none">
<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date:</b></font></label>
       <input type="Date" placeholder="Enter date.." value="<?php echo $r1['date']; ?>" class="form-control" name="txtdate" id="txtFirst" oninput="myfunction();"   required>
              </div>

             
               <div class="col-sm-6 form-group">
                <label><font color="black"><b>Days After Prunning:</b></font></label>
              <input  placeholder="Enter Days After Prunning.." value="<?php echo $r1['days_after_prunning']; ?>" class="form-control" name="txtpday" id="txtSecond" required>

            </div>
      </div>
          

         <div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Start Time:</b></font></label>
               <input type="time" class="form-control" placeholder="Enter Start Time.." value="<?php echo $r1['stime']; ?>" name="txtstime" id="time1" onclick="sub();" oninput="difftime()"; required>
              </div>
           

   
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>End Time:</b></font></label>
                <input type="time" placeholder="Enter End Time.." value="<?php echo $r1['etime']; ?>" oninput="difftime()"; class="form-control" name="txtetime" id="time2" required>
              
              </div>
            </div>

  <div class="row">         
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>Duration:</b></font></label>
    <input type="text" placeholder="Enter Duration." id="time3" class="form-control" value="<?php echo $r1['duration']; ?>" name="txtduration" required>

</div>

         <div class="col-sm-6 form-group">
                  <label><font color="black"><b>Equipment Used:</b></font></label>
                <select name="txtmachine"   id="selectBox" class="form-control" onchange="changeFunc();" required>
                          <option value="<?php echo $r1['equipment_used']; ?>"><?php echo $r1['equipment_used']; ?></option>
        <option value="">Select Machine and sprayers</option>
                <label><font color="black"><b>Machines:</b></font></label>
               <?php
                    $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct(machine_name) from tblmachine where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtmachine){
                ?>
                        <option value="<?php echo $txtmachine['machine_name'];?>"><?php echo $txtmachine['machine_name'];?></option>
                <?php
                    }
                ?>

              
              
              <?php
                    $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct(tblntype.name_of_sprayer) as sname from tblsprayer,tblntype where tblntype.nid=tblsprayer.sprayer_name and ses_id=".$ses_id);
                  
                  
                    foreach ($q as $sub_category_item){
                ?>
                        <option value="<?php echo $sub_category_item['sname'];?>"><?php echo $sub_category_item['sname'];?></option>
                <?php
                    }
                ?>
              </select>
              </div>
           
           </div>

            <div class="row">


<div class="col-sm-6 form-group">
                <label><font color="black"><b>Operated By Workers:</b></font></label>
          <select name="txtworker" id="worker_name" class="form-control" required>
            <option value="<?php echo $r1['worker_name']; ?>"><?php echo $r1['worker_name']; ?></option>
            <option value="">Operated By Workers</option>        
                <?php
                    $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select worker_name from tblworker where ses_id=".$ses_id);
                    foreach ($q as $txtworker){
                ?>
            <option value="<?php echo $txtworker['worker_name'];?>"><?php echo $txtworker['worker_name'];?></option>
                <?php
                    }
                ?>
        </select>
    </div>
      <div class="form-group col-sm-6">
       <label for="txtkey"><font color="black"><b>Water Ph</b></font></label>
     
        <input type="text" placeholder="Enter Water Ph.." value="<?php echo $r1['water_ph']; ?>" class="form-control" name="txtph" required>
    </div>
 
  </div>

<div class="row">
  
         <div class="col-sm-6 form-group">
        <label for="txtkey"><font color="black"> <b>Method Of Application:</b></font></label>
        <select name="txtmapp" id="txtmapp" class="form-control">
          <option value="<?php echo $r1['moa']; ?>"><?php echo $r1['moa']; ?></option>
            <Option value="">Method Of Application</option>
            <Option value="Soil">Spray</option>
            <Option value="Fertigation Foliar">Dripping</option>
        </SELECT>
    </div>
        <div class="col-sm-6  form-group">
        <label for="txtkey"><font color="black"><b>Water Used [Liters]:</b></font></label>
            
        <input type="text" placeholder="Enter Total Water Used.." value="<?php echo $r1['water_used']; ?>" class="form-control" name="txtwater"  required>
   </div>
    
</div>
      
       <div class="row">

    <div class="col-sm-6 form-group">
        <label for="txtkey"><font color="black"><b>Temperature:</b></font></label>
       <input type="text" placeholder="Enter Temperature.."  class="form-control" value="<?php echo $r1['temp']; ?>" name="txttemp" required>
    </div>
       <div class="col-sm-6 form-group"> 
        <label for="txtkey"><font color="black"><b>Humidity:</b></font></label>
           
        <input type="text" placeholder="Enter Humidity.." name="txthum" value="<?php echo $r1['humidity']; ?>" class="form-control" required>
    </div>
</div>
       

<div class="row">



<input type="text" placeholder="Enter rate.." name="txtrate" class="form-control" id="rate" style="display: none" >
<input type="text" placeholder="Enter total.." name="txttot" class="form-control" id="total" style="display: none" >

 <input type="text" class="form-control" name="txtharvest"  id="txtharvest" style="display: none">
    <input type="text" class="form-control" name="txtsub"  id="txtsub" style="display: none">
      


  </div>


           <center>
         <button type="Submit" class="btn btn-success" name="btnupdate"><b>UPDATE</b></button>
         </center>
         <br>
       




            

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




<script>
    function f1()
    {
        var a,add;
        add=0;
         a=document.querySelectorAll(".wages");
          for (i = 0; i < a.length; i++) {
              //alert(a[i].value);
            add=parseInt(add) + parseInt(a[i].value);
   }
   document.getElementById('total').value=parseInt(add);
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
         






<script>
  
  function sub1()
  {
    var z=document.getElementById('txtsub').value;
   // alert(z);
    var a=document.querySelectorAll(".phi");
      for (i = 0; i < a.length; i++) {

      var b=parseInt(a[i].value);
          

  }
    if(b>z)
  {
   alert("This item is exceeding PHI, this may appear in residue report. do you still want to continue?");
  }
 
}
</script>


 
</div>
</div>
</div>
</div>
</div>

 
</script>
</form>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/reload.js"></script>
<?php include('footer.php');?>
</body>
</html>