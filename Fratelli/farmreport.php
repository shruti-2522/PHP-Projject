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
<body class="sb-nav-fixed">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Count'],
          <?php
          $q=mysqli_query($db,"SELECT count(item_name) as cnt,MONTHNAME(date) as month FROM tblp1 GROUP BY MONTH (date)");
        while($r=mysqli_fetch_array($q))
        {
          $date=$r['month'];
          $cnt=$r['cnt'];
          
          ?>
          ['<?php echo $date; ?>',<?php echo $cnt; ?>],
          <?php
        }

          ?>
          
        ]);

        var options = {
          title: 'Stock Summary',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
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

<?php  include('header.php');?>
<?php 
  $q=mysqli_query($db,"SELECT SUM(tot_amount) as psum FROM tblp1 ");
  $r=mysqli_fetch_array($q);
  //SELECT SUM(tot_amount) as asum FROM tblp1,tblitem WHERE tblp1.item_name and tblitem.item_type='Assets'
    //$q1=mysqli_query($db,"SELECT SUM(tot_amount) as asum FROM tblp1,tblitem WHERE tblitem.item_type='Fixed assets' ");
  $q1=mysqli_query($db,"select sum(tblp1.tot_amount) as asum from tblp1,tblitem WHERE tblitem.item_type='Assets' and tblitem.item_name=tblp1.item_name");
   $r1=mysqli_fetch_array($q1);
    //$q5=mysqli_query($db,"SELECT SUM(tot_amount) as psum FROM tblp1 ");
   $q5=mysqli_query($db,"select sum(firstSum) as fsum from (select Sum(total) firstSum from tbldisease union select Sum(total) firstSum from tblfertilizer union select Sum(total) firstSum from tblgr ) tbl");
   //echo $q5;
  $r5=mysqli_fetch_array($q5);
?>

   <div class="container">
  <h2 class="w3-container"><b>STOCK SUMMARY</b></b></h2>
</div>
<br><br>
<div class="w3-container w3-bordered">
  <div class="row">
    <div class="col-sm-2"></div>
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
                    <input type="text" class="form-control" value="<?php echo $r5['fsum']; ?>" name="txtname" readonly>
              </div>
            </div></div></div></div></div>
            <div class="container" style="margin-left: 20%">
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
</div>
<br><br>
<div align="center">
<div class="container">   
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>
</div>
<br><br>
    
<?php
  if(isset($_POST["btnadd"]))
{
extract($_POST);
 mysqli_query($db,"insert into tblmejorgrp(grp_name)values('$txtgname')");

}
?>
<body>
<div class="w3-container w3-bordered">
<div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">
<div class="container" style="margin-left: 25%">
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
</body>
</html>

</div>
</div>


</body>
</html>