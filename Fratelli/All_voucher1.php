<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
 
</head>
<body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-4 form-group"><h2><b>CREDIT NOTE</b></h2></div>
        
         <div class="container">
  <div class="col-sm-12">
  <div class="row">
    <div class="col-sm-2"></div>
<div class="col-sm-2">
  <label for="item"><b>Select Voucher:</b></label>
</div>
  
  <div class="col-sm-4 form-group"> 
 <select name="voucher_type" id="voucher_type" class="form-control" onchange="showUser(this.value);">
        <option value="">Select Voucher.:</option>
              
                <?php
               
                    $q=mysqli_query($db,"select voucher_type from tblvoucher");
                  
                  
                    foreach ($q as $voucher_type){
                ?>
                        <option value="<?php echo $voucher_type['voucher_type'];?>"><?php echo $voucher_type['voucher_type'];?></option>
                <?php
                    }
                ?>
        </select>
        <div id="voucher_type"></div>
  </div>
        <p  id="txtHint"></p>


</Table>
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
    xmlhttp.open("GET","getVoucher1.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



<?php// include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>
