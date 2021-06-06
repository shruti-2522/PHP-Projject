<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>


</head>

<body class="sb-nav-fixed">
        <?php include('header.php');?>
        <div class="col-sm-4 form-group"><h2><b>WORKER</b></h></div>

         <div class="container">
<div class="row">   
  <div class="col-sm-2"></div>
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control"></a>
</div>
</div>
</div>
<br>
        <div class="container">
  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-7">
<table class="table" align="center" id="myTable">
  <th size="2">Worker Name</th>
  <th>Wages</th>
  <th>Contact No</th>
   <th>Aadhar No</th>
  <th>Delete</th>
  <th>Edit</th>
 <?php

$ses_id=$_SESSION['plot_id'];

  $q1=mysqli_query($db,"select * from tblworker where ses_id=".$ses_id); 

     while ($r=mysqli_fetch_array($q1)) 

{
    ?>


    <form method="post" enctype="multipart/form-data">

       <tr>
   <td><?php  echo($r['worker_name']); ?></td>
     <td><?php  echo($r['wages']); ?></td>
      <td><?php  echo($r['contact_no']); ?></td>
         <td><?php  echo($r['adhar_no']); ?></td>
       <Td>
      <a href="delete_worker.php?id=<?php echo $r['id'];?>">

                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>
    <Td>
      <a href="edit_worker.php?id=<?php echo $r['id'];?>">

        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
      </a>
    </td>
    
    </tr>
    
    
          <?php
       }?>

      </table>
    </form>
    </div>
</div>
</div>
<br><br>

     <center> 
      <div class="row">
        <div class="col-sm-4"></div>
<button type="submit" class="btn btn-success col-sm-2" name="btnadd" onclick="window.location.href='add_worker.php'" ><b>ADD</b></button></div></center>

      


<?php include('footer.php');?>
             
    </body>
</html>
