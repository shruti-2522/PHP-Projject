 <!DOCTYPE html>
<html>
<head>
  <title></title>
<?php include('head.php');?>
<?php include('config.php');?>

   
</head>
<body class="sb-nav-fixed">
     <?php  include('header.php');?>
   
  <h2><font color="black"><b>ADD PURCHASE</b></font></b></h2>
   <?php
if(isset($_POST["btnreg"]))
{
  extract($_POST);
  $a = implode(',', $_POST['txtitem']);
  $b = implode(',', $_POST['txtqty']);
  $c = implode(',', $_POST['txtrate']);   
  $d=implode(',',$_POST['txtamt']);
  $f=implode(',',$_POST['txtunit']);

  $ses_id=$_SESSION['plot_id'];
  
  $v = $_POST['txtqty'];
  $v1=array();
  $u=$_POST['txtunit'];
  $u1=array();
    for($i=0;$i<sizeof($v);$i++) 
    {
        if($u[$i]=='kg')
        {
            $v1[$i]=$v[$i];
            $u1[$i]='kg';
        }
        else
          if($u[$i]=='g')
        {
            $v1[$i]=$v[$i]*0.001;
            $u1[$i]='kg';
        }
      
    }

 $qty=implode(',', $v1);
 $uni=implode(',', $u1);

  
   $ntotal=$txtbal1-$total;
   //echo($ntotal);

   mysqli_query($db,"UPDATE tblledger SET open='$ntotal' WHERE name='$txtledger' and ses_id=".$ses_id); 


  mysqli_query($db,"insert into tblpurcahse1(purchase_no,date,invoice_no,plot_name,paccount_name,cbal,purchase_ledger,cur_bal1,item_name,qty,unit,rate,amount1,narration,amount
,GST,CGST,SGST,total,ses_id)values('$cno','$txtdate','$txtno','$pname','$txtpname','$txtbal','$txtledger','$txtbal1','$a','$qty','$uni','$c','$d','$txtnar','$txttot','$txtdisc','$txtcgst','$txtsgst','$total','$ses_id')");

 
    echo "<script>alert('Purchase Voucher added successfully');</script>";
}
?> 



<div align="center">
  
</div>
<br><br>
 
 <form method="post">

<div class="container">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">

   <div class="col-sm-12">
     <div class="row">
      <div class="col-sm-6 form-group">
    <label><font color="black"><b>Purchase no.:</b></font></label> 
      <?php    
      $ses_id=$_SESSION['plot_id'];
      $q1=mysqli_query($db,"select count(*) as cnt from tblpurcahse1 where ses_id=".$ses_id);
               $r1=mysqli_fetch_array($q1);      
      ?>
    <input type="text" class="form-control"  id="cno" name="cno" value="<?php echo $r1['cnt']+1; ?>" required>
   </div>

  <div class="col-sm-6">
    <label><font color="black"><b>Date:</b></font></label>
  <input type="date" name="txtdate" id="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required></div>
</div>
<div class="row">
  <div class="col-sm-6 form-group"> 
    <label><font color="black"><b> Supplier Invoice no.:</b></font></label> 
    <input type="text" class="form-control"  id="ino" placeholder="Supplier invoice No."  name="txtno" required>
  </div>
  <div class="col-sm-6 form-group"> 
    <label><font color="black"><b>Plot Name</b></font></label> 
    <select name="pname" id="pname" class="form-control" onchange="showUser(this.value);" required>
        <option value="">Select Plot Name:</option>
              
                <?php
                     $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct pname,plot_no from plot where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $pname){
                ?>
                        <option value="<?php echo $pname['plot_no'];?>"><?php echo $pname['pname'];?></option>
                <?php
                    }
                ?>
        </select>
  </div>
</div>
<div class="row">

            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Party Account Name:</b></font></label>
          <input type='text' class="form-control" placeholder="Enter Party Account name" name="txtpname" id='autocomplete' >
      </div>
  
        <div class="col-sm-6 form-group">
              <br>
          <i>Curr Bal:</i><input type='text' class="no-outline" style="border: none; outline: none"  name="txtbal" id='open' onchange="f1();" readonly>
      </div>
       </div>

       <div class="row">
                <div class="col-sm-6 form-group">
              <label><font color="black"><b>Purchase Ledger:</b></font></label>
            <input type='text' class="form-control" placeholder="Enter Purchase Ledger" name="txtledger" id='multi_autocomplete'>
          </div>
        <div class="col-sm-6 form-group">
          <br>
             <i>Curr Bal</i>:<input type='text' class="no-outline" style="border: none; outline: none"  name="txtbal1" id='opens' onchange="f1();" readonly>
      </div></div>
     <table  class="table" border="1" style="width:40px" align="center">
