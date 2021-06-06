<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>
<body>
   <div class="container" style="width:50%">
  <div class="w3-container w3-bordered" >
  <div class="row">
 

<table class="table"  id="myTable" align="center">
    

  <tr >
     <th>
     Plot Name</td>
    </th>  
    
    <th>Date</th>
    
   
    <th>
       Prunning Days</td>
    </th>  
    
    <th>Delete</th> 
    <th>
       Edit
    </th>  
    
</tr>

<?php
$q = intval($_GET['q']);
 $ses_id=$_SESSION['plot_id'];
$sql="SELECT * from tbldrip WHERE plot_no = '".$q."' and  ses_id='".$ses_id."' and status=0 order by date";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  ?>
  
<tr>
    
    <Td>
       <a href="view_drip.php?id=<?php echo $r['did'];?>">
       <font color="blue"><?php echo $r["pname"];?>
      </a></font>
    </Td>
    <Td >
      <?php echo $r["date"];?>
    </Td>
    

    <Td>
      <?php echo $r["prunning_day"];?>
    </Td>
    
   <td>
      <a href="delete_drip.php?id=<?php echo $r['did'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_drip.php?id=<?php echo $r['did'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}
?>
</table>
</center>
<br><br>





