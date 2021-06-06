<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('head.php');?>

	<?php include('config.php');?>
	

</head>
<body class="sb-nav-fixed">
<?php  include('header.php');?>
	<h2 class="w3-container"><b>OTHER-WORK DETAILS</b></b></h2>


 <?php
$q=mysqli_query($db,"select * from tblother where oid=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
  ?>

<br>
<div class="w3-container">
	<div class="row">
		<div class="col-sm-3"></div>
 <div class="col-sm-6">


<table class="table table-borderless table-condensed table-hover" id="myInput">
  <tr class="header">
     <tr>
     <td><b>Plot No:</b></td>
      <td>
      <?php echo $r["plot_no"];?>
    </td>
  </tr>


      <tr>
    <td><b>Plot Name:</b></td>
     <td>
     <?php echo $r["pname"];?>
    </td>
    </tr>

  <tr>
    <td><b>Date:</b></font>
     <td>
      <?php echo $r["date"];?>
    </td>
  </tr>


 <tr>
      <td><b>Days After Prunning:</b></td>
   
    <td>
       <?php echo $r["day_after_prunning"];?> Hour
    </td>
  </tr>


    <tr>
    <td><b>Start Time:</b></td>
    <td>
      <?php echo $r["stime"];?>
    </td>
  </tr>

  <tr>
    <td><b>End Time:</b></td> 
     <td>
      <?php echo $r["etime"];?>
    </td>
  </tr>

  <tr>
    <td><b>Duration:</b></td>
     <td>
      <?php echo $r["duration"];?> day
    </td>
  </tr>

   <tr>
    <td><b>Work Description:</b></td>
     <td>
      <?php echo $r["work_desc"];?> 
    </td>
  </tr>

 
<tr>
    <td><b>Name  Of Labour:</b></td>
    
    <td>
      <font  color="black"><?php echo $r["work"];?></font>
    </td>
  </tr>
  

  <tr>
      <td><b>Total Wages:</b></td>
    
    <td>
      <?php echo $r["tot_wages"];?>
  </tr>
    
  

</table>
   
    <?php
  }?>
   </div>
</div>
</div>
<br><br>

<center><button class="btn btn-success" onclick="window.location.href='other_work.php'"><b>BACK</b></button></center>
<?php include('footer.php');?>
</body>
  </html>