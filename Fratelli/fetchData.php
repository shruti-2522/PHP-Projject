<?php 

include "config1.php";

if(isset($_POST['search'])){
    $search = mysqli_real_escape_string($con,$_POST['search']);

    $query = "SELECT * FROM tblitem WHERE item_name like'%".$search."%'";
    $result = mysqli_query($con,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['GST'],"label"=>$row['item_name']);
    }
    
    echo json_encode($response);
}

exit;


