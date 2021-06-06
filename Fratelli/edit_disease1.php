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

$q2=mysqli_query($db,"select sdate from tbldisease1 where status=0 and  did=".$last_id) ;

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
        //  alert(str);
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
 var str1=str.split('_');
     //  alert(str1);
              if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
         // alert('hello');
          return;
        } else {
                   var f=document.getElementById("q_"+str1[1]).value;
                 //  alert(f);
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              
             
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;
              document.getElementById("bat_"+str1[1]).value = data[0].batch_no;
              document.getElementById("ph_"+str1[1]).value = data[0].PHI;
              document.getElementById("exp_"+str1[1]).value = data[0].exp_date;
              document.getElementById("dis_"+str1[1]).value = data[0].disease;
              document.getElementById("itm_"+str1[1]).value = data[0].item_type;
            document.getElementById("rat_"+str1[1]).value = data[0].purchase_rate;

            document.getElementById("uni_"+str1[1]).value = data[0].act_unit;
              console.log(data[0]['act_unit']);
            }
          };

          xmlhttp.open("GET", "getRate.php?str=" + f, true);
          xmlhttp.send();
        }
      }
    </script>


   <script type="text/javascript">
      function showUser5(str) {
      
        if (str == "") {

          document.getElementById("txtHint").innerHTML = "";
        
          return;
        } else {
            var f=document.getElementById("pest_"+str).value;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {                  
              data = JSON.parse(this.responseText);
                var len = data.length;
               if(len > 0){
                                 
                                    //var id = data[0]['id'];
                                  
                                      var purchase_rate=data[0]['purchase_rate'];
                                      var unit=data[0]['act_unit'];
                                      var batch_no=data[0]['batch_no'];
                                      var phi=data[0]['PHI'];
                                      var exp_date=data[0]['exp_date'];
                                      var disease=data[0]['disease'];
                                      var item=data[0]['item_type'];

                                      document.getElementById('rate_'+str).value =purchase_rate;
                                      document.getElementById('aunit_'+str).value =unit;
                                      document.getElementById('batch_'+str).value =batch_no;
                                      document.getElementById('phi_'+str).value =phi;
                                      document.getElementById('edate_'+str).value =exp_date;
                                      document.getElementById('disease_'+str).value =disease;
                                      document.getElementById('item_'+str).value =item;
                                    }                               
             
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;
     
                                     
                                      //var disease= response[0]['disease'];
                                      
                                    // var age = response[0]['age'];
                                    // var salary = response[0]['salary']
                                         

              console.log(data[0]['purchase_rate']);
            }
          };

          xmlhttp.open("GET", "getRate1.php?str=" + f, true);
          xmlhttp.send();
        }
      }
    </script>

  
  



</head>
<body class="sb-nav-fixed" onload="notifyMe();">
<?php  include('header.php');?>
    
  <h2 class="w3-container"><b>EDIT APPLICATION</b></b></h2>


 <?php
    $ses_id=$_SESSION['plot_id'];
   $id=$_GET['id'];
if(isset($_POST["btnsave"]))
{
  extract($_POST);
 $_SESSION['txtharvest']=$txtharvest;
  $_SESSION['txtpdays']=$txtpdays;
 
 
   $_SESSION['plot_no']=$plot_no;
  $_SESSION['sdate']=$txtdate;
   $_SESSION['txtsub']=$txtsub;  
 

//echo $_SESSION['plot_no'];
//echo $_SESSION['sdate'];

 if($txtdisposal=='others')
  {
    mysqli_query($db,"update tbldisease1 set plot_no='$plot_no',pname='$pname',sdate='$txtdate',days_after_prunning='$txtpdays',preventive='$txtprev',equipment='$txtmachine',no_of_nozzle='$txtnozzle',pressure='$txtpressure',discharge='$txtdischarge',duration='$txtdapp',water_required='$txtwater',water_used='$txtwused',moa='$txtmapp',oworker='$txtworker',dor='$otherdisposal',temp='$txttemp',humidity='$txthumidity',status=0 where did=".$_GET["id"]);
 }
else
{
   mysqli_query($db,"update tbldisease1 set plot_no='$plot_no',pname='$pname',sdate='$txtdate',days_after_prunning='$txtpdays',preventive='$txtprev',equipment='$txtmachine',no_of_nozzle='$txtnozzle',pressure='$txtpressure',discharge='$txtdischarge',duration='$txtdapp',water_required='$txtwater',water_used='$txtwused',moa='$txtmapp',oworker='$txtworker',dor='$txtdisposal',temp='$txttemp',humidity='$txthumidity',status=0 where did=".$_GET["id"]);
}   

 

    echo "<script>window.location.href='edit_disease3.php?id=$id';</script>";
  exit;
}

  $q1=mysqli_query($db,"select * from tbldisease1 where did=".$_GET["id"]);
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
                <label><font color="black"><b>Plot No.:</b></font></label>
                 <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);" oninput="showUser4(this.value)">
               <option value="<?php echo $r1['plot_no'];?>"><?php echo $r1['plot_no'];?></option>
              
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
              <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" value="<?php echo $r1['pname'];?>">
              </div>
            </div> 
            <input type="text"  id="pno" style="display: none">


