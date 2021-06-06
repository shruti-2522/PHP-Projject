<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <?php include('graphcss.php');?>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php  //include('header.php');?>
<?php 

  $ses_id=$_SESSION['plot_id'];
  $q=mysqli_query($db,"SELECT SUM(tot_amount) as psum FROM tblp1 where ses_id='".$ses_id."' and status=0 ");
  $r=mysqli_fetch_array($q);
    //$q1=mysqli_query($db,"SELECT SUM(tot_amount) as asum FROM tblp1 WHERE item_type='Fixed assets' ");
  $q1=mysqli_query($db,"select sum(tblp1.tot_amount) as asum from tblp1,tblitem WHERE tblitem.item_type='Assets' and tblitem.item_name=tblp1.item_name and tblp1.ses_id='".$ses_id."' and status=0 ");
  $r1=mysqli_fetch_array($q1);
   // $q5=mysqli_query($db,"SELECT SUM(tot_amount) as psum FROM tblp1 ");
   $q5=mysqli_query($db,"select sum(firstSum) as fsum from (select Sum(total) firstSum from tbldisease where tbldisease.ses_id=5 and status=0 union select Sum(total) firstSum from tblfertilizer where tblfertilizer.ses_id=5 and status=0 union select Sum(total) firstSum from tblgr WHERE tblgr.ses_id='".$ses_id."' and status=0 ) tbl");
  $r5=mysqli_fetch_array($q5);

 
?>

  <h2 class="w3-container"><b>STOCK SUMMARY</b></h2>
<br><br>
<div class="w3-container w3-bordered">
  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4 form-group">
                <label><font color="black"><b>Worth Stock</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $r['psum']; ?>" readonly>
                </div>
              <div class="col-sm-4 form-group">
                   <label><font color="black"><b>Worth Assets</b></font></label>
                    <input type="text" class="form-control" value="<?php echo $r1['asum']; ?>" name="txtname" readonly>
              </div>
               <div class="col-sm-4 form-group">
                   <label><font color="black"><b>Worth Item Used</b></font></label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $r5['fsum']; ?>"  readonly>
              </div>
            </div></div></div></div></div>
            
</div>

<?php

# Prepare a connection to the mySQL database
$connection = new mysqli("localhost", "root", "", "dbfarm");
if(isset($_POST["btnget"]))
{
  extract($_POST);
  // echo $_POST['plot_no'];
  // echo $_POST['fromdate'];
  // echo $_POST['todate'];
  // print_r($_POST['favorite']);

  

# If there are any errors or the connection is not OK
if ($connection->connect_error) {
        die ('Connection error: '.$connection->connect_error);
}

# Prepare a query to the mySQL database and get average hourly based download speed this month
$sql = "SELECT count(item_name) as cnt,MONTHNAME(date) as month FROM tblp1 where ses_id='".$ses_id."' and status=0 GROUP BY MONTH (date)";
$result = $connection->query($sql);

# This while - loop formats and put all the retrieved data into ['timestamp', 'download'] way.
        $data1 = array();
        while ($row = $result->fetch_assoc()) {
                $data1[] = [$row['month'], $row['cnt']];
                }

# Prepare a query to the mySQL database and get average hourly based download speed last month
$sql2 = "SELECT COUNT(tblp1.item_name)as cnt2, MONTHNAME(date) as month from tblitem,tblp1 where tblitem.item_type='assets' and tblitem.item_name=tblp1.item_name and tblp1.ses_id='".$ses_id."' and status=0 GROUP BY MONTH(date)";
$result2 = $connection->query($sql2);

# This while - loop formats and put all the retrieved data into ['timestamp', 'download'] way.
        $data2 = array();
        while ($row = $result2->fetch_assoc()) {
                $data2[] = [$row['month'], $row['cnt2']];
                }

# Prepare a query to the mySQL database and get average hourly based download speed 2 months ago
$sql3 ="SELECT t.m as month,SUM(t.Total) as cnt3 FROM ( SELECT MONTHNAME(date) as m, SUM(LENGTH(pesticide) - LENGTH(replace(pesticide, ',', '')) +1) as Total FROM tbldisease where ses_id='".$ses_id."' and status=0 group by MONTH(date) UNION ALL SELECT MONTHNAME(date) as m, count(fertilizer_name) as Total FROM tblfertilizer where ses_id='".$ses_id."' and status=0 group by MONTH(date) UNION ALL SELECT MONTHNAME(date) as m, count(growth_reg_name) as Total FROM tblgr where ses_id='".$ses_id."' and status=0 group by MONTH(date) )t GROUP BY t.m";
$result3 = $connection->query($sql3);

# This while - loop formats and put all the retrieved data into ['timestamp', 'download'] way.
        $data3 = array();
        while ($row = $result3->fetch_assoc()) {
                $data3[] = [$row['month'], $row['cnt3']];
                }
              }
