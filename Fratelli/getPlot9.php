<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>
</head>
<br>
<body>
 

<table class="table" align="center" id="myTable" style="width: 50%;margin-left:20%" >
  <tr>
   
     <th>
      Sr.no</td>
    </th>  
     <th> Plot No</th>
    <th> Date</th>
     <th> Plot Name</th>
    <th> Delete</th> 
    <th>
      Edit</td>
    </th>  
    
</tr>

<?php
$q = intval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
$sql="SELECT * from tblsoil WHERE plot_no = '".$q."' and ses_id='".$ses_id."' and status=0 order by date";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  ?>
  
<tr>
  <Td>
      <?php echo $r["soil_id"];?>
    </Td>
    
    <Td>
       <?php echo $r["plot_no"];?>
      </a>
    </Td>

    <Td>
      <?php echo $r["date"];?>
    </Td>
    
    <Td>
      <a href="view_soil.php?id=<?php echo $r['soil_id'];?>"><font color="blue"><?php echo $r["pname"];?></a></font>
    </Td>
 
   <td>
      <a href="delete_soil.php?id=<?php echo $r['soil_id'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_soil.php?id=<?php echo $r['soil_id'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}
?>
</table>
</center>
<br><br>





