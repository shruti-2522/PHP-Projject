</head>
<!DOCTYPE html>
<html>
<head>
  <?php include('head.php');?>
  <?php include('config.php');?>
   <?php include('graphcss.php');?>

<style type="text/css">
td
{
 padding:0 4px;  
}


    @media print {
      #noprint, #noprint *
    {
        display: none !important;
    }

}

</style>
  <title></title>
  
<body>
  
 

  
  
   
 
 
 <div id="printableArea">
     <?php
     $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r1=mysqli_fetch_array($q)) {
  ?>


    <div style="margin-left: 42%;margin-bottom:1px;" class="text-success">
      <?php echo $r1['farm_name'];?>
    </div>
       <div style="margin-left: 43%;" class="mt-0">
     <?php echo $r1['addrs'];?>
    </div>
    <div style="margin-left: 42%;" class="mt-0">
     <?php echo $r1['taluka'];?>  <?php echo $r1['district'];?>
    </div>
     <div style="margin-left: 43%;" class="mt-0">
     <?php echo $r1['pin_code'];?>  
    </div>
     <div style="margin-left: 37%;" class="mt-0">
     <i class="fas fa-phone"></i><?php echo $r1['phone_no'];?> <i class="fas fa-envelope"></i> <?php echo $r1['email'];?>
    </div>

   

   <?php
}
?>

  
<?php
      $total=0;
       $ses_id=$_SESSION['plot_id'];
       $q=mysqli_query($db,"select distinct plot_no,pname from plot where ses_id=".$ses_id);
                  
      $arr=array();                  
      $arr1=array();                  
      foreach ($q as $txtpno){

      $q=mysqli_query($db,"select pname from plot where plot_no=".$txtpno['plot_no']);
         $r=mysqli_fetch_array($q);
      $q1=mysqli_query($db,"SELECT A.dtotal,B.ftotal,C.gtotal,D.totalwadges,E.stotal,A.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldissession WHERE ses_id='".$ses_id."' and draft_status=0 and plot_no='".$txtpno['plot_no']."') A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfertsession WHERE ses_id='".$ses_id."' and draft_status=0 and plot_no='".$txtpno['plot_no']."') B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgrowthsession WHERE ses_id='".$ses_id."' and draft_status=0 and plot_no='".$txtpno['plot_no']."') C JOIN (SELECT x.totw+y.toto as totalwadges from (SELECT sum(tot_wages) as totw from tblprunning WHERE ses_id='".$ses_id."' and status=0 and plot_no='".$txtpno['plot_no']."') as x JOIN (SELECT sum(tot_wages) as toto from tblother WHERE ses_id='".$ses_id."' and status=0 and  plot_no='".$txtpno['plot_no']."') as y ) D JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id='".$ses_id."' and plot_no='".$txtpno['plot_no']."') E");


            while($r1=mysqli_fetch_array($q1))
            {
                      $sum=$r1['dtotal']+$r1['ftotal']+$r1['gtotal']+$r1['totalwadges'];
                      $arr[]=['label'=>$r1['plot_no'],'y'=>round($r1['stotal'],2)];
                        // $arr[]=['y'=>round($r1['stotal'],2)];
                      $arr1[]=['label'=>$r1['plot_no'],'y'=>round($sum,2)];
                      $arr2[]=['0'=>$r1['plot_no'],'1'=>round($r1['stotal'],2),'2'=>round($sum,2)];

            }
} 
//print_r($arr);
//print_r($arr1);
echo "<script>
        var my_2d = ".json_encode($arr2)."
</script>";
?>
<br>
<div id="chart_div" style="height: 480px; width: 70%; margin-left: 10%"></div>
<br><br>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
    
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Plot no');
        data.addColumn('number', 'Total Sales');
    data.addColumn('number', 'Total Expense');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1]),parseInt(my_2d[i][2])]);
       var options = {
          title: 'plus2net.com Sale Profit',
          hAxis: {title: 'Plot',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
       }  
</script>

</head>
<body class="sb-nav-fixed">

<br>
<div id="noprint">
  <div class="row">
    <div style="margin-left: 10%;"></div>      
  <label for="item"><font color="black"><b>Select Plot No:</b></font></label>
  <div class="col-sm-3 form-group"> 
   <select name="txtpno"  onchange="showUser(this.value)" class="form-control">
        <option value="allplot">All Plot</option>
              
                <?php
                        $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct plot_no,pname from plot where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtpno){
                ?>
                        <option value="<?php echo $txtpno['plot_no'];?>"><?php echo $txtpno['pname'];?></option>
                <?php
                    }
                ?>
        </select>
     
      </div>
     </div>
   </div>
 <div id="txtHint"></div>