<thead>
            <tr>
                  <th><font color="black">Name of item</font></th>
                <th><font color="black">Quantity</font></th>
                <th><font color="black">Unit</font></th>
                <th><font color="black">rate</font></th>
                <th><font color="black">Amount</font></th>
            </tr>
            </thead>
            <tbody>
            <tr class='tr_input'>
                <td><input type='text' class='under' size='10' name="txtitem[]" id='under_1'></td>
               
                <td><input type='text' class='qty' id='qty_1' size='10' name="txtqty[]"></td>
                <td>
                 <select name="txtunit[]" id="unit_1" class="unit" size="1" required>
                <option value="">Select Unit</option>
                <option value="kg">Kg</option>
                <option value="g">g</option>  
               </select></td>
                <td><input type='text' class='rate' id='rate_1' size='10' name="txtrate[]"  onclick="f2()";></td>
                <td><input type='text' class='amount' id='amount_1' name="txtamt[]" size='10'></td>
               <!--  <td><input type='text' class='age' id='age_1' ></td>
                <td><input type='text' class='email' id='email_1' ></td>
                <td><input type='text' class='salary' id='salary_1' ></td> -->
            </tr>
            </tr>
            </tbody>
        </table>
       <br>
        <div align="right"  class="col-sm-10">
        <input type='button' class="btn btn-info btn-sm" value='+' id='addmore'>
    </div><br><br>

 
<div class="col-sm-12">
    <div class="row">
<div class="col-sm-6 form-group">
<label><font color="black"><b>Net Total:</b></font></label> 
<input type="text" name="txttot" id="total" class="form-control"  required>
</div>
    
    <div class="col-sm-6 form-group">
          <label><font color="black"><b>GST:</b></font></label>
                <select id="txtdisc" name="txtdisc" class="form-control" oninput="f1()"; onchange="calculateAmount(this.value)" required>
                 <option value="" disabled selected>Choose your option</option>
                  <option value="5">5%</option>
                   <option value="12">12%</option>
                    <option value="18">18%</Coption>
                    <option value="20">20%</option>
                 
            </select>
          </div>
        </div>
          

          <div class="row">
            <div class="col-sm-6 form-group">
          <label><font color="black"><b>SGST:</b></font></label>
          <input type="text" class="form-control" name="txtsgst" id="txtsgst" placeholder="SGST">
              
              </div>
          <div class="col-sm-6 form-group">
             <label><font color="black"><b>CGST:</b></font></label>
             <input type="text" class="form-control" name="txtcgst" id="txtcgst" placeholder="CGST">  
              </div>
            </div>
        
<div class="row">
      <div class="col-sm-6 form-group">
    <label><font color="black"><b>Naration:</b></font></label> 
    <textarea  class="form-control"  name="txtnar" ></textarea>
  </div>

            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Total:</b></font></label>
            <input type="text" class="form-control" name="total" id="txtamt" placeholder="Enter amount">
            </div>
            </div>
         
          
        <div class="row">
         <div class="col-sm-10"> 
            <center>
              <br>
            <button type="submit"  name="btnreg" id="save" class="btn btn-success  btn-lg"><b>ADD</b></button>
             <button type="submit"   id="save" class="btn btn-success btn-lg" onclick="window.location.href='all_purchase.php'"><b>VIEW LIST</b></button>
            </center>
            <br>
          </div>
        </div>
        
