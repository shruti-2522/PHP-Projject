<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include('head.php');?>
<?php include('config.php');?>

</head>
<body class="sb-nav-fixed">
<?php  include('header.php');?>

  <h2 class="container"><b>PURCHASE DETAILS</b></b></h2>
<br>
<div align="center">
<div class="container">
<div class="row">   
  <div class="col-sm-3"></div>
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control"></a>
</div>
</div>
</div>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
 <div class="col-sm-6">
<table class="table" align="center" id="myTable">
  <th><b>Bill No.</b></th>
  <th><b>Supplier</b></th>
  <th><b>Date</b></th>
  <th><b>Delete<b></th>
  <th><b>Edit</b></th>
 <?php

 $ses_id=$_SESSION['plot_id'];
 
  $q1=mysqli_query($db,"select * from tblmultitem where status=0 and ses_id=".$ses_id); 

     while ($r=mysqli_fetch_array($q1)) 
     {
     $q4=mysqli_query($db,"select count(*) as cnt from tblp1 where  multi_id='".$r['multi_id']."' and ses_id='".$ses_id."'");
        $r4=mysqli_fetch_array($q4);
         if($r4['cnt']!=0)
          {
            $a=$r['id'];
    ?>
    <form method="post" enctype="multipart/form-data">

       <tr>

    
    <td>
    <a href="view_purchase.php?id=<?php echo $r['multi_id'];?>">
      <font color="blue"><?php echo $r["bill_no"];?></font></td></a>
       <td><?php  echo $r['supplier']; ?></td>
       <td><?php  echo $r['date']; ?></td>
      <Td>
      <a href="delete_purchase.php?id=<?php echo $r['multi_id'];?>">

                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>
    <Td>
      <a href="edit_multi_item.php?id=<?php echo $r['multi_id'];?>">

        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>

      </a>
    </td>
    
    </tr>
    
    
          <?php
      } }?>

      </table>
    </form>
    </div>
</div>
</div>
<br><br>

            <div class="row">
              <div class="col-sm-5"></div>
              <button type="submit" class="btn btn-success" name="btnadd" onclick="window.location.href='multiple_purchase_item.php'"><b>ADD</button></b>
              <div style="margin-left: 1%"></div>
               <button type="submit" class="btn btn-success" name="btnadd" onclick="window.location.href='purchase_report.php'"><b>SHOW REPORT</b></button></div>

            </div>

<?php include('footer.php');?>

</body>
</html>