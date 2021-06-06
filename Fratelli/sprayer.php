<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
</head>

<body class="sb-nav-fixed">
    <br><br><br>
        <?php include('header.php');?>
         <div class="container">
<div class="row">   
  <div class="col-sm-2"></div>
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control"></a>
</div>
</div>
</div>
<br>
        <div class="container ">
  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-8">
<table class="table" align="center" id="myTable">
  <th><b>Sprayer Type</b></th>
  <th><b>Sprayer Name</b></th>
  <th><b>Delete<b></th>
  <th><b>Edit</b></th>
<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblsprayer where ses_id=".$ses_id);

while ($r=mysqli_fetch_array($q)) {

    $q1=mysqli_query($db,"select stype from tblstype where sid=".$r["sprayer_type"]);
    $r1=mysqli_fetch_array($q1);

    $q2=mysqli_query($db,"select * from tblntype where sid='".$r["sprayer_type"]."' and nid='".$r["sprayer_name"]."'");
    $r2=mysqli_fetch_array($q2);
  
      ?>

    <form method="post" enctype="multipart/form-data">
    <tr>

    <td><a href="view_sprayer.php?id=<?php echo $r['sid'];?>"> <font color="blue"><?php echo($r1['stype']); ?></font></td>
     <td><?php  echo($r2['name_of_sprayer']); ?></td>
       <Td>
      <a href="delete_sprayer.php?id=<?php echo $r['sid'];?>">

                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>
    <Td>
      <a href="edit_sprayer.php?id=<?php echo $r['sid'];?>">

        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
      </a>
    </td>
    </tr>
     <?php
}
?>
</table>    </form>
    </div>
</div>
</div>
<br><br>
  <div class="row"> 
  <div class="col-sm-4"> </div>  
    <div class="col-sm-4">
<button type="submit" class="btn btn-success col-sm-4" name="btnadd" onclick="window.location.href='add_sprayer.php'" ><b>ADD</b></button>
<button type="submit" class="btn btn-success col-sm-4" name="btnback" onclick="window.location.href='equipment.php'" ><b>BACK</b></button></div></div>

        
<?php include('footer.php');?>
             
    </body>
</html>
