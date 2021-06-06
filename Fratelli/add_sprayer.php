<!DOCTYPE html>
<html>
<head>
      <?php include('head.php');?>
      <?php    include('config.php'); ?>

<script type="text/javascript">
$(document).ready(function(){
    $('#sprayer').on('change',function(){
        var sprayerID = $(this).val();
        if(sprayerID){
            $.ajax({
                type:'POST',
                url:'ajaxFile.php',
                data:'sprayer_id='+sprayerID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select Name of Sprayer</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select sprayer type first</option>');
             
        }
    });
});
</script>
</head>
<body class="sb-nav-fixed">
<?php include('header.php');?>
  <div class="col-sm-4 form-group"><h2><b>ADD SPRAYER</b></h2></div>
<div class="w3-container w3-bordered">
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
  <br><br>
<form method="post" enctype="multipart/form-data" id="myform">
  <?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);
  $ses_id= $_SESSION["plot_id"];

  if($ntype=="teejet")
  {
     mysqli_query($db,"insert into tblsprayer(sprayer_type,sprayer_name,nozzle_type,corenopls,corenomin,discnopls,discnomin,nozzle,ses_id)values('$category_item','$sub_category_item','$ntype','$tcore','$tcore1','$tdisc','$tdisc1','$tnozzle','$ses_id')");
      echo "<script>window.location.href='sprayer.php';</script>";
    exit;
  }
  else
  if($ntype=="italian")
  {
    mysqli_query($db,"insert into tblsprayer(sprayer_type,sprayer_name,nozzle_type,corenopls,corenomin,discnopls,discnomin,nozzle,ses_id)values('$category_item','$sub_category_item','$ntype','$icore','$icore1','$idisc','$idisc1','$inozzle','$ses_id')");
 
       echo "<script>window.location.href='sprayer.php';</script>";
    exit;
  }
 else
  if($ntype=="local")
  {
     mysqli_query($db,"insert into tblsprayer(sprayer_type,sprayer_name,nozzle_type,corenopls,corenomin,discnopls,discnomin,nozzle,ses_id)values('$category_item','$sub_category_item','$ntype','$lcore','$lcore1','$ldisc','$ldisc1','$lnozzle','$ses_id')");
 
        echo "<script>window.location.href='sprayer.php';</script>";
    exit;
  }
else
{

   mysqli_query($db,"insert into tblsprayer(sprayer_type,sprayer_name,nozzle_type,corenopls,corenomin,discnopls,discnomin,nozzle,ses_id)values('$category_item','$sub_category_item','$ntype','$tcore','$tcore1','$tdisc','$tdisc1','$tnozzle','$ses_id')");
      echo "<script>window.location.href='sprayer.php';</script>";
    exit;
  }
}
  ?>

<center>
<br>
	    <?php
    $query = "SELECT * FROM tblstype  ORDER BY stype ASC";
    $run_query = mysqli_query($db, $query);
    //Count total number of rows
	$count = mysqli_num_rows($run_query);
    
    ?>
    <table class="table"><tr style="border-style:hidden; "><td><font color="black"><b>Type Of Sprayer:</b></font></td></tr>
<tr><td>
    <select name="category_item" id="sprayer" class="form-control">
        <option value="">Select Sprayer type</option>
        <?php
        if($count > 0){
            while($row = mysqli_fetch_array($run_query)){
				$country_id=$row['sid'];
				$country_name=$row['stype'];
                echo "<option value='$country_id'>$country_name</option>";
            }
        }
        ?>
    </select>
    </td></tr><tr style="border-style:hidden"><td><font color="black"><b>Name Of Sprayer:</b></font></td></tr>
    <tr><td> 

    <select name="sub_category_item" id="state" class="form-control">
        <option value="">Select Name Of Sprayer</option>
          
    </select>
	</td></tr><tr style="border-style:hidden"><td><font color="black"><b>Type Of Nozzle:</b></font></td>
    <tr><td>
    <select name="ntype"  class="form-control"  id="selectBox" onclick="changeFunc();" >
             <option value="text">Select Nozzle</option>         
             <option value="teejet">Teejet</option>         
              <option value="italian">Italian</option>         
               <option value="local">Local</option>        
            </select>
            </td></tr>

