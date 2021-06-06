<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>

 <?php include('graphcss.php');?>
</head>

<body class="sb-nav-fixed">
<?php  include('header.php');?>

  <h2 class="container"><b>STOCK SUMMARY</b></h2>
  <?php 
$ses_id=$_SESSION['plot_id'];

$isum=0;
$mult=1;
  $q=mysqli_query($db,"SELECT *  FROM tblp1 where ses_id='".$ses_id."' and status=0 ");
 while($r=mysqli_fetch_array($q))
 {
    $mult=$r['NOF']*$r['purchase_rate'];
    $isum=$isum+$mult;
 }
   
  $q1=mysqli_query($db,"select sum(tot_amount) as asum from tblp1 WHERE item_type='Assets' and ses_id='".$ses_id."' and status=0 ");
  $r1=mysqli_fetch_array($q1);
   
   $q5=mysqli_query($db,"select sum(firstSum) as fsum from (select Sum(total) as firstSum from tbldissession where tbldissession.ses_id='".$ses_id."' and draft_status=0 union select Sum(total) as  firstSum from tblfertsession where tblfertsession.ses_id='".$ses_id."' and draft_status=0 union select Sum(total) as firstSum from tblgrowthsession WHERE tblgrowthsession.ses_id='".$ses_id."' and draft_status=0 ) tbl");
  $r5=mysqli_fetch_array($q5);
?>

<br><br>

            <div class="row">
                <div style="margin-left: 1%"></div>
              <div class="col-sm-3 form-group">
                <label><font color="black"><b>Worth Stock</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $isum.' ₹'; ?>" readonly>
                </div>
              <div class="col-sm-3 form-group">
                   <label><font color="black"><b>Worth Assets</b></font></label>
                    <input type="text" class="form-control" value="<?php echo $r1['asum']; ?>" name="txtname" readonly>
              </div>
               <div class="col-sm-3 form-group">
                   <label><font color="black"><b>Worth Item Used</b></font></label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $r5['fsum']; ?>"  readonly>
              </div>
            </div>

<div class="row">
<div style="margin-left: 1%"></div>
<div class="col-sm-6">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>
<br><br>
<div class="row">
   <div style="margin-left: 2%"></div>
  
<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select item_type from tblfarmreport");
 while($r=mysqli_fetch_array($q))
 {
    ?>
     <div class="col-sm-0">
    <font color="black"><b><?php echo $r['item_type'];?></b></font>
    <input type='checkbox' class="checks" onclick="getValue();" value="<?php echo $r['item_type'];?>" checked>
</div>

 <?php
 }
?></div>

<br><br>
<div class="row">

  <div style="margin-left: 2%"></div>
<label><font color="black"><b>Inventory</b></font></label>
     <div class="col-sm-1" style="margin-left: 3%">
   <label class="switch">
  <input type="checkbox" class="checks" id="myCheck" onclick="getValue();" value="datewise" checked><span class="slider round" style="width:49px; height: 25px;"></span>
</label> 
</div> <div style="margin-left:0%"></div><label><font color="black"><b>Datewise</b></font></label>
    </div>
  </div>
     <p  id="txtHint"></p>

<script>
function getValue() {

  document.getElementById("myTable").remove(); 
    document.getElementById('tworth').style.display='none';
    var checks = document.getElementsByClassName('checks');
    var str = '';

    for ( i = 0; i < 7; i++) {
        if ( checks[i].checked === true ) {
            str += checks[i].value + " ";
        }
    }
    //alert(str);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","showreport1.php?q="+str,true);
    xmlhttp.send();
  
}
</script>
<table id="myTable"  border="1" class="table" style="width:95%; margin-left:3%">
<tr>
   <td><b>Sr. No.</b></td>
   <td><b>Date</b></td>
   <td><b>Particular</b></td>
    <td><b>Type</b></td>
    <td><b>Quantity</b></td>
    <td><b>Rate</b></td>
    <td><b>NOS</b></td>
    <td><b>Total</b></td>
    <td><b>Party Name</b></td>

  <?php

  $i=1;
    $q1=mysqli_query($db,"SELECT date,item_name,item_type,unit,qty,NOF ,purchase_rate,supplier FROM tblp1 where status=0 and ses_id='".$ses_id."' order by date");
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
           <td>
              <?php echo $i;
                $i++;
              ?>
            </td>
            <td>
              <?php echo $r1['date'];?>
            </td>
            <td>
              <?php echo $r1['item_name'];?>
            </td>
            <td>
              <?php 
                     echo $r1['item_type'];
              ?>
            </td>

            <td>
             
                <?php echo round($r1['qty'],2).$r1['unit']; ?>
             </td>
            <td>
              <?php echo $r1['purchase_rate'] ?>
            </td>
            <td>
                <?php echo $r1['NOF'] ?>
             </td>

            <td>
                     <?php $amt=$r1['purchase_rate']*$r1['NOF'];
                     echo round($amt,2); ?>
            </td>
             
            <td>
              <?php echo $r1['supplier'] ?>
            </td>
                  
        </tr>
        <?php
    $total= $total+$amt; 
        }
    
?>
</table>
<div align="center" style="margin-left: 33%">
<div class="row" id="tworth">

      <div class="col-sm-10 form-group" style="margin-left: 90%"></div>
        <center><label><font color="black"><b>Total Worth:</b></font></label></center>
        <div class="col-sm-0 form-group">
         <font color="black"><?php 
      echo round($total,2);
   ?> </font></div>
</div>

<br>
<div style="margin-left: -60%">
  <button class="btn btn-success" onclick="window.location.href='stock_report.php'">PRINT</div>
<br>


<?php include('footer.php');?>

</body>
</html>