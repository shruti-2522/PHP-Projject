 <!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('config.php');?>
 <?php include('head.php');?> 
 
 
    
</head>
<?php include("header.php");?>
<div class="container">
  <h2 class="container"><font color="black"><b>ADD PAYMENT VOUCHER</b></font></b></h2>
</div>
<body class="sb-nav-fixed">
    <?php
if(isset($_POST["btnreg"]))
{
 extract($_POST);
 $ses_id=$_SESSION['plot_id'];
  $a = implode(',', $_POST['txtacc1']);
 
  $c = implode(',', $_POST['txtamt1']);

  


  mysqli_query($db,"insert into tblpayment(payment_no,date,plot_name,account,particuler,amount,narration,total,ses_id)values('$rno','$txtdate','$pname','$txtacc','$a','$c','$txtnar','$total','$ses_id')");


  
   echo "<script>alert('Payment Voucher added successfully');</script>";
 
}
?>


<div align="center">
  
</div>
<br><br>
 <?php //include('reght_sidebar.php');?>

  <form method="post">

<div class="container">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">

   <div class="col-sm-12">

          <div class="row">
        <div class="col-sm-3 form-group">
    
    <label><font color="black"><b>Payment no.:</b></font></label> 
      <?php  
      $ses_id=$_SESSION['plot_id'];
       $q1=mysqli_query($db,"select count(*) as payment_no from tblpayment where ses_id=".$ses_id);
               $r1=mysqli_fetch_array($q1);      
      ?>
    <input type="text" class="form-control"  id="rno" name="rno" value="<?php echo $r1['payment_no']+1; ?>" required>
  </div>
  <div class="col-sm-4 form-group">
<label><font color="black"><b>Date:</b></font></label> 
<input type="date" name="txtdate" id="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
</div>
 <div class="col-sm-5 form-group">
            <label><font color="black"><b>Plot Name(If any):</b></font></label>
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
            <label><font color="black"><b>Account:</b></font></label>
            <input type='text' class="form-control" placeholder="Enter Account" name="txtacc" id='autocomplete' >
        </div>

     

    </div>

        

          <table class="table" border='1' align="center">

            <thead>
            <tr>
                <th><font color="black">Particulars</font></th>
              
                <th><font color="black">Amount</font></th>
                 
               
            </tr>
            </thead>
            <tbody>
            <tr class='tr_input'>
                <td><input type='text' class='under' size='20' name="txtacc1[]" id='under_1' placeholder='Enter account'></td>
              
                <td><input type='"text'   class='amount' size='20' name="txtamt1[]" placeholder="Enter Amount"  id='amount_1'  ></td>
               <!--  <td><input type='text' class='age' id='age_1' ></td>
                <td><input type='text' class='email' id='email_1' ></td>
                <td><input type='text' class='salary' id='salary_1' ></td> -->
            </tr>
            </tbody>
        </table>
        <br>
        <div align="right"  class="col-sm-10">
        <input type='button' class="btn btn-info btn-sm" value='+' id='addmore'>
    </div>

     <div class="row">
        <div class="col-sm-6 form-group">
    <label><font color="black"><b>Narration:</b></font></label> 
    <textarea class="form-control"  placeholder="Enter opening  balance.." id="open" name="txtnar" onchange="f1()"; ></textarea>
  </div>
            <div class="col-sm-6 form-group">
           <label><font color="black"><b>Total:</b></font></label>
            <input type='text' class="form-control" placeholder="Total"   name="total" id='total' >
        </div></div>

        <div class="row">
        <div class="col-sm-12">
         <center>
          <br>
            <button type="submit"  name="btnreg" id="save" class="btn btn-success  btn-lg"><b>ADD</b></button>
            <button type="submit"  name="btnreg" id="save" class="btn btn-success btn-lg" onclick="window.location.href='all_payment.php'"><b>VIEW LIST</b></button>
          </center>
          </div>
        </div>
      </div>
        <br><br>



</div>
</div>

        
<tr>
  
    </table>
    

    <!-- Script -->
    <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "fetchData2.php",
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

    

           
           
        });
 
    
    function extractLast( term ) {
      return split( term ).pop();
    }

    </script>

       <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="jquery-ui.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        //$J = jQuery.noConflict();
        $(document).ready(function(){

            $(document).on('keydown', '.under', function() {
                
                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];

                $( '#'+id ).autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "getDetails.php",
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
                        $(this).val(ui.item.label); // display the selected text
                        var userid = ui.item.value; // selected id to input

                        // AJAX
                        $.ajax({
                            url: 'getDetails.php',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){
                              
                                
                                var len = response.length;

                               
                                
                            }
                        });

                        return false;
                    }
                });
            });
            
            // Add more
            $('#addmore').click(function(){

                // Get last id 
                var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                var split_id = lastname_id.split('_');

                // New index
                var index = Number(split_id[1]) + 1;

                // Create row with input elements
                  var html = "<tr class='tr_input'><td><input type='text' size='20' class='under' id='under_"+index+"' name='txtacc1[]' placeholder='Enter account'></td><td><input type='text' size='20' class='amount' id='amount_"+index+"' placeholder='Enter amount' name='txtamt1[]'></td></tr>"

                // Append data
                $('tbody').append(html);
                
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
</form>
<?php// include('reght_sidebar.php');?>
<?php //include('footer.php');?>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>      

     </body>
</html>
