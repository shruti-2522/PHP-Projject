
<?php include('config.php'); ?>
<?php include('head.php');?>
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
 $output = '';

 

 // echo $item_name;

    $ses_id=$_SESSION['plot_id'];
    $item_type =$_POST["item_type"];  
     $ingredient =$_POST["ingredient"];  
     $qty = $_POST["qty"];  
     $unit =$_POST["unit"];  
    $phi =$_POST["phi"];  
     $mri = $_POST["mri"];  
     $dose = $_POST["dose"];  
      $runit = $_POST["runit"];  
     $disease= $_POST["disease"]; 
      $mri =  $_POST["mri"];  
     $company =$_POST["company"];   
     $GST =  $_POST["GST"];  
      $item_name =$_POST["item_name"]; 
  

   if($unit=='kg')
 {
  $qty1=$qty1+$qty;
  $unit='kg';
 }
 else
    if($unit=='ltr')
 {
  $qty1=$qty1+$qty;
  $unit='ltr';
 }
 else
  if($unit=='gm')
  {
   $qty1=$qty*0.001;
    $unit='kg';
  }
   else
  if($unit=='ml')
  {
   $qty1=$qty*0.001;
    $unit='ltr';
  }

  $query=mysqli_query($db,"
      INSERT INTO tblitem(item_name, item_type,ingredient,qty,unit,PHI,MRI,dose,runit,pest,company,GST,ses_id)  VALUES('$item_name', '$item_type','$ingredient','$qty1','$unit','$phi','$mri','$dose','$runit','$disease','$company','$GST','$ses_id') ");
  
  
  
}
?>


                          
             <select name="item_name" id="txtname" class="form-control" onchange="showUser(this.value);"  onkeyup="dropdown();">
                        <option value="">Select Item Name</option>
              
                         <?php
                          $ses_id=$_SESSION['plot_id'];
                          $q=mysqli_query($db,"select item_name from tblitem where ses_id=".$ses_id);
                  
                           foreach ($q as $item_name){
                         ?>
                        <option value="<?php echo $item_name['item_name'];?>"><?php echo $item_name['item_name'];?></option>
                    <?php
                    }
                 ?>
                
                <div id="item_name"></div>
               </select>


            
            


