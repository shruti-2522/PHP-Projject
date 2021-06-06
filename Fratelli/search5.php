<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include ("config.php");?>
<link rel="stylesheet" href="css/style.css" type="text/css">

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<?php  
 
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM tblfruit WHERE fruit_name LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($db, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
      $result = mysqli_query($db, $query);  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["fruit_name"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<script>
var answer = confirm ("Fruit not  found  if you want to add fruit  please click on ok to continue.")
if (answer)
window.location="add_fruit1.php";
</script>';
           
            
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  
<?php
?>
</table>


</body>
</html>