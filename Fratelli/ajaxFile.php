<?php
include('config.php');

if(isset($_POST["sprayer_id"])){
    //Get all state data
	$sprayer_id= $_POST['sprayer_id'];
    $query = "SELECT * FROM tblntype WHERE sid = '$sprayer_id' 
	ORDER BY name_of_sprayer ASC";
	$run_query = mysqli_query($db, $query);
    
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display states list
    if($count > 0){
        echo '<option value="">Select name of sparayer</option>';
        while($row = mysqli_fetch_array($run_query)){
		$sname_id=$row['nid'];
		$sprayer_name=$row['name_of_sprayer'];
        echo "<option value='$sname_id'>$sprayer_name</option>";
        }
    }else{
        echo '<option value="">sprayer name not available</option>';
    }
}
?>