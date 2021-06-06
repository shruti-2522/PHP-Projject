<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
    
<?php include('header.php');?>


  <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q)) {
  ?>


    <div style="margin-left: 17%;margin-bottom:1px;" class="text-success">
      <?php echo $r1['farm_name'];?>
    </div>
       <div style="margin-left: 18%;" class="mt-0">
     <?php echo $r1['addrs'];?>
    </div>
    <div style="margin-left: 17%;" class="mt-0">
     <?php echo $r1['taluka'];?>  <?php echo $r1['district'];?>
    </div>
     <div style="margin-left: 18%;" class="mt-0">
     <?php echo $r1['pin_code'];?>  
    </div>
     <div style="margin-left: 11%;" class="mt-0">
     <i class="fas fa-phone"></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i> <?php echo $r1['email'];?>
    </div>

   
  </div>
    

   <?php
}
?>



  <?php
$q=mysqli_query($db,"select * from tblitem where id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>
  <br><br>
<table class="table border " border="1px"   style="width:42%;margin-left: 4%;" >
   <tr>
    <td style="border: 1px solid black;">
      Item Name:
    </td>
   <td style="border: 1px solid black;">
      <?php echo $r["item_name"];?>
    </td>
  </tr>
    <tr>
  <td style="border: 1px solid black;">Item Type:</td>
     <td style="border: 1px solid black;">
     <?php echo $r["item_type"];?>
    </td>
  </tr>
    <tr>
  <td style="border: 1px solid black;">Ingredient:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["ingredient"];?>
    </td>
  </tr>
  
  


   <tr>
   <td style="border: 1px solid black;">PHI:</td>
     <td style="border: 1px solid black;"> 
      <?php echo $r["PHI"];?>
    </td>
  </tr>

  <tr>
   <td style="border: 1px solid black;">MR:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["MRI"];?>
    </td>
  </tr>
    <tr>
    <td style="border: 1px solid black;">Dose:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["dose"];?> <?php echo $r["runit"];?>
    </td>
  </tr>

  
<tr>
    <td style="border: 1px solid black;">Pest:</td></font>
     <td style="border: 1px solid black;">
      <?php echo $r["pest"];?>
    </td>
  </tr>


  <tr>
   <td style="border: 1px solid black;">Company:</td>
     <td style="border: 1px solid black;">
      <?php echo $r["company"];?>
    </td>
  </tr>
   <tr>
   <td style="border: 1px solid black;">GST(%):</td>
     <td style="border: 1px solid black;">
      <?php echo $r["GST"];?>
    </td>
  </tr>
  </table>
<br>

<div style="margin-left:20%;">

<button class="btn btn-success"  onclick="window.location.href='item.php'"><b>BACK</b></button></td>

 <button class="btn btn-success"  onclick="window.location.href='item_report1.php?id=<?php echo $r['id'];?>'"><b>PRINT</b></button>    

 
</div>
 


  <?php
}?>

<br><br>
<?php include('footer.php');?>
             
    </body>
</html>
