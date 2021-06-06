
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>

  
</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>
        <div class="col-sm-4 form-group"><h2><b>ITEM</b></h></div>

       
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

<div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
<table class="table" align="center" id="myTable">
 <th><font color="black"><b>Item Name</b></font></th>
  <th><font color="black"><b>Item Type</b></font></th>
  <th><font color="black"><b>Delete<b></font></th>
  <th><font color="black"><b>Edit</b></font></th>
  <?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblitem where ses_id=".$ses_id); 

     while ($r=mysqli_fetch_array($q1)) 

{
  $a=$r['id'];
    ?>

    <form method="post" enctype="multipart/form-data">

       <tr>
    <td>
      <a href="view_item.php?id=<?php echo $r['id'];?>">
       <font color="blue"><?php echo $r["item_name"];?></font></td></a>
     <td><?php  echo($r['item_type']); ?></td>
      <td><a href="delete_item.php?id=<?php echo $r['id'];?>">

                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>
    <Td>
      <a href="edit_item.php?id=<?php echo $r['id'];?>">

        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
      </a>
    </td>
    
    </tr>
    
    
          <?php
       }?>

      </table>
      </table>
    </form>
      <br><br>


        <div align="center"><button type="submit" class="btn btn-success col-sm-4" name="btnadd" onclick="window.location.href='add_item.php'"><b>ADD</b></button>

       <button type="submit" class="btn btn-success col-sm-4" name="btnadd" onclick="window.location.href='item_report.php'"><b>SHOW REPORT</b></button></div>

        </div>
     
</div>
</div>
</div>




  
<?php include('footer.php');?>
 

             
    </body>
</html>
