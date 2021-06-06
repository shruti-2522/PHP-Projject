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
  <div class="col-sm-4 form-group"><h2><b>EDIT SPRAYER</b></h2></div>
<div class="w3-container w3-bordered">
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
  <br><br>
<form method="post" enctype="multipart/form-data" id="myform">
  <?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);
  //echo $_POST["category_item"];
  if($ntype=="teejet")
  {
     mysqli_query($db,"update tblsprayer set sprayer_type='$category_item',sprayer_name='$sub_category_item',nozzle_type='$ntype',corenopls='$tcore',corenomin='$tcore1',discnopls='$tdisc',discnomin='$tdisc1',nozzle='$tnozzle' where sid=".$_GET["id"]);

     echo "<script>window.location.href='sprayer.php';</script>";
    exit;
    
  }
  else
  if($ntype=="italian")
  {
     mysqli_query($db,"update tblsprayer set sprayer_type='$category_item',sprayer_name='$sub_category_item',nozzle_type='$ntype',discnopls='$idisc',discnomin='$idisc1',nozzle='$inozzle' where sid=".$_GET["id"]);
    
 
     echo "<script>window.location.href='sprayer.php';</script>";
    exit;
  }
 else
  if($ntype=="local")
  {
     mysqli_query($db,"update tblsprayer set sprayer_type='$category_item',sprayer_name='$sub_category_item',nozzle_type='$ntype',discnopls='$ldisc',discnomin='$ldisc1',nozzle='$lnozzle' where sid=".$_GET["id"]);
    echo "<script>window.location.href='sprayer.php';</script>";
    exit;
    
 
  }
  else
  {
    mysqli_query($db,"update tblsprayer set sprayer_type='$category_item',sprayer_name='$sub_category_item',nozzle_type='$ntype',corenopls='$tcore',corenomin='$tcore1',discnopls='$tdisc',discnomin='$tdisc1',nozzle='$tnozzle' where sid=".$_GET["id"]);

     echo "<script>window.location.href='sprayer.php';</script>";
    exit;
  }
}
 $q1=mysqli_query($db,"select * from tblsprayer where sid=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
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
        <option value="<?php   $q=mysqli_query($db,"select stype from tblstype where sid=".$r1['sprayer_type']);
  $r=mysqli_fetch_array($q); 
echo $r['stype']; ?>" selected><?php   $q=mysqli_query($db,"select stype from tblstype where sid=".$r1['sprayer_type']);
  $r=mysqli_fetch_array($q); 
echo $r['stype']; ?></option>
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
       
           <option value="<?php  $q=mysqli_query($db,"select name_of_sprayer from tblntype where nid=".$r1['sprayer_name']);
  $r=mysqli_fetch_array($q); 
echo $r['name_of_sprayer'];
  ?>" selected><?php  $q=mysqli_query($db,"select name_of_sprayer from tblntype where nid=".$r1['sprayer_name']);
  $r=mysqli_fetch_array($q); 
echo $r['name_of_sprayer'];
  ?></option>
    </select>
	<tr style="border-style:hidden"><td><font color="black"><b>Type Of Nozzle:</b></font></td></tr>
           <tr style="border-style:hidden;"><td><select name="ntype"  class="form-control"  id="selectBox" onclick="changeFunc();"  onchange="alertfunc();" >
             <option value="<?php echo $r1['nozzle_type'];?>" selected><?php echo $r1['nozzle_type'];?></option>         
             <option value="teejet">Teejet</option>         
              <option value="italian">Italian</option>         
               <option value="local">Local</option>        
            </select></td></tr>

<?php 
    if($r1['nozzle_type']=='teejet')
  {
    ?>

      <tr style="border-style:hidden">
                <td class="control-label"  id="label1" ><h1><b>+</b></h1></td>
               
            <td for="acc" class="control-label"  id="label2" ><h1><b>-</b></h1></td>
            <br>
          </tr>


            <tr style="border-style:hidden"><td>
              <label id="label3"><b>Core No.</b></label>
             <select name="tcore" id="teejet1" class="form-control"  title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['corenopls'];?>" selected><?php echo $r1['corenopls'];?></option>
              
               <?php
            $q=mysqli_query($db,"select core_no from tblcoreno");
            foreach ($q as $txtcore){
          ?>
                        <option value="<?php echo $txtcore['core_no'];?>"><?php echo $txtcore['core_no'];?></option>
                <?php
                    }
                ?>
        </select></td>
      
          <td>
         <label id="label4"><b>Core No.</b></label>
          <select name="tcore1" id="teejet11"  class="form-control" title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['corenomin'];?>" selected><?php echo $r1['corenomin'];?></option>
              
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

        <tr style="border-style:hidden">
          <td> <label id="label5"><b>Disc No.</b></label>
             <select name="tdisc" id="teejet2" class="form-control"  title="Select Sub Category" onchange="alertfunc();">
           <option value="echo <?php echo $r1['discnopls'];?>" selected><?php echo $r1['discnopls'];?></option>
              
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
     
     
        <td>
           <label id="label6"><b>Disc No.</b></label>
           <select name="tdisc1" id="teejet22" class="form-control"   title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['discnomin'];?>" selected><?php echo $r1['discnomin'];?></option>
              
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

      <tr style="border-style:hidden">
        <td>
          <label id="label7"><b>No.Of Nozzle</b></label>
          <select name="tnozzle" id="teejet3" class="form-control" title="Select SubCategory" onchange="alertfunc();">
           <option value="<?php echo $r1['nozzle'];?>" seleceetd><?php echo $r1['nozzle'];?></option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="idisc" id="italian1" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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
     
        <td>
           <select name="idisc1" id="italian11" class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <center>
          <select name="inozzle" id="italian2" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select No. Of Nozzle</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="ldisc" id="local1" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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
     
        <td>
          <select name="ldisc1" id="local11"  class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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

     <tr style="border-style:hidden">
      <td>
            <select name="lnozzle" id="local2" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select No. Of Nozzle</option>
              
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
<?php
}
else
   if($r1['nozzle_type']=='teejet')
  {
    ?>
 
      <tr style="border-style:hidden">
                <td class="control-label"  id="label1" ><h1><b>+</b></h1></td>
               
            <td for="acc" class="control-label"  id="label2" ><h1><b>-</b></h1></td>
            <br>
          </tr>


            <tr style="border-style:hidden"><td> <select name="tcore" id="teejet1" class="form-control"  title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['corenopls'];?>" selected><?php echo $r1['corenopls'];?></option>
              
               <?php
            $q=mysqli_query($db,"select core_no from tblcoreno");
            foreach ($q as $txtcore){
          ?>
                        <option value="<?php echo $txtcore['core_no'];?>"><?php echo $txtcore['core_no'];?></option>
                <?php
                    }
                ?>
        </select></td>
      
          <td>
        
          <select name="tcore1" id="teejet11"  class="form-control" title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['corenomin'];?>" selected><?php echo $r1['corenomin'];?></option>
              
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

        <tr style="border-style:hidden">
          <td>
             <select name="tdisc" id="teejet2" class="form-control"  title="Select Sub Category" onchange="alertfunc();">
           <option value="echo <?php echo $r1['discnopls'];?>" selected><?php echo $r1['discnopls'];?></option>
              
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
     
     
        <td>
           <select name="tdisc1" id="teejet22" class="form-control"   title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['discnomin'];?>" selected><?php echo $r1['discnomin'];?></option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="tnozzle" id="teejet3" class="form-control" title="Select SubCategory" onchange="alertfunc();">
           <option value="<?php echo $r1['nozzle'];?>" seleceetd><?php echo $r1['nozzle'];?></option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="idisc" id="italian1" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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
     
        <td>
           <select name="idisc1" id="italian11" class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <center>
          <select name="inozzle" id="italian2" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select No. Of Nozzle</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="ldisc" id="local1" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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
     
        <td>
          <select name="ldisc1" id="local11"  class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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

     <tr style="border-style:hidden">
      <td>
            <select name="lnozzle" id="local2" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select No. OF Nozzle</option>
              
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
<?php
}else
   if($r1['nozzle_type']=='italian')
  {
    ?>

      <tr style="border-style:hidden">
                <td class="control-label"  id="label1" ><h1><b> + </b></h1></td>
               
            <td for="acc" class="control-label"  id="label2" ><h1><b> - </b></h1></td>
            <br>
          </tr>


            <tr style="border-style:hidden"><td> 
              <select name="tcore" id="teejet1" class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Core No.</option>
              
               <?php
            $q=mysqli_query($db,"select core_no from tblcoreno");
            foreach ($q as $txtcore){
          ?>
                        <option value="<?php echo $txtcore['core_no'];?>"><?php echo $txtcore['core_no'];?></option>
                <?php
                    }
                ?>
        </select></td>
      
          <td>
        
          <select name="tcore1" id="teejet11"  class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Core No.</option>
              
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

        <tr style="border-style:hidden">
          <td>
             <select name="tdisc" id="teejet2" class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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
     
     
        <td>
           <select name="tdisc1" id="teejet22" class="form-control" style="display: none;"  title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="tnozzle" id="teejet3" class="form-control" style="display: none;" title="Select SubCategory" onchange="alertfunc();">
           <option value="">Select No. Of Nozzle</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <label id="label8"><b>Disc No.</b></label>
          <select name="idisc" id="italian1" class="form-control"   title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['discnopls'];?>"selected><?php echo $r1['discnopls'];?></option>
              
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
     
        <td>
          <label id="label9"><b>Disc No.</b></label>
           <select name="idisc1" id="italian11" class="form-control"  title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['discnomin'];?>" selecteed><?php echo $r1['discnomin'];?></option>
              
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

      <tr style="border-style:hidden">
        <td>
            <label id="label10"><b>No.Of Nozzle</b></label>
          <select name="inozzle" id="italian2" class="form-control"   title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['nozzle'];?>"><?php echo $r1['nozzle'];?></option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="ldisc" id="local1" class="form-control"  style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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
     
        <td>
          <select name="ldisc1" id="local11"  class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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

     <tr style="border-style:hidden">
      <td>
            <select name="lnozzle" id="local2" class="form-control" style="display: none;"  title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select No. Of. Nozzle</option>
              
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
<?php
}
else
 if($r1['nozzle_type']=='local')
  {
    ?>

      <tr style="border-style:hidden">
                <td class="control-label"  id="label1" ><h1><b> + </b></h1></td>
               
            <td for="acc" class="control-label"  id="label2" ><h1><b> - </b></h1></td>
            <br>
          </tr>


            <tr><td> <select name="tcore" id="teejet1" class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Core No.</option>
              
               <?php
            $q=mysqli_query($db,"select core_no from tblcoreno");
            foreach ($q as $txtcore){
          ?>
                        <option value="<?php echo $txtcore['core_no'];?>"><?php echo $txtcore['core_no'];?></option>
                <?php
                    }
                ?>
        </select></td>
      
          <td>
        
          <select name="tcore1" id="teejet11"  class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Core No.</option>
              
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

        <tr style="border-style:hidden">
          <td>
             <select name="tdisc" id="teejet2" class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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
     
     
        <td>
           <select name="tdisc1" id="teejet22" class="form-control" style="display: none;"  title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="tnozzle" id="teejet3" class="form-control" style="display: none;" title="Select SubCategory" onchange="alertfunc();">
           <option value="">Select No. Of Nozzle</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <select name="idisc" id="italian1" class="form-control" style="display: none;"  title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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
     
        <td>
           <select name="idisc1" id="italian11" class="form-control" style="display: none;" title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select Disc No.</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <center>
          <select name="inozzle" id="italian2" class="form-control" style="display: none;"  title="Select Sub Category" onchange="alertfunc();">
           <option value="">Select No.Of Nozzle</option>
              
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

      <tr style="border-style:hidden">
        <td>
          <label id="label11"><b>Disc No.</b></label>
          <select name="ldisc" id="local1" class="form-control"   title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['discnopls'];?>" selected><?php echo $r1['discnopls'];?></option>
              
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
     
        <td>
          <label id="label12"><b>Disc No.</b></label>
          <select name="ldisc1" id="local11"  class="form-control"  title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['discnomin'];?>" selected><?php echo $r1['discnomin'];?></option>
              
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

     <tr style="border-style:hidden">
      <td>
                  <label id="label13"><b>No.Of Nozzle</b></label>

            <select name="lnozzle" id="local2" class="form-control"   title="Select Sub Category" onchange="alertfunc();">
           <option value="<?php echo $r1['nozzle'];?>" selected><?php echo $r1['nozzle'];?></option>
              
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
<?php
}
?>
       </table>


        <div align="center"><div class="col-sm-4"></div><div class="col-sm-7"><button type="submit" class="btn btn-success col-sm-4" name="btnsave"><b>UPDATE</b></button></div></div>



</form>
    
  </div>
</div>
  </center>

</div>
<script>
  function alertfunc()
  {
    alert("Select Type Of Sprayer First");
  }


  function changeFunc() {
  //alert("hello");

var selectBox = document.getElementById("selectBox");
 var selectedValue = selectBox.options[selectBox.selectedIndex].value;
 if (selectedValue=="teejet"){
  $('#label1').show();
  $('#label2').show();
    $('#label3').show();
  $('#label4').show();
  $('#label5').show();
  $('#label6').show();
  $('#label7').show();
  $('#teejet1').show();
  $('#teejet11').show();
  $('#teejet2').show();
  $('#teejet22').show();
  $('#teejet3').show();
  $('#italian1').hide();
  $('#italian11').hide();
  $('#italian2').hide();
  $('#local1').hide();$('#local11').hide();
  $('#local2').hide();  $('#label8').hide(); $('#label9').hide();  $('#label10').hide();  $('#label11').hide(); 
   $('#label12').hide(); $('#label13').hide();   

}
 if (selectedValue=="italian"){
  $('#label1').show();
  $('#label2').show();
  $('#label3').hide();
  $('#label4').hide();
  $('#label5').hide();
  $('#label6').hide();
  $('#label7').hide();
 $('#label8').show(); $('#label9').show();  $('#label10').show(); $('#label11').hide();
  $('#label12').hide();
  $('#label13').hide();
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
   $('#label3').hide();
  $('#label4').hide();
  $('#label5').hide();
  $('#label6').hide();
  $('#label7').hide();
  $('#label8').hide(); $('#label9').hide();  $('#label10').hide(); $('#label11').show();
  $('#label12').show();
  $('#label13').show();
 
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

