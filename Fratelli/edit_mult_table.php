<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>
  <?php include('config.php');?>
  <link rel="stylesheet" href="css/t.css">
   <link rel="stylesheet" href="select2.min.css" />
<style>
.select2-dropdown {top: 22px !important; left: 8px !important;}
#nm-button {
  text-transform: uppercase;
  color: white;
  font-weight:600;
}



</style>
  <script type="text/javascript">
      function showUser(str) {
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              
             
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;

              document.getElementById("GST1").value = data[0].GST;
               document.getElementById("txtphi").value = data[0].PHI;
                 document.getElementById("txtpest").value = data[0].pest;

                 document.getElementById("item_type1").value = data[0].item_type;
                  document.getElementById("dose").value = data[0].dose;


              console.log(data[0]['item_type']);
            }
          };

          xmlhttp.open("GET", "getData.php?str=" + str, true);
          xmlhttp.send();
        }
      }
    </script>
      
  
  

</head>
<body class="sb-nav-fixed">
<?php include('header.php');?>
  
  
  <div style="margin-left: -8%;">
<h2 class="container"><b>EDIT ITEM-PURCHASE</b></h2></div>



<?php

  $extra_id=$_GET['id'];
  $ses_id=$_SESSION['plot_id'];


if(isset($_POST["btnsave"]))
{
  
  extract($_POST);
  $act_unit=rtrim($txtunit);
  $u=rtrim($txtunit);  
  // $status=1;
 $txtqty1=0;
   if($u=='kg')
 {
  $txtqty1=$txtqty1+$txtqty;
  $txtunit1='kg';
 }
 else
    if($u=='ltr')
 {
  $txtqty1=$txtqty1+$txtqty;
  $txtunit1='ltr';
 }
 else
  if($u=='g')
  {
   $txtqty1=$txtqty*0.001;
    $txtunit1='kg';
  }
   else
  if($u=='ml')
  {
   $txtqty1=$txtqty*0.001;
    $txtunit1='ltr';
  }
  //echo $txtqty;  
  $record_status=0;
  $pid=$_GET['id'];

 mysqli_query($db,"update tblp1 set item_name='$item_name',purchase_rate='$purchase_rate',act_qty='$txtqty',qty='$txtqty1',reduce_qty='$txtqty1',act_unit='$act_unit',unit='$txtunit1',exp_date='$txtedate',NOF='$txtno',batch_no='$txtbatch',exp_date='$txtedate',tot_amount='$txtamt',GST='$GST',SGST='$txtsgst',CGST='$txtcgst',PHI='$txtphi',disease='$txtpest',item_type='$item_type',dose='$dose',status=0 where id=".$_GET["id1"]);
  echo "<script>window.location.href='edit_multi_item1.php?id=$pid';</script>";
    exit;
  

  }

 $q1=mysqli_query($db,"select * from tblp1 where id=".$_GET["id1"]);
  $r1=mysqli_fetch_array($q1);


 
?>


  <br>


<form method="post" id="form" name="disease">
       <br><br>
<table class="table  w-auto"  style="width: 100%;">
   <thead>
   <thead>
    <tr>
     <td rowspan="2"  style="border: 1px solid black;"><b>Item Name</b></td>   
      <td style="border: 1px solid black;"><b>Purchase Rate</b></td>
      <td style="border: 1px solid black;"><b>Pkg.Qty</b></td>
      <td style="border: 1px solid black;"><b>Unit</b></td>
      <td style="border: 1px solid black;"><b>NOS</b></td>
      <td style="border: 1px solid black;"><b>Expiry Date</b></td>
      <td style="border: 1px solid black;"><b>Batch No</b></td>
     </tr>
</thead>
             
      <tbody>
            <tr class='tr_input'>
           
           <td style="border: 1px solid black;">                 
                <div class="hide_data">
                     <select name="item_name" id="txtname" class="form-control" onchange="showUser(this.value);"  onkeyup="dropdown();">
                        <option value="<?php echo $r1['item_name'];?>"selected><?php echo $r1['item_name'];?></option>
              
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
             </div>
               <div class="show_data"></div>
       