<tr style="border-style:hidden;">
                <td class="control-label"  id="label1" style="display: none;  border-style:hidden;"><h1><font color="black"><b>+</b></font></h1></td>
               
            <td for="acc" class="control-label w3-border-0"  id="label2" style="display: none;  border-style:hidden;"><h1><font color="black"><b>-</b></font></h1></td>
           
          </tr>


            <tr style="border-style:hidden;"><td class="w3-border-0" style="border-style:hidden;"> <select name="tcore" id="teejet1" class="form-control"  style="display: none;">
           <option value="">Select core no.</option>
              
               <?php
            $q=mysqli_query($db,"select core_no from tblcoreno");
            foreach ($q as $txtcore){
          ?>
                        <option value="<?php echo $txtcore['core_no'];?>"><?php echo $txtcore['core_no'];?></option>
                <?php
                    }
                ?>
        </select></td>
      
          <td class="w3-border-0" style="border-style:hidden;">
        
          <select name="tcore1" id="teejet11"  class="form-control"  style="display: none;" title="Select Sub Category">
           <option value="">Select core no.</option>
              
               <?php
            $q=mysqli_query($db,"select core_no from tblcoreno");
            foreach ($q as $txtcore){
          ?>
                        <option value="<?php echo $txtcore['core_no'];?>"><?php echo $txtcore['core_no'];?></option>
                <?php
                    }
                ?>

        </select>
      </td>
        </tr>
        <tr style="border-style:hidden;">
          <td class="w3-border-0" style="border-style:hidden;">
             <select name="tdisc" id="teejet2" class="form-control" style="display: none;" title="Select Sub Category">
           <option value="">Select Disc no.</option>
              
                <?php
                    $q=mysqli_query($db,"select disc_no from tbldiscno");
                  
                  
                    foreach ($q as $txtdisc){
                ?>
                        <option value="<?php echo $txtdisc['disc_no'];?>"><?php echo $txtdisc['disc_no'];?></option>
                <?php
                    }
                 ?>
        </select>
          </td>

        <td  class="w3-border-0" style=" border-style:hidden;">
           <select name="tdisc1" id="teejet22" class="form-control"  style="display: none;" title="Select Sub Category">
           <option value="">Select Disc no.</option>
              
                <?php
                    $q=mysqli_query($db,"select disc_no from tbldiscno");
                  
                  
                    foreach ($q as $txtdisc){
                ?>
                        <option value="<?php echo $txtdisc['disc_no'];?>"><?php echo $txtdisc['disc_no'];?></option>
                <?php
                    }
                ?>
        </select>
        </td>
      </tr>

      <tr style="border-style:hidden;">
        <td class="w3-border-0"  style=" border-style:hidden;">
          <select name="tnozzle" id="teejet3" class="form-control" style="display: none;" title="Select Sub Category">
           <option value="">Select No. of Nozzles</option>
              
                <?php
                    $q=mysqli_query($db,"select no_of_nozzle from tblno_nozzle");
                  
                  
                    foreach ($q as $txtnozzle){
                ?>
                        <option value="<?php echo $txtnozzle['no_of_nozzle'];?>"><?php echo $txtnozzle['no_of_nozzle'];?></option>
                <?php
                    }
                ?>
        </select>
        </td>
      </tr>
         <tr style="border-style:hidden;">
        <td class="w3-border-0" style=" border-style:hidden;">
          <select name="idisc" id="italian1" class="form-control"  style="display: none; " title="Select Sub Category">
           <option value="">Select Disc no.</option>
              
                <?php
                    $q=mysqli_query($db,"select idisc_no from tblidiscno");
                  
                  
                    foreach ($q as $txtdisc){
                ?>
                        <option value="<?php echo $txtdisc['idisc_no'];?>"><?php echo $txtdisc['idisc_no'];?></option>
                <?php
                    }
                ?>

        </select>
        </td>
     
        <td class="w3-border-0" style=" border-style:hidden;">
           <select name="idisc1" id="italian11" class="form-control" style="display: none;" title="Select Sub Category">
           <option value="">Select Disc no.</option>
              
                <?php
                    $q=mysqli_query($db,"select idisc_no from tblidiscno");
                  
                  
                    foreach ($q as $txtdisc){
                ?>
                        <option value="<?php echo $txtdisc['idisc_no'];?>"><?php echo $txtdisc['idisc_no'];?></option>
                <?php
                    }
                ?>
     
        </select>
        </td>
      </tr>

      <tr style="border-style:hidden;">
        <td class='w3-border-0' style=" border-style:hidden;">
          <center>
          <select name="inozzle" id="italian2" class="form-control"  style="display: none;" title="Select Sub Category">
           <option value="">No of nozzles</option>
               
               <?php
            $q=mysqli_query($db,"select no_of_nozzle from tblno_nozzle");
                  
                  
                    foreach ($q as $txtnozzle){
                ?>
                        <option value="<?php echo $txtnozzle['no_of_nozzle'];?>"><?php echo $txtnozzle['no_of_nozzle'];?></option>
                <?php
                    }
                ?>

        </select>
      </center>
        </td>
      </tr>

      <tr style="border-style:hidden;">
        <td class='w3-border-0' style=" border-style:hidden;">
          <select name="ldisc" id="local1" class="form-control"  style="display: none;  " title="Select Sub Category">
           <option value="">Select Disc no.</option>
              
               <?php
            $q=mysqli_query($db,"select disc_no from tbldiscno");
            foreach ($q as $txtdisc){
          ?>
                        <option value="<?php echo $txtdisc['disc_no'];?>"><?php echo $txtdisc['disc_no'];?></option>
                <?php
                    }
                ?>
        </select>
        </td>
     
        <td class='w3-border-0' style=" border-style:hidden;">
          <select name="ldisc1" id="local11"  class="form-control" style="display: none;  " title="Select Sub Category">
           <option value="">Select Disc no.</option>
              
               <?php
            $q=mysqli_query($db,"select disc_no from tbldiscno");
            foreach ($q as $txtdisc){
          ?>
                        <option value="<?php echo $txtdisc['disc_no'];?>"><?php echo $txtdisc['disc_no'];?></option>
                <?php
                    }
                ?>
        </select>
        </td>
      </tr>

     <tr style="border-style:hidden;">
      <td  class='w3-border-0' style=" border-style:hidden;">
            <select name="lnozzle" id="local2" class="form-control"  style="display: none;" title="Select Sub Category">
           <option value="">Select No. of Nozzles</option>
              
             <?php
            $q=mysqli_query($db,"select no_of_nozzle from tblno_nozzle");
                  
                  
                    foreach ($q as $txtnozzle){
                ?>
                        <option value="<?php echo $txtnozzle['no_of_nozzle'];?>"><?php echo $txtnozzle['no_of_nozzle'];?></option>
                <?php
                    }
                ?>
        </select>
      </td>
    </tr>
  </table>
     
