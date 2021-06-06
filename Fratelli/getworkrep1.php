<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>

</head>
<br><br>
<table class="table" id="myTable" style="width:45%; margin-left: 12%" border="1">
     <th><b>Work Description</b></th>  
       <th><b>Date</b></th>  
          
    </th>  
</tr>
<?php
$q = intval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
if($q=='all plot')
{
$sql="SELECT * from tblother WHERE  ses_id='".$ses_id."'";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  $work=explode(',',$r["work_desc"]);
  for($i=0;$i<sizeof($work);$i++)
  {
  ?>
  
<tr>
    
    <Td>
     
      <?php echo $work[$i];?>
      </a>
    </Td>
    <Td>
      <?php echo $r["date"];?>
    </Td>
    
  
    
  
  </tr>
<?php
}
}
}
else
{
$sql="SELECT * from tblother WHERE plot_no = '".$q."' and ses_id='".$ses_id."'";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  $work=explode(',',$r["work_desc"]);
  for($i=0;$i<sizeof($work);$i++)
  {
  ?>
  
<tr>
    
    <Td>
      
      <?php echo $work[$i];?>
      </a>
    </Td>
    <Td>
      <?php echo $r["date"];?>
    </Td>
    
  
    
  
  </tr>
<?php
}
}

}
?>
</table>
</center>

<br><br>






