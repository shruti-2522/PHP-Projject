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
    <th><b>Date</b></th>
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

    <a href="contra_voucher1.php?id=<?php echo $r['cid'];?>">
      <font color="blue"><?php echo $r["cno"];?></font></a>
       
    </Td>
    
     <Td>
      <font color="black"><?php echo $r["account"];?></font>
    </Td> 
    <Td>
      <font color="black"><?php echo $r["date"];?></font>
    </Td> 
     <Td>
      <font color="black"><?php echo "Contra  voucher";?></font>
    </Td> 
  </tr>
 
<?php
}}
else
  if($q=="Purchase")
  {
      $ses_id=$_SESSION['plot_id'];
    $sql="SELECT * from tblpurcahse1  where ses_id='".$ses_id."' order  by date";
    $result = mysqli_query($db,$sql);
    while ($r=mysqli_fetch_array($result)) {
      ?>
  
<tr>
  <Td>
    <a href="purchase_voucher1.php?id=<?php echo $r['pid'];?>">
      <font color="blue"><?php echo $r["purchase_no"];?></font>
    </Td>
    
     <Td>
      <font color="black"><?php echo $r["paccount_name"];?></font>
    </Td> 
    <Td>
      <font color="black"><?php echo $r["date"];?></font>
    </Td> 
     <Td>
      <font color="black"><?php echo "Purchase  voucher";?></font>
    </Td> 
  </tr>
 
<?php
}}

else
  if($q=="Sales")
  {
      $ses_id=$_SESSION['plot_id'];
    $sql="SELECT * from tblsales where ses_id='".$ses_id."' order  by date";
    $result = mysqli_query($db,$sql);
    while ($r=mysqli_fetch_array($result)) {
      ?>
  
<tr>
  <Td>
    <a href="sales_voucher1.php?id=<?php echo $r['sid'];?>">
      <font color="blue"><?php echo $r["sales_no"];?></font>
    </Td>
    
     <Td>
     <font color="black"> <?php echo $r["paccount_name"];?></font>
    </Td> 
    <Td>
      <font color="black"><?php echo $r["date"];?></font>
    </Td> 
     <Td>
      <font color="black"><?php echo "Sales  voucher";?></font>
    </Td> 
  </tr>
 
<?php
}}

else
  if($q=="Payments")
  {
      $ses_id=$_SESSION['plot_id'];
    $sql="SELECT * from tblpayment where ses_id='".$ses_id."' order   by date";
    $result = mysqli_query($db,$sql);
    while ($r=mysqli_fetch_array($result)) {
      ?>
  
<tr>
  <Td>
<a href="payment_voucher1.php?id=<?php echo $r['pid'];?>">
      <font color="blue"><?php echo $r["payment_no"];?></font>
    </Td>
    
     <Td>
      <font color="black"><?php echo $r["account"];?></font>
    </Td> 
    <Td>
      <font color="black"><?php echo $r["date"];?></font>
    </Td> 
     <Td>
      <font color="black"><?php echo "Payment  voucher";?></font>
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
      <a href="journal_voucher1.php?id=<?php echo $r['jid'];?>">
     <font color="blue"> <?php echo $r["journal_no"];?></font>
    </Td>
    
     <Td>
      <font color="black"><?php echo $r["particuler"];?></font>
    </Td> 
    <Td>
      <font color="black"><?php echo $r["date"];?></font>
    </Td> 
     <Td>
      <font color="black"><?php echo "Journal voucher";?></font>
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
    <a href="receipt_voucher1.php?id=<?php echo $r['rid'];?>">

      <font color="blue"><?php echo $r["receipt_no"];?></font>
    </Td>
    
     <Td>
      <font color="black"><?php echo $r["account"];?></font>
    </Td> 
    <Td>
      <font color="black"><?php echo $r["date"];?></font>
    </Td> 
     <Td>
     <font color="black"> <?php echo "Receipt voucher";?></font>
    </Td> 
  </tr>
 
<?php
}}

?>
</table>
</div> </div></div>
</center>
<br>


