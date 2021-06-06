<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>
<body>

<table class="table" align="center" id="myTable" style="width:50%;margin-left: 25%">
  <tr >
 
   
     <th>
     Plot Name</td>
    </th>  
    
    <th> Date</th>
    
   
    <th>
       Prunning days</td>
    </th> 
    
    <th>Delete</th> 
    <th>
     Edit</td>
    </th>  
    
</tr>

<?php
$q = intval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
$sql="SELECT * from tblvisit WHERE plot_no = '".$q."' and  ses_id='".$ses_id."' and status=0 order by date";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  ?>
  
<tr>
    
    <Td>
       <a href="view_visit.php?id=<?php echo $r['vid'];?>">
       <font color="blue"><?php echo $r["pname"];?>
      </a></font>
    </Td>
    <Td>
      <?php echo $r["date"];?>
    </Td>
    
 
    <Td>
      <?php echo $r["prunning_day"];?>
    </Td>
    
   <td>
      <a href="delete_visit.php?id=<?php echo $r['vid'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_visit.php?id=<?php echo $r['vid'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}
?>
</table>

<br><br>





