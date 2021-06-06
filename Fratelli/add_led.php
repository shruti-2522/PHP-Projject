<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2><font color="black"><b>ADD LEDGER</b></font></b></h2>
<?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);

   $ses_id=$_SESSION['plot_id'];


     $q=mysqli_query($db,"select max(id) as mid from tblledger"); 
    $r=mysqli_fetch_array($q);
    $id=1;
    $id=$id+$r['mid'];

  if($under=="Bank Accounts")
  {
     mysqli_query($db,"insert into tblled_bank(holder,acc_no,branch,IFSC_CODE,email,ses_id,led_id)values('$txtholder','$txtaccno','$txtbranch','$txtifsc','$txtemail','$ses_id','$id')");
     echo "<script>alert('Ledger Add Successfully');</script>";
  }
  
   mysqli_query($db,"insert into tblledger(name,under,perc_calc,mail_name,email,address,mno,ses_id)values('$txtname','$under','$per_calc','$txtmname','$txtemail','$txtaddr','$txtmno','$ses_id')");

       // echo "<script>alert('Your ledger saved successfully')</script>";
  //       echo "<script>window.location.href='view_led.php';</script>";
  // exit;
  echo "<script>alert('Ledger Add Successfully');</script>";
}
?>


   <form method="post">

<div class="container">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-8">

   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Name</b></font></label>
                 <input type="text" placeholder="Enter Name.." class="form-control" name="txtname" required>
                </div>
          
           
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Under:</b></label>
               <select name="under"   id="selectBox" class="form-control" onchange="changeFunc();">
        <option value="">Select Account Groups.</option>
        <?php
          $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct(grp_name) from tblmejorgrp where ses_id=0 or ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtgrp){
                ?>
                        <option value="<?php echo $txtgrp['grp_name'];?>"><?php echo $txtgrp['grp_name'];?></option>
                <?php
                    }
                ?>  
               <?php
                    $q=mysqli_query($db,"select distinct(asset_name) from tblcassets where ses_id=0 or ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtasset){
                ?>
                        <option value="<?php echo $txtasset['asset_name'];?>"><?php echo $txtasset['asset_name'];?></option>
                <?php
                    }
                ?>
                <?php
                    $q=mysqli_query($db,"select distinct(lib_name) from tblliability  where ses_id=0 or ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtlib){
                ?>
                        <option value="<?php echo $txtlib['lib_name'];?>"><?php echo $txtlib['lib_name'];?></option>
                <?php
                    }
                ?>
              
                <?php
                    $q=mysqli_query($db,"select distinct(exp_name) from tbldexpense  where ses_id=0  or ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtexp){
                ?>
                        <option value="<?php echo $txtexp['exp_name'];?>"><?php echo $txtexp['exp_name'];?></option>
                <?php
                    }
                ?>
                 <?php
                    $q=mysqli_query($db,"select distinct(iexp_name) from tbliexpense  where ses_id=0  or ses_id=".$ses_id);
                  
                  
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
        <label style="display: none;" id="label1" ><font color="black"><b>Account  Holder:</b></font></label>
         <input  type="text"  class="form-control" placeholder="Enter Acount holder name.." style="display: none;" name="txtholder" id="holder">
    
              </div>

            <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label style="display: none;" id="label2"><b><font color="black">Account  Number:</b></font></label>
               <input  type="text" placeholder="Enter Account number" class="form-control" name="txtaccno" style="display: none;" id="acno" >  
              </div></div>
          <div class="row">

            <div class="col-sm-5 form-group">
                <label style="display: none;" id="label3"><b><font color="black">Branch:</b></font></label>
              <input  type="text" placeholder="enter Branch" class="form-control" name="txtbranch" style="display: none;" id="branch" >
              </div>
          <div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label style="display: none;" id="label4"><b><font color="black">IFSC:</b></font></label>
               <input  type="text" placeholder="Enter  IFSC  code" class="form-control" name="txtifsc" style="display: none;" id="IFSC_CODE" >
              </div>
          </div>
          <div class="row">

            <div class="col-sm-5 form-group">
                <label style="display: none;" id="label5"><b><font color="black">Percentage of caculations:</b></font></label>
              <select name="per_calc" id="per_calc" class="form-control" style="display: none;" title="Select Percentage calculation">
            <option value="text">Select Percentage of caculations</option>
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
                 <input  type="text" placeholder="Enter Name.." class="form-control" name="txtmname" id="txtmname" required>
               </div>
               <div class="col-sm-1"></div>
                <div class="col-sm-5 form-group">
                <label><font color="black"><b>Email:</b></label>
                 <input  type="text" class="form-control" placeholder="Enter Email.." name="txtemail" id="txtemail" required>
               </div></div>



 <div class="row">
              <div class="col-sm-5 form-group">
                <label><font color="black"><b>Address:</b></font></label>
            <input  type="text" class="form-control" placeholder="Enter Address.." name="txtaddr" required>  </div>
<div class="col-sm-1"></div>
            <div class="col-sm-5 form-group">
                <label><font color="black"><b>Mobile Number:</b></font></label>
           <input  type="text" placeholder="Enter Mobile Number.." class="form-control" name="txtmno" required>
    </div>
  </div>

<br>
   <center>
         <button type="Submit" class="btn btn-success col-sm-3" name="btnadd"><b>ADD</b></button>
         </center>
         <br>
       </div>



            

</div>
</div>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>

<script>
  function changeFunc() {
  //alert("hello");

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
 else if (selectedValue=="Duties and Taxes"){
  
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


</body>
</html>