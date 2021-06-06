<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 

</head>

<body class="sb-nav-fixed">
        <?php include('header.php');?>
        <div style="margin-left: 1%"><h2><b>INHOUSE CALIBRATION</b></h2></div>
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
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
<table class="table" align="center" id="myTable">
  <th><b>Machine</b></th>
 
  <th><b>Delete<b></th>
  <th><b>Edit</b></th>
 <?php

 $ses_id=$_SESSION['plot_id'];

  $q1=mysqli_query($db,"select * from tblinhousecal where ses_id=".$ses_id); 

     while ($r=mysqli_fetch_array($q1)) 

{
    ?>


    <form method="post" enctype="multipart/form-data">

       <tr>
    <td> <a href="inhouse_calibration.php?id=<?php echo $r['inid'];?>"><?php  echo($r['machine_name']); ?></a></td>
   
      <Td>
      <a href="delete_inhouse.php?id=<?php echo $r['inid'];?>">

                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>
    <Td>
      <a href="edit_inhouse.php?id=<?php echo $r['inid'];?>">


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

     
      <div class="row">
        <div class="col-sm-4 form-group"></div>
<button type="submit" class="btn btn-success col-sm-2" name="btnadd" onclick="window.location.href='add_inhouse_cal.php'" ><b>ADD</b></button></div>
        
<?php include('footer.php');?>
             
    </body>
</html>
