<?php  

include('config.php');
$ses_id=$_SESSION['plot_id'];

$sql = "SELECT * FROM tblirrigation where status=0 and ses_id='".$ses_id."' GROUP BY pname";
$result=mysqli_query($db, $sql);


?> 

<!DOCTYPE html>  
<html>  
    <head>  
         <?php include ('head.php');?> 
          <?php include ('config.php');?> 
        <title>Create Dynamic Column Chart using PHP Ajax with Google Charts</title>
      
       
    </head>
     <body class="sb-nav-fixed"> 
 
    <?php include ('header.php');?> 
    <?php 
 $ses_id=$_SESSION['plot_id'];
  $q=mysqli_query($db,"SELECT SUM(tot_water) as psum FROM tblirrigation where ses_id='".$ses_id."' and status=0 ");
  $r=mysqli_fetch_array($q);
 
  $q1=mysqli_query($db,"SELECT SUM(duration) as dsum FROM tblirrigation where ses_id='".$ses_id."' and status=0 ");
   $r1=mysqli_fetch_array($q1);

?>


   
        <br /><br />
        
       
            <h2><b>IRRIGATION</b> </h2>
            <br />  

             <div class="row">
                <div style="margin-left: 1%"></div>
              <div class="col-sm-2 form-group">
                <label><font color="black"><b>Water Irrigated</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $r['psum']. 'litre'; ?>" readonly>
                </div>
<div class="col-sm-1"></div>
              
              <div class="col-sm-2 form-group">
                   <label><font color="black"><b>Irrigated</b></font></label>
                    <input type="text" class="form-control" value="<?php echo $r1['dsum'] .'hrs'; ?>" name="txtname" readonly>
              </div>
            
            </div>
         
                 <!--    <div class="row">
                       
                       <div class="col-sm-1"></div>
                        <div class="col-sm-5 form-group">
                            <select name="pname" class="form-control" id="pname">
                                <option value="">Select Plot Name.</option>
                            <?php
                            foreach($result as $row)
                            {
                                echo '<option value="'.$row["pname"].'">'.$row["pname"].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
 -->

<!--              
                        <div id="chart_area" style="width: 1000px; height: 620px;"></div>
 -->            
       
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback();

function load_monthwise_data(pname,title)
{ 


    var temp_title = title + ' '+pname+'';

    $.ajax({

        url:"getirr.php",
        method:"POST",

        data:{pname:pname},
        dataType:"JSON",
        success:function(data)
        {

            drawMonthwiseChart(data, temp_title);
        }
    });
}

function drawMonthwiseChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Month');
    data.addColumn('number', 'dur');
    $.each(jsonData, function(i, jsonData){
        var month = jsonData.month;
         var week = jsonData.week;
         var a=month+"-"+week;
        var dur = parseFloat($.trim(jsonData.dur));
        data.addRows([[a, dur]]);
    });
    var options = {
        title:chart_main_title,
        hAxis: {
            title: "Months"
        },
        vAxis: {
            title: 'Hours'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_area'));
    chart.draw(data, options);
}

</script>
 -->
 <br>
<div class="row">
  <div style="margin-left:2%"></div>
    <div class="col-sm-"></div>

<label for="item"><font color="black"><b>Select Plot Name:</b></font></label>
 
      <div class="col-sm-3 form-group"> 
 <select name="pname"  onchange="showUser(this.value)" class="form-control">
        <option value="all plot">All Plot</option>
              
                <?php
                  $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct pname from tblirrigation where status=0 and ses_id='".$ses_id."' order by date");
                  
                  
                    foreach ($q as $txtpno){
                ?>
                        <option value="<?php echo $txtpno['pname'];?>"><?php echo $txtpno['pname'];?></option>
                <?php
                    }
                ?>
        </select>
      </div></div>
      <div id="txtHint"></div>

<p  id="txtHint"></p>
 <script>
function showUser(str) {

  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getIrrigation.php?q="+str,true);
    xmlhttp.send();
    document.getElementById("myTable").remove(); 

  }
}
</script>

 <table id="myTable"  border="1" class="table" style="width:60%;margin-left: 1%">
<tr>
    <td><b>Sr. No.</b></td>
    <td><b>Date</b></td>
    <td><b>Plot No</b></td>
    <td><b>Time</b></td>
    <td><b>Moisure Before</b></td>
  <?php
  $i=1;

   $sql="SELECT * from tblirrigation WHERE  ses_id='".$ses_id."' and status=0 order by date";

$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {

  ?>
  
<tr>

    
    <Td>
    
     <?php echo $i;
            $i++ ?>
    </Td>
    <Td>
    
      <?php echo $r["date"];?>
    </Td>
    
    <Td>
      <?php echo $r["plot_no"];?>
    </Td>
      <Td>
      <?php echo $r["duration"];?> hrs
    </Td>
     <Td>
      <?php echo $r["moisure"];?> days
    </Td>
    

  </tr>
<?php
} 
?>
</table>
<br><br>
<div style="margin-left: 35%">
<button class="btn btn-success" onclick="window.location.href='irr_report2.php'">PRINT</button></div>


<script>
    
$(document).ready(function(){

    $('#pname').click(function(){
        var pname = $('#pname').val();
        // var from_date = $('#fromdate').val();
        // var to_date = $('#todate').val();
        // // var checkname = $('#checkname').val();
        // var favorite = [];
        //     $.each($("input[name='favorite']:checked"), function(){            
        //         favorite.push($(this).val());
        //     });
        //    //alert(favorite);
        if(pname != '')
        {
            //alert(favorite);
            load_monthwise_data(pname, 'Irrigation for');
        }
    });

});

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<?php //include('footer.php');?>
</body></html>
