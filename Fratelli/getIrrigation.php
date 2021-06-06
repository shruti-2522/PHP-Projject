<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>


</head>

<body class="sb-nav-fixed">

  <br><br>
 
  
<table id="myTable"  border="1" class="table" style="width:80%;margin-left: 5%">
  <tr>
    <th>Sr no</th>
    <th>Date</th>
   <th>
     Plot No
    </th>  
    <th>
    Time
    </th>  
    <th>Moisure Before</th> 
   
    
</tr>

<?php
$q = strval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
if($q=='all plot')
{
  $i=1;

$sql="SELECT * from tblirrigation WHERE  ses_id='".$ses_id."' and status=0 order by date";

$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {

  ?>
  
<tr>

    
    <Td>
    
     <?php echo $i;
            $i++ ?>
    </Td>
    

    <Td>
    
      <?php echo $r["date"];?>
    </Td>
    
    <Td>
      <?php echo $r["plot_no"];?>
    </Td>
      <Td>
      <?php echo $r["duration"];?> hrs
    </Td>
     <Td>
      <?php echo $r["moisure"];?> days
    </Td>
    

  </tr>
<?php
}
}
else
{
  $i=1;

$sql="SELECT * from tblirrigation WHERE pname = '".$q."' and  ses_id='".$ses_id."' and status=0 order by date";

$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {

  ?>
  
<tr>

    
    <Td>
    
     <?php echo $i;
            $i++ ?>
    </Td>
    

    <Td>
    
      <?php echo $r["date"];?>
    </Td>
    
    <Td>
      <?php echo $r["plot_no"];?>
    </Td>
      <Td>
      <?php echo $r["duration"];?> hrs
    </Td>
     <Td>
      <?php echo $r["moisure"];?> days
    </Td>
    

  </tr>
<?php
}
}
?>
</table>

</body>
</html>




