<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}

@media print {
    html, body {
        height: 99%;    
    }
}


</style>
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
 
<table style="width:70%">
  
  <tr>
     <td colspan="4">
     <p>Supplier:</p>

       <p class="text-center"><?php echo $r1['supplier'];?></p>
     
</td>
    <td colspan="0">
       <span><b>To,</b><br>
         <?php echo $r['farm_name'];?></span><br>
         <?php echo $r['owner_name'];?><br>
          <i class="fa fa-phone" ></i><?php echo $r['phone_no'];?> <i class="fas fa-envelope"></i>
<?php echo $r['email'];?>
</td>
    <td colspan="2">
     <p>Bill No: <?php echo $r1['bill_no'];?></p>
     <p>Date:<?php echo $r1['date'];?></p>
    </p>
    </td>
    
   
</tr>
  <tr>
   
  
    
  </tr>
 
</table>
<table  style="width:70%;">
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
     $i=1;
      $q1=mysqli_query($db,"select * from tblp1 where multi_id=".$_GET['id']); 
     while ($r2=mysqli_fetch_array($q1)) 
     {
     
        ?>

         <tr>
          <td>
        <?php echo $i;
                $i++;
              ?>
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

<br><br>

<div style="margin-left:30%;">

<button class="btn btn-success"  onclick="window.location.href='purchase.php'"><b>BACK</b></button>

 <button class="btn btn-success"  onclick="window.location.href='purchase_bill.php?id=<?php echo $r1['multi_id'];?>'"><b>PRINT</b></button>    
</div>
<?php
}
?>
 





<?php
} 
?>

<?php include('footer.php');?>
</body>
</html>
