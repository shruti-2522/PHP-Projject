<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2 class="w3-container"><font color="black"><b>ACCOUNT GROUP</b></font></b></h2>

<?php
$ses_id=$_SESSION['plot_id'];
  if(isset($_POST["btnadd"]))
{
extract($_POST);
 mysqli_query($db,"insert into tblmejorgrp(grp_name,ses_id)values('$txtgname','$ses_id')");

}

  if(isset($_POST["btnreg"]))
{
  extract($_POST);
 mysqli_query($db,"insert into tblacc_select(curr_asset,curr_lib,direct_exp,indirect_exp,ses_id)values('$txtcasset','$txtclib','$txtdir','$txtind','$ses_id')");
     echo "<script>window.location.href='add_led.php'</script>";
    exit;
}

  $q1=mysqli_query($db,"select * from tblmejorgrp where ses_id=0 or  ses_id=".$ses_id); 
  while ($r=mysqli_fetch_array($q1)) 

{
    if($r['grp_name']=="Current Assets")
    {
?>

  <form method="post">

<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-3"></div>
 <div class="col-sm-6">

   <div class="col-sm-12">
            <div class="row">
             <div class="col-sm-6 form-group">
                <label><font color="black"><b>Current Assets:</b></font></label>
             
              
                <select name="txtcasset" id="Assets" class="form-control" onchange="myfunc(this.value);">
         <option value=""><center>CURRENT ASSETS</center></option>
              
                <?php
                   $ses_id-$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct(asset_name) from tblcassets where ses_id=0 or ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtasset){
                ?>
                        <option value="<?php echo $txtasset['asset_name'];?>"><?php echo $txtasset['asset_name'];?></option>
                <?php
                    }
                ?>
               <option value="addnew" style="background-color: lightgreen"><b>Add New Assets</b>  </option> 
            </select>
              </div>
          
 <?php
          }
    if($r['grp_name']=="Current Liabilities")
    {
?>
              <div class="col-sm-6 form-group">
      
        <label><font color="black"><b>Current Liabilities:</b></font></label>
             <select name="txtclib" id="liability" class="form-control" onchange="myfunc(this.value);">
        <option value="">CURRENT LIABILITIES</option>
              
                <?php
                    $q=mysqli_query($db,"select distinct(lib_name) from tblliability where ses_id=0 or  ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtlib){
                ?>
                        <option value="<?php echo $txtlib['lib_name'];?>"><?php echo $txtlib['lib_name'];?></option>
                <?php
                    }
                ?>
                  <option value="addlib" style="background-color: lightgreen">Add New Liabilities</option> 
        </select>
        </div></div>
       <?php
          }
      if($r['grp_name']=="Direct Expense")
    {
?>
      <div class="row">  
        <div class="col-sm-6 form-group">
        <label><font color="black"><b>Direct Expenses:</b></font></label>
                  <select name="txtdir" id="exp" class="form-control" onchange="myfunc(this.value);">
        <option value="">DIRECT EXPENSES</option>
              
                <?php
                    $q=mysqli_query($db,"select distinct(exp_name) from tbldexpense where ses_id=0 or  ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtexp){
                ?>
                        <option value="<?php echo $txtexp['exp_name'];?>"><?php echo $txtexp['exp_name'];?></option>
                <?php
                    }
                ?>
                <option value="addexp" style="background-color: lightgreen">Add New Expenses</option> 
        </select>
  
        </div>
   <?php
          }
          if($r['grp_name']=="Indirect Expense")
        {
?>
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Indirect Expenses:</b></font></label>
              <select name="txtind" id="iexp" class="form-control" onchange="myfunc(this.value);">
        <option value="">INDIRECT EXPENSES</option>
              
                <?php
                    $q=mysqli_query($db,"select distinct(iexp_name) from tbliexpense where ses_id=0 or  ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtiexp){
                ?>
                        <option value="<?php echo $txtiexp['iexp_name'];?>"><?php echo $txtiexp['iexp_name'];?></option>
                <?php
                    }
                ?>
                <option value="addiexp" style="background-color: lightgreen">Add New Expenses</option> 
        </select>    
       </div>
  </div>
  <center>
<?php
      }
      if($r['grp_name']!="Current Assets" && $r['grp_name']!="Current Liabilities" && $r['grp_name']!="Direct Expense" && $r['grp_name']!="Indirect Expense")
      {
       ?> 
          <lable><b><h4><?php  echo($r['grp_name']); ?></h4></b></label><br>
       <?php

      
      }
    
 } 
?>  
        
           <table><tr><td class="w3-border-0"><input type="text" class="form-control" name="txtgname" placeholder="Add New Account Group"></td><td class="w3-border-0"><button type="submit" class="btn btn-success" name="btnadd">Add</button></td></tr>

    
         </table>
         <br><br>
         <button type="Submit" class="btn btn-success"  name="btnreg"><b>ADD</b></button>
         <br><br>
       </div>





</div>
</div>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>

<script>
function myfunc(val){
 
 //var element=document.getElementById('pname');
 if(val=='addnew')
 {
 window.location="add_assets.php";
   //alert("hello");
 }
 if (val=="addlib") {
       window.location="add_lib.php";
 }
 if (val=="addexp") {
       window.location="add_dexpense.php";
 }
 if (val=="addiexp") {
       window.location="add_iexpense.php";
 }
 
 
}
</script>

</div>
</div>
</div>

