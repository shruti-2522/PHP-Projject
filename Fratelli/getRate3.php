<?php
include "config.php";
$ses_id=$_SESSION['plot_id'];
$request = $_POST['request'];   // request

// Get username list
if($request == 1){
   $search = $_POST['search'];
  
  $query="SELECT * FROM tblitem,tblp1 WHERE (tblitem.item_type='Pesticide' or tblitem.item_type='Insecticide' or tblitem.item_type='Fungicide') and tblitem.item_name=tblp1.item_name and tblitem.ses_id='".$ses_id."' and tblp1.ses_id='".$ses_id."' and status=0 like tblp1.item_name='%".$search."%'";
  
    $result = mysqli_query($db,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['id'],"label"=>$row['item_name']);
    }

    // encoding array to json format
             
    echo json_encode($response); 
   
    exit;
}

// Get details
if($request == 2){
    $userid = $_POST['userid'];
    $sql = "SELECT * FROM tblp1 WHERE id=".$userid;

    $result = mysqli_query($db,$sql);

    $users_arr = array();

    while( $row = mysqli_fetch_array($result) ){
        
         $purchase_rate=$row['purchase_rate'];
       
        // $ingredient= $row['ingredient'];
        // $pest = $row['pest'];
        
       

        $users_arr[] = array("purchase_rate" => $purchase_rate);
    }

    // encoding array to json format
    echo json_encode($users_arr);
    exit;
}
