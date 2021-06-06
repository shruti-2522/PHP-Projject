<?php
include "config.php";

$request = $_POST['request'];   // request
$ses_id=$_SESSION['plot_id'];
// Get username list
if($request == 1){
    $search = $_POST['search'];

    //$query = "SELECT * FROM tblledger WHERE name like'%".$search."%'";
      $query = "SELECT * FROM tblledger WHERE under!='Bank Accounts' and  under!='cash in-hand' and ses_id='".$ses_id."' and name like'%".$search."%'";
    $result = mysqli_query($db,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['id'],"label"=>$row['name']);
    }

    // encoding array to json format
             
    echo json_encode($response); 
   
    exit;
}

// Get details
