<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
      <?php include('header.php');?>

<body class="sb-nav-fixed">
      <h2 class="w3-container"><font color="black"><b>ALL LEDGERS</b></font></b></h2>
<?php

if(isset($_POST["btnadd"]))
{
  extract($_POST);
 
  if($under=="Bank Accounts")
  {
     mysqli_query($db,"update tblled_bank set holder='$txtholder',acc_no='$txtaccno',branch='$txtbranch',IFSC_CODE='$txtifsc',email='$txtemail' where led_id='".$_GET['id']."' ");    
  }
  
  mysqli_query($db,"update tblledger set name='$txtname',under='$under',perc_calc='$per_calc',mail_name='$txtmname',email='$txtemail',address='$txtaddr',mno='$txtmno' where id=".$_GET['id']);
        echo "<script>window.location.href='editled.php';</script>";
    exit;
 
 }

$q1=mysqli_query($db,"select * from tblledger where id=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
  
  if($r1['under']=="Bank Accounts")
  {

    $cond=$r1['email'];
    $q=mysqli_query($db,"select * from tblled_bank where led_id=".$_GET["id"]);
        while ($r=mysqli_fetch_array($q))
       {  
          
        
?>

  <form method="post">

<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-8">

   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Name</b></font></label>

                 <input type="text"  class="form-control" name="txtname"  value="<?php echo $r1['name'];?>">
                </div>
             
          
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Under:</b></label>
               <select name="under"   id="selectBox" class="form-control" onchange="changeFunc();">
        <option value="<?php echo $r1['under'];?>" selected><?php echo $r1['under'];?></option>
        <?php
                    $q=mysqli_query($db,"select grp_name from tblmejorgrp");
                  
                  
                    foreach ($q as $txtgrp){
                ?>
                        <option value="<?php echo $txtgrp['grp_name'];?>"><?php echo $txtgrp['grp_name'];?></option>
                <?php
                    }
                ?>

              
              
              <?php
                    $q=mysqli_query($db,"select asset_name from tblcassets");
                  
                  
                    foreach ($q as $txtasset){
                ?>
                        <option value="<?php echo $txtasset['asset_name'];?>"><?php echo $txtasset['asset_name'];?></option>
                <?php
                    }
                ?>
                <?php
                    $q=mysqli_query($db,"select lib_name from tblliability");
                  
                  
                    foreach ($q as $txtlib){
                ?>
                        <option value="<?php echo $txtlib['lib_name'];?>"><?php echo $txtlib['lib_name'];?></option>
                <?php
                    }
                ?>
              
                <?php
                    $q=mysqli_query($db,"select exp_name from tbldexpense");
                  
                  
                    foreach ($q as $txtexp){
                ?>
                        <option value="<?php echo $txtexp['exp_name'];?>"><?php echo $txtexp['exp_name'];?></option>
                <?php
                    }
                ?>
                 <?php
                    $q=mysqli_query($db,"select iexp_name from tbliexpense");
                  
                  
                    foreach ($q as $txtiexp){
                ?>
                        <option value="<?php echo $txtiexp['iexp_name'];?>"><?php echo $txtiexp['iexp_name'];?></option>
                <?php
                    }
                ?>
        </select>
              </div>
            </div> 

<div class="row">
      <div class="col-sm-5 form-group">
        <label  id="label1" ><font color="black"><b>Account  Holder:</b></font></label>
         <input  type="text"  class="form-control" value="<?php echo $r['holder'];?>" placeholder="Enter Acount holder name.."  name="txtholder" id="holder">
    
              </div>

            <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label  id="label2"><b><font color="black">Account  Number:</b></font></label>
               <input  type="text" placeholder="Enter Account number" value="<?php echo $r['acc_no'];?>" class="form-control" name="txtaccno"  id="acno" >  
              </div></div>

          <div class="row">
            <div class="col-sm-5 form-group">
                <label  id="label3"><b><font color="black">Branch:</b></font></label>
              <input  type="text" placeholder="enter Branch" value="<?php echo $r['branch'];?>" class="form-control" name="txtbranch"  id="branch" >
              </div>
          <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label  id="label4"><b><font color="black">IFSC:</b></font></label>
               <input  type="text" placeholder="Enter  IFSC  code" value="<?php echo $r['IFSC_CODE'];?>" class="form-control" name="txtifsc"  id="IFSC_CODE" >
              </div>
          </div>
          <div class="row">
            <div class="col-sm-5 form-group">
                <label  id="label5" style="display: none"><b><font color="black">Percentage of caculations:</b></font></label>
              <select name="per_calc" style="display: none;" id="per_calc" class="form-control"  title="Select Percentage calculation">
            <option value="5">5%</option>
            <option value="12">12%</option>
            <option value="18">18%</option>
            <option value="28">28%</option>
              
          </select>
              </div>
            </div> 
          
                    
          

<div class="row">
 <div class="col-sm-4"></div><div class="col-sm-4"><label><font color="black"><b>Mailing Details</b></font></label></div><div class="col-sm-4"></div>
</div>
<div class="row">
   <div class="col-sm-5 form-group">
                <label><font color="black"><b>Name:</b></font></label>
                 <input  type="text" placeholder="Enter Name.." value="<?php echo $r1['mail_name'];?>" class="form-control" name="txtmname" id="txtmname">
               </div>
               <div class="col-sm-1"></div>
                <div class="col-sm-5 form-group">
                <label><font color="black"><b>Email:</b></label>
                 <input  type="text" class="form-control" placeholder="Enter Address.." value="<?php echo $r1['email'];?>" name="txtemail" id="txtemail">
               </div></div>



 <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Address:</b></font></label>
            <input  type="text" class="form-control" value="<?php echo $r1['address'];?>" placeholder="Enter Address.." name="txtaddr" required>  </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label><font color="black"><b>Mobile Number:</b></font></label>
           <input  type="text" placeholder="Enter Name.." class="form-control" value="<?php echo $r1['mno'];?>" name="txtmno" required>
    </div>
  </div>
<?php
}
}
else
if($r1['under']=="Duties and Taxes")
  {
   
?>

</div>

  <form method="post">

<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-8">

   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Name</b></font></label>
                 <input type="text" placeholder="Enter Name.." class="form-control" name="txtname"  value="<?php echo $r1['name'];?>">
                </div>
             
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Under:</b></label>
               <select name="under"   id="selectBox" class="form-control" onchange="changeFunc();">
        <option value="<?php echo $r1['under'];?>" selected><?php echo $r1['under'];?></option>
        <?php
                    $q=mysqli_query($db,"select grp_name from tblmejorgrp");
                  
                  
                    foreach ($q as $txtgrp){
                ?>
                        <option value="<?php echo $txtgrp['grp_name'];?>"><?php echo $txtgrp['grp_name'];?></option>
                <?php
                    }
                ?>

              
              
              <?php
                    $q=mysqli_query($db,"select asset_name from tblcassets");
                  
                  
                    foreach ($q as $txtasset){
                ?>
                        <option value="<?php echo $txtasset['asset_name'];?>"><?php echo $txtasset['asset_name'];?></option>
                <?php
                    }
                ?>
                <?php
                    $q=mysqli_query($db,"select lib_name from tblliability");
                  
                  
                    foreach ($q as $txtlib){
                ?>
                        <option value="<?php echo $txtlib['lib_name'];?>"><?php echo $txtlib['lib_name'];?></option>
                <?php
                    }
                ?>
              
                <?php
                    $q=mysqli_query($db,"select exp_name from tbldexpense");
                  
                  
                    foreach ($q as $txtexp){
                ?>
                        <option value="<?php echo $txtexp['exp_name'];?>"><?php echo $txtexp['exp_name'];?></option>
                <?php
                    }
                ?>
                 <?php
                    $q=mysqli_query($db,"select iexp_name from tbliexpense");
                  
                  
                    foreach ($q as $txtiexp){
                ?>
                        <option value="<?php echo $txtiexp['iexp_name'];?>"><?php echo $txtiexp['iexp_name'];?></option>
                <?php
                    }
                ?>
        </select>
              </div>
            </div> 

<div class="row">
      <div class="col-sm-5 form-group">
        <label  id="label1" style="display: none;" ><font color="black"><b>Account  Holder:</b></font></label>
         <input  type="text"  class="form-control" style="display: none"  placeholder="Enter Acount holder name.."  name="txtholder"  id="holder">
    
              </div>

            <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label  id="label2" style="display: none"><b><font color="black">Account  Number:</b></font></label>
               <input  type="text" placeholder="Enter Account number" style="display: none"  class="form-control" name="txtaccno" id="acno" >  
              </div></div>

          <div class="row">
            <div class="col-sm-5 form-group">
                <label  id="label3" style="display: none"><b><font color="black">Branch:</b></font></label>
              <input  type="text" placeholder="enter Branch" style="display: none"  class="form-control" name="txtbranch"  id="branch" >
              </div>

          <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label  id="label4" style="display: none"><b><font color="black">IFSC:</b></font></label>
               <input  type="text" placeholder="Enter  IFSC  code" style="display: none"  class="form-control" name="txtifsc"  id="IFSC_CODE" >
              </div>
          </div>


          <div class="row">
            <div class="col-sm-5 form-group">
                <label  id="label5"><b><font color="black">Percentage of caculations:</b></font></label>
              <select name="per_calc" id="per_calc" class="form-control"  title="Select Percentage calculation">
            <option value="<?php echo $r1['perc_calc'];?>"><?php echo $r1['perc_calc'];?></option>
            <option value="5">5%</option>
            <option value="12">12%</option>
            <option value="18">18%</option>
            <option value="28">28%</option>
              
          </select>
              </div>
            </div> 
                    
          

<div class="row">
 <div class="col-sm-4"></div><div class="col-sm-4"><label><font color="black"><b>Mailing Details</b></font></label></div><div class="col-sm-4"></div>
</div>
<div class="row">
   <div class="col-sm-5 form-group">
                <label><font color="black"><b>Name:</b></font></label>
                 <input  type="text" placeholder="Enter Name.." value="<?php echo $r1['mail_name'];?>" class="form-control" name="txtmname" id="txtmname">
               </div>
               <div class="col-sm-1"></div>
                <div class="col-sm-5 form-group">
                <label><font color="black"><b>Email:</b></label>
                 <input  type="text" class="form-control" placeholder="Enter Address.." value="<?php echo $r1['email'];?>" name="txtemail" id="txtemail">
               </div></div>



 <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Address:</b></font></label>
            <input  type="text" class="form-control" value="<?php echo $r1['address'];?>" placeholder="Enter Address.." name="txtaddr" required></div>
            <div class="col-sm-1"></div>

            <div class="col-sm-5 form-group">
                <label><font color="black"><b>Mobile Number:</b></font></label>
           <input  type="text" placeholder="Enter Name.." class="form-control" value="<?php echo $r1['mno'];?>" name="txtmno">
    </div>
  </div>
<?php
}
else {
  ?>

  
</div>
<br><br>

  <form method="post">

<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-8">

   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Name</b></font></label>
                 <input type="text" placeholder="Enter Name.." class="form-control" name="txtname"  value="<?php echo $r1['name'];?>" required>
                </div>
             
     
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Under:</b></label>
               <select name="under"   id="selectBox" class="form-control" onchange="changeFunc();">
        <option value="<?php echo $r1['under'];?>"selected><?php echo $r1['under'];?></option>
        <?php
                    $q=mysqli_query($db,"select grp_name from tblmejorgrp");
                    foreach ($q as $txtgrp){
                ?>
                        <option value="<?php echo $txtgrp['grp_name'];?>"><?php echo $txtgrp['grp_name'];?></option>
                <?php
                    }
                ?>              
              <?php
                    $q=mysqli_query($db,"select asset_name from tblcassets");
                    foreach ($q as $txtasset){
                ?>
                        <option value="<?php echo $txtasset['asset_name'];?>"><?php echo $txtasset['asset_name'];?></option>
                <?php
                    }
                ?>
                <?php
                    $q=mysqli_query($db,"select lib_name from tblliability");
                    foreach ($q as $txtlib){
                ?>
                        <option value="<?php echo $txtlib['lib_name'];?>"><?php echo $txtlib['lib_name'];?></option>
                <?php
                    }
                ?>
                <?php
                    $q=mysqli_query($db,"select exp_name from tbldexpense");
                    foreach ($q as $txtexp){
                ?>
                        <option value="<?php echo $txtexp['exp_name'];?>"><?php echo $txtexp['exp_name'];?></option>
                <?php
                    }
                ?>
                 <?php
                    $q=mysqli_query($db,"select iexp_name from tbliexpense");
                    foreach ($q as $txtiexp){
                ?>
                        <option value="<?php echo $txtiexp['iexp_name'];?>"><?php echo $txtiexp['iexp_name'];?></option>
                <?php
                    }
                ?>
        </select>
              </div>
            </div> 

<div class="row">
      <div class="col-sm-5 form-group">
        <label  id="label1" style="display: none;" ><font color="black"><b>Account  Holder:</b></font></label>
         <input  type="text"  class="form-control" style="display: none"  placeholder="Enter Acount holder name.."  name="txtholder" id="holder">
    
              </div>

            <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label  id="label2" style="display: none"><b><font color="black">Account  Number:</b></font></label>
               <input  type="text" placeholder="Enter Account number" style="display: none"  class="form-control" name="txtaccno"  id="acno" >  
              </div></div>

          <div class="row">
            <div class="col-sm-5 form-group">
                <label  id="label3" style="display: none"><b><font color="black">Branch:</b></font></label>
              <input  type="text" placeholder="enter Branch" style="display: none"  class="form-control" name="txtbranch"  id="branch" >
              </div>
          <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label  id="label4" style="display: none"><b><font color="black">IFSC:</b></font></label>
               <input  type="text" placeholder="Enter  IFSC  code" style="display: none"  class="form-control" name="txtifsc"  id="IFSC_CODE" >
              </div>
          </div>


          <div class="row">
            <div class="col-sm-5 form-group">
                <label  id="label5" style="display: none;"><b><font color="black">Percentage of caculations:</b></font></label>
              <select name="per_calc" id="per_calc" style="display: none" class="form-control"  title="Select Percentage calculation">
            <option value="5">5%</option>
            <option value="12">12%</option>
            <option value="18">18%</option>
            <option value="28">28%</option>
              
          </select>
              </div>
            </div> 
                    
<div class="row">
 <div class="col-sm-4"></div><div class="col-sm-4"><label><font color="black"><b>Mailing Details</b></font></label></div><div class="col-sm-4"></div>
</div>
<div class="row">
   <div class="col-sm-5 form-group">
                <label><font color="black"><b>Name:</b></font></label>
                 <input  type="text" placeholder="Enter Name.." value="<?php echo $r1['mail_name'];?>" class="form-control" name="txtmname" id="txtmname">
               </div>
               <div class="col-sm-1"></div>
                <div class="col-sm-5 form-group">
                <label><font color="black"><b>Email:</b></label>
                 <input  type="text" class="form-control" placeholder="Enter Address.." value="<?php echo $r1['email'];?>" name="txtemail" id="txtemail">
               </div></div>



 <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Address:</b></font></label>
            <input  type="text" class="form-control" value="<?php echo $r1['address'];?>" placeholder="Enter Address.." name="txtaddr">  </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label><font color="black"><b>Mobile Number:</b></font></label>
           <input  type="text" placeholder="Enter Name.." class="form-control" value="<?php echo $r1['mno'];?>" name="txtmno">
    </div>
  </div>
  <?php
}
  ?>
   <center>
         <button type="Submit" class="btn btn-success col-sm-2" name="btnadd"><b>UPDATE</b></button>
         </center>
         <br>
       </div>



            

</div>
</div>

<script>
  function changeFunc() {
  

var selectBox = document.getElementById("selectBox");
 var selectedValue = selectBox.options[selectBox.selectedIndex].value;
 if (selectedValue=="Bank Accounts"){
  
  $('#label1').show();
  $('#holder').show();
  $('#label2').show();
  $('#acno').show();
  $('#label3').show();
  $('#branch').show();
  $('#label4').show();
   $('#IFSC_CODE').show();
  $('#per_calc').hide();
  $('#label5').hide();
  
}
else
 if (selectedValue=="Duties and Taxes"){
  
  $('#holder').hide();
  $('#acno').hide();
  $('#branch').hide();
  $('#IFSC_CODE').hide();
  $('#label5').show();
  $('#per_calc').show();
  $('#label1').hide();
  $('#label2').hide();
  $('#label3').hide();
  $('#label4').hide();
}
else
{
 $('#label1').hide();
  $('#holder').hide();
  $('#label2').hide();
  $('#acno').hide();
  $('#label3').hide();
  $('#branch').hide();
  $('#label4').hide();
   $('#IFSC_CODE').hide();
  $('#per_calc').hide();
  $('#label5').hide();
   
}
}      
  
</script>
</div>
</div>
</div>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>

</body>
</html>