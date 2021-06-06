<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>
  <link rel="stylesheet" href="css/t.css">
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
  
  
    <h2 class="container"><b>ADD ITEM-PURCHASE</b></h2>
<br><br>

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
 mysqli_query($db,"insert into tblp1(bill_no,date,supplier ,payment_mode,item_name,purchase_rate,act_qty,qty,reduce_qty,unit,act_unit,exp_date,NOF,batch_no,tot_amount,GST,SGST,CGST,net_total,PHI,disease,item_type,ses_id,status,multi_id,record_status)values('".$_SESSION['bill_no']."','".$_SESSION['date']."','".$_SESSION['supplier']."','".$_SESSION['payment_mode']."','$item_name','$purchase_rate','$txtqty','$txtqty1','$txtqty1','$txtunit','$act_unit','$txtedate','$txtno','$txtbatch','$txtamt','$GST','$txtsgst','$txtcgst','$total','$txtphi','$txtpest','$item_type','$ses_id','$status','$extra_id','$record_status')");

 //echo "<script>window.location.href='purchase.php';</script>";
  // exit;
  

 
}?>


  <br><br>




<form method="post" id="form" name="disease">


  <label><b>Item Name:</b></label>

   <div class="hide_data">
  
 <input type="text" class="form-control" id="realtxt" onkeyup="javascript:searchSel();"/>
     <select name="item_name" id="txtname" class="form-control" onchange="showUser(this.value);"  onclick="myfunc(this.value);" onkeyup="dropdown();">
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
                  <option value="addnew"  style="background-color: lightgreen" id="myModal"><b>Item not found</b>  </option>  
               <!--  <div id="item_name"> -->
              
        </select>
      </div>
      <div class="show_data"></div>
     
     

                 
                  <br><br>
<table class="table" border='1' align="center" style="margin-left:0%;width: 120%">
   <thead>
    <tr>    
      <td><b>Purchase Rate</b></td>
      <td><b>Quantity</b></td>
      <td><b>Unit</b></td>
      <td><b>Expiry Date</b></td>
      <td><b>NOS</b></td>
       <td><b>Batch No</b></td>
      <!--  <td><b>Amount</b></td> -->
       <td><b>GST</b></td>
      <td><b>SGST</b></td>
      <td><b>GGST</b></td>
      <td><b>Net Total</b></td>
      <td><b>PHI</b></td>

       </tr>
            </thead>
             <tbody>
               <tr class='tr_input'>
           
            <td>
            <input type="text" name="purchase_rate" class="form-control" id="purchase_rate" size="89">
          </td>
          <td>
          <input type="text" name="txtqty" class="form-control" ></td>
          <td>
             <select name="txtunit" id="txtunit" class="form-group">
             <Option value="">Unit:</option>
              <Option value="kg">Kg</option>
              <Option value="g">g</option>
              <Option value="ml">ml</option>
              <Option value="ltr">ltr</option>
       
      </SELECT>
         </td>
         <td>
            <input type="date" class="form-control" name="txtedate" id="txtedate"   placeholder="Enter Expiry Date" >
         </td>

          <td><input type="text" class="form-control" name="txtno" id="txtno"  onclick="multiply();"  onchange="calculateAmount(this.value)" size="100" required></td>
                <td> <input type="text" class="form-control" name="txtbatch" id="txtbatch"   onchange="calculateAmount1(this.value)" size="100" required></td>
                 
               <input type="text" class="form-control" name="total" id="total"  size="100" style="display: none;">
               <td><input type="text" class="form-control" name="GST" id="GST1"   size="100"   required></td>
               <td>
                  <input type="text" class="form-control" name="txtsgst" id="txtsgst" size="100">
               </td>
               <td>
                 <input type="text" class="form-control" name="txtcgst" id="txtcgst"  size="100">
               </td>
               <td>
                  <input type="text" class="form-control" name="txtamt" id="txtamt" size="100">
               </td>

               <td>

                     <input type="text" class="form-control" name="txtphi" id="txtphi" size="100"></td>
                     <td   style="border: none;border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden;">
                       <input type="text" class="form-control" name="txtpest"  id="txtpest" placeholder="Enter PHI" style="display: none;" size="100">
                     </td>
               <td   style="border: none;border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden;"> <input type="text" class="form-control" name="item_type"  id="item_type1" style="display: none;"  size="100"></td>
                  

               </tr>
             </tbody>


</table>
<br><br>
<input type='text' class='sub' name="txtsub1" id='txtsub1'   size="18"
value="<?php echo $sub; ?>" style='display: none;'></td>
<div style="margin-left: 90%">
  <button type="submit" name="btnsave" class="btn btn-success"><b>ADD</b></button>
 
</div>
<br>



</form>
<table border="1" style="width:95%;margin-left: 1%">
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
      <td>GGST</td>
      <td>Net Total</td>
      <td>PHI</td>
       

        </tr>
<?php
  $q1=mysqli_query($db,"select * from tblp1 where ses_id=".$ses_id." and record_status=0"); 
$i=2;
     while ($r=mysqli_fetch_array($q1)) 
     {
      
        ?>

       <tr>
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
 
 
 
     
    </tr>
    
    
          <?php
$z1=mysqli_num_rows($q);
//echo $i;
//echo $z1;
if($z1==$i)
{
//print_r($r);      
//echo implode(",", $r);
}
$i++;      
       }



       ?>

      </table>

<br>
<div align="center"> <!-- 
  <button type="Submit" class="w3-button w3-green w3-round " name="btndraft" formnovalidate><b>SAVE AS DRAFT</b></button> -->
 <button type="button" onclick="window.location.href='purchase.php'" class="btn btn-success" name="btnmove"><b>SAVE</b></button>
</div>
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
        <input type="text" placeholder="Enter Ingredient.." class="form-control" id="ingredient" name="ingredient" required>
      
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
        <select id="GST" name="GST" class="form-control"  required>
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


<script>
function myfunc(val){
 
 //var element=document.getElementById('pname');
 if(val=='addnew')
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
  else if($('#ingredient').val() == '')
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
  }
   
   
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
  //alert(amt);
  var GSTCal=amt*document.getElementById('GST1').value/100;
  var val=Number(document.getElementById('GST1').value);
  var sgst=GSTCal/2;
  var cgst=GSTCal/2;

  
  //display the result
  var GST=amt-(amt*val)/100;
  var divobj = document.getElementById('total');
  divobj.value = GST;
  document.getElementById('txtsgst').value=sgst;

 
  document.getElementById('txtcgst').value=cgst
  ;



}

</script>

<script type="text/javascript">
document.getElementById('txtname').onkeyup = searchSel;
function searchSel() 
    {
      var input = document.getElementById('realtxt').value.toLowerCase();
       
          len = input.length;
          output = document.getElementById('txtname').options;
      for(var i=0; i<output.length; i++)
          if (output[i].text.toLowerCase().indexOf(input) != -1 ){
          output[i].selected = true;
              break;
          }
      if (input == '')
        output[0].selected = true;
    }
</script>



 <script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
          
<?php //include("footer.php"); ?>



</body>
</html>