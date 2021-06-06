	<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('head.php');?>

	<?php include('config.php');?>


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
              document.getElementById("fruit_name").value = data[0].fruit_name;
              document.getElementById("variety").value = data[0].variety;
              console.log(data[0]['variety']);
            }
          };

          xmlhttp.open("GET", "getData8.php?str=" + str, true);
          xmlhttp.send();
        }
      }
    </script>


</head>
<body class="sb-nav-fixed">
<?php include('header.php');?>


<?php
if(isset($_POST["btnadd"]))
{
  $ses_id=$_SESSION['plot_id'];
  extract($_POST);
  extract($_POST);
   $a = implode(',', $_POST['txtpkg']);
   $b = implode(',', $_POST['txtnos']);
   $c = implode(',', $_POST['txttotal']);
   //echo $a;
 $ses_id=$_SESSION['plot_id'];
   mysqli_query($db,"insert into tblharvest(srno,plot_no,date,end_date,days_till_harvest,stime,etime,fruit_name,variety,package,NOS,total,total_amount,export,local,scrap,ses_id)values('$cno','$plot_no','$txtdate','$txtend','$txtdays','$txtstime','$txtetime','$fruit_name','$variety','$a','$b','$c','$txttotal1','$export','$local','$txtscrap','$ses_id')");
   echo "<script>window.location.href='harvest1.php';</script>";
    exit;

}
 
?>

	<h2 class="w3-container"><b>ADD HARVESTING RECORDS</b></b></h2>

</div>
<br><br>


 
<div class="w3-container w3-bordered">
	<div class="row">
		<div class="col-sm-1"></div>
 <div class="col-sm-7">


    <form method="post" enctype="multipart/form-data" id="myform">

   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Sr No:</b></font></label>
                <?php 
                 $ses_id=$_SESSION['plot_id'];
                 $q1=mysqli_query($db,"select count(*) as cnt from tblharvest where ses_id=".$ses_id);
               $r1=mysqli_fetch_array($q1);      
      ?>
       <input type="text" class="form-control"  id="cno" name="cno" value="<?php echo $r1['cnt']+1; ?>" required>
             
              </div>
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Plot No:</b></font></label>
              <select name="plot_no" id="plot_no" class="form-control" onchange="showUser(this.value);"  oninput="showUser4(this.value);">
               <option value="">Select plot no.:</option>
              
                <?php
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
            </div> <input type="text"  id="pno" style="display: none">



           <div class="row">
            <div class="col-sm-6 form-group">
          <label><font color="black"><b>Date:</b></font></label>
          <input type="Date" placeholder="Enter date.." name="txtdate" class="form-control" id="txtFirst" onchange="myfunction();" required>
          </div>
  
           <div class="col-sm-6 form-group">
           	 <label><font color="black"><b>Days After Prunning:</b></font></label>
           	<!--   <input type="text" placeholder="Enter days" name="txtdays" class="form-control"  required> -->
            <input  placeholder="Enter Days After Prunning.." class="form-control" name="txtdays" id="txtSecond" required>

          </div>
           
        </div>


            <div class="row">

        <div class="col-sm-6 form-group">
              <label><font color="black"><b>Start Time</b></font></label>
               <input type="Time" placeholder="Enter Start Time.." name="txtstime" oninput="difftime()"; id="time1" class="form-control" required>
              </div>
            
          <div class="col-sm-6 form-group">
                <label><font color="black"><b>End Time:</b></font></label>
                 <input type="Time" placeholder="Enter Time.." name="txtetime" id="time2" oninput="difftime()"; class="form-control" required>
               
              </div>
            </div>
            
            <div class="row">
             <div class="col-sm-6 form-group">
              <label><font color="black"><b>Fruit</b></font></label>
               <input type="text" placeholder="Enter fruit name" name="fruit_name"  id="fruit_name" class="form-control"  onClick="substract();" required>
              </div>
            
          <div class="col-sm-6 form-group">
                <label><font color="black"><b>Variety:</b></font></label>
                 <input type="text" placeholder="Enter variety" name="variety" id="variety"  class="form-control" required>
               
              </div>
            </div>

              <table  class="table" border="1" style='border-collapse: collapse;' align="center">

            <thead>
            <tr class="header">
                <th><font color="black"><center><b>Packing In Kg</b></center></font></th>
                <th><font color="black"><b><center>NOS</b></center></font></th>
                <th><font color="black"><center><b>Total</b></center></font></th>
                
               
            </tr>
            </thead>
            <tbody>
            <tr class='tr_input' >
                <td><input type='text' class='pkg' name="txtpkg[]" id='pkg_1' placeholder='Enter packing'></td>
               
                <td><input type='text' class='nos'  placeholder="Enter NOS" id='nos_1' name="txtnos[]"  onchange="multiply();"></td>
                <td><input type='text' class='total' id='total_1' placeholder="Enter Total" name="txttotal[]" ></td>
                
               <!--  <td><input type='text' class='age' id='age_1' ></td>
                <td><input type='text' class='email' id='email_1' ></td>
                <td><input type='text' class='salary' id='salary_1' ></td> -->
            </tr>
            </tbody>
        </thead>
        </table>
       <br>
        <div align="right"  class="col-sm-10">
        <input type='button' class="btn btn-info btn-sm" value='+' id='addmore'>
    </div>

     <div class="row">
             <div class="col-sm-6 form-group">
              <label><font color="black"><b>Total Amount</b></font></label>
               <input type="text" placeholder="Total Amount" name="txttotal1"  id="txttotal1" class="form-control" onchange="f1();"  required>
              </div>
            </div>

     <div class="row">
             <div class="col-sm-4 form-group">
              <label><font color="black"><b>Export Quality</b></font></label>
               <input type="text" placeholder="Enter Export" name="export"  id="txtexport" class="form-control" required>
              </div>
            
          <div class="col-sm-4 form-group">
                <label><font color="black"><b>Local Quality:</b></font></label>
                 <input type="text" placeholder="Enter Local" name="local" id="txtlocal"  class="form-control"  onchange="abc();"  required>
               
              </div>
                <div class="col-sm-4 form-group">
                <label><font color="black"><b>Scrap:</b></font></label>
                 <input type="text" placeholder="Enter Scrap" name="txtscrap" id="txtscrap"  class="form-control"   required>
               
              </div>
            </div>
           
      	<div align="center"><button type="submit" class="btn btn-success col-sm-4" name="btnadd"><b>ADD</b></button></div>
        <br>
