<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>


  <?php include('config.php');?>
  <script src="js/pressure.js"></script>
  <script>
function notifyMe() {
    if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }
  else  if (Notification.permission === "granted") 
  {
    var note="<?php   $ses_id=$_SESSION['plot_id'];
    $q1=mysqli_query($db,"select max(did) as maxid from tbldisease1 where status=0 and ses_id=".$ses_id) ;
    $r1=mysqli_fetch_array($q1);
$last_id = $r1['maxid'];
//echo $last_id;
$q2=mysqli_query($db,"select sdate from tbldisease1 where status=0 and  did=".$last_id) ;
//$r2=mysqli_fetch_array($q2);
$dateDiff= $r2['sdate'];
echo $dateDiff;?>";

   var today1=new Date(note);
         var date1 = today1.getFullYear()+'-'+(today1.getMonth()+1)+'-'+today1.getDate();

          
          var today = new Date();
          var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
          
           var a=typeof(date1);
            //alert(a);
         var n=date.toString();
          //alert(n);
          var n1=note.toString();
          //alert(date);
          if(date===date1)
          {
         
        var notification = new Notification("your Date is expired");
      }
    
  }

  else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(function (permission) {
      if (permission === "granted") {
      var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
          if(date)
          {           
        var notification = new Notification("your Date is expired");
      }
      }
    });
  }

  
  }
</script>


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
  
   <script type="text/javascript">
      function showUser2(str) {
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
          alert(str);
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              
             
              //document.getElementById("pase_rate").value = data[0].purchase_rate;
              document.getElementById("corenopls").value = data[0].corenopls;
               document.getElementById("discnopls").value = data[0].discnopls;
                document.getElementById("nozzle").value = data[0].nozzle_type;
              console.log(data[0]['nozzle_type']);
            }
          };

          xmlhttp.open("GET", "getPressure.php?str="+ str, true);
          xmlhttp.send();
        }
      }
    </script>
  
     <script type="text/javascript">
      function showUser3(str) {
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
         // alert('hello');
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              
             
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;
              document.getElementById("batch_1").value = data[0].batch_no;
              document.getElementById("phi_1").value = data[0].PHI;
              document.getElementById("edate_1").value = data[0].exp_date;
              document.getElementById("disease_1").value = data[0].disease;
              document.getElementById("item_1").value = data[0].item_type;
            document.getElementById("rate_1").value = data[0].purchase_rate;

            document.getElementById("aunit_1").value = data[0].act_unit;
              console.log(data[0]['act_unit']);
            }
          };

          xmlhttp.open("GET", "getRate.php?str=" + str, true);
          xmlhttp.send();
        }
      }
    </script>




  </head>
<body class="sb-nav-fixed" onload="notifyMe();">
<?php  include('header.php');?>
 <h2 class="w3-container"><b>ADD APPLICATION</b></b></h2>




<?php
mysqli_query($db,"update tbldissession set status=1");
$ses_id=$_SESSION['plot_id'];
if(isset($_POST["btndraft"]))
{
  extract($_POST);
  $status=1;
  $_SESSION['plot_no']=$plot_no;
  $_SESSION['sdate']=$txtdate;
  $_SESSION['txtsub']=$txtsub;  
  $_SESSION['txtharvest']=$txtharvest;
  $_SESSION['txtpdays']=$txtpdays;

  if($txtdisposal=="others")
  {
  mysqli_query($db,"insert into tbldisease1(plot_no,pname,sdate,days_after_prunning,preventive,equipment,no_of_nozzle,pressure,discharge,duration,water_required,water_used,moa,oworker,dor,temp,humidity,ses_id,status)values('$plot_no','$pname','$txtdate','$txtpdays','$txtprev','$txtmachine','$txtnozzle','$txtpressure','$txtdischarge','$txtdapp','$txtwater','$txtwused','$txtmapp','$txtworker','$otherdisposal','$txttemp','$txthumidity','$ses_id','$status')");
  }
  else
  {
      mysqli_query($db,"insert into tbldisease1(plot_no,pname,sdate,days_after_prunning,preventive,equipment,no_of_nozzle,pressure,discharge,duration,water_required,water_used,moa,oworker,dor,temp,humidity,ses_id,status)values('$plot_no','$pname','$txtdate','$txtpdays','$txtprev','$txtmachine','$txtnozzle','$txtpressure','$txtdischarge','$txtdapp','$txtwater','$txtwused','$txtmapp','$txtworker','$txtdisposal','$txttemp','$txthumidity','$ses_id','$status')");

  }

    $q=mysqli_query($db,"select max(did) as mid from tbldisease1"); 
    $r=mysqli_fetch_array($q);
    $id=0;
    $id=$id+$r['mid'];

    echo "<script>window.location.href='disease13.php?id=$id';</script>";
  exit; 
}


