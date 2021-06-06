<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>


<?php

$q1=mysqli_query($db,"select max(inid) as maxid from tblinhousecal") ;
$r1=mysqli_fetch_array($q1);
$last_id = $r1['maxid'];
$q2=mysqli_query($db,"select date_interval from tblinhousecal where inid=".$last_id) ;
$r2=mysqli_fetch_array($q2);
$dateDiff= $r2['date_interval'];
 ?>

<script>
function notifyMe() {
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  else if (Notification.permission === "granted") {

   var note="<?php  $q1=mysqli_query($db,"select max(inid) as maxid from tblinhousecal") ;
    $r1=mysqli_fetch_array($q1);
    $last_id = $r1['maxid'];
    $q2=mysqli_query($db,"select date_interval from tblinhousecal where inid=".$last_id) ;
    $r2=mysqli_fetch_array($q2);
     $dateDiff= $r2['date_interval']; 
     echo $dateDiff;?>";
         // alert(note);
         var today1=new Date(note);
         var date1 = today1.getFullYear()+'-'+(today1.getMonth()+1)+'-'+today1.getDate();

          
          var today = new Date();
          var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
          
           var a=typeof(date1);
            //alert(a);
         // var n=date.toString();
          //alert(n);
          //var n1=note.toString();
          //alert(date);
          if(date===date1)
          {
         
        var notification = new Notification("your calibration is expired");
      }
    
  }

  else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(function (permission) {
      if (permission === "granted") {
      var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
          if(date)
          {           
        var notification = new Notification("your calibration is expired");
      }
      }
    });
  }

  
}
</script>
</head>
<body onload="notifyMe()" class="sb-nav-fixed">

        <?php include('header.php');?>
        <div class="col-sm-5 form-group"><h2><b>ADD INHOUSE-CALIBRATION</b></h2></div>

<?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);
  //mysqli_query($db,"insert into tblinhousecal(srno)values('$cno')");
 $ses_id=$_SESSION['plot_id'];
  
mysqli_query($db,"insert into tblinhousecal(srno,machine_name,used_interval,time_interval,date_interval,title,remark,ses_id)values('$cno','$machines','$txtused','$txttime','$txtdate','$txttitle','$txtremark','$ses_id')");
  echo "<script>window.location.href='inhouse_calibbration1.php';</script>";
    exit;
  
  
 
}
?>
<form method="post" id="myform">

<div class="container">

  <div class="row">
  
 <div class="col-sm-10">

<div class="col-sm-12">
            <div class="row">
             <div class="col-sm-4 form-group">
                <label><font color="black"><b>Sr No:</b></font></label>
                <?php 
                  $ses_id=$_SESSION['plot_id'];
                 $q2=mysqli_query($db,"select count(*) as cnt from tblinhousecal where ses_id=".$ses_id);
               $r2=mysqli_fetch_array($q2);      
      ?>
       <input type="text" class="form-control"  id="cno" name="cno" value="<?php echo $r2['cnt']+1; ?>" required>
             
              </div>
              <div class="col-sm-1"></div>

              <div class="col-sm-4 form-group">
                  <label><font color="black"><b>Machine:</b></font></label>
                <select name="machines"   id="selectBox" class="form-control" onchange="changeFunc();" required>
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
      <div class="col-sm-4 form-group">
        <label><font color="black"><b>Date Interval:</b></font></label>
         <input type="date" class="form-control" name="txtdate" id="txtdate" onclick="myfunction();" required>
  
</div>
     
<div class="col-sm-1"></div>
            <div class="col-sm-4 form-group">
          <label><font color="black"><b>Time Interval:</b></font></label>
         <input type="text" class="form-control" name="txttime" id="txttime" placeholder="Enter Time Intrval" required>
          </div>
        </div>

<div class="row">
<div class="col-sm-4 form-group">
        <label><font color="black"><b>Used Interval:</b></font></label>
         <input type="text" class="form-control" name="txtused" id="txtused" placeholder="Enter Used Interval" required>
   </div>
 


<div class="col-sm-1"></div>

        <div class="col-sm-4 form-group">
        <label><font color="black"><b>Title Of Work:</b></font></label>

        <input type="text" class="form-control" name="txttitle" id="txttitle" placeholder="Enter Title of work" required>
          
   </div>
 </div>

<div class="row">
            <div class="col-sm-4 form-group">
          <label><font color="black"><b>Remark:</b></font></label>
         <input type="text" class="form-control" name="txtremark" id="txtremark" placeholder="Enter Remark">
          </div>
        </div>

  
         <button type="Submit" class="btn btn-success col-sm-3" name="btnadd"><b>ADD</b></button>
         </div>
         <br>
       </div>

</div>
</div>
</div>

</form>
<script >
         function myfunction()
        {
            var ddate = "<?php echo $dateDiff; ?>";
           
            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            //alert(date);
            var diff =  Math.floor(( Date.parse(date) - Date.parse(ddate) ) / 86400000);
            document.getElementById('txttime').value=(diff);
        }
      </script>

        


 
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>

    </body>
</html>
