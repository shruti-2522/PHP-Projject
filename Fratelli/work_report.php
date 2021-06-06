<html>
<head>
<?php include('head.php');?>
 <?php include('config.php');?>

<?php include('graphcss.php');?>
   
</head> 
<body class="sb-nav-fixed">


<?php  include('header.php');?>
<?php 
$ses_id=$_SESSION['plot_id'];
  $q=mysqli_query($db,"SELECT SUM(tot_wages) as tot FROM tblother where status=0 and ses_id=".$ses_id);
  $r=mysqli_fetch_array($q);
    ?>

<div class="row">
  <div style="margin-left:1%"></div>

<div class="col-sm-2 form-group">
                <label><font color="black"><b>Total Wages</b></font></label>
                 <input type="text" class="form-control" name="txtname" value="<?php echo $r['tot']; ?>" readonly>
                </div>
            </div></div></div>
<br>
<div id="noprint">
  <div class="row">
     <div style="margin-left:20%"></div>
 
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
    xmlhttp.open("GET","getworkrep.php?q="+str,true);
    xmlhttp.send();
      document.getElementById("myTable").remove(); 

  }
}
</script>
<table class="table" id="myTable" style="width:45%; margin-left: 20%" border="1">

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
       <a href="view_other_work1.php?id=<?php echo $r['oid'];?>">
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
<div style="margin-left: 35%">
  <button class='btn btn-success' onclick="window.location.href='other_work_rep.php'">PRINT</button>
</div>
<?php include('footer.php');?>
</body>
</html>