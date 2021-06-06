<?php 

include "config1.php";
$ses_id=$_SESSION['plot_id'];

if(isset($_POST['search'])){
    $search = mysqli_real_escape_string($con,$_POST['search']);

    $query = "SELECT * FROM tblledger WHERE ses_id='".$ses_id."' and  name like'%".$search."%'";
    $result = mysqli_query($con,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['open'],"label"=>$row['name']);
    }

    echo json_encode($response);
}

exit;


