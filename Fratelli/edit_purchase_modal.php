<!doctype html>
<html>
<head>
<?php include ("head.php");?>
<?php include ("config.php");?>
<?php //include ("header1.php");?>

<script>
function myfunc(val){
 
 //var element=document.getElementById('pname');
 if(val=='addnew')
 {
$(document).ready(function(){
    $("#myModal").modal('show');
  });
 }
}
</script>




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
  <?php  include('header.php');?>
    <h2 class="container"><b>EDIT ITEM-PURCHASE</b></h2>
<br><br>

<?php
$ses_id=$_SESSION['plot_id'];
if(isset($_POST["btnsave"]))
{
  extract($_POST);
   $status=1;
 
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
  mysqli_query($db,"update tblp1 set bill_no='$txtbno',date='$txtdate',supplier='$txtpname',payment_mode='$txtpm',item_name='$item_name',purchase_rate='$purchase_rate',qty='$txtqty1',unit='$txtunit',exp_date='$txtedate',NOF='$txtno',batch_no='$txtbatch',exp_date='$txtedate',tot_amount='$txtamt',GST='$GST',SGST='$txtsgst',CGST='$txtcgst',net_total='$total',PHI='$txtphi',disease='$txtpest',item_type='$item_type',status=0 where id=".$_GET["id"]);
  echo "<script>window.location.href='purchase.php';</script>";
    exit;
  

  }

 $q1=mysqli_query($db,"select * from tblp1 where id=".$_GET["id"]);
  $r1=mysqli_fetch_array($q1);
?>
<form method="post" id="myform">
   <div class="w3-container w3-bordered">
 <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-7">

  
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Bill No:</b></font></label>
                 <input type="text" class="form-control" name="txtbno" id="txtbno" placeholder="Enter Bill-no" value="<?php echo $r1['bill_no'];?>">
             
              </div>
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Enter Date:</b></font></label>
              <input type="date" class="form-control" name="txtdate" id="txtdate" placeholder="Enter Date" value="<?php echo $r1['date'];?>">
              </div>
            </div> 


    
    <div class="row">
   <div class="col-sm-6" form-group>
                <label  class="control-label"><font color="black"><b>Supplier:</b></font></label>
              
          <!-- <input type='text' class="form-control" name="txtpname" id='autocomplete' autocomplete="off" placeholder="Enter Supplier" value="<?php echo $r1['supplier'];?>"> -->
            <select name="txtpname" id="txtpname" class="form-control">
               <option value="<?php echo $r1['supplier'];?>"selected><?php echo $r1['supplier']; ?></option>
              
                <?php
                    $q=mysqli_query($db,"select distinct(name) from tblledger where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtpname){
                ?>
                        <option value="<?php echo $txtpname['name'];?>"><?php echo $txtpname['name'];?></option>
                <?php
                    }
                ?>
              </select>
     </div>
       
<div class="col-sm-6 form-group">
          <label><font color="black"><b>Payment  Type:</b></font></label>
          <select name="txtpm" id="txtpm" class="form-control">
        <Option value="<?php echo $r1['payment_mode']?>"selecetd><?php echo $r1['payment_mode']?></option>
        <Option value="cash">cash</option>
        <Option value="credit">credit</option>
           
        </select>
      </div></div>
       

<!-- <div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>HSN:</b></font></label>
  
   <input type="text" class="form-control" name="txthsn" id="company" placeholder="Enter HSN" value="<?php echo $r1['HSN']?>">
</div>
          </div>
 -->
<table class="table" border="1">
  
        <tr rowspan="2">
          <th width="25%">
           <font color="black"> <b>Item Name</b></font>
        </th>
          <th width="25%">
           <font color="black"> <b>Purchase Rate</b></font>
        </th>
          <th><font color="black"><b>Qunatity</b></font></th>
          <th width="15%"><font color="black"><b>Unit</b></font></th>
           <th>
           <font color="black"> <b>Expiry Date:</b></font>
        </th>
         </tr>
            <tr rowspan="2">
              <td>
              <!--   <input type="text" class="form-control" name="item_name" id="txtname"  placeholder="Enter Item-name"  onkeyup="showUser(this.value);" autocomplete="off" value="<?php echo $r1['item_name']?>">
                 <div id="item_name"></div> -->

<div class="hide_data">
             <select name="item_name" id="txtname" class="form-control" onchange="showUser(this.value);" onclick="myfunc(this.value)">
               <option value="<?php echo $r1['item_name']?>"selected><?php echo $r1['item_name']?></option>
              
                <?php
                    $q=mysqli_query($db,"select item_name from tblitem where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $item_name){
                ?>
                        <option value="<?php echo $item_name['item_name'];?>"><?php echo $item_name['item_name'];?></option>
                <?php
                    }
                ?>
                 <option value="addnew" style="background-color: lightgreen"><b>Item not found</b>  </option>  
                <div id="item_name">
        </select>
      </div>
       <div class="show_data"></div>
              </td>
              <td>
            <input type="text" name="purchase_rate" class="form-control" id="purchase_rate" placeholder="Enter purchase_rate" value="<?php echo $r1['purchase_rate']?>">
          </td>
          <td>
          <input type="text" name="txtqty" class="form-control" placeholder="Enter qty" value="<?php echo $r1['qty']?>"></td>
          <td>
             <select name="txtunit" id="txtunit" class="form-control">
             <Option value="<?php echo $r1['unit']?>"selected><?php echo $r1['unit']?></option>
              <Option value="kg">Kg</option>
              <Option value="g">g</option>
              <Option value="ml">ml</option>
              <Option value="ltr">ltr</option>
       
      </SELECT>
         </td>
         <td>
            <input type="date" class="form-control" name="txtedate" id="txtedate"   placeholder="Enter Expiry Date"
            value="<?php echo $r1['exp_date']?>">
         </td>

        </tr>
        </table>


      <div class="row">
        <div class=" col-sm-6 form-group">
          <label><font color="black"><b>NOS:</b></font></label>
         
                     <input type="text" class="form-control" name="txtno" id="txtno" placeholder="Enter NOS" onclick="calculateAmount(this.value)"  value="<?php echo $r1['NOF']?>">
              </div>
          
           
      <div class="col-sm-6 form-group">
          <label><font color="black"><b>Batch No:</b></font></label>
          
            <input type="text" class="form-control" name="txtbatch" id="txtbatch" placeholder="Enter batch no"   onclick="calculateAmount1(this.value)" value="<?php echo $r1['batch_no']?>">
          </div>
        </div>
       
