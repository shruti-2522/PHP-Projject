<!DOCTYPE html>
<html>
<head>
<title>
 </title>
 <script language="javascript">
function SelectRedirect(){
switch(document.getElementById('s1').value)
{
case "English":
window.location="Registration.php";
break;

case "Marathi":
window.location="mregistration.php";
break;

default:
window.location="../"; // if no selection matches then redirected to home page
break;
}// end of switch 
}

</script>
<?php include("head.php");?>
</head>
<body style="background-image: url('img/');">
<br><br><br>
<center>
<form>
	<br><br><br><br>
   <img src="img/fcmlg.png"  height="250"  alt="Logo of a company" />
   <br><br>
	<div class="col-sm-4">
	<SELECT id="s1" NAME="section" onChange="SelectRedirect();" class="form-control">
		<Option value="">Select Language</option>
		<Option value="English">English</option>
		<Option value="Marathi">marathi</option>
	</SELECT>
</div>
</form>
</center>
                        
</body>
</html>
