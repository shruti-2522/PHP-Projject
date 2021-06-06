<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include ("head.php");?>
<?php include ("config.php");?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


</head>
<body style="background-color:MediumSeaGreen">
  
<?php
if(isset($_POST["btnreg"]))
{
  extract($_POST);
  $status=1;
  
  mysqli_query($db,"insert into tblpolt(farm_name,owner_name,GGN_no,addrs,taluka,district,state,pin_code,nationality,phone_no,fax_no,email,tech_auth,machine_code,reg_no,status)values('$txtfarm','$txtowner','$txtggm','$txtaddrs','$txttaluka','$txtdistrict','$txtstate','$txtpin','$txtnationality','$txtphone','$txtfax','$txtemail','$txtauth','$txtmachine','$txtreg','$status')");
 
   echo "<script>window.location.href='login.php';</script>";
    exit;
 
}
?>
<div class="container" style="width:70%">
  <h3 class="well "><b>FARMER REGISTRATION</b></h3>
  <div class="col-lg-12 well">
  <div class="row">
        <form method="post">
        

            
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Farm Name:</label>
                <input type="text" placeholder="Enter Farm Name " class="form-control" name="txtfarm" required>   
              </div>

              <div class="col-sm-6 form-group">
                <label>Owner Name:</label>
                <input type="text" placeholder="Enter Owner" class="form-control" name="txtowner" required>
              </div>
            </div> 

            <div class="row">
            <div class="form-group col-sm-6">
            <label>GGN Number:</label>
            <input type="text" placeholder="Enter GGN Number.." class="form-control" name="txtggm" required>
          </div> 
            
            <div class="form-group col-sm-6">
              <label>Address:</label>
              <textarea placeholder="Enter Address Here.." rows="3" class="form-control" name="txtaddrs" required></textarea>
            </div>  
          </div>
            <div class="row">
              <div class="col-sm-4 form-group">
                <label>Taluka:</label>
                <input type="text" placeholder="Enter Taluka" class="form-control" name="txttaluka" required>
              </div>  
               <div class="col-sm-4 form-group">
                <label>District:</label>
                <input type="text" placeholder="Enter District" class="form-control" name="txtdistrict" required>
              </div>    
              <div class="col-sm-4 form-group">
                <label>State:</label>
                <input type="text" placeholder="Enter State" class="form-control" name="txtstate" required>
              </div>  
             
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Pin Code:</label>
                <input type="text" placeholder="Enter Pin Code" class="form-control" name="txtpin" required>
              </div>    
              <div class="col-sm-6 form-group">
                <label>Nationality:</label>
                <input type="text" placeholder="Enter Nationality" class="form-control" name="txtnationality" required>
              </div>  
            </div>   
             <div class="row">    
          <div class="form-group col-sm-6">
            <label>Phone Number:</label>
            <input type="text" placeholder="Enter Phone Number Here.." class="form-control" name="txtphone" required>
          </div>  
           <div class="form-group  col-sm-6">
            <label>Fax Number:</label>
            <input type="text" placeholder="Enter Fax Number" class="form-control" name="txtfax" required>
          </div>
          </div>   

          <div class="row">
          <div class="form-group  col-sm-6">
            <label>Email Address:</label>
            <input type="text" placeholder="Enter Email" class="form-control" name="txtemail" required>
          </div>

            <div class="form-group col-sm-6">
            <label>Technical Authorization:</label>
            <input type="text" placeholder="Enter Technical Authorization" class="form-control" name="txtauth" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label>Machine Code Number:</label>
            <input type="text" placeholder="Enter Machine Code Here.." class="form-control" name="txtmachine" required>
          </div>
          <div class="form-group col-sm-6">
            <label>Registration Number:</label>
            <input type="text" placeholder="Enter Registration number Here.." class="form-control" name="txtreg" required>
          </div>
        </div><br>
          <center>
         <button type="Submit" class="btn btn-success" name="btnreg"><b>SUBMIT</b></button>
         </center>
         <br>


          <div align="center">
       <a href="login.php"><b><h4/>Aleady Registered?? LOGIN</h4></b></a>
</div>
        </form> 
        </div>
  </div>
  </div>
</body>
</html>