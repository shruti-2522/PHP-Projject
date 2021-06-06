 <!DOCTYPE html>
<html>
<head>
  <title></title>
<?php include('head.php');?>
<?php include('config.php');?>

   
</head>
<script>
    function showUser(str) {
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
         // alert(str);
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              
             
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;
              document.getElementById("under").value = data[0].fruit_name;
              console.log(data[0]['variety']);
            }
          };

          xmlhttp.open("GET", "getSaleData.php?str=" + str, true);
          xmlhttp.send();
        }
      }
</script>
<body class="sb-nav-fixed">
     <?php  include('header.php');?>
     <div class="container">
  <h2><font color="black"><b>ADD SALES</b></font></b></h2>
</div>
   <?php
if(isset($_POST["btnreg"]))
{
  extract($_POST);
  $ses_id=$_SESSION['plot_id'];

  $a = implode(',', $_POST['txtitem']);
  $b = implode(',', $_POST['txtqty']);
  $c = implode(',', $_POST['txtrate']);
  $d = implode(',', $_POST['txtamt']);
  $e = implode(',', $_POST['txtvariety']);
  $f = implode(',', $_POST['txtunit']);

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

 $ntotal=$txtbal1-$txttot;
 
  mysqli_query($db,"insert into tblsales(sales_no,date,plot_no,invoice_no,paccount_name,item_name,variety,qty,unit,rate,amount,narration,total,ses_id)values('$sno','$txtdate','$pname','$invoice_no','$txtpname','$a','$e','$qty','$uni','$c','$d','$txtnar','$txttot','$ses_id')");
 
 
 $item=$_POST['txtitem'];
  $qty=$_POST['txtqty'];
  $rate=$_POST['txtrate'];
  $variety=$_POST['txtvariety'];
  $unit=$_POST['txtunit'];
  $len=count($item);
  $amt=$_POST['txtamt'];
//echo $len;
  
//  print_r($item);

   for($i=0;$i<$len;$i++)
   {
           mysqli_query($db,"insert into tblsale1(sales_no,date,plot_no,invoice_no,paccount_name,item_name,variety,qty,unit,rate,amount,narration,total,ses_id,status)values('$sno','$txtdate','$pname','$invoice_no','$txtpname','$item[$i]','$variety[$i]','$v1[$i]','$u1[$i]','$rate[$i]','$amt[$i]','$txtnar','$txttot','$ses_id','$status')");
    }

    // echo "<script>alert('Sales Voucher added successfully');</script>";
}
?>



<div align="center">
  
</div>
<br><br>
 

  <form method="post">

<div class="container">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-6">

   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b
                >Sales No</b></font></label>
          <?php  
          $ses_id=$_SESSION['plot_id']; 
          $q1=mysqli_query($db,"select count(*) as cnt from tblsales where ses_id=".$ses_id);
               $r1=mysqli_fetch_array($q1);      
      ?>
    <input type="text" class="form-control"  id="sno" name="sno" value="<?php echo $r1['cnt']+1; ?>" required>
            </div>
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Date:</b></font></label>
                <input type="date" name="txtdate" id="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
          </div>
        
     
     <div class="row"> 
    <div class="col-sm-6 form-group">
            <label><font color="black"><b>Invoice Number:</b></font></label>
            <input type='text' class="form-control" placeholder="Enter Invoice Number" name="invoice_no" required>
        </div>
        <div class="col-sm-6 form-group">
            <label><font color="black"><b>Plot Name(If any):</b></font></label>
         <select name="pname" id="pname" class="form-control" placeholder="Enter Plot Name" onchange="showUser(this.value);" required>
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
            <label><font color="black"><b>Party Account Name</b></font></label>
          <input type='text' class="form-control" placeholder="Enter Party Account Name" name="txtpname" id='autocomplete' required>
        </div>
  
  
    </div>

  

     <table  class="table" border="1" style="width:40px" align="center">
