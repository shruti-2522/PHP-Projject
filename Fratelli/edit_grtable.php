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
      function showUser1(str) {
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
              document.getElementById("rate_1").value = data[0].purchase_rate;
              document.getElementById("unit_1").value = data[0].act_unit;
              document.getElementById("reduce").value = data[0].reduce_qty;
              console.log(data[0]['purchase_rate']);
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
 
if(isset($_POST["btnupdate"]))
{
 
 extract($_POST);
$id=$_GET['id'];

$ses_id=$_SESSION['plot_id'];
$plot_no=$_SESSION['plot'];
$date=$_SESSION['date']; 

 $w=$_POST['txtqty'];
 $w=$w*0.001;
 // $x=$_POST['txtuqty'];
 $v=$_POST['txtquantity'];
 
  $u=$_POST['txtunit'];
  $z=$_POST['txtappl'];

        if($u=='kg')
        {
            $v=$v;
            $z=$z;
            $u='kg';
        }
        else
          if($u=='ltr')
        {
            $v=$v;
            $z=$z;
            $u='ltr';
        }
        else
          if($u=='g')
        {
            $v=$v*0.001;
            $z=$z*0.001;
            $u='kg';
        }
        else
           if($u=='ml')
        {
             $v=$v*0.001;
             $z=$z*0.001;
            $u='ltr';
        }
    
    $rate=$_POST['txtrate'];
    $tot=$rate*$v; 
    $draft_id=0;
    //echo $_GET['id1'];

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

   mysqli_query($db,"update tblgrowthsession set date='$date',gr_name='$txtgm',ppm='$txtppm',Aqty='$txtqty',qty='$w',reduce_qty='$txtreduce',water='$txtw',used_solvent='$txtsolvent',Aquantity='$txtquantity',quantity='$v',unit='$u',act_unit='$txtunit',purchase_rate='$txtrate',total='$tot',plot_no='$plot_no',status=0 where gid=".$_GET["id1"]);

  mysqli_query($db,"update tblp1 set reduce_qty='$txtreduce' where  item_name='".$txtgm."'");
}
else
{
echo "<script>alert('Quantity Exceeds Stock Limit'); </script>";  
} 



     echo "<script>window.location.href='edit_gr3.php?id=$id'</script>";
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
                    $q=mysqli_query($db,"SELECT distinct item_name FROM tblitem WHERE tblitem.item_type='Growth Regulator' and ses_id=".$ses_id);
                  
                  
                  
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
$q1=mysqli_query($db,"select * from tblgrowthsession where gid=".$_GET['id1']); 
  $r1=mysqli_fetch_array($q1); 
  ?>

  <table class="table  w-auto"  style="width: 100%;">

  
    <tr>    
       <th  style="border: 1px solid black;">Item Name</th>  
       <th style="border: 1px solid black;"><b>PPM</b></th>
       <th style="border: 1px solid black;"><b>Quantity(gm)</b></th>
       <th style="border: 1px solid black;"><b>Water</b></th>
       <th style="border: 1px solid black;"><b>Used Solvent</b></font></th>
       <th style="border: 1px solid black;"><b>Quantity</b></th>
       <th style="border: 1px solid black;"><b>Unit</b></th>
     
       </tr>
          
             <tbody>
               <tr class='tr_input'>
                <td style="border: 1px solid black;">
                       <div class="hide_data">
                     <select name="txtgm" id="gm_1" class="gm form-control"  onchange="showUser1(this.value);"  >
               <option value="<?php echo $r1['gr_name'];?>"selected><?php echo $r1['gr_name'];?></option>
              
                <?php
                $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select DISTINCT(tblp1.item_name) from tblp1,tblitem WHERE tblitem.item_type='Growth Regulator' and tblitem.item_name=tblp1.item_name and tblp1.ses_id=".$ses_id);
                 
                    foreach ($q as $txtgm){
                ?>
                        <option value="<?php echo $txtgm['item_name'];?>"><?php echo $txtgm['item_name'];?></option>
                <?php
                    }
                ?>
              
             
          <div id="item_name"></div>
               </select>
             </div>
              <div class="show_data"></div></td>
           <td style="border: 1px solid black;">
          <input type="text" name="txtppm" value="<?php echo $r1['ppm']; ?>" id="ppm_1" class="ppm" onclick="sub1();" size="3" required>
        </td>
        <td style="border: 1px solid black;">
          <input type="text" name="txtqty" id="qty_1" value="<?php echo $r1['Aqty']; ?>" class="qty" size="5" required>
        </td>
         <td style="border: 1px solid black;">
          <input type="text" name="txtw" id="wunit_1" value="<?php echo $r1['water']; ?>" class="wunit" size="5" required>
        </td>
        
         <td style="border: 1px solid black;">
          <input type="text" name="txtsolvent" id="solvent_1" value="<?php echo $r1['used_solvent']; ?>" class="solvent" size="5" required>
        </td>
          <td style="border: 1px solid black;">
          <input type="text" name="txtquantity" id="aqty_1" class="quantity" value="<?php echo $r1['Aquantity'];?>" onchange="sub1();" size="5" required>
        </td>
      <td style="border: 1px solid black;">
         <input type="text" name="txtunit" id="unit_1" class="unit" onchange="cal();" size="5" value="<?php echo $r1['act_unit']; ?>" required readonly></td>
          <input type="text" value="<?php echo $r1['purchase_rate']; ?>" name="txtrate" id="rate_1" class="rate" size="5"  style="display:none;" required>
   <input type='text' class='reduce' name="txtreduce" id='reduce' value="<?php echo $r1['reduce_qty']; ?>" size="2" style="display: none;">
   <input type='text' class='xyz' value="<?php echo $r1['Aquantity']; ?>" name="txtappl" id='any' size="2" style="display: none;"> 
               </tr>
             </tbody>

</table>

<br>
<div style="margin-left: 28%">
 <button type="button" class="btn btn-warning btn-sm" id="nm-button" onclick="modal();">CREATE NEW ITEM</button>
  <button type="submit" name="btnupdate" class="btn btn-success btn-sm"><b>UPDATE</b></button>
</div>
</form>


<br><br>
<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete_gr.php',
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
    url:"insert4.php",  
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
  //alert(amt);
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
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>    
<?php //include("footer.php"); ?>



</body>
</html>