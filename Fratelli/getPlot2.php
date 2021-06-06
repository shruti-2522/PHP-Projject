<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>
<body> 

<table class="table"  align="center" id="myTable" style="width: 55%">
  <tr>
     
    <th>
     Slurry type</td>
    </th> 
    <th>Date</th>
   
    <th>Equipment used</th>
    <th>
     Delete
    </th> 
    <th>
      Edit</td>
    </th>  
    
</tr>

<?php
$q = intval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
$sql="SELECT * from tblsluryapp  WHERE plot_no = '".$q."' and ses_id='".$ses_id."' and status=0 order by date";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  ?>
  
<tr>
    
    <Td>
       <a href="view_sluryapp.php?id=<?php echo $r['sid'];?>">
       <font color="blue"><?php echo $r["slury_typ"];?></font>
      </a>
    </Td>
    <Td>
      <?php echo $r["date"];?>
    </Td>
    
    <Td>
      <?php echo $r["equipment_used"];?>
    </Td>
    
   <td>
      <a href="delete_sluryapp.php?id=<?php echo $r['sid'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </a>
    </td>

    <Td>
      <a href="edit_sluryapp.php?id=<?php echo $r['sid'];?>"> <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}
?>

</table>
</div>
<?php include('footer.php');?>
</div>
</div>
</div>


</body>
</html>

