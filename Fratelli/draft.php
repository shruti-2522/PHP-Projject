<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php include('config.php');?>
 
 

</head>
<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2><font color="black"><b>ALL DRAFT</b></font></b></h2><br>
        <div class="container" style="width: 700px">
        <div class="row" style="border-style: solid;">
        	<div class="col-sm-3"></div>
        	<div class="col-sm-3"><h4><b>Date</b></h4></div>
        	<div class="col-sm-3"><h4><b>Title</b></h4></div></div>
        	        	<div class="col-sm-3"></div>

     
<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblmultitem where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
	
			<?php
$q=mysqli_query($db,"select * from tblmultitem where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b>
    <a href="edit_multi_item.php?id=<?php echo $r['multi_id'];?>"> <?php echo $r["date"];?></a>
    </b></div>
   <div class="col-sm-3"><b>Purchase Item</b></div></div>
<?php
}
}
?>
<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblprunning where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblprunning where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_prunning.php?id=<?php echo $r['prunning_id'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Prunning</b></div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblirrigation where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblirrigation where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_irrigation.php?id=<?php echo $r['iid'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Irrigation</b></div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblinhouse where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblinhouse where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_inhouse1.php?id=<?php echo $r['in_id'];?>"> <?php echo $r["srno"];?></a></b></div>
   <div class="col-sm-3"><b>Inhouse Calibration</b></div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tbldrip where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tbldrip where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_drip.php?id=<?php echo $r['did'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Drip Observation</b></div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblcrop where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblcrop where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_crop.php?id=<?php echo $r['cid'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Crop Observation</b></div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblvisit where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblvisit where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_visit.php?id=<?php echo $r['vid'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Visit Records</b></div></div>
<?php
}
}
?>
<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblother where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblother where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_other_work.php?id=<?php echo $r['oid'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b></b>Other Work</div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblsoil where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblsoil where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_soil.php?id=<?php echo $r['soil_id'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Soil Analysis</b></div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblwater where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblwater where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_water.php?id=<?php echo $r['water_id'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Water Analysis</b></div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblpleaf where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblpleaf where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_leaf.php?id=<?php echo $r['pleaf_id'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Leaf Petiole Analysis</b></div></div>
<?php
}
}
?>
<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblfert1 where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblfert1 where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_fertilizer1.php?id=<?php echo $r['fert_id'];?>"> <?php echo $r["fdate"];?></a></b></div>
   <div class="col-sm-3"><b>Fertilizer</b></div></div>
<?php
}
}
?>
<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblgrowth1 where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{
	?>
			<?php
$q=mysqli_query($db,"select * from tblgrowth1 where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
   	<div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_gr1.php?id=<?php echo $r['gr_id'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Growth Regulator</b></div></div>
<?php
}
}
?>
  <?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tblsluryapp where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{

$q=mysqli_query($db,"select * from tblsluryapp where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
    <div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_sluryapp.php?id=<?php echo $r['sid'];?>"> <?php echo $r["date"];?></a></b></div>
   <div class="col-sm-3"><b>Slury</b></div></div>
<?php
}
}
?>

<?php
$ses_id=$_SESSION['plot_id'];
$q1=mysqli_query($db,"select * from tbldisease1 where status=1 and ses_id=".$ses_id);
$r1=mysqli_fetch_array($q1);
if(!empty($r1))
{

$q=mysqli_query($db,"select * from tbldisease1 where status=1 and ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {
  ?>
    <div class="row" style="border-style: groove;">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <b><a href="edit_disease1.php?id=<?php echo $r['did'];?>"> <?php echo $r["sdate"];?></a></b></div>
   <div class="col-sm-3"><b>Disease Control</b></div></div>
<?php
}
}
?>

</tr>
</table>
<?php //include('reght_sidebar.php');?>
<?php include('footer.php');?>

</body>
</html>