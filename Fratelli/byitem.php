<!DOCTYPE html>
<html>
<head>
  <?php include('head.php');?>
<?php include ("config.php");?>
 
</head>
<body class="sb-nav-fixed">
  <br><br>
  
<?php
$ses_id=$_SESSION['plot_id'];
$q = $_GET['q'];
$arr=explode(" ", $q);
$p=$arr[1];

if($arr[0]=='other')
{

$dsum=0;
$csum=0;
$j=1;
?>
<table id="myTable" border="1" align="center" class="table" style="width:80%; margin-left:-1%">
  <tr>
   <td><b>Sr No.</b></td>
    <td><b>Date</b></td>
    <td><b>Particular</b></td>
    <td><b>Type Of Voucher</b></td>
   <td><b>Voucher No.</b></td>
    <td><b>Debited</b></td>
    <td><b>Credited</b></td>
    
</tr>
<?php
//CONTRA VOUCHER
  $q1=mysqli_query($db,"select * from tblcontra where ses_id='".$ses_id."'");
    $j=1;
       while ($r1=mysqli_fetch_array($q1)) {
        if(trim($r1['account'])==trim($p))
        {
          $x=explode(',',$r1['particuler']);
           $y=explode(',',$r1['amount']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
                    
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
         <a href="conled_rep.php?str=<?php echo $x[$i];?>&q=<?php echo $p;?>&str2=<?php echo $r1['cid'];?>">
      <font color="blue"><?php echo $x[$i];?></font></a>
    </Td>
      <Td>
          <?php echo 'Contra Entry'; ?> 
    </Td>
     <Td>
          <?php echo $r1['cno']; ?> 
    </Td>
   
    <Td>
          <?php echo $y[$i]; 
                $dsum=$dsum+$y[$i];
          ?> 
    </Td>
     <td>
       
     </td>
    </tr>
<?php
}
}
}


//account main contra
  $q1=mysqli_query($db,"select * from tblcontra where ses_id='".$ses_id."'");
    $j=1;
       while ($r1=mysqli_fetch_array($q1))
      {
          $x=explode(',',$r1['particuler']);
          $y=explode(',',$r1['amount']);
          for ($i=0; $i <sizeof($x) ; $i++)
         { 
            if(trim($x[$i])==trim($p))
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
       <a href="conled_rep3.php?q=<?php echo $r1['account'];?>&str=<?php echo $x[$i];?>&str1=<?php echo $r1['cid'];?>">
      <font color="blue"><?php echo $r1['account'];?></font></a>
    </Td>
      <Td>
          <?php echo 'Contra Entry'; ?> 
    </Td>
     <Td>
          <?php echo $r1['cno']; ?> 
    </Td>

      <td>
      

    </td>
   
    <Td>
          <?php echo $y[$i]; 
                $csum=$csum+$y[$i];
          ?> 
    </Td>
   
    </tr>
<?php
}
}
}



//main sale
 $q1=mysqli_query($db,"select * from tblsales where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
        if(trim($r1['paccount_name'])==trim($p))
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
         <a href="saleled_rep.php?str=<?php echo $r1['paccount_name'];?>&str1=<?php echo $r1['sid'];?>">
      <font color="blue"><?php echo $r1['paccount_name'];?></font></a> 
      </Td>
      <Td>
          <?php echo 'Sales'; ?> 
      </Td>
      <Td>
          <?php echo $r1['sales_no']; ?> 
      </Td>
    
       <td></td>
      <Td>
          <?php echo $r1['total'];
                 $csum=$csum+$r1['total']; 
           ?> 
      </Td>
      </tr>
<?php
}
} 
//PURCHASE VOUCHER credit
 $q1=mysqli_query($db,"select * from tblpurcahse1  where paccount_name='".$p."' and payment_mode='credit' and ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
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
         <a href="purled_rep.php?str=<?php echo $r1['paccount_name'];?>&str1=<?php echo $r1['pid'];?>">
      <font color="blue"><?php echo $r1['paccount_name'];?></font></a>
         
    </Td>
      <Td>
          <?php echo 'Purchase'; ?> 
    </Td>
     <Td>
          <?php echo $r1['purchase_no']; ?> 
    </Td>
      <td>
      
    </td>
    <Td>
          <?php echo $r1['amount1'];
                $csum=$csum+$r1['amount1'];
             ?> 
    </Td>
  
    </tr>
<?php
}
//cash purchase voucher
if(strcasecmp($p,'cash')==0)
{
$q1=mysqli_query($db,"select * from tblpurcahse1 where payment_mode='cash' and  ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
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
         <a href="purled_rep.php?str=<?php echo $r1['pid'];?>&str1=<?php echo $r1['pid'];?>">
      <font color="blue"><?php echo $r1['paccount_name'];?></font></a>
         
    </Td>
      <Td>
          <?php echo 'Purchase'; ?> 
    </Td>
     <Td>
          <?php echo $r1['purchase_no']; ?> 
    </Td>
    <Td>
          <?php echo $r1['amount1'];
                $dsum=$dsum+$r1['amount1'];
             ?> 
    </Td>
    <td></td>
    </tr>
<?php
}   
}