</td>
            

            
      <td style="border: 1px solid black;">
            <input type="text" name="purchase_rate" class="form-control" id="purchase_rate"  value="<?php echo $r1['purchase_rate'];?>">
          </td>
          <td style="border: 1px solid black;">
          <input type="text" name="txtqty" class="form-control"  value="<?php echo $r1['act_qty'];?>"></td>
          <td style="border: 1px solid black;">
             <select name="txtunit" id="txtunit" class="form-group">
             <Option value="<?php echo $r1['act_unit'];?>"selected><?php echo $r1['act_unit'];?></option>
              <Option value="kg">Kg</option>
              <Option value="g">g</option>
              <Option value="ml">ml</option>
              <Option value="ltr">ltr</option>
       
      </SELECT>
         </td>
          <td style="border: 1px solid black;"><input type="text" class="form-control" name="txtno" id="txtno"  onclick="multiply();"  onchange="calculateAmount(this.value)"  value="<?php echo $r1['NOF'];?>"></td>
   
         <td style="border: 1px solid black;">
            <input type="date" class="form-control" name="txtedate" id="txtedate"  value="<?php echo $r1['exp_date'];?>"   >
         </td>

         <td style="border: 1px solid black;"> <input type="text" class="form-control" name="txtbatch" id="txtbatch"   onchange="calculateAmount1(this.value)"   value="<?php echo $r1['batch_no'];?>"></td>
                 
               <input type="text" class="form-control" name="total" id="total" style="display: none;"   value="<?php echo $r1['net_total'];?>">
              
              <input type="text" class="form-control" name="GST" id="GST1"  value="<?php echo $r1['GST'];?>"   style="display:none;">

                  <input type="text" class="form-control"  name="txtsgst" value="<?php echo $r1['SGST'];?>" id="txtsgst" style="display:none;">

                 <input type="text" class="form-control" name="txtcgst" id="txtcgst" value="<?php echo $r1['CGST'];?>"  style="display:none;">
            
              
                  <input type="text" class="form-control" name="txtamt" id="txtamt"  value="<?php echo $r1['tot_amount'];?>" style="display:none;">
          

                     <input type="text" class="form-control" name="txtphi" id="txtphi" style="display:none;" value="<?php echo $r1['PHI'];?>">
                   
                       <input type="text" class="form-control" name="txtpest"  id="txtpest" placeholder="Enter PHI" style="display: none;"  value="<?php echo $r1['disease'];?>">

                       
                     <input type="text" class="form-control" name="item_type"  id="item_type1" style="display: none;" value="<?php echo $r1['item_type'];?>">

                        <input type="text" class="form-control" name="dose"  id="dose" placeholder="Enter Dose.."  style="display: none;"  value="<?php echo $r1['dose'];?>">
                     

               </tr>
             </tbody>


</table>
<br>

<input type='text' class='sub' name="txtsub1" id='txtsub1'   size="18"
value="<?php echo $sub; ?>" style='display: none;'></td>


<div class="text-center">
<button type="button" class="btn btn-warning btn-sm" id="nm-button" onclick="modal();">CREATE NEW ITEM</button>
 <button type="submit" name="btnsave" class="btn btn-success btn-sm"><b>UPDATE</b></button>      
</div>

<br>
</form>


