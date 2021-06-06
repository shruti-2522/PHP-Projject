<html>
<head>

<?php include('head.php');?>
 <?php include('config.php');?>

<?php include('graphcss.php');?>
   
</head> 
<body class="sb-nav-fixed">

  
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
          $sum=0;
          $fruit=$r['fruit_name'];
          $variety=$r['variety'];
          $harvest=explode(',',$r['package']);
          // print_r($harvest);
           foreach ($harvest as $key => $value) {
             $sum+=$value;
           }
           
          ?>
          ['<?php echo $variety.'-'.$fruit; ?>',<?php echo $sum; ?>],
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
    </script> -->
  

<?php  include('header.php');?>
<?php 
  $ses_id=$_SESSION['plot_id'];
  $q=mysqli_query($db,"SELECT SUM(package) as pack FROM tblharvest where ses_id=".$ses_id);
  $r=mysqli_fetch_array($q);
  $q1=mysqli_query($db,"SELECT area FROM plot where ses_id=".$ses_id);
  $ss=array();
  while($r1=mysqli_fetch_array($q1))
  {
      $ss[]=$r1['area'];
  }
  $ac=implode(' ', $ss);
  $sent=str_replace('acre', '', $ac);
  $x=explode(' ', $sent);
  $acrsum=array_sum($x);
  $per_acrs=$r['pack']/$acrsum;
  $a=(round($per_acrs,2));

    $q5=mysqli_query($db,"SELECT SUM(qty) as qty FROM tblsales where ses_id=".$ses_id);
  $r5=mysqli_fetch_array($q5);
  $stock=$r['pack']-$r5['qty'];
?>


  <h2 class="container"><b>GOOD'S SUMMARY</b></font></b></h2>

<br><br>

  <div class="row">
    <div class="col-sm-1"></div>
          <div class="col-sm-2 form-group">
                <label><font color="black"><b>Total Harvest</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $r['pack'].'Kg' ?>" readonly>
                </div>
              <div class="col-sm-3 form-group">
                   <label><font color="black"><b>Per Acre Economy</b></font></label>
                    <input type="text" class="form-control" value="<?php echo $a.'Kg';?>" name="txtname" readonly>
              </div>
               <div class="col-sm-2 form-group">
                   <label><font color="black"><b>In Stock</b></font></label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $stock.'Kg';?>" readonly>
              </div>
            </div>
      <!--       <div class="container">
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
</div> -->
<br><br>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>

<br><br>
<body>
<div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-9">
  
<div class="row">
   <!-- <div class="col-sm-1"></div>  -->
  
<?php
$ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select DISTINCT fruit_name,variety from tblharvest where ses_id='".$ses_id."'");
 while($r=mysqli_fetch_array($q))
 {
    ?>
     <div class="col-sm-3">
    <font color="black"><b><?php echo $r['fruit_name']."-".$r['variety'];?></b></font>
    <input type='checkbox' class="checks" onclick="f1();" value="<?php echo $r['fruit_name']."-".$r['variety'];?>" checked>
</div>

 <?php
 }
?>
</div>
<br><br>
<div class="row" style="margin-left: 1%">
<label><font color="black"><b>Inventory</b></font></label>
     <div class="col-sm-1" style="margin-left: 5%">
   <label class="switch">
  <input type="checkbox" class="checks" id="myCheck" onclick="f1();" value="datewise" checked><span class="slider round" style="width:49px; height: 25px;"></span>
</label> 
</div><div style="margin-left: 4%"></div><label><font color="black"><b>Datewise</b></font></label>
    
    </div>
     <p  id="txtHint"></p>
<!-- <div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-1"><label style="margin-left: -50px"><font color="black"><b>Inventory</b></font></label></div>
 <div class="col-sm-1">
     <label class="switch">
<input type="checkbox" id="myCheck" value="datewise" onclick="f1()">
  <span class="slider round" style="width:30%; height:30%"></span>
</label>    
   </div>
    <div class="col-sm-1"><label><font color="black"><b>Datewise</b></font></label></div>   
    </div></div>
    
</div> -->

   



 <script type="text/javascript">
    function f1() {
      //alert('hello');
    document.getElementById("myTable").remove(); 
    document.getElementById('tworth').style.display='none';
    var s="<?php 
    $ses_id=$_SESSION['plot_id'];
    $q1=mysqli_query($db,"select count(DISTINCT fruit_name,variety) as cnt from tblharvest where ses_id=".$ses_id."");
    $r1=mysqli_fetch_array($q1); echo $r1['cnt']; ?>";
    var checks = document.getElementsByClassName('checks');
    //alert(s);
    var str = '';

    for ( i = 0; i < s; i++) {
        if ( checks[i].checked === true ) {
        
              str = str+ checks[i].value + " ";
             // alert(str);

        }
    }
    //alert(str);
     var checkBox = document.getElementById("myCheck");
     var str1='';
     if (checkBox.checked == true){
     str1=document.getElementById("myCheck").value;
        } 
    var final=str+str1;
    //alert(final);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","showfreport.php?q="+final,true);
    xmlhttp.send();
  
}
</script>

 <table id="myTable"  border="1" class="table" style="width: 120%;" >
<tr>
   <td><b>Date</b></td>
    <td><b>Particular</b></td>
    <td><b>Plot No</b></td>
    <td><b>Quantity</b></td>
    <td><b>Rate</b></td>
    <td><b>Total</b></td>
      <td><b>Party Name</b></td>
  <?php
    $ses_id=$_SESSION['plot_id'];
  //echo $ses_id;
    $q1=mysqli_query($db,"SELECT * FROM tblsale1 where status=0 and ses_id='".$ses_id."' order by date");
        while($r1=mysqli_fetch_array($q1))
        {
          ?>
          <tr>
            <td>
              <?php echo $r1['date'];?>
            </td>
            <td>
              <?php echo $r1['item_name']."-".$r1['variety'];?>
            </td>
            <td>
              <?php 
                echo $r1['plot_no'];
              ?>
            </td>      
              <td>
              <?php echo $r1['qty'].'Kg'; ?>
            </td>
            <td>
              <?php echo $r1['rate']; ?>
            </td>
            <td>
              <?php echo $r1['amount']; ?>
            </td>
            <td>
              <?php echo $r1['paccount_name']; ?>
            </td>
        </tr>
        <?php
        $total= $total+$r1['amount']; 
        }
   
?>
</tr>
</table>

<div align="center" style="margin-left: 30%">
<div class="row" id="tworth">

      <div class="col-sm-10 form-group" style="margin-left: 90%"></div>
        <center><label><font color="black"><b>Total Worth:</b></font></label></center>
        <div class="col-sm-0 form-group">
         <font color="black"><?php 
      echo $total;
   ?> </font></div>
</div></div>

<center><button class="btn btn-success" onclick="window.location.href='gooods_report.php'">PRINT</button></center>
<?php include("footer.php"); ?>