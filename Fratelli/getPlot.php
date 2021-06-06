<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>
<body class="sb-nav-fixed">
 


<table class="table"  id="myTable" style="width: 40%; margin-left: 30%">
<br><br>
  <tr>
     
    <th>
      Fertilizer Name
    </th> 
    <th>Date</th>
   
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

$sql="SELECT * from tblfert1 WHERE plot_no = '".$q."' and  ses_id='".$ses_id."' order by fdate";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  $q4=mysqli_query($db,"select count(*) as cnt from tblfertsession where  fert_id='".$r['fert_id']."' and ses_id='".$ses_id."'");

         $r4=mysqli_fetch_array($q4);
         if($r4['cnt']!=0)
         {


  ?>
  
<tr>
    
    <Td>
       <a href="view_fertilizer.php?id=<?php echo $r['fert_id'];?>">
        <font color="blue">
        <?php
          $q1=mysqli_query($db,"select * from tblfertsession where fert_id=".$r['fert_id']); 
          $str=array();
     while ($r1=mysqli_fetch_array($q1)) 
     {
        array_push($str, $r1['fert_name']);
 
    }
    $str1=implode(',', $str);
    echo $str1;
    
    ?>
    </font>
      </a>
    </Td>
    <Td>
      <?php echo $r["fdate"];?>
    </Td>
   
  
   <td>
      <a href="delete_fertilizer1.php?id=<?php echo $r['fert_id'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
    </td>

    <Td>
      <a href="edit_fertilizer1.php?id=<?php echo $r['fert_id'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
    </td>

  </tr>
<?php
}}
?>
</table>
<br><br>