if(isset($_POST["btnadd"]))
{
  extract($_POST);
  
  
  $_SESSION['plot_no']=$plot_no;
  $_SESSION['sdate']=$txtdate;
  $_SESSION['txtharvest']=$txtharvest;
  $_SESSION['txtpdays']=$txtpdays;
  //echo $otherdisposal;
  if($txtdisposal=="others")
  {
  mysqli_query($db,"insert into tbldisease1(plot_no,pname,sdate,days_after_prunning,preventive,equipment,no_of_nozzle,pressure,discharge,duration,water_required,water_used,moa,oworker,dor,temp,humidity,ses_id,status)values('$plot_no','$pname','$txtdate','$txtpdays','$txtprev','$txtmachine','$txtnozzle','$txtpressure','$txtdischarge','$txtdapp','$txtwater','$txtwused','$txtmapp','$txtworker','$otherdisposal','$txttemp','$txthumidity','$ses_id','$status')");
  }
  else
  {
      mysqli_query($db,"insert into tbldisease1(plot_no,pname,sdate,days_after_prunning,preventive,equipment,no_of_nozzle,pressure,discharge,duration,water_required,water_used,moa,oworker,dor,temp,humidity,ses_id,status)values('$plot_no','$pname','$txtdate','$txtpdays','$txtprev','$txtmachine','$txtnozzle','$txtpressure','$txtdischarge','$txtdapp','$txtwater','$txtwused','$txtmapp','$txtworker','$txtdisposal','$txttemp','$txthumidity','$ses_id','$status')");

  }

    $q=mysqli_query($db,"select max(did) as mid from tbldisease1"); 
    $r=mysqli_fetch_array($q);
    $id=0;
    $id=$id+$r['mid'];

    echo "<script>window.location.href='disease13.php?id=$id';</script>";
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
                <label><font color="black"><b>Plot No.:</b></font></label>
                 <select name="plot_no" id="plot_no" class="form-control" onchange="show(this.value);"  oninput="showUser4(this.value);" >
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
          <input type="Date" placeholder="Enter date.." name="txtdate" class="form-control" oninput="myfunction();" id="txtFirst" required>
      
          </div>


            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Days After Prunning:</b></font></label>
          <input type="text" class="form-control" name="txtpdays" id="txtSecond"  required>
          </div>


        </div>
       

     <div class="row">
            <div class="col-sm-6 form-group">
              <label><font color="black"><b>Preventive/Curative</b></font></label>
              <select name="txtprev" id="ptype" class="form-control" onchange="sub();" >
        <Option value="">Select Preventive/Curative</option>
        <Option value="preventive">Preventive</option>
           <Option value="curative">Curative</option>
      </SELECT>
              </div>
            
          
<div class="col-sm-6 form-group">
             <label><font color="black"><b>Equipment Used:</b></font></label>
                <select name="txtmachine"   id="selectBox" class="form-control" onchange="showUser2(this.value);" required>
        <option value="">Select Machine and sprayers</option>
                <label><font color="black"><b>Machines:</b></font></label>
               <?php
               $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct machine_name from tblmachine where ses_id=".$ses_id);
                  
                  
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
                <div id="selectBox"></div>
              </div>
            </div>
            
<div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>No of Nozzle:</b></font></label>
    <input type="text" class="form-control" name="txtnozzle" id="txtnozzle" required>
</div>
         

<div class="col-sm-6 form-group">
    <label><font color="black"><b>Pressure(Bar):</b></font></label>

         <select name="txtpressure" id="pres" class="form-control" onchange="pressure();">
      <option value="">Pressure:</option>
      <option value="10">10 bar</option>
      <option value="20">20 bar</option>
      </select>
            </div>

          </div>

             <input type="text" class="form-control" name="txt1"  id="corenopls"  onchange="pressure();" style="display: none;">
              <input type="text" class="form-control" name="txt2" id="discnopls"   onchange="pressure();" style="display: none;">

 <input type="text" class="form-control" name="txt3" id="prescal" style="display: none;">
       <input type="text" class="form-control" name="txt4" id="nozzle"  onchange="pressure();" style="display: none;">

          
           <div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Discharge:</b></font></label>
       
       <input type="text" class="form-control" name="txtdischarge" id="txtdischarge" oninput="dischargecal();" required>
              </div>
               <div class="col-sm-6 form-group">
              <label><font color="black"><b>Duration for application:</b></font></label>
              <input type="text"  name="txtdapp" class="form-control" id="txtdapp" onchange="watercal();" value="min" required>
              </div>

            </div>


<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Water Required:</b></font></label>
           <input type="text"  name="txtwater" class="form-control" id="water_req" required>
              </div>
               <div class="col-sm-6 form-group">
              <label><font color="black"><b>Water Used:</b></font></label>
              <input type="text" class="form-control" name="txtwused" required>
              </div>

            </div>

<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Method Of  Application:</b></font></label>
            <select name="txtmapp" class="form-control">
      <option value="">Method of application</option>
      <option value="spray">spray</option>
      <option value="drip">drip</option>
      <option value="irrigation">irrigation</option>
      <option value="paste">paste</option>
      <option value="drenching">drenching</option>
    </select>
              </div>
               <div class="col-sm-6 form-group">
              <label><font color="black"><b>Operated By Worker:</b></font></label>
              <select name="txtworker" id="Worker" class="form-control">
      <option value="">operated By worker:</option>
              
                <?php
                    $q=mysqli_query($db,"select worker_name from tblworker where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtworker){
                ?>
                        <option value="<?php echo $txtworker['worker_name'];?>"><?php echo $txtworker['worker_name'];?></option>
                <?php
                    }
                ?>
            </select>
              </div>

            </div>
            <div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Disposal Of Remain:</b></font></label>
            <select name="txtdisposal" class="form-control" onchange='Checkdisposal(this.value);'>
      <option value="">Disposal of remain</option>
      <option value="Drainage">Drainage</option>
      <option value="others">others</option>
    </select>
              </div>
                 <div class="col-sm-6 form-group">
              <label><font color="white"><b>Enter Other type</b></font></label>
              <input type="text" class="form-control" name="otherdisposal" id="otherdisposal" style='display:none'>
              </div></div>

<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Temperature:</b></font></label>
             <input type="text" class="form-control" placeholder="Enter tempreture" name="txttemp" required>
              </div>
               <div class="col-sm-6 form-group">
              <label><font color="black"><b>Humidity:</b></font></label>
            <input type="text" class="form-control" name="txthumidity" placeholder="Enter humidity" required>
              </div>

</div>

<input type="text" class="form-control" name="txtharvest"  id="txtharvest" style="display: none;">
    <input type="text" class="form-control" name="txtsub"  id="txtsub" style="display: none">

           <center>
         <button type="Submit" class="btn btn-success" name="btnadd" href="disease1.php?plot_name=<?php echo $a ?>"><b>ADD</b></button>
         <button type="Submit" class="btn btn-success" name="btndraft" formnovalidate><b>SAVE AS DRAFT</b></button>
         </center>
         <br>
       




            

</div>
</div>


<script>
  function Checkdisposal(val)
  {
 if (val=="others"){
//alert("in")
  $('#otherdisposal').show();
  }
}
</script>

<script type="text/javascript">
  
function f1()
{
  var a=document.getElementById("search_data").value;
  var s1=document.getElementById("t1").value;
  var s2=document.getElementById("t2").value;
    var res = s1.split("+");

    var mult=res[0]*res[1];
  
    //mult=s1*s2;
    document.getElementById("wages").value=mult;
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
            document.getElementById('txtSecond').value=(diff)+ " days";
        }
      </script>
         

<script>
  
  function sub()
  {

   var a=document.getElementById('txtharvest').value;
   var b=document.getElementById('txtSecond').value;
   var c=b.split(' ');
  
   var sub=a-c[0];
   //alert(sub);
   document.getElementById('txtsub').value=sub;
}
</script>

<script>
  function dischargecal()
  {
    var type=document.getElementById('nozzle').value;
    var a=document.getElementById('txtnozzle').value;
    var b=document.getElementById('prescal').value;
    if(type=='teejet')
    {
    var s=a*b;
    

    document.getElementById('txtdischarge').value=s+" lit/min";
  }
  }

</script>

<script>
  function watercal()
  {
    var s1=document.getElementById('txtdischarge').value;
    var w=s1.split(' ');

    var s2=document.getElementById('txtdapp').value;
    var w1=s2.split(' ');
    var c=w[0]*w1[0];

   document.getElementById('water_req').value=c;
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

 
</form>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/reload.js"></script>
<?php include('footer.php');?>
</body>
</html>