//PAYMENT VOUCHER
  $q1=mysqli_query($db,"select * from tblpayment where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
        if(trim($r1['account'])==trim($p))
        {
          $x=explode(',',$r1['particuler']);
           $y=explode(',',$r1['amount']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
                    
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
         <a href="payled_rep.php?str=<?php echo $x[$i];?>&q=<?php echo $q;?>&str2=<?php echo $r1['pid'];?>">
      <font color="blue"><?php echo $x[$i];?></font></a>
  
    </Td>
      <Td>
          <?php echo 'Payment'; ?> 
    </Td>
     <Td>
          <?php echo $r1['payment_no']; ?> 
    </Td>
    <Td>
          <?php echo $y[$i];
                $dsum=$dsum+$y[$i];
           ?> 
    </Td>
    <td></td>
    </tr>
<?php
}
}
}
//main payment
/*$q1=mysqli_query($db,"select * from tblpayment where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
          $x=explode(',',$r1['particuler']);
           $y=explode(',',$r1['amount']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
       if(trim($x[$i])==trim($p))
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
       
         <a href="payled_rep1.php?str=<?php echo $x[$i];?>&str2=<?php echo $r1['pid'];?>">
      <font color="blue"><?php echo $x[$i];?></font></a>
    </Td>
   
      <Td>
          <?php echo 'Payment1'; ?> 
    </Td>
     <Td>
          <?php echo $r1['payment_no']; ?> 
    </Td>
    
    <td>
        <?php echo $y[$i];
               $dsum=$dsum+$y[$i];
         ?> 
    </td>
    <Td>
    </Td>
    </tr>
<?php
}
}
}
*///commnment


//Account main payment
$q1=mysqli_query($db,"select * from tblpayment where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
          $x=explode(',',$r1['particuler']);
           $y=explode(',',$r1['amount']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
       if(trim($x[$i])==trim($p))
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
        <a href="payled_rep3.php?q=<?php echo $r1['account'];?>&str=<?php echo $p;?>&str1=<?php echo $r1['pid'];?>">
      <font color="blue"><?php echo $r1['account'];?></font></a>
    </Td>
      <Td>
          <?php echo 'Payment'; ?> 
    </Td>
     <Td>
          <?php echo $r1['payment_no']; ?> 
    </Td>
    
    <td>
        <?php echo $y[$i];
               $dsum=$dsum+$y[$i];
         ?> 
    </td>
    <Td>
    </Td>
    </tr>
<?php
}
}
}
//RECIEPT VOUCHER
  $q1=mysqli_query($db,"select * from tblreceipt where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
        if(trim($r1['account'])==trim($p))
        {
          $x=explode(',',$r1['particuler']);
           $y=explode(',',$r1['amount']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
                    
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
         <a href="reciled_rep.php?str=<?php echo $x[$i];?>&q=<?php echo $p;?>&str2=<?php echo $r1['rid'];?>">
      <font color="blue"><?php echo $x[$i];?></font></a>
    </Td>
     <Td>
          <?php echo 'Receipt'; ?> 
    </Td>
     <Td>
          <?php echo $r1['receipt_no']; ?> 
    </Td>
        <td>
          

        </td>

    <Td>
          <?php echo $y[$i];
                 $csum=$csum+$y[$i];
           ?> 
    </Td>
    </tr>
<?php
}
}
}
/*//main reciept
$q1=mysqli_query($db,"select * from tblreceipt where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
          $x=explode(',',$r1['particuler']);
           $y=explode(',',$r1['amount']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
       if(trim($x[$i])==trim($p))
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
     <a href="reciled_rep1.php?str=<?php echo $x[$i];?>&str2=<?php echo $r1['rid'];?>">
      <font color="blue"><?php echo $x[$i];?></font></a>
    </Td>

      <Td>
          <?php echo 'Receipt1'; ?> 
    </Td>
     <Td>
          <?php echo $r1['receipt_no']; ?> 
    </Td>
    
    <Td>
          <?php echo $y[$i];
                 $dsum=$dsum+$y[$i];
           ?> 
    </Td>
        <td></td>

    </tr>
<?php
}
}
}*///Today's Comment

