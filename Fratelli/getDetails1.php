<?php
include "config.php";

$request = $_POST['request'];   // request
$ses_id=$_SESSION['plot_id'];
// Get username list
if($request == 1){
    $search = $_POST['search'];
 //$query = "SELECT fruit_name FROM tblharvest WHERE fruit_name like '%".$search."%'";

    //IMP QUERY:
     $query = "SELECT distinct fruit_name,h_id FROM tblharvest WHERE ses_id='".$ses_id."' and  fruit_name like '%".$search."%' " ;
    // ;
   

   // $query = "SELECT * FROM tblitem WHERE item_name like'%".$search."%'";
    $result = mysqli_query($db,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['h_id'],"label"=>$row['fruit_name'],);
    }

    // encoding array to json format
             
    echo json_encode($response); 
   
    exit;
}

// Get details
if($request == 2){
    $userid = $_POST['userid'];
$sql= "SELECT * FROM tblharvest WHERE h_id=".$userid;

    $result = mysqli_query($db,$sql);

    $users_arr = array();

    while( $row = mysqli_fetch_array($result) ){
        $userid = $row['h_id'];
      
        $variety = $row['variety'];
       

        $users_arr[] = array("id" => $userid, "variety" => $variety);
    }

    // encoding array to json format
    echo json_encode($users_arr);
    exit;
}
