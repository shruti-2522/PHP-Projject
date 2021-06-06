<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('head.php');?>
	<?php include('config.php');?>
	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
	 <style type="text/css">
    .Table
    {
        display: table;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border: solid;
        border-width: thin;
        padding-left: 10px;
        padding-right:6px;
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
              console.log(data[0]['item_type']);
            }
          };

          xmlhttp.open("GET", "getData.php?str=" + str, true);
          xmlhttp.send();
        }
      }
    </script>



</head>
<body>
<?php include('header.php');?>
	
   
<?php
if(isset($_POST["btnsave"]))
{
 
 extract($_POST);


  $p=$_SESSION['plot_no'];
 $ses_id=$_SESSION['plot_id'];
   $a = implode(',', $_POST['txtpest']);
   print_r($a); 
   $d = implode(',', $_POST['txtedate']);
   $e = implode(',', $_POST['txtdisease']);
   $f = implode(',', $_POST['txtphi']);
   $g = implode(',', $_POST['txtrqty']);
   $h = implode(',', $_POST['txtuqty']);
   $z = implode(',', $_POST['txtaqty']);
   $j = implode(',', $_POST['txtbno']);
   $k = implode(',', $_POST['txttot']);
   $l = implode(',', $_POST['item']);
  $m = implode(',', $_POST['txtaunit']);
  $rat=implode(',',$_POST['txtrate']);
  
 $w=$_POST['txtrqty'];
  $w1=array();
   $x=$_POST['txtuqty'];
  $x1=array();
 
  $v=$_POST['txtaqty'];
  $v1=array();
 
  $u=$_POST['txtaunit'];
  $u1=array();
    for($i=0;$i<sizeof($v);$i++) 
    {
        if($u[$i]=='kg')
        {
            $v1[$i]=$v[$i];
            $w1[$i]=$w[$i];
            $x1[$i]=$x[$i];
            $u1[$i]='kg';
        }
        else
          if($u[$i]=='ltr')
        {
            $v1[$i]=$v[$i];
            $w1[$i]=$w[$i];
            $x1[$i]=$x[$i];
            $u1[$i]='ltr';
        }
        else
          if($u[$i]=='g')
        {
            $v1[$i]=$v[$i]*0.001;
            $w1[$i]=$w[$i]*0.001;
            $x1[$i]=$x[$i]*0.001;
            $u1[$i]='kg';
        }
        else
           if($u[$i]=='ml')
        {
            $v1[$i]=$v[$i]*0.001;
            $w1[$i]=$w[$i]*0.001;
            $x1[$i]=$x[$i]*0.001;
            $u1[$i]='ltr';
        }
    }
    
    $rate=$_POST['txtrate'];

 
    $tot=array();
    for($i=0;$i<sizeof($rate);$i++)
    {
      $tot[]=$rate[$i]*$v1[$i];  
    }
    $total=implode(',', $tot);
    $qty1=implode(',', $w1);
    $qty2=implode(',', $x1);
    $qty3=implode(',', $v1);
    $unit=implode(',', $u1);

    // mysqli_query($db,"insert into tbldisease(plot_no,pname,sdate,days_after_prunning,preventive,equipment,no_of_nozzle,pressure,discharge,duration,water_required,water_used,moa,oworker,dor,temp,humidity,pesticide,bno,edate,disease,phi,Arqty,Auqty,Aaqty,rqty,uqty,aqty,aunit,act_unit,purchase_rate,total,item_type,ses_id,status)values('".$_SESSION['plot_no']."','".  $_SESSION['pname']."','". $_SESSION['txtdate']."','".$_SESSION['txtpdays']."','". $_SESSION['txtprev']."','".  $_SESSION['txtmachine']."','".  $_SESSION["txtnozzle"]."','". $_SESSION["txtpressure"]."','".  $_SESSION["txtdischarge"]."','". $_SESSION["txtdapp"]."','". $_SESSION["txtwater"]."','". $_SESSION["txtwused"]."','". $_SESSION["txtmapp"]."','".  $_SESSION["txtworker"]."','". $_SESSION["txtdisposal"]."','". $_SESSION["txttemp"]."','". $_SESSION["txthumidity"]."','$a','$j','$d','$e','$f','$g','$h','$z','$qty1','$qty2','$qty3','$unit','$m','$rat','$total','$l','$ses_id','$status')");
  

  mysqli_query($db,"insert into tbldissession(item_type,bno,edate,disease,phi,Arqty,Auqty,Aaqty,rqty,uqty,aqty,aunit,act_unit,purchase_rate,total,ses_id,plot_no)values('$a','$j','$d','$e','$f','$g','$h','$z','$qty1','$qty2','$qty3','$unit','$m','$rat','$total','$ses_id','$p')");

 

  

 $pest=$_POST['txtpest'];
  // $appl_qty=$_POST['txtaqty'];
  $aunit=$_POST['txtaunit'];
  $item_tp=$_POST['item'];

  $bno=$_POST['txtbno'];
  $edate=$_POST['txtedate'];
  $disease=$_POST['txtdisease'];
  $len=count($pest);
}
     	
?>

	<br><br>