<div class="col-sm-4"></div>
        <div class="col-sm-6">
        <div align="center"><button type="submit" class="btn btn-success col-sm-4" name="btnadd"><b>ADD</b></button></div>
      </div>
</div>

      
        


          </table>

  </div>
</div>
  </center>
<br><br><br>
</div>

</div>
<script>
  function changeFunc() {
  //alert("hello");

var selectBox = document.getElementById("selectBox");
 var selectedValue = selectBox.options[selectBox.selectedIndex].value;
 if (selectedValue=="teejet"){
  $('#label1').show();
  $('#label2').show();
  $('#teejet1').show();
  $('#teejet11').show();
  $('#teejet2').show();
  $('#teejet22').show();
  $('#teejet3').show();
  $('#italian1').hide();
  $('#italian11').hide();
  $('#italian2').hide();
  $('#local1').hide();
  $('#local2').hide();  
   $('#local11').hide();  
}
 if (selectedValue=="italian"){
  $('#label1').show();
  $('#label2').show();
  $('#teejet1').hide();
  $('#teejet11').hide();
  $('#teejet2').hide();
  $('#teejet22').hide();
  $('#teejet3').hide();
  $('#italian1').show();
  $('#italian11').show();
  $('#italian2').show();
  $('#local1').hide();
  $('#local2').hide();  
  $('#local11').hide();  
}
 if (selectedValue=="local"){
  $('#label1').show();
  $('#label2').show();
  $('#teejet1').hide();
  $('#teejet2').hide();
  $('#teejet3').hide();
  $('#italian1').hide();
  $('#italian11').hide();
  $('#italian2').hide();
  $('#local1').show();
  $('#local11').show();
  $('#local2').show();
   $('#teejet11').hide();
  $('#teejet22').hide();  
}

}      
  
</script>
<script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>     

</center>
</body>
</html>

