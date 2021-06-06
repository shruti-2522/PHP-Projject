<?php
include "config.php";
//include "config1.php";

$request = $_POST['request'];   // request
$ses_id=$_SESSION['plot_id'];
// Get username list
if($request == 1){
    $search = $_POST['search'];

    $query = "SELECT * FROM tblworker WHERE ses_id='".$ses_id."' and worker_name like'%".$search."%'";
    $result = mysqli_query($db,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['id'],"label"=>$row['worker_name']);
    }

    // encoding array to json format
             
    echo json_encode($response); 
   
    exit;
}

// Get details
