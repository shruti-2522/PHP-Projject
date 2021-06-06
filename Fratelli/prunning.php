<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
<?php  include('header.php');?>

	<h2 class="container"><b>PRUNNING DETAILS</b></h2>
<br>
<div class="col-sm-2"></div>
<div align="center">
<div class="container">		
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control"></a>
</div>
<div class="col-sm-1">
<button class="btn btn-success" onclick="window.location.href='add_prunning.php'"><b>ADD</b></button>
</div>
</div>
</div>
</div>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
 <div class="col-sm-6 form-group">
<table class="table" align="center" id="myTable">
	<th><font color="black"><b>Plot No.</b></font></th>
	<th><font color="black"><b>Plot Name</b></font></th>
	<th><font color="black"><b>Delete<b></font></th>
	<th><font color="black"><b>Edit</b></font></th>
   <?php

$ses_id=$_SESSION['plot_id'];
 
  $q1=mysqli_query($db,"select * from tblprunning where status=0 and ses_id=".$ses_id);  
 
     while ($r=mysqli_fetch_array($q1)) 

{
  $a=$r['prunning_id'];
    ?>

    <form method="post" enctype="multipart/form-data">

       <tr>
	 <td><?php  echo($r['plot_no']); ?></td>
    <td>
             <a href="view_prunning.php?id=<?php echo $r['prunning_id'];?>">
       <font color="blue"><?php echo $r["plot_name"];?></font></td></a>
    
		  <Td>
      <a href="delete_prunning.php?id=<?php echo $r['prunning_id'];?>">

                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>
    <Td>
      <a href="edit_prunning.php?id=<?php echo $r['prunning_id'];?>">

      	<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>

      </a>
    </td>
    
		</tr>
		
		
          <?php
       }?>

      </table>
<br><br>
    </form>
    <div class="row">
      <div class="col-sm-4"></div>
      <button type="submit" class="btn btn-success col-sm-4" name="btnadd" onclick="window.location.href='prunning_report1.php'"><b>SHOW REPORT</b></button>
   
    </div>
</div>
</div>
<br>

       
           <?php include('footer.php');?>
</body>
</html>