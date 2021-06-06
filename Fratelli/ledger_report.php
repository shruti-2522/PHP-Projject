<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
 

</head>
<body class="sb-nav-fixed">
  
        <?php include('header.php');?>
            <div class="col-sm-4 form-group"><h2><b>LEDGER</b></h2></div>
        
       
<div class=" w3-bordered"></div>
  <div class="col-sm-12">
  <div class="row">
  <div class="col-sm-0"></div>
<div class="col-sm-2">
  <label for="item"><b>Select Ledger:</b></label>
</div>
  
  <div class="col-sm-4 form-group"> 
 <select name="voucher_type" id="ledger" class="form-control" onchange="showUser(this.value);">
        <option value="">Select Ledger:</option>
        <option value="cash">Cash</option>
              
                <?php
                    $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select name from tblledger where ses_id=".$ses_id);

                  
                  
                    foreach ($q as $ledger){
                ?>
                        <option value="<?php echo $ledger['name'];?>"><?php echo $ledger['name'];?></option>
                <?php
                    }
                ?>
        </select>
        <div id="ledger"></div>
  </div>
          <p  id="txtHint"></p>


</table>
 </form>

</div></div>


<script>
function showUser(str) {
  //alert(str);
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
    xmlhttp.open("GET","getLedger.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

<div style="margin-left: 35%">
<button class="btn btn-success" onclick="window.location.href='ledger_print.php'">PRINT</button>
</div>

<?php// include('reght_sidebar.php');?>
<?php include('footer.php');?>
<script src="js/reload.js"></script>
             
    </body>
</html>