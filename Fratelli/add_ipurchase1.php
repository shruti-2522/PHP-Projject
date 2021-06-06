<!doctype html>
<html>
<head>
<?php include ("head.php");?>
<?php include ("config.php");?>
<?php include ("header1.php");?>



    <!-- Script -->
    <script src='jquery-3.1.1.min.js' type='text/javascript'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- jQuery UI -->
    <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui.min.js' type='text/javascript'></script>


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
              document.getElementById("GST").value = data[0].GST;
               document.getElementById("txtphi").value = data[0].PHI;
                 document.getElementById("txtpest").value = data[0].pest;
                 document.getElementById("item_type").value = data[0].item_type;
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
    <h2 class="w3-container"><b>ADD ITEM-PURCHASE</b></h2>
<br><br>

<?php

  $ses_id=$_SESSION['plot_id'];
if(isset($_POST["btndraft"]))
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

 mysqli_query($db,"insert into tblp1(bill_no,date,supplier ,payment_mode,HSN,item_name,purchase_rate,qty,unit,exp_date,NOF,batch_no,tot_amount,GST,SGST,CGST,net_total,PHI,disease,item_type,ses_id,status)values('$txtbno','$txtdate','$txtpname','$txtpm','$txthsn','$item_name','$purchase_rate','$txtqty1','$txtunit','$txtedate','$txtno','$txtbatch','$txtamt','$GST','$txtsgst','$txtcgst','$total','$txtphi','$txtpest','$item_type','$ses_id','$status')");
  

echo "<script>window.location.href='add_growth_reg.php';</script>";
   exit;
  
  
 
}

if(isset($_POST["btnadd"]))
{
  extract($_POST);

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
 
 mysqli_query($db,"insert into tblp1(bill_no,date,supplier ,payment_mode,HSN,item_name,purchase_rate,qty,unit,exp_date,NOF,batch_no,tot_amount,GST,SGST,CGST,net_total,PHI,disease,item_type,ses_id,status)values('$txtbno','$txtdate','$txtpname','$txtpm','$txthsn','$item_name','$purchase_rate','$txtqty1','$txtunit','$txtedate','$txtno','$txtbatch','$txtamt','$GST','$txtsgst','$txtcgst','$total','$txtphi','$txtpest','$item_type','$ses_id','$status')");
  

echo "<script>window.location.href='add_growth_reg.php';</script>";
  exit;
  
  
 
}?>
<form method="post" id="myform">
   <div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-7">

  
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Bill No:</b></font></label>
                 <input type="text" class="form-control" name="txtbno" id="txtbno" placeholder="Enter Bill-no" required>
             
              </div>
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Enter Date:</b></font></label>
              <input type="date" class="form-control" name="txtdate" id="txtdate" placeholder="Enter Date" required>
              </div>
            </div> 


    
    <div class="row">
   <div class="col-sm-6" form-group>
                <label  class="control-label"><font color="black"><b>Supplier:</b></font></label>
              
         <!--  <input type='text' class="form-control" name="txtpname" id='autocomplete' autocomplete="off" placeholder="Enter Supplier"> -->

            <select name="txtpname" id="txtpname" class="form-control" required>
               <option value="">Select Supplier</option>
              
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
          <select name="txtpm" id="txtpm" class="form-control" required>
        <Option value="">Select Payment Mode</option>
        <Option value="cash">cash</option>
        <Option value="credit">credit</option>
           
        </select>
      </div></div>
       

<div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>HSN:</b></font></label>
  
   <input type="text" class="form-control" name="txthsn" id="company" placeholder="Enter HSN" required>
</div>
          </div>

