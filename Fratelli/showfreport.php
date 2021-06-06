<br>
<!DOCTYPE html>
<html>
<head>
<?php include ("config.php");?>
	<title></title>
	
</head>
<body class="sb-nav-fixed">
<?php

$val= $_GET['q'];
//echo $val;
$x=explode(' ',$val);
//print_r($x);
$ses_id=$_SESSION['plot_id'];
if(in_array("datewise", $x))
{
  ?>
  <table class="table" id="myTable" border="1px" style="width: 65%;margin-left: 19%;" >
  <tr>
   <td><b>Date</b></td>
    <td><b>Particular</b></td>
    <td><b>Plot No</b></td>
    <td><b>Quantity</b></td>
    <td><b>Rate</b></td>
    <td><b>Total</b></td>
      <td><b>Party Name</b></td>
    </tr>

  <?php
  $total=0;
 for($i=0;$i<sizeof($x);$i++)
    {
      $str=$x[$i];
      $str1=explode('-', $str);
//      print_r($str1);
      $q1=mysqli_query($db,"SELECT * FROM tblsale1 where item_name='".$str1[0]."' and variety='".$str1[1]."' and  status=0 and ses_id='".$ses_id."' order by date");
        
          while($r1=mysqli_fetch_array($q1))
          {
            ?>
          <tr>
            <td>
              <?php echo $r1['date']; ?>
            </td> 
            <td>
              <?php 
                    echo $r1['item_name']."-".$r1['variety'];   
             ?>
            </td>
            <td>
              <?php 
                     echo $r1['plot_no'];
               ?>
            </td>
            <td>
              <?php echo $r1['qty'].' Kg'; ?>
            </td>
            <td>
              <?php echo $r1['rate']; ?>
            </td>
            <td>
              <?php echo $r1['amount']; ?>
            </td>
            <td>
              <?php echo $r1['paccount_name']; ?>
            </td>
        </tr>

            <?php
                    $total= $total+$r1['amount'];

         }//while
  }//for
?>
</table>
<div align="center" style="margin-left: 43%">
<div class="row">
      <div class="col-sm-10 form-group" style="margin-left: 90%"></div>
        <center><label><font color="black"><b>Total Worth:</b></font></label></center>
        <div class="col-sm-0 form-group">
         <font color="black"><?php 
      echo $total;
   ?> </font></div>
</div></div>

<?php
}//if
else
{
?>
 <table class="table" id="myTable" border="1px" style="width: 60%;margin-left: 19%;" >
    <tr>
    <td><b>Particular</b></td>
    <td><b>Plot No</b></td>
    <td><b>Quantity</b></td>
  </tr>

  <?php
 $total=0;
 for($i=0;$i<sizeof($x);$i++)
    {
      $str=$x[$i];
      $str1=explode('-', $str);
    //  print_r($str1);
      $q1=mysqli_query($db,"select DISTINCT fruit_name,variety,plot_no, sum(total_amount) as qty1 from tblharvest where fruit_name='".$str1[0]."' and variety='".$str1[1]."' and ses_id='".$ses_id."' GROUP by fruit_name");
        while($r1=mysqli_fetch_array($q1))
        {
              //$x=array();
              $q2=mysqli_query($db,"SELECT sum(qty)as qty2,item_name FROM tblsale1 where item_name='".$r1['fruit_name']."' and variety='".$r1['variety']."' and status=0 and ses_id='".$ses_id."' group by item_name");
              $r2=mysqli_fetch_array($q2);
              
          ?>
          <tr>
            <td>
              <?php 
                    echo $r1['fruit_name']."-".$r1['variety'];   
              
              ?>
            </td>
            <td>
              <?php 
                     echo $r1['plot_no'];
               ?>
            </td>
            <td>
              <?php 
            //  echo $r1['qty1']."kg";
              //echo $r2['qty2'].'Kg'; 
              echo round($r1['qty1'],2)-round($r2['qty2'],2).' Kg'; 
              ?>
            </td>
          
        </tr>
        <?php

        }//while

    }//for
}//else
?>
</body>
</html>