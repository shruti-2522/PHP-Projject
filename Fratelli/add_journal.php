 <!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>
  
    
</head>
<body class="sb-nav-fixed">
<?php include("header.php"); ?>
<body>
    <?php
if(isset($_POST["btnreg"]))
{
  extract($_POST);
  $ses_id=$_SESSION['plot_id'];
  if($totald!=$totalc)
  {
  ?>
  <script>
   alert("Total debit is not equal to total credit");
     </script>
    <?php
  }
  else
  {
  $a = implode(',', $_POST['txtby']);
  $b=implode(',', $_POST['txtacc1']);

  $d = implode(',', $_POST['txtamt1']);
  $e = implode(',', $_POST['txtamt2']);
  

  
   mysqli_query($db,"insert into tbljournal(journal_no,date,toby,particuler,credit,debit,narration,tot_credit,tot_debit,ses_id)values('$journal_no','$txtdate','$a','$b','$d','$e','$txtnar','$totalc','$totald','$ses_id')");
 

   echo "<script>alert('Journal Voucher added successfully');</script>";
}}
?>

<div class="container">
  <h2 class="w3-container"><font color="black"><b>ADD JOURNAL VOUCHER</b></font></b></h2>
</div>

<div align="center">
  
</div>
<br><br>
 
  <form method="post">

<div class="containe">

  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">

   <div class="col-sm-12">

          <div class="row">
              <div class="col-sm-6 form-group">
    <label><font color="black"><b>Journal no.:</b></font></label> 
      <?php    
      $ses_id=$_SESSION['plot_id'];
      $q1=mysqli_query($db,"select count(*) as cnt from tbljournal where ses_id=".$ses_id);
               $r1=mysqli_fetch_array($q1);      
      ?>
    <input type="text" class="form-control"  id="cno" name="journal_no" value="<?php echo $r1['cnt']+1; ?>" required>
  </div>

 <div class="col-sm-6 form-group">
                <label><font color="black"><b>Date:</b></label>
                <input type="date" name="txtdate" id="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
        </div>     
        <div class="container" style="margin-left: -5%">       
<div class="row">
    <div class="col-sm-2">

          <table class="table" border="1" align="center" style="margin-left: 15%">

            <thead>
            <tr header="">
                <th>By/To</th>
                <th>Particulars</th>
              
                 <th>Debit</th>
                <th>Credit</th>
               
                
               
            </tr>
            </thead>
            <tbody>
            <tr class='tr_input'>
                <td><select name="txtby[]" class="toby" id="byto_1" onchange="debit();"><option value="">By/To</option><option value="By">By</option><option value="To">To</option></td>
                <td><input type='text' class='under' name="txtacc1[]" id='under_1' placeholder='Enter account' size="9"></td><td><input type='text' class='amount' placeholder="Enter Debit" name="txtamt1[]"   id='by_1'  onchange="func();" size="9"></td> <td><input type="text" name="txtamt2[]" placeholder="Enter Credit" id="to_1" class="amount1" size="9"></td>
               <!--  <td><input type='text' class='age' id='age_1' ></td>
                <td><input type='text' class='email' id='email_1' ></td>
                <td><input type='text' class='salary' id='salary_1' ></td> -->
            </tr>
            </tbody>
        </table>
        <br>
        <div align="right"  class="col-sm-10">
        <input type='button' class="btn btn-info btn-sm" value='+' id='addmore'>
    </div></div></div>
</div>
<br>
     <div class="row">
        <div class="col-sm-6 form-group">
    <label><font color="black"><b>Narration:</b></font></label> 
    <textarea class="form-control" onclick="f1()"; onkeyup="f2()";  placeholder="Enter opening  balance.." id="open" name="txtnar" required></textarea>
  </div></div>
<div class="row">
 <div class="col-sm-6 form-group">
            <label><font color="black"><b>Total Debit:</b></font></label>
            <input type='text' class="form-control" placeholder="Total Debit"   name="totalc" id='totaldeb' >
        </div>

      <div class="col-sm-6 form-group">
            <label><b>Total Credit:</b></label>
            <input type='text' class="form-control" placeholder="Total Credit"  name="totald" id='totalcred' >
        </div></div>
        
        <div class="row">
        <div class="col-sm-12">
         <center>
            <button type="submit"  name="btnreg" id="save" class="btn btn-success  btn-lg"><b>ADD</b></button>
            <button type="submit"  name="btnreg" id="save" class="btn btn-success  btn-lg" onclick="window.location.href='all_journal.php'"><b>VIEW LIST</b></button>
          </center>
          </div>
        </div>
      </div>
        <br><br>



</div>
</div>

        
<tr>
  
    </table>
<script>
      $(function() {
    $('table.w3-table').attr('margin-left', 50);
  });

</script>
    <!-- Script -->
    <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "getDetails.php",
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
                  var html = "<tr class='tr_input'><td><select name='txtby[]' class='toby' id='byto_"+index+"' onchange='debit();'><option value=''>By/To</option><option value='By'>By</option><option value='To'>To</option></select></td><td><input type='text' class='under' id='under_"+index+"' name='txtacc1[]' placeholder='Enter account' size='9'></td><td><input type='text' class='amount' id='by_"+index+"' placeholder='Enter Debit' name='txtamt1[]' size='9'></td><td><input type='text' class='amount1' id='to_"+index+"' placeholder='Enter Credit' name='txtamt2[]' size='9'></td></tr>"

                // Append dat
                $('tbody').append(html);


    

            });

        });
</script>

<
   <script>
$(document).ready(function(){
$("#onacc_").change(function () {
$("#amount_").val($('#onacc_').val());
});
});

</script>

<script>
  (function() {
    "use strict";

  
    $("table").on("click", "input", function() {
      var row = $(this).closest("tr");
      var by = row.find(".toby").val();
      //var a1=row.find('.amount').val();
      //var a2=row.find('.amount1').val();
      //alert(qty);
      if(by=='By')
      {
         $('.amount1').attr('readonly', true);
           $('.amount1').attr('disable', true);
       

         $('.amount').removeAttr('readonly');  
          
      }
      else
    
         if(by=='To')
      {
          $('.amount').attr('readonly', true); 
           
          
         $('.amount1').removeAttr('readonly'); 
         
      }
      
     
    
     
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
            //alert(a[i].value)
            add=Number(add) + Number(a[i].value);
   }
  // alert(parseInt(add));
   document.getElementById('totaldeb').value=parseInt(add);
}
</script>
<script>
    function f2()
    {
        var a,add;
        add=0;
         a=document.querySelectorAll(".amount1");
          for (i = 0; i < a.length; i++) {
            //alert(a[i].value)
            add=Number(add) + Number(a[i].value);
   }
  // alert(parseInt(add));
   document.getElementById('totalcred').value=parseInt(add);
}
</script>
<script>
    function func()
    {
         x=document.getElementById('amount_1').value;
        document.getElementById('onacc_1').value=x;
}
</script>
<script>
    var formData = document.forms.myForm;
formData.onsubmit = function() {

  if (document.getElementById('totaldeb').value!=document.getElementById('totalcred').value) 
  {
    alert("Enter valid amount");
    } 
};

</script>


<script>
  function byto()
  {
    var a=document.getElementsByClassName('toby')[0].value;
    alert(a);
  }

</script>


<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>      




</form></body>
</html>