<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
  <h4 class="modal-title"><b>ADD ITEM</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
  <div class="row">
  <div class="col-sm-6 form-group">
        
        <label><b>Item Name:</b></label>
        <input type="text" placeholder="Enter Item Name.." class="form-control" name="item_name"  id="item_name" required>
       
      </div>
 
  <div class="col-sm-6 form-group">
       <label><b>Item Type:</b></label>
         <select name="item_type" id="item_type" class="form-control">
        <Option value="text">Select Item</option>
        <Option value="Pesticide">pesticide</option>
        <Option value="Insecticide">insecticide</option>
        <Option value="Fungicide">fungicide</option>
        <Option value="Fertilizer">fertilizer</option>
        <Option value="Growth Regulator">growth regulator</option>
        <Option value="Assets">assets</option>
      </SELECT>
      </div>
    
  </div>
   <div class="row">
  <div class="col-sm-6 form-group">
        
        <label><b>Ingredient:</b></label>
        <input type="text" placeholder="Enter Ingredient.." class="form-control" id="ingredient" name="ingredient">
      
      </div>
    
  <div class="col-sm-6 form-group">
       <label><b>PHI:</b></label>
       <input type="text" placeholder="Enter Pre Harvest Interval.." name="phi"  id="phi" class="form-control">
      </div>
    </div>
    
    <div class="row">
       <div class="col-sm-3 form-group">
        <label><b>MR:</b></label>
        <input type="text" placeholder="Enter MR ..." name="mri"  id="mri" class="form-control">
      </div>
    
  <div class="col-sm-5 form-group">
       <label><b>Recommended Dose:</b></label>
       <input type="text" placeholder="Enter Recommended Dose.." class="form-control" name="dose" id="dose">
      </div>
    
   <div class="col-sm-4 form-group">
        
        <label><b>Unit:</b></label>
         <select name="runit" class="form-control" id="runit">
        <Option value="text">Select Unit</option>
        <Option value="per litter">per lit</option>
        <Option value="per acre">per acre</option>
        
      </SELECT>
      </div>
    </div>

    <div class="row">
  
  <div class="col-sm-6 form-group">
       <label><b>For Pest/Disease</b></label>
       <select name="disease" id="disease" class="form-control">
        <Option value="text">Select Pest/Disease</option>
        <Option value="Downy mildwe">Downy mildew</option>
        <Option value="Powdery mildew">Powdery mildew</option>
          <Option value="Thrips">Thrips</option>
        <Option value="Milibug">Milibug</option>
          <Option value="Jeside">Jeside</option>
        <Option value="Steam borer">Steam borer</option>
          <Option value="Red Mites">Red Mites</option>
          <Option value="Early bite">Early bite</option>
        <Option value="Late bite">Late bite</option>        
      </SELECT>
      </div>
    
     <div class="col-sm-6 form-group">
      <label><b>Company Name:</b></label>
     <input type="text" class="form-control" placeholder="Enter Company Name.." name="company" id="company">
     </div>
    </div>

 
 <div class="row">
  <div class="col-sm-6 form-group">
        
        <label><b>GST:</b></label>
        <select id="GST" name="GST" class="form-control"  >
                 <option value="" disabled selected>Choose your option</option>
                  <option value="5">5%</option>
                   <option value="12">12%</option>
                    <option value="18">18%</Coption>
                    <option value="20">20%</option>
                 
            </select>
       
      </div>
</div></div>


   
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script type="text/javascript">
  function modal()
  {

  
 $(document).ready(function(){
    $("#add_data_Modal").modal('show');
  });

 $(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#item_name').val() == "")  
  {  
   alert("Item Name is required");  
  }  
  else if($('#item_type').val() == '')  
  {  
   alert("Item Type is required");  
  }  
 /* else if($('#ingredient').val() == '')
  {  
   alert("Ingredient is required");  
  }
  
   
    else if($('#phi').val() == '')
  {  
   alert("PHI is required");  
  }
   else if($('#mri').val() == '')
  {  
   alert("MR is required");  
  }
    else if($('#dose').val() == '')
  {  
   alert("Recommended dose is required");  
  }
   else if($('#runit').val() == '')
  {  
   alert("Unit is required");  
  }
   else if($('#disease').val() == '')
  {  
   alert("Pest/Disease is required");  
  }
   else if($('#company').val() == '')
  {  
   alert("Company is required");  
  }
   else if($('#GST').val() == '')
  {  
   alert("GST is required");  
  }*/
   
   
  else  
  {
   //alert("hwwllo");
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     //$('#employee_table').html(data); 
     $(".hide_data").hide();

     $(".show_data").html(data); 
    }  
   });  
  }  
 });


}); 
 }



</script>
<script src="select2.min.js"></script>
<script>
$("#txtname").select2( {
  placeholder: "Select Item",
  allowClear: true
  } );
</script>

<script>
function calculateAmount()

{ 

  a = Number(document.getElementById('purchase_rate').value);

  b = Number(document.getElementById('txtno').value);
  c = a * b;
  
  document.getElementById('txtamt').value = c;
  

}

</script>
<script>
function calculateAmount1()

{ 
  document.getElementById('txtamt').value = c;
  var  amt=Number(document.getElementById('txtamt').value);

  var GSTCal=amt*document.getElementById('GST1').value/100;
  var val=Number(document.getElementById('GST1').value);
  var sgst=GSTCal/2;
  var cgst=GSTCal/2;

  
  //display the result
  var GST=amt-(amt*val)/100;
  /*var divobj = document.getElementById('total');
  divobj.value = GST;*/
  document.getElementById('txtsgst').value=sgst;

 
  document.getElementById('txtcgst').value=cgst
  ;



}

</script>




 <script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>    
<?php //include("footer.php"); ?>



</body>
</html>