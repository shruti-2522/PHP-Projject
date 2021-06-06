<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>
<body>
 
<table class="table" align="center" id="myTable" style="width:50%">
  <tr>
     
    
    <th>Date</th>
   
   
    <th>
     Days After Prunning</td>
    </th>  
    <th>
     Moisture</td>
    </th>  
    <th>Delete</th> 
    <th>
     Edit</td>
    </th>  
    
</tr>

<?php
$q = intval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
$sql="SELECT * from tblirrigation WHERE plot_no = '".$q."' and  ses_id='".$ses_id."' and status=0 order by date";

$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  ?>
  
<tr>
    
    <Td>
       <a href="view_irrigation.php?id=<?php echo $r['iid'];?>">
       <font color="blue"><?php echo $r["date"];?></font>
      </a>
    </Td>
    
    <Td>
      <?php echo $r["prunning_day"];?>
    </Td>
     <Td>
      <?php echo $r["moisure"];?>
    </Td>
    
   <td>
      <a href="delete_irrigation.php?id=<?php echo $r['iid'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_irrigation.php?id=<?php echo $r['iid'];?>"> <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}
?>
</table>
</center>
<br><br>





