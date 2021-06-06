<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php include('head.php');?>

  <?php include('config.php');?>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
  .buttonn {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width: 200px;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

</style>
</head>
<?php  include('header.php');?>
<div class="container">
  <h2 class="w3-container w3-green"><font color="white"><b>APPLICATION</b></font></b></h2>
</div>
<?php  include('menu2.php');?>
 <?php include('reght_sidebar.php');?>

<div class="w3-container w3-bordered">
  <div class="row">
    <div class="col-sm-4"></div>
 <div class="col-sm-6">
  <center>
<br>
<a href="disease.php"><button class="buttonn button1">DISEASE CONTROL</button></a><br>
<a href="fertilizer.php"><button class="buttonn button1">FERTILIZER</button></a><br>
<a href="growth_regulator.php"><button class="buttonn button1">GROWTH REGULATOR</button><br>
<a href="sluryapp.php"><button class="buttonn button1">SLURY</button><br>


<br><br><br>
</div>
</div>
</div>


  <?php include('footer.php');?>

</body>
</html>