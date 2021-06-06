<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>


  

</head>
<body class="sb-nav-fixed">
<?php  include('header.php');?>

  <h2><b>HARVESTING RECORDS</b></b></h2>
</div>

<br><br><br>
 <?php// include('reght_sidebar.php');?>

<div class="container">
  <div align="center">
  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-8">
<table class="table" align="center" border="1" style="width:120%">
 <th><font color="black"><b>Sr No.</b></font></th>
      <th><font color="black"><b> Start date</b></font></th>
      <th><font color="black"><b> End Date</b></font></th>
      <th><font color="black"><b>Plot No</b></font></th>
      <th width="15%"><font color="black"><b>Fruit</b></font></th>
       <th><font color="black"><b>Variety</b></font></th>
      <th><font color="black"><b>Goods Harvested</b></font></th>
      <th><font color="black"><b>Add More</b></font></th>
      <th><font color="black"><b>Delete</b></font></th>
 <?php

 $ses_id=$_SESSION['plot_id'];
 $i=1;
  $q1=mysqli_query($db,"select * from tblharvest where ses_id=".$ses_id); 

     while ($r=mysqli_fetch_array($q1)) 

{
    ?>

    <form method="post" enctype="multipart/form-data">

       <tr>
      <td><font color="black"><?php echo $i;
      $i++; ?></font></td>
                   <td><font color="black"><?php echo $r['date'];?></font></td>
                    <td><font color="black"><?php echo $r['end_date'];?></font></td>
                   <td><font color="black"><?php echo $r['plot_no'];?></font></td>
                    <td><font color="black"><?php echo $r['fruit_name'];?></font></td>
                      <td><font color="black"><?php echo $r['variety'];?></font></td>
                     <td><font color="black"><?php echo $r['total_amount'];?>Kg</font></td>
                
    <td>
             
       <a href="edit_harvest.php?id=<?php echo $r['h_id'];?>"><button class="btn-success" type="button"  value="add">ADD</button></a>

    </td>
    <td>
       <a href="delete_harvest.php?id=<?php echo $r['h_id'];?>"><button class="btn-danger" type="button"  value="add">DELETE</button></a>
     </td>
     
    </tr>
    
    
          <?php
       }?>

      </table>
      <br><br>
 <style>
    a { color:white; } /* CSS link color */
  </style>
</form>

        <div align="center"><button type="submit" class="btn btn-success col-sm-3" name="btnadd" onclick="window.location.href='add_harvest.php'"><b>ADD</b></button></a></div>
</div>
</div>
</div>
<?php include('footer.php');?>


</body>
</html>