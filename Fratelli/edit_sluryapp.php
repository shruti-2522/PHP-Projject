'
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
<?php  include('header.php');?>
<h2 class="container"><b>EDIT SLURRY APLLICATION</b></font></b></h2> 
    
<?php
$ses_id=$_SESSION['plot_id'];
if(isset($_POST["btnsave"]))
{
  extract($_POST);
 if($txtunit=='kg')
 {
  $txtqty1=$txtqty;
  $txtunit='Kg';
 }
 else
   if($txtunit=='ltr')
 {
  $txtqty1=$txtqty;
  $txtunit='ltr';
 }
 else
  if($txtunit=='g')
  {
   $txtqty1=$txtqty*0.001;
   $txtunit='Kg';
  }
  else
  if($txtunit=='ml')
  {
   $txtqty1=$txtqty*0.001;
   $txtunit='ltr';
  }


  mysqli_query($db,"update tblsluryapp set plot_no='$plot_no',pname='$pname',date='$txtdate',stime='$txtstime',etime='$txtetime',duration='$txtduration',prunning_day='$txtpday',equipment_used='$txtmachine',worker_name='$txtworker', slury_typ='$txtslury',content='$txtcontent',quantity='$txtqty1',unit='$txtunit',status=0 where sid=".$_GET["id"]);

 


    echo "<script>window.location.href='sluryapp.php';</script>";
    exit;
}
  $q1=mysqli_query($db,"select * from tblsluryapp where sid=".$_GET["id"]);
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
               <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);" oninput="showUser4(this.value)">
        <option value="<?php echo $r1['plot_no']?>" selecetd><?php echo $r1['plot_no']?></option>
              
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
                  <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" value="<?php echo $r1['pname']?>">
              </div>
            </div> 
            <input type="text"  id="pno" style="display: none">


<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Date:</b></font></label>
       <input type="Date" placeholder="Enter date.." class="form-control" name="txtdate" id="txtFirst" oninput="myfunction();"  value="<?php echo $r1['date']?>" onclick="selectdate();">
              </div>
          

        
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Start Time:</b></font></label>
               <input type="time" class="form-control" placeholder="Enter Start Time.." name="txtstime"id="time1" oninput="difftime()"; value="<?php echo $r1['stime']?>">
              </div>
            </div>
          

    <div class="row">
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>End Time:</b></font></label>
                <input type="time" placeholder="Enter End Time.." oninput="difftime()"; class="form-control" name="txtetime" id="time2" value="<?php echo $r1['etime']?>">
              
              </div>
           
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>Duration:</b></font></label>
    <input type="text" placeholder="Enter End Time.." id="time3" class="form-control" name="txtduration" value="<?php echo $r1['duration']?>">

