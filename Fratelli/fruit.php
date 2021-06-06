<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
  
</head>

<body class="sb-nav-fixed">
        <?php include('header.php');?>
        <div class="col-sm-4 form-group"><h2><b>FRUIT</b></h2></div>
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
  <th><b>Fruit Name</b></th>
  <th><b>Variety Name</b></th>
  <th><b>Delete<b></th>
  <th><b>Edit</b></th>
 <?php

 $ses_id=$_SESSION['plot_id'];

  $q1=mysqli_query($db,"select * from tblfruit where ses_id=".$ses_id); 

     while ($r=mysqli_fetch_array($q1)) 

{
    ?>


    <form method="post" enctype="multipart/form-data">

       <tr>
    <td><?php  echo($r['fruit_name']); ?></td>
     <td><?php  echo($r['variety_name']); ?></td>
      <Td>
      <a href="delete_fruit.php?id=<?php echo $r['fid'];?>">

                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>
    <Td>
      <a href="edit_fruit.php?id=<?php echo $r['fid'];?>">

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
<button type="submit" class="btn btn-success col-sm-2" name="btnadd" onclick="window.location.href='add_fruit.php'" ><b>ADD</b></button></div></center>

     <?php include('footer.php');?>   
    </body>
</html>
