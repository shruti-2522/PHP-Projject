<br>
<!DOCTYPE html>
<html>
<head>
  
  <?php include ("head.php");?>
  <?php include ("config.php");?>
  <title></title>
  
</head>
<body>
<?php
$ses_id=$_SESSION['plot_id'];
$word="pesticide fertilizer";
$word1="pesticide fertilizer assets";
$word2="datewise";
$word3="cost";
$val=$_GET['q'];
//echo $val;
$val1=rtrim($val);
$plot=$_GET['plot'];

if(strpos($val1, $word2)!==false && $plot!='allplot' && strpos($val1, $word3)!==false)
{

  ?>



<table id="myTable" border="1" class="table">
  <tr>
<th><b>Sr No.</b></th>
    <th><b>Date</font></b>
    <th><b>Particular</b></th>
    <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Cost</font></b>
    <th><b>Water lit</font></b>
    <th><b>Type</font></b>
    <th><b>Application</font></b>
</tr>
<?php

if($val1=='pesticide cost datewise')
{
  //echo $plot;
   $q1=mysqli_query($db,"select * from tbldissession where item_type='Pesticide' and ses_id='".$ses_id."' and plot_no='".$plot."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
      while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."' order by sdate");
        $r2=mysqli_fetch_array($q2);
   
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td> 
    <td><?php echo $r1["plot_no"];?></td>
    <td>
      <?php
      $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
        
      ?>
    </td>
     <Td>
      <?php echo $r1['bno'];?>
    </Td> 
    <td><?php echo $r1['edate'];?></td>
    <td><?php echo $r1['disease'];?></td>
    <td><?php echo $r2['preventive'];?></td>
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1["aunit"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?>
 
<?php
}
}

else
if($val1=='insecticide cost datewise')
{
$q1=mysqli_query($db,"select * from tbldissession where item_type='Insecticide' and ses_id='".$ses_id."' and plot_no='".$plot."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
      while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."' order by sdate");
        $r2=mysqli_fetch_array($q2);
   
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td> 
    <td><?php echo $r1["plot_no"];?></td>
    <td>
      <?php
      $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
        
      ?>
    </td>
     <Td>
      <?php echo $r1['bno'];?>
    </Td> 
    <td><?php echo $r1['edate'];?></td>
    <td><?php echo $r1['disease'];?></td>
    <td><?php echo $r2['preventive'];?></td>
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1["aunit"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='fungicide cost datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where item_type='Fungicide' and ses_id='".$ses_id."' and plot_no='".$plot."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
      while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."' order by sdate");
        $r2=mysqli_fetch_array($q2);
   
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td> 
    <td><?php echo $r1["plot_no"];?></td>
    <td>
      <?php
      $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
        
      ?>
    </td>
     <Td>
      <?php echo $r1['bno'];?>
    </Td> 
    <td><?php echo $r1['edate'];?></td>
    <td><?php echo $r1['disease'];?></td>
    <td><?php echo $r2['preventive'];?></td>
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1["aunit"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide insecticide cost datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and plot_no='".$plot."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
      while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."' order by sdate");
        $r2=mysqli_fetch_array($q2);
   
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td> 
    <td><?php echo $r1["plot_no"];?></td>
    <td>
      <?php
      $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
        
      ?>
    </td>
     <Td>
      <?php echo $r1['bno'];?>
    </Td> 
    <td><?php echo $r1['edate'];?></td>
    <td><?php echo $r1['disease'];?></td>
    <td><?php echo $r2['preventive'];?></td>
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1["aunit"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide fungicide cost datewise')
{

   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and plot_no='".$plot."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
      while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."' order by sdate");
        $r2=mysqli_fetch_array($q2);
   
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td> 
    <td><?php echo $r1["plot_no"];?></td>
    <td>
      <?php
      $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
        
      ?>
    </td>
     <Td>
      <?php echo $r1['bno'];?>
    </Td> 
    <td><?php echo $r1['edate'];?></td>
    <td><?php echo $r1['disease'];?></td>
    <td><?php echo $r2['preventive'];?></td>
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1["aunit"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php
      $total= $total+$r1["total"];
      //echo $total;
   ?> 

<?php
}
}
else
if($val1=='insecticide fungicide cost datewise')
{
   $q1=mysqli_query($db,"select * from tbldis where (item_type='Pesticide' or item_type='Fungicide') and ses_id='".$ses_id."' and status=0 and plot_no='".$plot."' order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
    <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r1["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td> <?php echo $r1["item_type"];?></td>
    <Td>
      <?php echo $r2["moa"];?>
    </Td>  
  </tr>
<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide insecticide fungicide cost datewise')
{
   
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and plot_no='".$plot."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
      while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."' order by sdate");
        $r2=mysqli_fetch_array($q2);
   
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td> 
    <td><?php echo $r1["plot_no"];?></td>
    <td>
      <?php
      $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
        
      ?>
    </td>
     <Td>
      <?php echo $r1['bno'];?>
    </Td> 
    <td><?php echo $r1['edate'];?></td>
    <td><?php echo $r1['disease'];?></td>
    <td><?php echo $r2['preventive'];?></td>
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1["aunit"];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
 
<?php
}
}
}
else
if(strpos($val1, $word2)==false && $plot!='allplot' && strpos($val1, $word3)!=false)
{
  ?>

<table id="myTable" border="1" class="table">
  <tr>
 <th><b>Sr No.</b></th>
    <th><b>Particular</b></th>
    <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Cost</b></th>
    <th><b>Water lit</b></th>
    <th><b>Type</b></th>
    <th><b>Application</b></th>
</tr>
<?php
if($val1=='pesticide cost')
{
  //echo("done");
   $q1=mysqli_query($db,"select * from tbldissession where item_type='Pesticide' and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?>
<?php
}
}

else
if($val1=='insecticide cost')
{
 $q1=mysqli_query($db,"select * from tbldissession where item_type='Insecticide' and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>


<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='fungicide cost')
{
  $q1=mysqli_query($db,"select * from tbldissession where item_type='Fungicide' and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide cost')
{
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r1["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide fungicide cost')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>


<?php $total= $total+$r1["total"];
      //echo $total;
   ?>
 
<?php
}
}
else
if($val1=='insecticide fungicide cost')
{
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide fungicide cost')
{
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
     <td><?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
   </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php 
      $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
}
else
if(strpos($val, $word2)!==false && $plot=='allplot' && strpos($val, $word3)!==false)
{
  ?>


<table id="myTable" border="1" class="table" >
  <tr>
   <th><b>Sr No.</b></th>
    <th><b>Date</b></th>
    <th><b>Particular</b></th>
    <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Cost</b></th>
    <th><b>Water lit</b></th>
    <th><b>Type</font></b>
    <th><b>Application</b></th>
</tr>
<?php
if($val1=='pesticide cost datewise')
{
  //echo("done");
  $q1=mysqli_query($db,"select * from tbldissession where item_type='Pesticide' and ses_id='".$ses_id."' and draft_status=0");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
          <?php echo $r1['sdate']; ?> 
    </Td>

    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
 
<?php
}
}

else
if($val1=='insecticide cost datewise')
{
  $q1=mysqli_query($db,"select * from tbldissession where item_type='Insecticide' and ses_id='".$ses_id."' and draft_status=0");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
      <Td>
          <?php echo $r1['sdate']; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>


<?php $total= $total+$r1["total"];
      //echo $total;
   ?>
<?php
}
}
else
if($val1=='fungicide cost datewise')
{
 $q1=mysqli_query($db,"select * from tbldissession where item_type='Fungicide' and ses_id='".$ses_id."' and draft_status=0");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
      <Td>
          <?php echo $r1['sdate']; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r2['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide cost datewise')
{
 $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
      <Td>
          <?php echo $r1['sdate']; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>


<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide fungicide cost datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
      <Td>
          <?php echo $r1['sdate']; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>


<?php
      $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='insecticide fungicide cost datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
      <Td>
          <?php echo $r1['sdate']; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide fungicide cost datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
      <Td>
          <?php echo $r1['sdate']; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td>      <?php echo $r1["plot_no"];?></td>
     <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </T
    d> 
      <Td>
      <?php echo $r1["total"];?>
    </Td> 
    <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
}
else
if(strpos($val1, $word2)==false && $plot=='allplot' && strpos($val1, $word3)!=false)
{
  ?>


<table id="myTable" border="1" class="table">  <tr>
   <th><b>Sr No.</b></th>
    <th><b>Particular</b></th>
    <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Cost</b></th>
    <th><b>Water lit</b></th>
    <th><b>Type</b></th>
    <th><b>Application</b></th>
</tr><?php
if($val1=='pesticide cost')
{
  //echo("done");
  $q1=mysqli_query($db,"select * from tbldissession where item_type='Pesticide' and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td> <?php echo $r1["plot_no"];?></td>
       <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
  <td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
      </Td> 
      <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
    //  echo $total;
   ?> 
<?php
}
}

else
if($val1=='insecticide cost')
{
  $q1=mysqli_query($db,"select * from tbldissession where item_type='Insecticide' and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td> <?php echo $r1["plot_no"];?></td>
       <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
  <td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
      </Td> 
      <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='fungicide cost')
{
   $q1=mysqli_query($db,"select * from tbldissession where item_type='Fungicide' and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td> <?php echo $r1["plot_no"];?></td>
       <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
  <td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
      </Td> 
      <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide cost')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td> <?php echo $r1["plot_no"];?></td>
       <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
  <td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
      </Td> 
      <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> </font>
 
<?php
}
}
else
if($val1=='pesticide fungicide cost')
{
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide')and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td> <?php echo $r1["plot_no"];?></td>
       <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
  <td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
      </Td> 
      <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='insecticide fungicide cost')
{
  
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Insecticide' or item_type='Fungicide')and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td> <?php echo $r1["plot_no"];?></td>
       <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
  <td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
      </Td> 
      <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide fungicide cost')
{
  
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide' or item_type='Insecticide')and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td> <?php echo $r1["plot_no"];?></td>
       <td><?php
        $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];
      ?>
  </td>
  <td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r1["total"];?>
      </Td> 
      <td>      <?php echo $r2["water_used"]." lit";?></td>
    <td>      <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];
      ?>
    </Td> 
   
  </tr>

<?php 
      $total= $total+$r1["total"];
      //echo $total;
   ?> 
<?php
}
}
}
else
if(strpos($val1, $word2)!==false && $plot!='allplot' && strpos($val1, $word3)==false)
{

  ?>




<table id="myTable" border="1" class="table">
  
  <tr >
<th><b>Sr No.</b></th>
    <th><b>Date</b></th>
    <th><b>Particular</b></th>
     <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Water lit</b></th>
     <th><b>Type</font></b>
    <th><b>Application</b></th>
</tr>
<?php

if($val1=='pesticide datewise')
{
  //echo $plot;

    $q1=mysqli_query($db,"select * from tbldissession where item_type='Pesticide' and ses_id='".$ses_id."' and draft_status=0 and plot_no='".$plot."' order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?>
    </td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];?></td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td>
     <td> <?php echo $r2["water_used"]." lit";?></td> 
    <td> <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?>
 
<?php
}
}

else
if($val1=='insecticide datewise')
{

    $q1=mysqli_query($db,"select * from tbldissession where item_type='Insecticide' and ses_id='".$ses_id."' and draft_status=0 and plot_no='".$plot."' order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?>
    </td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];?></td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td>
     <td> <?php echo $r2["water_used"]." lit";?></td> 
    <td> <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='fungicide datewise')
{
  
    $q1=mysqli_query($db,"select * from tbldissession where item_type='Fungicide' and ses_id='".$ses_id."' and draft_status=0 and plot_no='".$plot."' order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?>
    </td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];?></td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td>
     <td> <?php echo $r2["water_used"]." lit";?></td> 
    <td> <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide insecticide datewise')
{
    $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 and plot_no='".$plot."' order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?>
    </td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];?></td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td>
     <td> <?php echo $r2["water_used"]." lit";?></td> 
    <td> <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>


<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide fungicide datewise')
{
 $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 and plot_no='".$plot."' order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?>
    </td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];?></td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td>
     <td> <?php echo $r2["water_used"]." lit";?></td> 
    <td> <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>


<?php
      $total= $total+$r1["total"];
      //echo $total;
   ?> 

<?php
}
}
else
if($val1=='insecticide fungicide datewise')
{
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Fungicide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 and plot_no='".$plot."' order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?>
    </td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];?></td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td>
     <td> <?php echo $r2["water_used"]." lit";?></td> 
    <td> <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide insecticide fungicide datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 and plot_no='".$plot."' order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {

        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
    <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?>
    </td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
        $r3=mysqli_fetch_array($q3);
        echo $r3['ingredient'];?></td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td>
     <td> <?php echo $r2["water_used"]." lit";?></td> 
    <td> <?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
 
<?php
}
}
}
else
if(strpos($val1, $word2)==false && $plot!='allplot' && strpos($val1, $word3)==false)
{
  ?>

<table id="myTable" border="1" class="table" >
  <tr>
 <th><b>Sr No.</b></th>
    <th><b>Particular</b></th>
    <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Water lit</b></th>
        <th><b>Type</b></th>
    <th><b>Application</b></th>
</tr>
<?php
if($val1=='pesticide')
{
  //echo("done");
  $q1=mysqli_query($db,"select * from tbldissession where item_type='Pesticide' and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
         $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?></td>
  <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r2["water_used"]." lit";?>
    </Td> 
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?>
<?php
}
}

else
if($val1=='insecticide')
{
$q1=mysqli_query($db,"select * from tbldissession where item_type='Insecticide' and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
         $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?></td>
  <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r2["water_used"]." lit";?>
    </Td> 
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='fungicide')
{
$q1=mysqli_query($db,"select * from tbldissession where item_type='Fungicide' and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
         $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?></td>
  <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r2["water_used"]." lit";?>
    </Td> 
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
         $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?></td>
  <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r2["water_used"]." lit";?>
    </Td> 
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide fungicide')
{
 $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
         $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?></td>
  <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r2["water_used"]." lit";?>
    </Td> 
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?>
 
<?php
}
}
else
if($val1=='insecticide fungicide')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Fungicide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
         $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?></td>
  <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r2["water_used"]." lit";?>
    </Td> 
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide fungicide')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 and plot_no=".$plot);
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
         $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
    <td><?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?></td>
  <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
      <Td>
      <?php echo $r2["water_used"]." lit";?>
    </Td> 
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php 
      $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
}
else
if(strpos($val, $word2)!==false && $plot=='allplot' && strpos($val, $word3)==false)
{
  ?>


<table id="myTable" border="1" class="table">
  <tr>
   <th><b>Sr No.</b></th>
    <th><b>Date</b></th>
    <th><b>Particular</b></th>
    <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Water lit</b></th>
    <th><b>Type</font></b>
    <th><b>Application</b></th>
</tr>
<?php
if($val1=='pesticide datewise')
{
  //echo("done");
  $q1=mysqli_query($db,"select * from tbldissession where item_type='Pesticide' and ses_id='".$ses_id."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <Td>
      <?php echo $r1["plot_no"];?>
    </Td>
    <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
 
<?php
}
}

else
if($val1=='insecticide datewise')
{
$q1=mysqli_query($db,"select * from tbldissession where item_type='Insecticide' and ses_id='".$ses_id."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <Td>
      <?php echo $r1["plot_no"];?>
    </Td>
    <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?>
<?php
}
}
else
if($val1=='fungicide datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where item_type='Fungicide' and ses_id='".$ses_id."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <Td>
      <?php echo $r1["plot_no"];?>
    </Td>
    <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
     // echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide datewise')
{
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <Td>
      <?php echo $r1["plot_no"];?>
    </Td>
    <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='pesticide fungicide datewise')
{
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <Td>
      <?php echo $r1["plot_no"];?>
    </Td>
    <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php
      $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='insecticide fungicide datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Fungicide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <Td>
      <?php echo $r1["plot_no"];?>
    </Td>
    <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide fungicide datewise')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 order by sdate");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     <Td>
      <?php echo $r1["sdate"];?>
    </Td> 
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <Td>
      <?php echo $r1["plot_no"];?>
    </Td>
    <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
}
else
if(strpos($val1, $word2)==false && $plot=='allplot' && strpos($val1, $word3)==false)
{
  ?>

<table id="myTable" border="1" class="table"> <tr>
   <th><b>Sr No.</b></th>
    <th><b>Particular</b></th>
    <th><b>Plot No.</b></th>
    <th><b>Active Ingrediant</b></th>
    <th><b>Batch No.</b></th>
    <th><b>Exp. Date</b></th>
    <th><b>Pest Of Desis</b></th>
    <th><b>Prev/Curative</b></th>
    <th><b>Quantity</b></th>
    <th><b>Water lit</b></th>
    <th><b>Type</b></th>
    <th><b>Application</b></th>
</tr><?php
if($val1=='pesticide')
{
 // echo("done");
  $q1=mysqli_query($db,"select * from tbldissession where item_type='Pesticide' and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
     <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
    //  echo $total;
   ?> 
<?php
}
}

else
if($val1=='insecticide')
{
 $q1=mysqli_query($db,"select * from tbldissession where item_type='Insecticide' and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
     <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='fungicide')
{
   $q1=mysqli_query($db,"select * from tbldissession where item_type='Fungicide' and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
     <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
     <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> </font>
 
<?php
}
}
else
if($val1=='pesticide fungicide')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
     <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
 
<?php
}
}
else
if($val1=='insecticide fungicide')
{
  $q1=mysqli_query($db,"select * from tbldissession where (item_type='Fungicide' or item_type='Insecticide') and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
     <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>

<?php $total= $total+$r1["total"];
      //echo $total;
   ?> 
<?php
}
}
else
if($val1=='pesticide insecticide fungicide')
{
   $q1=mysqli_query($db,"select * from tbldissession where (item_type='Pesticide' or item_type='Insecticide' or item_type='Fungicide') and ses_id='".$ses_id."' and draft_status=0 ");
       $i=1;
       $total=0;
       while ($r1=mysqli_fetch_array($q1)) {
        $q2=mysqli_query($db,"select * from tbldisease1 where ses_id='".$ses_id."' and status=0 and did='".$r1['did']."'");
        $r2=mysqli_fetch_array($q2);
      ?>
     <tr>
      <Td>
          <?php echo $i; $i++; ?> 
    </Td>
     
    <Td>
      <?php echo $r1["item_name"];?>
    </Td>
    <td><?php echo $r1["plot_no"];?></td>
     <td> <?php $q3=mysqli_query($db,"select ingredient from tblitem where item_name='".$r1["item_name"]."' and ses_id='".$ses_id."'");
      $r3=mysqli_fetch_array($q3);
      echo $r3['ingredient'];?> </td>
    <Td>
      <?php echo $r1["bno"];?>
    </Td> 
    <Td>
      <?php echo $r1["edate"];?>
    </Td> 
     <Td>
      <?php echo $r1["disease"];?>
    </Td> 
    <Td>
      <?php echo $r2["preventive"];?>
    </Td> 
      <Td style="width: 2%">
      <?php echo $r1["aqty"];?><?php echo $r1['aunit'];?>
    </Td> 
    <td><?php echo $r2["water_used"]." lit";?></td>
    <td><?php echo $r1["item_type"];?></td>
    <Td>
      <?php 
           echo $r2["moa"];;
      ?>
    </Td> 
   
  </tr>
<?php 
    $total= $total+$r1["total"];
   ?> 
<?php
}
}
}
  ?>
</table>
  <br>
<div class="row" id="tworth">
  <div style="margin-left: 40%">
    <b>Total Worth:</b> <?php 
      echo $total;
   ?> 
  </div>
  </div>

</body>
</html>