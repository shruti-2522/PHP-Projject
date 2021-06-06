 <!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>
    
  
    <style>
.dropbtn {
  background-color: #4CAF50;
  border: none;
  color: white;
   padding: 16px 32px;
   text-decoration: none;
  text-align: center;
  margin: 4px 2px;
  transition-duration: 0.4s;
  font-size: 16px;
  border: none;
  cursor: pointer;
  width: 200px;
  display: inline-flex;
}

.dropbtn:hover, .dropbtn:focus {
 background-color: #4CAF50;
  color: white;
}

.dropdown {
  position: relative;
  display: inline-block;
  height: 200%;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
    width: 200px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body class="sb-nav-fixed">
  <?php  include('header.php');?>

<center>
  <div align="left">
<div class="dropdown">
  <br><br><br>
  <div class="row">
    <div class="col-sm-6">
  <button onclick="myFunction()" class="dropbtn">Stock Summary</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="newreport1.php">Farm's Inventory</a>
    <a href="goodreport1.php">Good's Inventory</a>
    
  </div>
</div>
  <div class="col-sm-6">
 <a href="#"><button  class="dropbtn">Balance Sheet</button></a>
</div>
</div>

<div class="row">
    <div class="col-sm-6">
       <!--  <button onclick="myFunction()" class="dropbtn">Profit Loss</button>
        <div id="myDropdown" class="dropdown-content">
        <a href="">Plot Wise</a>
        <a href="">Overall</a>
        </div> -->
        <a href="profit_loss_rep.php"><button  class="dropbtn">Profit Loss</button></a>
    </div>
    <div class="col-sm-6">
        <a href="ferti_report.php"><button  class="dropbtn">Fertigation</button></a>
    </div>
</div>


 <div class="row">
<div class="col-sm-6">
     <a href="irr_report.php"><button  class="dropbtn">Irrigation</button></a>
</div>
    <div class="col-sm-6">
  <a href="ledger_report11.php"><button  class="dropbtn">Ledger Report</button></a>
</div>
</div>

<div class="row">
<div class="col-sm-6">
     <a href="pesti_report1.php"><button  class="dropbtn">Pesticide Application</button></a>
</div>
    <div class="col-sm-6">
  <a href="#"><button  class="dropbtn">Eurogap Document</button></a>
</div>
</div>
<div class="row">
<div class="col-sm-6">
     <a href="work_report.php"><button  class="dropbtn">Work Report</button></a>
</div>
    <div class="col-sm-6">
  <a href="#"><button  class="dropbtn">Internal Overall</button></a>
</div>
</div>



</div>
</div>
</center>
<br><br><br><br><br><br><br><br><br><br><br>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<?php include('footer.php');?>
</form></body>
</html>
