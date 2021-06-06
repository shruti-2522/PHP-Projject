<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('head.php');?>

	<?php include('config.php');?>
  <?php// include('header.php');?>

</head>
<body class="sb-nav-fixed">
  <?php include('header.php');?>
  
	<h2 class="container "><b>DISEASE-CONTROL</b></font></h2>

<div class="col-sm-2"></div>
<div align="center">
	<div class="container">	
  <div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-5">
<input type="text" id="myInput" placeholder="Search for names.." title="Type in a name" class="form-control"></a>
</div>


<div class="col-sm-1">
<button class="btn btn-success" onclick="window.location.href='add_dis.php'"><b>ADD</b></button>
</div>
</div>
</div>
</div>
<br><br>

<div class="row">
		<div class="col-sm-3"></div>

		
      
 
  <label for="item"><font color="black"><b>Select Plot No:</b></font></label>
  <div class="col-sm-4 form-group"> 
   <select name="txtpno"  onchange="showUser(this.value)" class="form-control">
        <option value="">Select plot no.</option>
              
                <?php
                $ses_id=$_SESSION['plot_id'];
               
                    $q=mysqli_query($db,"select distinct(plot_no) from tbldisease1 where ses_id='".$ses_id."' and status=0 order by sdate");
                  
                  
                    foreach ($q as $txtpno){
                ?>
                        <option value="<?php echo $txtpno['plot_no'];?>"><?php echo $txtpno['plot_no'];?></option>
                <?php
                    }
                ?>
        </select>
     
      </div>
     </div>
    <div id="txtHint"></div>
  </div>




 </form>

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
    xmlhttp.open("GET","getPlot11.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

<?php include('footer.php');?>?


</body>
</html>