</div>
</div>
          
              <div class="row">
               <div class="col-sm-6 form-group">
                <label><font color="black"><b>Days After Prunning:</b></font></label>
              <input  placeholder="Enter Days After Prunning.." class="form-control" name="txtpday" id="txtSecond"  value="<?php echo $r1['prunning_day']?>">

            </div>
      
         <div class="col-sm-6 form-group">
                  <label><font color="black"><b>Equipment Used:</b></font></label>
                <select name="txtmachine"   id="selectBox" class="form-control" onchange="changeFunc();" required>
        <option value="<?php echo $r1['equipment_used'];?>"selected><?php echo $r1['equipment_used'];?></option>
                <label><font color="black"><b>Machines:</b></font></label>
               <?php
                    $q=mysqli_query($db,"select distinct(machine_name) from tblmachine where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtmachine){
                ?>
                        <option value="<?php echo $txtmachine['machine_name'];?>"><?php echo $txtmachine['machine_name'];?></option>
                <?php
                    }
                ?>

              
              
              <?php
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
        <label for="item"><font color="black"><b>Operated By Workers:</b></font></label>
     <select name="txtworker" id="worker_name" class="form-control">
            <option  value="<?php echo $r1['worker_name']?>" selected><?php echo $r1['worker_name']?></option>        
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
      

        <div class="col-sm-6 form-group">
        <label for="item"><font color="black"><b>Type of slurry:</b></font></label>
        <select name="txtslury" id="txtslury" class="form-control">
            <option value="<?php echo $r1['slury_typ']?>"><?php echo $r1['slury_typ']?></option>        
            <option value="Bio">Bio</option>
            <option value="Chemical">Chemical</option>
             </select>
        </div>
      </div>

      <div class="row">

         <div class="col-sm-4 form-group">
        <label for="item"><font color="black"><b>Content:</b></font></label>
        <div class="show_data">
         <select name="txtcontent" id="txtcontent" class="form-control" onchange="myfunc(this.value);">
        <option value="<?php echo $r1['content'];?>"selected><?php echo $r1['content'];?></option>
              
                <?php
                    $q=mysqli_query($db,"select content from tblslury where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtcontent){
                ?>
                        <option value="<?php echo $txtcontent['content'];?>"><?php echo $txtcontent['content'];?></option>
                <?php
                    }
                ?>
                  <option value="addnew" style="background-color: lightgreen"><b>Slurry not found</b>  </option>  
        </select>
      </div>
      <div class="hide_data"></div>
        </div>
  <div class="col-sm-4 form-group">
        <label for="item"><font color="black"><b>Quantity:</b></font></label>
         
       <input type="text" name="txtqty" id="txtqty" class="form-control"  value="<?php echo $r1['quantity']?>" >
        </div>



  <div class="col-sm-4 form-group">
        <label for="item"><font color="black"><b>Unit:</b></font></label>
         
     <select name="txtunit" id="txtunit"  class="form-control">
            <option  value="<?php echo $r1['unit']?>"  selected><?php echo $r1['unit']?></option>        
            <option value="kg">kg</option>
            <option value="g">g</option>
            <option value="ml">ml</option>
            <option value="ltr">ltr</option>
             </select>
           </div>
        </div>
</div>


    
</table>

<br><br>


 
 
   <center>
         <button type="Submit" class="btn btn-success" name="btnsave">UPDATE</button>
         </center>
         <br>
       </div>
</form>


           <div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
  <h4 class="modal-title"><b>ADD SLURRY</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
  <div class="row">
  <div class="col-sm-12 form-group">
        <label><b>Content:</b></label>
          <input type="text" id="name" class="form-control" placeholder="Enter content" name="txtcontent" required>  </div>
</div>
<div class="row">
  <div class="col-sm-12 form-group">
       <label><b>Select Unit:</b></label>
  <select name="txtunit1" id="txtunit" class="form-control">
            <option value="text">Select unit</option>        
            <option value="kg">kg</option>
            <option value="gm">gm</option>
            <option value="ml">ml</option>
            <option value="ltr">ltr</option>
             </select>
  </div>
    
    </div>

     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
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


<script>
function myfunc(val){
  //var element=document.getElementById('pname');
 if(val=='addnew')
 {
    $(document).ready(function(){
    $("#add_data_Modal").modal('show');
  });


$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#txtcontent').val() == "")  
  {  
   alert("Fruit Name is required");  
  }  
  else if($('#txtunit1').val() == '')  
  {  
   alert("Fruit Type is required");  
  }  
  else  
  {
   //alert("hwwllo");
   $.ajax({  
    url:"insert8.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     //$('#employee_table').html(data); 
     $(".hide_data").hide();
     $(".show_data").html(data); 
    }  
   });  
  }  
 });


}); 
 }
}
</script>

            


<script type="text/javascript">

function difftime()
{
myStart=document.getElementById("time1").value;
myEnd=document.getElementById("time2").value;

if(myEnd>myStart)
{

function getTimeDiff(start, end) {

  return moment.duration(moment(end, "HH:mm").diff(moment(start, "HH:mm")));
}


diff = getTimeDiff(myStart, myEnd)
document.getElementById("time3").value=(`${diff.hours()} Hour`);
}
// else
//   alert("start time muust br gretter than end  time");

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
<script src="js/scripts.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html> '