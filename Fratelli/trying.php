<br>
<!DOCTYPE html>
<html>
<head>
  <?php include ("head.php");?>
  <?php include ("config.php");?>
  <title></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
$ses_id=$_SESSION['plot_id'];
$word="pesticide insecticide datewise";
$word1="pesticide fertilizer assets";
echo strlen($word);
$word2="datewise";
$val=($_GET['q']);
$val1=rtrim($val);
echo strlen($at);
echo strlen($val);

$plot=$_GET['plot'];
//echo $plot;
//echo $val;
  ?>
 <?php
 echo $val;
if($val1==$word)
{
  echo ('hello');
}
else
  if($val1=='pesticide fungicide datewise')
    {
      echo('pest func');
  }else
if(strcmp($val,'pesticide datewise')!=0)
{
  echo("done");
  }
else
if(strcmp($val,'insecticide datewise')!=0)
{
   echo("insec");
}
else
if(strcmp($val,'fungicide datewise')!=0)
{
   echo('fungi');
}
else
{
 // echo("final");

}
?>
</div></div>


</div> </div></div>
</body>
</html>