<div class="row">


           
            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Date:</b></font></label>
          <input type="Date" placeholder="Enter date.." name="txtdate" class="form-control" oninput="myfunction();" id="txtFirst" value="<?php echo $r1['sdate'];?>">
      
          </div>


            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Day After Prunning:</b></font></label>
          <input type="text" class="form-control" name="txtpdays" id="txtSecond" value="<?php echo $r1['days_after_prunning'];?>">
          </div>


        </div>
       

     <div class="row">
            <div class="col-sm-6 form-group">
              <label><font color="black"><b>Preventive/Curative</b></font></label>
              <select name="txtprev" id="ptype" class="form-control" onchange="sub();" >
        <Option value="<?php echo $r1['preventive'];?>" selected><?php echo $r1['preventive'];?></option>
        <Option value="preventive">Preventive</option>
           <Option value="curative">Curative</option>
      </SELECT>
              </div>
            
          
<div class="col-sm-6 form-group">
             <label><font color="black"><b>Equipment Used:</b></font></label>
                <select name="txtmachine"   id="selectBox" class="form-control" onchange="showUser2(this.value);" required>
        <option value="<?php echo $r1['equipment'];?>"selected><?php echo $r1['equipment'];?></option>
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
                <div id="selectBox"></div>
              </div>
            </div>
            
<div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>No of Nozzle:</b></font></label>
    <input type="text" class="form-control" name="txtnozzle" id="txtnozzle" value="<?php echo $r1['no_of_nozzle'];?>">
</div>
         

<div class="col-sm-6 form-group">
    <label><font color="black"><b>Pressure(Bar):</b></font></label>

         <select name="txtpressure" id="pres" class="form-control" onchange="pressure();">
      <option value="<?php echo $r1['pressure'];?>"selected><?php echo $r1['pressure'];?></option>
      <option value="10">10 bar</option>
      <option value="20">20 bar</option>
      </select>
            </div>

          </div>

             <input type="text" class="form-control" name="txt1"  id="corenopls"  onchange="pressure();"  style="display: none">
              <input type="text" class="form-control" name="txt2" id="discnopls"   onchange="pressure();" style="display: none">

       <input type="text" class="form-control" name="txt3" id="prescal"    style="display: none">
       <input type="text" class="form-control" name="txt4" id="nozzle"  onchange="pressure();"   style="display: none">

          
           <div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Discharge:</b></font></label>
       
       <input type="text" class="form-control" name="txtdischarge" id="txtdischarge" oninput="dischargecal();" value="<?php echo $r1['discharge'];?>">
              </div>
               <div class="col-sm-6 form-group">
              <label><font color="black"><b>Duration for application:</b></font></label>
              <input type="text"  name="txtdapp" class="form-control" id="txtdapp" onchange="watercal();" value="<?php echo $r1['duration'];?>">
              </div>

            </div>


<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Water Required:</b></font></label>
           <input type="text"  name="txtwater" class="form-control" id="water_req" value="<?php echo $r1['water_required'];?>">
              </div>
               <div class="col-sm-6 form-group">
              <label><font color="black"><b>Water Used:</b></font></label>
              <input type="text" class="form-control" name="txtwused" value="<?php echo $r1['water_used'];?>">
              </div>

            </div>

<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Method Of  Application:</b></font></label>
            <select name="txtmapp" class="form-control">
      <option value="<?php echo $r1['moa'];?>"><?php echo $r1['moa'];?></option>
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
      <option value="<?php echo $r1['oworker'];?>"selected><?php echo $r1['oworker'];?></option>
              
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
      <option value="<?php echo $r1['dor'];?>"selected><?php echo $r1['dor'];?></option>
      <option value="Drainage">Drainage</option>
      <option value="others">others</option>
    </select>
              </div>
                 <div class="col-sm-6 form-group">
              <label><font color="white"><b>Enter Other type</b></font></label>
              <input type="text" class="form-control" name="otherdisposal" id="otherdisposal" value="<?php echo $r1['dor'];?>" style='display:none'>
              </div></div>

<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Temperature:</b></font></label>
             <input type="text" class="form-control" name="txttemp" value="<?php echo $r1['temp'];?>">
              </div>
               <div class="col-sm-6 form-group">
              <label><font color="black"><b>Humidity:</b></font></label>
            <input type="text" class="form-control" name="txthumidity" value="<?php echo $r1['humidity'];?>">
              </div>

            </div>
  

      
        <br>
      
    </div>

    <?php 


  $n1=mysqli_query($db,"select * from plot where plot_no=".$r1['plot_no']." and ses_id=".$ses_id);
  $n2=mysqli_fetch_array($n1);
?>

   <input type="text" class="form-control" name="txtharvest"  id="txtharvest"  value="<?php echo $n2['harvesting_days'];?>" style="display: none;">
    
           <center>
         <button type="Submit" class="btn btn-success" name="btnsave"><b>UPDATE</b></button>
    
         </center>
         <br>
       </div>


    



            

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
 

<script>
function myfunc(val){
 
 //var element=document.getElementById('pname');
 if(val=='addnew')
 {
 window.location="add_ipurchase3.php";
   //alert("hello");=
 }
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
  function watercal()
  {
    var s1=document.getElementById('txtdischarge').value;
    var w=s1.split(' ');

    var s2=document.getElementById('txtdapp').value;
    var c=w[0]*s2;

   document.getElementById('water_req').value=c;
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