<br>
<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>
	<title></title>
	
</head>
<body class="sb-nav-fixed">
  <table id="myTable"  border="1" class="table" style="width:110%;margin-left:-9%">

<?php

$val= $_GET['q'];
$x=explode(' ',$val);
if (($key = array_search('Growth', $x)) !== false) 
{
    unset($x[$key]);
    unset($x[$key+1]);
    array_push($x, 'Growth Regulator');
}
$ses_id=$_SESSION['plot_id'];
if(in_array("datewise", $x))
{
	?>
  <tr>
    <td><b>Sr. No.</b></td>
	 <td><b>Date</b></td>
    <td><b>Particular</b></td>
    <td><b>Type</b></td>
    <td><b>Quantity</b></td>
    <td><b>Rate</b></td>
     <td><b>NOS</b></td>
    <td><b>Total</b></td>
      <td><b>Party Name</b></td>
    </tr>

	<?php
$total=0;
 foreach($x as $v)
 		{
		         $q1=mysqli_query($db,"SELECT * FROM tblp1 where item_type='".$v."' and status=0 and ses_id='".$ses_id."' order by date");
        $i=1;
   			while($r1=mysqli_fetch_array($q1))
   			{
   				?>
   				<tr>
            <td>
            <?php echo $i;
                  $i++;
             ?>
            </td> 
   					<td>
   						<?php echo $r1['date']; ?>
   					</td> 
   					<td>
   						<?php echo $r1['item_name'];?>
   					</td>
   					<td>
   						<?php 
                     echo $r1['item_type'];
              ?>
   					</td>
   					<td>
   						<?php echo round($r1['qty'],2).' '.$r1['unit']; ?>
   					</td>
   					<td>
   						<?php echo $r1['purchase_rate']; ?>
   					</td>
            <td>
                <?php echo $r1['NOF']; ?>
            </td>
   					<td>
   					<?php  $NOF=$r1["NOF"];
             $rate=$r1["purchase_rate"];
             $t=$NOF*$rate;
             echo(round($t,2));
              ?>
   					</td>
   					<td>
              <?php echo $r1['supplier']; ?>
            </td>
   			</tr>
   			<?php
   			$total= $total+$t;

   			}
		
    } 
    ?>
    </table>
    <div align="center" style="margin-left: 40%">
<div class="row">

      <div class="col-sm-10 form-group" style="margin-left: 90%"></div>
        <center><label><font color="black"><b>Total Worth:</b></font></label></center>
        <div class="col-sm-0 form-group">
         <font color="black"><?php 
      echo round($total,2);
   ?> </font></div>
</div></div>

<?php
}



else
{
	?>

<table id="myTable"  border="1" class="table" style="width:75%;margin-left:1%">
		<tr>
    <td><b>Sr. No.</b></td>
		<td><b>Particular</b></td>
		<td><b>Type</b></td>
		<td><b>Quantity</b></td>
		
   
	</tr>

	<?php
 foreach($x as $v)
 		{
      
      $i=1;
  		$q1=mysqli_query($db,"SELECT item_name,item_type,unit,sum(reduce_qty)as qty1,purchase_rate,supplier FROM tblp1 where item_type='".$v."' and status=0 and ses_id='".$ses_id."' group by item_name");
   	    while($r1=mysqli_fetch_array($q1))
   			{
   				?>
   				<tr>
            <td>
              <?php echo $i;
                  $i++;
              ?>
            </td>
   					<td>
   						<?php echo $r1['item_name'];?>
   					</td>
   					<td>
                     <?php 
                           echo $r1['item_type'];
                     ?>
                  </td>
                  
   				     <td>
                     <?php
                   /*  $q2=mysqli_query($db,"SELECT sum(aqty)as qty2 FROM tbldissession where item_name='".$r1['item_name']."' and draft_status=0 and ses_id='".$ses_id."' group by item_name");
                      $r2=mysqli_fetch_array($q2);
                      //echo $r2['qty2'];
                      $q3=mysqli_query($db,"SELECT sum(qty_app)as qty3 FROM tblfertsession where fert_name='".$r1['item_name']."' and draft_status=0 and ses_id='".$ses_id."' group by fert_name");
                      $r3=mysqli_fetch_array($q3);
                     // echo $r3['qty3'];
                      $q4=mysqli_query($db,"SELECT sum(quantity)as qty4 FROM tblgrowthsession where gr_name='".$r1['item_name']."' and draft_status=0 and ses_id='".$ses_id."' group by gr_name");
                      $r4=mysqli_fetch_array($q4);
                      //echo $r3['qty4'];
                     $add=$r2['qty2']+$r3['qty3']+$r4['qty4'];
                     //echo $add;
                     $sub=$r1['qty1']-$add;
                     echo round($sub,2).$r1['unit'];*/

                     ?>

                     <?php 
                      echo round($r1['qty1'],2)." ".$r1['unit'];
                     ?>
                  </td>
                  	
              
              
   			</tr>
   			<?php
		$total= $total+$t; 
   			}

		}
		
}
?>

</table>

<?php include('footer.php');?>

</center>
</body>
</html>