<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>
<meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<body>
  
<table class="table" align="center" id="myTable" style="width: 40%;margin-left: 25%">
  <tr>
   
   
     <th>
      Work Description</td>
    </th>  
    
    <th> Date</th>
    
    
    <th> Delete</th> 
    <th>
     Edit</td>
    </th>  
    
</tr>
<?php
$q = intval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
$sql="SELECT * from tblother WHERE plot_no = '".$q."' and ses_id='".$ses_id."' and status=0 ";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  ?>
  
<tr>
    
    <Td>
       <a href="view_other_work.php?id=<?php echo $r['oid'];?>">
       <font color="blue"><?php echo $r["work_desc"];?></font>
      </a>
    </Td>
    <Td>
      <?php echo $r["date"];?>
    </Td>
    
  
    
   <td>
      <a href="delete_other_work.php?id=<?php echo $r['oid'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_other_work.php?id=<?php echo $r['oid'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}
?>
</table>
</center>
</div>
</div>
</div>
</div>
<br><br>






