<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DISEASE APPLICATION</title>
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
 
$did=$_GET['id'];
$sub=$_SESSION['txtsub'];
$ses_id=$_SESSION['plot_id'];

$txtpdays=$_SESSION['txtpdays'];
$txtharvest=$_SESSION['txtharvest'];

  if(isset($_POST["btncancel"]))
  {
   
   $q=mysqli_query($db,"select * from tbldissession where status=0 and ses_id=".$ses_id);
   while($r=mysqli_fetch_array($q))
   {
   $sum=0;
   $q1=mysqli_query($db,"select * from tblp1 where item_name='".$r['item_name']."' and ses_id=".$ses_id);
   $r1=mysqli_fetch_array($q1); 
   $sum=$r1['reduce_qty']+$r['aqty'];
  // echo $sum;
     mysqli_query($db,"update tblp1 set reduce_qty='$sum' where item_name='".$r['item_name']."' and ses_id=".$ses_id); 
   
     mysqli_query($db,"DELETE FROM tbldissession WHERE d_id=".$r['d_id']);

     mysqli_query($db,"DELETE FROM tbldisease1 WHERE did=".$r['did']);


  }
echo "<script>window.location.href='disease.php';</script>";
    exit;

}



if(isset($_POST["btnsave"]))
{
 
 extract($_POST);
 $ses_id=$_SESSION['plot_id'];
$plot_no=$_SESSION['plot_no'];
$sdate=$_SESSION['sdate']; 
  $w=$_POST['txtrqty'];
 $x=$_POST['txtuqty'];
 $v=$_POST['txtaqty'];
 $u=$_POST['txtaunit'];

 
        if($u=='kg')
        {
            $v=$v;
            $w=$w;
            $x=$x;
            $u='kg';
        }
        else
          if($u=='ltr')
        {
            $v=$v;
            $w=$w;
            $x=$x;
            $u='ltr';
        }
        else
          if($u=='g')
        {
            $v=$v*0.001;
            $w=$w*0.001;
            $x=$x*0.001;
            $u='kg';
        }
        else
           if($u=='ml')
        {
             $v=$v*0.001;
            $w=$w*0.001;
            $x=$x*0.001;
            $u='ltr';
        }
    
    
    $rate=$_POST['txtrate'];
    $tot=$rate*$v; 
    $reduce_qty=$_POST['txtreduce']-$v;

    
    $status=0;
if($v <= $txtreduce)
{
  mysqli_query($db,"insert into tbldissession(sdate,item_name,bno,edate,disease,phi,Arqty,Auqty,Aaqty,rqty,uqty,aqty,reduce_qty,aunit,act_unit,item_type,purchase_rate,total,ses_id,plot_no,status,did)values('$sdate','$txtpest','$txtbno','$txtedate','$txtdisease','$txtphi','$txtrqty','$txtuqty','$txtaqty','$w','$x','$v','$reduce_qty','$u','$txtaunit','$item','$rate','$tot','$ses_id','$plot_no','$status','$did')");

     mysqli_query($db,"update tblp1 set reduce_qty='$reduce_qty' where  item_name='".$txtpest."'");
}
else
{
echo "<script>alert('Item Out Of Stock'); </script>";  
}

}
        
?>


<form method="post"  id="form" name="disease">
    <table class="table  w-auto"  style="width: 100%;">
        <thead>
             <tr>  
                <th style="border: 1px solid black;">Item Name.</th>  
                <th style="border: 1px solid black;">Qty/liter</th>
                <th style="border: 1px solid black;">Total Qty</th>
                <th style="border: 1px solid black;">Expiry Date</th>
              <th style="border: 1px solid black;">Batch No.</th>
       </tr>
        </thead>
            <tbody>
                <tr class='tr_input'>
                    <td style="border: 1px solid black;">
                         <div class="hide_data">
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
        
          <div id="item_name"></div>
        </select>
        </div>
               <div class="show_data"></div>
                    </td>
                     <td style="border: 1px solid black;"><input type='text' class='uqty' name="txtuqty" id='uqty_1' onclick='sub2();'></td>
                    <td style="border: 1px solid black;"><input type='text' class='aqty' name="txtaqty" id='aqty_1'  > </td>
                    <td style="border: 1px solid black;"><input type='text' class='Expdate' name="txtedate" id='edate_1' ></td>
                   <td style="border: 1px solid black;"><input type='text' class='batch' name="txtbno" id='batch_1' ></td>

                <input type='text' class='disease' name="txtdisease" id='disease_1' size="15" style="display: none" >
                <input type='text' class='phi' name="txtphi" id='phi_1'   size="3" style="display: none" >
                <input type='text' class='rqty' name="txtrqty" id='rqty_1'   size="18" style="display: none" >
                <input type='text' name='txtaunit' class='aunit' id='aunit_1' size='3' style="display: none"  readonly>
                <input type='text' class='rate' name="txtrate" id='rate_1' style="display:none;"> 
                <input type='text' class='item' name="item" id='item_1'  size="7" style="display: none" >
                <input type='text' class='total' name="txttot" id='tot_1' size="2" style="display: none" >
                <input type='text' class='reduce' name="txtreduce" id='reduce' size="2" style="display: none" >
                <input type='text' class='sub' name="txtsub1" id='txtsub1'   size="18" value="<?php echo $sub; ?>"  style="display: none;">
                <input type='text' class='sub' name="txtharvest" id='txtharvest'   size="18"
                  value="<?php echo $txtharvest; ?>" style="display: none;">
                <input type='text' class='sub' name="txtpdays" id='txtpdays'   size="18"
                value="<?php echo $txtpdays; ?>" style="display: none;">


              
            </tbody>
       

