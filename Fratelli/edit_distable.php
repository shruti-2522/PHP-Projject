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
      function showUser3(str) {
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
         // alert('hello');
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              
             
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;
              document.getElementById("batch_1").value = data[0].batch_no;
              document.getElementById("phi_1").value = data[0].PHI;
              document.getElementById("edate_1").value = data[0].exp_date;
              document.getElementById("disease_1").value = data[0].disease;
              document.getElementById("item_1").value = data[0].item_type;
            document.getElementById("rate_1").value = data[0].purchase_rate;
              document.getElementById("reduce").value = data[0].reduce_qty;
                document.getElementById("rqty_1").value = data[0].dose;

            document.getElementById("aunit_1").value = data[0].act_unit;
              console.log(data[0]['act_unit']);
            }
          };

          xmlhttp.open("GET", "getRate.php?str=" + str, true);
          xmlhttp.send();
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
<?php
 
//$did=$_GET['id'];
$id=$_GET['id'];
$sub=$_SESSION['txtsub']; 
$txtpdays=$_SESSION['txtpdays'];
$txtharvest=$_SESSION['txtharvest'];

if(isset($_POST["btnupdate"]))
{
 
 extract($_POST);
 $ses_id=$_SESSION['plot_id'];
$z=$_POST['txtappl'];
 $w=$_POST['txtrqty'];
 $x=$_POST['txtuqty'];
 $v=$_POST['txtaqty'];
 $u=$_POST['txtaunit'];
 
        if($u=='kg')
        {
            $v=$v;
            $w=$w;
            $x=$x;
            $z=$z;
            $u='kg';
        }
        else
          if($u=='ltr')
        {
            $v=$v;
            $w=$w;
            $x=$x;
            $z=$z;
            $u='ltr';
        }
        else
          if($u=='g')
        {
            $v=$v*0.001;
            $w=$w*0.001;
            $x=$x*0.001;
            $z=$z*0.001;
            $u='kg';
        }
        else
           if($u=='ml')
        {
             $v=$v*0.001;
            $w=$w*0.001;
            $x=$x*0.001;
            $z=$z*0.001;
            $u='ltr';
        }
    
    
    $rate=$_POST['txtrate'];
    $tot=$rate*$v; 
  
$status=0;
// echo $v;
// echo $z;
// echo $txtreduce;
if($v==$z)
{
      $txtreduce=$txtreduce;
}
else if($v>$z)
{
  $f1=$v-$z;
  $txtreduce=$txtreduce-$f1;
}
else if($v<$z)
{
  $f2=$z-$v;
  $txtreduce=$txtreduce+$f2;
}
echo"\n";
//echo $txtreduce;  

if($v <= $txtreduce)
{

    mysqli_query($db,"update tbldissession set item_name='$txtpest',bno='$txtbno',edate='$txtedate',disease='$txtdisease',phi='$txtphi',Arqty='$txtrqty',Auqty='$txtuqty',Aaqty='$txtaqty',rqty='$v',uqty='$w',aqty='$x',reduce_qty='$txtreduce',aunit='$u',act_unit='$txtaunit',purchase_rate='$rate', total='$tot',item_type='$item',status=0 where d_id=".$_GET["id1"]);

mysqli_query($db,"update tblp1 set reduce_qty='$txtreduce' where  item_name='".$txtpest."'");
}
else
{
echo "<script>alert('Quantity Exceeds Stock Limit'); </script>";  
} 

      echo "<script>window.location.href='edit_disease3.php?id=$id'</script>";
       exit;

}
?>

  <br><br>



<!---MODAL BOX CODE --->
<div id="add_data_Modal" class="modal fade" >
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
  <h4 class="modal-title"><b>ADD ITEM PURCHASE</b></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
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

                    $ses_id=$_SESSION['plot_id'];
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
<div class="Table">
  
    <div class="Heading">
        <div class="Cell">
            <p>Item Name</p>
        </div>
        <div class="Cell">
            <p>Purchase Rate</p>
        </div>
        <div class="Cell">  
            <p>Quantity</p>
        </div>
         <div class="Cell">
            <p>Unit</p>
        </div>
         <div class="Cell">
            <p>Expiry Date</p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
           <p>
             
              <select name="item_name" id="txtname" class="form-control" onchange="showUser(this.value);"  onclick="myfunc(this.value);" onkeyup="dropdown();">
               <option value="">Select Item Name</option>
              
                <?php
                $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"SELECT distinct item_name FROM tblitem WHERE (tblitem.item_type='Pesticide' or tblitem.item_type='Insecticide' or tblitem.item_type='Fungicide'  or tblitem.item_type='Fertilizer' or tblitem.item_type='Growth Regulator')  and ses_id=".$ses_id);
                  
                  
                    foreach ($q as $item_name){
                ?>
                        <option value="<?php echo $item_name['item_name'];?>"><?php echo $item_name['item_name'];?></option>
                <?php
                    }
                ?>
                  <option value="addnew"  style="background-color: lightgreen" id="myModal">Item not found</option>  
               <!--  <div id="item_name"> -->
              
        </select>
           </p>
        </div>
         <div class="Cell">
            <p> <input type="text" name="purchase_rate" class="form-control" id="purchase_rate" placeholder="Enter purchase_rate"></p>
        </div>
         <div class="Cell">
            <p> <input type="text" name="txtqty" id="txtqty1" class="form-control" placeholder="Enter qty"></td></p>
        </div>
        <div class="Cell">
           <select name="txtunit" id="txtunit1" class="form-group">
             <Option value="">Unit:</option>
              <Option value="kg">Kg</option>
              <Option value="g">g</option>
              <Option value="ml">ml</option>
              <Option value="ltr">ltr</option>
       
      </SELECT>
        </div>
        <div class="Cell">
            <p>  <input type="date" class="form-control" name="txtedate" id="txtedate1"   placeholder="Enter Expiry Date" ></p>
        </div>
    </div>
    
