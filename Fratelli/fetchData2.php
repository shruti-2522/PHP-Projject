<?php 

include "config.php";

if(isset($_POST['search'])){
 $ses_id=$_SESSION['plot_id'];
    //$search = mysqli_real_escape_string($db,$_POST['search']);
  	 
    $query = "SELECT * FROM tblledger WHERE (under='Bank Accounts' or under='cash in-hand') and ses_id='".$ses_id."' and name like'%".$search."%'";
    $result = mysqli_query($db,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("label"=>$row['name']);
    }

    echo json_encode($response);
}

exit;


