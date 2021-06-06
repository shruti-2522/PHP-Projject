<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>


<!-- jQuery UI --->

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
              document.getElementById("pname").value = data[0].pname;
              console.log(data[0]['pname']);
            }
          };

          xmlhttp.open("GET", "getData5.php?str=" + str, true);
          xmlhttp.send();
        }
      }
    </script>
  




</head>
<body class="sb-nav-fixed">
<?php  include('header.php');?>
    
 <h2 class="w3-container"><b>ADD PRUNNING</b></h2>
 <?php

if(isset($_POST["btndraft"]))
{
  extract($_POST);
   $a = implode(',', $_POST['txtworker']);
   $b = implode(',', $_POST['txtwages']);
   $ses_id=$_SESSION['plot_id'];
  $status=1;
 mysqli_query($db,"insert into tblprunning(plot_no,plot_name,prunning_type,date,stime,etime,duration,temp,climate,worker_name,wages,tot_wages,ses_id,status)values('$plot_no','$pname','$txtptype','$txtdate','$txtstime','$txtetime','$txtduration','$txttemp','$txtclimate','$a','$b','$total','$ses_id','$status')");

echo "<script>window.location.href='prunning.php';</script>";
    exit;
}


if(isset($_POST["btnadd"]))
{
  extract($_POST);
   $a = implode(',', $_POST['txtworker']);
   $b = implode(',', $_POST['txtwages']);
   $ses_id=$_SESSION['plot_id'];
 
 mysqli_query($db,"insert into tblprunning(plot_no,plot_name,prunning_type,date,stime,etime,duration,temp,climate,worker_name,wages,tot_wages,ses_id,status)values('$plot_no','$pname','$txtptype','$txtdate','$txtstime','$txtetime','$txtduration','$txttemp','$txtclimate','$a','$b','$total','$ses_id','$status')");

 
echo "<script>window.location.href='prunning.php';</script>";
    exit;
}
?>

  <form method="post" id="myform">

<div class="w3-container w3-bordered">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-7">

    <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot No.:</b></font></label>
                 <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);">
               <option value="">Select plot no.:</option>
              
                <?php
                   $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct(plot_no) from plot where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $plot_no){
                ?>
                        <option value="<?php echo $plot_no['plot_no'];?>"><?php echo $plot_no['plot_no'];?></option>
                <?php
                    }
                ?>
        </select>
        <div id="plot_no"></div>
             
              </div>
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot Name:</b></font></label>
              <input type="Text" placeholder="Plot Name.." name="pname" class="form-control" id="pname" required>
              </div>
            </div> 

<div class="row">
      <div class="col-sm-6 form-group">
        <label><font color="black"><b>Prunning Type:</b></font></label>
        <select name="txtptype" id="ptype" class="form-control">
        <Option value="">Select Prunning type</option>
        <Option value="April">April</option>
           <Option value="October">October</option>
      </SELECT>
  </div>



           
            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Date:</b></font></label>
          <input type="Date" placeholder="Enter date.." name="txtdate" class="form-control" id="txtFirst"  required>
          </div>
        </div>
       

            
          <div class="row">
            <div class="col-sm-6 form-group">
              <label><font color="black"><b>Start Time</b></font></label>
               <input type="Time" placeholder="Enter Time.." name="txtstime" oninput="difftime()"; id="time1" class="form-control" required>
              </div>
            
          


           
            <div class="col-sm-6 form-group">
                <label><font color="black"><b>End Time:</b></font></label>
                 <input type="Time" placeholder="Enter Time.." name="txtetime" id="time2" oninput="difftime()"; class="form-control" required>
               
              </div>
            </div>
            

<div class="row">
 <div class="col-sm-6 form-group">
  <label><font color="black"><b>Duration:</b></font></label>
   <input type="Text" placeholder="Enter Time.." name="txtduration" id="time3" class="form-control" required>
