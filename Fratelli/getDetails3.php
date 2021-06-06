<?php
include "config.php";
$ses_id=$_SESSION['plot_id'];
$request = $_POST['request'];   // request

// Get username list
if($request == 1){
   $search = $_POST['search'];
   //echo $search;
   //$query = "SELECT * FROM tblp1 WHERE item_name like'%".$search."%'";\
  $query="SELECT * FROM tblitem,tblp1 WHERE (tblitem.item_type='Pesticide' or tblitem.item_type='Insecticide' or tblitem.item_type='Fungicide') and (tblitem.item_name=tblp1.item_name) and (tblp1.item_type='Pesticide' or tblp1.item_type='Insecticide' or tblp1.item_type='Fungicide') and tblitem.ses_id='".$ses_id."' and tblp1.ses_id='".$ses_id."' like tblp1.item_name='%".$search."%'";
   // $query = "SELECT * FROM tblitem,tblp1 WHERE (tblitem.item_type='pesticide' or tblitem.item_type='insecticide' or tblitem.item_type='fungicide') and tblitem.item_name=tblp1.item_name and tblp1.item_name and tblitem.ses_id='".$ses_id."' and tblp1.ses_id='".$ses_id."' like '%".$search."%'";
// //    $query="select DISTINCT(tblp1.item_name) from tblp1,tblitem WHERE tblitem.item_type='Pesticide' or tblitem.item_type='insecticide' and tblitem.item_name=tblp1.item_name and tblp1.item_name like '%".$search."%'";
//    //$query = "SELECT * FROM tblledger WHERE under!='Bank Accounts' and  under!='cash in-hand' and name like'%".$search."%'";
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
        $userid = $row['id'];
        $batch_no= $row['batch_no'];
        $exp_date = $row['exp_date'];
        $PHI = $row['PHI'];
         $disease = $row['disease'];
         $purchase_rate=$row['purchase_rate'];
           $item_type=$row['item_type'];
        // $ingredient= $row['ingredient'];
        // $pest = $row['pest'];
        
       

        $users_arr[] = array("id" => $userid, "batch_no" => $batch_no,"exp_date" => $exp_date,"PHI" => $PHI,"disease" => $disease,"purchase_rate" => $purchase_rate,"item_type" => $item_type);
    }

    // encoding array to json format
    echo json_encode($users_arr);
    exit;
}
