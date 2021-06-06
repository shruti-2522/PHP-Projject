<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include ("head.php");?>
<?php include ("config.php");?>

<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body style="background-color:MediumSeaGreen">
  
<?php
if(isset($_POST["btnreg"]))
{
  extract($_POST);
  
  mysqli_query($db,"insert into tblpolt(farm_name,owner_name,GGN_no,addrs,taluka,district,state,pin_code,nationality,phone_no,fax_no,email,tech_auth,machine_code,reg_no)values('$txtfarm','$txtowner','$txtggm','$txtaddrs','$txttaluka','$txtdistrict','$txtstate','$txtpin','$txtnationality','$txtphone','$txtfax','$txtemail','$txtauth','$txtmachine','$txtreg')");
 
   echo "<script>window.location.href='login.php';</script>";
    exit;
 
}
?>
<div class="container" style="width:60%">
  <h1 class="well"><b>शेतकरी नोंदणी</b></h1>
  <div class="col-lg-12 well">
  <div class="row">
        <form method="post">
          <div class="col-sm-12">
            <div class="row">

              <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>फार्म नाव:</label>
                <input type="text" placeholder="फार्म नाव प्रविष्ट करा " class="form-control" name="txtfarm" required>   
              </div>
              <div class="col-sm-6 form-group">
                <label>मालकाचे नाव:</label>
                <input type="text" placeholder="मालक प्रविष्ट करा" class="form-control" name="txtowner" required>
              </div>
            </div> 

            <div class="row">
            <div class="form-group col-sm-6">
            <label>GGN क्रमांक:</label>
            <input type="text" placeholder="GGN क्रमांक प्रविष्ट करा.." class="form-control" name="txtggm" required>
          </div> 
            
            <div class="form-group col-sm-6">
              <label>पत्ता:</label>
              <textarea placeholder="येथे पत्ता प्रविष्ट करा.." rows="3" class="form-control" name="txtaddrs" required></textarea>
            </div>  
          </div>
            <div class="row">
              <div class="col-sm-4 form-group">
                <label>तालुका:</label>
                <input type="text" placeholder="तालुका प्रविष्ट करा" class="form-control" name="txttaluka" required>
              </div>  
               <div class="col-sm-4 form-group">
                <label>जिल्हा:</label>
                <input type="text" placeholder="जिल्हा प्रविष्ट करा" class="form-control" name="txtdistrict" required>
              </div>    
              <div class="col-sm-4 form-group">
                <label>राज्यः:</label>
                <input type="text" placeholder="राज्य प्रविष्ट करा" class="form-control" name="txtstate" required>
              </div>  
             
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>पिन कोड:</label>
                <input type="text" placeholder="पिन कोड प्रविष्ट करा" class="form-control" name="txtpin" required>
              </div>    
              <div class="col-sm-6 form-group">
                <label>राष्ट्रीयत्व:</label>
                <input type="text" placeholder=" राष्ट्रीयत्व प्रविष्ट करा" class="form-control" name="txtnationality" required>
              </div>  
            </div>   
             <div class="row">    
          <div class="form-group col-sm-6">
            <label>फोन नंबर:</label>
            <input type="text" placeholder="येथे फोन नंबर प्रविष्ट करा.." class="form-control" name="txtphone" required>
          </div>  
           <div class="form-group  col-sm-6">
            <label>फॅक्स क्रमांक:</label>
            <input type="text" placeholder="फॅक्स क्रमांक प्रविष्ट करा" class="form-control" name="txtfax" required>
          </div>
          </div>   

          <div class="row">
          <div class="form-group  col-sm-6">
            <label>ईमेल पत्ता:</label>
            <input type="text" placeholder="ईमेल प्रविष्ट करा" class="form-control" name="txtemail" required>
          </div>

            <div class="form-group col-sm-6">
            <label>तांत्रिक अधिकृतता:</label>
            <input type="text" placeholder="तंत्रिका अधिकारी  प्रविष्ट करा" class="form-control" name="txtauth" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label>मशीन कोड क्रमांक:</label>
            <input type="text" placeholder="येथे मशीन कोड प्रविष्ट करा.." class="form-control" name="txtmachine" required>
          </div>
          <div class="form-group col-sm-6">
            <label>नोंदणी क्रमांक:</label>
            <input type="text" placeholder="येथे नोंद क्रमांक प्रविष्ट करा.." class="form-control" name="txtreg" required>
          </div>
        </div><br>
          <center>
         <button type="Submit" class="w3-btn w3-green" name="btnreg"><b>सादर करणे</b></button>
         </center>
         <br>


          <div align="center">
       <a href="mlogin.php"><b><h4/>अलेडी नोंदणीकृत ?? लॉगिन</h4></b></a>
</div>
        </form> 
        </div>
  </div>
  </div>
</body>
</html>