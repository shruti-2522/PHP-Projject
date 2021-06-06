<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
   <?php include 'head.php';?>
   <?php include 'config.php';?>
   <style type="text/css">
     .row > div {
  background: lightgrey;
  border: 1px solid grey;
}
   </style>
</head>
<body class="sb-nav-fixed">
  <?php include 'header.php';?>


   <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>

<div class="container">
  <h1>Grid Example</h1>
  <div class="container">     
    <div class="row">
      <div class="col-sm-4" >
         <h4 class="text-success"><?php echo $r['farm_name'];?></h4>
         <?php echo $r['addrs'];?><br>
         <?php echo $r['taluka'];?>   <?php echo $r['district'];?><br>
         <?php echo $r['pin_code'];?><br>
          <i class="fa fa-phone" ></i><?php echo $r['phone_no'];?> <i class="fas fa-envelope"></i>
<?php echo $r['email'];?>


      
      </div>


      <div class="col-sm-6" >
        <table style="width: 100%;" class="mt-2">
          <tr>
            <td>
            Bill No
          </td>
          <td>
            Date
          </td>
          <td>
            Supplier
          </td>

          </tr>

           <tr>
            <td>
            Bill No
          </td>
          <td>
            Date
          </td>
          <td>
            Supplier
          </td>

          </tr>

        </table>

      
      </div>

      <div class="col-sm-10">
      <table class="table" border="1">
        <tr>
          <td>
            Sr.No
          </td>
          <td>
            Item Name
          </td>
          <td>
            pkg.qty
          </td>
          <td>
            unit
          </td>
          <td>
            NOS
          </td>
          <td>
            Expiry Date
          </td>
          <td>
            Batch No
          </td>
          <td>
            CGST
          </td>
          <td>
            SGST
          </td>
          <td>
            Total
          </td>

        </tr>
        
        <tr>
          <td>
            Sr.No
          </td>
          <td>
            Item Name
          </td>
          <td>
            pkg.qty
          </td>
          <td>
            unit
          </td>
          <td>
            NOS
          </td>
          <td>
            Expiry Date
          </td>
          <td>
            Batch No
          </td>
          <td>
            CGST
          </td>
          <td>
            SGST
          </td>
          <td>
            Total
          </td>

        </tr>
        



      </table> 


      </div>
    </div>

  </div>

</div>

<?php 
}
?>
    
</body>
</html>