</table>


<div class="text-center">
  <button type="submit" name="btnsave" class="btn btn-success btn-sm"><b>ADD</b></button>
  <button type="button" class="btn btn-warning btn-sm" id="nm-button" onclick="modal();">CREATE NEW ITEM</button>
</div>

<br>
<table class="table" border="1" style="width:95%;margin-left: 1%">
            <tr>
                <th>Name Of Pesticide</th>
                <th>Batch No</th>
                <th>Expiry Date</th>
                <th>Pest/Disease</th>
                <th>PHI</th>
                <th>Recommended Quantity</th>
                <th>Used Quantity</th>
                <th>Applied Quantity</th>
                <th>Applied Unit</th>

            </tr>
<?php
  $q1=mysqli_query($db,"select * from tbldissession where ses_id=".$ses_id." and status=0"); 
$i=2;
     while ($r=mysqli_fetch_array($q1)) 
     {
      
        ?>

       <tr>
     <td><?php  echo($r['item_name']); ?></td>
     <td><?php echo $r["bno"];?></td>
     <td><?php  echo($r['edate']); ?></td>
     <td><?php echo $r["disease"];?></td>
     <td><?php  echo($r['phi']); ?></td>
     <td><?php echo $r["Arqty"];?></td>
     <td><?php echo $r["Auqty"];?></td>
     <td><?php echo $r["Aaqty"];?></td>
     <td><?php echo $r["act_unit"];?></td>
 
     
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
<div style="margin-left:1%"> 
   <button type="submit" name="btncancel" class="btn btn-danger" formnovalidate><b>CANCEL</b></button>
 
 <button type="button" onclick="window.location.href='disease.php'" class="btn btn-success btn-xl" name="btnmove"><b>SAVE</b></button>

</div>
</form>







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
                <label><b>Bill No:</b></label>
                 <input type="text" class="form-control" name="txtbno" id="txtbno" placeholder="Enter Bill-no" required>
             
              </div>
              <div class="col-sm-6 form-group">
                <label><b>Enter Date:</b></label>
              <input type="date" class="form-control" name="txtdate" id="txtdate" placeholder="Enter Date" required>
              </div>
            </div> 

            <div class="row">
   <div class="col-sm-6" form-group>
                <label  class="control-label"><b>Supplier:</b></label>
              
      
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
          <label><b>Payment  Type:</b></label>
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
            <p><input type="text" name="purchase_rate" class="form-control" id="purchase_rate" placeholder="Enter purchase_rate"></p>
        </div>
         <div class="Cell">
            <p><input type="text" name="txtqty" id="txtqty1" class="form-control" placeholder="Enter qty"></td></p>
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
          <label><b>NOS:</b></label>
         
                     <input type="text" class="form-control" name="txtno" id="txtno" placeholder="Enter NOS" onclick="multiply();"  onchange="calculateAmount(this.value)" required>
              
              </div>
          
           
      <div class="col-sm-6 form-group">
          <label><b>Batch No:</b></label>
          
            <input type="text" class="form-control" name="txtbatch" id="txtbatch" placeholder="Enter batch no"   onchange="calculateAmount1(this.value)"  required>
          </div>
        </div>


<div class="row">

   <div class="col-sm-6 form-group">

          <label><b>GST:</b></label>
         
                     <input type="text" class="form-control" name="GST" id="GST1" placeholder="GST"  required>
              
              </div>
        
 <div class="col-sm-6 form-group">
          <label><b>SGST:</b></label>
         
                     <input type="text" class="form-control" name="txtsgst" id="txtsgst" placeholder="SGST">
              
              </div>
            </div>

  <div class="row">
        <div class="col-sm-6 form-group">
          <label><b>CGST:</b></label>
         
                     <input type="text" class="form-control" name="txtcgst" id="txtcgst" placeholder="CGST">
              
              </div>
           
              <div class="col-sm-6 form-group">
          <label><b>Net Total:</b></label>
         
                     <input type="text" class="form-control" name="txtamt" id="txtamt" placeholder="Net total">
              
              </div>
            </div>

<div class="row">
                <div class="col-sm-6 form-group">
          <label><b>PHI</b></label>
         
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
        
                     <input type="text" class="form-control" name="dose" id="dose" placeholder="Enter dose" style="display: none;">
              
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



<script>
function calculateAmount()

{ 
  a = Number(document.getElementById('purchase_rate').value);

  b = Number(document.getElementById('txtno').value);
  c = a * b;

  document.getElementById('txtamt').value = c;
 
}








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
 /* var divobj = document.getElementById('total');
  divobj.value = GST;*/
  document.getElementById('txtsgst').value=sgst;

 
  document.getElementById('txtcgst').value=cgst
  ;



}

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


<script src="js/reload.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>      

</body>
</html>