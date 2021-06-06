<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
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

        $q3=mysqli_query($db,"SELECT DATE_ADD('".$date."', INTERVAL pruning_days DAY) as x from tblschedule where ses_id=9"); 
        while($r3=mysqli_fetch_array($q3))
        {
            
            $n=$r3['x'];
            $note=$note.$n.",";
        } 
        echo($note);

        ?>';
        str=arr.slice(0,-1); 
      
        var array =str.split(",");
       

        var today = new Date().getFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2)
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

<body class="sb-nav-fixed" onload="notifyMe();">
   
        <?php include('header.php');?>
          <div class="col-sm-4 form-group"><h2><b>EDIT WORK-SCHEDULE</b></h2></div>
   <?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);
   mysqli_query($db,"update tblschedule set work='$txtwrk',prunning_type='$txtptype',pruning_days='$txtprun',method='$txtmethod' where schedule_id=".$_GET["id"]);
  echo "<script>window.location.href='work.php';</script>";
    exit;
}
$q1=mysqli_query($db,"select * from tblschedule where schedule_id=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
?>
 
<form method="post">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
  <label class="form-control-placeholder" for="name"><font color="black"><b>Work Name</font></b></label>
        <input type="text" id="name" class="form-control" name="txtwrk"  value="<?php echo $r1['work'];?>">  
  </div>
  </div>
  <div class="row">
      <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
     <label class="form-control-placeholder" for="name"><font color="black"><b>Prunning Type</font></b></label>
        <select name="txtptype" id="ptype" class="form-control">
        <Option value="<?php echo $r1['prunning_type']; ?>"><?php echo $r1['prunning_type']; ?></option>
        <Option value="April">April</option>
           <Option value="October">October</option>
      </SELECT>
  </div>
</div><br>
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
              <label class="form-control-placeholder" for="name"><font color="black"><b>Prunning days</font></b></label>
        <input type="text" id="name" class="form-control" name="txtprun" value="<?php echo $r1['pruning_days'];?>">
       
      </div>
    
  </div>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-3 form-group">
            <label class="form-control-placeholder" for="name" value=><b><font color="black">Method</font></b></label>
        <input type="text" id="name" class="form-control" name="txtmethod" value="<?php echo $r1['method'];?>">
        
      </div>
    
  </div>
  </div>
  <br>
  <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnsave"><b>UPDATE</b></button></div></center></form>



        


  <?php  //include('reght_sidebar.php');?>

<?php include('footer.php');?>
             
    </body>
</html>
