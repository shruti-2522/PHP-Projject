<?php 

include "config.php";
$ses_id=$_SESSION['plot_id'];
if(isset($_POST['search'])){
   // $search = mysqli_real_escape_string($con,$_POST['search']);

    $query = "SELECT * FROM tblledger WHERE under!='cash in-hand' and under!='Bank Accounts' and under!='deposits' and under!='Loans & other liabilities' and under!='Duties and Taxes' and under!='labour expenses' and ses_id='".$ses_id."' and  name like'%".$search."%'";
    $result = mysqli_query($db,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['open'],"label"=>$row['name']);
    }

    echo json_encode($response);
}

exit;


