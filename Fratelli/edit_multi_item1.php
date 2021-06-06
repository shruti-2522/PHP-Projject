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

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}

@media print {
    html, body {
        height: 99%;    
    }
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
<br>

<?php

  $extra_id=$_GET['id'];
  $ses_id=$_SESSION['plot_id'];


if(isset($_POST["btnsave"]))
{
  
  extract($_POST);
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
  //echo $txtqty;  
  $record_status=0;
 mysqli_query($db,"insert into tblp1(bill_no,date,supplier ,payment_mode,item_name,purchase_rate,act_qty,qty,reduce_qty,unit,act_unit,exp_date,NOF,batch_no,tot_amount,GST,SGST,CGST,PHI,disease,item_type,dose,ses_id,status,multi_id,record_status)values('".$_SESSION['bill_no']."','".$_SESSION['date']."','".$_SESSION['supplier']."','".$_SESSION['payment_mode']."','$item_name','$purchase_rate','$txtqty','$txtqty1','$txtqty1','$txtunit','$act_unit','$txtedate','$txtno','$txtbatch','$txtamt','$GST','$txtsgst','$txtcgst','$txtphi','$txtpest','$item_type','$dose','$ses_id','$status','$extra_id','$record_status')");

 //echo "<script>window.location.href='purchase.php';</script>";
  // exit;
  

 
}?>




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
             </div>
               <div class="show_data"></div>
       
</td>
            

            
      <td style="border: 1px solid black;">
            <input type="text" name="purchase_rate" class="form-control" id="purchase_rate">
          </td>
          <td style="border: 1px solid black;">
          <input type="text" name="txtqty" class="form-control" ></td>
          <td style="border: 1px solid black;">
             <select name="txtunit" id="txtunit" class="form-group">
             <Option value="">Unit:</option>
              <Option value="kg">Kg</option>
              <Option value="g">g</option>
              <Option value="ml">ml</option>
              <Option value="ltr">ltr</option>
       
      </SELECT>
         </td>
          <td style="border: 1px solid black;"><input type="text" class="form-control" name="txtno" id="txtno"  onclick="multiply();"  onchange="calculateAmount(this.value)" required></td>
   
         <td style="border: 1px solid black;">
            <input type="date" class="form-control" name="txtedate" id="txtedate"   placeholder="Enter Expiry Date" >
         </td>
         <td style="border: 1px solid black;"> <input type="text" class="form-control" name="txtbatch" id="txtbatch"   onchange="calculateAmount1(this.value)"  required></td>
                 
               <input type="text" class="form-control" name="total" id="total" style="display: none;">
              
              <input type="text" class="form-control" name="GST" id="GST1"     required style="display:none;">

                  <input type="text" class="form-control" name="txtsgst" id="txtsgst" style="display:none;">

                 <input type="text" class="form-control" name="txtcgst" id="txtcgst"   style="display:none;">
            
              
                  <input type="text" class="form-control" name="txtamt" id="txtamt" style="display:none;">
          

                     <input type="text" class="form-control" name="txtphi" id="txtphi" style="display:none;" >
                   
                       <input type="text" class="form-control" name="txtpest"  id="txtpest" placeholder="Enter PHI" style="display: none;">

                       
                     <input type="text" class="form-control" name="item_type"  id="item_type1" style="display: none;" >
                        <input type="text" class="form-control" name="dose"  id="dose" placeholder="Enter Dose.."  style="display: none;" >
                     

               </tr>
             </tbody>


</table>
<br><br>

<input type='text' class='sub' name="txtsub1" id='txtsub1'   size="18"
value="<?php echo $sub; ?>" style='display: none;'></td>


<div class="text-center">
  <button type="submit" name="btnsave" class="btn btn-success btn-sm"><b>ADD</b></button>
  <button type="button" class="btn btn-warning btn-sm" id="nm-button" onclick="modal();">CREATE NEW ITEM</button>
      
</div>
</form>
<br>


 <?php
$q2=mysqli_query($db,"select * from tblmultitem where multi_id=".$_GET['id']);
$r2=mysqli_fetch_array($q2);
  ?>


<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q1)) {
?>


<table  style="width:100%;">
  
  <tr>
    <td rowspan="2">
       <span class="text-success"><b><?php echo $r1['farm_name'];?></b></span><br>
         <?php echo $r1['addrs'];?><br>
         <?php echo $r1['taluka'];?>   <?php echo $r1['district'];?><br>
         <?php echo $r1['pin_code'];?><br>
          <i class="fa fa-phone" ></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i>
<?php echo $r1['email'];?>
</td>
    <td style="border:none;" colspan="2" class="text-center" >Bill No</td>
    <td  style="border: none;" class="text-center" colspan="2">Date</td>
    <td style="border:none;" colspan="2"  class="text-center">Supplier</td>
   
  </tr>
  <tr>
    <td style="border: none;" colspan="2"  class="text-center"><?php echo $r2['bill_no'];?><br></td>
    <td style="border: none;"  class="text-center" colspan="2"><?php echo $r2['date'];?></td>
    <td style="border: none;" colspan="2"  class="text-center"><?php echo $r2['supplier'];?></td>
    
  </tr>
 


</table>



<table border="1" style="width:100%;">
        <tr>
      <td>Item Name</td>
      <td>Purchase Rate</td>
      <td>Quantity</td>
      <td>Unit</td>
      <td>Expiry Date</td>
      <td>NOS</td>
      <td>Batch No</td>
      <td>GST</td>
      <td>SGST</td>
      <td>CGST</td>
      <td>Net Total</td>
      <td>PHI</td>
      <td>Net Total</td>
      <td>PHI</td>
       

        </tr>
<?php
    $q1=mysqli_query($db,"select * from tblp1 where ses_id=".$ses_id."  and multi_id=".$_GET['id']); 
    $i=2;
     while ($r=mysqli_fetch_array($q1)) 
     {
      
        ?>

       <tr id="<?php echo $r['id'] ?>">
     <td><?php  echo($r['item_name']); ?></td>
     <td><?php echo $r["purchase_rate"];?></td>
     <td><?php  echo($r['act_qty']); ?></td>
     <td><?php echo $r["act_unit"];?></td>
     <td><?php  echo($r['exp_date']); ?></td>
     <td><?php echo $r["NOF"];?></td>
     <td><?php echo $r["batch_no"];?></td>
     <td><?php echo $r["GST"];?></td>
     <td><?php echo $r["SGST"];?></td>
     <td><?php echo $r["CGST"];?></td>
     <td><?php echo $r["tot_amount"];?></td>
     <td><?php echo $r["PHI"];?></td>
     <td><a href="edit_mult_table.php?id1=<?php echo $r['id'];?>&id=<?php echo $_GET['id'];?>"><button class="btn btn-success btn-sm rounded-0" type="submit" name="btnupdate" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a></td>
     <td><button class="btn btn-danger btn-sm rounded-0 remove" type="button"  title="Delete"><i class="fa fa-trash"></i></button></a></td>
 
 
 
 
     
    </tr>
    
    
          <?php
$z1=mysqli_num_rows($q);
1;
if($z1==$i)
{

}
$i++;      
       }



       ?>

      </table>

<br>
<div style="margin-left: 1%"> 
  <button type="submit" name="btncancel" class="btn btn-danger" formnovalidate><b>CANCEL</b></button>
 <button type="button" onclick="window.location.href='purchase.php'" class="btn btn-success" name="btnmove"><b>SAVE</b></button>
</div>
<br>

<?php
}
?>

<!--MODAL BOX CODE-->          
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
        <input type="text" placeholder="Enter Ingredient.." class="form-control" id="ingredient" name="ingredient" >
      
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
        <select id="GST" name="GST" class="form-control" >
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
 /* var divobj = document.getElementById('total');
  divobj.value = GST;*/
  document.getElementById('txtsgst').value=sgst;

 
  document.getElementById('txtcgst').value=cgst
  ;



}

</script>

<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete_single_pur.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {

                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
</script>

<script src="select2.min.js"></script>
<script>
$("#txtname").select2( {
  placeholder: "Select Item",
  allowClear: true
  } );
</script>


<script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>         



</body>
</html>