<tr>
  
    </table>
       
         <script src="jquery-3.2.1.min.js" type="text/javascript"></script>  
        <script src="jquery-ui.min.js" type="text/javascript"></script>

    <!-- Script -->
    <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "suggestion1.php",
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
                $('#autocomplete').val(ui.item.label); // display the selected text
                $('#open').val(ui.item.value); // save selected id to input
                return false;
            }
        });

        // Multiple select
        $( "#multi_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                var searchText = extractLast(request.term);
                $.ajax({
                    url: "suggestion1.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: searchText
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            
                select: function (event, ui) {
                $('#multi_autocomplete').val(ui.item.label); // display the selected text
                $('#opens').val(ui.item.value); // save selected id to input
                return false;

                return false;
            }
           
        });
    });

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    </script>


    <script>
  (function() {
    "use strict";


    $("table").on("change", "input", function() {
      var row = $(this).closest("tr");
      var qty = parseFloat(row.find(".qty").val());
      var rate = parseFloat(row.find(".rate").val());
        var unit = row.find(".unit").val();
      var qty1;
      if(unit=='g')
      {
        qty1=qty*0.001
      }
      else
      {
        qty1=qty;
      }
      var total = qty1 * rate;

      row.find(".amount").val(isNaN(total) ? "" : total);
    });
  })();
</script>


     <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="jquery-ui.min.js" type="text/javascript"></script>
 <script type="text/javascript">
        $J = jQuery.noConflict();
        $J(document).ready(function(){

            $J(document).on('keydown', '.under', function() {
                
                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];

                $J( '#'+id ).autocomplete({
                    source: function( request, response ) {
                        $J.ajax({
                            url: "getDetails1.php",
                            type: 'post',
                            dataType: "json",
                            data: {
                                search: request.term,request:1
                            },
                            success: function( data ) {
                                response( data );
                            }
                        });
                    },
                    select: function (event, ui) {
                        $J(this).val(ui.item.label); // display the selected text
                        var userid = ui.item.value; // selected id to input

                        // AJAX
                        $J.ajax({
                            url: 'getDetails1.php',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){
                              
                                
                                var len = response.length;

                                if(len > 0){
                                   ///r a=response[0]['a'];
                                    var id = response[0]['id'];
                                    var open = response[0]['open'];
                                    // var email = response[0]['email'];
                                    // var age = response[0]['age'];
                                    // var salary = response[0]['salary'];

                                    document.getElementById('open_'+index).value = open;
                                    // document.getElementById('age_'+index).value = age;
                                    // document.getElementById('email_'+index).value = email;
                                    // document.getElementById('salary_'+index).value = salary;
                                    
                                }
                                
                            }
                        });

                        return false;
                    }
                });
            });
            
            // Add more
            $J('#addmore').click(function(){

                // Get last id 
                var lastname_id = $J('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                var split_id = lastname_id.split('_');

                // New index
                var index = Number(split_id[1]) + 1;

                // Create row with input elements
                var html = "<tr class='tr_input'><td><input type='text' class='under' size='10' name='txtitem[]' id='under_"+index+"'></td><td><input type='text' size='10' class='qty'  name='txtqty[]' id='qty_"+index+"'></td><td><select name='txtunit[]' id='unit_"+index+"' class='unit' size='1' required><option value=''>Select Unit</option><option value='kg'>Kg</option><option value='g'>g</option></select></td><td><input type='text' size='10' name='txtrate[]' class='rate'  id='rate_"+index+"'></td><td><input type='text' size='10' class='amount' id='amount_"+index+"' name='txtamt[]' ></td></tr>";

                // Append data
                $J('tbody').append(html);
                
            });
        });

    </script>

 <script>
    function f1()
    {
        var a,add;
        add=0;
         a=document.querySelectorAll(".amount");
          for (i = 0; i < a.length; i++) {
              //alert(a[i].value);
            add=parseInt(add) + parseInt(a[i].value);
   }
   document.getElementById('total').value=parseInt(add);
}
</script>

<script>
function calculateAmount(val)
{ 
  var  amt=Number(document.getElementById('total').value);
  //alert(amt);
  var GSTCal=amt*document.getElementById('txtdisc').value/100;
  //alert(GSTCal);
 var sgst=GSTCal/2;
  var cgst=GSTCal/2;

  
  /*display the result*/
  var GST=amt+(amt*val)/100;
  
  var divobj = document.getElementById('txtamt');
  divobj.value = GST;
   document.getElementById('txtsgst').value=sgst;

 
  document.getElementById('txtcgst').value=cgst;



}



</script>




</form>
<?php// include('reght_sidebar.php');?>
<?php //include('footer.php');?>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>      



</body>
</html>
