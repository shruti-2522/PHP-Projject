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
.container {width:1100px;
      margin:0 auto;
      padding:20px 25px;
      border:1px solid #ccc;
      background:#fff; }
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
  <div class="container" >
  
    <div style="background: url('img/prashant.png'); no-repeat; background-size: cover; opacity:;">
    <page size="A4"></page>
     <div style="margin-left: 33%"><img src="img/PRINT.png"  style="height:15%;"></img></div>
 
  

     <h2 style="margin-left:33%"><b>WORK REPORT</b></h2>

<?php
  $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {
  ?>
 <div style="margin-left:12%">
 
<table class="table" >
   <tr style="border: hidden;">
    <td><b>Farm Name:</b>
      <?php echo $r["farm_name"];?></td>
      <td>
       <b>GGN no:</b>
     <?php echo $r['GGN_no'];?>
    </td>
  </tr>

 <tr style="border: hidden;">
  <td><b>Owner Name:</b>
    <?php echo $r["owner_name"];?>
    </td>
  
    <td><b>Address:</b>
     <?php echo $r["addrs"];?> 
    </td>
 
  </tr>
 
  <tr>
   <td><b>Phone No:</b> 
    <?php echo $r["phone_no"];?>
    </td>
  </tr>
 
  <?php
}
?>
</table>
<?php 
$ses_id=$_SESSION['plot_id'];
  $q=mysqli_query($db,"SELECT SUM(tot_wages) as tot FROM tblother where status=0 and ses_id=".$ses_id);
  $r=mysqli_fetch_array($q);
    ?>
<div id="noprint">
<div class="row">
  <div style="margin-left: 1%"></div>

<div class="col-sm-3 form-group">
                <label><font color="black"><b>Total Wages</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $r['tot']; ?>" readonly>
                </div>
            </div></div></div>
<br>
<div id="noprint">
  <div class="row">
     <div style="margin-left:12%"></div>
 
   <div class="col-sm-4">
    <label><b>Plot No:</b></label>
   <select name="txtpno"  onchange="showUser(this.value)" class="form-control">
        <option value="">Select plot no.</option>
        <option value="all plot" selected>All Plot</option>
              
                <?php
                        $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct plot_no from tblother where status=0 and ses_id='".$ses_id."' order by date");
                  
                  
                    foreach ($q as $txtpno){
                ?>
                        <option value="<?php echo $txtpno['plot_no'];?>"><?php echo $txtpno['plot_no'];?></option>
                <?php
                    }
                ?>
        </select>
     
      </div>
     </div>
   </div>
 <div id="txtHint"></div>
</body>
<br><br>
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
    xmlhttp.open("GET","getworkrep1.php?q="+str,true);
    xmlhttp.send();
      document.getElementById("myTable").remove(); 

  }
}
</script>
<table class="table" id="myTable" style="width:45%; margin-left: 12%" border="1">

     <th><b>Work Description</b></th>  
       <th><b>Date</b></th>  
          
    </th>  
</tr>
<?php
$q = intval($_GET['q']);
$ses_id=$_SESSION['plot_id'];
$sql="SELECT * from tblother WHERE ses_id='".$ses_id."'";
$result = mysqli_query($db,$sql);
while ($r=mysqli_fetch_array($result)) {
  $work=explode(',',$r["work_desc"]);
  for($i=0;$i<sizeof($work);$i++)
  {
  ?>
  
<tr>
    
    <Td>
      
      <?php echo $work[$i];?>
      </a>
    </Td>
    <Td>
      <?php echo $r["date"];?>
    </Td>
    
  
    
  
  </tr>
<?php
}
}
?>
</table>
</div></div></div>
<br>


<div style="margin-left: 40%"><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/></div>
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

  