</div>
<br>

 <div class="row">
        <div class=" col-sm-6 form-group">
          <label><font color="black"><b>NOS:</b></font></label>
         
                     <input type="text" class="form-control" name="txtno" id="txtno" placeholder="Enter NOS" onclick="multiply();"  onchange="calculateAmount(this.value)" required>
              
              </div>
          
           
      <div class="col-sm-6 form-group">
          <label><font color="black"><b>Batch No:</b></font></label>
          
            <input type="text" class="form-control" name="txtbatch" id="txtbatch" placeholder="Enter batch no"   onchange="calculateAmount1(this.value)"  required>
          </div>
        </div>


<div class="row">
   <div class="col-sm-6 form-group">

          <label><font color="black"><b>GST:</b></font></label>
         
                     <input type="text" class="form-control" name="GST" id="GST1" placeholder="GST"  required>
              
              </div>
            
 <div class="col-sm-6 form-group">
          <label><font color="black"><b>SGST:</b></font></label>
         
                     <input type="text" class="form-control" name="txtsgst" id="txtsgst" placeholder="SGST">
              
              </div>
            </div>

  
  <div class="row">
        <div class="col-sm-6 form-group">
          <label><font color="black"><b>CGST:</b></font></label>
         
                     <input type="text" class="form-control" name="txtcgst" id="txtcgst" placeholder="CGST">
              
              </div>
            
              <div class="col-sm-6 form-group">
          <label><font color="black"><b>Net Total:</b></font></label>
         
                     <input type="text" class="form-control" name="txtamt" id="txtamt" placeholder="Net total">
              
              </div>
            </div>

<div class="row">
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



<div class="row">
              <div class="col-sm-6 form-group">
        
                     <input type="text" class="form-control" name="dose" style="display: none" id="dose" placeholder="Enter dose">
              
              </div>
</div>

          

    <input type="text" class="form-control" name="item_type" style="display: none"   id="item_type1" placeholder="Enter">


          <div class="form-group">
              <div align="center">
            <button type="submit"  name="btnadd"  class="btn btn-success"><b>ADD</b></button>
            
            </div>
        </div>
 </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
<form method="post">
  <?php
$q1=mysqli_query($db,"select * from tbldissession where d_id=".$_GET['id1']); 
$r1=mysqli_fetch_array($q1);

?>
  <div class="hide_data">
<div class="row">
  <label><b>Name Of Pesticide</b></label>
<div class="col-sm-4">
  
                  <select name="txtpest" id="pest_1" class="pest form-control" onchange="showUser3(this.value)" size="1" required>
                    <option value="<?php echo $r1['item_name']; ?>"><?php echo $r1['item_name']; ?></option>
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

          <div id="item_name"></div>
        </select>
      </div>
      
       <div class="col-sm-3">
        <input type="button" class="btn btn-success btn-sm" id="nm-button" value="ADD NEW PURCHASE" onclick="modal();">
      </div>
      </div>
    </div>
      <div class="show_data"></div>
      

   
                  <br><br>

