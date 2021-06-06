</head>
<!DOCTYPE html>
<html>
<head>
  <?php include('head.php');?>
  <?php include('config.php');?>

<style type="text/css">



        @media print {
      #noprint, #noprint *
    {
        display: none !important;
    }

}
</style>
  <title></title>
  
<body class="sb-nav-fixed">
    <div id="printableArea">
    <div class="container" >


   
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
<br><br>
   

   <?php
}
?>
    <?php 
 $ses_id=$_SESSION['plot_id'];
  $q=mysqli_query($db,"SELECT SUM(tot_water) as psum FROM tblirrigation where ses_id='".$ses_id."' and status=0 ");
  $r=mysqli_fetch_array($q);
 
  $q1=mysqli_query($db,"SELECT SUM(duration) as dsum FROM tblirrigation where ses_id='".$ses_id."' and status=0 ");
   $r1=mysqli_fetch_array($q1);

?>


  
 <div id="noprint">
             <div class="row">
                        <div style="margin-left: 12%"></div>
              <div class="col-sm-3 form-group">
                <label><font color="black"><b>Water Irrigated</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $r['psum']. 'litre'; ?>" readonly>
                </div>
<div class="col-sm-1"></div>
              
              <div class="col-sm-3 form-group">
                   <label><font color="black"><b>Irrigated</b></font></label>
                    <input type="text" class="form-control" value="<?php echo $r1['dsum'] .'hrs'; ?>" name="txtname" readonly>
              </div>
            
            </div>

         


 <br>

<div class="row">
  <div style="margin-left:3%"></div>

<label for="item"><font color="black"><b>Select Plot Name:</b></font></label>
 
      <div class="col-sm-5 form-group"> 
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
      </div></div></div>
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

 <table id="myTable"  border="1" class="table " style="width:80%;margin-left:5%">
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
      <?php echo $r["moisure"];?>
    </Td>
    

  </tr>
<?php
} 
?>
</table>
</div></div>

<br><br>


<div class="row">
<div style="margin:20%"></div>
<div class="col-sm-3">
<input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT!"/>
</div></div>


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

  
