<?php include('head.php');?>
 <?php include('config.php');?>

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
          ['Variety', 'Harvested'],
          <?php
         
          $ses_id=$_SESSION['plot_id'];
          $q=mysqli_query($db,"SELECT * from tblharvest where ses_id=".$ses_id);
        while($r=mysqli_fetch_array($q))
        {
         // $sum=0;
          $fruit=$r['fruit_name'];
          $variety=$r['variety'];
          $harvest=explode(',',$r['package']);
          // print_r($harvest);
           // foreach ($harvest as $key => $value) {
           //   $sum+=$value;
           // }
           
          ?>
          ['<?php echo $variety.'-'.$fruit; ?>',<?php echo $variety; ?>],
          <?php
        }

          ?>
          
        ]);

        var options = {
          title: 'Goods Summary',
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
  $q=mysqli_query($db,"SELECT SUM(package) as pack FROM tblharvest ");
  $r=mysqli_fetch_array($q);
    $q1=mysqli_query($db,"SELECT SUM(area) as acres FROM plot");
  $r1=mysqli_fetch_array($q1);
  $per_acrs=$r['pack']/$r1['acres'];
  $a=(round($per_acrs,2));

    $q5=mysqli_query($db,"SELECT SUM(qty) as qty FROM tblsales ");
  $r5=mysqli_fetch_array($q5);
  $stock=$r['pack']-$r5['qty'];
?>

  <h2 class="w3-container"><b>GOOD'S SUMMARY</b></font></b></h2>

<br><br>

<div class="w3-container w3-bordered">
  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-6">
   <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4 form-group">
                <label><font color="black"><b>Total Harvest</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $r['pack'].'Kg' ?>" readonly>
                </div>
              <div class="col-sm-5 form-group">
                   <label><font color="black"><b>Per Acre Economy</b></font></label>
                    <input type="text" class="form-control" value="<?php echo $a.'Kg';?>" name="txtname" readonly>
              </div>
               <div class="col-sm-3 form-group">
                   <label><font color="black"><b>In Stock</b></font></label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $stock.'Kg';?>" readonly>
              </div>
            </div></div></div></div></div>
            <div class="w3-container" style="margin-left:%">
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
</div>
<br><br>
<div class="container">  
<div class="row"> 
  <div class="col-sm-0" style="margin-left: 5%"></div>
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>

</div>
<br><br>
<body>
<div class="w3-container w3-bordered">
<div class="row">
    <div class="col-sm-1" style></div>
 <div class="col-sm-6">
   <div class="col-sm-12">
<div class="w3-container">
 
  <div class="row">
<?php
$q=mysqli_query($db,"select distinct item_name from tblsales");
 while($r=mysqli_fetch_array($q))
 {
    ?>
     <div class="col-sm-2">
    <font color="black"><b><?php echo $r['item_name'];?></b></font>
    <input type='checkbox' class="checks" onclick="f1();" style="margin-right:10px;" value="<?php echo $r['item_name']; ?>">
</div>

 <?php
 }
?>
</div>
</div>
<br>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-1"><label style="margin-left: -50px"><font color="black"><b>Inventory</b></font></label></div>
 <div class="col-sm-1">
     <label class="switch">
<input type="checkbox" id="myCheck" value="datewise" onclick="f1()">
  <span class="slider round"></span>
</label>    
   </div>
    <div class="col-sm-1"><label><font color="black"><b>Datewise</b></font></label></div> </div></div></div></div>

     <p  id="txtHint"></p>



 <script type="text/javascript">
    function f1() {
      //alert('hello');
    var s="<?php $q1=mysqli_query($db,"select count( distinct item_name) as cnt from tblsales");
    $r1=mysqli_fetch_array($q1); echo $r1['cnt']; ?>";
    var checks = document.getElementsByClassName('checks');
    var str = '';

    for ( i = 0; i < s; i++) {
        if ( checks[i].checked === true ) {
        
            str += checks[i].value + " ";
        }
    }
     var checkBox = document.getElementById("myCheck");
     var str1='';
     if (checkBox.checked == true){
     str1=document.getElementById("myCheck").value;
        } 
    var final=str+str1;
//    alert(final);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","showfreport.php?q="+final,true);
    xmlhttp.send();
  
}</script>

<?php include('footer.php');?>