</div>
</div>
</div>

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
<script>
  (function() {
    "use strict";

    $("table").on("change", "input", function() {
      var row = $(this).closest("tr");
      var qty = parseFloat(row.find(".pkg").val());
      var price = parseFloat(row.find(".nos").val());
      var total = qty * price;
      row.find(".total").val(isNaN(total) ? "" : total);
    });
  })();
</script>

    
  <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="jquery-ui.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        //$J = jQuery.noConflict();
        $(document).ready(function(){

            $(document).on('keydown', '.pest', function() {
                
                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];

                // $( '#'+id ).autocomplete({
                //     source: function( request, response ) {
                //         $.ajax({
                //             url: "getDetails3.php",
                //             type: 'post',
                //             dataType: "json",
                //             data: {
                //                 search: request.term,request:1
                //             },
                //             success: function( data ) {
                //                 response( data );
                //             }
                //         });
                //     },
                //     select: function (event, ui) {
                //         $(this).val(ui.item.label); // display the selected text
                //         var userid = ui.item.value; // selected id to input

          

                       
                //         return false;
                //     }
                // });
            });
            
            // Add more
            $('#addmore').click(function(){

                // Get last id 
                var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                var split_id = lastname_id.split('_');

                // New index
                var index = Number(split_id[1]) + 1;

                // Create row with input elements
                  var html = "<tr class='tr_input'><td><input type='text' class='pkg' name='txtpkg[]' id='pkg_"+index+"' placeholder='Enter packing'></td><td><input type='text' class='nos'  name='txtnos[]' placeholder='Enter NOS' id='nos_"+index+"'></td><td><input type='text'  name='txttotal[]' class='total' placeholder='Enter NOS'  id='total_"+index+"'></tr>"

                // Append data
                $('tbody').append(html);
                
            });
        });

    </script>




<!-- <script>

  function multiply() {
  a = Number(document.getElementById('pkg_1').value);
  b = Number(document.getElementById('nos_1').value);
  c = a * b;

  document.getElementById('total_1').value = c;
}
 </script>
 -->
 <script>
    function f1()
    {
        var a,add;
        add=0;
         a=document.querySelectorAll(".total");
          for (i = 0; i < a.length; i++) {
              //alert(a[i].value);
            add=parseInt(add) + parseInt(a[i].value);
   }
   document.getElementById('txttotal1').value=parseInt(add);
}
</script>


 <script>

  function abc() {
     a = Number(document.getElementById('txtexport').value);
    b = Number(document.getElementById('txtlocal').value);
    c=a+b;

    scrap=document.getElementById('txttotal1').value-c;
    //alert(scrap);
    document.getElementById('txtscrap').value=scrap;
  

}
 </script>
  <script type="text/javascript">
      function showUser4(pno) {
        if (pno == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              data = JSON.parse(this.responseText);
              
             
              //document.getElementById("purchase_rate").value = data[0].purchase_rate;
              document.getElementById("pno").value = data[0].date;
              
              console.log(data[0]['date']);
            }
          };

          xmlhttp.open("GET", "getpdate.php?pno=" + pno, true);
          xmlhttp.send();
        }
      }
    </script>
     <script type='text/javascript'>
        function myfunction()
        {
            var ddate =document.getElementById('pno').value;
            var start_date=document.getElementById('txtFirst').value;
            var diff =  Math.floor(( Date.parse(start_date) - Date.parse(ddate) ) / 86400000);
            document.getElementById('txtSecond').value=(diff)+ "days";
        }
      </script>


<?php include('footer.php');?>
<script src="js/reload.js"></script>
</body>
</html>