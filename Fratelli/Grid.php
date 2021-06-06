<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php include('head.php');?>
  <?php include('config.php');?>

  <title></title>
</head>
<body class="sb-nav-fixed">
    <?php include('header.php');?>
 <div class="row">

        <div class="col-xs-4 from">
          <p class="lead marginbottom"><b>Supplier</b></p>
          <p></p>
          <p></p>
          <p>California, 94103</p>
          <p></p>
          <p></p>
        </div>
        <div style="margin-left:25%"></div>
        <div class="col-xs-4 to">
          <p class="lead marginbottom"><b>To,</b></p>
          <p>425 Market Street</p>
          <p>Suite 2200, San Francisco</p>
          <p>California, 94105</p>
          <p>Phone: 415-676-3600</p>
          <p>Email: john@doe.com</p>

          </div>
 <div style="margin-left:25%"></div>
          <div class="col-xs-4 text-right payment-details">
          <p class="lead marginbottom payment-info">Payment details</p>
          <p>Date: 14 April 2014</p>
          <p>VAT: DK888-777 </p>
          <p>Total Amount: $1019</p>
          <p>Account Name: Flatter</p>
          </div>

      </div>

      
      <div class="row table-row">
      <table class="table"  border="1" style="width%;">
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

</body>
</html>
