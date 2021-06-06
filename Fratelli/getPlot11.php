<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>
<body class="sb-nav-fixed">


<table class="table"  align="center" id="myTable" style="width: 50%">
  <br><br>
  <tr >
   
   
     <th>
      <b>Sr.no</b></td>
    </th>  
     <th><b>Plot No</b></th>
    <th><b>Item Name</b></th>
     <th><b>Date</b>
    <th><b>Delete</b> 
    <th>
      <b>Edit</b>
    </th>  
    
</tr>

<?php
$q = intval($_GET['q']);
 $i=1;
 $ses_id=$_SESSION['plot_id'];

$sql="SELECT * from tbldisease1  WHERE plot_no = '".$q."' and ses_id='".$ses_id."' and status=0 order by sdate";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
 $q4=mysqli_query($db,"select count(*) as cnt from tbldissession where  did='".$r['did']."' and ses_id='".$ses_id."'");
   $r4=mysqli_fetch_array($q4);
         if($r4['cnt']!=0)
         {

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
      <a href="view_disease1.php?id=<?php echo $r['did'];?>"> <font color="blue"><?php 
      $q1=mysqli_query($db,"select * from tbldissession where did=".$r['did']); 
      $str=array();
     while ($r1=mysqli_fetch_array($q1)) 
     {

      array_push($str,$r1["item_name"]);
    }
    $str1=implode(',', $str);
    echo $str1;
    ?>
  </font></a>
    </Td>
    <Td>
      <?php echo $r["sdate"];?>
     
    </Td>
  
    
    
   <td>
      <a href="delete_disease1.php?id=<?php echo $r['did'];?>"> <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_disease1.php?id=<?php echo $r['did'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}}
?>
</table>




  