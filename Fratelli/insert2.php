<?php include('config.php'); ?>
<style type="text/css">
  #nm-button {
  text-transform: uppercase;
  color: white;
  font-weight:600;
}


</style>
<?php

if(!empty($_POST))
{
    extract($_POST);
 $output = '';

 $ses_id=$_SESSION['plot_id'];

  
  
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
mysqli_query($db,"insert into tblmultitem(bill_no,date,supplier ,payment_mode,ses_id,status)values('$txtbno','$txtdate','$txtpname','$txtpm','$ses_id','$status')");
  
 $q=mysqli_query($db,"select max(multi_id) as maxid from tblmultitem"); 
    $r=mysqli_fetch_array($q);
    $id=0;
    $id=$id+$r['maxid'];
    $red_qty=$txtqty1*$txtno;

 
 $record_status=1;
 mysqli_query($db,"insert into tblp1(bill_no,date,supplier ,payment_mode,item_name,purchase_rate,act_qty,qty,reduce_qty,unit,act_unit,exp_date,NOF,batch_no,tot_amount,GST,SGST,CGST,PHI,disease,item_type,dose,ses_id,status,multi_id,record_status)values('$txtbno','$txtdate','$txtpname','$txtpm','$item_name','$purchase_rate','$txtqty','$txtqty1','$red_qty','$txtunit','$act_unit','$txtedate','$txtno','$txtbatch','$txtamt','$GST','$txtsgst','$txtcgst','$txtphi','$txtpest','$item_type','$dose','$ses_id','$status','$id','$record_status')");

  
  
  
}
?>
 
  
 <select name="txtpest" id="pest_1" class="pest form-control" onchange="showUser3(this.value);" size="1" required>
        <option value="">Select Pesticide</option>
              
                <?php
                $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"SELECT distinct item_name FROM tblp1 WHERE (tblp1.item_type='Pesticide' or tblp1.item_type='Insecticide' or tblp1.item_type='Fungicide' or tblp1.item_type='Fertilizer' or tblp1.item_type='Growth Regulator') and status=0 and ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtpest){
                ?>
                        <option value="<?php echo $txtpest['item_name'];?>"><?php echo $txtpest['item_name'];?></option>
                <?php
                    }
                ?>
        
         
        </select>
  