</body>

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
    //alert(str);
    xmlhttp.open("GET","getprofit1.php?q="+str,true);
    xmlhttp.send();
        document.getElementById("myTable").remove(); 
  }
}
</script>
 <table id="myTable"  border="1" class="table" style="width:82%; margin-left: 10%">
<tr>
      <td><b>
         Plot Name</b>
      </td>
      <td><b>
         Pesticide Expense</b>
      </td>
      <td><b>
         Fertigation Expense</b>
      </td>
      <td><b>
         PGR Expense</b>
      </td>
      <td><b>
         Labour Expense</b>
      </td>    
      <td><b>
         Other</b>
      </td>
      <td><b>
         Sales</b>
      </td>
      <td><b>
         Total Expense</b>
      </td></div></div>
   </tr>

   <?php
 $total=0;
       $ses_id=$_SESSION['plot_id'];
       $q=mysqli_query($db,"select distinct plot_no from plot where ses_id=".$ses_id);
  
      $arr=array();                  
      $arr1=array();                  
      foreach ($q as $txtpno){

        $q=mysqli_query($db,"select pname from plot where plot_no=".$txtpno['plot_no']);
        $r=mysqli_fetch_array($q);
       // print_r($txtpno);
       
       $q1=mysqli_query($db,"SELECT A.dtotal,B.ftotal,C.gtotal,D.totalwadges,E.stotal,z.ztotal,y.ytotal,A.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldissession WHERE ses_id='".$ses_id."' and draft_status=0 and  plot_no='".$txtpno['plot_no']."') A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfertsession WHERE ses_id='".$ses_id."' and draft_status=0 and plot_no='".$txtpno['plot_no']."') B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgrowthsession WHERE ses_id='".$ses_id."' and draft_status=0 and  plot_no='".$txtpno['plot_no']."') C JOIN (SELECT SUM(total) AS ztotal,plot_name FROM tblpayment WHERE ses_id='".$ses_id."' and plot_name='".$txtpno['plot_no']."')z JOIN (SELECT SUM(amount1) AS ytotal,plot_name FROM tblpurcahse1 WHERE ses_id='".$ses_id."' and plot_name='".$txtpno['plot_no']."')y JOIN (SELECT x.totw+y.toto as totalwadges from (SELECT sum(tot_wages) as totw from tblprunning WHERE ses_id='".$ses_id."' and status=0 and  plot_no='".$txtpno['plot_no']."') as x JOIN (SELECT sum(tot_wages) as toto from tblother WHERE ses_id='".$ses_id."' and status=0 and  plot_no='".$txtpno['plot_no']."') as y ) D JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id='".$ses_id."' and plot_no='".$txtpno['plot_no']."') E");


            while($r1=mysqli_fetch_array($q1))
            {
               ?>
               <tr>
                  <td>
                     <?php echo $r['pname'];?></a>
                  </td>
                  <td>
                     <?php echo round($r1['dtotal'],2);?>
                  </td>
                  <td>
                     <?php echo round($r1['ftotal'],2); ?>
                  </td>
                  <td>
                     <?php echo round($r1['gtotal'],2); ?>
                  </td>
                  <td>
                     <?php echo $r1['totalwadges']; ?>
                  </td>
                  <td>   
                    <?php //echo $r1['ztotal'];
                       // echo $r1['ytotal'];
                        echo $r1['ztotal']+$r1['ytotal']
                   ?>     
                  </td>
                     <td>
                        <?php echo $r1['stotal']; ?>
                  </td> 
                  <td>
                  <?php $sum=$r1['dtotal']+$r1['ftotal']+$r1['gtotal']+$r1['totalwadges'];
                  echo round($sum,2); ?>
                  </td>
            </tr>
            <?php
             $arr[]=['label'=>$r1['plot_no'],'y'=>round($r1['stotal'],2)];
            // $arr[]=['y'=>round($r1['stotal'],2)];
             $arr1[]=['label'=>$r1['plot_no'],'y'=>round($sum,2)];
            // $arr1[]=['y'=>round($sum,2)];
            }
} 
?>
</table>
</div></div>
<br>

<center><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></center>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;s
}
</script>
<br>
</body>
</html>

  
