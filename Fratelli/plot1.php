<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



  
</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>
        <div class="col-sm-4 form-group"><h2><b>PLOT</b></h></div>

       
 <div align="center"> 

<div class="container">  
<div class="row"> 
<div class="col-sm-3"></div>
<div class="col-sm-4 form-group">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control"></a>
</div>
</div>
</div>

</div>

<div class="w3-container w3-bordered">
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
<table class="w3-table" align="center" id="myTable">
  <th><b>Plot No.</b></th>
  <th><b>Plot Name</b></th>
  <th><b>Delete<b></th>
  <th><b>Edit</b></th>
<?php
 $ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from plot where ses_id=".$ses_id); 

 while ($r=mysqli_fetch_array($q1)) 

{
  $a=$r['pid'];
    ?>

    <form method="post" enctype="multipart/form-data">

       <tr>
    <td><?php  echo($r['plot_no']); ?></td>
    <td>
      <a> <font color="blue">
      <?php echo $r["pname"];?></td></font></a>
      <Td>
      <a href="delete_plot.php?id=<?php echo $r['pid'];?>">

                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>
    <Td>
      <a href="edit_plot.php?id=<?php echo $r['pid'];?>">

        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>

      </a>
    </td>
    
    </tr>

    
    
          <?php

       }?>



      </table>
    </form>
      <br><br>


        <div align="center"><button type="submit" class="btn btn-success col-sm-4" name="btnadd" onclick="window.location.href='add_plot.php'"><b>ADD</b></button>

       <button type="submit" class="btn btn-success col-sm-4" name="btnadd" onclick="window.location.href='plot_report.php?id=<?php echo $a;?>'"><b>SHOW REPORT</b></button></div>
      

       
</div>
</div>
</div>



  <?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
 

             
    </body>
</html>