</div>
         


    
  <div class="col-sm-6 form-group">
          <label><font color="black"><b>Temperature:</b></font></label>
         
                      <input  placeholder="Enter Temperature.." name="txttemp" class="form-control" required>
              
              </div>
            </div>
          
           

<div class="row">
         <div class="col-sm-6 form-group">
          <label><font color="black"><b>Climate:</b></font></label>
       
        <select name="txtclimate" id="climate" class="form-control">
        <Option value="">Select Climate</option>
        <Option value="cloudy">cloudy</option>
        <Option value="cold">cold</option>
        <Option value="humid">humid</option>
        <Option value="moisture">moisture</option>
      </SELECT>
              </div>
            </div>

             <table class="table" border='1' align="center">

            <thead>
            <tr>
                <th><font color="black"><b>Worker name</b></font></th>
                <th><font color="black"><b>Wages</b></font></th>
               
               
            </tr>
            </thead>
            <tbody>
            <tr class='tr_input'>
                <td><input type='text' class='worker' name="txtworker[]" id='worker_1' placeholder='Enter worker name'></td>
                <td><input type='text' class='wages' name="txtwages[]" id='open_1'></td>
             
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
    </div>
         
          


 <div class="form-group col-sm-6">
  <label><font color="black"><b>Total Wages:</b></b></label>
    <input  placeholder="Total wages.." class="form-control"  id="total" onclick="f1()";  name="total" class="form-control" required>
  </div>


   <center>
         <button type="Submit" class="btn btn-success" name="btnadd"><b>ADD</b></button>
          <button type="Submit" class="btn btn-success" name="btndraft" formnovalidate=""><b>SAVE AS DRAFT</b></button>

         </center>
         <br>
       </div>



            

</div>
</div>


<!-- <script>
  $(document).ready(function(){
    $('#search_data').tokenfield({
        autocomplete :{
            source: function(request, response)
            {
                jQuery.get('fetch.php', {
                    query : request.term
                }, function(data){
                    data = JSON.parse(data);
                    response(data);
                });
            },
            delay: 100
        }
    });

   $('#search').click(function(){
        $('#search_data').text($('#search_data').val());
   });
  });
</script> -->

<script type="text/javascript">
function difftime()
{
myStart=document.getElementById("time1").value;
myEnd=document.getElementById("time2").value;


function getTimeDiff(start, end) {

  return moment.duration(moment(end, "HH:mm").diff(moment(start, "HH:mm")));
}

diff = getTimeDiff(myStart, myEnd)
document.getElementById("time3").value=(`${diff.hours()} Hour`);

}
</script>



<!-- <script type="text/javascript">
  
function f1()
{
  //var a=document.getElementById("search_data").value;
  var s1=document.getElementById("t1").value;
  var s2=document.getElementById("t2").value;
    var res = s1.split("+");

    var mult=res[0]*res[1];
  
    //mult=s1*s2;
    document.getElementById("wages").value=mult;
}

</script>

 -->



  <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="jquery-ui.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        //$J = jQuery.noConflict();
        $(document).ready(function(){

            $(document).on('keydown', '.worker', function() {
                
                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];

                $( '#'+id ).autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "getDetails2.php",
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
                  var html = "<tr class='tr_input'><td><input type='text' class='worker' id='worker_"+index+"' name='txtworker[]' placeholder='Enter worker name'></td><td><input type='text' class='wages' id='wages_"+index+"' name='txtwages[]'></td></tr>"

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
         a=document.querySelectorAll(".wages");
          for (i = 0; i < a.length; i++) {
              //alert(a[i].value);
            add=parseInt(add) + parseInt(a[i].value);
   }
   document.getElementById('total').value=parseInt(add);
}
</script>

</div>
</div>
</div>
</div>
</div>
<script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>     
 <script src="js/reload.js"></script>
</form>
</div>
</div>
</div>


</body>
</html>