<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>



<script language="javascript">
function SelectRedirect(){
switch(document.getElementById('s1').value)
{
case "machine":
window.location="addm.php";
break;


case "sprayer":
window.location="sprayer.php";
break;

default:
window.location="../"; // if no selection matches then redirected to home page
break;
}// end of switch 
}

</script>
  
</head>
<body class="sb-nav-fixed">
        <?php include('header.php');?>
      
  <h2 class="w3-container"><font color="Black"><b>ADD EQUIPMENT/SPRAYER</b></font></b></h2>

<form method="post" id="myform">
<div class="container" style="margin-top: 75px">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-4 form-group">
    <table class="table"><tr><td> <SELECT id="s1" class="form-control" NAME="section" onChange="SelectRedirect();">
    
    <Option value="">Machine Type:</option>
    <Option value="machine">Machine</option>
    <Option value="sprayer">Sprayer</option>
  </SELECT></td></tr>
</table>

      </div>
  </div>
<br>
  
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>
             
    </body>
</html>
