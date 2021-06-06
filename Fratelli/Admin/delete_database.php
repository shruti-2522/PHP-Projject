<!DOCTYPE html>
<html>
<head>
	<?php include('head.php');?>
	<?php //include('config.php');?>
	<title></title>
</head>
<body>
	<?php include('header.php');?>
	<?php
	$db=mysqli_connect("localhost","root","");

	if(isset($_POST['btndel']))
	{
		extract($_POST);
		$sql="DROP DATABASE dbfarm";
		echo $sql;
if (mysqli_query($db, $sql)) {
          echo "Database my_db was successfully dropped\n";
     } else 
     {
    echo 'Error dropping database:';
}
		
	}
	?>

<br><br><br><br><br><br>
	<form method="post">


		<table align="center">         
			<tr>
				<td>
					<input type="submit" name="btndel" class="btn btn-success" value="DELETE DATABSE">
				</td>
			</tr>
		</table>
	</form>

<?php include('footer.php');?>
</body>
</html>