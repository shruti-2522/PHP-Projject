<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php include 'head.php';?>
	<?php include 'config.php';?>
</head>
<body class="sb-nav-fixed"> 
<?php include 'header.php';?>
	 <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>

 <?php
$q=mysqli_query($db,"select * from tblmultitem where multi_id=".$_GET['id']);
while ($r1=mysqli_fetch_array($q)) {
  ?>
<table class="table table-bordered">
	<tr >
      <td rowspan="2">
      	  <span class="text-success"><b><?php echo $r['farm_name'];?></b></span><br>
         <?php echo $r['addrs'];?><br>
         <?php echo $r['taluka'];?>   <?php echo $r['district'];?><br>
         <?php echo $r['pin_code'];?><br>
          <i class="fa fa-phone" ></i><?php echo $r['phone_no'];?> <i class="fas fa-envelope"></i>
<?php echo $r['email'];?>


      </td>
         <td>Bill No</td>   
         <td>Date</td>  
         <td>Supplier</td>
   
      <tr>
      <td><?php echo $r1['bill_no'];?><br></td>
      <td><?php echo $r1['date'];?></td>
      <td><?php echo $r1['supplier'];?></td>
</tr>
    <table class="table table-bordered border-dar">
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
         <?php 

      $q1=mysqli_query($db,"select * from tblp1 where multi_id=".$_GET['id']); 
     while ($r2=mysqli_fetch_array($q1)) 
     {

        ?>

         <tr>
          <td>
        1
          </td>
          <td>
             <?php
          echo $r2['item_name'];
        ?>
          </td>
          <td>
            <?php echo $r2['act_qty'];?>
          </td>
          <td>
          <?php echo $r2['act_unit'];?>
   
          </td>
          <td>
            <?php echo $r2['NOF'];?>
          </td>
          <td>
              <?php echo $r2['exp_date'];?>
          </td>
          <td>
           <?php echo $r2['batch_no'];?>
          </td>
          <td>
           <?php echo $r2['CGST'];?>
          </td>
          <td>
             <?php echo $r2['SGST'];?>
          </td>
          <td>
            <?php echo $r2['tot_amount'];?>
          </td>

        </tr>
<?php
}
?>
        
</table>

  </tr>
 
      </table>
      <?php
  }
  ?>
     
<?php
}
?>
</body>
</html>