<thead>
            <tr>
                <th><font color="black">Name of Fruit</font></th>
               <th><font color="black">Variety</font></th>
                <th><font color="black">Quantity</font></th>
                <th><font color="black">Unit</font></th>
                <th><font color="black">Rate</font></th>
                <th><font color="black">Amount</font></th>
              
            </tr>
            </thead>
            <tbody>
            <tr class='tr_input'>
                <td><input type='text' class='under'  placeholder="Enter Fruit" size='15' name="txtitem[]"  id='under_1'></td>
                <td><input type='text' class='variety' placeholder="Enter Variety" size='15' name="txtvariety[]"  id='variety_1'></td>
                <td><input type='text' class='qty' size='15' id='qty_1' placeholder="Enter Quantity" name="txtqty[]" required></td>
                 <td>
                <select name="txtunit[]" id="unit_1" class="unit"  size="1" required>
                <option value="">Select Unit</option>
                <option value="kg">Kg</option>
                <option value="g">g</option>  
               </select>
              </td>
             <td><input type='text' class='rate' id='rate_1' size='15' name="txtrate[]" placeholder="Enter rate" required></td>
                <td><input type='text' class='amount' placeholder="Amount" id='amount_1' name="txtamt[]" size='10'  required></td>
            </tr>
            </tbody>
        </table>
       <br>
        <div align="right"  class="col-sm-10">
        <input type='button' class="btn btn-info btn-sm" value='+' id='addmore'>
    </div><br><br>

 
        
<div class="row">
      <div class="col-sm-6 form-group">
    <label><font color="black"><b>Narration:</b></font></label> 
    <textarea  class="form-control" placeholder="Enter Naration"  name="txtnar"></textarea>
  </div>

            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Total:</b></font></label>
            <input type="text" class="form-control" name="txttot" onclick="f1()"; id="txttot" placeholder="Enter amount" required>
              
              </div>
            </div>
         
          

<br>
        <div class="row">
         <div class="col-sm-12"> 
            <center>
            <button type="submit"  name="btnreg" id="save" class="btn btn-success  btn-lg"><b>ADD</b></button>
            <button type="submit"  name="btnreg" id="save" class="btn btn-success  btn-lg" onclick="window.location.href='all_sales.php'"><b>VIEW LIST</b></button>
            </center>
          </div>
        </div>
        <br><br>
          
        </div></div>

        
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
               // save selected id to input
                return false;
            }
        });

        // Multiple select
        $( "#multi_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                var searchText = extractLast(request.term);
                $.ajax({
                    url: "suggestion45.php",
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
//                        alert(userid);
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
                                    var variety = response[0]['variety'];
  //                                  alert(variety);
                                    // var email = response[0]['email'];
                                    // var age = response[0]['age'];
                                    // var salary = response[0]['salary'];

                                    document.getElementById('variety_'+index).value = variety;
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
                var html = "<tr class='tr_input'><td><input type='text' size='15' class='under' name='txtitem[]' placeholder='Enter Fruit' id='under_"+index+"' required></td><td><input type='text' placeholder='Enter Variety' size='15' class='variety' name='txtvariety[]' id='variety_"+index+"' required></td><td><input type='text' size=15' class='qty'  name='txtqty[]' placeholder='Enter Quantity' id='qty_"+index+"'></td><td><select name='txtunit[]' id='unit_"+index+"' class='unit' size='1' required><option value=''>Select Unit</option><option value='kg'>Kg</option><option value='g'>g</option></select></td><td><input type='text'  name='txtrate[]' size='15' class='rate' placeholder='Enter Rate'  id='rate_"+index+"' required></td><td><input type='text' size='10' class='amount' id='amount_"+index+"' placeholder='Amount' name='txtamt[]' required></td></tr>";

                // Append data
                $J('tbody').append(html);
                
            });
        });

    </script>

    <script>
  (function() {
    "use strict";

    $("table").on("change", "input", function() {
      //alert('hlw');
      var row = $(this).closest("tr");
      var qty = parseFloat(row.find(".qty").val());
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
      var price = parseFloat(row.find(".rate").val());
     // alert(price);
      var total = qty1 * price;
     // alert(total);
      row.find(".amount").val(isNaN(total) ? "" : total);
    });
  })();
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
   //alert(add);
   

  document.getElementById('txttot').value=parseInt(add);
}
</script>

</form>
<?php// include('reght_sidebar.php');?>
<?php //include('footer.php');?>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>      



</body>
</html>
