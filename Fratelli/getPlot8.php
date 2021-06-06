<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>
</head>
<br>
<body>
 
 

<table class="table" align="center" id="myTable" style="width:45%; margin-left:20%">
  <tr c>
   
     <th>
    Sample No</td>
    </th> 
    
    <th> Date</th>
    
    <th>Delete</th> 
    <th>
       Edit</td>
    </th>  
    
</tr>

<?php
$q = intval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
$sql="SELECT * from tblwater WHERE plot_no = '".$q."' and ses_id='".$ses_id."' and status=0 order by date";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  ?>
  
<tr>
    
    <Td>
       <a href="view_water.php?id=<?php echo $r['water_id'];?>">
       <font color="blue"><?php echo $r["sample_no"];?></font>
      </a>
    </Td>
    <Td>
      <?php echo $r["date"];?>
    </Td>
    
  
    
   <td>
      <a href="delete_water.php?id=<?php echo $r['water_id'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_water.php?id=<?php echo $r['water_id'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}
?>
</table>
</center>

<br><br>