<!---MODAL BOX CODE --->
<div id="add_data_Modal" class="modal fade" >
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
  <h4 class="modal-title"><b>ADD ITEM PURCHASE</h4>
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
                    $q=mysqli_query($db,"select item_name from tblitem where ses_id=".$ses_id);
                  
                  
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
  <label><font color="black"><b>Amount:</b></font></label>
    <input type="text" class="form-control" name="total" id="total" placeholder="Net Total" required>
  </div>
   <div class="col-sm-6 form-group">

          <label><font color="black"><b>GST:</b></font></label>
         
                     <input type="text" class="form-control" name="GST" id="GST1" placeholder="Net Total"  required>
              
              </div>
            </div>


<div class="row">
 <div class="col-sm-6 form-group">
          <label><font color="black"><b>SGST:</b></font></label>
         
                     <input type="text" class="form-control" name="txtsgst" id="txtsgst" placeholder="SGST">
              
              </div>

  
        <div class="col-sm-6 form-group">
          <label><font color="black"><b>CGST:</b></font></label>
         
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

          

    <input type="text" class="form-control" name="item_type" style="display: none"   id="item_type1" placeholder="Enter">


          <div class="form-group">
              <div align="center">
            <button type="submit"  name="btnadd"  class="btn btn-success"><b>ADD</button>
            
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


<div class="row">
	<label><b>Name Of Pesticide</b></label>
<div class="col-sm-4">
	  <div class="hide_data">
                  <select name="txtpest[]" id="pest_1" class="pest form-control"  onclick="myfunc(this.value)" onchange="showUser3(this.value)" size="1" required>
        <option value="">Select Pesticide</option>
              
                <?php
                $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"SELECT distinct(item_name) FROM tblp1 WHERE (tblp1.item_type='Pesticide' or tblp1.item_type='Insecticide' or tblp1.item_type='Fungicide') and status=0 and ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtpest){
                ?>
                        <option value="<?php echo $txtpest['item_name'];?>"><?php echo $txtpest['item_name'];?></option>
                <?php
                    }
                ?>
          <option value="addnew" style="background-color: lightgreen"><b>Add New Pestiscide</b>  </option>  
          <div id="item_name"></div>
        </select>
      </div><div class="show_data"></div>
      </div></div>

                  </div>

                  <br><br>
<table class="w3-table w3-center" border='1' align="center" style="margin-left:1%">
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
           
                   <td><input type='text' class='batch' name="txtbno[]" id='batch_1' size="3"></td>
                  <td><input type='text' class='Expdate' name="txtedate[]" id='edate_1' size="15"></td>
                   <td><input type='text' class='disease' name="txtdisease[]" id='disease_1' size="15"></td>
                      <td><input type='text' class='phi' name="txtphi[]" id='phi_1'   size="3"></td>
                       <td><input type='text' class='rqty' name="txtrqty[]" id='rqty_1' onkeyup='sub1();'  size="5"></td>
                <td><input type='text' class='uqty' name="txtuqty[]" id='uqty_1' size="5"></td>
                 
                <td><input type='text' class='aqty' name="txtaqty[]" id='aqty_1' size="2" > </td>
               <td> <input type='text' name='txtaunit[]' class='aunit' id='aunit_1' size='3' readonly></td>
                  <td style="border: none; border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden; "><input type='text' class='rate' name="txtrate[]" id='rate_1' style="display: none" size="2" > </td>
                   <td  style="border: none;border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden;"><input type='text' class='item' name="item[]" id='item_1' style="display: none" size="7"> </td>
                     <td  style="border: none;border-right: solid 1px #FFF!important; color:red; border-bottom-style:hidden;"><input type='text' class='total' name="txttot[]" id='tot_1' size="2" style="display: none"> </td>

<!-- <td>
 <td>        
             <input type='text' class='rate' name="txtrate[]" id='rate_1' size="2"  >
           </td>
 -->
               </tr>
             </tbody>

</table>
<br><br>
<div class="row">
	<div class="col-sm-4"></div>
	<button type="submit" name="btnsave" class="btn btn-success"><b>ADD</b></button>
</div>
<br>
</form>
<table>
<table class="w3-table" border="1" style="width:90%;margin-left: 1%">
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
  $q1=mysqli_query($db,"select * from tbldissession where ses_id=".$ses_id." and plot_no='".$_SESSION['plot_no']."'"); 
$i=2;
     while ($r=mysqli_fetch_array($q1)) 
     {
      
       	?>

       <tr>
     <td><?php  echo($r['item_type']); ?></td>
     <td><?php echo $r["bno"];?></td>
     <td><?php  echo($r['edate']); ?></td>
     <td><?php echo $r["disease"];?></td>
     <td><?php  echo($r['phi']); ?></td>
     <td><?php echo $r["Arqty"];?></td>
     <td><?php echo $r["Auqty"];?></td>
     <td><?php echo $r["Aaqty"];?></td>
     <td><?php echo $r["aunit"];?></td>
 
     
    </tr>
    
    
          <?php
$z1=mysqli_num_rows($q);
echo $i;
echo $z1;
if($z1==$i)
{
//print_r($r);      
echo implode(",", $r);
}
$i++;      
       }



       ?>

      </table>



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
   else if($('#total').val() == '')
  {  
   alert("toatl is required");  
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
   //alert("hwwllo");
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



</body>
</html>