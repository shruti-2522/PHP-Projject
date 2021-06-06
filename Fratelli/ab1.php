<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$ses_id=$_SESSION['plot_id'];
$p=$_SESSION['lname'];
$dsum=0;
$csum=0;
$j=1;
?>
 <table id="myTable" border="1" align="center" class="table" style="width:80%; margin-left:15%">
    
  <tr>
   <th><font color="Black">Sr No.</font></th>
    <th><font color="Black">Date</font></th>
    <th><font color="Black">Particular</font></th>
    <th><font color="Black">Type Of Voucher</font></th>
    <th><font color="Black">Voucher No.</font></th>
    <th><font color="Black">Debited</font></th>
    <th><font color="Black">Credited</font></th>
    
</tr>
<?php
$q1=mysqli_query($db,"select * from tblmultitem where supplier='".$p."' and payment_mode='cash' and ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) 
       {
        
      ?>
    <tr>
      <td>
         <?php   
                echo $j;
                $j++;
        ?>  
      </td>
       <Td>
          <?php echo $r1['date']; ?> 
    </Td>
   
      <Td>
        
     <?php echo $r1['payment_mode'];?>
    </Td>
      <Td>
          <?php echo 'Item Purchase'; ?> 
    </Td>
     <Td>
          <?php echo $r1['bill_no']; ?> 
    </Td>
    <td>
    </td>
    <Td>
          <?php 

      $q2=mysqli_query($db,"select * from tblp1 where multi_id='".$r1['multi_id']."' and ses_id='".$ses_id."'");
      $sum=0;
       while ($r2=mysqli_fetch_array($q2)) 
       {
          $sum=$sum+$r2['tot_amount'];
       }

          echo $sum;
          $csum=$csum+$sum ?> 
    </Td>
    </tr>
<?php
}
?>
</table>

<div align="center" style="margin-left: 40%">
<div class="row">

      <div class="col-sm-10 form-group" style="margin-left: 90%"></div>
        <center><label><font color="black"><b>Total Diff Cr.: </b></font></label></center>
        <div class="col-sm-0 form-group">
         <font color="black"><?php 
      echo round($csum,2);
   ?> </font></div>
</div></div>
</table>
</body>
</html>