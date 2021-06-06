<br>
<!DOCTYPE html>
<html>
<head>
	<?php include ("head.php");?>
  <?php include('config.php');?>
	<title></title>
	  
</head>
<body>
<table id="myTable" border="1" align="center" class="table" style="width:70%">
<?php

$val= $_GET['q'];
$x=explode(' ',$val);
$ses_id=$_SESSION['plot_id'];
$total=0;
if(in_array("datewise", $x))
{
  if($x[0]=='allplot' && $x[2]=='cost')
  {
    ?>
   <tr>
    <td><b> Sr No.</b></td>
    <td><b>Date</b></td>
    <td><b>Particular</b></td>
    <td><b>Plot No</b></td>
    <td><b>Quantity</b></td>
    <td><b>Cost</b></td>
    <td><b>Method</b></td></div></div>
  </tr>
    <?php
    // $ses_id=$_SESSION['plot_id'];
    // $q1=mysqli_query($db,"SELECT * FROM tblfertilizer,tblp1 where tblp1.item_name=tblfertilizer.fertilizer_name order by tblfertilizer.date and tblfertilizer.ses_id='".$ses_id."' and ses_id=".$ses_id);

     $q1=mysqli_query($db,"SELECT fdate,fert_name,plot_no,qty_app,purchase_rate,method_app FROM tblfertsession where ses_id='".$ses_id."' and draft_status=0 order by fdate");
     // $q1=mysqli_query($db," SELECT date,fertilizer_name,plot_no,sum(qty_app) as qty,purchase_rate,method_app FROM tblfert where ses_id='".$ses_id."' and status=0 order by date");
    $i=1;
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fdate']; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>
            <td>
              <?php
                echo $r1['plot_no'];
              ?>
            </td>
            <td>
              <?php echo $r1['qty_app'].' Kg'; ?>
            </td>
            <td>
              <?php 
                $amt=$r1['purchase_rate']*$r1['qty_app'];
              echo $amt; ?>
            </td>
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
        <?php
        $total=$total+$amt;
        }
  }
  else
    if($x[0]!='allplot' && $x[2]=='cost')
  {
    ?>
 
   <tr>
     <td><b> Sr No.</b></td>
    <td><b>Date</b></td>
    <td><b>Particular</b></td>
   
    <td><b>Quantity</b></td>
    <td><b>Cost</b></td>
    <td><b>Method</b></td></div></div>
  </tr>
    <?php
     $ses_id=$_SESSION['plot_id'];
    $i=1;

    /*$q1=mysqli_query($db,"SELECT * FROM tblfertilizer,tblp1 where tblp1.item_name=tblfertilizer.fertilizer_name and  tblfertilizer.plot_no='".$x[0]."' order by tblfertilizer.date and tblfertilizer.ses_id='".$ses_id."' and tblp1.ses_id=".$ses_id);*/
    $q1=mysqli_query($db,"SELECT * FROM tblfertsession where plot_no='".$x[0]."' and ses_id='".$ses_id."' and draft_status=0  order by fdate");
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fdate']; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>
            <td>
              <?php echo $r1['qty_app'].' Kg'; ?>
            </td> 
            <td>
              <?php 
                $amt=$r1['purchase_rate']*$r1['qty_app'];
              echo $amt; ?>
            </td>
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
          <?php
         $total=$total+$amt;
        } 
  }
  else
    if($x[0]=='allplot' && $x[2]!='cost')
  {
    ?>
   <tr>
    <td><b> Sr No.</b></td>
    <td><b>Date</b></td>
    <td><b>Particular</b></td>
    <td><b>Plot No</b></td>
    <td><b>Quantity</b></td>
    <td><b>Method</b></td></div></div>
  </tr>
    <?php
    // $ses_id=$_SESSION['plot_id'];
    // $q1=mysqli_query($db,"SELECT * FROM tblfertilizer,tblp1 where tblp1.item_name=tblfertilizer.fertilizer_name order by tblfertilizer.date and tblfertilizer.ses_id='".$ses_id."' and ses_id=".$ses_id);

     $q1=mysqli_query($db,"SELECT fdate,fert_name,plot_no,qty_app,purchase_rate,method_app FROM tblfertsession where ses_id='".$ses_id."' and draft_status=0 order by fdate");
     // $q1=mysqli_query($db," SELECT date,fertilizer_name,plot_no,sum(qty_app) as qty,purchase_rate,method_app FROM tblfert where ses_id='".$ses_id."' and status=0 order by date");
    $i=1;
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fdate']; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>
            <td>
              <?php
                echo $r1['plot_no'];
              ?>
            </td>

              <?php 
                $amt=$r1['purchase_rate']*$r1['qty_app'];
               ?>
            <td>
              <?php echo $r1['qty_app'].' Kg'; ?>
            </td>
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
        <?php
        $total=$total+$amt;
        }
  }
  else
  {
    ?>
   <tr>
     <td><b> Sr No.</b></td>
    <td><b>Date</b></td>
    <td><b>Particular</b></td>
   
    <td><b>Quantity</b></td>
    <td><b>Method</b></td></div></div>
  </tr>
    <?php
     $ses_id=$_SESSION['plot_id'];
    $i=1;

    /*$q1=mysqli_query($db,"SELECT * FROM tblfertilizer,tblp1 where tblp1.item_name=tblfertilizer.fertilizer_name and  tblfertilizer.plot_no='".$x[0]."' order by tblfertilizer.date and tblfertilizer.ses_id='".$ses_id."' and tblp1.ses_id=".$ses_id);*/
    $q1=mysqli_query($db,"SELECT * FROM tblfertsession where plot_no='".$x[0]."' and ses_id='".$ses_id."' and draft_status=0  order by fdate");
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fdate']; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>

              <?php 
                $amt=$r1['purchase_rate']*$r1['qty_app'];
               ?>
            <td>
              <?php echo $r1['qty_app'].' Kg'; ?>
            </td> 
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
          <?php
         $total=$total+$amt;
        } 
  }
}
else
{
  if($x[0]=='allplot' && $x[2]=='cost')
  {
    ?>
    <tr>
     <td><b> Sr No.</b></td>
    <td><b>Particular</b></td>
    <td><b>Plot No</b></td>
    <td><b>Quantity</b></td>
    <td><b>Cost</b></td>
    <td><b>Method</b></td></div></div>
   </tr>
    <?php
     $ses_id=$_SESSION['plot_id'];
    $q1=mysqli_query($db,"SELECT fdate,fert_name,plot_no,sum(qty_app) as qty,purchase_rate,method_app FROM tblfertsession where ses_id='".$ses_id."' and draft_status=0 group by fert_name");
    $i=1;
        while($r1=mysqli_fetch_array($q1))
        {  ?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>
            <td>
              <?php echo $r1['plot_no']; ?>
            </td>
            <td>
              <?php echo $r1['qty'].' Kg'; ?>
            </td>
            <td>
              <?php 
                $amt=$r1['purchase_rate']*$r1['qty'];
              echo $amt; ?>
            </td>
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
        <?php
         $total=$total+$amt;
        }
  }
  else
    if($x[0]!='allplot' && $x[2]=='cost')
  {
    ?>
    <tr>
    <td><b>Sr No.</b></td>
      <td><b>Particular</b></td>
    <td><b>Quantity</b></td>
    <td><b>Cost</b></td>
    <td><b>Method</b></td></div></div>
  </tr>
    <?php
     $ses_id=$_SESSION['plot_id'];
    $i=1;
    $q1=mysqli_query($db,"SELECT * FROM tblfertsession where plot_no='".$x[0]."' and ses_id='".$ses_id."' and draft_status=0 group by fert_name");
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>
            <td>
              <?php echo $r1['qty_app'].' Kg'; ?>
            </td>
            <td>
              <?php 
                $amt=$r1['purchase_rate']*$r1['qty_app'];
              echo $amt; ?>
            </td>
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
          <?php
           $total=$total+$amt;  
        } 
  }
  if($x[0]=='allplot' && $x[2]!='cost')
  {
    ?>
    <tr>
     <td><b> Sr No.</b></td>
    <td><b>Particular</b></td>
    <td><b>Plot No</b></td>
    <td><b>Quantity</b></td>
    <td><b>Method</b></td></div></div>
  </tr>
    <?php
     $ses_id=$_SESSION['plot_id'];
    $q1=mysqli_query($db,"SELECT fdate,fert_name,plot_no,sum(qty_app) as qty,purchase_rate,method_app FROM tblfert where ses_id='".$ses_id."' and darft_status=0 group by fert_name");
    $i=1;
        while($r1=mysqli_fetch_array($q1))
        {?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>
            <td>
              <?php echo $r1['plot_no']; ?>
            </td>
            <td>
              <?php echo $r1['qty'].' Kg'; ?>
            </td>
              <?php 
                $amt=$r1['purchase_rate']*$r1['qty'];
             ?>
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
        <?php
         $total=$total+$amt;
        }
  }
  else
    if($x[0]!='allplot' && $x[2]!='cost')
  {
    ?>
    <tr>
    <td><b>Sr No.</b></td>
      <td><b>Particular</b></td>
    <td><b>Quantity</b></td>
    <td><b>Method</b></td></div></div>
  </tr>
    <?php
     $ses_id=$_SESSION['plot_id'];
    $i=1;
    $q1=mysqli_query($db,"SELECT * FROM tblfertsession where plot_no='".$x[0]."' and ses_id='".$ses_id."' and draft_status=0 group by fert_name");
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
              <td>
              <?php  echo $i; $i++; ?>
            </td>
            <td>
              <?php echo $r1['fert_name'];?>
            </td>
            <td>
              <?php echo $r1['qty_app'].' Kg'; ?>
            </td>
            
              <?php 
                $amt=$r1['purchase_rate']*$r1['qty_app'];
               ?>
          
            <td>
              <?php echo $r1['method_app']; ?>
            </td>
        </tr>
          <?php
           $total=$total+$amt;  
        } 
  }
}
?>
</table>
<br>
<div class="row" id="tworth">
    <div class="col-sm-4"></div>
    <div class="col-sm-5">
        <label><font color="black"><b>Total Worth:</b></font></label>
        <?php 
      echo $total;
   ?> 
</div></div>
</div></div>


</center>
</body>
</html>