<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
    <?php include('head.php');?>

  
</head>
<body class="sb-nav-fixed">
    
        <?php include('header.php');?>

    <div class="col-sm-4 form-group"><h1><b>ADD ITEM</b></h1></div>
      
<?php
if(isset($_POST["btnadd"]))
{
  extract($_POST);

  
   $ses_id=$_SESSION['plot_id'];


   mysqli_query($db,"insert into tblitem(item_name,item_type,ingredient,PHI,MRI,dose,runit,pest,company,GST,ses_id)values('$item_name','$item_type','$txtingred','$txtphi','$txtmri','$txtdose','$txtrunit','$txtpest','$company','$GST','$ses_id')");
 echo "<script>window.location.href='item.php';</script>";
   exit;
 
 echo "<script>window.location.href='item.php';</script>";
   exit;
}
 
?>

<form method="post" id="myform">
<div class="container" style="margin-top: 50px">
  <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Item Name:</b></label>
        <input type="text" placeholder="Enter Item Name.." class="form-control" name="item_name"  id="item_name" required>
       
      </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Item Type:</b></label>
         <select name="item_type" id="item_type" class="form-control">
        <Option value="text">Select Item</option>
        <Option value="Pesticide">pesticide</option>
        <Option value="Insecticide">insecticide</option>
        <Option value="Fungicide">fungicide</option>
        <Option value="Fertilizer">fertilizer</option>
        <Option value="Growth Regulator">growth regulator</option>
        <Option value="Assets">assets</option>
      </SELECT>
      </div>
    
  </div>

  <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Ingredient:</b></label>
        <input type="text" placeholder="Enter Ingredient.." class="form-control" id="ingredient" name="txtingred" required>
      
      </div>
  <div class="col-sm-1"></div> 
  <div class="col-sm-4 form-group">
       <label><b>PHI:</b></label>
       <input type="text" placeholder="Enter Pre Harvest Interval.." name="txtphi"  id="phi" class="form-control">
      </div>

    </div>

    <div class="row">
    
  <div class="col-sm-4 form-group">
        <label><b>MR:</b></label>
        <input type="text" placeholder="Enter MR ..." name="txtmri" class="form-control">
      </div>
   <div class="col-sm-1"></div>
  <div class="col-sm-2 form-group">
       <label><b>Recommended Dose:</b></label>
       <input type="text" placeholder="Enter Dose" class="form-control" name="txtdose">
      </div>
   
  <div class="col-sm-2 form-group">
        
        <label><b>Unit:</b></label>
         <select name="txtrunit" class="form-control" id="unit">
        <Option value="text">Select Unit</option>
        <Option value="per litter">per lit</option>
        <Option value="per acre">per acre</option>
        
      </SELECT>
      </div>
    </div>

    <div class="row">
  
  <div class="col-sm-4 form-group">
       <label><b>For Pest/Disease</b></label>
       <select name="txtpest" id="disease" class="form-control">
        <Option value="text">Select Pest/Disease</option>
        <Option value="Downy mildwe">Downy mildew</option>
        <Option value="Powdery mildew">Powdery mildew</option>
          <Option value="Thrips">Thrips</option>
        <Option value="Milibug">Milibug</option>
          <Option value="Jeside">Jeside</option>
        <Option value="Steam borer">Steam borer</option>
          <Option value="Red Mites">Red Mites</option>
          <Option value="Early bite">Early bite</option>
        <Option value="Late bite">Late bite</option>        
      </SELECT>
      </div>
    
    <div class="col-sm-1"></div>
    <div class="col-sm-4 form-group">
      <label><b>Company Name:</b></label>
     <input type="text" class="form-control" placeholder="Enter Company Name.." name="company" id="company">
     </div>
    </div>

 
 <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>GST(%):</b></label>
        <select id="GST" name="GST" class="form-control" onchange="calculateAmount(this.value)" required>
                 <option value="" disabled selected>Choose your option</option>
                  <option value="5">5%</option>
                   <option value="12">12%</option>
                    <option value="18">18%</Coption>
                    <option value="20">20%</option>
                 
            </select>
       
      </div>
</div>
 
<br>
 <center>
<div class="row">
      <div class="col-sm-4"></div>
 <button type="submit" class="btn btn-success col-sm-1" name="btnadd"><b>ADD</b></button></div></center></form>

      
<?php include('footer.php');?>
<script src="js/reload.js"></script>


             
    </body>
</html>