<table class="table" border='1' align="center" style="margin-left:1%;width: 100%">
   <thead>
            <tr>    
      <th><font color="black"><b>Batch No.</b></font></th>
      <th><font color="black"><b>Expiry Date</b></font></th>
      <th><font color="black"><b>For pest/disease</b></font></th>
      <th ><font color="black"><b>PHI</b></font></th>
      <th><font color="black"><b>Recommended Qty/lit</b></font></th>
       <th><font color="black"><b>Used Qty/lit</b></font></th>
      <th><font color="black"><b>Actual Applied Qty</b></font></th>
      <th><font color="black"><b>Unit</b></font></th>
       </tr>
            </thead>
             <tbody>
               <tr class='tr_input'>
           
                   <td><input type='text' class='batch' value="<?php echo $r1['bno']; ?>" name="txtbno" id='batch_1' size="3"></td>
                  <td><input type='text' class='Expdate' value="<?php echo $r1['edate']; ?>" name="txtedate" id='edate_1' size="15"></td>
                   <td><input type='text' class='disease' value="<?php echo $r1['disease']; ?>" name="txtdisease" id='disease_1' size="15"></td>
                      <td><input type='text' class='phi' value="<?php echo $r1['phi']; ?>" name="txtphi" id='phi_1'   size="3"></td>
                       <td><input type='text' class='rqty' name="txtrqty" value="<?php echo $r1['Arqty']; ?>" id='rqty_1'   size="5"></td>
                <td><input type='text' class='uqty' name="txtuqty" value="<?php echo $r1['Auqty']; ?>" id='uqty_1' size="5" onclick='sub2();'></td>
                 
                <td><input type='text' class='aqty' value="<?php echo $r1['Aaqty']; ?>" name="txtaqty" id='aqty_1' size="2" > </td>
               <td> <input type='text' name='txtaunit' value="<?php echo $r1['act_unit']; ?>" class='aunit' id='aunit_1' size='3' readonly></td>
                  <td style="border: none; border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden; "><input type='text' class='rate' name="txtrate" value="<?php echo $r1['purchase_rate']; ?>" id='rate_1' style="display: none" size="2" > </td>
                   <td  style="border: none;border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden;"><input type='text' class='item' style="display: none" name="item" value="<?php echo $r1['item_type']; ?>" id='item_1'  size="7"> </td>
                     <td  style="border: none;border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden;"><input type='text' class='total' name="txttot" value="<?php echo $r1['total']; ?>" id='tot_1' size="2" style="display: none"> </td>
                         <td  style="border: none;border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden;"><input type='text' class='reduce' name="txtreduce" id='reduce' value="<?php echo $r1['reduce_qty']; ?>" size="2" style="display: none;"></td>
<td style="border: none;border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden;"><input type='text' class='xyz' value="<?php echo $r1['Aaqty']; ?>" name="txtappl" id='any' size="2" style="display: none;"> </td>
<!-- <td>
 <td>        
             <input type='text' class='rate' name="txtrate[]" id='rate_1' size="2"  >
           </td>
 -->
               </tr>
             </tbody>

</table>
<input type='text' class='sub' name="txtsub1" id='txtsub1'   size="18"
value="<?php echo $sub; ?>" style='display: none;'></td>

<input type='text' class='sub' name="txtharvest" id='txtharvest'   size="18"
value="<?php echo $txtharvest; ?>" style="display:none;"></td>

<input type='text' class='sub' name="txtpdays" id='txtpdays'   size="18"
value="<?php echo $txtpdays; ?>" style="display: none;"></td>
<br><br>
<div style="margin-left: 35%">
  <button type="submit" name="btnupdate" class="btn btn-success"><b>UPDATE</b></button>
  
</div>
<br>

</form>

<script>
  
  function sub2()
  {
   
    var z=document.getElementById('txtharvest').value;
   
    var b=document.getElementById("phi_1").value;
   
   

   var c=z-b;
   
   var pdays=document.getElementById('txtpdays').value;
    var d=pdays.split(' ');

  
   

    if(c<d[0])
  {
   alert("This item is exceeding PHI, this may appear in residue report. do you still want to continue?");
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
  // var divobj = document.getElementById('total');
  // divobj.value = GST;
  document.getElementById('txtsgst').value=sgst;

 
  document.getElementById('txtcgst').value=cgst
  ;



}

</script>
<script src="select2.min.js"></script>
<script>
$("#pest_1").select2( {
  placeholder: "Select Item",
  allowClear: true
  } );
</script>

<script type="text/javascript">
  function modal()
  {
     $(document).ready(function(){
    $("#add_data_Modal").modal('show');
  });

$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  


 if($('#txtbno').val() == "")  
  {  
   alert("Batch Number is required");  
  } 

  else if($('#txtdate').val() == '')  
  {  
   alert("Date is required");  
  }  
  else if($('#txtpname').val() == '')
  {  
   alert("Supplier is required");  
  }
   else if($('#txtpm').val() == '')
  {  
   alert("Payment Type is required");  
  }

   else if($('#txtpname').val() == '')
  {  
   alert("Unit is required");  
  }
   
    else if($('#purchase_rate').val() == '')
  {  
   alert("PHI is required");  
  }
   else if($('txtqty1').val() == '')
  {  
   alert("MR is required");  
  }
    else if($('#txtunit').val() == '')
  {  
   alert("Recommended dose is required");  
  }
   else if($('#txtedate1').val() == '')
  {  
   alert("Unit is required");  
  }
   else if($('#txtno').val() == '')
  {  
   alert("Pest/Disease is required");  
  }
   else if($('#txtbatch').val() == '')
  {  
   alert("Company is required");  
  }
 
   else if($('#GST').val() == '')
  {  
   alert("GST is required");  
  }
   else if($('#txtsgst').val() == '')
  {  
   alert("SGST is required");  
  }
   else if($('#txtcgst').val() == '')
  {  
   alert("CGST is required");  
  }
   else if($('#txtamt').val() == '')
  {  
   alert("amount is required");  
  } else if($('#txtphi').val() == '')
  {  
   alert("phi is required");  
  }
  else if($('#txtpest').val() == '')
  {  
   alert("pesticide is required");  
  }else if($('#item_type1').val() == '')
  {  
   alert("item_type is required");  
  }
  else
  {

   $.ajax({  
    url:"insert2.php",  
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
 <script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 

</body>
</html>