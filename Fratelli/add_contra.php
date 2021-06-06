 <!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>


  <?php include('config.php');?>
    
 
  

    <style>
      .no-outline:focus {
      outline: none;
        }
    </style>
    
</head>
<body class="sb-nav-fixed">
<?php  include('header.php');?>
  <h2 class="w3-container"><font color="black"><b>ADD CONTRA</b></font></b></h2>
</div>
   <?php
if(isset($_POST["btnreg"]))
{
  extract($_POST);
  $ses_id=$_SESSION['plot_id'];
  $a = implode(',', $_POST['txtacc1']);
  $c = implode(',', $_POST['txtamt1']);


 mysqli_query($db,"insert into tblcontra(cno,date,account,particuler,amount,narration,total,ses_id)values('$cno','$txtdate','$txtacc','$a','$c','$txtnar','$total','$ses_id')");




   echo "<script>alert('Contra Voucher added successfully');</script>";
    
}
?>



<br><br>
 <form method="post">

<div class="container">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">

   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Contra No:</b></font></label>
      <?php
      $ses_id=$_SESSION['plot_id'];  
       $q1=mysqli_query($db,"select count(*) as cnt from tblcontra where ses_id=".$ses_id);
               $r1=mysqli_fetch_array($q1);      
      ?>
            <input type="text" class="form-control"  id="cno" name="cno" value="<?php echo $r1['cnt']+1; ?>" required>
            </div>
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>Date:</b></label>
                <input type="date" name="txtdate" id="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
        </div>
     <div class="row">
    <div class="col-sm-6 form-group">
            <label><font color="black"><b>Account:</b></font></label>
            <input type='text' class="form-control" placeholder="Enter Account" name="txtacc" id='autocomplete' >
        </div>
     </div>
        
<div class="row">        
<div class="col-sm-12">
          <table class="table" border='1'>
            <thead>
            <tr>
             <th>Particulars</th>
             <th>Amount</th>
                </tr>
            </thead>
            <tbody>
            <tr class='tr_input'>
                
                <td><input type='text' size="19" class='under' name="txtacc1[]" id='under_1' placeholder='Enter account'></td>
              
                <td><input type='text' size="19" class='amount' name="txtamt1[]" placeholder="Enter amount"  id='amount_1'  ></td>
               
            </tr>
            </tbody>
        </table>
    </div></div>
        <br>
        <div align="right"  class="col-sm-10">
        <input type='button' class="btn btn-info btn-sm" value='+' id='addmore'>
    </div>
    </div><br><br>

<div class="col-sm-12">
     <div class="row"> 
        <div class="col-sm-6 form-group">
    <label><b>Narration:</b></label> 
    <textarea class="form-control" onclick="f1()"; placeholder="Enter Narration.." id="open" name="txtnar"></textarea>
  </div>

           <div class="col-sm-6 form-group">
            <label><b>Total:</b></label>
            <input type='text' class="form-control" placeholder="Total" name="total" id='total' >
        </div>
    </div></div>
<br><br>
        <div class="row">
          <div class="col-sm-4"></div>
         <div class="col-sm-8"> 
            
            <button type="submit"  name="btnreg" id="save" class="btn btn-success btn-lg"><b>ADD</b></button>
            <button type="submit"  name="btnsave"  id="save1" class="btn btn-success btn-lg" ><b>VIEW LIST</b></button>
          </div> 
        </div>
        <br><br>

<?php 
if(isset($_POST['btnsave']))
{
  ?>
<script>
  window.location.href='all_contra.php';
</script>
}
?>
<?php
}?>
</div>

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
                            url: "getDetails5.php",
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
                        var userid = ui.item.value; 
                        //alert(userid);// selected id to input

                        // AJAX
                        $.ajax({
                            url: 'getDetails5.php',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){
                              
                              
                                
                               
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
                  var html = "<tr class='tr_input'><td><input type='text' size='19'  class='under' id='under_"+index+"' name='txtacc1[]' placeholder='Enter account'></td><td><input type='text' size='19' class='amount' id='amount_"+index+"' placeholder='Enter amount' name='txtamt1[]'></td></tr>"

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

<script src="js/reload.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</form></body>
</html>
