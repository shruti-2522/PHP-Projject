<!DOCTYPE html>
<html lang="en">
<head>
<?php include('config.php');?>
    <?php include('head.php');?>

  
</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>

    <div class="col-sm-4 form-group"><h1><b>EDIT ITEM</b></h1></div>
      
 <?php
if(isset($_POST["btnsave"]))
{
  extract($_POST);
 

   mysqli_query($db,"update tblitem set item_name='$item_name',item_type='$item_type',ingredient='$txtingred',PHI='$txtphi',MRI='$txtmri',dose='$txtdose',runit='$txtrunit',pest='$txtpest', company='$company' where id=".$_GET["id"]);
  echo "<script>window.location.href='item.php';</script>";
    exit;
}
$q1=mysqli_query($db,"select * from tblitem where id=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
?>

<form method="post">
<div class="container" style="margin-top: 50px">
  <div class="row">
  <div class="col-sm-4 form-group">
        
        <label><b>Item Name:</b></label>
        <input type="text" placeholder="Enter Item Name.." class="form-control" name="item_name"  id="item_name" value="<?php echo $r1['item_name'];?>">
        </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4 form-group">
       <label><b>Item Type:</b></label>
         <select name="item_type" id="item_type" class="form-control">
        <Option value="<?php echo $r1['item_type']?>"><?php echo $r1['item_type']?></option>
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
        <input type="text" placeholder="Enter Ingredient.." class="form-control" id="ingredient" name="txtingred" value="<?php echo $r1['ingredient']; ?>">
      
      </div>
  <div class="col-sm-1"></div>
 <div class="col-sm-4 form-group">
       <label><b>PHI:</b></label>
       <input type="text" placeholder="Enter Pre Harvest Interval.." name="txtphi"  id="phi" class="form-control" value="<?php echo $r1['PHI']; ?>">
      </div>
  </div>
<div class="row">
  <div class="col-sm-4 form-group">
        <label><b>MR:</b></label>
        <input type="text" placeholder="Enter MR ..." name="txtmri" class="form-control" value="<?php echo $r1['MRI']; ?>">
      </div>
    <div class="col-sm-1"></div>
  <div class="col-sm-2 form-group">
       <label><b>Recommended Dose:</b></label>
       <input type="text" placeholder="Enter Recommended Dose.." class="form-control" name="txtdose" value="<?php echo $r1['dose']; ?>">
      </div>
<div class="col-sm-2 form-group">
        
        <label><b>Unit:</b></label>
         <select name="txtrunit" class="form-control" id="unit">
        <Option value="<?php echo $r1['runit']; ?>"selected><?php echo $r1['runit'];?></option>
        <Option value="per litter">per lit</option>
        <Option value="per acre">per acre</option>
        
      </SELECT>
      </div>
     <div class="col-sm-1"></div>
  
  </div>

  <div class="row">
  <div class="col-sm-4 form-group">
       <label><b>For Pest/Disease</b></label>
       <select name="txtpest" id="disease" class="form-control">
        <Option value="<?php echo $r1['pest']; ?>" selected><?php echo $r1['pest'];?></option>
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
     <input type="text" class="form-control" placeholder="Enter Company Name.." name="company" id="company" value="<?php echo $r1['company']; ?>">
     </div>
  <div class="col-sm-1"></div>
  
 
  <div class="col-sm-4 form-group">
        
        <label><b>GST(%):</b></label>
        <select id="GST" name="GST" class="form-control" onchange="calculateAmount(this.value)" required>
                 <option value="<?php echo $r1['GST'];?>"disabled selected><?php echo $r1['GST'];?></option>
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
 <button type="submit" class="btn btn-success col-sm-1" name="btnsave"><b>UPDATE</b></button></div></center>
 <br>
      

<?php include('footer.php');?>
             
    </body>
</html>