//account main receipt

$q1=mysqli_query($db,"select * from tblreceipt where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
          $x=explode(',',$r1['particuler']);
           $y=explode(',',$r1['amount']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
       if(trim($x[$i])==trim($p))
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
      <a href="reciled_rep3.php?q=<?php echo $r1['account'];?>&str=<?php echo $p;?>&str2=<?php echo $r1['rid'];?>">
      <font color="blue"><?php echo $r1['account'];?></font></a>
    </Td>

      <Td>
          <?php echo 'Receipt'; ?> 
    </Td>
     <Td>
          <?php echo $r1['receipt_no']; ?> 
    </Td>
    
    
    <Td>
          <?php echo $y[$i];
                 $dsum=$dsum+$y[$i];
           ?> 
    </Td>
    <td>
      
    </td>
    </tr>
<?php
}
}
}


//JOURNAL VOUCHER
  $q1=mysqli_query($db,"select * from tbljournal where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
          $x=explode(',',$r1['particuler']);
           $y=explode(',',$r1['credit']);
          $z=explode(',',$r1['debit']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
               if(trim($x[$i])==trim($p))   
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
         <a href="jorled_rep.php?str=<?php echo $x[$i];?>">
      <font color="blue"><?php echo $x[$i];?></font></a>
    </Td>
      <Td>
          <?php echo 'Journal'; ?> 
    </Td>
     <Td>
          <?php echo $r1['journal_no']; ?> 
    </Td>
    
    <td>
    
       <?php echo $z[$i];
              $dsum=$dsum+$z[$i];
        ?>
        <?php echo $y[$i]; 
            $dsum=$dsum+$y[$i];
        ?> 
    </td>
    <Td>
    
    </Td>
    </tr>
<?php
}
}
}
//purchase item credit

$q1=mysqli_query($db,"select * from tblmultitem where supplier='".$p."' and payment_mode='credit' and ses_id='".$ses_id."'");
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
         <a href="pur_rep.php?str=<?php echo $r1['supplier'];?>&str1=<?php echo $r1['multi_id'];?>">
      <font color="blue"><?php echo $r1['payment_mode'];?></font></a>
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


//cash

if(strcasecmp($p,'cash')==0)
{
      $q1=mysqli_query($db,"select * from tblmultitem where payment_mode='".$p."'  and ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) 
       {
        $q4=mysqli_query($db,"select count(*) as cnt from tblp1 where  multi_id='".$r1['multi_id']."' and ses_id='".$ses_id."'");

         $r4=mysqli_fetch_array($q4);
         if($r4['cnt']!=0)
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
         <a href="cash_led_deatils.php?str1=<?php echo $r1['multi_id'];?>">
      <font color="blue"><?php echo $r1['payment_mode'];?></font></a>
    </Td>
      <Td>
          <?php echo 'Item Purchase'; ?> 
    </Td>
     <Td>
          <?php echo $r1['bill_no']; ?> 
    </Td>
   
    <Td>
          <?php 

      $q2=mysqli_query($db,"select * from tblp1 where multi_id='".$r1['multi_id']."' and ses_id='".$ses_id."'");
      $sum=0;
       while ($r2=mysqli_fetch_array($q2)) 
       {
          $sum=$sum+$r2['tot_amount'];
       }

          echo $sum;
          $dsum=$dsum+$sum;

           ?> 
    </Td>

     <td>
      
    </td>
    </tr>
<?php
}
}
}
//worker ledger


