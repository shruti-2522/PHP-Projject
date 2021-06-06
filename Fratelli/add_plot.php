<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
    <?php include('head.php');?>

           


 
</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>

    <div class="col-sm-4 form-group"><h1><b>ADD PLOT</b></h1></div>
      
<?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);
  $a = implode(',', $_POST['txtwater']);
 
    $ses_id=$_SESSION['plot_id'];
   mysqli_query($db,"insert into plot(plot_no,pname,mh_no,site,soil_type,plantation_year,fruit_name,variety,sp1,sp2,spacing,vines,stucture,area,harvesting_days,water_source,gat_no,motor,lateral,dripper,discharge,unit,no_of_drip,ses_id)values('$txtpno','$txtpname','$txtmh','$txtsite','$txtsoil','$txtplantation','$fruit_name','$variety_name','$txt1','$txt2','$txt3','$txtvine','$txtstructure','$txtarea','$txtharvest','$a','$txtgat','$txtmotor','$txtlat','$txtdrip','$txtdischarge','$txtunit','$txtndrip','$ses_id')");
  
        echo "<script>window.location.href='plot.php';</script>";
  exit;
 
}
?>


<form method="post" id="myform">
<div class="container" style="margin-top: 50px">
  <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Plot No:</b></label>
       <input type="text" class="form-control" placeholder="Enter Plot Number" name="txtpno" required>
      </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Plot Name:</b></label>
       <input type="text" class="form-control" placeholder="Enter Plot name" id="pname" name="txtpname" required>
      </div>
    
  </div>

  <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>MH No:</b></label>
       <input type="text" class="form-control" placeholder="Enter MH number.." name="txtmh" required>
      </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Site:</b></label>
        <input type="text" class="form-control" placeholder="Enter Site.." name="txtsite" required>
      </div>
    
  </div>

   <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Soil Type:</b></label>
        <select name="txtsoil" id="soil" class="form-control" required>
        <Option value="text">Select Soil</option>
        <Option value="Clay Loam">Clay Loam</option>
        <Option value="Sandy  Clay">Sandy  Loam</option>
        <Option value="Sandy Clay Loam">Sandy Clay Loam</option>
        <Option value="Sand">Sand</option>
        <Option value="Loam Soil">Loam Soil</option>
        <Option value="Silty Loam">Silty Loam</option>
        <Option value="Silty Clay">Silty Clay</option>
         <Option value="Silt">Silt</option>
         </select>
      </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Plantation Year:</b></label>
        <input type="text" class="form-control" placeholder="Enter Plantation Year.." name="txtplantation" required>
      </div>
    
  </div>

<div class="row">
  <div class="col-sm-4 form-group">
        <label><b>Fruit Name:</b></label>
         <div class="hide_data">
         <select name="fruit_name" id="fruit_name" class="form-control" onclick="myfunc(this.value);">
               <option value="">Select Fruit</option>
              
                <?php
                $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct(fruit_name) from tblfruit where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $fruit_name){
                ?>
                        <option value="<?php echo $fruit_name['fruit_name'];?>"><?php echo $fruit_name['fruit_name'];?></option>
                <?php
                    }
                ?>
                  <option value="addnew" style="background-color: lightgreen"><b>Fruit not found</b>  </option>  
                </select>
    
      </div>
      <div class="show_data"></div>
      <div id="fruit_name"></div>
      </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Variety:</b></label>
        <input type="text" class="form-control" placeholder="Enter Variety.." id="variety_name" name="variety_name" required>
      </div>
    
  </div>


<div class="row">
  <div class="col-sm-1 form-group">
        
        <label><b>Spacing:</b></label>
       <input name="txt1" id="t1" oninput="f1();" class="form-control">ft
     </div>
     <div class="col-sm-1"><label><font color="white">spacing</font></label><div class="col-sm-1"></div>X</div>
<div class="col-sm-1 form-group">
<label><font color="white">spacing</font></label>
 <input name="txt2" id="t2" class="form-control" oninput="f1();" required>ft
</div>
  <div class="col-sm-1"></div>

