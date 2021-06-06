<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>
<body>


<table class="w3-table w3-bordered"  align="center" id="myTable" style="width: 50%">
  <br><br>
  <tr >
   
   
     <th><b>Sr.no</b></th>  
     <th><b>Plot No</b></th>
     <th><b>Fertilizer Name</b></th>
     <th><b>Date</b>
     <th><b>Delete</b> 
    <th><b>Edit</b></th>  
    
</tr>

<?php
$q = intval($_GET['q']);
 $i=1;
 $ses_id=$_SESSION['plot_id'];

$sql="SELECT * from tblfert1  WHERE plot_no = '".$q."' and ses_id='".$ses_id."' and status=0 order by date";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  ?>
  
<tr>
  <Td>
    <?php 
     echo $i;
     $i++;
    ?>
    </Td>
    
    <Td>
      <?php echo $r["plot_no"];?>
     
    </Td>

    <Td>
      <a href="view_fertilizzer.php?id=<?php echo $r['fid'];?>"> <font color="blue"><?php 
      $q1=mysqli_query($db,"select * from tblfertsession where fid=".$r['did']); 
     while ($r1=mysqli_fetch_array($q1)) 
     {

      echo $r1["fert_name"]." ";
    }
    ?>
  </font></a>
    </Td>
    
    <Td>
      <?php echo $r["date"];?>
     
    </Td>
  
    
    
   <td>
      <a href="delete_fert.php?id=<?php echo $r['fid'];?>"> <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_fertilizer1.php?id=<?php echo $r['fid'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}
?>
</table>




  