$q1=mysqli_query($db,"select * from tblprunning where ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
          $x=explode(',',$r1['worker_name']);
           $y=explode(',',$r1['wages']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
               if($x[$i]==$p)   
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
    <?php echo 'Prunning';?>
    </Td>
      <Td>
          <?php echo 'Payment'; ?> 
    </Td>
    

     <Td>
          <?php echo "-"; ?> 
    </Td>
    <td>
    </td>
    <Td>
          <?php echo $y[$i];
          $csum=$csum+$y[$i]; ?> 
    </Td>
    </tr>  
    <?php
 }
}
}
$q2=mysqli_query($db,"select * from tblother where ses_id='".$ses_id."'");
       while ($r2=mysqli_fetch_array($q2)) {
          $x=explode(',',$r2['work']);
           $y=explode(',',$r2['wages']);
          for ($i=0; $i <sizeof($x) ; $i++) { 
               if($x[$i]==$p)   
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
          <?php echo $r2['date']; ?> 
      </Td>
      <Td>
    <?php echo 'Other Work';?>
    </Td>
      <Td>
          <?php echo 'Payment'; ?> 
    </Td>
    <
     <Td>
          <?php echo "-"; ?> 
    </Td>
    <td>
    </td>
    <Td>
          <?php echo $y[$i];
                 $csum=$csum+$y[$i];
          ?> 
    </Td>
    </tr> 
               
<?php
  }
}
}
?>
</table>
<?php
   // echo $csum."\n";
    //echo $dsum;
    if($csum > $dsum)
    {
        $diff=$csum-$dsum;
        ?>
       
<div align="center" style="margin-left: 40%">
<div class="row">

      <div class="col-sm-10 form-group" style="margin-left: 90%"></div>
        <center><label><font color="black"><b>Total Diff Cr.:</b></font></label></center>
        <div class="col-sm-0 form-group">
         <font color="black"><?php 
      echo round($diff,2);
   ?> </font></div>
</div></div>
<?php
    }
    else
    {
        $diff=$dsum-$csum;
        ?>
        

<div align="center" style="margin-left: 40%">
<div class="row">

      <div class="col-sm-10 form-group" style="margin-left: 90%"></div>
        <center><label><font color="black"><b>Total Diff Dr.: </b></font></label></center>
        <div class="col-sm-0 form-group">
         <font color="black"><?php 
      echo round($diff,2);
   ?> </font></div>
</div></div>
<?php
    }
}//if other
else
{

$dsum=0;
$csum=0;
$j=1;
?>
 <table id="myTable" border="1" align="center" class="table " style="width:100%; margin-left:%">
    
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
         <a href="pur_rep.php?str=<?php echo $r1['supplier'];?>&str1=<?php echo $r1['multi_id'];?>">
      <font color="blue"><?php echo $r1['payment_mode'];?></font></a>
    </Td>
      <Td>
          <?php echo 'Item Purchase'; ?> 
    </Td>
     <Td>
          <?php echo $r1['bill_no']; ?> 
    </Td>
    <Td>
          <?php 

      $q2=mysqli_query($db,"select * from tblp1 where multi_id='".$r1['multi_id']."' and ses_id='".$ses_id."'");
      $sum=0;
       while ($r2=mysqli_fetch_array($q2)) 
       {
          $sum=$sum+$r2['tot_amount'];
       }

          echo $sum;
          $dsum=$dsum+$sum ?> 
    </Td>
     <td>
    </td>
    </tr>
<?php
}

 $q1=mysqli_query($db,"select * from tblpurcahse1 where  paccount_name='".$p."' and payment_mode='cash' and ses_id='".$ses_id."'");
       while ($r1=mysqli_fetch_array($q1)) {
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
         <a href="purled_rep.php?str=<?php echo $r1['paccount_name'];?>&str1=<?php echo $r1['pid'];?>">
      <font color="blue"><?php echo $r1['paccount_name'];?></font></a>
         
    </Td>
      <Td>
          <?php echo 'Purchase'; ?> 
    </Td>
     <Td>
          <?php echo $r1['purchase_no']; ?> 
    </Td>
    <Td>
          <?php echo $r1['amount1'];
                $dsum=$dsum+$r1['amount1'];
             ?> 
    </Td>
    <td>
      
    </td>
    </tr>
<?php

}
?>
</table>
<div align="center" style="margin-left: 40%">
<div class="row">

      <div class="col-sm-10 form-group" style="margin-left: 90%"></div>
        <center><label><font color="black"><b>Total Diff Dr.: </b></font></label></center>
        <div class="col-sm-0 form-group">
         <font color="black"><?php 
      echo round($dsum,2);
   ?> </font></div>
</div></div>
<?php
}//else

?>
<script src="js/reload.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

<?php //include('footer.php');?>

</html>


