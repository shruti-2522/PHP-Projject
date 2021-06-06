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
</head>
  
<body class="sb-nav-fixed">
  
  <div id="printableArea">
  
    <div class="container">

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

<div id="noprint">
  <div class="row">
    <div style="margin-left: 20%"></div>
          <div class="col-sm-3 form-group">
                <label><font color="black"><b>Total Harvest</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $r['pack'].'Kg' ?>" readonly>
                </div>
              <div class="col-sm-3 form-group">
                   <label><font color="black"><b>Per Acre Economy</b></font></label>
                    <input type="text" class="form-control" value="<?php echo $a.'Kg';?>" name="txtname" readonly>
              </div>
               <div class="col-sm-3 form-group">
                   <label><font color="black"><b>In Stock</b></font></label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $stock.'Kg';?>" readonly>
              </div>
            </div>
          </div>
          

<div id="noprint">
 <div class="row">
<div style="margin-left: 20%"></div>
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control">
</div>
</div>
</div>

<div id="noprint">
<div class="row">
    <div style="margin-left: 20%"></div>
 
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
</div>
<br>
<div id="noprint">
<div class="row">
 <div style="margin-left: 21%"></div>
<label><font color="black"><b>Inventory</b></font></label>
     <div class="col-sm-1" style="margin-left: 3%">
   <label class="switch">
  <input type="checkbox" class="checks" id="myCheck" onclick="f1();" value="datewise" checked><span class="slider round" style="width:49px; height: 25px;"></span>
</label> 
</div><div style="margin-left: %"></div><label><font color="black"><b>Datewise</b></font></label>


   </div>
  </div>
</div>
    
  
     <p  id="txtHint"></p>

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

 <table id="myTable"  border="1" class="table" style="width: 65%;" align="center" >
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
<br>
<div class="row" id="tworth">
  <div class="col-sm-5"></div>
  <label><b>Total Worth:</b><?php echo $total; ?>
  </div></label>

</div></div></div>

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

  
