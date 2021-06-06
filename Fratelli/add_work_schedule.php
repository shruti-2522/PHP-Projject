<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
  <link rel="stylesheet" href="css/float_style.css">
 <script>
function notifyMe() {
  //alert('hello');
  if (!("Notification" in window)) {
     alert("This browser does not support desktop notification");
   }

   else if (Notification.permission === "granted") {
     var arr='<?php
       $ses_id=$_SESSION['plot_id'];
         $q1=mysqli_query($db,"SELECT max(prunning_id)as maxid from tblprunning where ses_id='".$ses_id."'");
         $r1=mysqli_fetch_array($q1);
         $q2=mysqli_query($db,"SELECT date from tblprunning where ses_id='".$ses_id."' and prunning_id=".$r1['maxid']);
        $r2=mysqli_fetch_array($q2);
        $date= $r2['date'];  
        
        $date1 = date_create($date);

        $q3=mysqli_query($db,"SELECT DATE_ADD('".$date."', INTERVAL pruning_days DAY) as x from tblschedule where ses_id='".$ses_id."'"); 
        while($r3=mysqli_fetch_array($q3))
        {
            
            $n=$r3['x'];
            $note=$note.$n.",";
        } 
        echo($note);

        ?>';
        str=arr.slice(0,-1); 
      
        var array =str.split(",");
       

        var today = new Date().ge
        tFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2)
        var today1=(document.getElementById("today").innerHTML = today);
      //  alert(today1);
        var y;
        var z=[];
        for(i=0;i<array.length;i++)
        {
  //        alert(typeof(array[i]));
          if(array[i]==today1)
          {
              var notification = new Notification("your calibration is expired");          }
          
          }
        //alert(y);
        }  
}
</script>
<div id="today" style="display: none">
</div>
</head>
<body onload="notifyMe();" class="sb-nav-fixed">
  
        <?php include('header.php');?>
         <div class="col-sm-6 form-group"><h2><b>ADD WORK-SCHEDULE</b></h2></div>
      
 <?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);
  $ses_id=$_SESSION['plot_id'];
  mysqli_query($db,"insert into tblschedule(work,prunning_type,pruning_days,method,ses_id)values('$txtwrk','$txtptype','$txtprun','$txtmethod','$ses_id')");
 
echo "<script>window.location.href='work.php';</script>";
    exit;}
?>

<form method="post" id="myform">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
        <input type="text" id="name" class="form-control" name="txtwrk" required>
        <label class="form-control-placeholder" for="name"><font color="black"><b>Work Name</font></b></label>
      </div>
  </div>
<br>
<div class="row">
      <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
     
        <select name="txtptype" id="ptype" class="form-control">
        <Option value="">Select Prunning type</option>
        <Option value="April">April</option>
           <Option value="October">October</option>
      </SELECT>
  </div>
</div><br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
       <input type="text" id="name" class="form-control" name="txtprun" required>
        <label class="form-control-placeholder" for="name"><font color="black"><b>Prunning days</font></b></label>
      </div>
    
  </div>
  <br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
      <input type="text" id="name" class="form-control" name="txtmethod" required>
        <label class="form-control-placeholder" for="name"><b><font color="black">Method</font></b></label>
      </div>
    
  </div>
</div>
  <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnadd"><b>ADD</b></button></div></center></form>

<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             <script src="js/reload.js"></script>

    </body>
</html>