?>

<html>
<head>


<!-- start of the HTML part that Google Chart needs -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- This loads the 'corechart' package. -->    
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']}).then(function drawChart() {

        
var data_currentmonth = <?php echo json_encode($data1,JSON_NUMERIC_CHECK); ?>;
var data_lastmonth = <?php echo json_encode($data2,JSON_NUMERIC_CHECK); ?>;
var data_monthb4lastmonth = <?php echo json_encode($data3,JSON_NUMERIC_CHECK); ?>;

// Current month
        var data1 = new google.visualization.DataTable();
        data1.addColumn({label: 'Month', type: 'string'});
        data1.addColumn({label: 'Item Purchase.', type: 'number'});
        data1.addRows(data_currentmonth);

// Last Month
        var data2 = new google.visualization.DataTable();
        data2.addColumn({label: 'Month', type: 'string'});
        data2.addColumn({label: 'Fixed Assets', type: 'number'});
        data2.addRows(data_lastmonth);

// Month Before Last Month
        var data3 = new google.visualization.DataTable();
        data3.addColumn({label: 'Month', type: 'string'});
        data3.addColumn({label: 'Item Used.', type: 'number'});
        data3.addRows(data_monthb4lastmonth);

// Join data tables
        var join1 = google.visualization.data.join(data1, data2, 'full', [[0,0]], [1], [1]);
        var join2 = google.visualization.data.join(join1, data3, 'full', [[0,0]], [1,2], [1]);

//sort data
        join2.sort([
                {column: 0}
        ]);

        
// Curved line
var options = {
                title: '',
                curveType: 'function',
                legend: { position: 'bottom' }
                };

// Curved chart
var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
chart.draw(join2, options);

}); // End bracket from drawChart
</script>
<body  class="sb-nav-fixed">

  <form method="post">
 <div class="container">  
      
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                           
                        </div>
                        <div class="col-md-3">
                            <select name="plot_no" class="form-control" id="plot_no">
                                <option value="">Select Plot No.</option>
                            <?php
                            $q=mysqli_query($db,"select plot_no from tblfertilizer GROUP BY plot_no");
                         
                            foreach($q as $row)
                            {
                                echo '<option value="'.$row["plot_no"].'">'.$row["plot_no"].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="date" name="fromdate" id="fromdate">
                        <input type="date" name="todate" id="todate">
                      

                        <button type="submit" name="btnget" id="btnget"><b>Get Chart</b></button>
                      </div></div>
                   

<div id="curve_chart" style="width: 1000px; height: 760px;"></div>




<div class="container">
<div class="row">
<div class="col-sm-0" style="margin-left: 5%"></div>   
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>
</div>
<br><br>
<div class="w3-container w3-bordered">
<div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">
<div class="container">
  <div class="col-sm-2"></div>
  <div class="row">
    <div class="col-sm-3">
    <input type="checkbox" class="checks" onclick="getValue();" value="pesticide" style="margin-right:10px;"><font color="black"><b>Pesticide</b></font></div>
    <div class="col-sm-3">
    <input type="checkbox" class="checks" onclick="getValue();" value="fertilizer" style="margin-right:10px;"><font color="black"><b>Fertilizer</b></font></div>
    <div class="col-sm-3">
    <input type="checkbox" class="checks" onclick="getValue();" value="assets" style="margin-right:10px;"><font color="black"><b>Assets</b></font></div>
    <div class="col-sm-1"><label style="margin-left: -50px"><font color="black"><b>Inventory</b></font></label></div>
     <div class="col-sm-1">
   <label class="switch">
  <input type="checkbox" class="checks" onclick="getValue();" value="datewise">
  <span class="slider round"></span>
</label>    
   </div>
    <div class="col-sm-1"><label><font color="black"><b>Datewise</b></font></label></div>   
    </div></div>
    
</div>
     <p  id="txtHint"></p>

<script>
function getValue() {
    var checks = document.getElementsByClassName('checks');
    var str = '';

    for ( i = 0; i < 4; i++) {
        if ( checks[i].checked === true ) {
            str += checks[i].value + " ";
        }
    }
   // alert(str);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","showreport.php?q="+str,true);
    xmlhttp.send();
  
}

</script>
<script >
$(document).ready(function($) {
  $(document).on('submit', '#submit-form', function(event) {
    event.preventDefault();
  
    alert('page did not reload');
  });
});
</script>
</div></div></div></form>
<?php include('footer.php');?>
</body>
</html>

</div>
</div>