<table class="w3-table" border="1">
  
        <tr rowspan="2">
          <th width="25%">
           <font color="black"> <b>Item Name</b></font>
        </th>
          <th width="25%">
           <font color="black"> <b>Purchase Rate</b></font>
        </th>
          <th><font color="black"><b>Quantity</b></font></th>
          <th><font color="black"><b>Unit</b></font></th>
           <th>
           <font color="black"> <b>Expiry Date:</b></font>
        </th>
         </tr>
            <tr rowspan="2">
              <td>
               <!--  <input type="text" class="form-control" name="item_name" id="txtname"  placeholder="Enter Item-name"  onkeyup="showUser(this.value);" autocomplete="off">
                 <div id="item_name"> -->
                  <select name="item_name" id="txtname" class="form-control" onchange="showUser(this.value);"  onclick="myfunc(this.value);">
               <option value="">Select Item Name</option>
              
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
              </td>
              <td>
            <input type="text" name="purchase_rate" class="form-control" id="purchase_rate" placeholder="Enter purchase_rate">
          </td>
          <td>
          <input type="text" name="txtqty" class="form-control" placeholder="Enter qty"></td>
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

        </tr>
        </table>


      <div class="row">
        <div class=" col-sm-6 form-group">
          <label><font color="black"><b>NOS:</b></font></label>
         
                     <input type="text" class="form-control" name="txtno" id="txtno" placeholder="Enter NOS" onkeyup="multiply()" required>
              
              </div>
          
           
      <div class="col-sm-6 form-group">
          <label><font color="black"><b>Batch No:</b></font></label>
          
            <input type="text" class="form-control" name="txtbatch" id="txtbatch" placeholder="Enter batch no"   onchange="calculateAmount(this.value)"  required>
          </div>
        </div>
       
<div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>Amount:</b></font></label>
    <input type="text" class="form-control" name="total" id="total" placeholder="Net Total" required>
  </div>
   <div class="col-sm-6 form-group">

          <label><font color="black"><b>GST(%):</b></font></label>
         
                     <input type="text" class="form-control" name="GST" id="GST" placeholder="Net Total"  required>
              
              </div>
            </div>


<div class="row">
 <div class="col-sm-6 form-group">
          <label><font color="black"><b>SGST AMOUNT:</b></font></label>
         
                     <input type="text" class="form-control" name="txtsgst" id="txtsgst" placeholder="SGST">
              
              </div>

  
        <div class="col-sm-6 form-group">
          <label><font color="black"><b>CGST AMOUNT:</b></font></label>
         
                     <input type="text" class="form-control" name="txtcgst" id="txtcgst" placeholder="SGST">
              
              </div>
            </div>

<div class="row">
              <div class="col-sm-6 form-group">
          <label><font color="black"><b>Net Total:</b></font></label>
         
                     <input type="text" class="form-control" name="txtamt" id="txtamt" placeholder="Enter amount">
              
              </div>

                <div class="col-sm-6 form-group">
          <label><font color="black"><b>PHI</b></font></label>
         
                     <input type="text" class="form-control" name="txtphi" id="txtphi" placeholder="Enter PHI">
              
              </div>
            </div>

<div class="row">
              <div class="col-sm-6 form-group">
        
                     <input type="text" class="form-control" name="txtpest" style="display: none" id="txtpest" placeholder="Enter PHI">
              
              </div>
</div>

           

    <input type="text" class="form-control" name="item_type" style="display: none"   id="item_type" placeholder="Enter">

          <div class="form-group">
              <div align="center">
            <button type="submit"  name="btnadd"  class="btn btn-success"><b>ADD</button>
              <button type="submit"  name="btndraft"  class="btn btn-success" formnovalidate><b>SAVE AS DRAFT</button>
            </div>
        </div>
          

<script>
function myfunc(val){
 
 //var element=document.getElementById('pname');
 if(val=='addnew')
 {
 window.location="add_item1.php";
   //alert("hello");=
 }
}
</script>

          
          
     
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

  
<script>

  function multiply() {
  a = Number(document.getElementById('purchase_rate').value);
  b = Number(document.getElementById('txtno').value);
  c = a * b;

  document.getElementById('txtamt').value = c;
}
 </script>
<script>
function calculateAmount()
{ 
  var  amt=Number(document.getElementById('txtamt').value);
  var GSTCal=amt*document.getElementById('GST').value/100;
  var val=Number(document.getElementById('GST').value);
  var sgst=GSTCal/2;
  var cgst=GSTCal/2;

  
  /*display the result*/
  var GST=amt-(amt*val)/100;
  var divobj = document.getElementById('total');
  divobj.value = GST;
  document.getElementById('txtsgst').value=sgst;

 
  document.getElementById('txtcgst').value=cgst
  ;



}

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<?php //include('footer.php');?>
 <script src="js/reload.js"></script>
</form>

    </div>
</div>
</div>
</form>
</body>
</html>
