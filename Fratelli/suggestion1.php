<?php 

include "config.php";
$ses_id=$_SESSION['plot_id'];
if(isset($_POST['search'])){
   // $search = mysqli_real_escape_string($con,$_POST['search']);

    $query = "SELECT * FROM tblledger WHERE (under='Sundry Debitors' or under='creditors' or under='Purchase' or under='Sales Account') and ses_id='".$ses_id."' and  name like'%".$search."%'";
    $result = mysqli_query($db,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("label"=>$row['name']);
    }

    echo json_encode($response);
}

exit;