<div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>Amount:</b></font></label>
    <input type="text" class="form-control" name="total" id="total" placeholder="Net Total" value="<?php echo $r1['tot_amount']?>">
  </div>
   <div class="col-sm-6 form-group">

          <label><font color="black"><b>GST(%):</b></font></label>
         
                     <input type="text" class="form-control" name="GST" id="GST1" placeholder="Enter GST" value="<?php echo $r1['GST']?>" >
              
              </div>
            </div>


<div class="row">
 <div class="col-sm-6 form-group">
          <label><font color="black"><b>SGST AMOUNT:</b></font></label>
         
                     <input type="text" class="form-control" name="txtsgst" id="txtsgst" placeholder="SGST" value="<?php echo $r1['SGST']?>">
              
              </div>

  
        <div class="col-sm-6 form-group">
          <label><font color="black"><b>CGST AMOUNT:</b></font></label>
         
                     <input type="text" class="form-control" name="txtcgst" id="txtcgst" placeholder="CGST" value="<?php echo $r1['CGST']?>">
              
              </div>
            </div>

<div class="row">
              <div class="col-sm-6 form-group">
          <label><font color="black"><b>Net Total:</b></font></label>
         
                     <input type="text" class="form-control" name="txtamt" id="txtamt" placeholder="Enter amount" value="<?php echo $r1['net_total']?>">
              
              </div>
              <div class="col-sm-6 form-group">
          <label><font color="black"><b>PHI</b></font></label>
         
                     <input type="text" class="form-control" name="txtphi" id="txtphi" placeholder="Enter PHI"  value="<?php echo $r1['PHI']?>">
              
              </div>
            </div>


<div class="row">
              <div class="col-sm-6 form-group">
        
                     <input type="text" class="form-control" name="txtpest" style="display: none;" id="txtpest" placeholder="Enter PHI">
              
              </div>
</div>
   

           

    <input type="text" class="form-control" name="item_type" style="display: none"  id="item_type1" placeholder="Enter PHI">

            <div class="form-group">
              <div align="center">
            <button type="submit"  name="btnsave"  class="btn btn-success"><b>UPDATE</button>
          
        </div>
          
          
</form>

          
     
<!-- 
 <script>
  $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "fetchData1.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#autocomplete').val(ui.item.label);
                 // display the selected text
                
                return false;
            }
        });

   });
 
  
  </script>

 -->

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
         <select name="item_type" id="item_type1" class="form-control">
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
  <div class="col-sm-4 form-group">
        
        <label><b>Ingredient:</b></label>
        <input type="text" placeholder="Enter Ingredient.." class="form-control" id="ingredient" name="ingredient" required>
      
      </div>
      <div class="col-sm-4 form-group">
       <label><b>Quantity:</b></label>
        <input type="text" class="form-control" placeholder="Enter Quantity" name="qty" id="qty" required>
      </div>
    

  <div class="col-sm-4 form-group">
        
        <label><b>Unit:</b></label>
        <select name="unit" id="unit" class="form-control">
        <Option value="text">Select Unit</option>
        <Option value="gm">gm</option>
        <Option value="kg">kg</option>
        <Option value="ml">ml</option>
        <Option value="ltr">ltr</option>
      </SELECT>
      </div>
  </div>
  <div class="row">
  <div class="col-sm-6 form-group">
       <label><b>PHI:</b></label>
       <input type="text" placeholder="Enter Pre Harvest Interval.." name="phi"  id="phi" class="form-control">
      </div>
    
       <div class="col-sm-6 form-group">
        <label><b>MR:</b></label>
        <input type="text" placeholder="Enter MR ..." name="mri"  id="mri" class="form-control">
      </div>
    </div>
  
  <div class="row">
  <div class="col-sm-6 form-group">
       <label><b>Recommended Dose:</b></label>
       <input type="text" placeholder="Enter Recommended Dose.." class="form-control" name="dose" id="dose">
      </div>
    
   <div class="col-sm-6 form-group">
        
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
        <select id="GST" name="GST" class="form-control" onchange="calculateAmount(this.value)" required>
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
   else if($('#qty').val() == '')
  {  
   alert("Quantity is required");  
  }
   else if($('#unit').val() == '')
  {  
   alert("Unit is required");  
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


    </div>
</div>
</div>
<script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>     
</body>
</html>
