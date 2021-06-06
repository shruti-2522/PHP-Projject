<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>
<body>
 
  <table id="myTable" border="1" align="center" class="table" style="width: 120%; margin-left: 40%">
  <tr>
 
   <th><b>Voucher No</b></th>
    <th><b>Account</b></th>
    <th><b>Date</font></b></th>
    <th><b>Voucher Type</b></th>
    
</tr>
<?php
$ses_id=$_SESSION['plot_id'];
$q = strval($_GET['q']);
//echo $q;
if($q=='')
{
  echo "hello";
}
else
if($q=='Contra Entry')
{
 $sql="SELECT * from tblcontra where ses_id='".$ses_id."' order  by date";
 $result = mysqli_query($db,$sql);
 while ($r=mysqli_fetch_array($result)) {

  ?>
  
<tr>

  <Td>

    <a href="contra_voucher.php?id=<?php echo $r['cid'];?>">
     <font color="blue"> <?php echo $r["cno"];?></font>
       
    </Td>
    
     <Td>
      <?php echo $r["account"];?>
    </Td> 
    <Td>
      <?php echo $r["date"];?>
    </Td> 
     <Td>
      <?php echo "Contra  voucher";?>
    </Td> 
  </tr>
 
<?php
}}
else
  if($q=="Purchase")
  {
    $sql="SELECT * from tblpurcahse1 where ses_id='".$ses_id."' order  by date";
    $result = mysqli_query($db,$sql);
    while ($r=mysqli_fetch_array($result)) {
      ?>
  
<tr>
  <Td>
    <a href="purchase_voucher.php?id=<?php echo $r['pid'];?>">
      <font color="blue"> <?php echo $r["purchase_no"];?></font>
    </Td>
    
     <Td>
      <?php echo $r["paccount_name"];?>
    </Td> 
    <Td>
      <?php echo $r["date"];?>
    </Td> 
     <Td>
      <?php echo "Purchase  voucher";?>
    </Td> 
  </tr>
 
<?php
}}

else
  if($q=="Sales")
  {
    $sql="SELECT * from tblsales where ses_id='".$ses_id."' order  by date";
    $result = mysqli_query($db,$sql);
    while ($r=mysqli_fetch_array($result)) {
      ?>
  
<tr>
  <Td>
    <a href="sales_voucher.php?id=<?php echo $r['sid'];?>">
     <font color="blue"><?php echo $r["sales_no"];?></font>
    </Td>
    
     <Td>
      <?php echo $r["paccount_name"];?>
    </Td> 
    <Td>
      <?php echo $r["date"];?>
    </Td> 
     <Td>
      <?php echo "Sales  voucher";?>
    </Td> 
  </tr>
 
<?php
}}

else
  if($q=="Payments")
  {
    $sql="SELECT * from tblpayment where ses_id='".$ses_id."' order  by date";
    $result = mysqli_query($db,$sql);
    while ($r=mysqli_fetch_array($result)) {
      ?>
  
<tr>
  <Td>
<a href="payment_voucher.php?id=<?php echo $r['pid'];?>">
    <font color="blue"><?php echo $r["payment_no"];?></font>
    </Td>
    
     <Td>
      <?php echo $r["account"];?>
    </Td> 
    <Td>
      <?php echo $r["date"];?>
    </Td> 
     <Td>
      <?php echo "Payment  voucher";?>
    </Td> 
  </tr>
 
<?php
}}
else
  if($q=="Journal Entry")
  {
    $sql="SELECT * from tbljournal where ses_id='".$ses_id."' order  by date";
    $result = mysqli_query($db,$sql);
    while ($r=mysqli_fetch_array($result)) {
      ?>
  
<tr>
  <Td>
      <a href="journal_voucher.php?id=<?php echo $r['jid'];?>">
    <font color="blue"><?php echo $r["journal_no"];?></font>
    </Td> 
    </Td>
    
     <Td>
      <?php echo $r['particuler'];?>
    </Td> 
    <Td>
      <?php echo $r["date"];?>
    </Td> 
     <Td>
      <?php echo "Journal voucher";?>
    </Td> 
  </tr>
 
<?php
}}
  
  else
  if($q=="Receipt")
  {
    $sql="SELECT * from tblreceipt where ses_id='".$ses_id."' order  by date";
    $result = mysqli_query($db,$sql);
    while ($r=mysqli_fetch_array($result)) {
      ?>
  
<tr>
  <Td>
    <a href="receipt_voucher.php?id=<?php echo $r['rid'];?>">

      <font color="blue"> <?php echo $r["receipt_no"];?></font>
    </Td>
    
     <Td>
      <?php echo $r["account"];?>
    </Td> 
    <Td>
      <?php echo $r["date"];?>
    </Td> 
     <Td>
      <?php echo "Receipt voucher";?>
    </Td> 
  </tr>
 
<?php
}}

?>
</table>


<br>