<div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Number Of Plants:</b></label>
        <input type="text" class="form-control"  id="txtvine" placeholder="Enter Number Of Plants.."  name="txtvine" onkeyup="multiply()"; required>
      </div>
    
  </div>

 <input type="text" name="txt3" id="t3"  style="display:none;">
    <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Structure:</b></label>
        <select name="txtstructure" id="struct" class="form-control" required>
        <Option value="text">Select Structure:</option>
        <Option value="Y">Y</option>
        <Option value=" Bawar">Bawar</option>
        <Option value="T">T</option>
      </SELECT> 
      </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Area:</b></label>
        <input type="text" placeholder="Enter Area.." class="form-control" name="txtarea" id="txtarea" required>
      </div>
    
  </div>

  <div class="row">
    <div class="col-sm-4 form-group">
      <label><b>Harvesting Days:</b></label>
       <input type="text" class="form-control" placeholder="Enter Harvesting Days.." name="txtharvest" required>
     </div>
  <div class="col-sm-1"></div>
  
 <div class="col-sm-4 form-group">       
<label></t><font color="black"></t><b>Water Source:</b></font></label>
<div class="row">
    <div class="col-sm-1"></div>
<label>Well</label>
<div class="col-sm-1 form-group" style="margin-right:10px;">
 <input type="checkbox" name="txtwater[]" id="checkboxes-1" value="well">
</div>
<label>River</label>
<div class="col-sm-1 form-group" style="margin-right:10px;">
 <input type="checkbox" name="txtwater[]" id="checkboxes-1" value="river">
</div>
<label>Borewell</label>
<div class="col-sm-1 form-group" style="margin-right:10px;">
 <input type="checkbox" name="txtwater[]" id="checkboxes-2" value="borewell">
</div></div></div></div>

 <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Gat No:</b></label>
        <input type="text" placeholder="Enter Gat No.."  class="form-control" name="txtgat" required> 
      </div>

  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Motor:</b></label>
         <input type="text" class="form-control" placeholder="Enter Motor.." name="txtmotor" required>
      </div>
    

</div>

<div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Lateral Type:</b></label>
         <select name="txtlat" id="lat" class="form-control"  required>
        <Option value="text">Select Lateral Type</option>
        <Option value="Inline">Inline</option>
        <Option value="Online">Online</option>
      </SELECT> 
      </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Select Type of Dripper:</b></label>
         <select name="txtdrip" id="dripper" class="form-control" required>
        <Option value="text">Select Type of dripper</option>
        <Option value="Jian P.C.">Jain P.C.</option>
        <Option value="Netafim P.C.">Netafim P.C.</option>
        <Option value="Ordinary">Ordinary</option>
      </SELECT>  
      </div></div>


<div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Drip Discharge:</b></label>
         <input type="text" placeholder="Enter Drip discharge.." class="form-control" name="txtdischarge" class="form-control"  required></div>
           <div class="col-sm-1"></div>

  <div class="col-sm-4 form-group">
       <label><b>Unit:</b></label>
          <select name="txtunit" id="dripper" class="form-control" required>
         <Option value="">Unit:</option>
        <Option value="lit">lit</option>
        <Option value="min">min</option>
        
      </SELECT>  
      </div></div>

<div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Number Of Dripper:</b></label>
         <input type="text" class="form-control" placeholder="Enter number of dripper..." name="txtndrip" class="form-control" required>
  </div></div>
<br>
 <center>
<div class="row">
      <div class="col-sm-5"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnadd"><b>ADD</b></button></div></center>
</form>
          
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
  <h4 class="modal-title"><b>ADD FRUIT</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
  <div class="row">
  <div class="col-sm-12 form-group">
        <label><b>Fruit Name:</b></label>
        <input type="text" id="name" class="form-control" name="txtfruit" required>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 form-group">
       <label><b>Variety:</b></label>
       <input type="text" id="password" class="form-control" name="txtvariety" required>
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
  if($('#txtfruit').val() == "")  
  {  
   alert("Fruit Name is required");  
  }  
  else if($('#txtvariety').val() == '')  
  {  
   alert("Fruit Type is required");  
  }  
  else  
  {
   //alert("hwwllo");
   $.ajax({  
    url:"insert7.php",  
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
 <br>


<script type="text/javascript">
  
function f1()
{
  var s1=document.getElementById("t1").value;
  var s2=document.getElementById("t2").value;
    //var res = s1.split("*");
    //var mult=res[0]*res[1];
    mult=s1*s2;
    //alert(mult);
    document.getElementById("t3").value=mult;
}

</script>

<script>

  function multiply() {
  a = Number(document.getElementById('t3').value);
  //document.write(a);
    b = Number(document.getElementById('txtvine').value);
  c = a * b;

  acre=c/43560;
  var a = acre.toFixed(2);

  document.getElementById('txtarea').value = a+" acre";
}
 </script>

</form>
<?php //include('footer.php');?>
<script src="js/reload.js"></script>
<script src="js/scripts.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>     
    </body>
</html>
