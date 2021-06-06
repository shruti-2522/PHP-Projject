<?php include('config.php'); ?>
<?php

if(!empty($_POST))
{
    extract($_POST);
 $output = '';

 $ses_id=$_SESSION['plot_id'];

  //echo "hello";
  //echo $name;
  //print_r($_POST);
 
  
  
$act_unit=$txtunit;
  
  // $status=1;
 $txtqty1=0;
   if($txtunit=='kg')
 {
  $txtqty1=$txtqty1+$txtqty;
  $txtunit='kg';
 }
 else
    if($txtunit=='ltr')
 {
  $txtqty1=$txtqty1+$txtqty;
  $txtunit='ltr';
 }
 else
  if($txtunit=='g')
  {
   $txtqty1=$txtqty*0.001;
    $txtunit='kg';
  }
   else
  if($txtunit=='ml')
  {
   $txtqty1=$txtqty*0.001;
    $txtunit='ltr';
  }
mysqli_query($db,"insert into tblp1(bill_no,date,supplier ,payment_mode,item_name,purchase_rate,act_qty,qty,unit,act_unit,exp_date,NOF,batch_no,tot_amount,GST,SGST,CGST,net_total,PHI,disease,item_type,ses_id,status)values('$txtbno','$txtdate','$txtpname','$txtpm','$item_name','$purchase_rate','$txtqty','$txtqty1','$txtunit','$act_unit','$txtedate','$txtno','$txtbatch','$txtamt','$GST','$txtsgst','$txtcgst','$total','$txtphi','$txtpest','$item_type','$ses_id','$status')");

  
  
  
}
?>
 <select name='txtpest[]' id='pest_"+index+"' class='pest' onchange='showUser5(this.value)' onclick='myfunc1(this.value)'><option value=''>Select Pesticide</option><?php  $q=mysqli_query($db,'select distinct(item_name) FROM tblp1 WHERE (tblp1.item_type="Pesticide" or tblp1.item_type="Insecticide" or tblp1.item_type="Fungicide") and status=0 and ses_id='.$ses_id.'');?> <?php foreach ($q as $txtpest){ ?><option value='<?php echo $txtpest['item_name'];?>'><?php echo $txtpest['item_name'];?><?php } ?></option><option value='addnew' style='background-color: lightgreen'><b>Add New Fertilizer</b></option><div id='item_name'></div></select>